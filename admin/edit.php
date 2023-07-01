<?php
session_start();
require_once "../handlers/connect.php";
include "handlers/product.php";
$id = $_GET['id'];
$sql = "Select * from products WHERE id = $id";
$result = mysqli_query($link, $sql);
$category = mysqli_query($link, 'Select category.name from products inner join category ON id_category=category.id WHERE products.id = 2');
$sameproducts = mysqli_query($link, 'Select * from products WHERE id_category = 7');
$num_rows = mysqli_num_rows($sameproducts)-5;
$vop = mysqli_query($link, "Select * from products where id>$num_rows and id_category = 7");
$product = mysqli_query($link, "SELECT products.photo, products.price, products.name as title, videocards.name, brand.name as brand, videomemory_frequency , gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id INNER JOIN products on products.id = id_products WHERE id_products = $id;");
            foreach ($product as $item){
              $title = $item['title'];
              $price = $item['price'];
              $photo = $item['photo'];  
            $name = $item['name'];
            $brand = $item['brand'];
            $gpubrand = $item['gpubrand'];
            $gpucodename = $item['gpucodename'];
            $gpucoolingsystem = $item['gpucoolingsystem'];
            $gpuinterface = $item['gpuinterface'];
            $gpumemorybus = $item['gpumemorybus'];
            $gpumemorycapacity = $item['gpumemorycapacity'];
            $gpunumberofslots = $item['gpunumberofslots'];
            $gpuseries = $item['gpuseries'];
            $gputypeofmemory = $item['gputypeofmemory'];
            $gputypeofstand = $item['gputypeofstand'];
            $videomemoryfrequency = $item['videomemory_frequency'];
            }
