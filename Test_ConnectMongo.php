<?php
// Prepend a base path if Predis is not available in your "include_path".
require './config/configMongoDB.php';
require './vendor/autoload.php';	
	$con = new MongoDB\Client("mongodb://localhost:27017");		
			$db = $con->ShopEcommerceNoSQL;
 			$collection = $db->Product;
            $id = "60ca0955b05400002100304a";
 			$document = $collection -> findOne(['_id' => new MongoDB\BSON\ObjectID( $id )]);
 			
 				print_r($document) ;
		
?>