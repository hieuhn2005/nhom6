<?php include './views/layout/header.php'; ?>

<!-- Header -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Slider -->

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Tên sản phẩm</th>
                                        <th class="pro-price">Giá tiền</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($chiTietGioHang)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Giỏ hàng trống</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php
                                        $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $key => $SanPham): ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $SanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                                <td class="pro-title"><a href="#"><?= $SanPham['ten_san_pham'] ?></a></td>
                                                <td class="pro-price"><span>
                                                        <?php if ($SanPham['gia_khuyen_mai']) { ?>
                                                            <?= formatPrice($SanPham['gia_khuyen_mai']) . 'đ' ?>
                                                        <?php } else { ?>
                                                            <?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?>
                                                        <?php } ?>

                                                    </span></td>
                                                <td class="pro-quantity">
                                                    <div> <?= formatPrice($SanPham['so_luong']) ?></div>
                                                </td>
                                                <td class="pro-subtotal"><span>
                                                        <?php
                                                        $tongTien = 0;
                                                        if ($SanPham['gia_khuyen_mai']) {
                                                            $tongTien = $SanPham['gia_khuyen_mai'] * $SanPham['so_luong'];
                                                        } else {
                                                            $tongTien = $SanPham['gia_san_pham'] * $SanPham['so_luong'];
                                                        }
                                                        $tongGioHang += $tongTien;
                                                        echo formatPrice($tongTien) . 'đ';
                                                        ?>
                                                    </span>
                                                </td>
                                                <td class="pro-remove">
                                                    <a href="<?= BASE_URL . '?act=xoa-gio-hang&id_chi_tiet_gio_hang=' . $SanPham['id'] . '&san_pham_id=' . $SanPham['san_pham_id'] ?>"
                                                        onclick="return confirm('Bạn có đồng ý xóa hay không???')">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Tổng đơn hàng</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php if (!empty($tongGioHang) && $tongGioHang > 0): ?>
                                            <tr>
                                                <td>Tổng tiền sản phẩm</td>
                                                <td><?= formatPrice($tongGioHang) . 'đ' ?></td>
                                            </tr>
                                            <tr>
                                                <td>Vận chuyển</td>
                                                <td>Miễn Phí vận chuyển</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng thanh toán</td>
                                                <td class="total-amount"><?= formatPrice($tongGioHang) . 'đ' ?></td>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="2" class="text-center">Giỏ hàng của bạn đang trống</td>
                                            </tr>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                            <?php if (!empty($tongGioHang) && $tongGioHang > 0): ?>
                                <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>
                            <?php else: ?>
                                <a href="<?= BASE_URL ?>" class="btn btn-sqr d-block">Tiếp tục mua sắm</a>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    </div>
    <!-- cart main wrapper end -->
</main>

<?php require_once './views/layout/miniCart.php'; ?>

<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>