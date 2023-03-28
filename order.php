<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
require('components/header.php');
?>
<title>Оформление заказа</title>


<div class="container">
    <section class="order-checkout">

        <h3 class="mt-4 mb-3">Содержимое корзины</h3>

        <table class="table order-checkout__table">
            <thead>
                <tr>
                    <th scope="col">Товар</th>
                    <th scope="col"></th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Кол-во</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                    <tr>
                        <td><a href="product.php?slug=<?= $item['slug'] ?>"><img src="img/<?= $item['img'] ?>" alt="<?= $item['title'] ?>"></a></td>
                        <td><a href="product.php?slug=<?= $item['slug'] ?>"><?= $item['title'] ?></a></td>
                        <td><?= number_format($item['price'], 0, '', ' ') ?></td>
                        <td><?= $item['qty'] ?></td>
                    </tr>
                <?php endforeach;
                ?>

                <tr>
                    <td colspan="4" align="right">Товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                        <br> На сумму: <?= number_format($_SESSION['cart.sum'], 0, '', ' ')  ?> руб.
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 class="mt-4 mb-3">Оформление заказа</h2>

        <div class="flex__container">
            <div class="flex__item-1">
                <form method="POST" class="checkout__form" action="inc/order-handler.php">
                    <input type="text" name="username" placeholder="Имя" pattern="[a-zA-Z0-9]+" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="tel" name="phone_number" placeholder="Телефон" required>
                    <button type="submit" name="submit_order" class="btn btn-check_out">Отправить заказ</button>
                </form>
            </div>
        </div>

    </section>
</div>

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
