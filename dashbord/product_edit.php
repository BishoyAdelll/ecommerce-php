<?php
include('header.php');

$active = "insert-product";
// require_once('../config.php');
include('db.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product
                        <a href="index.php" class="btn btn-sm btn-danger float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="panel-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $product_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM  products WHERE products_id='$product_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $product = mysqli_fetch_array($query_run);
                        ?>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="products_id" value="<?= $product['products_id']?>">
                                    <div class="form-group">
                                        <label class=" control-label">Product Title/Name</label>
                                        <input type="text" class="form-control" name="product_title" value="<?=$product['product_title']?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Category</label>


                                        <select class="form-control" name="p_cat_id" >

                                            <option>Select a Product Category</option>

                                            <?php

                                            $get_p_category = "SELECT * FROM product_categories";
                                            $run_p_category = mysqli_query($con, $get_p_category);

                                            while ($p_cat_row = mysqli_fetch_array($run_p_category)) {

                                                $p_cat_id = $p_cat_row['p_cat_id'];
                                                $p_cat_title = $p_cat_row['p_cat_title'];

                                                echo "
                
                                                    <option value='$p_cat_id'>$p_cat_title</option>  
                                                    
                                                
                                                    ";
                                            }

                                            ?>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>


                                        <select class="form-control" name="cat_id">

                                            <option>Select a Category</option>

                                            <?php

                                            $get_category = "SELECT * FROM category";
                                            $run_category = mysqli_query($con, $get_category);

                                            while ($cat_row = mysqli_fetch_array($run_category)) {

                                                $cat_id = $cat_row['cat_id'];
                                                $cat_title = $cat_row['cat_title'];

                                                echo "
                                                        
                                                        <option value='$cat_id'>$cat_title</option>  
                                                        
                                                    
                                                        ";
                                            }

                                            ?>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Image # 1</label>


                                        <input type="file" class="form-control" name="product_img1"  value="<?=$product['product_img1']?>" >
                                        <img src="../img/products/<?=$product['product_img1']?>" alt="" style="width:50px; height:50px ; margin-top:10px">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Image # 2</label>


                                        <input type="file" class="form-control"  name="product_img2" >
                                        <img src="../img/products/<?=$product['product_img2']?>" alt="" style="width:50px; height:50px ; margin-top:10px">

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Image # 3</label>


                                        <input type="file" class="form-control " value="<?=$product['product_img3']?>" name="product_img3" >
                                        <img src="../img/products/<?=$product['product_img3']?>" alt="" style="width:50px; height:50px ; margin-top:10px">

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Image # 4</label>


                                        <input type="file" class="form-control" value="<?=$product['product_img4']?>" name="product_img4" >
                                        <img src="../img/products/<?=$product['product_img4']?>" alt="" style="width:50px; height:50px ; margin-top:10px">


                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Image # 5</label>
                                        <input type="file" class="form-control" value="<?=$product['product_img5']?>" name="product_img5" >
                                        <img src="../img/products/<?=$product['product_img5']?>" alt="" style="width:50px; height:50px ; margin-top:10px">

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Price</label>


                                        <input type="text" class="form-control" value="<?=$product['product_price']?>" name="product_price" required>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Keywords</label>


                                        <input type="text" class="form-control" value="<?=$product['product_keywords']?>"  name="product_keywords" required>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Description</label>


                                        <textarea class="form-control"   name="product_desc" cols="19" rows="6"><?=$product['product_desc']?></textarea>

                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label">Product Size</label>
                                    <select name="size" id="">
                                    <?php
                                    $sql_size ="SELECT * FROM size ";
                                    $result_size =$con-> query($sql_size);
                                    foreach($result_size as$row_size){
                                        ?>
                                        <option value="<?=$row_size['idsize']?>"><?=$row_size['size_pro'];?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="form-group" style="display: flex;justify-content:center">
                                        <input name="update" type="submit" class="btn btn-primary form-control" value="Update Product">
                                    </div>

                                </form>
                        <?php
                            } else {
                                echo '<h5> No such Id Found';
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('footer.php');



   

    if (isset($_POST['update'])) {
        $products_id = $_POST['products_id'];
        $p_cat_id = $_POST['p_cat_id'];
        $cat_id = $_POST['cat_id'];
        $size= $_POST['size'];
        $product_title = $_POST['product_title'];
        $product_img1 =  $_FILES['product_img1']['name'];
        $product_img2 =  $_FILES['product_img2']['name'];
        $product_img3 =  $_FILES['product_img3']['name'];
        $product_img4 =  $_FILES['product_img4']['name'];
        $product_img5 =  $_FILES['product_img5']['name'];
        
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];
    
    
       

    $query="UPDATE products SET  p_cat_id= '$p_cat_id',cat_id='$cat_id' ,reg_date=NOW(),product_title='$product_title' ,product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_img4='$product_img4',product_img5='$product_img5',product_price= '$product_price',product_keywords=  '$product_keywords',product_desc='$product_desc',size='$size' WHERE products_id='$products_id' ";
        $run_insert_product = mysqli_query($con, $query);
    
        if ($run_insert_product) {
            move_uploaded_file($_FILES['product_img1']['tmp_name'],"../img/products/".$_FILES['product_img1']['name']);
            move_uploaded_file($_FILES['product_img2']['tmp_name'],"../img/products/".$_FILES['product_img2']['name']);
            move_uploaded_file($_FILES['product_img3']['tmp_name'],"../img/products/".$_FILES['product_img3']['name']);
            move_uploaded_file($_FILES['product_img4']['tmp_name'],"../img/products/".$_FILES['product_img4']['name']);
            move_uploaded_file($_FILES['product_img5']['tmp_name'],"../img/products/".$_FILES['product_img5']['name']);
            echo "<script>alert('Product Updated')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            echo "<script>alert('Faild')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    ?>