<?php 
session_start();
include '../CO.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SP in House</title>
<link rel="stylesheet" href="../SP.css"/>
</head>
 <body>
<body>
 <!-- include header -->
        <?php include "../header/header.html" ?>
 
 <div id="container">
<center>
	<!-- include menu -->
        <?php include "../menu/menu3.html" ?>
</center>
 <br/><br/><br/>
 <h2 style="position:relative;top:-10px; left:30px">Student information's:</h2>
 <hr />
 <center>
 <?php 

 $id=$_GET["studentID"];
 
  $sql="SELECT * FROM user INNER JOIN student ON '$id'=student.universityID AND student.email=user.email";
	  $query=mysqli_query($conn, $sql);
 ?>
<?php
 if(mysqli_num_rows($query)>0){
 while($row =mysqli_fetch_assoc($query)){
	  $_SESSION["id"]=$row["universityID"];
?>	
<table class="withBorder">
<tr class="titleTable">
<th colspan="6">Personal Information’s</th></tr>
<tr>
<th style="width:20% ">Name</th><td colspan="5"><?php echo $row["name"];?></td>
</tr><tr>
<th>Age</th><td colspan="2"><?php echo $row["age"];?> </td>
<th style="width:20% ">College</th><td colspan="2"><?php echo $row["college"] ?> </td></tr>
<tr><th>University ID</th>

<td colspan="2"><?php echo $row["universityID"];?></td>
<th>Level</th>
		<td colspan="2"><?php echo $row["level"];?></td></tr>
<tr><th>Mobile No</th>
		<td colspan="2"><?php echo $row["phone"];?> </td>
		<th>Email</th><td colspan="2"><?php echo $row["email"];?> </td></tr>
		<tr><th>Emergency Call (name) </th><td ><?php echo $row["Ename"];?></td>
		<th>Mobile No</th><td ><?php echo $row["Ephone"];?></td>
<th>Relationship</th><td><?php echo $row["Erelationship"];?></td></tr>
<tr class="titleTable"><th colspan="3">Communicate</th><th colspan="3">Education</th></tr>
<tr><th style="width:30% ">Language you Prefer to communicate  </th>
<td colspan="2"><?php echo $row["language"];?>
<th style="width:30% ">Healthcare Background   </th><td colspan="2">
<input type="radio" id="yh" name="Healthcare" value="Yes" disabled />Yes&nbsp;&nbsp;
<input type="radio" id="nh" name="Healthcare" value="No" disabled />No</td>
<script>	var h="<?php echo $row["healthcare"];?>";
		var hel=document.getElementById("yh");
			if(hel.value==h)
					{
						document.getElementById("yh").checked = true;
					}
					else{document.getElementById("nh").checked = true;}
 </script>

</tr><tr class="titleTable"><th colspan="6">Medical History </th></tr>
<tr rowspan="2"><th>Do you have any Medical problem, or any Surgery done before?</th>
		<td colspan ="5"><?php echo $row["healthProblem"];?>
		</td>	
	</tr>
	<tr rowspan="2">
		<th>Are you using any medication?</th>
		<td colspan ="5"><?php echo $row["medication"];?>
		</td>
	</tr>
	<tr rowspan="2">
		<th>DO You have any Allergy?</th>
		<td colspan ="5"><?php echo $row["allergie"];?>
		</td>
	</tr>
	<tr>
	<tr class="titleTable">
	<th colspan="6">Standardized Patient Program </th>
	</tr>
	<tr><th>How did you hear about Standardized Patient Program?</th>
	<td colspan ="5"><?php echo $row["SP"];?> </td></tr>
	<tr ><th>Have you  worked as Standardized Patient before?</th>
	<td colspan ="5"><input type="radio" id='ye' name="experience" value="Yes" disabled>Yes  
		<input type="radio" id='ne' name="experience" value="No" disabled >No
		<script>	var e="<?php echo $row["experience"];?>";
		var exp=document.getElementById("ye");
			if(exp.value==e)
					{
						document.getElementById("ye").checked = true;
					}
					else{document.getElementById("ne").checked = true;}
 </script>

	
 

	
</table>
</br></br></br>
 <h2 style="position:relative;left:-30%">Available Time:</h2>
 <div><h3><?php echo $row["time"];?></h3>
 <?php }} ?>
 <br/><br/> 
 <a href="college.php"><button class="but" type="button"style="position:relative;left:75%;width:250px;" >Back</button></a>
 <br/><br/>  <br/><br/> 
 </center>
 
 </div>
 </body>