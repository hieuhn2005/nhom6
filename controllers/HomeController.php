<?php

class HomeController
{

    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function home()
    {
        echo "Hello home trg4erwghb4rv  ";
    }

    public function trangchu()
    {
        echo "Dfocewrkogvhbnjrdw";
    }

    public function dangSachSanPham()
    {
        $listProduct = $this->modelSanPham->getAllProduct();
        //var_dump($listProduct);die();
        require_once './views/listsanpham.php';
    }
}
