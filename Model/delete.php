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
				global $name;
				global $phone;
				
				$n=mysqli_fetch_array(mysqli_query($connect,"select Name_consumer from consumer  WHERE id_consumer ='".$id_cons."';"));
				$ph=mysqli_fetch_array(mysqli_query($connect,"select Phone_consumer from consumer  WHERE id_consumer='".$id_cons."';"));
				$name=$n["Name_consumer"];
				$phone=$ph["Phone_consumer"];
			}

		}
		function edit_cons2 ($cons_name,$phone_cons,$id_cons)
		{
			include_once "..\Setting\connection.php";
	  		$connect = get_connect();
	  
	  		if (!empty($cons_name) AND !empty($phone_cons) AND !empty($id_cons))
	  		{
	  			mysqli_query($connect,"UPDATE Consumer SET Name_consumer='".$cons_name."' WHERE id_consumer='".$id_cons."';");
	  			mysqli_query($connect,"UPDATE Consumer SET Phone_consumer='".$phone_cons."' WHERE id_consumer='".$id_cons."';");

	  			return 'Edit_cons';
	
				exit();
			}

			else 
			{
				return 'Err-edit';
				exit();
			}
	  
		}


?>

