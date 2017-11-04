<?php

include './biblioticdib.php';
include '../Model/delete.php';


if(!empty($_GET["user_id"]))
{
	$result=del_cons($_GET["user_id"]);

	switch ($result)
         {
            case "Del_cons":
             echo "Пользователь успешно удален";
              break;
            case "Err_del-cons":
              echo "Пользователь не удален";
              break;
          }
}
?>