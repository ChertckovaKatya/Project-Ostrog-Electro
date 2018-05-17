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
	$result=del_dimension($_GET["user_id"],($_GET["id_obj"]));
  $user_id = ($_GET['user_id']);
	switch ($result)
         {
            case "Del_dim":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Счетчик успешно добавлен');
                window.location="customer.php?user_id="+a;
              </script>
            <?php  
             // echo "Данные об измерениях успешно удалены";
              break;
            case "Err_del-dim":
              echo "Данные об измерениях не удалены";
              break;
          }
}
?>