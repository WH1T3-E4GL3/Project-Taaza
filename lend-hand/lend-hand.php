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
        .vip-button {
  background-image: linear-gradient(to right, #0d5215 , green);
  color: white;
  width: 100%;
  font-size: var(--fs-7);
  text-transform: uppercase;
  padding: 20px 30px;
  text-align: center;
  border-radius: 7px;
        }

        .form-field {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.scrolling-box {
  background-color: #eaeaea;
  display: block;
  width: 100%;
  height: 800px;
  padding: 1em;
  overflow-y: scroll;
  text-align: center;
}
/* Style for the scrolling box */
.scrolling-box {
    background-color: #eaeaea;
    display: block;
    width: 100%;
    height: 300px; /* Adjust the height as needed */
    overflow-y: scroll;
    padding: 10px; /* Add padding for better readability */
}

/* Style for the table */
table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

/* Style for table header */
table th {
    background-color: #f2f2f2; /* Light gray background for headers */
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd; /* Bottom border for header row */
}

/* Style for alternating table rows */
table tr:nth-child(even) {
    background-color: #f9f9f9; /* Lighter background color for even rows */
}

/* Style for table cells */
table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd; /* Bottom border for each cell */
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

            <s<section class="contact-section" id="home">
                <div class="contact-container">
                    <div class="contact-content">
                        <h2 style="font-size:30px;">Lend Us A Hand</h2>
                        <br>
                        <p>
                            Lend us a hand and help to provide food for the needed ones...
                        </p>
                        <br>

                    <form action="lend_hand_handler.php" method="POST">
    <label for="activationAmount">Enter your desired amount and send (Rs):</label>
    <input class="form-field" type="number" name="activationAmount" id="activationAmount" required>
    <br>
    <input type="checkbox" id="anonymousCheckbox" name="anonymousCheckbox">
    <label for="anonymousCheckbox">Hide your details (Anonymous sending - Your name, email and other details will not be displayed)</label>
    <br><br>
    <button type="submit" class="vip-button" name="activateVip">Send Money</button>
</form>




                    </div>
                    <figure class="hero-banner">
                        <img src="../assets/images/lend-hand/lend-hand.jpg" width="700" height="600" style="border:1;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </figure>
                </div>
                </section>

                <div class="scrolling-box">
                <?php
                $conn = new mysqli("localhost", "root", "", "taaza_db");

                // Query to fetch all user details from the lend_hand table
                $query = "SELECT `id`, `name`, `email`, `amount`, `timestamp`, `show_detail` FROM `lend_hand`";
                $result = mysqli_query($conn, $query);

                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    echo '<table>';
                    echo '<tr><h2 style="color:#0d5215;">Our Dearest Users Donated Us</h2></tr><br>';
                    echo '<tr><th>Name</th><th>Email</th><th>Amount</th><th>Time of donation</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['amount'] . '</td>';
                        echo '<td>' . $row['timestamp'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo 'No user details found.';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>

                <br><br><br><br>

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
