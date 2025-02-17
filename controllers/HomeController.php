<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class HomeController
{

    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
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

        // var_dump($listBinhluan);die;
        if ($SanPham) {
            require_once 'views/sanphams/detaiSanPham.php';
        } else {
            header("location: " . BASE_URL );
            exit();
        }
    }
    
}

