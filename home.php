<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickSnack</title>
    <link
  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="icon" href="favicon.png" type="image/png">
    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="nav-logo" href="home.php"><Span>Quick</Span>Snacks</a>
            <div class="nav-content" id="navContent">
                <ul id="menu">
                    <li><a href="home.php" class="nav__link active">Home</a></li>


                    <li><a href="gallery.php" class="nav__link">Gallery</a></li>


                    <li><a href="various.php" class="nav__link">Services</a></li>

                    <?php

                    session_start();
                    if (isset($_SESSION["username"])) {
                    ?>
                        <p style="position: absolute;
                            top: 8px;
                            background-color: white;
                            padding: 3px 6px;
                            right: -65px;
                            border-radius: 15px;
                            box-shadow: 0px 3px 6px rgba(0, 0, 0, .2);
                            
                            "><a style="text-decoration: none;
                            color: black;
                            " href="./loginsystem/logout.php">Logout</a></p>
                    <?php
                    }
                    ?>

                    <?php


                    if (!isset($_SESSION["username"])) {
                    ?>
                        <div class="dropdown">
                            <i class="fa-solid fa-user" id="dropbtn"></i>
                            <div class="dropdown-content">
                                <a class="LoginControl" href="loginsystem/login.php">Login</a>
                                <a class="SignControl" href="loginsystem/registration.php">Sign Up</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
            <div class="navClose" id="nav-Close">
                <i class="fa-solid fa-xmark"></i>
            </div>

            </div>
            <div class="box">
                <div class="cart-count">0</div>
                <i class="fa-solid fa-cart-shopping" id="cart-icon"></i>
            </div>
            </ul>
          
            </div>
            <div class="navToggle" id="nav-Toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>
    <section>
        <div class="hero-container">
            <div class="textHero">
                <h1>When you are <span>Home Alone and </span>Hungry?</h1>
                <p>The Quick Snacks is the best website for explore new snacks and Recipe's of food and smoothies it is very simple to use and the best way to find new with the help of us.</p>
                <form class="heroForm">
                    <input type="text" id="searchInput" placeholder="Search food...">
                    <a class="search" href="#/"><i class="fa-solid fa-magnifying-glass"></i></a>
                </form>
                <div id="searchResults"></div>
            </div>
            <div class="heroImage">
                <img src="image/hero.jpg">
            </div>
        </div>
    </section>
    <section>
        <div class="owl-carousel">
            <div class="item">
                <div class="foodimages">
                    <img src="image/salad.jpg" alt="">
                    <h4>Salad</h4>
                    <div class="name">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="foodimages">
                    <img src="image/rice.jpg" alt="">
                    <h4>Rice</h4>
                    <div class="name">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="foodimages">
                    <img src="image/chips.jpg" alt="">
                    <h4>Chips</h4>
                    <div class="name">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="foodimages">
                    <img src="image/burger.jpg" alt="">
                    <h4>Burger</h4>
                    <div class="name">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="foodimages">
                    <img src="image/pizza.jpg" alt="">
                    <h4>Pizza</h4>
                    <div class="name">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="foodimages">
                    <img src="image/sandwich.jpg" alt="">
                    <h4>Sandwich</h4>
                    <div class="name">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="nav">
            <div class="fixed-box">

            </div>

            <div class="cart">
                <div class="cart-title">Cart Items</div>
                <div class="cart-content">
                </div>

                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">Rs.0</div>
                </div>

                <a href="./loginsystem/checkout.php" class="btn-buy">Place Order</a>

                <ion-icon name="close" id="cart-close"></ion-icon>



            </div>
        </div>
        <div class="container">
            <h1 class="food-header">ENJOY OUR REGULAR MENU</h1>
            <div class="shop-content">

                <div class="food-box">
                    <div class="pic">
                        <img src="image/burger.jpg" class="food-img">
                    </div>
                    <h2 class="food-title">MO:MO</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">RS. </p>
                    <button class="add-cart">Add to cart</button>
                </div>


                <div class="food-box">
                    <div class="pic"><img src="image/chips.jpg" class="food-img"></div>
                    <h2 class="food-title">Noodles</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.65</p>
                    <button class="add-cart">Add to cart</button>
                </div>

                <div class="food-box">
                    <div class="pic"><img src="image/noodles.jpg" class="food-img"></div>
                    <h2 class="food-title">Chips</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.80</p>
                    <button class="add-cart">Add to cart</button>
                </div>

                <div class="food-box">
                    <div class="pic"><img src="image/pizza.jpg" class="food-img"></div>
                    <h2 class="food-title">Rice</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.55</p>
                    <button class="add-cart">Add to cart</button>
                </div>

                <div class="food-box">
                    <div class="pic"><img src="image/sandwich.jpg" class="food-img"></div>
                    <h2 class="food-title">Sandwich</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.25</p>
                    <button class="add-cart">Add to cart</button>
                </div>

                <div class="food-box">
                    <div class="pic"><img src="image/salad.jpg" class="food-img"></div>
                    <h2 class="food-title">Salad</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.150</p>
                    <button class="add-cart">Add to cart</button>
                </div>


                <div class="food-box">
                    <div class="pic"><img src="image/burger.jpg" class="food-img"></div>
                    <h2 class="food-title">Pizza</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.65</p>
                    <button class="add-cart">Add to cart</button>
                </div>


                <div class="food-box">
                    <div class="pic"><img src="image/burger.jpg" class="food-img"></div>
                    <h2 class="food-title">Burger</h2>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="a" class="fa-solid fa-star"></i>
                    <i id="b" class="fa-regular fa-star"></i>
                    <p class="food-price">Rs.65</p>
                    <button class="add-cart">Add to cart</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="submit-container">
            <div class="submitText">
                <h1>Want to submit a Recipe</h1>
                <div class="subBtn">
                    <a href="#/">Submit Now</a>
                </div>
            </div>
            <div class="subImage">
                <img src="image/recepeimage1.png" alt="">
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <h1>Quick<span>Snacks</span></h1>
            <div class="footer-content">
                <div class="para">
                    <p>The QuickSnack is the best website for explore new snacks and Recipe's of food and smoothies it is very simple to use and the best way to find new with the help of us.</p>
                </div>
                <div class="subcribe-input">
                    <h1>Subscribe Our Newsletter</h1>
                    <form class="subsInput" action="https://api.web3forms.com/submit" method="POST">
                        <input type="hidden" name="access_key" value="5368b009-b01b-4460-b643-6c4f85b023bf">
                        <div class="group-input">
                            <input class="subs-input" name="email" type="email" required></input>
                            <label class="placeholder">Email address</label>
                            <button type="submit" class="subs">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="terms">
                <ul>
                    <li>
                        <a href="#/">Terms & Condition</a>
                    </li>
                    <li>
                        <a href="#/">Privacy Policy</a>
                    </li>
                </ul>
                <div class="icons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-square-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
            <p class="author">Designed by <a href="#/">Anucha Tamang.</a></p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/296f844599.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=URL"></script>
    
    <script defer src="index.js"></script>
    <script src="search.js"></script>
</body>

</html>