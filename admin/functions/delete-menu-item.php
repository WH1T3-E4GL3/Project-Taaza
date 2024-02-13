<?php
session_start();
require_once "../../includes/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the item name to delete
    $name = $_POST['name'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("DELETE FROM menu_items WHERE name = ?");
    $stmt->bind_param("s", $name);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the admin panel with success message
        echo '<script>alert("Menu item deleted successfully.");</script>';
        header("location: ../admin.php");
        exit();
    } else {
        // Redirect back to the admin panel with error message
        echo '<script>alert("Error deleting item.");</script>';
        header("location: ../admin.php");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the admin panel if accessed directly
    header("location: ../admin.php");
    exit();
}
?>
