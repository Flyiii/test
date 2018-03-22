<?php
/**
 * 登陆
 */
	include './common/home.php';
	$username = trim($_POST['user']);
	$password = trim($_POST['pass']);
	/* $cookietime = $_POST['cookietime']; */
	$result = dbSelect($link,'user','id,name,pwd,email,level,regtime,icon,gold,lasttime,islock','name="'.$username.'" and pwd="'.md5($password).'"');
	/* var_dump($result[0]) */;
	
	//判断是否使用了自动登录
	/* if($cookietime)
	{
		$longTime = time()+2592000;
	}else{
		$longTime = time()+86400;	
	} */
	//五次登录失败自动锁定
	//////////////
	if(!$result)
	{
		$msg = '<font color=red><b>登录失败，用户名或密码错误</b></font>';
		$url = $_SERVER['HTTP_REFERER'];
		$style = 'alert_error';
		$toTime = 3000;
	    include 'login.php'; 
	}else{
		if($result[0]['islock'] == 1)
		{
			$msg = '<font color=red><b>您的账号已经被锁定，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'login.php';
			exit;
		}
		setcookie('id',$result[0]['id'],time()+2592000);
		setcookie('name',$result[0]['name'],time()+2592000);
		header('location:admin_index.php');
	}