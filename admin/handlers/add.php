<?php
require_once "../../handlers/connect.php";
//заносим данные в переменные
$idcategory = 7;
$name=$_REQUEST['name'];
$gpuname=$_REQUEST['gpuname'];
$price=$_REQUEST['price'];
$picture=$_REQUEST['picture'];
$brand=$_GET['brand'];
$gpubrand=$_GET['gpubrand'];
$gpucodename=$_GET['gpucodename'];
$gpucoolingsystem=$_GET['gpucoolingsystem'];
$gpuinterface=$_GET['gpuinterface'];
$gpumemorybus=$_GET['gpumemorybus'];
$gpumemorycapacity=$_GET['gpumemorycapacity'];
$gpunumberofslots=$_GET['gpunumberofslots'];
$gpuseries=$_GET['gpuseries'];
$gputypeofmemory=$_GET['gputypeofmemory'];
$gputypeofstand=$_GET['gputypeofstand'];
$videomemoryfrequency=$_REQUEST['videomemoryfrequency'];
//занос данных в таблицу products
$sql = "INSERT INTO products (id_category, photo, price, name) 
VALUES ($idcategory, 'img/$picture', '$price', '$name')";
mysqli_query($link, $sql);
//занос данных в таблицу videocards
mysqli_query($link, "INSERT INTO `videocards` 
(`name`, `id_products`, `id_brand`, `id_gpubrand`, `id_gpucodename`, `id_gpucoolingsystem`, `id_gpuinterface`, `id_gpumemorybus`, `id_gpumemorycapacity`, `id_gpunumberofslots`, `id_gpuseries`, `id_gputypeofmemory`, `id_gputypeofstand`, `videomemory_frequency`) 
VALUES ('$gpuname', LAST_INSERT_ID(), $brand, $gpubrand, $gpucodename, $gpucoolingsystem, $gpuinterface, $gpumemorybus, $gpumemorycapacity, $gpunumberofslots, $gpuseries, $gputypeofmemory, $gputypeofstand, '$videomemoryfrequency');");
header("Location: ../index.php")
?>