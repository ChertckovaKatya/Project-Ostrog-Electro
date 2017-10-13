<?php

include '.\biblioticdib.php';
include '..\Model\add.php';


$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];

?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_transfor_vol.php" method="POST">
 		<div class="form-group">
     	 	<label for="name">Тип</label>
      		<input name="Type_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Марка</label>
      		<input name="Mark_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Номинал</label>
      		<input name="Denomin_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Пломбы</label>
      		<input name="Plomb_tr_vol" class="form-control">
    	</div>
    	  <div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
      </div>
      <div>
          <input type="hidden" name="id_obj" value = <?php echo (int) $id_obj;?> >
      </div>
      <div class="button-container">
          <input autofocus class="btn btn-success" type="submit" value="Добавить">
      </div>
  </form>
</div>
    <?php

    if(!empty($_POST['Type_tr_vol']) AND !empty($_POST['Mark_tr_vol']) AND !empty($_POST['Denomin_tr_vol']) AND !empty($_POST['Plomb_tr_vol'] ) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']))
    {
        $result =  add_tr_vol(($_POST['Type_tr_vol']),($_POST['Mark_tr_vol']),($_POST['Denomin_tr_vol']),($_POST['Plomb_tr_vol']),($_POST['id_obj']),($_POST['user_id']));
        
        switch ($result)
         {
            case "Add":
             echo "Трансформатор напряжения успешно добавлен";
              break;
            case "Err":
              echo "Трансформатор напряжения не добавлен";
              break;
            
         }
    }
?>