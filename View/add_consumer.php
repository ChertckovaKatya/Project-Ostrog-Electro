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
            <option value="3">Многоквартирный дом</option>
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
        $result = add_cons(($_POST['name']), ($_POST['Phone_consumer']),($_POST['Personal_account']),($_POST['Face']));

        var_dump($result);
        
        switch ($result[0])
         {
            case "Add_cons":
            $id = $result[1];
            ?>
            <!-- <script> -->
              <head>
              <script type='text/javascript'>
               var a = "<?php echo $id ?>";
               function popBox() 
               {
                  x=confirm('Пользователь успешно добавлен. Хотите перейти на страницу абонента?');
                    if (x==true) 
                      {
                        // alert ('Пользователь успешно добавлен');
                        window.location="customer.php?user_id="+a;
                      }
                      else 
                      {
                        window.location="add_consumer.php";
                      }
                }
              </script>
            </head>
              <body onload='popBox()'>
            </body>
            <?php
              break;
            case "Err-cons":
              echo "Пользователь не добавлен";
              break;
          }
    }
?>
  
    


