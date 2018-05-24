<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
$a=array("0"=>array('dilli','babu'),"1"=>array('konakanchi','sravan'),"2"=>array('rohit','varma'));
$b=array(0,1,2);
print_r($b);
random();
function random(){
echo "dilli";
$randomElement = $b[array_rand($b, 1)];
echo $randomElement;
}
 ?>
 <form  action="" method="post">
   <input type="submit" name="name" value="click here">

 </form>
   </body>
</html>
