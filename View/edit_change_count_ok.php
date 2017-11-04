<?php 

	include './biblioticdib.php';
	include '../Model/edit.php';


	global $m;
	$m=0;
	if (!empty($_POST['Date_change']) AND !empty($_POST['Cause_change']) AND !empty($_POST['FIO_change']) AND !empty($_POST['Nomber_old'])	AND !empty($_POST['Nomber_new']) AND !empty($_GET['id_change']))
	{
		$result= edit_change_count_update($_POST['Date_change'],$_POST['Cause_change'],$_POST['FIO_change'],$_POST['Nomber_old'],$_POST['Nomber_new'],$_GET['id_change']);
		switch ($result)
         {
            case "Edit":
             echo "Данные о замене счетчика успешно отредактированы";
             $m=1;
           
              break;
            case "Err":
              echo "Данные о замене счетчика не отредактированы";
              break;         
          }
	}
?>
