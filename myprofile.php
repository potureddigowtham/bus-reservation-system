<?php
session_start();
//extract($_POST);
//if(isset($_POST['submit'])){
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'surya');
if(!$conn)
{
die('Could not connect: ' . mysqli_error($conn));
}
$a=$_SESSION['login_user'];
//$uname = $_POST['field1'];
//if($_SESSION["login_user"]{
$sql= "select * from user where user_id='$a';";
//}
$res = mysqli_query($conn,$sql);
while($num = mysqli_fetch_assoc($res)){
echo "<table border=0>";
echo "<form>";
echo "<tr>";
echo "<td>";
echo "<b>UserId:</b>";
echo "</td>";
echo "<td>";
echo $num['user_id'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>User Name:</b>";
echo "</td>";
echo "<td>";
echo $num['user_name'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>Password:</b>";
echo "</td>";
echo "<td>";
echo $num['password'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<b>Email:</b>";
echo "</td>";
echo "<td>";
echo $num['email'];
echo "</td>";
echo "</tr>";
echo "</form>";
echo "</table>";
echo "<br>";
echo "<br>";
}
?>