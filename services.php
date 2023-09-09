<?php require "includes/header.php"; ?>

<style>
body {
  font-family: "Oxygen", sans-serif;
  color: #050505;
  margin-top: 120px;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

.main {
  max-width: 1200px;
  margin: 0 auto;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards_item {
  display: flex;
  padding: 1rem;
}

.card_image {
  position: relative;
  max-height: 250px;
}

.card_image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.card_price {
  position: absolute;
  bottom: 8px;
  right: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 45px;
  height: 45px;
  border-radius: 0.25rem;
  background-color: #c89b3f;
  font-size: 18px;
  font-weight: 700;
}

.card_price span {
  font-size: 12px;
  margin-top: -2px;
}

.note {
  position: absolute;
  top: 8px;
  left: 8px;
  padding: 4px 8px;
  border-radius: 0.25rem;
  background-color: #c89b3f;
  font-size: 14px;
  font-weight: 700;
}

@media (min-width: 40rem) {
  .cards_item {
    width: 50%;
  }
}

@media (min-width: 56rem) {
  .cards_item {
    width: 33.3333%;
  }
}

.card {
  background-color: white;
  border-radius: 0.25rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.card_content {
  position: relative;
  padding: 16px 12px 32px 24px;
  margin: 16px 8px 8px 0;
  max-height: 290px;
  overflow-y: scroll;
}

.card_content::-webkit-scrollbar {
  width: 8px;
}

.card_content::-webkit-scrollbar-track {
  box-shadow: 0;
  border-radius: 0;
}

.card_content::-webkit-scrollbar-thumb {
  background: #c89b3f;
  border-radius: 15px;
}

.card_title {
  position: relative;
  margin: 0 0 24px;
  padding-bottom: 10px;
  text-align: center;
  font-size: 20px;
  font-weight: 700;
}

.card_title::after {
  position: absolute;
  display: block;
  width: 50px;
  height: 2px;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  background-color: #c89b3f;
  content: "";
}

hr {
  margin: 24px auto;
  width: 50px;
  border-top: 2px solid #c89b3f;
}

.card_text p {
  margin: 0 0 24px;
  font-size: 14px;
  line-height: 1.5;
}

.card_text p:last-child {
  margin: 0;
}


</style>

<div class="main">
  <ul class="cards">
    <li class="cards_item">
      <div class="card">
        <div class="card_image">
          <img src="https://assets.codepen.io/652/photo-1468777675496-5782faaea55b.jpeg" alt="mixed vegetable salad in a mason jar." />
          <span class="card_price"><span>$</span>9</span>
        </div>
        <div class="card_content">
          <h2 class="card_title"><a href="menu.php">Order Food Now</a></h2>
          <div class="card_text">
            <p>You can easly order you favourite food from our tasty menu from you home.
              explore our full menu and just select your favourite and place order.
            </p>
            <hr />
            <p>Served with your choice of dressing on the side: <strong>housemade ranch</strong>, <strong>cherry balsamic
                vinaigrette</strong>, <strong>creamy chipotle</strong>, <strong>avocado green goddess</strong>, or <strong>honey mustard</strong>. Add your choice
              of protein for $2 more.
            </p>
          </div>
        </div>
      </div>
    </li>

    <li class="cards_item">
      <div class="card">
        <div class="card_image">
          <img src="https://assets.codepen.io/652/photo-1520174691701-bc555a3404ca.jpeg" alt="a Reuben sandwich on wax paper." />
          <span class="card_price"><span>$</span>18</span>
        </div>
        <div class="card_content">
          <h2 class="card_title"><a href="table-booking.php">Book A Table</a></h2>
          <div class="card_text">
            <p>you can prebook a table in our restaurent.  We will reserve it for you and when you come it will be free for you.
            </p>
            <p>Every element of this extraordinary blah blah blah...
            </p>
            <hr />
            <p>This unforgettable sandwich has all of the classic Reuben elements: <strong>corned beef</strong>, <strong>rye
                bread</strong>, <strong>creamy Russian dressing</strong>, <strong>sauerkraut</strong>, plus a <strong>sweet gherkin pickle</strong>.
              No substitions please!
            </p>
            <p>Add a side of <strong>french fries</strong> or <strong>sweet potato fries</strong> for $2 more, or our
              <strong>housemade pub chips</strong> for $1.
            </p>
          </div>
        </div>
      </div>
    </li>

    <li class="cards_item">
      <div class="card">
        <div class="card_image">
          <span class="note">Seasonal</span>
          <img src="https://assets.codepen.io/652/photo-1544510808-91bcbee1df55.jpeg" alt="A side view of a plate of figs and berries." />
          <span class="card_price"><span>$</span>16</span>
        </div>
        <div class="card_content">
          <h2 class="card_title"><a href="event-booking.php">Boook Us For An Event</a></h2>
          <div class="card_text">
            <p>Our restaurent offers catering service and you can book bulk food for events like wedding.
            </p>
            <hr />
            <p>Choose your drizzle: <strong>cherry-balsamic vinegar</strong>, <strong>local honey</strong>, or
              <strong>housemade chocolate sauce</strong>. Blah Blah Blah... Write something huhh..
            </p>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>



<div class="main">
  <ul class="cards">
    <li class="cards_item">
      <div class="card">
        <div class="card_image">
          <img src="https://assets.codepen.io/652/photo-1468777675496-5782faaea55b.jpeg" alt="mixed vegetable salad in a mason jar." />
          <span class="card_price"><span>$</span>9</span>
        </div>
        <div class="card_content">
          <h2 class="card_title"><a href="premium.php">Become Our Premium Member</a></h2>
          <div class="card_text">
            <p>Become our premium member and avail  exciting offers and discounts only for you !
            </p>
            <hr />
            <p>Served with your choice of dressing on the side: <strong>housemade ranch</strong>, <strong>cherry balsamic
                vinaigrette</strong>, <strong>creamy chipotle</strong>, <strong>avocado green goddess</strong>, or <strong>honey mustard</strong>. Add your choice
              of protein for $2 more.
            </p>
          </div>
        </div>
      </div>
    </li>

    <li class="cards_item">
      <div class="card">
        <div class="card_image">
          <img src="https://assets.codepen.io/652/photo-1520174691701-bc555a3404ca.jpeg" alt="a Reuben sandwich on wax paper." />
          <span class="card_price"><span>$</span>18</span>
        </div>
        <div class="card_content">
          <h2 class="card_title"><a href="table-booking.php">Lent Us A Hand</a></h2>
          <div class="card_text">
            <p>As food enthusiasts we know the importance and value of food for everyone in our society. We donate food for the needed ones
            </p>
            <p>We Cant do it alone, we need your support too... Help us with what you got.
            </p>
            <hr />
            <p>This unforgettable sandwich has all of the classic Reuben elements: <strong>corned beef</strong>, <strong>rye
                bread</strong>, <strong>creamy Russian dressing</strong>, <strong>sauerkraut</strong>, plus a <strong>sweet gherkin pickle</strong>.
              No substitions please!
            </p>
            <p>Add a side of <strong>french fries</strong> or <strong>sweet potato fries</strong> for $2 more, or our
              <strong>housemade pub chips</strong> for $1.
            </p>
          </div>
        </div>
      </div>
    </li>

    
  </ul>
</div>




<?php require "includes/footer.php"; ?>