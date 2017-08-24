<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';


echo $head;	
$user_id = $_GET["user_id"];
$row=cust_table($_GET["user_id"]);
$row1=object_table($_GET["user_id"]);

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

 	<div class="container"> 
		Собственник: <?php echo $row1[0]['Owner_FIO']; ?>
		<br>Арендатор: <?php echo $row1[0]['Renter_FIO']; ?> </br>
		Название объекта: <?php echo $row1[0]['Name_object']; ?> 
		<br>Почтовый адрес: <?php echo $row1[0]['Mailing_address']; ?> </br>
		Контактный телефон: <?php echo $row1[0]['Phone_object']; ?> 
		<br>Источник питания: <?php echo $row1[0]['Source_of_power']; ?> </br>
		Класс напряжения: <?php echo $row1[0]['Voltage_class']; ?> 
		<br>Дата инструментальной проверки: <?php echo $row1[0]['Date_instrumental_check']; ?> </br>
	</div>

	<a href="..\View\del_object.php?user_id=<?php echo (int)$user_id; ?>"> Удалить объект</a> 
     <br>
     	<a href="..\View\edit.php?user_id=<?php echo (int)$user_id; ?>"> Редактировать</a>
     <br>