<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$k = new PDO("mysql:host=localhost;dbname=dwpprint", "root","");
$sql = "SELECT * FROM user WHERE email = ?";

$result = $k->prepare($sql);
$result->execute([$email]);

if($row = $result->fetch()){
    if(password_verify($password, $row['password'])){
        $_SESSION['email'] = $row['email'];
        $userid = $row['userid'];
        $_SESSION['role'] = $row['role'];
        
        if($_SESSION['role'] == "admin") {
            header('location: AdminArea/index.php');
        } else if ($_SESSION['role'] == NULL) {
            header("location: MemberArea/index.php");
        }
    } else {
        echo "login gagal";
    }
} else {
    echo "login gagal";
}
?>

