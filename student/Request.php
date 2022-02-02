<?php 
session_start();
include '../CO.php';

if(isset($_POST['apply'])){
	
	$RId=$_POST['reqID'];
	$status=$_POST['comfirm'];
	$sql1="UPDATE request SET Status='$status' WHERE requestId=$RId";
	mysqli_query($conn, $sql1);
	echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['cancel'])){
	
	$RId=$_POST['reqID'];
	$sql1="UPDATE request SET Status='cancel' WHERE requestId=$RId";
	mysqli_query($conn, $sql1);
	echo "<meta http-equiv='refresh' content='0'>";
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
 	<!-- include menu -->
        <?php include "../menu/menu1.html" ?>

 	<br/>
 	<h2 style="position:relative;top:-10px; left:30px">Request:</h2>
 	<hr/>
 	<center>
 	<?php 

 	$id=$_SESSION["id"];
 
 	$sql="SELECT * FROM request WHERE sId='$id' AND Status='waiting'";
	$query=mysqli_query($conn, $sql);
	$sqlc="SELECT * FROM request WHERE sId='$id' AND Status='Accept'";
	$queryc=mysqli_query($conn, $sqlc);
 	?>
 	<table class="withBorder">
		<tr class="titleTable">
			<th>ID</th>
			<th>Date</th>
			<th>From</th>
			<th>To</th>
			<th>Scenario</th>
			<th>Confirmation</th>
		</tr>
		<?php
		if(mysqli_num_rows($query)>0){
 			while($row =mysqli_fetch_assoc($query)){
				echo'<tr>';
				echo'<th>'. $row['requestId'].'</th>';
				echo'<th>'.$row['rDate'].'</th>';
				echo'<th>'.$row['rFrom'].'</th>';
				echo'<th>'.$row['rTo'].'</th>';
				echo'<th><a href="'.$row['fpath'].'"download><button class="but" type="button" >Download</button></a></th>';?>
				<th><form method="POST" action="Request.php"><input type="hidden" name="reqID" value="<?php echo $row['requestId'];?>"/><label><input type="radio" name="comfirm" value="accept" checked >accept</label>&emsp;<label><input type="radio" name="comfirm" value="reject"  >Reject</label>&emsp;&emsp;<button class="but2" type="submit" name="apply">Apply</button></form></th></tr></form></th></tr>
		<?php	}}
		if(mysqli_num_rows($queryc)>0){
 			while($rowc =mysqli_fetch_assoc($queryc)){
				echo'<tr>';
				echo'<th>'. $rowc['requestId'].'</th>';
				echo'<th>'.$rowc['rDate'].'</th>';
				echo'<th>'.$rowc['rFrom'].'</th>';
				echo'<th>'.$rowc['rTo'].'</th>';
				echo'<th><a href="'.$rowc['fpath'].'"><button class="but" type="button" >Download</button></a></th>';
 				echo'<th><form method="POST" action="Request.php"><input type="hidden" name="reqID" value="'. $rowc['requestId'].'"/><button class="but" type="submit" name="cancel" >Cancel</button></form></th></tr>';
		}}?>
 	</table>
 	<br/><br/> <br/><br/> <br/><br/>
 </center>
 </div>
 </body>