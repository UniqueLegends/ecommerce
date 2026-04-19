<?php
session_start();
if($_SESSION['Login_status']==false){
    echo "Unauthorized Attempt";
    exit();
}

if($_SESSION['usertype']!="Customer"){

    echo"Forbidden Access";
    exit();
}
?>