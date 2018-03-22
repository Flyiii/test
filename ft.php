<?php

include './common/home.php';




$title = '发帖-十分钟学院';

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

//判断用户是否登录
	if(empty($_COOKIE['id']))
	{
		$msg = '<font color=red><b>抱歉,登陆后才可以发帖</b></font>';
		include 'action.php';
		exit;
	}

//判断ID是否存在
	if(empty($_REQUEST['classid']) || !is_numeric($_REQUEST['classid']))
	{
		$msg = '<font color=red><b>禁止非法操作</b></font>';
		
		include 'action.php';
	}
	$classId = $_REQUEST['classid'];
	/* var_dump($classId); */

//读取导航索引
$category = dbSelect($link,'plate','id,name,sid','sid<>0 and id='.$classId.'','',1);
	/* var_dump($category); */
	if($category)
	{
		$smallName = $category[0]['name'];
		$smallId = $category[0]['id'];
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
	var_dump($bigId); */


//发布帖子
	if(!empty($_POST['sub']))
	{
		$authorid = $_COOKIE['id'];		//发布人ID
		$title = trim($_POST['title']);		//标题
		/* var_dump($title); */
		@$content = trim($_POST['content']);		//内容
		$createtime = time();
		$lastpost = date('Y-m-d H:i:s');
		/* $createtime = date('Y-m-d H:i:s');	 */	//发表时间
		if ($_SERVER['REMOTE_ADDR'] == '::1') {
			$addip = ip2long('127.0.0.1');//发布人IP
			
		} else {
			$addip = ip2long($_SERVER['REMOTE_ADDR']);//发布人IP
			
		}
		
		$classId = $_POST['classid'];		//类别ID
		$rate = $_POST['sj'];	//帖子售价

		$n = 'rid, uid, title, content, createtime,lastpost, addip, pid, needgold';
		$v = '0, '.$authorid.', "'.$title.'", "'.$content.'", '.$createtime.','.$lastpost.', '.$addip.', '.$classId.', '.$rate.'';
		
		/* $result = dbInsert($link,'posts', $n, $v); */
		if(!empty($rate)){
		    $sql = "insert into posts(uid,title,content,createtime,lastpost,addip,pid,needgold) values($authorid,'$title','$content',$createtime,'$lastpost',$addip,$classId,$rate)";
		}else{
			$sql = "insert into posts(uid,title,content,createtime,lastpost,addip,pid) values($authorid,'$title','$content', $createtime,'$lastpost',$addip,$classId)";
		}
		/* echo $sql; */
		$result = mysqli_query($link,$sql);
		/* var_dump($result); */
		$insert_id = dbSelect($link,'posts','id','title="'.$title.'"','id desc',1);
		$insertId = $insert_id[0]['id'];
		/* var_dump($insertId); */
		/*更新板块最后的帖子ID*/
		$newPosts = dbSelect($link,'posts','*','','createtime desc',1); //最新帖子
		$data['lastpid'] = $insertId;    //帖子ID
		/* $data['lastpid'] = $newPosts[0]['id']; */
		$changeLastpid = dbUpdate($link,'plate',$data,'id=' . $classId); 
		/*=========================*/
		/* die; */
		if (!$result) {
			$msg = '<font color=red><b>帖子发表失败，请联系管理员</b></font>';
			include 'action.php';
			exit;
		}else{
			if(empty($content)){
				$msg = '<font color=red><b>帖子内容不能为空</b></font>';
				include 'action.php';
				exit;
			}
			$money = 2;	//发帖赠送积分
			$result = dbUpdate($link,'user', "gold=gold+{$money}", 'id='.$_COOKIE['id'].'');
			
			
		//更新版块表的主题数量[Motifcount](跟帖是回复数量[eplycount])和最后发表[lastpost]    motifcount=motifcount+1,                     replytotal
			$last = $insertId.'+||+'.$title.'+||+'.$createtime.'+||+'.$_COOKIE['name'];
			$result = dbUpdate($link,'plate', 'lastpost="'.$last.'"', 'id='.$classId.'');

			$msg = '<font color=red><b>帖子发表成功</b></font>';
			include 'action.php';
			
			$msg = '发帖赠送';
			include 'layer.php';
			exit;

		}
	
	}

	$OnMenu = dbSelect($link,'plate','id,name','id='.$classId.' and isdelete=0','orderby desc,id desc');
	if(!$OnMenu)
	{
		$msg = '<font color=red><b>没有找到该版块</b></font>';
		include 'action.php';
	}else{
		$OnCid = $OnMenu[0]['id'];
		$OnCname = $OnMenu[0]['name'];
	}




















////////////////////////////////////////////////////
$vars = compact('title','now','postdata','userSum','htSum','postsSum','newUser','newPosts','row','row1','row2','row3','bigName','bigId','smallName','smallId','OnCname','JCount','zCount','compere','classId','ListContent','newt');
display('/home/head.html',$vars);
display('/home/ft.html',$vars); 
display('/home/foot.html',$vars);