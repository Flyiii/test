<?php

include './common/home.php';

/* var_dump($_COOKIE); */
$title = '十分钟学院-管理中心';
//连接数据库
$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
/*用户管理-编辑用户分页*/
///////////////////////////////////////////////////////
//总条数
/*  var_dump($_GET['page']); */
$ipSum = dbSelect($link,'user','count(id)')[0]['count(id)'];
$tZCount = dbSelect($link,'posts','count(rid)','rid<>1 and isdelete<>1');//帖子总数
$tZSum = $tZCount[0][0];//帖子总数
/* var_dump($tZSum); */
$hstZCount = dbSelect($link,'posts','count(rid)','rid<>1 and isdelete<>0');//回收站帖子总数
$hstZSum = $hstZCount[0][0];//回收站帖子总数
/*  exit; */ 
 /* var_dump($hstZSum); */ 
$hTCount = dbSelect($link,'posts','count(rid)','rid<>0 and isdelete<>1');//回帖总数
$hTSum = $hTCount[0][0];//回帖总数
/* var_dump($hTSum); */
$hshTCount = dbSelect($link,'posts','count(rid)','rid<>0 and isdelete<>0');//回收站回帖总数
$hshTSum = $hshTCount[0][0];//回收站回帖总数
/* var_dump($hshTSum); */
//每页显示的条数
$pageSize = 10;
//总条数
$pageCount = ceil($ipSum / $pageSize);
$pageACount = ceil($tZSum / $pageSize);
$pageBCount = ceil($hstZSum / $pageSize);
$pageCCount = ceil($hTSum / $pageSize);
$pageDCount = ceil($hshTSum / $pageSize);
//当前页
$page = empty($_GET['page']) ? 1 : $_GET['page'];
if($page<1){
	$page = 1;
}else if($page > $pageCount){
	$page = $pageCount;
}
///////////////
$pageA = empty($_GET['pageA']) ? 1 : $_GET['pageA'];
if($pageA<1){
	$pageA = 1;
}else if($pageA > $pageACount){
	$pageA = $pageACount;
}
///////////////
$pageB = empty($_GET['pageB']) ? 1 : $_GET['pageB'];
if($pageB<1){
	$pageB = 1;
}else if($pageB > $pageBCount){
	$pageB = $pageBCount;
}
///////////////
$pageC = empty($_GET['pageC']) ? 1 : $_GET['pageC'];
if($pageC<1){
	$pageC = 1;
}else if($pageC > $pageCCount){
	$pageC = $pageCCount;
}
///////////////
$pageD = empty($_GET['pageD']) ? 1 : $_GET['pageD'];
if($pageD<1){
	$pageD = 1;
}else if($pageD > $pageDCount){
	$pageD = $pageDCount;
}
///////////////
//上一页
$prev = ($page == 1) ? 1 : $page -1;
$prevA = ($pageA == 1) ? 1 : $pageA -1;
$prevB = ($pageB == 1) ? 1 : $pageB -1;
$prevC = ($pageC == 1) ? 1 : $pageC -1;
$prevD = ($pageD == 1) ? 1 : $pageD -1;

//下一页
$next = ($page == $pageCount) ? $pageCount : $page + 1;
$nextA = ($pageA == $pageACount) ? $pageACount : $pageA + 1;
$nextB = ($pageB == $pageBCount) ? $pageBCount : $pageB + 1;
$nextC = ($pageC == $pageCCount) ? $pageCCount : $pageC + 1;
$nextD = ($pageD == $pageDCount) ? $pageDCount : $pageD + 1;
$offset = ($page - 1) * $pageSize; 
$offsetA = ($pageA - 1) * $pageSize; 
$offsetB = ($pageB - 1) * $pageSize; 
$offsetC = ($pageC - 1) * $pageSize; 
$offsetD = ($pageD - 1) * $pageSize; 

///////////////////////////////////////////////////////
//查
$userSum = dbSelect($link,'user','count(id)')[0]['count(id)']; //总用户
$postsSum = dbSelect($link,'posts','count(id)')[0]['count(id)']; //总帖子
$row = dbSelect($link,'link','*'); 
$row1 = dbSelect($link,'user','*','','regtime desc',"$offset,$pageSize"); 
$row2 = dbSelect($link,'plate','*','','orderby desc'); 
$row3 = dbSelect($link,'posts','*','','createtime desc'); 
$row4 = dbSelect($link,'forbid','*');
/* var_dump($row4); */
/*================*/

