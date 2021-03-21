<?php
session_start();

# 生成toen值
$token = md5(time());


$_SESSION['token'] = $token;

include("login.html");



?>
