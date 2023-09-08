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
              <a href="login.php" class="nav-link">Login</a>
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
        margin-top: 100px;
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

    </header>

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

<?php require "includes/footer.php"; ?>
