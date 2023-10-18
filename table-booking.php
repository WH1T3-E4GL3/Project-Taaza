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

</style>

<section class="contact-section" id="home">
  <div class="contact-container">
    <div class="contact-content">
      <img src="assets/images/logo.png" alt="ICON" width="70" height="70">
      <br>
      <h2>Restaurant Map</h2>

    </div>
    <figure class="hero-banner">
      <img width='900' src="assets/images/table-book/blue_print.png" alt='Blue print image [load error]'>
    </figure>
  </div>
  <hr>
</section>

<section>

<div class="box">
    <div class="content">
      <center><h3>family section</h3></center>
      <hr>
    <label class="checkBox">
      <input type="checkbox" id="ch1" name='ch1'>
      <div class="transition"></div>
      <span>F1</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch2" name='ch2'>
      <div class="transition"></div>
      <span>F2</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch3" name='ch3'>
      <div class="transition"></div>
      <span>F3</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch4" name='ch4'>
      <div class="transition"></div>
      <span>F4</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch5" name='ch5'>
      <div class="transition"></div>
      <span>F5</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch6" name='ch6'>
      <div class="transition"></div>
      <span>F6</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch7" name='ch7'>
      <div class="transition"></div>
      <span>F7</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch8" name='ch8'>
      <div class="transition"></div>
      <span>F8</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch9" name='ch9'>
      <div class="transition"></div>
      <span>F9</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->
  </div>
</div>

<center><hr style="width:300px"></center>


<div class="box">
    <div class="content">
      <center><h3>family section</h3></center>
      <hr>
    <label class="checkBox">
      <input type="checkbox" id="ch1" name='ch1'>
      <div class="transition"></div>
      <span>F1</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch2" name='ch2'>
      <div class="transition"></div>
      <span>F2</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch3" name='ch3'>
      <div class="transition"></div>
      <span>F3</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch4" name='ch4'>
      <div class="transition"></div>
      <span>F4</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch5" name='ch5'>
      <div class="transition"></div>
      <span>F5</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch6" name='ch6'>
      <div class="transition"></div>
      <span>F6</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch7" name='ch7'>
      <div class="transition"></div>
      <span>F7</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch8" name='ch8'>
      <div class="transition"></div>
      <span>F8</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch9" name='ch9'>
      <div class="transition"></div>
      <span>F9</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->
  </div>
</div>


<center><hr style="width:300px"></center>


<div class="box">
    <div class="content">
      <center><h3>family section</h3></center>
      <hr>
    <label class="checkBox">
      <input type="checkbox" id="ch1" name='ch1'>
      <div class="transition"></div>
      <span>F1</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch2" name='ch2'>
      <div class="transition"></div>
      <span>F2</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch3" name='ch3'>
      <div class="transition"></div>
      <span>F3</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch4" name='ch4'>
      <div class="transition"></div>
      <span>F4</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch5" name='ch5'>
      <div class="transition"></div>
      <span>F5</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch6" name='ch6'>
      <div class="transition"></div>
      <span>F6</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch7" name='ch7'>
      <div class="transition"></div>
      <span>F7</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch8" name='ch8'>
      <div class="transition"></div>
      <span>F8</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->

    <label class="checkBox">
      <input type="checkbox" id="ch9" name='ch9'>
      <div class="transition"></div>
      <span>F9</span>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp; <!--Adding some space charecters-->
  </div>
</div>

<br><br>
</section>
<?php require "includes/footer.php"; ?>
