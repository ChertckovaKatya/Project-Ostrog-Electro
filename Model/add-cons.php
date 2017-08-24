<?php
	function add_cons($cons_name,$phone_cons)
	{
	  include_once "..\Setting\connection.php";
	  $connect = get_connect();
	  
	  if (!empty($cons_name) AND !empty($phone_cons))
	  	{
	  		
	  		mysqli_query($connect,"INSERT INTO Consumer (Name_consumer, Phone_consumer)
  			VALUES ('$cons_name','$phone_cons');");
  			echo "INSERT INTO Consumer (Name_consumer, Phone_consumer)
  			VALUES ('$cons_name','$phone_cons');";

	  		return 'Add_cons';//'Вы успешно добавили пользователи!';
	
			exit();
		}

		else 
			{
				return 'Err-cons';
				exit();
			}
	  
	}

	function add_object($owner_fio,$renter_fio,$name_object,$mail_address,$phone_object,$sourse_of_power,$vol_class,$date_check,$user_id)
		{
			include_once "..\Setting\connection.php";
			$connect = get_connect();
			if (!empty($owner_fio) AND !empty($renter_fio) AND !empty($name_object) AND !empty($mail_address) AND !empty($phone_object)  AND !empty($sourse_of_power) AND !empty($vol_class)  AND !empty($date_check)  AND !empty($user_id) )
			{
					mysqli_query($connect,"INSERT INTO Object (Owner_FIO, Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check,Obj_Cons_id)
  				VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$date_check','$user_id');");

				// echo "INSERT INTO Object (Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check,Obj_Cons_id)
  		// 		VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$date_check','$user_id');";

				return 'Add_object';
	
				exit();
			}

				else 
			{
				return 'Err-object';
				exit();
			}  
		}
?>