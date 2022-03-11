<html>
<head>
	<title>TGD Library</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="functions.js" type="text/javascript"></script>
</head>
	
<body onload="loadPTWscript()">
<?php
require_once('settings.php');

// define variables and set to empty values
$game_idErr = $badge_idErr = "";
$vercheck = $game_id = $badge_id = $gamepost = $namepost = "";
$gamename[0] = $badgename[0] = $badgename[1] = "";

?>
<div id="leftSideDiv">
<center>
<h2>TGD XIV</h2>
<h2>Play To Win</h2>
</center>
<img src="meeple-teer-LQ-300x300.png" hspace="20" width="200" align="left">

</div>

<?php



?>
<div id="mainPTWDiv">
<div id="gameLookupDiv">
<span class="libraryLabel">Game ID </span><br>
<input class="libraryInput" type="text" name="gameID" id="gameID" /autofocus>
<a href="ptwentry.php"><img style="height:50px;width:50px;" align="top" src="resetIcon.png" alt="Reset Screen"></a>
<br><span id="lookupError" class="libraryinfo">&nbsp;</span>
</div>


<div id="badgeEntriesDiv">
<span class="libraryLabel">Badge Entries </span><br>

<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID1" id="badgeID1"> <span class="libraryinfo" id="badgeError1"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID2" id="badgeID2"> <span class="libraryinfo" id="badgeError2"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID3" id="badgeID3"> <span class="libraryinfo" id="badgeError3"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID4" id="badgeID4"> <span class="libraryinfo" id="badgeError4"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID5" id="badgeID5"> <span class="libraryinfo" id="badgeError5"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID6" id="badgeID6"> <span class="libraryinfo" id="badgeError6"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID7" id="badgeID7"> <span class="libraryinfo" id="badgeError7"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID8" id="badgeID8"> <span class="libraryinfo" id="badgeError8"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID9" id="badgeID9"> <span class="libraryinfo" id="badgeError9"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID10" id="badgeID10"> <span class="libraryinfo" id="badgeError10"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID11" id="badgeID11"> <span class="libraryinfo" id="badgeError11"></span><br>
<input onkeydown = "nextBadge(this.id, event.keyCode)" class="ptwinput" type="text" name="badgeID12" id="badgeID12"> <span class="libraryinfo" id="badgeError12"></span><br>

</div>
<div id="buttonDiv">
		<button onclick="ptwClick()" id="actionButton" name="actionButton" value = "1" class="large red button">Action Button</button>
</div>

</div>
<?php require_once('footer.php'); ?>

</body>
</html>