<?php
if(!session_id()){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .dashboard-main {
        display: flex;
        flex-wrap: wrap;
        height: auto;
        font-size: 1.2rem;
    }

    .dashboard-box {
        padding: 15px 0 0 18px;
        height: 120px;
        width: 250px;
        border-radius: 25px;
        border-top: 1.5px solid beige;
        border-bottom: 1.5px solid beige;
        margin: 30px;
        color: white;
        box-shadow: 2px 5px 5px gray;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .dashboard-box p {
        font-size: 1.2rem;
        margin: 20px 0 0 0px;
    }

    .red {
        background-color: rgba(255, 0, 0, 0.632);
    }

    .blue {
        background-color: rgba(17, 0, 255, 0.632);
    }

    .green {
        background-color: rgba(13, 255, 0, 0.632);
    }

    .cyan {
        background-color: rgba(0, 229, 255, 0.632);
    }

    .purple {
        background-color: rgba(255, 0, 242, 0.632);
    }
    </style>
</head>

<body>
    <?php
    include("adminIndex.php");
    include("../dbconnect.php");
    ?>

    <div class="body-main">
        <div class="dashboard-main">
            <div class="dashboard-box blue">
                <?php
                // $sql_items="SELECT COUNT(item_id) as total FROM items;";
                $sql_items="SELECT * FROM products;";
                $result_items = mysqli_query($conn,$sql_items);
                $item=mysqli_num_rows($result_items);
                echo"$item";
                ?>
                <p>NO OF ITEMS
                    <i class="fa-solid fa-bag-shopping"></i>

                </p>

            </div>

            <div class="dashboard-box red">
                <?php
                // $sql_items="SELECT COUNT(item_id) FROM items;";
                $sql_items="SELECT * FROM category;";
                $result_items = mysqli_query($conn,$sql_items);
                $item=mysqli_num_rows($result_items);
                echo"$item";
                ?>
                <p>NO OF CATEGORIES
                    <i class="fa-solid fa-tag"></i>
                </p>
            </div>

            <div class="dashboard-box purple">
                <?php
                // $sql_items="SELECT COUNT(item_id) FROM items;";
                $sql_items="SELECT * FROM users;";
                $result_items = mysqli_query($conn,$sql_items);
                $item=mysqli_num_rows($result_items);
                echo"$item";
                ?>
                <p>NO OF USERS
                    <i class="ri-user-2-fill"></i>
                </p>
            </div>

            <!-- <div class="dashboard-box green">
                <?php
                // $sql_items="SELECT COUNT(item_id) FROM items;";
                // $sql_items="SELECT * FROM checkout_data where sold_status=1;";
                // $result_items = mysqli_query($conn,$sql_items);
                // $item=mysqli_num_rows($result_items);
                // echo"$item";
                ?>
                <p>NO OF ORDERS
                    <i class="fa-solid fa-cart-shopping"></i>
                </p>
            </div> -->

            <!-- <div class="dashboard-box cyan">
                <?php
                // $sql_items="SELECT COUNT(item_id) FROM items;";
                // $sql_items="SELECT * FROM totalsales;";
                // $result_items = mysqli_query($conn,$sql_items);
                // $item=mysqli_fetch_array($result_items);
                // echo"Rs "."$item[0]";
                ?>
                <p>TOTAL SALES
                    <i class="ri-money-rupee-circle-line" style="font-size: 1.5rem;"></i>
                </p>
            </div> -->
        </div>
    </div>
    <script>

    </script>
</body>

</html>