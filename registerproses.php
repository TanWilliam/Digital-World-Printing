<?php

$user_name = $_POST['uname'];
$user_email = $_POST['umail'];
$user_pass = $_POST['upass'];
$user_confirm = $_POST['uconfirm'];

if($user_name == NULL){
    header("location:register.php?pesan=username");
} else if ($user_email == NULL){
    header("location:register.php?pesan=email");
} else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    header("location:register.php?pesan=invalid");
} else if ($user_pass == NULL){
    header("location:register.php?pesan=password");
} else if ($user_confirm == NULL){
    header("location:register.php?pesan=confirm");
} else if ($user_pass == $user_confirm){
    $hashpass = password_hash($_POST['upass'], PASSWORD_BCRYPT);
    $conn = mysqli_connect("localhost","root","","dwpprint");
    mysqli_query($conn, "INSERT INTO user (userid, name, email, password, address, phonenumber, profilepict, role) VALUES (null,'$user_name','$user_email','$hashpass',null,null,null,null)");
    header("location:signin.php");
} else {
    header("location:register.php?pesan=notmatch");
}


?>