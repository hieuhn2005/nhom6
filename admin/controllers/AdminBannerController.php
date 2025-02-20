<?php

class AdminBannerController
{
    private $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }

    // Display list of banners
    public function listBanners()
    {
        $banners = $this->modelBanner->getAllBanners();
        require_once './views/banner/listBanner.php';
    }

    // Display form to add a new banner
    public function addBannerForm()
    {
        require_once './views/banner/addBanner.php';
    }

    public function addBanner(){
        //hàm này dùng để xử lý thêm dữ liệu
        

        // kiểm tra xem dữ liệu có phải đc subimt lên ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_banner = $_POST['ten_banner'];
            $anh = $_POST['anh'];

            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ten_banner)) {
                $errors['ten_banner'] = 'Tên banner không được để trống';
            }

            if (empty($anh)) {
                $errors['anh'] = 'Anh khong duoc de trong';
            }

            // nếu ko có lỗi thì tiến hành thêm dang mục
            if (empty($errors)) {
                // nếu ko có lỗi thì tiến hàng thêm danh mục\
                // var_dump('ok');

                $this->modelBanner->insertBanner($ten_banner, $anh);
                header("location: " . BASE_URL_ADMIN . '?act=view_banner');
                exit();
            } else{
                //Trả về form và lỗi 
                require_once './views/banner/addBanner.php';
            }
        }
    }


    public function deleteBanner(){
        $id = $_GET['id_banner'];
        $banner = $this->modelBanner->getDetailBanner($id);

        if ($banner) {
            $this->modelBanner->destroyBanner($id);
        }

        header("location: " . BASE_URL_ADMIN . '?act=view_banner');
                exit();
    }

}