<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';


echo $head;	

 
 $user_id = $_GET["user_id"];

$row=cust_table($_GET["user_id"]);
?>

	<div class="container"> 
		ФИО: <?php echo $row[0]['Name_consumer']; ?>
		<br>Телефон:<?php echo $row[0]['Phone_consumer']; ?> </br>
	</div>

	<!-- <form> --> <!-- action="..\View\del_consumer.php?user_id=<?php echo (int)$user_id; ?>" --><!-- > -->
	<!-- <div class="button-container"> -->
     	<!--  <a href="..\View\del_consumer.php?user_id=<?php echo (int)$user_id; ?>"><input class="btn btn-success" type="submit" value="Удалить пользователя"></a> -->
     	<a href="..\View\del_consumer.php?user_id=<?php echo (int)$user_id; ?>"> Удалить пользователя</a>
     	<a href="..\View\edit.php?user_id=<?php echo (int)$user_id; ?>"> Редактировать</a>
    <!-- </div> -->
<!-- </form> -->
