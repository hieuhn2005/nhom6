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
    public function addBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_banner = $_POST['ten_banner'] ?? '';
            $anh = $_FILES['anh'] ?? null; // Kiểm tra nếu $_FILES['anh'] không tồn tại

            $errors = [];

            if (empty($ten_banner)) {
                $errors['ten_banner'] = 'Tên banner không được để trống';
            }

            if (!isset($_FILES['anh']) || $_FILES['anh']['error'] !== 0) {
                $errors['anh'] = 'Phải chọn ảnh banner hợp lệ';
            }

            if (empty($errors)) {
                // Upload ảnh banner nếu tồn tại
                $file_banner = uploadFile($_FILES['anh'], './uploads/');

                if ($file_banner) {
                    // Lưu vào database
                    $this->modelBanner->insertBanner($ten_banner, $file_banner);

                    // Chuyển hướng về trang danh sách banner
                    header("location: " . BASE_URL_ADMIN . '?act=view_banner');
                    exit();
                } else {
                    $errors['anh'] = 'Tải ảnh lên thất bại';
                }
            }

            // echo '<pre>';
            // print_r($_FILES);
            // echo '</pre>';
            // exit();

            $_SESSION['error'] = $errors;
            require_once './views/banner/addBanner.php';
        }
    }



    public function deleteBanner()
    {
        $id = $_GET['id_banner'];
        $banner = $this->modelBanner->getDetailBanner($id);

        if ($banner) {
            $this->modelBanner->destroyBanner($id);
        }

        header("location: " . BASE_URL_ADMIN . '?act=view_banner');
        exit();
    }
}
