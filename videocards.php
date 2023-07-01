<?php
session_start();
require_once 'handlers/connect.php';
include 'handlers/characteristics.php';
$sql = "Select * from products";
$result = mysqli_query($link, $sql);
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
    <p>Каталог > Видеокарты</p>
    <div class="flex jcsb">
        <div class="filter">
            <p>Все категории</p>
            <ul>
                <a href=""><li>Корпусы</li></a>
                <a href=""><li>Наушники</li></a>
                <a href=""><li>Накопители</li></a>
                <a href=""><li>Процессоры</li></a>
                <a href=""><li>Блоки питания</li></a>
                <a href=""><li>Материнские платы</li></a>
                <a href=""><li>Видеокарты</li></a>
                <a href=""><li>Оперативная память</li></a>  
            </ul>
        </div>
        <div class="catalog__block">
            <? foreach ($result as $id): ?>
              <?php
                $product = mysqli_query($link, "SELECT videocards.name, brand.name as brand, videomemory_frequency , gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id WHERE id_products = $id[id];");
                foreach ($product as $item){
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
              ?>  
            <div class="catalog__item flex ">
                <a class="flex vertalign" href="product.php?id=<?=$id['id']?>"><img class="catalog__img" src="<?=$id['photo']?>" alt="">
                <div class="jcsb flex">
                    <div class="catalog__firstblock ">
                        <p class="catalog__title"><?=$id['name']?></p></a>
                        <p class="catalog__description grey"><?=$gpuinterface?> <?=$gpumemorycapacity?> <?=$gputypeofmemory?> <?=$gpumemorybus?>бит GPU <?=$videomemoryfrequency?> МГц</p>
                    </div>
                    <div class="catalog__secondblock flex jcsb">
                        <p class="item__price"><?=$id['price']?>₽</p>
                        <a class="cart__btn" href="cart.php?id=<?= $id['id'] ?>">
                          <p>В корзину</p>
                        </a>
                    </div>
                    <div class="catalog__thirdblock flex jcsb">
                        <p>В наличии</p>
                        <p><img class="icon" src="img/heart.png" alt=""></p>
                    </div>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </div>
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