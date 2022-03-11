<html>
<head>
	<title>TGD Library</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="functions.js" type="text/javascript"></script>
</head>
	
<body onload="loadscript()">
<?php
require_once('settings.php');

?>
<div id="leftSideDiv">
<center>
<h2>TGD XIV</h2>
<h2>Library</h2>
</center>
<img id="meepleImg" onclick="meepleClick()" src="meeple-teer-LQ-300x300.png" hspace="20" width="200" align="left">

<p><h1>Top 14 Games</h1>
<?php

displayTopTwentyGames();
?>
</p>
</div>

<div id="mainLibraryDiv">
	<div id="gameLookupDiv">
		<p><h2>Scan or Enter Game ID</h2>
		<input class="libraryinput" onfocus="this.value=''" autocomplete="off" id="inputBox" type="text" name="game_id" /autofocus>
		<a href="library.php"><img style="height:50px;width:50px;" align="top" src="resetIcon.png" alt="Reset Screen"></a>
				
		<span id="lookupError" class="libraryinfo">&nbsp;</span>
	</div>
	<div id="lastActionDiv"><span id="lastActionSpan">&nbsp;</span></div>
	<div id="gameInfoDiv">
		<span  id="gameName" class="infoFont">Game Name</span><span class="libraryLabel"> is Available For Checkout</span><br><br>
		<span class="libraryLabel" id="mainBadgeLabel">Badge ID </span><br>
		<input class="libraryinput" id="mainBadgeID" type="text" name="mainBadgeID" onfocus="this.value=''">
		

	</div>
	<div id="buttonDiv">
		<button onclick="lookupClick()" id="actionButton" name="actionButton" value = "1" class="large red button">Action Button</button>
	</div>
	
</div>
<?php require_once('footer.php'); ?> 

</body>
</html>