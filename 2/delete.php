<?php 
session_start();
include ("connection.php");
$id= $_GET['id'];

$sesion_var= $_SESSION['var'];
if($sesion_var==true)
{

}
else
{
    header('location:signup.php');
}

$query = "DELETE FROM ftable WHERE id = '$id' ";
$data = mysqli_query($con,$query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";
?>
<meta http-equiv="refresh"
content="0; url = http://localhost/past/crud/display.php" />

<?php
}

else
{
    echo "not deleted";
}
?>