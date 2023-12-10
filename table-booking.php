<?php
session_start();
?>
<?php require "includes/header.php"; ?>

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


<section class="contact-section" id="home">
  <div class="contact-container">
    <div class="contact-content">

      <section>
        <form action="table-booking-handler.php" method="post">
          <center><h2 style="color:#0d5215">Ground Floor</h2></center><br>

          <!-- Family Section -->
          <div class="box">
            <div class="content">
              <center><h3>Family section</h3></center>
              <hr>

              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="family_seat">Select Seat accodring to the blueprint provided:</label>
                <select id="family_seat" name='section[family][]'>
                  <option value="NONE">None</option>
                  <option value="f1">F1</option>
                  <option value="f2">F2</option>
                  <option value="f3">F3</option>
                  <option value="f4">F4</option>
                  <option value="f5">F5</option>
                  <option value="f6">F6</option>
                  <option value="f7">F7</option>
                  <option value="f8">F8</option>
                  <option value="f9">F9</option>
                </select>
              </div>

            </div>
          </div>
          <br>

          <!-- Normal Section -->
          <div class="box">
            <div class="content">
              <center><h3>Normal section</h3></center>
              <hr>
              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="normal_seat">Select Seat accodring to the blueprint provided::</label>
                <select id="normal_seat" name='section[normal][]'>
                  <option value="NONE">None</option>
                  <option value="n1">N1</option>
                  <option value="n2">N2</option>
                  <option value="n3">N3</option>
                  <option value="n4">N4</option>
                  <option value="n5">N5</option>
                  <option value="n6">N6</option>
                  <option value="n7">N7</option>
                  <option value="n8">N8</option>
                </select>
              </div>

            </div>
          </div>
          <br>

          <!-- Special Section -->
          <div class="box">
            <div class="content">
              <center><h3>Special section</h3></center>
              <hr>

              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="special_seat">Select Seat accodring to the blueprint provided::</label>
                <select id="special_seat" name='section[special][]'>
                  <option value="NONE">None</option>
                  <option value="s1">S1</option>
                  <option value="s2">S2</option>
                  <option value="s3">S3</option>
                  <option value="s4">S4</option>
                  <option value="s5">S5</option>
                  <option value="s6">S6</option>
                  <option value="s7">S7</option>
                  <option value="s8">S8</option>
                  <!-- Add options for other special seats -->
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
          <center><input type="submit" class="button" value="Book Tables"></center>
          <br>
          <center><button class="button"><a href="payment-verification.php" style="color:white">Your Bookings</a></button></center>
          <button>
          <br><hr><br>
        </form>
      </section>
    </div>

    <figure class="hero-banner">
    <center><h2 style="color:#0d5215">Ground Floor</h2></center><br>
      <img width='600' src="assets/images/table-book/blue_print.png" alt='Blue print image [load error]'>
      <hr><br>
      <center><h2 style="color:#0d5215">First Floor [VIP]</h2></center><br>
      <img width='600' src="assets/images/table-book/first-floor.png" alt='Blue print image [load error]'>
      <br>
      <center><button class="button"><a href="vip-booking.php" style="color:white">VIP Booking Section</a></button></center>
    </figure>
  </div>
</section>

<?php require "includes/footer.php"; ?>
