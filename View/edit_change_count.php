<?php
include './biblioticdib.php';
include '../Model/edit.php';

$id_change=$_GET["id_change"];
$user_id = $_GET["user_id"];
edit_change_cunter($_GET["id_change"]);
?>

<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="edit_change_count_ok.php?id_change=<?php echo (int)$id_change; ?>&user_id=<?php echo (int)$user_id; ?>" method="POST">
 		<div class="form-group">
     	 	<label for="name">Дата замены</label>
      		<input  type="date" name="Date_change" class="form-control" value="<?php echo $date_change; ?>">
    	</div>

    	<div class="form-group">
      		<label for="name">Причина замены</label>
      		<input name="Cause_change" class="form-control" value="<?php echo $cause; ?>">
    	</div>

    	<div class="form-group">
      		<label for="name">Кто менял (ФИО)</label>
      		<input name="FIO_change" class="form-control" value="<?php echo $fio_change; ?>">
    	</div>

    	<div class="form-group">
      		<label for="name">Номер старого счетчика</label>
      		<input name="Nomber_old" class="form-control" value="<?php echo $nom_old; ?>">
    	</div>
    	<div class="form-group">
      		<label for="name">Номер нового счетчика</label>
      		<input name="Nomber_new" class="form-control" value="<?php echo $nom_new; ?>">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
      	</div>
	</form>
</div>