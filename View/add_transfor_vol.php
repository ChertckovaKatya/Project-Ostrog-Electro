<?php

include '.\biblioticdib.php';
include '..\Model\add.php';

echo $head;	

// echo var_dump($_GET);
$tr_id= trans_vol();

$user_id = $_GET["user_id"];

?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_object.php" method="POST">
 		<div class="form-group">
     	 	<label for="name">Тип</label>
      		<input type="Type_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Марка</label>
      		<input type="Mark_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Номинал</label>
      		<input type="Denomin_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Пломбы</label>
      		<input type="Plomb_tr_vol" class="form-control">
    	</div>

     	<div class="form-group">
      		<label for="name">Дата госпроверки</label>
      		<input type="Date_gospr_tr_vol" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Дата следующей проверки</label>
      		<input type="Date_next_tr_vol" class="form-control">
    	</div>
    	<input type="hidden" name="user_id" value = <?php echo $user_id;?> >
    </form>
</div>
    <?php

    if(!empty($_POST['Type_tr_vol']) AND !empty($_POST['Mark_tr_vol']) AND !empty($_POST['Denomin_tr_vol']) AND !empty($_POST['Plomb_tr_vol'] ) AND !empty($_POST['Date_gospr_tr_vol']) AND !empty($_POST['Date_next_tr_vol']) AND !empty($POST["$user_id"]))
    {
        $result =  add_tr_vol(($_POST['Type_tr_vol']),($_POST['Mark_tr_vol']),($_POST['Denomin_tr_vol']),($_POST['Plomb_tr_vol']),($_POST['Date_gospr_tr_vol']),($_POST['Date_next_tr_vol']),($_POST['$user_id']));
        
        switch ($result)
         {
            case "Add_object":
             echo "Трансформатор напряжения успешно добавлен";
              break;
            case "Err-object":
              echo "Трансформатор напряжения не добавлен";
              break;
            
         }
    }
?>