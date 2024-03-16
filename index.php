<!-- connect file -->
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('includes/connect.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website using PHP and MySql</title>

    <link rel="stylesheet" href="styles.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- bootstrap css file link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid p-0">
        <!-- first child : nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="image/logo.png" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>1</sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total price</a>
                    </li>

        
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>

        <!-- TODO: Add display products -->

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is at the heart of e-commerce</p>
        </div>

        <!-- fourth child -->
        <div class="row px-1">

            <div class="col-md-10">
        
                <!-- products -->
                <div class="row px-5">
                    <!-- fetching products -->
                    <?php

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
                    ?>
                   <!--<div class="col-md-4 mb-2">

                        <div class="card">
                            <img src="image/dary1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>

                        </div>

                    </div>-->
                    <!-- row end -->
                    
                </div>
                <!-- column end -->

            </div>

            <div class="col-md-2 bg-secondary p-0">
                
                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <!-- php file-->
                    <?php
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
                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <!-- php file-->
                    <?php
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
                    ?>

                </ul>
            </div>

        </div>


        <!-- last child -->
        <div class="bg-info p-3 text-center">
            <p>All right reserved - Designed by Belvi-2024</p>
        </div>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>