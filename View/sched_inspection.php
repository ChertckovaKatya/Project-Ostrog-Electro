<?php
include '.\biblioticdib.php';
include '..\Model\cons.php';

?> 
<!DOCTYPE html>
<body>
  	<div class="container">
    	<form class="form-container" action="sched_inspection.php" method="POST">

    		<div class="form-group">
        		<label  for="name">Выберите дату</label>
        		<input type="date" name="Date_inspect" class="form-control" >
       		</div>

       		<div class="button-container">
         		 <input autofocus class="btn btn-success" type="submit" value="Поиск">
        	</div>
    	</form>
    </div>
</body>

<?php
	if (!empty($Date_inspect))
	{
		$result=sched_inspect($Date_inspect);

	}

?>
