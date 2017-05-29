<html>
<head>
<meta charset="utf-8">
</head>
<body>
<br>
<?php
include 'connection.php';
// выполняем операции с базой данных
$query ="select fio,pol,mesto from passenger;";
$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
if($result)
{
    echo "Выполнение запроса прошло успешно";
	$rows = mysqli_num_rows($result); // количество полученных строк
	echo "<table><tr><th>ФИО</th><th>Пол</th><th>Место</th></tr>";
	for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
	mysqli_free_result($result);
}
 
// закрываем подключение
mysqli_close($connect);

?>
</body>
</html>