<?php
    session_start();
    require_once 'handlers/connect.php';
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
        </div>
    </header>    
    <main>
        <div class="container">
            <div class="ordering">
            <form action="handlers/ordering.php">
            <h2>Данные покупателя</h2>
            <div class="customer__details">
                <div class="flex">
                    <label class="label__number" for="">Телефон:</label>
                    <input type="text" placeholder="Телефон" value="<?=$_SESSION['phone']?>">
                    <label class="label__email" for="">Email(Необязательно):</label>
                    <input type="text" placeholder="Email(Необязательно)" value="<?=$_SESSION['email']?>">
                </div>
            </div>
            <h2>Адрес доставки</h2>
            <div class="address__block">
                
                <input type="radio">
                <label for="">Самовывоз по адресу ул. Карла Маркса, 8А</label>
            </div>
            <h2>Способ оплаты</h2>
            <div class="payment__method">
                
                <input type="radio">
                <label for="">При получении</label>
                <button class="ordering__btn" type="submit" name="order__btn">Подтвердить заказ</button>
                <p>Подтверждая заказ, Вы соглашаетесь с условиями политики конфиденциальности и правилами продажи.</p>
            </div>
            
            </form>
            </div> 
        </div>
    </main>
</body>
</html>