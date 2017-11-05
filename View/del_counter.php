<?php

include './biblioticdib.php';
include '../Model/delete.php';



if(!empty($_GET["user_id"]) AND !empty($_GET["id_obj"]))
{
	$result=del_counter($_GET["user_id"],($_GET["id_obj"]));

	switch ($result)
         {
            case "Del_counter":
             echo "Счетчик успешно удален";
              break;
            case "Err_del-counter":
              echo "Счетчик не удален";
              break;
          }
}
?>