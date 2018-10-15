<?php
// Generally localhost
$config['host'] = "127.0.0.1";
// Generally 27017
$config['port'] = 27017;
// The database you want to work on
$config['db'] = "careernet";
// Required if Mongo is running in auth mode
$config['user'] = "root";
$config['pass'] = "password";
// connect
$m = new MongoClient();

echo "mongo client is up and running";
$class = 'MongoClient'; 

if(!class_exists($class)){ 
            
    $class = 'Mongo'; 
    echo "class exists";
            
} 
$mongo_host = "127.0.0.1";
$mongo_port =  27017;
$mongo_db = 'careernet';  
$mongo_user = 'root';
$mongo_password = 'password';

$conn = new MongoClient("mongodb://".$mongo_host.":".$mongo_port." -u ".$mongo_user." -p ".$mongo_password); 

echo 'So far';

// select a database
// $db = $m->comedy;

// // select a collection (analogous to a relational database's table)
// $collection = $db->cartoons;

// // add a record
// $document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
// $collection->insert($document);

// // add another record, with a different "shape"
// $document = array( "title" => "XKCD", "online" => true );
// $collection->insert($document);

// // find everything in the collection
// $cursor = $collection->find();

// // iterate through the results
// foreach ($cursor as $document) {
//     echo $document["title"] . "\n";
// }

?>