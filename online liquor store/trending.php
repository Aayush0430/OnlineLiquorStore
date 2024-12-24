    <h1>Trending Products</h1>
    <div class="trending_products">



        <?php

        $sql = "SELECT * FROM `products` where productId=1 or productId=2 or productId=3 or productId=5";
              $result = mysqli_query($conn,$sql);
        
       while($item = mysqli_fetch_assoc($result))
       {
           
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
           
           }
       
           
       
     echo '</div></div>';

        ?>


        <!-- <a href="">
            <div class="cardbox">
                <img src="https://cheers.com.np/uploads/products/8129311194908114139335443628438136997322.png"
                    alt="Products" class="product_image">
                <div class="card_details">
                    <p class="name">Arna Beer</p>
                    <p class="price">240</p>

                </div>
            </div>
        </a>
        <a href="">
            <div class="cardbox">
                <img src="https://cheers.com.np/uploads/products/8129311194908114139335443628438136997322.png"
                    alt="Products" class="product_image">
                <div class="card_details">
                    <p class="name">Arna Beer</p>
                    <p class="price">240</p>

                </div>
            </div>
        </a>
        <a href="">
            <div class="cardbox">
                <img src="https://cheers.com.np/uploads/products/8129311194908114139335443628438136997322.png"
                    alt="Products" class="product_image">
                <div class="card_details">
                    <p class="name">Arna Beer</p>
                    <p class="price">240</p>

                </div>
            </div>
        </a>
        <a href="">
            <div class="cardbox">
                <img src="https://cheers.com.np/uploads/products/8129311194908114139335443628438136997322.png"
                    alt="Products" class="product_image">
                <div class="card_details">
                    <p class="name">Arna Beer</p>
                    <p class="price">240</p>

                </div>
            </div>
        </a> -->
    </div>