<?php

require_once 'vendor/autoload.php';
$client = Laudis\Neo4j\ClientBuilder::create()
    
    ->addBoltConnection('neo4j', 'bolt://neo4j:123456789@localhost')
    ->setDefaultConnection('neo4j')
    ->build();

    $results = $client->run('MATCH (n) RETURN n LIMIT 25');
    print_r($results);

 ?>