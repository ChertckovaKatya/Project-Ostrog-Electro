<?php
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

		function edit_counter($user_id,$id_obj)
		{
			include_once "..\Controller\connection.php";
	  		$connect = get_connect();

	  		if (!empty($user_id) AND !empty($id_obj))
	  		{
	  			global $type;
	  			global $mark;
	  			global $year;
	  			global $class_acc;
	  			global $date_gospr;
	  			global $date_next;
	  			global $kol_pl;
	  			global $kol_hol;
	  			global $pl_netw;
	  			global $anti_pl;
	  			global $pl_shu;
	  			global $other;

	  			$type_count=mysqli_fetch_array(mysqli_query($connect,"select Type_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$mark_count=mysqli_fetch_array(mysqli_query($connect,"select Mark_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$year_release_count=mysqli_fetch_array(mysqli_query($connect,"select Year_release_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$class_accur_count=mysqli_fetch_array(mysqli_query($connect,"select Class_accur_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$date_gospr_count=mysqli_fetch_array(mysqli_query($connect,"select Date_gospr_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$date_next_pr_count=mysqli_fetch_array(mysqli_query($connect,"select Date_next_pr_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$kol_plomb_gospr=mysqli_fetch_array(mysqli_query($connect,"select Kol_plomb_gospr from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$kol_holog_stick=mysqli_fetch_array(mysqli_query($connect,"select Kol_holog_stick from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$plomb_netw_org=mysqli_fetch_array(mysqli_query($connect,"select Plomb_netw_org from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$antimag_plomb=mysqli_fetch_array(mysqli_query($connect,"select Antimag_plomb from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$plomb_shu=mysqli_fetch_array(mysqli_query($connect,"select Plomb_shu from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));
	  			$other_places_count=mysqli_fetch_array(mysqli_query($connect,"select Other_places_count from Counter WHERE  Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';"));

	  			$type=$type_count["Type_count"];
	  			$mark=$mark_count["Mark_count"];
	  			$year=$year_release_count["Year_release_count"];
	  			$class_acc=$class_accur_count["Class_accur_count"];
	  			$date_gospr=$date_gospr_count["Date_gospr_count"];
	  			$date_next=$date_next_pr_count["Date_next_pr_count"];
	  			$kol_pl=$kol_plomb_gospr["Kol_plomb_gospr"];
	  			$kol_hol=$kol_holog_stick["Kol_holog_stick"];
	  			$pl_netw=$plomb_netw_org["Plomb_netw_org"];
	  			$anti_pl=$antimag_plomb["Antimag_plomb"];
	  			$pl_shu=$plomb_shu["Plomb_shu"];
	  			$other=$other_places_count["Other_places_count"];


	  		}
		}

		function edit_counter_update($type_count,$mark_count,$year_release_count,$class_accur_count,$date_gospr_count,$date_next_pr_count,$kol_plomb_gospr,$kol_holog_stick,$plomb_netw_org,$antimag_plomb,$plomb_shu,$other_places_count,$id_obj,$user_id)
		{
			include_once "..\Controller\connection.php";
	  		$connect = get_connect();
	  		if (!empty($type_count) AND !empty($mark_count) AND !empty($year_release_count) AND !empty($class_accur_count) AND !empty($date_gospr_count) AND !empty($date_next_pr_count) AND !empty($kol_plomb_gospr) AND !empty($kol_holog_stick)  AND !empty($plomb_netw_org)  AND !empty($antimag_plomb)  AND !empty($plomb_shu)  AND !empty($other_places_count)  AND !empty($id_obj)AND !empty($user_id)) 
	  		{
	  			mysqli_query($connect,"UPDATE Counter SET Type_count='".$type_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Mark_count='".$mark_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Year_release_count='".$year_release_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Class_accur_count='".$class_accur_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Date_gospr_count='".$date_gospr_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Date_next_pr_count='".$date_next_pr_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Kol_plomb_gospr='".$kol_plomb_gospr."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Kol_holog_stick='".$kol_holog_stick."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Plomb_netw_org='".$plomb_netw_org."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Antimag_plomb='".$antimag_plomb."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Plomb_shu='".$plomb_shu."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");
	  			mysqli_query($connect,"UPDATE Counter SET Other_places_count='".$other_places_count."' WHERE Obj_id_count ='".$id_obj."' AND Obj_Cons_id_count='".$user_id."';");

	  			return 'Edit_counter';
	
				exit();
	  		}
	  		
	  		else 
			{
				return 'Err-edit-count';
				exit();
			}
		}
?>