<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> Hana 4All- Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../img/logo.svg">

        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/theme.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <div class="header-border"></div>
            <header id="page-topbar">
                <div class="navbar-header">
                
                <h1>WELCOME TO ADMIN -<?php echo $_SESSION['AdminLoginId']?></h1>
                <form action="" method="POST">
                    <button name="Logout" class="btn btn-danger float-right">LOG OUT</button>
                </form>
                

                <?php
                if(isset($_POST['Logout'])){
                    session_destroy();
                    header("location:../login.php");
                }
                ?>
                    <div class="d-flex align-items-left">
                        
                        <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <div class="navbar-brand-box">
                        <a href="../index.php" class="logo">
                            <i class="mdi mdi-album"></i>
                            <span>
                               Hana 4All
                            </span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="#" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span
                                        class="badge badge-pill badge-primary float-right">7</span><span>Dashboard</span></a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                        class="mdi mdi-table-merge-cells"></i><span>Products</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="index.php">View Products</a></li>
                                    <li><a href="insert.php">Add Products</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                        class="mdi mdi-poll"></i><span>Contact</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </li>

                          

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                        class="mdi mdi-black-mesa"></i><span>Orders</span></a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="order.php">Orders </a></li>
                                    
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                       

                   