<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/loginSignup.css">
    <title>Signup page</title>

</head>

<body>
    <div id="body-cover">
        <div id="black-cover"></div>
    </div>
    <?php
    include("header.php");
    ?>
    <div id="signup-form">
        <h2 id="heading">Signup Page</h2>

        <form action="signupcheck.php" autocomplete="off" method="POST" class="container">

            <!-- <label for="username">Username</label><br> -->
            <input type="text" class="signup-input" id="username" name="username" placeholder="Username" required><br>

            <!-- <label for="email">Email</label><br> -->
            <input type="email" class="signup-input" id="email" name="email" placeholder="Email"><br>

            <!-- <label for="password">Password</label><br> -->
            <input type="password" class="signup-input" id="password" name="password" placeholder="Password"
                required><br>
            <input type="password" class="signup-input" id="cpassword" name="cpassword" placeholder="Confirm Password">

            <button type="submit" class="btn">Submit</button>

            <p>Already have an account! <a href="login.php">Login now</a></p>

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