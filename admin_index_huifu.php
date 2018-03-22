<?php
//连接数据库
include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */


$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);

if (isset($_POST['shanchuzt']) && isset($_REQUEST['id'])){
	//删除
	$id = $_REQUEST['id'];
	if (is_array($id)) {
		$idSet = join(',', $id);
		$where = 'id in(' . $idSet . ')';
	}else {
		$where = 'id=' . $id;
	}
	$result = dbDelete($link, 'posts', $where);
	if ($result && mysqli_affected_rows($link)){
		header('location:' . $_SERVER['HTTP_REFERER']);
	}
}elseif(isset($_POST['huifuzt'])){
	$id=$_REQUEST['id'];
	$isdelete=$_POST['isdelete'];
	 var_dump($id); 
	
	  $data['isdelete'] = 0; 
		foreach ($id as $key => $value){ 
					$result = dbUpdate($link,'posts', $data ,'id=' . $value);
					
				 } 
				 
		if ($result && mysqli_affected_rows($link)){
					  header('location:' . $_SERVER['HTTP_REFERER']); 
		}
}
