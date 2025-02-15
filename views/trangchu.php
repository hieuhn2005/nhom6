<?php include './views/layout/header.php'; ?>

<!-- Header -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Slider -->

<main>
	<!-- hero slider area start -->
	<section class="slider-area">
		<div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
			<!-- single slider item start -->
			<div class="hero-single-slide hero-overlay">
				<div class="hero-slider-item bg-img" data-bg="assets/images/slider12.jpg"></div>
			</div>
			<!-- single slider item start -->

			<!-- single slider item start -->
			<div class="hero-single-slide hero-overlay">
				<div class="hero-slider-item bg-img" data-bg="assets/images/slider13.jpg">

				</div>
			</div>
			<!-- single slider item start -->


			<!-- single slider item start -->
			<div class="hero-single-slide hero-overlay">
				<div class="hero-slider-item bg-img" data-bg="assets/images/slider16.jpg">

				</div>
			</div>
			<!-- single slider item end -->
		</div>
	</section>
	<!-- hero slider area end -->

	<!-- service policy area start -->
	<div class="service-policy section-padding">
		<div class="container">
			<div class="row mtn-30">
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-plane"></i>
						</div>
						<div class="policy-content">
							<h6>Miễn phí vận chuyển</h6>
							<p>Miễn phí vận chuyển tất cả các đơn đặt hàng</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-help2"></i>
						</div>
						<div class="policy-content">
							<h6>Hỗ trợ 24/7</h6>
							<p>Hỗ trợ 24 giờ một ngày</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-back"></i>
						</div>
						<div class="policy-content">
							<h6>Hoàn tiền</h6>
							<p>30 ngày trả lại miễn phí</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-credit"></i>
						</div>
						<div class="policy-content">
							<h6>Thanh toán an toàn 100%</h6>
							<p>Chúng tôi đảm bảo thanh toán an toàn</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- service policy area end -->



	<!-- product area start -->
	<section class="product-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- section title start -->
					<div class="section-title text-center">
						<h2 class="title">Sản phẩm bán chạy</h2>
					</div>
					<!-- section title start -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="product-container">
						<!-- product tab content start -->
						<div class="tab-content">
							<div class="tab-pane fade show active" id="tab1">
								<div class="product-carousel-4 slick-row-10 slick-arrow-style">
									<?php foreach ($listsansham as $key => $sanPham): ?>
										<!-- product item start -->
										<div class="product-item">
											<figure class="product-thumb">
												<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
													<img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
													<img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
												</a>
												<div class="product-badge">
													<?php
													$ngayNhap = new DateTime($sanPham['ngay_nhap']);
													$ngayHienTai = new DateTime();
													$tinhNgay = $ngayHienTai->diff($ngayNhap);

													if ($tinhNgay->days <= 7) {
													?>
														<div class="product-label new">
															<span>Mới</span>
														</div>
													<?php
													}
													?>
													<?php
													if ($sanPham['gia_khuyen_mai']) { ?>
														<div class="product-label discount">
															<span>Giảm giá</span>
														</div>
													<?php
													}
													?>
												</div>
												<div class="cart-hover">
													<button class="btn btn-cart">Xem chi tiết</button>
												</div>
											</figure>
											<div class="product-caption text-center">

												<h6 class="product-name">
													<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id-san-pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
												</h6>
												<div class="price-box">
													<?php
													if ($sanPham['gia_khuyen_mai']) { ?>
														<span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai'])  . 'đ'; ?></span>
														<span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ'; ?></del></span>
													<?php
													} else { ?>
														<span class="price-regular"><?= formatPrice($sanPham['gia_san_pham'])  . 'đ'; ?></span>
													<?php } ?>
												</div>
											</div>
										</div>
										<!-- product item end -->

									<?php endforeach ?>
								</div>
							</div>

						</div>
						<!-- product tab content end -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product area end -->

	<!-- banner statistics area start -->
	<div class="banner-statistics-area">
		<div class="container">
			<div class="row row-20 mtn-20">
				<div class="col-sm-6">
					<figure class="banner-statistics mt-20">
						<a href="#">
							<img src="assets/images/baner5.jpg" alt="product banner">
						</a>
					</figure>
				</div>
				<div class="col-sm-6">
					<figure class="banner-statistics mt-20">
						<a href="#">
							<img src="assets/images/baner4.jpg" alt="product banner">
						</a>
					</figure>
				</div>
			</div>
		</div>
	</div>
	<!-- banner statistics area end -->
	<!-- banner statistics area end -->

	<!-- featured product area start -->
	<section class="feature-product section-padding">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- section title start -->
					<div class="section-title text-center">
						<h2 class="title">Sản Phẩm</h2>
					</div>
					<!-- section title start -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
						<!-- product item start -->
						<div class="product-item">
							<figure class="product-thumb">
								<a href="product-details.html">
									<img class="pri-img" src="assets/img/product/product-6.jpg" alt="product">
									<img class="sec-img" src="assets/img/product/product-13.jpg" alt="product">
								</a>
								<div class="product-badge">
									<div class="product-label new">
										<span>new</span>
									</div>
									<div class="product-label discount">
										<span>10%</span>
									</div>
								</div>
								<div class="button-group">
									<a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
									<a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
									<a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
								</div>
								<div class="cart-hover">
									<button class="btn btn-cart">add to cart</button>
								</div>
							</figure>
							<div class="product-caption text-center">
								<div class="product-identity">
									<p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
								</div>
								<ul class="color-categories">
									<li>
										<a class="c-lightblue" href="#" title="LightSteelblue"></a>
									</li>
									<li>
										<a class="c-darktan" href="#" title="Darktan"></a>
									</li>
									<li>
										<a class="c-grey" href="#" title="Grey"></a>
									</li>
									<li>
										<a class="c-brown" href="#" title="Brown"></a>
									</li>
								</ul>
								<h6 class="product-name">
									<a href="product-details.html">Perfect Diamond Jewelry</a>
								</h6>
								<div class="price-box">
									<span class="price-regular">$60.00</span>
									<span class="price-old"><del>$70.00</del></span>
								</div>
							</div>
						</div>
						<!-- product item end -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- featured product area end -->

	<!-- testimonial area start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title text-center">
					<h2 class="title">Website bán hàng công nghệ uy tín hàng đầu Việt Nam</h2>
				</div>

			</div>
		</div>
	</div>

	<!-- testimonial area end -->



</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
	<i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

</body>

</html>