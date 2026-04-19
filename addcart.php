<?php
session_start();
include "../shared/connection.php";
include "authguard.php";

if(isset($_GET['pid'])){
    $userid = $_SESSION['userid'];
    $pid = intval($_GET['pid']); // sanitize input

    mysqli_query($conn,"INSERT INTO cart(userid,pid) VALUES ($userid,$pid)");

    header("Location: viewcart.php");
    exit();
} else {
    echo "Product ID missing!";
}
?>