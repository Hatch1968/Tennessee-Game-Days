<html>
<head>
	<title>TGD Library</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="functions.js" type="text/javascript"></script>
</head>
	
<body>
<?php
require_once('settings.php');

?>
<div id="leftSideDiv">
<center>
<h2>TGD XIV</h2>
<h2>Checked Out</h2>
<h2>Games</h2>
</center>
<img id="meepleImg" onclick="meepleClick()" src="meeple-teer-LQ-300x300.png" hspace="20" width="200" align="left">

</div>

<div id="mainLibraryDiv">
<?php
$checkedOutQuery = "SELECT * FROM libraryEvent JOIN library ON libraryEvent.gameID = library.gameid JOIN attendee ON libraryEvent.badgeID = attendee.badge WHERE libraryEvent.checkoutDate IS NOT NULL AND checkinDate IS NULL";
$checkedOutResult = $db->query($checkedOutQuery);
	echo "<table>";
	echo "<tr><th>Game Name</th><th>Game ID</th><th>Out To</th><th>Time Checked Out</th></tr>";
	
	for ($i=0; $i < $checkedOutResult->num_rows; $i++) {
	$crow = $checkedOutResult->fetch_assoc();
	echo "<tr><td>" . $crow['gamename']."</td>";
	echo "<td>" . $crow['gameID']."</td>";
	echo "<td>" . $crow['first_name'] . " " . $crow['last_name'] ."</td>";
	echo "<td>" . date("F j, Y, g:i a", $crow['checkoutDate']) ."</td>";
	echo "</tr>";
	}	

	echo "</table>";
	
?>	
</div>
<?php require_once('footer.php'); ?> 

</body>
</html>