<?php
session_start();

session_destroy();

echo "<script>window.open('login.php','_self')</script>";

include('config.php');

?>
 <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    // disable right click
</script> -->

    