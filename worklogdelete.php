<?php
 header("content-type:text/html;charset=utf8");
  //session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
//包含数据库连接文件
require_once 'init.php';
$userid = $_SESSION['userid'];

 //require_once 'init.php';
 $id=$_GET['id'];
 $sql="delete from worklogs where work_log_id = '$id'";
 //echo $sql;
 $re=$conn->query($sql);
 if($re){
  echo "删除成功";
  echo "<a href='workloglist.php'>返回文章列表</a>";
 }else{
  echo "删除失败";
  echo "<a href='workloglist.php'>返回文章列表</a>";
 }