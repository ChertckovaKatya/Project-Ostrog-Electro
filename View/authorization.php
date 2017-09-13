<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>/Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<?php

include_once "..\Model\statususer.php";
include_once "..\Model\auth.php";


if(status_user()==1) {
 header ('Location: power.php');
exit();
 }



if(!empty($_POST['login']) AND !empty($_POST['password']))
{
	 $result = 	auth_user(($_POST['login']), ($_POST['password']));

	 switch ($result) 
   {
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
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style_form.css" rel="stylesheet">
    
  </head>
  <body>
    <div class="container">
      <form class="form-container" action="authorization.php" method="POST">
        <div class="form-title"><h2>Войти</h2></div>
          <div class="form-title">Логин</div>
           <input class="form-field" type="text" name="login" placeholder="логин" /><br />
            <div class="form-title">Пароль</div>
             <input class="form-field" type="password" name="password" placeholder="пароль" /><br />
              <div class="button-container">
                <input autofocus class="btn btn-success" type="submit" value="Готово" />
              </div>
              <p>
				        <a href="http://localhost/pro/index.php"> Вернуться</a>
              </p>
		  </form>
      
    </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.js"></script>
  </body>
</html>
