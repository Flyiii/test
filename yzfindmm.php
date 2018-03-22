<?php
/**
 * 
 */
	include './common/home.php';
	
	$username = trim($_POST['user']);
	$email = trim($_POST['Email']);
	$yzm=$_POST['yzm'];
	
	$result = dbSelect($link,'user','id,name,email','name="'.$username.'" and email="'.$email.'"');
	
	if($result){
			$msg= '<font color=red><b>您的密码已经发送至您的邮箱,请在三天内修改密码</b></font>';
			include 'action.php';
			exit;
	}else{
		if($username != $result[0]['name'] || empty($username))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>信息不匹配</b></font>';
		}
		if($email != $result[0]['email']  || empty($email))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>邮箱不正确</b></font>';		
		}
		session_start();

		if(strtolower($_POST['yzm']) != strtolower($_SESSION['yzm']))
		{
			$alterNotice = true;
			$msgArr[] = '<font color=red><b>验证码错误</b></font>';		
		}
	}
	if($alterNotice)
	{
		$msg = join('<br />', $msgArr);
		/* header('location:yanzhengsb.php');  */
		include 'action.php';
		exit;
	}