<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>10分学院</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mybbs/public/css/base.css">
</head>
<body class="body">
	<!-- ===============登录成功======================= -->
	<div class="head_top">
		<a href="">设为首页</a>
		<a href="">收藏本站</a>
	</div>
	<div class="head_body">
		<img class="head_logo" src="http://localhost/mybbs/public/img/images/logo.jpg"/>
		<div class="dl_right clearFix">
			<div class="dl_one">
				<div class="dl_one_a">
					<ul>
						<li class="dl_a_li1"></li>
						<li><a  class="dl_a_li2" href="dlsuc.html"><!-- admin --><?=$_COOKIE['name'];?></a></li>
						<li><a  class="dl_a_li3" href="grxx.html">设置</a></li>
						<li><a  class="dl_a_li3"  href="admindl.html">管理中心</a></li>
						<li><a  class="dl_a_li4" href="index.php">退出</a></li>
					</ul>
				</div>
				<div class="dl_one_b">
					<span class="dl_jifen">积分:<?=$_COOKIE['gold'];?></span>
					<?php if ($_COOKIE['level'] == 1): ?>
					<span>用户权限:管理员</span>
					<?php else: ?>
					<span>用户权限:普通用户</span>
					<?php endif; ?>
				</div>
			</div>
			<div>
				<img class="dl_two" src="http://localhost/mybbs/public/img/images/avatar_blank.gif"/>
			</div>
		</div>
	</div>
	<div class="title clearFix">
		<ul>
			<li class="title_li"><a href="denglucg.php">首页</a></li>	
			<!-- <li class="title_li"><a href="dlsuc.html">php技术交流</a></li>
			<li class="title_li"><a href="dlsuc.html">程序人生</a></li> -->
			<?php foreach ($row2 as $value):?>
				<?php if ($value['sid'] == 0): ?>
			<li class="title_li"><a href="denglucg.php?bigid=<?=$value['id'];?>"><?=$value['name'];?></a></li>
				<?php endif; ?>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="search">
		<form action="" method="">
			<ul>
				<li class="search_a"></li>
				<li class="search_b"><input class="search_bb" type="text" name="serrch" value=""></li>
				<li class="search_c"><input class="search_cc" type="submit" name="sub" value="搜索"></li>
				<li class="search_d">搜索：</li>
				<li><a href="serch.html">活动</a></li>
				<li><a href="serch.html">交友</a></li>
				<li><a href="serch.html">教程</a></li>
			</ul>
		</form>
	</div>
</body>
</html>