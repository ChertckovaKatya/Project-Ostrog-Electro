<!DOCTYPE html>
<link href="../css/consumer.css" rel="stylesheet">

<?php
include '.\biblioticdib.php';
include '..\Model\cons.php';
 $row=cons_table(0,0,0);
 
 
?>
<!-- <div class="container" action="consumer_search.php" method="POST">
	<div class="form-inline">
		<input type="text" name="Text_search" class="form-control">
			<select name="Search">
            	<option value="1">По названию</option>
            	<option value="2">По номеру счетчика</option>
        	</select>
    	<div class="button-container">
     		<input autofocus class="btn btn-success" type="submit" value="Поиск">
   		</div>
    </div>
</div>
<br></br>
<br></br> -->
	<div class="container">
		<table class="table table-striped">
			<tr><td>Наименование потребителя</td><td>Телефон</td><td>Лицевой счет</td></tr>

	<?php
		for ($tr=0; $tr<=COUNT($row)-1; $tr++)
		{
   			echo '<tr>';
     		echo '<td><a name=\'Потребитель '.$row[$tr]['Name_consumer']. ' \' href=\'customer.php?user_id='.$row[$tr]['id_consumer'].'\' >'.$row[$tr]['Name_consumer'].'</a>
      		<td>'.$row[$tr]['Phone_consumer'].'</td><td>'.$row[$tr]['Personal_account'].'</td>';

			echo '</tr>';
    		//echo var_dump($row[$tr]);
		}

 	echo '</table>';
?>
</div>
	




