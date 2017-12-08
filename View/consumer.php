<!DOCTYPE html>
<link href="../css/consumer.css" rel="stylesheet">

<?php
include './biblioticdib.php';
include '../Model/cons.php';
// include './search.php';
$id=0;
$id=$_GET['id'];
$Text_search=$_GET['Text_search'];
$Search=$_GET['Search'];
$row=cons_table($id,$Text_search,$Search,$_GET['id_face']);
// var_dump($row);
 
 
?>
<!-- <br></br> -->
<!-- <br></br> -->
<!DOCTYPE html>
  <head>
  </head>
  <body>
  <div class="container" >
    <div class="row">
	   <!-- <form class="navbar-search pull-left""> -->
      <div class="col-sm-12">
		    <form class="well form-search">
		      <input type="text" name="Text_search" class="span3 search-query">
		      <select name="Search">
            <option value="1">По названию</option>
            <option value="2">По номеру счетчика</option>
             <option value="3">По лицево счету</option>
          </select>
          <input type="hidden" name="id" value ="1" >
     	    <input autofocus class="btn" type="submit" value="Поиск">
   	    </form>
      </div>

      <div class="col-sm-12">
        <ul class="breadcrumb">
  		    <li><a href="?id_face=1">Юридические</a></li>
  		    <li><a href="?id_face=2">Физические лица</a></li>
          <li><a href="?id_face=3">Многоквартирные дома</a></li>
        </ul>
      </div>

      <div class="col-sm-12">
        <table class="table table-striped">
          <tr><td>Номер</td><td>Наименование потребителя</td><td>Телефон</td><td>Лицевой счет</td></tr>

	         <?php
		         for ($tr=0; $tr<=COUNT($row)-1; $tr++)
		          {
                $num=$tr+1;
   			        echo '<tr>';
                echo '<td>'.$num.'</td><td><a name=\'Потребитель '.$row[$tr]['Name_consumer']. ' \' href=\'customer.php?user_id='.$row[$tr]['id_consumer'].'\' >'.$row[$tr]['Name_consumer'].'</a>
      		      <td>'.$row[$tr]['Phone_consumer'].'</td><td>'.$row[$tr]['Personal_account'].'</td>';

                echo '</tr>'; 
		          }
        echo '</table>';
	         ?>
      </div>
    </div>
  </div>
</body>

	




