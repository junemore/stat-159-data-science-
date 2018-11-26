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

	$keyword = $_GET["keyword"];
	$submit = $_GET["submit"];
	
	if ($submit) {
		$sql = "SELECT distinct business.id, business.name, business.stars, review.text FROM business, review WHERE business.id = review.business_id AND review.text LIKE '%$keyword%' LIMIT 20";
		$result = $pdo->query($sql);
		$rows = $result->fetchAll(PDO::FETCH_ASSOC);		
	}

						
?>
<html>
<head></head><body>
	<p>Return top 20 stars business</p>
	<table border="1">
		<tr><td>business_id</td>
		<td>business_name</td>
		<td>stars</td>
		<td>review_text</td>
		<td>business details</td></tr>
<?php
if ($rows) {
	foreach ($rows as $row) {
			$id = $row['id'];
			echo "<tr><td>";
			echo($row['id']);
			echo("</td><td>");
			echo($row['name']);
			echo("</td><td>");
			echo($row['stars']);
			echo("</td><td>");
			echo($row['text']);
			echo("</td><td>");
			echo("<a href=./business_detail.php?id=$id>business details</a>");
			echo "</td></tr>\n";
		} 
}

?>
</body>
</html>
