<?php
$errors = "";
session_start();

	
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Calcutta');

require '../PHPMailerAutoload.php';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysqli_error($conn));
}
    $mail = $_SESSION["login_user"];
	mysqli_select_db($conn,'surya');
	$sql = "select email from user where user_id = '$mail';";
	$res = mysqli_query($conn,$sql);
	$num = mysqli_fetch_assoc($res);

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'phpex22@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'phppassword';

//Set who the message is to be sent from
$mail->setFrom('phpex22@gmail.com', 'PHP');

//Set an alternative reply-to address
$mail->addReplyTo('phpex22@gmail.com', 'php');

//Set who the message is to be sent to
$mail->addAddress($num['email']);

//Set the subject line
$mail->Subject = "TICKET";
$x=$_SESSION['seatno'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("YOur Ticket is Booked <br>U r Seat no is:$x", dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Get the uploaded file information


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	$a = $_SESSION['tickets_ava'];
    echo "<font size='4'>*****Ticket Successfully Booked and sent To ur registerd email address!******</font><br><br>";
	echo "<h2><font color='red'>Tickets Available: ".$a."</font></h2>";
	echo "<font size='4'>Book Another ticket&nbsp;&nbsp;</font><a href='../../showtrain.php'>Go Back</a>";
}
?>