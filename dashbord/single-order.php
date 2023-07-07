<?php
$active = "Contact";
include('db.php');
include("../functions.php");
include("header.php");

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderdata = checkTrackingNoDashboard($tracking_no);
    if (mysqli_num_rows($orderdata) < 0) {
?>
        <h4>somthing went wrong</h4>
<?php
    }
}
$data = mysqli_fetch_array($orderdata)

?>
</tbody>
</table>
</div>
<div class="py-5">
    <div class="container">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="col-md-12 ">
                            <div class=" py-3">View order
                                <a href="order.php" class="btn btn-danger float-right">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['fullname'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Tracking_no</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">pincode</label>
                                            <div class="border p-1">
                                                <?= $data['pincode'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>product</th>
                                                <th>price</th>
                                                <th>Size</th>
                                                <th>quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $order_quey = "SELECT o.order_id as oid,o.tracking_no,o.user_id,oi.*,p.* FROM orders o,order_items oi, products p WHERE  oi.order_id=o.order_id AND p.products_id=oi.product_id AND o.tracking_no='$tracking_no'";
                                            $order_quey_run = mysqli_query($con, $order_quey);
                                            if (mysqli_num_rows($order_quey_run) > 0) {
                                                foreach ($order_quey_run as $item) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <img src="../img/products/<?= $item['product_img1'] ?>" width="50px" height="50px" alt="<?= $item['product_title'] ?>">
                                                            <?= $item['product_title'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $item['price'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $item['product_size'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $item['quantity'] ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5><b>Total Price:</b> <span class="float-right "><b><?= $data['total_price'] ?></b></span></h4>
                                        <hr>
                                        <div class="border p-1 mb-3">
                                            <label for="">payment mode:</label>
                                            <span class="text-success"><?= $data['payment_mode'] ?></span>
                                        </div>
                                        <div class="border p-1 mb-3">
                                            <label for="">status message:</label>
                                            <span class="text-warning"><?= $data['status_message'] ?></span>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <form action="" method="POST">
                               <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                                    <label>Update Your Order Status</label>
                                    <div class="input-group mt-3">
                                        <select name="order_status" class="form-select">
                                            <option value="">Select order  Status</option>
                                            <option value="in progress" <?= $data['status_message']==0?"selected":"" ?>>In Progress</option>
                                            <option value="completed"<?= $data['status_message']=='completed' ?"selected":"" ?> >Completed</option>
                                            <option value="pending"<?= $data['status_message']=='pending'?"selected":"" ?> >Pending</option>
                                            <option value="cancelled"<?= $data['status_message']=='cancelled'?"selected":"" ?>>Cancelled</option>
                                            <option value="out-for-delivery"<?= $data['status_message']=='out-for-delivery'?"selected":"" ?> >Out For delivery</option>
                                        </select>
                                        <button type="submit" name="updateOrderBtn" class="btn btn-primary ">Update</button>
                                    </div>
                                    
                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    </div>
</div>
<?php
include('footer.php');


if(isset($_POST['updateOrderBtn'])){
    $tracking_no=$_POST['tracking_no'];
    $order_status=$_POST['order_status'];
    $updateOrder_query="UPDATE orders SET status_message='$order_status' WHERE tracking_no='$tracking_no'";
    $updateOrder_query_run=mysqli_query($con,$updateOrder_query);
    echo "<script>alert('order status updated')</script>";
    echo "<script>window.open('single-order.php?t=$tracking_no','_self')</script>";
}
?>