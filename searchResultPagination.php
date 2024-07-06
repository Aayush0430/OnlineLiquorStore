<?php
    include("dbconnect.php");

    $pageNo = $_GET['pageNo'];
    $searchInput = $_GET['searchinput'];
   $limit =3;
   $sql = "select * from products where productName like '%".$searchInput."%'";
    $res = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($res);
    $totalButtons = ceil($rows/$limit);
    $offset =(int)($limit*($pageNo-1));
    $psql = "select * from products where productName like '%".$searchInput."%' limit ".$limit." offset ".$offset;
    $pres = mysqli_query($conn,$psql);
    if(mysqli_num_rows($pres)>0){
        
        $output = ' <div id="products">';
   
        $output = '<div id="allproductscontainer">';
        while($item = mysqli_fetch_assoc($pres)){
            $output .=
            '
            <a href="">
            <div class="cardbox">
            <div class="card-image">
                <img src="'.$item["productImage"].'"
                    alt="Products" class="product_image">
                    </div>
                <div class="card_details">
                    <p class="name">'.$item["productName"].'</p>
                    <p class="price">Rs '.$item["productPrice"].'</p>
  
                </div>
            </div>
          </a>
            ';
        }
        $output .= "</div>";
        $output .= "<div id='pagination' >";
        for($i=1;$i<=$totalButtons;$i++){
            if($pageNo==$i){

                    
                $output .= "<button id='".$i."' class='searchresultbutton currentPage' data-searchterm='".$searchInput."' >".$i."</button>";
            }
            else{
                $output .= "<button id='".$i."' class='searchresultbutton' data-searchterm='".$searchInput."'>".$i."</button>";

            }

        }
        mysqli_close($conn);
        $output .= "</div></div>";
        echo $output;
    }
    else{
        $output = ' <div id="products">Not found';
        $output .= ' </div>';
    }
 
 
?>