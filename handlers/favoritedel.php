<?php
$id = $_GET['id'];//получаем id
session_start(); //стартуем сессию
$temp = $_SESSION['favorite']; //переносим сессию во временную переменную
   if ($temp){
       $temp[$id]='';//удаляем запис
       print_r($temp);
       $temp = array_diff($temp, array(''));
      }


$_SESSION['favorite'] = $temp; //сохраняем сессию
header('Location: ../favorite.php');
?>