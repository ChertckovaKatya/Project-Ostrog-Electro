<?php

include '.\biblioticdib.php';
include '..\Model\cons.php';
include '..\Model\delete.php';

echo $head;
 
 $user_id = $_GET["user_id"];

$row=cust_table($user_id);

if(!empty($_GET["user_id"]))
{
	del_cons($_GET["user_id"]);
}


?>
<div class="container"> 
	ФИО: <?php echo $row[0]['Name_consumer']; ?>
	<br>Телефон:<?php echo $row[0]['Phone_consumer']; ?> </br>
</div>
	<form>
	<div class="button-container">
     	 <input class="btn btn-success" type="submit" value="Удалить пользователя" />
    </div>
    </form>