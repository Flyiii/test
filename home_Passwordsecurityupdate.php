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
	$password=$_POST['password'];
	$pass=trim($_POST['pass']);
	$pwd=trim($_POST['pwd']);
	/* var_dump($pass);
	var_dump($pwd); */
	//判断旧密码是否一致
	if($_COOKIE['pwd'] != md5($password)){
		$alterNotice = true;
		$msgArr[] = '<font color=red><b>旧密码错误</b></font>';
		$msg = join('<br />', $msgArr);
		include 'action.php';
		exit;
	}
	if ($_POST['pass'] != $_POST['pwd']) {
	$alterNotice = true;
	/* exit('两次密码不一样'); */
	$msgArr[] = '<font color=red><b>两次密码不一样</b></font>';
	$msg = join('<br />', $msgArr);
	include 'action.php';
	exit;
	}
	//返回错误信息
	/* if($alterNotice)
	{
			$msg = join('<br />', $msgArr);
			include 'action.php';
			exit;
	} */
	$proplem=$_POST['answer'];
	$answer=$_POST['hd'];
	/* $data['pwd'] = md5($pass); */
	if(!empty($pass)){
	$result = dbUpdate($link,'user',['pwd'=>md5($pass),'proplem'=>$proplem,'answer'=>$answer],'id=' . $id);		
	/* if ($result && mysqli_affected_rows($link)){
					  header('location:' . $_SERVER['HTTP_REFERER']); 
		} */
	$msgArr[] = '<font color=red><b>修改成功</b></font>';
	$msg = join('<br />', $msgArr);
	include 'action.php';
	}else{
		$result = dbUpdate($link,'user',['proplem'=>$proplem,'answer'=>$answer],'id=' . $id);		
		/* if ($result && mysqli_affected_rows($link)){
					  header('location:' . $_SERVER['HTTP_REFERER']); 
		} */
		$msgArr[] = '<font color=red><b>修改成功</b></font>';
		$msg = join('<br />', $msgArr);
		include 'action.php';
	}
}
