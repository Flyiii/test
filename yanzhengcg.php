<?php


include './common/home.php';

$row2 = dbSelect($link,'plate','*','','orderby desc');


$title = '用户注册-10分学院';
$now = date('Y-m-d H:i:s');
$vars = compact('title','now','row2');
display('/home/head.html',$vars);
display('/home/yanzhengcg.html',$vars);
display('/home/foot.html',$vars);
