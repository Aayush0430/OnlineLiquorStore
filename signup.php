<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Signup Page</title>
    <style>
    #body-cover {
        position: absolute;
        /* opacity: 0.8; */
        filter: contrast(80%);
        filter: blur(0.6px);
        height: 100vh;
        width: 100vw;
        background-image: url(img/back6.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        z-index: -1;
    }

    #black-cover {
        height: 100vh;
        width: 100vw;
        opacity: 0.7;
        background-color: black;
    }

    body {
        /* background-position: center; */
        height: 100vh;
    }

    #signup_form {
        margin: auto;
        /* margin-top: 10px; */
        width: 50%;
        height: 70%;
        z-index: 100;
        /* background-color: white; */
        /* border: 1px solid black; */
        border-radius: 10px;
        padding: 20px;
        font-size: 0.9rem;
    }

    button {
        margin-left: 40%;
    }

    .already-registered p {
        margin: 10px;
        font-size: 0.8rem;
        font-weight: 600;
        text-align: center;
    }

    .already-registered {
        display: flex;
        justify-content: center;
    }

    .already-registered a {
        /* text-decoration: ; */
        margin-top: 10px;
        color: lightgray;
        font-size: small;
    }

    .form-control {
        font-size: 0.8rem;
    }

    .btn {
        padding: 5px 20px;
        border-radius: 15px;
        color: white;
        transition: all 0.4s ease;
    }

    .btn:hover {
        transform: scale(1.1);
    }
    </style>
</head>

<body>
    <div id="body-cover">
        <div id="black-cover"></div>
    </div>
    <?php
    include ("header.php");     
    ?>
    <div id="signup_form">
        <center>
            <h2 style="color:white;">SignUp Page</h2>
        </center>
        <form autocomplete="off" action="signupcheck.php" method="POST" class="container" #signup_form
            style="border:1px solid white;width:500px;margin-top:10px;color:white;font-size:1rem;padding:40px 40px 0;border-radius:15px;background:rgba(0, 0, 0, 0.3);">

            <div class="form-group">
                <label for="exampleInputEmail1">Enter Username</label>
                <input style="background:none;color:white;border-radius:15px;" type="text" class="form-control"
                    id="exampleInputusername" name="username" placeholder="Username">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Enter Email</label>
                <input style="background:none;color:white;border-radius:15px;" type="email" class="form-control"
                    id="exampleInputEmail1" name="email" placeholder="Email">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Enter Password</label>
                <input style="background:none;color:white;border-radius:15px;" type="password" class="form-control"
                    id="exampleInputPassword1" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <!-- <label for="exampleInputPassword2">Enter Password Again</label> -->
                <input style="background:none;color:white;border-radius:15px;" type="password" class="form-control"
                    id="exampleInputPassword2" name="cpassword" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="already-registered">
                <p>Already have an account </p><a href="login.php">Login now</a>
            </div>

        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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