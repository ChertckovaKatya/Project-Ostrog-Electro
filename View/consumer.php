<?php
include "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/cons.php';

if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}

$id=0;
$id=$_GET['id'];
$Text_search=$_GET['Text_search'];
$Search=$_GET['Search'];
$row=cons_table($id,$Text_search,$Search,$_GET['id_face']);
$quantity=kol_face();
//var_dump($quantity);

?>
 
<!DOCTYPE html>
  <head>
  </head>
  <body>
  <div class="container" >
    <div class="row">
       <a href="..\View\export.php"><span class="glyphicon glyphicon-floppy-disk"></span></a> 
      <div class="col-sm-12">
		    <form class="well form-search">
		      <input type="text" name="Text_search" class="span3 search-query">
		      <select name="Search">
            <option value="1">По названию</option>
            <option value="2">По номеру счетчика</option>
             <option value="3">По лицево счету</option>
          </select>
          <input type="hidden" name="id" value ="1" >
     	    <input autofocus class="btn" type="submit" value="Поиск"> <span class="badge"></span> 
   	    </form>
      </div>
      <div class="col-sm-12">
        <ul class="breadcrumb">
  		    <li><a href="?id_face=1">Юридические  </a><span class="badge"><?php echo $quantity[0]['COUNT(*)'] ?></span></li>
  		    <li><a href="?id_face=2">Физические лица </a><span class="badge"><?php echo $quantity[1]['COUNT(*)'] ?></span></li>
          <li><a href="?id_face=3">Многоквартирные дома </a><span class="badge"><?php echo $quantity[2]['COUNT(*)'] ?></span></li>
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

	         ?>
        </table>
      </div>
    </div>
  </div>
</body>

	




