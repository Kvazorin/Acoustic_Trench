<?php
session_start();
include('inc/db.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="sign-up_form">Неверные пароль или имя пользователя!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $username;
            header('Location: account.php');
        } else {
            echo '<p class="sign-up_form"> Неверные пароль или имя пользователя!</p>';
        }
    }
}
?>

<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Страница авторизации Acoustic Trench">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Авторизация</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon.png">
</head>

<body style="background-color: #d4a6ff;">

    <main>
        <div class="container">
            <div class="mt-5">
                <h3 class="sign-up_form mb-4">Авторизация</h3>
                <form class="sign-up_form" method="post" action="" name="signin-form">
                    <div class="form-element">
                        <label>Имя пользователя</label><br>
                        <input placeholder="Введите имя" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                    </div>
                    <div class="form-element">
                        <label>Пароль</label> <br>
                        <input placeholder="Введите пароль" type="password" name="password" required />
                    </div>

                    <ul class="form__link-list">
                        <li class="list__item">
                            <a href="register.php">Регистрация</a>
                        </li>
                        <li class="list__item">
                            <a href="index.php">На Главную</a>
                        </li>
                    </ul>

                    <button class="btn" type="submit" name="login" value="login">Войти</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>