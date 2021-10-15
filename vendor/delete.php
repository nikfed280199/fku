<?php

require_once '../config/connect.php';

$id = $_GET['id'];
mysqli_query($con, "DELETE FROM `employees` WHERE `employees`.`id` = '$id'");

$ids = mysqli_query($con, "SELECT `employees`.`id` FROM `employees` WHERE `employees`.`id` > '$id'");

$qry = "SELECT max(id) AS id FROM employees";
$result = $con->query($qry);
$row = $result->fetch_assoc();

for ($i = $id + 1; $i <= $row["id"]; ++$i) {
    mysqli_query($con, "UPDATE `employees` SET `employees`.`id` = $i-1 WHERE `employees`.`id` = $i;");
}

header('Location: http://localhost/MyFirstProject/ ');

?>