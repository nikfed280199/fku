<?php 

$user = [];
foreach($_POST as $_POST) {
    array_push($user, $_POST);
}

header('Location: http://localhost/MyFirstProject/ ');

?>