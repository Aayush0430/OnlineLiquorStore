<?php
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
   $buttonId = $_GET["buttonId"];
   $pageNo =(int) $_GET["pageNo"];
   $limit = 4;
   $sql = "select * from products where productCategory=".$categoryId;
   
    $res = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($res);
    $totalButtons = ceil($rows/$limit);
    $offset =(int)($limit*($pageNo-1));
    //    default

   if($buttonId=="hightolow"){

       $psql = "select * from products where productCategory=".$categoryId." order by productPrice desc limit ".$limit." offset ".$offset;
   }
   else if($buttonId=="lowtohigh"){

       $psql = "select * from products where productCategory=".$categoryId." order by productPrice asc limit ".$limit." offset ".$offset;
   }
    $prodcutsRes = mysqli_query($conn,$psql);
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

                $output .= "<button id='".$i."' class='highlowPaginationButton currentPage' data-highlowmode='".$buttonId."'>".$i."</button>";
            }
            else{
                $output .= "<button id='".$i."' class='highlowPaginationButton' data-highlowmode='".$buttonId."'>".$i."</button>";

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