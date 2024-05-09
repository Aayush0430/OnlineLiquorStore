<?php
if(!session_id()){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css"
        integrity="sha512-dUOcWaHA4sUKJgO7lxAQ0ugZiWjiDraYNeNJeRKGOIpEq4vroj1DpKcS3jP0K4Js4v6bXk31AAxAxaYt3Oi9xw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: rgba(49, 48, 48, 0.066);
    }

    .mainbar img {
        margin-left: 30px;
        margin-top: 10px;
        height: 50px;
        mix-blend-mode: multiply;
    }

    .login-header {
        height: 9vh;
        width: 100vw;
        /* box-shadow: 5px 5px 10px gray; */
        border-bottom: 1px solid black;
        background-color: white;
    }

    .mainbar {
        height: 100vh;
        width: 15vw;
        position: fixed;
        top: 0;
        left: 0;
        border-right: 1px solid black;
        background-color: white;
    }

    .mainbar-butn {
        display: flex;
        width: 85%;
        height: 35px;
        margin: 10px 10px;
        align-items: center;
        /* justify-content: center; */
        padding-top: 15px;
        padding-left: 15px;
        border-radius: 10px;
        border: none;
        background-color: white;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .mainbar-butn i {
        margin-bottom: 16px;
        margin-right: 20px;
    }

    .mainbar-butn:hover {
        background-color: rgba(60, 48, 48, 0.088);
    }

    .mainbar-body a {
        text-decoration: none;
    }

    .mainbar-body {
        display: flex;
        flex-direction: column;
        /* gap: 20px; */
        width: auto;
        height: 50%;
        /* background-color: red; */
    }
    </style>
</head>

<body>
    <div class="login-header">
    </div>

    <container class="mainbar">

        <img src="../img/adminLogo.png" alt="">

        <div class="mainbar-body">
            <a href="adminDashboard.php"><button class="mainbar-butn">
                    <i class="fa-solid fa-house"></i>
                    <p>Dashboard</p>
                </button>
            </a>
            <a href="products.php"><button class="mainbar-butn">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <p>Products</p>
                </button>
            </a>
            <a href="addProduct.php"><button class="mainbar-butn">
                    <i class="ri-add-circle-fill"></i>
                    <p>Add Product</p>
                </button>
            </a>
            <a href="adminCategories.php "><button class="mainbar-butn">
                    <i class="fa-solid fa-tag"></i>
                    <p>Categories</p>
                </button>
            </a>

            <a href="users.php "><button class="mainbar-butn">
                    <i class="ri-user-2-fill"></i>
                    <p>Users</p>
                </button>
            </a>
            <a href="adminLogout.php"><button class="mainbar-butn">
                    <i class="ri-logout-box-fill"></i>
                    <p>Log Out</p>
                </button>
            </a>
        </div>
    </container>
    <!-- <div class="body-main">
        <p>hello</p>
    </div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>