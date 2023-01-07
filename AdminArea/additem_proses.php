<?php

if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}

include_once ('koneksi.php');

//data dari addproduct.php
$productid = $_POST['productid'];
$productcategory = $_POST['productcategory'];
$productname = $_POST['productname'];
$productdescription = $_POST['productdescription'];
$productprice = $_POST['productprice'];
$productphoto = $_FILES['productphoto'];
$productquantity = $_POST['productquantity'];

//ambil file ekstensi foto produk
$ext = explode(".", $productphoto['name']);
$ext = end($ext);
$ext = strtolower($ext);


//file yang di perbolehkan 
$ext_boleh = ['jpg','png','jpeg'];
if(in_array($ext, $ext_boleh)){
    $sumber = $productphoto['tmp_name'];
    $tujuan = 'Images/' . $productphoto['name'];
    move_uploaded_file($sumber, $tujuan);

        try{
        $con = new PDO ("mysql:host=localhost;dbname=dwpprint","root","");
        $sql = "INSERT INTO product (idproduct, CategoriesID, productname, productdescription, productprice, productphoto, proquantity) VALUES (?,?,?,?,?,?,?)";
        $prep = $con->prepare($sql);
        $prep->execute([$productid,$productcategory,$productname,$productdescription,$productprice,$tujuan,$productquantity]);
        echo "Product berhasil ditambah";
        header('Location: product.php');
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
} else {
    echo "Product gagal ditambahkan";
}


?>