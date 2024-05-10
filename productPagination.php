<?php
    include("dbconnect.php");
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $pageNo =(int) $_GET["pageNo"];
    $categoryId = $_GET["cid"];
    $limit = 1;
    $sql = "select * from products where productCategory=".$categoryId;
   
    $res = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($res);
    $totalButtons = $rows/$limit;
    $offset =(int)($limit*($pageNo-1));
 
    $psql = "select * from products where productCategory=".$categoryId." limit ".$limit." offset ".$offset;
    $pres = mysqli_query($conn,$psql);
    $output = "";
    if(mysqli_num_rows($pres)>0){
        $output .= "<div id='products'>";

        $output .= '<div id="allproductscontainer">';
       
        while($item = mysqli_fetch_assoc($pres)){
          $output .=
          '
          <a href="">
          <div class="cardbox">
<<<<<<< HEAD
              <img src="'.$item['productImage'].'"
=======
              <img src="'.$item["productImage"].'"
>>>>>>> fca0af1079331f7b81151ddfc8c1a9a6822ac102
                  alt="Products" class="product_image">
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

                $output .= "<button id='".$i."' class='paginationButton currentPage'>".$i."</button>";
            }
            else{
                $output .= "<button id='".$i."' class='paginationButton'>".$i."</button>";

            }
        }
        $output .= "</div></div>";
        mysqli_close($conn);
        echo $output;
    }
    else{
        echo "NO data";
    }
?>