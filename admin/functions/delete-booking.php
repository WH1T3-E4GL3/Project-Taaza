<?php
session_start();
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBooking'])) {
    // Assuming you have proper validation and sanitation in place for the input values
    $adminId = $_POST['deleteBooking'];

    // Delete query
    $deleteQuery = "DELETE FROM table_booking_ground WHERE id = ?";

    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $adminId);

        if ($deleteStmt->execute()) {
            // Deletion successful
            echo "
            <script>
                alert('Table booking deleted Successfully!');
                window.location.href='../admin.php';
            </script>";
        } else {
            // Error in deletion
            echo "
            <script>
                alert('Error in deleting: " . $conn->error . "');
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
