<?php

require_once 'vendor/autoload.php';

use Laudis\Neo4j\Databags\Statement;


$client = Laudis\Neo4j\ClientBuilder::create()
    ->addHttpConnection('backup', 'http://neo4j:123@localhost')
    ->addBoltConnection('default', 'bolt://neo4j:123@localhost:7687')
    ->setDefaultConnection('default')
    ->build();

    
    
    $client->run("CREATE(n:Customer {name: 'Han', password: '123'})");
    

    //$results->getResults()->first()->get('id');
    

?>