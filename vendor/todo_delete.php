<?php

require '../config/connect.php';

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM `to-do-list` WHERE `id` = $id");

header('Location: http://localhost/MyFirstProject/ ');
?>