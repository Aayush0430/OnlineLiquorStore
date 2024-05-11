<?php
if(!session_id())
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">

    <title>Checkout page</title>
    <style>
    .body {}

    #checkout-main-div {
        /* background-color: red; */
        display: flex;
        height: auto;
        gap: 80px;
    }

    #cart-items {
        position: relative;
        border-radius: 10px;
        padding: 20px;
        height: auto;
        background-color: rgba(250, 250, 250, 1);
        outline: 1px solid rgba(220, 220, 220, 1);
        margin-bottom: 20px;
    }

    .items {
        width: 400px;
        /* background-color: blue; */
        display: flex;
        gap: 10px;
        padding: 10px;
        position: relative;
        margin: 10px;
        border: 1px solid black;
        border-radius: 9px;
    }

    #esewa-img {

        height: 20px;
    }

    .payment-radio {
        margin: 0 5px;
    }

    .input-label {
        margin-top: 5px;
    }
    </style>

</head>

<body>
    <?php include("header.php");  ?>
    <h1 style="margin:10px 0 0 300px;">Checkout: </h1><br>
    <div id="checkout-main-div">
        <div>
            <form autocomplete="off" action="checkoutHandle.php" method="POST" class="container" #signup_form
                style="width:550px;height:350px;margin-left:100px;outline:1px solid rgba(220, 220, 220, 1);padding:20px 40px;border-radius:10px;background:rgba(250, 250, 250, 1);">
                <div>
                    <h4 style="margin-bottom:20px;">Billing details:</h4>
                </div>
                <div style="display:flex; justify-content: space-between;">
                    <div class="form-group">
                        <!-- <label for="firstname">First Name</label> -->
                        <input type="text" class="form-control" style="width:220px;" id="firstname" name="firstname"
                            placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="lastname">Last Name</label> -->
                        <input type="text" class="form-control" style="width:220px;" id="lastname" name="lastname"
                            placeholder="Last name" required>
                    </div>
                </div>


                <div style="display:flex; justify-content: space-between;" required>
                    <div class="form-group">
                        <!-- <label for="firstname">Town/City</label> -->
                        <input type="text" class="form-control" style="width:220px;" id="town" name="city"
                            placeholder="Town/City" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="lastname">Street Address</label> -->
                        <input type="text" class="form-control" style="width:220px;" id="street" name="street"
                            placeholder="Street Address" required>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Phone no.</label> -->
                    <input type="text" class="form-control" id="phone" name="phone" maxlength="10" minlength="10"
                        placeholder="Phone no." required>
                </div>
                <div style="display:flex;text-align:center;align-items:center;">
                    <h6 style="margin:0px 5px 0 0">Payment Method:</h6>
                    <input type="radio" class="payment-radio" name="checkout_method" value="cod" id="cod" required>
                    <label class="input-label" for="cod">Cash on
                        delivery</label>
                    <input type="radio" class="payment-radio" name="checkout_method" value="esewa" id="esewa" required>
                    <label class="input-label" for="esewa"><img id="esewa-img" src="img/esewa.png" alt="e">Esewa</label>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left:35%;margin-top:10px;">Place
                    Order</button>

            </form>
        </div>
        <div id="cart-items">
            <h4>Order-list</h4>
            <div style="margin-bottom:25px;">
                <?php
                include("db_conn.php");
                include("utility.php");
                
                $user_id=$_SESSION['userid'];
                $sql="SELECT * from cart where user_id=$user_id";
                $result=mysqli_query($conn,$sql);
                
                $grand_total=0;
                while ($item=mysqli_fetch_assoc($result)) {

                    // $cart_id= $item["cart_id"];
                    $item_id=$item["item_id"];
                    $product_quantity=$item["product_quantity"];

                    $sql_item="SELECT * from items where item_id=$item_id";
                    $result_item=mysqli_query($conn,$sql_item);
                    $item=mysqli_fetch_assoc($result_item);
                    
                    $item_name=$item["item_name"];
                    $item_price=$item["item_price"];
                    $item_image=$item["item_image"];


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