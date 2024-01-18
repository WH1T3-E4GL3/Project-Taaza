<?php
session_start();

require_once "includes/connection.php";

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Retrieve the email from the session
    $userEmail = $_SESSION['username'];

    // Fetch the user's name from the database
    $query = "SELECT * FROM registered_users WHERE email='$userEmail'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $userData = mysqli_fetch_assoc($result);
            $userName = $userData['name'];

            // Now $userName contains the user's name
        } else {
            // Handle the case where the email is not found in the database
            echo "<script>alert('Email not registered');</script>";
            echo "<script>window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // Handle database query error
        echo "<script>alert('ERROR processing your request');</script>";
        exit();
    }
} else {
    // Handle the case where the user is not logged in
    echo "<script>alert('Login to book tables.');</script>";
    echo "<script>window.location.href='new-login.php';</script>";
    exit();
}

// Continue with the rest of your booking script
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and process form data
    $name = $userName; // Use the fetched name
    $email = $userEmail;

    // Check if 'section' is set in $_POST
    if (isset($_POST['section'])) {
        $sectionArray = $_POST['section'];

        // Initialize arrays to store sections and seats
        $sections = [];
        $seats = [];

        // Iterate through sections and seats
        foreach ($sectionArray as $sectionName => $seatsArray) {
            // Check if the seat is set, otherwise set a default value
            $selectedSeat = (isset($seatsArray[0])) ? $seatsArray[0] : 'NONE';

            // Concatenate seats for each section
            $seats[] = $selectedSeat;
            $sections[] = $sectionName;
        }

        // Concatenate sections and seats as comma-separated strings
        $sectionsString = implode(",", $sections);
        $seatsString = implode(",", $seats);

        // Retrieve other form data
        $date = $_POST['date'];
        $time = $_POST['time'];
        $time = strtolower($time);
        $payment = 0;

        // Check if the table is already booked for the specified date and time
        $checkQuery = "SELECT * FROM table_booking_ground WHERE date='$date' AND time='$time'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            // Display an alert that the table is already booked for the selected date and time
            echo "<script>alert('Table already booked for the selected date and time. Please choose a different date or time.');
            window.location.href = 'table-booking.php';
            </script>";
            exit();
        }

        // Insert data into the table as a single query
        $sql = "INSERT INTO table_booking_ground (name, email, section, seat, date, time, payment) 
                VALUES ('$name', '$email', '$sectionsString', '$seatsString', '$date', '$time', $payment)";

        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page or handle success
            echo "<script>alert('Table Booked Successfully');
            window.location.href = 'payment-verification.php';
            </script>";

            exit();
        } else {
            // Handle errors
            echo "<script>alert('ERROR in table Booking');</script>";
        }
    } else {
        // Handle the case where 'section' is not set in $_POST
        echo "<script>alert('No section data received');</script>";
    }
}

$conn->close();
?>
