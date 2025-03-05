<?php include './views/layout/header.php'; ?>

<!-- Header -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Slider -->

<main>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông Tin Người Dùng</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .user-avatar {
                width: 150px;
                height: 150px;
                border-radius: 50%;
            }

            .header-title {
                background-color: rgb(203, 72, 72);
                color: white;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="container mt-5">

            <div class="row">

                <div class="col-md-4 text-center">
                    <img src="data:image/jpeg;base64,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" alt="Avatar" class="user-avatar">
                    <button class="btn btn-primary btn-block">Quên mật khẩu</button>
                    <button class="btn btn-secondary btn-block">
                        <a href="<?= BASE_URL . '?act=gio-hang' ?>" style="color: white; text-decoration: none;">Giỏ hàng</a>
                    </button>
                    <button class="btn btn-danger btn-block">

                        <a href="<?= BASE_URL . '?act=logout' ?>" onclick="return confirm('Đăng xuất tài khoản')" style="color: white; text-decoration: none;">Đăng Xuất</a>


                    </button>
                </div>
                <div class="col-md-8">
                    <h3 class="header-title">THÔNG TIN NGƯỜI DÙNG</h3>
                    <table class="table table-bordered">
                        <tbody>
                            <?php if (isset($User) && is_array($User)): ?>
                                <tr>
                                    <th>Họ tên</th>
                                    <td><?= htmlspecialchars($User['ho_ten']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= htmlspecialchars($User['email']); ?></td>
                                </tr>
                                <tr>
                                    <th>SĐT</th>
                                    <td><?= htmlspecialchars($User['so_dien_thoai']); ?></td>
                                </tr>
                                <?php if (!empty($User['dia_chi'])): ?>
                                    <tr>
                                        <th>Địa Chỉ</th>
                                        <td><?= htmlspecialchars($User['dia_chi']); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php if (!empty($User['ngay_sinh'])): ?>
                                    <tr>
                                        <th>Ngày Sinh</th>
                                        <td><?= htmlspecialchars($User['ngay_sinh']); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2">Không tìm thấy thông tin người dùng.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
        <div></div><br><br><br><br><br><br><br><br><br><br><br><br><br>
</main>

<?php require_once './views/layout/miniCart.php'; ?>

<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>