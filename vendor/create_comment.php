<?php

require_once '../config/connect.php';

$id = $_POST['id'];
$body = $_POST['body'];

mysqli_query($con, "INSERT INTO `comments` (`id`, `employee_id`, `body`) VALUES (NULL, '$id', '$body')");

header('Location: employee.php?id=' . $id);

?>