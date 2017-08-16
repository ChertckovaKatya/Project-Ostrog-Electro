<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';

echo $head;
  $rows = 20;
  $cols = 20;
 $user_id = $_GET["user_id"];


// echo "Id пользолвателя:".$_GET["user_id"];
$row=cust_table($user_id);
?>

<div class="table-responsive">
	<table class="table">
	<tr><td>ФИО</td><tr>
	<tr><td>Телефон</td><tr>

<?php

    
      echo '<tr><td>'.$row[0]['Name_consumer'].'</td></tr><tr><td>'.$row[0]['Phone_consumer'].'</td></tr>';
 
    // echo '</tr>';
    
 echo '</table>';
?>

</div>
