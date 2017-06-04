
<head>
	<meta charset="utf-8">
	<title>/Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<?php
//include_once "..\Model\statususer.php";
// if(status_user()) {
// header ('Location: power.php');
//exit();
// }

include_once "..\Model\auth.php";

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
?>
<div class="container">
	<form action="authorization.php" method="POST">
		<h3>Вход</h3>
		Логин:<br />
		<input name="login" type="text"/><br />
		Пароль:<br />
		<input name="password" type="password" /><br><br>
		<input autofocus class="btn btn-success" type="submit" value="Авторизоваться" /> <br><br>
		<p>
			<a href="http://localhost/pro/index.php"> Вернуться</a>
		</p>
	</form>
</div>;
