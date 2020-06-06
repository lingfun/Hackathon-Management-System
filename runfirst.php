<!--
Team 4

Runhao Yang
Lin,weigang
Ling Fang
Zhongai Shi

May 11, 2019
Due: May 16, 2019
filename: runfirst.php
The user runs this file first to create the tables needed for the website.
-->
<html>
<?php
// file name: first.php
// bmcc email: ling.fang@stu.bmcc.cuny.edu
// file creation date: may 5, 2019
// This page will automatically run
// After that, database and tables will be created.
// user: admin, password: csc350 is added.


 //CREATE DATABASE group4
 if ($dbc = mysqli_connect('localhost', 'root', '')) {

mysqli_query($dbc, 'DROP DATABASE IF EXISTS group4');
if (mysqli_query($dbc,'CREATE DATABASE
 group4')) {
 print '<p>The database group4 has been
 created!</p>';
} else {
 print '<p style="color: red;">
 Could not create the database
 because:<br />' .
 mysqli_error($dbc) . '.</p>';
}
//SELECT DATABASE 'group4'
if (mysqli_select_db($dbc, 'group4')) {
 print '<p>The database group4 has been selected!</p>';
 } else {
 print '<p style="color: red;">Could not select the database because:<br />' .
 mysqli_error($dbc) . '.</p>';
 }

 } else {
	  print '<p style="color: red;">Could not connect to MySQL:<br />' . mysqli_error() . '.</p>';
 }
 
 

 //CREATE TABLE participant
 if($dbc)
	$q = 'CREATE TABLE participant ( 
	pid int not null AUTO_INCREMENT, 
	p_name varchar(20),
	p_username varchar(20),
	p_hash_password varchar(100),
	p_t_shirt_size varchar(10),
	p_food_type varchar(20),
	tid varchar(10),
	 PRIMARY KEY(pid)
	)';
if(mysqli_query( $dbc, $q))
{
	print'<p>The table participant has been created!</p>';
}else{
	print '<p style="color: red;">
 Could not create the table
 because:<br />' .
 mysqli_error($dbc) . '.</p>
 <p>The query being run was: ' .
 $q . '</p>';
}
	
  //CREATE TABLE judge
   if($dbc)
	$q = 'CREATE TABLE judge 
	( 
	jid int not null AUTO_INCREMENT, 
	j_name varchar(20),
	aid varchar(20),
	PRIMARY KEY(jid)
	)';
if(mysqli_query( $dbc, $q))
{
	print'<p>The table judge has been created!</p>';
}else{
	print '<p style="color: red;">
 Could not create the table
 because:<br />' .
 mysqli_error($dbc) . '.</p>
 <p>The query being run was: ' .
 $q . '</p>';
}

   //CREATE TABLE sponsor
    if($dbc)
	$q = 'CREATE TABLE sponsor ( 
	sid int not null AUTO_INCREMENT, 
	s_name varchar(20),
	s_amount_promise varchar(20),
	s_amount_paid varchar(20),
	aid varchar(20),
	PRIMARY KEY(sid)
	)';
if(mysqli_query( $dbc, $q))
{
	print'<p>The table sponsor has been created!</p>';
}else{
	print '<p style="color: red;">
 Could not create the table
 because:<br />' .
 mysqli_error($dbc) . '.</p>
 <p>The query being run was: ' .
 $q . '</p>';
}



    //CREATE TABLE vendor
	if($dbc)
	$q = 'CREATE TABLE vendor ( 
	vid int not null AUTO_INCREMENT, 
	v_name varchar(20),
	v_type varchar(20),
	v_bill varchar(20),
	v_paid varchar(20),
	aid varchar(20),
	PRIMARY KEY(vid)
	)';
if(mysqli_query( $dbc, $q))
{
	print'<p>The table vendor has been created!</p>';
}else{
	print '<p style="color: red;">
 Could not create the table
 because:<br />' .
 mysqli_error($dbc) . '.</p>
 <p>The query being run was: ' .
 $q . '</p>';
}
	
//CREATE TABLE admin

if($dbc)
	$p = 'CREATE TABLE admin (
  aid varchar(20),
  a_name varchar(20),
  a_hash_password varchar(100)
)';
 if(mysqli_query( $dbc, $p))
 {
	 print'<p>The table admin has been created!</p>';
}else{
	print '<p style="color: red;">
 Could not create the table
 because:<br />' .
 mysqli_error($dbc) . '.</p>
 <p>The query being run was: ' .
 $p . '</p>';
}

// insert admin
if($dbc)
{
	$r = hash('md5','csc350');
	$hash=mysqli_real_escape_string($dbc,$r);	
	$q = "INSERT INTO admin(aid, a_name, a_hash_password)
	VALUES ('1', 'admin', '$hash')";
}
if(mysqli_query( $dbc, $q))
{
	print'<p>user: admin <br>password: csc350</p>';
	print'<p>ADDED, do not register.</p>';
}
else{
	print '<p style="color: red;">
 Could not create the table
 because:<br />' .
 mysqli_error($dbc) . '.</p>
 <p>The query being run was: ' .
 $p . '</p>';
}


?>
</html>