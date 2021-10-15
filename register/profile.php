<?php

session_start();

if (!$_SESSION['user']) {
    header('Location: index_register.php');
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация и регистрация</title>
        <link rel="stylesheet" href="assets/register_style.css">
    </head>
    <body>

        <!-- Профиль -->

        <form>
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="../index.php" class="return">Вернуться в главное меню</a>
            <a href="vendor/logout.php" class="logout">Выход</a>
        </form>

    </body>
</html>