$postdata = dbSelect($link, 'plate plate1,posts u,user c','plate1.name,plate1.id,plate1.sid,plate1.masters, u.replytotal,u.visittotal,u.title,u.createtime,u.id,u.content,u.pid,u.uid,u.rid,u.isdelete,c.name,c.id','plate1.id=u.pid and c.id=u.uid and u.rid=0','',"$offsetA, $pageSize");//联合查询
/* var_dump($postdata); */
$postdataA = dbSelect($link, 'plate plate1,posts u,user c','plate1.name,plate1.id,plate1.sid,plate1.masters, u.replytotal,u.visittotal,u.title,u.createtime,u.id,u.content,u.pid,u.uid,u.rid,u.isdelete,c.name,c.id','plate1.id=u.pid and c.id=u.uid and u.rid=0 and u.isdelete=1','',"$offsetB, $pageSize");//联合查询
/* var_dump($postdataA); */
$postdataB = dbSelect($link, 'plate plate1,posts u,user c','plate1.name,plate1.id,plate1.sid,plate1.masters, u.replytotal,u.visittotal,u.title,u.createtime,u.id,u.content,u.pid,u.uid,u.rid,u.isdelete,c.name,c.id','plate1.id=u.pid and c.id=u.uid and u.rid=1 and u.isdelete=0','',"$offsetC, $pageSize");//联合查询
/* var_dump($postdataB); */
$postdataC = dbSelect($link, 'plate plate1,posts u,user c','plate1.name,plate1.id,plate1.sid,plate1.masters, u.replytotal,u.visittotal,u.title,u.createtime,u.id,u.content,u.pid,u.uid,u.rid,u.isdelete,c.name,c.id','plate1.id=u.pid and c.id=u.uid and u.rid=1 and u.isdelete=1','',"$offsetD, $pageSize");//联合查询
// var_dump($postdataC);


/*================*/
/**解禁ip*/
$now = date('Y-m-d H:i:s');
if(!empty($row[0]['ip'])){
foreach($row4 as $key=>$value){ 
	 $id = $value['id'];
	 $overtime = $value['overtime'];
}
if(strtotime($overtime) < strtotime($now)){
	 $where = 'id=' . $id;
	 $result = dbDelete($link, 'forbid', $where);
if($result && mysqli_affected_rows($link)){
	 header('location:' . $_SERVER['HTTP_REFERER']);
	 } 
}
}
/**/
/////////////////////
$vars = compact('title','userSum','postsSum','row','row1','row2','row3','row4','postdata' ,'postdataA', 'next','prev','pageCount' ,'nextA','prevA','pageACount' ,'tZSum','linum','hstZSum','nextB','prevB','pageBCount','postdataB','nextC','prevC','pageCCount','hTSum','hshTSum','nextD','prevD','pageDCount','postdataC','tZCount');

@$htid = $_GET['htid'];

display('admin/hthead.html',$vars);

switch ($htid) {
	  case 0 :
			display('admin/ht1down.html');
			break;
      case 1 :
            display('admin/ht2down.html',$vars);
			break;
      case 2 :
            display('admin/ht3down.html',$vars);
			break;
      case 3 :
            display('admin/ht4down.html',$vars);
			break;
	  case 4 :
            display('admin/ht1down.html');
			break;
	  case 5 :
            display('admin/ht1down1.html',$vars);
			break;
	  case 6 :
			display('admin/ht2down.html',$vars);
			break;
	  case 7 :
			display('admin/ht2down1.html',$vars);
			break;
	  case 8 :
			display('admin/ht3down.html',$vars);
			break;
	  case 9 :
			display('admin/ht3down1.html',$vars);
			break;
	  case 10 :
			display('admin/ht4down.html',$vars);
			break;
	  case 11 :
			display('admin/ht4down1.html',$vars);
			break;
	  case 12 :
			display('admin/ht4down2.html',$vars);
			break;
	  case 13 :
			display('admin/ht4down3.html',$vars);
			break;
}


