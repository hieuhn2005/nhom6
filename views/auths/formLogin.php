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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=/'?>"><i class="fa fa-home"></i></a></li>
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
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">ĐĂNG NHẬP</h5>
                            <br>
                            <p class="login-box-msg text-center">Đăng nhập tài khoản của bạn</p>
                            
                            <form action="<?= BASE_URL . '?act=check-login'  ?>" method="post">
                                <div class="single-input-item">
                                    <input type="email" placeholder="Vui lòng nhập email" name="email" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" placeholder="Vui lòng nhập mật khẩu" name="password" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">

                                        <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                    </div>
                                </div>
                                <div class="single-input-item text-center">
                                    <button class="btn btn-sqr ">Dăng Nhập</button>
                                </div>
                                <div class="single-input-item">
                                    <p class="text-center">---Hoặc ---</p>
                                    <p class="text-center"><a href="<?= BASE_URL . '?act=dang-ky' ?>">Đăng ký</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
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