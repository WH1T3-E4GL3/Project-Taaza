<?php
session_start();
include_once '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['activateVip'])) {

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        echo "
        <script>
            alert('You must be logged in to activate VIP membership!');
            window.location.href='../new-login.php';
        </script>";
        exit;
    }

    $conn = new mysqli("localhost", "root", "", "taaza_db");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the entered amount and user ID (you should have a way to identify the user, like user session or login)
    $enteredAmount = $_POST['activationAmount'];
    $userId = $_SESSION['username']; // Adjust this based on how you manage user sessions

    // Check if the user is already a VIP
    $checkVipQuery = "SELECT is_vip FROM registered_users WHERE email = ?";
    $checkVipStmt = $conn->prepare($checkVipQuery);

    if ($checkVipStmt) {
        $checkVipStmt->bind_param("s", $userId);
        $checkVipStmt->execute();
        $checkVipStmt->bind_result($isVip);
        $checkVipStmt->fetch();
        $checkVipStmt->close();

        if ($isVip == 1) {
            echo "
            <script>
                alert('You are already a VIP member!');
                window.location.href='premium.php';
            </script>";
            exit; // Exit the script if the user is already a VIP
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Check if the entered amount is correct (for simplicity, you can adjust this logic)
    $expectedAmount = 500; // Change this to the expected activation amount
    if ($enteredAmount == $expectedAmount) {
        // Update the user's VIP status in the database using prepared statement
        $updateQuery = "UPDATE `registered_users` SET `is_vip` = 1 WHERE email = ?";
        $stmt = $conn->prepare($updateQuery);

        if ($stmt) {
            $stmt->bind_param("s", $userId);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "
                <script>
                    alert('Activated your VIP account successfully!');
                    window.location.href='premium.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Error in updating');
                    window.location.href='premium.php';
                </script>";
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "
        <script>
            alert('Invalid amount. VIP membership requires 500 Rs!');
            window.location.href='premium.php';
        </script>";
    }

    $conn->close();
}
?>
