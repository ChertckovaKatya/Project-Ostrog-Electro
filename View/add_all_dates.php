<?php
include '.\biblioticdib.php';
include '..\Model\add.php';

$id_all = $_GET["id_all"];
$type_pr= $_GET["type_pr"];
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
          		<option value="2">Госпроверка счетчика</option>';
          		}
          		if($type_pr==2)
       			{
       			echo'
          		<option value="3">Следующая проверка трансформатора тока</option>
          		<option value="4">Госпроверка трансформаторая тока</option>';
          		}
          		if($type_pr==3)
       			{
       			echo'
          		<option value="5">Следующая проверка трансформатора напряжения </option>
          		<option value="6">Госпроверка трансформатора напряжения</option>';
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

    	<div class="button-container">
    		<input autofocus class="btn btn-success" type="submit" value="Добавить">
    	</div>
	</form>
</div>

<?php
if(!empty($_POST['Type']) AND !empty($_POST['Date']) AND !empty($_POST['Conclusio']) AND !empty($_POST['Notes']) AND !empty($_GET['id_all']))
    {
        $result =  add_all_dates(($_POST['Type']), ($_POST['Date']),($_POST['Conclusio']),($_POST['Notes']),$_GET['id_all']);

        switch ($result)
         {
            case "Add":
             echo "Дата успешно добавлена";
              break;
            case "Err":
              echo "Дата не добавлена";
              break;
            // case "Ok":
            //   echo "Вы успешно авторизировались на сайте!";
            //    break;
          }
    }
?>


