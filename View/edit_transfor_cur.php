<?php
include './biblioticdib.php';
include '../Model/edit.php';

$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
edit_transfor_cur($_GET["user_id"],$_GET["id_obj"]);
?>

<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="edit_transfor_cur_ok.php?user_id=<?php echo (int)$user_id; ?>&id_obj=<?php echo (int)$id_obj; ?>" method="POST">
    	<div class="form-group">
    		<label for="name">Тип:</label>
      		<input name="Type_tr_cur" class="form-control" value="<?php echo $type; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Марка:</label>
      		<input name="Mark_tr_cur" class="form-control" value="<?php echo $mark; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Номинал:</label>
      		<input name="Denomin_tr_cur" class="form-control" value="<?php echo $denomin; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Год выпуска:</label>
      		<input type="date" name="Year_release_tr_cur" class="form-control" value="<?php echo $year_rel; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока фА:</label >
      		<input name="Num_tr_cur_fa" class="form-control" value="<?php echo $fa_cur; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока фБ:</label >
      		<input name="Num_tr_cur_fb" class="form-control" value="<?php echo $fb_cur; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока фС:</label >
      		<input name="Num_tr_cur_fc" class="form-control" value="<?php echo $fc_cur; ?>">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>