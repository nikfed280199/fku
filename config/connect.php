<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fku";

$con = mysqli_connect($servername, $username, $password, $dbname);

if($con == false) {
    echo "Ошибка подключения";
}

?>