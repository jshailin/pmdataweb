
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>修改日志文件</title>
</head>
<body bgcolor="#ccc">
<?php 

 session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
//包含数据库连接文件
require_once 'init.php';
//$userid = $_SESSION['userid'];

	//require_once 'init.php';

   $work_log_id=$_GET['id'];  
   $sql="select * from worklogs where work_log_id = '$work_log_id'";
   //echo $sql;
   $re=$conn->query($sql);//执行sql语句
   $arr=$re->fetch_assoc();   
   //var_dump($arr);
   $conn->close();//关闭数据库
     
?>
 <form name="article" method="post" action="worklogupdate.php" style="margin:5px 500px;">
   
      <h1>写日志</h1>
	
  
   <input type="hidden" name="work_log_id" value="<?php echo $arr['work_log_id']?>"/><br/>
   项目号:<input type="text" name="project_id" value="<?php echo $arr['project_id']?>"/><br/>
   任务：<input type="text" name="task_name" value="<?php echo $arr['task_name']?>"/><br/>
   开始时间：<input type="date" name="start_time" value="<?php echo $arr['start_time']?>"/><br/>
   结束时间：<input type="date" name="end_time" value="<?php echo $arr['end_time']?>"/><br/>
     质量相关性：
	  <select  name="is_quality""> 
			<option value=0>质量无关</option> 
			<option value=1>质量相关</option> 
		</select> 	
  备注:<textarea cols=30 rows=5 name="description"><?php echo $arr['description']?></textarea><br/><br/>
   <input type="submit" value="修改"/>
   <a href="workloglist.php">返回日志列表</a>
   <a href="worklog.php">返回写日志</a>
 </form>
</body>
</html>