<?php
if(!session_id())
    session_start();
 
?>
<?php
    
        if(isset($_SESSION['login'])&&$_SESSION['login']==true){
            
        include("dbconnect.php");

        // $quantity=$_POST["quantity"];
        $item_id=$_POST["product_id"];
        $item_quantity=$_POST["quantity"];
        echo $item_id;
        // echo $quantity."  ".$item_id;        
        
            $sql2="SELECT * from cart where item_id=$item_id AND user_id=$_SESSION[userid]";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_num_rows($result2);
       
            if ($row2==0) {
                $sql="insert into cart(item_id,user_id,product_quantity) values(".$item_id." ,$_SESSION[userid],$item_quantity)";
                $result=mysqli_query($conn,$sql);
                if(!$result){
                    die("".mysqli_error($conn));
                }
                header("location:cart.php?status=added&&itemid=".$item_id."");           
            }
            else{
                header("location:index.php?status=aa");
            }
        
       
    }else{
        header("location:login.php?status=notlogged");
            
                            
                            
    }
?>