<?php
session_start();
require_once 'handlers/connect.php';
include 'handlers/cart.php';
if($_SESSION['username']==null)
              {
                header('Location: login.php');
              }
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
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
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
            <a href=""><img class="search__img" src="img/search.png" alt=""></a>
          </form>  
            <div class="flex nav__btns">
            <a href="favorite.php"><img src="img/heart.png" alt=""><p>Избранное</p></a>
            <a href="cart.php"><img src="img/cart.png" alt=""><p>Корзина</p></a>
            <?php
              if($_SESSION['username']==null)
              {
                echo '<a href="login.php"><img src="img/profile.png" alt=""><p>Войти</p></a>';
              }
              else
              {
                echo '<a class="profile__icon" href="profile.php"><img  src="img/profile.png" alt=""></a>';
              }
              ?>
            </div>
            </div>
            </nav>
        </div>
    </header>
    <main class="container">
        <h1>Корзина</h1>
        <div class="flex jcsb">
          <div>

          <?if ($_SESSION['cart']!=null):?> 
            <?foreach($temp as $key => $id):?>
            <?$product = mysqli_query($link, "SELECT products.photo, products.price, products.name as title, videocards.name, brand.name as brand, videomemory_frequency , gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id INNER JOIN products on products.id = id_products WHERE id_products = $key;");?>
            <?foreach($product as $item):?>  
              <?php
                $count=$count+1;
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
              ?>  
            <div class="cart__item flex jcsa vertalign">
                <a href=""><img class="cart__img" src="<?=$photo?>" alt="">
                <div class="cart__name">
                    <p><?=$title?>  <?=$brand?> <?=$gpumemorycapacity?> (<?=$name?>)</p></a> 
                    <p class="cart__description grey"><?=$gpuinterface?> <?=$gpumemorycapacity?> <?=$gputypeofmemory?> <?=$gpumemorybus?>бит GPU <?=$videomemoryfrequency?> МГц</p>
                </div>
                <div class="cart__number flex jcsb">
                    <p><a href="handlers/cartminus.php?id=<?=$key?>">-</a></p>
                    <p><?=$id?></p>
                    <p><a href="handlers/cartplus.php?id=<?=$key?>">+</a></p>
                </div>  
                <p><?=$pricecount[$key]=$item['price']*$id?>₽</p>
                <a href="favorite.php?id=<?=$key?>"><img class="icon" src="img/heart.png" alt=""></a>
                <a href="handlers/cartdel.php?id=<?=$key?>"><img class="icon" src="img/cross.png" alt=""></a>   
            </div>
            <?endforeach;?>
            
            <?endforeach;?>
            
            
            </div>
            <div class="order__block">
                <p>Итого</p>
                <div class="flex jcsb order__price">
                    <p><?=$count?> товар</p>
                    <p><?=array_sum($pricecount)?>₽</p>
                </div>
                <a class="order__btn" href="ordering.php">Оформить заказ</a>
                <p class="order__tinytext">Нажимая на кнопку "Оформить заказ", Вы соглашаетесь с условиями оферты и политики конфиденциальности</p>
            </div>
            <?endif?>
            
        </div>
        <?if($_SESSION['cart']==null):?>
              <div class="empty__cart">
                <p><img src="img/emptycart.png" alt=""></p>
                <p>В корзине пока ничего нет</p>
                <p>Воспользуйтесь поиском, чтобы найти всё, что нужно</p>
                <a class="empty__cartbtn" href="index.php">Перейти в каталог</a>
              </div>
            <?endif?>
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
                    <a class="social__item" href="https://vk.com/feed"><img src="img/logo-vk.png" alt=""></a>
                    <a class="social__item" href="https://www.youtube.com/"><img src="img/logo-youtube.png" alt=""></a>
                </div>
                </div>
            </div>
            <p class="center">&copy; 2023 Gamer Moment. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>