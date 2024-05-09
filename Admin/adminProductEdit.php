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
    <title>Edit Product</title>
    <style>
    .body-main {
        background-color: lightgray;
        width: auto;
        height: 90vh;
        margin-left: 15vw;

        padding-left: 20px;
        /* margin-top: 9vh; */
    }

    .input_lg,
    .input_sm {
        height: 40px;
        margin: 10px 0px;
        border: 1px solid #495057;
        color: #495057;
        padding: 0px 10px;
    }

    .input_lg {
        width: 70%;
        height: 40px;
        margin: 10px 0px;
        border: 1px solid #495057;
        color: #495057;
        padding: 0px 10px;
    }

    .input_lg:focus,
    .input_sm:focus,
    .product_insert_descpt:focus {
        outline: 2px solid #495057;
    }

    .input_sm {
        width: 40%;
    }

    .input_file {
        margin: 10px 0px;
        height: 30px;
        width: 600px;
    }

    .input_cat {
        margin: 10px 0px;
        height: 30px;

    }

    .product_insert_descpt {
        padding: 0px 10px;
        width: 70%;
        height: 150px;
        resize: none;
    }

    .add-product-btn {
        margin: 20px 0 0 200px;
        font-size: 0.9rem;
        padding: 5px 10px;
        border-radius: 5px;
        border: 2px solid black;
        transition: all 0.3s ease;
    }

    .add-product-btn:hover {

        background-color: black;
        color: lightgray;
    }
    </style>
</head>

<body>
    <?php
    require_once("../dbconnect.php");
    include("adminIndex.php");
    ?>
    <?php
    $item_id=$_POST["product_id"];
    $sql_edit="SELECT * from products where productId=$item_id";
    $result_edit= mysqli_query($conn,$sql_edit);
    $item=mysqli_fetch_assoc($result_edit);
    echo'
    <div class="body-main">

        <h1 class="">Edit Product</h1>
        <form id="addProductForm" action="productEditHandle.php" method="post" enctype="multipart/form-data">
            <input class="input_lg" id="name" type="text" name="item_name" value="'.$item["productName"].'" required><br>

            <textarea class="product_insert_descpt" name="item_desc" id="desc" value="'.$item["productDescription"].'"
                required>'.$item["productDescription"].'</textarea><br>

            <!-- <label for="">URL of Photo : </label> -->
            <input class="input_file" name="item_image" type="text" id="image" value="'.$item["productImage"].'"required><br>

            <input class="input_sm" min=0 type="number" id="price" name="item_price" placeholder="Price" value="'.$item["productPrice"].'" required><br>


            <label for="">Category : </label>
            <select class="input_cat" name="category" required id="">
                ';
                            $q_fetch_category = "select * from category";
                            $result = mysqli_query($conn,$q_fetch_category);
                            while($category = mysqli_fetch_assoc($result)){
                                if($category['categoryId']==$item["productCategory"]){
                                    ?>
    <option value="<?= $category['categoryId'] ?>" selected><?= $category['categoryName']?></option>
    <?php
                                }else{
                                    ?>
    <option value="<?= $category['categoryId'] ?>"><?= $category['categoryName']?></option>
    <?php
                            }
                            }
       echo'                     
    </select><br>

                            <input type="hidden" name="item_id" value="'.$item_id.'">
    <input class="add-product-btn" type="submit" value="Save Edit">
    </form>
    </div>

    </div>
    ';


    ?>
    <script>
    // const alertdiv = document.getElementById("alert-added-inside");
    // window.addEventListener("load", () => {
    //     setTimeout(() => {
    //         alertdiv.style.display = "none";
    //         // alertdiv.style.opacity = "0";
    //     }, 2000)

    // })
    </script>
</body>

</html>