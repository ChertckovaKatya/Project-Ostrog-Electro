<?php 

include './biblioticdib.php';
include '../Model/edit.php';


global $o;

if(!empty($_POST['Owner_FIO']) AND !empty($_POST['Renter_FIO'])  AND !empty($_POST['Name_object'])  AND !empty($_POST['Mailing_address'])  AND !empty($_POST['Phone_object'])  AND !empty($_POST['Source_of_power'])  AND !empty($_POST['Voltage_class']) AND !empty($_GET["id_obj"]) AND !empty($_GET["user_id"]))

    {
        $result =  edit_object_update($_POST['Owner_FIO'],$_POST['Renter_FIO'],$_POST['Name_object'],$_POST['Mailing_address'],$_POST['Phone_object'],$_POST['Source_of_power'],$_POST['Voltage_class'],$_GET["id_obj"]);
          $user_id = ($_GET['user_id']);

        switch ($result)
         {
            case "Edit_obj":
            ?>
              <script>
                var a = "<?php echo $user_id ?>";
                alert ('Объект успешно отредактирован');
                window.location="customer.php?user_id="+a;
              </script>
            <?php  
             break;
              case "Err-edit-obj":
                echo "Объект не отредактирован";
              break;         
          }
    }
   
    

?>