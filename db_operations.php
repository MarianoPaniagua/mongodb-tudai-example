<?php

/*En este caso las queries estan formadas para objetos de la siguiente estructura:

    {"product":"",
     "price":"",
     "brand":""}

  para ser ejecutadas en una base "tudai_dev", en una colección "products".

  Pueden modificar todo esto si quieren.
*/

function getAllFromDB(){
    $server = ""; //colocar aquí la url de su servidor mongo
    $manager = new MongoDB\Driver\Manager($server);
    $filter = [];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $rows = $manager->executeQuery('tudai_dev.products', $query);
    foreach ($rows as $document) {
        echo "Product: " . $document->product . "|" . "Price: " . $document->price . "|" . "Brand: " 
        . $document->brand . "<br>";

      }
}

function saveProduct($data){
    $server = "";  //colocar aquí la url de su servidor mongo
    $manager = new MongoDB\Driver\Manager($server);

    $bulk = new MongoDB\Driver\BulkWrite();
    $bulk->insert(['_id' => new MongoDB\BSON\ObjectID(), 'product' => $data['product'],'price' => $data['price'],'brand' => $data['brand']]);

    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
    $result = $manager->executeBulkWrite('tudai_dev.products', $bulk, $writeConcern);
    }

    function get($limit){
        $server = "";  //colocar aquí la url de su servidor mongo
        $manager = new MongoDB\Driver\Manager($server);
        $filter = [];
        $options = ['limit'=>$limit];
        $query = new MongoDB\Driver\Query($filter, $options);
        $rows = $manager->executeQuery('tudai_dev.products', $query);
        foreach ($rows as $document) {
            echo "Product: " . $document->product . "|" . "Price: " . $document->price . "|" . "Brand: " 
            . $document->brand . "<br>";
          }
    }
?>