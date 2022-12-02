<style type="text/css">
    /*   body {
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        color: #333;
    } */

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>
<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/user.php";
$product = new Product;
$protype = new Protype;
$user = new User;
$getAllProducts = $product->getAllProducts();
$getAllNewProducts = $product->getAllNewProducts();
$getTopSellingProducts = $product->getTopSellingProducts();

if (isset($_GET['status'])) {
    if ($_GET['status'] == 's') {
        echo "<script> alert('Cập nhật thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "location:"profile.php");</script>';
    }
   
    if ($_GET['status'] == 'f') {
        echo "<script> alert('Cập nhật không thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "location:"profile.php");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>FoodMIN - Website bán đồ ăn, trái cây, rau củ online</title>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />


</head>


<!-- HEADER -->
<header>

 <!-- TOP HEADER -->
 <div id="top-header">
        <div class="container-left">
            <!-- LOGO -->
            <a href="index.php" class="logo">
                <img src="./img/logomin.png" alt="">
            </a>
        </div>
        <div class="container">
            <ul class="header-links pull-left">
                <?php
                $getAllProtype = $protype->getAllProtype();
                if (isset($_GET['type_id'])) : ?>
                <li><a href="index.php">Home</a></li>
                <?php
                    $type_id = $_GET['type_id'];
                    foreach ($getAllProtype as $value) :
                    ?>
                <li <?php if($type_id==$value['type_id']) echo 'class="active"' ?>><a
                        href="products.php?type_id=<?php echo $value['type_id'] ?>">
                        <?php echo $value['type_name'] ?></a></li>
                <?php endforeach; ?>
                <?php else : ?>
                <li class="active"><a href="index.php">Home</a></li>
                <?php
                    $getAllProtype = $protype->getAllProtype();

                    foreach ($getAllProtype as $value) :
                    ?>
                <li><a href="products.php?type_id=<?php echo $value['type_id'] ?>">
                        <?php echo $value['type_name'] ?></a></li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="col-md-6">
                <div class="header-search">
                    <form method="get" action="result.php">
                        <input name="keyword" class="input" placeholder="Tìm kiếm">
                        <button type="submit" class="search-btn">Tìm</button>
                    </form>
                </div>
            </div>
            <ul class="header-links pull-right">
                <!--  <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
                <?php $getLastname = $user->getLastname($_SESSION['user']); ?>
                <li><a href="profile.php"><i class="<?php if ($_SESSION['permision'] == 1) {
                                                        echo "fa fa-user-secret";
                                                    } else {
                                                        echo "fa fa-user";
                                                    } ?>"></i> Xin chào <?php foreach ($getLastname as $value) {
                                                                                echo $value['Last_name'];
                                                                            } ?></a></li>

                <li><a href="admin/logoutuser.php"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>

            </ul>
        </div>
        <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Giỏ hàng</span>
                                    <?php
                                    $temp = 0;
                                   if(isset($_SESSION['cart'])){
                                    foreach ($_SESSION['cart'] as $value) {
                                        $temp+=1;
                                    }
                                   }
                                    ?>
                                    <div class="qty"><?php echo $temp; ?></div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list"><?php $totalPrice = 0;
                                                            $totalProduct = 0; ?>
                                        <?php if (isset($_SESSION['cart'])) :

                                            foreach ($_SESSION['cart'] as $key => $qty) :
                                                $getAllProducts =  $product->getAllProducts();
                                                foreach ($getAllProducts as $value) :
                                                    if ($value['id'] == $key) : ?>
                                                        <?php $totalPrice += $value['price'] * $qty;
                                                        $totalProduct += 1;
                                                        ?>
                                                        <div class="product-widget">
                                                            <div class="product-img">
                                                                <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            </div>
                                                            <div class="product-body">
                                                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                                                <h4 class="product-price"><span class="qty"><?php echo $qty ?>x</span><?php echo number_format($value['price']) ?><sub>đ</sub></h4>
                                                            </div>
                                                            <a href="delcart1.php?id=<?php echo $value['id'] ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
                                                        </div>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="cart-summary">
                                        <small><?php echo $totalProduct ?> Sản phẩm</small>
                                        <h5>SUBTOTAL: <?php echo number_format($totalPrice) ?></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="cart.php?type_id=1">Xem giỏ hàng</a>
                                        <a href="orders.php">Xem đơn hàng <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>


                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
            </div>
    </div>
        <!-- /TOP HEADER -->


</header>
<body>
    <div class="container">
        <div class="main-body">
            <form action="">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']); ?>
                                    <img src="./img/<?php foreach ($getInfoByUsername as $value) {
                                                        echo $value['image'];
                                                    } ?>" class="rounded-circle" width="150">
                                    <div class="mt-3">

                                        <h4><?php foreach ($getInfoByUsername as $value) {
                                                echo $value['First_name'] . $value['Last_name'];
                                            } ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($getInfoByUsername as $value) {
                                            echo $value['First_name'];
                                        } ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($getInfoByUsername as $value) {
                                            echo $value['Last_name'];
                                        } ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên tài khoản</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['user'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Điện thoại</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($getInfoByUsername as $value) {
                                            echo $value['phone'];
                                        } ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Quyền</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($getInfoByUsername as $value) {
                                            echo $value['role_name'];
                                        } ?>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <a style="background-color: #D10024;"  class="btn btn-info " href="editprofile.php?user_id=<?php echo $value['user_id']; ?>">Sửa</a>
                                        <a style="background-color: #D10024; padding: 7px; " class="btn btn-info " href="./admin">Admin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">

        
    </script>
    <?php include "footer.php" ?>