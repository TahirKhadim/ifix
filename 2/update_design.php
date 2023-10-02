<?php 

session_start();


include("connection.php");




$id=$_GET['id']; 

$sesion_var= $_SESSION['var'];
if($sesion_var==true)
{

}
else
{
    header('location:signup.php');
}

$query= "SELECT * FROM ftable WHERE id='$id'";;
$data = mysqli_query($con, $query);

$total= mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registration-form">
        <form action="#" method="POST">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" value="<?php echo $result['name'];?>" class="form-control item" name="lname" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email"  value="<?php echo $result['email'];?>" class="form-control item" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password"  value="<?php echo $result['password'];?>" class="form-control item" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password"  value="<?php echo $result['cpassword'];?>" class="form-control item" name="cpassword" id="password" placeholder="Confirm Password" required>
            </div>
          
            <div class="form-group">
            <input type="submit"  value="Update Details" class="btn" name="update">
            </div>
        </form>
        
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>

<?php 
 if($_POST['update'])
 {
    $name=$_POST['lname'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $cpwd=$_POST['cpassword'];

   // if($name!= "" && $email != "" && $pwd != "" && $cpwd != "")
    
    
   $query =" UPDATE ftable set  name='$name' ,email='$email',password='$pwd',cpassword='$cpwd' WHERE id='$id' ";
    $data= mysqli_query($con,$query);

   
   
    $data= mysqli_query($con,$query);

    if($data)
    {
        echo "<script>alert('Record Updated')</script>";
        ?>
        <meta http-equiv="refresh"
content="0; url = http://localhost/crud/display.php" />
        <?php
    }
    else
    {
        echo " Failed";
    }
}
//else{
   // echo "<script>alert('please fill the form')</script>";
//}


?>