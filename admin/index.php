<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ



// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminTaiKhoanController.php';
// banner
require_once './controllers/AdminBannerController.php';



// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
// require_once './models/AdminBaoCaoThongKe.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminBanner.php';



// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {

    '/' => (new AdminBaoCaoThongKeController())->home(),
    // danh muc
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhmuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhmuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhmuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhmuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),


    // san pham
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),

    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),

    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),

    'chi_tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),

    //route bình luận
    'update-trang-thai-binh-luan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),


    // route quản lý Đơn hàng
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),

    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),

    'chi_tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

    // route quản lý tài khoản
            //Quản lý tài khoản quản trị
            'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->danhSachQuanTri(),
            'form-them-quan-tri' =>(new AdminTaiKhoanController())->formAddQuanTri(),
            'them-quan-tri' =>(new AdminTaiKhoanController())->postAddQuanTri(),
            'form-sua-quan-tri' =>(new AdminTaiKhoanController())->formEditQuanTri(),
            'sua-quan-tri' =>(new AdminTaiKhoanController())->postEditQuanTri(),

            // route reset pass tài khoản
            'reset-password' =>(new AdminTaiKhoanController())->resetPassword(),
            
            // Quản lý tài khoản khách hàng
            'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachkhachHang(),
            'form-sua-khach-hang' =>(new AdminTaiKhoanController())->formEditkhachHang(),
            'sua-khach-hang' =>(new AdminTaiKhoanController())->postEditkhachHang(),
            'chi-tiet-khach-hang' =>(new AdminTaiKhoanController())->deltailkhachHang(),

    // route auth
    'login-admin' => (new  AdminTaiKhoanController())->formlogin(),
    'check-login-admin' => (new  AdminTaiKhoanController())->login(),
    'logout-admin' => (new  AdminTaiKhoanController())->logout(),

    // banner
    'view_banner' => (new AdminBannerController())->listBanners(),
    'form_add_banner' => (new AdminBannerController())->addBannerForm(),
    'add_banner' => (new AdminBannerController())->addBanner(),
    'delete_banner' => (new AdminBannerController())->deleteBanner(),
};
