<?php
function status_user(){
include_once "..\Controller\connection.php";
if(!empty($_COOKIE['username'] ))
{
	$name =mysqli_real_escape_string($connect,$_COOKIE['username']);
	$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM User WHERE Name ='$name';"), MYSQLI_NUM);
	if (count($row)!=0)
	{
		$user=1;
	}
}
else
{
	$user = 0;
}
}
?>
