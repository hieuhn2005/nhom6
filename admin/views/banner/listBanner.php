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
          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form_add_banner' ?>">
                <button class="btn btn-success">Thêm banner</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên banner</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($banners as $key => $banner) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $banner['ten_banner'] ?></td>
                      <td><img src="<?= BASE_URL . $banner['anh'] ?>" width="200"></td>
                      <td>
                        
                        <a href="<?= BASE_URL_ADMIN . '?act=delete_banner&id_banner=' . $banner['id'] ?>" 
                          onclick="return confirm('Bạn có đồng ý xóa hay không???')">
                          <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên banner</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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