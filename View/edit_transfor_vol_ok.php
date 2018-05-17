<?php 

include_once "../Model/statususer.php";
include './biblioticdib.php';
include '../Model/edit.php';
if(status_user()==0) { 
header ('Location:../View/index.php'); 
exit(); 
}

	if(!empty($_POST['Type_tr_vol']) AND !empty($_POST['Mark_tr_vol']) AND !empty($_POST['Denomin_tr_vol']) AND !empty($_POST['Plomb_tr_vol']) AND !empty($_GET['id_obj']) AND !empty($_GET['user_id']))
	{
		        $result =  edit_transfor_vol_update(($_POST['Type_tr_vol']),($_POST['Mark_tr_vol']),($_POST['Denomin_tr_vol']),($_POST['Plomb_tr_vol']),($_GET['id_obj']),($_GET['user_id']));
            $user_id = $_GET['user_id'];
		        switch ($result)
         {
            case "Edit":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Трансформатор напряжения успешно отредактирован');
                window.location="customer.php?user_id="+a;
                </script>
            <?php  
             // echo "Трансформатор напряжения успешно отредактирован";
              break;
            case "Err":
              echo "Трансформатор напряжения не отредактирован";
              break;         
          }
	}

?>