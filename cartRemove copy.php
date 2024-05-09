<!-- <?php
if(!session_id())
    session_start();
 
?> -->
<?php
    // passed product id
    
    if(!session_id())
    {
        session_start();
    }
    
    include("db_conn.php");
    $passed_product_id = $_GET['itemid'];
    // echo $passed_product_id;
    // $passed_user_id = $_GET['userid'];
    // delete to from database
    $sql4="DELETE FROM `cart` WHERE `cart`.`item_id` = $passed_product_id";
    $result4 = mysqli_query($conn,$sql4);
    // // //nedd product name from product id
    // $sql = "SELECT * FROM `products` WHERE product_id=$passed_product_id";
    // $result = mysqli_query($conn,$sql);
    // $item=mysqli_fetch_assoc($result);
    // $name = $item['product_title'];
    header('location: cart.php?status=removed&&itemid='.$passed_product_id.'');
    
    
?>