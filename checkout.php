<?php
session_start();
require_once "includes/connection.php";

if(mysqli_connect_error()) {
    echo "<script>
        alert('UNKNOWN ISSUE: cannot process your request.');
        window.location.href='menu.php';
    </script>";
    exit();
}

if($_SERVER['REQUEST_METHOD']=='POST') {
    if(isset($_POST['checkout'])) {
        // Check if user is logged in
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            // Retrieve user information from registered_users table
            $query = "SELECT * FROM registered_users WHERE email='{$_SESSION['username']}'";
            $result = mysqli_query($conn, $query);

            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Use user data in the INSERT query for orders table
$name = $user_data['name'];
$email = $user_data['email'];
$state = $user_data['state'];
$district = $user_data['district'];
$address = $state . ' ' . $district;

// Loop through the arrays of items, prices, and quantities
$items = $_POST['Item_name'];
$prices = $_POST['price'];
$quantities = $_POST['Quantity'];

for($i = 0; $i < count($items); $i++) {
    $item = $items[$i];
    $price = $prices[$i];
    $quantity = $quantities[$i];
    $total_price = $price * $quantity; // Calculate total price

    $query1 = "INSERT INTO `orders`(`name`, `email`, `address`,`item`, `quantity`, `total_price`) 
               VALUES ('$name','$email','$address','$item','$quantity','$total_price')";

    if(mysqli_query($conn, $query1)) {
        // Order placed successfully
    } else {
        // Error occurred while placing the order
        echo "Error: " . mysqli_error($conn);
    }
}

                echo "<script>
                    alert('Orders placed successfully');
                    window.location.href='menu.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Please login to proceed with checkout.');
                window.location.href='login.php';
            </script>";
        }
    }
}
?>
