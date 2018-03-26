<?php
include './biblioticdib.php';
include '../Model/add.php';
include '../Model/cons.php';

$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
$row=cust_conclusion($_GET["user_id"]);

?>
<!DOCTYPE html>
<div class="container">
  Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
	<form class="form-container" action="add_dimension.php" method="POST">
		<div class="form-group">
     	 	<label for="name">Дата:</label>
      		<input type="date" name="Date_dimen" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Чередование фаз:</label>
      		<input name="Alter_phase" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Нагрузка в амперах фА:</label>
      		<input name="Load_fa" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Нагрузка в амперах фБ:</label>
      		<input name="Load_fb" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Нагрузка в амперах фС:</label>
      		<input name="Load_fc" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Cos фи:</label>
      		<input name="Cos_fi" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Количество оборотов диска:</label>
      		<input name="Kol_turn_disk" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Потребляемая мощность в КВт:</label>
      		<input name="Power_consum" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
    	<div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
    	</div>
    	<div>
          <input type="hidden" name="id_obj" value = <?php echo (int) $id_obj;?> >
    	</div>
	 </form>
</div>

<?php
	if(!empty($_POST['Date_dimen']) AND !empty($_POST['Alter_phase']) AND !empty($_POST['Load_fa']) AND !empty($_POST['Load_fb']) AND !empty($_POST['Load_fc']) AND !empty($_POST['Cos_fi']) AND !empty($_POST['Kol_turn_disk']) AND !empty($_POST['Power_consum']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']))
	{
		 $result =  add_dimension(($_POST['Date_dimen']),($_POST['Alter_phase']),($_POST['Load_fa']),($_POST['Load_fb']),($_POST['Load_fc']),($_POST['Cos_fi']),($_POST['Kol_turn_disk']),($_POST['Power_consum']),($_POST['id_obj']),($_POST['user_id']));

      $user_id = ($_POST['user_id']);
		 switch ($result)
         {
            case "Add_dim":
            ?>
             <script>
              var a = "<?php echo $user_id ?>";
             alert ('Данные об измерениях успешно добавлен');
             window.location="customer.php?user_id="+a;
            </script>
            <?php
              break;
            case "Err-dim":
              echo "Данные об измерениях не добавлены";
              break;

         }
	}

?>