<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có vai trò admin hay không
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Chuyển hướng về trang đăng nhập nếu không có quyền
    header('Location: login.php');
    exit;
}
?>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.4-web/css/all.css">
    <style>
        .admin-table {
            width: 100%;
            margin: 30px 0;
            border-collapse: collapse;
            background: #fff;
        }
        .admin-table th, .admin-table td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: center;
        }
        .admin-table th {
            background: #f06ca4;
            color: #fff;
        }
        .admin-table tr:nth-child(even) {background: #f9f9f9;}
        .btn-edit, .btn-delete, .btn-add {
            padding: 5px 12px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        .btn-edit {background: #17a2b8;}
        .btn-delete {background: #dc3545;}
        .btn-add {background: #28a745;}
        .admin-content-title {
            font-size: 22px;
            margin: 30px 0 10px 0;
            text-align: left;
        }
    </style>
</head>
<body>
   <div id="content">
        <div class="admin-content-title">Danh sách người dùng</div>
        <button class="btn-add" action="./actions/create_action.php" method="POST">Thêm mới</button>
        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
            <tr>
                <td>1</td>
                <td>admin</td>
                <td>admin</td>
                <td>ad@123</td>
                <td>Quản trị</td>
                <td><button class="btn-edit">Sửa</button> 
                <button class="btn-delete" action="./actions/delete_action.php" method="POST">Xóa</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>customer</td>
                <td>customer</td>
                <td>kh@123</td>
                <td>Khách hàng</td>
                <td><button class="btn-edit">Sửa</button> 
                <button class="btn-delete" action="./actions/delete_action.php" method="POST">Xóa</button></td>
            </tr>
        </table>
      </div> 
</body>
</html>

