<?php
extract($_POST);
//if(isset($_submit)){
$uid = $_POST['uid'];
$uname = $_POST['uname'];
$uemail = $_POST['email'];
$pass=$_POST['upass'];
//$fid=$_POST['uid'];
$patt1='/^[0-9]{5,6}$/';
$patt2='/^[A-Za-z]{5,30}$/';
//$patt3='/^(male)$/';
//$patt31='/^(female)$/';
//$patt4='/^[0-9]{10}$/';
$patt5='/^[A-Za-z0-9]{1,30}$/';

function patt1($patt1,$uid){
if(!preg_match($patt1,$uid)){
echo "Please enter the valid format<br>";
}
else
	return true;
}
function patt2($patt2,$uname){
if(!preg_match($patt2,$uname)){
echo "Please enter the valid name";
}
else
	return true;
}
/*function patt3($patt3,$patt31,$ssex){
if(preg_match($patt3,$ssex)|| preg_match($patt31,$ssex)){
     return true;
}
else
	echo "please enter the valid gender";

}
function patt4($patt4,$sphno){
if(!preg_match($patt4,$sphno)){
echo "please enter the valid phone number";
}
else
	return true;
}
*/
function patt5($patt5,$pass){
if(!preg_match($patt5,$pass)){
echo "please enter the valid addres";
}
else
	return true;
}
function patt6($uemail){
if(!filter_var($uemail,FILTER_VALIDATE_EMAIL)){
echo "please enter the valid email";
}
else
	return true;
}
if(patt1($patt1,$uid)){
if(patt2($patt2,$uname)){
if(patt5($patt5,$pass)){
//if(patt3($patt3,$patt31,$ssex)){
//if(patt4($patt4,$sphno)){
if(patt6($uemail)){
	$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'surya');
if(!$conn) {
die('Could not connect: ' . mysqli_error());
}

$sql = "insert into user(user_id,user_name,password,email) values('$uid','$uname','$pass','$uemail')";
$retval = mysqli_query($conn,$sql);
if(!$retval) {
die('Could not enter data: '.mysqli_error($conn));
}
echo "Entered data successfully\n";
}
}}
}
?>
<form action="userlogin.php">
<input type="submit" name="submit" value="back to user Login">
</form>
