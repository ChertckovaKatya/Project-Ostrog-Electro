
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
		$counter=(mysqli_query($connect,"Select Type_count, Mark_count,Year_release_count,Class_accur_count,Date_gospr_count,Date_next_pr_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count from home.Counter WHERE Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";"));

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

?>