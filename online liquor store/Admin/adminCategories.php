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
    <title>Categories</title>
    <style>
    .body-main {
        background-color: lightgray;
        width: auto;
        height: auto;
        min-height: 91vh;

        margin-left: 15vw;
        padding-left: 20px;
        /* margin-top: 9vh; */
    }

    #category_add {
        display: flex;
        padding: 20px;
        height: auto;
        width: auto;
        /* background-color: red; */
    }


    #cat-name {
        margin: 0 20px;
        background-color: lightgray;
        /* color: white; */
        width: 150px;
        border: none;
        outline: none;
        height: 30px;
    }

    #cat-image {
        border: none;
        outline: none;
        margin-left: 20px;
        margin-right: 5px;
        background-color: lightgray;
        /* color: white; */

        width: 100px;
        height: 30px;


    }

    .cat-inner {
        padding: 5px;
        height: 40px;
        border: 1px solid black;

        font-size: 0.9rem;
        background-color: lightgray;
        border-radius: 20px;

    }

    .cat-inner input::placeholder {
        color: black;
    }

    #cat-add-button {
        font-size: 0.8rem;
        font-weight: 500;
        margin-left: 20px;
        padding: 0 10px;
        height: 38px;
        border: 1px solid black;
        outline: none;
        color: black;
        transition: all 0.5s ease;
        background-color: lightgray;
        border-radius: 20px;


    }

    #cat-add-button:hover {
        background-color: gray;
        border: none;
        color: white;

    }

    #cat-table {
        /* border: 1px solid black; */
        text-align: center;
    }

    table {
        border-radius: 10px;
    }

    #cat-table th {
        border: 1px solid black;
        color: white;
        font-size: 1rem;
        font-weight: 400;
        padding: 10px;
        background-color: gray;
    }

    #cat-table td {
        border: 1px solid black;
        font-size: 1rem;
        padding: 5px;
    }

    .action-button {
        font-size: 0.8rem;
        border-radius: 5px;
        border: 1px solid black;
        padding: 0 5px;
        transition: all 0.4s ease;
    }

    .action-button:hover {
        transform: scale(1.05);
        /* color: yellow;
        background-color: lightgray; */
    }


    .action-yellow {
        margin-right: 10px;
        background-color: rgba(255, 225, 0, 0.2);
    }

    .action-red {
        background-color: rgba(255, 0, 0, 0.5);
    }
    </style>
</head>

<body>
    <?php
    include("adminIndex.php");
    include("../dbconnect.php");

    if(isset($_GET["catrem"])){
        $status=$_GET["catrem"];
        if($status== "removed"){
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-danger alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Category removed successfully!!
            </div>
            </div>
            ';
        }
    }
    if(isset($_GET["catadd"])){
        $status=$_GET["catadd"];
        if($status== "added"){
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-success alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Category added successfully!!
            </div>
            </div>
            ';
        }
    }
    if(isset($_GET["catup"])){
        $status=$_GET["catup"];
        if($status== "updated"){
            echo'<div id="alert-added" style="position:fixed;z-index:100;height:100vh;width:100vw;background:black;opacity:50%"></div>
            <div id="alert-added-inside" class="alert alert-success alert-dismissible fade show"style="text-align:center;width:22vw;position:fixed;top:50%;left:40%;z-index:100;" role="alert">
            Category Updated successfully!!
            </div>
            </div>
            ';
        }
    }
    ?>



    <div class="body-main">
        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Category Insert
        </h3>
        <div id="category_add">

            <div class="cat-inner">
                <form action="addCategory.php" method="post">
                    <input type="text" id="cat-name" name="category_name" placeholder="Category Name" required>
            </div>
            <button type="submit" id="cat-add-button">Add Category</button>
            </form>

        </div>
        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Category List </h3>
        <?php
              $sql = "SELECT * FROM `category`";
              $result = mysqli_query($conn,$sql);
            echo '
            <table id="cat-table"  >
            <tr>
                <th>S.N.</th>
                <th>Category-name</th>
                <th>No of items</th>
                <th style="width:100px;">Action</th>
            </tr>
            ';
       $sn=1;
       while($item = mysqli_fetch_assoc($result))
       {
        $category_id=$item['categoryId'];
          $sql_count="SELECT COUNT(productId) as total FROM products where productCategory=$category_id";
            $result_count = mysqli_query($conn,$sql_count);
            $item_count=mysqli_fetch_assoc($result_count);
           echo'
            <tr>
                <td>'.$sn.'</td>
                <td style="text-align:left;">'.$item['categoryName'].'</td>
                <td>'.$item_count['total'].'</td>
                <td ">
                <div style="display:flex;">
                <form action="updateCategory.php" method="post">
                          <button type="submit" class="action-button action-yellow">Update</button>
                          <input  type="hidden" name="category_id" value="'.$category_id.'">
                </form>

                
                <form action="removeCategory.php" method="post">
                          <button type="submit" class="action-button action-red" >Remove</button>
                          <input  type="hidden" name="category_id" value="'.$category_id.'">
                </form>
                </div>
                </td>
            </tr>
           ';
           
           $sn++;
          }
           
     
     ?>
    </div>
    <script>

    </script>
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

</html