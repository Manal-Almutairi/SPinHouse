<?php 
session_start();
include '../CO.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
     <link rel="stylesheet" href="../SP.css"/>   
</head>   
<body><!-- include header -->
        <?php include "../header/header.html" ?>
<?php
$email=$_SESSION["email"];
$_SESSION["ept"]="";
 $_SESSION["ep"]="";
if(isset($_POST['change'])){
	$sql1="SELECT `email`,`password` FROM `user` WHERE `email`='$email'";
	$query1=mysqli_query($conn, $sql1);	
	$old=md5($_POST['Opassword']);
	while($row =mysqli_fetch_assoc($query1)){
			if($old===$row['password']){
				$new=md5($_POST['Npassword']);
				
	$sqlc="UPDATE `user` SET password='$new' WHERE email='$email'";
	$queryc=mysqli_query($conn, $sqlc);
	$_SESSION["ept"]="Password change successfully";}
			else{
			$_SESSION["ep"]="please check from old password";	
	}}
}?>
  <div id="container">
  <center>
 <!-- include menu -->
	  <?php 
		switch ($_SESSION['SecurityLevel']) {
                case 1:
					include "../menu/menu1.html";
					break;
				case 2:
					include "../menu/menu2.html";
					break;
				case 3:
					include "../menu/menu3.html";
					break;
				 default:
				 header('location:login.php');
		}
		?>
		<br/>
		 <form method="POST" action="Change-password.php">
 <table class="withoutBorder">
	<tr class="titleTable"><th colspan="2"> Change password: </th><tr>
	<tr><th colspan="2"><h3 style="color:red;"><?php echo $_SESSION["ep"];?></h3>
	<h3 style="color:green;"><?php echo $_SESSION["ept"];?></h3></th><tr>
	<tr><th>Enter old password:</th><td> <input type="password" class="inField"  name="Opassword"  required /> </td></tr>
	<tr><th>Enter New password:</th><td> <input type="password" class="inField"  name="Npassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /> </td></tr>
<tr rowspan="3"><td colspan="2">&emsp;</td></tr><tr rowspan="3"><td colspan="2">&emsp;</td></tr>
<tr rowspan="3"><td colspan="2"><button class="but" type="submit" name='change'  >OK </button>
	<button class="but" type="reset" >Cancel</button></td></tr>
	<tr rowspan="3"><td colspan="2">&emsp;</td></tr>
	
	</table>

	</form>
</center>
<br/><br/><br/><br/><br/><br/>
		</div>
		
</body>
</html>

