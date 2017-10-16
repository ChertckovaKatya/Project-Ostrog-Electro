<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';


if(!empty($_GET["id_change"]))
{
	$result=del_change_count($_GET["id_change"]);

	switch ($result)
         {
            case "Del":
             echo "Данные о замене счетчика успешно удалены";
              break;
            case "Err":
              echo "Данные о замене счетчика не удалены";
              break;
          }
}
?>