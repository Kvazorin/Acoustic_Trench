<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$products = get_products();
require('components/header.php');
?>
<title>Главная</title>

<main>
    <!-- Main slider -->
    <div class="slider-container">
        <div class="slider">
            <div class="slider-item">
                <img src="img/slider-item1.jpg" alt="slider-item(1)">
            </div>
            <div class="slider-item">
                <img src="img/slider-item2.jpg" alt="slider-item(2)">
            </div>
            <div class="slider-item">
                <img src="img/slider-item3.jpg" alt="slider-item(3)">
            </div>
        </div>
        <div class="slider-nav">
            <div class="slick-next"></div>
            <div class="slick-prev"></div>
        </div>
    </div>

    <div class="container">
        <section class="hits">
            <h2 class="mt-4 mb-3">Хиты продаж</h2>
            <div class="slider-small">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['hit']) : ?>
                            <div class="product-card ml-4">
                                <div class="offer">
                                    <?php if ($product['hit']) : ?>
                                        <div class="offer-hit">Hit</div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-thumb">
                                    <a href="product.php?slug=<?= $product['slug'] ?>"><img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                                </div>
                                <div class="card-caption">
                                    <div class="card-title mb-0">
                                        <a href="product.php?slug=<?= $product['slug'] ?>"><?= $product['title'] ?></a>
                                    </div>
                                    <br>
                                    <div class="card-price text-left">
                                        <?php if ($product['old_price']) : ?>
                                            <del><?= number_format($product['old_price'], 0, '', ' ') ?></del>
                                        <?php endif; ?>
                                        <?= number_format($product['price'], 0, '', ' ') ?> руб.
                                    </div>
                                    <a href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-block add-to-cart" data-id="<?= $product['id'] ?>">
                                        Добавить в корзину
                                    </a>
                                    <div class="item-status"><i class="fas fa-check"></i> В наличии</div>
                                </div>
                            </div><!-- /product-card -->
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- hits-slider -->
        </section>

        <section class="sales">
            <h2 class="mt-4 mb-3">Скидки</h2>
            <div class="slider-small">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $product) : ?>
                        <?php if ($product['sale']) : ?>
                            <div class="product-card">
                                <div class="offer">
                                    <?php if ($product['sale']) : ?>
                                        <div class="offer-sale">Sale</div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-thumb">
                                    <a href="product.php?slug=<?= $product['slug'] ?>"><img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                                </div>
                                <div class="card-caption">
                                    <div class="card-title mb-0">
                                        <a href="product.php?slug=<?= $product['slug'] ?>"><?= $product['title'] ?></a>
                                    </div>
                                    <br>
                                    <div class="card-price text-left">
                                        <?php if ($product['old_price']) : ?>
                                            <del><?= number_format($product['old_price'], 0, '', ' ') ?></del>
                                        <?php endif; ?>
                                        <?= number_format($product['price'], 0, '', ' ') ?> руб.
                                    </div>
                                    <a href="?cart=add&id=<?= $product['id'] ?>" class="btn btn-block add-to-cart" data-id="<?= $product['id'] ?>">
                                        Добавить в корзину
                                    </a>
                                    <div class="item-status"><i class="fas fa-check"></i> В наличии</div>
                                </div>
                            </div><!-- /product-card -->
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div><!-- sales-slider -->
        </section>
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

    <?php
    require('components/footer.php');
