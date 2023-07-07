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
                 
                $get_items = "SELECT * FROM orders where user_id = '$customer_id' ORDER BY created_at DESC";
                $run_items = mysqli_query($con, $get_items);
            }
            
        
    }
        echo "
       
        <div class='cart-table container col-md-8  mt-5' style='min-height: 150px;'>
        <table>
            <thead style='font-size: larger;'>
                <tr>
                    <th>Order ID</th>
                    <th>Price</th>
                    <th> Tracking_no</th>
                    <th>Date</th>
                    <th>View</th>

                </tr>
            </thead>
            <tbody>    
        ";
        while ($row_items = mysqli_fetch_array($run_items)) {
            $o_id = $row_items['order_id'];
            $o_qty = $row_items['tracking_no'];
            $o_price = $row_items['total_price'];
            $o_date = $row_items['created_at'];
            echo
                "<tr style='border-bottom: 0.5px solid #ebebeb'>
            <td class='first-row'>$o_id</td>
            <td class='first-row'>
                $o_price
            </td>
            <td class='first-row'>$o_qty</td>
            <td class='first-row'>
                $o_date
            </td>
            <td class='first-row'>
               <a href='order-view.php?t=$o_qty' class='btn btn-primary'>View Details</a>
            </td>
        </tr>";
        }
?>
</tbody>
</table>
</div>
<?php
 $emal = $_SESSION['customer_email'];
 $query = "SELECT * FROM customer where customer_email = '$emal'";

 $run_query = mysqli_query($con,$query);

 $row_query = mysqli_fetch_array($run_query);

 $cname = $row_query['customer_name'];
 $cemail = $row_query['customer_email'];
 $ccontact = $row_query['customer_contact'];
 $cpass = $row_query['customer_pass'];
//  $caddress = $row_query['customer_address'];

 echo  "
 <div class='col-md-8 col-12' style='margin:0px auto'>
 <div class='bg-light text-dark' style='border:solid #e5e5e5 0.2px; padding: 10px 40px'> 
         <div class='ci-text'>
             <span style='font-size:large;font-weight:600'>Email</span>
             <p style='text-align:center'>$cemail</p>
         </div>
         <div class='ci-text'>
             <span style='font-size:large;font-weight:600'>Contact</span>
             <p style='text-align:center'>$ccontact</p>
         </div>
             
      </div>
 </div> 
     ";
include('footer.php');
?>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // disable right click
</script>
