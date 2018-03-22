<?php

include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */


$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
$orderby = $_POST['orderby'];
$name = $_POST['name'];
$url = $_POST['url'];
$intro = $_POST['intro'];
$icon = $_POST['icon'];

if (isset($_POST['delete']) && isset($_REQUEST['id'])){
	//删除
	$id = $_REQUEST['id'];
	if (is_array($id)) {
		$idSet = join(',', $id);
		$where = 'id in(' . $idSet . ')';
	}else {
		$where = 'id=' . $id;
	}
	$result = dbDelete($link, 'link', $where);
	if ($result && mysqli_affected_rows($link)){
		header('location:' . $_SERVER['HTTP_REFERER']);

	}
	
}else if (isset($_POST['change'])){
	$rid = $_POST['rid'];
	//修改
	/* if (empty($orderby)){
		exit('修改失败');
	}
	if (empty($name)){
		exit('修改失败');
	}
	if (empty($url)){
		exit('修改失败');
	} */
	foreach ($rid as $key => $value){
		$result = dbUpdate($link,'link',['orderby'=>$orderby[$key], 'name'=>$name[$key], 'url'=>$url[$key], 'intro'=>$intro[$key]],'id='.$value);
		var_dump($result);
	}

	
		 header('location:' . $_SERVER['HTTP_REFERER']);

	
}