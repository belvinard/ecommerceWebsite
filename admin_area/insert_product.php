<?php
    // Enable error reporting for debugging purposes
    error_reporting(E_ALL);
    // Display errors on the screen for debugging purposes
    ini_set('display_errors', 1);

    include("../includes/connect.php");

    // Check if the form is submitted
    if(isset($_POST['insert_product'])){
        // Retrieve form data
        $product_title = $_POST['product_title'];
        $description = $_POST['description'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_status = 'true';

        // Retrieve uploaded images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // Retrieve temporary image names
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        // Check for empty fields
        if(empty($product_title) || empty($description) || empty($product_keywords) || empty($product_category) || empty($product_brand) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)){
            echo "<script>alert('Please fill all the available fields')</script>";
        } else {
            try {
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                move_uploaded_file($temp_image1, "./product_images/$product_image1");
                move_uploaded_file($temp_image2, "./product_images/$product_image2");
                move_uploaded_file($temp_image3, "./product_images/$product_image3");

                // Prepare the insert query
                $insert_products = "INSERT INTO productsInserted (products_title, products_description, products_keywords, categories_id, brands_id, products_image1, products_image2, products_image3, products_price, date, status) VALUES (:product_title, :description, :product_keywords, :product_category, :product_brand, :product_image1, :product_image2, :product_image3, :product_price, NOW(), :product_status)";

                // Prepare the statement
                $stmt = $con->prepare($insert_products);

                // Bind parameters
                $stmt->bindParam(':product_title', $product_title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':product_keywords', $product_keywords);
                $stmt->bindParam(':product_category', $product_category);
                $stmt->bindParam(':product_brand', $product_brand);
                $stmt->bindParam(':product_image1', $product_image1);
                $stmt->bindParam(':product_image2', $product_image2);
                $stmt->bindParam(':product_image3', $product_image3);
                $stmt->bindParam(':product_price', $product_price);
                $stmt->bindParam(':product_status', $product_status);

                // Execute the statement
                $stmt->execute();

                echo "<script>alert('Successfully inserted the products')</script>";

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>

    <link rel="stylesheet" href="styles.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- bootstrap css file link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Products</h1>

        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control"
                placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">

                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query = "SELECT * FROM `categories`";
                        // execute query
                        $stmt = $con->prepare($select_query);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $category_title = $row['category_title']; 
                            $category_id = $row['categories_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>

                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">

                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
                        $select_query = "SELECT * FROM `brands`";
                        // execute query
                        $stmt = $con->prepare($select_query);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $brand_title = $row['brand_title']; //To extract all data present in the database
                            $brand_id = $row['brands_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>

                </select>
            </div>

            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

             <!-- price -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">

                <input type="submit" value="Insert Products" name="insert_product" class="btn btn-info mb-3 px-3">

            </div>

        </form>

    </div>
</body>
</html>