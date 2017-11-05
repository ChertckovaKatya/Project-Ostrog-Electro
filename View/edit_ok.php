<?php 


include './biblioticdib.php';
include '../Model/edit.php';


global $s;
$s=0;
if(!empty($_POST['Name']) AND !empty($_POST['Phone_consumer']) AND !empty($_GET["user_id"]) AND !empty($_POST["Face"]))
    {
        $result =  edit_cons2(($_POST['Name']), ($_POST['Phone_consumer']),$_GET["user_id"],$_POST["Face"]);

        switch ($result)
         {
            case "Edit_cons":
             echo "Пользователь успешно отредактирован";
             $s=1;
           
             
              break;
            case "Err-edit":
              echo "Пользователь не отредактирован";
              break;         
          }
    }
   
    if ($s==1)
    {
    	header ('Location: consumer.php');

    }

?>