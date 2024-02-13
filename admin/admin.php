<?php
session_start();

// Check if admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // If not edirect to admin-login.php
    echo"
        <script>
        alert('Login as admin first to access admin page !');
        window.location.href='admin-login.php';
        </script>
        ";
    exit(); // Ensure script stops here
}

include_once '../includes/connection.php';
define("APPURL", "http://localhost/taaza");
?>

<?php
$userId = $_SESSION['admin_username'];
$selectUserQuery = "SELECT * FROM admin WHERE email = ?";
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


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha512-xA6Hp6oezhjd6LiLZynuukm80f8BoZ3OpcEYaqKoCV3HKQDrYjDE1Gu8ocxgxoXmwmSzM4iqPvCsOkQNiu41GA==" crossorigin="anonymous" />
    
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
    <title>Admin pannel - Taaza</title>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
                <div aria-label="breadcrumb mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center align-items-center">
                            <img src="../assets/images/logo.png" alt="logo" width="130">
                            <li class="breadcrumb-item"><a href="../index.php">Taaza</a></li>
                            <li class="breadcrumb-item"><a href="admin-login.php">Admin pannel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                           <li style="margin-left: auto;" class="btn btn-outline-primary"><a href="admin-logout.php" class="text-decoration-none">Logout</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 d-md-block">
                        <div class="card bg-common card-left">
                            <div class="card-body">
                                <nav class="nav d-md-block d-none">
                                    <a data-toggle='tab' class="nav-link" href="#profile"><i class="fas fa-user-cog"></i> &nbsp;Profile Settings</a>
                                    <a data-toggle='tab' class="nav-link" href="#account"><i class="fas fa-shopping-cart"></i> &nbsp;User Orders</a>
                                    <a data-toggle='tab' class="nav-link" href="#security"><i class="fas fa-comment-alt"></i> &nbsp;User Feedbacks</a>
                                    <a data-toggle='tab' class="nav-link" href="#notification"><i class="fas fa-users"></i> &nbsp;Registered Users</a>
                                    <a data-toggle='tab' class="nav-link" href="#billings"><i class="fas fa-clipboard-check"></i> &nbsp;Table Bookings</a>                                   
                                    <a data-toggle='tab' class="nav-link" href="#tocontact"><i class="fas fa-envelope"></i> &nbsp;To Contact</a>
                                    <a data-toggle='tab' class="nav-link" href="#tableupdates"><i class="fas fa-wrench"></i> &nbsp;Table booking page update</a>
                                    <a data-toggle='tab' class="nav-link" href="#menuupdates"><i class="fas fa-wrench"></i> &nbsp;Menu page update</a>
                                    <a data-toggle='tab' class="nav-link" href="#displaymessage"><i class="fas fa-user-edit"></i> &nbsp;Display message on website</a>
                            </nav>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="card d-md-none">
                            <div class="card-header border-bottom  mb-3">
                                <ul class="nav nav-tabs card-header-tabs nav-fill">
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link active" href="#profile"><i class="fas fa-user"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#account"><i class="fas fa-user-cog"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#security"><i class="fas fa-user-shield"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#notification"><i class="fas fa-bell"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#billings"><i class="fas fa-money-check-alt"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#tocontact"><i class="fas fa-money-check-alt"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#tableupdates"><i class="fas fa-money-check-alt"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#menuupdates"><i class="fas fa-money-check-alt"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle='tab' class="nav-link" href="#displaymessage"><i class="fas fa-money-check-alt"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class=" card card-body tab-content border-12">
                            <div class="tab-pane active" id="profile">
                                <h5>YOUR PROFILE INFORMATION</h5>
                                <hr>
                                <form id="adminForm" action="functions/update-admin.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Id</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $userDetails['id']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $userDetails['email']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input name="editName" type="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $userDetails['name']; ?>">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-outline-info" name="action" value="update">
                                        Update profile
                                    </button>
                                </form>

                                <!-- Add new admin form -->
                                <div class="mt-4">
                                    <h5>Add New Admin</h5>
                                    <hr>
                                    <form action="functions/add-admin.php" method="POST">
                                        <div class="form-group">
                                            <label for="newAdminEmail">Email</label>
                                            <input type="email" class="form-control" id="newAdminEmail" name="newAdminEmail" aria-describedby="emailHelp" placeholder="Enter new admin's email">
                                        </div>
                                        <div class="form-group">
                                            <label for="newAdminName">Name</label>
                                            <input type="text" class="form-control" id="newAdminName" name="newAdminName" placeholder="Enter new admin's name">
                                        </div>
                                        <div class="form-group">
                                            <label for="newAdminPassword">Password</label>
                                            <input type="password" class="form-control" id="newAdminPassword" name="newAdminPassword" placeholder="Enter new admin's password">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-outline-info" type="button">
                                            Add Admin
                                        </button>
                                    </form>
                                </div>

                                <!-- List of admins -->
                                <div class="mt-4">
                                    <h5>List of Admins</h5>
                                    <hr>
                                    <ul class="list-group">
                                        <?php
                                        // Fetch all admins from the database
                                        $selectAdminsQuery = "SELECT * FROM admin";
                                        $result = $conn->query($selectAdminsQuery);

                                        if ($result && $result->num_rows > 0) {
                                            while ($admin = $result->fetch_assoc()) {
                                                echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                        ID: ' . $admin['id'] . ' | Email: ' . $admin['email'] . ' | Name: ' . $admin['name'] . '
                                                        <form action="functions/delete-admin.php" method="post" style="margin-bottom: 0;">
                                                            <input type="hidden" name="adminId" value="' . $admin['id'] . '">
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this admin?\')">Delete</button>
                                                        </form>
                                                    </li>';
                                            }
                                        } else {
                                            echo '<li class="list-group-item">No admins found</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                
                            </div>
                            <div class="tab-pane " id="account">
                                <?php
                                // Assuming you have a database connection established

                                // Fetch orders from the database
                                $ordersQuery = "SELECT `order_id`, `name`, `email`, `address`, `item`, `quantity`, `total_price`, `timestamp` FROM `orders` WHERE 1";
                                $ordersResult = mysqli_query($conn, $ordersQuery);

                                if ($ordersResult) {
                                    // Check if there are orders
                                    $totalOrders = mysqli_num_rows($ordersResult);
                                    if ($totalOrders > 0) {
                                        echo '<div class="tab-pane" id="orders">
                                                <h5>USER ORDERS</h5>';

                                        // Display the total number of orders
                                        echo '<p>Total Orders: ' . $totalOrders . '</p>';

                                        echo '<hr>
                                                <form>
                                                    <div class="form-group">
                                                        <ul class="list-group">';

                                        // Iterate through orders and display them
                                        while ($orderRow = mysqli_fetch_assoc($ordersResult)) {
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6> Order ID: ' . $orderRow['order_id'] . '</h6>
                                                        <p>Name: ' . $orderRow['name'] . '</p>
                                                        <p>Email: ' . $orderRow['email'] . '</p>
                                                        <p>Item: ' . $orderRow['item'] . '</p>
                                                        <p>Quantity: ' . $orderRow['quantity'] . '</p>
                                                        <p>Total Price: ' . $orderRow['total_price'] . '</p>
                                                        <small class="text-muted">Timestamp: ' . $orderRow['timestamp'] . '</small>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . $orderRow['order_id'] . ')">Delete</button>
                                                </li>';
                                        }

                                        echo '</ul></div></form></div>';
                                    } else {
                                        echo '<p>No orders available.</p>';
                                    }

                                    // Free result set
                                    mysqli_free_result($ordersResult);
                                } else {
                                    // Handle the error
                                    echo "Error: " . mysqli_error($conn);
                                }

                                // Close the connection
                                // mysqli_close($conn); // commented because it affect next block
                                ?>

                                <script>
                                    function confirmDelete(orderId) {
                                        var confirmation = confirm("Are you sure you want to delete this order?");
                                        if (confirmation) {
                                            deleteOrder(orderId);
                                        }
                                    }

                                    function deleteOrder(orderId) {
                                        // Using vanilla JavaScript to send a request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', 'functions/delete-order.php', true);
                                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                        xhr.onload = function () {
                                            if (xhr.status >= 200 && xhr.status < 300) {
                                                var response = JSON.parse(xhr.responseText);
                                                alert(response.message);
                                                if (response.success) {
                                                    // Reload the page after successful deletion
                                                    location.reload();
                                                }
                                            } else {
                                                console.error(xhr.statusText);
                                            }
                                        };
                                        xhr.onerror = function () {
                                            console.error('Network error');
                                        };
                                        xhr.send('orderId=' + orderId);
                                    }
                                </script>



                            </div>
                            <div class="tab-pane" id="security">
                            <?php
                            // Assuming you have a database connection established

                            // Fetch feedbacks from the database
                            $feedbackQuery = "SELECT * FROM feedback";
                            $feedbackResult = mysqli_query($conn, $feedbackQuery);

                            if ($feedbackResult) {
                                // Check if there are feedbacks
                                if (mysqli_num_rows($feedbackResult) > 0) {
                                    echo '<div class="tab-pane" id="security">
                                            <h5>USER FEEDBACKS</h5>
                                            <hr>
                                            <form>
                                                <div class="form-group">
                                                    <ul class="list-group">';

                                    // Iterate through feedbacks and display them
                                    while ($feedbackRow = mysqli_fetch_assoc($feedbackResult)) {
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6> User: ' . $feedbackRow['user_email'] . '</h6>
                                                    <small class="text-muted">Feedback: ' . $feedbackRow['feedback_text'] . '</small><br>
                                                    <small class="text-muted">Timestamp: ' . $feedbackRow['timestamp'] . '</small>
                                                </div>
                                                <button type="button" class="btn btn-danger" onclick="deleteFeedback(' . $feedbackRow['feedback_id'] . ')">Delete</button>
                                            </li>';
                                    }

                                    echo '</ul></div></form></div>';
                                } else {
                                    echo '<p>No feedbacks available.</p>';
                                }

                                // Free result set
                                mysqli_free_result($feedbackResult);
                            } else {
                                // Handle the error
                                echo "Error: " . mysqli_error($conn);
                            }

                            // Close the connection
                            // mysqli_close($conn); // commentted because it affects next block
                            ?>

                            <script>
                                function deleteFeedback(feedbackId) {
                                    // Using vanilla JavaScript to send a request
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'functions/delete-feedback.php', true);
                                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                    xhr.onload = function() {
                                        if (xhr.status >= 200 && xhr.status < 300) {
                                            var response = JSON.parse(xhr.responseText);
                                            alert(response.message);
                                            if (response.success) {
                                                // Reload the page after successful deletion
                                                location.reload();
                                            }
                                        } else {
                                            console.error(xhr.statusText);
                                        }
                                    };
                                    xhr.onerror = function() {
                                        console.error('Network error');
                                    };
                                    xhr.send('feedbackId=' + feedbackId);
                                }
                            </script>

                        </div>


                            <div class="tab-pane " id="notification">
                                <?php
                                // Assuming you have a database connection established

                                // Fetch registered users from the database
                                $usersQuery = "SELECT `name`, `email`, `gender`, `state`, `district`, `is_verified`, `is_vip` FROM `registered_users` WHERE 1";
                                $usersResult = mysqli_query($conn, $usersQuery);

                                if ($usersResult) {
                                    // Check if there are registered users
                                    if (mysqli_num_rows($usersResult) > 0) {
                                        echo '<div class="tab-pane" id="users">
                                                <h5>REGISTERED USERS</h5>
                                                <hr>
                                                <form>
                                                    <div class="form-group">
                                                        <ul class="list-group">';

                                        // Iterate through registered users and display them
                                        while ($userRow = mysqli_fetch_assoc($usersResult)) {
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6> Name: ' . $userRow['name'] . '</h6>
                                                        <p>Email: ' . $userRow['email'] . '</p>
                                                        <p>Gender: ' . $userRow['gender'] . '</p>
                                                        <p>State: ' . $userRow['state'] . '</p>
                                                        <p>District: ' . $userRow['district'] . '</p>
                                                        <p>Verified: ' . ($userRow['is_verified'] ? 'Yes' : 'No') . '</p>
                                                        <p>VIP: ' . ($userRow['is_vip'] ? 'Yes' : 'No') . '</p>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" onclick="deleteUser(\'' . $userRow['email'] . '\')">Delete</button>
                                                </li>';
                                        }

                                        echo '</ul></div></form></div>';
                                    } else {
                                        echo '<p>No registered users available.</p>';
                                    }

                                    // Free result set
                                    mysqli_free_result($usersResult);
                                } else {
                                    // Handle the error
                                    echo "Error: " . mysqli_error($conn);
                                }

                                // Close the connection
                                // mysqli_close($conn); // commented because it affects next block
                                ?>

                                <script>
                                    function deleteUser(userEmail) {
                                        // JavaScript confirmation dialog
                                        var confirmation = confirm("Are you sure you want to delete this user?");
                                        
                                        if (confirmation) {
                                            // Using vanilla JavaScript to send a request
                                            var xhr = new XMLHttpRequest();
                                            xhr.open('POST', 'functions/delete-user.php', true);
                                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                            xhr.onload = function() {
                                                if (xhr.status >= 200 && xhr.status < 300) {
                                                    var response = JSON.parse(xhr.responseText);
                                                    alert(response.message);
                                                    if (response.success) {
                                                        // Reload the page after successful deletion
                                                        location.reload();
                                                    }
                                                } else {
                                                    console.error(xhr.statusText);
                                                }
                                            };
                                            xhr.onerror = function() {
                                                console.error('Network error');
                                            };
                                            xhr.send('userEmail=' + userEmail);
                                        }
                                    }
                                </script>

                            </div>
                            <div class="tab-pane" id="billings">
                                <?php
                                // Assuming you have a database connection established

                                // Fetch table bookings from ground section
                                $groundBookingsQuery = "SELECT `id`, `name`, `email`, `section`, `seat`, `date`, `time`, `payment` FROM `table_booking_ground` WHERE 1";

                                $groundBookingsResult = mysqli_query($conn, $groundBookingsQuery);

                                if ($groundBookingsResult) {
                                    // Check if there are ground section table bookings
                                    if (mysqli_num_rows($groundBookingsResult) > 0) {
                                        echo '<div class="tab-pane" id="tableBookings">
                                                <h5>GROUND SECTION TABLE BOOKINGS</h5>
                                                <hr>
                                                <form action="functions/delete-booking.php" method="post">
                                                    <div class="form-group">
                                                        <ul class="list-group">';

                                        // Iterate through ground section table bookings and display them
                                        while ($groundBookingRow = mysqli_fetch_assoc($groundBookingsResult)) {
                                            // Determine payment status and set color accordingly
                                            $paymentStatus = ($groundBookingRow['payment'] == 1) ? '<span style="color: green;">Paid</span>' : '<span style="color: red;">Not Paid</span>';

                                            echo '<li class="list-group-item">
                                                    <div>
                                                        <h6>Id: ' . $groundBookingRow['id'] . '</h6>
                                                        <h6>Name: ' . $groundBookingRow['name'] . '</h6>
                                                        <p>Email: ' . $groundBookingRow['email'] . '</p>
                                                        <p>Section: ' . $groundBookingRow['section'] . '</p>
                                                        <p>Seat: ' . $groundBookingRow['seat'] . '</p>
                                                        <p>Date: ' . $groundBookingRow['date'] . '</p>
                                                        <p>Time: ' . $groundBookingRow['time'] . '</p>
                                                        <p>Payment: ' . $paymentStatus . '</p>
                                                    </div>
                                                    <button type="submit" name="deleteBooking" value="' . $groundBookingRow['id'] . '" class="btn btn-danger">Delete</button>
                                                </li>';
                                        }

                                        echo '</ul></div></form></div>';
                                    } else {
                                        echo '<p>No table bookings available in the ground section.</p>';
                                    }

                                    // Free result set
                                    mysqli_free_result($groundBookingsResult);
                                } else {
                                    // Handle the error
                                    echo "Error: " . mysqli_error($conn);
                                }
                                ?>
                            </div>


                            <div class="tab-pane " id="tocontact">
                                <?php
                                    // Assuming you have a database connection established

                                    // Fetch feedbacks from the database
                                    $feedbackQuery = "SELECT * FROM contact";
                                    $feedbackResult = mysqli_query($conn, $feedbackQuery);

                                    if ($feedbackResult) {
                                        // Check if there are feedbacks
                                        if (mysqli_num_rows($feedbackResult) > 0) {
                                            echo '<div class="tab-pane" id="security">
                                                    <h5>USERS TO CONTACT</h5>
                                                    <hr>
                                                    <form>
                                                        <div class="form-group">
                                                            <ul class="list-group">';

                                            // Iterate through feedbacks and display them
                                            while ($feedbackRow = mysqli_fetch_assoc($feedbackResult)) {
                                                echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h6> User: ' . $feedbackRow['email'] . '</h6>
                                                            <small class="text-muted">Timestamp: ' . $feedbackRow['timestamp'] . '</small>
                                                        </div>
                                                        <button type="button" class="btn btn-danger" onclick="deletecontact(\'' . $feedbackRow['email'] . '\')">Delete</button>
                                                    </li>';
                                            }

                                            echo '</ul></div></form></div>';
                                        } else {
                                            echo '<p>No feedbacks available.</p>';
                                        }

                                        // Free result set
                                        mysqli_free_result($feedbackResult);
                                    } else {
                                        // Handle the error
                                        echo "Error: " . mysqli_error($conn);
                                    }

                                    // Close the connection
                                    // mysqli_close($conn); // commentted because it affects next block
                                    ?>


                                <script>
                                    function deletecontact(userEmail) {
                                        // JavaScript confirmation dialog
                                        var confirmation = confirm("Are you sure you want to delete this user?");
                                        
                                        if (confirmation) {
                                            // Using vanilla JavaScript to send a request
                                            var xhr = new XMLHttpRequest();
                                            xhr.open('POST', 'functions/delete_contact.php', true);
                                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                            xhr.onload = function() {
                                                if (xhr.status >= 200 && xhr.status < 300) {
                                                    var response = JSON.parse(xhr.responseText);
                                                    alert(response.message);
                                                    if (response.success) {
                                                        // Reload the page after successful deletion
                                                        window.location.reload();
                                                    }
                                                } else {
                                                    console.error(xhr.statusText);
                                                }
                                            };
                                            xhr.onerror = function() {
                                                console.error('Network error');
                                            };
                                            // Pass the userEmail parameter correctly
                                            xhr.send('userEmail=' + userEmail);
                                        }
                                    }
                                </script>
                            </div>

                    <div class="tab-pane" id="tableupdates">
                        <h2>Disable or Enable Table Booking Page</h2><hr>
                        <?php

                            // Query to fetch the enable_table_booking status
                            $query = "SELECT `enable_table_booking` FROM `admin` WHERE 1";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                // Fetch the result as an associative array
                                $row = mysqli_fetch_assoc($result);

                                // Check if the row exists and has the enable_table_booking key
                                if ($row && array_key_exists('enable_table_booking', $row)) {
                                    $status = $row['enable_table_booking'];

                                    // Display the status with appropriate color
                                    $statusText = ($status == 1) ? '<p style="color: green;">Current status: Enabled</p>' : '<p style="color: red;">Current status: Disabled</p>';
                                    echo $statusText;
                                } else {
                                    echo '<p>Status not available</p>';
                                }
                            } else {
                                echo '<p>Error fetching status</p>';
                            }

                            // Close the database connection
                            // mysqli_close($conn);
                            ?>
                        
                            <form method="post" action="functions/disable-tablebooking.php" style="float: left">
                                <button type="submit" class="btn btn-warning">Disable Table Booking Page</button>
                            </form>
                            <form method="post" action="functions/enable-tablebooking.php" style="float: left; margin-left: 8em;">
                                <button type="submit" class="btn btn-success">Enable Table Booking Page</button>
                            </form>
                    </div>

                    <div class="tab-pane" id="menuupdates">
                        <h2>Menu Management</h2>
                        <hr>
                        <!-- Enable/Disable Menu Page Section -->
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Enable or Disable Menu Page</h3>
                                <?php
                                // Query to fetch the enable_menu_page status
                                $query = "SELECT `enable_menu_page` FROM `admin` WHERE 1";
                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    // Fetch the result as an associative array
                                    $row = mysqli_fetch_assoc($result);

                                    // Check if the row exists and has the enable_menu_page key
                                    if ($row && array_key_exists('enable_menu_page', $row)) {
                                        $status = $row['enable_menu_page'];

                                        // Display the status with appropriate color
                                        $statusText = ($status == 1) ? '<p style="color: green;">Current status: Enabled</p>' : '<p style="color: red;">Current status: Disabled</p>';
                                        echo $statusText;
                                    } else {
                                        echo '<p>Status not available</p>';
                                    }
                                } else {
                                    echo '<p>Error fetching status</p>';
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <!-- Form to Disable Menu Page -->
                                <form method="post" action="functions/disable-menu-page.php">
                                    <button type="submit" class="btn btn-warning" style="float: left;">Disable Menu Page</button>
                                </form>
                                <!-- Form to Enable Menu Page -->
                                <form method="post" action="functions/enable-menu-page.php" style="margin-left: 1em;">
                                    <button type="submit" class="btn btn-success">Enable Menu Page</button>
                                </form>
                            </div><hr>
                        </div>

                        <!-- Add New Menu Item Section -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h3>Add New Menu Item</h3>
                                <form method="post" action="functions/add-menu-item.php">
                                    <!-- Add input fields for name, description, category, price, quantity, availability, image path -->
                                    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
                                    <input type="text" name="description" class="form-control mb-2" placeholder="Description" required>
                                    <select name="category" class="form-control mb-2" required>
                                        <option value="">Select Category</option>
                                        <option value="Veg">Veg</option>
                                        <option value="Non-Veg">Non-Veg</option>
                                        <option value="Local Taste">Local Taste</option>
                                        <option value="Seafood">Seafood</option>
                                        <option value="Chinese">Chinese</option>
                                    </select>
                                    <input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
                                    <input type="number" name="quantity" class="form-control mb-2" placeholder="Quantity" required>
                                    <select name="available" class="form-control mb-2" required>
                                        <option value="">Availability</option>
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                    <input type="text" name="image_path" class="form-control mb-2" placeholder="Image Path" required>
                                    <button type="submit" class="btn btn-primary">Add Menu Item</button>
                                </form>
                            </div>

                            <!-- Delete Menu Item Section -->
                            <div class="col-md-6">
                                <h3>Delete Menu Item</h3>
                                <form method="post" action="functions/delete-menu-item.php">
                                    <!-- Add input field for item Name to delete -->
                                    <input type="text" name="name" class="form-control mb-2" placeholder="Item Name to Delete" required>
                                    <button type="submit" class="btn btn-danger">Delete Menu Item</button>
                                </form><br>

                               <!-- Update Menu Item Section -->
                                <h3>Update Menu Item</h3>
                                <form method="post" action="functions/update-menu-item.php">
                                    <!-- Add input fields for item Name and new details -->
                                    <input type="text" name="name" class="form-control mb-2" placeholder="Item Name to Update" required>
                                    <input type="text" name="new_name" class="form-control mb-2" placeholder="New Name">
                                    <input type="text" name="description" class="form-control mb-2" placeholder="New Description">
                                    <select name="category" class="form-control mb-2">
                                        <option value="">Select New Category</option>
                                        <option value="Veg">Veg</option>
                                        <option value="Non-Veg">Non-Veg</option>
                                        <option value="Local Taste">Local Taste</option>
                                        <option value="Seafood">Seafood</option>
                                        <option value="Chinese">Chinese</option>
                                    </select>
                                    <input type="number" name="price" class="form-control mb-2" placeholder="New Price">
                                    <input type="number" name="quantity" class="form-control mb-2" placeholder="New Quantity">
                                    <select name="available" class="form-control mb-2">
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                    <input type="text" name="image_path" class="form-control mb-2" placeholder="New Image Path">
                                    <button type="submit" class="btn btn-info">Update Menu Item</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="displaymessage">
                        <h2>Display Admin Message</h2><hr>

                        <?php
                        // Display success or error messages if any
                        if(isset($message)){
                            echo '<p>'.$message.'</p>';
                        }
                        ?>

                        <!-- Admin Message Input Form -->
                        <form method="post" action="functions/insert-admin-message.php" style="display: inline;">
                            <div class="form-group">
                                <?php
                                $adminMessageQuery = "SELECT `id`, `message`, `enable_meessage` FROM `admin_message` WHERE 1";
                                $adminMessageResult = mysqli_query($conn, $adminMessageQuery);

                                if ($adminMessageResult) {
                                    $adminMessageData = mysqli_fetch_assoc($adminMessageResult);

                                    echo "<b>Current admin message: </b><p>" . $adminMessageData['message'] . "</p>";

                                    $statusColor = ($adminMessageData['enable_meessage'] == 1) ? 'green' : 'red';
                                    $statusText = ($adminMessageData['enable_meessage'] == 1) ? 'Enabled' : 'Disabled';

                                    echo "<p style='color: $statusColor;'>Admin Message is currently $statusText</p>";

                                } else {
                                    // Handle the error
                                    echo "Error: " . mysqli_error($conn);
                                    exit; // Ensure that the script stops execution in case of an error
                                }
                                ?>
                                <label for="adminMessage">Admin Message:</label>
                                <input type="text" class="form-control" id="adminMessage" name="adminMessage" placeholder="Enter admin message" required>
                            </div><br>
                            <button type="submit" class="btn btn-success">Insert Admin Message</button>
                        </form>

                        <!-- Enable/Disable Admin Message Buttons -->
                        <form method="post" action="functions/enable-admin-message.php" style="display: inline;">
                            <button type="submit" class="btn btn-warning">Enable Admin Message</button>
                        </form>
                        <form method="post" action="functions/disable-admin-message.php" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Disable Admin Message</button>
                        </form>
                    </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
