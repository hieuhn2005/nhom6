<?php

class Banner
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Get all banners
    public function getAllBanners()
    {
        $query = "SELECT * FROM banner";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insertBanner($ten_banner, $anh)
    {
        try {
            $sql = 'INSERT INTO `banner`(`ten_banner`, `anh`)
                    VALUES (:ten_banner, :anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_banner' => $ten_banner,
                ':anh' => $anh,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function getDetailBanner($id)
    {
        try {
            $sql = 'SELECT * FROM `banner` WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    // Delete banner
    public function destroyBanner($id)
    {
        try {
            $sql = ' DELETE FROM `banner` WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}