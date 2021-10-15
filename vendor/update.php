<?php

require_once '../config/connect.php';

$table = $_POST;

$elem1 = $table['id'];
$elem2 = $table['td1'];
$elem3 = $table['td2'];
$elem4 = $table['td3'];
$elem5 = $table['td4'];
$elem6 = $table['td5'];
$elem7 = $table['td6'];
$elem8 = $table['td7'];
$elem9 = $table['td8'];
$elem10 = $table['td9'];
$elem11 = $table['td10'];

for ($i = 0; $i < sizeof($elem6); ++$i) {
    if ($elem6[$i] === '') {
        $elem6[$i] = 'null';
    }
}
for ($i = 0; $i < sizeof($elem7); ++$i) {
    if ($elem7[$i] === '') {
        $elem7[$i] = 'null';
    }
}
for ($i = 0; $i < sizeof($elem8); ++$i) {
    if ($elem8[$i] === '') {
        $elem8[$i] = 'null';
    }
}
for ($i = 0; $i < sizeof($elem10); ++$i) {
    if ($elem10[$i] === '') {
        $elem10[$i] = 'null';
    }
}
for ($i = 0; $i < count($table['id']); ++$i) {
    //print_r("UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`='$elem7[$i]', `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
    if ($elem6[$i] === 'null') {
        if ($elem7[$i] === 'null' and $elem8[$i] != 'null' and $elem10[$i] != 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`=$elem7[$i], `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] != 'null' and $elem8[$i] === 'null' and $elem10[$i] != 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`='$elem7[$i]', `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] != 'null' and $elem8[$i] != 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`='$elem7[$i]', `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] === 'null' and $elem8[$i] === 'null' and $elem10[$i] != 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`=$elem7[$i], `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] === 'null' and $elem8[$i] != 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`=$elem7[$i], `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] != 'null' and $elem8[$i] === 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`='$elem7[$i]', `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] === 'null' and $elem8[$i] === 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i], `Запланированная`=$elem7[$i], `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`=$elem6[$i]', `Запланированная`='$elem7[$i]', `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        }
    } else {
        if ($elem7[$i] === 'null' and $elem8[$i] != 'null' and $elem10[$i] != 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`=$elem7[$i], `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] != 'null' and $elem8[$i] === 'null' and $elem10[$i] != 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`='$elem7[$i]', `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] != 'null' and $elem8[$i] != 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`='$elem7[$i]', `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] === 'null' and $elem8[$i] === 'null' and $elem10[$i] != 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`=$elem7[$i], `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] === 'null' and $elem8[$i] != 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`=$elem7[$i], `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] != 'null' and $elem8[$i] === 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`='$elem7[$i]', `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else if ($elem7[$i] === 'null' and $elem8[$i] === 'null' and $elem10[$i] === 'null') {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`=$elem7[$i], `Фактическая`=$elem8[$i], `Основание`='$elem9[$i]', `Предполагаемая`=$elem10[$i], `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        } else {
            mysqli_query($con, "UPDATE `employees` SET `Структурное подразделение`='$elem2[$i]', `Должность`='$elem3[$i]', `ФИО`='$elem4[$i]', `Табельный номер`='$elem5[$i]', `Количество календарных дней`='$elem6[$i]', `Запланированная`='$elem7[$i]', `Фактическая`='$elem8[$i]', `Основание`='$elem9[$i]', `Предполагаемая`='$elem10[$i]', `Примечание`='$elem11[$i]' WHERE `id`=$elem1[$i];");
        }
    }
}

header('Location: http://localhost/MyFirstProject/ ');
?>