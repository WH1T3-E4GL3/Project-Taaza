<?php
session_start();
require_once "includes/connection.php";

// Fetch the admin data
$adminQuery = "SELECT `id`, `email`, `name`, `password`, `resettoken`, `resettokenexpire`, `enable_menu_page` FROM `admin` WHERE 1";
$adminResult = mysqli_query($conn, $adminQuery);

if ($adminResult) {
    $adminData = mysqli_fetch_assoc($adminResult);

    // Check if the enable_table_booking is 1
    if ($adminData['enable_menu_page'] == 1) {
        // Continue loading the page
    } else {
        // The table booking is disabled, show an alert and prevent further content rendering
        echo "<script>
                alert('Menu page and ordering food is unavailable now, Try later [disabled by admin]');
                window.location.href = 'services.php'; // Redirect to your desired page
              </script>";
        exit; // Ensure that the script stops execution after redirecting
    }
} else {
    // Handle the error
    echo "Error: " . mysqli_error($conn);
    exit; // Ensure that the script stops execution in case of an error
}

?>

<link rel="stylesheet" href="./assets/css/menu.css">
<?php require "includes/header.php"; ?>

<center>
  <!--Buttons for navigation to sections within the page-->
  <a class="nbutton nbutton1" href="#vegan-section">Vegan</a>
  <a class="nbutton nbutton3" href="#non-veg-section">Non-Veg</a>
  <a class="nbutton nbutton4" href="#local-taste-section">Local Taste</a>
  <a class="nbutton nbutton2" href="#sea-foods-section">Sea Food</a>
  <a class="nbutton nbutton5" href="#chinese-section">Chinese</a>
</center>

