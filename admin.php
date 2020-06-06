<!-- 
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: admin.php
If the entered password or username does not match with the information in the database, the user will be directed to this page after attempting to sign in with admin information.
-->



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin</title>
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
<li><a href="index.php#admin">Admin</li>
<li><a href="index.php#signin">Sign in</a></li>
<li><a href="index.php#signup">Sign up</a></li>
<li><a href="signout.php">Sign out</a></li>
<br>
<li><a href="volunteer.php">Volunteer</a></li>


</ul>
</div>


</body>
</html>
<?php
	
	$uu=$_POST['adminusername'];
	$pass=$_POST['adminpsw'];
	$a = "md5";
	$hash = hash($a,$pass);
	if($uu=='admin'&& $hash=='2bf4d1d51b09c609caa98951b101b8b8')
	{	
		session_start();
		$_SESSION['username'] = $_POST['adminusername'];	
		header ('Location: adminpage.php');
			exit();
	}
	else{
		print '<p>The submitted user and password do not match those on file!<br />Go back and try again.</p>';
	}
  
?>
</div>