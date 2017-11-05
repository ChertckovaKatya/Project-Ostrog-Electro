<?php
include '.\biblioticdib.php';
include '..\Model\add.php';

$id_all = $_GET["id_all"];
$type_pr= $_GET["type_pr"];
// echo $id_all;
// echo $type_pr;
?>

<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_all_dates.php" method="POST">
		<div class="form-group">
       		<select name="Type">
       			<?php
       			if($type_pr==1)
       			{
       			echo'
          		<option value="1">Следующая проверка счетчика</option>
          		<option value="2">Госповерка счетчика</option>';
          		}
          		if($type_pr==2)
       			{
       			echo'
          		<option value="3">Следующая проверка трансформатора тока</option>
          		<option value="4">Госповерка трансформаторая тока</option>';
          		}
          		if($type_pr==3)
       			{
       			echo'
          		<option value="5">Следующая проверка трансформатора напряжения </option>
          		<option value="6">Госповерка трансформатора напряжения</option>';
          		}
          		?>
        	</select>
   		</div>

		<div class="form-group">
     	 	<label for="name">Дата</label>
      		<input type="date" name="Date" class="form-control">
    	</div>
 		<div class="form-group">
     	 	<label for="name">Заключение по учету </label>
      		<input name="Conclusio" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Другое</label>
      		<input name="Notes" class="form-control">
    	</div>

    	<div>
          <input type="hidden" name="id_all" value = <?php echo (int) $id_all;?> >
    	</div>

        <div>
          <input type="hidden" name="type_pr" value = <?php echo (int) $type_pr;?> >
      </div>

    	<div class="button-container">
    		<input autofocus class="btn btn-success" type="submit" value="Добавить">
    	</div>
	</form>
</div>

<?php
if(!empty($_POST['Type']) AND !empty($_POST['Date']) AND !empty($_POST['Conclusio']) AND !empty($_POST['Notes']) AND !empty($_POST['id_all']) AND !empty($_POST['type_pr']))
    {
      
        $result =  add_all_dates(($_POST['Type']), ($_POST['Date']),($_POST['Conclusio']),($_POST['Notes']),($_POST['id_all']),($_POST['type_pr']));

        switch ($result)
         {
            case "Add":
            ?>
               <script>
             alert ('Дата успешно добавлена');
             window.location="consumer.php";
            </script>
            <?php             
              break;
            case "Err":
              echo "Дата не добавлена";
              break;
          }
    }
?>


