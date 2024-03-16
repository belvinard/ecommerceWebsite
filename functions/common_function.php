<!-- connect file -->
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('./includes/connect.php');

    // Getting products
    function getproducts(){
        global $con;
        try {
            // Prepare and execute the query to fetch the products
            //$select_query = "SELECT * FROM `productsInserted` order by products_title"; 
            $select_query = "SELECT * FROM `productsInserted` order by rand() LIMIT 0,9";
            $stmt = $con->prepare($select_query);
            $stmt->execute();

            // Fetch the first row (product) from the result set
            //$row = $stmt->fetch(PDO::FETCH_ASSOC);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                // Access individual fields
                $products_id = $row['products_id'];
                $products_title = $row['products_title'];
                $products_description = $row['products_description'];
                $categories_id = $row['categories_id'];
                $brands_id = $row['brands_id'];
                $products_image1 = $row['products_image1'];
                $products_price = $row['products_price'];

                echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$products_title</h5>
                        <p class='card-text'>$products_description</p>
                        <a href='#' class='btn btn-info'>Add to cart</a>
                        <a href='#' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>";


            }

        } catch (PDOException $e) {
            // Handle any errors that occur during the execution of the query
            echo "Error: " . $e->getMessage();
        }
    }

    // Displaying brands in sidenav 
    function getbrands(){
        global $con;
        $select_brands = "SELECT * FROM `brands`";
        $stmt = $con->prepare($select_brands);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $brand_title = $row['brand_title'];
            $brands_id = $row['brands_id'];
            echo "
                <li class='nav-item'>
                    <a href='index.php?brand=$brands_id' class='nav-link text-light'>$brand_title</a>
                </li>";
        }
    }

    // Displaying categories in sidenav 
    function getcategories(){
        global $con;
        $select_categories = "SELECT * FROM `categories`";
        $stmt = $con->prepare($select_categories);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $category_title = $row['category_title'];
            $category_id = $row['categories_id'];
            echo "
                <li class='nav-item'>
                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                </li>";
        }
    }

?>