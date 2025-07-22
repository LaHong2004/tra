<?php
// Khởi tạo phiên làm việc
session_start();
require_once('../database.php');

function loginAction($pdo): void {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
     
        // Chuẩn bị truy vấn
        $sql = "SELECT `id`, `name`, `password`, `role` FROM user WHERE `username` = :username";
        
        // Truy vấn kết nối lên cơ sở dữ liệu
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'username' => $username
        ]);

        if ($stmt->rowCount() == 0) {
            header('Location: /login.php?error=Tài khoản không có trong hệ thống');
            exit;
        }
        
        // Lấy kết quả
        $user = $stmt->fetch();

        // Mật khẩu không trùng khớp (so sánh trực tiếp, không dùng password_verify)
        if ($_POST['password'] !== $user['password']) {
            header('Location: /login.php?error=Đăng nhập sai');
            exit;
        }
        
        // Lưu phiên làm việc người dùng lên trình duyệt
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Debug: Kiểm tra vai trò trước khi chuyển hướng
        // echo "Đăng nhập thành công. Role: " . $user['role'] . "<br>";
        // exit;

        // Chuyển hướng dựa trên vai trò
        if ($user['role'] === 'admin') {
            header('Location: /admin.php');
        } else {
            header('Location: /webmypham/index.html');
        }
        exit;
    }
}

loginAction($pdo);