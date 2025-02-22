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
                    <div class="hero-slider-item bg-img" data-bg="assets/images/slider1.png">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title">Bộ sưu tập<span>tết</span></h2>
                                        <a href="shop.html" class="btn btn-hero">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->

                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/images/slider.png">
                        
                    </div>
                </div>
                <!-- single slider item start -->

                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/images/slider_1.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-3">
                                        <h2 class="slide-title">Giảm giá lên đến <span>30% cho sản phẩm mới</span></h2>
                                        <h4 class="slide-desc">Bộ sưu tập Xuân/Hè 2025</h4>
                                        <a href="shop.html" class="btn btn-hero">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item end -->
            </div>
        </section>

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
						<h2 class="title">Sản phẩm Đang giảm giá</h2>
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
													<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
														<button class="btn btn-cart">Xem chi tiết</button>
													</a>
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
							<img src="assets/images/baner7.jpg" alt="product banner">
						</a>
					</figure>
				</div>
				<div class="col-sm-6">
					<figure class="banner-statistics mt-20">
						<a href="#">
							<img src="assets/images/baner6.jpg" alt="product banner">
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
												<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
													<button class="btn btn-cart">Xem chi tiết</button>
												</a>
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
												<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
													<button class="btn btn-cart">Xem chi tiết</button>
												</a>
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
	</section>
	<!-- featured product area end -->

	<!-- testimonial area start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title text-center">
					<h2 class="title">MOCO luôn đặt uy tín lên là hàng đầu</h2>
				</div>

			</div>
		</div>
	</div>

	<!-- testimonial area end -->



</main>
<?php require_once 'layout/miniCart.php'; ?>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
	<i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

</body>

</html>