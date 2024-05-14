<?php 
if(!session_id())
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fail Payment</title>
</head>
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

<body>

    <?php
     echo '<div class="trasaction_success">
        <p style="font-size:1.1rem;font-weight:500;">Transaction Failed</p>
        <p style="font-weight:500;">Please Try Again</p>
    </div>';
    header("refresh:3;url=../index.php");
?>
</body>

</html>