<?php 
session_start();
include '../CO.php';
$col="";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SP in House</title>
<link rel="stylesheet" href="../SP.css"/>

</head>
 <body > 
 <!-- include header -->
        <?php include "../header/header.html" ?>
 <div id="container">
 <center>

	<!-- include menu -->
        <?php include "../menu/menu2.html" ?>
</center>

 <br/>
<?php


 $sql="SELECT * FROM user INNER JOIN student ON student.email=user.email AND SecurityLevel=1 ORDER BY hour";
	  $query=mysqli_query($conn, $sql);

 ?> 
  
 <h2 style="position:relative;top:-10px; left:30px">Students list:</h2>
 <hr/>
 <center>
 <form method="POST">
 <table style="width:50%"><tr>
 <th>College</th>
		<td >
			<select name="college" >
				 <option value=""></option>
                 <option value="Nursing">College Of Nursing </option>
                 <option value="Pharmacy">College Of Pharmacy </option>
                 <option value="Health and Rehabilitation Sciences">College Of Health and Rehabilitation Sciences</option>
                 <option value="Dentistry">College of Dentistry </option>
                 <option value="Medicine">College of Medicine </option>
            </select>
		</td>
<td><button class="but" type="submit" onclick="<?php 
 $col=$_POST['college'];
 $sql2="SELECT * FROM user INNER JOIN student ON student.email=user.email AND student.college='$col' AND SecurityLevel=1 ORDER BY hour";
	  $query2=mysqli_query($conn, $sql2);
 
 ?>">Search</button></td></tr></form>
 </br></br>
			
 <table class="withBorder">
 
	<tr class="titleTable">
	<th style="width:20% ">Name</th>
	<th style="width:10% ">University ID</th>
	<th style="width:20% ">College</th>
	<th style="width:10% ">Hours</th>
	<th style="width:15% ">Available Time</th>
	<th style="width:25% ">Comment</th>
	</tr><?php
	if($col!=""){
 while($row2=mysqli_fetch_assoc($query2)){?>
	<tr>
	<td ><a href="student.php?studentID=<?php echo $row2["universityID"];?>"><?php echo $row2["name"];?></a></td>
	<td ><?php echo $row2["universityID"];?></td>
	<td ><?php echo $row2["college"]; ?> </td>
	<td ><?php echo $row2["hour"]; ?> </td>
	<td ><?php echo $row2["time"];?>	</td>
	<td ><?php echo $row2["comment"];?></td>
	</tr>
	<?php } } else{
		while($row=mysqli_fetch_assoc($query)){
		?>
		<tr>
	<td ><a href="student.php?studentID=<?php echo $row["universityID"];?>"><?php echo $row["name"];?></a></td>
	<td  ><?php echo $row["universityID"];?></td>
	<td><?php echo $row["college"]; ?> </td>
	<td ><?php echo $row["hour"]; ?> </td>
	<td ><?php echo $row["time"];?>	</td>
	<td ><?php echo $row["comment"];?></td>
	</tr>
	<?php }}?>
	
 </table>
  </br></br> </br></br> 
 
 </center>
<form action="../user/extendToExcel.php" method="POST"><button class="but" type="submit" name="excel" style="position:relative;left:75%;width:250px;" >Extraction in Excel sheet</button></form>
<br/><br/>
 </div>
 </body>