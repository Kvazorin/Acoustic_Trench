<?php
error_reporting(-1);
session_start();
require_once __DIR__ . '/inc/db.php';
require_once __DIR__ . '/inc/funcs.php';
require('components/header.php');
?>

<title>Аккаунт</title>

<?php
if (!isset($_SESSION['user_id'])) {
    echo '
        <div class="wrapper mt-5">
            <div class="container">
                <h3 style="text-align: center;">Вам необходимо войти в свой аккаунт! <br> Вы будете перенаправлены на страницу авторизации.</h3>
            </div>
        </div>
        ';
    header("refresh:3; url=login.php");
    exit;
} else {
?>
    <main>
        <div class="wrapper mt-5">
            <div class="container">

                <div class="flex__container">
                    <div class="flex__item-1">
                        <h1>Управление аккаунтом</h1>
                        <h3 class="mt-4 user">
                            <?php echo strval($_SESSION['username']) ?>
                            <a class="logout_link link" style="font-size: 16px;" href="inc/logout.php">Выйти</a>
                        </h3>

                        <table class="table" style="width: 472px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="padding-left: 0;">Платежные данные</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding-left: 0;">Mastercard 64***<i class="fas fa-pen" style="font-size: 14px; margin-left: 5px;"></i></td>
                                    <td>example@email.ru<i class="fas fa-pen" style="font-size: 14px; margin-left: 5px;"></i></td>
                                </tr>
                            </tbody>
                        </table>

                        <h3 class="article user_info__article">Количество совершенных заказов: 25</h3>
                        <h3 class="article user_info__article mb-5">На сумму: 239 000 руб.</h3>
                        <h3 style="font-size: 16px;">Персональные предложения</h3>
                        <button class="btn personal_offers__btn">Посмотреть</button>
                    </div>
                    <div class="flex__item-2">
                        <h1>Фото профиля</h1>
                        <img src="img/profile_photo.png" alt="profile_photo" class="mb-4" style="max-width: 216px;">
                        <a href="#" class="link">Изменить фото профиля<i class="fas fa-pen" style="font-size: 14px; margin-left: 5px;"></i></a>
                    </div>
                </div>

            </div><!-- /container -->
        </div><!-- /wrapper -->

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
    require ('components/footer.php');
} ?>