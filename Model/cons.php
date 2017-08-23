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