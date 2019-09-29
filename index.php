<?php include "layout/header.php"; ?>
<?php include "model/product.php"; ?>
<?php include "config/database.php";?>

<?php
$connection = new db_connection();
$conn = $connection->connection;
$product = new product($conn);
$products_data = $product->get_products();
?>




<div class="container">

    <?php
    foreach ($products_data as $product)
    {
        echo "<div class='row'>";
        echo "<div class='col'>$product[name]</div>";
        echo "<div class='col'>$product[description]</div>";
        echo "<div class='col'>$product[price]</div>";
        echo "<div class='col'>$product[category_name]</div>";

        echo "</div>";
    }



    ?>


</div>

<?php include "layout/footer.php"; ?>
