<?php
session_start();
if (isset($_POST['submit'])) {
  $_SESSION["source"]=$_POST["source"];
  $_SESSION["dest"]=$_POST["dest"];

$flag = 0;
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
    $a = $_POST["source"];
	$b = $_POST["dest"];
  mysqli_select_db($conn,'surya');
	$sql = "select source,dest from train;";
	$res = mysqli_query($conn,$sql);
	while($num = mysqli_fetch_assoc($res)){
    if($num['source'] == $a && $num['dest'] == $b){
		$flag = 1;
    header('Location:showtrain.php');
  }
  if($flag == 0){
    echo "Invalid credentials";
    echo "<a href='bookticket.php'>Back</a>";
  }
}
}
 ?>
