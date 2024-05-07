<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include("db_conn.php");
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        if($password==$cpassword)
        {
            //right password

            ///if username alerady exist
            $sql = "SELECT * FROM `users` WHERE username='$username'";
            $result=mysqli_query($conn,$sql);
            $rows = mysqli_num_rows($result);
            if($rows==1)
            {
                //already exist
                header("location: signup.php?p=right&e=exist");
            }
            else{
                //email does not exit
                $sql2="INSERT INTO `users` (`username`,`email`, `password`) VALUES ('$username','$email', '$password')";
                $result2=mysqli_query($conn,$sql2);
                header("location: login.php?c=created&p=none&e=none");
            }
            
        }
        else
        {
            //wrong password
            header("location: signup.php?p=wrong&e=none");
        }
    }
?>