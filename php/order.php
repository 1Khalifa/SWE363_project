<?php
session_start();

$order = $_POST["orderNow"];
$itemsID = $_POST["itemsID"];
$arr = [];
for ($i = 0; $i < strlen($itemsID); $i++) {
    $arr[$i] = $itemsID[$i];
}
$uniqueID = implode(array_unique($arr));

if (isset($_COOKIE['cart'])) {
    setcookie('cart', '', time() - (86400 * 50), "/"); // empty value and old timestamp
    unset($_SESSION["inCart"]);
}

setcookie("recent-bought", $uniqueID, time() + (86400 * 30), "/");


header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/index.php");
