<?php
include '.\biblioticdib.php';
include '..\Model\edit.php';

$id_obj = $_GET["id_obj"];
edit_object($_GET["id_obj"]);
?>

<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="edit_object_ok.php?id_obj=<?php echo (int)$id_obj; ?>" method="POST">
 		<div class="form-group">
    		<label  for="name">Собственник</label>
    		<input type="text" name="Owner_FIO" class="form-control" value="<?php echo $ow_fio; ?>">
  		</div>

 		<div class="form-group">
    		<label  for="name">Арендатор</label>
   			<input type="text"  name="Renter_FIO" class="form-control" value="<?php echo $ren_fio; ?>">
  		</div>

  		<div class="form-group">
    		<label  for="name">Название объекта</label>
    		<input type="text" name="Name_object" class="form-control" value="<?php echo $nam_obj; ?>">
  		</div>

  		<div class="form-group">
    		<label  for="name">Почтовый адрес</label>
    		<input type="text" name="Mailing_address" class="form-control" value="<?php echo $mail_add; ?>">
 		</div>

 		<div class="form-group">
    		<label  for="name">Номер телефона</label>
    		<input type="text" name="Phone_object" class="form-control" value="<?php echo $phon_obj; ?>">
 		</div>

  		<div class="form-group">
    		<label  for="name">Источник питания</label>
    		<input type="text" name="Source_of_power" class="form-control" value="<?php echo $sour_of_pow; ?>">
  		</div>

  		<div class="form-group">
    		<label for="name">Класс напряжения</label>
    		<input type="text" name="Voltage_class" class="form-control" value="<?php echo $vol_cl; ?>">
  		</div>

 		<div class="form-group">
 			<label for="name">Дата инструментальной проверки</label>
			<input type="date" name="Date_instrumental_check" class="form-control" value="<?php echo $date_instr_check; ?>">
  		</div>
  		<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>