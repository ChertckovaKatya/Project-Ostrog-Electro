<?php 

	include './biblioticdib.php';
	include '../Model/edit.php';


	global $m;
	
	if (!empty($_POST['Date_change']) AND !empty($_POST['Cause_change']) AND !empty($_POST['FIO_change']) AND !empty($_POST['Nomber_old'])	AND !empty($_POST['Nomber_new']) AND !empty($_GET['id_change']) AND !empty($_GET['user_id']))
	{
		$result= edit_change_count_update($_POST['Date_change'],$_POST['Cause_change'],$_POST['FIO_change'],$_POST['Nomber_old'],$_POST['Nomber_new'],$_GET['id_change']);
		  $user_id = ($_GET['user_id']);
		switch ($result)
         {
            case "Edit":
            	?>
              		<script>
                		var a = "<?php echo $user_id ?>";
                		alert ('Данные о замене счетчика успешно отредактированы');
                		window.location="customer.php?user_id="+a;
                	</script>
            	<?php  
             // echo "Данные о замене счетчика успешно отредактированы";
            break;
            case "Err":
              echo "Данные о замене счетчика не отредактированы";
            break;         
          }
	}
?>
