<?php
session_start();
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have proper validation and sanitation in place for the input values;
    $newEmail=$_POST['newAdminEmail'];
    $newName = $_POST['newAdminName'];
    $newPassword = password_hash($_POST['newAdminPassword'], PASSWORD_BCRYPT);
    
    // Update query
    $updateQuery = "INSERT INTO `admin`(`email`, `name`, `password`) VALUES ('$newEmail','$newName','$newPassword')";

    if ($conn->query($updateQuery) === TRUE) {
        echo "
        <script>
            alert('Admin Added Successfully!');
            window.location.href='../admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Error in Adding new admin: " . $conn->error . "');
            window.location.href='../admin.php';
        </script>";
    }

    $conn->close();
}
?>
