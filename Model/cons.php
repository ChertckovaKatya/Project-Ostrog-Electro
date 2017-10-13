
<?php

	function cons_table()
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		// $row = mysqli_fetch_row(mysqli_query($connect,"select * from consumer;"));


		$question=(mysqli_query($connect,"select * from consumer;"));
		$array = array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($question)) 
		{

			$array[$i] = $row;
			$i++;
		}
		//var_dump($array);
		return $array;
		exit();
	}
	function object_conclusion($user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$object=(mysqli_query($connect,"select id_object,Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check
			FROM Object WHERE Obj_Cons_id=".$user_id.";"));
		$array_object= array();
		$i = 0;
		while ($row1 = mysqli_fetch_assoc($object)) 
		{

			$array_object[$i] = $row1;
			$i++;
		}

		return $array_object;
		exit();
	}

	function prov_obj($user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
	if(!empty($user_id ))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM Object WHERE Obj_Cons_id ='$user_id';"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}
	

	function cust_conclusion($user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$customer=(mysqli_query($connect,"select Name_consumer,Phone_consumer from consumer WHERE id_consumer =".$user_id.";"));
		$array_cust= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($customer)) 
		{

			$array_cust[$i] = $row;
			$i++;
		}

		return $array_cust;
		exit();
	}

	function counter_conclusion($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$counter=(mysqli_query($connect,"Select Type_count, Mark_count,Year_release_count,Class_accur_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count from home.Counter WHERE Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";"));

		// echo "Select Type_count, Mark_count,Year_release_count,Class_accur_count,Date_gospr_count,Date_next_pr_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count from home.Counter WHERE Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";";


		$array_count= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($counter)) 
		{

			$array_count[$i] = $row;
			$i++;
		}

		return $array_count;
		exit();
	}

	function dimension_conclusion($id_obj,$user_id)
	{

		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$dim=(mysqli_query($connect,"Select Date_dimen, Alter_phase,Load_fa,Load_fb,Load_fc,Cos_fi,Kol_turn_disk,Power_consum from home.Dimension WHERE Obj_id_dimen=".$id_obj." AND Obj_Cons_id_dimen=".$user_id.";"));

		$array_dim= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($dim)) 
		{

			$array_dim[$i] = $row;
			$i++;
		}

		return $array_dim;
		exit();

	}

	function transfor_cur_conclusion($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$tr_cur=(mysqli_query($connect,"Select id_tr_cur,Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Phase_tr_cur from home.Transfor_cur WHERE Obj_id_tr_cur=".$id_obj." AND Obj_Cons_id_tr_cur=".$user_id.";"));

		$array_tr_cur= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($tr_cur)) 
		{

			$array_tr_cur[$i] = $row;
			$i++;
		}

		return $array_tr_cur;
		exit();


	} 

	function transfor_vol_conclusion($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$tr_vol=(mysqli_query($connect,"Select Type_tr_vol,Mark_tr_vol,Denomin_tr_vol,Plomb_tr_vol from home.Transfor_vol WHERE Object_id_tr_vol=".$id_obj." AND Cons_id_obj_tr_vol=".$user_id.";"));
		$array_tr_vol= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($tr_vol)) 
		{

			$array_tr_vol[$i] = $row;
			$i++;
		}

		return $array_tr_vol;
		exit();
	}

	function plombs_conclusion($id_tr_cur)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();

		$plombs=(mysqli_query($connect,"Select id_plomb,L1,L2,I1,I2,Other_places_plomb from home.Plombs WHERE Tr_cur_id_plomb=".$id_tr_cur.";"));

		$array_pl= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($plombs)) 
		{

			$array_pl[$i] = $row;
			$i++;
		}

		return $array_pl;
		exit();


	}

	function  prov_counter($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
	if(!empty($id_obj) AND !empty($user_id))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Counter WHERE  Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}

	function prov_dimension($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;

		if(!empty($id_obj) AND !empty($user_id))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Dimension WHERE  Obj_id_dimen=".$id_obj." AND Obj_Cons_id_dimen=".$user_id.";"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}

	function prov_transfor_cur($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;

		if(!empty($id_obj) AND !empty($user_id))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Transfor_cur WHERE  Obj_id_tr_cur=".$id_obj." AND Obj_Cons_id_tr_cur=".$user_id.";"), MYSQLI_NUM);

	

		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}

	function prov_plombs($id_tr_cur)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
		if(!empty($id_tr_cur))
		{
			$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Plombs WHERE  Tr_cur_id_plomb=".$id_tr_cur.";"), MYSQLI_NUM);
			if (count($row)!=0)
			{
				 $user=1;
			}
		}

		else
		{
		$user = 0;
		}
		return $user;

	}

	function prov_tr_vol($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
		if(!empty($id_obj) AND !empty($user_id))
		{
			$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Transfor_vol WHERE  Object_id_tr_vol=".$id_obj." AND Cons_id_obj_tr_vol=".$user_id.";"), MYSQLI_NUM);
			if (count($row)!=0)
			{
		 		$user=1;
			}
		}
		else
		{
			$user = 0;
		}
		return $user;
		

	}



?>