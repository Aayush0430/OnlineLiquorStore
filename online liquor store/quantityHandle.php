<?php
    include('dbconnect.php');
    $item_id_incart=$_GET['id'];
    $item_quantity=$_POST['quant'];
    $sql_update_quantity="UPDATE cart set product_quantity=$item_quantity where item_id=$item_id_incart";
    $result_update_quantity=mysqli_query($conn,$sql_update_quantity);
    header("location:cart.php");
?>