<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';




if(!empty($_GET["id_tr_cur"]) AND !empty($_GET["id_plomb"]) AND !empty($_GET["phase"]))
{
	$result=del_plombs($_GET["id_tr_cur"],$_GET["id_plomb"],$_GET["phase"]);

	switch ($result)
         {
            case "Del":
             echo "Данные о пломбах успешно удалены";
              break;
            case "Err":
              echo "Данные о пломбах не удалены";
              break;
          }
}
?>