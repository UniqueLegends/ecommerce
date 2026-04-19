<?php

session_start();
$_SESSION['login_status'] = false;

// $conn = new mysqli("localhost","root","","acmesuii",3306);
include"connection.php";


$sql_result = mysqli_query($conn,"select * from user where username = '$_POST[username]' and password = '$_POST[password]'");

print_r($sql_result);

if($sql_result -> num_rows==0){
    echo "<h1>Invalid Credentials</h1>";
    exit();
}

else{
    echo "<h1>Login Success</h1>";
}

$_SESSION['Login_status'] = true;

// $sql_typeCheck = mysqli_query($conn,"select usertype from user where username = '$_POST[username]'");
// $userT = mysqli_fetch_assoc($sql_typeCheck);
// if($userT["usertype"] == "Vendor"){
//     header("location: http://localhost/project/vendor/home.html");
// }
// elseif($userT["usertype"]=="Customer"){
//     header("location: http://localhost/project/customer/home.html");
// }

$dbrow = mysqli_fetch_assoc($sql_result);

$_SESSION['usertype'] = $dbrow['usertype'];
$_SESSION['userid'] = $dbrow['userid'];

if($dbrow["usertype"] == "Vendor"){
    header("location: http://localhost/project/vendor/home.php");
}
elseif($dbrow["usertype"]=="Customer"){
    header("location: http://localhost/project/customer/home.php");
}

?> 