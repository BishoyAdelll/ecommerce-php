
<?php

include('header.php');
include('db.php');

$get_items = "SELECT * FROM orders ORDER BY created_at DESC";
$run_items = mysqli_query($con, $get_items);


echo "
        <div class='container'>
        <div class='row ' >
            <div class='col-md-12'>
                <div class='card'>
                    <div class='card-header'>
                        <h3>All orders</h3>
                    </div>
                    <div class='card-body' >
                        <table class='table'>
        
                            <thead style='font-size: larger;'>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Price</th>
                                    <th> Tracking_no</th>
                                    <th>Date</th>
                                    <th>View</th>

                                </tr>
                            </thead>
             
        ";
        while ($row_items = mysqli_fetch_array($run_items)) {
            $o_id = $row_items['order_id'];
            $o_qty = $row_items['tracking_no'];
            $o_price = $row_items['total_price'];
            $o_date = $row_items['created_at'];
            echo

                    "<tbody>   
                        <tr style='border-bottom: 0.5px solid #ebebeb'>
                                <td class='first-row'>$o_id</td>
                                <td class='first-row'>
                                    $o_price
                                </td>
                                <td class='first-row'>$o_qty</td>
                                <td class='first-row'>
                                    $o_date
                                </td>
                                <td class='first-row'>
                                <a href='single-order.php?t=$o_qty' class='btn btn-primary'>View Details</a>
                                </td>
                        </tr>
                    </tbody>
                ";
}
?>
</table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>

