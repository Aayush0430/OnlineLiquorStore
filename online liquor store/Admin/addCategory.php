<?php
if(!session_id()){
    session_start();
}
?><?php
    include("../dbconnect.php");
    $category_name=$_POST['category_name'];
    $sql="insert into category(categoryName) values('$category_name')";
    $result=mysqli_query($conn,$sql);
    header("location:adminCategories.php?catadd=added");

?>