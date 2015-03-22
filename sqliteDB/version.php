<!DOCTYPE html>

<html lang='en'>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


echo sqlite_libversion();
echo "<br />";

$err = 0;
$db = new SQLiteDatabase('DB/ws_estimator.db', 0666, $errMsg);

/*
$query = $db->query("DROP TABLE Costs", SQLITE_ASSOC, $err);
$query = $db->query("CREATE TABLE Costs (id int, feature text, cost int)", SQLITE_ASSOC, $err);

$query = $db->query("INSERT INTO Costs Values(1, 'multilingual', 10000)", SQLITE_ASSOC, $err);
$query = $db->query("INSERT INTO Costs Values(2, 'analytics', 1000)", SQLITE_ASSOC, $err);
*/

$resultSet = $db->query('SELECT * FROM Costs', SQLITE_ASSOC, $err);

while($row = $resultSet->fetch()) {
	$feature = $row['feature'];
	echo("<p>feature: $feature</p>");

	echo("<p style='color: red'>" . $row['feature'] . "</p>");
}

echo("<p>Hello</p>");
?>

</body>
</html>