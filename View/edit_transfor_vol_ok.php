<?php 

include './biblioticdib.php';
include '../Model/edit.php';


global $m;
$m=0;
	if(!empty($_POST['Type_tr_vol']) AND !empty($_POST['Mark_tr_vol']) AND !empty($_POST['Denomin_tr_vol']) AND !empty($_POST['Plomb_tr_vol']) AND !empty($_GET['id_tr_vol']))
	{
		        $result =  edit_transfor_vol_update(($_POST['Type_tr_vol']),($_POST['Mark_tr_vol']),($_POST['Denomin_tr_vol']),($_POST['Plomb_tr_vol']),($_GET['id_tr_vol']));

		        switch ($result)
         {
            case "Edit":
             echo "Трансформатор напряжения успешно отредактирован";
             $m=1;
           
             
              break;
            case "Err":
              echo "Трансформатор напряжения не отредактирован";
              break;         
          }
	}

?>