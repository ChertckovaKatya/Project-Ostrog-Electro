<?php
$host = 'localhost'; 
$database = 'home';
$user = 'root';
$password = '95b72ka';

$connect = mysqli_connect($host, $user, $password, $database)
    or die("������" . mysqli_error($link));
mysqli_set_charset($connect,'utf8');
?>
