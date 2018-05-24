<?php
session_start();
?>
<html>
<head>
<title>Welcome </title>
</head>
<body bgcolor="lightpink">
<?php
if($_SESSION["login_user"]) {
?>
<font size="40"><center>Bus Reservation</center></font>
<font size="4" align="left">Welcome <?php echo $_SESSION["login_user"];?></font>
<?php
}
?>