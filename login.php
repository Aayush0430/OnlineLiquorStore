<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/loginSignup.css">
    <title>Login page</title>

</head>

<body>
    <div id="body-cover">
        <div id="black-cover"></div>
    </div>
    <?php
    include("header.php");
    ?>
    <?php
    if(isset($_GET["status"])){
        $status=$_GET["status"];
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
    <?php
    if(isset($_GET["status"])){
        $status=$_GET["status"];
        if($status== "notexist"){
            echo'
            <div id="unmatch" class="alert alert-warning alert-dismissible fade show"style="text-align:center;width:100vw;position:absolute;" role="alert">
            User doesn\'t exist!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            ';
        }
    }
    ?>
    <div id="login-form">
        <h2 id="heading">Login Page</h2>

        <form action="logincheck.php" autocomplete="off" method="POST" class="container">

            <!-- <label for="username">Username</label><br> -->
            <input type="text" class="login-input" id="username" name="username" placeholder="Username" required><br>

            <!-- <label for="password">Password</label><br> -->
            <input type="password" class="login-input" id="password" name="password" placeholder="Password"
                required><br>

            <button type="submit" class="btn">Submit</button>

            <p>Not registered! <a href="signup.php">Signup now</a></p>

        </form>
    </div>


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