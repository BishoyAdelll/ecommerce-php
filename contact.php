<?php
$active = "Contact";
include('db.php');
include("functions.php");
include("header.php");

?>
 <!-- <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // disable right click
</script>  -->


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contacts Us</h4>
                    <p>Your Passion is our Satisfaction</p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Address:</span>
                            <p>dubai</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Phone:</span>
                            <p>+92 3213352126</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>hana4all@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">

                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Leave A Message</h4>
                        <p>Our staff will call back later and answer your questions.</p>
                        <form  class="comment-form" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your name" class="form-control" name="name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your email" class="form-control" name="email" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Message Subject" class="form-control" name="subject" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Your message" class="form-control" name="message" required ></textarea>
                                    <button class="site-btn" name="send" type="submit">Send message</button>
                                </div>
                            </div>
                        </form>

                        <?php

                        if (isset($_POST['send'])) {
                            $user_name = mysqli_real_escape_string($con,$_POST['name']);
                            $user_email = mysqli_real_escape_string($con,$_POST['email']);
                            $user_subject = mysqli_real_escape_string($con,$_POST['subject']);
                            $user_msg = mysqli_real_escape_string($con,$_POST['message']);

                            $insert_product = "INSERT INTO contacts (name,email,subject,message)
                            values ('$user_name', '$user_email' ,'$user_subject','$user_msg')";
                        
                            $run_insert_product = mysqli_query($con, $insert_product);
                            if($run_insert_product){
                                // header("Location:contact.php");
                                // echo "<script>alert(' succesfully')</script>";
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                            // $receiver_mail = 'admin\messages.php';

                            // mail($receiver_mail, $user_name, $user_subject, $user_msg, $user_email);
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php
include('footer.php');
?>


</body>

</html>