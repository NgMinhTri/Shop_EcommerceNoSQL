<?php
	require '../vendor/autoload.php';			
?>
<?php
	class Category
	{
		public function insertCategory($catName)
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->CategoryProduct;

			$CatName = $catName;			
			if(empty($CatName))
			{
				$alert = "<span class='error'>Tên danh mục không được rỗng</span>";
				return $alert;
			}
			else
			{
				
				$collection->insertOne(["Name" =>"$catName"]);
				if($collection != NULL)
				{
					$alert = "<span class='success'>Thêm danh mục sản phẩm thành công</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'>Thêm danh mục sản phẩm không thành công</span>";
					return $alert;
				}
			}
		}

		public function selectCategory()
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->CategoryProduct;
 			$document = $collection->find();
 			
		}

		public function updateCategory($catname, $id)
		{
			$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->CategoryProduct;

			$CategoryName = $catname;			
			if(empty($CategoryName))
			{
				$alert = "<span class='error'>Tên danh mục không được rỗng</span>";
				return $alert;
			}
			else
			{
				
				$collection->updateOne(['_id'=> new MongoDB\BSON\ObjectId ($id )],
					['$set'=> ["Name" =>"$CategoryName"]]);
				if($collection != NULL)
				{
					$alert = "<span class='success'>Cập nhật danh mục sản phẩm thành công</span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'>Cập nhật danh mục sản phẩm không thành công</span>";
					return $alert;
				}
			}
		}
	}
?>