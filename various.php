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

<body>
    <header>
        <nav class="navbar">
            <a class="nav-logo" href="home.php"><Span>MeroKhaja</Span>Ghar</a>
            <div class="nav-content" id="navContent">
                <ul id="menu">
                    <li><a href="home.php" class="nav__link">Home</a></li>


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
    <div>
        <h1>Variuos</h1>
    </div>
    <script src="https://kit.fontawesome.com/296f844599.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=URL"></script>
    <script src="index2.js"></script>
</body>

</html>