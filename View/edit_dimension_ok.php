<?php 

include './biblioticdib.php';
include '../Model/edit.php';


global $m;
$m=0;
	if(!empty($_POST['Date_dimen']) AND !empty($_POST['Alter_phase']) AND !empty($_POST['Load_fa']) AND !empty($_POST['Load_fb']) AND !empty($_POST['Load_fc']) AND !empty($_POST['Cos_fi']) AND !empty($_POST['Kol_turn_disk']) AND !empty($_POST['Power_consum']) AND !empty($_GET['id_obj']) AND !empty($_GET['user_id']))
	{
		        $result =  edit_dimension_update(($_POST['Date_dimen']),($_POST['Alter_phase']),($_POST['Load_fa']),($_POST['Load_fb']),($_POST['Load_fc']),($_POST['Cos_fi']),($_POST['Kol_turn_disk']),($_POST['Power_consum']),($_GET['id_obj']),($_GET['user_id']));

		        switch ($result)
         {
            case "Edit_dim":
             echo "Данные об измерениях успешно отредактированы";
             $m=1;
           
             
              break;
            case "Err-edit-dim":
              echo "Данные об измерениях не отредактированы";
              break;         
          }
	}

?>