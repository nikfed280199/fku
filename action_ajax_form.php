<?php

require_once 'config/connect.php';

$id1 = $_POST["select1"];
$id2 = $_POST["select2"];

$date1 = mysqli_query($con, "SELECT `Фактическая` FROM employees WHERE `id`=$id1");
$date1 = mysqli_fetch_all($date1);

$date2 = mysqli_query($con, "SELECT `Фактическая` FROM employees WHERE `id`=$id2");
$date2 = mysqli_fetch_all($date2);


$year = array();
$month = array();
$day = array();

foreach ($date1 as $date1) {
    foreach ($date1 as $date1) {
        array_push($year, mb_substr($date1, 0, 4));
        array_push($month, mb_substr($date1, 5, 2));
        array_push($day, mb_substr($date1, 8, 2));
    }
}
foreach ($date2 as $date2) {
    foreach ($date2 as $date2) {
        array_push($year, mb_substr($date2, 0, 4));
        array_push($month, mb_substr($date2, 5, 2));
        array_push($day, mb_substr($date2, 8, 2));
    }
}

$vac_duration1 = mysqli_query($con, "SELECT `Количество календарных дней` FROM employees WHERE `id`=$id1");
$vac_duration1 = mysqli_fetch_all($vac_duration1);

$vac_duration2 = mysqli_query($con, "SELECT `Количество календарных дней` FROM employees WHERE `id`=$id2");
$vac_duration2 = mysqli_fetch_all($vac_duration2);

$duration = array();

foreach ($vac_duration1 as $vac_duration1) {
    foreach ($vac_duration1 as $vac_duration1) {
        array_push($duration, $vac_duration1);
    }
}

foreach ($vac_duration2 as $vac_duration2) {
    foreach ($vac_duration2 as $vac_duration2) {
        array_push($duration, $vac_duration2);
    }
}

if (isset($id1) && isset($id2)) {

    // Формируем массив для JSON ответа
    $res = array(
    'year1' => $year[0],
    'month1' => $month[0],
    'day1' => $day[0],
    'year2' => $year[1],
    'month2' => $month[1],
    'day2' => $day[1],
    'duration1' => $duration[0],
    'duration2' => $duration[1]
    );

    // Переводим массив в JSON
    echo json_encode($res);
}
?>