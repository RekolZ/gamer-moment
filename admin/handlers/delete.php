<?php
require_once "../../handlers/connect.php";
$id = $_GET['id']; //извлекаем id с помощью GET
//удаляем данные из таблицы videocards с заданным id
mysqli_query($link, "DELETE FROM videocards WHERE id_products = $id;"); 
//удаляем данные из таблицы products с заданным id
mysqli_query($link, "DELETE FROM products WHERE id = $id;");
header("Location:" .$_SERVER['HTTP_REFERER']);
?>