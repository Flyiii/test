<?php
//连接数据库
include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */
/* session_start();

unset($_SESSION);
echo session_name();
echo '<br />';
echo session_id();
setcookie(session_name(),'',time() - 3600);

session_destroy(); */

$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);

$id = $_POST['id'];
$ip1 = $_POST['ip1'];
$ip2= $_POST['ip2'];
$ip3 = $_POST['ip3'];
$ip4 = $_POST['ip4'];
$day=$_POST['day'];
$ip = [$ip1,$ip2,$ip3,$ip4];
$ip = join('',$ip);
var_dump($ip);
var_dump( $ip);
$createtime = date('Y-m-d H:i:s');
echo $createtime .'<br>';
$over = strtotime($createtime);
echo $over .'<br>';
$onedaytime= 24 * 60 * 60;
echo $onedaytime . '<br>';
$overtime = ($onedaytime * $day) + $over;
$overtime= date('Y-m-d H:i:s',$overtime);
 
	
echo $overtime . '<br>';
if(isset($_POST['btn'])){
$sql = "insert into forbid(ip,createtime,overtime) values('$ip','$createtime','$overtime')";
$result = mysqli_query($link,$sql);

 if($result && mysqli_affected_rows($link)){
	  header('location:' . $_SERVER['HTTP_REFERER']);
}
/**/
}else if (isset($_POST['jiejin'])){
	//删除
	
	$where = 'id=' . $id;
	$result = dbDelete($link, 'forbid', $where);
	if ($result && mysqli_affected_rows($link)){
		header('location:' . $_SERVER['HTTP_REFERER']);
	}
} 


/***************/
