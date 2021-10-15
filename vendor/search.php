<?php

require_once '../config/connect.php';

if (isset($_POST['submit'])) {
    echo "<h3>" . "Сотрудники подходящие поиску:" . "</h3>";
    if (isset($_GET['go'])) {
        if (preg_match("/^[  а-яА-Яa-zA-Z]+/", $_POST['name'])) {
            $name = $_POST['name'];
            $sql = "SELECT  `id`, `ФИО` FROM `employees` WHERE `ФИО` LIKE '%" . $name . "%'";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $fio = $row['ФИО'];
                $id = $row['id'];
                echo "<ul>";
                echo "<li>" . "<a  href='employee.php?id=$id'>$fio</a></li>";
                echo "</ul>";
            }
        } else {
            echo "<p> Пожалуйста, введите поисковый запрос </p>";
        }
    }
    echo "<a href='../index.php'>Вернуться</a>";
}
?>