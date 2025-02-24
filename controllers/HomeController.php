<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();


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
            // lấy email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($email, $password);die;


            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            
            if ($user == $email) { // trường hợp đăng nhập thành công
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
                //lấy dữ liệu giỏ hàng của người dùng
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
                var_dump('Chưa đăng nhập');
                die;
            }
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            //lấy dữ liệu giỏ hàng của người dùng
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
            $id = $_GET['id_chi_tiet_gio_hang'];
            
            $gioHang = $this->modelGioHang->getDetailGioHang($id);
            if ($gioHang) {
                $this->modelGioHang->destroyGioHang($id, $gioHang['san_pham_id']);
            }
            // var_dump($id); die;

            header("location: " . BASE_URL . '?act=gio-hang');
            exit();
        }else {
            var_dump('Chưa đăng nhập');
            die;
        }
    }


    
}

