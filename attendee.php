<html>
<head>
<title>Attendees</title>
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}
th, td {
	padding: 10px;
}
</style>
</head>
<body>

<?php
require_once('settings.php');


$nor ="SELECT id FROM attendee";
$return = $db->query($nor);

if ($return) {
	$rowcount = mysqli_num_rows($return);
	printf("Total: %d Attendees Registered.\n",$rowcount);
	echo "<br><br>";
	mysqli_free_result($return); 
}

$sql = "SELECT id, first_name, last_name, email, phone, badge, time FROM attendee";
$result = $db->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr><th>ID</th><th>Name</th><th>email</th><th>phone</th><th>Badge</th><th>Time</th></tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]." ".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["badge"]."</td><td>".$row["time"]."</td></tr>";
		
	}
	echo "</table>";
} else {
	echo "0 results";
}

?>

</body>
</html>