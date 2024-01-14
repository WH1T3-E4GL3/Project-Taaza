<?php
session_start();
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have proper validation and sanitation in place for the input values
    $userId= $_SESSION['admin_username'];
    $newName = $_POST['editName'];

    // Update query
    $updateQuery = "UPDATE `admin` SET `name`='$newName' WHERE `email`='$userId'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "
        <script>
            alert('Profile updated successfully!');
            window.location.href='../admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Error updating profile: " . $conn->error . "');
            window.location.href='../admin.php';
        </script>";
    }

    $conn->close();
}
?>
