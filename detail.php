<?php
ob_start();
 include './common/home.php';





$title = '帖子详情-十分钟学院';

$now = date('Y-m-d H:i:s');


$postsSum = dbSelect($link,'posts','count(id)')[0]['count(id)']; //总帖子
/* var_dump($postsSum); */ 
$row = dbSelect($link,'link','*','','orderby desc'); 
 /*  var_dump($row); */
$row1 = dbSelect($link,'user','*','','regtime desc'); 
$row2 = dbSelect($link,'plate','*','','orderby desc'); 
$row3 = dbSelect($link,'posts','*','','createtime desc'); 
$row4 = dbSelect($link,'forbid','*'); 
$postdata = dbSelect($link, 'plate plate1,posts u,user c','plate1.name,plate1.id,plate1.sid,plate1.masters, u.replytotal,u.visittotal,u.title,u.createtime,u.id,u.content,u.pid,u.uid,u.rid,u.isdelete, c.name,c.id',' plate1.id=u.pid and c.id=u.uid ');//联合查询




















$Id = $_REQUEST['id'];
/* var_dump($Id);
var_dump($_COOKIE['id']); */
//保存帖子回复
	if(!empty($_POST['sub']))
	{
		//判断用户是否登录
		if(empty($_COOKIE['id'])){

			$msg='抱歉，您尚未登录';
			include 'action.php';
			exit;
		}
		
		$tid = $Id;		
		/* var_dump($tid);	 */
	//跟帖时记录贴子ID
		$authorid = $_COOKIE['id'];			//发布人ID
		$content = $_POST['content'];		//内容
		$createtime = time();		//发表时间
		$lastpost=date('Y-m-d H:i:s');
		
		$addip = ip2long($_SERVER['REMOTE_ADDR']);
		if ($_SERVER['REMOTE_ADDR']=='::1') {
			$addip = ip2long('127.0.0.1');
		}//发布人IP
		 $classId = $_POST['pid']	;//类别ID
		
		$n='rid, tid, uid, content, createtime, lastpost,addip, pid';
		$v='1, '.$tid.', '.$authorid.', "'.$content.'", '.$createtime.', '.$addip.', '.$classId.','.$lastpost.'';
		/* echo $v; */
		/* $result = dbInsert($link,'posts', $n, $v);
		var_dump($result); */
		$sql = "insert into posts(rid,tid,uid,content,createtime,lastpost,addip,pid) values(1,$tid,$authorid,'$content', $createtime,'$lastpost',$addip,$classId)";
		/* echo $sql; */
		$result = mysqli_query($link,$sql);
		/* var_dump($result); */
		if(!$result)
		{
			$msg = '<font color=red><b>回复失败，请联系管理员</b></font>';
			
			include 'action.php';
			exit;
		}else{
			$money = 1;	//回帖赠送积分
			$result = dbUpdate($link,'user', "gold=gold+{$money}", 'id='.$_COOKIE['id'].'');
			
			//更新帖子的回复数量[replytotal]
			$result = dbUpdate($link,'posts', 'replytotal=replytotal+1', 'id='.$tid.'');

			//更新版块表的回复数量[replycount]
			/* $result = dbUpdate('category', 'replycount=replycount+1', 'cid='.$classId.''); */
			//header('location:detail.php?id='.$Id);
			$msg = '<font color=red><b>帖子回复成功</b></font>';
			
			include 'action.php';

			$msg = '回帖赠送';
			include 'layer.php';

			exit;

		}
	
	}
