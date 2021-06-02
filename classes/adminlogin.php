<?php 
	// gọi file adminlogin
	//include '../classes/adminlogin.php';
	include ('../lib/session.php');
	Session::checkLogin(); // gọi hàm check login để ktra session
	include_once('../helpers/format.php');
	

 ?>
<?php	
	class adminlogin
	{
		private $fm;
		public function __construct()
		{
				$this->fm = new Format();												
		}
		public function longin_admin($adminUser,$adminPass){
			$adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
			$adminPass = $this->fm->validation($adminPass);

			
			if(empty($adminUser) || empty($adminPass)){
				$alert = "User and Pass không nhập rỗng";
				return $alert;
			}else{
				require '../vendor/autoload.php';

	Predis\Autoloader::register();
	$client = new Predis\Client();

				$valueAdminUser = $client->get('adminUser');
				$valueAdminPass = $client->get('adminPass');               			
				// $result = $this->db->select($query);

				if($valueAdminUser != NULL && $valueAdminPass != NULL){
					//session_start();
					// $_SESSION['login'] = 1;
					//$_SESSION['user'] = $user;
					
					Session::set('adminlogin', true); // set adminlogin đã tồn tại
					// gọi function Checklogin để kiểm tra true.
					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					header("Location:index.php");
				}else {
					$alert = "User and Pass not match";
					return $alert;
				}
			}


		}
	}
 ?>