<?php 
$data=json_decode(file_get_contents('php://input'));
include('db.php');
include("functions.php");
include("header.php");
include('footer.php');

echo $data->purchase_units->shipping->name->full_name;


            $fullname = $data->fullname;
            $phone = $data->phone;
            $email = $data->email;
            $pincode = $data->picode;
            $address = $data->address;
            // $payment_mode = $_POST['payment_mode'];
            // $payment_id = $_POST['payment_id'];
            $status_message= $data->status;
                $payment_mode ='Paypal';
            $payment_id= $data->id;



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

 ?>