<?php
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];
   
    $productsSql = "select * from products where productCategory=".$categoryId." and productPrice>=".$minPrice." and productPrice<=".$maxPrice;
    $prodcutsRes = mysqli_query($conn,$productsSql);
    if(mysqli_num_rows($prodcutsRes)>0){
        $output = ' <div id="products">';

        while($item = mysqli_fetch_assoc($prodcutsRes)){
            $output .= $item['productName']. "  " ;
            $output .= $item['productPrice'];
            $output .= '<br/>';
        }
        $output .= ' </div>';
    }
    else{
        $output = ' <div id="products">Not found';
        $output .= ' </div>';
    }
    echo $output;
 
?>