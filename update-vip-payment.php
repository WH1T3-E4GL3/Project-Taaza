<?php
// update-payment.php

require_once "includes/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    // Handle the AJAX request to update payment status
    $id = $_POST['id'];

    // Update the payment status to 1 for the specific ID
    $updateQuery = "UPDATE table_booking_vip SET payment = 1 WHERE id = '$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Payment status updated successfully
        echo "Payment status updated successfully";
    } else {
        // Failed to update payment status
        echo "Failed to update payment status";
    }

    exit; // Stop further execution after handling the AJAX request
}

// Invalid request method or missing 'id' parameter
echo "Invalid request";
?>
