<?php
require_once '../config/connect.php';

$employee_id = $_GET['id'];
$employee = mysqli_query($con, "SELECT * FROM `employees` WHERE `id` = '$employee_id'");
$employee = mysqli_fetch_assoc($employee);

$comments = mysqli_query($con, "SELECT * FROM `comments` WHERE `employee_id` = '$employee_id'");
$comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html>
    <head>
        <title>Сотрудник</title>
    </head>
    <body>
        <h2>Сотрудник: <?= $employee['ФИО'] ?></h2>
        <h4>Должность: <?= $employee['Должность'] ?></h4>
        <h4>Табельный номер: <?= $employee['Табельный номер'] ?></h4>

        <form action="create_comment.php" method="post">
            <input type="hidden" name="id" value="<?= $employee['id'] ?>">
            <textarea name="body"></textarea>
            <button type="submit">Добавить комментарий</button>
        </form>

        <h3>Комментарии</h3>
        <ul>
            <?php
            foreach ($comments as $comment) {
                ?>
                <li><?= $comment[2] ?></li>
                <?php
            }
            ?>
        </ul>
        <a href="../index.php">Вернуться</a>
    </body>
</html>
