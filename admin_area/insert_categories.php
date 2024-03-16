<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("../includes/connect.php");

// to insert the product in the database
if (isset($_POST["insert_cat"])) {
    //$category_title = $_POST["cat_title"];
    $category_title = filter_var($_POST["cat_title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Verify if the category title is empty
    if (empty($category_title)) {
        echo "<script>alert('Please enter a category title')</script>";
    } else {
        // Select data from the database or prevent the insertion of a category twice.
        $select_query = "SELECT * FROM `categories` WHERE category_title = :category_title";
        $stmt_select = $con->prepare($select_query);
        $stmt_select->bindParam(':category_title', $category_title, PDO::PARAM_STR);
        $stmt_select->execute();

        $number = $stmt_select->rowCount();
        if ($number > 0) {
            echo "<script>alert('This category is already present in the database')</script>";
        } else {
            $insert_query = "INSERT INTO `categories` (category_title) VALUES (:category_title)";

            // Prepare and execute query
            $stmt_insert = $con->prepare($insert_query);
            $stmt_insert->bindParam(':category_title', $category_title, PDO::PARAM_STR);

            // Execute query
            if ($stmt_insert->execute()) {
                echo "<script>alert('Category has been inserted successfully')</script>";
            } else {
                echo "<script>alert('Error inserting category')</script>";
            }
        }
    }
}
?>


<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">

    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="insert Categories">
        <!--<button class="bg-info p-2 border-0 my-3">Insert categories</button>-->
    </div>
</form>
