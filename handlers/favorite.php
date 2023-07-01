<?php
  $id = $_GET['id'];//получаем id товара

  session_start();
  if (!isset($_SESSION['favorite']) and $id!=null) {//если сесия корзины не существует
      $temp[$id] = 1;//в масив заносим количество тавара 1 
  } else {//если в сесии корзины уже есть товары
      $temp = $_SESSION['favorite'];//заносим в масив старую сесию
      if (isset($_GET['id'])){ if (!array_key_exists($id, $temp)) {//проверяем есть ли в корзине уже такой товар
          $temp[$id] = 1; //в масив заносим количество товара 1
          }      }
  }
  if (!isset($_SESSION['favorite']) and $id!=null) {$count = count($temp);}//считаем товары в корзине
  $_SESSION['favorite'] = $temp;//записываем в сессию наш масив
?>