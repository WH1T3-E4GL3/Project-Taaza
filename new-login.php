<?php
session_start();

require_once "includes/connection.php";
$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT password FROM registered_users WHERE email = ?");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set session or do any other action
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            // Check if "Remember Me" is checked
            if (isset($_POST["remember_me"]) && $_POST["remember_me"] === "1") {
                $cookie_name = "remember_me_cookie";
                $cookie_value = $email;
                $cookie_expiry = time() + (86400 * 30); // 30 days (86400 seconds per day)
                setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");
            }
            // login success
            echo '<script>alert("Success");</script>';
            header("Location: dashboard.php");
            exit();
        } else {
            echo '<script>alert("Incorrect email or password. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Incorrect email or password. Please try again.");</script>';
    }
    $stmt->close();
}
?>

<?php require "includes/header.php"; ?>

      <!-- #HOME SECTION -->

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
                <label for="remember_me">Remember Me:</label>
                  <input type="checkbox" id="remember_me" name="remember_me" value="1">
                </div>

                  <button type="submit" class="login-btn">Login</button>
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

<?php require "includes/footer.php"; ?>
