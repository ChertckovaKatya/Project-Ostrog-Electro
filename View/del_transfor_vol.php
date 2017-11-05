<?php

include './biblioticdib.php';
include '../Model/delete.php';

$id_tr_vol=$_GET["id_tr_vol"];


if(!empty($id_tr_vol))
{
	$result=del_transfor_vol($id_tr_vol);

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