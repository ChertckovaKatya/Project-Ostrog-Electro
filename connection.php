<?php
$host = 'localhost'; // адрес сервера 
$database = 'home'; // имя базы данных
$user = 'root'; // имя пользователя
$password = '95b72ka'; // пароль

$connect = mysqli_connect($host, $user, $password, $database) 
    or die("ошибка" . mysqli_error($link));
mysqli_set_charset($connect,'utf8'); 	
?>
