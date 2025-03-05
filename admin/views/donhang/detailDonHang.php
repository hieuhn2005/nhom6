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
        <div class="col-sm-10">
          <h1>Quản lý danh sách đơn hàng: <?= $DonHang['ma_don_hang'] ?></h1>
        </div>
        <div class="col-sm-2">
          <form action="" method="post">
            <select name="" id="" class="form-group">
              <option value="" disabled></option>
              <?php foreach ($listTrangThaiDonHang as $key => $TrangThai): ?>
                <option
                  <?= $TrangThai['id'] == $DonHang['trang_thai_id'] ? 'selected' : '' ?>
                  <?= $TrangThai['id'] < $DonHang['trang_thai_id'] ? 'disabled' : '' ?>
                  value="<?= $TrangThai['id'] ?>">
                  <?= $TrangThai['ten_trang_thai'] ?>
                </option>
              <?php endforeach ?>
            </select>
          </form>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php
          if ($DonHang['trang_thai_id'] == 1) {
            $colorAlerts = 'primary';
          } elseif ($DonHang['trang_thai_id'] >= 2 && $DonHang['trang_thai_id'] <= 9) {
            $colorAlerts = 'warning';
          } elseif ($DonHang['trang_thai_id'] == 10) {
            $colorAlerts = 'success';
          } else {
            $colorAlerts = 'danger';
          }
          ?>
          <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
            Đơn hàng: <?= $DonHang['ten_trang_thai'] ?>
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="nav-icon fas fa-mobile-alt"></i> Shop.
                  <small class="float-right">Ngày đặt: <?= formatDate($DonHang['ngay_dat']) ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Thông tin người đặt
                <address>
                  <strong><?= $DonHang['ho_ten'] ?></strong><br>
                  Email: <?= $DonHang['email'] ?><br>
                  Số Điện thoại: <?= $DonHang['so_dien_thoai'] ?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Thông tin người nhận
                <address>
                  <strong><?= $DonHang['ten_nguoi_nhan'] ?></strong><br>
                  Email: <?= $DonHang['email_nguoi_nhan'] ?><br>
                  Số Điện thoại: <?= $DonHang['sdt_nguoi_nhan'] ?><br>
                  Địa chỉ người nhận: <?= $DonHang['dia_chi_nguoi_nhan'] ?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Thông tin đơn hàng
                <address>
                  <strong>Mã đơn hàng:<?= $DonHang['ma_don_hang'] ?></strong><br>
                  Tổng tiền: <?= $DonHang['tong_tien'] ?><br>
                  Ghi chú: <?= $DonHang['ghi_chu'] ?><br>
                  Thanh toán: <?= $DonHang['ten_phuong_thuc'] ?><br>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tong_tien = 0; ?>
                    <?php foreach ($sanPhamDonHang as $key => $SanPham): ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $SanPham['ten_san_pham'] ?></td>
                        <td><?= $SanPham['don_gia'] ?></td>
                        <td><?= $SanPham['so_luong'] ?></td>
                        <td><?= $SanPham['thanh_tien'] ?></td>
                      </tr>
                      <?php $tong_tien += $SanPham['thanh_tien']; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Ngày đặt hàng: <?= $DonHang['ngay_dat'] ?></p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Thành tiền:</th>
                      <td>
                        <?= $tong_tien ?>
                      </td>
                    </tr>
                    <tr>
                      <th>Vận chuyển:</th>
                      <td>Miễn Phí vận chuyển</td>
                    </tr>
                    <tr>
                      <th>Tổng tiền:</th>
                      <td><?= $tong_tien ?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-12 col-sm-1">
              <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="btn btn-warning">Quay lại</a>
            </div>
            <!-- this row will not appear when printing -->
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->
</body>

</html>