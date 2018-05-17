<?php

include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/delete.php';

if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}


if(!empty($_GET["user_id"]) AND !empty($_GET["id_obj"]))
{
	$result=del_transfor_cur($_GET["user_id"],($_GET["id_obj"]));
  $user_id = $_GET['user_id'];
	switch ($result)
         {
            case "Del_tr_cur":
              ?>
                <script>
                  var a = "<?php echo $user_id ?>";
                  alert ('Трансформатор тока успешно удален');
                  window.location="customer.php?user_id="+a;
                </script>
              <?php  
             // echo "Трансформатор тока успешно удален";
            break;
            case "Err_tr_cur":
              echo "Трансформатор тока не удалён";
            break;
          }
}
?>