﻿<?php
session_start();

//注销登录
if (isset($_GET['action'])){
if($_GET['action'] == "logout"   ){
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
	exit;
}
}

//登录
if(!isset($_POST['submit'])){
   exit('非法访问!');
}

$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);

//包含数据库连接文件
require_once 'init.php';
//检测用户名及密码是否正确

   
$check_query = $conn->query("select employee_id from employees where employee_name='$username' and employee_password='$password' limit 1");
if($result = $check_query->fetch_assoc()){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['employee_id'];
    echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a>   ';
     echo ' <a href="index.html" style="padding:20px 30px"  >返回部门管理系统主页</a> <br />';
    echo ' <a href="worklog.php">填写工作日志</a> <br />';
    echo ' <a href="workloglist.php">查看工作日志列表</a> <br />';   
     echo ' <a href="login.php?action=logout">注销</a> 登录！<br />';
    exit;
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}

