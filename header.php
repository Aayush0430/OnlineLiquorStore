<nav id="header-top">
    <div id="left-spare-div"></div>
    <a href="index.php">
        <p id="title">~ Braverage ~</p>
    </a>
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