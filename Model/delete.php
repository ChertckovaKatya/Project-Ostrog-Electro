<?php
 	function del_cons($id_cons)
	{
		include_once "..\Controller\connection.php";
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

	function del_object ($id_cons)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_cons))
		{
			mysqli_query($connect,"delete from Object where Obj_Cons_id=".$id_cons.";");

			return 'Del_obj';
	
			exit();
		}
		else 
			{
				return 'Err_del-obj';
				exit();
			}
	}

		function del_counter ($id_count,$id_obj)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_count) AND !empty($id_obj))
		{
			mysqli_query($connect,"delete from Counter where Obj_Cons_id_count=".$id_count." AND Obj_id_count=".$id_obj.";");

			return 'Del_counter';
	
			exit();
		}
		else 
			{
				return 'Err_del-counter';
				exit();
			}
	}

?>

