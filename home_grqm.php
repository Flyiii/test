<?php

include './common/home.php';

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

/*$bigId = strIsInteger($_GET['bigid']);*/	//大版块ID 


$vars = compact('title','now','postdata','userSum','htSum','postsSum','newUser','newPosts','row','row1','row2','row3');
display('/home/head.html',$vars);
display('/home/home_grqm.html',$vars); 
display('/home/foot.html',$vars);








