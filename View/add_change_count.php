<?php
include '.\biblioticdib.php';
include '..\Model\add.php';

$id_count = $_GET["id_count"];


?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_change_count.php" method="POST">
 		<div class="form-group">
     	 	<label for="name">Дата замены</label>
      		<input  type="date" name="Date_change" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Причина замены</label>
      		<input name="Cause_change" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Кто менял (ФИО)</label>
      		<input name="FIO_change" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Номер старого счетчика</label>
      		<input name="Nomber_old" class="form-control">
    	</div>
    	<div class="form-group">
      		<label for="name">Номер нового счетчика</label>
      		<input name="Nomber_new" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
    	<div>
          <input type="hidden" name="id_count" value = <?php echo (int) $id_count;?> >
    	</div>
	</form>
</div>
<?php
	if (!empty($_POST['Date_change']) AND !empty($_POST['Cause_change']) AND !empty($_POST['FIO_change']) AND !empty($_POST['Nomber_old']) AND !empty($_POST['Nomber_new']) AND !empty($_POST['id_count']))
	{
		$result=add_change_count($_POST['Date_change'],$_POST['Cause_change'],$_POST['FIO_change'],$_POST['Nomber_old'],$_POST['Nomber_new'],$_POST['id_count']);
			switch ($result)
         	{
            	case "Add":
              ?>
              <script>
                alert ('Информация о замене счетчика успешно добавлена');
                window.location="consumer.php";
              </script>
            <?php  
             	 break;
            	case "Err":
              	echo "Информация о замене счетчика не добавлена";
              	break;

         	}

	}


?>