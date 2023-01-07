<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php?pesan=login');
}

$con = mysqli_connect("localhost","root","","dwpprint");

$productid = $_POST['productid'];
$productname = $_POST['productname'];
$proquantity = $_POST['proquantity'];
$productprice = $_POST['productprice'];
$orderquantity = $_POST['orderquantity'];
$delivery = $_POST['delivery'];
$payment = $_POST['payment'];
$custname = $_POST['custname'];
$custemail = $_POST['custemail'];
$custphone = $_POST['custphone'];

$con = mysqli_connect("localhost","root","","dwpprint");

if($proquantity > $orderquantity OR $proquantity == $orderquantity){
    $hitungan = $proquantity - $orderquantity;
    $kali = $productprice * $orderquantity;

    $insertorder = "INSERT INTO Transaction (idproduct, PaymentID, StatusID, PaymentProof,OrderPrice, OrderAmount, OrderAddress, CustName, CustPhone, CustEmail) 
    VALUES ('$productid', '$payment','St001','a.png','$kali','$proquantity','$delivery','$custname','$custphone','$custemail')";
    $query = mysqli_query($con, $insertorder);

        if($query){
            $insertransaction = "UPDATE product SET proquantity = '$hitungan' where idproduct = '$productid'";
            $result = mysqli_query($con,$insertransaction);
        } else if (!$query){
            echo"gagal";
        }
        
        //berhasil
        echo '<script>alert("Transaksi Berhasil")</script>';
} else if ($orderquantity > $proquantity){
    echo '<script>alert("Transaksi Gagal Stok Tidak Cukup")</script>';
}





?>