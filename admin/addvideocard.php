<?php
require_once "../handlers/connect.php"
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
        <h1>Добавление шаг 2: укажите характеристики</h1>
        <form action="handlers/add.php?">
            <p>
                <label for="">Название видеокарты:</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="">Заводское название видеокарты:</label>
                <input type="text" name="gpuname">
            </p>
            <p>
                <label for="">Цена (в рублях):</label>
                <input type="text" name="price">
            </p>
            <p>
                <label for="">Фото видеокарты</label>
                <input type="file" name="picture">
            </p>
            <p>
                <label for="">Производитель видеокарты:</label>
                <select name="brand" id="">
                    <?foreach($sql=mysqli_query($link, "Select * from brand") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select></p>
            <p>
                <label for="">Производитель видеопроцессора:</label>
                <select name="gpubrand" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_brand") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select></p>
            </p>
            <p>
                <label for="">Код производителя:</label>
                <select name="gpucodename" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_codename") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Система охлаждения:</label>
                <select name="gpucoolingsystem" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_cooling_system") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Интерфейс:</label>
                <select name="gpuinterface" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_interface") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Шина памяти (разрядность):</label>
                <select name="gpumemorybus" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_memorybus") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Объём памяти:</label>
                <select name="gpumemorycapacity" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_memory_capacity") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Количество слотов:</label>
                <select name="gpunumberofslots" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_numberofslots") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Серия:</label>
                <select name="gpuseries" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_series") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Тип памяти:</label>
                <select name="gputypeofmemory" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_typeofmemory") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Тип поставки:</label>
                <select name="gputypeofstand" id="">
                <?foreach($sql=mysqli_query($link, "Select * from gpu_typeofstand") as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?endforeach;?>
                </select>
            </p>
            <p>
                <label for="">Частота графического процессора:</label>
                <input type="text" name="videomemoryfrequency">
            </p>
            <button>Добавить</button>
        </form>
    </div>
  </main>
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>