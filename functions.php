<?php

$db =  mysqli_connect("localhost","root", "","test-hana");

if (!function_exists('getRealIpUser')) {
    function getRealIpUser() {
        // Your existing code here
        switch (true) {

            case (!empty($_SERVER['HTTP_X_REAL_IP'])):
                return $_SERVER['HTTP_X_REAL_IP'];
            case (!empty($_SERVER['HTTP_CLIENT_IP'])):
                return $_SERVER['HTTP_CLIENT_IP'];
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
                default:
                return $_SERVER['REMOTE_ADDR'];
    }
}
}
// function getRealIpUser()
// {

//     switch (true) {

//         case (!empty($_SERVER['HTTP_X_REAL_IP'])):
//             return $_SERVER['HTTP_X_REAL_IP'];
//         case (!empty($_SERVER['HTTP_CLIENT_IP'])):
//             return $_SERVER['HTTP_CLIENT_IP'];
//         case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
//             return $_SERVER['HTTP_X_FORWARDED_FOR'];

//         default:
//             return $_SERVER['REMOTE_ADDR'];
//     }
// }

if (!function_exists('addCart')) {
    function addCart() {


    global $db;

    if (isset($_GET['add_cart'])) {
        $ip_add = getRealIpUser();

        $c_id = $_SESSION['customer_email'];
        $p_id = $_GET['add_cart'];
        $qty = $_POST['product_qty'];
        $size = $_POST['size'];
    
        $check_product = "SELECT * FROM cart where c_id = '$c_id' AND products_id = '$p_id'";
        $run_check = mysqli_query($db, $check_product);


        if (mysqli_num_rows($run_check) > 0) {

            echo "<script>alert('Product already added.')</script>";
            echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";

        } else {

            $query = "INSERT INTO cart (products_id, ip_add,qty,size,reg_date,c_id) values('$p_id','$ip_add','$qty','$size',NOW(),'$c_id')";
            $run_query = mysqli_query($db, $query);
                
            echo "<script>alert('Product added to Cart. Keep Shopping.')</script>";
            echo "<script>window.open('product.php?product_id=$p_id','_self')</script>";
        }
    }
}
}