foreach ($category as $categories){$category = $categories['name'];}
$product = mysqli_query($link, "SELECT * FROM $category WHERE id_products = $id");

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
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <meta name="theme-color" content="#fafafa">
</head>
<body>
<header>
<div class="header vertalign container flex jcsb">
        <a class="logo" href="index.php">
          <p class="gamer">Gamer</p>
          <p>Moment</p>
        </a>
            <nav class="vertalign flex">
            <form action="search.php" class="search__block">
            <input class="search" type="search" name="search" placeholder="Поиск">
            <a href=""><img class="search__img" src="../img/search.png" alt=""></a>
          </form>  
            <div class="flex nav__btns">

              <a class="profile__icon" href="handlers/logout.php"><img  src="../img/exit.png" alt=""></a>
            </div>
            </div>
            </nav>
        </div>
  </header>
  <main class="container">
    <form action="handlers/edit.php">

    
  <? if ($gpubrand==null){echo '<h1>Упс!!! Этого товара нет!!!';} ?>
  <? foreach ($product as $veg): ?>
  <? foreach ($result as $vag): ?>
    <div class="product__block">
    <p><label for="">Видеокарта</label>
    <input type="text" name="id" hidden value="<?=$id?>">
        <input type="text" name="name" value="<?=$title?>"></p>
        <label for="">Цена:</label>
        
        <input type="text" name="price" value="<?=$vag['price']?>">
        <button>Изменить</button>
        <div class="flex jcsb">
        
            <div class="product__photo">
                <p><img src="../<?=$vag['photo']?>" alt=""></p>
            </div>
            
            <div class="product__sales">
              <div class="flex jcsb">
              </div>
            </div>
        </div>
    </div>   
    <div class="characteristics__block">
      <h2>Характеристики</h2>
      <div>
      <div class="flex jcsb">
              <div class="characteristics__item">
                <h3>Основные</h3>
                <div class="characteristics__span flex jcsb">
                  <span>Производитель</span>
                  
                  <select name="brand"  id="">
                  
                    <?foreach($sql=mysqli_query($link, "Select * from brand") as $item):?>
                    <?if($brand==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($brand!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                </select>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Код производителя</span>
                  <input name="gpuname" value="<?=$name?>">
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Интерфейс</span>
                  <select name="gpuinterface"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_interface") as $item):?>
                    <?if($gpuinterface==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpuinterface!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Производитель процессора</span>
                  <select name="gpubrand"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_brand") as $item):?>
                    <?if($gpubrand==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpubrand!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Серия</span>
                  <select name="gpuseries"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_series") as $item):?>
                    <?if($gpuseries==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpuseries!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                <h3>Память</h3>
                <div class="characteristics__span flex jcsb">
                  <span>Объём памяти</span>
                  <select name="gpumemorycapacity"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_memory_capacity") as $item):?>
                    <?if($gpumemorycapacity==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpumemorycapacity!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Тип памяти</span>
                  <select name="gputypeofmemory"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_typeofmemory") as $item):?>
                    <?if($gputypeofmemory==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gputypeofmemory!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Шина памяти(разрядность)</span>
                  <select name="gpumemorybus"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_memorybus") as $item):?>
                    <?if($gpumemorybus==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpumemorybus!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                
                </div>
                <div class="characteristics__item">
                  <h3>Видеопроцессор</h3>
                  <div class="characteristics__span flex jcsb">
                    <span>Кодовое название графического процессора</span>
                    <select name="gpucodename"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_codename") as $item):?>
                    <?if($gpucodename==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpucodename!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                  </div>
                  <div class="characteristics__span flex jcsb">
                    <span>Частота графического процессора</span>
                    <input name="videomemoryfrequency" value="<?=$videomemoryfrequency?>">
                  </div>
                  <h3>Конструкция</h3>
                  <div class="characteristics__span flex jcsb">
                    <span>Количество занимаемых слотов</span>
                    <select name="gpunumberofslots"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_numberofslots") as $item):?>
                    <?if($gpunumberofslots==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpunumberofslots!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                  </div>
                  <div class="characteristics__span flex jcsb">
                    <span>Система охлаждения</span>
                    <select name="gpucoolingsystem"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_cooling_system") as $item):?>
                    <?if($gpucoolingsystem==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gpucoolingsystem!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                  </div>
                  <h3>Дополнительно</h3>
                <div class="characteristics__span flex jcsb">
                  <span>Тип поставки</span>
                  <select name="gputypeofstand"  id="">
                  <?foreach($sql=mysqli_query($link, "Select * from gpu_typeofstand") as $item):?>
                    <?if($gputypeofstand==$item['name']):?>
                    <option selected value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endif?>
                    <?if($gputypeofstand!=$item['name']):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>    
                    <?endif?>
                    <?endforeach;?>
                    </select>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Гарантия</span>
                  <span>24 мес.</span>
                </div>
                </div>

            </div>
      </div>
    </div>
    <? endforeach?>
    <? endforeach?>
    </form>
  </main>
  <footer>
    <div class="container footer jcsb">
      <div class="flex jcsb">
        <div>
          <p class="footer__header">Компания</p>
          <p><a class="grey" href="">О компании</a></p>
          <p><a class="grey" href="">Отзывы о магазине</a></p>
          <p><a class="grey" href="">Обратная связь</a></p>
          <p><a class="grey" href="">Персональные данные</a></p>
        </div>
        <div>
          <p class="footer__header">Покупателям</p>
          <p><a class="grey" href="">Статус заказа</a></p>
          <p><a class="grey" href="">Гарантия и возврат</a></p>
          <p><a class="grey" href="">Доставка и самовывоз</a></p>
          <p><a class="grey" href="">Подарочные карты</a></p>
        </div>
        <div>
          <p class="footer__header">Информация</p>
          <p><a class="grey" href="">Адреса магазинов</a></p>
          <p><a class="grey" href="">Кредит</a></p>
          <p><a class="grey" href="">Контакты</a></p>
          <p><a class="grey" href="">Способы оплаты</a></p>
        </div>
        <div>
          <p class="number">+7 902 380 76 88</p>
          <div class="flex">
            <a class="social__item" href="https://vk.com/feed"><img src="../img/logo-vk.png" alt=""></a>
            <a class="social__item" href="https://www.youtube.com/"><img src="../img/logo-youtube.png" alt=""></a>
          </div>
        </div>
      </div>
      <p class="center">&copy; 2023 Gamer Moment. Все права защищены.</p>
    </div>
  </footer>
</body>
</html>