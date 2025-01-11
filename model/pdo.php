<?php
/*
* Mở kết nối đến CDSL sử dụng PDO
 */
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = "root";
    $password = "";

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE. DELETE)
 * @param string $sql cau lenh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thục thi câu lệnh
 */
function pdo_execute_return_lastInsertId($sql, $args = array())
{
    try {
        // Kết nối đến cơ sở dữ liệu
        $conn = pdo_get_connection();

        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);

        // Thực thi câu lệnh với các tham số
        $stmt->execute($args);

        // Trả về ID của bản ghi vừa chèn (nếu có)
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        // Lỗi khi thực thi câu lệnh SQL, log và ném lại ngoại lệ
        error_log("PDO Error: " . $e->getMessage());  // Ghi lỗi vào log để dễ dàng theo dõi
        throw $e;
    } finally {
        // Đảm bảo đóng kết nối sau khi thực hiện
        unset($conn);
    }
}

function pdo_execute($sql, $args = array())
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);

        if ($args) {
            $stmt->execute($args);
        } else {
            $stmt->execute();
        }

        return $stmt;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thức thi câu lệnh
 */
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_query1($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        
        // Kiểm tra nếu có bất kỳ tham số nào là mảng
        foreach ($sql_args as &$arg) {
            if (is_array($arg)) {
                $arg = implode(',', $arg); // Chuyển đổi mảng thành chuỗi
            }
        }
        
        $stmt->execute($sql_args);
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
* Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql cau lenh sql 
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thức thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch();
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh truy vấn một gí trị
 * @param string $sql cau lenh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return 
 * @throws PDOException lỗi thức thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_dangky_taikhoan_user($email, $matkhau, $ten, $sdt, $address)
{
    $sql = "INSERT INTO nguoi_dung (email, matkhau, hoten, sdt, diachi, role) VALUES (?, ?, ?, ?, ?, 0)";
    $conn = pdo_get_connection(); // Hàm kết nối PDO
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $matkhau, $ten, $sdt, $address]);

    // Trả về ID vừa chèn
    return $conn->lastInsertId();
}

function pdo_get_user_info($userId)
{
    $sql = "SELECT * FROM nguoi_dung WHERE id_nguoidung = ?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin user dưới dạng mảng kết hợp
}