<!--
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: adminpage.php
Admin page, the admin has the option to enter sponsor, vendor, or judge information. Clicking on the buttons will add their corresponding information to the group4 database in their corresponding tables. There is a sign out button on the top right that will destroy the session id associated with the admin upon clicking on it. An attempt to click on the back button will not redirect the admin back to the admin page as the session id will be destroyed on the sign out page, the admin will then be directed back to the index.php page.
-->
<?php
session_start();
if($_SESSION["username"] != true)
  {
    header('location:index.php');
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <style>
      #element1 {padding-left: 350px;}
      #element2 {padding-left: 850px; float:left;}
      .heading
      {
        box-sizing: border-box;

        height: 48px;
        border: 2px solid;
        padding: 0.75em;
    
        text-indent: 46%;
        border-radius: 30px;
        background-color: #B0F9CE;
      }

      #body 
      {
        background-color: #92C4DE;
      }

      #logout
      {
        text-indent: 80%;
        font-size: 25px;
        padding-right: 0px;
      }
      .links
      {
        font-size: 20px;
        padding: 100px;
      }
      #submit
      {
        text-indent: -170%;
      }
    </style>
  </head>
  <body id = "body">
  <form action="adminpage.php" method="post">
  <p><font size = "16"><center>Admin Page</center></font></p>
  <p id = "logout"><a href="signout.php">Sign out</a></p>
  </span>
  <p class = "heading">Sponsor</p>
  <div id="element1">
   Name:
  </div>
  <div id="element2">
   <input type="text" name="sponsorname" size = "20" maxlength = "40">
  </div>
<br>
<br>
<div id="element1">
   Amount promised:
  </div>
   <div id="element2">
   <input type="text" name="amountpromised" size = "20" maxlength = "40"> 
  </div>
<br>
<br>
<div id="element1">
   Amount paid:
  </div>
   <div id="element2">
   <input type="text" name="amountpaid" size = "20" maxlength = "40"> 
   <p id = "submit" ><input type="submit" value="Add / Update Sponsor information" name="sponsorsubmit"><input type="submit" value="Delete" name="Dspo"></p>
  </div>
<br>
<br>
<br>
 <p class = "heading">Vendor</p>
  <div id="element1">
   Name:
  </div>
   <div id="element2">
   <input type="text" name="vendorname" size = "20" maxlength = "40"> 
  </div>
<br>
<br>
<div id="element1">
   Type:
 </div>
   <div id="element2">
   <select name="foodtype">
        <option value="meat">Meat</option>
        <option value="vegetarian">Vegetarian</option>
    </select>
  </div>
<br>
<br>
<div id="element1">
   Bill amount:
  </div>
   <div id="element2">
   <input type="text" name="billamount" size = "20" maxlength = "40"> 
  </div>
<br>
<br>
<div id="element1">
   Bill paid:
  </div>
   <div id="element2">
   <input type="text" name="billpaid" size = "20" maxlength = "40"> 
     <p id = "submit" ><input type="submit" value="Add / Update Vendor information" name="vendorsubmit"><input type="submit" value="Delete" name="Dven"></p>
  </div>
<br>
<br>
<br>
 <p class = "heading">Judges</p>

<div id="element1">
   Name:
  </div>
   <div id="element2">
   <input type="text" name="judgename" size = "20" maxlength = "40"> <p id = "submit" ><input type="submit" value="Add Judge" name="judgesubmit"><input type="submit" value="Delete" name="Djud"></p>
  </div>
<br>
<br>
<br>
<p class = "heading">Teams</p>

<div id="element1">
   <select name="teamname">
        <option value="TEAM 1">Team 1</option>
        <option value="TEAM 2">Team 2</option>
		<option value="TEAM 3">Team 3</option>
		<option value="TEAM 4">Team 4</option>
		<option value="TEAM 5">Team 5</option>
    </select>
  </div>
   <div id="element2">
   <input type="text" name="teamscore" size = "20" maxlength = "40"> <p id = "submit" ><input type="submit" value="Add / Update Team score" name="teamsubmit"></p>
  </div>
<br>
<br>
<br>
</form>


    
	  






    
<div align ="center">
    <?php 
    $dbc = mysqli_connect("localhost","root","","group4");
    if(!$dbc)
      {
        print 'Not connected to Server';
      }

      $sponsorname = $_POST["sponsorname"];
      $amountpromised = $_POST["amountpromised"];
      $amountpaid = $_POST["amountpaid"];
      $vendorname = $_POST["vendorname"];
      $foodtype = $_POST["foodtype"];
      $billamount = $_POST["billamount"];
      $billpaid = $_POST["billpaid"];
      $judgename = $_POST["judgename"];
	  $teamnamee = $_POST["teamname"];
	  $teamscore = $_POST["teamscore"];
	   $dv=$_POST["vendorname"];
	  $ds=$_POST["sponsorname"];
	  $dj=$_POST["judgename"];

	if ($teamnamee == 'Team1')
	{
		$tid = 1;
	}
	else if ($teamnamee == 'Team2')
	{
		$tid = 2;
	}
	else if ($teamnamee == 'Team3')
	{
		$tid = 3;
	}
	else if ($teamnamee == 'Team4')
	{
		$tid = 4;
	}
	else 
	{
		$tid = 5;
	}


if (isset($_REQUEST['sponsorsubmit']))
{
	$q=mysqli_query($dbc,"SELECT * FROM sponsor WHERE s_name='$sponsorname'");
	if ( mysqli_num_rows($q)>0)
	{	
		echo "update";
		$sponsor = "UPDATE sponsor SET s_amount_promise='$amountpromised', s_amount_paid='$amountpaid' where s_name='$sponsorname'";
	}
	else
	{
		echo "add";
      $sponsor = "INSERT INTO sponsor (s_name, s_amount_promise, s_amount_paid, aid) VALUES ('$sponsorname', '$amountpromised', '$amountpaid', 1)";
	}	
      if (!mysqli_query($dbc,$sponsor))
      {
        print 'Not inserted';
      }
}
if (isset($_REQUEST['Dven']))
{
      $del = "DELETE FROM vendor WHERE v_name='$dv'";
		
      if (!mysqli_query($dbc,$del))
      {
        print 'Not inserted';
      }
}
if (isset($_REQUEST['Djud']))
{
      $delcc = "DELETE FROM judge WHERE j_name='$dj'";
		
      if (!mysqli_query($dbc,$delcc))
      {
        print 'Not inserted';
      }
}
if (isset($_REQUEST['Dspo']))
{
      $delc = "DELETE FROM sponsor WHERE s_name='$ds'";
		
      if (!mysqli_query($dbc,$delc))
      {
        print 'Not inserted';
      }
}
if (isset($_REQUEST['vendorsubmit']))
{
	$q=mysqli_query($dbc,"SELECT * FROM vendor WHERE v_name='$vendorname'");
	if ( mysqli_num_rows($q)>0)
		$vendor = "UPDATE vendor SET v_type='$foodtype',v_bill='$billamount',v_paid='$billpaid' WHERE v_name='$vendorname'";	

    else
    	  $vendor = "INSERT INTO vendor (v_name, v_type, v_bill, v_paid, aid) VALUES ('$vendorname', '$foodtype', '$billamount', '$billpaid', 1)";
      if (!mysqli_query($dbc, $vendor))
      {
        print 'Not inserted';
      }
}


if (isset($_REQUEST['judgesubmit']))
{

      $judge = "INSERT INTO judge (j_name, aid) VALUES ('$judgename', 1)";
      if (!mysqli_query($dbc, $judge))
      {
        print 'Not inserted';
      }
}


if (isset($_REQUEST['teamsubmit']))
{
	$team = "UPDATE team SET t_score='$teamscore' where t_name='$teamnamee'";
	if (!mysqli_query($dbc, $team))
	{
		print 'Not inserted';
	}
}


//print out the tables from database
$dbc = mysqli_connect("localhost", "root", "", "group4") or die(mysql_error());
if ($dbc) {	
  

print '<br><p>Participants informations!</p>';

  $c = 'select count(*) from participant';
  $r2 = mysqli_query($dbc,$c) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

$t = 'select p_food_type,count(pid) Participants from participant group by p_food_type';
  $r3 = mysqli_query($dbc,$t) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

$ts = 'select p_t_shirt_size,count(pid) Participants from participant group by p_t_shirt_size';
  $r4 = mysqli_query($dbc,$ts) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  

    $q = 'select pid Participant_ID,P_name Name,p_t_shirt_size Size,p_food_type Food from participant';
  $r = mysqli_query($dbc,$q) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}


//print out the tables from database
$dbc = mysqli_connect("localhost", "root", "", "group4") or die(mysql_error());
if ($dbc) {	
  
  $team = 'select * from team';
  
  print '<p>Teams informations!</p>';
  
  $r = mysqli_query($dbc,$team) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}


//print out the combined tables from database


  
  $team_p = 'select pid,p_name,tid, t_name, t_score from team t natural join participant';
  
  print '<p>Participants + Teams informations!</p>';
  
  $r = mysqli_query($dbc,$team_p) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";





//print out the tables from database
$sponsor = 'select * from sponsor';
  
  print '<p>Sponsors informations!</p>';
  
  $r = mysqli_query($dbc,$sponsor) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

//print out the tables from database
$vendor = 'select * from vendor';
  
  print '<p>Vendors informations!</p>';
  
  $r = mysqli_query($dbc,$vendor) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

  //print out the tables from database
$judge = 'select * from judge';
  
  print '<p>Judges informations!</p>';
  
  $r = mysqli_query($dbc,$judge) or die('Query failed: ' . mysql_error());
  print "<table border=1>\n";
  $i=0;
  while ($line = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $i++;
    if($i == 1){ // show column headings
      echo "<tr>";
      foreach ($line as $key => $value) {
        echo "<td><b>$key</b></td>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($line as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";




    ?> 

</div>

</body>
</html>