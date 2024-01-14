<?php
// Include your database connection file
include_once '../../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'], $_POST['section'])) {
    // Assuming you have proper validation and sanitation in place for the input values
    $bookingId = $_POST['bookingId'];
    $section = $_POST['section'];

    // Sanitize and validate the input (consider using prepared statements)
    $bookingId = filter_var($bookingId, FILTER_SANITIZE_NUMBER_INT);
    $section = filter_var($section, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

    // Delete booking from the appropriate table based on the section
    $deleteQuery = "";

    switch ($section) {
        case 'ground':
            $deleteQuery = "DELETE FROM table_booking_ground WHERE id = ?";
            break;
        case 'vip':
            $deleteQuery = "DELETE FROM table_booking_vip WHERE id = ?";
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid section.']);
            exit();
    }

    $deleteStmt = $conn->prepare($deleteQuery);

    if ($deleteStmt) {
        $deleteStmt->bind_param("i", $bookingId);
        $deleteStmt->execute();

        // Check if the deletion was successful
        if ($deleteStmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Booking deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Booking not found or could not be deleted.']);
        }

        $deleteStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: bookingId or section not provided.']);
}

// Close the database connection
$conn->close();
?>
