<?php
	include_once('../helpers/format.php');
	require '../vendor/autoload.php';		
	
?>

<?php
	class Product{
		public function insertProduct()
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->Product;


			$name = $_POST['NameProduct'];
			$category = $_POST['CategoryProduct'];
			$brand =  $_POST['BrandProduct'];
			$description = $_POST['DescriptionProduct'];
			$price = $_POST['PriceProduct'];
			$type = $_POST['Type'];

			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			

			if($name == '' || $description == "" || $price == "" || $category == "" || $brand == "")
			{
				$alert = "<span class='error'>Thông tin sản phẩm không được rỗng</span>";
				return $alert;
			}
			else
			{
				move_uploaded_file($file_temp, $uploaded_image);
				$collection->insertOne(["name" =>"$name", "category"=>"$category", "brand"=>"$brand", "description"=>"$description", "price"=>"$price", "type"=>"$type", "image"=>"$unique_image"]);
				if($collection != NULL)
				{
					$alert = "<span class='success'>Thêm sản phẩm thành công</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='success'>Thêm sản phẩm không thành công. Vui lòng thử lại!</span>";
					return $alert;
				}
			}
		}

		public function selectProduct()
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->Product;
 			$document = $collection->find();
 			
		}

		public function updateProduct($id)
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->Product;


			$name = $_POST['NameProduct'];
			$category = $_POST['CategoryProduct'];
			$brand =  $_POST['BrandProduct'];
			$description = $_POST['DescriptionProduct'];
			$price = $_POST['PriceProduct'];
			$type = $_POST['Type'];

			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($name == '' || $description == "" || $price == "" || $category == "" || $brand == "")
			{
				$alert = "<span class='error'>Thông tin sản phẩm không được rỗng</span>";
				return $alert;
			}
			else
			{
				move_uploaded_file($file_temp, $uploaded_image);
				$collection->updateOne(['_id'=> new MongoDB\BSON\ObjectId ($id )],
					['$set'=> ["name" =>"$name", "category"=>"$category", "brand"=>"$brand", "description"=>"$description", "price"=>"$price", "type"=>"$type", "image"=>"$unique_image"]]
			);
				if($collection != NULL)
				{
					$alert = "<span class='success'>Cập nhật sản phẩm thành công</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='success'>Cập nhật sản phẩm không thành công. Vui lòng thử lại!</span>";
					return $alert;
				}
			}
		}

	}
?>