<?php
include('header.php');

$active= "categories";
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
                            <th>category id</th>
                            <th>category Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query="SELECT * FROM category";
                            $query_run=mysqli_query($con,$query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach( $query_run as $key=> $cat){
                                    // echo $product['product_title'];
                                    ?>
                                     <tr>
                                        <td><?=  $cat['cat_id'];?></td>
                                        <td><?=  $cat['cat_title'];?></td>
                                        <td>
                                            <a href="cat_edit.php?id=<?=$cat['cat_id']?>" class="btn btn-sm btn-success d-block  mb-1"> Edit</a>
                                            
                                            
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
?>
