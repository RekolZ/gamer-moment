<?php
    session_start();
    include 'cart.php';
    $temp[$id] = $temp[$id]+1;//Прибавляем 1 к количеству товара
    $_SESSION['cart'] = $temp; //заносим массив в сессию
    header("Location: ../cart.php") 
?>  