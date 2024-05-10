<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/header.css">
    <!-- <link rel="stylesheet" href="css/loginSignup.css"> -->
    <link rel="stylesheet" href="css/login.css">
    <title>Signup page</title>

</head>

<body>
    <div id="body-cover">
        <div id="black-cover"></div>
    </div>
    <?php
    include("header.php");
    ?>

    <div class="login">
        <img src="image/botl.jpg" alt="image" class="login__bg" />

        <form action="signupcheck.php" autocomplete="off" method="POST" class="login__form signup__form">
            <h1 class="signup__title">Sign Up</h1>

            <div class="login__inputs">
                <div class="login__box">
                    <input id="username" type="text" name="username" placeholder="Username" required
                        class="login__input" />
                    <i class="ri-mail-fill"></i>
                </div>
                <div class="login__box">
                    <input id="email" type="text" name="enail" placeholder="Email" required class="login__input" />
                    <i class="ri-mail-fill"></i>
                </div>


                <div class="login__box">
                    <input id="password" type="password" name="password" placeholder="Password" required
                        class="login__input" />
                    <i class="ri-lock-2-fill"></i>
                </div>
                <div class="login__box">
                    <input id="passwordc" type="password" name="cpassword" placeholder="Confirm Password" required
                        class="login__input" />
                    <i class="ri-lock-2-fill"></i>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-box"></div>
            </div>

            <button type="submit" class="login__button">Sign Up</button>

            <div class="login__register">
                Already have an account? <a href="login.php">Login now</a>
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