<div class="veg vegan-section" id="vegan-section"><br>
  <center>
    <h3>VEGETARIAN</h3>
  </center>
  <div class="wrap">
      <?php
        // Base directory where images are stored
        $imageDirectory = 'assets/images/menu/veg/';

        // Fetching veg menu items with image filenames
        $vegMenuItemQuery = "SELECT `id`, `name`, `description`, `price`, `quantity`, `available`, `image_path` FROM `menu_items` WHERE `category` = 'veg'";
        $vegMenuItemResult = mysqli_query($conn, $vegMenuItemQuery);

        if ($vegMenuItemResult && mysqli_num_rows($vegMenuItemResult) > 0) {
            while ($row = mysqli_fetch_assoc($vegMenuItemResult)) {
                // Constructing full image path
                $imagePath = $imageDirectory . $row['image_path'];

                // Output menu item details along with dynamically constructed image path
                echo '<div class="box">';
                echo '<div class="box-top">';
                echo '<img class="box-image" src="' . $imagePath . '" alt="' . $row['name'] . '">';
                echo '<div class="title-flex">';
                echo '<h3 class="box-title">' . $row['name'] . '</h3>';
                echo '<p class="user-follow-info">' . $row['price'] . ' ₹</p>';
                echo '</div>';
                echo '<p class="description">' . $row['description'] . '</p>';
                echo '</div>';
                echo '<form action="manage_cart.php" method="POST">';
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    if ($row['available'] == 1 && $row['quantity'] > 0) {
                        echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
                    } else {
                        echo '<button type="button" class="button" disabled>Not Available</button>';
                    }
                } else {
                    echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
                }
                echo '<input type="hidden" name="Item_name" value="' . $row['name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '" >';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No vegetarian items available.</p>';
        }
        ?>

  </div>
</div>

<br>

<div class="non-veg non-veg-section" id="non-veg-section"><br>
  <center>
    <h3>NON-VEG</h3>
  </center>
  <div class="wrap">
      <?php
        // Base directory where images are stored
        $imageDirectory = 'assets/images/menu/non-veg/';

        // Fetching veg menu items with image filenames
        $vegMenuItemQuery = "SELECT `id`, `name`, `description`, `price`, `quantity`, `available`, `image_path` FROM `menu_items` WHERE `category` = 'Non-Veg'";
        $vegMenuItemResult = mysqli_query($conn, $vegMenuItemQuery);

        if ($vegMenuItemResult && mysqli_num_rows($vegMenuItemResult) > 0) {
            while ($row = mysqli_fetch_assoc($vegMenuItemResult)) {
                // Constructing full image path
                $imagePath = $imageDirectory . $row['image_path'];

                // Output menu item details along with dynamically constructed image path
                echo '<div class="box">';
                echo '<div class="box-top">';
                echo '<img class="box-image" src="' . $imagePath . '" alt="' . $row['name'] . '">';
                echo '<div class="title-flex">';
                echo '<h3 class="box-title">' . $row['name'] . '</h3>';
                echo '<p class="user-follow-info">' . $row['price'] . ' ₹</p>';
                echo '</div>';
                echo '<p class="description">' . $row['description'] . '</p>';
                echo '</div>';
                echo '<form action="manage_cart.php" method="POST">';
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    if ($row['available'] == 1 && $row['quantity'] > 0) {
                        echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
                    } else {
                        echo '<button type="button" class="button" disabled>Not Available</button>';
                    }
                } else {
                    echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
                }
                echo '<input type="hidden" name="Item_name" value="' . $row['name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '" >';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No vegetarian items available.</p>';
        }
        ?>

  </div>
</div>

<br>

<div class="local-taste local-taste-section" id="local-taste-section"><br>
  <center>
    <h3>LOCAL TASTE</h3>
  </center>
  <div class="wrap">
      <?php
        // Base directory where images are stored
        $imageDirectory = 'assets/images/menu/local/';

        // Fetching veg menu items with image filenames
        $vegMenuItemQuery = "SELECT `id`, `name`, `description`, `price`, `quantity`, `available`, `image_path` FROM `menu_items` WHERE `category` = 'Local Taste'";
        $vegMenuItemResult = mysqli_query($conn, $vegMenuItemQuery);

        if ($vegMenuItemResult && mysqli_num_rows($vegMenuItemResult) > 0) {
            while ($row = mysqli_fetch_assoc($vegMenuItemResult)) {
                // Constructing full image path
                $imagePath = $imageDirectory . $row['image_path'];

                // Output menu item details along with dynamically constructed image path
                echo '<div class="box">';
                echo '<div class="box-top">';
                echo '<img class="box-image" src="' . $imagePath . '" alt="' . $row['name'] . '">';
                echo '<div class="title-flex">';
                echo '<h3 class="box-title">' . $row['name'] . '</h3>';
                echo '<p class="user-follow-info">' . $row['price'] . ' ₹</p>';
                echo '</div>';
                echo '<p class="description">' . $row['description'] . '</p>';
                echo '</div>';
                echo '<form action="manage_cart.php" method="POST">';
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    if ($row['available'] == 1 && $row['quantity'] > 0) {
                        echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
                    } else {
                        echo '<button type="button" class="button" disabled>Not Available</button>';
                    }
                } else {
                    echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
                }
                echo '<input type="hidden" name="Item_name" value="' . $row['name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '" >';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No vegetarian items available.</p>';
        }
        ?>

  </div>
</div>

<br>

<div class="sea-foods sea-foods-section" id="sea-foods-section"><br>
  <center>
    <h3>SEA FOOD</h3>
  </center>
  <div class="wrap">
      <?php
        // Base directory where images are stored
        $imageDirectory = 'assets/images/menu/sea-food/';

        // Fetching veg menu items with image filenames
        $vegMenuItemQuery = "SELECT `id`, `name`, `description`, `price`, `quantity`, `available`, `image_path` FROM `menu_items` WHERE `category` = 'Seafood'";
        $vegMenuItemResult = mysqli_query($conn, $vegMenuItemQuery);

        if ($vegMenuItemResult && mysqli_num_rows($vegMenuItemResult) > 0) {
            while ($row = mysqli_fetch_assoc($vegMenuItemResult)) {
                // Constructing full image path
                $imagePath = $imageDirectory . $row['image_path'];

                // Output menu item details along with dynamically constructed image path
                echo '<div class="box">';
                echo '<div class="box-top">';
                echo '<img class="box-image" src="' . $imagePath . '" alt="' . $row['name'] . '">';
                echo '<div class="title-flex">';
                echo '<h3 class="box-title">' . $row['name'] . '</h3>';
                echo '<p class="user-follow-info">' . $row['price'] . ' ₹</p>';
                echo '</div>';
                echo '<p class="description">' . $row['description'] . '</p>';
                echo '</div>';
                echo '<form action="manage_cart.php" method="POST">';
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    if ($row['available'] == 1 && $row['quantity'] > 0) {
                        echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
                    } else {
                        echo '<button type="button" class="button" disabled>Not Available</button>';
                    }
                } else {
                    echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
                }
                echo '<input type="hidden" name="Item_name" value="' . $row['name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '" >';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No vegetarian items available.</p>';
        }
        ?>

  </div>
</div>

<br>

<div class="chineese chinese-section" id="chinese-section"><br>
  <center>
    <h3>CHINESE</h3>
  </center>
  <div class="wrap">
      <?php
        // Base directory where images are stored
        $imageDirectory = 'assets/images/menu/chinese/';

        // Fetching veg menu items with image filenames
        $vegMenuItemQuery = "SELECT `id`, `name`, `description`, `price`, `quantity`, `available`, `image_path` FROM `menu_items` WHERE `category` = 'Chinese'";
        $vegMenuItemResult = mysqli_query($conn, $vegMenuItemQuery);

        if ($vegMenuItemResult && mysqli_num_rows($vegMenuItemResult) > 0) {
            while ($row = mysqli_fetch_assoc($vegMenuItemResult)) {
                // Constructing full image path
                $imagePath = $imageDirectory . $row['image_path'];

                // Output menu item details along with dynamically constructed image path
                echo '<div class="box">';
                echo '<div class="box-top">';
                echo '<img class="box-image" src="' . $imagePath . '" alt="' . $row['name'] . '">';
                echo '<div class="title-flex">';
                echo '<h3 class="box-title">' . $row['name'] . '</h3>';
                echo '<p class="user-follow-info">' . $row['price'] . ' ₹</p>';
                echo '</div>';
                echo '<p class="description">' . $row['description'] . '</p>';
                echo '</div>';
                echo '<form action="manage_cart.php" method="POST">';
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    if ($row['available'] == 1 && $row['quantity'] > 0) {
                        echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
                    } else {
                        echo '<button type="button" class="button" disabled>Not Available</button>';
                    }
                } else {
                    echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
                }
                echo '<input type="hidden" name="Item_name" value="' . $row['name'] . '">';
                echo '<input type="hidden" name="price" value="' . $row['price'] . '" >';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No vegetarian items available.</p>';
        }
        ?>

  </div>
</div>
<br>

<?php require "includes/footer.php"; ?>
