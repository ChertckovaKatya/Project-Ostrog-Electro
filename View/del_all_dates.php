<?php

include './biblioticdib.php';
include '../Model/delete.php';

if(!empty($_GET["id_all"]) AND !empty($_GET["id_date_list"]) AND !empty($_GET["type_pr"]) AND !empty($_GET["user_id"]))
{
	$result=del_all_dates($_GET["id_all"],$_GET["id_date_list"],$_GET["type_pr"]);
 $user_id = ($_GET['user_id']);
	switch ($result)
         {
            case "Del":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Дата удалена');
                window.location="customer.php?user_id="+a;
                </script>
            <?php 
             // echo "Дата удалена";
              break;
            case "Err":
              echo "Дата не удалена";
              break;
          }
}

?>