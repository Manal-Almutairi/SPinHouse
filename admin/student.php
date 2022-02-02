<?php 
session_start();
include '../CO.php';
?>

<?php
if(isset($_POST["requist"])){

 $fileName = $_FILES['scenario']['name']; 
$tmpName=$_FILES['scenario']['tmp_name'];  
$explode = explode('.', $fileName);
$ext = $explode[count($explode) - 1];

if($ext != 'pdf')
{
echo "<script> alert('Only PDF file can be uploaded');</script>";
exit();
}
if(is_uploaded_file($tmpName))
{
	
$locaFile='../scenarios/'. basename($fileName);
$result = move_uploaded_file($tmpName,$locaFile);

$RDate=date('Y-m-d', strtotime($_POST['Rdate']));
$from=$_POST['from'];
$to=$_POST['To'];
$SID=$_SESSION["Sid"];
$sql3="INSERT INTO `request`( `rDate`, `rFrom`, `rTo`, `sId`, `fpath`) VALUES ('$RDate','$from','$to','$SID','$locaFile')";
$req=mysqli_query($conn, $sql3);
echo ($result && $req) === true ? "<script>alert('File uploaded successfuly');</script>" : "<script>alert('There
are some errors');</script>";
}
header('location:StudentsList.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SP in House</title>
<link rel="stylesheet" href="../SP.css"/>
<script>
function validateForm(){
var f=document.getElementById("from").value;
var t=document.getElementById("To").value;
if(f >= t){
	alert("Please check on time");
	return false;
}
else{
return true;}}</script>

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
	  $_SESSION["Sid"]=$row["universityID"];
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
 
<form method="POST" onsubmit="return validateForm()" action="student.php" enctype="multipart/form-data" > 
<table class="withoutBorder"> 
	<tr class="titleTable"><th colspan="4">Requist:</th></tr>
	<tr><th>Student ID:</th><td ><input type="text" class="inField" name="sid" value="<?php echo $id;?>" disabled /></td>
	<th>Date:</th><td><input type="date" class="inField" name="Rdate" required /></td></tr>
<tr><th>Scenario:</th><td colspan="3"><input type="file" class="inField" name="scenario"  required accept="application/pdf"/></td></tr>
<tr><th>From:</th><td><select name="from"  id="from" required>
				<option value="" ></option>
                <option value="8">08:00am </option>
				<option value="9">09:00am </option>
                <option value="10">10:00am  </option>
        		<option value="11">11:00am  </option>
                <option value="12">12:00pm  </option>
                <option value="13">01:00pm  </option>
                <option value="14">02:00pm  </option>
                <option value="15">03:00pm  </option>
                <option value="16">04:00pm  </option>
				<option value="17">05:00pm  </option>
				<option value="18">06:00pm  </option>
				<option value="19">07:00pm  </option>
				<option value="20">08:00pm  </option>
            </select></td><th>To:</th>
<td><select name="To" id="To" required >
				<option value="" ></option>
				<option value="9">09:00am </option>
                <option value="10">10:00am  </option>
        		<option value="11">11:00am  </option>
                <option value="12">12:00pm  </option>
                <option value="13">01:00pm  </option>
                <option value="14">02:00pm  </option>
                <option value="15">03:00pm  </option>
                <option value="16">04:00pm  </option>
				<option value="17">05:00pm  </option>
				<option value="18">06:00pm  </option>
				<option value="19">07:00pm  </option>
				<option value="20">08:00pm  </option>
				<option value="21">09:00am </option>
            </select>
</td></tr>

<tr ><td colspan="4"> <br/> 
<button class="but" type="submit" name="requist" value="Requist">Requist</button>
<a href="StudentsList.php"><button class="but" type="button" >Back</button></a>
 <br/><br/> </td></tr>
 
 </table>

</form>
 <br/><br/>  
 </center>
 
 </div>
 </body>