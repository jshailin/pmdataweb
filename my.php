﻿<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
//包含数据库连接文件
require_once 'init.php';
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = $conn->query("select * from employees where employee_id='$userid' limit 1");
$row = $user_query->fetch_assoc();
echo '用户信息：<br />';
echo '用户ID：',$userid,'<br />';
echo '用户名：',$username,'<br />';
echo '邮箱：',$row['employee_email'],'<br />';
echo '<a href="login.php?action=logout">注销</a> 登录<br />';
?>
