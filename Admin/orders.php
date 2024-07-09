<?php
if(!session_id()){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Homenaje&family=Inconsolata:wght@200..900&display=swap');

    .body-main {
        background-color: white;
        width: auto;
        height: auto;
        min-height: 91vh;
        margin-left: 15vw;
        padding-left: 5px;
        /* margin-top: 9vh; */
    }

    #orders {
        display: flex;
        /* flex-direction: column; */
        /* background-color: pink; */
        padding-left: 20px;
    }

    .order-each {
        border: 1px solid gray;
        background-color: rgb(238, 238, 238);
        padding: 10px;
        border-radius: 10px;
        width: auto;
        display: flex;
        margin: 10px;
        font-family: "Inconsolata", monospace;
    }

    .order-each .left {
        /* background-color: aqua; */
        display: flex;
        flex-direction: column;
        padding: 5px;
        width: auto;
        /* margin-right: 5px */
    }

    .order-each .left .pp {
        margin: 0;
        display: flex;
    }

    .p-div {
        width: 150px;
        font-weight: 800;
    }

    .order-each .right {
        /* background-color: red; */
        display: flex;
        flex-direction: column;
    }

    .items {
        display: flex;
        /* flex-direction: column; */
        /* justify-content: space-evenly; */
        /* border: 1px solid black; */
        /* border-radius: 10px; */
        padding: 5px;
        height: 150px;
        width: auto;
    }

    .items-each {
        border: 1px solid gray;
        border-radius: 10px;
        background-color: rgb(248, 246, 246);
        display: flex;
        flex-direction: column;
        height: 140px;
        width: auto;
        font-size: 0.6rem;
        padding: 5px;
        margin-right: 5px;
    }

    .items-each p {
        margin: 0;
        font-weight: bold;
        font-size: 0.8rem;
    }
    </style>
</head>

<body>
    <?php
    include("adminIndex.php");?>
    <div class="body-main">

        <h3>ORDERS</h3>



        <?php

            include ("../dbconnect.php");
            //select checkout whose sold status=1
            $sql1="SELECT * from checkout_data where sold_status=1 order by checkout_id Desc";
            $result1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)<1){
                
            }else{
            while( $row1 = mysqli_fetch_assoc($result1) ){
                
                //call each checkout_id
                $checkout_id=$row1['checkout_id'];
                $user_id=$row1['user_id'];
                //get username
                $result_user=mysqli_query($conn,"SELECT username from users where uid=$user_id");
                $row_user=mysqli_fetch_assoc($result_user);
                $user_name=$row_user['username'];
                $fname=$row1['first_name'];
                $lname=$row1['last_name'];
                $city=$row1['city'];
                $street=$row1['street'];
                $phone=$row1['phone'];
                $checkout_method=$row1['checkout_method'];
                $total_amount=$row1['total_amount'];
                $order_date=$row1['order_date'];
                
                echo'
                    <div id="orders">
                        <div class="order-each">
                            <div class="left">
                                
                                <div class="pp"><div class="p-div">Order ID</div><div>:'.$checkout_id.'</div></div>
                               <div class="pp"><div class="p-div"> USER</div><div>:'.$user_name.'</div></div>
                               <div class="pp"> <div class="p-div">Ordered by</div><div>:'.$fname." ".$lname.'</div></div>
                                <div class="pp"><div class="p-div">Location</div><div>:'.$city.", ".$street.'</div></div>
                                <div class="pp"><div class="p-div">Ph.</div><div>:'.$phone.'</div></div>
                              <div class="pp">  <div class="p-div">Checkout method</div><div>:'.$checkout_method.'</div></div>
                               <div class="pp"> <div class="p-div">Date</div><div>:'.$order_date.'</div></div>
                            </div>
                            <div class="right">
                                <div style="display:flex;justify-content:space-evenly;padding-left:20px;">
                                    <div style="flex:1;font-size:1.2rem;font-weight:bold;margin-right:10px;">Items</div>
                                    <div style="font-weight:bold;">Total:RS'." ".''.$total_amount.'</div>
                                </div>
                                <div class="order-items">
                                <div class="items">';
                                
                                     $sql2="SELECT * from order_list where checkout_id=".$checkout_id."";
                                        $result2=mysqli_query($conn,$sql2);
                                        while($row2=mysqli_fetch_assoc($result2)){
                                            $item_name=$row2['item_name'];
                                            $item_image=$row2['item_image'];
                                            $item_price=$row2['item_price'];
                                            $item_quantity=$row2['item_quantity'];
                                            echo"
                                            <div class='items-each'>
                                                <img src='".$item_image."' style='height:90px;width:90px;object-fit:cover;border-radius:10px;' alt='img'>
                                                <p>".$item_name."</p>
                                                <p>Rs ".$item_price." X ".$item_quantity."</p>
                                            </div>
                                            ";

                                        }

                                echo'</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                ';



               


            }
        }
        ?>





    </div>

</body>

</html>