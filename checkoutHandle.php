<?php
if(!session_id())
    session_start();
 
?>
<?php
    include("dbconnect.php");
    include("utility.php");
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $city=$_POST['city'];
    $street=$_POST['street'];
    $phone=$_POST['phone'];
    $checkout_method=$_POST['checkout_method'];
    // echo $checkout_method;
    //user id
   $user_id=$_SESSION['userid'];
//    echo $user_id;

   
    //insert checkout data
    $sql_checkout="INSERT into checkout_data(user_id,first_name,last_name,city,street,phone,checkout_method)
     values(".$user_id.",'".$fname."','".$lname."','".$city."','".$street."','".$phone."','".$checkout_method."') ";
     $result_checkout=mysqli_query($conn,$sql_checkout);

     //get the latest checkout_id
     $sql_checkout="SELECT * FROM checkout_data ORDER BY checkout_id DESC LIMIT 1";
        $result_checkout=mysqli_query($conn,$sql_checkout);
        $item_checkout=mysqli_fetch_assoc($result_checkout);
        $checkout_id=$item_checkout["checkout_id"];
    // echo"$checkout_id";
        
    //pull data from cart
    $sql_cart_pull="SELECT * from cart where user_id=$user_id";
    $result_cart_pull=mysqli_query($conn,$sql_cart_pull);


    //save grand total
    $grand_total=0;

    while($item_cart_pull=mysqli_fetch_assoc($result_cart_pull)){
        //pull item id and quantity from cart
        $cart_item_id=$item_cart_pull["item_id"];//item id
        $cart_item_quantity=$item_cart_pull['product_quantity'];//item quantity

        //pull name and  price of item from item table
        $sql_item_data="SELECT * from products where productId=$cart_item_id";
        $result_item_data=mysqli_query($conn,$sql_item_data);
        $row_item_data=mysqli_fetch_assoc($result_item_data);

        $cart_item_image=$row_item_data['productImage'];
        $cart_item_name=$row_item_data["productName"]; //item name
        $cart_item_price=$row_item_data["productPrice"]; //item price
        
        //calculate total price= price * quantity
        $total_price=$cart_item_price*$cart_item_quantity;
        //adding this data to order_list table
        $sql_add_to_orderList="INSERT into order_list(checkout_id,item_name,item_image,item_quantity,item_price,item_totalprice) 
        values(".$checkout_id.",'".$cart_item_name."','".$cart_item_image."',".$cart_item_quantity.",".$cart_item_price.",".$total_price.")";
        $result_add_to_order=mysqli_query($conn,$sql_add_to_orderList);
        $grand_total+=$total_price;
    }
        //total amount-update in checkout_data table
        $sql_sales_push_checkoutdata= 'Update  checkout_data set total_amount='.$grand_total.' where checkout_id='.$checkout_id.'';
        $result_sales_push_checkout=mysqli_query($conn,$sql_sales_push_checkoutdata);
    
    
        // echo $grand_total;


        
    if ($checkout_method=='esewa') {
        $uid=$_SESSION['userid'];
        pay_esewa($grand_total,$checkout_id,$uid);
    }  
    elseif ($checkout_method=='khalti') {
        $uid=$_SESSION['userid'];
        pay_khalti($grand_total,$checkout_id,$uid);
        
    } else {
        
    
    
    
    //update grand total amount into totalsales table
    $sql_sales_pull="select * from totalsales";
    $result_sales_pull=mysqli_query($conn,$sql_sales_pull);
    $row_sales=mysqli_fetch_assoc($result_sales_pull);
    $previous_sales=$row_sales['sales'];//curent sales

    $new_sales=$previous_sales+$grand_total;//sum

    //update new sales
    $sql_sales_push= 'Update  totalsales set sales='.$new_sales.'';
    $result_sales_push=mysqli_query($conn,$sql_sales_push);

    //sold-complete so update status= 1
    $sql = "Update checkout_data set sold_status = 1 where checkout_id=$checkout_id ";
    $resu=mysqli_query($conn,$sql);

    $sql_sales_push_checkoutdata= 'Update  checkout_data set total_amount='.$grand_total.' where checkout_id='.$checkout_id.'';
    $result_sales_push_checkout=mysqli_query($conn,$sql_sales_push_checkoutdata);
    //delete items from cart
        $user_id=$_SESSION['userid'];
        $sql="DELETE from cart where user_id=".$user_id;
        $res=mysqli_query($conn,$sql);

        // $sql_email="SELECT email from users where user_id=".$user_id;
        // $res_email=mysqli_query($conn,$sql_email);
        // $row=mysqli_fetch_assoc($res_email);
        // $email=$row['email'];

        // order_mail($conn,$checkout_id,$email);
    header("location:orderPlaced.php");
    }
// header("location:orderJoin.php?cid=".$checkout_id."");


?>