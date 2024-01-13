<?php
include_once '../includes/connection.php';
session_start();
define("APPURL", "http://localhost/taaza");
?>

<?php
if(isset($_POST['login']))
{
  $query = "SELECT * FROM admin WHERE email='{$_POST['email']}'";
  $result=mysqli_query($conn, $query);

  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
      $result_fetch=mysqli_fetch_assoc($result);
        if(password_verify($_POST['password'], $result_fetch['password']))
      {
        $_SESSION['admin_logged_in']=true;  // Created session variable named username
        $_SESSION['admin_username']=$result_fetch['email'];

        echo"
        <script>alert('Login Success');
        window.location.href='admin.php';
        </script>
        ";
      }
      else
      {
        echo"
      <script>alert('Incorrect email or password');
      window.location.href='admin-login.php';
      </script>
      ";
      }
      
    }
    else
    {
      echo"
      <script>alert('Email not registered! Please register first');
      window.location.href='admin-login.php';
      </script>
      ";
    }
  }
  else
  {
    echo"
    <script>
    alert('UNKNOWN ISSUE: cannot run you request!');
    window.location.href='admin-login.php';
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

<body>
    <!-- main container -->
    <div class="container">
        <!-- #HEADER -->
        <header>
            <nav class="navbar">
                <div class="navbar-wrapper">
                    <a href="#">
                        <img src="../assets/images/logo.png" alt="logo" width="130">
                        <a href="#" class="nav-link">Admin Login Section</a>
                    </a>
                    <b>
                        <ul class="navbar-nav">

                            <li>
                                <?php
                                    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                                        echo '<a href="admin.php" class="nav-link">Admin Dashboard</a>';
                                    }
                                    ?>
                            </li>

                            <li>
                                <?php
                                    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                                        echo '<a href="admin-logout.php" class="nav-link">Logout</a>';
                                    } else {
                                        echo '<a href="admin-login.php" class="nav-link">Login</a>';
                                    }
                                    ?>
                            </li>
                        </ul>
                    </b>


                    <div class="navbar-btn-group">
                        </button>
                        <button class="menu-toggle-btn">
                            <span class="line one"></span>
                            <span class="line two"></span>
                            <span class="line three"></span>
                        </button>
                    </div>

                </div>
            </nav>

            <div class="cart-box">
                <ul class="cart-box-ul">
            </div>
        </header>
        <main>

            <s<section class="contact-section" id="home">
                <div class="contact-container">
                    <div class="contact-content">
                        <div class="form-container1">
                <div class="form-title"><b>Admin Login</b></div>
                <form action="#" method="POST">
                  <!-- Login Information -->
                  <div class="form-section">

                    <div class="form-field">
                      <label for="email">Admin Email</label>
                      <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-field">
                      <label for="password">PASSWORD</label>
                      <input type="password" id="password" name="password" required>
                    </div>

                  </div>

                  <div class="form-section">                                       
                  </div>

                  <div class="form-section">                              
                  </div>

                <div class="form-field">
                  <a href="admin-forgot-pass.php">Forgot password?</a>
                </div>

                  <button type="submit" name="login" class="login-btn">Login</button>
                </form>
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
                </div>
                </section>

                <footer>
                    <div class=" footer-wrapper">
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
    </div>

    <!--custom js link -->
    <script src="../assets/js/taaza.js"></script>

    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>