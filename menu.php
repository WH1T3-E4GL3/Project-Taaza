<?php
session_start();
?>
<?php require "includes/header.php"; ?>

      <style type="text/css">

      :root {
        --purple: hsl(240, 80%, 89%);
        --pink: hsl(0, 59%, 94%);
        --light-bg: hsl(204, 37%, 92%);
        --light-gray-bg: hsl(0, 0%, 94%);
        --white: hsl(0, 0%, 100%);
        --dark: hsl(0, 0%, 7%);
        --text-gray: hsl(0, 0%, 30%);
      }
      body {
        font-family: "Space Grotesk", sans-serif;
        color: var(--dark);
        margin-top: 150px;
      }
      .veg{
        background-color:#a4ebbe;
      }
      .non-veg{
        background-color:#eba4a9;
      }
      .local-taste{
        background-color:#a4b1eb;
      }
      .sea-foods{
        background-color:#8ee4ed;
      }
      .chineese{
        background-color:#945d60;
      }

      h3 {
        font-size: 1.5em;
        font-weight: 700;
      }
      p {
        font-size: 1em;
        line-height: 1.7;
        font-weight: 300;
        color: var(--text-gray);
      }
      .description {
        white-space: wrap;
      }
      a {
        text-decoration: none;
        color: inherit;
      }
      .wrap {
        display: flex;
        justify: space-between;
        align-items: stretch;
        width: 100%;
        gap: 24px;
        padding: 24px;
        flex-wrap: wrap;
      }
      .box {
        display: flex;
        flex-direction: column;
        flex-basis: 100%;
        position: relative;
        padding: 24px;
        background: #fff;
      }
      .box-top {
        display: flex;
        flex-direction: column;
        position: relative;
        gap: 12px;
        margin-bottom: 36px;
      }
      .box-top::before,
.box-top::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0));
  opacity: 0;
}

.box-top::before {
  top: 0;
  left: 0;
}

.box-top::after {
  bottom: 0;
  right: 0;
}

.box:hover .box-top::before,
.box:hover .box-top::after {
  animation: flash 1.5s ease forwards;
}

@keyframes flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

.box:hover .box-image {
  transform: scale(1.1);
}

      .box-image {
        width: 100%;
        height: 360px;
        object-fit: cover;
        object-position: 50% 20%;
        transition: transform 0.3s, opacity 0.3s;
      }
      .box:hover .box-image {
        transform: scale(1.1);
      }
      .title-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .box-title {
        border-left: 3px solid var(--purple);
        padding-left: 12px;
      }
      .user-follow-info {
        color: hsl(0, 0%, 60%);
      }
      .button {
        display: block;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: auto;
        padding: 16px;
        color: #000;
        background: transparent;
        box-shadow: 0px 0px 0px 1px black inset;
        transition: background 0.4s ease;
        width: 100%;
      }
      .button:hover {
        background: var(--purple);
      }
      .fill-one {
        background: var(--light-bg);
      }
      .fill-two {
        background: var(--pink);
      }
      /* RESPONSIVE QUERIES */
      @media (min-width: 320px) {
        .title-flex {
          display: flex;
          flex-direction: column;
          justify-content: flex-start;
          align-items: start;
        }
        .user-follow-info {
          margin-top: 6px;
        }
      }
      @media (min-width: 460px) {
        .title-flex {
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          align-items: start;
        }
        .user-follow-info {
          margin-top: 6px;
        }
      }
      @media (min-width: 640px) {
        .box {
          flex-basis: calc(50% - 12px);
        }
        .title-flex {
          display: flex;
          flex-direction: column;
          justify-content: flex-start;
          align-items: start;
        }
        .user-follow-info {
          margin-top: 6px;
        }
      }
      @media (min-width: 840px) {
        .title-flex {
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          align-items: start;
        }
        .user-follow-info {
          margin-top: 6px;
        }
      }
      @media (min-width: 1024px) {
        .box {
          flex-basis: calc(33.3% - 16px);
        }
        .title-flex {
          display: flex;
          flex-direction: column;
          justify-content: flex-start;
          align-items: start;
        }
        .user-follow-info {
          margin-top: 6px;
        }
      }
      @media (min-width: 1100px) {
        .box {
          flex-basis: calc(25% - 18px);
        }
      }

      </style>
