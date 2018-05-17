<?php
include_once "../Model/statususer.php";
include_once "../Model/exit.php";
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}
if(status_user()==1) { 
$result = exit_user();
switch ($result) {
	case 'ok':
		echo "Вы успешно вышли";
		header ('Location:../View/index.php');
		break;
	
	// case 'ok':
	// 	# code...
	// 	break;
}
exit(); 
}

 ?>
