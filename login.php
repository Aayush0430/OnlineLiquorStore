<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/header.css">
    <!-- <link rel="stylesheet" href="css/loginSignup.css"> -->
    <link rel="stylesheet" href="css/login.css">
    <title>Login page</title>

</head>

<body>
    <div id="body-cover">
        <div id="black-cover"></div>
    </div>
    <?php
    include ("header.php");
    ?>
    <?php
    if (isset($_GET["status"])) {
        $status = $_GET["status"];
        if ($status == "notmatch") {
            echo '
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
    if (isset($_GET["status"])) {
        $status = $_GET["status"];
        if ($status == "notexist") {
            echo '
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


    <div class="login">
        <img src="image/botl.jpg" alt="image" class="login__bg" />

        <form action="logincheck.php" autocomplete="off" method="POST" class="login__form">
            <h1 class="login__title">Login</h1>

            <div class="login__inputs">
                <div class="login__box">
                    <input id="username" type="text" name="username" placeholder="Username" required
                        class="login__input" />
                    <i class="ri-mail-fill"></i>
                </div>

                <div class="login__box">
                    <input id="passw" type="password" name="password" placeholder="Password" required
                        class="login__input" />
                    <i class="ri-lock-2-fill"></i>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-box"></div>
            </div>

            <button type="submit" class="login__button">Login</button>

            <div class="login__register">
                Don't have an account? <a href="signup.php">Register</a>
            </div>
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