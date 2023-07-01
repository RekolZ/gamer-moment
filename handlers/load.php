<?php
require_once 'connect.php';
if (isset($_REQUEST['regname'])) {$regname=$_REQUEST['regname'];}
if (isset($_REQUEST['regpass'])) {$regpassword=$_REQUEST['regpass'];}
if (isset($_REQUEST['name'])) {$name=$_REQUEST['name'];}
if (isset($_REQUEST['pass'])) {$password=$_REQUEST['pass'];}

$sql = "SELECT * FROM users WHERE login='$name'";
$result = mysqli_query($link, $sql); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);

if (isset($_REQUEST['logbaton']))
{
    if (empty($myrow['login']))
    {
    //если пользователя с введенным логином не существует
    header("Location: ../login.php?status=1");
    }
    else 
    {
    //если существует, то сверяем пароли
    if (password_verify($password, $myrow['password']   )) {
    //если пароли совпадают, то запускаем пользователю сессию
    session_start();
    $_SESSION['username']=$name; 
    $_SESSION['id']=$myrow['id'];
    
    if ($myrow['role']==2) 
    header("Location: ../index.php");
    else 
    header("Location: ../admin/index.php");
    }
    else {
    //если пароли не сошлись
    
    header("Location: ../login.php?status=1");
    }
    } 
}




if (isset($_REQUEST['regbtn']))
{   
    $regpassword=password_hash($regpassword, PASSWORD_DEFAULT);
    $sql="INSERT INTO `users` (`login`, `password`, `role`) 
    VALUES ('$regname', '$regpassword', '2')";
    echo $sql;
    mysqli_query($link,$sql);
    session_start();
    $_SESSION['username']=$name; 
    $_SESSION['id']=$myrow['id'];
    header("Location: ../login.php");
}
    ?>