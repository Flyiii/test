<?php
/**
 * 登陆
 */
	include './common/home.php';
	
	$username = trim($_POST['user']);
	$password = trim($_POST['pass']);
	/* $cookietime = $_POST['cookietime']; */
	$result = dbSelect($link,'user','id,name,pwd,email,level,regtime,icon,gold,lasttime,islock','name="'.$username.'" and pwd="'.md5($password).'"');
	/* var_dump($result); */
	$result1 = dbSelect($link,'user','id,name,pwd,email,level,regtime,icon,gold,lasttime,islock','name="'.$username.'"');
	/* var_dump($result1[0]['id']); */
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
		$locka = dbSelect($link,'user','*','name="'.$username.'"');
		if($locka[0]['islock'] >= 5)
		{
			$msg = '<font color=red><b>您的账号已经被锁定，请联系管理员</b></font>';
			
			include 'login.php';
			exit;
		}
		$id=$result1[0]['id'];
		$msg = '<font color=red><b>登录失败，用户名或密码错误</b></font>';
		
	    include 'login.php'; 
		
		$lock= dbUpdate($link,'user', 'islock=islock+1', 'id='.$id);
		
		
	}else{
		if($result[0]['islock'] >= 5)
		{
			$msg = '<font color=red><b>您的账号已经被锁定，请联系管理员</b></font>';
			$url = $_SERVER['HTTP_REFERER'];
			$style = 'alert_error';
			$toTime = 3000;
			include 'login.php';
			exit;
		}
		$iid=$result[0]['id'];
		$jielock['islock'] = 0;
		$jielock= dbUpdate($link,'user', $jielock, 'id='.$iid);
		/*禁止ip*/
		$Uip = $_SERVER['REMOTE_ADDR'];
			if ($Uip == '::1') {
				$Uip = '127.0.0.1';
			}
				$Uip = ip2long($Uip);
				/* var_dump($Uip); */
				$ip = dbSelect($link,'forbid','*','ip='.$Uip.'','id desc',1);
			if ($ip)
			{
				$msg = '<font color=red><b>滚</b></font>';
				include 'login.php';
				exit;
			}
		/*=====================*/
		/*===================*/
		/*=====================*/
		$money = 2;
		$date = strtotime(date('Y-m-d'));
		$oneDay = $date + 86400;
		if($result[0]['lasttime']<$date)
		{
			//更新最后登录时间,首次登陆还要加积分
			$lasttime = dbUpdate($link,'user', 'lasttime='.time().',gold=gold+'.(int)$money.'', 'id='.$result[0]['id'].'');
			$first = true;
			$gold = $result[0]['gold']+(int)$money;
		}else{
			//更新最后登录时间
			$lasttime = dbUpdate($link,'user', 'lasttime='.time().'', 'id='.$result[0]['id'].'');
			$gold = $result[0]['gold'];
		}
		
		setcookie('id',$result[0]['id'],time()+2592000);
		setcookie('name',$result[0]['name'],time()+2592000);
		setcookie('pwd',$result[0]['pwd'],time()+2592000);
		setcookie('email',$result[0]['email'],time()+2592000);
		
		setcookie('level',$result[0]['level'],time()+2592000);
		setcookie('icon',$result[0]['icon'],time()+2592000);
		setcookie('gold',$result[0]['gold'],time()+2592000);

		$msg = '<font color=green><b>登录成功</b></font>';
	
		
		include 'login.php'; 

		 if($first)
		{
			$msg = '每天登陆';
			include 'layer.php';
		}
	
	}