<?php

session_start();
$_SESSION['name'] = 'FNV';
echo $_SESSION['name'];

setcookie('login', 'fnv');

?>