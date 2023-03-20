<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
$products = get_products();
require('components/header.php');
?>
<title>Каталог</title>

<div class="container">
    <h1 class="mt-5">Каталог</h1>
    <div class="row mt-5 row_space-between">
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
                            <a href="product.php?slug=<?= $product['slug'] ?>"> <img src="img/<?= $product['img'] ?>" alt="<?= $product['title'] ?>"></a>
                        </div>
                        <div class="card-caption">
                            <div class="card-title mb-4">
                                <a href="product.php?slug=<?= $product['slug'] ?>"><?= $product['title'] ?></a>
                            </div>
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
<?php
require('components/footer.php');
