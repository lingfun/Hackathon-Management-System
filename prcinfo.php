<!--
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: prcinfo.php
The page the participant lands on after a successful sign in, here the user enters their full name, select from a drop menu of t shirt size, and food choice, upon clicking on the submit button, the information will be entered into the corresponding values in the participant table in the group4 database. 

-->
<?php
// login .php
// weigang.lin@stu.bmcc.cuny.edu
// 2-28-2019
session_start();    //start session
		//assign session variable for error msg or success msg
//$_SESSION['username']=$_POST['username'];
if($_SESSION["username"] != true)
  {
    header('location:index.php');
  }

$uus = $_SESSION['username'];
$mysqli=new mysqli('localhost','root','','group4'); //connect to mysql

if($_SERVER['REQUEST_METHOD']=='POST'){  //check when the method is post


$username=$_POST['username'];   // assign variable store username

$paw=md5($_POST['psw']);  // assign variable paw after encrypt using md5

  $conn=mysqli_connect("localhost","root","","group4");


  //$check="SELECT * FROM participant WHERE p_username LIKE '$username'";   //sql statment look for match username and password in database
  //$result = mysqli_query($conn,$check); //assign result after sql statment execute

 // if($result->num_rows ==0 ) {   // 1.if no match set error massage to session variable
//
  //        $_SESSION['mee']='You have wrong password';
    //      $_SESSION['loggedIn'] = false;
   // }
  //    else { //1.else
   //     $use=$result->fetch_assoc(); //1. else fetch the result into and store in array base variable use

      //  if( $paw ==$use['hash_password']){     // 2.if check match for the database
           //assign success msg to seession variable
        //session variable stroe username

		  
		  
		  $size=$_REQUEST['size'];
		  $food=$_REQUEST['food'];
      $name=$_REQUEST['name'];
	  $tnum=$_REQUEST['TeamNumber'];
		  
          $sql2="UPDATE  participant  set p_name='$name', p_t_shirt_size='$size' ,p_food_type='$food', tid='$tnum' where p_username = '$uus'";
             //insert statment for sql
          $mysqli->query($sql2); //call sql


       //   $_SESSION['loggedIn'] = true;  //check for valid login

            header("location:prcinfo.php");  //redirction to home page


      /*  }
        else{      //2.else  fail match
          $_SESSION['mee']='wrong password!!';
          $_SESSION['loggedIn'] = false;
        }
*/

 //     }



}


 ?>




<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Home</title>
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

</ul>
</div>

<div class="bgimg">
  <div class="topleft">
   
  </div>
  
 
</div>

<form id="regForm" action="prcinfo.php" method="post">

  <!-- One "tab" for each step in the form: -->
  <label for="name"><h1>Enter Your Full Name</h1></label>
    <input type="text" placeholder="Enter fullname" name="name" required>

  <h1>Select your T shirt Size</h1>
    <select class="select-css"  name="size">
	<option>Select Size</option>
  <option value="XS">XS</option>
  <option value="S">S</option>
  <option value="M">M</option>
  <option value="L">L</option>
  <option value="XL">XL</option>
</select>

  
  <h1>Select your food</h1>
 
  <div class="tab">
    <select class="select-css" name="food">
	<option>Food preparation</option>
  <option value="meat">meat</option>
  <option value="vegan">vegan</option>
  
</select>
  </div>
 
  <h1>Select your Team number</h1>
    <select class="select-css"  name="TeamNumber">
	<option>Select team</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
  
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
</body>
</html>