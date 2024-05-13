<?php
if(!session_id())
    session_start();
 
?>
<?php  
    include('dbconnect.php');
    // if($_POST['item_id']){
        
        $item_id=$_REQUEST['item_id'];
        // $item_id=7 ;
        // $item_id=10;
        $sql="SELECT * from products where productId=$item_id";
        // $sql="SELECT * from items where item_id=10";
    $result=mysqli_query($conn,$sql);    
    $row=mysqli_fetch_array($result);
    $item_name=$row['productName'];
    $item_price=$row['productPrice'];
    $product_cat_id=$row['productCategory'];
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="css/card.css">
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
            <form action="cart_handle.php" method="post">

                <div class="item-quantity">
                    <button id="decrease" type="button" onclick="minus()"><i class="ri-subtract-line"></i></button>
                    <input type="number" name="quantity" id="input-quantity" min="1" value="1">
                    <button id="increase" type="button" onclick="plus()"><i class="ri-add-line"></i></button>
                </div>
                <div id="item-price">
                    <p>
                        <span>Rs</span> <span id="product-price"><?php echo $item_price;?></span>
                    </p>
                </div>
                <div id="item-button">
                    <!-- <p>Quantity: </p><input type="number" min="1"> -->
                    <input type="hidden" name="product_id" value="<?php echo $item_id ?>">
                    <input id="button-add" type="submit" value="Add to cart">
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
                style="margin-bottom:20px;width:100%;text-align:center;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                Related Items</h2>
            <div class="explore-page">
                <?php
            // $product_cat_id=$row['product_cat_id'];
        $sql = "SELECT * FROM `products` where productCategory=$product_cat_id and productId not in ($item_id)";
              $result = mysqli_query($conn,$sql);
        $count = 1;
             
       echo '<div class="product-container"
       style="display:flex;justify-content:space-around;
       flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;width:95%;">
       ';
       
       
       while($item = mysqli_fetch_assoc($result))
       {
           if($count<=10)
          //  {
           $category_id = $item['productCategory'];
           $product_id = $item['productId'];
           
           // card
           echo'
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
                </a>';
           $count++;
           
           }
       echo '</div>';
     echo '</div>';
        ?>
            </div>
        </div>
        <?php
        include('footer.php');
        ?>
        <script>
        function minus() {

            quantity = document.getElementById("input-quantity");
            oldvalue = quantity.value;
            if (oldvalue > 1) {
                quantity.value = oldvalue - 1;
            }
        }

        function plus() {
            quantity = document.getElementById("input-quantity");
            oldvalue = quantity.value;
            quantity.value = parseInt(oldvalue) + 1;
            // console.log(quantity.value);
        }
        </script>
        <script>
        // function handlequan() {
        //     mainprice = document.getElementById("product-price").innerHTML;
        //     // const price = document.getElementById("product-price");
        //     const quan = document.getElementById("input-quantity");
        //     // console.log(price.innerHTML)
        //     console.log(quan.value)
        //     price.innerHTML = parseInt(mainprice) * parseInt(quan.value);
        // }
        </script>
</body>

</html>