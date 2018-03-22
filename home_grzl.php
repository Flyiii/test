<?php

include './common/home.php';

$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
if (!empty($_POST['sub'])){
	@$realname=$_POST['user'];
	@$sex=$_POST['sex'];
	@$born=[$_POST['nian'],$_POST['yue'],$_POST['ri']];
	@$borday=join(',',$born);

	@$city=$_POST['place'];
	@$qqnum=$_POST['qqnum'];
	$id=$_COOKIE['id'];
	
		
	$result = dbUpdate($link,'user',['realname'=>$realname,'sex'=>$sex,'born'=>$borday,'city'=>$city,'qqnum'=>$qqnum],'id=' . $id);
/* 	var_dump($result); */
					
		/* if ($result && mysqli_affected_rows($link)){
					  header('location:' . $_SERVER['HTTP_REFERER']); 
		} */
	if($result){
		 setcookie('realname',$realname,time()+2592000);
		
		 setcookie('qqnum',$qqnum,time()+2592000);
	}

	$alterNotice = true; 
    $msgArr[] = '<font color=red><b>修改成功,三秒后自动返回....</b></font>';  
}





  if($alterNotice)
{
	$msg = join('<br />', $msgArr);
 
	include 'action.php';
	exit;
}  