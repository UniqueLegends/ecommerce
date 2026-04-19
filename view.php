<html>
    <head>
        <style>
            .parent{
                background-color: bisque;
                border-radius: 7px;
                width: 200px;
                margin: 10px;
                display: inline-block;
                vertical-align: top;
                padding:10px;
            }

            .pdt-img{
                width: 100%;
                height:200px;

            }
            
            .name{
                font-size:30px;
            }
            .price{
                padding:2px;
                color:dark;
                font-weight:bold;
                font-size:20px;
            }

            .price::before{
                content:"₹";
            }

        </style>
            </head>
            </html>

            
<?php

include"menu.html";

//AuthGuard
include"authguard.php";

$conn = new mysqli("localhost","root","","peemas",3306);

$sql_result = mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");

while($dbrow = mysqli_fetch_assoc($sql_result)){

    echo "
    <div class = 'parent'>
    <div class='name'>$dbrow[name]</div>
    <div class='price'>$dbrow[price]</div>
    <img class='pdt-img'src = '$dbrow[impath]'>
    <div class='details'>$dbrow[details]</div>
    <div class='remove'><button>Remove</button></div>

    </div>";   
}

?>