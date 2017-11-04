<?php

include './biblioticdib.php';
include '../Model/delete.php';

if(!empty($_GET["id_all"]) AND !empty($_GET["id_date_list"]) AND !empty($_GET["type_pr"]))
{
	$result=del_all_dates($_GET["id_all"],$_GET["id_date_list"],$_GET["type_pr"]);

	switch ($result)
         {
            case "Del":
             echo "Дата удалена";
              break;
            case "Err":
              echo "Дата не удалена";
              break;
          }
}

?>