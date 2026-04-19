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

include "authguard.php";
include "../shared/connection.php";
include "menu.html";

$sql_result = mysqli_query($conn,"select * from cart join product on cart.pid = product.pid where userid =$_SESSION[userid]");

$total = 0;
while ($dbrow = mysqli_fetch_assoc($sql_result)){
    $total += $dbrow["price"];
    echo "
    <div class='parent'>
        <div class='name'>{$dbrow['name']}</div>
        <div class='price'>{$dbrow['price']}</div>
        <img class='pdt-img' src='{$dbrow['impath']}'>
        <div class='details'>{$dbrow['details']}</div>
        <div class='text-center'>
            <a href='deletecart.php?cartid={$dbrow['cartid']}'>
                <button class='btn btn-danger'>Remove from Cart</button>
            </a>
        </div>
    </div>";   
}

echo "
<div>
    <div class='display-2'>Checkout</div>
    <div class='display-2'>Total: $total</div>
    <div class='text-left p-3'>
        <button class='btn btn-success'>Pay Now</button>
    </div>
</div>";
?>
