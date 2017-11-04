<?php

include './biblioticdib.php';
include '../Model/delete.php';



if(!empty($_GET["id_obj"]))
{
  
	$result=del_object($_GET["id_obj"]);

	switch ($result)
         {
            case "Del_obj":
             echo "Объект успешно удален";
              break;
            case "Err_del-obj":
              echo "Объект не удален";
              break;
          }
}
?>