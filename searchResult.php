<?php
    include("dbconnect.php");
    $searchTerm = $_GET['searchTerm'];
    $sql = "select * from students where name like '%".$searchTerm."%' limit 5";
    $res = mysqli_query($conn,$sql);
    $output = "<div id='searchresults'>";
    if(mysqli_num_rows($res)>0){
        while($item = mysqli_fetch_assoc($res)){
            $output .= "<a>".$item['name']."</a>";
        }
        $output .= "</div>";
    }
    else{
        $output .= "Not Found";
        $output .= "</div>";

    }
    echo $output;
?>