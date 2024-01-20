<?php
session_start();
require_once "includes/connection.php";

function redirectTo($location) {
    echo "<script>window.location.href='$location';</script>";
    exit();
}

// Function to sanitize and validate input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Retrieve the email from the session
    $userEmail = sanitizeInput($_SESSION['username']);

    // Fetch the user's name from the database
    $query = "SELECT * FROM registered_users WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $userData = mysqli_fetch_assoc($result);
            $userName = $userData['name'];
        } else {
            // Handle the case where the email is not found in the database
            echo "<script>alert('Email not registered');</script>";
            redirectTo('login.php');
        }
    } else {
        // Handle database query error
        echo "<script>alert('ERROR processing your request');</script>";
        redirectTo('error.php');
    }
} else {
    // Handle the case where the user is not logged in
    echo "<script>alert('Login to book tables.');</script>";
    redirectTo('new-login.php');
}

// Continue with the rest of your booking script
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and process form data
    $name = sanitizeInput($userName);
    $email = sanitizeInput($userEmail);

    // Check if 'section' is set in $_POST
    if (isset($_POST['section'])) {
        $sectionArray = $_POST['section'];

        // Initialize arrays to store sections and seats
        $sections = [];
        $seats = [];

        // Iterate through sections and seats
        foreach ($sectionArray as $sectionName => $seatsArray) {
            // Check if the seat is set, otherwise set a default value
            $selectedSeat = (isset($seatsArray[0])) ? sanitizeInput($seatsArray[0]) : 'NONE';

            // Concatenate seats for each section
            $seats[] = $selectedSeat;
            $sections[] = sanitizeInput($sectionName);
        }

        // Concatenate sections and seats as comma-separated strings
        $sectionsString = implode(",", $sections);
        $seatsString = implode(",", $seats);

        // Retrieve other form data
        $date = sanitizeInput($_POST['date']);
        $time = isset($_POST['hidden_time']) ? sanitizeInput($_POST['hidden_time']) : '';

        // Check if the table is already booked for the specified date, time, and section
        $checkQuery = "SELECT * FROM table_booking_ground WHERE date=? AND time=? AND section=? AND seat=?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "ssss", $date, $time, $sectionsString, $seatsString);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);

        if ($checkResult->num_rows > 0) {
            $row = mysqli_fetch_assoc($checkResult);
            $paymentStatus = $row['payment'];

            if ($paymentStatus == 0) {
                // Allow booking if the seat is not paid
                $deleteQuery = "DELETE FROM table_booking_ground WHERE date=? AND time=? AND section=? AND seat=?";
                $deleteStmt = mysqli_prepare($conn, $deleteQuery);
                mysqli_stmt_bind_param($deleteStmt, "ssss", $date, $time, $sectionsString, $seatsString);
                mysqli_stmt_execute($deleteStmt);

                // Continue with booking logic...
            } else {
                // Display an alert that the specific seat is already booked and paid
                echo "<script>alert('Seat $selectedSeat in section $sectionName is already booked and paid for the selected date and time. Please choose a different seat.');
                window.location.href = 'table-booking.php';
                </script>";
                exit();
            }
        }

        // Insert data into the table using prepared statements
        $insertQuery = "INSERT INTO table_booking_ground (name, email, section, seat, date, time, payment) VALUES (?, ?, ?, ?, ?, ?, 0)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "ssssss", $name, $email, $sectionsString, $seatsString, $date, $time);

        if (mysqli_stmt_execute($insertStmt)) {
            // Redirect to a success page or handle success
            echo "<script>alert('Table Booked Successfully');
            window.location.href = 'payment-verification.php';
            </script>";
            exit();
        } else {
            // Handle errors
            $errorMessage = mysqli_error($conn);
            echo "<script>alert('ERROR in table Booking: $errorMessage');
            window.location.href = 'payment-verification.php';
            </script>";
            exit();
        }

    } else {
        // Handle the case where 'section' is not set in $_POST
        echo "<script>alert('No section data received');
        window.location.href = 'payment-verification.php';
        </script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
