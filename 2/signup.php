<?php 
  session_start();
  include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registration-form">
        <form action="#" method="POST" autocomplete="off">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
          
            <div class="form-group">
                <input type="email" class="form-control item" name="username" id="email" placeholder="User Name" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" id="password" placeholder="Password" required>
            </div>
            
            <p><a href="#" style="margin-bottom: 15px; display: block; text-align: right;  ">Forget Password?</a></p>

           
          
            <div class="form-group" >
            <input type="submit"  value="Login" class="btn" name="login">
            </div>
            <div class="signup">New member <a href="form1.php" class="link"> SignUp Here</a></div>
        </form>
        
        </div>
    </div>

   
  
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
 
</body>
</html>
<?php 


if(isset($_POST["login"]))
{
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    
    $query = "SELECT * FROM ftable wHERE email = '$user' && password = '$pwd' ";
    $data = mysqli_query($con, $query);
    $total = mysqli_num_rows($data);

    //echo $total;
    

    if($total== 1)
    {
       
        $_SESSION['var']=$user;
        header('location:display.php');
       

    }
    else{
        echo "<script>alert('failed')</script>";
    }
}


?>