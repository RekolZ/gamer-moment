<?php
    session_start();
    include 'cart.php';
    $temp[$id] = $temp[$id]-1;
    if($temp[$id]==0)
    {
        $temp[$id]='';//удаляем запис
        print_r($temp);
        $temp = array_diff($temp, array(''));
    }
    $_SESSION['cart'] = $temp;
    header("Location: ../cart.php")
?>