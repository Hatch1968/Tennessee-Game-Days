<html>
<head>
	<title>Registration</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<script src="functions.js" type="text/javascript"></script>
</head>

<body>
<div id="leftSideDiv">
<center>
<h2>TGD XIV</h2>
<h2>Registration</h2>
</center>
<img src="meeple-teer-LQ-300x300.png" hspace="20" width="200" align="left">
</div>
<?php
require_once('settings.php');

// define variables and set to empty values
$first_nameErr = $last_nameErr = $emailErr = $phoneErr = $badgeErr = $badgeconErr = $vkeyErr = "";
$first_name = $last_name = $email = $phone = $badge = $badgecon = $vkey = "";


if(array_key_exists('submit',$_POST)){

$vpin = get_confirmation_pin();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["first_name"])) {
			$first_nameErr = "Name is required";
	} else {
	  $first_name = test_input($_POST["first_name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
		  $first_nameErr = "Only letters and white space allowed";
	  }
	}

	if (empty($_POST["last_name"])) 
	{
			$last_nameErr = "Name is required";
	} 
	else 
	{
	  $last_name = test_input($_POST["last_name"]);
	  if (!preg_match("/^[a-zA-Z ,'.]*$/",$last_name)) {
		  $last_nameErr = "Only letters and white space allowed";
	  }
	}

	if (empty($_POST["email"])) {
	  $emailErr = "Email is required";
	} else {
	  $email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
	}
	  }

	if (empty($_POST["phone"])) {
	  $phoneErr = "Phone number is required";
	} else {
	  }

	if (empty($_POST["badge"])) {
	  $badgeErr = "Badge Number is required";
	} else {
	  }
	  
	if ($_POST["badge"] !== $_POST["badgecon"]) {
		$badgeconErr = "Badge Number mismatch";
	} else {
		
	}

	if ($_POST["vkey"] !== $vpin) {
		$vkeyErr = "Confirmation PIN incorrect";
	} else {
		
	}
	  
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$badge = $_POST['badge']; 
	$badgecon = $_POST['badgecon'];
	$vkey = $_POST['vkey'];

	$sql = "INSERT INTO attendee (first_name, last_name, email, phone, badge) VALUES ('$first_name', '$last_name', '$email', '$phone', '$badge')";

	$prz = "INSERT INTO prize (first_name, last_name, badge) VALUES ('$first_name', '$last_name', '$badge')";

	if (empty($first_nameErr) && empty($last_nameErr) && empty($emailErr) && empty($phoneErr) && empty($badgeErr) && empty($badgeconErr) && empty($vkeyErr))
	{

		if ($db->query($sql) != TRUE)
			die('Error: ' . mysqli_error());

		if ($db->query($prz) != TRUE)
			die('Error: ' . mysqli_error());


	echo '<script type="text/javascript"> window.location="registration.php";</script>';

	} 
}
}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<p><h1>Each Party Member Must Fill Out</h1>


<p><b>First Name </b><input type="text" name="first_name" value="<?php echo $first_name; ?>" /autofocus>
<span class="error">* <?php echo $first_nameErr; ?></span></p>

<p><b>Last Name </b><input type="text" name="last_name" value="<?php echo $last_name; ?>">
<span class="error">* <?php echo $last_nameErr; ?></span></p>

<p><b>Email Address </b><input type="text" name="email" value="<?php echo $email; ?>">
<span class="error">* <?php echo $emailErr; ?></span></p>

<p><b>Phone Number (xxx-xxx-xxxx) </b><input type="text" name="phone" value="<?php echo $phone; ?>">
<span class="error">* <?php echo $phoneErr; ?></span></p>

<p style="font-size:25px">STOP HERE - RETURN iPad TO DESK ATTENDANT</p>

<p>Badge Number <input type="text" name="badge" value="<?php echo $badge; ?>">
<span class="error">* <?php echo $badgeErr; ?></span></p>

<p>Confirm Badge <input type="text" name="badgecon" value="<?php echo $badgecon; ?>">
<span class="error">* <?php echo $badgeconErr; ?></span></p>

<p>Verification Key <input autocomplete="off" type="text" name="vkey" value="<?php echo $vkey; ?>">
<span class="error">* <?php echo $vkeyErr; ?></span></p>

<input type="submit" value="Register" name="submit"/>
</form> 

<?php require_once('footer.php'); ?>

</body>
</html>