<?php
require './config/configRedis.php';
$client->set('Name', 'Minh Tri Nguyen');
$value = $client->get('Name');
echo $value;
?>