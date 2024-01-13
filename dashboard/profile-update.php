<?php
session_start();
include_once '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have proper validation and sanitation in place for the input values
    $newName = $_POST['editName'];
    $newGender = $_POST['editGender'];
    $newState = $_POST['editState'];
    $newDistrict = $_POST['editDistrict'];
    $userId = $_SESSION['username'];

    // Update query
    $updateQuery = "UPDATE `registered_users` 
                    SET `name`='$newName', `gender`='$newGender', 
                    `state`='$newState', `district`='$newDistrict' 
                    WHERE `email`='$userId'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "
        <script>
            alert('Profile updated successfully!');
            window.location.href='../dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Error updating profile: " . $conn->error . "');
            window.location.href='../dashboard.php';
        </script>";
    }

    $conn->close();
}
?>
