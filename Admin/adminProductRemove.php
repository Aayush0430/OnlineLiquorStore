<?php
if(!session_id()){
    session_start();
}
?><?php
    include("../db_conn.php");
    $itemid=$_POST["product_id"];
    $sql_remove="DELETE from products where productId=$itemid";
    $result_remove=mysqli_query($conn,$sql_remove);
    header("location:products.php?productstatus=removed");
    
?>