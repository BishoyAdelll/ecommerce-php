<?php
include('header.php');

$active= "insert-product";
// require_once('../config.php');
include('db.php');

?>
<div class="container">
    <div class="row " >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        All products
                        <a href="./insert.php" class="btn btn-sm btn-primary float-right"> Insert Product</a>
                    </h4>
                </div>
                <div class="card-body" >
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product id</th>
                            <th>Product Title</th>
                            <th>Product image1</th>
                            <th>Product image2</th>
                            <th>Product image3</th>
                            <th>Product image4</th>
                            <th>Product image5</th>
                            <th>Product price</th>
                            <th>Product KeyWord</th>
                            <th>Product descreption</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query="SELECT * FROM products";
                            $query_run=mysqli_query($con,$query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach( $query_run as $key=> $product){
                                    // echo $product['product_title'];
                                    ?>
                                     <tr>
                                        <td><?=  $product['products_id'];?></td>
                                        <td><?=  $product['product_title'];?></td>
                                       
                                        <td><img src="../img/products/<?=  $product['product_img1'];?>" alt="" style="width:40px; height:50px;"> </td>
                                        <td><img src="../img/products/<?=  $product['product_img2'];?>" alt="" style="width:40px; height:50px;"> </td>
                                        <td><img src="../img/products/<?=  $product['product_img3'];?>" alt="" style="width:40px; height:50px;"> </td>
                                        <td><img src="../img/products/<?=  $product['product_img4'];?>" alt="" style="width:40px; height:50px;"> </td>
                                        <td><img src="../img/products/<?=  $product['product_img5'];?>" alt="" style="width:40px; height:50px;"> </td>
                                        <td><?=  $product['product_price'];?></td>
                                        <td><?=  $product['product_keywords'];?></td>
                                        <td><?=  $product['product_desc'];?></td>
                                        <td>
                                            <a href="product_edit.php?id=<?=$product['products_id']?>" class="btn btn-sm btn-success d-block  mb-1"> Edit</a>
                                            
                                            <form  method="post">
                                                <button type="submit" class="btn btn-sm btn-danger d-block " name="delete_product" value="<?= $product['products_id']?>"> Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo '<h5> no record found</h5>';
                            }
                            ?>
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');

if(isset($_POST['delete_product'])){
 $product_id=mysqli_real_escape_string($con,$_POST['delete_product']);
 $query="DELETE FROM products  WHERE products_id='$product_id'";
 $query_run=mysqli_query($con,$query);
 if($query_run){
    echo "<script>alert('Product Deleted')</script>";
    echo "<script>window.open('index.php','_self')</script>";
 }else{
    echo "<script>alert('Faild ')</script>";
    echo "<script>window.open('index.php','_self')</script>";
 }
}
?>