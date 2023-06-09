<?php

function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function get_products(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM `products` JOIN `products_status` on products.id_product=products_status.id_product JOIN `products_price` on products.id_product=products_price.id_product");
    return $res->fetchAll();
}

function get_product(int $id): array|false
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products JOIN products_price on products.id_product=products_price.id_product WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function info_product(): array
{
    $slug = $_GET['slug'] ?? null;
    global $pdo;
    $result = $pdo->query("SELECT * FROM `products` JOIN `products_status` on products.id_product=products_status.id_product JOIN `products_price` on products.id_product=products_price.id_product WHERE slug = '$slug'");
    return $result->fetchAll();
}

function add_to_cart($product): void
{
    if (isset($_SESSION['cart'][$product['id_product']])) {
        $_SESSION['cart'][$product['id_product']]['qty'] += 1;
    } else {
        $_SESSION['cart'][$product['id_product']] = [
            'title' => $product['title'],
            'slug' => $product['slug'],
            'price' => $product['price'],
            'qty' => 1,
            'img' => $product['img'],
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}
