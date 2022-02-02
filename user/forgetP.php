<?php 
session_start();
include '../CO.php';
$_SESSION['m']="";
if(isset($_POST["OK"])){
	$e=$_POST["email"];
	$sql1="SELECT email,password,SecurityLevel FROM user WHERE email= '$e'"; 
	$query1=mysqli_query($conn, $sql1);
	if(mysqli_num_rows($query1)==1){		
		$pass=rand(23432811,99999999);
		ini_set( 'display_errors', 1 );
		error_reporting( E_ALL );
		$from = "SP";
		$to = $e;
		$subject = "Your Recovered Password ";
		$message = "Please use this password to login: ".$pass;
		$headers = "From:" . $from;
		$password=md5($pass);
		mail($to,$subject,$message, $headers);
		$sql1="UPDATE user SET password=$password WHERE email=$e";
		mysqli_query($conn, $sql1);

	}else{
		$_SESSION['m']=" It looks like there is no account associated with this email address";
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
 <br/><br/><br/>
 <center>
 
 <table><tr><th style="border-bottom: 1px solid #ddd; text-align: left;"><h2 >Reset password:</h2></th></tr>
 <tr><td><br/></td></tr>
 <tr><td><div><h3 style='color:red'><?php echo$_SESSION['m'];?></h3></div></td></tr>
			  
 <form method="post" action="forgetP.php">
	<tr><td><center><input type="text" class="login" name="email" placeholder="Email" required /></center></td></tr>
	<tr><td><br/></td></tr>
	<tr><td><center><input Id="loginButton" type="submit" name="OK" value="OK" /></center></tr></td></table>
	<br/>
	 </form>
  <br/><br/> <br/><br/>
 <center/>
 </div>
 </body>