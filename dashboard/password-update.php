<?php
session_start();

require_once "../includes/connection.php";

if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmNewPassword']))
{
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    // Perform any necessary validation here

    // Check if the new password and confirm password match
    if ($newPassword !== $confirmNewPassword) {
        echo "<script>alert('New password and confirm password do not match.'); window.location.href='../dashboard.php';</script>";
        exit;
    }

    $userId = $_SESSION['username'];
    $selectUserQuery = "SELECT * FROM registered_users WHERE email = ?";
    $selectUserStmt = $conn->prepare($selectUserQuery);

    if ($selectUserStmt) {
        $selectUserStmt->bind_param("s", $userId);
        $selectUserStmt->execute();
        $result = $selectUserStmt->get_result();
        $userDetails = $result->fetch_assoc();
        $selectUserStmt->close();

        // Verify the old password
        if (password_verify($oldPassword, $userDetails['password'])) {
            // Hash the new password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Update the password in the database
            $updateQuery = "UPDATE registered_users SET password = ? WHERE email = ?";
            $updateStmt = $conn->prepare($updateQuery);

            if ($updateStmt) {
                $updateStmt->bind_param("ss", $hashedNewPassword, $userId);
                $updateStmt->execute();
                $updateStmt->close();

                echo "<script>alert('Password updated successfully.'); window.location.href='../dashboard.php';</script>";
            } else {
                die("Error preparing update statement: " . $conn->error);
            }
        } else {
            echo "<script>alert('Incorrect old password.'); window.location.href='../dashboard.php';</script>";
        }
    } else {
        // Handle the error
        die("Error preparing statement: " . $conn->error);
    }
}
?>
