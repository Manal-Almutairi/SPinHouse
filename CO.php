
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "spinhouse";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else


mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_select_db($conn, $dbname)or die(mysql_error());

?> 