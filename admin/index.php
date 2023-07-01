<?php
session_start();
include ('../handlers/connect.php');
?>
<!doctype html>
<html class="no-js" lang="ru">
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
  <main>
    <div class="container">
      <div class="category">
        <div class="flex jcsb">
              <a class="main__block black" href="">
                  <p class="img"><img src="../img/keyboard.png" alt=""></p>
                  <p>Клавиатуры</p>
              </a>
          <a class="main__block black" href="">
                <p><img class="img" src="../img/pc.png" alt=""></p>
                <p>Корпусы</p>
          </a>
          <a class="main__block black" href="">
                <p class="img"><img class="img" src="../img/headphones.png" alt=""></p>
                <p>Наушники</p>
          </a>
        </div>
        <div class="flex jcsb">
          <a class="black" href="">
            <div class="secondary__block">
              <p class="img"><img src="../img/drive.png" alt=""></p>
              <p>Накопители</p>
            </div>
          </a>
          <a class="black" href="">
            <div class="secondary__block">
              <p class="img"><img src="../img/processor.png" alt=""></p>
              <p>Процессоры</p>
            </div>
          </a>
          <a class="black" href="">
            <div class="secondary__block">
              <p class="img"><img src="../img/power-unit.png" alt=""></p>
              <p>Блоки питания</p>
            </div>
          </a>
          <a class="black" href="videocards.php">
            <div class="secondary__block">
              <p class="img"><img src="../img/videocard.png" alt=""></p>
              <p>Видеокарты</p>
            </div>
          </a>
          <a class="black" href="">
            <div class="secondary__block">
              <p class="img"><img src="../img/mother-board.png" alt=""></p>
              <p>Материнские платы</p>
            </div>
          </a>
          <a class="black" href="">
            <div class="secondary__block">
              <p class="img"><img src="../img/RAM.png" alt=""></p>
              <p>Оперативная память </p>
            </div>
          </a>
        </div>
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
            <a class="social__item" href="https://vk.com/feed"><img src="../img/logo-vk.png" alt=""></a>
            <a class="social__item" href="https://www.youtube.com/"><img src="../img/logo-youtube.png" alt=""></a>
          </div>
        </div>
      </div>
      <p class="center">&copy; 2023 Gamer Moment. Все права защищены.</p>
    </div>
  </footer>
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
