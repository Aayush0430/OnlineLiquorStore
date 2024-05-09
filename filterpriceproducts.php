<?php
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];
   
    $productsSql = "select * from products where productCategory=".$categoryId." and productPrice>=".$minPrice." and productPrice<=".$maxPrice;
    $prodcutsRes = mysqli_query($conn,$productsSql);
    if(mysqli_num_rows($prodcutsRes)>0){
        $output = ' <div id="products">';
        $output = '<div id="allproductscontainer">';
        while($item = mysqli_fetch_assoc($prodcutsRes)){
            $output .=
            '
            <a href="">
            <div class="cardbox">
                <img src="https://cheers.com.np/uploads/products/8129311194908114139335443628438136997322.png"
                    alt="Products" class="product_image">
                <div class="card_details">
                    <p class="name">'.$item["productName"].'</p>
                    <p class="price">'.$item["productPrice"].'</p>
  
                </div>
            </div>
          </a>
            ';
        }
        $output .= "</div></div>";
      
        mysqli_close($conn);
        echo $output;
    }
    else{
        $output = ' <div id="products">Not found';
        $output .= ' </div>';
    }
    echo $output;
 
?>