<?php
session_start();

$id = $_POST["id"];
$qun = $_POST["quantity"];

for ($i = 0; $i < $qun; $i++) {

    if (isset($_SESSION['inCart'])) {
        array_push($_SESSION["inCart"], $id);
    } else {
        $_SESSION["inCart"] = array($id);
    }

    setcookie("cart", implode($_SESSION["inCart"]), time() + (86400 * 30), "/");
}
echo $_COOKIE["cart"];
echo implode($_SESSION["inCart"]);


$caller = $_SERVER['HTTP_REFERER'];
if (str_contains($caller, "index")) {
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/index.php#gallery");
} else {
    header("location:" . $_SERVER['HTTP_REFERER']);
}