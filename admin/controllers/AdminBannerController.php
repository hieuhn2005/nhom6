<?php

class AdminBannerController
{
    private $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }

    public function listBanners()
    {
        $banners = $this->modelBanner->getAllBanners();
        require_once './views/banner/listBanner.php';
    }

    public function addBannerForm()
    {
        require_once './views/banner/addBanner.php';
    }

    public function addBanner(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_banner = $_POST['ten_banner'];
            $anh = $_POST['anh'];

            $errors = [];
            if (empty($ten_banner)) {
                $errors['ten_banner'] = 'Tên banner không được để trống';
            }

            if (empty($anh)) {
                $errors['anh'] = 'Ảnh không được để trống';
            }

            if (empty($errors)) {

                // var_dump('ok');

                $this->modelBanner->insertBanner($ten_banner, $anh);
                // var_dump($ten_banner);die;
                header("location: " . BASE_URL_ADMIN . '?act=view_banner');
                exit();
            } else{
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