<?php

include"authguard.php";

print_r($_POST);
echo "<br>";
print_r($_FILES);
echo "<br>";
echo $_FILES['pdtimg']['name'];

$fileName = $_FILES['pdtimg']['name'];

$souce_path = $_FILES['pdtimg']['tmp_name'];
$target_path = "../shared/images/".$fileName;

move_uploaded_file($souce_path,$target_path);
// $conn = new mysqli("localhost","root","","acmesuii",3306);
include"../shared/connection.php";

mysqli_query($conn,"insert into product(name,price,details,impath,owner) values('$_POST[name]',$_POST[price],'$_POST[details]', '$target_path',$_SESSION[userid])")
?>  