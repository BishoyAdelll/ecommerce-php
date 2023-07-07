<?php
include('header.php');

$active= "insert-product";
// require_once('../config.php');
include('db.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product
                        <a href="index.php"  class="btn btn-sm btn-danger float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class=" control-label">Product Title/Name</label>
                            <input type="text" class="form-control" name="product_title" required>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category</label>

                           
                                <select class="form-control" name="p_cat_id">

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

                            
                                <input type="file" class="form-control" name="product_img1" required>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image # 2</label>

                          
                                <input type="file" class="form-control" name="product_img2" required>
                           
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image # 3</label >

                            
                                <input type="file" class="form-control" name="product_img3" multiple>
                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image # 4</label>

                            
                                <input type="file" class="form-control" name="product_img4" multiple >
                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image # 5</label>

                            
                                <input type="file" class="form-control" name="product_img5"  multiple>
                           
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>

                           
                                <input type="text" class="form-control" name="product_price" required>
                           
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keywords</label>

                            
                                <input type="text" class="form-control" name="product_keywords" required>
                           
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>

                           
                                <textarea class="form-control" name="product_desc" cols="19" rows="6"></textarea>
                           
                       
                        <div class="form-group">
                        <label class="col-md-3 control-label">Product Size</label>
                        <select name="size" id="">
                        <?php
                        $sql_size ="SELECT * FROM size ";
                        $result_size =$con-> query($sql_size);
                        foreach($result_size as $row_size){
                            ?>
                            <option value="<?=$row_size['idsize']?>"><?=$row_size['size_pro'];?></option>
                            <?php
                        }
                        ?>
                        </select>
                        </div>
                        <div class="form-group" style="display: flex;justify-content:center">
                                <input name="submit" type="submit" class="btn btn-primary form-control" value="Insert Product">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');

if (isset($_POST['submit'])) {
    $size= $_POST['size'];
    $p_cat_id = $_POST['p_cat_id'];
    $cat_id = $_POST['cat_id'];
    $product_title = $_POST['product_title'];
    $product_img1 =  $_FILES['product_img1']['name'];
    $product_img2 =  $_FILES['product_img2']['name'];
    $product_img3 =  $_FILES['product_img3']['name'];
    $product_img4 =  $_FILES['product_img4']['name'];
    $product_img5 =  $_FILES['product_img5']['name'];
   
    
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];


    $insert_product = "INSERT INTO products (p_cat_id,cat_id,reg_date,product_title,product_img1,product_img2,product_img3,product_img4,product_img5,product_price,product_keywords,product_desc,size)
    values ('$p_cat_id','$cat_id',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_img4','$product_img5','$product_price','$product_keywords','$product_desc','$size')";

    $run_insert_product = mysqli_query($con, $insert_product);

    if ($run_insert_product) {
        move_uploaded_file($_FILES['product_img1']['tmp_name'],"../img/products/".$_FILES['product_img1']['name']);
        move_uploaded_file($_FILES['product_img2']['tmp_name'],"../img/products/".$_FILES['product_img2']['name']);
        move_uploaded_file($_FILES['product_img3']['tmp_name'],"../img/products/".$_FILES['product_img3']['name']);
        move_uploaded_file($_FILES['product_img4']['tmp_name'],"../img/products/".$_FILES['product_img4']['name']);
        move_uploaded_file($_FILES['product_img5']['tmp_name'],"../img/products/".$_FILES['product_img5']['name']);
        echo "<script>alert('Product Inserted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}


?>