<?php
session_start();

require_once "../includes/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$reset_token)
{
  require('PHPMailer/PHPMailer.php');
  require('PHPMailer/SMTP.php');
  require('PHPMailer/Exception.php');

  $mail = new PHPMailer(true);

  try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Youremail@gmail.com';                     //SMTP username
    $mail->Password   = 'wqrwyjcfnntwvunoiccib';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('YourEmail@gmail.com', 'Taaza Restaurant');
    $mail->addAddress('YourEmail@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password reset - Taaza';
    $mail->Body    = "<b style='color:blue'>We got a request from you to reset your password !</b><br>
    Click the button below to reset your password<br>
    <a href='http://localhost/taaza/admin/reset_pass.php?email=$email&reset_token=$reset_token'>Reset password</a>
    <br><p style='color:red'>Enjoy our services, hearty welcome from Taaza</p>
   ";
   // Disable SSL certificate verification, because error occured for me
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
      );

    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}
} // Mail sending function ends

if(isset($_POST['reset']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Escape user input

    $query = "SELECT * FROM `admin` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata'); // Corrected function name

            $date = date("Y-m-d");
            $query = "UPDATE `admin` SET `resettoken`='$reset_token', `resettokenexpire`='$date' WHERE `email`='$email'";

            if (mysqli_query($conn, $query) && sendMail($_POST['email'], $reset_token)) {
    echo "Mail sent successfully!";
    echo "
        <script>
        alert('Reset link sent to mail successfully');
        window.location.href='admin-login.php';
        </script>
    ";
} else {
    echo "Error: " . mysqli_error($conn);
    echo "
        <script>
        alert('UNKNOWN ISSUE: cannot run your request');
        window.location.href='admin-forgot-pass.php';
        </script>
    ";
}
        }
        else
        {
            echo "
            <script>
            alert('Email not registered');
            window.location.href='admin-forgot-pass.php';
            </script>
            ";
        }
    }
    else
    {
        echo "
        <script>
        alert('UNKNOWN ISSUE: cannot run your request');
        window.location.href='admin-forgot-pass.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taaza</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">

    <!-- custom css link -->
    <link rel="stylesheet" href="../assets/css/taaza.css">
    <link rel="stylesheet" href="../assets/css/media_query.css">

    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .remove-button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 130px;
        }


        .remove-button1 {
            background-color: white;
            color: black;
            border: 2px solid #f44336;
        }

        .remove-button1:hover {
            background-color: #f44336;
            color: white;
        }
    </style>

</head>


      <section class="home" id="home">
        <div class="home-left">
          <div class="container">
              <div class="form-container1">
                <div class="form-title"><b>Reset password</b></div>
                <form action="#" method="POST">
                  <!-- Login Information -->
                  <div class="form-section">

                    <div class="form-field">
                      <label for="email">Email</label>
                      <input style="width: 300px;" type="email" id="email" name="email" placeholder="Type your registered e-mail" required>
                    </div>

                    <div class="form-field">
                    </div>

                  </div>

                  <div class="form-section">                                       
                  </div>

                  <div class="form-section">                              
                  </div>


                  <button type="submit" name="reset" class="login-btn">Send link</button>
                </form>
                <br><center>
                  <div class="form-question"><u><a href="admin-login.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">< back to login</h3></a></u></div>
              </center>
              </div>
            </div>
        </div>
        <figure class="hero-banner">
        <div class="home-right" style="margin-top: 1cm;">

          <img src="../assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
          <img src="../assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
          <img src="../assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

          <img src="../assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
          <img src="../assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

          <img src="../assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
          <img src="../assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
          <img src="../assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
          <img src="../assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
          <img src="../assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

          </div>
        </figure>
</section>

<footer class="home">
      <div class="footer-wrapper"">
        <a href="#">
          <img src="../assets/images/logo.png" alt="logo" class="footer-brand" width="150">
        </a>
        <div class="social-link">

          <a href="https://twitter.com/Annabel07785340">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>

          <a href="https://www.instagram.com/whxite.exe/">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>

          <a href="https://www.facebook.com/andro.pool.54/">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>

          <a href="https://youtu.be/OTQqj3-Zqi8?si=tT2NfC3Sh7p_UaSS">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>
        </div>
        <p class="copyright">&copy; Copyright 2024 Taaza. All Rights Reserved.</p>
      </div>
    </footer>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
