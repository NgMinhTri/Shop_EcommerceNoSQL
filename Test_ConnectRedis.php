<?php
require './config/configRedis.php';

$value = $client->get('adminUser');
echo $value;
?>