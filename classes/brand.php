<?php
	require '../vendor/autoload.php';			
?>
<?php
	class Brand
	{
		public function insertBrand($brandName)
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->BrandProduct;

			$BrandName = $brandName;			
			if(empty($BrandName))
			{
				$alert = "<span class='error'>Tên nhãn hiệu không được rỗng</span>";
				return $alert;
			}
			else
			{
				
				$collection->insertOne(["Name" =>"$brandName"]);
				if($collection != NULL)
				{
					$alert = "<span class='success'>Thêm thương hiệu sản phẩm thành công</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'>Thêm thương hiệu sản phẩm không thành công</span>";
					return $alert;
				}
			}
		}

		public function selectBrand()
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->Brand;
 			$document = $collection->find();
 			foreach ($document as $doc) 
 			{
 				print_r($doc);
 			}
		}
	}
?>