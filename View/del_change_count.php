<?php

include './biblioticdib.php';
include '../Model/delete.php';


if(!empty($_GET["id_change"]) AND !empty($_GET["user_id"]))
{
	$result=del_change_count($_GET["id_change"]);
 $user_id = ($_GET['user_id']);
	switch ($result)
         {
            case "Del":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Данные о замене счетчика успешно удалены');
                window.location="customer.php?user_id="+a;
                </script>
            <?php 
             // echo "Данные о замене счетчика успешно удалены";
              break;
            case "Err":
              echo "Данные о замене счетчика не удалены";
              break;
          }
}
?>