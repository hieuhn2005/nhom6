<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class HomeController
{

    public $modelSanPham;
    public $modelTaiKhoan;
    
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();

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
        require_once './views/giohang/listGioHang.php';
    }


    
}

