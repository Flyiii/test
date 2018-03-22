<?php


/* include './common/home.php'; */

 /* include 'yanzhengzc.php';  */

/* var_dump($_POST['msg']);
$msg = $_POST['msg']; */
 $row2 = dbSelect($link,'plate','*','','orderby desc'); 
$title = '提示';  
 $now = date('Y-m-d H:i:s'); 
 $vars = compact('title','now','row2','msg');  
 display('/home/head.html',$vars); 
 display('/home/action.html',$vars);  
 display('/home/foot.html',$vars); 
