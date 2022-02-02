<?php 
session_start();
include '../CO.php';
$_SESSION['me']="";
$_SESSION['m']="";
if(isset($_POST["login"])){
	$e=$_POST["email"];
	$sql1="SELECT email,password,SecurityLevel FROM user WHERE email= '$e'"; 
	$query1=mysqli_query($conn, $sql1);
	if(mysqli_num_rows($query1)==1){
		while($row =mysqli_fetch_assoc($query1)){
			$_SESSION['SecurityLevel']=$row['SecurityLevel'];
			$pass=md5($_POST['password']);
			if($pass===$row['password']){
				$_SESSION["email"]=$e;
				switch ($row['SecurityLevel']) {
                		case 1:
					header('location:../student/information.php');
					break;
				case 2:
					header('location:../admin/StudentsList.php');
					break;
				case 3:
					header('location:../college/college.php');
					break;
				 default:
				$_SESSION['m']=$_SESSION['m']."Your account has been blocked";
			}}else{
			$_SESSION['m']=$_SESSION['m']."email /password doesn't match";}
		
	}}else{
		$_SESSION['m']=$_SESSION['m']." It looks like there is no account associated with this email address";
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
 <br/><br/><br/>
 <center>
 
 <table><tr><th style="border-bottom: 1px solid #ddd; text-align: left;"><h2 >Login</h2></th></tr>
 <tr><td><br/></td></tr>
 <tr><td><div><h3 style='color:red'><?php echo$_SESSION['m'];?></h3></div></td></tr>
			  
 <form method="post" action="index.php">
	<tr><td><center><input type="text" class="login" name="email" placeholder="Email" required /></center></td></tr>
	<tr><td><br/></td></tr>
	<tr><td><center><input type="password" class="login" name="password" placeholder="Password" required /></center></td></tr>
	<tr><td><br/></td></tr>
	<tr><td><center><input Id="loginButton" type="submit" name="login" value="Login" /></center></tr></td></table>
	<br/>
	<a href="../student/Registration.php"style="position:relative;top:10px; left:-50px;"> Registration</a><b>&emsp;</b><a href="forgetP.php" style="position:relative;top:10px; left:50px;"> forget password? </a>
 </form>
 <br/><br/> <br/><br/> <br/><br/>
 <center/>
 </div>
 </body>