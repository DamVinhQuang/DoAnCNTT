<?php
session_start();
if (isset($_SESSION['user'])) {
    if (isset($_SESSION['permision'])) {
        $permission = $_SESSION['permision'];
        if ($permission != 1) {
            header('location:../login/index.php');
        }
    }
} else {
    header('location:../login/index.php');
}

?>
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/sale.php";
require "models/user.php";
require "models/role.php";
require "models/order.php";
$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
$user = new User;
$role = new Role;
$order = new Order;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodMIN - Website bán đồ ăn, trái cây, rau củ online</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" >


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info">
                        <!-- <a href="#" class="d-block">Đàm Vinh Quang</a> -->
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/index.php') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="products.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/products.php' || $_SERVER['PHP_SELF'] == '../admin/addProduct.php') {
                                                                        echo 'active';
                                                                    } ?>">
                                <i class=""></i>
                                <p>
                                    Products
                                
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manufactures.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/manufactures.php' || $_SERVER['PHP_SELF'] == '../admin/addManufacture.php') {
                                                                            echo 'active';
                                                                        } ?>">
                                <i class=""></i>
                                <p>
                                    Manufactures
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="protypes.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/protypes.php' || $_SERVER['PHP_SELF'] == '../admin/addProtype.php') {
                                                                        echo 'active';
                                                                    } ?>">
                                <i class=""></i>
                                <p>
                                    Protypes
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sales.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/sales.php' || $_SERVER['PHP_SELF'] == '../admin/addSale.php') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class=""></i>
                                <p>
                                    Sales
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="users.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/users.php' || $_SERVER['PHP_SELF'] == '../admin/addUser.php') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class=""></i>
                                <p>
                                    User
                                    
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="roles.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/roles.php' || $_SERVER['PHP_SELF'] == '../admin/addRole.php') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class=""></i>
                                <p>
                                    Roles
                                   
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="orders.php" class="nav-link <?php if ($_SERVER['PHP_SELF'] == '../admin/orders.php' || $_SERVER['PHP_SELF'] == '../admin/addOrder.php') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class=""></i>
                                <p>
                                    Orders
                                    
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class=""></i>
                                <p>
                                    Log Out
                                    <span class="ion-log-out"></span></span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>