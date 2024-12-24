<?php
if(!session_id()){
    session_start();
}
?><?php
    require_once '../dbconnect.php';
    
    if($_POST){
        
        $user_id=$_REQUEST['user_id'];
       
        $sql_user_remove = "DELETE  from users where uid= '$user_id'";

        $result = mysqli_query($conn,$sql_user_remove);
        
        header("refresh:2;url=users.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
    .body-main {
        /* z-index: -35 */
        background-color: lightgray;
        width: auto;
        height: 90vh;
        margin-left: 15vw;
        padding-left: 20px;
        /* margin-top: 9vh; */
    }

    #category_add {
        display: flex;
        padding: 20px;
        height: auto;
        width: auto;
        /* background-color: red; */
    }


    #cat-name {
        margin-left: 20px;
        background-color: lightgray;
        /* color: white; */
        width: 200px;
        border: none;
        outline: none;
        height: 30px;
    }

    #cat-image {
        border: none;
        outline: none;
        margin-left: 20px;
        margin-right: 5px;
        background-color: lightgray;
        /* color: white; */

        width: 100px;
        height: 30px;


    }

    .cat-inner {
        padding: 5px;
        height: 40px;
        border: 1px solid black;

        font-size: 0.9rem;
        background-color: lightgray;
        border-top-left-radius: 20px 20px;
        border-bottom-right-radius: 20px 20px;
        border-top-right-radius: 5px;
        border-bottom-left-radius: 5px;

    }

    .cat-inner input::placeholder {
        color: black;
    }

    #cat-add-button {
        font-size: 0.8rem;
        font-weight: 500;
        margin-left: 20px;
        padding: 0 10px;
        height: 38px;
        border: 1px solid black;
        outline: none;
        color: black;
        transition: all 0.5s ease;
        background-color: lightgray;
        border-top-left-radius: 20px 20px;
        border-bottom-right-radius: 20px 20px;
        border-top-right-radius: 5px;
        border-bottom-left-radius: 5px;

    }

    #cat-add-button:hover {
        background-color: gray;
        border: none;
        color: white;

    }

    #cat-table {
        /* border: 1px solid black; */
        text-align: center;
    }

    table {
        border-radius: 10px;
    }

    #cat-table th {
        border: 1px solid black;
        color: white;
        font-size: 1rem;
        font-weight: 400;
        padding: 10px;
        background-color: gray;
    }

    #cat-table td {
        border: 1px solid black;
        font-size: 1rem;
        padding: 5px;
    }

    .action-button {
        font-size: 0.8rem;
        border-radius: 5px;
        border: 1px solid black;
        padding: 0 5px;
        transition: all 0.4s ease;
    }

    .action-button:hover {
        transform: scale(1.05);
        /* color: yellow;
        background-color: lightgray; */
    }


    .action-yellow {
        margin-right: 10px;
        background-color: rgba(255, 225, 0, 0.2);
    }

    .action-red {
        background-color: rgba(255, 0, 0, 0.5);
    }
    </style>
</head>

<body>
    <?php
    include("adminIndex.php");
    include("../dbconnect.php");
    ?>

    <div class="body-main">
        <h3 style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Users List </h3>
        <?php
              $sql = "SELECT * FROM `users`";
              $result = mysqli_query($conn,$sql);
            echo '
            <table id="cat-table"  >
            <tr>
                <th>User ID</th>
                <th>User-name</th>
                <th>Email</th>
                <th style="width:100px;">Action</th>
            </tr>
            ';
       while($item = mysqli_fetch_assoc($result))
       {
        
           echo'
            <tr>
                <td>'.$item["uid"].'</td>
                <td>'.$item['username'].'</td>
                <td>'.$item['email'].'</td>
                <td>
                
                <form action="" method="post">
                          <button type="submit" class="action-button action-red">Remove</button>
                          
                          <input  type="hidden" name="user_id" value="'.$item['uid'].'">
                          </form>
                </td>
            </tr>
           ';
           
          }
           
     
     ?>
    </div>
    <script>

    </script>
</body>

</html