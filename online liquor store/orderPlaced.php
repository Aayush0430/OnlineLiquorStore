<?php
if(!session_id())
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
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

    #smiley p {
        font-family: "Satisfy", cursive;
        font-size: 4rem;
    }

    h5 {
        font-family: "Comfortaa", sans-serif;
        font-size: 1rem;
        letter-spacing: -0.9px;
        word-spacing: 2px;
    }

    #go-back {
        padding: 10px 25px;
        font-size: 1rem;
        border-radius: 45px;
        color: white;
        background-color: black;
        margin-top: 30px;
        border: 1px solid gray;
    }

    #go-back:hover {
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
        <img src="image/beersclink.png" alt="LOGO" style="height:140px;">
        <div id="smiley">
            <p>Order Received</p>
            <!-- <img src="image/beersclink.png" alt=":)" style="height:50px;"> -->
        </div>
        <h5>Your order is received. Thank you for placing an order with Braverage. Your order will be delivered very
            soon. </h5>
        <a href="index.php"><button id="go-back">GO BACK</button></a>
    </div>
</body>

</html>