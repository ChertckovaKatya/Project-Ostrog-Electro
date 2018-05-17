<?php
include "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/cons.php';
 if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}
if (!empty($_POST["Text_search"]) AND !empty($_POST["search"]))
{
	$row=cons_table(1,($_POST["Text_search"]),($_POST["Search"]));
echo '
<div class="container">
		<table class="table table-striped">
			<tr><td>Наименование потребителя</td><td>Телефон</td><td>Лицевой счет</td></tr>';

	
		for ($tr=0; $tr<=COUNT($row)-1; $tr++)
		{
   			echo '<tr>';
     		echo '<td><a name=\'Потребитель '.$row[$tr]['Name_consumer']. ' \' href=\'customer.php?user_id='.$row[$tr]['id_consumer'].'\' >'.$row[$tr]['Name_consumer'].'</a>
      		<td>'.$row[$tr]['Phone_consumer'].'</td><td>'.$row[$tr]['Personal_account'].'</td>';

			echo '</tr>';
    		//echo var_dump($row[$tr]);
		}

 	echo '</table>';
 }
?>

	
</div>