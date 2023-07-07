<?php
$active = "Contact";
include('db.php');
include("functions.php");
include("header.php");

if (isset($_SESSION['customer_email'])) {
    $c_id = $_SESSION['customer_email'];
    $query = "SELECT * FROM customer where customer_email= '$c_id'";
    $run_query = mysqli_query($con, $query);
        if ($run_query !== null) {  // check if the query ran successfully
            $get_query = mysqli_fetch_array($run_query);
            $c_id = $get_query['customer_email'];
            $customer_id=$get_query['customer_id'];
             
        }
}
if(isset($_GET['t'])){
    $tracking_no=$_GET['t'];
   $orderdata=checkTrackingNo($tracking_no);
   if(mysqli_num_rows($orderdata)<0){
    ?>
       <h4>somthing went wrong</h4>
    <?php
   }

}
$data=mysqli_fetch_array($orderdata)
    // if (isset($_SESSION['customer_email'])) {
    //     $c_id = $_SESSION['customer_email'];
    //     $query = "SELECT * FROM customer where customer_email= '$c_id'";
    //     $run_query = mysqli_query($con, $query);
    //         if ($run_query !== null) {  // check if the query ran successfully
    //             $get_query = mysqli_fetch_array($run_query);
    //             $c_id = $get_query['customer_email'];
    //             $customer_id=$get_query['customer_id'];
                 
    //             $get_items = "SELECT * FROM orders where user_id = '$customer_id' ORDER BY created_at DESC";
    //             $run_items = mysqli_query($con, $get_items);
    //         }
            
        
    // }
    //     echo "
       
    //     <div class='cart-table mt-5' style='min-height: 150px;'>
    //     <table>
    //         <thead style='font-size: larger;'>
    //             <tr>
    //                 <th>Order ID</th>
    //                 <th>Price</th>
    //                 <th> pincode</th>
    //                 <th>Date</th>
    //                 <th>View</th>

    //             </tr>
    //         </thead>
    //         <tbody>    
    //     ";
    //     while ($row_items = mysqli_fetch_array($run_items)) {
    //         $o_id = $row_items['order_id'];
    //         $o_qty = $row_items['pincode'];
    //         $o_price = $row_items['total_price'];
    //         $o_date = $row_items['created_at'];
    //         echo
    //             "<tr style='border-bottom: 0.5px solid #ebebeb'>
    //         <td class='first-row'>$o_id</td>
    //         <td class='first-row'>
    //             $o_price
    //         </td>
    //         <td class='first-row'>$o_qty</td>
    //         <td class='first-row'>
    //             $o_date
    //         </td>
    //         <td class='first-row'>
    //            <a href='order-view.php?order_id=$o_id' class='btn btn-primary'>View Details</a>
    //         </td>
    //     </tr>";
    //     }
?>
</tbody>
</table>
</div>
        <div class="py-5">
            <div class="container">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                               <div class="col-md-12 ">
                               <div class=" py-3">View order
                                <a href="orders.php" class="btn btn-danger float-right">Back</a>
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
                                                        <?=$data['fullname']?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="">Email</label>
                                                    <div class="border p-1">
                                                        <?=$data['email']?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="">Phone</label>
                                                    <div class="border p-1">
                                                        <?=$data['phone']?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="">Tracking_no</label>
                                                    <div class="border p-1">
                                                        <?=$data['tracking_no']?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="">Address</label>
                                                    <div class="border p-1">
                                                        <?=$data['address']?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="">pincode</label>
                                                    <div class="border p-1">
                                                        <?=$data['pincode']?>
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
                                               
                                                    $order_quey="SELECT o.order_id as oid,o.tracking_no,o.user_id,oi.*,p.* FROM orders o,order_items oi, products p WHERE o.user_id='$customer_id' AND oi.order_id=o.order_id AND p.products_id=oi.product_id AND o.tracking_no='$tracking_no'" ;
                                                    $order_quey_run=mysqli_query($con,$order_quey);
                                                    if(mysqli_num_rows($order_quey_run)>0){
                                                        foreach($order_quey_run as $item){
                                                            ?>
                                                             <tr>
                                                                <td>
                                                                    <img src="img/products/<?=$item['product_img1']?>" width="50px" height="50px" alt="<?=$item['product_title']?>">
                                                                    <?=$item['product_title']?>
                                                                </td>
                                                                <td>
                                                                <?=$item['price']?>
                                                                </td>
                                                                <td>
                                                                <?=$item['product_size']?>
                                                                </td>
                                                                <td>
                                                                <?=$item['quantity']?>
                                                                </td>
                                                             </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                
                                                   
                                                </tbody>
                                            </table>
                                        <hr>
                                        <h5><b>Total Price:</b> <span class="float-right "><b><?=$data['total_price']?></b></span></h4>
                                        <hr>
                                            <div class="border p-1 mb-3">
                                                <label for="">payment mode:</label>
                                                <span class="text-success"><?=$data['payment_mode']?></span>
                                            </div>
                                            <div class="border p-1 mb-3">
                                                <label for="">status message:</label>
                                                <span class="text-warning"><?=$data['status_message']?></span>
                                            </div>
                                        </div>
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
?>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // disable right click
</script>
