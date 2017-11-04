<?php 


include './biblioticdib.php';
include '../Model/edit.php';


global $s;
$s=0;
if(!empty($_POST['Name']) AND !empty($_POST['Phone_consumer']) AND !empty($_GET["user_id"]))
    {
        $result =  edit_cons2(($_POST['Name']), ($_POST['Phone_consumer']),$_GET["user_id"]);

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