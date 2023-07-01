<?php
    session_start();
    require_once 'handlers/connect.php';
    include 'handlers/load.php';
    $sql = "Select * from products";
    $user = $_SESSION['username'];
    $result = mysqli_query($link, $sql);
    $orders = mysqli_query($link, "Select * from orders where user = $user");
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
    <main class="container flex jcsb">
        <div class="profile__nav">
            <div class="profile__info flex"> 
                <img class="profile__img" src="img/profile.png" alt="">
                <div class="profile__text">
                    <p><?=$_SESSION['username']?></p>
                    <p><?=$_SESSION['email']?></p>
                </div>
            </div>
            <p><a href="#orders">Заказы</a></p>
            <p><a href="#userdata">Личные данные</a></p>
            <p><a href="handlers/logout.php">Выйти</a></p>
        </div>
        <div>
            <h2 id="orders">Заказы</h2>
            <div class="profile__orderblock">

            
            <?foreach($orders as $order):?>
            
            <?$id=$order['id'];$orderitem = mysqli_query($link, "Select * from orders_products where orders_id = $id")?>
            <?foreach($orderitem as $item):?>
            <?$idproducts=$item['products_id'];$products = mysqli_query($link, "Select * from products where id=$idproducts")?>
            <?foreach($products as $product):?>
                <?php
                $producte = mysqli_query($link, "SELECT products.photo, products.price, products.name as title, videocards.name, brand.name as brand, videomemory_frequency , gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id INNER JOIN products on products.id = id_products WHERE id_products = $idproducts;");
                foreach ($producte as $iteme){
                  $title = $iteme['title'];
                  $price = $iteme['price'];
                  $photo = $iteme['photo'];  
                $name = $iteme['name'];
                $brand = $iteme['brand'];
                $gpubrand = $iteme['gpubrand'];
                $gpucodename = $iteme['gpucodename'];
                $gpucoolingsystem = $iteme['gpucoolingsystem'];
                $gpuinterface = $iteme['gpuinterface'];
                $gpumemorybus = $iteme['gpumemorybus'];
                $gpumemorycapacity = $iteme['gpumemorycapacity'];
                $gpunumberofslots = $iteme['gpunumberofslots'];
                $gpuseries = $iteme['gpuseries'];
                $gputypeofmemory = $iteme['gputypeofmemory'];
                $gputypeofstand = $iteme['gputypeofstand'];
                $videomemoryfrequency = $iteme['videomemory_frequency'];
                }
                    ?>
            <div class="order__item flex jcsb vertalign">
                <div class="flex ">
                <img class="cart__img" src="<?=$product['photo']?>" alt="">
                <div class="product__name">
                    <p><?=$product['name']?></p>
                    <p class="cart__description grey"><?=$gpuinterface?> <?=$gpumemorycapacity?> 
                    <?=$gputypeofmemory?> <?=$gpumemorybus?>бит GPU <?=$videomemoryfrequency?> МГц</p>
                </div>
                </div>
                <div class="profile__price">
                <p><?=$allprice = $product['price']*$item['quantity']?>₽</p>
                <p><?=$item['quantity']?> шт x <?=$product['price']?></p>
                </div>
            </div>
            <?$count=$count+$allprice?>
            <?endforeach;?>
            <?endforeach;?>
            <div class="profile__orders">
                <div class="profile__orders__firstblock flex jcsb">
                    <div class="">
                        <div class="flex">
                            <p>Заказ от <?=$order['date']?></p>
                            <p>Статус: Завершен</p>
                        </div>
                        <p>Адрес доставки:екб крутая улица</p>
                    </div>
                    <div>
                        <p class="flex vertalign">Итого: <?=$count?>₽</p>
                        <?$count=0;?>
                    </div>
                </div>
            </div>
            <?endforeach;?>
            </div>
            <h1 id="userdata">Личные данные</h1>
            <form action="handlers/userdata.php">
                <div class="userdata__block">
                    <div class="flex jcsb">
                        <div class="userdata__input">
                            <p>Ваше имя</p>
                            <input type="text" name="name" value="<?=$_SESSION['name']?>">
                            <p>Ваша почта</p>
                            <input type="text" name="email" value="<?=$_SESSION['email']?>">
                        </div>
                        <div class="userdata__input">
                            <p>Ваша фамилия</p>
                            <input type="text" name="surname" value="<?=$_SESSION['surname']?>">
                            <p>Номер телефона</p>
                            <input type="text" name="phone" value="<?=$_SESSION['phone']?>">
                            
                        </div>
                    </div>
                    <button class="userdata__btn">Сохранить изменения</button>
                </div>
            </form>
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