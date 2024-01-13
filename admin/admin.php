<?php
session_start();

// Check if admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to admin-login.php
    echo"
        <script>alert('Login as admin first to access admin page !');
        window.location.href='admin-login.php';
        </script>
        ";
    exit(); // Ensure script stops here
}
?>
<?php
include_once '../includes/connection.php';
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
                        <a href="#" class="nav-link">Admin Section</a>
                    </a>
                    <b>
                        <ul class="navbar-nav">

                        <li>
                                <?php
                                    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                                        echo '<a href="admin.php" class="nav-link">Admin Dashboard</a>';
                                    }
                                    ?>
                            </li>

                            <li>
                                <?php
                                    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
                                        echo '<a href="admin-logout.php" class="nav-link">Logout</a>';
                                    } else {
                                        echo '<a href="admin-login.php" class="nav-link">Login</a>';
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

            <s<section class="contact-section" id="home">
                <div class="contact-container">
                    <div class="contact-content">
                        <div class="form-container1">
                <div class="form-title"><b>Admin</b></div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia architecto distinctio ducimus harum animi veniam tenetur, maxime delectus sint aut. Rerum ea ut animi repudiandae aliquid delectus corporis, eos beatae nesciunt asperiores cumque iusto consectetur accusamus reprehenderit magni deserunt perspiciatis necessitatibus dolorem ipsum minus tenetur ullam praesentium illum. Blanditiis, vel.
              </div>
            </div>

            <figure class="hero-banner">
            <div class="home-right" style="margin-top: 1cm;">

          <img src="../assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
          <img src="../assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
          <img src="../assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

          <img src="../assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
          <img src="../assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

          <img src="../assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
          <img src="../assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
          <img src="../assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
          <img src="../assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
          <img src="../assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

        </div>
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

    <!--custom js link -->
    <script src="../assets/js/taaza.js"></script>

    <!-- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>