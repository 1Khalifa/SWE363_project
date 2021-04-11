<?php session_start();
$cartCount = 0;
$cart = "";
require_once "php/meal.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hot Burgers</title>
    <link rel="stylesheet" href="style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="icon" href="projectImages/logo-White.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
            integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
            crossorigin="anonymous"></script>
</head>

<header>

    <nav id="navBar" class="navbar fixed-top navbar-dark navbar-expand-xl">
        <a class="navbar-brand " href="#"><img src="projectImages/logo-White.svg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-list-2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item navitm"><a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item navitm"><a class="nav-link" href="index.php#menu">Menu</a>
                </li>
                <li class="nav-item navitm"><a class="nav-link" href="index.php#gallery">Gallery</a>
                </li>
                <li class="nav-item navitm"><a class="nav-link" href="index.php#testimonials">Testimonial</a>
                </li>
                <li class="nav-item navitm"><a class="nav-link" href="#contact">Contact Us</a>
                </li>
                <li class="nav-item navitm" id="Search"><a class="nav-link" href="#">Search</a>
                </li>
                <li class="nav-item navitm" id="Profile"><a class="nav-link" href="#">Profile</a>
                </li>

                <li class="nav-item navitm" data-toggle="modal" data-target="#cart" id="Cartn"><a class="nav-link"
                                                                                                  href="#">Cart
                        <?php
                        if (isset($_COOKIE['cart'])) {
                            $cartCount = strlen($_COOKIE["cart"]);
                            $cart = $_COOKIE["cart"];
                            echo('<span class="cartCount">' . $cartCount . '</span>');
                        } else {
                            echo('<span class="cartCount">' . $cartCount . '</span>');
                        }
                        ?>
                    </a>

                </li>
            </ul>
        </div>
    </nav>

    <div class="modal" id="cart" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cart Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-sm show-cart">

                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                        </tr>
                        <?php
                        $meal = new Meal();
                        $totalPrice = 0;
                        for ($i = 0; $i < $cartCount; $i++) {
                            $idInCart = (int)$cart[$i];
                            $meals = $meal->getMealById($idInCart);
                            echo('<tr>');
                            echo('<td>' . $meals["title"] . '</td>');
                            echo('<td>' . $meals["price"] . '</td>');
                            echo('</tr>');
                            $price = $meals["price"];
                            $totalPrice += $price;
                        }
                        echo('</table>');
                        ?>
                        <div><b>Total:</b> <span><b class="total-cart"> <?php echo $totalPrice ?></b></span> SAR
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="closeCart" data-dismiss="modal">Close</button>
                    <form method="post" action="./php/order.php">
                        <button type="submit" name="orderNow" class="orderNow">Order Now
                        </button>
                        <input type="hidden" name="total" value="<?php echo $totalPrice; ?>">
                        <input type="hidden" name="itemsID" value="<?php echo $cart ?>">

                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<body>