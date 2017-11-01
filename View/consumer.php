<!DOCTYPE html>
<link href="../css/consumer.css" rel="stylesheet">

<?php
include '.\biblioticdib.php';
include '..\Model\cons.php';
// include '.\search.php';
$id=0;
$id=$_GET['id'];
$Text_search=$_GET['Text_search'];
$Search=$_GET['Search'];
$row=cons_table($id,$Text_search,$Search);
// echo $Text_search;
// echo $Search;
// echo 'Rsult:'.var_dump($row);
 
 
?>
<!-- <br></br> -->
<br></br>
<!DOCTYPE html>
<head>
</head>
<body>
<div class="container" >
	<form class="well form-search">
		<input type="text" name="Text_search" class="span3 search-query">
			<select name="Search">
            	<option value="1">По названию</option>
            	<option value="2">По номеру счетчика</option>
        	</select>
        	<input type="hidden" name="id" value ="1" >
    	<div class="button-container">
     		<input autofocus class="btn" type="submit" value="Поиск">
   		</div>
    </form>
</div>
</body>
<br></br>
<br></br>
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

	




