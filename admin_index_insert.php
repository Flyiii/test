<?php
//连接数据库
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

$sql = "insert into link(orderby,name,url,intro,icon) values('$orderby','$name','$url','$intro','$icon')";
$result = mysqli_query($link,$sql);

 if($result && mysqli_affected_rows($link)){
	header('location:admin_index.php?htid=5');
}
