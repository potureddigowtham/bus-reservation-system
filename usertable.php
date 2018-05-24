<title>Creating MySQL Tables</title>
</head>
<body>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'surya');
if(!$conn) {
die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully<br />';
$sql = "create table user(user_id varchar(20),user_name varchar(20),password varchar(20),email varchar(30))";
$retval = mysqli_query($conn,$sql);
if(!$retval) {
die('Could not create table: ' . mysqli_error($conn));
}
echo "Table Student created successfully\n";
mysqli_close($conn);
?>
</body>
