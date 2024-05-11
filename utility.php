<?php
if(!session_id())
    session_start();

    
include ("db_conn.php");
// function  getUserEmail(){
    // $user_id=$_SESSION['userid'];
    
    // $sql="SELECT email from users where user_id=$user_id";
    // $result=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($result);
    // return $row['email'];
// }
// function  getUserID(){
//     if(!session_id()){
//         session_start();
//     }
//     $user_id=$_SESSION['userid'];


//     return $user_id;
// }

function pay_esewa($amt, $pid,$uid)
{   
        if(!session_id()){
            session_start();
        }
    $url = "https://uat.esewa.com.np/epay/main";
    $data = [
        'amt' => $amt,
        'pdc' => 0,
        'psc' => 0,
        'txAmt' => 0,
        'tAmt' => $amt,
        'pid' => $pid,
        'scd' => 'EPAYTEST',
        'su' => 'http://localhost/food/payment/paySuccess.php?q=su&&uid='.$uid.'',
        'fu' => 'http://localhost/food/payment/payFail.php?q=fu'
        // 'fu' => 'http://127.0.0.1:80/food/payment/payFail.php?q=fu'
    ];
?>
<form id="myForm" action="<?= $url ?>" method="post">
    <?php
        foreach ($data as $name => $value) {
            echo '<input type="hidden" name="' . htmlentities($name) . '" value="' . htmlentities($value) . '">';
        }
        ?>
</form>
<script type="text/javascript">
document.getElementById('myForm').submit();
</script>
<?php
}

// function redirectAlertMessage($msg, $url)
// {
//     echo "
//             <script>
//                 alert('$msg');;
//             </script>
//         ";
//     header('refresh:0;url= ' . $url);
// }


function send_mail($to, $title_msg, $msg)
{
    $to = $to;
    $title = $title_msg;
    $message = $msg;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:gfood98765@gmail.com";
    if (mail($to, $title, $message, $headers)) {
        echo "Message sent successfully...";
    } else {
        echo "Message could not be sent...";
    }
}

?>
<?php

function order_mail($conn,$checkout_id,$email){
    

    $msg = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <style>
    #cart-items {
        position: relative;
        border-radius: 10px;
        padding: 20px;
        height: auto;
        width: 350px;
        background-color: rgba(250, 250, 250, 1);
        outline: 1px solid rgba(220, 220, 220, 1);
        margin-bottom: 20px;
    }

    .items {
        width: 300px;
        height: 80px;
        /* background-color: blue; */
        display: flex;
        gap: 30px;
        padding: 10px;
        position: relative;
        margin: 10px;
        border: 1px solid black;
        border-radius: 9px;
    }
    .success-main {
        display:flex;
        margin: 50px 0 0 70px;
        width: 520px;
    }

    #smiley {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        font-size: 1rem;
        font-weight: 500;
    }

    #smiley img {
        margin: 10px 0 0 10px;

    }

    </style>
    </head>";
    $html = "
    <body>
    <div class='success-main'>
        <img src='https://lh3.googleusercontent.com/a/ACg8ocL0WJ9uS_F4BxcBuEQPpOktu-Su-CBlgb1siUnffftW5A=s192-c-rg-br100' alt='LOGO' style='height:80px;'>
        <h1>Order Received</h1>
        </div>
        <h4 style='margin-left:20px;'> Thank you for placing an order with GoodFood.</h4>
        <h4 style='margin-left:35px;'> Your order will be delivered very
            soon </h4>
        <div id='cart-items'>
        <h4>Order-list</h4>
        <div style='margin-bottom:25px;''>
    ";
    $msg = $msg.$html;
                include('db_conn.php');
                $sql="SELECT * from order_list where checkout_id=$checkout_id";
                $result=mysqli_query($conn,$sql);
                
                $grand_total=0;
                while ($item=mysqli_fetch_assoc($result)) {

                   
                    $product_quantity=$item["item_quantity"];
                    $item_name=$item['item_name'];
                   
                    
                    $item_name=$item["item_name"];
                    $item_price=$item["item_price"];
                    $item_image=$item["item_image"];
                    $itemPrice=$item_price*$product_quantity;

                $text_product = "
                        <div class='items'>
                        <div style='margin-right:10px;'>
                            <img src='$item_image' alt='ima' style='height:70px;width:70px;border-radius:10px;object-fit:cover;'>
                        </div>
                        <div>
                            <h5 style='margin:5px ;'>$item_name</h5>
                            <div style='display:flex;justify-content:space-between;gap:20px;'>
                                <h6 style='margin-right:5px;'>Price: $item_price</h6>
                                <h6>Quantity: $product_quantity</h6>
                            </div>
                        </div>
                        <div style='margin-left:70px;;'><h5>Total: $itemPrice</h5></div>
                    </div>";
                $msg = $msg.$text_product;
                $grand_total+=$itemPrice; 
                    }
        
        $msg = $msg."
        </div>
        <div style='margin-left:200px;'>
            <h4 style='color:red;font-weight:bold;'>Grand-Total: $grand_total</h4>
        </div>



    </div>
</body>

</html>
    ";
    send_mail($email,"Order Has Been Placed",$msg);
}

?>