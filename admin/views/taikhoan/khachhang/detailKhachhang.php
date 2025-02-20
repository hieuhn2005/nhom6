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
                    <h1>Quản lý tài khoản khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img src="<?= BASE_URL .  $KhachHang['anh_dai_dien'] ?>" style="width: 70%" alt="" onerror="this.onerror=null; this.src='https://cdn1.iconfinder.com/data/icons/marketing-19/100/Profile-512.png'">
                </div>
                <div class="col-5">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody style="font-size: large;">
                                <tr>
                                    <th>Họ tên: </th>
                                    <td><?= $KhachHang['ho_ten'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày sinh: </th>
                                    <td><?= $KhachHang['ngay_sinh'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td><?= $KhachHang['email'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại: </th>
                                    <td><?= $KhachHang['so_dien_thoai'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Giới tính: </th>
                                    <td><?= $KhachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ: </th>
                                    <td><?= $KhachHang['dia_chi'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái: </th>
                                    <td><?= $KhachHang['trang_thai'] == 1 ? 'hoạt động' : 'không hoạt động'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- QUAY LẠI -->
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="btn btn-warning">Quay lại</a>
                </div>

                <div class="col-12">
                    <hr>
                    <h2>Lịch sử mua hàng</h2>
                    <div>
                        <table id="example1" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listDonHang as $key => $DonHang) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $DonHang['ma_don_hang'] ?></td>
                                        <td><?= $DonHang['ten_nguoi_nhan'] ?></td>
                                        <td><?= $DonHang['sdt_nguoi_nhan'] ?></td>
                                        <td><?= $DonHang['ngay_dat'] ?></td>
                                        <td><?= $DonHang['tong_tien'] ?></td>
                                        <td><?= $DonHang['ten_trang_thai'] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= BASE_URL_ADMIN . '?act=chi_tiet-don-hang&id_don_hang=' . $DonHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $DonHang['id'] ?>">
                                                    <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                    <h2>Lịch sử bình luận </h2>
                    <div>
                        <table id="example2" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBinhLuan as $key => $BinhLuan) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi_tiet-san-pham&id_san_pham=' . $BinhLuan['san_pham_id']; ?>">
                                                <?= $BinhLuan['ten_san_pham'] ?>
                                            </a>
                                        </td>
                                        <td><?= $BinhLuan['noi_dung'] ?></td>
                                        <td><?= $BinhLuan['ngay_dang'] ?></td>
                                        <td><?= $BinhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                        <td>

                                            <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                                                <input type="hidden" name="id_binh_luan" value="<?= $BinhLuan['id'] ?>">
                                                <input type="hidden" name="name_views" value="detail_khach">
                                                <button onclick="return confirm('Bạn có muốn ẩn bình luận này hay không ?')" class="btn btn-success">
                                                    <?= $BinhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn'  ?>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>

</html>