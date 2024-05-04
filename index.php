<?php
include("./phpfiles/dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Braverage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="header-footer.css" />
    <!-- jsquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./jsfiles/headerSearch.js" defer></script>
</head>

<body>
    <nav id="header-top">
        <div id="left-spare-div"></div>
        <p id="title">~ Braverage ~</p>
        <ul>
            <li class="searchbutton" style="padding: 0px; background: none">
                <div class="searchcontent">
                    <button class="searchicon">
                        <i class="ri-search-line"></i>
                    </button>
                    <input type="text" placeholder="Search" id="searchinput" />
                    <button class="closeicon">
                        <i class="ri-close-large-line"></i>
                    </button>
                </div>
            </li>
            <li><i class="ri-user-line"></i>Login</li>
            <div class="searchresults">
                <a>tuborg</a>
                <a>nepal ice</a>
            </div>
        </ul>
    </nav>
    <nav class="header-bottom">
        <ul>
            <?php
              $allCategoriesSql = "select * from category";
              $allCategoriesRes = mysqli_query($conn,$allCategoriesSql);
              while($item = mysqli_fetch_assoc($allCategoriesRes)){
                echo '
                <li><a href="./phpfiles/products.php?cid='.$item["categoryId"].'">'.$item["categoryName"].'</a></li>
                ';
              }
          ?>
        </ul>
    </nav>
    <div id="hello"></div>
</body>
<script>
$(document).ready(function() {
    const searchResults = document.querySelector(".searchresults");

    function getSearchResults(searchTerm) {
        $.ajax({
            url: "./phpfiles/searchResult.php?searchTerm=" + searchTerm,
            type: "get",
            success: function(data) {
                $(".searchresults").html(data);
            },
        });
    }
    $("#searchinput").on("input", function() {
        let searchTerm = $(this).val();
        if (searchTerm.trim() === "") {
            searchResults.style.display = "none";
        } else {
            searchResults.style.display = "flex";

            getSearchResults(searchTerm);
        }
    });
    $("#searchinput").on("click", function() {
        let searchTerm = $(this).val();
        if (searchTerm.trim() === "") {
            searchResults.style.display = "none";
        } else {
            searchResults.style.display = "flex";

            getSearchResults(searchTerm);
        }
    });
});
</script>

</html>