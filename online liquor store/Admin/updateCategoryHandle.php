<?php
if(!session_id()){
    session_start();
}
?><?php
    include("../dbconnect.php");
    $cat_id=$_POST['category_id'];
    $cat_name=$_POST['category_name'];
    
    $sql_update="UPDATE category set categoryName='$cat_name' where categoryId=$cat_id";
    $result=mysqli_query($conn,$sql_update);
    header("location:adminCategories.php?catup=updated");

?>