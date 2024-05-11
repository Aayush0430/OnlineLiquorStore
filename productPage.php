<?php
if(!session_id())
    session_start();
 
?>
<?php  
    include('dbconnect.php');
    // if($_POST['item_id']){
        
        // $item_id=$_REQUEST['item_id'];
        $item_id=7 ;
        // $item_id=10;
        $sql="SELECT * from products where productId=$item_id";
        // $sql="SELECT * from items where item_id=10";
    $result=mysqli_query($conn,$sql);    
    $row=mysqli_fetch_array($result);
    $item_name=$row['productName'];
    $product_cat_id=$row['productCategory'];
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/productpage.css">

    <!-- for google font -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet"> -->

    <link rel=<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item_name; ?></title>
    <style>

    </style>

</head>

<body>

    <?php
        
        include('header.php');

    ?>
    <!-- product -->
    <div class="product-info">
        <div class="product-desc">
            <p><?php echo $row['productDescription'];      ?></p>

        </div>
        <div id="product-image" style="">
            <img src="<?php echo $row['productImage']; ?>" alt="product">
        </div>

        <div class="product-details">
            <div id="item-name">
                <p><?php echo $item_name;      ?></p>
            </div>
            <div id="item-price">
                <p>
                    <span>Rs</span> <?php echo $row['productPrice'];      ?>
                </p>
            </div>
            <div id="item-button">
                <form action="cart_handle.php" method="post">
                    <!-- <p>Quantity: </p><input type="number" min="1"> -->
                    <input id="button-add" type="submit" value="Add to cart">
                    <input type="hidden" name="product_id" value="'.$item_id.'">
                </form>
            </div>
            <?php
           
            echo'

        </div>
    </div>';
    ?>

            <!-- related products  -->
            <div id="related-products">
                <h2
                    style="text-align:center;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                    Related Items</h2>

                <div class="explore-page">


                    <?php
            // $product_cat_id=$row['product_cat_id'];
        $sql = "SELECT * FROM `products` where productCategory=$product_cat_id and productId not in ($item_id)";
              $result = mysqli_query($conn,$sql);
        $count = 1;
         echo '<div style="width:100%;margin-left:30px;">';
             
       echo '<div class="product-container"
       style="display:flex;justify-content:space-around;
       flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;">
       ';
       
       
       while($item = mysqli_fetch_assoc($result))
       {
           if($count<=21)
          //  {
           $category_id = $item['productCategory'];
           $product_id = $item['productId'];
           
           // card
           echo'
               <div class="card my-4 box-food" style="width: 260px; height:370px;">
                   <img src="'.$item['productImage'].'" class="card-img-top p-2" style="height:57%;object-fit:cover;">
                   <div class="card-body text-center" style="padding:15px 10px 0px 10px;">
                   <p class="card-title font-weight-light m-0">'.substr($item['productName'],0,50).'</p>
                   <h4 class="card-title font-weight-bold mt-1">Rs. '.$item['productPrice'].'</h4>
                                      <div style="position:absolute;bottom:5px;right:10px;"><i class="fa-solid fa-star" style="font-size:0.8rem;
                   color:#f2a900;"></i><span style="font-family:comic-sans;">'.number_format((float)$item['productRating'], 1, '.', '').'/5</span></div>

                
                    <!-- Button trigger  -->
                    <form action="productPage.php" method="post">
                    <input type="hidden" name="item_id" value="'.$product_id.'">
                  <button type="submit" style="background-color:#f2a900;border:0" class="btn btn-primary" id="button-order" data-toggle="modal" data-target="#exampleModalCenter'.$product_id.'">
                    Order now
                  </button>
                    </form>

                   </div>
               </div>';
           $count++;
           
           }
       
           
       echo '</div>';
     echo '</div>';

        ?>









                </div>
            </div>
            <div id="footer-section">
                <?php
        include('footer.php');
        ?>

</body>

</html>