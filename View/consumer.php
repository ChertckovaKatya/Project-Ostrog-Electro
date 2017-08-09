<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';
echo $head;
  $rows = 20;
	$cols = 20;

 $row=cons_table();
 
 echo var_dump($row);

for ($tr=0; $tr<=COUNT($row)-1; $tr++)
{
    echo '<tr>';
      echo '<td><a name=\'Потребитель '.$row['id_consumer'[$tr]]. ' \' href=\'customer.php?user_id='.$row['id_consumer'[$tr]].'\' >'.$row['id_consumer'[$tr]].'</a>
      <td>'.$row['Name_consumer'[$tr]].'</td><td>'.$row['Phone_consumer'[$tr]].'</td>';

    echo '</tr>';
    echo var_dump($row[$tr]);
}

echo '</table>';
?>
<body>
<table border="1">
<tr><td>Id пользователя</td><td>Имя Фамилия Отчество</td><td>Телефон</td></tr>

</table>
</body>
