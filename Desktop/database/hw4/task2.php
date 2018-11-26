<?php
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$dbname = "yelp_db";
	$pdo = new PDO('mysql:host=localhost;port=8889;dbname=yelp_db', 
    $username, $password);
	// See the "errors" folder for details...
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Check connection
	
	if ($pdo->connect_error) {
		die("Connection failed: " . $pdo->connect_error);
	} else {
		echo "Connected successfully\n";
		echo "\n";
	}

	$givenbusiness = $_POST["business"];
	$givendate = $_POST["givendate"];
	$beginyear = $_POST["beginyear"];
	$endyear = $_POST["endyear"];
	$submit = $_POST["submit"];

	if ($submit == 'action1') {
		$sql = "CALL TopBusinessOfDay('$givenbusiness', '$givendate')";
		$result = $pdo->query($sql);
		$rows1 = $result->fetchAll(PDO::FETCH_ASSOC);		
	}

	if ($submit == 'action2') {
		$sql2 = "CALL Top10StarsBusiness('$beginyear', '$endyear')";
		$result2 = $pdo->query($sql2);
		$rows2 = $result2->fetchAll(PDO::FETCH_ASSOC);
	}
			
				
?>
<html>
<head></head><body>
	<p>Return top 10 stars business</p>
	<table border="1">
		<tr><td>business_id</td>
		<td>business_name</td>
		<td>reviews</td>
		<td>stars</td>
		<td>details</td></tr>
<?php
if ($rows1) {
	foreach ($rows1 as $row) {
			$id = $row['id'];
			echo "<tr><td>";
			echo($row['id']);
			echo("</td><td>");
			echo($row['name']);
			echo("</td><td>");
			echo($row['reviews']);
			echo("</td><td>");
			echo($row['stars']);
			echo("</td><td>");
			echo("<a href=./business_detail.php?id=$id>business details</a>");
			echo "</td></tr>\n";
		} 
}

if ($rows2) {
	foreach ( $rows2 as $row ) {
			$id = $row['id'];
			echo "<tr><td>";
			echo($row['id']);
			echo("</td><td>");
			echo($row['name']);
			echo("</td><td>");
			echo($row['rate']);
			echo("</td><td>");
			echo($row['stars']);
			echo("</td><td>");
			echo("<a href=./business_detail.php?id=$id>business details</a>");
			echo "</td></tr>\n";
		}
}

?>
</body>
</html>
