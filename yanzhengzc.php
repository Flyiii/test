<?php

include './common/home.php';

$result = dbSelect($link,'user','name','name="'.$_POST['user'].'"');


/* $row2 = dbSelect($link,'plate','*','','orderby desc');


$title = '用户注册-10分学院'; */
$now = date('Y-m-d H:i:s');
/* $vars = compact('title','now','row2');
display('/home/head.html',$vars); */
/* display('/home/yanzhengzc.html',$vars);
display('/home/foot.html',$vars); */

//检验用户名
if($_POST['user'] == $result[0]['name']){
	$alterNotice = true;
	$msgArr[] = '<font color=red><b>用户名已被占用</b></font>';
} 
if (!empty($_POST['sub']))
	{
	
	if (empty($_POST['user'])) {
	$alterNotice = true;
	/* exit('用户名不能为空'); */
	$msgArr[] = '<font color=red><b>用户名不能为空</b></font>';
}
if (strlen($_POST['user']) < 6) {
	$alterNotice = true;
	/* exit('用户名不能小于6位'); */
	$msgArr[] = '<font color=red><b>用户名不能小于6位</b></font>';
}
$user =trim ($_POST['user']);
setcookie('name',$_POST['user'],time()+2592000);
//检验密码
if (empty($_POST['password'])) {
	$alterNotice = true;
	/* exit('密码不能为空'); */
	$msgArr[] = '<font color=red><b>密码不能为空</b></font>';
}
if (empty($_POST['pass'])) {
	$alterNotice = true;
	/* exit('确认密码不能为空'); */
	$msgArr[] = '<font color=red><b>确认密码不能为空</b></font>';
}
if ($_POST['password'] != $_POST['pass']) {
	$alterNotice = true;
	/* exit('两次密码不一样'); */
	$msgArr[] = '<font color=red><b>两次密码不一样</b></font>';
}
$password = md5(trim($_POST['password']));

//检验邮箱
 if(checkEmail($_POST['email']))
{
	$alterNotice = true;
	$msgArr[] = '<font color=red><b>邮箱格式不正确</b></font>';
} 
//检验密码不能为纯数字或纯字母
 if(checkPwd($_POST['password']))
{
	$alterNotice = true;
	$msgArr[] = '<font color=red><b>密码格式不正确</b></font>';
} 
//检验验证码
session_start();

if(strtolower($_POST['yzm']) != strtolower($_SESSION['yzm'])) {
	$alterNotice = true;
	$msgArr[] = '<font color=red><b>验证码错误</b></font>';
}
//返回错误信息
if($alterNotice)
{
	$msg = join('<br />', $msgArr);
	/* header('location:yanzhengsb.php');  */
	include 'yanzhengsb.php';
	exit;
}
/////////////

///////创建用户////////
$email = trim($_POST['email']);
$regip = $_SERVER['REMOTE_ADDR'];
if ($regip == '::1') {
	$regip = '127.0.0.1';
}
$regip = ip2long($regip);
var_dump($regip);
$link = mysqli_connect('localhost', 'root', '');
mysqli_select_db($link, 'mybbs');
mysqli_set_charset($link, 'utf8');
$gold = 50;
$sql = "insert into user (name,pwd,email,regip,regtime,gold) values('$user','$password','$email','$regip','$now','$gold')";

$result = mysqli_query($link, $sql);
var_dump($result);
 if($result && mysqli_affected_rows($link)) {
	//注册成功
	$select=dbSelect($link,'user','*','','regtime desc');
	setcookie('id',$select[0]['id'],time()+2592000);
	setcookie('name',$select[0]['name'],time()+2592000);
	setcookie('pwd',$select[0]['pwd'],time()+2592000);
	setcookie('email',$select[0]['email'],time()+2592000);
		
	setcookie('level',$select[0]['level'],time()+2592000);
	setcookie('icon',$select[0]['icon'],time()+2592000);
	setcookie('gold',$select[0]['gold'],time()+2592000);
    header('location:yanzhengcg.php'); 
	} 
}