<?php 


include './biblioticdib.php';
include '../Model/edit.php';

if(!empty($_POST['Type']) AND !empty($_POST['Date']) AND !empty($_POST["Conclusio"]) AND !empty($_POST['Notes']) AND !empty($_POST['id_date_list']) AND !empty($_POST['user_id']) )
    {
        $result =  edit_all_dates_ok(($_POST['Type']), ($_POST['Date']),$_POST["Conclusio"],$_POST['Notes'],$_POST['id_date_list']);

        $user_id = ($_POST['user_id']);
        switch ($result)
         {
            case "Edit":
              ?>
                <script>
                  var a = "<?php echo $user_id ?>";
                  alert ('Дата успешно отредактирована');
                  window.location="customer.php?user_id="+a;
                </script>
              <?php  
             // echo "Дата успешно отредактирована";
            break;
              case "Err":
                echo "Дата не отредактирована";
              break;         
          }
    }
   

?>