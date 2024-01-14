<?php
session_start();
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have proper validation and sanitation in place for the input values
    $userEmail = $_POST['userEmail'];

    // Delete query
    $deleteQuery = "DELETE FROM registered_users WHERE email = ?";
    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt) {
        $deleteStmt->bind_param("s", $userEmail);

        if ($deleteStmt->execute()) {
            // Deletion successful
            echo json_encode(['success' => true, 'message' => 'User deleted successfully.']);
        } else {
            // Error in deletion
            echo json_encode(['success' => false, 'message' => 'Error in deleting user: ' . $deleteStmt->error]);
        }

        $deleteStmt->close();
    } else {
        // Error in preparing delete statement
        echo json_encode(['success' => false, 'message' => 'Error preparing delete statement: ' . $conn->error]);
    }

    $conn->close();
} else {
    // Invalid request
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
