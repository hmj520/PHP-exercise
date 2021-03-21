<?php
session_start();


$username = $_POST['username'];
$password = $_POST['password'];
$token = $_POST['token'];

if (empty($token)) {
    echo 'Token为空，请通过登陆页面获取!';die;
}

if ($_SESSION['token'] != $token) {
    echo 'Token错误，请重新获取Token!';die;
}

// 创建连接
$conn = new mysqli("127.0.0.1", "test", "123456",'test');
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

# 组合SQL语句
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

# 查询SQL语句
$result = $conn->query($sql);

# 判断查询的语句其结果条数是否为 0 
if ($result->num_rows == 0) {
    $_SESSION['token'] = "";
    echo '账户或者密码错误!';
} else {
    echo '登陆成功!';
}

#获取结果赋予给变量
$Query_End = $result->fetch_assoc();

#
echo $Query_End['password'];


?>
