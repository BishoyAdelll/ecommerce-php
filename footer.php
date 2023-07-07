<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row" style="padding-bottom: 40px;">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="index.php"> <span>Hana4All</span>
                        </a>
                    </div>
                    <ul>
                        <li>+92 3213352126</li>
                        <li>hana4all@gmail.com</li>
                        <li>dubai</li>
                        
                            
                    </ul>
<!--                    <script>-->
<!--    document.addEventListener('contextmenu', event => event.preventDefault());-->
<!--    // disable right click-->
<!--</script>-->

                    <div class="footer-social">
                    <a href="https://www.facebook.com/" target="_blank"><i class="ti-facebook"></i></a>
                        <a href="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-whatsapp-square2-512.png" target="_blank"><i class="fa fa-whatsapp" style="font-size:20px"></i></a>
                        <a href="https://www.instagram.com/?hl=en" target="_blank"><i class="ti-instagram"></i></a>
                        <a href="https://www.snapchat.com/add/your-username" target="_blank"><i class="fa fa-snapchat"></i></a>
          <a href="https://www.tiktok.com/@your-tiktok-handle"><img src="img/tik-tok.png" alt="TikTok" width="18" height="18"></a>
          </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="index.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="index.php">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget" style="display: <?php if ($active == 'Register' || $active == 'Login') {
                                                                echo 'none';
                                                            };  ?>;">
                    <h5>Account</h5>
                    <ul>

                        <?php 
                        // session_start();
                        if (!($_SESSION['customer_email'] == 'unset')) {
                            echo "<li><a href='account.php?orders.php'>My Account</a></li>";
                        } ?>
                        <li><a href="
                        <?php if (!($_SESSION['customer_email'] == 'unset')) {
                            echo "shopping-cart.php";
                        } else {
                            echo "login.php";
                        }
                         ?>">Shopping Cart</a></li>

                        <li><a href="
                        <?php if (!($_SESSION['customer_email'] == 'unset')) {
                            echo "check-out.php";
                        } else {
                            echo "login.php";
                        }
                         ?>
                        ">Check Out</a></li>

                    </ul>
                </div>
            </div>
           
    </div>
</footer>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js" integrity="sha512-eUQ9hGdLjBjY3F41CScH3UX+4JDSI9zXeroz7hJ+RteoCaY+GP/LDoM8AO+Pt+DRFw3nXqsjh9Zsts8hnYv8/A==" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" integrity="sha512-8vfyGnaOX2EeMypNMptU+MwwK206Jk1I/tMQV4NkhOz+W8glENoMhGyU6n/6VgQUhQcJH8NqQgHhMtZjJJBv3A==" crossorigin="anonymous"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="bootstrap/css/bootstrap.css.map"></script>
