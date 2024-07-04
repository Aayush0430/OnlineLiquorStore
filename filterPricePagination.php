<?php
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
    $minPrice = (int)$_GET['minprice'];
    $maxPrice = (int)$_GET['maxprice'];
    $pageNo = $_GET['pageNo'];
   $limit =4;
    $sql = "select * from products where productCategory=".$categoryId." and productPrice>=".$minPrice." and productPrice<=".$maxPrice;
    $res = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($res);
    $totalButtons = ceil($rows/$limit);
    $offset =(int)($limit*($pageNo-1));
    $prodcutsSql = "select * from products where productCategory=".$categoryId." and productPrice>=".$minPrice." and productPrice<=".$maxPrice." limit ".$limit." offset ".$offset;
    $prodcutsRes = mysqli_query($conn,$prodcutsSql);
    if(mysqli_num_rows($prodcutsRes)>0){
        $output = ' <div id="products">';
        $output = '<div id="allproductscontainer">';
        while($item = mysqli_fetch_assoc($prodcutsRes)){
            $output .=
            '
            <a href="productpage.php?item_id='.$item['productId'].'">
            <div class="cardbox">
                <div class="card-image">
                        <img src="'.$item["productImage"].'" alt="Products" class="product_image">
                        </div>                
                    
                <div class="card_details">
                    <p class="name">'.$item["productName"].'</p>
                    <p class="price">'.$item["productPrice"].'</p>
  
                </div>
            </div>
          </a>
            ';
        }
        $output .= "</div>";
        $output .= "<div id='pagination'>";
        for($i=1;$i<=$totalButtons;$i++){
            if($pageNo==$i){

                
                $output .= "<button id='".$i."' class='filterPriceButton currentPage' data-minprice='".$minPrice."' data-maxprice='".$maxPrice."'>".$i."</button>";
            }
            else{
                $output .= "<button id='".$i."' class='filterPriceButton' data-minprice='".$minPrice."' data-maxprice='".$maxPrice."'>".$i."</button>";

            }

        }
        $output .= "</div></div>";
        mysqli_close($conn);
        echo $output;
    }
    else{
        $output = ' <div id="products">Not found';
        $output .= ' </div>';
    }
 
 
?>