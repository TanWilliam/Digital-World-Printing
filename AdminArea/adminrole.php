<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}

include_once ('koneksi.php');
$userid = $_GET['userid'];

$query="UPDATE user SET role = 'admin' WHERE userid = '$userid'";
$result = mysqli_query($con,$query);

header('Location:member.php');

?>