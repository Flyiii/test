<?php

	//获取用户名
	
	function getUserName($id)
	{	
		$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
		$UserName = dbSelect($link,'user','*','id in('.$id.')','id desc');
		$str = [];
		if ($UserName != '') {
			foreach($UserName as $val)
			{
				$str[]=$val['name'];
			}
		}
		
		//var_dump($str);
		//exit;
		$nstr=join(', ',$str);
		return $nstr;
	}

	//获取最后发表用户的用户名和回复时间
	function getListUName($pid)
	{
		$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
		//查看帖子是否存在回复内容
		$huifu = dbSelect($link,'posts','id,uid,lastpost','pid='.$pid.' or id='.$pid.'','id desc',1);

		if($huifu)
		{
			//返回作者、回复内容ID、回复的时间
			$UserName = dbSelect($link,'user','id,name','id='.$huifu[0]['uid'].'','id desc',1);
			return $huifu[0]['lastpost'].','.$UserName[0]['name'];
		}
		return false;
	}

	/**$huifu[0]['id'].','.
	 * 检测用户名和密码长度
	 * @param String $str
	 * @param Intiger $minLen
	 * @param Intiger $maxLen
	 * @return Boolean
	 */
	function stringLen($str, $minLen = 3, $maxLen = 12)
	{
		$strLen = mb_strlen($str);

		if($strLen >= $minLen && $strLen <= $maxLen){
			return false;
		}else{
			return true;
		}
	}
	
	/**
	 * 检测两次密码输入是否一致
	 * @param String $str1
	 * @param String $str2
	 * @return Boolean
	 */
	function str2Equal($str1, $str2)
	{
		if($str1 == $str2){
			return false;
		}else{
			return true;
		}
	}
	
	//检测邮箱格式
	function checkEmail($mail)
	{
		$pattern='/^[\w-]+@([a-zA-Z0-9-]+\.)+((com)|(cn)|(net)|(edu))$/i';
		if(preg_match($pattern, $mail))
		{
			return false;
		}else{
			return true;
		}
	}
	//检测密码不能为纯数字
	function checkPwd($pwd)
	{
		$pattern='/^[a-zA-Z]\w{5,17}$/';
		if(preg_match($pattern, $pwd))
		{
			return false;
		}else{
			return true;
		}
	}
	//检测验证码
	function checkVerify($str, $sessionVerify)
	{
		if(strtolower($str)!=strtolower($sessionVerify))
		{
			return true;
		}else{
			return false;
		}
	}

	//获得客户端IP地址
	function getIntIP()
	{
		return ip2long($_SERVER['REMOTE_ADDR']);
	}

	//用户等级
	function userGrade($jifen)
	{
		if($jifen<=50){
			echo '学士';
		}elseif($jifen<=100){
			echo '硕士';
		}elseif($jifen<=200){
			echo '博士';
		}elseif($jifen<=300){
			echo '院士';
		}else{
			echo '圣斗士';
		}
	}

	//用户权限组
	function userGroup($ugroup)
	{
		switch($ugroup){
			case 1:
				echo '管理员';
				break;
			case 0:
				echo '普通用户';
				break;
			default:
				echo '普通用户';
		}
	}
