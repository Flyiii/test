<?php
//连接数据库
include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */

$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
/* var_dump($link);
var_dump($_POST); */
if(isset($_POST['sub'])){
	$id=$_COOKIE['id'];
	var_dump($id);
	$content = $_POST['content']; 
	echo $content;
	$data['signature'] = $content;
	$result = dbUpdate($link,'user',$data,'id=' . $id);
	
		/* if ($result && mysqli_affected_rows($link)){
			header('location:' . $_SERVER['HTTP_REFERER']);  
		} */
	$alterNotice = true; 
    $msgArr[] = '<font color=red><b>修改成功,三秒后自动返回....</b></font>'; 
}
 if($alterNotice)
{
	$msg = join('<br />', $msgArr);
 
	include 'action.php';
	exit;
}  