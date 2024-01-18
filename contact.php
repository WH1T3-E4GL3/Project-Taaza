<?php
session_start();

// Include database connection file
require_once "includes/connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email address from the form
    $email = isset($_POST['email_address']) ? $_POST['email_address'] : '';

    // Validate and sanitize the email address if needed

    // Insert the data into the 'contact' table
    $query = "INSERT INTO `contact` (`email`, `timestamp`) VALUES (?, NOW())";
    $insertStmt = $conn->prepare($query);

    if ($insertStmt) {
    $insertStmt->bind_param("s", $email);
        $result = $insertStmt->execute();

        if ($result) {
            // Insertion successful
            echo "
            <script>alert('Email submitted successfully!');
            window.location.href='contact.php';
            </script>
            ";
        } else {
            // Insertion failed
            echo "
            <script>alert('Error in submission!');
            window.location.href='contact.php';
            </script>
            ";
        }

        $insertStmt->close();
    } else {
        // Handle the error
        die("Error preparing statement: " . $conn->error);
    }
}
?>
<?php require "includes/header.php"; ?>

<section class="contact-section" id="home">
  <div class="contact-container">
    <div class="contact-content">
      <img src="assets/images/logo.png" alt="ICON" width="70" height="70"> 
      <br>
      <h1 style="font-size:30px;">Contact Us</h1>
      <br>
            <h2>Address</h2>
            <p>
            Taaza restaurant, Stadium Link Rd, Kathrikadavu<br>
            Kaloor, Kochi, Ernakulam <br>
            Kerala 682017
            </p>
            <br>
            <h2 style="font-size:30px">Contact Details</h2>
            <p class="hero-text">
            MOBILE: +91 7558 9513 51 | TELEPHONE: 0484-292674<br>
            EMAIL : taaza0restaurant@gmail.com<br>
            </p>
            <br>
      <form action="" class="contact-form" method="POST">
        <input type="email" name="email_address" aria-label="email" placeholder="Your Email Address..." required
          class="email-field">
        <button type="submit" class="btn">Get Response Back</button>
      </form>
    </div>
    <figure class="hero-banner">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125751.03807260178!2d76.18464664299258!3d9.957243150760043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d5b14f1bc7d%3A0xfa43e7937b630001!2sAl%20Taza!5e0!3m2!1sen!2sin!4v1694160076193!5m2!1sen!2sin" width="700" height="600" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </figure>
  </div>
</section>
<br><br><br><br>

<?php require "includes/footer.php"; ?>
