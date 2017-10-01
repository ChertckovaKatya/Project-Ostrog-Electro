<?php 

include '.\biblioticdib.php';
include '..\Model\edit.php';


global $m;
$m=0;
	if(!empty($_POST['Type_tr_cur']) AND !empty($_POST['Mark_tr_cur']) AND !empty($_POST['Denomin_tr_cur']) AND !empty($_POST['Year_release_tr_cur']) AND !empty($_POST['Date_gospr_tr_cur']) AND !empty($_POST['Date_next_tr_cur']) AND !empty($_POST['Num_tr_cur_fa']) AND !empty($_POST['Num_tr_cur_fb']) AND !empty($_POST['Num_tr_cur_fc']) AND !empty($_POST['Phase_tr_cur']) AND !empty($_GET['id_obj']) AND !empty($_GET['user_id']))
	{
		        $result =  edit_transfor_cur_update(($_POST['Type_tr_cur']),($_POST['Mark_tr_cur']),($_POST['Denomin_tr_cur']),($_POST['Year_release_tr_cur']),($_POST['Date_gospr_tr_cur']),($_POST['Date_next_tr_cur']),($_POST['Num_tr_cur_fa']),($_POST['Num_tr_cur_fb']),($_POST['Num_tr_cur_fc']),($_POST['Phase_tr_cur']),($_GET['id_obj']),($_GET['user_id']));

		        switch ($result)
         {
            case "Edit_tr_cur":
             echo "Трансформатор тока успешно отредактирован";
             $m=1;
           
             
              break;
            case "Err-edit_tr_cur":
              echo "Трансформатор тока не отредактирован";
              break;         
          }
	}

?>