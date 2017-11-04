<?php

include './biblioticdib.php';
include '../Model/edit.php';


edit_cons ($_GET["user_id"]);
$user_id = $_GET["user_id"];


?>
<!DOCTYPE html>
<div class="container">

 <div class="form-group">
  <?php 
  if ($face==1)
  {
        echo "<select name=\"Face\">
          <option selected value=\"1\">Юридическое лицо</option>
          <option   value=\"2\">Физическое лицо</option>
        </select>";
      }
      else 
      { 
        echo "<select name=\"Face\">
          <option value=\"1\">Юридическое лицо</option>
          <option  selected value=\"2\">Физическое лицо</option>
        </select>";
      }
        ?> 
    </div>
    <div class="form-group">
      <label  for="Phone_consumer">Лицевой счет</label>
      <input type="text" name="Personal_account" class="form-control" value="<?php echo $per_acc; ?>">
    </div>

  <form class="form-container" action="edit_ok.php?user_id=<?php echo (int)$user_id; ?>" method="POST">
    <div class="form-group">
      <label  for="name">Наименование потребителя</label>
      <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
    </div>

    <div class="form-group">
      <label  for="Phone_consumer">Телефон</label>
      <input type="text" name="Phone_consumer" class="form-control" value="<?php echo $phone; ?>">
    </div>

    <div class="button-container">
      <input autofocus class="btn btn-success" type="submit" value="Готово">
      </div>
  </form>
</div>

