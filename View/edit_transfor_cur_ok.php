<?php 

include './biblioticdib.php';
include '../Model/edit.php';


global $m;

	if(!empty($_POST['Type_tr_cur']) AND !empty($_POST['Mark_tr_cur']) AND !empty($_POST['Denomin_tr_cur']) AND !empty($_POST['Year_release_tr_cur']) AND !empty($_POST['Num_tr_cur_fa']) AND !empty($_POST['Num_tr_cur_fb']) AND !empty($_POST['Num_tr_cur_fc'])  AND !empty($_GET['id_obj']) AND !empty($_GET['user_id']))
	{
		        $result =  edit_transfor_cur_update(($_POST['Type_tr_cur']),($_POST['Mark_tr_cur']),($_POST['Denomin_tr_cur']),($_POST['Year_release_tr_cur']),($_POST['Num_tr_cur_fa']),($_POST['Num_tr_cur_fb']),($_POST['Num_tr_cur_fc']),($_GET['id_obj']),($_GET['user_id']));
            $user_id = $_GET['user_id'];
		        switch ($result)
         {
            case "Edit_tr_cur":
              ?>
                <script>
                  var a = "<?php echo $user_id ?>";
                  alert ('Трансформатор тока успешно отредактирован');
                  window.location="customer.php?user_id="+a;
                </script>
              <?php  
             // echo "Трансформатор тока успешно отредактирован";
            break;
            case "Err-edit_tr_cur":
              echo "Трансформатор тока не отредактирован";
            break;         
          }
	}

?>