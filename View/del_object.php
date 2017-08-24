<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';

echo $head;


if(!empty($_GET["user_id"]))
{
	$result=del_object($_GET["user_id"]);

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