<?php
include("connection.php");

$code=mysqli_real_escape_string($con,$_GET['code']);


 mysqli_query($con,"UPDATE ftable set verification_status='1' WHERE code='$code'");
 echo "your account verified";
 ?>
<a href="signup.php"> click here for login</a>