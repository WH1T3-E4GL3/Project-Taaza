<?php
session_start();
require('../fpdf/fpdf.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        // Add your header logic here, if needed
    }

    // Page footer
    function Footer() {
        // Add your footer logic here, if needed
    }
}

$conn = new mysqli("localhost", "root", "", "taaza_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['username'];

$checkVipQuery = "SELECT is_vip FROM registered_users WHERE email = ?";
$checkVipStmt = $conn->prepare($checkVipQuery);

// set default value to false
$isVip = false;

if ($checkVipStmt) {
    $checkVipStmt->bind_param("s", $userId);
    $checkVipStmt->execute();
    $checkVipStmt->bind_result($isVip);
    $checkVipStmt->fetch();
    $checkVipStmt->close();

    // Check if the user is already a VIP
    if ($isVip == 1) {
        // If the user is already a VIP, set $isVip to true
        $isVip = true;
    }
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Fetch user's table bookings
$bookingQuery = "SELECT * FROM table_booking_ground WHERE email = ? ORDER BY date DESC";
$bookingStmt = $conn->prepare($bookingQuery);

if ($bookingStmt) {
    $bookingStmt->bind_param("s", $userId);
    $bookingStmt->execute();
    $bookingResult = $bookingStmt->get_result();

    if ($bookingResult) {
        // Loop through each booking
        while ($bookingData = $bookingResult->fetch_assoc()) {
            // Check if the payment is done
            if ($bookingData['payment'] == 1) {
                // Calculate discount percentage for VIP
                $discountPercentage = $isVip ? 30 : 0;

                // Calculate discounted amount
                $discountAmount = 50 * $discountPercentage / 100;

                // Calculate discounted price
                $discountedPrice = 50 - $discountAmount;

                // Create a new PDF instance
                $pdf = new PDF();

                // Add a page to the PDF
                $pdf->AddPage();

                // Set font for title
                $pdf->SetFont('Arial', 'B', 20);

                // Set text color to green
                $pdf->SetTextColor(0, 128, 0);

                // Title
                $pdf->Cell(0, 10, 'TAAZA RESTAURANT', 1, 1, 'C');

                // Reset text color to black
                $pdf->SetTextColor(0);

                // Set font for subtitle
                $pdf->SetFont('Arial', 'I', 14);

                // Subtitle
                $pdf->Cell(0, 10, 'Table booking Bill', 1, 1, 'C');

                // Line break
                $pdf->Ln(10);

                // Set font for table
                $pdf->SetFont('Arial', '', 12);

                // Add order details to the PDF
                $pdf->Cell(0, 10, 'Order ID: ' . $bookingData['id'], 1, 1);
                $pdf->Cell(0, 10, 'Name: ' . $bookingData['name'], 1, 1);
                $pdf->Cell(0, 10, 'Email: ' . $bookingData['email'], 1, 1);
                $pdf->Cell(0, 10, 'Sections [In order]: ' . $bookingData['section'], 1, 1);
                $pdf->Cell(0, 10, 'Seats [In order]: ' . $bookingData['seat'], 1, 1);
                $pdf->Cell(0, 10, 'Date & Time: ' . $bookingData['date'] . ' | ' . $bookingData['time'], 1, 1);

                // Display the actual price
                $pdf->Cell(0, 10, 'Actual Price: RS ' . number_format(50, 2), 1, 1);

                // Display the discount percentage
                $pdf->Cell(0, 10, 'VIP Discount (' . $discountPercentage . '%): RS ' . number_format($discountAmount, 2), 1, 1);

                // Display the discounted price
                $pdf->Cell(0, 10, 'Discounted Price: RS ' . number_format($discountedPrice, 2), 1, 1);

                // Add a line break before the date and time
                $pdf->Ln(10);

                $pdf->Cell(0, 10, 'Taaza Email: taaza0restaurant@gmail.com', 1, 1, 'C');
                $pdf->Cell(0, 10, 'Taaza Phone: +91 7558 95 1351', 1, 1, 'C');
                // Add current date and time
                $pdf->Cell(0, 10, 'Printed on: ' . date('Y-m-d H:i:s'), 0, 1, 'C');

                // Set font for restaurant address
                $pdf->SetFont('Arial', '', 9);

                // Add restaurant address
                $pdf->Cell(0, 10, 'Taaza restaurant, Stadium Link Rd, Kathrikadavu, Kaloor, Kochi, Ernakulam, Kerala 682017', 0, 1, 'C');

                // Output the PDF (you can choose to save or display)
                if (isset($bookingData['id'])) {
                    $pdf->Output('Order_Bill_' . $bookingData['id'] . '.pdf', 'D');
                } else {
                    echo 'Error: Booking data not available.';
                }
            }
        }
    } else {
        // Handle booking query error
        echo "Error in processing your request.";
    }
} else {
    // Handle the case where the email is not found in the database
    echo "Email not registered";
}

// Close the database connection
$conn->close();
?>
