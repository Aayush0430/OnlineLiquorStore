<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include("dbconnect.php");

        $username = $_POST["username"];
        $password = $_POST["password"];

        //check if email in database
        $sql = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        $item = mysqli_fetch_assoc($result);

        if($row==1)
        {
            //email exits in databse


            //check password
            if($password==$item["password"])
            {
                

                //session start
                session_start();
                
                $_SESSION['login']=true;
                // $_SESSION['username']=$item['username'];
                $_SESSION['userid']=$item['user_id'];
                $_SESSION['uname']=$username;
                header("location: index.php");
                
            }
            else{

                header("location: login.php?status=notmatch");
            }   
        }
        else{
            //email doesnt exist
            header("location: login.php?status=notexist");

        }
    }
?>