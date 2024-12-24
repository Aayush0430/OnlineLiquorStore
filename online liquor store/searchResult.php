<?php
    include("dbconnect.php");
    $searchInput = $_GET['searchinput'];
    $pageNo = 1;
   $limit =3;
   $sql = "select * from products where productName like '%".$searchInput."%'";
    $res = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($res);
   $totalButtons =ceil( $rows/$limit);
    $offset =(int)($limit*($pageNo-1));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/card.css" />
    <link rel="stylesheet" href="./css/products.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Search: <?php echo $searchInput;?></title>
</head>

<body>
    <?php include("header.php");?>
    <div class="searchtitle">Search results for: &nbsp;<?php echo "<b> ".$searchInput."</b>"; ?></div>
    <div id="searchproductcontainer">

        <div id="products">
            <?php
            $psql = "select * from products where productName like '%".$searchInput."%' limit ".$limit." offset ".$offset;
            $pres = mysqli_query($conn,$psql);
            $prows = mysqli_num_rows($res);
            if($prows>0){
            echo '<div id="allproductscontainer">';
            while($item = mysqli_fetch_assoc($pres)){
                echo
                '
              <a href="productpage.php?item_id='.$item['productId'].'">
                    <div class="cardbox">
                    <div class="card-image">
                        <img src="'.$item["productImage"].'" alt="Products" class="product_image">
                        </div>
                        <div class="card_details">
                            <p class="name">'.$item["productName"].'</p>
                            <p class="price">Rs '.$item["productPrice"].'</p>

                        </div>
                    </div>
                </a>
                ';


            }
            echo '
            </div>';
            echo "<div id='pagination'>";
            for($i=1;$i<=$totalButtons;$i++){
                if($i==1){

                    
                    echo "<button id='".$i."' class='searchresultbutton currentPage' data-searchterm='".$searchInput."' >".$i."</button>";
                }
                else{
                    echo "<button id='".$i."' class='searchresultbutton' data-searchterm='".$searchInput."'>".$i."</button>";

                }

            }
        echo '</div></div>';
            }
        else{
        echo "not found";
        }
        ?>

        </div>
    </div>
    <?php include("footer.php");?>
</body>
<script>
$(document).ready(function() {
    function searchResultPagination(page, searchTerm) {
        $.ajax({
            url: "searchResultPagination.php",
            type: "get",
            data: {
                searchinput: searchTerm,

                pageNo: page
            },
            success: function(data) {
                $('#products').html(data);
            }
        })
    }
    $(document).on("click", ".searchresultbutton", function() {
        let page = $(this).attr("id");
        let searchTerm = $(this).data("searchterm");
        searchResultPagination(page, searchTerm)
    })
})
</script>

</html>