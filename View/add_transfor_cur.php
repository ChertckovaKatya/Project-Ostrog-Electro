<?php
include '.\biblioticdib.php';
include '..\Model\add.php';
echo $head;  

$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];

?>
<!DOCTYPE html>
<div class="container">
	<form class="form-container" action="add_transfor_cur.php" method="POST">
		<div class="form-group">
     	 	<label for="name">Тип:</label>
      		<input name="Type_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Марка:</label>
      		<input name="Mark_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Номинал:</label>
      		<input name="Denomin_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Год выпуска:</label>
      		<input name="Year_release_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Дата госпроверки:</label>
      		<input name="Date_gospr_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Дата следующей проверки:</label>
      		<input name="Date_next_tr_cur" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока Фа:</label>
      		<input name="Num_tr_cur_fa" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока Фб:</label>
      		<input name="Num_tr_cur_fb" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">№ Трансформатора тока Фс:</label>
      		<input name="Num_tr_cur_fc" class="form-control">
    	</div>
    	<div class="form-group">
     	 	<label for="name">Фаза:</label>
      		<input name="Phase_tr_cur" class="form-control">
    	</div>
    	<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Добавить">
      	</div>
      <div>
    	<div>
          <input type="hidden" name="user_id" value = <?php echo (int) $user_id;?> >
    	</div>
    	<div>
          <input type="hidden" name="id_obj" value = <?php echo (int) $id_obj;?> >
    	</div>
	 </form>
</div>

<?php
	if(!empty($_POST['Type_tr_cur']) AND !empty($_POST['Mark_tr_cur']) AND !empty($_POST['Denomin_tr_cur']) AND !empty($_POST['Year_release_tr_cur']) AND !empty($_POST['Date_gospr_tr_cur']) AND !empty($_POST['Date_next_tr_cur']) AND !empty($_POST['Num_tr_cur_fa']) AND !empty($_POST['Num_tr_cur_fb']) AND !empty($_POST['Num_tr_cur_fc']) AND !empty($_POST['Phase_tr_cur']) AND !empty($_POST['id_obj']) AND !empty($_POST['user_id']))
	{

		 $result =  add_transfor_cur(($_POST['Type_tr_cur']),($_POST['Mark_tr_cur']),($_POST['Denomin_tr_cur']),($_POST['Year_release_tr_cur']),($_POST['Date_gospr_tr_cur']),($_POST['Date_next_tr_cur']),($_POST['Num_tr_cur_fa']),($_POST['Num_tr_cur_fb']),($_POST['Num_tr_cur_fc']), ($_POST['Phase_tr_cur']),($_POST['id_obj']),($_POST['user_id']));

		 switch ($result)
         {
            case "Add_tr_cur":
             echo "Трансформатор тока успешно добавлен";
              break;
            case "Err-tr_cur":
              echo "Трансформатор тока не добавлен";
              break;

         }
	}

?>