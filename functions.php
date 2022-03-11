<?php

//Define All Constants Here
define("CURRENT_TGD_NUMBER", 14);
define("CURRENT_TGD_NUMBER_ROMAN", "XIV");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function getGameName ($gameID)
{
	global $db;

	$gameQuery = "SELECT * FROM `library` WHERE `gameid` = '$gameID'";

	$result = $db->query($gameQuery);	
	
	if ($result->num_rows != 0) 
	{	
		$game = $result->fetch_assoc();
		return $game['gamename'];	 
	}
	else
		return "error";
	
	
}

function getStampsTotal(){

global $db;

$stampQuery = "SELECT * FROM prize";
$stampsResult = $db->query($stampQuery);

return $stampsResult->num_rows;	
	
}


function get_confirmation_pin(){
	
global $db;

$pinQuery = "SELECT pin FROM confirmation";
$result = $db->query($pinQuery);	

$pin = $result->fetch_assoc();

return $pin["pin"];

}

function displayTopTwentyGames() {
	
global $db;

$badgeQuery = "SELECT gameID, COUNT(*) FROM `libraryEvent` GROUP BY gameID ORDER BY COUNT(*) DESC LIMIT 14";

$result = $db->query($badgeQuery);	

$ordinal = 1;
while ($row = $result->fetch_assoc()) {
		echo "#" . $ordinal . ": ";
        printf ("%s [%s]\n", getGameName($row["gameID"]), $row["COUNT(*)"]);
		echo "<br>";
		$ordinal++;
    }
}


function getBadgeNameString ($badgeID)
{
global $db;

$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";

$result = $db->query($badgeQuery);	

if ($result->num_rows != 0) 
{	
	$badge = $result->fetch_assoc();
	return $badge['first_name'] . " " . $badge['last_name'] . " ($badgeID)";	 
}
else
	return "Badge Data not Found";

	

}

?>