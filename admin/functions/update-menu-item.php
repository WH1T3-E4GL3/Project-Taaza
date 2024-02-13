<?php
session_start();
require_once "../../includes/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $new_name = $_POST['new_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $available = $_POST['available'];
    $image_path = $_POST['image_path'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE menu_items SET name=?, description=?, category=?, price=?, quantity=?, available=?, image_path=? WHERE name=?");
    $stmt->bind_param("sssdiiss", $new_name, $description, $category, $price, $quantity, $available, $image_path, $name);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the admin panel with success message
        echo '<script>alert("Menu item Updated successfully.");</script>';
        header("location: ../admin.php");
        exit();
    } else {
        // Redirect back to the admin panel with error message
        echo '<script>alert("Error in Updating.");</script>';
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
