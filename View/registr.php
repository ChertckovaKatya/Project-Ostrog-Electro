<head>
	<meta charset="utf-8">
	<title>Registr</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<?php
include_once "..\Model\identification.php";

if (!empty($_POST['login']) AND !empty($_POST['password']))
{
	 $result = 	ident_user(($_POST['login']), ($_POST['password']));
	switch ($result) {
	 case "ERR_3":
			 echo "'Выбранный логин уже зарегистрирован!";
			 break;
	 case "Zar":
			 echo "Вы успешно зарегистрированы!";
			 break;

}
	}

?>

<!-- <div class="container">
	<h3> Регистрация </h3> -->
	<!-- <form class="form-horizontal" role="form" action="registr.php" method="POST">
		Логин:
		<div>
	       	<input id="login" name="login" type="text" required>
		</div>

		Пароль:
		<div>
	        <input id="password" name="password" type="text" required>
		</div>
		<br>
		<input class="btn btn-success" type="submit" value="Зарегистрироваться" /> <br><br>
		<p ><a href="http://127.0.1.1/myproject/"> Вернуться</a></p>

	</form>
</div>; -->
