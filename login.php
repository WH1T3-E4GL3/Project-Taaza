<?php
require_once "includes/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $full_name = isset($_POST["full-name"]) ? htmlspecialchars($_POST["full-name"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirm_password = isset($_POST["confirm-password"]) ? $_POST["confirm-password"] : "";
    $gender = isset($_POST["gender"]) ? htmlspecialchars($_POST["gender"]) : "";
    $state = isset($_POST["state"]) ? htmlspecialchars($_POST["state"]) : "";
    $district = isset($_POST["district"]) ? htmlspecialchars($_POST["district"]) : "";

    if ($password !== $confirm_password) {
        echo '<script>alert("Password and Confirm Password do not match.");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        exit(); // Exit the script to prevent further execution
    }

    // Check if email already exists
    $check_email_stmt = $conn->prepare("SELECT * FROM registered_users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        echo '<script>alert("A user with that email already exists.");</script>';
        $check_email_stmt->close();
        echo '<script>window.location.href = "login.php";</script>';
        exit(); // Exit the script to prevent further execution
    }

    $check_email_stmt->close();

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO registered_users (name, email, password, gender, state, district) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
    
    $stmt->bind_param("ssssss", $full_name, $email, $hashed_password, $gender, $state, $district);
    
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful!");</script>';
        echo '<script>window.location.href = "new-login.php";</script>';
    } else {
        echo '<script>alert("Error during registration.");</script>';
    }
   
    $stmt->close();
}
?>


<?php require "includes/header.php"; ?>

      <!-- #HOME SECTION -->

      <section class="home" id="home">
        <div class="home-left">
          <div class="container">
              <div class="form-container">
                <div class="form-title"><b>Register</b></div>
                <form action="#" method="POST">
                  <!-- Login Information -->
                  <div class="form-section">

                    <div class="form-field">
                      <label for="full-name">FULL NAME</label>
                      <input type="text" id="full-name" name="full-name" required>
                    </div>

                    <div class="form-field">
                      <label for="email">EMAIL</label>
                      <input type="email" id="email" name="email" required>
                    </div>
                    
                    
                    <div class="form-field">
                      <label for="password">PASSWORD</label>
                      <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-field">
                      <label for="gender">Gender</label>
                      <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="prefer-not-to-say">Prefer not to say</option>
                      </select>
                    </div>

                  </div>

                  <div class="form-section">                                       
                  </div>

                  <div class="form-section">

                    <div class="form-field">
                      <label for="state">STATE</label>
                      <input type="text" id="state" name="state" required>
                    </div>

                    <div class="form-field">
                      <label for="district">DISTRICT</label>
                      <input type="text" id="district" name="district" required>
                    </div>
                                       
                  </div>
                  <div class="form-field">
                      <label for="confirm-password">CONFIRM YOUR PASSWORD</label>
                      <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>

                  <button type="submit" class="login-btn">Register</button>
                </form>
                <br><center>
                <div class="form-question"><h3>Already Registered? <u><a href="new-login.php" style="display: inline; color: #216aca;" onmouseover="this.style.color='#03d9ff'" onmouseout="this.style.color='#216aca'">Login Here</h3></a></u></div>
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

<!-- Password Complexity Check -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const isValid = passwordPattern.test(password);

        if (!isValid) {
            this.setCustomValidity('Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one number, and one special character.');
        } else {
            this.setCustomValidity('');
        }
    });
});
</script>

<?php require "includes/footer.php"; ?>
