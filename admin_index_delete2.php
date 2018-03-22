<?php

include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */

$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);

///////////////////////////////////////////////
if (isset($_POST['btdelete']) && isset($_REQUEST['id'])){
	//删除
	$id = $_REQUEST['id'];
	if (is_array($id)) {
		$idSet = join(',', $id);
		$where = 'id in(' . $idSet . ')';
	}else {
		$where = 'id=' . $id;
	}
	$result = dbDelete($link, 'user', $where);
	if ($result && mysqli_affected_rows($link)){
		header('location:' . $_SERVER['HTTP_REFERER']);
	}
}
