<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    include("../includes/connect.php");

    // to insert the product in the data base
    if(isset($_POST["insert_brand"])){
        //$brand_title=$_POST["brand_title"];
        $brand_title = filter_var($_POST["brand_title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Verify if the brand title is empty
        if(empty($brand_title)){
            echo "<script>alert('Please enter a category title')</script>";

        }else{
            // Select data from the database or prevent the insertion of a category twice.
            $select_query = "SELECT * FROM `brands` WHERE brand_title = :brand_title";
            $stmt = $con->prepare($select_query);
            $stmt->bindParam(':brand_title', $brand_title);
            $stmt->execute();

            $number = $stmt->rowCount();
            if($number>0){
                echo "<script>alert('This category is already present in the database')</script>";
            }else{
                $insert_query = "INSERT INTO `brands` (brand_title) VALUES (:brand_title)";
                // Prepare and execute query
                $stmt_insert = $con->prepare($insert_query);
                $stmt_insert->bindParam(':brand_title', $brand_title);

                //Execute query
                if($stmt_insert->execute()){
                    echo "<script>alert('Brand has been inserted successfully')</script>";
                }else{
                    echo "<script>alert('Error inserting brand')</script>";
                }


            }
        }
         
    }
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">

    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="insert Brands">
        <!--<button class="bg-info p-2 border-0 my-3">Insert Brands</button>-->
    </div>
</form>