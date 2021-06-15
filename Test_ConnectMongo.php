<?php
// Prepend a base path if Predis is not available in your "include_path".
require './config/configMongoDB.php';

	$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->Product;

 			$document = $collection -> find();
 			foreach ($document as $doc) {
 				print_r($doc);
 			}
 			print_r($doc->name);
		
?>