<?php
// Prepend a base path if Predis is not available in your "include_path".
require './config/configMongoDB.php';

$db = $con->TestSuccessPHP_mongoDB;
 	$collection = $db->CollectionFirst;

$name = "ABCHSDGFWJYFD";
 	$collection->insertOne(["Name" =>"$name", "OK"=>"ok"]);
?>