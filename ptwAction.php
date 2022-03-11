<?php
require_once('settings.php');

global $db;

$data = array();

if (empty($_POST["gameID"]))
{
	$data['result'] = 'error';
	$data['elog'] = "Game ID not passed to API.";
}
else
{
	$gameID = $_POST['gameID'];
	// Find Game

	$gameQuery = "SELECT * FROM `ptwgames` WHERE `gameid` = '$gameID'";

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
		$data['result'] = 'gamefound';

		// Check for Active Checkout (checkoutDate != NULL AND checkinDate == NULL)		
		
	}	


if (!empty($_POST["badge1"]))	
{		
	$data['result'] = 'badgesprocessed';

	$badgeID = $_POST["badge1"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge1'] = "$badgeID";
				$data['badge1user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge1'] = 'nope';
		
	}
	else
		$data['badge1'] = 'dupe';
	
	// Now Badge 2
	
	if (!empty($_POST["badge2"]))	
	{		
	$badgeID = $_POST["badge2"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge2'] = "$badgeID";
				$data['badge2user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge2'] = 'nope';
		
	}
	else
		$data['badge2'] = 'dupe';
	
	}
	
	// Now Badge 3
	
	if (!empty($_POST["badge3"]))	
	{		
	$badgeID = $_POST["badge3"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge3'] = "$badgeID";
				$data['badge3user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge3'] = 'nope';
		
	}
	else
		$data['badge3'] = 'dupe';
	
	}
	
	// Now Badge 4
	
	if (!empty($_POST["badge4"]))	
	{		
	$badgeID = $_POST["badge4"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge4'] = "$badgeID";
				$data['badge4user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge4'] = 'nope';
		
	}
	else
		$data['badge4'] = 'dupe';
	
	}
	
	// Now Badge 5
	
	if (!empty($_POST["badge5"]))	
	{		
	$badgeID = $_POST["badge5"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge5'] = "$badgeID";
				$data['badge5user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge5'] = 'nope';
		
	}
	else
		$data['badge5'] = 'dupe';
	
	}
	
	// Now Badge 6
	
	if (!empty($_POST["badge6"]))	
	{		
	$badgeID = $_POST["badge6"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge6'] = "$badgeID";
				$data['badge2user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge6'] = 'nope';
		
	}
	else
		$data['badge6'] = 'dupe';
	
	}
	
	// Now Badge 7
	
	if (!empty($_POST["badge7"]))	
	{		
	$badgeID = $_POST["badge7"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge7'] = "$badgeID";
				$data['badge7user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge7'] = 'nope';
		
	}
	else
		$data['badge7'] = 'dupe';
	
	}
	
	// Now Badge 8
	
	if (!empty($_POST["badge8"]))	
	{		
	$badgeID = $_POST["badge8"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge8'] = "$badgeID";
				$data['badge8user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge8'] = 'nope';
		
	}
	else
		$data['badge8'] = 'dupe';
	
	}
	
	// Now Badge 9
	
	if (!empty($_POST["badge9"]))	
	{		
	$badgeID = $_POST["badge9"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge9'] = "$badgeID";
				$data['badge9user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge9'] = 'nope';
		
	}
	else
		$data['badge9'] = 'dupe';
	
	}
	
	// Now Badge 10
	
	if (!empty($_POST["badge10"]))	
	{		
	$badgeID = $_POST["badge10"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge10'] = "$badgeID";
				$data['badge10user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge10'] = 'nope';
		
	}
	else
		$data['badge10'] = 'dupe';
	
	}
	
	// Now Badge 11
	
	if (!empty($_POST["badge11"]))	
	{		
	$badgeID = $_POST["badge11"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge11'] = "$badgeID";
				$data['badge11user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge11'] = 'nope';
		
	}
	else
		$data['badge11'] = 'dupe';
	
	}
	
	// Now Badge 12
	
	if (!empty($_POST["badge12"]))	
	{		
	$badgeID = $_POST["badge12"];
	$dupeQuery = "SELECT * FROM `ptwprize` WHERE `badgeid` = '$badgeID' AND `gameid` = '$gameID'";
	$dupeResult = $db->query($dupeQuery);
						
	if ($dupeResult->num_rows == 0) 
	{
		$badgeQuery = "SELECT * FROM `attendee` WHERE `badge` = '$badgeID'";
		$badgeResult = $db->query($badgeQuery);
		
		if ($badgeResult->num_rows != 0) 
		{
		
			$attendee = $badgeResult->fetch_assoc();
			
			$ptwInsertQuery = "INSERT INTO ptwprize (gameid, badgeid) VALUES ('$gameID', '$badgeID')";
			if ($db->query($ptwInsertQuery) === TRUE)
			{		
				$data['badge12'] = "$badgeID";
				$data['badge12user'] = $attendee['first_name'] . " " . $attendee['last_name'];
				
			}
			else
			{
				$data['result'] = "error";
				$data['elog'] = "Insert Error";
			}
		}
		else
			$data['badge12'] = 'nope';
		
	}
	else
		$data['badge12'] = 'dupe';
	
	}

}
}	
echo json_encode($data, JSON_PRETTY_PRINT);
?>