<!DOCTYPE html>
<html>
<head>
<link href="../css/consumer.css" rel="stylesheet">
</head>
</html>

<?php
include '.\biblioticdib.php';
include '..\Model\cons.php';

  $rows = 20;
	$cols = 20;

 $row=cons_table();
 
// echo var_dump($row);
 //echo 'test'.$row[0]['id_consumer'];
 
?>
<div class="container">
		<table class="table">
			<tr><td>Наименование потребителя</td><td>Телефон</td><td>Лицевой счет</td></tr>

	<?php
		for ($tr=0; $tr<=COUNT($row)-1; $tr++)
		{
   			echo '<tr>';
     		echo '<td><a name=\'Потребитель '.$row[$tr]['Name_consumer']. ' \' href=\'customer.php?user_id='.$row[$tr]['id_consumer'].'\' >'.$row[$tr]['Name_consumer'].'</a>
      		<td>'.$row[$tr]['Phone_consumer'].'</td>';

			echo '</tr>';
    		//echo var_dump($row[$tr]);
		}

 	echo '</table>';
?>

	
</div>

