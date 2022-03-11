<html>
<head>
	<title>Prize Picker</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="functions.js" type="text/javascript"></script>
</head>

<body>
<div id="leftSideDiv">
<center>
<h2>TGD XIV</h2>
<h2>Prize Picker</h2>
</center>
<img src="meeple-teer-LQ-300x300.png" hspace="20" width="200" align="left">
</div>
<?php
require_once('settings.php');

$submitcheck = $winners = $finalize = $outrow = $vercheck = $request = $crow = $limit = "";

if(array_key_exists('action',$_POST)){

$limit = test_input($_POST["request"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["request"])) {
		$request_idErr = "Number Needed";
		} 

if ($_POST["action"] == "Submit") {

	if (empty($request_idErr)) {	
	
$findQuery = "SELECT DISTINCT badge FROM prize WHERE badge NOT IN (SELECT badge FROM ineligible) ORDER BY RAND() LIMIT $limit";
$result = $db->query($findQuery);
$vercheck="Yes";
$submitcheck = 1;
}

}

if ($_POST["action"] == "Accept") {

$winners = "SELECT * FROM tempprize";
$getwinners = $db->query($winners);

for ($j=0; $j < $getwinners->num_rows; $j++) {
	$stage = $getwinners->fetch_assoc();
	$badge = $stage['badge'];
	$finalize = "INSERT INTO ineligible VALUES ('$badge')";
	$terminus = $db->query($finalize);
		
	}
	
$prep = "TRUNCATE tempprize";
$clear = $db->query($prep);

echo '<script type="text/javascript"> window.location="picker.php";</script>';
exit();

}

if ($_POST["action"] == "Redraw") {
	
$prep = "TRUNCATE tempprize";
$clear = $db->query($prep);

echo '<script type="text/javascript"> window.location="picker.php";</script>';
exit();

}



}

}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<h1>Number of Winners Needed:</h1>
<input class = "ptwinput" type="number" style="width: 50px" name="request" min="1" value="<?php echo $request; ?>" /autofocus>
<span class="error">* <?php echo $request_idErr; ?></span></p>

<?php if($submitcheck == 0){
	echo "<input type=\"submit\" value=\"Submit\" name=\"action\"/>";
	echo "<br><br>";
}
?>

<?php if($vercheck == "Yes"){	
	echo "<table>";
	echo "<tr><td><h1>Name (Badge #)</h1></td></tr>";
	
for ($i=0; $i < $result->num_rows; $i++) {
	$crow = $result->fetch_assoc();
	$badge = $crow['badge'];
	$writetemp = "INSERT INTO tempprize VALUES ($badge)";
	echo "<tr><td>".getBadgeNameString($badge)."</td></tr>";
	$store = $db->query($writetemp);
		
	}
	
	echo "</table>";
	echo "<br><br>";
	echo "<input type=\"submit\" style=\"margin-right: 200px\" value=\"Accept\" name=\"action\"/>";
	echo "<input type=\"submit\" value=\"Redraw\" name=\"action\"/>"; 
}

 ?>


</form> 

</body>
</html>