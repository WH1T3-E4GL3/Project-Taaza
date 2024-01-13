<?php
session_start();
include_once 'includes/connection.php';
require('fpdf/fpdf.php'); 

function generateBillPDF($order) {
    // Create a new PDF instance
    $pdf = new PDF();

    // Add a page to the PDF
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('Arial', '', 12);

    // Add order details to the PDF
    $pdf->Cell(0, 10, 'Order ID: ' . $order['order_id'], 0, 1);
    $pdf->Cell(0, 10, 'Name: ' . $order['name'], 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $order['email'], 0, 1);
    $pdf->Cell(0, 10, 'Address: ' . $order['address'], 0, 1);
    $pdf->Cell(0, 10, 'Item: ' . $order['item'], 0, 1);
    $pdf->Cell(0, 10, 'Quantity: ' . $order['quantity'], 0, 1);
    $pdf->Cell(0, 10, 'Total Price: ₹' . $order['total_price'], 0, 1);

    // Output the PDF (you can choose to save or display)
    $pdf->Output('Order_Bill_' . $order['order_id'] . '.pdf', 'D');
}


$orderDetails = array(
    'order_id' => '123',
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'address' => '123 Main St',
    'item' => 'Product XYZ',
    'quantity' => 2,
    'total_price' => 50.00
);
?>

<style>
  .button {
    background-image: linear-gradient(to right, #0d5215, green);
    color: white;
    width: 100%;
    font-size: var(--fs-7);
    text-transform: uppercase;
    padding: 20px 30px;
    text-align: center;
    border-radius: 7px;
  }

  .form-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .profile-container {
    display: flex;
    width: 100%;
    padding: 20px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    margin-top: 10em;
  }

  .left-section {
    padding: 20px;
  }
  .right-section {
    padding: 20px;
    border-left: 2px solid #ccc; /* Add this line to create a vertical line */
}
  h2 {
    color: #0a5e10;
  }
  .form-field:disabled {
    background-color: #e9e9ed; /* Set the desired gray background color */
    color: #666; /* Set a color that provides sufficient contrast */
}
.order-container {
        display: flex;
        flex-wrap: wrap;
        gap: 17px;
    }

    .order-item {
        background-color: #f4f4f4;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px; /* Adjust the width as needed */
    }

    .order-info {
        margin: 10px 0;
    }

    .label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
  color: #787878;
    }

</style>

<?php
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header("Location: new-login.php"); // Redirect to the login page if not logged in
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
} else {
  // Handle the error
  die("Error preparing statement: " . $conn->error);
}
?>

<?php require "includes/header.php"; ?>

<section class="profile-container" id="home">
  <!-- Left section starts here -->
  <div class="left-section">
    <h2>Welcome to Your Profile, <?php echo $userDetails['name']; ?>!</h2>
    <br>
    <div>
        <form action="dashboard/profile-update.php" method="POST">
            <label class="label" for="editEmail">Email:</label>
            <input class="form-field" type="email" id="editEmail" name="editEmail" value="<?php echo $userDetails['email']; ?>" required disabled>
            <br>
            <label class="label" for="editName">Name:</label>
            <input class="form-field" type="text" id="editName" name="editName" value="<?php echo $userDetails['name']; ?>" required>
            <br>
            <label class="label" for="editGender">Gender:</label>
            <input class="form-field" type="text" id="editGender" name="editGender" value="<?php echo $userDetails['gender']; ?>" required>
            <br>
            <label class="label" for="editState">State:</label>
            <input class="form-field" type="text" id="editState" name="editState" value="<?php echo $userDetails['state']; ?>" required>
            <br>
            <label class="label" for="editDistrict">District:</label>
            <input class="form-field" type="text" id="editDistrict" name="editDistrict" value="<?php echo $userDetails['district']; ?>" required>
            <br>
            <label class="label" for="vipStatus">VIP Status:</label>
            <input class="form-field" type="text" id="vipStatus" name="vipStatus" 
                   value="<?php echo ($userDetails['is_vip'] == 1) ? 'You are VIP' : 'Not VIP'; ?>" 
                   style="color: <?php echo ($userDetails['is_vip'] == 1) ? 'green' : '#bf9900'; ?>" 
                   disabled>
            <br>

            <button class="button" type="submit">Update Profile</button>
        </form>
        <br><br><hr><br><br>

        <!-- Password Reset Form -->
        <h2>Update your password</h2>
        <br>
