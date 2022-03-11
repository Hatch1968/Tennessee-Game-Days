<?php
require_once('settings.php');

global $db;

$data = array();
$badgeID = $_POST['badgeID'];

// Find Badge

$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
$badgeResult = $db->query($badgeQuery);

		
if ($badgeResult->num_rows == 0) 
{	
	$data['result'] = 'error';
	$data['elog'] = "No Badge with that ID Found";
}
else
{	
	$badge = $badgeResult->fetch_assoc();
	
	$stampInsertQuery = "INSERT INTO prize (badge) VALUES ('$badgeID')";
	if ($db->query($stampInsertQuery) === TRUE)
	{		
		$data['result'] = "added";
		$data['attendee'] = $badge['first_name'] . " " . $badge['last_name'];
		
	}
	else
	{
		$data['result'] = "error";
		$data['elog'] = "Prize Insert Error";
	}	
	
}	
	
echo json_encode($data, JSON_PRETTY_PRINT);
?>