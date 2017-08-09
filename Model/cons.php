<?php

function cons_table()
{
	include_once "..\Controller\connection.php";
	$connect = get_connect();
	// $row = mysqli_fetch_row(mysqli_query($connect,"select * from consumer;"));


	$res = mysqli_query($connect,"select * from consumer;"); 
	$arr = array(); 
	$i=0;
	while($rows = mysqli_fetch_row($res))
	{ 
		$arr[$i] = $rows[$i]; 
		$i++;
	}

	return $arr;
}



?>