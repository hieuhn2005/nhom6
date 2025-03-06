<?php

class AdminBaoCaoThongKeController
{
    public function home()
    {
        require_once './views/home.php';
    }

    public function thongKe()
    {
        // Logic thống kê sẽ được thêm vào đây
        // Ví dụ: lấy dữ liệu từ database và xử lý thống kê

        // Sau đó, hiển thị trang thống kê
        require_once './views/thong_ke.php';
    }
}
?>