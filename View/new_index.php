<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<?php

include_once "..\Model\statususer.php";
include_once "..\Model\auth.php";
include_once "..\Model\identification.php";



if(status_user()==1) {
 header ('Location: power.php');
exit();
 }



if(!empty($_POST['login']) AND !empty($_POST['password']))
{
	 $result = 	auth_user(($_POST['login']), ($_POST['password']));

	 switch ($result) {
    case "ERR_1":
        echo "Пользователь не найден";
        break;
    case "ERR_2":
        echo "Не верный логин или пароль";
        break;
    case "Ok":
        echo "Вы успешно авторизировались на сайте!";
        break;
}
}

if (!empty($_POST['user']) AND !empty($_POST['pass']))
{
	 $result = 	ident_user(($_POST['user']), ($_POST['pass']));
	switch ($result) {
	 case "ERR_3":
			 echo "'Выбранный логин уже зарегистрирован!";
			 break;
	 case "Zar":
			 echo "Вы успешно зарегистрированы!'";
			 break;

}
}


?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/new_style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="login-wrap">
<div class="login-html">
  <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Вход</label>
  <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Регистрация</label>
      <div class="login-form">
    			<div class="sign-in-htm">
            <form  method="POST">
    				<div class="group">
    					<label for="user" class="label">Логин</label>
    					<input  id="login" type="text" class="input" name="login">
    				</div>
    				<div class="group">
    					<label for="pass" class="label">Пароль</label>
    					<input  id="password" type="password" class="input" name="password" data-type="password">
    				</div>
    				<div class="group">
    					<input type="submit" class="button" value="Войти">
    				</div>
    			</div>
        <form  method="POST">
    			<div class="sign-up-htm">
    				<div class="group">
    					<label for="user" class="label">Логин</label>
    					<input id="user" type="text" class="input" name="user">
    				</div>
    				<div class="group">
    					<label for="pass" class="label">Пароль</label>
    					<input id="pass" type="password" class="input" name="pass">
    				</div>
    				<div class="group">
    					<input type="submit" class="button" value="Зарегистрироваться">
        </div>
    		</div>
    	</div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>
