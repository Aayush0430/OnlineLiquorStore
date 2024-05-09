<?php
if(!session_id()){
    session_start();
}
?>
<?php
    require_once '../dbconnect.php';
    
    if($_POST){
        $name = addslashes($_REQUEST['item_name']);
        $p_desc = addslashes($_REQUEST['item_desc']);
        $price = $_REQUEST['item_price'];
        $image=$_REQUEST['item_image'];
        // echo $name;
        // echo $p_desc;
        // echo $price;
        // echo $p_desc;
        // echo$c_id;
        // echo $item_image;
        
        $c_id = $_REQUEST['category'];


        $q_product = "SELECT * from products where productName= '$name' and productPrice = '$price'";

        $result = mysqli_query($conn,$q_product);
        if(mysqli_num_rows($result)==0){
        

                $q_insert_product = "INSERT INTO products (productName,productDescription,productPrice,productImage,productCategory) values ('$name','$p_desc','$price','$image','$c_id')";
                if(mysqli_query($conn,$q_insert_product)){
                    // echo "
                    // <div class='server_success'>
                    // Product is Added !
                    // </div>
                    // ";
                    header("refresh:0;url=addProduct.php?st=added");
                }else{
                    echo "error";
                }
            }
            else{
                header("refresh:0;url=addProduct.php?st=notadded");
            }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
    include("adminIndex.php");
    ?>
    <?php
    if(isset($_GET["st"])){
        $status=$_GET["st"];
        if($status== "added"){
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-success alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Item added successfully!!
            </div>
            </div>
            ';
        }else{
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-danger alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Item not added!!
            </div>
            </div>
            ';
            
        }
    }
    ?>
    <div class="body-main">

        <h1 class="">Add Product</h1>
        <form id="addProductForm" action="" method="post" enctype="multipart/form-data">
            <input class="input_lg" id="name" type="text" name="item_name" placeholder="Title/Name" required><br>

            <textarea class="product_insert_descpt" name="item_desc" id="desc" placeholder="Description"
                required></textarea><br>

            <!-- <label for="">URL of Photo : </label> -->
            <input class="input_file" name="item_image" type="text" id="image" placeholder="Image URL" required><br>

            <input class="input_sm" min=0 type="number" id="price" name="item_price" placeholder="Price" required><br>


            <label for="">Category : </label>
            <select class="input_cat" name="category" required id="">
                <!-- <option>SELECT</option> -->
                <?php
                            $q_fetch_category = "select * from category";
                            $result = mysqli_query($conn,$q_fetch_category);
                            while($category = mysqli_fetch_assoc($result)){
                                ?>
                <option value="<?= $category['categoryId'] ?>"><?= $category['categoryName']?></option>
                <?php
                            }
                            ?>
            </select><br>


            <input class="add-product-btn" type="submit" value="Add Product">
        </form>
    </div>

    </div>
    <script>
    const alertdiv = document.getElementById("alert-added");
    const alertdivinside = document.getElementById("alert-added-inside");
    window.addEventListener("load", () => {
        setTimeout(() => {
            alertdiv.style.display = "none";
            alertdivinside.style.display = "none";
            // alertdiv.style.opacity = "0";
        }, 2000)

    })
    </script>
</body>

</html>