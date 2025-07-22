<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background:rgb(249, 2, 192);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(249, 248, 248, 0.1);
      width: 300px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-box input[type="submit"] {
      padding: 10px;
      display: block;
      margin: 20px auto 0 auto;
      background: pink;
      color: white;
      border: none;
      cursor: pointer;
    }

    .login-box input[type="submit"]:hover {
      background:rgb(250, 2, 179);
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <form class="login-box" action="actions/login_action.php" method="post">
    <h2>Đăng nhập</h2>
    <?php if (isset($_GET['error'])): ?>
      <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
    <input type="text" name="username" placeholder="Tên đăng nhập" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <input type="submit" value="Đăng nhập">
    
  </form>
</body>
</html>
