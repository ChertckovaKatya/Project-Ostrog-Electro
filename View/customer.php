<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';



$user_id = $_GET["user_id"];
$row=cust_conclusion($_GET["user_id"]);
$row1=object_conclusion($_GET["user_id"]);
$id_obj=$row1[0]['id_object'];
$row3=counter_conclusion($id_obj,$user_id);
$dimen=dimension_conclusion($id_obj,$user_id);
$tr_cur=transfor_cur_conclusion($id_obj,$user_id);
$id_tr_cur=$tr_cur[0]['id_tr_cur'];
$plombs=plombs_conclusion($id_tr_cur);
$id_plomb=$plombs[0]['id_plomb'];
// echo $id_plomb;

?>
<!DOCTYPE html>
	<div class="container">
		<div class="row">
		<div class="col-sm-4">	
		ФИО: <?php echo $row[0]['Name_consumer']; ?>
		</div>
		<div class="col-sm-4">	
		Телефон:<?php echo $row[0]['Phone_consumer']; ?>
		</div> 
	<div class="col-sm-4">
     <a href="..\View\del_consumer.php?user_id=<?php echo (int)$user_id; ?>"> Удалить пользователя</a>
   
     	<a href="..\View\edit.php?user_id=<?php echo (int)$user_id; ?>"> Редактировать</a>
    <br>
 		 <a href="../View/add_object.php?user_id=<?php echo (int)$user_id; ?>"> Добавить объект</a>
 	</div>
		<div class="row">
			<div class="col-sm-6">
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
</div>
<div class="col-sm-6">
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
    		<br>
    		<a href="..\View\add_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить данные об измерениях</a>';

		}
	?>
</div>
</div>

		<?php
	if (prov_dimension($id_obj,$user_id)==1)
		{
			echo
 			'<div class="container">
			Дата: '.$dimen[0]['Date_dimen'].';
			<br>Чередование фаз: '.$dimen[0]['Alter_phase'].';  </br>
			Нагрузка в амперах Фа: '.$dimen[0]['Load_fa'].';
			<br>Нагрузка в амперах Фб: '.$dimen[0]['Load_fb'].';  </br>
			Нагрузка в амперах Фс: '.$dimen[0]['Load_fc'].';
			<br>Cos фи: '.$dimen[0]['Cos_fi'].';  </br>
			Количество оборотов диска: '.$dimen[0]['Kol_turn_disk'].';
			<br>Потребляемая мощность в КВт: '.$dimen[0]['Power_consum'].';  </br>
			</div>
			<a href="..\View\del_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить данные об измерениях</a>
     		<br>
     		<a href="..\View\edit_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать данные об измерениях</a>
    		<br>
    		<a href="..\View\add_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить трансформатор тока</a>';

		}
		?>
		<div class="col-sm-6">
<?php
	if (prov_transfor_cur($id_obj,$user_id)==1)
	{	echo
		'<div class="container">
		Тип: '.$tr_cur[0]['Type_tr_cur'].';
		<br>Марка: '.$tr_cur[0]['Mark_tr_cur'].';  </br>
		Номинал: '.$tr_cur[0]['Denomin_tr_cur'].';
		<br>Год выпуска: '.$tr_cur[0]['Year_release_tr_cur'].';  </br>
		Дата госпроверки: '.$tr_cur[0]['Date_gospr_tr_cur'].';
		<br>Дата следующей проверки: '.$tr_cur[0]['Date_next_tr_cur'].';  </br>
		№ Трансформатора тока Фа: '.$tr_cur[0]['Num_tr_cur_fa'].';
		<br>№ Трансформатора тока Фб: '.$tr_cur[0]['Num_tr_cur_fb'].';  </br>
		№ Трансформатора тока Фс: '.$tr_cur[0]['Num_tr_cur_fc'].';
		<br>Фаза: '.$tr_cur[0]['Phase_tr_cur'].';  </br>
		</div>
		<a href="..\View\del_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить трансформатор тока</a>
     	<br>
     		<a href="..\View\edit_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать трансформатор тока</a>
    	 <br>
    	 <a href="..\View\add_plombs.php?id_tr_cur='.$id_tr_cur.';"> Добавить пломбы</a>';

	}
	?>
</div>
<?php
	if (prov_plombs($id_tr_cur)==1)
		{ echo
			'<div class="container">
		l1: '.$plombs[0]['L1'].';
		<br>l2: '.$plombs[0]['L2'].';  </br>
		I1: '.$plombs[0]['I1'].';
		<br>I2: '.$plombs[0]['I2'].';  </br>
		Другие места: '.$plombs[0]['Other_places_plomb'].';	
		</div>
		<a href="..\View\del_plombs.php?id_tr_cur='.$id_tr_cur.'&id_plomb='.$id_plomb.' "> Удалить пломбы</a>
     	<br>
     		<a href="..\View\edit_plombs.php?id_tr_cur='.$id_tr_cur.'&id_plomb='.$id_plomb.';"> Редактировать данные о пломбах </a>';
		}
?>

<!-- <a href="../View/add_transfor_vol.php?user_id='.$user_id.'; ?>"> Добавить трансформатор напряжения</a> -->
