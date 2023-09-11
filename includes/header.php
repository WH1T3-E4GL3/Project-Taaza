<?php
define("APPURL", "http://localhost/taaza");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taaza</title>
  <link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">

  <!-- custom css link -->
  <link rel="stylesheet" href="./assets/css/taaza.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">

  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>

  <!-- main container -->

  <div class="container">

    <!-- #HEADER -->

    <header>

      <nav class="navbar">

        <div class="navbar-wrapper">

          <a href="#">
            <img src="./assets/images/logo.png" alt="logo" width="130">
          </a>
          <b>
          <ul class="navbar-nav">

            <li>
              <a href="index.php" class="nav-link">Home</a>
            </li>

            <li>
              <a href="about.php" class="nav-link">About</a>
            </li>

            <li>
              <a href="services.php" class="nav-link">Services</a>
            </li>

            <li>
              <a href="menu.php" class="nav-link">Our Menu</a>
            </li>

            <li>
              <a href="contact.php" class="nav-link">Contact</a>
            </li>

            <li>
              <?php
              if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
              {
                echo'<a href="logout.php" class="nav-link">Logout</a>';
              }
              else{
                echo'<a href="login.php" class="nav-link">Login</a>';
              }
            ?>
              
            </li>

          </ul>
        </b>

          <div class="navbar-btn-group">

            <button class="shopping-cart-btn">
              <img src="./assets/images/cart.svg" alt="shopping cart icon" width="18">
              <span class="count">5</span>
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

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu1.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Veg Salad</h5>
              <p class="product-price">
                <span class="small">$</span>9
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu2.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Chevrefried with honey</h5>
              <p class="product-price">
                <span class="small">$</span>14
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu3.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Crispy fish</h5>
              <p class="product-price">
                <span class="small">$</span>4
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu4.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Special Biriyani</h5>
              <p class="product-price">
                <span class="small">$</span>11
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu5.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Sea bream carpaccio</h5>
              <p class="product-price">
                <span class="small">$</span>19
              </p>
            </a>
          </li>

        </ul>
        <div class="cart-btn-group">
          <button class="btn btn-secondary">View order</button>
          <button class="btn btn-primary">Checkout</button>
        </div>
      </div>
    </header>
    <main>
