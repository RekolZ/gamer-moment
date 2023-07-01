<?php
require_once 'handlers/connect.php';
echo $_GET['status'];
if($_GET['status']=='1') echo "<script>alert(\"Неправильный логин или пароль\");</script>";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Система регистрации</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/login.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&family=Strait&display=swap" rel="stylesheet">
</head>
<body>
<FORM action="handlers/load.php">
<div class="materialContainer">
<div class="box">
   <div class="title">Вход</div>
   <div class="input">
      <label for="name">Логин</label>
      <input type="text" name="name" id="name">
      <span class="spin"></span>
   </div>
   <div class="input">
         <label for="pass">Пароль</label>
         <input type="password" name="pass" id="pass">
         <span class="spin"></span>
      </div>
   <div class="button login">
   <button type="submit" name="logbaton"><span>Войти</span></button><i class="fa fa-check"></i></button>
   </div>

   <a href="index.php" class="pass-forgot">Забыли пароль?</a>

</div>
<div class="overbox">
   <div class="material-button alt-2"><span class="shape"></span></div>
   <div class="title">Регистрация</div>
   <div class="input">
      <label for="regname">Логин</label>
      <input type="text" name="regname" id="regname">
      <span class="spin"></span>
   </div>
   <div class="input">
      <label for="regpass">Пароль</label>
      <input type="password" name="regpass" id="regpass">
      <span class="spin"></span>
   </div>

   <div class="input">
      <label for="reregpass">Повторите пароль</label>
      <input type="password" name="reregpass" id="reregpass">
      <span class="spin"></span>
   </div>
   <div class="button">
      <button type="submit" name="regbtn"><span>Зарегиcтрироваться</span></button>
   </div>
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
	</FORM>
</body>
</html>