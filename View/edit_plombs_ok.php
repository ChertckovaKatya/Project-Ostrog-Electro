<?php 

include './biblioticdib.php';
include '../Model/edit.php';


global $m;
;

	if (!empty($_POST['L1']) AND !empty($_POST['L2']) AND !empty($_POST['I1']) AND !empty($_POST['I2']) AND !empty($_POST['Other_places_plomb']) AND !empty($_GET['id_tr_cur']) AND !empty($_GET['id_plomb']) AND !empty($_POST['Phase']) AND !empty($_GET["user_id"]))
	{
		$result =  edit_plombs_update(($_POST['L1']),($_POST['L2']),($_POST['I1']),($_POST['I2']),($_POST['Other_places_plomb']),($_GET['id_tr_cur']),($_GET['id_plomb']),($_POST['Phase']));
     $user_id = $_GET['user_id'];
		switch ($result)
         {
            case "Edit":
              ?>
                <script>
                  var a = "<?php echo $user_id ?>";
                  alert ('Данные о пломбах успешно отредактированы');
                  window.location="customer.php?user_id="+a;
                </script>
              <?php
             // echo "Данные о пломбах успешно отредактированы";
            
              break;
            case "Err":
              echo "Данные о пломбах не отредактированы";
              break;         
          }
	}