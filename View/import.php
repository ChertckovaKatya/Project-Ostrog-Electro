<?php
// ���������� ����������
pear install <PHPExcel-1.8>.tgz;
include_path="C:/xampp/apache/lib/PHPExcel-1.8";
require_once "PHPExcel.php";

// ������� �������������� ����� Excel � ������� MySQL, � ������ ������������ ����� � ��������.
// �������� ������� ��� ������������. ���������:
//     $worksheet - ���� Excel
//     $connection - ���������� � MySQL (mysqli)
//     $table_name - ��� ������� MySQL
//     $columns_name_line - ������ � ������� �������� ������� MySQL (0 - ����� ���� column + n)
		function excel2mysql($worksheet, $connection, $table_name, $columns_name_line = 0) {
           // ��������� ���������� � MySQL
  if (!$connection->connect_error) {
    // ������ ��� �������� �������� ������� MySQL
    $columns_str = "";
    // ���������� �������� �� ����� Excel
    $columns_count = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());

    // ���������� ������� ����� Excel � ���������� ������ � ������� ����� �������
    for ($column = 0; $column < $columns_count; $column++) {
      $columns_str .= ($columns_name_line == 0 ? "column" . $column : $worksheet->getCellByColumnAndRow($column, $columns_name_line)->getCalculatedValue()) . ",";
    }

    // �������� ������, ������ ������� � �����
    $columns_str = substr($columns_str, 0, -1);

    // ������� ������� MySQL, ���� ��� ������������
    if ($connection->query("DROP TABLE IF EXISTS " . $table_name)) {
      // ������� ������� MySQL
      if ($connection->query("CREATE TABLE " . $table_name . " (" . str_replace(",", " TEXT NOT NULL,", $columns_str) . " TEXT NOT NULL)")) {
        // ���������� ����� �� ����� Excel
        $rows_count = $worksheet->getHighestRow();

        // ���������� ������ ����� Excel
        for ($row = $columns_name_line + 1; $row <= $rows_count; $row++) {
          // ������ �� ���������� ���� �������� � ������ ����� Excel
          $value_str = "";

          // ���������� ������� ����� Excel
          for ($column = 0; $column < $columns_count; $column++) {
            // ������ �� ��������� ������������ ����� ����� Excel
            $merged_value = "";
            // ������ ����� Excel
            $cell = $worksheet->getCellByColumnAndRow($column, $row);

            // ���������� ������ ������������ ����� ����� Excel
            foreach ($worksheet->getMergeCells() as $mergedCells) {
              // ���� ������� ������ - ������������,
              if ($cell->isInRange($mergedCells)) {
                // �� ��������� �������� ������ ������������ ������, � ���������� � � �������� ��������
                // ������� ������
                $merged_value = $worksheet->getCell(explode(":", $mergedCells)[0])->getCalculatedValue();
                break;
              }
            }

            // ���������, ��� ������ �� ������������: ���� ���, �� ����� �� ��������, ����� �������� ������
            // ������������ ������
            $value_str .= "'" . (strlen($merged_value) == 0 ? $cell->getCalculatedValue() : $merged_value) . "',";
          }

          // �������� ������, ������ ������� � �����
          $value_str = substr($value_str, 0, -1);

          // ��������� ������ � ������� MySQL
          $connection->query("INSERT INTO " . $table_name . " (" . $columns_str . ") VALUES (" . $value_str . ")");
        }
      } else	{
					return false;
				}
    } else 		{
					return false;
				}
  } else 		{
					return false;
				}

 return true;
}

// ���������� � ����� MySQL
require 'connection.php';
// �������� ��������� UTF-8


// ��������� ���� Excel
$PHPExcel_file = PHPExcel_IOFactory::load("./file.xlsx");

// ����������� ������ ���� Excel � ������� MySQL
$PHPExcel_file->setActiveSheetIndex(0);
echo excel2mysql($PHPExcel_file->getActiveSheet(), $connection, "excel2mysql0", 1) ? "OK/n" : "FAIL/n";

// ���������� ��� ����� Excel � ����������� � ������� MySQL
foreach ($PHPExcel_file->getWorksheetIterator() as $index => $worksheet) {
  echo excel2mysql($worksheet, $connection, "excel2mysql" . ($index != 0 ? $index : ""), 1) ? "OK/n" : "FAIL/n";
}

?>