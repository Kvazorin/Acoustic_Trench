<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$products = get_products();
?>
<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Каталог - Гитары</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon.png">
</head>

<body>

    <main>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Главная</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Гитары</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Гитарное оборудование</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account.php">Аккаунт</a>
                        </li>
                        <li class="nav-item">
                            <button id="get-cart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-modal">
                                Корзина <span class="badge badge-light mini-cart-qty"><?= $_SESSION['cart.qty'] ?? 0 ?></span>
                            </button>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn search-btn" type="submit">Найти</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">
            <h1 class="mt-5">Каталог</h1>
            <div class="row mt-5">
                <div class="product-cards mb-5">
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="product-card">
                                <div class="offer">
                                    <?php if ($product['hit']) : ?>
                                        <div class="offer-hit">Hit</div>
                                    <?php endif; ?>
                                    <?php if ($product['sale']) : ?>
                                        <div class="offer-sale">Sale</div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-thumb">
                                    <a href="/<?= $product['slug'] ?>"><img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                                </div>
                                <div class="card-caption">
                                    <div class="card-title">
                                        <a href="/<?= $product['slug'] ?>"><?= $product['title'] ?></a>
                                    </div>
                                    <div class="card-price text-left">
                                        <?php if ($product['old_price']) : ?>
                                            <del><?= $product['old_price'] ?> руб.</del>
                                        <?php endif; ?>
                                        <?= number_format($product['price'], 0, '', ' ') ?> руб.
                                    </div>
                                    <a href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-block add-to-cart" data-id="<?= $product['id'] ?>">
                                        Добавить в корзину
                                    </a>
                                    <div class="item-status"><i class="fas fa-check"></i> В наличии</div>
                                </div>
                            </div><!-- /product-card -->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div><!-- /product-cards -->
            </div><!-- /row -->
            
            <div class="row">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item page-item_active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div><!-- /row -->
        </div><!-- /container -->
        <!-- Modal -->
        <div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-cart-content">
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer_main">
            <div class="container">
                <div class="footer_inner mt-5">
                    <div class="footer__item">
                        <a href="#"><img src="img/footer_logo.png" alt="footer_logo" class="footer__logo"></a>
                    </div>
                    <div class="footer__item">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <a class="nav__link" href="index.php">Главная</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__link" href="#">Гитары</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__link" href="#">Гитарное оборудование</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <a class="nav__link" href="#">Партнерам</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__link" href="#">О компании</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__link" href="#">Обратная связь</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__item">
                        <ul class="footer__nav">
                            <li class="nav__item">
                                <a class="nav__link" href="#">Возврат товара</a>
                            </li>
                            <li class="nav__item">
                                <a class="nav__link" href="#">Пользовательское соглашение</a>
                            </li>
                            <li class="nav__item">
                                <div class="footer_social-icons">
                                    <i class="fab fa-telegram"></i>
                                    <i class="fab fa-whatsapp"></i>
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="copyright mt-5">
                    <p class="copyright__text">All rights reserved© 2023</p>
                </div>
            </div>

        </footer>
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>