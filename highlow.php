<?php
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
   $buttonId = $_GET["buttonId"];
//    default
   $productsSql = "select * from products where productCategory=".$categoryId;
   if($buttonId=="hightolow"){

       $productsSql = "select * from products where productCategory=".$categoryId." order by productPrice desc";
   }
   else if($buttonId=="lowtohigh"){

       $productsSql = "select * from products where productCategory=".$categoryId." order by productPrice asc";
   }
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