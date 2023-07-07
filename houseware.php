<?php
$active = "Product";
include("db.php");
include("functions.php");
include('header.php');
?>

<div style="overflow: hidden;">
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <!-- Breadcrumb content here -->
    </div>

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <!-- Filter and product listing sections -->
            </div>
        </div>
    </section>

    <!-- Add to Cart form -->
    <form action='https://hana4all.com/product.php?add_cart=<?php 
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            echo $product_id;
        }
    ?>' method='post'>
        <div class="form-group">
            <!-- Quantity input here -->
        </div>
        <?php
        if ($_SESSION['customer_email'] == 'unset') {
            echo "<a href='login.php' class='btn primary-btn pd-cart' style='margin-top: 20px;'> Add to cart</a>";
        } else {
            echo "<button class='btn primary-btn pd-cart' id='cartbtn' style='margin-top: 20px;'> Add to cart</button>";
        }
        ?>
    </form>

    <!-- Related products section -->
    <div class="related-products spad">
        <!-- Related products content here -->
    </div>
</div>


</body>
</html>