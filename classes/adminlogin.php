<?php	
	include ('../lib/session.php');
	Session::checkLogin(); // gọi hàm check login để ktra session
	include_once('../lib/database.php');
	include_once('../helpers/format.php');
	require '../vendor/autoload.php';				
?>
<?php 	
	class adminlogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function longin_admin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser); 
			$adminPass = $this->fm->validation($adminPass);
			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass); 					
			$query = "SELECT *FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if($result != false)
			{
				Predis\Autoloader::register();
				$redis = new Predis\Client();
				$key = 'ADMINS';
				$value = $result->fetch_assoc();
				if(!$redis->get($key))
				{					
					$adminSet = $value;										
					$redis->set($key, serialize($adminSet));
					$redis->expire($key, 86400);   //THỜI GIAN LƯU GIỮ THÔNG TIN ADMIN LÀ BAO NHIÊU S(10S)

					$adminGet = unserialize($redis->get($key));
					 if($adminGet['adminUser'] == $value['adminUser'] && $adminGet['adminPass'] == $value['adminPass'])
					 Session::set('adminlogin', true);
					 Session::set('adminUser', $adminGet['adminUser']);
					 header("Location:index.php");				
				}
				else
				{					
					$adminGet = unserialize($redis->get($key));
					 if($adminGet['adminUser'] == $value['adminUser'] && $adminGet['adminPass'] == $value['adminPass'])
					 Session::set('adminlogin', true);
					 Session::set('adminUser', $adminGet['adminUser']);
					 header("Location:index.php");
				}
			}
			else
			{
					$alert = "User hoặc mật khẩu không đúng";
					return $alert;
			}											
		}
	}
?>