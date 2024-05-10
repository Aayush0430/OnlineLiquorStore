<?php
if(!session_id()){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
    html {
        margin-right: none;
    }

    .body-main {
        background-color: lightgray;
        width: auto;
        height: auto;
        margin-left: 15vw;
        padding-left: 5px;
        /* margin-top: 9vh; */
    }

    .box-food {
        transition: all 0.7s ease;
    }

    .box-food img {
        filter: contrast(60%);
        transition: all 0.6s ease;

    }

    .box-food:hover {
        /* transform: scale(1.1); */
        box-shadow: 5px 5px 10px gray;
        font-size: 1.2rem;

    }

    .box-food:hover>img {
        filter: contrast(100%);


    }

    #button-order {
        transition: all 0.4s ease;
    }

    #button-order:hover {
        transform: scale(0.9);
        color: black;


    }

    .head-search {
        margin-left: 50px;
        display: flex;
    }

    .head-search button,
    .head-search input {
        border-radius: 10px;
        padding: 2px 5px;
        border: none;
        margin-top: 5px;
    }

    .head-search input {
        margin-left: 10px;
    }

    .head-search button:hover {
        color: white;
        background-color: black;
    }
    </style>
</head>

<body>
    <?php
    include("adminIndex.php");
    include("../dbconnect.php");
    ?>
    <?php
    if(isset($_GET["productstatus"])){
        $status=$_GET["productstatus"];
        if($status== "removed"){
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-danger alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Item removed successfully!!
            </div>
            </div>
            ';
        }
    }
    if(isset($_GET["editstatus"])){
        $status=$_GET["editstatus"];
        if($status== "edited"){
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-success alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Item Edited successfully!!
            </div>
            </div>
            ';
        }
    }
    ?>
    <div class="body-main">


        <div class="head-search">
            <h2 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">PRODUCTS</h2>
            <form action="adminProductSearch.php" method="post">

                <input type="text" placeholder="Search" name="searched-item">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

            </form>
        </div>
        <?php
              $sql = "SELECT * FROM `products`";
              $result = mysqli_query($conn,$sql);
     $count = 1;
     echo '<div style="width:80vw;margin-left:10px;margin-right:none">';
       echo '<div class="product-container"
       style="display:flex;justify-content:space-around;
       flex-wrap:wrap;background:rgba(250, 250, 250, 1);border-radius:15px;padding:10px;">';
       
       
       while($item = mysqli_fetch_assoc($result))
       {
          //  if($count<=28)
          //  {
           $category_id = $item['productCategory'];
           $product_id = $item['productId'];
           
           // card
           echo'
               <div class="card my-4 box-food" style="width: 180px; height:250px;">
                   <img src="'.$item['productImage'].'" class="card-img-top p-2" style="height:57%;object-fit:cover;">
                   <div class="card-body text-center" style="padding:15px 10px 0px 10px;font-size:0.9rem;">
                   <p class="card-title font-weight-light m-0">'.substr($item['productName'],0,50).'</p>
                   <h6 class="card-title font-weight-bold" style="">Rs. '.$item['productPrice'].'</h6>
                    
                   <!-- Button trigger modal -->

                  <button type="button" style="background-color:#f2a900;border:0:font-size:0.7rem;padding:2px 5px;" class="btn btn-primary" id="button-order" data-toggle="modal" data-target="#exampleModalCenter'.$product_id.'">
                    View
                  </button>

                  <!-- Modal -->

                  <div class="modal fade" id="exampleModalCenter'.$product_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">'.$item["productName"].'</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                       
                        <form action="adminProductEdit.php" method="post">

                        <div class="modal-body">
                          <div style="display:flex;height:200px;">
                          <img src='.$item["productImage"].' class="card-img-top" style="height:100%;border-radius:15px;width:230px;object-fit: cover;object-position: center;">
                            <div class="right" style="width:50%;display:flex;flex-direction:column;justify-content:center;align-items:center;"> 
                            <div class="desc" style="padding:0 10px;font-size:0.95rem;">
                              '.$item["productDescription"].'
                          </div>
                          <br>  
                            <!--<input type="number" name="quantity" id="quantityInput" onchange=\'calcTotal()\' value="1" style="width:50px;">-->
                              <p>Price: '.$item["productPrice"].'</p>
                          </div>
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <input type="submit" value="Edit" class="btn btn-secondary" >
                          <input  type="hidden" name="product_id" value="'.$product_id.'">
                          </form>
                          
                          <form action="adminProductRemove.php" method="post">
                          
                          <input type="submit" value="Remove"  class="btn btn-secondary" style="background-color:rgba(255, 0, 0, 0.521);">
                          <input  type="hidden" name="product_id" value="'.$product_id.'">

                          

                          </form>
                        </div>
                      </div>
                    </div>
                  </div> 
                

                   </div>
               </div>';
           $count++;
           
           }
       
           
       echo '</div>';
     echo '</div>';
     ?>


        <script>
        const alertdiv = document.getElementById("alert-added");
        const alertdivinside = document.getElementById("alert-added-inside");
        window.addEventListener("load", () => {
            setTimeout(() => {
                alertdiv.style.display = "none";
                alertdivinside.style.display = "none";
                // alertdiv.style.opacity = "0";
            }, 1000)

        })
        </script>
    </div>
</body>

</html>