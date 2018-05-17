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
	$result=del_counter($_GET["user_id"],($_GET["id_obj"]));
$user_id = ($_GET['user_id']);
	switch ($result)
         {
            case "Del_counter":
             ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Счетчик успешно удален');
                window.location="customer.php?user_id="+a;
                </script>
            <?php  
              break;
            case "Err_del-counter":
              echo "Счетчик не удален";
              break;
          }
}
?>