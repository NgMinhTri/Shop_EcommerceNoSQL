<?php
// Prepend a base path if Predis is not available in your "include_path".
require './config/configMongoDB.php';

$db = $con->TestSuccessPHP_mongoDB;
 	$collection = $db->CollectionFirst;

 	$collection->insertOne(["Name" =>"Minh Tri sdhfdsjhdsjfsj"]);
?>