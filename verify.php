<?php
require("includes/connection.php");
if(isset($_GET['email']) && isset($_GET['verification_code']))
{
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $verification_code = mysqli_real_escape_string($conn, $_GET['verification_code']);
    
    $query = "SELECT * FROM `registered_users` WHERE `email`='$email' AND `verification_code`='$verification_code'";
    $result = mysqli_query($conn, $query);
    
    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            
            if($result_fetch['is_verified'] == 0) // update user as verified
            {
                $update = "UPDATE `registered_users` SET `is_verified`='1' WHERE `email`='$email'";
                
                if(mysqli_query($conn, $update))
                {
                    echo "
                        <script>
                            alert('Email verification successful, now you can login');
                            window.location.href='new-login.php';
                        </script>
                    ";
                }
                else
                {
                    echo "
                        <script>
                            alert('UNKNOWN ISSUE: cannot run request!');
                            window.location.href='new-login.php';
                        </script>
                    ";
                }
            }
            else
            {
                echo "
                    <script>
                        alert('Email is already verified');
                        window.location.href='new-login.php';
                    </script>
                ";
            }
        }
    }
    else
    {
        echo "
            <script>
                alert('UNKNOWN ISSUE: cannot run request!');
                window.location.href='login.php';
            </script>
        ";
    }
}
?>
