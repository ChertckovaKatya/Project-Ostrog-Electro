<?php 

include '.\biblioticdib.php';
include '..\Model\edit.php';


global $m;
$m=0;

	if (!empty($_POST['L1']) AND !empty($_POST['L2']) AND !empty($_POST['I1']) AND !empty($_POST['I2']) AND !empty($_POST['Other_places_plomb']) AND !empty($_GET['id_tr_cur']) AND !empty($_GET['id_plomb']) AND !empty($_POST['Phase']))
	{
		$result =  edit_plombs_update(($_POST['L1']),($_POST['L2']),($_POST['I1']),($_POST['I2']),($_POST['Other_places_plomb']),($_GET['id_tr_cur']),($_GET['id_plomb']),($_POST['Phase']));
		switch ($result)
         {
            case "Edit":
             echo "Данные о пломбах успешно отредактированы";
             $m=1;
           
             
              break;
            case "Err":
              echo "Данные о пломбах не отредактированы";
              break;         
          }
	}