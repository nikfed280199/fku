<?php

require_once '../config/connect.php';

$fio = $_POST['fio'];
//print_r($_POST);

$i = 0;

if ($fio) {
    foreach ($_POST as $name => $val) {
        if ($i != 0) {
            $id = $name + 1;
        }
        $i = $i + 1;
    }
    //print_r("INSERT INTO `employees` (`id`, `Структурное подразделение`, `Должность`, `ФИО`, `Табельный номер`, `Количество календарных дней`, `Запланированная`, `Фактическая`, `Основание`, `Предполагаемая`, `Примечание`) VALUES ('$id', '', '', '$fio', '', NULL, '', '', '', '', '')");
    mysqli_query($con, "INSERT INTO `employees` (`id`, `Структурное подразделение`, `Должность`, `ФИО`, `Табельный номер`, `Количество календарных дней`, `Запланированная`, `Фактическая`, `Основание`, `Предполагаемая`, `Примечание`) VALUES ('$id', '', '', '$fio', '', NULL, NULL, NULL, '', NULL, '')");

    header('Location: http://localhost/MyFirstProject/ ');
}

?>