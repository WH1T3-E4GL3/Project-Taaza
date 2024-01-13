<?php
session_start();
define("APPURL", "http://localhost/taaza");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taaza</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">

  <!-- custom css link -->
  <link rel="stylesheet" href="../assets/css/taaza.css">
  <link rel="stylesheet" href="../assets/css/media_query.css">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <style>
    .remove-button {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      width: 130px;
    }


    .remove-button1 {
      background-color: white;
      color: black;
      border: 2px solid #f44336;
    }

    .remove-button1:hover {
      background-color: #f44336;
      color: white;
    }

    menuitemx

    /* HTML navx Styles */
    /* HTML navx Styles */
    /* HTML navx Styles */
    navx menuitemx {
      position: relative;
      display: block;
      opacity: 0;
      cursor: pointer;
    }

    navx menuitemx>menux {
      position: absolute;
      pointer-events: none;
    }

    navx>menux {
      display: flex;
    }

    navx>menux>menuitemx {
      pointer-events: all;
      opacity: 1;
    }

    menux menuitemx a {
      white-space: nowrap;
      display: block;
    }

    menuitemx:hover>menux {
      pointer-events: initial;
    }

    menuitemx:hover>menux>menuitemx,
    menux:hover>menuitemx {
      opacity: 1;
    }

    navx>menux>menuitemx menuitemx menux {
      transform: translateX(100%);
      top: 0;
      right: 0;
    }

    /* User Styles Below Not Required */
    /* User Styles Below Not Required */
    /* User Styles Below Not Required */

    navx {
      margin-top: 40px;
      margin-left: 40px;
    }

    navx a {
      background: #75F;
      color: #FFF;
      min-width: 190px;
      transition: background 0.5s, color 0.5s, transform 0.5s;
      margin: 0px 6px 6px 0px;
      padding: 20px 40px;
      box-sizing: border-box;
      border-radius: 3px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);
      position: relative;
    }

    navx a:hover:before {
      content: '';
      top: 0;
      left: 0;
      position: absolute;
      background: rgba(0, 0, 0, 0.2);
      width: 100%;
      height: 100%;
    }

    navx>menux>menuitemx>a+menux:after {
      content: '';
      position: absolute;
      border: 10px solid transparent;
      border-top: 10px solid white;
      left: 12px;
      top: -40px;
    }

    navx menuitemx>menux>menuitemx>a+menux:after {
      content: '';
      position: absolute;
      border: 10px solid transparent;
      border-left: 10px solid white;
      top: 20px;
      left: -180px;
      transition: opacity 0.6, transform 0s;
    }

    navx>menux>menuitemx>menux>menuitemx {
      transition: transform 0.6s, opacity 0.6s;
      transform: translateY(150%);
      opacity: 0;
    }

    navx>menux>menuitemx:hover>menux>menuitemx,
    navx>menux>menuitemx.hover>menux>menuitemx {
      transform: translateY(0%);
      opacity: 1;
    }

    menuitemx>menux>menuitemx>menux>menuitemx {
      transition: transform 0.6s, opacity 0.6s;
      transform: translateX(195px) translateY(0%);
      opacity: 0;
    }

    menuitemx>menux>menuitemx:hover>menux>menuitemx,
    menuitemx>menux>menuitemx.hover>menux>menuitemx {
      transform: translateX(0) translateY(0%);
      opacity: 1;
    }
  </style>

</head>

