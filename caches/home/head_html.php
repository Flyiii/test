<html>
<head>
	
	<title><?=$title;?></title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/mybbs/public/css/base.css">
</head>
<body class="body">
	<div class="head_top">
		<a href="">设为首页</a>
		<a href="">收藏本站</a>
	</div>
	<!--============================登陆后================================-->
	<?php if (!empty($_COOKIE['id'])): ?>
	<div class="head_body">
		<img class="head_logo" src="http://localhost/mybbs/public/img/images/logo.jpg"/>
		<div class="dl_right clearFix">
			<div class="dl_one">
				<div class="dl_one_a">
					<ul>
						<li class="dl_a_li1"></li>
						<li><a  class="dl_a_li2" href="home.php"><!-- admin --><?=$_COOKIE['name'];?></a></li>
						<?php if ($_COOKIE['level'] == 0): ?>
						<li><a  class="dl_a_li3" href="home.php">设置</a></li>
						<?php else: ?>
						<li><a  class="dl_a_li3" href="home.php">设置</a></li>
						<li><a  class="dl_a_li3"  href="dladmin.php">管理</a></li>
						<?php endif; ?>
						<li><a  class="dl_a_li4" href="logout.php?esc=1">退出</a></li>
					</ul>
				</div>
				<div class="dl_one_b">
				<?php $link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);;?>
					<span class="dl_jifen">积分:<?= dbSelect($link,'user','*',"id=".$_COOKIE['id']."")[0]['gold'];?></span>
					<?php if ($_COOKIE['level'] == 1): ?>
					<span>用户权限:管理员</span>
					<?php else: ?>
					<span>用户权限:普通用户</span>
					<?php endif; ?>
				</div>
			</div>
			<div>
				<?php if (!empty($_COOKIE['icon'])): ?>
				<img class="dl_two" src="http://localhost/mybbs/<?= dbSelect($link,'user','*',"id=".$_COOKIE['id']."")[0]['icon'];?>"/>
				<?php else: ?>
				<img class="dl_two" src="http://localhost/mybbs/public/img/images/avatar_blank.gif"/>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php else: ?>
	<!--============================登录前=================================-->
	<div class="head_body">
		<img class="head_logo" src="http://localhost/mybbs/public/img/images/logo.jpg"/> 
		<form action="post.php" method="post">
			<div class="head_right clearFix">
				<div class="head_right_a">
					<i>用户名</i>
					<input class="head_text" type="text" name="user" value="">
					<input class="head_check" type="checkbox" name="check" id="zd" value=""><label  for="zd">&nbsp; 自动登录</label>
					<a class="head_zmm" href="findmm.php">找回密码</a>
				</div>
				<div class="head_right_b">
					<i>密码</i>
					<input class="head_pass" type="password" name="pass" value="">
					<input class="head_sub" type="submit" name="sub"  value="登录">
					<a class="head_zc" href="zc.php">立即注册</a>
				</div>
			</div>
		</form>
	</div>
	<?php endif; ?>
	<!--=============================================================-->
	<div class="title clearFix">
		<ul>
			<li class="title_li"><a href="index.php">首页</a></li>			
			<!-- <li class="title_li"><a href="head.html">php技术交流</a></li>
			<li class="title_li"><a href="head.html">程序人生</a></li> -->
			<?php foreach ($row2 as $value):?>
				<?php if ($value['sid'] == 0): ?>
			<li class="title_li"><a href="index.php?bigid=<?=$value['id'];?>"><?=$value['name'];?></a></li>
				<?php endif; ?>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="search">
		<form action="search.php" method="get">
			<ul>
				<li class="search_a"></li>
				
					<li class="search_b"><input class="search_bb" type="text" name="serrch" value=""></li>
					<li class="search_c"><input class="search_cc" type="submit" name="sub" value="搜索"></li>
				
				<li class="search_d">搜索：</li>
				<li><a href="huodong.php">活动</a></li>
				<li><a href="jiaoyou.php">交友</a></li>
				<li><a href="jiaocheng.php">教程</a></li>
			</ul>
		</form>
	</div>