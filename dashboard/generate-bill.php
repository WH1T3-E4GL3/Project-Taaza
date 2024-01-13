<?php
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

// Check if order details are provided
if (isset($_GET['order'])) {
    $order = json_decode($_GET['order'], true);

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
    $pdf->Cell(0, 10, 'Food Order Bill', 1, 1, 'C');

    // Line break
    $pdf->Ln(10);

    // Set font for table
    $pdf->SetFont('Arial', '', 12);

    // Add order details to the PDF
    $pdf->Cell(0, 10, 'Order ID: ' . $order['order_id'], 1, 1);
    $pdf->Cell(0, 10, 'Name: ' . $order['name'], 1, 1);
    $pdf->Cell(0, 10, 'Email: ' . $order['email'], 1, 1);
    $pdf->Cell(0, 10, 'Address: ' . $order['address'], 1, 1);
    $pdf->Cell(0, 10, 'Item: ' . $order['item'], 1, 1);
    $pdf->Cell(0, 10, 'Quantity: ' . $order['quantity'], 1, 1);
    $pdf->Cell(0, 10, 'Total Price: RS ' . $order['total_price'], 1, 1);

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
    $pdf->Output('Order_Bill_' . $order['order_id'] . '.pdf', 'D');
} else {
    // Handle the case where order details are not provided
    echo "Error: Order details are missing.";
}
?>


