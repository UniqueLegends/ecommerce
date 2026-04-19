<?php
session_start();
include "../shared/connection.php";
include "authguard.php";

if(isset($_GET['cartid'])){
    $cartid = intval($_GET['cartid']); // sanitize input

    mysqli_query($conn,"DELETE FROM cart WHERE cartid=$cartid");

    header("Location: viewcart.php");
    exit();
} else {
    echo "Cart ID missing!";
}
?>