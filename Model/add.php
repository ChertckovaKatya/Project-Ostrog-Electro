<?php
	function add_cons($cons_name,$phone_cons)
	{
	  include_once "..\Controller\connection.php";
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
			include_once "..\Controller\connection.php";
			$connect = get_connect();
			if (!empty($owner_fio) AND !empty($renter_fio) AND !empty($name_object) AND !empty($mail_address) AND !empty($phone_object)  AND !empty($sourse_of_power) AND !empty($vol_class)  AND !empty($date_check)  AND !empty($user_id) )
			{
					mysqli_query($connect,"INSERT INTO Object (Owner_FIO, Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check,Obj_Cons_id)
  				VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$date_check','$user_id');");

				echo "INSERT INTO Object (Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check,Obj_Cons_id)
  				VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$date_check','$user_id');";

				return 'Add_object';
	
				exit();
			}

				else 
			{
				return 'Err-object';
				exit();
			}  
		}

		// function add_tr_vol ($Type_tr_vol,$Mark_tr_vol,$Denomin_tr_vol,$Plomb_tr_vol,$Date_gospr_tr_vol,$Date_next_tr_vol,$user_id)
		// {

		// 	include_once "..\Controller\connection.php";
		// 	$connect = get_connect();
		// 	if (!empty($Type_tr_vol) AND !empty($Mark_tr_vol) AND !empty($Denomin_tr_vol) AND !empty($Plomb_tr_vol) AND !empty($Date_gospr_tr_vol)  AND !empty($Date_next_tr_vol) AND !empty($user_id))
		// 	{
		// 			mysqli_query($connect,"INSERT INTO Object (Owner_FIO, Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check,Obj_Cons_id)
  // 				VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$date_check','$user_id');");

		// 		echo "INSERT INTO Object (Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check,Obj_Cons_id)
  // 				VALUES ('$owner_fio','$renter_fio','$name_object','$mail_address','$phone_object','$sourse_of_power','$vol_class','$date_check','$user_id');";

		// 		return 'Add_object';
	
		// 		exit();
		// 	}

		// 		else 
		// 	{
		// 		return 'Err-object';
		// 		exit();
		// 	}  
		// }

		function add_counter($Type_count,$Mark_count,$Year_release_count,$Class_accur_count,$Date_gospr_count,$Date_next_pr_count,$Kol_plomb_gospr,$Kol_holog_stick,$Plomb_netw_org,$Antimag_plomb,$Plomb_shu,$Other_places_count,$id_obj,$user_id)
		{
			include_once "..\Controller\connection.php";
			$connect = get_connect();
			
			if (!empty($Type_count) AND !empty($Mark_count) AND !empty($Year_release_count) AND !empty($Class_accur_count) AND !empty($Date_gospr_count)  AND !empty($Date_next_pr_count) AND !empty($Kol_plomb_gospr)  AND !empty($Kol_holog_stick)  AND !empty($Plomb_netw_org)  AND !empty($Antimag_plomb)  AND !empty($Plomb_shu)  AND !empty($Other_places_count)  AND !empty($id_obj) AND !empty($user_id))
			{
					mysqli_query($connect,"INSERT INTO Counter (Type_count, Mark_count,Year_release_count,Class_accur_count,Date_gospr_count,Date_next_pr_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count,Obj_id_count,Obj_Cons_id_count)
  				VALUES ('$Type_count','$Mark_count','$Year_release_count','$Class_accur_count','$Date_gospr_count','$Date_next_pr_count','$Kol_plomb_gospr','$Kol_holog_stick','$Plomb_netw_org','$Antimag_plomb','$Plomb_shu','$Other_places_count','$id_obj','$user_id');");

					 // echo "INSERT INTO Counter (Type_count, Mark_count,Year_release_count,Class_accur_count,Date_gospr_count,Date_next_pr_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count,Obj_id_count,Obj_Cons_id_count)
  			 // 	VALUES ('$Type_count','$Mark_count','$Year_release_count','$Class_accur_count','$Date_gospr_count','$Date_next_pr_count','$Kol_plomb_gospr','$Kol_holog_stick','$Plomb_netw_org','$Antimag_plomb','$Plomb_shu','$Other_places_count','$id_obj','$user_id');";

					return 'Add_counter';
	
				exit();
			}

				else 
			{
				return 'Err-counter';
				exit();
			}  
		}
        
        function add_dimension ($Date_dimen,$Alter_phase,$Load_fa,$Load_fb,$Load_fc,$Cos_fi,$Kol_turn_disk,$Power_consum,$id_obj,$user_id)
        {
        	include_once "..\Controller\connection.php";
			$connect = get_connect();

			if (!empty($Date_dimen) AND !empty($Alter_phase) AND !empty($Load_fa) AND !empty($Load_fb) AND !empty($Load_fc)  AND !empty($Cos_fi) AND !empty($Kol_turn_disk)  AND !empty($Power_consum)  AND !empty($id_obj)  AND !empty($user_id))
			{

			mysqli_query($connect,"INSERT INTO Dimension (Date_dimen,Alter_phase,Load_fa,Load_fb,Load_fc,Cos_fi,Kol_turn_disk,Power_consum,Obj_id_dimen,Obj_Cons_id_dimen) VALUES ('$Date_dimen','$Alter_phase','$Load_fa','$Load_fb','$Load_fc','$Cos_fi','$Kol_turn_disk','$Power_consum','$id_obj','$user_id');");

					return 'Add_dim';
	
				exit();
			}

				else 
			{
				return 'Err-dim';
				exit();
			} 
        }

        function add_transfor_cur($Type_tr_cur,$Mark_tr_cur,$Denomin_tr_cur,$Year_release_tr_cur,$Date_gospr_tr_cur,$Date_next_tr_cur,$Num_tr_cur_fa,$Num_tr_cur_fb,$Num_tr_cur_fc,$Phase_tr_cur,$id_obj,$user_id)
        {
        	include_once "..\Controller\connection.php";
			$connect = get_connect();

			if (!empty($Type_tr_cur) AND !empty($Mark_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Year_release_tr_cur) AND !empty($Denomin_tr_cur) AND !empty($Date_gospr_tr_cur) AND !empty($Date_next_tr_cur)  AND !empty($Num_tr_cur_fa) AND !empty($Num_tr_cur_fb)  AND !empty($Num_tr_cur_fc) AND !empty($Phase_tr_cur)  AND !empty($id_obj)  AND !empty($user_id))
			{
				mysqli_query($connect,"INSERT INTO Transfor_cur (Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Date_gospr_tr_cur,Date_next_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Phase_tr_cur,Obj_id_tr_cur,Obj_Cons_id_tr_cur) VALUES ('$Type_tr_cur','$Mark_tr_cur','$Denomin_tr_cur','$Year_release_tr_cur','$Date_gospr_tr_cur','$Date_next_tr_cur','$Num_tr_cur_fa','$Num_tr_cur_fb','$Num_tr_cur_fc','$Phase_tr_cur','$id_obj','$user_id');");

					return 'Add_tr_cur';
	
				exit();
			}

				else 
			{
				return 'Err-tr_cur';
				exit();
			} 
        }
?>