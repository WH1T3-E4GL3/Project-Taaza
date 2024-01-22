<?php
// Include your database connection file
include_once '../../includes/connection.php';

// Include PHPMailer files
require_once '../../PHPMailer/PHPMailer.php';
require_once '../../PHPMailer/SMTP.php';
require_once '../../PHPMailer/Exception.php';

// Function to send email
function sendOrderDeletedEmail($userEmail)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'YourEmail@gmail.com';
        $mail->Password   = 'YourAppPassword';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Sender information
        $mail->setFrom('YourEmail@gmail.com', 'Taaza Restaurant');

        // Recipient
        $mail->addAddress($userEmail);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Order Deletion Notification - Taaza';
        $mail->Body    = "Dear Customer,<br><br>Your order has been deleted due to an emergency condition. Your money will be refunded shortly.<br><br>Thank you for understanding.<br><br>Best Regards,<br>Taaza Restaurant";

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

// Check if orderId is provided
if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];

    // Sanitize and validate the input (consider using prepared statements)
    $orderId = filter_var($orderId, FILTER_SANITIZE_NUMBER_INT);

    // Retrieve user email before deleting the order
    $getUserEmailQuery = "SELECT email FROM orders WHERE order_id = ?";
    $getUserEmailStmt = $conn->prepare($getUserEmailQuery);

    if ($getUserEmailStmt) {
        $getUserEmailStmt->bind_param("i", $orderId);
        $getUserEmailStmt->execute();
        $getUserEmailStmt->bind_result($userEmail);
        $getUserEmailStmt->fetch();
        $getUserEmailStmt->close();

        // Delete order from the database
        $deleteQuery = "DELETE FROM orders WHERE order_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);

        if ($deleteStmt) {
            $deleteStmt->bind_param("i", $orderId);
            $deleteStmt->execute();

            // Check if the deletion was successful
            if ($deleteStmt->affected_rows > 0) {
                // Send email notification to the user
                if (sendOrderDeletedEmail($userEmail)) {
                    echo json_encode(['success' => true, 'message' => 'Order deleted successfully. User notified.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Order deleted successfully. Error sending email notification.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: Order not found or could not be deleted.']);
            }

            $deleteStmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing statement to retrieve user email: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: orderId not provided.']);
}

// Close the database connection
$conn->close();
?>
