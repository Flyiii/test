<?php

include './common/home.php';

 /* var_dump($_COOKIE['realname']); */
/* var_dump($_COOKIE['icon']); */
/* var_dump($_COOKIE['id']);
var_dump($_COOKIE['name']);
var_dump($_COOKIE['level']);
var_dump($_COOKIE['gold']); */
/* var_dump(time());
var_dump( strtotime(date('Y-m-d H:i:s'))); */


$title = '首页-十分钟学院';

$now = date('Y-m-d H:i:s');
/* echo $now; */
//查
$tZCount = dbSelect($link,'posts','count(rid)','rid<>1 and isdelete<>1');//帖子总数
$tZSum = $tZCount[0][0];//帖子总数
$hTCount = dbSelect($link,'posts','count(rid)','rid<>0 and isdelete<>1');//回帖总数
$hTSum = $hTCount[0][0];//回帖总数
$Sum = $tZSum + $hTSum;//未回收主贴+未回收回帖
/* var_dump($Sum); */
$userSum = dbSelect($link,'user','count(id)')[0]['count(id)']; //总用户
/* var_dump($userSum); */
$htCount = dbSelect($link,'posts','count(rid)','rid<>0');//回帖总数
/* var_dump($htCount); *///回帖总数
$htSum = $htCount[0][0];//回帖总数
/* echo $htSum; *///回帖总数
/*==============================*/
$postsSum = dbSelect($link,'posts','count(id)')[0]['count(id)']; //总帖子
/* var_dump($postsSum); */ 
$row = dbSelect($link,'link','*','','orderby desc'); 
 /*  var_dump($row); */
$row1 = dbSelect($link,'user','*','','regtime desc'); 
/* var_dump($row1); */
$newUser = dbSelect($link,'user','*','','regtime desc',1); //最新会员
$newPosts = dbSelect($link,'posts','*','','createtime desc',1); //最新帖子
/* var_dump($newPosts); */
 /*  var_dump($newUser); */ 
$row2 = dbSelect($link,'plate','*','','orderby desc'); 
/* var_dump($row2); */
$row3 = dbSelect($link,'posts','*','','createtime desc'); 
/* var_dump($row3[0]); */
$row4 = dbSelect($link,'forbid','*'); 
$postdata = dbSelect($link, 'plate plate1,posts u,user c','plate1.name,plate1.id,plate1.sid,plate1.masters, u.replytotal,u.visittotal,u.title,u.createtime,u.id,u.content,u.pid,u.uid,u.rid,u.isdelete, c.name,c.id',' plate1.id=u.pid and c.id=u.uid ');//联合查询
/* var_dump($postdata); */
/* var_dump($postdata); */ 
/* $sql ='select * from plate inner join posts on plate.id=posts.pid where rid=0 group by posts.pid order by createtime desc';
$result=mysqli_query($link,$sql);
$row5=mysqli_fetch_array($result);
var_dump($row5); */





/* $bigId = strIsInteger($_GET['bigid']);  */
/*  var_dump($bigId); */ 
/* var_dump($bigId); */
//读取所有小版块信息 
/* $LTsMenu = dbSelect($link,'plate','*','sid<>0 and isdelete=0','orderby desc,id desc'); */
 /* var_dump($LTsMenu); */
//读取指定小版块信息 
/* $LTsMenu = dbSelect($link,'plate','*','sid='.$bigId.' and isdelete=0','orderby desc,id desc'); 
$LTsMenu = dbSelect($link,'plate','*','sid<>0 and isdelete=0','orderby desc,id desc'); */
/* var_dump($LTsMenu); 
 */

/* $ListContent = dbSelect($link,'posts','*','rid=0 and isdelete=0 and pid='.$bigId.'','istop desc,id desc');
var_dump($ListContent); */

























$sum=0;
$um=0;
$vars = compact('title','now','Sum','postdata','userSum','htSum','postsSum','newUser','newPosts','row','row1','row2','row3','sum','um');
display('/home/head.html',$vars);
display('/home/sy.html',$vars); 
display('/home/foot.html',$vars);




/*
switch ($bigid) {
	  case 0 :
			display('/home/shouye.html');
			break;
      case 1 :
            display('/home/shouye1.html');
			break;
      case 2 :
            display('/home/shouye2.html');
			break;
      case 3 :
            display();
			break;
}
 */




