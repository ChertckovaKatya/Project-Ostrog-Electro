<?php
	function add_cons($cons_name,$phone_cons)
	{
	  include_once "..\Setting\connection.php";
	  $connect = get_connect();
	  
	  if (!empty($cons_name) AND !empty($phone_cons))
	  	{
	  		// echo $cons_name;
	  		mysqli_query($connect,"INSERT INTO Consumer (Name_consumer, Phone_consumer)
  			VALUES ('$cons_name','$phone_cons');");

	  		return 'Add_cons';//'Вы успешно добавили пользователи!';
	
			exit();
		}

		else 
			{
				return 'Err-cons';
				exit();
			}
	  
	}
?>