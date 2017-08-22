<?php
 	function del_cons($id_cons)
	{
		include_once "..\Setting\connection.php";
		$connect = get_connect();
		if (!empty($id_cons))
		{
			mysqli_query($connect,"delete from Consumer where id_consumer=".$id_cons.";");

			return 'Del_cons';
	
			exit();
		}
		else 
			{
				return 'Err_del-cons';
				exit();
			}
	}

		function edit_cons($id_cons)
		{
			include_once "..\Setting\connection.php";
			$connect = get_connect();
			if (!empty($id_cons))
			{
				$login = mysqli_real_escape_string($connect,htmlspecialchars($id_cons));
				$name=mysqli_query($connect,"select Name_consumer from consumer  WHERE id_consumer ='".$login."';");
				$phone=mysqli_query($connect,"select Phone_consumer from consumer  WHERE id_consumer='".$id_cons."';");
				return $name;
				return $phone;
				exit();
			}

		}



?>