<form action="dashboard/password-update.php" method="POST" id="passwordResetForm">
    <label class="label" for="oldPassword">Old Password:</label>
    <input class="form-field" type="password" id="oldPassword" name="oldPassword" required>
    <br>

    <label class="label" for="newPassword">New Password:</label>
    <input class="form-field" type="password" id="newPassword" name="newPassword" required>
    <br>

    <label class="label" for="confirmNewPassword">Confirm New Password:</label>
    <input class="form-field" type="password" id="confirmNewPassword" name="confirmNewPassword" required>
    <br>

    <button class="button" type="submit" name="reset">Reset Password</button>
</form>

    </div>
</div>


<!-- Right section starts here -->
<div class="right-section">
    <h2>You are logged in as <?php echo $userDetails['email']; ?></h2>
    <br>
    <!-- Display user orders -->
    <h2>Your Orders History</h2>

    <div class="order-container">
        <?php
        // Fetch and display user orders
        $selectOrdersQuery = "SELECT * FROM `orders` WHERE email = ?";
        $selectOrdersStmt = $conn->prepare($selectOrdersQuery);

        if ($selectOrdersStmt) {
            $selectOrdersStmt->bind_param("s", $userId);
            $selectOrdersStmt->execute();
            $ordersResult = $selectOrdersStmt->get_result();

            if ($ordersResult->num_rows > 0) {
                while ($order = $ordersResult->fetch_assoc()) {
                    echo "<div class='order-item'>";
                    echo "<p class='order-id'><strong>Order ID:</strong> " . $order['order_id'] . "</p>";
                    echo "<p class='order-info'><strong>Name:</strong> " . $order['name'] . "</p>";
                    echo "<p class='order-info'><strong>Email:</strong> " . $order['email'] . "</p>";
                    echo "<p class='order-info'><strong>Address:</strong> " . $order['address'] . "</p>";
                    echo "<p class='order-info'><strong>Item:</strong> " . $order['item'] . "</p>";
                    echo "<p class='order-info'><strong>Quantity:</strong> " . $order['quantity'] . "</p>";
                    echo "<p class='order-info'><strong>Total Price:</strong> ₹" . $order['total_price'] . "</p>";

                    echo "<a href='#' class='print-bill' onclick='generateBillPDF(" . json_encode($order) . "); return false;'>Print Bill</a>";
                    echo "</div><br>";

                }
            } else {
                echo "<p>No orders found.</p>";
            }

            $selectOrdersStmt->close();
        } else {
            // Handle the error
            die("Error preparing statement: " . $conn->error);
        }
        ?>
    </div>
    <hr>

 <div class="feedback-container">
    <h2>Feedback</h2>
    <form action="dashboard/feedback.php" method="POST">
        <textarea class="form-field" id="feedbackText" name="feedbackText" rows="4" required placeholder="Type your feedback here and submit"></textarea>
        <br>

        <button class="button" type="submit">Submit Feedback</button>
    </form>
</div>


</div>


</section>
<br>

<?php require "includes/footer.php"; ?>

<script>
    function generateBillPDF(order) {
        // You can customize the URL or adjust the logic based on your needs
        window.location.href = 'dashboard/generate-bill.php?order=' + JSON.stringify(order);
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const newPasswordInput = document.getElementById("newPassword");
        const confirmNewPasswordInput = document.getElementById("confirmNewPassword");
        const passwordResetForm = document.getElementById("passwordResetForm");
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        passwordResetForm.addEventListener("submit", function(event) {
            const newPassword = newPasswordInput.value;
            const confirmNewPassword = confirmNewPasswordInput.value;

            if (!passwordPattern.test(newPassword)) {
                alert("Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one number, and one special character.");
                event.preventDefault();
            } else if (newPassword !== confirmNewPassword) {
                alert("Passwords do not match.");
                event.preventDefault();
            }
        });
    });

</script>
