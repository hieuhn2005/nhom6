<?php

class HomeController
{

    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }


    public function trangchu()
    {
        require_once './views/trangchu.php';
    }
    
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        // var_dump($listProduct);die();
        require_once './views/trangchu.php';
    }
}

