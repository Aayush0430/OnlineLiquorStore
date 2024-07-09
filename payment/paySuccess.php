<?php 
if(!session_id())
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Successfull</title>
    <style>
    body {
        background: url(../img/esewa_background.png);
        /* background-position: center; */
        background-size: cover;
    }

    .trasaction_success {
        width: 300px;
        padding: 5px 25px;
        color: white;
        border-radius: 10px;
        margin: 250px auto 0;
        border: 1px solid green;
        background-color: #60BB46;
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    </style>
</head>

<body>


    <?php
    
require_once "../dbconnect.php";
require_once "../utility.php";
if ($_GET && isset($_REQUEST["refId"])) {
    //Fetch record with respect to payment request id
    $sql = "Select * from checkout_data where total_amount = "
        . $_REQUEST['amt'] . " AND checkout_id = " . $_REQUEST['oid']
        . " ";
    
    $result = mysqli_query($conn, $sql);
    $purchaseData = mysqli_fetch_assoc($result);
    $checkout_id=$purchaseData['checkout_id'];
    if ($purchaseData) {
        $url = "https://uat.esewa.com.np/epay/transrec";
        $data = [
            'amt' => $purchaseData["total_amount"],
            'rid' => $_REQUEST["refId"],
            'pid' => $checkout_id,
            'scd' => 'EPAYTEST'
        ];
        // print_r($data); exit;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        if(!session_id()){
            session_start();
        }
        // strpos($response, "Success");
        if (strpos($response, "Success") !== false) {
            $sql = "Update checkout_data set sold_status = 1 where checkout_id=$checkout_id ";
            // Need to delete the items from the cart
            if(mysqli_query($conn, $sql)) {
                echo '<div class="trasaction_success">
                        <p style="font-size:1.1rem;font-weight:500;">Transaction completed successfully</p>
                        <p style="font-weight:500;"> Order has been placed</p>
                    </div>';
               
                    //update grand total amount into totalsales table
                        $sql_sales_pull="select * from totalsales";
                        $result_sales_pull=mysqli_query($conn,$sql_sales_pull);
                        $row_sales=mysqli_fetch_assoc($result_sales_pull);
                        $previous_sales=$row_sales['sales'];//curent sales


                        //extract grand total of this transaction
                        $sql_sales_checkoutdata= 'SELECT total_amount from checkout_data where checkout_id='.$checkout_id.'';
                        $result_sales_checkout=mysqli_query($conn,$sql_sales_checkoutdata);  
                        $row_sales_checkout=mysqli_fetch_assoc($result_sales_checkout);
                        $grand_total=$row_sales_checkout['total_amount'];
                        $new_sales=$previous_sales+$grand_total;//sum

                        //update new sales
                        $sql_sales_push= 'Update  totalsales set sales='.$new_sales.'';
                        $result_sales_push=mysqli_query($conn,$sql_sales_push);

                        

                        //delete items from cart
                        $user_id=$_GET['uid'];
                        $sql="DELETE from cart where user_id=".$user_id;
                        $res=mysqli_query($conn,$sql);

                        include("../dbconnect.php");
                        // get email
                        $sql_email="SELECT email from users where uid=".$user_id;
                        $res_email=mysqli_query($conn,$sql_email);
                        $row=mysqli_fetch_assoc($res_email);
                        $email=$row['email'];
                        order_mail($conn,$checkout_id,$email);
                        
                        if(!session_id()){
                            session_start();
                        }
                        session_start();
                header("location:../orderPlaced.php");
            } else {
                echo '<div class="trasaction_success">
                <p style="font-size:1.1rem;font-weight:500;">Error Occured</p>
                <p style="font-weight:500;"> Please Contact Administrator</p>
                </div>';

                header("refresh:3;url=../index.php");
            }
        } else {
            echo '<div class="trasaction_success">
            <p style="font-size:1.1rem;font-weight:500;">Error Occured</p>
            <p style="font-weight:500;"> Please Contact Administrator</p>
            </div>';        
            header("refresh:3;url=../index.php");
        }
        
    } 
    else {
        echo '<div class="trasaction_success">
        <p style="font-size:1.1rem;font-weight:500;">Transaction Error</p>
        <p style="font-weight:500;">Please Try Again</p>
        </div>';
        exit;
        header("refresh:3;url=../index.php");
    }
}
header("refresh:2;url=../index.php")
?>


</body>

</html>