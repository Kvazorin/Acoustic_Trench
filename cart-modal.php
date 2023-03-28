<div class="modal-body">
    <?php $products = get_products(); ?>

    <?php if (!empty($_SESSION['cart'])) : ?>
        <table class="table">
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
                <?php endforeach; ?>

                <tr>
                    <td colspan="4" align="right">Товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                        <br> На сумму: <?= number_format($_SESSION['cart.sum'], 0, '', ' ')  ?> руб.
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p>Корзина пуста</p>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-close_cart" data-dismiss="modal">Закрыть</button>
    <?php if (!empty($_SESSION['cart'])) : ?>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
        <button type="button" class="btn btn-check_out"><a href="order.php">Оформить заказ</a></button>
    <?php endif; ?>
</div>