<?php
if(!session_id())
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/checkout.css">
    <title>Checkout page</title>


</head>

<body>
    <?php include("header.php");  ?>
    <h1 id="check-head">Checkout: </h1><br>
    <div id="checkout-main-div">
        <div>
            <form autocomplete="off" action="checkoutHandle.php" method="POST" class="container">
                <div>
                    <h4>Billing details:</h4>
                </div>
                <div class="sub-container">
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:220px;" id="firstname" name="firstname"
                            placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:220px;" id="lastname" name="lastname"
                            placeholder="Last name" required>
                    </div>
                </div>


                <div class="sub-container" required>
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:220px;" id="town" name="city"
                            placeholder="Town/City" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:220px;" id="street" name="street"
                            placeholder="Street Address" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" maxlength="10" minlength="10"
                        placeholder="Phone no." required>
                </div>
                <div style="display:flex;text-align:center;align-items:center;">
                    <h6 style="margin:0px 5px 0 0;font-size:0.98rem;font-weight:700;">Payment Method:</h6>
                    <input type="radio" class="payment-radio" name="checkout_method" value="cod" id="cod" required>
                    <label class="input-label" for="cod">Cash on
                        delivery</label>

                    <input type="radio" class="payment-radio" name="checkout_method" value="esewa" id="esewa" required>
                    <label class="input-label" for="esewa"><img id="esewa-img" src="image/esewa.png"
                            alt="e">Esewa</label>

                    <input type="radio" class="payment-radio" name="checkout_method" value="khalti" id="khalti"
                        required>
                    <label class="input-label" for="khalti"><img id="esewa-img" src="image/khalti.png"
                            alt="k">Khalti</label>
                </div>
                <button type="submit" class="btn-primary">Place
                    Order</button>

            </form>
        </div>
        <div id="cart-items">
            <h4>Order-list</h4>
            <div style="margin-bottom:25px;">
                <?php
                include("dbconnect.php");
                // include("utility.php");
                
                $user_id=$_SESSION['userid'];
                $sql="SELECT * from cart where user_id=$user_id";
                $result=mysqli_query($conn,$sql);
                
                $grand_total=0;
                while ($item=mysqli_fetch_assoc($result)) {

                    // $cart_id= $item["cart_id"];
                    $item_id=$item["item_id"];
                    $product_quantity=$item["product_quantity"];

                    $sql_item="SELECT * from products where productId=$item_id";
                    $result_item=mysqli_query($conn,$sql_item);
                    $item=mysqli_fetch_assoc($result_item);
                    
                    $item_name=$item["productName"];
                    $item_price=$item["productPrice"];
                    $item_image=$item["productImage"];


                    echo'
                    <div class="items">
                        <div>
                            <img src="'.$item_image.'" alt="image" style="height:70px;width:70px;border-radius:10px;object-fit:cover;">
                        </div>
                        <div>
                            <h5>'.$item_name.'</h5>
                            <div style="display:flex;justify-content:space-between;gap:10px;">
                            <h6>Price: '.$item_price.'</h6>
                            <h6>Quantity: '.$product_quantity.'</h6>
                            </div>
                        </div>
                        <div style="position:absolute;right:10px;bottom:2px;"><h5>Total: '.$item_price*$product_quantity.'</h5></div>
                    </div>
                    ';
                    $grand_total+=$item_price*$product_quantity; 
                    }
                    echo'
                    </div>
                    <div style="position:absolute;right:10px;bottom:2px;"><h4 style="color:red;font-weight:bold;">Grand-Total: '.$grand_total.'</h4></div>
                    ';
                ?>

            </div>
        </div>
</body>

</html>