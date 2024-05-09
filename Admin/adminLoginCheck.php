<?php
if(!session_id()){
    session_start();
}
?><?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include("../dbconnect.php");

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `admindetails`";
        $result = mysqli_query($conn,$sql);
        $item = mysqli_fetch_assoc($result);

        if($username==$item["admin-username"])
        {
            //email exits in databse


            //check password
            if($password==$item["admin-password"])
            {
                session_start();
                
                $_SESSION['adminlogin']=true;
                $_SESSION['admin-id']=$item['admin-username'];
                header("location: adminDashboard.php");
                
            }
            else{

                header("location: ../admin.php?p=notmatch");
            }   
        }
        else{
            //userame doesnot exist
            header("location: ../admin.php?p=notmatch");

        }
    }
?>