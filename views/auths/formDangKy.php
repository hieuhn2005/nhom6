<?php require_once 'views/layout/header.php'; ?>

<!-- Start Header Area -->

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=/' ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container" style="max-width: 40vw">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap sign-up-form">
                            <h5 class="text-center">đăng ký tài khoản</h5>
                            <form action="<?= BASE_URL . '?act=them-dang-ky' ?>" method="POST">
                                <div class="single-input-item">
                                    <p>Họ và tên</p>
                                    <input type="text" placeholder="Nhập họ và tên" name="ho_ten"  />
                                    <?php if (isset($_SESSION['ho_ten'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['ho_ten'] ?></span>
                                    <?php } ?>
                                </div>

                                <div class="single-input-item">
                                    <p>Email</p>
                                    <input type="email" placeholder="Nhập email" name="email"  />
                                    <?php if (isset($_SESSION['email'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['email'] ?></span>
                                    <?php } ?>
                                </div><br>
                                <!-- số điện thoại -->
                                <div class="single-input-item">
                                    <p>Số điện thoại</p>
                                    <input type="text" placeholder="Nhập số diện thoại" name="so_dien_thoai"  />
                                    <?php if (isset($_SESSION['so_dien_thoai'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['so_dien_thoai'] ?></span>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <p>Mật khẩu</p>
                                        <div class="single-input-item">
                                            <input type="password" placeholder="Nhập mật khẩu" name="pass"  />
                                            <?php if (isset($_SESSION['pass'])) { ?>
                                                <span class="text-danger"><?= $_SESSION['pass'] ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <p>Nhập lại mật khẩu</p>
                                        <div class="single-input-item">
                                            <input type="password" placeholder="Nhâp lại mật khẩu" name="password"  />
                                            <?php if (isset($_SESSION['password'])) { ?>
                                                <span class="text-danger"><?= $_SESSION['password'] ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-input-item text-center">
                                    <button class="btn btn-sqr ">ĐĂNG KÝ</button>
                                </div>
                                <div class="single-input-item">
                                    <p class="text-center">--- Hoặc ---</p>
                                    <p class="text-center"><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                    <!-- Login Content End -->

                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</main>


<!-- offcanvas mini cart start -->
<?php require_once 'views/layout/miniCart.php'; ?>

<!-- offcanvas mini cart end -->

<?php require_once 'views/layout/footer.php'; ?>