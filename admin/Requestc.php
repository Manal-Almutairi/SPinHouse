<?php 
session_start();
include '../CO.php';

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
 <center>
	<!-- include menu -->
        <?php include "../menu/menu2.html" ?>
</center>
 <br/>
 <h2 style="position:relative;top:-10px; left:30px">Request:</h2>
 <hr/>
 <center>
 <?php 

 $sqlc="SELECT * FROM request";
	  $queryc=mysqli_query($conn, $sqlc);
 ?>
 <table class="withBorder">

	<tr class="titleTable">
	<th>ID</th>
	<th>Student ID</th>
	<th>Date</th>
	<th>From</th>
	<th>To</th>
	<th>Scenario</th>
	<th>Status</th>
	<th>Cancel</th>
	</tr>
	<?php
		
	if(mysqli_num_rows($queryc)>0){
 while($rowc =mysqli_fetch_assoc($queryc)){
	echo'<tr>';
	echo'<td>'. $rowc['requestId'].'</td>';
	echo'<td>'. $rowc['sId'].'</td>';
	echo'<td>'.$rowc['rDate'].'</td>';
	echo'<td>'.$rowc['rFrom'].'</td>';
	echo'<td>'.$rowc['rTo'].'</td>';
	echo'<td><a href="'.$rowc['fpath'].'"><button class="but2" type="button" >Download</button></a></td>';
	echo '<td>'.$rowc['Status'].'</td>';
	if($rowc['Status']!="cancel"){
 echo'<td><form method="POST" action="RequestC.php"><input type="hidden" name="reqID" value="'. $rowc['requestId'].'"/><button class="but2" type="submit" name="cancel" >Cancel</button></form></td>';
	}else{echo'<td></td>';}
	echo '</tr>';
	}}?>
 </table>
 <br/><br/> <br/><br/> <br/><br/>
 </center>
 </div>
 </body>