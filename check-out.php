<?php
$active = "Checkout";
include('db.php');
include("functions.php");
include("header.php");
// include("orders.php");
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text product-more">
          <a href="index.php"><i class="fa fa-home"></i> Home</a>
          <a href="shop.php">Shop</a>
          <span>Check Out</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
  <div class="container">
    <div class="checkout-form">
      <div class="row">
        <div class="col-md-8">
          <form  method="post">
            <div class="col-md-12 mb-3">
              <label>Full Name</label>
              <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter Full Name" required/>
            </div>
            <div class="col-md-12 mb-3">
              <label>Phone Number</label>
              <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" required/>
            </div>
            <div class="col-md-12 mb-3">
              <label>Email Address</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" required/>
            </div>
            <div class="col-md-12 mb-3">
              <label>Pin-code (Zip-code)</label>
              <input type="number" id="pincode" name="pincode" class="form-control" placeholder="Enter Pin-code" required/>
            </div>
            <div class="col-md-12">
              
              <label>Full Address</label>
              <textarea id="address" class="form-control" name="address" rows="2" required></textarea>
            </div>
            <br>
            <div class="col-md-12 mb-3">
              <label></label>
              <div class="d-md-flex align-items-start">
                <div class="nav col-md-6 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <!--<button class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>-->
                  <!--<button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>-->
                </div>
                <br>
                 <div class="checkout-content">
                <div class="tab-content col-md-24" id="v-pills-tabContent">
                  <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                    <!--<h6>Cash on Delivery Mode</h6>-->
                    <input type="hidden" name="payment_mode" value='Cash On Delivery'>
                    <button type="submit" name="placeOrderBtn" class="content-btn">
                      <span>
                      Cash on Delivery
                      </span>
                    
                    </button>
                    </div>
                    <br>

                    <div id="paypal-button-container"></div>
                  </div>
                  <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                    <h6>Online Payment Mode</h6>
                    <hr />
                    <button type="button" class="btn btn-warning">Pay Now (Online Payment)</button>
                    <div>
                      <!-- <div id="paypal-button-container"></div> -->
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
        <div class="col-md-4" <?php if (!($_SESSION['customer_email'] == 'unset')) {
                                echo "style = 'margin: 0 auto'";
                              } ?>>
          <div class="checkout-content">
            <a href="shop.php" class="content-btn">Continue Shopping</a>
          </div>
          <div class="place-order">
            <h4>Your Order</h4>
            <div class="order-total">
              <ul class="order-table">
                <li>Products <span>Total</span></li>
                <?php checkoutProds(); ?>
                <li class="fw-normal">Subtotal <span><?php total_price(); ?></span></li>
                <li class="total-price">Total <span><?php total_price(); ?></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <br>
</section>





<!-- <script src="https://www.paypal.com/sdk/js?client-id=AXn4Z-syOEQFRTdJnU4fjtmU0tcD9t6HRf1_U8KLgGydG90pdHYEz9FNbJL8WNbezfEm6awJ_0VMDnBi&currency=USD"></script> -->



    <script>
      // Render the PayPal button
      paypal.Buttons({
        onClick(){
          var fullname= $('#fullname').val();
          var phone= $('#phone').val();
          var email= $('#email').val();
          var pincode= $('#pincode').val();
          var address=$('#address').val();

          if(fullname.length == 0){
            $('.fullname').text("* this Faild Is Required")
          }else{
            $('.fullname').text("")
          }
          if(phone.length == 0){
            $('.phone').text("* this Faild Is Required")
          }else{
            $('.phone').text("")
          }
          if(email.length == 0){
            $('.email').text("* this Faild Is Required")
          }else{
            $('.email').text("")
          }
          if(pincode.length == 0){
            $('.pincode').text("* this Faild Is Required")
          }else{
            $('.pincode').text("")
          }
          if(address.length == 0){
            $('.address').text("* this Faild Is Required")
          }else{
            $('.address').text("")
          }
          if(fullname.length == 0 || phone.length == 0 || email.length == 0 || pincode.length == 0 || address.length == 0){
            return false ;
          }
        },
       
        createOrder: function(data, actions) {
                      var total= <?php echo new_total(); ?>;

          return actions.order.create({
            purchase_units: [{
              amount: {
                value: total,
              }
            }]
          });
        },
        // total_price_amount() 
        // Finalize the transaction
        onApprove: function(data, actions) {
                      var fullname= $('#fullname').val();
          var phone= $('#phone').val();
          var email= $('#email').val();
          var pincode= $('#pincode').val();
          var address=$('#address').val();

          return actions.order.capture().then(function(details) {
            // Show a success message to the buyer
                        details.phone = phone;
                        details.address = address;
                        details.pincode = pincode;
                        details.email = email;
                        details.fullname = fullname;

            var data = JSON.stringify(details, null, 2);
            var status_message="in progress";
            var payment_mode ='Paypal';
            var payment_id=null;
            var status = details.status;
            

            if(status == 'COMPLETED'){
                
                                console.log(data);

                            $.ajax({
                                  type: "POST",
                                  url: 'https://bisho.linkie.tech/callback.php',
                              
                                  data: data,
                                
                                  dataType: 'json', // what type of data do we expect back from the server
                                    contentType: 'application/json',      
                                           
                                });

    //             $.ajax({

    //                 url : 'check-out.php',
    //                 method : 'POST',
    //                     headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // },

    //                 data : {
    //                     'fullname' : fullname,
    //                     'phone' : phone,
    //                     'email': email,
    //                     'pincode': pincode,
    //                     'address': address,
    //                     'payment_id': details.id,
    //                     'status': details.status,
    //                     'payment_method': 'paypal'

    //                 },
    //         dataType: 'json', // what type of data do we expect back from the server
    //         contentType: 'application/json',      
    //                 success : function(data) {              
    //                     alert('Data: '+data);
    //                 },
    //                 error : function(request,error)
    //                 {
    //                     alert("Request: "+JSON.stringify(request));
    //                 }
    //             });


            }
            

            
            // const transaction = orderData.purchase_units[0].payments.captures[0];
            // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // document.querySelector('#paypal-button-container').innerHTML = 
            //   '<h3>Thank you for your payment!</h3>';
          });
        }
      }).render('#paypal-button-container');
      
      
      
    </script>

