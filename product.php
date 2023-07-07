<?php
$active = "Product";
include("db.php");
include("functions.php");
include('header.php');
?>

<div style="overflow: hidden;">
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="shop.php">Shop</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <?php

                            getCat();

                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php

                        getProd();
                        addCart();

                        ?>



                        <form action='product.php?add_cart=<?php
                                                            if (isset($_GET['product_id'])) {
                                                                $product_id = $_GET['product_id'];
                                                                echo $product_id;
                                                            } ?>' method='POST'>

                            <div class="form-group">
                                <!-- form-group Begin -->
                                <div class='quantity'>
                                    <div class='pro-qty'>
                                        <input type='text' value='1' name="product_qty">
                                    </div>
                                </div>
                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->
                                <div class='pd-size-choose'>
                                    <?php
                                    $products_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';

                                    $get_products_id = "SELECT * FROM products WHERE products_id='$products_id'";
                                    $run_products_id = mysqli_query($db, $get_products_id);


                                    $sql_size = "SELECT * FROM products, size WHERE products.products_id = '$products_id' AND products.size = size.idsize";

                                    $result_size = $con->query($sql_size);
                                    if ($result_size->num_rows > 0) {
                                        $row_size = $result_size->fetch_assoc();

                                        $shose = $row_size['size_pro'];
                                        $explode_size = explode(",", $shose);
                                        
                                        ?>
                                        
                                        <?php
                                        foreach ($explode_size as $size_value) {
                                            if ($size_value != 'no size') {
                                    ?>
                                                <div class='sc-item'>
                                                    <input type="radio"  id='<?= $size_value ?>' class="form-control" name="size" required value="<?= $size_value ?>" >
                                                    <label for='<?= $size_value ?>' style="width:70px;"><?= $size_value ?></label>
                                                </div>
                                               
                                    <?php
                                    
                                            }
                                        }
                                    }
                                    ?>
                                    <p id="msg"></p>
                                    <?php if ($_SESSION['customer_email'] == 'unset') {
                                        echo "<a href='login.php' class='btn primary-btn pd-cart' style='margin-top: 20px;'> Add to cart</a>";
                                    } else {
                                        echo "<button class='btn primary-btn pd-cart' id='cartbtn' style='margin-top: 20px;'> Add to cart</button>";
                                    }
                                    ?>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // disable right click
</script>


<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>More like this</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <?php

            relatedProducts();
           
            ?>

        </div>
    </div>
</div>
</div>

<?php
include('footer.php');
?>

<script>
    // $("#cartbtn").on('click', function() {
    //     var atLeastOneChecked = false;
    //     if (!$("input[name='size']").is(':checked')) {

    //         $("#msg").html(
    //             "<span class='alert alert-danger'>" +
    //             "Please Choose Size </span>");
    //     } else {
    //         return;
    //     }

    // });
</script>
<?php

// if (isset($_POST['add_cart'])) {
//     $ip_add = getRealIpUser();

//     $c_id = $_SESSION['customer_email'];
//     $p_id = $_GET['add_cart'];
//     $qty = $_POST['product_qty'];
//     $size = $_POST['size'];

//     $check_product = "SELECT * FROM cart where c_id = '$c_id' AND products_id = '$p_id'";
//     $run_check = mysqli_query($con, $check_product);


//     if (mysqli_num_rows($run_check) > 0) {

//         echo "<script>alert('Product already added.')</script>";
//         echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
//     } else {

//         $query = "INSERT INTO cart (products_id, ip_add,qty,size,reg_date,c_id) values('$p_id','$ip_add','$qty','$size',NOW(),'$c_id')";
//         $run_query = mysqli_query($con, $query);

//         echo "<script>alert('Product added to Cart. Keep Shopping.')</script>";
//         echo "<script>window.open('product.php?product_id=$p_id','_self')</script>";
//     }
// }
?>

</body>

</html>