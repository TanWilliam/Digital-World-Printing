<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: signin.php?pesan=login');
}
?>