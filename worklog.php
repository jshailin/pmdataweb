<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
 	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8">
		<title>工作日志写入页</title>
	</head>
	<body bgcolor="#ccc">
		<div style="width:600px;" >
			<fieldset  style="width:600px;">
				<legend>试验页</legend>
	  	</fieldset>		
		</div>
		<div style="width:700px;" >
<fieldset  style="width:700px;">
<legend>写日志</legend>

 <form name="worklog" method="post" action="worklogDo.php" style="margin:5px 500px; width: 600px; left: 10px;">
	   <p>选择项目：
	     <select name="project_id" id="project_id" style="width:300px;height:30px;font-size:18px;" >
         <?php
						//  session_start();
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
	     <br/>
	  任务简述：
         <input type="text" name="task_name" style="margin-top:0.5cm; height: 35px;"/>
         耗时 (h) ：   
         <input name="cost_hours" type="text" style="height: 35px; margin-left: 0.2cm;"/>
         <br/>
开始时间：
<input name="start_time" type="text" style="height: 35px; margin-top: 0.5cm;" value="2016-01-11" />
 结束时间：
 <input name="end_time" type="text" style="height: 35px; margin-top: 0.5cm;" value="2016-01-11" />
<br/>
	   任务内容：
	     <textarea name="description" cols=30 rows=5 style="margin-top:0.5cm; height: 2cm;"></textarea>
	     <br/>
	     <br/>
	     
	  质量相关性：
	  <select  name="is_quality" style="height: 25px; font-size: 16px; margin-top: 1px;""> 
	    <option value=0>质量无关</option> 
	    <option value=1>质量相关</option> 
	    </select> 	
	   </p>
	   <p>
	     <input name="" type="submit" style="height: 35px; width: 70px; font-size: 18px;" value="保存"/>
       </p>
  </form>
  

	 
	 </fieldset>
</div>
	</body>
</html>