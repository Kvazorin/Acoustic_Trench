<?php
$url = $_SERVER["REQUEST_URI"];
?>
<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon.png">
</head>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="https://acoustic-trench.ru"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <?php if ($url == "/") {
                        $class_name = "active";
                    } else {
                        $class_name ="";
                    }?>
                    <li class="nav-item <?php echo $class_name; ?>">
                        <a class="nav-link" href="https://acoustic-trench.ru/">Главная</a>
                    </li>
                    <?php if ($url == "/catalog.php") {
                        $class_name = "active";
                    } else {
                        $class_name ="";
                    }?>
                    <li class="nav-item <?php echo $class_name; ?>">
                        <a class="nav-link" href="https://acoustic-trench.ru/catalog.php">Гитары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Гитарное оборудование</a>
                    </li>
                    <?php if ($url == "/account.php") {
                        $class_name = "active";
                    } else {
                        $class_name ="";
                    }?>
                    <li class="nav-item <?php echo $class_name; ?>">
                        <a class="nav-link" href="https://acoustic-trench.ru/account.php">Аккаунт</a>
                    </li>
                    <li class="nav-item">
                        <button id="get-cart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-modal">
                            Корзина <span class="badge badge-light mini-cart-qty"><?= $_SESSION['cart.qty'] ?? 0 ?></span>
                        </button>
                    </li>
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn search-btn">Найти</button>
                </form>
            </div>
        </div>
    </nav>