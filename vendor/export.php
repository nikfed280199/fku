<?php

require_once '../config/connect.php';

mysqli_query($con, "SELECT * INTO OUTFILE '/employees.csv' FIELDS ENCLOSED BY '\"' TERMINATED BY ';' ESCAPED BY '\"' LINES TERMINATED BY '\r\n' FROM `employees`;");
/*
header("Content-Type: text/csv; charset=utf8");

header("Content-Disposition: attachment; filename=employees.csv");

$output = fopen('php://output', 'w');

fputcsv($output, array('id', 'Структурное подразделение', 'Должность', 'ФИО', 'Табельный номер', 'Количество календарных дней', 'Запланированная', 'Фактическая', 'Основание', 'Предполагаемая', 'Примечание'));

mysqli_query($con, "ALTER TABLE `qwe` CONVERT TO CHARACTER SET = 'utf8'");

$result = mysqli_query($con, "SELECT * FROM `employees`");

foreach($result as $result){
    fputcsv($output, $result);
}
*/


?>