<?php
include('footer.php');
?>

<?php

print_r($_POST['data']);


if(isset($_POST['placeOrderBtn']) || isset($_POST['payment_method'])){
    if($_POST['payment_method'] == 'paypal'){
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $pincode = $_POST['pincode'];
            $address = $_POST['address'];
            // $payment_mode = $_POST['payment_mode'];
            // $payment_id = $_POST['payment_id'];
            $status_message= $_POST['status'];
                $payment_mode ='Paypal';
            $payment_id= $_POST['payment_id'];

    }else{
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $pincode = $_POST['pincode'];
            $address = $_POST['address'];
            // $payment_mode = $_POST['payment_mode'];
            // $payment_id = $_POST['payment_id'];
            $status_message= 'in progress';
            $payment_mode ='Cash on Delivery';
            $payment_id= null;

    }
    
$tracking_no="hana4all".rand(1111,9999).substr($phone,2);
// ///////////////////////
$c_id = $_SESSION['customer_email'];
    

$total = 0;

$get_items = "SELECT * FROM cart where c_id = '$c_id'";
$run_items = mysqli_query($con, $get_items);


while ($row_items = mysqli_fetch_array($run_items)) {
    $p_id = $row_items['products_id'];
    $pro_qty = $row_items['qty'];

    $get_price = "SELECT * FROM products where products_id = '$p_id'";
    $run_price = mysqli_query($con, $get_price);

    while ($row_price = mysqli_fetch_array($run_price)) {

        $sub_price = $row_price['product_price'] * $pro_qty;
        $total += $sub_price;
        
    }
}
// echo $total;
  $query = "SELECT * FROM customer where customer_email= '$c_id'";

  $run_query = mysqli_query($con, $query);


  $get_query = mysqli_fetch_array($run_query);

  $custom_id = $get_query['customer_id'];


  // echo $custom_id;
// total_price();
// echo $fullname,$phone,$email,$pincode,$address;

// echo $total;
// //////////////
// $c_id = $_SESSION['customer_id'];
// echo $c_id;
$insert_query="INSERT INTO orders (tracking_no,user_id,fullname,email,phone,pincode,address,status_message,total_price,payment_mode,payment_id)VALUES('$tracking_no','$custom_id','$fullname','$email','$phone','$pincode','$address','$status_message','$total','$payment_mode','$payment_id')";
 $insert_query_run=mysqli_query($con,$insert_query);

  if($insert_query_run){
    $order_id=mysqli_insert_id($con);
    
  $get_items = "SELECT * FROM cart where c_id = '$c_id'";
  $run_items = mysqli_query($con, $get_items);


    while ($row_items = mysqli_fetch_array($run_items)) {
        $p_id = $row_items['products_id'];
        $pro_qty = $row_items['qty'];
        $pro_size = $row_items['size'];

        $get_price = "SELECT * FROM products where products_id = '$p_id'";
        $run_price = mysqli_query($con, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $pro_price = $row_price['product_price']*$pro_qty  ;
            
            $insert_items_query="INSERT INTO order_items (order_id,product_id,quantity,product_size,price)
            VALUES('$order_id','$p_id','$pro_qty','$pro_size','$pro_price')";
          $insert_items_query_run=mysqli_query($con,$insert_items_query);
            
        }
    }
    $deleteCartQuery="DELETE FROM cart WHERE c_id = '$c_id'";
    $deleteCartQuery_run=mysqli_query($con,$deleteCartQuery);
    echo "<script>alert('Order Placed. Thankyou for Shopping')</script>";
    echo "<script>window.open('orders.php','_self')</script>";
    die();
  }

    
}

// if (isset($_GET['place'])) {


//   $c_id = $_SESSION['customer_email'];

//   $query = "SELECT * FROM customer where customer_email= '$c_id'";

//   $run_query = mysqli_query($con, $query);


//   $get_query = mysqli_fetch_array($run_query);

//   $custom_id = $get_query['customer_id'];


//   $get_items = "select * from cart where c_id = '$c_id'";
//   $run_items = mysqli_query($db, $get_items);
//   $total_q = 0;
//   $final_price = 0;

//   while ($row_items = mysqli_fetch_array($run_items)) {
//     $p_id = $row_items['products_id'];
//     $pro_qty = $row_items['qty'];

//     $get_item = "select * from products where products_id = '$p_id'";
//     $run_item = mysqli_query($db, $get_item);

//     while ($row_item = mysqli_fetch_array($run_item)) {

//       $pro_price = $row_item['product_price'];

//       $total_q += $pro_qty;
//       $pro_total_p = $pro_price * $pro_qty;
//     }

//     $final_price += $pro_total_p;
//   }
//   echo "before insert";
//   $orders = "INSERT INTO orders (order_qty, order_price, c_id, reg_date) VALUES ('$total_q','$final_price','$custom_id',NOW())";

//   $run_orders = mysqli_query($con, $orders);

//   echo "after insert";
//   $cart_clear = "DELETE FROM cart where c_id = '$c_id'";

//   $run_clear = mysqli_query($con, $cart_clear);

//   // echo "done";

//   echo "<script>alert('Order Placed. Thankyou for Shopping')</script>";
//   echo "<script>window.open('index.php?orders','_self')</script>";
// }

// ?>