//////////////////////////////////
	//读取帖子信息
		$TiZi = dbSelect($link,'posts','*','id='.$Id.' and isdelete=0 and rid=0','',1);
		$authorid = $TiZi[0]['uid'];		//作者ID
		$Title = $TiZi[0]['title'];		//标题
		$Content = $TiZi[0]['content'];		//内容
		$Createtime = date('Y-m-d H:i:s',$TiZi[0]['createtime']);		//发布时间
		/* var_dump($Createtime); */
		
		$classId = $TiZi[0]['pid'];		//版块ID
		$Replycount = $TiZi[0]['replytotal'];	//回复数量
		$Hits = $TiZi[0]['visittotal'];
		/* var_dump($Hits); */	//点击数量
		$Elite = $TiZi[0]['iselite'];		//精华
		$Rate = $TiZi[0]['needgold'];		//所需积分数量
		$zD = $TiZi[0]['istop'];
		$sTyle = $TiZi[0]['style'];
	//读取导航索引
	$category = dbSelect($link,'plate','id,name,sid,masters','sid<>0 and id='.$classId.'','',1);
	/* var_dump($category); */
	if($category)
	{
		$smallName = $category[0]['name'];
		$smallId = $category[0]['id'];
		if(!empty($category[0]['masters'])){
		$BanZhu = $category[0]['masters'];
		}
		$parentCategory = dbSelect($link,'plate','id,name','id='.$category[0]['sid'].'','',1);
		/* var_dump($parentCategory); */
		if($parentCategory)
		{
			$bigName = $parentCategory[0]['name'];
			$bigId = $parentCategory[0]['id'];
		}else{
			$msg = '<font color=red><b>非法操作</b></font>';
			include 'action.php';
			exit;
		}
	}else{

		$msg = '<font color=red><b>非法操作</b></font>';
		include 'action.php';
		exit;
	}
	 /* var_dump($bigName);
	var_dump($bigId);  */
	/*=========================================*/
	/*=========================================*/
	 //点击帖子时访问次数加1   visittotal
		$result = dbUpdate($link,'posts', 'visittotal=visittotal+1', 'id='.$Id.' and isdelete=0 and rid=0');
		/*  var_dump($result); */ 
		if(!$result)
		{
			$msg = '<font color=red><b>您浏览的帖子不存在或已被删除</b></font>';
			
			include 'action.php';
		}
		

		//读取上一条
		$top = dbSelect($link,'posts','id','id>'.$Id.' and isdelete=0 and rid=0','id desc',1);
		if($top)
		{
			$topid=$top[0]['id'];
		}else{
			$topid=false;
		}
		//读取下一条
		$down = dbSelect($link,'posts','id','id<'.$Id.' and isdelete=0 and rid=0','id desc',1);
		if($down){
			$downid = $down[0]['id'];
		}else{
			$downid = false;
		}
		

		//读取会员信息
		$User = dbSelect($link,'user','name,email,level,regtime,lasttime,icon,signature,gold','id='.$authorid.'','',1);
		if($User)
		{
			$U_sername = $User[0]['name'];
			$E_mail = $User[0]['email'];
			$U_dertype = $User[0]['level'];
			$R_egtime = formatTime(strtotime($User[0]['regtime']),false);
			$L_asttime = formatTime($User[0]['lasttime'],false);
			$P_icture = $User[0]['icon'];
			$A_utograph = $User[0]['signature'];
			$G_rade = $User[0]['gold'];
		}	
		//该主题下的所有回复数量 
		$TZCount = dbSelect($link,'posts','count(id)','tid='.$Id.' and isdelete=0 and rid=1');
		/* var_dump($TZCount); */
		if(!empty($TZCount[0]['count(id)'])){
			$zCount = $TZCount[0]['count(id)'];
		}else{
			$zCount=1;
		}
		/* echo $zCount; */
		$linum = 10;
		$Lpage = empty($_GET['page'])?1:$_GET['page'];
		/* var_dump($Lpage); */
		
		//循环帖子回复信息
		$select = 't.id as id,t.uid as uid,t.content as content,t.createtime as createtime,t.addip as addip,t.isdelete as isdelete,t.iselite as iselite,t.istop as istop,t.isdisplay as isdisplay,u.id as id,u.name as name,u.email as email,u.level as level,u.regtime as regtime,u.lasttime as lasttime,u.icon as icon,u.signature as signature,u.gold as gold';
		$HTiZi = dbSelect($link,'posts as t,user as u',$select,'t.tid='.$Id.' and t.uid=u.id and t.isdelete=0 and t.rid=1','istop desc,t.id asc' , setLimit($linum));/* */
		/* var_dump(mysqli_error($link));*/
		/*and  t.tid='.$Id.' */
		/* exit; */
		/* var_dump($HTiZi); */
		$title = '帖子-' . $Title;
		$ggg = 'iPhone 游戏软件分享区';
		/*============================================*/
		//查找版主或管理员
		
		@$NBanZhu = explode(',',$BanZhu);
		
		/* var_dump($NBanZhu); */
		if(!empty($_COOKIE['id'])){
		if(in_array($_COOKIE['id'], $NBanZhu))
		{
			$GuanLi=true;
		}else{
			if($_COOKIE['level'])
			{
				$GuanLi=true;
			}
		}
		}
		if(!empty($GuanLi)){
			if($GuanLi){
			//删除，放入回收站
			if(!empty($_GET['delete'])){
				
				$result = dbUpdate($link,'posts', "isdelete=1", 'id='.$Id.'');
				header('location:neihe.php?classid=' . $classId);
		
			}
		}
		//置顶
		if(!empty($_GET['istop'])){
			if($_GET['istop'] == 1){
				$result = dbUpdate($link,'posts', "istop=1", 'id='.$Id.'');
			}else{
				$result = dbUpdate($link,'posts', "istop=0", 'id='.$Id.'');
			}
			header('location:detail.php?id='.$Id);
		}
		//高亮
		
		if(!empty($_GET['style'])){
			
			if(($_GET['style']) == 1){
				$result = dbUpdate($link,'posts', "style='red'", 'id='.$Id.'');
			}else{
				$result = dbUpdate($link,'posts', "style=0", 'id='.$Id.'');
			}
			header('location:detail.php?id='.$Id);
		}
		//精华
		if(!empty($_GET['elite'])){
			if($_GET['elite'] == 1){
				$result = dbUpdate($link,'posts', "iselite=0", 'id='.$Id.'');
			}else{
				$result = dbUpdate($link,'posts', "iselite=1", 'id='.$Id.'');
			}
			
			header('location:detail.php?id='.$Id);
		}
		//删除回帖，放入回收站
		if(!empty($_GET['delht'])){
			
			$result = dbUpdate($link,'posts', "isdelete=1", 'id='.$_GET['hid'].'');
			 
			header('location:detail.php?id='.$Id);
	
		}
		//回帖置顶
		if(!empty($_GET['istopht'])){
			if($_GET['istopht'] == 1){
				$result = dbUpdate($link,'posts', "istop=1", 'id='.$_GET['hid'].'');
			}else{
				$result = dbUpdate($link,'posts', "istop=0", 'id='.$_GET['hid'].'');
			}
			header('location:detail.php?id='.$Id);
		}
		//回帖屏蔽
		/* var_dump($_GET['isdisplayht']);
		die; */
		if(!empty($_GET['isdisplayht'])){
			if($_GET['isdisplayht'] == 1){
				$result = dbUpdate($link,'posts', "isdisplay=1", 'id='.$_GET['hid'].'');
				
			}else{
				$result = dbUpdate($link,'posts', "isdisplay=0", 'id='.$_GET['hid'].'');
			}
			/* var_dump($result);
			exit; */
			header('location:detail.php?id='.$Id);
		} 
	} 
			//给帖子付款
	/* if(!empty($_POST['paysubmit']))
	{
		//判断用户是否登录
		if(!$_COOKIE['id'])
		{
			$notice='抱歉，您尚未登录';
			include 'action.php';
			exit;
		}

		foreach($_POST['oidarr'] as $key=>$val)
		{
			$nval=explode(',',$val);
			//将order表中的ispay更新为1
			$res = dbUpdate('order', 'ispay=1', 'oid='.$key.'');
			//扣钱
			$res = dbUpdate('user', 'grade=grade-'.$nval[1].'', 'uid='.$_COOKIE['uid'].'');
			//给作者加钱
			$res = dbUpdate('user', 'grade=grade+'.$nval[1].'', 'uid='.$nval[0].'');
		}
		header('location:detail.php?id='.$Id);
		exit;

	} */


	




/* var_dump($HTiZi); */







////////////////////////////////////////////////////
$vars = compact('title','now','postdata','userSum','htSum','postsSum','newUser','newPosts','row','row1','row2','row3','bigName','bigId','smallName','smallId','OnCname','JCount','zCount','compere','classId','ListContent','newt','Title','Id','Hits','Replycount','Createtime','downid','topid','Rate','Content','U_sername','Lpage','P_icture','G_rade','U_dertype','HTiZi','linum','GuanLi','zD','Elite','sTyle','TZCount');
display('/home/head.html',$vars);
display('/home/detail.html',$vars); 
display('/home/foot.html',$vars);