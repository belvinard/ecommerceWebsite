<!-- connect file -->
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include('./includes/connect.php');
    


    // Getting products
    function getproducts(){
        global $con;
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
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
                                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add to cart</a>
                                <a href='product-details.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";


                    }

                } catch (PDOException $e) {
                // Handle any errors that occur during the execution of the query
                echo "Error: " . $e->getMessage();
                }
            }
        }
    }

    // Getting all products
    function get_all_products(){
        global $con;
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                try {
                // Prepare and execute the query to fetch the products
                //$select_query = "SELECT * FROM `productsInserted` order by products_title"; 
                $select_query = "SELECT * FROM `productsInserted` order by rand()";
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
                                <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add to cart</a>
                                <a href='product-details.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";


                    }

                } catch (PDOException $e) {
                // Handle any errors that occur during the execution of the query
                echo "Error: " . $e->getMessage();
                }
            }
        }
    }

    // Get unique categories 
    function get_unique_categories(){
        global $con;
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
            
            try {
                // Prepare and execute the query to fetch the products
                //$select_query = "SELECT * FROM `productsInserted` order by products_title"; 
                $select_query = "SELECT * FROM `productsInserted` WHERE categories_id=$category_id";
                $stmt = $con->prepare($select_query);
                $stmt->execute();
                $number_of_rows = $stmt->rowCount();
                if($number_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
                }

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
                            <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add to cart</a>
                            <a href='product-details.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";


                }

            } catch (PDOException $e) {
            // Handle any errors that occur during the execution of the query
            echo "Error: " . $e->getMessage();
            }
            
        }
    }

    // Get unique brabds 
    function get_unique_brands(){
        global $con;
        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
            
            try {
                // Prepare and execute the query to fetch the products
                //$select_query = "SELECT * FROM `productsInserted` order by products_title"; 
                $select_query = "SELECT * FROM `productsInserted` WHERE  brands_id=$brand_id";
                $stmt = $con->prepare($select_query);
                $stmt->execute();
                $number_of_rows = $stmt->rowCount();
                if($number_of_rows==0){
                    echo "<h2 class='text-center text-danger'>This brand is not available for service</h2>";
                }

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
                            <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add to cart</a>
                            <a href='product-details.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";


                }

            } catch (PDOException $e) {
            // Handle any errors that occur during the execution of the query
            echo "Error: " . $e->getMessage();
            }
            
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


    // Search products function
    function search_products(){
        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_value = $_GET['search_data'];
            try {
                $search_query = "SELECT * FROM `productsInserted` WHERE products_keywords like '%$search_data_value%'";
                $stmt = $con->prepare($search_query);
                $stmt->execute();

                $number_of_rows = $stmt->rowCount();
                if($number_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No results match. No products found on this category</h2>";
                }
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
                            <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add to cart</a>
                            <a href='product-details.php?product_id=$products_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";


                }

            } catch (PDOException $e) {
            // Handle any errors that occur during the execution of the query
            echo "Error: " . $e->getMessage();
            }
        }
            
        
    }

    // View details function
    function view_details(){
        global $con;
        // Condition to check isset or not
        if(isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
                if(!isset($_GET['brand'])){
                    $product_id=$_GET['product_id'];
                    try {
                        $select_query = "SELECT * FROM `productsInserted` WHERE products_id=$product_id";
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
                            $products_image2 = $row['products_image2'];
                            $products_image3 = $row['products_image3'];
                            $products_price = $row['products_price'];

                            echo "
                                <div class='col-md-4 mb-2'>
                                    <div class='card'>
                                        <img src='./admin_area/product_images/$products_image1' class='card-img-top' alt='$products_title'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$products_title</h5>
                                            <p class='card-text'>$products_description</p>
                                            <a href='index.php?add_to_cart=$products_id' class='btn btn-info'>Add to cart</a>
                                            <a href='index.php' class='btn btn-secondary'>Go home</a>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-md-8'>
                                    <!-- relates images -->
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <h4 class='text-center text-info mb-5'>Related products</h4>
                                        </div>

                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$products_image2' class='card-img-top' alt='$products_title'>
                                        </div>

                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$products_image3' class='card-img-top' alt='$products_title'>
                                        </div>
                                    </div>
                        
                                </div>
                            ";

                        }

                    } catch (PDOException $e) {
                    // Handle any errors that occur during the execution of the query
                    echo "Error: " . $e->getMessage();
                    }
                }
            }

        }
    }

    // Get ip address function
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    //$ip = getIPAddress();  
    //echo 'User Real IP Address - '.$ip; 
    
    function cart() {
        if(isset($_GET['add_to_cart'])) {
            global $con;
            $get_ip_address = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];
            try {
                $select_query = "SELECT * FROM `cart_details` WHERE ip_address=:ip_address AND product_id=:product_id";
                $stmt = $con->prepare($select_query);
                $stmt->bindParam(':ip_address', $get_ip_address);
                $stmt->bindParam(':product_id', $get_product_id);
                $stmt->execute();
                $number_of_rows = $stmt->rowCount();
                if($number_of_rows > 0) {
                    echo "<script>alert('This item is already present inside cart')</script>";
                    echo "<script>window.open('index.php', '_self')</script>";
                } else {
                    $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES (:product_id, :ip_address, 0)";
                    // Prepare and execute query
                    $stm = $con->prepare($insert_query);
                    $stm->bindParam(':product_id', $get_product_id);
                    $stm->bindParam(':ip_address', $get_ip_address);
                    $stm->execute();
                    echo "<script>window.open('index.php', '_self')</script>";
                }
            } catch(PDOException $e) {
                echo "Error : " . $e->getMessage();
            }
        }
    }

    // Function to get cart item numbers
    function cart_item(){
        if(isset($_GET['add_to_cart'])) {
            global $con;
            $get_ip_address = getIPAddress();
            
            try {
                $select_query = "SELECT * FROM `cart_details` WHERE ip_address=:ip_address";
                $stmt = $con->prepare($select_query);
                $stmt->bindParam(':ip_address', $get_ip_address);
                $stmt->execute();
                $count_cart_items = $stmt->rowCount();
                    
            } catch(PDOException $e) {
                echo "Error : " . $e->getMessage();
            }
        }else{
            global $con;
            $get_ip_address = getIPAddress();
            try {
                $select_query = "SELECT * FROM `cart_details` WHERE ip_address=:ip_address";
                $stmt = $con->prepare($select_query);
                $stmt->bindParam(':ip_address', $get_ip_address);
                $stmt->execute();
                $count_cart_items = $stmt->rowCount();
                    
            } catch(PDOException $e) {
                echo "Error : " . $e->getMessage();
            }
        }

        echo $count_cart_items;
    }
    
    
    
?>