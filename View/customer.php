<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';


echo $head;	
$user_id = $_GET["user_id"];
$row=cust_table($_GET["user_id"]);
$row1=object_table($_GET["user_id"]);
$id_obj=$row1[0]['id_object'];

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

 <?php		 
if (prov_obj($user_id)==1)
	{	echo 
 		'<div class=\"container\"> 
		Собственник: '.$row1[0]['Owner_FIO'].'; 
		<br>Арендатор: '.$row1[0]['Renter_FIO'].';  </br>
		Название объекта: '.$row1[0]['Name_object'].'; 
		<br>Почтовый адрес: '.$row1[0]['Mailing_address'].';  </br>
		Контактный телефон: '.$row1[0]['Phone_object'].'; 
		<br>Источник питания: '.$row1[0]['Source_of_power'].';  </br>
		Класс напряжения: '.$row1[0]['Voltage_class'].';  
		<br>Дата инструментальной проверки: '.$row1[0]['Date_instrumental_check'].';  </br>
		</div>

		<a href="..\View\del_object.php?user_id='.$user_id.'; "> Удалить объект</a> 
     	<br>
     		<a href="..\View\edit.php?user_id='.$user_id.';"> Редактировать</a>
    	 <br>';
	}
     ?>
    <form action="add_counter.php" method="post">
      <!-- <a href="../View/add_transfor_vol.php?user_id=<?php echo (int)$user_id; ?>"> Добавить трансформатор напряжения</a>  -->
      <br>
      <a href="../View/add_counter.php?user_id=<?php echo (int)$user_id; ?>"> Добавить счетчик</a> 
      <input type="hidden" name="id_obj" value = <?php echo $id_obj?> > 
      </br>
    </form>