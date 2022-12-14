<?php session_start() ?>
<?php if (isset($_SESSION['user'])) {
    include "headeruser.php";
} else {
    include "header.php";
} ?>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="row"><?php if (isset($_GET['id'])) :
                                                $getProductById = $product->getProductById($_GET['id']);
                                                foreach ($getProductById as $value) :
                                            ?>
                                    <div class="col-sm-6">
                                        <div class="product-images">
                                            <div class="product-main-img">
                                                <img src="img/<?php echo $value['pro_image'] ?>" alt="" width="70%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="product-inner">

                                            <h2 class="product-name"><?php echo $value['name'] ?></h2>
                                            <div class="product-inner-price">
                                                <ins><?php echo number_format($value['price']) ?><sub>??</sub></ins>
                                            </div>
                                          
                                            <form action="addcart1.php?id=<?php echo $_GET['id'] ?>&type_id=<?php echo $_GET['type_id'] ?>" class="cart" method="post">
                                                <div class="quantity">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                                </div>
                                                <!-- <button class="" type="submit">Add to cart</button> -->
                                                <button type="submit" name="submit">th??m v??o gi???</button>
                                            </form>

                                            <div role="tabpanel">
                                                <ul class="product-tab" role="tablist">
                                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">M?? t???</a></li>
                                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">????nh gi??</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                        <h2>M?? t??? s???n ph???m</h2>
                                                        <p><?php echo $value['description'] ?></p>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                                        <h2>????nh gi??</h2>
                                                        <div class="submit-review">
                                                            <p><label for="name">T??n</label> <input name="name" type="text"></p>
                                                            <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                            <div class="rating-chooser">
                                                                <p>????nh gi??</p>

                                                                <div class="rating-wrap-post">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <p><label for="review">B??nh lu???n</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                            <p><input type="submit" value="G???i"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                        <hr size="5px" align="center" color=#e6e9ee />
                        <div class="col-md-12">
                            <div class="row">
                                <div class="products-tabs">
                                    <!-- tab -->
                                    <div id="pap1" class="tab-pane active">
                                        <div class="products-slick" data-nav="#slick-nav-1">
                                            <?php
                                            if (isset($_GET['type_id'])) :
                                                $type_id = $_GET['type_id'];
                                                $get3NewProductsByID = $product->get3NewProductsByID($type_id); ?>
                                                <?php foreach ($get3NewProductsByID as $value) : ?>
                                                    <!-- product -->
                                                    <div class="product">
                                                        <div class="product-img">
                                                            <img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                            <div class="product-label">
                                                                <span class="new">M???I</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category"></p>
                                                            <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                                            <h4 class="product-price"><?php echo number_format($value['price']) ?><sub>??</sub></h4>
                                                            <div class="product-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="product-btns">
                                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                            </div>
                                                        </div>
                                                        <a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
                                                            <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> TH??M V??O GI???</button>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!-- /product -->
                                                <?php endforeach ?>
                                            <?php endif ?>


                                        </div>
                                        <div id="slick-nav-1" class="products-slick-nav"></div>
                                    </div>
                                    <!-- /tab -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>