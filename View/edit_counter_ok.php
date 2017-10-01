<?php 

include '.\biblioticdib.php';
include '..\Model\edit.php';


global $m;
$m=0;
  if(!empty($_POST['Type_count']) AND !empty($_POST['Mark_count']) AND !empty($_POST['Year_release_count']) AND !empty($_POST['Class_accur_count'] ) AND !empty($_POST['Date_gospr_count']) AND !empty($_POST['Date_next_pr_count']) AND !empty($_POST['Kol_plomb_gospr'])AND !empty($_POST['Kol_holog_stick'])AND !empty($_POST['Plomb_netw_org'])AND !empty($_POST['Antimag_plomb']) AND !empty($_POST['Plomb_shu']) AND !empty($_POST['Other_places_count']) AND !empty($_GET['id_obj']) AND !empty($_GET['user_id']))

    {
        $result =  edit_counter_update($_POST['Type_count'],$_POST['Mark_count'],$_POST['Year_release_count'],$_POST['Class_accur_count'],$_POST['Date_gospr_count'],$_POST['Date_next_pr_count'],$_POST['Kol_plomb_gospr'],$_POST['Kol_holog_stick'],$_POST['Plomb_netw_org'],$_POST['Antimag_plomb'],$_POST['Plomb_shu'],$_POST['Other_places_count'],$_GET['id_obj'],$_GET['user_id']);

        switch ($result)
         {
            case "Edit_counter":
             echo "Счетчик успешно отредактирован";
             $m=1;
           
             
              break;
            case "Err-edit-count":
              echo "Счетчик не отредактирован";
              break;         
          }
    }
   
    // if ($m==1)
    // {
    // 	header ('Location: consumer.php');

    // }

?>