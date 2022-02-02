<?php 
session_start();
include '../CO.php';
$e=$_SESSION["email"];
$sql1="SELECT email,name FROM user WHERE email= '$e'"; 
	$query1=mysqli_query($conn, $sql1);
	while($row=mysqli_fetch_assoc($query1)){
	$col=$row['name'];}
	$sql2="SELECT * FROM user JOIN student ON student.email=user.email AND student.college='$col' ORDER BY hour";
	$query2=mysqli_query($conn, $sql2);?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SP in House</title>
<link rel="stylesheet" href="../SP.css"/>

 </head>
 <body>
 <!-- include header -->
        <?php include "../header/header.html" ?>
 
 <div id="container">
<center>
	<!-- include menu -->
        <?php include "../menu/menu3.html" ?>
		</center>
 <br/>

 <h2>students list:</h2>
 <hr/>
  <center>
 <table class="withBorder">
 
	<tr class="titleTable">
	<th style="width:20% ">Name</th>
	<th style="width:10% ">University ID</th>
	<th style="width:10% ">Level</th>
	<th style="width:10% ">Hours</th>
	<th style="width:20% ">Email</th>
	<th style="width:30% ">Comment</th>
	</tr><?php
	$i=0;
	if(mysqli_num_rows($query2)>0){
 while($row2=mysqli_fetch_assoc($query2)){?>
	<tr>
	<td ><a href="Cstudent.php?studentID=<?php echo $row2["universityID"];?>"><?php echo $row2["name"];?></a></td>
	<td  ><?php echo $row2["universityID"];?></td>
	<td ><?php echo $row2["level"]; ?> </td>
	<td ><?php echo $row2["hour"]; ?> </td>
	<td ><?php echo $row2["email"];?>	</td>
	<td ><?php echo $row2["comment"];?></td>
	</tr>		
	<?php }} ?>
 </table>
  </br></br> </br></br> 
 </center>
 
 
<form action="../user/extendToExcel.php" method="POST"><button class="but" type="submit" name="excel" style="position:relative;left:75%;width:250px;" >Extraction in Excel sheet</button></form>
<br/><br/>
 </div>
 </body>