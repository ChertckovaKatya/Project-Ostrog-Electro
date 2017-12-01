<?php 


include './biblioticdib.php';
include '../Model/edit.php';
$user_id = $_GET["user_id"];

global $s;
$s=0;
if(!empty($_POST['Name']) AND !empty($_POST['Phone_consumer']) AND !empty($_GET["user_id"]) AND !empty($_POST["Face"]) AND !empty($_POST['Personal_account']))
    {
        $result =  edit_cons2(($_POST['Name']), ($_POST['Phone_consumer']),$_GET["user_id"],$_POST["Face"],($_POST['Personal_account']));

        $user_id = ($_GET['user_id']);
        switch ($result)
         {
            case "Edit_cons":
             // echo "Пользователь отредактирован";
             ?>
               <script>
                 var a = "<?php echo $user_id ?>";
                 alert ('Пользователь успешно отредактирован');
                 window.location="customer.php?user_id="+a;
                 </script> 
               <?php       
              break;
            case "Err-edit":
              echo "Пользователь не отредактирован";
              break;         
          }
    }
   

?>