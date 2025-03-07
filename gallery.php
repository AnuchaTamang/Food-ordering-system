<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickSnack</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>

<body id="gallery">
    <header>
        <nav class="navbar">
            <a class="nav-logo" href="index.php"><Span>Quick</Span>Snacks</a>
            <div class="nav-content" id="navContent">
                <ul id="menu">
                    <li><a href="index.php" class="nav__link">Home</a></li>


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

            </div>
            <div class="box">
                <div class="cart-count">0</div>
                <i class="fa-solid fa-cart-shopping" id="cart-icon"></i>
            </div>
            </ul>
            <div class="navClose" id="nav-Close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            </div>
            <div class="navToggle" id="nav-Toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>
    <section>
        <div class="gallery-container">
            <h1>Food <span>Gallery</span></h1>
            <div class="galleryImg">
                <div class="gallery image1">
                    <img src="image/burger.jpg" alt="">
                </div>
                <div class="gallery image2">
                    <img src="image/chips.jpg" alt="">
                </div>
                <div class="gallery image3">
                    <img src="image/noodles.jpg" alt="">
                </div>
                <div class="gallery image4">
                    <img src="image/sandwich.jpg" alt="">
                </div>
                <div class="gallery image5">
                    <img src="image/salad.jpg" alt="">
                </div>
                <div class="gallery image6">
                    <img src="image/rice.jpg" alt="">
                </div>
                <div class="gallery image7">
                    <img src="image/pizza.jpg" alt="">
                </div>
                <div class="gallery image8">
                    <img src="image/keemaNoodles.jpg" alt="">
                </div>
                <div class="gallery image9">
                    <img src="image/momo1.jpg" alt="">
                </div>
                <div class="gallery image10">
                    <img src="image/pizza.jpg" alt="">
                </div>
                <div class="gallery image11">
                    <img src="image/burger.jpg" alt="">
                </div>
                <div class="gallery image12">
                    <img src="image/pizza.jpg" alt="">
                </div>
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
    <script src="https://kit.fontawesome.com/296f844599.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=URL"></script>
    <script src="index.js"></script>
</body>

</html>