<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
 	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8">
		<title>工作日志写入页</title>
	</head>
	<body bgcolor="#ccc">
	 <form name="worklog" method="post" action="worklogDo.php" style="margin:5px 500px;">
	   <h1>写日志</h1>

	 <!--日志号：<input type="text" name="work_log_id" value="L-G-005-2016-00001"/><br/> -->
	  项目号：
	  <select name="project_id" id="project_id">
	  	

					<?php
						  session_start();
				//检测是否登录，若没登录则转向登录界面
				if(!isset($_SESSION['userid'])){
				    header("Location:login.html");
				    exit();
				}
				//包含数据库连接文件
				require_once 'init.php';
				$userid = $_SESSION['userid'];
		 		$sql="select  project_id,project_name from projects";
      	$res=$conn->query($sql);   		    			
   			while( $arr=$res->fetch_assoc() ){
          echo "<option value=$arr[project_id]>$arr[project_name]</option>";
				}
   			$conn->close();//关闭数据库
 			 ?> 			     
	  </select>
	  
	  任务：<input type="text" name="task_name"/><br/>
	  耗时(h)：<input type="number" name="cost_hours"/><br/>
	  开始时间 <input type="datetime-local" name="start_time" value="2016-01-11T16:00:00" /><br/>
	  结束时间 <input type="datetime-local" name="end_time" value="2016-01-11T19:00:00" /><br/>
	  质量相关性：
	  <select  name="is_quality""> 
			<option value=0>质量无关</option> 
			<option value=1>质量相关</option> 
		</select> 	
	  备注：<textarea cols=30 rows=5 name="description"></textarea><br/><br/>  
	   <input type="submit" value="保存"/>
	 </form>
	</body>
</html>