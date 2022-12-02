<?php
session_start();
if(isset($_SESSION['user'])){
	include "headeruser.php";
}else{
	include "header.php";
}
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#slider {
    padding-bottom: 30px;
    border-bottom: 2px;
    overflow: hidden;
}
.aspect-ratio-169 {
    display: block;
    position: relative;
    padding-top: 56.25%;
    transition: 0.3s;
  }
  
  .aspect-ratio-169 img {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
  }
.dot-container {
    position: absolute;
    height: 30px;
    width: 100%;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: center;
}
.dot {
    height: 16px;
    width: 16px;
    background-color: #ccc;
    border-radius: 50%;
    margin-right: 12px;
}
.dot.active {
    background-color: #333;
}
</style>
</head>
<section id="slider">
    <div class="aspect-ratio-169">
        <img src="img/slide2.jpg">
        <img src="img/traicaytuoi.jpg">
    </div>
	
    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
    </div>
</section>

<script>
const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
const imgContainer = document.querySelector('.aspect-ratio-169')
const dotItem = document.querySelectorAll(".dot")
let imgNumber = imgPosition.length
let index = 0
// console.log(imgPosition)

imgPosition.forEach(function(image, index){
    image.style.left = index*100 + "%"
    dotItem[index].addEventListener("click", function(){
        slider(index)
    })
})
function imgSilde (){
    index++;
    if (index>=imgNumber) {index=0}
    slider(index)
    
}
function slider(index) {
    imgContainer.style.left = "-" +index*100+ "%"
    const dotActive = document.querySelector('.active')
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
}
setInterval(imgSilde, 5000)
</script>


</body>
</html> 


<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/banhkem.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Bánh ngọt</h3>
						<a href="./products.php?type_id=2" class="cta-btn">Mua Ngay <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/traicaytuoi.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Trái cây tươi</h3>
						<a href="./products.php?type_id=1" class="cta-btn">Mua Ngay <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./img/raucusach.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Rau củ sạch</h3>
						<a href="./products.php?type_id=3" class="cta-btn">Mua Ngay <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản phẩm tươi mới mỗi ngày</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Trái cây</a></li>
							<li><a data-toggle="tab" href="#tab2">Bánh ngọt</a></li>
							<li><a data-toggle="tab" href="#tab3">Rau củ</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<?php
								$type_id = 1;
								$get3NewProductsByID = $product->get3NewProductsByID($type_id); ?>
								<?php foreach ($get3NewProductsByID as $value) : ?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
											<div class="product-label">
												<span class="new">MỚI</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?><sub>đ</sub></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											
										</div>
										<a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
										</div></a>
									</div>
									<!-- /product -->
								<?php endforeach ?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->

						<!-- tab -->
						<div id="tab2" class="tab-pane ">
							<div class="products-slick">
								<?php
								$type_id = 2;
								$get3NewProductsByID = $product->get3NewProductsByID($type_id); ?>
								<?php foreach ($get3NewProductsByID as $value) : ?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
											<div class="product-label">
												<span class="new">MỚI</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?><sub>đ</sub></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											
										</div>
										<a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
										</div></a>
									</div>
									<!-- /product -->

								<?php endforeach ?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->

						<!-- tab -->
						<div id="tab3" class="tab-pane ">
							<div class="products-slick">
								<?php
								$type_id = 3;
								$get3NewProductsByID = $product->get3NewProductsByID($type_id); ?>
								<?php foreach ($get3NewProductsByID as $value) : ?>
									<!-- product -->
									<div class="product">
										<div class="product-img">
											<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
											<div class="product-label">
												<span class="new">MỚI</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"></p>
											<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
											<h4 class="product-price"><?php echo number_format($value['price']) ?><sub>đ</sub></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
										</div>
										<a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><div class="add-to-cart">
											<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
										</div></a>
									</div>
									<!-- /product -->

								<?php endforeach ?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->

						<!-- tab -->
				
						
						<!-- /tab -->
					</div>

				</div>

			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<h2 class="text-uppercase">ĐẶC BIỆT KHUYẾN MÃI CUỐI TUẦN</h2>
					<p>GIẢM NGAY 30% KHI MUA SẢN PHẨM</p>
					<a class="primary-btn cta-btn" href="./products.php?type_id=1">MUA LIỀN TAY</a>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<?php include "footer.php"; ?>