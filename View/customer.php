<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';


echo $head;
$user_id = $_GET["user_id"];
$row=cust_conclusion($_GET["user_id"]);
$row1=object_conclusion($_GET["user_id"]);
$id_obj=$row1[0]['id_object'];
$row3=counter_conclusion($id_obj,$user_id);

?>
<!DOCTYPE html>
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
 		'<div class="container">
		Собственник: '.$row1[0]['Owner_FIO'].';
		<br>Арендатор: '.$row1[0]['Renter_FIO'].';  </br>
		Название объекта: '.$row1[0]['Name_object'].';
		<br>Почтовый адрес: '.$row1[0]['Mailing_address'].';  </br>
		Контактный телефон: '.$row1[0]['Phone_object'].';
		<br>Источник питания: '.$row1[0]['Source_of_power'].';  </br>
		Класс напряжения: '.$row1[0]['Voltage_class'].';
		<br>Дата инструментальной проверки: '.$row1[0]['Date_instrumental_check'].';  </br>
		</div>

		<a href="..\View\del_object.php?id_obj='.$id_obj.'; "> Удалить объект</a>
     	<br>
     		<a href="..\View\edit_object.php?id_obj='.$id_obj.';"> Редактировать</a>
    	 <br>

     
    <form action="add_counter.php" method="post">
      <br>
      <a href="../View/add_counter.php?user_id='.$user_id.' &id_obj='.$id_obj.'"> Добавить счетчик</a>
      </br>
    </form>';
	}
	?>
<!-- <a href="../View/add_transfor_vol.php?user_id='.$user_id.'; ?>"> Добавить трансформатор напряжения</a>  -->
<?php
if (prov_counter($id_obj,$user_id)==1)
	{	echo
 		'<div class="container">
		Тип: '.$row3[0]['Type_count'].';
		<br>Марка: '.$row3[0]['Mark_count'].';  </br>
		Год выпуска: '.$row3[0]['Year_release_count'].';
		<br>Класс точности: '.$row3[0]['Class_accur_count'].';  </br>
		Дата проверки: '.$row3[0]['Date_gospr_count'].';
		<br>Дата следующей проверки: '.$row3[0]['Date_next_pr_count'].';  </br>
		Количество пломб госпроверки: '.$row3[0]['Kol_plomb_gospr'].';
		<br>Количество голографичеких наклеек: '.$row3[0]['Kol_holog_stick'].';  </br>
		Пломбы сетевой организации:'.$row3[0]['Plomb_netw_org'].';
		<br>Антимагнитые пломбы:'.$row3[0]['Antimag_plomb'].';</br>
		Пломба на ШУ:'.$row3[0]['Plomb_shu'].';
		<br>Другие места:'.$row3[0]['Other_places_count'].';</br>
		</div>

		<a href="..\View\del_counter.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить счетчик</a>
     	<br>
     		<a href="..\View\edit_counter.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать счетчик</a>
    	 <br>';
	}
?>
