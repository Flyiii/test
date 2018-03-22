<?php
//连接数据库
include './common/home.php';
//删
/* var_dump($id); */
/* var_dump($id); */


$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);

$name = $_POST['bankuainame'];
$sid = $_POST['xiala'];
echo $name;
echo $id;
$sql = "insert into plate(sid,name) values('$sid','$name')";
echo $sql;
$result = mysqli_query($link,$sql);
 if($result && mysqli_affected_rows($link)){
	 header('location:admin_index.php?htid=8');
}
