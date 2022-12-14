<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/user.php";
require "models/order.php";
$product = new Product;
$protype = new Protype;
$user = new User;
$order = new Order;
$getAllProducts = $product->getAllProducts();
$getAllNewProducts = $product->getAllNewProducts();
$getTopSellingProducts = $product->getTopSellingProducts();
?>
<?php
   include "topheader.php";
?>
<body>
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
            
                            <input name="keyword" class="input" placeholder="T??m ki???m">
                            <button type="submit" class="search-btn">T??m</button>
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
                                                        } ?>"></i> Xin ch??o <?php foreach ($getLastname as $value) {
                                                                                echo $value['Last_name'];
                                                                            } ?></a></li>

                    <li><a href="admin/logoutuser.php"><i class="fa fa-sign-out"></i> ????ng xu???t</a></li>

                </ul>
                <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Gi??? h??ng</span>
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
                                                                <h4 class="product-price"><span class="qty"><?php echo $qty ?>x</span><?php echo number_format($value['price']) ?><sub>??</sub></h4>
                                                            </div>
                                                            <a href="delcart1.php?id=<?php echo $value['id'] ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
                                                        </div>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="cart-summary">
                                        <small><?php echo $totalProduct ?> S???n ph???m</small>
                                        <h5>SUBTOTAL: <?php echo number_format($totalPrice) ?></h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="cart.php?type_id=1">Xem gi??? h??ng</a>
                                        <a href="orders.php">Xem ????n h??ng <i class="fa fa-arrow-circle-right"></i></a>
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
    <!-- /HEADER -->