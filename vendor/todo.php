<?php

require_once '../config/connect.php';

$title = $_POST['title'];

mysqli_query($con, "INSERT INTO `to-do-list`(`title`) VALUES('$title')");

header('Location: http://localhost/MyFirstProject/ ');
?>