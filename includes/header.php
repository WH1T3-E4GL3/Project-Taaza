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
<style>
  .remove-button {
    background-color: #4CAF50; /* Green */
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
                echo'<a href="login.php" class="nav-link">Register/Login</a>';
              }
            ?>
              
            </li>

          </ul>
        </b>

        <!--Cart count badge checker -->
        <?php
          if(isset($_SESSION['cart']))
          {
            $count=count($_SESSION['cart']);
          }
          else
          {
            $count=0;
          }
        ?>

          <div class="navbar-btn-group">

            <button class="shopping-cart-btn">
              <img src="./assets/images/cart.svg" alt="shopping cart icon" width="18">
              <span class="count"><?php echo $count ?></span>
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

              <h5 class="product-name">
                <?php
                $total=0;
                if(isset($_SESSION['cart']))
                  {
                  foreach($_SESSION['cart'] as $key => $value)
                    {
                      $total=$total+$value['price'];           
                      echo"
                      <tr>
                        <td>$value[Item_name]<br></td>
                        <td>$value[price]₹</td>
                        <td><input type='number' value=$value[Quantity] min='1' max='10' placeholder='Quantity'></td>
                        <td>
                        <form action='manage_cart.php' method='POST'>
                        <button name='remove_item' class='remove-button remove-button1'>Remove</button>
                        <input type='hidden' name='Item_name' value='$value[Item_name]'>
                        </form></td><br>
                      </tr>";
                    }
                    }
                ?>
              </h5>
              <p class="product-price">
                <span class="small">₹</span><?php echo $total ?>
              </p>
            </a>
          </li>

        </ul>
        <div class="cart-btn-group">
          <button class="btn btn-primary">Checkout</button>
        </div>
      </div>
          
  
    </header>
    <main>
