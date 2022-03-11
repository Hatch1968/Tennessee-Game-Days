<html>
<head>
	<title>TGD Stamps</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="functions.js" type="text/javascript"></script>
</head>
	
<body onload="loadStampsScript()">
<?php
require_once('settings.php');

?>
<div id="leftSideDiv">
<center>
<h2>TGD XIV</h2>
<h2>Stamps</h2>
</center>
<img src="meeple-teer-LQ-300x300.png" hspace="20" width="200" align="left">
<br><br><br><br>
<br><br><center><h1>Total Stamps</h1></center>
<?php

echo '<center><h1>' . getStampsTotal() . '</h1></center>';
?>

</div>

<?php



?>

<div id="mainLibraryDiv">

	<div id="gameLookupDiv">
		<p><h2>Scan or Enter Badge</h2>
		<input class="libraryInput" onfocus="this.value=''" autocomplete="off" id="badgeID" type="text" name="badgeID" /autofocus><br>
		<span id="badgeError" class="libraryinfo">&nbsp;</span>
</div>
</div>

<?php require_once('footer.php'); ?>

</body>
</html>