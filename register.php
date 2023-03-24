<?php
error_reporting(-1);
session_start();
include('inc/db.php');
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

    <title>Регистрация</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon.png">
</head>

<body style="background-color: #d4a6ff;">
    <main>
        <div class="mt-5">
            <div class="container">
                <?php
                if (isset($_POST['register'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    $query = $pdo->prepare("SELECT * FROM users WHERE email=:email");
                    $query->bindParam("email", $email, PDO::PARAM_STR);
                    $query->execute();
                    if ($query->rowCount() > 0) {
                        echo '<p class="sign-up_form mb-3">Этот адрес уже зарегистрирован!</p>';
                    }
                    if ($query->rowCount() == 0) {
                        $query = $pdo->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
                        $query->bindParam("username", $username, PDO::PARAM_STR);
                        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                        $query->bindParam("email", $email, PDO::PARAM_STR);
                        $result = $query->execute();
                        if ($result) {
                            echo '<p class="sign-up_form mb-3">Регистрация прошла успешно!</p>
                            <p class= "sign-up_form mb-3"> Вы будете перенаправлены на страницу авторизации. </p>';
                            header("refresh:3; url=login.php");
                        } else {
                            echo '<p class="sign-up_form mb-3">Неверные данные!</p>';
                        }
                    }
                }
                ?>
                <h3 class="sign-up_form mb-4">Регистрация</h3>
                <form class="sign-up_form" method="post" action="" name="signup-form">
                    <div class="form-element">
                        <label>Имя пользователя</label>
                        <input placeholder="Введите имя" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                    </div>
                    <div class="form-element">
                        <label>Email</label>
                        <input placeholder="Email" type="email" name="email" required />
                    </div>
                    <div class="form-element">
                        <label>Пароль</label>
                        <input placeholder="Введите пароль" type="password" name="password" required />
                    </div>
                    <ul class="form__link-list">
                        <li class="list__item">
                            <a href="login.php">Авторизация</a>
                        </li>
                        <li class="list__item">
                            <a href="index.php">На Главную</a>
                        </li>
                    </ul>
                    <button class="btn" type="submit" name="register" value="register">Отправить</button>

                </form>
            </div><!-- /container -->
        </div><!-- /wrapper -->
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>