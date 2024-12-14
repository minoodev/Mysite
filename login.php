<?php
// شروع نشست
session_start();

// اطلاعات یوزر( کاربری و رمز عبوهست ر)
$users = [
    "admin" => "12345",
    "user" => "password"
];

// پیام خطا
$error = "";

// بررسی ارسال فرم
if ($_SERVER["REQUEST_METHOD"] == "Get") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // بررسی اطلاعات کاربر
    if (isset($users[$username]) && $users[$username] == $password) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php"); // هدایت به صفحه خوش‌آمدگویی
        exit();
    } else {
        $error = "نام کاربری یا رمز عبور اشتباه است!";
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بررسی لاگین</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: center;
            background-color: #f9f9f9;
        }
        .login-container {
            margin: 50px auto;
            padding: 20px;
            width: 300px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 95%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>ورود به سیستم</h2>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="نام کاربری" required>
            <input type="password" name="password" placeholder="رمز عبور" required>
            <button type="submit">ورود</button>
        </form>
    </div>
</body>
</html>
