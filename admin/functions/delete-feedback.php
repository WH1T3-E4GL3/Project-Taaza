<?php
// Include your database connection file
include_once '../../includes/connection.php';

// Check if feedbackId is provided
if (isset($_POST['feedbackId'])) {
    $feedbackId = $_POST['feedbackId'];

    // Sanitize and validate the input (consider using prepared statements)
    $feedbackId = filter_var($feedbackId, FILTER_SANITIZE_NUMBER_INT);

    // Delete feedback from the database
    $deleteQuery = "DELETE FROM feedback WHERE feedback_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $feedbackId);
        $deleteStmt->execute();

        // Check if the deletion was successful
        if ($deleteStmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Feedback deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Feedback not found or could not be deleted.']);
        }

        $deleteStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: feedbackId not provided.']);
}

// Close the database connection
$conn->close();
?>
