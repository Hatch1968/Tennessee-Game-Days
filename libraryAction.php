<?php
require_once('settings.php');

global $db;

$data = array();
$gameID = $_POST['gameID'];
$badgeID = $_POST['badgeID'];

$action = (int) $_POST['action'];

// Find Game

$gameQuery = "SELECT * FROM `library` WHERE `gameid` = '$gameID'";

$result = $db->query($gameQuery);
		
if ($result->num_rows == 0) 
{	
	$data['result'] = 'error';
	$data['elog'] = "Game Not Found in Library";
}
else
{	
	
	$game = $result->fetch_assoc();
	$data['gamename'] = $game['gamename'];	

	// Check for Active Checkout (checkoutDate != NULL AND checkinDate == NULL)
		
	$statusQuery = "SELECT * FROM `libraryEvent` WHERE `gameid` = '$gameID' AND `checkoutDate` IS NOT NULL AND `checkinDate` IS NULL";
	$statusResult = $db->query($statusQuery);
	
	if ($statusResult->num_rows != 0) 
	{	// It is Checked Out - Check it Back In
		$event = $statusResult->fetch_assoc();
			
		$eventID = $event['eventID'];
		$currentTime = time() + 7200; // Server is in California
		
		$updateQuery = "UPDATE libraryEvent SET checkinDate = $currentTime WHERE eventID = $eventID";
		
		if ($db->query($updateQuery) === TRUE)
			{
				$data['result'] = "checkedin";
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Library Event Update Error";
			}
				


	}
	else
	{ // Is Not Checked Out - Was Badge ID Set?
		
		if ($badgeID != '')
		{
			// Find Badge
			$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
			$badgeResult = $db->query($badgeQuery);
						
			if ($badgeResult->num_rows != 0) 
			{
				
				// Badge Found - Does it already have a game checked out
				$attendee = $badgeResult->fetch_assoc();
				
				$badgeInUseQuery = "SELECT * FROM `libraryEvent` WHERE `badgeID` = '$badgeID' AND `checkoutDate` IS NOT NULL AND `checkinDate` IS NULL";
				$badgeInUseResult = $db->query($badgeInUseQuery);
				if ($badgeInUseResult->num_rows != 0) 
				{	// Badge Already has a Game Checked Out
					$data['result'] = "badgeinuse";
					$data['elog'] = "That Badge ID already has a game checked out.";
				
				}
				else
				{
					$currentTime = time() + 7200; // Server is in California
					// Create New Library Event
					$eventInsertQuery = "INSERT INTO libraryEvent (gameID, checkoutDate, badgeID) VALUES ('$gameID', '$currentTime', '$badgeID')";
					if ($db->query($eventInsertQuery) === TRUE)
					{
						$data['attendee'] = $attendee['first_name'] . " " . $attendee['last_name'];
						$data['result'] = "checkedout";
						
					}
					else
					{
						$data['result'] = "error";
						$data['elog'] = "Insert Error";
					}
				}
			}
			else
			{
				$data['result'] = "badgeerror";
				$data['elog'] = "No Attendee with that Badge ID Found";
			}
			
		}
		else
		{
			$data['result'] = "available";
			
			
		}
		
		
	}
	
}	


	

	
echo json_encode($data, JSON_PRETTY_PRINT);
?>