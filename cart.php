<?php
if (!session_id())
    session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

} else {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/cart.css">
    <title>Cart</title>

</head>

<body>
    <?php
     include ("header.php");
    include ("dbconnect.php");
    $userid = $_SESSION["userid"];
    ?>
    <?php
    // if (isset($_GET["status"])) {
    //     $status = $_GET["status"];
    //     if ($status == "added") {
    //         $item_id = $_REQUEST['itemid'];
    //         $sql = "SELECT * from products where productId=$item_id";
    //         $result = mysqli_query($conn, $sql);
    //         $row = mysqli_fetch_assoc($result);
    //         echo '<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
    //         <div id="alert-added-inside" class="alert alert-success alert-dismissible fade show"style="text-align:center;width:25vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
    //             ' . $row['productName'] . ' added in Cart!!
              
    //         </div>
    //         ';
    //     }
    // }
    ?>
    <?php
    // if (isset($_GET["status"])) {
    //     $status = $_GET["status"];
    //     if ($status == "removed") {
    //         $item_id = $_REQUEST['itemid'];
    //         $sql = "SELECT * from products where productId=$item_id";
    //         $result = mysqli_query($conn, $sql);
    //         $row = mysqli_fetch_assoc($result);
    //         echo '<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:200vw;background:black;opacity:50%"></div>
    //         <div id="alert-added-inside" class="alert alert-danger alert-dismissible fade show"style="text-align:center;width:25vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
    //             ' . $row['productName'] . ' removed from Cart!!
                
    //         </div>
    //         ';
    //     }
    // }
    ?>
    <div class="cart-items">

        <div>
            <?php
           
            $sql = "SELECT * from cart where user_id=$userid";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows == 0) {

                echo "<div class='empty-cart'><br>
                <h1>Cart is empty</h1><br>
                <a href='index.php'><button id='checkout-button'>Add items</button></a><br><br>
                </div>
                ";

            } else {
                echo "<div class='nonempty-cart'>
                <div class='internal-nonempty'>
                <div class='internal-right' >";
                echo "<table style='width:700px;height:200px;'>
                    <tr >
                        <th>Image</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        </tr>
                ";

                while ($item = mysqli_fetch_assoc($result)) {
                    $cart_id = $item["cart_id"];
                    $item_id = $item["item_id"];
                    $product_quantity = $item["product_quantity"];

                    $sql_item = "SELECT * from products where productId=$item_id";
                    $result_item = mysqli_query($conn, $sql_item);
                    $item = mysqli_fetch_assoc($result_item);

                    $item_id = $item["productId"];
                    $item_name = $item["productName"];
                    $item_price = $item["productPrice"];
                    $item_image = $item["productImage"];


                    echo '  
                    <tr>
                    <td><img class="item-image" src="' . $item_image . '"</td>
                    <td>' . $item_name . '</td>
                    <td class="price">' . $item_price . '</td>
                    <td >

                    <form action="quantityHandle.php?id=' . $item_id . '" method="post">
                    
                    <input type="number" class="quantity" name="quant" value="' . $product_quantity . '" min="1" max="50" onfocus="tick(' . $item_id . ')" onchange="handlequan()" >
                    <button class="tick-button" type="submit" ><i id="tick' . $item_id . '" class="ri-check-line"></i></button>
                    </form>
                    
                    </td>
                    <td class="sum"></td>
        
                    <td><a href="cartRemove.php?itemid=' . $item_id . '"><button class="remove-button">Remove</button><a></td>
                    </tr>
                    ';

                }
                echo '</table></div>
                <div class="total-div">Grand Total:<div style="display:flex;">Rs.<p id="grandtotal"></p></div>
                
                <div class="buttons">
                <a href="index.php">
                <button id="buy-more-button">Buy more</button>
                </a>
                
                <a href="checkout.php"><button id="checkout-button">Check Out</button></a>
                </div>
                
                
                </div>
                </div>
                ';


            }
            ?>
        </div>
    </div>
</body>

<script>
const quan = document.getElementsByClassName("quantity");
const price = document.getElementsByClassName("price");
const sums = document.getElementsByClassName("sum");
const total = document.getElementById("grandtotal")

function handlequan() {
    let finalSum = 0;


    for (let i = 0; i < quan.length; i++) {
        // quantity[i] = quan[i].value;
        // console.log(quantity);
        let sum = Number(quan[i].value) * Number(price[i].innerHTML);
        sums[i].innerHTML = sum;
        finalSum += sum;

    }

    total.innerHTML = finalSum;
    // console.log(finalSum);
    // window.location.href = 'quantityHandle.php';

}

function tick(iid) {

    document.getElementById(`tick${iid}`).style.color = "red";

}
handlequan();
</script>
<script>
const alertdiv = document.getElementById("alert-added");
const alertdivinside = document.getElementById("alert-added-inside");
window.addEventListener("load", () => {
    setTimeout(() => {
        alertdiv.style.display = "none";
        alertdivinside.style.display = "none";
        // alertdiv.style.opacity = "0";
    }, 100)

})
</script>

</html>