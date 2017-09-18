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

	function del_dimension ($id_dim,$id_obj)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_dim) AND !empty($id_obj))
		{
			mysqli_query($connect,"delete from Dimension where Obj_Cons_id_dimen=".$id_dim." AND Obj_id_dimen=".$id_obj.";");

			return 'Del_dim';
	
			exit();
		}
		else 
			{
				return 'Err_del-dim';
				exit();
			}
	}

	function del_transfor_cur($id_tr_cur,$id_obj)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_tr_cur) AND !empty($id_obj))
		{
			mysqli_query($connect,"delete from Transfor_cur where Obj_Cons_id_tr_cur=".$id_tr_cur." AND Obj_id_tr_cur=".$id_obj.";");

			return 'Del_tr_cur';
	
			exit();
		}
		else 
			{
				return 'Err_tr_cur';
				exit();
			}

	}

	function del_plombs($id_tr_cur,$id_plomb)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_tr_cur) AND !empty($id_plomb))
		{
			mysqli_query($connect,"delete from Plombs where id_plomb=".$id_plomb." AND Tr_cur_id_plomb=".$id_tr_cur.";");
			echo "delete from Plombs where id_plomb=".$id_plomb." AND Tr_cur_id_plomb=".$id_tr_cur.";";

			return 'Del';
	
			exit();
		}
		else 
			{
				return 'Err';
				exit();
			}
	}

?>

