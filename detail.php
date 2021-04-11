<?php
include_once 'include/inc.header.php';
define("BASE_IMG", "projectImages/");
$id = $_GET["id"];
$meal = new Meal();
$meals = $meal->getMealById($id);
$fact = array_column($meals, "facts");
$facts = array_pop($fact);
$quantity = 1;
?>

<div class=".container-fluid pt-5">
    <div class="row pt-5 pdXY">

        <img class="col-lg-4" src=<?php echo BASE_IMG . $meals["image"]; ?>>
        <div class="col-lg-8">
            <h2><?php echo $meals["title"]; ?></h2>
            <p> <?php echo $meals["price"]; ?> SAR</p>
            <p> ⭐<?php echo $meals["rating"]; ?> rating</p>

            <p><?php echo $meals["description"]; ?></p>

            <div class="row">
                <div class="addItems">

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $quantity = isset($_POST['counter']) ? $_POST['counter'] : 0;
                        if (isset($_POST["button+"])) {
                            $quantity++;
                        } elseif (isset($_POST["button-"])) {
                            if ($quantity > 1) {
                                $quantity--;
                            }
                        }
                    }
                    ?>
                    <form method='post' action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $meals["id"]; ?>">
                        <input class="addBtn" type="submit" name="button-" value="-">
                        <input id="itemNum" type="text" name="counter" value="<?php print $quantity; ?>" readonly>
                        <input class="addBtn" type="submit" name="button+" value="+">
                    </form>
                </div>

                <div class="ml-auto">
                    <form method="post" action="php/cart.php">
                        <input type="hidden" name="id" value="<?php echo $meals["id"]; ?>">
                        <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">

                        <button type="submit" class="add-to-cart" data-name="<?php echo $meals["title"] ?>"
                                data-price="<?php echo $meals["price"]; ?>">add to cart
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div>

        <ul class="nav nav-pills mt-5" id="taps">
            <li class="pill">
                <a class="nav-link active" data-toggle="tab" href="#tab1"><h4>Description</h4></a>
            </li>
            <li class="pill">
                <a class="nav-link" data-toggle="tab" href="#tab2"><h4>Reviews</h4></a>
            </li>
        </ul>

        <div class="tab-content mt-3 pdXY">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel">

                <p>
                    <?php echo $meals["description"]; ?>
                </p>
                <div class="col" id="nutrition">

                    <h4>nutrition facts</h4>
                    <table border="1">
                        <tbody>
                        <tr>
                            <td colspan="3"><b>Supplements Facts</b></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>Serving Size: </b><?php echo $meals["nutrition"]["serving_size"]; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>serving Per
                                    Container: </b><?php echo $meals["nutrition"]["serving_per_container"]; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>Amount Per Serving</b></td>
                            <td><b>%Daily Value</b></td>
                        </tr>

                        <?php
                        for ($i = 0; $i < count($facts); $i++) {
                            echo('<tr>');
                            echo('<td>' . $facts[$i]["item"] . '</td>');
                            echo('<td>' . $facts[$i]["amount_per_serving"] . " " . $facts[$i]["unit"] . '</td>');
                            echo('<td>' . $facts[$i]["daily_value"] . '</td>');
                            echo('</tr>');
                        }
                        ?>

                        <tr>
                            <td colspan="3">Percent Daily Values are based on a 2,000 calorie diet. Your daily
                                values
                                may be higher
                                or lower depending on your calorie needs
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel">

                <div class="row">

                    <img class="col-lg-4" src="<?php echo BASE_IMG . $meals["reviews"]["image"]; ?>"/>

                    <div class="col-lg-8">

                        <h4><?php echo $meals["reviews"]["reviewer_name"]; ?></h4>
                        <h5><?php echo $meals["reviews"]["city"]; ?> - <?php echo $meals["reviews"]["date"]; ?>

                            <?php
                            for ($i = 0; $i < $meals["reviews"]["rating"]; $i++) {
                                echo('⭐');
                            }
                            ?>
                        </h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore
                            et dolore
                            magna aliqua. Lectus sit amet est placerat in egestas erat. Tellus in metus vulputate eu
                            scelerisque
                            felis.
                            Tortor id aliquet lectus proin nibh nisl condimentum id. Non consectetur a erat nam at
                            lectus
                            urna.</p>
                    </div>
                </div>

                <button class="yellowBtn mt-2" onclick="slidIN()">Add Your Review</button>

                <div class="col" id="addReview">
                    <form class="mt-4" name="frm1" id="frm1" method="post">


                        <form><label>image:</label>
                            <input type="file" id="myFile" name="filename">
                        </form>

                        <label class="mt-4 pr-3">Rate the Food </label>

                        <input type="range" list="tickmarks">
                        <datalist id="tickmarks">
                            <option value="20"></option>
                            <option value="40"></option>
                            <option value="60"></option>
                            <option value="80"></option>
                            <option value="100"></option>
                        </datalist>


                        <div>
                            <label>Name</label>
                            <input id="personName" class="textField" type="text"
                                   placeholder=" First name and Last name"
                                   size="50">
                        </div>
                        <div class="mt-3">
                            <label>Review</label>
                            <label id="message"></label>

                            <textarea class="textField" maxlength="500" name="Review" id="Review" cols="50"
                                      rows="10"
                                      placeholder=" Type your review here max 500 characters" maxlength="500"
                                      onkeyup="countChars(this);"></textarea>
                            <p id="charNum"> 0 / 500 </p>
                        </div>

                        <button type="submit" class="yellowBtn" onclick="checkName(),emptyReview(),submitReview()">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'include\inc.footer.php'; ?>

</div>
</body>
<script src="app.js"></script>
</html>
