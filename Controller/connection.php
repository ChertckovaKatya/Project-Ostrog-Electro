<?php

function get_connect(){
  $host = 'localhost';
  $database = 'ost';
  $user = 'root';
  $password = '365412';
  global $connect;
  $connect = mysqli_connect($host, $user, $password, $database)
      or die("Ошибка при подключении к базе" . mysqli_error($link));
  mysqli_set_charset($connect,'utf8');

  return $connect;
}

?>
