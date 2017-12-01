<?php

include './biblioticdib.php';
include '../Model/delete.php';




if(!empty($_GET["id_tr_cur"]) AND !empty($_GET["id_plomb"]) AND !empty($_GET["phase"]) AND !empty($_GET["user_id"]))
{
	$result=del_plombs($_GET["id_tr_cur"],$_GET["id_plomb"],$_GET["phase"]);
  $user_id = $_GET['user_id'];
	switch ($result)
         {
            case "Del":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Данные о пломбах успешно удалены');
                window.location="customer.php?user_id="+a;
                </script>
            <?php  
             // echo "Данные о пломбах успешно удалены";
              break;
            case "Err":
              echo "Данные о пломбах не удалены";
              break;
          }
}
?>