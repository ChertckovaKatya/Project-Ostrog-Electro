
<?php

	function cons_table($id,$Text_search,$search)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		// $row = mysqli_fetch_row(mysqli_query($connect,"select * from consumer;"));
		if($id==0)
		{
		$question=(mysqli_query($connect,"select * from consumer;"));
		echo "select * from consumer;";
		}
		else 
		{
			if ($search==1)
			{
			$question=(mysqli_query($connect,"select * from consumer where Name_consumer like '%.$Text_search.%' ;"));
			echo"select * from consumer where Name_consumer like '%$Text_search%' ;";
			echo var_dump($question);
			}
			if ($search==2)
			{
			$question=(mysqli_query($connect,"select * from Counter where Number_count like '%$Text_search%' ;"));
			}

		}
		$array = array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($question)) 
		{

			$array[$i] = $row;
			$i++;
		}
		//var_dump($array);
		return $array;
		exit();
	}
	function object_conclusion($user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$object=(mysqli_query($connect,"select id_object,Owner_FIO,Renter_FIO,Name_object,Mailing_address,Phone_object,Source_of_power,Voltage_class,Date_instrumental_check
			FROM Object WHERE Obj_Cons_id=".$user_id.";"));
		$array_object= array();
		$i = 0;
		while ($row1 = mysqli_fetch_assoc($object)) 
		{

			$array_object[$i] = $row1;
			$i++;
		}

		return $array_object;
		exit();
	}

	function prov_obj($user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
	if(!empty($user_id ))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM Object WHERE Obj_Cons_id ='$user_id';"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}
	

	function cust_conclusion($user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$customer=(mysqli_query($connect,"select Name_consumer,Phone_consumer from consumer WHERE id_consumer =".$user_id.";"));
		$array_cust= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($customer)) 
		{

			$array_cust[$i] = $row;
			$i++;
		}

		return $array_cust;
		exit();
	}

	function counter_conclusion($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$counter=(mysqli_query($connect,"Select id_count,Type_count, Mark_count,Year_release_count,Class_accur_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count from home.Counter WHERE Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";"));

		// echo "Select Type_count, Mark_count,Year_release_count,Class_accur_count,Date_gospr_count,Date_next_pr_count,Kol_plomb_gospr,Kol_holog_stick,Plomb_netw_org,Antimag_plomb,Plomb_shu,Other_places_count from home.Counter WHERE Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";";


		$array_count= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($counter)) 
		{

			$array_count[$i] = $row;
			$i++;
		}

		return $array_count;
		exit();
	}

	function dimension_conclusion($id_obj,$user_id)
	{

		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$dim=(mysqli_query($connect,"Select Date_dimen, Alter_phase,Load_fa,Load_fb,Load_fc,Cos_fi,Kol_turn_disk,Power_consum from home.Dimension WHERE Obj_id_dimen=".$id_obj." AND Obj_Cons_id_dimen=".$user_id.";"));

		$array_dim= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($dim)) 
		{

			$array_dim[$i] = $row;
			$i++;
		}

		return $array_dim;
		exit();

	}

	function transfor_cur_conclusion($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$tr_cur=(mysqli_query($connect,"Select id_tr_cur,Type_tr_cur,Mark_tr_cur,Denomin_tr_cur,Year_release_tr_cur,Num_tr_cur_fa,Num_tr_cur_fb,Num_tr_cur_fc,Phase_tr_cur from home.Transfor_cur WHERE Obj_id_tr_cur=".$id_obj." AND Obj_Cons_id_tr_cur=".$user_id.";"));

		$array_tr_cur= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($tr_cur)) 
		{

			$array_tr_cur[$i] = $row;
			$i++;
		}

		return $array_tr_cur;
		exit();


	} 

	function transfor_vol_conclusion($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$tr_vol=(mysqli_query($connect," Select id_tr_vol,Type_tr_vol,Mark_tr_vol,Denomin_tr_vol,Plomb_tr_vol from home.Transfor_vol WHERE Object_id_tr_vol=".$id_obj." AND Cons_id_obj_tr_vol=".$user_id.";"));
		$array_tr_vol= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($tr_vol)) 
		{

			$array_tr_vol[$i] = $row;
			$i++;
		}

		return $array_tr_vol;
		exit();
	}

	function plombs_conclusion($id_tr_cur)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();

		$plombs=(mysqli_query($connect,"Select id_plomb,L1,L2,I1,I2,Other_places_plomb from home.Plombs WHERE Tr_cur_id_plomb=".$id_tr_cur.";"));

		$array_pl= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($plombs)) 
		{

			$array_pl[$i] = $row;
			$i++;
		}

		return $array_pl;
		exit();


	}

	function change_count_conclusion($id_count)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();

		$change=(mysqli_query($connect,"Select id_change,Date_change,Cause_change,FIO_change,Nomber_old,Nomber_new FROM home.Change_count WHERE Counter_id_count=".$id_count.";"));
		$array_change= array();
		$i = 0;
		while ($row = mysqli_fetch_assoc($change)) 
		{

			$array_change[$i] = $row;
			$i++;
		}

		return $array_change;
		exit();
	}

	function all_dates_conclusion ($id_reg,$type)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		if (!empty($id_reg) AND !empty($type))
		{
			if ($type==1)
			{
				$result=(mysqli_query($connect,"select t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from All_dates AS t1 join Date_list AS t2 join Type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Counter_id_count=".$id_reg.";"));

		

			}
			if ($type==2)
			{
				$result=(mysqli_query($connect,"select t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from All_dates AS t1 join Date_list AS t2 join Type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Transfor_cur_id=".$id_reg.";"));
				

			}
			if ($type==3)
			{
				$result=(mysqli_query($connect,"select t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from All_dates AS t1 join Date_list AS t2 join Type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Transfor_vol_id=".$id_reg.";"));
				;

			}
			$array_reg= array();
			$i = 0;
			while ($row = mysqli_fetch_assoc($result)) 
			{

				$array_reg[$i] = $row;
				$i++;
			}

			return $array_reg;
			exit();
		}
	}

	function  prov_counter($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
	if(!empty($id_obj) AND !empty($user_id))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Counter WHERE  Obj_id_count=".$id_obj." AND Obj_Cons_id_count=".$user_id.";"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}

	function prov_dimension($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;

		if(!empty($id_obj) AND !empty($user_id))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Dimension WHERE  Obj_id_dimen=".$id_obj." AND Obj_Cons_id_dimen=".$user_id.";"), MYSQLI_NUM);
		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}

	function prov_transfor_cur($id_obj,$user_id)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;

		if(!empty($id_obj) AND !empty($user_id))
	{
		$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Transfor_cur WHERE  Obj_id_tr_cur=".$id_obj." AND Obj_Cons_id_tr_cur=".$user_id.";"), MYSQLI_NUM);

	

		if (count($row)!=0)
		{
		 $user=1;
		}
	}
	else
	{
		$user = 0;
	}

	return $user;
	}

	function prov_plombs($id_tr_cur)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
		if(!empty($id_tr_cur))
		{
			$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Plombs WHERE  Tr_cur_id_plomb=".$id_tr_cur.";"), MYSQLI_NUM);
			if (count($row)!=0)
			{
				 $user=1;
			}
		}

		else
		{
		$user = 0;
		}
		return $user;

	}

	function prov_tr_vol($id_tr_vol)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
		if(!empty($id_tr_vol))
		{
			$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Transfor_vol WHERE  id_tr_vol=".$id_tr_vol.";"), MYSQLI_NUM);
			
			
			if (count($row)!=0)
			{
		 		$user=1;
			}
		}
		else
		{
			$user = 0;
		}
		return $user;
		echo "Переменная !!!";
		echo $user;

	}

	function prov_change_count($id_count)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;

		if(!empty($id_count))
		{
			$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  Change_count WHERE  Counter_id_count=".$id_count.";"), MYSQLI_NUM);
			if (count($row)!=0)
			{
		 		$user=1;
			}
		}
		else
		{
			$user = 0;
		}
		return $user;
		
	}
	function prov_date($id_list,$type_pr)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		$user=0;
		if(!empty($id_list) AND !empty($type_pr))
		{
			if($type_pr==1)
			{
				$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  All_dates WHERE  Counter_id_count=".$id_list.";"), MYSQLI_NUM);
				// echo "SELECT * FROM  All_dates WHERE  Counter_id_count=".$id_list.";";
				// var_dump($row);
			}
			if($type_pr==2)
			{
				$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  All_dates WHERE  Transfor_cur_id=".$id_list.";"), MYSQLI_NUM);

				// echo "SELECT * FROM  All_dates WHERE  Transfor_cur_id=".$id_list.";";

				// var_dump($row);
			}
			if($type_pr==3)
			{
				$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM  All_dates WHERE  Transfor_vol_id=".$id_list.";"), MYSQLI_NUM);	
				// echo "SELECT * FROM  All_dates WHERE  Transfor_vol_id=".$id_list.";";
				// var_dump($row);
			}
			if (count($row)!=0)
			{
		 		$user=1;
			}
		}
		else
		{
			$user = 0;
		}
		return $user;

	}

	function sched_inspect ($date)
	{
		include_once "..\Controller\connection.php";
		$connect = get_connect();
		

	}



?>