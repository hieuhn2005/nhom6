<?php
class AdminDanhMucController
{

    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }


    public function danhSachDanhMuc()
    {

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhmuc(){
        //hàm này dùng để hiện thi form nhập
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhmuc(){
        //hàm này dùng để xử lý thêm dữ liệu
        

        // kiểm tra xem dữ liệu có phải đc subimt lên ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // nếu ko có lỗi thì tiến hành thêm dang mục
            if (empty($errors)) {
                // nếu ko có lỗi thì tiến hàng thêm danh mục\
                // var_dump('ok');

                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else{
                //Trả về form và lỗi 
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }


    public function formEditDanhmuc(){
        //hàm này dùng để hiện thi form nhập
        // lấy ra thông tin của dang mục cần sủa
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else{
            header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
        }
        
    }

    public function postEditDanhmuc(){
        //hàm này dùng để xử lý thêm dữ liệu
        // kiểm tra xem dữ liệu có phải đc subimt lên ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // nếu ko có lỗi thì tiến hành sửa dang mục
            if (empty($errors)) {
                // nếu ko có lỗi thì tiến hàng sửa danh mục\
                // var_dump('ok');
                // die;

                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);

                header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else{
                //Trả về form và lỗi 
                $danhMuc = ['id' => $id, 'ten_dang_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc(){
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }

        header("location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
    }

}
