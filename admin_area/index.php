<!-- connect file -->
<?php
   // include("includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- link to css file -->
    <link rel="stylesheet" href="../styles.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../image/logo.png" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

         <!-- third child -->
        <div class="row bg-secondary">

            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">

                <div class="p-5">
                    <a href=""><img src="../image/juice.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">admin name</p>
                </div>

                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>

        </div>

        <!-- fourth child -->

        <div class="container my-3">
            <?php
                error_reporting(E_ALL);
                ini_set('display_errors', '1');

                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }

                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
            ?>
        </div>

        <!-- last child -->
        <div class="bg-info p-3 text-center footer">
            <p>All right reserved - Designed by Belvi-2024</p>
        </div>

    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
</body>
</html>