<?php
session_start();

require_once "includes/connection.php";

if(isset($_POST['login']))
{
  $query = "SELECT * FROM registered_users WHERE email='{$_POST['email']}'";
  $result=mysqli_query($conn, $query);

  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if($result_fetch['is_verified']==1) //login only if user is verified
      {
        if(password_verify($_POST['password'], $result_fetch['password']))
      {
        $_SESSION['logged_in']=true;  // Created session variable named username
        $_SESSION['username']=$result_fetch['email'];

        echo"
        <script>alert('Login Success');
        window.location.href='dashboard.php';
        </script>
        ";
      }
      else
      {
        echo"
      <script>alert('Incorrect email or password');
      window.location.href='new-login.php';
      </script>
      ";
      }
      }
      else
      {
        echo"
      <script>alert('Email not Verified! please verify yor email and try again');
      window.location.href='new-login.php';
      </script>
      ";
      }
      
    }
    else
    {
      echo"
      <script>alert('Email not registered! Please register first');
      window.location.href='new-login.php';
      </script>
      ";
    }
  }
  else
  {
    echo"
    <script>
    alert('UNKNOWN ISSUE: cannot run you request!');
    window.location.href='new-login.php';
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
                <div class="form-title"><b>Login</b></div>
                <form action="#" method="POST">
                  <!-- Login Information -->
                  <div class="form-section">

                    <div class="form-field">
                      <label for="email">Email</label>
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
                  <a href="forgot.php">Forgot password?</a>
                </div>

                  <button type="submit" name="login" class="login-btn">Login</button>
                </form>
                <br><center>
                <div class="form-question"><h3>New Member? <u><a href="login.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">Register Here</h3></a></u></div>
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
<br><br><br><br>

<?php require "includes/footer.php"; ?>
