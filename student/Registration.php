<?php 
session_start();
include '../CO.php';
?>

<?php 
$test="";
$_SESSION['mes']="";
$_SESSION['name'] ="";
$_SESSION['phone'] ="";
$_SESSION['age'] = "";
$_SESSION['email'] ="";
$_SESSION['Ename'] ="";
$_SESSION['relationship']="";
$_SESSION['SPP']= "";
$_SESSION['Ephone']="";
$_SESSION['MP']="";
$_SESSION['medication']="";
$_SESSION['allergy']="";
$_SESSION['time']="";
$_SESSION['SPP']="";
$_SESSION["ID"]="";
if(isset($_POST['reg'])){
	$_SESSION['name'] =$_POST["name"];
	$_SESSION['phone'] =$_POST["phone"];
	$_SESSION['pass'] = $_POST["password"];
	$_SESSION['age'] = $_POST["age"];
	$_SESSION['college'] = $_POST["college"];
	$_SESSION['level'] = $_POST["level"];
	$_SESSION['email'] =$_POST["email"];
	$_SESSION['Ename'] =$_POST["Ename"];
	$_SESSION['relationship'] =$_POST["relationship"];
	$_SESSION['language'] =$_POST["language"];
	$_SESSION['Healthcare'] = $_POST["Healthcare"];
	$_SESSION['experience']=$_POST["experience"];
	$_SESSION['SPP']= $_POST["SPP"];
	$_SESSION['Ephone']=$_POST["Ephone"];
	$_SESSION['MP']=$_POST["MProblem"];
	$_SESSION['medication']=$_POST["med"];
	$_SESSION['allergy']=$_POST["alle"];
	$_SESSION["email"]=$_POST['email'];
	$e=$_SESSION["email"];
	$sql1="SELECT email FROM user WHERE email= '$e'"; 
	$query1=mysqli_query($conn, $sql1);
	$_SESSION["ID"]=$_POST["Id"];
	$i=$_SESSION["ID"];
	$sql2="SELECT universityID FROM student WHERE universityID='$i'"; 
	$query2=mysqli_query($conn, $sql2);

	if(mysqli_num_rows($query1)>0){
		$_SESSION['mes'].=" the email is already registered";
	}else if(mysqli_num_rows($query2)>0){
		$_SESSION['mes']=$_SESSION['mes']." the ID is already registered";
	}else{
	if($_POST["MedicalProblem"]=="Yes"&&$_POST["MProblem"]==""){
		$_SESSION['mes']="please specify your Medical problem";
	}
	if($_POST["Medication"]=="Yes"&&$_POST["med"]==""){
		$_SESSION['mes']="please specify your Medical problem";
	}
	if($_POST["Allergy"]=="Yes"&&$_POST["alle"]==""){
		$_SESSION['mes']="please specify your Medical problem";
	}
	if($_POST["sunF"]!=null&&$_POST["sunT"]!=null){
		if($_POST["sunF"]>= $_POST["sunT"]){
			$test="error";
		}else{
			$_SESSION['time']=$_SESSION['time']." Sunday from: ".$_POST["sunF"].":00 to: ".$_POST["sunT"].":00";
		}
	}
	if($_POST["monF"]!=null&&$_POST["monT"]!=null){
		if($_POST["monF"]>= $_POST["monT"]){
			$test="error";
		}else{
			$_SESSION['time']=$_SESSION['time']." Monday from: ".$_POST["monF"].":00 to: ".$_POST["monT"].":00";
		}
	}
	if($_POST["tueF"]!=null&&$_POST["tueT"]!=null){
		if($_POST["tueF"]>= $_POST["tueT"]){
			$test="error";
		}else{
		$_SESSION['time']=$_SESSION['time']." Tuesday from: ".$_POST["tueF"].":00 to: ".$_POST["tueT"].":00";
		}
	}
	if($_POST["wedF"]!=null&&$_POST["wedT"]!=null){
		if($_POST["wedF"]>= $_POST["wedT"]){
			$test="error";
		}else{
			$_SESSION['time']=$_SESSION['time']." Wednesday from: ".$_POST["wedF"].":00 to: ".$_POST["wedT"].":00";
		}
	}
	if($_POST["thurF"]!=null&&$_POST["thurT"]!=null){
		if($_POST["thurF"]>= $_POST["thurT"]){
			$test="error";
			}else{
				$_SESSION['time']=$_SESSION['time']." Thursday from: ".$_POST["thurF"].":00 to: ".$_POST["thurT"].":00";
			}
		}
		if($_POST["friF"]!=null&&$_POST["friT"]!=null){
			if($_POST["friF"]>= $_POST["friT"]){
				$test="error";
			}else{
				$_SESSION['time']=$_SESSION['time']." Friday from: ".$_POST["friF"].":00 to: ".$_POST["friT"].":00";
			}
		}
		if($_POST["satF"]!=null&&$_POST["satT"]!=null){
			if($_POST["satF"]>= $_POST["satT"]){
				$test="error";
			}else{
				$_SESSION['time']=$_SESSION['time']." Saturday from: ".$_POST["satF"].":00 to: ".$_POST["satT"].":00";
			}
		}
		if($test=="error"){
			$_SESSION['mes']=" Please check on available time";
		}else if($_SESSION['mes']==""){
			header('location:conditions.php');
		}
	}
}
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
 	<br/>
 	<h2 style="position:relative;top:-10px; left:30px">Registaration:</h2>
 	<hr/>
 
 	<center>

 		<form method="POST" action="Registration.php">
			<div><h2 style='color:red'><?php echo $_SESSION['mes'];?></h2></div>
			<table class="withBorder">
				<tr class="titleTable">
					<th colspan="6">Personal Information’s</th>
				</tr>
				<tr>
					<th>Name</th><td colspan="2"><input class="inField" type="text" name="name" value="<?php echo $_SESSION['name'];?>" required /></td>
					<th>Password</th><td colspan="2"><input type="password" class="inField" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /></td>
				</tr>
	
				<tr>
					<th>Age</th><td colspan="2"><input class="inField" type="number" name="age" value="<?php echo $_SESSION['age'];?>" required /></td>
					<th>College</th>
					<td colspan="2">
						<select name="college" required >
							<option value=""></option>
                 					<option value="Nursing">College Of Nursing </option>
                 					<option value="Pharmacy">College Of Pharmacy </option>
                 					<option value="Health and Rehabilitation Sciences">College Of Health and Rehabilitation Sciences</option>
                 					<option value="Dentistry">College of Dentistry </option>
                 					<option value="Medicine">College of Medicine </option>
            					</select>
					</td>
				</tr>
				<tr>
					<th>University ID</th>
					<td colspan="2"><input class="inField" type="number" name="Id" value="<?php echo $_SESSION['ID'];?>" required /></td>
					<th>Level</th>
					<td colspan="2">
					<select name="level" required >
						<option value=""></option>
                				<option value="level 1">Level 1 </option>
                  				<option value="level 2">Level 2 </option>
                  				<option value="level 3">Level 3 </option>
                  				<option value="level 4">Level 4 </option>
                  				<option value="level 5">Level 5 </option>
                				<option value="level 6">Level 6 </option>
                				<option value="level 7">Level 7 </option>
                				<option value="level 8">Level 8 </option>
            				</select>
					</td>
				</tr>
				<tr>
					<th>Mobile No</th>
					<td colspan="2"><input class="inField" type="number" name="phone" value="<?php echo $_SESSION['phone'];?>" required /></td>
					<th>Email</th>
					<td colspan="2"><input class="inField" type="email" name="email" value="<?php echo $_SESSION['email'];?>" required /></td>
				</tr>
				<tr>
					<th>Emergency Call (name) </th>
					<td ><input class="inField" type="text" name="Ename"  value="<?php echo $_SESSION['Ename'] ;?>" required /></td>
					<th>Mobile No</th>
					<td ><input class="inField" type="number" name="Ephone" value="<?php echo $_SESSION['Ephone'] ;?>"required /></td>
					<th>Relationship</th>
					<td><input class="inField" type="text" name="relationship" value="<?php echo $_SESSION['relationship'] ;?>" required /></td>
				</tr>
				<tr class="titleTable">
					<th colspan="3">Communicate</th>
					<th colspan="3">Education</th>
				</tr>
				<tr>
					<th>Language you Prefer to communicate  </th>
					<td colspan="2">
					<input type="radio" name="language" value="Arabic" checked >Arabic
					</br>
					<input type="radio" name="language" value="English">English 
					</td>
					<th>Healthcare Background   </th>
					<td colspan="2">
					<input type="radio" name="Healthcare" value="Yes" checked />Yes&nbsp&nbsp
					<input type="radio" name="Healthcare" value="No" />No 
					</td>
		
				</tr>
				<tr class="titleTable">
					<th colspan="6">Medical History </th>
				</tr>
				<tr rowspan="2">
					<th>Do you have any Medical problem, or any Surgery done before?</th>
					<td colspan ="5">
					<input type="radio" name="MedicalProblem" value="Yes">Yes  
					, specify &emsp;<input type="text" name="MProblem" id="MProblem" value="<?php echo$_SESSION['MP'];?>" style="width: 80%;height:18px;font-family: Arial;font-size:13px" /></br>
					<input type="radio" name="MedicalProblem" value="No" checked >No
					</td>	
				</tr>
				<tr rowspan="2">
					<th>Are you using any medication?</th>
					<td colspan ="5">
					<input type="radio" id="Medication" name="Medication" value="Yes" >Yes  
					, specify &emsp;<input type="text" name="med" id="med" value="<?php echo$_SESSION['medication'];?>" style="width: 80%;height:20px;font-family: Arial;font-size:13px"/></br>
					<input type="radio" name="Medication" value="No" checked >No&nbsp&nbsp
					</td>
				</tr>
				<tr rowspan="2">
					<th>DO You have any Allergy?</th>
					<td colspan ="5">
					<input type="radio" name="Allergy" value="Yes">Yes  
		  			 , specify &emsp;<input name="alle" type="text" id="alle" value="<?php echo $_SESSION['allergy'];?>" style="width: 80%;height:20px;font-family: Arial;font-size:13px"/></br>
					<input type="radio" name="Allergy" value="No" checked >No
					</td>
				</tr>
	
	
				<tr class="titleTable">
					<th colspan="6">Standardized Patient Program </th>
				</tr>
				<tr>
					<th>How did you hear about Standardized Patient Program?</th>
					<td colspan ="5"> 
					<input class="inField" type="text" name="SPP" value="<?php echo $_SESSION['SPP'];?>"required />
					</td>
				</tr>
				<tr >
					<th>Have you  worked as Standardized Patient before?</th>
					<td colspan ="5">
					<input type="radio" name="experience" value="Yes">Yes  
					<input type="radio" name="experience" value="No" checked >No
					</td>
				</tr>
	
	
	
			</table>
			<br/><br/><br/>
 			<h2 style="position:relative;left:-30%">Available Time:</h2>
			<table class="withoutBorder"> 
				<tr class="titleTable">
					<th >Day</th>
					<th >from</th>
					<th >to</th>
				</tr>
				<tr>
					<td>Sunday:</td>
					<td>
						<select name="sunF">
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
            					</select>
					</td>
					<td>
						<select name="sunT">
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
					</td>
				</tr>
				<tr>
					<td>Monday:</td>
					<td>
						<select name="monF">
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
            					</select>
					</td>
					<td>
						<select name="monT">
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
					</td>
				</tr>
				<tr>
					<td>Tuesday:</td>
					<td>
						<select name="tueF">
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
            					</select>
					</td>
					<td>
						<select name="tueT">
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
					</td>
				</tr>
				<tr>
					<td>Wednesday:</td>
					<td>
						<select name="wedF">
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
            					</select>
					</td>
					<td>
						<select name="wedT">
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
					</td>
				</tr>
				<tr>
					<td>Thursday:</td>
					<td>
						<select name="thurF">
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
            					</select>
					</td>
					<td>
						<select name="thurT">
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
					</td>
				</tr>
				<tr>
					<td>Friday</td>
					<td>
						<select name="friF">
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
            					</select>
					</td>
					<td>
						<select name="friT">
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
					</td>
				</tr>
				<tr>
					<td>Saturday</td>
					<td>
						<select name="satF">
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
				            	</select>
					</td>
					<td>
						<select name="satT">
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
					</td>
				</tr>
 			</table>

 			<br/><br/>
 			<p style="color:red; position:relative;left:20px;text-align:left;">* This Registration does not constitute an offer of employment.<br/>
			*All Information’s are Confidential.
			</p>

			<br/>


			<button class="but" type="submit" name="reg" >Submit</button>
			<a href="../user/login.php"><button class="but" type="button" >Cancel</button></a>
                
 		</form>
 
	</center>
	<br/><br/><br/><br/>
</div>
</body>