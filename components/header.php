<?php ?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <?php if ($url == "/") {
                    $class_name = "active";
                } else {
                    $class_name = "";
                } ?>
                <li class="nav-item <?php echo $class_name; ?>">
                    <a class="nav-link" href="index.php">Главная</a>
                </li>
                <?php if ($url == "/catalog.php") {
                    $class_name = "active";
                } else {
                    $class_name = "";
                } ?>
                <li class="nav-item <?php echo $class_name; ?>">
                    <a class="nav-link" href="catalog.php">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Гитарное оборудование</a>
                </li>
                <?php if ($url == "/account.php") {
                    $class_name = "active";
                } else {
                    $class_name = "";
                } ?>
                <li class="nav-item <?php echo $class_name; ?>">
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
                <button class="btn search-btn">Найти</button>
            </form>
        </div>
    </div>
</nav>