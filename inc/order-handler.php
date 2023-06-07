<?php

session_start();
require_once 'db.php';
require_once 'funcs.php';
require('../components/header.php');

// Check on POST-request
if ($_SERVER['REQUEST_METHOD'] === 'POST')


$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$phone_number = htmlspecialchars($_POST['phone_number']);

// Defining items in cart
foreach ($_SESSION['cart'] as $id => $item) {
    $product_id = $id;
    $product_price = $item['price'];
    $product_quantity = $item['qty'];

    // Preparing SQL-request
    $sql = "INSERT INTO orders (username, email, phone_number, id_product, price, quantity) 
                VALUES (:username, :email, :phone_number, :id_product, :price, :quantity)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':id_product', $product_id);
    $stmt->bindParam(':price', $product_price);
    $stmt->bindParam(':quantity', $product_quantity);

    // Executing request
    $stmt->execute();
}


echo '
    <div class="wrapper mt-5">
        <div class="container">
            <h3 style="text-align: center;">Ваш заказ принят! </h3>
        </div>
    </div>
';



session_destroy();
header("refresh:2; url=../index.php");
