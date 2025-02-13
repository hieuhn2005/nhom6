<?php
class SanPham {
    public $conn; // khai báo phương thức 

    public function __construct()
    {
        $this->conn = connectDB();
    }


    // Viết hàm lấy toàn bộ dang sách sản phẩm
    public function getAllSanPham(){
        try {                              
            $sql = 'SELECT * FROM san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';

            $stmt = $this->conn->prepare($sql);

            $stmt ->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}

?>