<!--
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: register.php
This page handles registration, upon a successful registration ( username does not already exist in the group4 databse of participant table), the user will be directed to the prcinfo.php page, otherwise an error message will pop up stating that an username already exists. 
-->
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<link href="1.css" rel="stylesheet" type="text/css">
</head>

<body>
<div style="text-align:center";>
<div class="bannerbackground"></div>
<br><br><br>
<font size="30"><b><center>RUSHCORP</center></b></font>
<font size="28"><b><center>Saturday, June 1st, 2019</center></b></font>
<br>

<div class="menu">
<ul>
<br>
<li><a href="index.php">Home</a></li>
<li><a href="#sponsor">Sponsor</a></li>
<li><a href="#team">Team</a></li>
<li><a href="#aboutus">About Us</a></li>
<br><br>
<li><a href="index.php#signin">Sign in</a></li>
<li><a href="index.php#signup">Sign up</a></li>
<li><a href="signout.php">Sign out</a></li>
<br>
<li><a href="volunteer.php">Volunteer</a></li>

</ul>
</div>

<?php
// file name: register.php
// file creation date: may 5, 2019
// enter user name and password to register
// Will record data

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$problem = FALSE; // No problems so far.

	// Check for each value...
	if (empty($_POST['username'])) {
		$problem = TRUE;
		print '<p class="error">Please enter your user name!</p>';
	}

	if (empty($_POST['psw'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a password!</p>';
	}
	
	if ($_POST['psw'] != $_POST['psw-repeat']) {
		$problem = TRUE;
		print '<p class="error">Your password did not match your confirmed password!</p>';
	} 
	
$link = mysqli_connect('localhost', 'root', '', 'group4') or die(mysqli_error());
$uus = $_POST['username'];
$ppw = $_POST['psw'];	
	$query=mysqli_query($link,"SELECT * FROM participant WHERE p_username='$uus'");
		if ( mysqli_num_rows($query)>0)
		{
			$problem = TRUE;
			print '<b><h2>The email/username is existed,<br> please use another one.</h2></b>';
		}
	
	if (!$problem) { // If there weren't any problems...
	
		// Print a message:
		print '<p>You are now registered!<br />Click "sign in" on the left to sign in now!</p>';
		
// add to participant


$a = "md5";
$r = hash($a,$ppw);
$hash=mysqli_real_escape_string($link,$r);	
$qq =  "INSERT INTO participant 
	VALUES (null, '', '$uus', '$hash', '','','' )";

if(mysqli_query($link, $qq)){
	print '<p>The user has been added!</p>';

// add to activity
//date_default_timezone_set('America/New_York');

//		$time=date('H:i:s');
//		$sql2="INSERT INTO activity
//		VALUES('$uus','$time','REGISTRATION','','','')";
//	if(mysqli_query($link,$sql2))
//	   print' activity added';
	
		// Clear the posted values:
//		$_POST = array();
	
//	} else { // Forgot a field.
	
//		print '<p class="error">Please try again!</p>';
		
	}

}
	

	
} // End of handle form IF.

// Create the form:
?>

</body>
</html>


