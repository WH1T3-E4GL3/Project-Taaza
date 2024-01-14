<?php
session_start();
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adminId'])) {
    // Assuming you have proper validation and sanitation in place for the input values
    $adminId = $_POST['adminId'];

    // Delete query
    $deleteQuery = "DELETE FROM admin WHERE id = ?";

    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $adminId);

        if ($deleteStmt->execute()) {
            // Deletion successful
            echo "
            <script>
                alert('Admin deleted Successfully!');
                window.location.href='../admin.php';
            </script>";
        } else {
            // Error in deletion
            echo "
            <script>
                alert('Error in deleting admin: " . $conn->error . "');
                window.location.href='../admin.php';
            </script>";
        }

        $deleteStmt->close();
    } else {
        // Error in preparing delete statement
        echo "
        <script>
            alert('Error in preparing delete statement: " . $conn->error . "');
            window.location.href='../admin.php';
        </script>";
    }

    $conn->close();
} else {
    // Invalid request
    echo "
        <script>
            alert('UNKNOWN ISSUE: Invalid request!');
            window.location.href='../admin.php';
        </script>";
}
?>
