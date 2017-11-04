<?php 

include './biblioticdib.php';
include '../Model/edit.php';


global $o;
$o=0;
if(!empty($_POST['Owner_FIO']) AND !empty($_POST['Renter_FIO'])  AND !empty($_POST['Name_object'])  AND !empty($_POST['Mailing_address'])  AND !empty($_POST['Phone_object'])  AND !empty($_POST['Source_of_power'])  AND !empty($_POST['Voltage_class'])  AND !empty($_POST['Date_instrumental_check']) AND !empty($_GET["id_obj"]))

    {
        $result =  edit_object_update($_POST['Owner_FIO'],$_POST['Renter_FIO'],$_POST['Name_object'],$_POST['Mailing_address'],$_POST['Phone_object'],$_POST['Source_of_power'],$_POST['Voltage_class'],$_POST['Date_instrumental_check'],$_GET["id_obj"]);

        switch ($result)
         {
            case "Edit_obj":
             echo "Объект успешно отредактирован";
             $o=1;
           
             
              break;
            case "Err-edit-obj":
              echo "Объект не отредактирован";
              break;         
          }
    }
   
    // if ($o==1)
    // {
    // 	header ('Location: consumer.php');

    // }

?>