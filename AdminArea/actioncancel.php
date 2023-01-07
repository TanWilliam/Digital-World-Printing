<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}

include_once ('koneksi.php');
$TransactionID = (int) $_GET['TransactionID'];

$query="UPDATE Transaction SET StatusID = 'St006' WHERE TransactionID = '$TransactionID'";
$result = mysqli_query($con, $query);

header('Location:transaction.php');
?>