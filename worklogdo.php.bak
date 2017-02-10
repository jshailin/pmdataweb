<?php
 header("content-type:text/html;charset=utf8");
 date_default_timezone_set('Asia/Shanghai');
 
 session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
//包含数据库连接文件
require_once 'init.php';
$userid = $_SESSION['userid'];
 
 $project_id=trim($_POST['project_id']);
 $cost_hours =trim($_POST['cost_hours']);
 $start_time= $_POST['start_time'];
 $end_time= $_POST['end_time'];
  $task_name =trim($_POST['task_name']);
 $is_quality = $_POST['is_quality'];
 $description=trim($_POST['description']);
 //以下代码用于生成日志号
	 $sql="SELECT count(work_log_id) as cnt FROM worklogs where employee_id='$userid' ";
   $res=$conn->query($sql);  
   $arr=$res->fetch_assoc();   
   if ($arr['cnt']==0)
    {
   	 $work_log_id  = 'L-'.substr($userid,2,5).'-'.date("Y").'-00001';
 		 }
  	else
  	{
   	$sql=" SELECT  CONCAT('L-',substr('$userid',3,5),'-',CONCAT(DATE_FORMAT(NOW(), '%Y'),''),'-',LPAD(CONCAT(MAX(SUBSTR(work_log_id,14,5) + 0)+1,''),5,'0'))
   	 as work_log_id
   	 from worklogs  where employee_id='$userid' ";
   	// echo $sql;
   	$res=$conn->query($sql);   		
		while( $arr=$res->fetch_assoc() ){
          $work_log_id =$arr['work_log_id'] ;
			}
   	 }
 $sql="insert into worklogs values('$work_log_id','$userid','$project_id','$cost_hours','$start_time','$end_time','$task_name','$is_quality ','$description')";
// echo $sql;
 $re= $conn->query($sql);//执行sql语句
 if($re){
  echo "保存成功";
  echo '<a href="worklogList.php">返回日志列表</a>';
  
 }else{
  echo "保存失败";
  echo '<a href="worklogList.php">返回日志列表</a>';
 }
 $conn->close();//关闭数据库