
<?php
//$conn=new mysqli("192.168.120.200","root","root99","pmdataweb");//链接数据库
$conn=new mysqli("localhost","root","root99","project_manager");//链接数据库
if(mysqli_connect_error()){
    echo mysqli_connect_error();
}
$conn->set_charset("utf8");
 

