<?php

class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();


    }
    

    public function home()
    {
        $listsansham = $this->modelSanPham->getAllSanPham();
        // var_dump($listProduct);die();
        require_once './views/trangchu.php';
    }

    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];

        $SanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
        $listBinhluan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($SanPham['danh_muc_id']);


        // var_dump($listBinhluan);die;
        if ($SanPham) {
            require_once 'views/sanphams/detaiSanPham.php';
        } else {
            header("location: " . BASE_URL );
            exit();
        }
    }

    public function formlogin()
    {
        require_once './views/auths/formLogin.php';

        deleteSessionError();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($email, $password);die;


            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            
            if ($user == $email) { 
                // lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                // lỗi thì lưu vào session
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    //đăng ký
    public function formDangKy(){
        require_once './views/auths/formDangKy.php';

        deleteSessionError();
    }

    public function postAddDangKy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $pass = $_POST['pass'];
            $password = $_POST['password'];


            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }

            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số diện thoại không được trống';
            }elseif (empty($so_dien_thoai)) {
                // tối đa 10 số
                $errors['so_dien_thoai'] = 'Số điện thoại phải có ít nhất 10 số';
            } elseif (!is_numeric($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số diện thoại phải là số';
            }
            }

            if (empty($pass)) {
                $errors['pass'] = 'Mật khẩu không được để trống';
            } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $pass)) {
                $errors['pass'] = 'Mật khẩu phải có ít nhất 6 ký tự, 1 chữ cái, 1 số và 1 ký tự đặc biệt';
            }

            if (empty($password)) {
                $errors['password'] = 'Nhập lại mật khẩu không được để trống';
            } elseif ($password !== $pass) {
                $errors['password'] = 'Mật khẩu nhập lại không khớp';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $chuc_vu_id = 2;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email,$so_dien_thoai, $pass, $chuc_vu_id);
                // var_dump($email);die;

                $_SESSION['user_client'] = $ho_ten;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=dang-ky');
                exit();
            }
        }
    

    public function logout(){
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("Location: " . BASE_URL . '?act=login');
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
                // var_dump($mail['id']);die;
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }



                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);

                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetaiGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                // var_dump('Thành công');die;
                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                header("Location:" . BASE_URL . '?act=login');
                die;
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/giohang/listGioHang.php';
        } else {
            header("Location:" . BASE_URL . '?act=login');
        }
    }

    public function deleteGioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $id_chi_tiet = $_GET['id_chi_tiet_gio_hang'];
            $san_pham_id = $_GET['san_pham_id'];
            
            if ($id_chi_tiet && $san_pham_id) {
                $this->modelGioHang->destroyGioHang($id_chi_tiet, $san_pham_id);
            }
    
            header("location: " . BASE_URL . '?act=gio-hang');
            exit();
        } else {
            header("Location:" . BASE_URL . '?act=login');
        }
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            //lấy dữ liệu giỏ hàng của người dùng
            // var_dump($mail['id']);die;
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhtoan/thanhtoan.php';
        } else {
            var_dump('Chưa đăng nhập');
            die;
        }
    }


    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);die;
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat =  date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH' . rand(1000, 9999);

            // thêm thông tin vào đb

            $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            var_dump('Thêm thành công ');
            die;
        }
    }

    
}

