<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>工作日志</title>
</head>
<body>
<!--
 搜索框
-->
 <form method="get" action="workloglist.php" style="margin:10px 400px;">
  <input type="text" name="search" />
  <input type="submit" value="搜索"/>
 </form>
 <br/>
 <table cellspacing="0" cellpadding="0" align="center" bgcolor="#ccc" width=1020 >
  <a href="index.html" style="padding:20px 30px">返回部门管理系统主页</a>
  <a href="worklog.php" style="padding:20px 30px">返回填写日志</a>
  <tr>
   <th>日志号</th>
   <th>项目号</th>
   <th>任务名</th>
   <th>耗时(h)</th>
   <th>开始时间</th>
   <th>结束时间</th>
   <th>质量相关性</th>
   <th>备注</th>
  </tr>
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


 
   /**
    * 搜索
    */
   @$keyword=$_GET["search"];
   /*分页*/
   $sql="select count(*) from worklogs where employee_id='$userid' and (task_name like '%$keyword%' or description like '%$keyword%')";
   //echo $sql;
   $res=$conn->query($sql);
   //$count= (int)mysql_num_rows($result);
   $arr=$res->fetch_assoc();
   while(list($key,$val)=each($arr)){
    $count = (int)$val; 
   }
   //echo $count;
   $pageSize=4;
   if (is_int($count/$pageSize) )
   {
   	$page=$count/$pageSize;
   	}
   	else
   	{
   $page=floor($count/$pageSize)+1;//总页数$page
 		}
  
   echo $page;
   if(isset($_GET['page']))
   {    
    if($_GET['page'] <=1){
     $currentPage = 1;
    }elseif ($_GET['page'] >= $page){
     $currentPage = $page-1;
    }else{
     $currentPage = $_GET['page'];
    }
   }else
   {
    $currentPage=1;
   }
   $start = ($currentPage-1)*$pageSize;
   $sql="select work_log_id,project_id,task_name,cost_hours,start_time,end_time,is_quality ,description from worklogs where employee_id='$userid' and (task_name like '%$keyword%' or description like '%$keyword%') limit $start,$pageSize";
  //echo $sql;
   $re=$conn->query($sql);//执行sql语句  
 
  while( $arr=$re->fetch_assoc() ){
  
  ?> 
    <tr>
     <td align="center" style="border:1px solid #000" width="150"><?php echo $arr['work_log_id'];?></td>
        <input type="hidden" name="id" value="<?php echo $arr['work_log_id'];?>"/>
     <td align="center" style="border:1px solid #000" width="100" ><?php echo $arr['project_id'];?></td>
     <td align="center" style="border:1px solid #000" width="150"><?php echo $arr['task_name'];?></td>
     <td align="center" style="border:1px solid #000" width="20"><?php echo $arr['cost_hours'];?></td>
     <td align="center" style="border:1px solid #000" width="100"><?php echo $arr['start_time'];?></td>
     <td align="center" style="border:1px solid #000" width="100"><?php echo $arr['end_time'];?></td>
     <td align="center" style="border:1px solid #000" width="20"><?php echo $arr['is_quality'];?></td>
     <td align="center" style="border:1px solid #000" width="200"><?php echo $arr['description'];?></td>
      
     <td align="center" style="border:1px solid #000">
      <a href="worklogEdit.php?id=<?php echo $arr['work_log_id']?>"><font color="red">修改</font></a>
      <a href="worklogDelete.php?id=<?php echo $arr['work_log_id']?>"><font color="red">删除</font></a>
     </td>
    </tr>
  <?php 
    }
   $conn->close();//关闭数据库
  ?>
 </table>
 <div style="margin:20px 400px;">
  共<?php echo $page?>页 |查到<?php echo $count;?>条记录
  当前第<?php echo @$_GET["page"]?>页|
  <a href="workloglist.php?page=1&search=<?php echo $keyword?>">首页</a>

  <a href="workloglist.php?page=<?php if (($currentPage - 1)==0 )
			  	{
			  		$priorPage = 1;
			  	}
			  	else
			  	{
			  		$priorPage = $currentPage - 1;
			  		}
			  			echo ($priorPage)  	;
  			?>&search=<?php echo $keyword?>">|上一页</a>
		
  <a href="workloglist.php?page=<?php if (($currentPage + 1)> $page )
			  	{
			  		$nextPage = $page;
			  	}
			  	else
			  	{
			  		$nextPage = $currentPage + 1;
			  		}
			  			echo ($nextPage)  	;
  			?>&search=<?php echo $keyword?>">|下一页</a>
  <a href="workloglist.php?page=<?php echo $page?>&search=<?php echo $keyword?>">|末页</a>
 </div>
 

</body>
</html>
