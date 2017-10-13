<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';




if(!empty($_GET["user_id"]) AND !empty($_GET["id_obj"]))
{
	$result=del_transfor_vol($_GET["user_id"],($_GET["id_obj"]));

	switch ($result)
         {
            case "Del":
             echo "Трансформатор напряжения успешно удален";
              break;
            case "Err":
              echo "Трансформатор напряжения не удалён";
              break;
          }
}
?>