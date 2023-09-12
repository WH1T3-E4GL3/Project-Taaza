<?php
session_start();

require_once "includes/connection.php";

if(isset($_GET['email']) && isset($_GET['reset_token']))
{
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $query = "SELECT * FROM registered_users WHERE email='$_GET[email]' AND resettoken='$_GET[reset_token]' AND resettokenexpire='$date'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result)==1)
    {
        echo '<center>
        <section class="home" id="home">
            <div class="home-left">
                <div class="container">
                    <div class="form-container1">
                        <div class="form-title"><b style="font-size:40px">Reset your password</b></div>
                        <form action="#" method="POST">
                            <!-- Login Information -->
                            <div class="form-section">
                                <div class="form-field">
                                    <label for="password">NEW PASSWORD</label>
                                    <input type="password" id="password" name="Password" required>
                                </div>
                            </div>
                            <div class="form-section">                                       
                            </div>
                            <div class="form-section">
                                <div class="form-field">
                                    <label for="confirm_password">CONFIRM PASSWORD</label>
                                    <input type="password" id="confirm_password" name="ConfirmPassword" required>
                                </div>
                            </div>
                            <div class="form-field">                             
                            </div>
                            <button type="submit" name="reset" class="login-btn">Reset</button>
                        </form>               
                    </div>
                </div>
            </div>
        </section>
        </center>

        <script>
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    passwordInput.addEventListener("input", function() {
        const password = this.value;
        const isValid = passwordPattern.test(password);

        if (!isValid) {
            this.setCustomValidity("Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one number, and one special character.");
        } else {
            this.setCustomValidity("");
        }
    });

    confirmPasswordInput.addEventListener("input", function() {
        const confirmPassword = this.value;
        const password = passwordInput.value;

        if (password !== confirmPassword) {
            this.setCustomValidity("Passwords do not match.");
        } else {
            this.setCustomValidity("");
        }
    });
});
</script>
        ';
    }
    else
    {
        echo "
        <script>
        alert('Link expired or invalid');
        window.location.href='reset_pass.php';
        </script>
        ";
    }
}

if(isset($_POST['reset']))
{
    $pass = password_hash($_POST['Password'], PASSWORD_BCRYPT);
    $email = mysqli_real_escape_string($conn, $_GET['email']); // Escape user input

    $update = "UPDATE registered_users SET password='$pass', resettoken=NULL, resettokenexpire=NULL WHERE email='$email'";

    if(mysqli_query($conn, $update))
    {
        echo "
        <script>
        alert('Password updated successfully');
        window.location.href='new-login.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
        alert('UNKNOWN ISSUE: cannot run your request');
        window.location.href='reset_pass.php';
        </script>
        ";
    }
}
?>

<?php require "includes/header.php"; ?>

        <div class="home-right">         
      </div>
    </section>
</header>

<?php require "includes/footer.php"; ?>
