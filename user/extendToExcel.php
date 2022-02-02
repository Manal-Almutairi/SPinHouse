<?php 
include 'CO.php';
if(isset($_POST['excel'])){
	$sql3="SELECT * FROM user INNER JOIN student ON student.email=user.email AND SecurityLevel=1 ORDER BY hour";
$query3=mysqli_query($conn, $sql3);
$output="";
if(mysqli_num_rows($query3)>0){
	$output.='

	<table border="1">
 
		<tr>
		<th>Name</th>
		<th>University ID</th>
		<th>Level</th>
		<th>College</th>
		<th>Mobile no</th>
		<th>Hours</th>
		<th>Available Time</th>
		<th >Comment</th>
		</tr>';
	
	while($row3=mysqli_fetch_assoc($query3)){
		$output.='
		<tr>
		<td> '.$row3["name"].'</td>
		<td>'.$row3["universityID"].'</td>
		<td>'.$row3["level"].'</td>
		<td>'.$row3["college"].' </td>
		<td>'.$row3["phone"].'</td>
		<td>'.$row3["hour"].' </td>
		<td>'. $row3["time"].'	</td>
		<td>'.$row3["comment"].'</td>
		</tr>';
	
 	}
 }
	
$output.='</table>';
header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename=download.xls"); 
echo $output;
	
}
	
	
?>
	  
