<?php
//连接数据库
include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */

$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
/* var_dump($link);
var_dump($_POST); */

	$id=$_GET['id'];
	var_dump($id);
	
	$data['islock'] = 0;
		foreach ($id as $key => $value){ 
					$result = dbUpdate($link,'user',$data,'id=' . $value);
					var_dump ($value);
				 } 
		if ($result && mysqli_affected_rows($link)){
					  header('location:' . $_SERVER['HTTP_REFERER']); 
		}

