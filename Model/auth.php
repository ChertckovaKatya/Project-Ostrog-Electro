<?php

function auth_user($user_value,$password_value){
  include_once "..\Controller\connection.php";
	$connect = get_connect();
  if(!empty($user_value) AND !empty($password_value))
  {
  	$login = mysqli_real_escape_string($connect,htmlspecialchars($user_value));
  	$password = mysqli_real_escape_string($connect,htmlspecialchars($password_value));
		$pass=password_hash($password,PASSWORD_BCRYPT);
		
		$sql = "SELECT COUNT(Password) FROM User WHERE Name = '$login';";
		$res = mysqli_query($connect,$sql) or trigger_error(mysqli_error($connect)." in ". $sql);
  	$row= mysqli_fetch_array($res, MYSQLI_NUM);
  	$row2 =mysqli_fetch_array(mysqli_query($connect,"SELECT Password FROM User WHERE Name = '$login';"), MYSQLI_NUM);
    echo "SELECT Password FROM User WHERE Name = '$login';";
  	if (count($row)==0)
  	{
      return 'ERR_1'; //'Пользователь не найден.'
  		exit();
  	}
  	else
  	{
      // echo 'Пароль:'.$password_value.'<br>';
  		if (password_verify($password,$row2[0]))
  		{
  			$time = 60*60*24;

  			setcookie('username', $login, time()+$time);


        return 'Ok';
  			// echo 'Вы успешно авторизировались на сайте!';
  			// echo "<a href=\"./power.php\">На главную</a><br>";
  			exit();
  		}
  	else
  		{
        return 'ERR_2'; //'Введенные данные неправильные';
  		exit();
  		}
  	}
  }
}
?>
