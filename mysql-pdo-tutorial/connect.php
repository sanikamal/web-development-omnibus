<?php

try {
    $db = new PDO( 'mysql:host=localhost;dbname=testdb;charset=utf8', 'root', '' );
    //var_dump($db);
}

catch(Exception $e) {
    //echo $e->getMessage();
    echo "An error has occurred";
}

?>