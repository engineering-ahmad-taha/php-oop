<?php include "layout/header.php";
include "config/database.php";
include "model/category.php";
include "model/product.php";?>
<?php
$connection_database = new db_connection();
$general_connection = $connection_database->connection;

$categories = new category($general_connection);
$categories_data = $categories->get_categories();






?>


<form method="post">
    <div class="container">

    <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label>
        <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <input name="product_description" type="text" class="form-control" id="exampleInputPassword1" placeholder="Description">
    </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                <?php
                foreach ($categories_data as $category)
                {
                    echo "<option value=$category[id]>$category[name]</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input name="product_price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Price">
        </div>


    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php
if (isset($_POST["submit"])) {

    $product = new product($general_connection);
    $product->name = $_POST["product_name"];
    $product->description = $_POST["product_description"];
    $product->price = $_POST["product_price"];
    $product->category_id = $_POST["category_id"];
    $state = $product->add_products();

    if ($state) {
        echo "<div class=\"alert alert-primary\" role=\"alert\">Prduct Added!</div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Erro Check On Your Data</div>";

    }

}
?>



<?php include "layout/footer.php"; ?>
