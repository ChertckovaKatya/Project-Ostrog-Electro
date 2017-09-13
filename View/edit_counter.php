<?php
include '.\biblioticdib.php';
include '..\Model\edit.php';
echo $head;
$user_id = $_GET["user_id"];
$id_obj = $_GET["id_obj"];
edit_counter($_GET["user_id"],$_GET["id_obj"]);
?>

<!DOCTYPE html>
<div class="container">
  <form class="form-container" action="edit_counter_ok.php?user_id=<?php echo (int)$user_id; ?>&id_obj=<?php echo (int)$id_obj; ?>" method="POST">
    <div class="form-group">
        <label for="name">Тип</label>
          <input name="Type_count" class="form-control" value="<?php echo $type; ?>">
      </div>

      <div class="form-group">
          <label for="name">Марка</label>
          <input name="Mark_count" class="form-control" value="<?php echo $mark; ?>">
      </div>

      <div class="form-group">
          <label for="name">Год выпуска</label>
          <input name="Year_release_count" class="form-control" value="<?php echo $year; ?>">
      </div>

      <div class="form-group">
          <label for="name">Класс точности</label>
          <input name="Class_accur_count" class="form-control" value="<?php echo $class_acc; ?>">
      </div>

      <div class="form-group">
          <label for="name">Дата проверки</label>
          <input name="Date_gospr_count" class="form-control" value="<?php echo $date_gospr; ?>">
      </div>

      <div class="form-group">
          <label for="name">Дата следующей проверки</label>
          <input name="Date_next_pr_count" class="form-control" value="<?php echo $date_next; ?>">
      </div>

        <div class="form-group">
          <label for="name">Количество пломб госпроверки</label>
          <input name="Kol_plomb_gospr" class="form-control" value="<?php echo $kol_pl; ?>">
      </div>

        <div class="form-group">
          <label for="name">Количество голографичесих наклеек</label>
          <input name="Kol_holog_stick" class="form-control" value="<?php echo $kol_hol; ?>">
      </div>

        <div class="form-group">
          <label for="name">Пломбы сетевой организации</label>
          <input name="Plomb_netw_org" class="form-control" value="<?php echo $pl_netw; ?>">
      </div>

        <div class="form-group">
          <label for="name">Антимагнитные пломбы</label>
          <input name="Antimag_plomb" class="form-control" value="<?php echo $anti_pl; ?>">
      </div>

        <div class="form-group">
          <label for="name">Пломба на ШУ</label>
          <input name="Plomb_shu" class="form-control" value="<?php echo $pl_shu; ?>">
      </div>

        <div class="form-group">
          <label for="name">Другие места</label>
          <input name="Other_places_count" class="form-control" value="<?php echo $other; ?>">
      </div>
  		<div class="button-container">
      		<input autofocus class="btn btn-success" type="submit" value="Готово">
    	</div>
	</form>
</div>