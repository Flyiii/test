<?php
include './common/home.php'; 
if(!empty($_POST['sub'])){
	$mimes = ['image/png','image/jpeg','image/gif'];
	$suffixes = ['png','jpg','jpeg','gif'];
	/* $result = upload('icon',$mimes,$suffixes);
	var_dump($result); */
	$picture=upload('icon',$mimes,$suffixes);
	/* var_dump($picture); */
	$icon=$picture['msg'];
	/* echo $icon; */
	
	
	 $id=$_COOKIE['id'];
	/* var_dump($id); */
		
	$data['icon'] =$icon ;
			
	$result = dbUpdate($link,'user',$data,'id=' . $id);
	 if($result){
		 setcookie('icon',$icon,time()+2592000);
	 }
	 $alterNotice = true; 
	 $msgArr[] = '<font color=red><b>修改头像成功,三秒后自动返回....</b></font>'; 
	 if($alterNotice)
	 {
		$msg = join('<br />', $msgArr);
			 
		include 'action.php';
		exit;
     }  

}
 
