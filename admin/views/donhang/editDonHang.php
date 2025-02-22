<?php
include './views/layout/header.php';
?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-11">
                    <h1>Quản lý thôn tin đơn hàng </h1>
                </div>
                <div class="col-12 col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin đơn hàng: <?= $DonHang['ma_don_hang'] ?></h3>
                        </div>


                        <form action="<?php echo BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">

                            <input type="text" name="don_hang_id" value="<?php echo isset($DonHang['id']) ? $DonHang['id'] : ''; ?>" hidden>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?php echo isset($DonHang['ten_nguoi_nhan']) ? $DonHang['ten_nguoi_nhan'] : ''; ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?php echo $errors['ten_nguoi_nhan']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?php echo isset($DonHang['sdt_nguoi_nhan']) ? $DonHang['sdt_nguoi_nhan'] : ''; ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?php echo $errors['sdt_nguoi_nhan']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Email người nhận</label>
                                    <input type="text" class="form-control" name="email_nguoi_nhan" value="<?php echo isset($DonHang['email_nguoi_nhan']) ? $DonHang['email_nguoi_nhan'] : ''; ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?php echo $errors['email_nguoi_nhan']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?php echo isset($DonHang['dia_chi_nguoi_nhan']) ? $DonHang['dia_chi_nguoi_nhan'] : ''; ?>" placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                                        <p class="text-danger"><?php echo $errors['dia_chi_nguoi_nhan']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="ghi_chu" id="" class="form-control" placeholder="Nhập mô tả"><?php echo isset($DonHang['ghi_chu']) ? $DonHang['ghi_chu'] : ''; ?></textarea>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái đơn hàng</label>
                                    <select id="inputStatus" name="trang_thai_id" class="form-control custom-select">
                                        <?php foreach ($listTrangThaiDonHang as $TrangThai) : ?>
                                            <option
                                                <?php
                                                if (
                                                    $DonHang['trang_thai_id'] > $TrangThai['id']
                                                    || $DonHang['trang_thai_id'] == 9
                                                    || $DonHang['trang_thai_id'] == 10
                                                    || $DonHang['trang_thai_id'] == 11
                                                ) {
                                                    echo 'disabled';
                                                }
                                                ?>
                                                <?= $TrangThai['id'] == $DonHang['trang_thai_id'] ? 'selected' : '' ?>
                                                value="<?= $TrangThai['id']; ?>">
                                                <?= $TrangThai['ten_trang_thai']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

</body>

</html>