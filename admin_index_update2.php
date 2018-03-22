<?php
//连接数据库
include './common/home.php';



/* var_dump($id); */
/* var_dump($id); */

$link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);
/* var_dump($link); */
/*   var_dump($_POST); */ 

 /* $rid = $_POST['rid']; 
 $sid = $_POST['sid'];  */ //大板块id
/*  $rsid = $_POST['rsid']; */  //小板块id
/* var_dump($id); */ 
/* var_dump($rid); */
 //大板块orderby
/* var_dump($orderby); */
/* $rorderby=$_POST['rorderby']; */ //小板块orderby
/* var_dump($rorderby); */
  //大板块name
/* $rname=$_POST['rname']; */ //小板块name
	//小板块版主
if (isset($_POST['bkbt'])){
	//修改板块
	/*  */
	 /* if($sid) //如果是大板块
	{  */
		 $id = $_POST['id'];
		 $orderby=$_POST['orderby'];
		 /* var_dump($_POST); */
		 $name=$_POST['name'];
		 $masters=$_POST['masters'];
		 foreach ($id as $key => $value){
			/* echo $key;
			echo $value; */
			$result = dbUpdate($link,'plate',['orderby'=>(int)$orderby[$key], 'name'=>$name[$key],'masters'=>$masters[$key]],'id='.$value);
			 var_dump($result);
			//exit;
		}
	/* }elseif($rsid){ */
		//如果是小板块
		
		/* foreach ($rid as $key => $value){
			$result = dbUpdate($link,'plate',['orderby'=>$rorderby[$key], 'name'=>$rname[$key], 'masters'=>$masters[$key]],'id='.$value);
		}	
	 } */
		
	
			 header('location:' . $_SERVER['HTTP_REFERER']);
		
}else if(isset($_POST['ssssde'])){
	$rid = $_POST['rid'];
	 var_dump($rid);
	if (is_array($rid)) {
		$idSet = join(',', $rid);
		$where = 'id in(' . $idSet . ')';
	}else {
		$where = 'id=' . $rid;
	}
	$result = dbDelete($link, 'plate', $where);
	
	header('location:' . $_SERVER['HTTP_REFERER']);
}