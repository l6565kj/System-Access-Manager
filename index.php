<?php
// 设置正确的密码
$correctPassword = '12345678';

// 检查是否提交了表单
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取用户输入的密码
    $enteredPassword = $_POST['password'];

    // 验证密码是否正确
    if ($enteredPassword === $correctPassword) {
        // 正确密码，继续显示页面
    } else {
        // 错误密码，显示密码输入表单
        showPasswordForm('密码错误！');
    }
} else {
    // 如果没有提交表单，显示密码输入表单
    showPasswordForm();
}

// 显示密码输入表单的函数
function showPasswordForm($error = '') {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授权确认</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 72px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- 显示密码输入表单 -->
    <form method="post" action="">
        <h1>六五科学中心内网服务-授权确认</h1>
        <label for="password">请输入密码：</label>
        <input type="password" name="password" required>
        <button type="submit">确认密钥</button>
    </form>

    <!-- 结束页面 -->
</body>
</html>
<?php
    // 结束函数
    exit;
}
?>

<!-- 继续加载原始页面内容 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>访问本地服务器</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        li {
            margin: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        a {
            display: block;
            padding: 15px;
            text-decoration: none;
            color: #333;
        }

        a:hover {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <h2>六五科学中心内网服务：</h2>
    <ul>
        <?php
        // 关闭错误显示
ini_set('display_errors', 'Off');
// 关闭错误日志记录到文件
ini_set('log_errors', 'Off');
// 关闭通过 error_reporting 报告错误
error_reporting(0);
        // 获取当前目录下的文件夹列表
        $dir = '.';
        $folders = array_filter(scandir($dir), function ($item) {
            return is_dir($item) && !in_array($item, ['.', '..']);
        });

        // 输出HTML页面
        foreach ($folders as $folder): ?>
            <li>
                <a href="<?php echo $folder; ?>">
                    <?php echo $folder; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
