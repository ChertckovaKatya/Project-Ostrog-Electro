<?php
include './biblioticdib.php';
include '../Model/edit.php';
$type_pr=$_GET['type_pr'];
$type_all=$_GET['type_all'];
$id_all=$_GET['id_all'];
$type_pr=$_GET['type_pr'];
$id_date_list=$_GET['id_date_list'];
edit_all_date(($_GET['id_all']),($_GET['id_date_list']),($_GET['type_all']),($_GET['type_pr']));
?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="edit_all_dates_ok.php" method="POST">
		<div class="form-group">
       			<?php
       			if($type_pr==1)
       			{
       				if ($type_all==1)
       				{
       					echo'
       					<select name="Type">
          				<option selected value="1">Следующая проверка счетчика</option>
          				<option value="2">Госповерка счетчика</option>
          				</select>';
          			}
          			if ($type_all==2)
       				{
       					echo'
       					<select name="Type">
          				<option value="1">Следующая проверка счетчика</option>
          				<option selected value="2">Госповерка счетчика</option>
          				</select>';
          			}
          			
          		}
          		if($type_pr==2)
       			{
       				if ($type_all==3)
       				{
       					echo'
       					<select name="Type">
          				<option selected value="3">Следующая проверка трансформатора тока</option>
          				<option value="4">Госповерка трансформаторая тока</option>
          				</select>';
          			}
          			if ($type_all==4)
          			{
          				echo'
          				<select name="Type">
          				<option value="3">Следующая проверка трансформатора тока</option>
          				<option selected value="4">Госповерка трансформаторая тока</option>
          				</select>';
          			}
          		}
          		if($type_pr==3)
       			{
       				if($type_all==5)
       				{
       					echo'
       					<select name="Type">
          				<option selected value="5">Следующая проверка трансформатора напряжения </option>
          				<option value="6">Госповерка трансформатора напряжения</option>
          				</select>';
          			}
          			if($type_all==6)
          			{
          				echo'
          				<select name="Type">
          				<option value="5">Следующая проверка трансформатора напряжения </option>
          				<option selected value="6">Госповерка трансформатора напряжения</option>
          				</select>';
          			}
          		}
          		?>
        	
   		</div>

		<div class="form-group">
     	 	<label for="name">Дата</label>
      		<input type="date" name="Date" class="form-control" value="<?php echo $date_all; ?>">
    	</div>
 		<div class="form-group">
     	 	<label for="name">Заключение по учету </label>
      		<input name="Conclusio" class="form-control" value="<?php echo $conclusio_all; ?>">
    	</div>

    	<div class="form-group">
      		<label for="name">Другое</label>
      		<input name="Notes" class="form-control" value="<?php echo $notes_all; ?>">
    	</div>

    	<div>
          <input type="hidden" name="id_all" value = <?php echo (int) $id_all;?> >
    	</div>

        <div>
          <input type="hidden" name="type_pr" value = <?php echo (int) $type_pr;?> >
    	</div>
    	<div>
          <input type="hidden" name="id_date_list" value = <?php echo (int) $id_date_list;?> >
    	</div>

    	<div class="button-container">
    		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>
