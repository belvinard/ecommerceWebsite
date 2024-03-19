<!-- connect file -->
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('includes/connect.php');
    include('functions/common_function.php');

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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="display_all.php">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total price:100/-</a>
                    </li>

        
                </ul>

                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>

                </div>
            </div>
        </nav>

        <!-- Calling cart function -->
        <?php
            cart();
        ?>


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
                <div class="row">
                    <!--<div class="col-md-4">
                        !-- card 
                        <div class='card'>
                            <img src='./image/food1.png' class='card-img-top' alt='$products_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$products_title</h5>
                                <p class='card-text'>$products_description</p>
                                <a href='#' class='btn btn-info'>Add to cart</a>
                                <a href='#' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>-->

                    <!--<div class="col-md-8">
                        !-- relates images --
                        <div class="col-md-12">
                            <h4 class="text-center text-info mb-5">Related products</h4>
                        </div>

                        <div class="col-md-6">
                            <img src='./image/food2.png' class='card-img-top' alt='$products_title'>
                        </div>

                        <div class="col-md-6">
                            <img src='./image/food3.png' class='card-img-top' alt='$products_title'>
                        </div>

                    </div>-->


                    <!-- fetching products -->
                    <?php
                       //Calling function
                       view_details();
                       get_unique_categories();
                       get_unique_brands();

                    ?>
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
                       getbrands();

                    ?>

                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <!-- php file-->
                    <?php
                       getcategories();
                    ?>

                </ul>
            </div>

        </div>


        <!-- last child -->
        <!-- include folder -->
        <?php include("./includes/footer.php") ?>
    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>