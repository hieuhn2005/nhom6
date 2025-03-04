

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
                <div class="col-sm-6">
                    <h1>Quản lý danh mục sản phẩm</h1>
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
                            <h3 class="card-title">Sửa danh muc sản phẩm</h3>
                        </div>


                        <form action="<?php echo BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="POST">

                            <input type="text" name="id" value="<?php echo isset($danhMuc['id']) ? $danhMuc['id'] : ''; ?>" hidden>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control" name="ten_danh_muc" value="<?php echo isset($danhMuc['ten_danh_muc']) ? $danhMuc['ten_danh_muc'] : ''; ?>" placeholder="Nhập tên danh mục">
                                    <?php if(isset($errors['ten_danh_muc'])){ ?>
                                        <p class="text-danger"><?php echo $errors['ten_danh_muc']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"><?php echo isset($danhMuc['mo_ta']) ? $danhMuc['mo_ta'] : ''; ?></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="btn btn-warning">Quay lại</a>
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
