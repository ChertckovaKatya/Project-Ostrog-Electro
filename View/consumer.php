
<html>
<head>
<link href="../css/consumer.css" rel="stylesheet">
</head>
</html>

<?php
include '.\biblioticdib.php';
include '..\Model\cons.php';
echo $head;
  $rows = 20;
	$cols = 20;

 $row=cons_table();
 
// echo var_dump($row);
 //echo 'test'.$row[0]['id_consumer'];
 
?>
<div class="table-responsive">
	<table class="table">
	<tr><td>Id пользователя</td><td>Имя Фамилия Отчество</td><td>Телефон</td></tr>

<?php
for ($tr=0; $tr<=COUNT($row)-1; $tr++)
{
    echo '<tr>';
      echo '<td><a name=\'Потребитель '.$row[$tr]['id_consumer']. ' \' href=\'customer.php?user_id='.$row[$tr]['id_consumer'].'\' >'.$row[$tr]['id_consumer'].'</a>
      <td>'.$row[$tr]['Name_consumer'].'</td><td>'.$row[$tr]['Phone_consumer'].'</td>';

    echo '</tr>';
    //echo var_dump($row[$tr]);
}

 echo '</table>';
?>

</div>

