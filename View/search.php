<!DOCTYPE html>
<head>
</head>
<body>
<div class="container" action="consumer_search.php" method="POST">
	<form class="well form-search">
		<input type="text" name="Text_search" class="span3 search-query">
			<select name="Search">
            	<option value="1">По названию</option>
            	<option value="2">По номеру счетчика</option>
                <option value="3">По лицевому счету</option>
        	</select>
    	<div class="button-container">
     		<input autofocus class="btn" type="submit" value="Поиск">
   		</div>
    </form>
</div>
</body>
