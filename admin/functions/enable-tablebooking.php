<?php
session_start();
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have proper validation and sanitation in place for the input values

    // Update query
    $updateQuery = "UPDATE `admin` SET `enable_table_booking`=1";

    if ($conn->query($updateQuery) === TRUE) {
        echo "
        <script>
            alert('contact page enabled successfully!');
            window.location.href='../admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Error in enabling: " . $conn->error . "');
            window.location.href='../admin.php';
        </script>";
    }

    $conn->close();
}
?>
