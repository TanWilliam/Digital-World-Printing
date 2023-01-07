<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 

if(!isset($_SESSION['id'])){
    //user belum login
    header('Location: ../signin.php');
}
?>

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

    $pdo = koneksiDb();
    $catid = $_POST['cat_id'];
    $catname = $_POST['cat_name'];

    $q = $pdo->query("INSERT INTO ProductCategories (CategoriesID, CategoriesName) VALUES ('$catid', '$catname')");

    header('Location: product.php');

?>