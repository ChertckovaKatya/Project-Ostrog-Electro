<?php
include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/cons.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}
?> 
<!DOCTYPE html>
<body>
  	<div class="container">
    	<form class="form-container" action="sched_inspection.php" method="POST">

    		<div class="form-group">
        		<label  for="name">Выберите дату</label>
        		<input type="date" name="Date_inspect" class="form-control" >
       		</div>
       		<div class="button-container">
         		 <input autofocus class="btn btn-success" type="submit" value="Поиск">
        	</div>
    	</form>
    </div>
</body>


<?php
	if (!empty($_POST['Date_inspect']))
	{
  
		$row=sched_inspect($_POST['Date_inspect']);
	}
  //var_dump($row);

?>

<div class="container">
     <?php
      if (!empty($_POST['Date_inspect']))
      {
        $date=$_POST['Date_inspect'];
        ?>
        <li><a href="..\View\import_sched_inspection.php?date=<?php echo $date; ?>">Сохранение в Excel</a></li>
      <?php
      echo '<h2>'. $date.'</h2>';
      }
      ?>
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
