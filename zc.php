<?php

include './common/home.php';

$row2 = dbSelect($link,'plate','*','','orderby desc');


$title = '首页-十分钟学院-用户注册';
$now = date('Y-m-d H:i:s');
$vars = compact('title','now','row2');
display('/home/head.html',$vars);
display('/home/zc.html',$vars); 
display('/home/foot.html',$vars);


