<?php
session_start();
extract($_POST);
if(isset($_POST['submit'])){
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'surya');
if(!$conn)
{
die('Could not connect: ' . mysqli_error($conn));
}
$uname = $_POST['field1'];
$pass = $_POST['field2'];
$a=$_POST['a'];
$patt1='/^[0-9]{5,6}$/';
$patt2='/^[a-zA-Z0-9]{1,20}$/';
function patt1($patt1,$uname){
if(!preg_match($patt1,$uname)){
echo 'enter the valid username';
}
else
return true;
}
function patt2($patt2,$pass){
if(!preg_match($patt2,$pass)){
echo 'enter the valid password';
}
else
return true;
}
if(patt1($patt1,$uname)){
if(patt2($patt2,$pass)){
$sql= "select user_id,password from user;";
$res = mysqli_query($conn,$sql);
while($num = mysqli_fetch_assoc($res)){
	if($num['user_id'] == $uname && $num['password'] == $pass){
     $_SESSION["login_user"] = $num['user_id'];
	}
	else
	header("Location: swrong.php");
}
if(isset($_SESSION["login_user"])){
if($_SESSION['my_captcha']==$a){
header("Location:aslogin.php");
}
}
}}
mysqli_close($conn);
}
?>
<html>
  <head>
    <style>
    .top{
    color:blue;
    text-align:center;
    font-variant:bold;
    background-color:blue;
  }
    .s1{
    margin-top:0px;
    border-style:none;
    border-color:white;
    border-width:0px;
    padding:8px
  }
  .s4{
    position:relative;
    top:100px;
    left:200px;
    font-size:25px;
    color:darkblue;
  }
  .s5{
    position: relative;
    top:20px;
    left:0px
    width: 100%;
    height: 200px;
  }
    </style>
<script type="text/javascript">

</script>
  </head>
  <body bgcolor="#D5DBDB  ">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1><center>USER LOGIN</center></h1>

<div class="s5">
  <form name="f1" action="" method = "POST">
   <center>
  <table border="0" style="box-shadow:5px 5px 20px black;width:26%;height:90%;cellpadding=5 cellspacing=5  border="0">
<tr>
<td colspan=2>
</td>
</tr>
    <tr>
      <th align="left">
       User Id:
      </th>
      <td>
        <input type="text" style="border-radius:3px;" id="n1" name="field1">
      </td>
    </tr>
    <tr>
      <th align="left">
      Password:
      </th>
      <td >
        <input id="password" type="password" style="border-radius:3px;" name="field2">
      </td>
    </tr>
<tr>
<th align="left">
Captcha:
</th>
<td>
<?php
print "<img src=image.png?".date("U").">";
$str1="abcdefghijklmnopqrstuvwxyzABCDEFGNIJKLMNOPQRSTUVWZYZ";
$str2="123456789";
$str=$str1.$str2;
$str3=str_shuffle($str);
$a=substr($str3,0,6);
$_SESSION['my_captcha']=$a;
$in=@imagecreate(80,20) or die("cant create");
$bg=imagecolorallocate($in,255,255,255);
$tc=imagecolorallocate($in,0,0,0);
imagestring($in,5,5,2,$_SESSION['my_captcha'],$tc);
imagepng($in,"image.png");
imagedestroy($in);
?>
</td>
</tr>
<tr>
<th align="left">
Enter Captcha:</th>
<td>
<input type="text" name="a"></td>
</tr>
    <tr>
    <td colspan=2>
    </td>
    </tr>
    <tr>
      <td align="center" colspan="2">
        <input type="submit" name="submit" value="Login">
        <input type="reset" name="" value="reset">
      </td>
    </tr>
</table>
</center>
</form>

<br><a href="use.php"><center>NEW USERS REGISTER HERE</center></a>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php"><center>MainPage</center></a></div>
</body>
</html>
