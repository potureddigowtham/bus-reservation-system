<?php
$a=array("400","350","450","315");
$b=array_rand($a);
?>
<form action="update.php">
<font size="4"><b>Total Fare:<?php echo $a[$b];?></b></font><br><br>
<input type="submit" value="pay">
</form>