<?php
include_once '../../includes/connection.php';

if(isset($_POST['adminMessage'])){
    $adminMessage = mysqli_real_escape_string($conn, $_POST['adminMessage']);

    // Check if an admin message already exists
    $checkQuery = "SELECT * FROM `admin_message`";
    $checkResult = mysqli_query($conn, $checkQuery);

    if(mysqli_num_rows($checkResult) > 0){
        // Update the existing message
        $updateQuery = "UPDATE `admin_message` SET `message`='$adminMessage' WHERE 1";
        $result = mysqli_query($conn, $updateQuery);
    } else {
        // Insert a new message
        $insertQuery = "INSERT INTO `admin_message` (`message`) VALUES ('$adminMessage')";
        $result = mysqli_query($conn, $insertQuery);
    }

    if($result){
        echo "<script>alert('Message updated successfully');</script>";
    } else {
        echo "<script>alert('Message updation failed');</script>";
    }
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the admin.php page after the alert
echo "<script>window.location.href='../admin.php';</script>";
exit();
?>
