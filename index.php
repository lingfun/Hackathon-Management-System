<!-- 
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: index.php
Home page, Admin sign in, participant sign up, and participant sign options available. There are links to the left of the page that will direct the user to the location of the corresponding actions.  
-->

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Index</title>
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
<li><a href="#vendor">Vendor</a></li>
<li><a href="#team">Team</a></li>
<li><a href="#aboutus">About us</a></li>
<br><br>
<li><a href="#admin">Admin</a></li>
<li><a href="#signin">Sign in</a></li>
<li><a href="#signup">Sign up</a></li>
<li><a href="signout.php">Sign out</a></li>
<br>
<li><a href="volunteer.php">Volunteer</a></li>


</ul>
</div>


<br><br><br>
<div class="bgimg">
  <div class="topleft">
   
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo" style="font-size:30px"></p>
  </div>
 
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("JUN 1, 2019 15:37:25").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>







<br><br><br><br><br><center><img src="images/picture1.jfif" class="mid" alt="pic of code"></center>	
<BR><BR><BR>
<br><br><br>
<p><font size="20">Start coding here, join us now!</font></p>
<br><br><br><br><br><br>
<center><img src="images/schedule.jpg" class="mid" alt="pic of schedule"></center>
<br><br><br><br><br><br>

<hr>

<form class="modal-content" action="admin.php" method="post">
    <div id="admin" class="container">
      <h1>Admin Sign in</h1>
      <p>Please fill in this form to sign in.</p>
      <hr>
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter username" name="adminusername" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="adminpsw" required>
      

   

      <div class="clearfix">
        <button type="button"  class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign in</button>
      </div>
    </div>
  </form>




<form action="register.php" style="border:1px solid #ccc" method="post">
  <div id="signup" class="container">
    <h1>Participant Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>


    <p>By creating an account you agree to our Terms & Privacy.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<hr>

  <form class="modal-content" action="signin.php" method="post">
    <div id="signin" class="container">
      <h1>Participant Sign in</h1>
      <p>Please fill in this form to sign in.</p>
      <hr>
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      

   

      <div class="clearfix">
        <button type="button"  class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign in</button>
      </div>
    </div>
  </form>
<hr>


<br>

 <div id="sponsor"  align="center">
 <?php
 $dbc = mysqli_connect("localhost", "root", "", "group4") or die(mysql_error());
if ($dbc) {	
 $sponsor = 'select s_name from sponsor';
  
  print '<p><h1>Sponsors informations!</h1></p>';
  
  $r = mysqli_query($dbc,$sponsor) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
   /* if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }*/
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}
  ?>
 </div>
 <br><br><br>
  <div id="vendor"  align="center">
 <?php
 $dbc = mysqli_connect("localhost", "root", "", "group4") or die(mysql_error());
if ($dbc) {	
 $sponsor = 'select v_name from vendor';
  
  print '<p><h1>Vendor informations!</h1></p>';
  
  $r = mysqli_query($dbc,$sponsor) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
   /* if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }*/
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}
  ?>
 </div>
<br><br><br>
  <div id="team" align="center">
  <?php
      $dbc = mysqli_connect("localhost", "root", "", "group4") or die(mysql_error());
if ($dbc) {	
  
  $team = 'select t_name,p_name from participant,team where team.tid=participant.tid order by team.tid';
  
  print '<h1><p>Teams informations!</p></h1>';
  
  $r = mysqli_query($dbc,$team) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
   /* if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }*/
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";

    }

    echo "</tr>";
  }

  echo "</table>";
}
?>
 </div>
<br><br><br>
  <div id="aboutus" >
  <h1>About Us</h1>
     <center><p>The event’s purpose <br>
was to inspire students to work in a collaborative environment to <br>
solve real-world problems by familiarizing themselves with current <br>
technology and creating needed projects.</p>


<p>The event was sponsored by the Center for Career Development, <br>
Computer Information Systems Department, IMPACT Mentoring Program and <br>
 Programming Club as well as industry partners Amazon Web <br>
Services(AWS) Alexa, Wolfram Language, Github and Google.</p></center>
 </div>


 
 
</div>
</body>
</html>
