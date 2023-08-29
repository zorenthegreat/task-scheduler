 <?php
$servername = "localhost"; 
$username = "root";
$password = "";
$db = "tss_db";
$conn = mysqli_connect($servername, $username, $password,$db);

$db = new mysqli($servername, $username, $password);
if ($db->connect_error){
    die("Connection Failed: " . $db->connect_error);
}
?>