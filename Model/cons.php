<?php

	function cons_table()
	{
		include_once "..\Setting\connection.php";
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
	function object_table($user_id)
	{
		include_once "..\Setting\connection.php";
		$connect = get_connect();
		$object=(mysqli_query($connect,"select Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check
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
	

	function cust_table($user_id)
	{
		include_once "..\Setting\connection.php";
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
?>