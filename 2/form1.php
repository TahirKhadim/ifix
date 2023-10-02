<?php


include("connection.php");
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;





//Load Composer's autoloader
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <style>

    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Contact Info</h3>
                <h6>Email: <a href="">sample@gmail.com</a></h6>
                <h6>Email: <a href="">facebook</a>
                </h6>

                <h4>Need Us? Call Us. </h4>

                <h5>0000000000000</h5>
            </div>
            <div class="col-lg-6">
                <form action=" " method="POST">
                    <h2>We're Ready, Let's Talk.</h2>
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" require>

                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" require>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="name" aria-describedby="emailHelp" name="phone" require>

                    </div>
                    <div class="mb-2">
                        <label for="model" class="form-label">Car Make & Model</label>
                        <input type="model" class="form-control" id="model" name="car" require>
                    </div>

                    <div class="mb-2">
                        <label for="model" class="form-label">Message</label>
                        <textarea name="" id="" name="txt" name="msg" placeholder="Enter your message here" require></textarea>
                    </div>

                    <button name="register">send</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>

<?php

if (isset($_POST["register"])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $car = mysqli_real_escape_string($con, $_POST['car']);
    $msg = mysqli_real_escape_string($con, $_POST['msg']);


    $query = "INSERT INTO tyre1(`name`, `email`, `phone`, `model`, `message` ) VALUES ('$name','$email','$phone','$car', '$msg')";
    $data = mysqli_query($con, $query);

    if ($data) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings

            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'tahirbinkhadim@gmail.com'; //SMTP username
            $mail->Password = 'qsnawvqidgmptzne'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tahirbinkhadim@gmail.com');
            $mail->addAddress('momistheboss10@gmail.com');


            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Customer data';
            $mail->Body = "<b>New customer send his data kindly check</b> 
            name:$name <br> email is:$email  <br> phone no: $phone <br> car modedl is: $car <br> message: $msg";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script> alert('thank You for contacting us')</script>";
    } else {
        echo " Something went wrong";
    }
} else {
    echo "data not saved";
}




?>