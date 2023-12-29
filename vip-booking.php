<?php
session_start();
require_once "includes/header.php";
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

            // Continue with the rest of your booking script
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve and process form data
                $name = $userName; // Use the fetched name
                $email = $userEmail;

                // Check if 'section' is set in $_POST
                if (isset($_POST['section'])) {
                    $sectionArray = $_POST['section'];

                    // Initialize arrays to store sections, seats, and decor
                    $sections = [];
                    $seats = [];
                    $decor = [];

                    // Iterate through sections and seats
                    foreach ($sectionArray as $sectionName => $seatsArray) {
                        // Check if the seat is set, otherwise set a default value
                        $selectedSeat = (isset($seatsArray[0])) ? $seatsArray[0] : 'NONE';

                        // Concatenate seats for each section
                        $seats[] = $selectedSeat;
                        $sections[] = $sectionName;

                        // Check if decor is set, otherwise set a default value
                        $selectedDecor = (isset($seatsArray[1])) ? $seatsArray[1] : 'NONE';

                        // Concatenate decor for each section
                        $decor[] = $selectedDecor;
                    }

                    // Concatenate sections, seats, and decor as comma-separated strings
                    $sectionsString = implode(",", $sections);
                    $seatsString = implode(",", $seats);
                    $decorString = implode(",", $decor);

                    // Retrieve other form data
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $time = strtolower($time);
                    $payment = 0;

                    // Insert data into the VIP table
                    $table = 'table_booking_vip';

                    $sql = "INSERT INTO $table (name, email, section, seat, decor, date, time, payment) 
                            VALUES ('$name', '$email', '$sectionsString', '$seatsString', '$decorString', '$date', '$time', $payment)";

                    if ($conn->query($sql) === TRUE) {
                        // Redirect to a success page or handle success
                        echo "<script>alert('VIP Table Booked Successfully');
                            window.location.href = 'vip-payment-verification.php';
                            </script>";

                        exit();
                    } else {
                        // Handle errors
                        echo "<script>alert('ERROR in VIP table Booking');</script>";
                    }
                } else {
                    // Handle the case where 'section' is not set in $_POST
                    echo "<script>alert('No section data received');</script>";
                }
            }
        } else {
            // Handle the case where the email is not found in the database
            echo "<script>alert('Email not registered');</script>";
            echo "<script>window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // Handle database query error
        echo "<script>alert('ERROR in processing your request');</script>";
        exit();
    }
} else {
    // Handle the case where the user is not logged in
    echo "<script>alert('Log in to access VIP booking');</script>";
    echo "<script>window.location.href='new-login.php';</script>";
    exit();
}

$conn->close();
?>


<style>
  .clear {
    clear: both;
  }

  .content {
    margin-left: 20px;
  }

  .checkBox {
    display: inline-block;
    cursor: pointer;
    width: 30px;
    height: 30px;
    border: 3px solid rgba(255, 255, 255, 0);
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    box-shadow: 0px 0px 0px 2px black;
    color: black; /* Set default text color */
  }

  .checkBox div {
    width: 60px;
    height: 60px;
    background-color: rgba(0, 0, 0, 0.5); /* 50% opacity black */
    top: -52px;
    left: -52px;
    position: absolute;
    transform: rotateZ(45deg);
    z-index: 100;
  }

  .checkBox input[type=checkbox]:checked + div {
    left: -10px;
    top: -10px;
  }

  .checkBox input[type=checkbox] {
    position: absolute;
    left: 50px;
    visibility: hidden;
  }

  .transition {
    transition: 300ms ease;
  }

  .checkBox input[type=checkbox]:checked + div + span {
    color: white; /* Set text color to white when checked */
  }

  .box {
    border: 5px solid #ccc; /* Border color and thickness */
    padding: 10px; /* Padding inside the box */
    border-radius: 10px; /* Rounded corners */
    background-color: #f9f9f9; /* Background color */
    max-width: 600px; /* Adjust the maximum width as per your preference */
    margin: auto; /* Center the box */
    color: grey;
  }

  .button {
    background-image: linear-gradient(to right, #0d5215, green);
    color: white;
    max-width: 600px;
    font-size: var(--fs-7);
    text-transform: uppercase;
    padding: 20px 30px;
    text-align: center;
    border-radius: 7px;
  }

  .hero-banner img {
    max-width: 100%; /* Make images responsive */
    height: auto; /* Maintain aspect ratio */
    display: block; /* Remove extra space under the image */
    margin: auto; /* Center the image */
    margin-top: 13px; /* Add margin-top to move the image downward */
}

@media screen and (max-width: 1000px) {
    .hero-banner img {
        max-width: 100%;
        margin-top: 10px;
    }
}

</style>

<center><button class="button" style="width:100%; padding-top:8em"><a href="table-booking.php" style="color:white"> Go To Normal Booking Section</a></button></center>
<section class="contact-section" id="home">
<section class="contact-section" id="home">
  <div class="contact-container">
    <div class="contact-content">

      <section>
        <form action="" method="post">
          <center><h2 style="color:#0d5215">First Floor [VIP]</h2></center><br>

          <!-- Family Section -->
          <div class="box">
            <div class="content">
              <center><h3>VIP section</h3></center>
              <hr>

              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="family_seat">Select Seat:</label>
                <select id="family_seat" name='section[VIP][]'>
                  <option value="NONE">None</option>
                  <option value="v1">V1</option>
                  <option value="v2">V2</option>
                  <option value="v3">V3</option>
                  <option value="v4">V4</option>
                  <option value="v5">V5</option>
                  <option value="v6">V6</option>
                </select>
              </div>

              <!-- Use dropdowns for customize selection -->
              <div class="form-field">
                <label for="family_seat">Select decor:</label>
                <select id="family_seat" name='section[VIP][]'>
                  <option value="NONE">None</option>
                  <option value="Candle light">Candle light</option>
                  <option value="Special live rose flower pot">Special live rose flower pot</option>
                  <option value="Chandeliers">Chandeliers</option>
                </select>
              </div>

            </div>
          </div>
          <br>

          <!-- Add date and time input fields with JavaScript to populate them automatically -->
          <div class="box">
            <div class="form-field">
              <label for="date">Date:</label>
              <input type="date" id="date" name="date" required>
            </div>
            <div class="form-field">
              <label for="time">Time:</label>
              <input type="text" id="time" name="time" placeholder="eg: 01:30 pm" pattern="^(0[1-9]|1[0-2]):[0-5][0-9] [apAP][mM]$" title="Enter a valid time (hh:mm am/pm)" required>
            </div>
          </div>
          <br>
          <button>
          <br><hr><br>
      </section>
    </div>
    <figure class="hero-banner">
      <center><h2 style="color:#0d5215">First Floor [VIP]</h2></center><br>
      <img width='600' src="assets/images/table-book/first-floor.png" alt='Blue print image [load error]'>
      <br>
      <center><input type="submit" class="button" value="Book VIP Tables" style="float:left"></center>
      <center><button class="button"><a href="vip-payment-verification.php" style="color:white">Your VIP Bookings</a></button></center>
      </form>
    </figure>
  </div>
</section>
<?php require "includes/footer.php"; ?>
