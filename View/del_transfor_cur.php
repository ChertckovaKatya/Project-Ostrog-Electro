<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';




if(!empty($_GET["user_id"]) AND !empty($_GET["id_obj"]))
{
	$result=del_transfor_cur($_GET["user_id"],($_GET["id_obj"]));

	switch ($result)
         {
            case "Del_tr_cur":
             echo "Трансформатор тока успешно удален";
              break;
            case "Err_tr_cur":
              echo "Трансформатор тока не удалён";
              break;
          }
}
?>