<?php

function cons_table(){
	include_once "..\Controller\connection.php";
	$connect = get_connect();
	// $row = mysqli_fetch_row(mysqli_query($connect,"select * from consumer;"));


	$question=(mysqli_query($connect,"select * from consumer;"));
	$array = array();
	$i = 0;
	while ($row = mysqli_fetch_assoc($question)) {

		$array[$i] = $row;
		$i++;
	}
	//var_dump($array);
	return $array;
}



?>