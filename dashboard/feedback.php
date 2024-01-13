<?php
session_start();
require_once "../includes/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("Location: ../new-login.php"); // Redirect to the login page if not logged in
        exit;
    }

    // Get user email from the session
    $userEmail = $_SESSION['username'];

    // Get feedback text from the form
    $feedbackText = $_POST['feedbackText'];

    // Insert feedback into the database
    $insertFeedbackQuery = "INSERT INTO feedback (user_email, feedback_text) VALUES (?, ?)";
    $insertFeedbackStmt = $conn->prepare($insertFeedbackQuery);

    if ($insertFeedbackStmt) {
        $insertFeedbackStmt->bind_param("ss", $userEmail, $feedbackText);
        $insertFeedbackStmt->execute();
        $insertFeedbackStmt->close();

        // Redirect to a success page or display a success message
        echo "
        <script>
            alert('Feedback submitted successfully!');
            window.location.href='../dashboard.php';
        </script>";
        exit;
    } else {
        // Handle the error
        die("Error preparing statement: " . $conn->error);
    }
}
?>
