<?php

    $id = $_GET['id'];//получаем id товара

    session_start();
    if (!isset($_SESSION['cart']) and $id!=null) {//если сессия корзины не существует
        $temp[$id] = 1;//в массив заносим количество товара 1 
    } else {//если в сессии корзины уже есть товары
        $temp = $_SESSION['cart'];//заносим в масив старую сесию
        if (isset($_GET['id'])){ if (!array_key_exists($id, $temp)) {//проверяем есть ли в корзине уже такой товар
            $temp[$id] = 1; //в массив заносим количество товара 1
            }      }
    }
    if (!isset($_SESSION['cart']) and $id!=null) {$count = count($temp);}//считаем товары в корзине
    $_SESSION['cart'] = $temp;//записываем в сессию наш масив
    echo $count; //возвращаем количество товаров
    


?>