<?php

include "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/add.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}

$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
$row=cust_conclusion($_GET["user_id"]);

?>
<!DOCTYPE html>
<div class="container">
   Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
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
        $user_id = ($_POST['user_id']);
        switch ($result)
         {
            case "Add":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Трансформатор напряжения успешно добавлен');
                 window.location="customer.php?user_id="+a;
              </script>
            <?php  
              break;
            case "Err":
              echo "Трансформатор напряжения не добавлен";
              break;
            
         }
    }
?>