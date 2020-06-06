<!--
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: volunteer.php
Volunteer page that the volunteer can input the full name of a participant to pull up a list of information regarding the particular participant. 
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Index</title>
<link href="2.css" rel="stylesheet" type="text/css">
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




<form id="regForm" action="volunteer.php" method="post">

  <!-- One "tab" for each step in the form: -->
   <h1>Enter participant's Full Name: </h1>
   <input type="text" name="search" > 
    <input type="submit"  value="submit" name="searchsubmit" >

</form>
<div align="center">
<?php

$link = mysqli_connect('localhost', 'root', '', 'group4') or die(mysqli_error());
$s = $_POST['search'];
if($_SERVER['REQUEST_METHOD']=='POST'){
	$query=mysqli_query($link,"SELECT * from participant where p_name = '$s'");


if ( mysqli_num_rows($query)>0)
{
print '<p>Participants informations: </p>';

  $r = mysqli_query($link,"SELECT p_name, p_t_shirt_size, p_food_type from participant where p_name = '$s'") or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr><td></td>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr><td>".$i."</td>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

}	
else
	echo "invalid user.";
}

?><br><br><br>
</div>
