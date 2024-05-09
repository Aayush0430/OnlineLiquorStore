<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/adminLogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin Login</title>

</head>

<body>
    <div class="login-header">
        <img src="img/adminLogo.png" alt="">
        <!-- <a href="admin/adminDashboard.php" style="color:white;">admin</a> -->
    </div>
    <?php
    if(isset($_GET["p"])){
        $status=$_GET["p"];
        if($status== "notmatch"){
            echo'
            <div id="unmatch" class="alert alert-warning alert-dismissible fade show"style="text-align:center;width:100vw;position:absolute;" role="alert">
            Credentials didn\'t match!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
        }
    }
    ?>
    <div class="login-body">

        <form action="./Admin/adminLoginCheck.php" autocomplete="off" method="POST" class="container "
            style="width:500px;outline:1px solid rgba(220, 220, 220, 1);padding:40px;border-radius:10px;background:rgba(250, 250, 250, 1);">
            <h1>Admin Login</h1>
            <br>

            <div class="form-group">
                <label for="exampleInputEmail1">Email Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                    required>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="not-registered">
                <h6>Not registered! </h6><a href="signup.php">Signup now</a>
            </div>
        </form>



    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
    const alertdiv = document.getElementById("unmatch");
    window.addEventListener("load", () => {
        setTimeout(() => {
            alertdiv.style.display = "none";
            // alertdiv.style.opacity = "0";
        }, 2000)

    })
    </script>
</body>

</html>