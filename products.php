<?php
    include("header.php");
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
?>

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="./css/products.css">
<link rel="stylesheet" href="./css/header.css">

<div id="productContainer">
    <div id="filterContainer">
        <div class="filterPrice">
            <p class="filtertitle">Price Range</p>
            <div class="filterlabel">
                <div class="label">
                    Min
                </div>
                <input type="number" id="minPrice">
            </div>
            <div class="filterlabel">
                <div class="label">
                    Max
                </div>
                <input type="number" id="maxPrice">
            </div>

            <div class="error"></div>
            <button id="findButton">Find</button>
        </div>
        <div class="hightolow">
            <p class="filtertitle">OrderBy</p>
            <button class="highlowbutton" id="hightolow">High to Low</button>
            <br>
            <button class="highlowbutton" id="lowtohigh">Low to High</button>
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
    // high to low
    $(document).on("click", ".highlowbutton", function() {


        $(".error").html("<div class='error'></div>");
        $.ajax({
            url: "hightolow.php?cid=" + <?php echo $categoryId ?>,
            type: "get",
            data: {
                buttonId: $(this).attr("id")
            },
            success: function(data) {
                $('#products').html(data);
            }
        })

    })
})
</script>