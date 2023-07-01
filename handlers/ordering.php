<?php
session_start();
require_once 'connect.php';
if (isset($_REQUEST['order__btn']))
{
    $date = date('Y-m-d');
    $user = $_SESSION['username'];
    echo $date ,$user;
    $sql2= "INSERT INTO orders (date, user) VALUES ('$date', '$user');";
    mysqli_query($link, "INSERT INTO orders (date, user) VALUES ('$date', '$user');");
    if (mysqli_query($link, "INSERT INTO orders (date) VALUES ('$date', '$user');") ){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($link);
    }
}

foreach(mysqli_query($link, "SELECT id from orders where date='$date';") as $id){
$order_id = $id['id'];
}
foreach($_SESSION['cart'] as $key => $id)
{
    mysqli_query($link, "INSERT INTO orders_products (orders_id, products_id, quantity) VALUES ('$order_id','$key','$id');");
}
header('Location: ../ordersuccess.php')
?>