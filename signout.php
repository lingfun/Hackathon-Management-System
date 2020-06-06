<!-- 
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: signout.php
Sign out page, participant or admin session id will be destroyed depending on who the user is. An attempt to use the back button to go back to the previous page will not work as the session id will be destroyed upon entering this page. The user is directed back to the index.php page if they click on the back button. 
-->
<html>
<head>
<meta charset="UTF-8">
<title>Sign out</title>
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
<li><a href="index.php#admin">Admin</a></li>
<li><a href="index.php#signin">Sign in</a></li>
<li><a href="index.php#signup">Sign up</a></li>
<li><a href="signout.php">Sign out</a></li>
<br>
<li><a href="volunteer.php">Volunteer</a></li>

</ul>
</div>


<?php
session_start();
if($_SESSION["username"] != true)
  {
    header('location:index.php');
  }

		
session_destroy();


?>

<p>You are now logged out.</p>
<p>Thank you for using this site. We
hope that you liked it.</p>


</html>
</head>