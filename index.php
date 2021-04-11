<?php
include_once 'include\inc.header.php';
define("BASE_IMG", "projectImages/");
$meal_obj = new Meal();
$meals = $meal_obj->getAllMeals();
$recentBought = $_COOKIE["recent-bought"] ?? "";

?>

<div class=".container-fluid ">

    <div class="col pt-5 pdXY" id="partyBox">
        <h1 class="col-xs-12">Party Time</h1>
        <div class="col-xs-12 col-lg-6 col-md-12 col-xl-5" id="yellowShape">
            <h3>Buy any 2 burgers and get 1.5L Pepsi Free</h3>
        </div>
        <button id="orderBtn">
            <a href="#gallery"> Order now</a>
        </button>
    </div>


    <?php if (strlen($recentBought) > 0) {

        echo('<div class="col text-center pt-1 mt-5 pdXY">');
        echo(' <h2 class="pt-1">Your Recent Bought Products</h2>');

        echo('<div class="row no-gutters pdXY" id="itemsCards">');
        $meal = new Meal();
        for ($i = 0; $i < strlen($recentBought); $i++) {
            $recentBoughtID = (int)$recentBought[$i];
            $recentMeal = $meal->getMealById($recentBoughtID);
            echo('<div class="col-lg-4 col-xl-3">');
            echo('<div class="card mx-1 my-1 px-2 pt-2 border-white">');
            echo("<a href='" . "detail.php?id=" . $recentMeal["id"] . "'>");
            echo(' <img class="card-img-top" src=' . BASE_IMG . $recentMeal["image"] . '>');
            echo('<div class="card-body text-left">');
            echo('<p class="card-text"> ⭐' . $recentMeal["rating"] . '</p>');
            echo(' <h4 class="card-title">' . $recentMeal["title"] . '</h4>');
            echo('<p class="card-text">Some description</p>');
            echo('</div>');
            echo('</a>');

            echo('<div class="row pl-4">');
            echo('<div>');

            echo('<form method="post" action="php/cart.php">');
            echo('<input type="hidden" name="id" value="' . $recentMeal["id"] . '">');
            echo(' <input type="hidden" name="quantity" value="1">');
            echo(' <button type="submit" class="add-to-cart" data-name="' . $recentMeal["title"] . '"' . 'data-price="' .
                $recentMeal["price"] . '"' . '>Buy again' . '</button > ');

            echo('</form> ');

            echo('</div> ');
            echo('<p class="pt-1">' . $recentMeal["price"] . '</p>');

            echo('</div> ');


            echo('</div> ');
            echo('</div> ');
        }
        echo('</div> ');
        echo('</div> ');

    }
    ?>

    <div class="col text-center pt-5  pdXY" id="menu">

        <h2 class="pt-5">Want To Eat</h2>
        <p> Try our most delicious food and usually take minutes to deliver </p>

        <div class="row justify-content-md-center" id="menuList">
            <a class="col-xs-2 col-sm-2" href=""> pizza</a>
            <a class="col-xs-2 col-sm-2" href=""> fast food</a>
            <a class="col-xs-2 col-sm-2" href=""> cupcakes</a>
            <a class="col-xs-2 col-sm-2" href=""> sandwich</a>
            <a class="col-xs-2 col-sm-2" href=""> spaghetti</a>
            <a class="col-xs-2 col-sm-2" href=""> burger</a>
        </div>
    </div>

    <div class="row no-gutters pdXY" id="deliveryBox">

        <img class="col-lg-6 img-fluid" src="projectImages/delivery.png">
        <div class="col-lg-6 justify-content-center" id="deliveryBox2">
            <div id="red_triangle">
                <h2>We guarantee 30 minutes delivery</h2>
            </div>
            <p> if your having a meeting, working late at night and need an extra push </p>
        </div>
    </div>

    <div class="col text-center pt-5 mt-5 pdXY" id="gallery">

        <h2 class="pt-5"> Our most popular recipes</h2>
        <p>Try our most delicious food and usually take at night and need an extra push</p>

        <div class="row no-gutters" id="itemsCards">

            <?php foreach ($meals as $meal): ?>
                <div class="col-lg-4 col-xl-3">
                    <div class="card mx-1 my-1 px-2 pt-2 border-white">
                        <a class="cardInfo" href=<?php echo "detail.php?id=" . $meal["id"] ?>>
                            <img class="card-img-top" src=<?php echo BASE_IMG . $meal["image"]; ?>>
                            <div class="card-body text-left">
                                <p class="card-text"> ⭐<?php echo $meal["rating"]; ?> </p>
                                <h4 class="card-title"><?php echo $meal["title"]; ?></h4>
                                <p class="card-text">Some description</p>
                            </div>
                        </a>
                        <div class="row  pl-4">
                            <div>
                                <form method="post" action="php/cart.php">
                                    <input type="hidden" name="id" value="<?php echo $meal["id"]; ?>">
                                    <input type="hidden" name="quantity" value="1">

                                    <button type="submit" class="add-to-cart" data-name="<?php echo $meal["title"] ?>"
                                            data-price="<?php echo $meal["price"]; ?>">add to cart
                                    </button>
                                </form>
                            </div>
                            <p class="pt-1"> <?php echo $meal["price"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col text-center pt-5 mt-5 pdXY" id="testimonials">

        <h2 class="pt-5"> Clients Testimonials</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        <img class="col-lg-6" src="projectImages/man-eating-burger.png"/>
                        <div class="col-lg-6 d-flex align-items-center text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lectus sit amet est placerat in egestas erat. Tellus
                                in metus vulputate eu scelerisque felis. Tortor id aliquet lectus proin nibh nisl
                                condimentum id. Non consectetur a erat nam at lectus urna.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <img class="col-lg-6" src="projectImages/man-eating-burger.png"/>
                        <div class="col-lg-6 d-flex align-items-center text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lectus sit amet est placerat in egestas erat. Tellus
                                in metus vulputate eu scelerisque felis. Tortor id aliquet lectus proin nibh nisl
                                condimentum id. Non consectetur a erat nam at lectus urna.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <img class="col-lg-6" src="projectImages/man-eating-burger.png"/>
                        <div class="col-lg-6 d-flex align-items-center text-left">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lectus sit amet est placerat in egestas erat. Tellus
                                in metus vulputate eu scelerisque felis. Tortor id aliquet lectus proin nibh nisl
                                condimentum id. Non consectetur a erat nam at lectus urna.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <?php include_once 'include \inc . footer . php'; ?>

</div>
</body>
<script src="app.js"></script>
</html>
