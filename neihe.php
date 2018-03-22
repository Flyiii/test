<?php

include './common/home.php';




$title = '内容-十分钟学院';

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
//判断ID是否存在
if(empty($_GET['classid']) || !is_numeric($_GET['classid']))
{
		$msg = '<font color=red><b>禁止非法操作</b></font>';
		include 'action.php';
		exit;
}else{
	$classId = $_GET['classid'];
}
//读取精华帖子

	if(!empty($_GET['iselite']))
	{
		$condition = ' and iselite=1';
	}
	/* var_dump($condition); */   
	
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
			
	$OnMenu = dbSelect($link,'plate','id,name,masters','id='.$classId.' and isdelete=0','orderby desc,id desc');	
	/* var_dump($OnMenu); */
	if(!$OnMenu)
	{	
		$msg = '<font color=red><b>没有找到该版块</b></font>';
		include 'action.php';
	}else{
		$OnCid = $OnMenu[0]['id'];
		$OnCname = $OnMenu[0]['name'];
		$compere = $OnMenu[0]['masters'];
	}
	//读取所有大版块信息
	$LTmenu = dbSelect($link,'plate','id,name','sid=0 and isdelete=0','orderby desc,id desc');	
	//读取所有小版块信息 
	$LTsMenu = dbSelect($link,'plate','id,name,sid','sid<>0 and isdelete=0','orderby desc,id desc');
/* var_dump($LTsMenu)	; */
	//该版块下的主题数量 
	 if(!empty($condition)){ 
		$TZCount = dbSelect($link,'posts','count(id)','rid=0 and isdelete=0 and pid='.$classId.' '.$condition.'');
	 }else{
		$TZCount = dbSelect($link,'posts','count(id)','rid=0 and isdelete=0 and pid='.$classId.' ');
	} 
	/* var_dump($TZCount); */
	$zCount = $TZCount[0]['count(id)'];
	$linum = 10;
	
	//读取版块内帖子信息
	 if(!empty($condition)){ 
		$ListContent = dbSelect($link,'posts','*','rid=0 and isdelete=0 and pid='.$classId.' '.$condition.'','istop desc,id desc',setLimit($linum));
	 }else{
		$ListContent = dbSelect($link,'posts','*','rid=0 and isdelete=0 and pid='.$classId.' ','istop desc,id desc',setLimit($linum));
	} 
	/* var_dump($ListContent); */
	//读取版块内回帖信息
	$htContent = dbSelect($link,'posts','*','rid=1 and isdelete=0 and pid='.$classId.' ','istop desc,id desc');
	/* var_dump($htContent); */
	$hhhht = dbSelect($link,'posts','count(id)','rid=1 and isdelete=0 and pid='.$classId.' ','istop desc,id desc');
	/* var_dump($hhhht); */
	//该板块下今日主题数量
	$newt = time()-1000;
	$start_time = strtotime(date('Y-m-d',time()));
	$JRCount = dbSelect($link,'posts','count(id)','rid=0 and isdelete=0 and (createtime>='.$start_time.'  and createtime<='.time().')');
	/* var_dump($JRCount); */
	$JCount = $JRCount[0]['count(id)'];
			
	/* var_dump($OnCname);
	var_dump($JCount);
	var_dump($zCount);
	var_dump($compere);
	var_dump($ListContent );
			
var_dump(getListUName($ListContent[0]['pid']));
var_dump(getUserName($ListContent[0]['uid'])); */
			
			
			
			
			
////////////////////////////////////////////////////
$vars = compact('title','now','postdata','userSum','htSum','postsSum','newUser','newPosts','row','row1','row2','row3','bigName','bigId','smallName','smallId','OnCname','JCount','zCount','compere','classId','ListContent','newt','OnCid','linum','htContent','hhhht');
display('/home/head.html',$vars);
display('/home/neihe.html',$vars); 
display('/home/foot.html',$vars);
