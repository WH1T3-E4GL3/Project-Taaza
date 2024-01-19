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

<center><button class="button" style="width:100%; padding-top:8em"><a href="vip-booking.php" style="color:white"> Go To VIP Booking Section</a></button></center>
<section class="contact-section" id="home">
  <br><br>
<center><u><h2 style="color:#0d5215">Normal Booking [First Floor]</h2></u></center><br>
<marquee style="color: #0d5215;">The selected seat will be available for you all the time - [Breakfast - 7 am to 11 am, Lunch 11 am to 4 pm, Dinner - 6 pm to 10 pm]</marquee>
  <div class="contact-container">
    <div class="contact-content">

      <section>
        <form action="table-booking-handler.php" method="post">
          <center><h2 style="color:#0d5215">First Floor</h2></center><br>

          <!-- Family Section -->
          <div class="box">
            <div class="content">
              <center><h3>Break Fast</h3></center>
              <hr>

              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="family_seat">Select Seat accodring to the blueprint provided:</label>
                <select id="family_seat" name='section[Breakfast][]' onchange="handleSelectChange(this)">
                  <option value="NONE">None</option>
                  <option value="f1">B1</option>
                  <option value="f2">B2</option>
                  <option value="f3">B3</option>
                  <option value="f4">B4</option>
                  <option value="f5">B5</option>
                  <option value="f6">B6</option>
                  <option value="f7">B7</option>
                  <option value="f8">B8</option>
                </select>
              </div>
            </div>
          </div>
          <br>

          <!-- Normal Section -->
          <div class="box">
            <div class="content">
              <center><h3>Lunch</h3></center>
              <hr>
              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="normal_seat">Select Seat accodring to the blueprint provided::</label>
                <select id="normal_seat" name='section[Lunch][]' onchange="handleSelectChange(this)">
                  <option value="NONE">None</option>
                  <option value="n1">L1</option>
                  <option value="n2">L2</option>
                  <option value="n3">L3</option>
                  <option value="n4">L4</option>
                  <option value="n5">L5</option>
                  <option value="n6">L6</option>
                  <option value="n7">L7</option>
                  <option value="n8">L8</option>
                </select>
              </div>

            </div>
          </div>
          <br>

          <!-- Dinner Section -->
          <div class="box">
            <div class="content">
              <center><h3>Dinner</h3></center>
              <hr>
              <!-- Use dropdowns for seat selection -->
              <div class="form-field">
                <label for="normal_seat">Select Seat accodring to the blueprint provided::</label>
                <select id="dinner_seat" name='section[Dinner][]' onchange="handleSelectChange(this)">
                  <option value="NONE">None</option>
                  <option value="d1">D1</option>
                  <option value="d2">D2</option>
                  <option value="d3">D3</option>
                  <option value="d4">D4</option>
                  <option value="d5">D5</option>
                  <option value="d6">D6</option>
                  <option value="d7">D7</option>
                  <option value="d8">D8</option>
                </select>
              </div>

            </div>
          </div>
          <br>
          <br>

          <!-- Add a hidden input field for time -->
          <input type="hidden" id="hidden_time" name="hidden_time">

          <!-- Add date and time input fields with JavaScript to populate them automatically -->
          <div class="box">
              <div class="form-field">
                  <label for="date">Date:</label>
                  <input type="date" id="date" name="date" required>
              </div>
              <div class="form-field">
                  <label for="time">Time:</label>
                  <input type="text" id="time" name="hidden_time" placeholder="eg: 01:30 pm" pattern="^(0[1-9]|1[0-2]):[0-5][0-9] [apAP][mM] [tT][oO] (0[1-9]|1[0-2]):[0-5][0-9]$" title="Enter a valid time (hh:mm am/pm)" required oninput="updateHiddenTime()">

              </div>
          </div>
      </section>
    </div>

    <figure class="hero-banner">
    <center><h2 style="color:#0d5215">First Floor</h2></center><br>
      <img width='600' src="assets/images/table-book/blue_print.png" alt='Blue print image [load error]'><br>
      <center>
        <input type="submit" class="button" value="Book Tables" style="float:left">
        <button class="button" style="margin-right:0"><a href="payment-verification.php" style="color:white">Your Bookings</a></button>
      </center>
    </figure>
  </div>
  </form>

  <!--Script to handle disabling of other select boxes--> 
  <script>
    function updateHiddenTime() {
    const visibleTimeInput = document.getElementById('time');
    const hiddenTimeInput = document.getElementById('hidden_time');

    const timeRegex = /^(0[1-9]|1[0-2]):[0-5][0-9] [apAP][mM] [tT][oO] (0[1-9]|1[0-2]):[0-5][0-9]$/;

    if (visibleTimeInput.value.match(timeRegex)) {
        hiddenTimeInput.value = visibleTimeInput.value;
    } else {
        // Handle invalid time format
        hiddenTimeInput.value = ''; // Reset hidden time input
        console.error('Invalid time format');
    }
}




  function handleSelectChange(selectedDropdown) {
    const familyDropdown = document.getElementById('family_seat');
    const normalDropdown = document.getElementById('normal_seat');
    const dinnerDropdown = document.getElementById('dinner_seat');

    const timeInput = document.getElementById('time');
    const hiddenTimeInput = document.getElementById('hidden_time');

    // Disable all dropdowns and the time field initially
    familyDropdown.disabled = true;
    normalDropdown.disabled = true;
    dinnerDropdown.disabled = true;
    timeInput.disabled = true;

    // Enable the selected dropdown
    selectedDropdown.disabled = false;

    // If 'NONE' is selected, enable all dropdowns and the time field
    if (selectedDropdown.value === 'NONE') {
        familyDropdown.disabled = false;
        normalDropdown.disabled = false;
        dinnerDropdown.disabled = false;
        timeInput.disabled = false;
    }

    switch (selectedDropdown.value) {
        case 'f1':
        case 'f2':
        case 'f3':
        case 'f4':
        case 'f5':
        case 'f6':
        case 'f7':
        case 'f8':
            timeInput.value = '07:00 am to 11:00 am';
            break;
        case 'n1':
        case 'n2':
        case 'n3':
        case 'n4':
        case 'n5':
        case 'n6':
        case 'n7':
        case 'n8':
            timeInput.value = '11:00 am to 04:00 pm';
            break;
        case 'd1':
        case 'd2':
        case 'd3':
        case 'd4':
        case 'd5':
        case 'd6':
        case 'd7':
        case 'd8':
            timeInput.value = '06:00 pm to 10:00 pm';
            break;
        default:
            timeInput.value = ''; // Reset the time field if 'NONE' or invalid option is selected
            break;
    }

    // Update hidden time input
    hiddenTimeInput.value = timeInput.value;
}


</script>

</section>

<?php require "includes/footer.php"; ?>
