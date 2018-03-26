<?php
include './biblioticdib.php';
include '../Model/edit.php';
include '../Model/cons.php';

$id_tr_vol = $_GET["id_tr_vol"];
$user_id = $_GET["user_id"];
$id_obj=$_GET["id_obj"];
edit_transfor_vol($_GET["id_tr_vol"]);
$row=cust_conclusion($_GET["user_id"]);
?>
<!DOCTYPE html>
<div class="container">
   Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
	<form class="form-container" action="edit_transfor_vol_ok.php?user_id=<?php echo (int)$user_id; ?>&id_obj=<?php echo (int)$id_obj; ?>" method="POST">
    	<div class="form-group">
    		<label for="name">Тип:</label>
      		<input name="Type_tr_vol" class="form-control" value="<?php echo $type_tr; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Марка:</label>
      		<input name="Mark_tr_vol" class="form-control" value="<?php echo $mark_tr; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Номинал:</label>
      		<input name="Denomin_tr_vol" class="form-control" value="<?php echo $denomin_tr; ?>">
    	</div>
      <div class="form-group">
          <label for="name">Пломбы</label>
          <input name="Plomb_tr_vol" class="form-control" value="<?php echo $plomb_tr; ?>">
      </div>
      <div class="button-container">
          <input autofocus class="btn btn-success" type="submit" value="Готово">
      </div>
  </form>
</div>

