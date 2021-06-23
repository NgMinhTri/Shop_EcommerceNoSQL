<?php
require './vendor/autoload.php';
Predis\Autoloader::register();

$client = new Predis\Client();

$client->set('demo1', 'nguyen');
$client->append('demo1', 'minh tri'); 
$result = $client->get('demo1'); 
echo $result;

?>