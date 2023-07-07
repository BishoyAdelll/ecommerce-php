<?php

$active = "Register";
include("db.php");
include("functions.php");
include('header.php');
?>
 <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // disable right click
</script> 

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="Index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <form action=" " method="post" id="logform">
                        <div class="row">
                            <div class="group-input col-md-6">
                                <label for="username">Name *</label>
                                <input type="text" id="username" name="name" required>
                                <div id="nameerr" style="margin:20px 0"></div>

                            </div>
                            <div class="group-input col-md-6">
                                <label for="con">Contact </label>
                                <input type="text" id="con" name="contact" >
                                <div id="conerr" style="margin:20px 0"></div>
                            </div>
                        </div>
                        <div class="group-input">
                            <label for="email">Email *</label>
                            <input type="email" id="eemail" name="cemail" required>
                            <div id="eerr" style="margin:20px 0"></div>
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" id="pass" name="password" required>
                        </div>
                        <!--<div class="group-input">-->
                        <!--    <label for="con-pass">Address *</label>-->
                        <!--    <input type="text" id="con-pass" name="address" required>-->
                        <!--</div>-->
                        <!--<div class="group-input">-->
                        <!--    <label for="con-pass">Profile Image *</label>-->
                        <!--    <input type="file" name="pimage" style="border: none; margin-top:6px;" required>-->
                        <!--</div>-->
                        
                        <button type="submit" class="site-btn register-btn" name="register">REGISTER</button>
                    </form>
                    <div class="switch-login">
                        <a href="login.php" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php
include('footer.php');
?>

<script>
    $("#logform").submit(function(event) {
        var name = $('#username').val();
        var email = $('#eemail').val();
        var con = $('#con').val();



        var letters =/^[A-Za-z \S]+$/;
        var em =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var numbers = /^[0-9]{10}$/;




        if (!name.match(letters)) {
            $("#nameerr").html(
                "<span class='alert alert-danger'>" +
                "Enter Valid Name (Letters only)</span>");

            event.preventDefault();

        }

        // if (!con.match(numbers)) {
        //     $("#conerr").html(
        //         "<span class='alert alert-danger'>" +
        //         "Enter Valid Contact (10 Digit)</span>");

        //     event.preventDefault();
        // }

        if (!email.match(em)) {
            $("#eerr").html(
                "<span class='alert alert-danger'>" +
                "Please enter your email without any space</span>");
            event.preventDefault();
        }


    });
</script>

</body>

</html>

<?php

if (isset($_POST['register'])) {

    $c_name = $_POST['name'];
    $c_email = $_POST['cemail'];
    $c_pass = $_POST['password'];
    // $c_contact = $_POST['contact'];
    
   
    // $c_ip = getRealIpUser();
//   echo $c_name,$c_contact,$c_email,$c_pass, 

      $insert_customer = "INSERT INTO `customer`( `customer_name`, `customer_email`, `customer_pass`)  VALUES ('$c_name','$c_email','$c_pass')";
     

    $run_insert = mysqli_query($con, $insert_customer);


    $sel_cart = "SELECT * FROM cart where c_id = '$c_id'";

    $run_sel_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_sel_cart);


    if ($check_cart > 0) {

        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('Account registered. You are Logged In')</script>";
        echo "<script>window.open('check-out.php','_self')</script>";
    } else {

        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('Account registered. You are Logged In')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>