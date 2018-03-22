 <html>
	<head>
		<title><?=$title;?></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="http://localhost/mybbs/public/css/ht1.css" type="text/css"/>
	</head>
	<body>
		<!--top start-->
		<div id = 'all'>
			<div id="top">
				<div class = 'head'>
						<a href="#"><img src="http://localhost/mybbs/public/images/houtai1.png"></a>
					<div class = "head_content">
						<ul class = "ul">
							<li><a href="admin_index.php?htid=0">站点信息</a></li>
							<li class = "li"></li>
							<li><a href="admin_index.php?htid=1">用户管理</a></li>
							<li class = "li"></li>
							<li><a href="admin_index.php?htid=2">版块管理</a></li>
							<li class = "li"></li>
							<li><a href="admin_index.php?htid=3">帖子管理</a></li>
							<li class = "li"></li>
						</ul>
					</div>
					<div  class="head_right">
						 <?php if (!empty($_COOKIE['id'])): ?>
						  <p>你好, 创始人 <em><?=$_COOKIE['name'];?></em> [<a href="logout.php" target="_top">退出</a>]</p>
						  <?php else: ?>
						  这是个未解决的bug
						  <?php endif; ?>
						  <p class = "head_p"><a  class = "zhandianshouye" href="index.php" target="_blank">站点首页</a></p>
					</div>
				</div>
			</div>
			<!--top end-->