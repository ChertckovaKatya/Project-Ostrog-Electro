<?php

include "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/add.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}
$id_count = $_GET["id_count"];
$user_id = $_GET["user_id"];
$row=cust_conclusion($_GET["user_id"]);

?>
<!DOCTYPE html>
<div class="container">
    Наименование потребителя: <?php echo $row[0]['Name_consumer']; ?>
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
        <div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
      </div>
	</form>
</div>
<?php
	if (!empty($_POST['Date_change']) AND !empty($_POST['Cause_change']) AND !empty($_POST['FIO_change']) AND !empty($_POST['Nomber_old']) AND !empty($_POST['Nomber_new']) AND !empty($_POST['id_count']) AND !empty($_POST['user_id']))
	{
		$result=add_change_count($_POST['Date_change'],$_POST['Cause_change'],$_POST['FIO_change'],$_POST['Nomber_old'],$_POST['Nomber_new'],$_POST['id_count']);

       $user_id = $_POST['user_id'];
			switch ($result)
         	{
            	case "Add":
              // echo "Информация о замене счетчика успешно добавлена";
              ?>
                <script>
                 var a = "<?php echo $user_id ?>";
                  alert ('Информация о замене счетчика успешно добавлена');
                  window.location="customer.php?user_id="+a;
                </script>
              <?php  
             	 break;
            	case "Err":
              	echo "Информация о замене счетчика не добавлена";
              	break;

         	  }

	}


?>