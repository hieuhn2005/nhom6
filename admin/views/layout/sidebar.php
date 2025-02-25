<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="brand-link">
    <img src="./assets/img/logo1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="text-bold text-white text-center">
        <?php if (isset($_SESSION['user_admin'])) {
          echo $_SESSION['user_admin'];
        } ?>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Trang chủ
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Danh mục sản phẩm
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
            <i class="nav-icon fas fa-mobile-alt"></i>
            <p>
              Sản phẩm
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
            <i class=" nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              Đơn Hàng
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Quản lý tài khoản</p>
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>Tài khoản quản trị</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>Tài khoản khách hàng</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=view_banner ' ?>" class="nav-link">
            <i class=" nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              Banner
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>