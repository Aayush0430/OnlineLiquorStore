<?php
if(!session_id())
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Order Placed</title>
    <style>
    .success-main {
        margin: 50px auto 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 520px;
    }

    #smiley {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        font-size: 3rem;
        font-weight: 500;
    }

    #smiley img {
        margin: 10px 0 0 10px;

    }

    button {
        padding: 5px 10px;
        border-radius: 10px;
        background-color: #f2a800;
        transition: all 0.4s ease;
    }

    button:hover {
        transform: scale(1.1);
    }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <?php
        if(!session_id())
            session_start();
        ?>
    <div class="success-main">
        <img src="img/foodlogo.png" alt="LOGO" style="height:80px;">
        <div id="smiley">
            <p>Order Received</p>
            <img src="img/smilue.jpg" alt=":)" style="height:50px;">
        </div>
        <h6>Your order is received. Thank you for placing an order with GoodFood. Your order will be delivered very
            soon </h6>
        <a href="index.php"><button>GO BACK</button></a>
    </div>
</body>

</html>