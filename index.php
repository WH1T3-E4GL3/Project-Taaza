<?php
session_start();
?>
<?php require "includes/header.php"; ?>
    <main>


      <!-- #HOME SECTION -->

      <section class="home" id="home">

        <div class="home-left">
          <!-- Php code to decide to display admin message or not -->
        <?php
          require_once "includes/connection.php";

          // Fetch the admin message data
          $adminMessageQuery = "SELECT `id`, `message`, `enable_meessage` FROM `admin_message` WHERE 1";
          $adminMessageResult = mysqli_query($conn, $adminMessageQuery);

          if ($adminMessageResult) {
              $adminMessageData = mysqli_fetch_assoc($adminMessageResult);

              // Check if the enable_meessage is 1
              if ($adminMessageData['enable_meessage'] == 1) {
                  // Display the message using marquee
                  echo "<marquee style='color:green'>" . htmlspecialchars($adminMessageData['message']) . "</marquee>";
              } else {
                  // If enable_meessage is not 1, do nothing
              }
          } else {
              // Handle the error
              echo "Error: " . mysqli_error($conn);
              exit; // Ensure that the script stops execution in case of an error
          }
          ?>

          <p class="home-subtext">Hi, new friend !</p>

          <h1 class="main-heading">We do not cook, we create your emotions!</h1>

          <p class="home-text">
            Your tongue also have it's own dreams. Taaza is the perfect place for your fantasies.
          </p>

          <div class="btn-group">
            <a href="login.php" style="color: black;">
            <button class="btn btn-primary btn-icon">
              <img src="./assets/images/menu.svg" alt="menu icon">             
              Login          
            </button>
            </a>

            <a href="about.php" style="color: black;">
            <button class="btn btn-secondary btn-icon">
              <img src="./assets/images/arrow.svg" alt="menu icon">
              About us
            </button>
          </a>
          </div>
        </div>

        <div class="home-right">

          <img src="./assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
          <img src="./assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
          <img src="./assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

          <img src="./assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
          <img src="./assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

        </div>
      </section>


      <!-- #ABOUT SECTION  -->

      <section class="about" id="about">

        <div class="about-left">

          <div class="img-box">
            <img src="./assets/images/about-image.jpg" alt="about image" class="about-img" width="250">
          </div>

          <div class="abs-content-box">
            <div class="dotted-border">
              <p class="number-lg">1</p>
              <p class="text-md">In <br> Serving you</p>
            </div>
          </div>

          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-6" width="20">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-7" width="30">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-8" width="35">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-9" width="80">

        </div>

        <div class="about-right">

          <h2 class="section-title">We are doing more than
            you expect</h2>

          <p class="section-text">
            At Taaza, we are more than just a food hub - we're your culinary companions on a delightful journey through flavors, tastes, and experiences. Our passion for food, combined with a commitment to quality and innovation, drives everything we do.<br> We believe in the magic of fresh ingredients, thoughtfully prepared recipes, and the joy of sharing a meal with loved ones. Our chefs are dedicated to crafting dishes that not only tantalize your taste buds but also tell a story. From traditional favorites to modern interpretations, every dish is a testament to our commitment to culinary excellence.
          </p>

          <p class="section-text">
            "At Taaza, we offer a comprehensive range of services designed to elevate your dining experience. Whether you're in the mood for delicious food delivered to your doorstep, planning a special event and need the perfect venue, prefer the classic restaurant experience with table booking, or require catering services for your off-site gatherings, Taaza has you covered. Our commitment to excellence extends to constantly innovating and surprising our customers with special promotions, seasonal menus, and exciting culinary events. Join us at Taaza, where every service we provide is aimed at exceeding your expectations and making every moment a memorable one."
          </p>

          <img src="./assets/images/signature.png" alt="signature" class="signature" width="150">
        </div>
      </section>



      <!-- #SERVICES SECTION  -->

      <section class="services" id="services">

        <div class="service-card">

          <p class="card-number">01</p>

          <h3 class="card-heading">Online food delivery</h3>

          <p class="card-text">
            You can order the foods from our restaurant online and we will deliver in your doorsteps, you can also track the progress of delivery.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">02</p>

          <h3 class="card-heading">Table booking</h3>

          <p class="card-text">
            You can pre-book a table available in our restaurant, that desired table will be free for you when you come.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">03</p>

          <h3 class="card-heading">Bulk booking & catering for events</h3>

          <p class="card-text">
            Our restaurent offers catering service and you can book bulk food for events like wedding.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">04</p>

          <h3 class="card-heading">Discount for premium members</h3>

          <p class="card-text">
            If you are a premium member in our website, you will get special discount from our restaurent, you can scan our QR code in restaurent and we will avail the discount foe you.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">05</p>

          <h3 class="card-heading">Food Donation</h3>

          <p class="card-text">
            As food enthusiasts we know the importance and value  of food for everyone in our society. We donate food for the needed ones.
          </p>

        </div>

      </section>
      <center>
      <button class="btn btn-secondary btn-icon">
        <a href="services.php" style="color: black;">
          <img src="./assets/images/arrow.svg" alt="menu icon">
          Explore our services
          </a>
      </button>
    </center>



      <!-- #PRODUCT SECTION -->

      <section class="product" id="menu">

        <h2 class="section-title">Most popular dishes</h2>

        <p class="section-text">
          The following dishes have a high demant in our restaurant😁
        </p>

        <div class="products-grid">

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./assets/images/menu1.jpg" alt="product image" class="product-img" width="200" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Special Biriyani</h3>

                  <p class="product-price">
                    <span class="small">₹</span>180
                  </p>
                </div>

                <p class="product-text">
                  tomatoes, nori, feta cheese, mushrooms, rice noodles, corn, shrimp.
                </p>

                <div class="product-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                </div>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./assets/images/menu2.jpg" alt="product image" class="product-img" width="200" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Chicken Al Fahm</h3>

                  <p class="product-price">
                    <span class="small">₹</span>720
                  </p>
                </div>

                <p class="product-text">
                  tomatoes, nori, feta cheese, mushrooms, rice noodles, corn, shrimp.
                </p>

                <div class="product-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                </div>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./assets/images/menu3.jpg" alt="product image" class="product-img" width="200" loading="lazy">

                <div class="card-badge green">
                  <ion-icon name="leaf"></ion-icon>
                  <p>Vegan</p>
                </div>
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Veg Salad</h3>

                  <p class="product-price">
                    <span class="small">₹</span>120
                  </p>
                </div>

                <p class="product-text">
                  tomatoes, nori, feta cheese, mushrooms, rice noodles, corn, shrimp.
                </p>

                <div class="product-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                </div>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./assets/images/menu4.jpg" alt="product image" class="product-img" width="200" loading="lazy">

                <div class="card-badge red">
                  <ion-icon name="flame"></ion-icon>
                  <p>Hot</p>
                </div>
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Ramen</h3>

                  <p class="product-price">
                    <span class="small">₹</span>400
                  </p>
                </div>

                <p class="product-text">
                  tomatoes, nori, feta cheese, mushrooms, rice noodles, corn, shrimp.
                </p>

                <div class="product-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                </div>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./assets/images/menu5.jpg" alt="product image" class="product-img" width="200" loading="lazy">

                <div class="card-badge green">
                  <ion-icon name="leaf"></ion-icon>
                  <p>Vegan</p>
                </div>
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Veg Pasta</h3>

                  <p class="product-price">
                    <span class="small">₹</span>100
                  </p>
                </div>

                <p class="product-text">
                  tomatoes, nori, feta cheese, mushrooms, rice noodles, corn, shrimp.
                </p>

                <div class="product-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                </div>

              </div>

            </div>

          </a>

          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="./assets/images/menu6.jpg" alt="product image" class="product-img" width="200" loading="lazy">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">Chappathi</h3>

                  <p class="product-price">
                    <span class="small">₹</span>80
                  </p>
                </div>

                <p class="product-text">
                  tomatoes, nori, feta cheese, mushrooms, rice noodles, corn, shrimp.
                </p>

                <div class="product-rating">
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                </div>
              </div>
            </div>
          </a>
        </div>

        <a href="menu.php" style="color: black;">
        <button class="btn btn-primary btn-icon">
          <img src="./assets/images/menu.svg" alt="menu icon">
          Full menu
        </button>
      </a>
      </section>



      <!-- #TESTIMONIALS SECTION -->

      <section class="testimonials" id="testimonials">

        <h2 class="section-title">What our customers say?</h2>

        <p class="section-text">
          Consectetur numquam poro nemo veniam
          eligendi rem adipisci quo modi.
        </p>

        <div class="testimonials-grid">

          <div class="testimonials-card">

            <h4 class="card-title">Very tasty</h4>

            <div class="testimonials-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>

            <p class="testimonials-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis fugiat totam nobis quas unde excepturi
              inventore possimus
              laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
              tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam
              labore,
              aliquam dolor harum!
            </p>

            <div class="customer-info">
              <div class="customer-img-box">
                <img src="./assets/images/testimonials1.jpg" alt="customer image" class="customer-img" width="100" loading="lazy">
              </div>

              <h5 class="customer-name">Emma Newman</h5>
            </div>

          </div>

          <div class="testimonials-card">
          
            <h4 class="card-title">I have lunch here every day</h4>
          
            <div class="testimonials-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>
          
            <p class="testimonials-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis fugiat totam nobis quas unde excepturi
              inventore possimus
              laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
              tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam
              labore,
              aliquam dolor harum!
            </p>
          
            <div class="customer-info">
              <div class="customer-img-box">
                <img src="./assets/images/testimonials2.jpg" alt="customer image" class="customer-img" width="100" loading="lazy">
              </div>
          
              <h5 class="customer-name">Paul Trueman</h5>
            </div>    
          </div>
        </div>
      </section>
    </main>


    <!-- #FOOTER -->

    <footer>
      <div class="footer-wrapper">
        <a href="#">
          <img src="./assets/images/logo.png" alt="logo" class="footer-brand" width="150">
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
  <script src="./assets/js/taaza.js"></script>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