<body>
  <!-- main container -->
  <div class="container">
    <!-- #HEADER -->
    <header>
      <nav class="navbar">
        <div class="navbar-wrapper">
          <a href="#">
            <img src="../assets/images/logo.png" alt="logo" width="130">
          </a>
          <b>
            <ul class="navbar-nav">
              <li>
                <a href="../index.php" class="nav-link">Home</a>
              </li>
              <li>
                <a href="../about.php" class="nav-link">About</a>
              </li>
              <li>
                <a href="../services.php" class="nav-link">Services</a>
              </li>
              <li>
                <a href="../menu.php" class="nav-link">Our Menu</a>
              </li>
              <li>
                <a href="../contact.php" class="nav-link">Contact</a>
              </li>

              <li>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                  echo '<a href="../logout.php" class="nav-link">Logout</a>';
                } else {
                  echo '<a href="../login.php" class="nav-link">Register/Login</a>';
                }
                ?>
              </li>
            </ul>
          </b>

          <!--Cart count badge checker -->
          <?php
          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
          } else {
            $count = 0;
          }
          ?>

          <div class="navbar-btn-group">
            <button class="shopping-cart-btn">
              <img src="../assets/images/cart.svg" alt="shopping cart icon" width="18">
              <span class="count">
                <?php echo $count ?>
              </span>
            </button>
            <button class="menu-toggle-btn">
              <span class="line one"></span>
              <span class="line two"></span>
              <span class="line three"></span>
            </button>
          </div>

        </div>
      </nav>

      <div class="cart-box">
        <ul class="cart-box-ul">
          <h4 class="cart-h4">Your order.</h4>
          <?php
          if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
              $sr = $key + 1; // Fixing the $sr value
              echo "
                <li class='cart-item'>
                    <div class='img-box'>
                        <img src='../assets/images/menu1.jpg' alt='product image' class='product-img' width='50' height='50' loading='lazy'>
                    </div>
                    $value[Item_name]<br>
                    $value[price]₹<input type='hidden' class='iprice' value='$value[price]' id='iprice_$sr'>
                    <form action='../manage_cart.php' method='POST'>
                        <input class='iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10' placeholder='Quantity'>
                        <input type='hidden' name='Item_name' value='$value[Item_name]'>
                    </form>
                    <span class='itotal'></span>
                    <form action='../manage_cart.php' method='POST'>
                        <button name='remove_item' class='remove-button remove-button1'>Remove</button>
                        <input type='hidden' name='Item_name' value='$value[Item_name]'>
                    </form>
                </li>";
            }
          }
          ?>
          <p class="product-price">
            <span class="small" id='gtotal'></span>
          </p>
        </ul>

        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
          ?>
          <form action="../checkout.php" method="POST">
            <?php
            // Add hidden input fields for Item_name, price, Quantity
            foreach ($_SESSION['cart'] as $key => $value) {
              echo "
            <input type='hidden' name='Item_name[]' value='$value[Item_name]'>
            <input type='hidden' name='price[]' value='$value[price]'>
            <input type='hidden' name='Quantity[]' value='$value[Quantity]'>";
            }
            ?>
            <div class="cart-btn-group">
              <button name='checkout' class="btn btn-primary">Checkout</button>
            </div>
          </form>
          <?php
        }
        ?>
      </div>
    </header>
    <main>

      <section class="contact-section" id="home">
        <div class="contact-container">
          <div class="contact-content testtt">
            <br><br><br><br><br><br>
            <navx>
              <menux>
                <menuitemx id="demo1x">
                  <a>Marriage</a>
                  <menux>
                    <menuitemx>
                      <a href="../assets/images/event-book/MSILVER.pdf">Silver</a>
                    </menuitemx>
                    <menuitemx><a href="../assets/images/event-book/MGOLD.pdf">Gold</a></menuitemx>
                    <menuitemx id="demo2x">
                      <a href="../assets/images/event-book/MPLATINUM.pdf">Platinum</a>
                    </menuitemx>
                  </menux>
                </menuitemx>

                <!-- NEXT DROPDOWN-->
                <menuitemx id="demo1x">
                  <a>Birthday</a>
                  <menux>
                    <menuitemx>
                      <a href="../assets/images/event-book/BSILVER.pdf">Silver</a>
                    </menuitemx>
                    <menuitemx><a href="../assets/images/event-book/BGOLD.pdf">Gold</a></menuitemx>
                    <menuitemx id="demo2x">
                      <a href="../assets/images/event-book/BPLATINUM.pdf">Platinum</a>
                    </menuitemx>
                  </menux>
                </menuitemx>

                <!-- NEXT DROPDOWN-->
                <menuitemx id="demo1x">
                  <a>House Warming</a>
                  <menux>
                    <menuitemx>
                      <a href="../assets/images/event-book/HSILVER.pdf">Silver</a>
                    </menuitemx>
                    <menuitemx><a href="../assets/images/event-book/HGOLD.pdf">Gold</a></menuitemx>
                    <menuitemx id="demo2x">
                      <a href="../assets/images/event-book/HPLATINUM.pdf">Platinum</a>
                    </menuitemx>
                  </menux>
                </menuitemx>
                <br>
          </div>
          <figure class="hero-banner testt">
            <img src="../assets/images/catering.png" alt="catering Image [Image load error]">
          </figure>

        </div>
      </section>



      <footer>
        <div class=" footer-wrapper">
          <a href="#">
            <img src="../assets/images/logo.png" alt="logo" class="footer-brand" width="150">
          </a>
          <div class="social-link">

            <a href="https://twitter.com/Annabel07785340">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>

            <a href="https://www.instagram.com/whxite.exe/">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>

            <a href="https://www.facebook.com/andro.pool.54/">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>

            <a href="https://youtu.be/OTQqj3-Zqi8?si=tT2NfC3Sh7p_UaSS">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </div>
          <p class="copyright">&copy; Copyright 2024 Taaza. All Rights Reserved.</p>
        </div>
      </footer>
  </div>

  <script>

    // For the thumbnail demo! :]

    var count = 1
    setTimeout(demox, 500)
    setTimeout(demox, 700)
    setTimeout(demox, 900)
    setTimeout(reset, 2000)

    setTimeout(demox, 2500)
    setTimeout(demox, 2750)
    setTimeout(demox, 3050)


    var mousein = false
    function demox() {
      if (mousein) return
      document.getElementById('demox' + count++)
        .classList.toggle('hover')

    }

    function demo2x() {
      if (mousein) return
      document.getElementById('demo2x')
        .classList.toggle('hover')
    }

    function reset() {
      count = 1
      var hovers = document.querySelectorAll('.hover')
      for (var i = 0; i < hovers.length; i++) {
        hovers[i].classList.remove('hover')
      }
    }

    document.addEventListener('mouseover', function () {
      mousein = true
      reset()
    })
  </script>

  <!--custom js link -->
  <script src="../assets/js/taaza.js"></script>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>

<script>
  function subTotal() {
    console.log("Running subTotal()");
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    for (var i = 0; i < iprice.length; i++) {
      var price = parseFloat(iprice[i].value);
      var quantity = parseInt(iquantity[i].value);
      var total = price * quantity;
      itotal[i].innerText = total + '₹'; // Show the total for each item
      gt += total;
    }
    gtotal.innerText = 'Total: ' + gt + '₹'; // Show the grand total
  }
  subTotal();
</script>
