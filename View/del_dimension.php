<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';

echo $head;


if(!empty($_GET["user_id"]) AND !empty($_GET["id_obj"]))
{
	$result=del_dimension($_GET["user_id"],($_GET["id_obj"]));

	switch ($result)
         {
            case "Del_dim":
             echo "Данные об измерениях успешно удалены";
              break;
            case "Err_del-dim":
              echo "Данные об измерениях не удалены";
              break;
          }
}
?>