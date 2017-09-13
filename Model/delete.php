<?php
 	function del_cons($id_cons)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_cons))
		{
			mysqli_query($connect,"delete from Consumer where id_consumer=".$id_cons.";");

			return 'Del_cons';
	
			exit();
		}
		else 
			{
				return 'Err_del-cons';
				exit();
			}
	}

	function del_object ($id_cons)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_cons))
		{
			mysqli_query($connect,"delete from Object where Obj_Cons_id=".$id_cons.";");

			return 'Del_obj';
	
			exit();
		}
		else 
			{
				return 'Err_del-obj';
				exit();
			}
	}

		function edit_cons($id_cons)
		{
			include_once "..\Controller\connection.php";
			$connect = get_connect();
			if (!empty($id_cons))
			{
				global $name;
				global $phone;
				
				$n=mysqli_fetch_array(mysqli_query($connect,"select Name_consumer from consumer  WHERE id_consumer ='".$id_cons."';"));
				$ph=mysqli_fetch_array(mysqli_query($connect,"select Phone_consumer from consumer  WHERE id_consumer='".$id_cons."';"));
				$name=$n["Name_consumer"];
				$phone=$ph["Phone_consumer"];
			}

		}
		function edit_cons2 ($cons_name,$phone_cons,$id_cons)
		{
			include_once "..\Controller\connection.php";
	  		$connect = get_connect();
	  
	  		if (!empty($cons_name) AND !empty($phone_cons) AND !empty($id_cons))
	  		{
	  			mysqli_query($connect,"UPDATE Consumer SET Name_consumer='".$cons_name."' WHERE id_consumer='".$id_cons."';");
	  			mysqli_query($connect,"UPDATE Consumer SET Phone_consumer='".$phone_cons."' WHERE id_consumer='".$id_cons."';");

	  			return 'Edit_cons';
	
				exit();
			}

			else 
			{
				return 'Err-edit';
				exit();
			}
	  
		}

		function edit_object ($id_obj)
		{
			include_once "..\Controller\connection.php";
	  		$connect = get_connect();
	  		if (!empty($id_obj))
			{
				global $ow_fio;
				global $ren_fio;
				global $nam_obj;
				global $mail_add;
				global $phon_obj;
				global $sour_of_pow;
				global $vol_cl;
				global $date_instr_check;
				

				$Ow_FIO=mysqli_fetch_array(mysqli_query($connect,"select Owner_FIO from Object  WHERE id_object ='".$id_obj."';"));
				$Ren_FIO=mysqli_fetch_array(mysqli_query($connect,"select Renter_FIO from Object  WHERE id_object='".$id_obj."';"));
				$Nam_obj=mysqli_fetch_array(mysqli_query($connect,"select Name_object from Object  WHERE id_object='".$id_obj."';"));
				$Mail_dd=mysqli_fetch_array(mysqli_query($connect,"select Mailing_address from Object  WHERE id_object='".$id_obj."';"));
				$Ph_obj=mysqli_fetch_array(mysqli_query($connect,"select Phone_object from Object  WHERE id_object='".$id_obj."';"));
				$Sour_of_pow=mysqli_fetch_array(mysqli_query($connect,"select Source_of_power from Object  WHERE id_object='".$id_obj."';"));
				$Vol_class=mysqli_fetch_array(mysqli_query($connect,"select Voltage_class from Object  WHERE id_object='".$id_obj."';"));
				$Date_instr_check=mysqli_fetch_array(mysqli_query($connect,"select Date_instrumental_check from Object  WHERE id_object='".$id_obj."';"));

				$ow_fio=$Ow_FIO["Owner_FIO"];
				$ren_fio=$Ren_FIO["Renter_FIO"];
				$nam_obj=$Nam_obj["Name_object"];
				$mail_add=$Mail_dd["Mailing_address"];
				$phon_obj=$Ph_obj["Phone_object"];
				$sour_of_pow=$Sour_of_pow["Source_of_power"];
				$vol_cl=$Vol_class["Voltage_class"];
				$date_instr_check=$Date_instr_check["Date_instrumental_check"];
			}
	  		
		}

		function edit_object_update($owner_fio,$ren_fio,$name_object,$mail_addr,$phone_obj,$sour_of_pow,$vol_class,$date_instr_check,$id_obj)
		{
			include_once "..\Controller\connection.php";
	  		$connect = get_connect();
	  
	  		if (!empty($owner_fio) AND !empty($ren_fio) AND !empty($name_object) AND !empty($mail_addr) AND !empty($phone_obj) AND !empty($sour_of_pow) AND !empty($vol_class) AND !empty($date_instr_check) AND !empty($id_obj)) 
	  		{
	  			mysqli_query($connect,"UPDATE Object SET Owner_FIO='".$owner_fio."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Renter_FIO='".$ren_fio."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Name_object='".$name_object."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Mailing_address='".$mail_addr."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Phone_object='".$phone_obj."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Source_of_power='".$sour_of_pow."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Voltage_class='".$vol_class."' WHERE id_object='".$id_obj."';");
	  			mysqli_query($connect,"UPDATE Object SET Date_instrumental_check='".$date_instr_check."' WHERE id_object='".$id_obj."';");

	  			return 'Edit_obj';
	
				exit();
			}

			else 
			{
				return 'Err-edit-obj';
				exit();
			}
		}


?>

