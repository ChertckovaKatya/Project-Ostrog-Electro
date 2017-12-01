<?php

include './biblioticdib.php';
include '../Model/delete.php';

$id_tr_vol=$_GET["id_tr_vol"];
$user_id = $_GET["user_id"];

if(!empty($id_tr_vol) AND !empty($user_id))
{
	$result=del_transfor_vol($id_tr_vol);
  $user_id = $_GET['user_id'];
	switch ($result)
         {
            case "Del":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Трансформатор напряжения успешно удален');
                window.location="customer.php?user_id="+a;
                </script>
            <?php  
             // echo "Трансформатор напряжения успешно удален";
              break;
            case "Err":
              echo "Трансформатор напряжения не удалён";
              break;
          }
}
?>