<?php
	include_once('../helpers/format.php');
	require '../vendor/autoload.php';		
	$con = new MongoDB\Client("mongodb://localhost:27017");		
	$db = $con->TestSuccessPHP_mongoDB;
 	$collection = $db->CollectionFirst;
	//$name = "ABCHSDGFWJYFD";
 	//$collection->insertOne(["Name" =>"$name"]);
?>

<?php
	class Product{
		private $format;
		function __construct()
		{
			$this->format = Format();
		}

		public function insertProduct($name, $category, $brand, $description, $price, $image, $type){
			$collection->insertOne(
				["Name" =>"$name", "Category"=>"$category", "Brand"=>"$brand", "Descripion"=>"$description", "Price"=>"$price", "Image"=>"$image", "Type"="$type" ]);
		}
	}
?>