<?php

require_once 'vendor/autoload.php';
$client = Laudis\Neo4j\ClientBuilder::create()
    
    ->addBoltConnection('covid19', 'bolt://neo4j:password@localhost')
    ->setDefaultConnection('covid19')
    ->build();



 ?>