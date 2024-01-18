<?php
session_start();

require_once "includes/connection.php";

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
    $mail->Username   = 'YourEmail@gmail.com';                     //SMTP username
    $mail->Password   = 'YourAppPassword';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('YourEmail@gmail.com', 'Taaza Restaurant');
    $mail->addAddress($email);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password reset - Taaza';
    $mail->Body    = "<b style='color:blue'>We got a request from you to reset your password !</b><br>
    Click the button below to reset your password<br>
    <a href='http://localhost/taaza/reset_pass.php?email=$email&reset_token=$reset_token'>Reset password</a>
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

    $query = "SELECT * FROM `registered_users` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata'); // Corrected function name

            $date = date("Y-m-d");
            $query = "UPDATE `registered_users` SET `resettoken`='$reset_token', `resettokenexpire`='$date' WHERE `email`='$email'";

            if(mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token))
            {
                echo "
                <script>
                alert('Reset link sent to mail successfully');
                window.location.href='new-login.php';
                </script>
                ";
            }
            else
            {
                echo "
                <script>
                alert('UNKNOWN ISSUE: cannot run your request');
                window.location.href='forgot.php';
                </script>
                ";
            }
        }
        else
        {
            echo "
            <script>
            alert('Email not registered');
            window.location.href='forgot.php';
            </script>
            ";
        }
    }
    else
    {
        echo "
        <script>
        alert('UNKNOWN ISSUE: cannot run your request');
        window.location.href='forgot.php';
        </script>
        ";
    }
}
?>



<?php require "includes/header.php"; ?>


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
                  <div class="form-question"><u><a href="new-login.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">< back to login</h3></a></u></div>
              </center>
              </div>
            </div>
        </div>

        <div class="home-right" style="margin-top: 1cm;">

          <img src="./assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
          <img src="./assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
          <img src="./assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

          <img src="./assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
          <img src="./assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

        </div>
      </section>
</header>

<?php require "includes/footer.php"; ?>
