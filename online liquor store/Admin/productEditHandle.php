<?php
if(!session_id()){
    session_start();
}
?><?php
    require_once '../dbconnect.php';
    
        $name = addslashes($_REQUEST['item_name']);
        $p_desc = addslashes($_REQUEST['item_desc']);
        $price = $_REQUEST['item_price'];
        $image=$_REQUEST['item_image'];
        // echo $name;
        // echo $p_desc;
        // echo $price;
        // echo $p_desc;
        // echo$c_id;
        // echo $item_image;
        
        $c_id = $_POST['category'];


        $item_id= $_REQUEST['item_id'];

                $q_insert_product = "UPDATE products SET 
                productName='$name',
                productDescription='$p_desc',
                productImage='$image',
                productCategory=$c_id,
                productPrice=$price
                WHERE  productId='$item_id'";
                if(mysqli_query($conn,$q_insert_product)){
                    echo "edited";
                    header("location:products.php?editstatus=edited");
                }else{
                    header("location:products.php?editstatus=notedited");
                    
                }
           
    
?>