// Retrieve Women Products for index slider
if (!function_exists('getWProduct')) {
function getWProduct()
{
    global $db;

    $get_products = "SELECT * FROM products where cat_id=2 order by RAND() LIMIT 15";
    $run_products = mysqli_query($db, $get_products);



    while ($row_products = mysqli_fetch_array($run_products)) {

        $products_id = $row_products['products_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_img1 = $row_products['product_img1'];




        echo "
        
        <div class='product-item'>
        <div class='pi-pic' style='max-height:300px'>
            <img src='img/products/$product_img1' alt='$product_title'>
            <ul>
                <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:#AE2E53;color:white'>View Details</a></li>
            </ul>
        </div>
        <div class='pi-text'>
            <a href='product.php?product_id=$products_id'>
                <h5>$product_title</h5>
            </a>
            <div class='product-price'>
               AED $product_price
            </div>
        </div>
    </div>

    ";
    }
}
}
// Retrieve men Products for index slider
if (!function_exists('getMProduct')) {
function getMProduct()
{
    global $db;

    $get_products = "SELECT * FROM products where cat_id=1 order by RAND() LIMIT 9";
    $run_products = mysqli_query($db, $get_products);



    while ($row_products = mysqli_fetch_array($run_products)) {

        $products_id = $row_products['products_id'];
        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_img1 = $row_products['product_img1'];

        echo "
        
        <div class='product-item'>
        <div class='pi-pic' style='max-height:300px'>
            <img src='img/products/$product_img1' alt='$product_title'>
            <ul>
                <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:#AE2E53;color:white'>View Details</a></li>
            </ul>
        </div>
        <div class='pi-text'>
            <a href='#'>
                <h5>$product_title</h5>
            </a>
            <div class='product-price'>
            AED $product_price
            </div>
        </div>
    </div>

    ";
    }
}
}
if (!function_exists('getKProduct')) {
    function getKProduct()
    {
        global $db;
    
        $get_products = "SELECT * FROM products where cat_id=3 order by RAND() LIMIT 9";
        $run_products = mysqli_query($db, $get_products);
    
    
    
        while ($row_products = mysqli_fetch_array($run_products)) {
    
            $products_id = $row_products['products_id'];
            $product_title = $row_products['product_title'];
            $product_price = $row_products['product_price'];
            $product_img1 = $row_products['product_img1'];
    
            echo "
            
            <div class='product-item'>
            <div class='pi-pic' style='max-height:300px'>
                <img src='img/products/$product_img1' alt='$product_title'>
                <ul>
                    <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:#AE2E53;color:white'>View Details</a></li>
                </ul>
            </div>
            <div class='pi-text'>
                <a href='#'>
                    <h5>$product_title</h5>
                </a>
                <div class='product-price'>
                AED $product_price
                </div>
            </div>
        </div>
    
        ";
        }
    }
    }
    if (!function_exists('getHProduct')) {
        function getHProduct()
        {
            global $db;
        
            $get_products = "SELECT * FROM products where cat_id=4 order by RAND() LIMIT 9";
            $run_products = mysqli_query($db, $get_products);
        
        
        
            while ($row_products = mysqli_fetch_array($run_products)) {
        
                $products_id = $row_products['products_id'];
                $product_title = $row_products['product_title'];
                $product_price = $row_products['product_price'];
                $product_img1 = $row_products['product_img1'];
        
                echo "
                
                <div class='product-item'>
                <div class='pi-pic' style='max-height:300px'>
                    <img src='img/products/$product_img1' alt='$product_title'>
                    <ul>
                        <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:#AE2E53;color:white'>View Details</a></li>
                    </ul>
                </div>
                <div class='pi-text'>
                    <a href='#'>
                        <h5>$product_title</h5>
                    </a>
                    <div class='product-price'>
                    AED $product_price
                    </div>
                </div>
            </div>
        
            ";
            }
        }
        }

// Retrieve Products Catergories
if (!function_exists('getProdCat')) {
function getProdCat()
{

    global $db;

    $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = mysqli_query($db, $get_p_cats);



    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];


        echo "


        <li><a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>

        ";
    }
}
}
// Retrieve Catergories
if (!function_exists('getCat')) {
function getCat()
{

    global $db;

    $get_cats = "SELECT * FROM category";
    $run_cats = mysqli_query($db, $get_cats);



    while ($row_cats = mysqli_fetch_array($run_cats)) {

        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];


        echo "

        <li class='hovclass'><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>

        ";
    }
}
}
if (!function_exists('getPcatProd')) {
function getPcatProd()
{
    global $db;

    if (isset($_GET['p_cat_id'])) {

        $p_cat_id = $_GET['p_cat_id'];

        $get_p_cat = "SELECT * FROM product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $get_products = "SELECT * FROM products where p_cat_id='$p_cat_id'";
        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);
        
        if ($count == 0) {

            echo "
                <div class='card' style='font-weight:bold; color:#AE2E53'>
                    <div class='card-body'>No Products Available</div>
                </div>

                    ";
        } else {



            while ($row_products = mysqli_fetch_array($run_products)) {

                $products_id = $row_products['products_id'];
                $product_title = $row_products['product_title'];
                $product_price = $row_products['product_price'];
                $product_img1 = $row_products['product_img1'];

                echo "
        
                <div class='col-lg-4 col-sm-6'>
                <div class='product-item'>
                    <div class='pi-pic' style='max-height:350px'>
                        <img src='img/products/$product_img1' alt='$product_title'>
                        <ul>
                            <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:#AE2E53;color:white'>View Details</a></li>
                        </ul>
                    </div>
                    <div class='pi-text'>
                        <div class='catagory-name'></div>
                        <a href='product.php?product_id=$products_id'>
                            <h5>$product_title</h5>
                        </a>
                        <div class='product-price'>
                        AED $product_price                    
                        </div>
                    </div>
                </div>
            </div>

    ";
            }
        }
    }
}
}
if (!function_exists('getCatProd')) {
function getcatProd()
{
    global $db;

    if (isset($_GET['cat_id'])) {

        $cat_id = $_GET['cat_id'];

        $get_cat = "SELECT * FROM category where cat_id='$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $p_cat_title = $row_cat['cat_title'];
        $p_cat_desc = $row_cat['cat_desc'];

        $get_products = "SELECT * FROM products where cat_id='$cat_id'";
        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);





        if ($count == 0) {

            echo "
                <div class='card' style='font-weight:bold; color:#AE2E53'>
                    <div class='card-body'>No Products Available</div>
                </div>

                    ";
        } else {



            while ($row_products = mysqli_fetch_array($run_products)) {

                $products_id = $row_products['products_id'];
                $product_title = $row_products['product_title'];
                $product_price = $row_products['product_price'];
                $product_img1 = $row_products['product_img1'];

                echo "
        
                <div class='col-lg-4 col-sm-6'>
                <div class='product-item'>
                    <div class='pi-pic' style='max-height:350px'>
                        <img src='img/products/$product_img1' alt='$product_title'>
                        <ul>
                            <li class='quick-view'><a href='product.php?product_id=$products_id' style='background:#AE2E53;color:white'>View Details</a></li>
                        </ul>
                    </div>
                    <div class='pi-text'>
                        <div class='catagory-name'></div>
                        <a href='product.php?product_id=$products_id'>
                            <h5>$product_title</h5>
                        </a>
                        <div class='product-price'>
                        AED $product_price                    
                        </div>
                    </div>
                </div>
            </div>

    ";
            }
        }
    }
}
}
if (!function_exists('getProd')) {
function getProd()
{
    global $db;

    if (isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        $get_product_id = "SELECT * FROM products where products_id='$product_id'";
        $run_product_id = mysqli_query($db, $get_product_id);

        $row_products = mysqli_fetch_array($run_product_id);

        $product_title = $row_products['product_title'];
        $product_price = $row_products['product_price'];
        $product_desc = $row_products['product_desc'];
        $product_img1 = $row_products['product_img1'];
        $product_img2 = $row_products['product_img2'];
        $product_img3 = $row_products['product_img3'];
        $product_img4 = $row_products['product_img4'];
        $product_img5 = $row_products['product_img5'];


        $get_p_cat_name = "SELECT p_cat_title FROM products AS P,product_categories AS C where P.p_cat_id=C.p_cat_id AND products_id=$product_id";
        $run_get_p_cat_name = mysqli_query($db, $get_p_cat_name);


        $row_p_cat_name = mysqli_fetch_array($run_get_p_cat_name);


        $p_cat_name = $row_p_cat_name['p_cat_title'];


        echo "
        
    <div class='col-lg-6' style='margin:0 auto'>
        <div class='product-pic-zoom  col-md-8' style='max-height:400px;margin: 0 0 30px 0'>
            <img class='product-big-img' src='img/products/$product_img1' alt='$product_title'>
            <div class='zoom-icon'>
                <i class='fa fa-search-plus'></i>
            </div>
        </div>
        <div class='product-thumbs'>
            <div class='product-thumbs-track ps-slider owl-carousel'>
                <div class='pt active' data-imgbigurl='img/products/$product_img1'><img src='img/products/$product_img1' alt='$product_title'></div>
                <div class='pt' data-imgbigurl='img/products/$product_img2'><img src='img/products/$product_img2' alt='$product_title'></div>
              </div>
        </div>
    </div>
    <div class='col-lg-6'>
        <div class='product-details'>
            <div class='pd-title'>
                <h3>$product_title</h3>
            </div>
           
            <div class='pd-desc'>
                <p>$product_desc</p>
                <h4>AED $product_price</h4>
            </div>

            <ul class='pd-tags'>
                <li><span>CATEGORY</span>: $p_cat_name</li>
            </ul>
        
        ";
    }
}
}
if (!function_exists('relatedProducts')) {
function relatedProducts()
{
    global $db;

    if (isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];


        $get_p_cat_id = "SELECT C.p_cat_id,C.p_cat_title FROM products AS P,product_categories AS C where P.p_cat_id=C.p_cat_id AND products_id=$product_id";
        $run_get_p_cat_id = mysqli_query($db, $get_p_cat_id);

        $row_p_cat_id = mysqli_fetch_array($run_get_p_cat_id);

        $pcat_id = $row_p_cat_id['p_cat_id'];

        $get_r_products = "SELECT * FROM products where p_cat_id=$pcat_id LIMIT 1,4";
        $run_get_r_products = mysqli_query($db, $get_r_products);


        while ($row_get_r_products = mysqli_fetch_array($run_get_r_products)) {



            $p_id = $row_get_r_products['products_id'];
            $p_name = $row_get_r_products['product_title'];
            $p_img1 = $row_get_r_products['product_img1'];
            $p_price = $row_get_r_products['product_price'];


            if ($p_id != $product_id) {
                echo "


        <div class='col-lg-3 col-sm-6'>
            <div class='product-item' >
                <div class='pi-pic' style='max-height:300px'>
                    <img src='img/products/$p_img1' alt='$p_name'>
                    <ul>
                        <li class='quick-view'><a href='product.php?product_id=$p_id' style='background:#AE2E53;color:white'>View Details</a></li>
                    </ul>
                </div>
                <div class='pi-text'>
                    <a href='#'>
                        <h5>$p_name</h5>
                    </a>
                    <div class='product-price'>
                    AED $p_price
                    </div>
                </div>
            </div>
        </div>
        
        ";
            }
        }
    }
}
}
if (!function_exists('items')) {
function items()
{

    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];

    $get_items = "SELECT * FROM cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;
}
}
if (!function_exists('total_price')) {
function total_price()
{

    global $db;

    
    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];
    

    $total = 0;

    $get_items = "SELECT * FROM cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);


    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];

        $get_price = "SELECT * FROM products where products_id = '$p_id'";
        $run_price = mysqli_query($db, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_price = $row_price['product_price'] * $pro_qty;
            $total += $sub_price;
            
        }
    }
    echo "AED " . $total;
}



