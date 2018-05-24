<html>
  <body>
    <?php
session_start();
$a=$_SESSION['tname'];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
mysqli_select_db($conn,'surya');
$sql = "select seats from seats where train='$a';";
$res = mysqli_query($conn,$sql);
$num = mysqli_fetch_assoc($res);
$b = $num['seats'];
$_SESSION['seatno'] = $b;
$c = $b-1;
$_SESSION['tickets_ava'] = $c;
$sql2 = "update seats set seats=$c where train='$a';";
if ($b>0) {
  $res2 = mysqli_query($conn,$sql2);
  
  if (!$res2) {
    die('Error Booking ' . mysqli_error($conn));
  }
  else {
	  header('Location:PHPMailer-master/examples/gmail.php');
    ?>
<?php
  }
}
else {
  echo "Seats not available";
}
     ?>
  </body>
</html>
