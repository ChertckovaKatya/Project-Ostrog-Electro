<?php

include '.\biblioticdib.php';
include '..\Model\delete.php';

echo $head;	
edit_cons ($_GET["user_id"]);
echo $name;

?>

<div class="form-group">
    <label  for="name">ФИО</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
  </div>

  <div class="form-group">
    <label  for="Phone_consumer">Телефон</label>
    <input type="text" name="Phone_consumer" class="form-control" value="<?php echo $phone ?>">
  </div>