function total_price_amount()
{

    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];
    

    $total = 0;

    $get_items = "SELECT * FROM cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);


    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];

        $get_price = "SELECT * FROM products where products_id = '$p_id'";
        $run_price = mysqli_query($db, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_price = $row_price['product_price'] * $pro_qty;
            $total += $sub_price;
            
        }
    }
    return  $total * 0.27;
}
   
   function new_total()
{

    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];
    

    $total = 0;

    $get_items = "SELECT * FROM cart where c_id = '$c_id'";
    $run_items = mysqli_query($db, $get_items);


    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];

        $get_price = "SELECT * FROM products where products_id = '$p_id'";
        $run_price = mysqli_query($db, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_price = $row_price['product_price'] * $pro_qty;
            $total += $sub_price;
            
        }
    }
    return  $total * 0.27;
}

}

$countrows = 0;
if (!function_exists('cart_items')) {
function cart_items()
{

    global $db;

    $c_id = $_SESSION['customer_email'];

    $get_items = "SELECT * FROM cart where c_id = '$c_id' ORDER BY reg_date DESC";
    $run_itemss = mysqli_query($db, $get_items);

    $countrows =  mysqli_num_rows($run_itemss);

    if ($countrows == 0) {
        echo  " 

    <div class='card col-md-3 col-10' style='margin:0 auto; border-radius:25px 5px;box-shadow: inset -12px -8px 40px #AE2E53;'>
        <div class='card-body'>
           <h5 style='text-align:center;font-weight:500'> No items in Cart </h5>
        </div>
    </div>
           
        ";
    } else {

        echo "
        
        <thead style='font-size: larger;'>
                            <tr>
                                <th>Image</th>
                                <th class='p-name'>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>

        ";


        while ($row_items = mysqli_fetch_array($run_itemss)) {
            $p_id = $row_items['products_id'];
            $pro_qty = $row_items['qty'];

            $get_item = "SELECT * FROM products where products_id = '$p_id'";
            $run_item = mysqli_query($db, $get_item);

            while ($row_item = mysqli_fetch_array($run_item)) {

                $pro_id = $row_item['products_id'];
                $pro_name = $row_item['product_title'];
                $pro_price = $row_item['product_price'];
                $pro_img1 = $row_item['product_img1'];

                $pro_total_p = $pro_price * $pro_qty;
            }

            echo "
    
        <tr style='border-bottom: 0.5px solid #AE2E53'>
           <td class='cart-pic first-row'><img src='img/products/$pro_img1' alt='$pro_name' style='max-height:100px'></td>
           <td class='cart-title first-row'>
               <h5><a href='product.php?product_id=$pro_id' style='color:black;font-weight:bold'>$pro_name</h5>
           </td>
           <td class='p-price first-row'>AED $pro_price</td>
           <td class='qua-col first-row'>
               <div class='quantity'>
                   <div class='pro-qty'>
                       <input id = 'qqty' type='text' value='$pro_qty'>
                   </div>
               </div>
           </td>
           <td class='total-price first-row'>AED $pro_total_p</td>
           <td class='close-td first-row'><a href='shopping-cart.php?del=$pro_id'><i class='ti-close' style='color:black'></i></a></td>
       </tr>    
   ";
        }
    }
}
}
if (!function_exists('cart_icon_prod')) {
function cart_icon_prod()
{

    global $db;

    $c_id = $_SESSION['customer_email'];
    $ip_add = getRealIpUser();


    $get_items = "SELECT * FROM cart where c_id = '$c_id' ORDER BY reg_date DESC LIMIT 0,2";
    $run_items = mysqli_query($db, $get_items);



    if (mysqli_num_rows($run_items) == 0) {
        echo  " 

        
        <p style='text-align:center; font-weight:500;color:#AE2E53'>Cart Empty </p>
    
           
        ";
    } else {

        while ($row_items = mysqli_fetch_array($run_items)) {
            $p_id = $row_items['products_id'];
            $pro_qty = $row_items['qty'];

            $get_item = "SELECT * FROM products where products_id = '$p_id' ORDER BY reg_date DESC";
            $run_item = mysqli_query($db, $get_item);

            while ($row_item = mysqli_fetch_array($run_item)) {

                $pro_name = $row_item['product_title'];
                $pro_price = $row_item['product_price'];
                $pro_img1 = $row_item['product_img1'];

                $pro_total_p = $pro_price * $pro_qty;
            }

            echo "
        <tr>
        <td class='si-pic'><img src='img/products/$pro_img1' alt='$pro_name' style='max-height:70px'></td>
        <td class='si-text'>
            <div class='product-selected'>
                <p>AED $pro_price x $pro_qty</p>
                <h6>$pro_name</h6>
            </div>
        </td>
        <td class='si-close'>
        <a href='shopping-cart.php?delcart=$p_id'> <i class='ti-close' style='color:black'></i></a>
        </td>
    </tr>
    ";
        }
    }
}
}
if (!function_exists('checkoutProds')) {
function checkoutProds()
{


    global $db;

    $ip_add = getRealIpUser();
    $c_id = $_SESSION['customer_email'];



    $get_items = "SELECT * FROM cart where c_id = '$c_id' ORDER BY reg_date DESC";
    $run_items = mysqli_query($db, $get_items);


    if (mysqli_num_rows($run_items) == 0) {
        echo  " 

        
        <li class='fw-normal' style='text-align:center;font-weight:bold;font-size:larger;color:#AE2E53'>No Items in Cart</li>
    
           
        
        ";
    } else {

        while ($row_items = mysqli_fetch_array($run_items)) {
            $p_id = $row_items['products_id'];
            $pro_qty = $row_items['qty'];

            $get_item = "SELECT * FROM products where products_id = '$p_id' ORDER BY reg_date DESC";
            $run_item = mysqli_query($db, $get_item);

            while ($row_item = mysqli_fetch_array($run_item)) {

                $pro_name = $row_item['product_title'];
                $pro_price = $row_item['product_price'];
                $pro_image= $row_item['product_img1'];
                $pro_total_p = $pro_price * $pro_qty;
            }

            echo "<li class='fw-normal'>
            <img src='img/products/$pro_image' style='width:30px;height:30px;'  alt=''>
            
            $pro_name
            x $pro_qty
            <span>$pro_total_p</span>
            </li>";
        
    

        }
    }
    
}
function checkTrackingNo($tracking_no){
    global $db;

    $c_id = $_SESSION['customer_email'];
    $ip_add = getRealIpUser();
    $query = "SELECT * FROM customer where customer_email= '$c_id'";

    $run_query = mysqli_query($db, $query);
  
  
    $get_query = mysqli_fetch_array($run_query);
  
    $custom_id = $get_query['customer_id'];
    $query="SELECT * FROM orders WHERE tracking_no='$tracking_no' AND user_id='$custom_id'";
    return mysqli_query($db,$query);
}
function checkTrackingNoDashboard($tracking_no){
    global $db;

    // $c_id = $_SESSION['customer_email'];
    // $ip_add = getRealIpUser();
    // $query = "SELECT * FROM customer where customer_email= '$c_id'";

    // $run_query = mysqli_query($db, $query);
  
  
    // $get_query = mysqli_fetch_array($run_query);
  
    // $custom_id = $get_query['customer_id'];
    $query="SELECT * FROM orders WHERE tracking_no='$tracking_no' ";
    return mysqli_query($db,$query);
}

}

// 