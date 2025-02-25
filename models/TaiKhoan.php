<?php

class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau){
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; // trường hơp đăng nhập thành công
                    }else{
                        return "Tài khoản bị cấm";
                    }
                }else{
                    return "Tài khoản không có quền đăng nhập";
                }
            }else{
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }

    public function getTaiKhoanFormEmail($email)
    {
        try {
            $sql = 'SELECT * FROM `tai_khoans` WHERE email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
{
    try {
        // Mã hóa mật khẩu trước khi lưu vào DB
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = 'INSERT INTO `tai_khoans` (`ho_ten`, `email`, `mat_khau`, `chuc_vu_id`)
                VALUES (:ho_ten, :email, :mat_khau, :chuc_vu_id)';

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':email' => $email,
            ':mat_khau' => $hashedPassword, // Đổi `:password` -> `:mat_khau`
            ':chuc_vu_id' => $chuc_vu_id,
        ]);

        return true;
    } catch (Exception $e) {
        throw new Exception("Lỗi khi thêm tài khoản: " . $e->getMessage());
    }
}


}