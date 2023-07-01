<?php
session_start();
require_once 'handlers/connect.php';
include 'handlers/cart.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Gamer Moment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&family=Strait&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <meta name="theme-color" content="#fafafa">
</head>
<body>  

            <div class="container order__success">
                <p><img src="img/ordersuccess.png" alt=""></p>
                <p>Ваш заказ успешно оформлен</p>
                <a class="empty__cartbtn" href="index.php">Перейти в каталог</a>
            </div>
</body>
</html>