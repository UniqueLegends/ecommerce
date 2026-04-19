<?php
print_r($_POST);

if($_POST['password']!=$_POST['password2']){
    echo "Mismatched Credentials";
    exit();
}

// $conn = new mysqli("localhost","root","","acmesuii",3306);
include"connection.php";

$result = mysqli_query($conn, "SHOW TABLES");
while($row = mysqli_fetch_array($result)){
    print_r($row);
}


$status = mysqli_query($conn,
"INSERT INTO `user` (username,password,usertype) 
VALUES ('$_POST[username]','$_POST[password]','$_POST[usertype]')");

if($status){
    echo "Signup Success!";
}
else{
    echo "Exception";
    echo mysqli_error($conn);
}
?>