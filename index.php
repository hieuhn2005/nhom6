<?php

session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';


// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {

    '/' => (new HomeController())->home(),


    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'xoa-gio-hang' => (new HomeController())->deleteGioHang(),
    'thanh-toan'=> (new HomeController())->thanhtoan(),
    'san-pham'=> (new HomeController())->sanpham(),

    // Auth
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    'logout' => (new HomeController())->logout(),
};
