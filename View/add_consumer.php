<?php
include './biblioticdib.php';
include '../Model/add.php';

?>
<!DOCTYPE html>
<body>
  <div class="container">
    <form class="form-container" action="add_consumer.php" method="POST">
      <form class="form-inline">
  

        <div class="custom-select">
          <select name="Face">
            <option value="1">Юридическое лицо</option>
            <option value="2">Физическое лицо</option>
          </select>
         </div>

        <div class="form-group">
          <label  for="name">Лицевой счет</label>
         <input type="text" name="Personal_account" class="form-control" >
        </div>
        <div class="form-group">
          <label  for="name">Наименование потребителя </label>
          <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
          <label  for="name">Контактные телефоны</label>
          <input type="tel" name="Phone_consumer" class="form-control" >
        </div>

        <div class="button-container">
          <input autofocus class="btn btn-success" type="submit" value="Добавить">
        </div>

      </form>
    </form>
  </div>
</body>
<?php


    if(!empty($_POST['name']) AND !empty($_POST['Phone_consumer']) AND !empty($_POST['Personal_account']) AND !empty($_POST['Face']))
    {
        $result =  add_cons(($_POST['name']), ($_POST['Phone_consumer']),($_POST['Personal_account']),($_POST['Face']));

        switch ($result)
         {
            case "Add_cons":
            ?>
             <script>
             alert ('Пользователь успешно добавлен');
             window.location="consumer.php";
            </script>
            <?php
              break;
            case "Err-cons":
              echo "Пользователь не добавлен";
              break;
          }
    }
?>
  
    


