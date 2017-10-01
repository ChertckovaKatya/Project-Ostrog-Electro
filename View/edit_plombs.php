<?php
include '.\biblioticdib.php';
include '..\Model\edit.php';

$id_tr_cur = $_GET["id_tr_cur"];
$id_plomb = $_GET["id_plomb"];
edit_plombs($_GET["id_tr_cur"],$_GET["id_plomb"]);
?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="edit_plombs_ok.php?id_tr_cur=<?php echo (int)$id_tr_cur; ?>&id_plomb=<?php echo (int)$id_plomb; ?>" method="POST">
		<div class="form-group">
     	 	<label for="name">L1:</label>
      		<input name="L1" class="form-control"  value="<?php echo $L1_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">L2:</label>
      		<input name="L2" class="form-control"  value="<?php echo $L2_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">I1:</label>
      		<input name="I1" class="form-control"  value="<?php echo $I1_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">I2:</label>
      		<input name="I2" class="form-control"  value="<?php echo $I2_pl; ?>">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Другие места:</label>
      		<input name="Other_places_plomb" class="form-control"  value="<?php echo $other_pl; ?>">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>