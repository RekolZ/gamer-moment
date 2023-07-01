<?php
require_once "connect.php";
session_start();
$name=$_REQUEST['name']; //имя
$email=$_REQUEST['email']; //почта
$surname=$_REQUEST['surname']; //фамилия
$phone=$_REQUEST['phone']; //телефон
$login = $_SESSION['username']; //логин
$sql="UPDATE users SET name = '$name', surname='$surname', phone_number='$phone', 
email = '$email' where login='$login'"; //обновление данных в базе
mysqli_query($link, $sql);
//занос данных в сессию
$_SESSION['email']=$email;
$_SESSION['surname']=$surname;
$_SESSION['phone']=$phone;
$_SESSION['name']=$name;
echo $sql;
header("Location: ../profile.php")
?>