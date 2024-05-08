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
        $output = "<div id='products'>";
        $output = '<div id="allproductscontainer">';
       
        while($item = mysqli_fetch_assoc($pres)){
          
            $output .= $item['productName']. "  " ;
                $output .= $item['productPrice'];
                $output .= '<br/>';
        }
$output .= "</div>";
        $output .= "<div id='pagination'>";
        for($i=1;$i<=$totalButtons;$i++){
            $output .= "<button id='".$i."' class='paginationButton'>".$i."</button>";
        }
        $output .= "</div></div>";
        mysqli_close($conn);
        echo $output;
    }
    else{
        echo "NO data";
    }
?>