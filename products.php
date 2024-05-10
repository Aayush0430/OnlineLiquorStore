<?php
    include("header.php");
    include("dbconnect.php");
    $categoryId = $_GET['cid'];
    $sql = "select * from category where categoryId=".$categoryId;
    $res = mysqli_query($conn,$sql);
    $title = "default";
    while($item = mysqli_fetch_assoc($res)){
        $title = $item["categoryName"];
    }
?>

<head>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/card.css">
</head>

<div class="title"><?php echo $title; ?></div>
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

    </div>
</div>
<script>
$(document).ready(function() {
    loadData(1);

    function loadData(page) {
        $.ajax({
            url: "productPagination.php",
            type: "get",
            data: {
                pageNo: page,
                cid: <?php echo $categoryId; ?>
            },
            success: function(data) {
                $("#products").html(data);
            }

        })
    }
    $(document).on("click", ".paginationButton", function() {
        let page = $(this).attr("id");
        loadData(page);
    })

    function priceRangePagination(minPrice, maxPrice) {
        if ((!minPrice || !maxPrice) || (maxPrice < minPrice)) {
            $(".error").html("<div class='error'>invalid price range</div>");
        } else {
            $(".error").html("<div class='error'></div>");
            $.ajax({
                url: "filterpriceproducts.php?cid=" + <?php echo $categoryId ?>,
                type: "get",
                data: {
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                },
                success: function(data) {
                    $('#products').html(data);
                }
            })
        }
    }
    $(document).on("click", "#findButton", function() {
        let minPrice = $('#minPrice').val();
        let maxPrice = $('#maxPrice').val();
        priceRangePagination(minPrice, maxPrice);
    })
    // high to low
    function loadHighLowProducts(page, id) {
        $.ajax({
            url: "highlow.php?cid=" + <?php echo $categoryId ?>,
            type: "get",
            data: {
                buttonId: id,
                pageNo: page
            },
            success: function(data) {
                $('#products').html(data);
            }
        })
    }
    $(document).on("click", ".highlowbutton", function() {
        $('#minPrice').val('');
        $('#maxPrice').val('');
        // $(".error").html("<div class='error'></div>");
        loadHighLowProducts(1, $(this).attr("id"));
    })
    $(document).on("click", ".highlowPaginationButton", function() {
        let page = $(this).attr("id");
        let highlowmode = $(this).data("highlowmode")

        loadHighLowProducts(page, highlowmode);

    })
    //filter price button
    $(document).on("click", ".filterPriceButton", function() {
        console.log("landing");
        let page = $(this).attr("id");
        let minPrice = $(this).data("minprice")
        let maxPrice = $(this).data("maxprice")
        filterPricePagination(page, minPrice, maxPrice);
    })

    function filterPricePagination(page, minPrice, maxPrice) {
        $.ajax({
            url: "filterPricePagination.php?cid=" + <?php echo $categoryId ?>,
            type: "get",
            data: {
                minprice: minPrice,
                maxprice: maxPrice,
                pageNo: page
            },
            success: function(data) {
                $('#products').html(data);
            }
        })
    }

})
</script>