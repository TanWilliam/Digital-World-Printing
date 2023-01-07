<?php

function koneksiDb(){
    try {
        $dsn = "mysql:host=localhost;dbname=dwpprint";
        $pdo = new PDO($dsn, 'root', '');
        return $pdo;
    }catch(PDOException $e){
        return $e;
    }
}

?>