<div class="veg"><br>
    <center>
      <h3>VEGITARIAN</h3>
    </center>
    <div class="wrap">
      
      <!-- Masala Dosa -->
      <div class="box">
        <div class="box-top">
          <img class="box-image" src="./assets/images/menu/veg/1.png" alt="Girl Eating Pizza">
          <div class="title-flex">
            <h3 class="box-title">Masala Dosa</h3>
            <p class="user-follow-info">100 ₹</p>
          </div>
          <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
        </div>
        <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
          <input type='hidden' name='Item_name' value='Masala dosa'>
          <input type='hidden' name='price' value='100'>
        </form>
      </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/2.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">veg Biriyani</h3>
        <p class="user-follow-info">150 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
  <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="veg biriyani">
    <input type="hidden" name="price" value="150" >
  </form>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/3.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Chilli Gobi</h3>
        <p class="user-follow-info">130 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
  <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="chilli gobi">
    <input type="hidden" name="price" value="130" >
  </form>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/4.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Butter Nan</h3>
        <p class="user-follow-info">100 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
  <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="butter nan">
    <input type="hidden" name="price" value="100" >
  </form>
  </div>
</div>

<!--###################################################################################################################################################################-->

<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/5.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Gobi Manjuri</h3>
        <p class="user-follow-info">220 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="Gobi Manjuri">
    <input type="hidden" name="price" value="220" >
  </form>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/6.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Paneer Masala</h3>
        <p class="user-follow-info">100 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="Paneer Masala">
    <input type="hidden" name="price" value="100" >
  </form>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/7.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Alu porotta</h3>
        <p class="user-follow-info">120 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="Alu porotta">
    <input type="hidden" name="price" value="120" >
  </form>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu/veg/8.png" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Garlic Nan</h3>
        <p class="user-follow-info">110 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <form action="manage_cart.php" method="POST">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
              echo '<button type="submit" name="Add_To_Cart" class="button">Buy</button>';
            }
            else
            {
              echo '<a href="new-login.php" class="button">Login to Add to Cart</a>';
            }
          ?>
    <input type="hidden" name="Item_name" value="Garlic Nan">
    <input type="hidden" name="price" value="110" >
  </form>
  </div>
</div>
</div>

<!--###################################################################################################################################################################-->

<br><hr><br>

<div class="non-veg"><br>
<center><h3>NON-VEGITARIAN</h3></center>
<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>

<!--###################################################################################################################################################################-->

<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>
</div>

<!--###################################################################################################################################################################-->
<br><hr><br>

<div class="local-taste"><br>
<center><h3>Local Taste</h3></center>
<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>

<!--###################################################################################################################################################################-->

<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>
</div>

<!--###################################################################################################################################################################-->

<br><hr><br>

<div class="sea-foods"><br>
<center><h3>Sea Foods</h3></center>
<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>

<!--###################################################################################################################################################################-->

<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>
</div>

<!--###################################################################################################################################################################-->
<br><hr><br>

<div class="chineese"><br>
<center><h3>chineese</h3></center>
<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>

<!--###################################################################################################################################################################-->

<div class="wrap">
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">Buy Now</a>
  </div>
  <div class="box">
    <div class="box-top">
      <img class="box-image" src="./assets/images/menu2.jpg" alt="Girl Eating Pizza">
      <div class="title-flex">
        <h3 class="box-title">Al Fahm</h3>
        <p class="user-follow-info">750 ₹</p>
      </div>
      <p class="description">Al Fahm Arabian Whipped steamed roast cream beans macchiato skinny grinder café. Iced grinder go mocha steamed grounds cultivar panna aroma.</p>
    </div>
    <a href="#" class="button">buy Now</a>
  </div>
</div>
</div>

<br>

<?php require "includes/footer.php"; ?>
