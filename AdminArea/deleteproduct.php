<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}

include_once ('koneksi.php');
$idproduct = $_GET['idproduct'];

$query="DELETE FROM product WHERE idproduct='$idproduct'";
$result = mysqli_query($con, $query);

header('Location:product.php');

?>