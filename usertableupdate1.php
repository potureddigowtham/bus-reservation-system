<?php 
session_start();
if(isset($_POST["submit"])){
$uid = $_POST['uid'];
$uname=$_POST['uname'];
$email=$_POST['email']; 
$patt1='/^[A-Za-z]{5,30}$/';
$patt2='/^[0-9]{5,6}$/';
function patt1($patt1,$uname){
if(!preg_match($patt1,$uname)){
echo "Please enter the valid User Name<br>";
}
else
	return true;
}
function patt3($email){
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
echo "please enter the valid mail id";
}
else
	return true;
}
function patt2($patt2,$uid){
if(!preg_match($patt2,$uid)){
echo "please enter the valid user id";
}
else
	return true;
}
if(patt1($patt1,$uname)){
if(patt2($patt2,$uid)){	
if(patt3($email)){
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'surya'); 
if(!$conn) { 
die('Could not connect: ' . mysqli_error()); 
}
if($uid==$_SESSION["login_user"]){
$sql = "update user set user_name='$uname' where user_id='$uid';"; 
$sql1 = "update user set email='$email' where user_id='$uid';";
$rs = mysqli_query($conn,$sql);
$rs1 = mysqli_query($conn,$sql1);
if(!$rs || !$rs1) { 
die('Could not update data: '.mysqli_error($conn)); 
} 
echo "Updated data successfully\n";
}
else{
echo "Invalid User id";
}
}
}
}
}
?>
<form action="updetails.php">
<input type="submit" value="back">
</form>
