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

 $arr=$_POST;
 $work_log_id=$arr['work_log_id'];
 $sql="update worklogs	set project_id = '$arr[project_id]',
 task_name ='$arr[task_name]',
 start_time = '$arr[start_time]',
 end_time = '$arr[end_time]',
 is_quality  = '$arr[is_quality]',
 description = '$arr[description]' ,
 create_update_date = now()
 where work_log_id = '$work_log_id'";
 //echo $sql;
 $re=$conn->query($sql);//执行sql语句
 //echo $re;
 if($re){
  echo "修改成功";
  echo "<a href='workloglist.php'>返回文章列表</a>";
 }else{
  echo "修改失败";
  echo "<a href='workloglist.php'>返回文章列表</a>";
 }
 $conn->close();//关闭数据库