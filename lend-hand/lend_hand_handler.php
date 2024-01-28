<?php
session_start();
include_once '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['activateVip'])) {

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        echo "
        <script>
            alert('You must be logged in to send money!');
            window.location.href='../new-login.php';
        </script>";
        exit;
    }

    $conn = new mysqli("localhost", "root", "", "taaza_db");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the entered amount and user ID
    $enteredAmount = $_POST['activationAmount'];
    
    // Check if the amount is valid (greater than 0)
    if ($enteredAmount <= 0) {
        echo "
        <script>
            alert('Enter an amount greater than 0.');
            window.location.href='lend-hand.php';
        </script>";
        exit;
    }

    $userId = $_SESSION['username'];

    // Check if the "Hide your details" checkbox is checked
    $showDetails = isset($_POST['anonymousCheckbox']) ? 0 : 1; // If checked, set to 0 (hide details), otherwise set to 1 (show details)

    // Fetch user's name from the database
    $fetchUserQuery = "SELECT `name`, `email` FROM `registered_users` WHERE email = ?";
    $fetchUserStmt = $conn->prepare($fetchUserQuery);

    if ($fetchUserStmt) {
        $fetchUserStmt->bind_param("s", $userId);
        $fetchUserStmt->execute();
        $fetchUserStmt->store_result();
        $fetchUserStmt->bind_result($name, $email);

        // Fetch user's details
        if ($fetchUserStmt->fetch()) {
            // If "Hide your details" checkbox is checked, set name and email to "Anonymous"
            if ($showDetails == 0) {
                $name = "Anonymous";
                $email = "Anonymous";
            }
        } else {
            // Handle case where user details are not found
            echo "
            <script>
                alert('User details not found!');
                window.location.href='../new-login.php';
            </script>";
            exit;
        }

        $fetchUserStmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    // Insert into lend_hand table with user details
    $insertQuery = "INSERT INTO `lend_hand`(`name`, `email`, `amount`, `timestamp`, `show_detail`) VALUES (?, ?, ?, NOW(), ?)";
    $insertStmt = $conn->prepare($insertQuery);

    if ($insertStmt) {
        $insertStmt->bind_param("ssii", $name, $email, $enteredAmount, $showDetails);
        $insertStmt->execute();

        if ($insertStmt->affected_rows > 0) {
            echo "
            <script>
                alert('Money sent successfully!');
                window.location.href='lend-hand.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Error in sending money');
                window.location.href='lend-hand.php';
            </script>";
        }

        $insertStmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
