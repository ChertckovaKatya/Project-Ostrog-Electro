<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';


echo $head;	
$user_id = $_GET["user_id"];
$row=cust_table($_GET["user_id"]);

// if (isset($_POST['del']))
//  	{ 
//  		header ('Location: Localhost\View\del_consumer.php?user_id=$user_id');
// 	}
?>

	<div class="container"> 
		ФИО: <?php echo $row[0]['Name_consumer']; ?>
		<br>Телефон:<?php echo $row[0]['Phone_consumer']; ?> </br>
	</div>
     <a href="..\View\del_consumer.php?user_id=<?php echo (int)$user_id; ?>"> Удалить пользователя</a> 
     <br>
     	<a href="..\View\edit.php?user_id=<?php echo (int)$user_id; ?>"> Редактировать</a>
     <br>
 		 <a href="../View/add_object.php?user_id=<?php echo (int)$user_id; ?>"> Добавить объект</a> 
