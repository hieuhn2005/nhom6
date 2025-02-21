<!-- <header -->
<?php include './views/layout/header.php'; ?>
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
                <div class="col-sm-6">
                    <h1>Quản lý banner</h1>
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
                            <h3 class="card-title">Thêm banner</h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=add_banner' ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên banner</label>
                                    <input type="text" class="form-control" name="ten_banner" placeholder="Nhập tên banner">
                                    <?php if (isset($errors['ten_banner'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_banner'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Chọn Hình Ảnh:</label>
                                    <input type="file" class="form-control-file" id="anh" name="anh" required accept="image/*">
                                </div>

                            </div>
                            <!-- làm nút submit với nút quay lại ngang hàng -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">thêm</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=view_banner' ?>" class="btn btn-warning">Quay lại</a>
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


