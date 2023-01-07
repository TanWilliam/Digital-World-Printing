<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}

include_once('koneksi.php');
$TransactionID = $_POST['TransactionID'];
$orderstatus = $_POST['orderstatus'];

echo $TransactionID;
echo $orderstatus;

$query = "UPDATE Transaction SET StatusID = '$orderstatus' where TransactionID = '$TransactionID'";
$result = mysqli_query($con, $query);

header('Location:transaction.php');

?>