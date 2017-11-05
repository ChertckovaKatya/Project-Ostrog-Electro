<?php 


include '.\biblioticdib.php';
include '..\Model\edit.php';

if(!empty($_POST['Type']) AND !empty($_POST['Date']) AND !empty($_POST["Conclusio"]) AND !empty($_POST['Notes']) AND !empty($_POST['id_date_list']) )
    {
        $result =  edit_all_dates_ok(($_POST['Type']), ($_POST['Date']),$_POST["Conclusio"],$_POST['Notes'],$_POST['id_date_list']);

        switch ($result)
         {
            case "Edit":
             echo "Дата успешно отредактирована";
           
           
             
              break;
            case "Err":
              echo "Дата не отредактирована";
              break;         
          }
    }
   

?>