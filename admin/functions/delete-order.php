<?php
// Include your database connection file
include_once '../../includes/connection.php';

// Check if orderId is provided
if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];

    // Sanitize and validate the input (consider using prepared statements)
    $orderId = filter_var($orderId, FILTER_SANITIZE_NUMBER_INT);

    // Delete order from the database
    $deleteQuery = "DELETE FROM orders WHERE order_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $orderId);
        $deleteStmt->execute();

        // Check if the deletion was successful
        if ($deleteStmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Order deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Order not found or could not be deleted.']);
        }

        $deleteStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: orderId not provided.']);
}

// Close the database connection
$conn->close();
?>
