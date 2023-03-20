<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
require('components/header.php');
$info_product = info_product();
?>
<title>Карточка товара</title>

<div class="container">

    <!-- Product card -->
    <div class="row mb-6">
        <?php if (!empty($info_product)) : ?>
            <?php foreach ($info_product as $product) : ?>
                <div class="col-12"> <!-- Card title -->
                    <h1 class="mt-5"><?= $product['title'] ?></h1>
                </div>

                <div class="col-sm-4 card-image_flex-card"> <!-- Card image -->
                    <div class="offer">
                        <?php if ($product['hit']) :
                        ?>
                            <div class="offer-hit">Hit</div>
                        <?php endif;
                        ?>
                        <?php if ($product['sale']) :
                        ?>
                            <div class="offer-sale">Sale</div>
                        <?php endif;
                        ?>
                    </div>
                    <div class="product-item-thumb d-flex justify-content-center">
                        <img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>">
                    </div>
                </div>

                <div class="col-sm-8 product-price_flex-card"> <!-- Product price & description -->
                    <div class="row row_space-between">
                        <div class="col-md-auto">
                            <div class="card-price_lrg">
                                <?php if ($product['old_price']) : ?>
                                    <p>
                                        <del class="del-top"><?= number_format($product['old_price'], 0, '', ' ') ?></del>
                                    <?php endif; ?>
                                    <?= number_format($product['price'], 0, '', ' ') ?> руб.
                                    </p>
                            </div>
                            <div class="item-status"><i class="fas fa-check"></i> В наличии</div>
                        </div>
                        <div class="col-md-auto">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="qty" value="1" class="form-control form-control_padding h-auto">
                                    <div class="input-group-append">
                                        <a href="?cart=add&id=<?= $product['id'] ?>" class="add-to-cart btn mb-0" data-id="<?= $product['id'] ?>">
                                            Добавить в корзину
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="card-desc">
                        <p><?= $product['content'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
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

<?php
require('components/footer.php');
