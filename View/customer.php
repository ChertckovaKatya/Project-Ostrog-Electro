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

	$result= del_cons($_GET["user_id"]);

	switch ($result)
         {
            case "Del_cons":
             echo "Пользователь успешно удален";
              break;
            case "Err_del-cons":
              echo "Пользователь не удален";
              break;
          }
}


?>
<form>
	<div class="container"> 
		ФИО: <?php echo $row[0]['Name_consumer']; ?>
		<br>Телефон:<?php echo $row[0]['Phone_consumer']; ?> </br>
	</div>
	<div class="button-container">
     	 <input class="btn btn-success" type="submit" value="Удалить пользователя" >
    </div>
</form>