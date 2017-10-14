<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';



$user_id = $_GET["user_id"];
$row=cust_conclusion($_GET["user_id"]);
$row1=object_conclusion($_GET["user_id"]);
$id_obj=$row1[0]['id_object'];
$row3=counter_conclusion($id_obj,$user_id);
$id_count=$row3[0]["id_count"];
$dimen=dimension_conclusion($id_obj,$user_id);
$tr_cur=transfor_cur_conclusion($id_obj,$user_id);
$id_tr_cur=$tr_cur[0]['id_tr_cur'];
$plombs=plombs_conclusion($id_tr_cur);
$id_plomb=$plombs[0]['id_plomb'];
$tr_vol=transfor_vol_conclusion($id_obj,$user_id);
$change_count=change_count_conclusion($id_count);
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
 		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php
					if (prov_obj($user_id)==1)
					{	echo
 					'<div class="container">
 					<h4>Информация о объекте</h4>
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
 				<h4>Информация о счетчике</h4>
				Тип: '.$row3[0]['Type_count'].';
				<br>Марка: '.$row3[0]['Mark_count'].';  </br>
				Год выпуска: '.$row3[0]['Year_release_count'].';
				<br>Класс точности: '.$row3[0]['Class_accur_count'].';  </br>
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
    			<a href="..\View\add_change_count.php?id_count='.$id_count.';"> Добавить данные о замене счетчика</a>
    			<br>
    			<a href="..\View\add_dimension.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить данные об измерениях</a>';


				}
			?>
			</div>
		</div>

		<div class="row">
		<div class="col-sm-6">

		<?php
			if (prov_dimension($id_obj,$user_id)==1)
			{
			echo
 			'<div class="container">
 			<h4>Данные о измерениях</h4>
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
    		<a href="..\View\add_transfor_cur.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить трансформатор тока</a>
    		<br>
    		<a href="..\View\add_transfor_vol.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Добавить трансформатор напряжения</a></br>';


			}
		?>
		</div>
		<div class="col-sm-6">
			<?php 
				if (prov_change_count($id_count)==1)
				{
					echo 
					'<div class="container">
 					<h4>Данные о замене счетчика</h4>
 					Дата:'.$change_count[0]['Date_change'].';
 					<br>Причина замены:'.$change_count[0]['Cause_change'].';</br>
 					Кто менял (ФИО):'.$change_count[0]['FIO_change'].';
 					<br>Номер старого счетчика:'.$change_count[0]['Nomber_old'].';</br>
 					Номер нового счетчика:'.$change_count[0]['Nomber_new'].';
 					<a href="..\View\del_change_count.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить данные о замене счетчика</a>
     				<br>
     				<a href="..\View\edit_change_count.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать данные о замене счетчика</a>
					';


				}
			?>
		</div>
	</div>



		<div class="row">
		<div class="col-sm-6">
			<?php
				if (prov_transfor_cur($id_obj,$user_id)==1)
				{	echo
				'<div class="container">
				<h4>Информация о трансформаторе тока</h4>
				Тип: '.$tr_cur[0]['Type_tr_cur'].';
				<br>Марка: '.$tr_cur[0]['Mark_tr_cur'].';  </br>
				Номинал: '.$tr_cur[0]['Denomin_tr_cur'].';
				<br>Год выпуска: '.$tr_cur[0]['Year_release_tr_cur'].';  </br>
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
		<div class="col-sm-6">
			<?php
			if (prov_plombs($id_tr_cur)==1)
				{ echo
				'<div class="container">
				<h4>Информация о пломбах</h4>
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
		</div>
	</div>

	<?php
	if (prov_tr_vol($id_obj,$user_id)==1)
		{
			echo 
			'<div class="container">
			<h4>Информация о трансформаторе напряжения</h4>
				Тип: '.$tr_vol[0]['Type_tr_vol'].';
				<br>Марка: '.$tr_vol[0]['Mark_tr_vol'].';  </br>
				Номинал: '.$tr_vol[0]['Denomin_tr_vol'].';
				<br>Пломбы: '.$tr_vol[0]['Plomb_tr_vol'].';</br>
			</div>
			<a href="..\View\del_transfor_vol.php?user_id='.$user_id.'&id_obj='.$id_obj.'; "> Удалить трансформатор напряжения</a>
     			<br>
     			<a href="..\View\edit_transfor_vol.php?user_id='.$user_id.'&id_obj='.$id_obj.';"> Редактировать трансформатор напряжения</a>';

		}
	
	?>

<!-- <a href="../View/add_transfor_vol.php?user_id='.$user_id.'; ?>"> Добавить трансформатор напряжения</a> -->
