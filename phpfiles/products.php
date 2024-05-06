<?php
    include("./header.php");
    include("./dbconnect.php");
    $categoryId = $_GET['cid'];
?>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="../css/products.css">
<div id="productContainer">
    <div id="filterContainer">
        <div class="filterPrice">
            min <input type="number" id="minPrice">
            max <input type="number" id="maxPrice">
            <br>
            <div class="error"></div>
            <button id="findButton">find</button>
        </div>
    </div>
    <div id="products">
        <?php
            $productsSql = "select * from products where productCategory=".$categoryId;
            $prodcutsRes = mysqli_query($conn,$productsSql);
            while($item = mysqli_fetch_assoc($prodcutsRes)){
                echo $item['productName']. "  " ;
                echo $item['productPrice'];
                echo '<br/>';
            }
        ?>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on("click", "#findButton", function() {
        let minPrice = $('#minPrice').val();
        let maxPrice = $('#maxPrice').val();
        if ((!minPrice || !maxPrice) || (maxPrice < minPrice)) {
            $(".error").html("<div class='error'>invalid price range</div>");
        } else {
            $(".error").html("<div class='error'></div>");
            $.ajax({
                url: "filterpriceproducts.php?cid=" + <?php echo $categoryId ?>,
                type: "get",
                data: {
                    minPrice: $('#minPrice').val(),
                    maxPrice: $('#maxPrice').val(),
                },
                success: function(data) {
                    $('#products').html(data);
                }
            })
        }
    })
})
</script>