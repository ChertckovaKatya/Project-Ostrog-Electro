<?php
include '.\biblioticdib.php';
include '..\Model\add-cons.php';
include '..\Model\cons.php';

echo $head;	
$user_id = $_GET["user_id"];

?>
<div class="container">
	<form class="form-container" action="add_counter.php" method="POST">
 		<div class="form-group">
     	 	<label for="name">Тип</label>
      		<input type="Type_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Марка</label>
      		<input type="Mark_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Год выпуска</label>
      		<input type="Year_release_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Класс точности</label>
      		<input type="Class_accur_count" class="form-control">
    	</div>

     	<div class="form-group">
      		<label for="name">Дата проверки</label>
      		<input type="Date_gospr_count" class="form-control">
    	</div>

    	<div class="form-group">
      		<label for="name">Дата следующей проверки</label>
      		<input type="Date_next_pr_count" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Количество пломб госпроверки</label>
      		<input type="Kol_plomb_gospr" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Количество голографичесих наклеек</label>
      		<input type="Kol_holog_stick" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Пломбы сетевой организации</label>
      		<input type="Plomb_netw_org" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Антимагнитные пломбы</label>
      		<input type="Antimag_plomb" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Пломба на ШУ</label>
      		<input type="Plomb_shu" class="form-control">
    	</div>

    		<div class="form-group">
      		<label for="name">Другие места</label>
      		<input type="Other_places_count" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
    	<input type="hidden" name="user_id" value = <?php echo $user_id;?> >
    	<input type="hidden" name="id_obj" value = <?php echo $id_obj;?> >
	  </form>
</div>

<?php

    if(!empty($_POST['Type_count']) AND !empty($_POST['Mark_count']) AND !empty($_POST['Year_release_count']) AND !empty($_POST['Class_accur_count'] ) AND !empty($_POST['Date_gospr_count']) AND !empty($_POST['Date_next_pr_count']) AND !empty($POST["$Kol_plomb_gospr"])AND !empty($_POST['Kol_holog_stick'])AND !empty($_POST['Plomb_netw_org'])AND !empty($_POST['Antimag_plomb']) AND !empty($_POST['Plomb_shu']) AND !empty($_POST['Other_places_count']) AND !empty($_POST['user_id']) AND !empty($_POST['id_obj']))
    {
        $result =  add_counter(($_POST['Type_count']),($_POST['Mark_count']),($_POST['Year_release_count']),($_POST['Class_accur_count']),($_POST['Date_gospr_count']),($_POST['Date_next_pr_count']),($_POST['Kol_plomb_gospr']),($_POST['Kol_holog_stick']),($_POST['Plomb_netw_org']),($_POST['Antimag_plomb']),($_POST['Plomb_shu']),($_POST['Other_places_count']),($_POST['$user_id']),($_POST['id_obj']));
        
        switch ($result)
         {
            case "Add_counter":
             echo "Трансформатор напряжения успешно добавлен";
              break;
            case "Err-counter":
              echo "Трансформатор напряжения не добавлен";
              break;
            
         }
    }
?>