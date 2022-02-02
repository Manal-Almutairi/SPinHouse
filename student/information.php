
<?php 
session_start();
include '../CO.php';
 
 $test="";
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
 		<!-- include menu -->
        	<?php include "../menu/menu1.html" ?>

 		<?php 
		$_SESSION['SecurityLevel']=1;
		$time="";
 		$email=$_SESSION["email"];
 		$sql="SELECT * FROM user INNER JOIN student ON '$email'=student.email AND student.email=user.email";
		$query=mysqli_query($conn, $sql);

	  	if(isset($_POST['update'])){
	
			if($_POST["sunF"]!=null&&$_POST["sunT"]!=null){
				if($_POST["sunF"]>= $_POST["sunT"]){
			 		$test="error";
			   	}else{
					$time.=" Sunday from: ".$_POST["sunF"].":00 to: ".$_POST["sunT"].":00";
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
				$time.=" Tuesday from: ".$_POST["tueF"].":00 to: ".$_POST["tueT"].":00";
				}
			}
			if($_POST["wedF"]!=null&&$_POST["wedT"]!=null){
				if($_POST["wedF"]>= $_POST["wedT"]){
					$test="error";
			   	}else{
					$time.=" Wednesday from: ".$_POST["wedF"].":00 to: ".$_POST["wedT"].":00";
				}
			}
			if($_POST["thurF"]!=null&&$_POST["thurT"]!=null){
				if($_POST["thurF"]>= $_POST["thurT"]){
					$test="error";
			   	}else{
					$time.=" Thursday from: ".$_POST["thurF"].":00 to: ".$_POST["thurT"].":00";
				}
			}
			if($_POST["friF"]!=null&&$_POST["friT"]!=null){
				if($_POST["friF"]>= $_POST["friT"]){
					$test="error";
			   	}else{
					$time.=" Friday from: ".$_POST["friF"].":00 to: ".$_POST["friT"].":00";
				}
			}
			if($_POST["satF"]!=null&&$_POST["satT"]!=null){
				if($_POST["satF"]>= $_POST["satT"]){
					$test="error";
			   	}else{
					$time.=" Saturday from: ".$_POST["satF"].":00 to: ".$_POST["satT"].":00";
				}
			}
			if($test=="error"){
				$_SESSION['me']=" Please check on available time";
			}else{
				$_SESSION['me']="";
			}
	
			$name =$_POST['name'];
			$phone =$_POST['phone'];
			$age = $_POST['age'];
			$level = $_POST['level'];
			$Ename =$_POST['Ename'];
			$college=$_POST['college'];
			$relationship =$_POST['relationship'];
			$language =$_POST['language'];
			$Healthcare = $_POST['Healthcare'];
			$experience=$_POST['experience'];
			$Ephone=$_POST['Ephone'];
			$MP=$_POST['MP'];
			$medication=$_POST['medication'];
			$allergy=$_POST['allergy'];
	
		  	$sql1="UPDATE user SET name='$name', phone='$phone',age='$age' WHERE email='$email'";
		  	mysqli_query($conn, $sql1);
		  	if($time==""){
		  		$sql2="UPDATE student SET  college='$college', level='$level', experience='$experience',Ename='$Ename', Erelationship='$relationship', Ephone='$Ephone', language='$language',healthcare='$Healthcare',healthProblem='$MP',medication='$medication', allergie='$allergy' WHERE email='$email' ";
	      			mysqli_query($conn, $sql2);
	      		}else{
		  		$sql2="UPDATE student SET  college='$college', level='$level', experience='$experience',Ename='$Ename', Erelationship='$relationship', Ephone='$Ephone', language='$language',healthcare='$Healthcare',time='$time',healthProblem='$MP',medication='$medication', allergie='$allergy' WHERE email='$email' ";
	      			mysqli_query($conn, $sql2);
	      		}
		   	echo "<meta http-equiv='refresh' content='0'>";
	  	}
 
 		?>
 		<br/>
 		<h2 style="position:relative;top:-10px; left:30px">Information:</h2>
 		<hr/>
 		<center>
 			<div><h2 style='color:red'><?php echo $_SESSION['me'].$test;?></h2></div>


			<form method="POST" action="information.php">
 				<?php
 				if(mysqli_num_rows($query)>0){
					while($row =mysqli_fetch_assoc($query)){
	  					$_SESSION["id"]=$row["universityID"];
				?>	

			<table class="withBorder">
				<tr class="titleTable">
					<th colspan="6">Personal Information’s</th>
				</tr>
				<tr>
					<th>Name</th><td colspan="5"><input class="inField" type="text" name="name" value="<?php echo $row["name"];?>" /></td>
				</tr>
				<tr>
					<th>Age</th><td colspan="2"><input class="inField" type="text" name="age" value="<?php echo $row["age"];?>" /></td>
					<th>College</th><td colspan="2">
					<select id="c" name="college" required >
				 		<option value=""></option>
                 				<option value="Nursing">College Of Nursing </option>
                 				<option value="Pharmacy">College Of Pharmacy </option>
                 				<option value="Health and Rehabilitation Sciences">College Of Health and Rehabilitation Sciences</option>
                 				<option value="Dentistry">College of Dentistry </option>
                 				<option value="Medicine">College of Medicine </option>
            				</select>
            				<script>
						document.getElementById("c").value ="<?php echo $row["college"] ?>";

					</script>
			 		</td>
			 	</tr>
				<tr>
					<th>University ID</th>
					<td colspan="2"><input class="inField" type="text" name="ID" value="<?php echo $row["universityID"];?>" disabled /></td>
					<th>Level</th>
					<td colspan="2">
					<select name="level" id="l"  >
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
					<script>
						document.getElementById("l").value ="<?php echo $row["level"];?>";

					</script></td>
				</tr>
				<tr>
					<th>Mobile No</th>
					<td colspan="2"><input class="inField" type="text" name="phone" value="<?php echo $row["phone"];?>" /></td>
					<th>Email</th><td colspan="2"><input class="inField" type="email" name="email" value="<?php echo $row["email"];?>" disabled /></td>
				</tr>
				<tr>
					<th>Emergency Call (name) </th><td ><input class="inField" type="text" name="Ename" value="<?php echo $row["Ename"];?>" /></td>
					<th>Mobile No</th><td ><input class="inField" type="text" name="Ephone"value='<?php echo $row["Ephone"];?>' /></td>
					<th>Relationship</th><td><input class="inField" type="text" name="relationship" value='<?php echo $row["Erelationship"];?>' /></td>
				</tr>
				<tr class="titleTable">
					<th colspan="3">Communicate</th><th colspan="3">Education</th>
				</tr>
				<tr>
					<th>Language you Prefer to communicate  </th>
					<td colspan="2"><input type="radio" Id="a"  name="lan" value="Arabic"  >Arabic</br>
					<input type="radio" id="e" name="lan" value="English">English </td>
 					<script>
 						var l="<?php echo $row["language"];?>";
						var lang=document.getElementById("a");
						if(lang.value==l){
							document.getElementById("a").checked = true;
						}else{
							document.getElementById("e").checked = true;
						}
					</script>

					<th>Healthcare Background   </th><td colspan="2">
					<input type="radio" id="yh" name="Healthcare" value="Yes"  />Yes&nbsp;&nbsp;
					<input type="radio" id="nh" name="Healthcare" value="No" />No</td>
					<script>
						var h="<?php echo $row["healthcare"];?>";
						var hel=document.getElementById("yh");
						if(hel.value==h){
							document.getElementById("yh").checked = true;
						}else{
							document.getElementById("nh").checked = true;
						}
 					</script>

				</tr>
				<tr class="titleTable"><th colspan="6">Medical History </th>
				</tr>
				<tr rowspan="2">
					<th>Do you have any Medical problem, or any Surgery done before?</th>
					<td colspan ="5">
					<input type="text" name="MP" id="MProblem" style="width: 80%;height:18px;font-family: Arial;font-size:13px" value="<?php echo $row["healthProblem"];?>"/>
		
					</td>	
				</tr>
				<tr rowspan="2">
					<th>Are you using any medication?</th>
					<td colspan ="5"> 
					<input type="text" name="medication" id="med" style="width: 80%;height:20px;font-family: Arial;font-size:13px" value="<?php echo $row["medication"];?>"/>
					</td>
				</tr>
				<tr rowspan="2">
					<th>DO You have any Allergy?</th>
					<td colspan ="5"> 
		   			<input name="allergy" type="text" id="alle" style="width: 80%;height:20px;font-family: Arial;font-size:13px"value="<?php echo $row["allergie"];?>"/> 
					</td>
				</tr>
	
				<tr class="titleTable">
					<th colspan="6">Standardized Patient Program </th>
				</tr>
				<tr>
					<th>How did you hear about Standardized Patient Program?</th>
					<td colspan ="5"><?php echo $row["SP"];?> </td>
				</tr>
				<tr >
					<th>Have you  worked as Standardized Patient before?</th>
					<td colspan ="5"><input type="radio" id='ye' name="experience" value="Yes">Yes  
					<input type="radio" id='ne' name="experience" value="No"  >No</td></tr>
					<script>
						var e="<?php echo $row["experience"];?>";
						var exp=document.getElementById("ye");
						if(exp.value==e){
							document.getElementById("ye").checked = true;
						}else{
							document.getElementById("ne").checked = true;
						}
					</script>

	
 

	
			</table>
			</br></br></br>
 			<h2 style="position:relative;left:-30%">Available Time:</h2>
			<div><h3><?php echo $row['time'];?></h3>
 			<h3><br/> if you want to change the time change the value from the next table and click on update </h3></div>
  
 			<table class="withoutBorder"> 
				<tr class="titleTable">
					<td >Day</td>
					<td >from</td>
					<td >to</td>
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
				</br></br></br>
				<button class="but" type="submit" name="update" >Update </button>
				<a href="information.php"><button class="but" type="button" >Cancel</button></a>
                
 			</form>
 			<?php } } ?>

		</center>
		<br/><br/><br/><br/>
	</div>	
 </body>
 </html>