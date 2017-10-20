<?php
include '.\biblioticdib.php';
include '..\Model\add.php';
// include '..\Model\counter_add.php';


// echo var_dump($_GET);
$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
echo $id_obj;
echo $user_id;

?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_counter.php" method="POST">
 		<div class="form-group">
     	 	<label for="name">Тип</label>
      		<input name="Type_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Марка</label>
      		<input name="Mark_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Год выпуска</label>
      		<input type="date" name="Year_release_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Класс точности</label>
      		<input name="Class_accur_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Количество пломб госпроверки</label>
      		<input name="Kol_plomb_gospr" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Количество голографичесих наклеек</label>
      		<input name="Kol_holog_stick" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Пломбы сетевой организации</label>
      		<input name="Plomb_netw_org" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Антимагнитные пломбы</label>
      		<input name="Antimag_plomb" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Пломба на ШУ</label>
      		<input name="Plomb_shu" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Другие места</label>
      		<input name="Other_places_count" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
      <div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
      </div>
      <div>
          <input type="hidden" name="id_obj" value = <?php echo (int) $id_obj;?> >
      </div>
	  </form>
</div>

<?php
    
    if(!empty($_POST['Type_count']) AND !empty($_POST['Mark_count']) AND !empty($_POST['Year_release_count']) AND !empty($_POST['Class_accur_count'] ) AND !empty($_POST['Kol_plomb_gospr'])AND !empty($_POST['Kol_holog_stick'])AND !empty($_POST['Plomb_netw_org'])AND !empty($_POST['Antimag_plomb']) AND !empty($_POST['Plomb_shu']) AND !empty($_POST['Other_places_count']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']))
    {
        $result =  add_counter(($_POST['Type_count']),($_POST['Mark_count']),($_POST['Year_release_count']),($_POST['Class_accur_count']),($_POST['Kol_plomb_gospr']),($_POST['Kol_holog_stick']),($_POST['Plomb_netw_org']),($_POST['Antimag_plomb']),($_POST['Plomb_shu']),($_POST['Other_places_count']),($_POST['id_obj']),($_POST['user_id']));
        
        switch ($result)
         {
            case "Add_counter":
             echo "Счетчик успешно добавлен";
              break;
            case "Err-counter":
              echo "Счетчик не добавлен";
              break;

         }
    }
    // else
    // {
      // echo "   что-то пустое!!!";

    //   if (!empty($_POST['user_id']))
    //   {
    //     echo "Status:" . (!empty($_POST['Type_count']) AND !empty($_POST['Mark_count']) AND !empty($_POST['Year_release_count']) AND !empty($_POST['Class_accur_count'] ) AND !empty($_POST['Date_gospr_count']) AND !empty($_POST['Date_next_pr_count']) AND !empty($_POST['Kol_plomb_gospr'])AND !empty($_POST['Kol_holog_stick'])AND !empty($_POST['Plomb_netw_org'])AND !empty($_POST['Antimag_plomb']) AND !empty($_POST['Plomb_shu']) AND !empty($_POST['Other_places_count']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id'])) ."<br>";
    //     echo var_dump($_POST);
    //   }
    //   else
    //     {echo "пустая";};
    // }
?>
