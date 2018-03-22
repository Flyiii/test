<?php

include './common/home.php';

$row2 = dbSelect($link,'plate','*','','orderby desc');


$now = date('Y-m-d H:i:s');
$title = '十分钟学院-找回密码';
$vars = compact('title','now','row2');
display('/home/head.html',$vars);
display('/home/findmm.html',$vars); 
display('/home/foot.html',$vars);