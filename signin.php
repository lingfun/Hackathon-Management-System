<!-- 
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: signin.php
This page handles the signning in process, and automatically redirects the participant to the prcinfo.php page, additionally, session variables are assigned, and confirmation occurs to verify correct login credentials from the participant table in the group4 database. 
-->
<html>
<head>
<meta charset="UTF-8">
<title>Home</title>
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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Handle the form:
	if ( (!empty($_POST['username'])) && (!empty($_POST['psw'])) ) {
		
		
			session_start();
		$_SESSION['username'] = $_POST['username'];
		
		
		$link=mysqli_connect("localhost", "root", "", "group4") or die(mysql_error());
		if($link) echo "connect";
			
		$uus = $_POST['username'];
		$ppw = $_POST['psw'];

		
		$a = "md5";
		$r = hash($a,$ppw);
		$hash=mysqli_real_escape_string($link,$r);
			
		$q = mysqli_query($link, "SELECT * FROM participant where p_username = '$uus' and p_hash_password = '$hash'");
		if ( mysqli_num_rows($q)>0) 
		{
		date_default_timezone_set('America/New_York');
		
		$time=date('H:i:s');
		//$sql2="INSERT INTO activity
		//VALUES('$uus','$time','LOGIN','','','')";
	//if(mysqli_query($link,$sql2))
	   //print' activity added';



			// Redirect the user to the home page!
			ob_end_clean(); // Destroy the buffer!
			header ('Location: prcinfo.php');
			exit();
		} else { // Incorrect!
			print '<p>The submitted user and password do not match those on file!<br />Go back and try again.</p>';
		}
	} else {
		print '<p>Please make sure you enter both an user and a password!<br />Go back and try again.</p>';
	
	}
}


?>

</html>
</head>