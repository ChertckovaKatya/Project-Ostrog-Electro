<?php

include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/edit.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}
$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
edit_dimension($_GET["user_id"],$_GET["id_obj"]);
$row=cust_conclusion($_GET["user_id"]);
?>

<!DOCTYPE html>
<div class="container">
  Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
	<form class="form-container" action="edit_dimension_ok.php?user_id=<?php echo (int)$user_id; ?>&id_obj=<?php echo (int)$id_obj; ?>" method="POST">
    	<div class="form-group">
        <label for="name">Дата</label>
          <input type="date" name="Date_dimen" class="form-control" value="<?php echo $date; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Чередование фаз:</label>
      		<input name="Alter_phase" class="form-control" value="<?php echo $alter; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Нагрузка в амперах Фа:</label>
      		<input name="Load_fa" class="form-control" value="<?php echo $fa; ?>">
    	</div>
    	<div class="form-group">
      	<label for="name">Нагрузка в амперах Фб:</label>
      		<input name="Load_fb" class="form-control" value="<?php echo $fb; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Нагрузка в амперах Фс:</label>
      		<input name="Load_fc" class="form-control" value="<?php echo $fc; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Cos фи:</label>
      		<input name="Cos_fi" class="form-control" value="<?php echo $cos; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Количество оборотов диска:</label>
      		<input name="Kol_turn_disk" class="form-control" value="<?php echo $kol_turn; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Потребляемая мощность в КВт:</label>
      		<input name="Power_consum" class="form-control" value="<?php echo $power; ?>">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>