<?php 
session_start();
include '../CO.php';
$_SESSION["as"]="";
$_SESSION["bs"]="";
$_SESSION["ast"]="";
$_SESSION["bst"]="";

if(isset($_POST['add'])){
	
	$ID =$_POST['ID'];
	$hour =$_POST['hour'];
	$comm=$_POST['commentA'];
	$sqlv="SELECT universityID,hour,SecurityLevel, student.email,user.email FROM student INNER JOIN user WHERE student.email=user.email AND universityID=$ID AND SecurityLevel=1"; 
	$queryv=mysqli_query($conn, $sqlv);
	if(mysqli_num_rows($queryv)>0){
		while($row=mysqli_fetch_assoc($queryv)){
			if($row["SecurityLevel"]==1){
	  $hour=$hour+$row["hour"];
	   $sqlA="UPDATE student SET hour='$hour',comment='$comm' WHERE universityID=$ID";
	   $queryA=mysqli_query($conn, $sqlA);
	   if($queryA === true){ $_SESSION["ast"]='The hours added successfully';}else { $_SESSION["as"]='There
	   are some errors';}}
}}else{
	$_SESSION["as"]="the id not found please write the correct Id";
}}
if(isset($_POST['block'])){
	$ID =$_POST['IDb'];
	$comm=$_POST['comment'];
	$sqlv2="SELECT universityID,hour,SecurityLevel, student.email,user.email FROM student INNER JOIN user WHERE student.email=user.email AND universityID=$ID AND SecurityLevel=1"; 
	$queryv2=mysqli_query($conn,$sqlv2);
	if(mysqli_num_rows($queryv2)>0){
	 while($roww =mysqli_fetch_assoc($queryv2)){
		 $e=$roww['email'];
		 $sqlb2="UPDATE user SET SecurityLevel='4' WHERE email='$e'";
	   $queryb2=mysqli_query($conn, $sqlb2);
		 
	   $sqlb1="UPDATE student SET comment='$comm' WHERE universityID=$ID";
	   $queryb1=mysqli_query($conn, $sqlb1);
	  
	  if(($queryb1===true)&&($queryb2=== true) ){$_SESSION["bst"]='The student blocked successfully.' ;}
	  else{ $_SESSION["bs"]=$e.$roww['SecurityLevel'].'There are some errors';}

	}}else{
	 $_SESSION["bs"]='the id not found please write the correct Id';
}}
?>
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
        <?php include "../menu/menu2.html" ?>
</center>
 <br/>
 

 <form method="POST" action="ManageAccount.php">
 
 <h2 >Add Hours:</h2>
 <hr />
 <table  style="position:relative;top:-60px; ">
 <tr><th colspan="2" >&emsp;&emsp;<h3 style="color:red;">&emsp;&emsp;<?php echo $_SESSION["as"];?></h3>
	<h3 style="color:green;"><?php echo $_SESSION["ast"];?></h3></th><tr>
  <tr><label > <th>&emsp;&emsp;Student ID:</th><td> <input type="number" name="ID" required /> </td></label>
 <label ><th> &emsp;&emsp;Participation Hours:</th><td> <input type="number" name="hour" required /></td> </label>
 </tr><tr><td colspan="4">&emsp;</td></tr>
 <tr>
 <label><th>&emsp;&emsp;Comments: </th><td colspan="3">
				 
                 <textarea name="commentA" rows="10" cols="30" required> 
                  </textarea> </td></label></tr>
				  <tr><td colspan="4">&emsp;</td></tr><tr><td colspan="4">&emsp;</td></tr>
 	<tr><td colspan="4">&emsp;&emsp;&emsp;&emsp;<button class="but" type="submit" name='add' style="position:relative;left:10%;" >OK </button>
	&emsp;&emsp;&emsp;
	<button class="but" type="reset" style="position:relative;left:20%;" >Cancel</button></td></tr><table>
	<br/><br/>
	</form><form method="POST" action="ManageAccount.php">
 <h2 >Block:</h2>
 <hr />
 <table  style="position:relative;top:-60px; ">
 <tr><th colspan="2"><h3 style="color:red;">&emsp;&emsp;<?php echo $_SESSION["bs"];?></h3>
	<h3 style="color:green;"><?php echo $_SESSION["bst"];?></h3></th><tr>
  <tr><th>&emsp;&emsp;<label >Student ID:</th><td> <input type="number" name="IDb" required /> </label></td><tr><br/>
 <tr><th>&emsp;&emsp;<label>Comment: &emsp;</th><td>
				 
                 <textarea name="comment" rows="10" cols="30" required> 
                  </textarea> </label></td></tr></table> 
				 <br/>
 	<button class="but" type="submit" name='block' style="position:relative;left:10%;" >OK </button>
	<button class="but" type="reset"style="position:relative;left:20%;" >Cancel</button>
	<br/><br/>
 </form>
 <br/><br/> 

 </div>
 </body>