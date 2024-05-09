<?php
if(!session_id()){
    session_start();
}
?><?php
    include("../dbconnect.php");
    $cat_id=$_POST['category_id'];
    $sql="DELETE from category where categoryId=$cat_id";
    $result=mysqli_query($conn,$sql);
    header("location:adminCategories.php?catrem=removed");
?>