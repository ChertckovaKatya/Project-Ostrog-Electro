<?php
include '.\biblioticdib.php';
echo $head;
?>
<body>
<form class="form-inline">
  <div class="form-group">
    <label  for="name">Наименование потребителя </label>
    <input type="Name_consumer" class="form-control" id="Name_consumer">
  </div>

  <div class="form-group">
    <label  for="Phone_consumer">Контактные телефоны</label>
    <input type="phone" class="form-control" id="Phone_consumer">
  </div>

  <div class="form-group">
    <label  for="name">Собственник</label>
    <input type="owner" class="form-control" id="Owner">
  </div>

  <div class="form-group">
    <label  for="name">Наименование объекта</label>
    <input type="Name_object" class="form-control" id="Name_object">
  </div>

  <div class="form-group">
    <label  for="name">Почтовый адрес</label>
    <input type="Mailing_address" class="form-control" id="Mailing_address">
  </div>

  <div class="form-group">
    <label  for="name">Арендатор</label>
    <input type="Renter_FIO" class="form-control" id="Renter_FIO">
  </div>

  <div class="form-group">
    <label  for="name">Источник питания</label>
    <input type="Source_of_power" class="form-control" id="Source_of_power">
  </div>

  <div class="form-group">
    <label for="name">Класс напряжения</label>
    <input type="Source_of_power" class="form-control" id="Source_of_power">
  </div>
</form>
 <label for="name">Данные о трансформаторах тока</label>
<form class="form-inline">

    <div class="form-group">
      <tr><label for="name">Класс напряжения</label><tr>
      <input type="Source_of_power" class="form-control" id="Source_of_power">
    </div>

    <div class="form-group">
      <label for="name">Тип</label>
      <input type="Type_tr_vol" class="form-control" id="Type_tr_vol">
    </div>

    <div class="form-group">
      <label for="name">Марка</label>
      <input type="Mark_tr_vol" class="form-control" id="Mark_tr_vol">
    </div>

    <div class="form-group">
      <label for="name">Номинал</label>
      <input type="Denomin_tr_vol" class="form-control" id="Denomin_tr_vol">
    </div>

    


</form>
</body>
