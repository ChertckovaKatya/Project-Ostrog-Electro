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
	$id_tr_vol=$_GET["id_tr_vol"];
	ini_set("display_errors", 1);
	if( !defined( "ExcelExport" ) ) 
	{
 		define( "ExcelExport", 1 );
   		class ExportToExcel 
   		{
			var $xlsData = ""; 
			var $fileName = ""; 
			var $countRow = 1; 
			var $countCol = 2; 
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
		 	function NewLineCol($a,$b)
			{
				for ($i=1;$i<=$a;$i++)
				{
					$this->countRow++;
				}
				for ($j=1;$j<=$b;$j++)
				{
					$this->countCol++;
				}				
				return;
			}
		} 
	}

	$filename = '������ � �����������'; 
	$excel = new ExportToExcel(); 
	$row=cust_concl($user_id);
	$row1=object_concl($user_id);
	$row3=counter_concl($id_obj,$user_id);
	$all_dat=all_dates_concl($id_count,1);
	$dimen=dimension_concl($id_obj,$user_id);
	$change_c=change_count_concl($id_count);
	$tr_cur=transfor_cur_concl($id_obj,$user_id);
	$all_dat2=all_dates_concl($id_tr_cur,2);
	$pl=plombs_concl($id_tr_cur);
	$tr_vol=transfor_vol_concl($id_obj,$user_id);
	$all_dat3=all_dates_concl($id_tr_vol,3);

	$excel->InsertText('������������ �����������');
	$excel->InsertText($row['Name_consumer']);
	$excel->InsertText('���������� �������');
	$excel->InsertText($row['Phone_consumer']);
	$excel->GoNewLine();

	$excel->NewLineCol(0,3);
	$excel->InsertText('�����������');
	$excel->InsertText($row1['Owner_FIO']);
	//$excel->GoNewLine();
	$excel->InsertText('�������� �������');
	$excel->InsertText($row1['Name_object']);
	//$excel->GoNewLine();
	$excel->InsertText('�������� �����');
	$excel->InsertText($row1['Mailing_address']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,3);
	$excel->InsertText('���������');
	$excel->InsertText($row1['Renter_FIO']);
	$excel->GoNewLine();
	$excel->NewLineCol(1,1);


	$excel->InsertText('���������� �������');
	$excel->InsertText($row1['Phone_object']);
	$excel->GoNewLine();


	$excel->NewLineCol(0,1);
	$excel->InsertText('�������� �������');
	$excel->InsertText($row1['Source_of_power']);
	$excel->NewLineCol(0,1);
	$excel->InsertText('������ � ��������������� ����');
	$excel->GoNewLine();

	$excel->NewLineCol(0,1);
	$excel->InsertText('����� ����������');
	$excel->InsertText($row1['Voltage_class']);
	//$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('���');
	$excel->InsertText($tr_cur['Type_tr_cur']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('�����');
	$excel->InsertText($tr_cur['Mark_tr_cur']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('�������');
	$excel->InsertText($tr_cur['Denomin_tr_cur']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('��� �������');
	$excel->InsertText($tr_cur['Year_release_tr_cur']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('� ��-�� ���� ��');
	$excel->InsertText($tr_cur['Num_tr_cur_fa']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('� ��-�� ���� ��');
	$excel->InsertText($tr_cur['Num_tr_cur_fb']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('� ��-�� ���� ��');
	$excel->InsertText($tr_cur['Num_tr_cur_fc']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);

	$excel->InsertText('���� �������� �������������� ����');
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('����');
	$excel->InsertText('���');
	$excel->InsertText('���������� �� �����');
	$excel->InsertText('����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	While($all_dat_tr_cur=mysqli_fetch_assoc($all_dat2))
	{
		$excel->InsertText($all_dat_tr_cur['Date_l']);
		$excel->InsertText($all_dat_tr_cur['Type']);
		$excel->InsertText($all_dat_tr_cur['Conclusio']);
		$excel->InsertText($all_dat_tr_cur['Notes']);
		$excel->GoNewLine();
		$excel->NewLineCol(0,4);
	}
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('������ ������� �����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('����� �������� �����');
	$excel->GoNewLine();
	$excel->NewLineCol(0,4);
	$excel->InsertText('����');
	$excel->InsertText('L1');
	$excel->InsertText('L2');
	$excel->InsertText('I1');
	$excel->InsertText('I2');
	$excel->InsertText('������ �����');
	$excel->GoNewLine();


	While($plombs=mysqli_fetch_assoc($pl))
	{
		if ($plombs['Phase']==1)
		{
			$excel->NewLineCol(0,4);
			$excel->InsertText('�');
		}
		if ($plombs['Phase']==2)
		{
			$excel->NewLineCol(0,4);
			$excel->InsertText('�');
		}
		if ($plombs['Phase']==3)
		{
			$excel->NewLineCol(0,4);
			$excel->InsertText('�');
		}					
		$excel->InsertText($plombs['L1']);
		$excel->InsertText($plombs['L2']);
		$excel->InsertText($plombs['I1']);
		$excel->InsertText($plombs['I2']);
		$excel->InsertText($plombs['Other_places_plomb']);
		$excel->GoNewLine();
	}

	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('������ �� ���������������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('���');
	$excel->InsertText($row3['Type_count']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('�����');
	$excel->InsertText($row3['Mark_count']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('�����');
	$excel->InsertText($row3['Number_count']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('��� �������');
	$excel->InsertText($row3['Year_release_count']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('����� ��������');
	$excel->InsertText($row3['Class_accur_count']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('���������� ����� �����������');
	$excel->InsertText($row3['Kol_plomb_gospr']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('���������� �������������� �������');
	$excel->InsertText($row3['Kol_holog_stick']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('������ ������� �����������');
	$excel->InsertText($row3['Plomb_netw_org']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('������������ ������');
	$excel->InsertText($row3['Antimag_plomb']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('������ �� ��');
	$excel->InsertText($row3['Plomb_shu']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,1);
	$excel->InsertText('������ �����');
	$excel->InsertText($row3['Other_places_count']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,3);
	$excel->InsertText('���� �������� ���������������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('����');
	$excel->InsertText('���');
	$excel->InsertText('���������� �� �����');
	$excel->InsertText('����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	While($all_dat_count=mysqli_fetch_assoc($all_dat))
	{
		$excel->InsertText($all_dat_count['Date_l']);
		$excel->InsertText($all_dat_count['Type']);
		$excel->InsertText($all_dat_count['Conclusio']);
		$excel->InsertText($all_dat_count['Notes']);
		$excel->GoNewLine();
		$excel->NewLineCol(0,2);

	}

	$excel->GoNewLine();
	$excel->NewLineCol(0,3);
	$excel->InsertText('������ �� ����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('����');
	$excel->InsertText($dimen['Date_dimen']);

	$excel->InsertText('����������� ���');
	$excel->InsertText($dimen['Alter_phase']);

	$excel->InsertText('Cos fi');
	$excel->InsertText($dimen['Cos_fi']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('�������� � ������� ��');
	$excel->InsertText($dimen['Load_fa']);
	$excel->InsertText('���������� �������� �����');
	$excel->InsertText($dimen['Kol_turn_disk']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('�������� � ������� ��');
	$excel->InsertText($dimen['Load_fb']);
	$excel->InsertText('������������ �������� � ���');
	$excel->InsertText($dimen['Power_consum']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('�������� � ������� ��');
	$excel->InsertText($dimen['Load_fc']);
	$excel->GoNewLine();

	$excel->NewLineCol(0,3);
	$excel->InsertText('������ � �������������� ����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('���');
	$excel->InsertText($tr_vol['Type_tr_vol']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('�����');
	$excel->InsertText($tr_vol['Mark_tr_vol']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('�������');
	$excel->InsertText($tr_vol['Denomin_tr_vol']);
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('������');
	$excel->InsertText($tr_vol['Plomb_tr_vol']);
	$excel->GoNewLine();

	$excel->NewLineCol(0,3);
	$excel->InsertText('���� �������� �������������� ����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('����');
	$excel->InsertText('���');
	$excel->InsertText('���������� �� �����');
	$excel->InsertText('����������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	While($all_dat_tr_vol=mysqli_fetch_assoc($all_dat3))
	{
		$excel->InsertText($all_dat_tr_vol['Date_l']);
		$excel->InsertText($all_dat_tr_vol['Type']);
		$excel->InsertText($all_dat_tr_vol['Conclusio']);
		$excel->InsertText($all_dat_tr_vol['Notes']);
		$excel->GoNewLine();
		$excel->NewLineCol(0,2);

	}
	$excel->GoNewLine();
	$excel->NewLineCol(0,3);
	$excel->InsertText('������ � ������ ��������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	$excel->InsertText('����');
	$excel->InsertText('������� ������');
	$excel->InsertText('��� ����, ������ ������');
	$excel->InsertText('����� ������� ��������');
	$excel->InsertText('����� ������ ��������');
	$excel->GoNewLine();
	$excel->NewLineCol(0,2);
	While($change_count=mysqli_fetch_assoc($change_c))
	{
		$excel->InsertText($change_count['Date_change']);
		$excel->InsertText($change_count['Cause_change']);
		$excel->InsertText($change_count['FIO_change']);
		$excel->InsertText($change_count['Nomber_old']);
		$excel->InsertText($change_count['Nomber_new']);
		$excel->GoNewLine();
		$excel->NewLineCol(0,2);

	}
	$excel->SaveFile($filename);

?>