<?php
include('header.php');
include('db.php');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contacts</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query="SELECT * FROM contacts";
                            $query_run=mysqli_query($con,$query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach( $query_run as $contact){
                                    // echo $product['product_title'];
                                    ?>
                                     <tr>
                                        <td><?=  $contact['id'];?></td>
                                        <td><?=  $contact['name'];?></td>
                                        <td><?=  $contact['email'];?></td>
                                        <td><?=  $contact['subject'];?></td>
                                        <td><?=  $contact['message'];?></td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo '<h5> no record found</h5>';
                            }
                            ?>
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
