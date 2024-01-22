<?php
// Include your database connection file
include_once '../../includes/connection.php';

// Include PHPMailer files
require_once '../../PHPMailer/PHPMailer.php';
require_once '../../PHPMailer/SMTP.php';
require_once '../../PHPMailer/Exception.php';

// Function to send email
function sendFeedbackDeletedEmail($userEmail, $userName)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'YourEmail@gmail.com';
        $mail->Password   = 'YpurAppPassword';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Sender information
        $mail->setFrom('YourEmail@gmail.com', 'Taaza Restaurant');

        // Recipient
        $mail->addAddress($userEmail);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Feedback Deletion Notification - Taaza';
        $mail->Body    = "Dear $userName,<br><br>Thanks for your feedback. We have read your feedback, and we appreciate your dedication. We will take care of your feedback.<br><br>Continue your bond with Taaza Restaurant.<br><br>Best Regards,<br>Taaza Restaurant";

        // Disable SSL certificate verification
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true
            )
        );

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if feedbackId is provided
if (isset($_POST['feedbackId'])) {
    $feedbackId = $_POST['feedbackId'];

    // Sanitize and validate the input (consider using prepared statements)
    $feedbackId = filter_var($feedbackId, FILTER_SANITIZE_NUMBER_INT);

    // Retrieve user email and name before deleting the feedback
    $getUserInfoQuery = "SELECT user_email FROM feedback WHERE feedback_id = ?";
    $getUserInfoStmt = $conn->prepare($getUserInfoQuery);

    if ($getUserInfoStmt) {
        $getUserInfoStmt->bind_param("i", $feedbackId);
        $getUserInfoStmt->execute();
        $getUserInfoStmt->bind_result($userEmail);
        $getUserInfoStmt->fetch();
        $getUserInfoStmt->close();

        // Extract user name from email
        $userName = explode('@', $userEmail)[0];

        // Delete feedback from the database
        $deleteQuery = "DELETE FROM feedback WHERE feedback_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);

        if ($deleteStmt) {
            $deleteStmt->bind_param("i", $feedbackId);
            $deleteStmt->execute();

            // Check if the deletion was successful
            if ($deleteStmt->affected_rows > 0) {
                // Send email notification to the user
                if (sendFeedbackDeletedEmail($userEmail, $userName)) {
                    echo json_encode(['success' => true, 'message' => 'Feedback deleted successfully. User notified.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Feedback deleted successfully. Error sending email notification.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: Feedback not found or could not be deleted.']);
            }

            $deleteStmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement to retrieve user info: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: feedbackId not provided.']);
}

// Close the database connection
$conn->close();
?>
