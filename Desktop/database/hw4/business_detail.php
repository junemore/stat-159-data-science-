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

	$business_id = $_GET["id"];

	$sql = "SELECT * FROM business WHERE id = '$business_id'";
	$result = $pdo->query($sql);
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);		
							
?>
<html>
<head></head><body>
	<p>Restaurant Detail</p>
	<table border="1">
		<tr><td>business_id</td>
		<td>business_name</td>
		<td>neighborhood</td>
		<td>address</td>
		<td>city</td>
		<td>state</td>
		<td>postal_code</td>
		<td>latitude</td>
		<td>longitude</td>
		<td>stars</td>
		<td>review_count</td>
		<td>is_open</td></tr>
<?php
if ($rows) {
	foreach ($rows as $row) {
			echo "<tr><td>";
			echo($row['id']);
			echo("</td><td>");
			echo($row['name']);
			echo("</td><td>");
			echo($row['neighborhood']);
			echo("</td><td>");
			echo($row['address']);
			echo("</td><td>");
			echo($row['city']);
			echo("</td><td>");
			echo($row['state']);
			echo("</td><td>");
			echo($row['postal_code']);
			echo("</td><td>");
			echo($row['latitude']);
			echo("</td><td>");
			echo($row['longitude']);
			echo("</td><td>");
			echo($row['stars']);
			echo("</td><td>");
			echo($row['review_count']);
			echo("</td><td>");
			echo($row['is_open']);
			echo("</td><td>");
			
		} 
}
?>
</body>
</html>