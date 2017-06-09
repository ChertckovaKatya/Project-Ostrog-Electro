<?php
$host = 'localhost';
$database = 'home';
$user = 'root';
$password = '95b72ka';
global $connect;
$connect = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка при подключении к базе" . mysqli_error($link));
mysqli_set_charset($connect,'utf8');
?>
