
<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
mysqli_select_db($conn,'surya');
$a=$_SESSION['source'];
$b=$_SESSION['dest'];
$sql = "select train1,train2,train3,train4 from train where source='$a' and dest='$b';";
$sql2 = "select * from seats;";
$res = mysqli_query($conn,$sql);
$res2 = mysqli_query($conn,$sql2);
$i=0;
?>
<form method="post">
<table>
<tr><td>
<h2>Source</h2></td><td></td><td></td><td></td>
<td><h2>Dest</h2></td><td></td><td></td><td></td>
<td><h2>Train name</h2></td><td></td><td></td><td></td>
<td><h2>Seats_available</h2></td><td></td><td></td><td></td>
<td><h2>Booking Status</h2></td><td></td><td></td><td></td></tr>
<?php
$x=array();
$count=0;
while($num = mysqli_fetch_array($res)){
for ($i=0; $i < 4; $i++) {

    $p="obj".$i;
  ?>
 <tr><td>
 <?php echo $a;?></td><td></td><td></td><td></td>
 <td>
<?php echo $b;?></td><td></td><td></td><td></td>
 <td>
 <?php
  echo $num[$i];
  $x[$i] = $num[$i];
  ?>
</td><td></td><td></td><td></td>
<?php
  $sql3 = "select seats from seats where train='$num[$i]';";
  $res3 = mysqli_query($conn,$sql3);
  $num2 = mysqli_fetch_array($res3);
  ?>
 <td>
 <?php
  echo $num2[0];
  ?>
 </td><td></td><td></td><td></td>
 <td>
 <input type='submit' name='<?php echo $p;?>' value='Book Ticket'>
 </td><td></td><td></td><td></td>
 </tr>
 <?php
  $count++;
}
}
for ($j=0; $j <$count ; $j++) {
  $p = "obj".$j;
  if (isset($_POST[$p])) {
    $_SESSION['tname'] = $x[$j];
    header('Location:payment.php');
	break;
  }
  }
  ?>
</table>
</form>
