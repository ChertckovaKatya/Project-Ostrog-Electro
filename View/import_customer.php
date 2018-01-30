<?php
	require '../Controller/connection.php';
	include '../Model/save_in_excel.php';
	$connect = get_connect();
	mysqli_query ($connect,"set names cp1251");
	error_reporting(E_ALL); 
	$user_id=$_GET["user_id"];
	$id_obj=$_GET["id_obj"];
	$id_count=$_GET["id_count"];
	$id_tr_cur=$_GET["id_tr_cur"];
	ini_set("display_errors", 1);
	if( !defined( "ExcelExport" ) ) 
	{
 		define( "ExcelExport", 1 );
   		class ExportToExcel 
   		{
			var $xlsData = ""; 
			var $fileName = ""; 
			var $countRow = 0; 
			var $countCol = 0; 
			var $totalCol = 100;
			
			function __construct ()
			{
				$this->xlsData = pack( "ssssss", 0x809, 0x08, 0x00,0x10, 0x0, 0x0 );
			}
			
			function RecNumber( $row, $col, $value )
			{
				$this->xlsData .= pack( "sssss", 0x0203, 14, $row, $col, 0x00 );
				$this->xlsData .= pack( "d", $value );
				return;
			}
			
			function RecText( $row, $col, $value )
			{
				$len = strlen( $value );
				$this->xlsData .= pack( "s*", 0x0204, 8 + $len, $row, $col, 0x00, $len);
				$this->xlsData .= $value;
				return;
			}
			
			function InsertNumber( $value )
			{
				if ( $this->countCol == $this->totalCol )
				{
					$this->countCol = 0;
					$this->countRow++;
				}
				$this->RecNumber( $this->countRow, $this->countCol, $value );
				$this->countCol++;
				return;
			}
			
			function InsertText( $value )
			{
				if ( $this->countCol == $this->totalCol ) 
				{
					$this->countCol = 0;
					$this->countRow++;
				}
				$this->RecText( $this->countRow, $this->countCol, $value );
				$this->countCol++;
				return;
			}
			
			function GoNewLine()
			{
				$this->countCol = 0;
				$this->countRow++;
				return;
			}
			function GoNewCol()
			{
				$this->countCol++;
				$this->countRow = 0;
				return;
			}
			
			function EndData()
			{
				$this->xlsData .= pack( "ss", 0x0A, 0x00 );
				return;
			}
			
			function SaveFile( $fileName )
			{
				//$this->fileName = $fileName;
				$this->fileName = $fileName;
				$this->SendFile();
			}
			
			function SendFile()
			{
				$this->EndData();
				header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
				header ( "Cache-Control: no-store, no-cache, must-revalidate" );
				header ( "Pragma: no-cache" );
				header ( "Content-type: application/x-msexcel" );
				header ( "Content-Disposition: attachment; fileName=$this->fileName.xls" );
				print $this->xlsData;
		 	}
		} 
	}

		$filename = 'Данные о потребителе'; 
		$excel = new ExportToExcel(); 
		 $row=cust_concl($user_id);
		$excel->InsertText('Наименование потребителя');
		$excel->InsertText($row['Name_consumer']);
		$excel->InsertText('Контактный телефон');
		$excel->InsertText($row['Phone_consumer']);
		$excel->GoNewLine();

		$row1=object_concl($user_id);

	
		$excel->InsertText('Собственник');
		$excel->InsertText($row1['Owner_FIO']);
		$excel->GoNewLine();
		$excel->InsertText('Арендатор');
		$excel->InsertText($row1['Renter_FIO']);
		$excel->GoNewLine();
		$excel->InsertText('Название объекта');
		$excel->InsertText($row1['Name_object']);
		$excel->GoNewLine();
		$excel->InsertText('Почтовый адрес');
		$excel->InsertText($row1['Mailing_address']);
		$excel->GoNewLine();
		$excel->InsertText('Контактный телефон');
		$excel->InsertText($row1['Phone_object']);
		$excel->GoNewLine();
		$excel->InsertText('Источник питания');
		$excel->InsertText($row1['Source_of_power']);
		$excel->GoNewLine();
		$excel->InsertText('Класс напряжения');
		$excel->InsertText($row1['Voltage_class']);
		$excel->GoNewLine();

		 $row3=counter_concl($id_obj,$user_id);

		$excel->GoNewLine();
		$excel->InsertText('Данные об электросчетчике');
		$excel->GoNewLine();
		$excel->InsertText('Тип');
		$excel->InsertText($row3['Type_count']);
		$excel->GoNewLine();
		$excel->InsertText('Марка');
		$excel->InsertText($row3['Mark_count']);
		$excel->GoNewLine();
		$excel->InsertText('Номер');
		$excel->InsertText($row3['Number_count']);
		$excel->GoNewLine();
		$excel->InsertText('Год выпуска');
		$excel->InsertText($row3['Year_release_count']);
		$excel->GoNewLine();
		$excel->InsertText('Класс точности');
		$excel->InsertText($row3['Class_accur_count']);
		$excel->GoNewLine();
		$excel->InsertText('Количество пломб госпроверки');
		$excel->InsertText($row3['Kol_plomb_gospr']);
		$excel->GoNewLine();
		$excel->InsertText('Количество голографичеких наклеек');
		$excel->InsertText($row3['Kol_holog_stick']);
		$excel->GoNewLine();
		$excel->InsertText('Пломбы сетевой организации');
		$excel->InsertText($row3['Plomb_netw_org']);
		$excel->GoNewLine();
		$excel->InsertText('Антимагнитые пломбы');
		$excel->InsertText($row3['Antimag_plomb']);
		$excel->GoNewLine();
		$excel->InsertText('Пломба на ШУ');
		$excel->InsertText($row3['Plomb_shu']);
		$excel->GoNewLine();
		$excel->InsertText('Другие места');
		$excel->InsertText($row3['Other_places_count']);
		$excel->GoNewLine();

		// $all_dat_count=mysqli_fetch_assoc(mysqli_query($connect,"select t3.id_Type,t1.Date_list_id,t1.Conclusio,t1.Notes,t2.Date_l,t3.Type from All_dates AS t1 join Date_list AS t2 join Type_date AS t3 on  t1.Date_list_id=t2.id_Date AND t2.Type_date_id=t3.id_Type where Counter_id_count=".$id_reg.";"));
		$all_dat=all_dates_concl($id_count,1);
		$excel->GoNewLine();
		$excel->InsertText('Даты проверок электросчетчика');
		$excel->GoNewLine();
		$excel->InsertText('Дата');
		$excel->InsertText('Тип');
		$excel->InsertText('Заключение по учету');
		$excel->InsertText('Примечание');
		$excel->GoNewLine();
		While($all_dat_count=mysqli_fetch_assoc($all_dat))
		{
			$excel->InsertText($all_dat_count['Date_l']);
			$excel->InsertText($all_dat_count['Type']);
			$excel->InsertText($all_dat_count['Conclusio']);
			$excel->InsertText($all_dat_count['Notes']);
			$excel->GoNewLine();

		}
		$dimen=dimension_concl($id_obj,$user_id);
		$excel->GoNewLine();
		$excel->InsertText('Данные об измерениях');
		$excel->GoNewLine();
		$excel->InsertText('Дата');
		$excel->InsertText($dimen['Date_dimen']);
		$excel->GoNewLine();
		$excel->InsertText('Чередование фаз');
		$excel->InsertText($dimen['Alter_phase']);
		$excel->GoNewLine();
		$excel->InsertText('Нагрузка в амперах фА');
		$excel->InsertText($dimen['Load_fa']);
		$excel->GoNewLine();
		$excel->InsertText('Нагрузка в амперах фБ');
		$excel->InsertText($dimen['Load_fb']);
		$excel->GoNewLine();
		$excel->InsertText('Нагрузка в амперах фС');
		$excel->InsertText($dimen['Load_fc']);
		$excel->GoNewLine();
		$excel->InsertText('Cos фи');
		$excel->InsertText($dimen['Cos_fi']);
		$excel->GoNewLine();
		$excel->InsertText('Количество оборотов диска');
		$excel->InsertText($dimen['Kol_turn_disk']);
		$excel->GoNewLine();
		$excel->InsertText('Потребляемая мощность в КВт');
		$excel->InsertText($dimen['Power_consum']);
		$excel->GoNewLine();


		$change_c=change_count_concl($id_count);
		$excel->GoNewLine();
		$excel->InsertText('Данные о замене счетчика');
		$excel->GoNewLine();
		$excel->InsertText('Дата');
		$excel->InsertText('Причина замены');
		$excel->InsertText('Кто менял (ФИО)');
		$excel->InsertText('Номер старого счетчика');
		$excel->InsertText('Номер нового счетчика');
		$excel->GoNewLine();
		While($change_count=mysqli_fetch_assoc($change_c))
		{
			$excel->InsertText($change_count['Date_change']);
			$excel->InsertText($change_count['Cause_change']);
			$excel->InsertText($change_count['FIO_change']);
			$excel->InsertText($change_count['Nomber_old']);
			$excel->InsertText($change_count['Nomber_new']);
			$excel->GoNewLine();

		}

		$tr_cur=transfor_cur_concl($id_obj,$user_id);
		$excel->GoNewLine();
		$excel->InsertText('Информация о трансформаторе тока');
		$excel->GoNewLine();
		$excel->InsertText('Тип');
		$excel->InsertText($tr_cur['Type_tr_cur']);
		$excel->GoNewLine();
		$excel->InsertText('Марка');
		$excel->InsertText($tr_cur['Mark_tr_cur']);
		$excel->GoNewLine();
		$excel->InsertText('Номинал');
		$excel->InsertText($tr_cur['Denomin_tr_cur']);
		$excel->GoNewLine();
		$excel->InsertText('Год выпуска');
		$excel->InsertText($tr_cur['Year_release_tr_cur']);
		$excel->GoNewLine();
		$excel->InsertText('№ Трансформатора тока фА');
		$excel->InsertText($tr_cur['Num_tr_cur_fa']);
		$excel->GoNewLine();
		$excel->InsertText('№ Трансформатора тока фБ');
		$excel->InsertText($tr_cur['Num_tr_cur_fb']);
		$excel->GoNewLine();
		$excel->InsertText('№ Трансформатора тока фС');
		$excel->InsertText($tr_cur['Num_tr_cur_fc']);
		$excel->GoNewLine();
		
		$all_dat2=all_dates_concl($id_tr_cur,2);
		$excel->InsertText('Даты о проверке трансформатора тока');
		$excel->GoNewLine();
		$excel->InsertText('Дата');
		$excel->InsertText('Тип');
		$excel->InsertText('Заключение по учету');
		$excel->InsertText('Примечание');
		$excel->GoNewLine();
		While($all_dat_tr_cur=mysqli_fetch_assoc($all_dat2))
		{
			$excel->InsertText($all_dat_tr_cur['Date_l']);
			$excel->InsertText($all_dat_tr_cur['Type']);
			$excel->InsertText($all_dat_tr_cur['Conclusio']);
			$excel->InsertText($all_dat_tr_cur['Notes']);
			$excel->GoNewLine();

		}
		$excel->GoNewLine();

		$plombs=plombs_conclusion($id_tr_cur);






	$excel->SaveFile($filename);

?>