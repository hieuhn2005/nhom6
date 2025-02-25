<?php
class AdminDonHangController
{

    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }


    public function danhSachDonHang()
    {

        $listDonHang = $this->modelDonHang->getAllDonHang();

        require_once './views/DonHang/listDonHang.php';
    }

    public function detailDonHang(){
        $don_hang_id = $_GET ['id_don_hang'];


        $DonHang = $this->modelDonHang->getDetailDonHang($don_hang_id);


        $sanPhamDonHang = $this->modelDonHang->getlistSpDonHang($don_hang_id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        // var_dump($sanPhamDonHang);die;

        require_once './views/DonHang/detailDonHang.php';
    }


    public function formEditDonHang(){

        $id = $_GET['id_don_hang'];
        $DonHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if ($DonHang) {
            require_once './views/DonHang/editDonHang.php';
            deleteSessionError();
        } else{
            header("location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
        }
        
    }


    public function postEditDonHang(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu

            $don_hang_id = $_POST['don_hang_id'] ?? '';

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';

            $errors = [];

            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại người nhận không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email không được để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái đơn hàng phải chọn phải chọn';
            }



            $_SESSION['error'] = $errors;

            // var_dump($don_hang_id); die;
            if (empty($errors)) {
                // var_dump('abc'); die;
                // var_dump('ok');

                $this->modelDonHang->updateDonHang($don_hang_id,
                                                    $ten_nguoi_nhan,
                                                    $sdt_nguoi_nhan,
                                                    $email_nguoi_nhan,
                                                    $dia_chi_nguoi_nhan,
                                                    $ghi_chu,
                                                    $trang_thai_id
                                                );           

                // var_dump($abc);die;
                header("location: " . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else{
                $_SESSION['flash'] = true;

                header("location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();

            }
        }
    }


    

}
