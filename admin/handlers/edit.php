<?php
require_once "../../handlers/connect.php";
//занос данных в переменные
$id=$_REQUEST['id'];
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
//заносим новые данные в таблицу products
mysqli_query($link, "UPDATE products SET name = '$name', price = '$price' WHERE id = $id");
//заносим новые данные в таблицу videocards
mysqli_query($link, "UPDATE videocards 
SET name = '$gpuname', id_brand = '$brand', id_gpubrand = '$gpubrand', 
id_gpucodename = '$gpucodename', id_gpucoolingsystem = '$gpucoolingsystem', 
id_gpuinterface = '$gpuinterface', id_gpumemorybus = '$gpumemorybus', 
id_gpumemorycapacity = '$gpumemorycapacity', id_gpunumberofslots = '$gpunumberofslots', 
id_gpuseries = '$gpuseries', id_gputypeofmemory = '$gputypeofmemory', 
id_gputypeofstand = '$gputypeofstand', videomemory_frequency = '$videomemoryfrequency' 
WHERE id_products = $id");
header("Location: ../videocards.php")
?>