<html>
	<head>
		<title><?=$title;?></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="http://localhost/mybbs/public/css/huodong1.css" type="text/css"/>
	</head>
	<body>
		<!--head start-->
		<div id = "top">
			<div class = "hehe">
				<a href="index.php" class="">返回首页</a>
			</div>
			<!--=============================================-->
			<?php if (!empty($_COOKIE['id'])): ?>
			<div class = "hehe2">
				<a href="#"><?=$_COOKIE['name'];?></a>
				<a href="home.php">设置</a>
				<a href="logout.php?esc=1">退出</a>
			</div>			
			<?php else: ?>
			<!--=============================================-->
			<div class = "hehe2">
				<a href="index.php">登陆</a>
				<a href="zc.php">立即注册</a>
			</div>
			<?php endif; ?>
		</div>
		<div id="sousuokuang">
		<div class="hehe3">
			<form action="search.php" method="get">
			<table border="0" class="hehe4" cellspacing="0" cellpadding="0">
				<tr>
					<td><h1><a href="#"><img src="http://localhost/mybbs/public/img/images/logo.png"></a></h1></td>
					<td>
						<table class="hehe5" border = "0" bordercolor="red" cellspacing="0" cellpadding="0">
							<tr>
								<td class="td_txt">
									<input type="text" name="serrch" value=""/>
								</td>
								<td class="td_btn">
									<button type="submit" class="btn"><strong>搜索</strong></button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</table>
			</form>
		 
			<div class="tl">
				<div class="sttl mbn">
					<h2>结果: <em>找到 “<span class="emfont"><?=$key;?></span>” 相关内容 <?=$cSearch[0]['count(id)'];?> 个</em></h2>
				</div>
				<?php if (!empty($search)): ?>
				<div class="slst mtw" id="threadlist"  style="position: relative;">
					<ul>
						<?php foreach ($search as $key => $val):?>
						<li class="pbw" id="2">
							<h3 class="xs3"><a href="detail.php?id=<?=$val['0'];?>" target="_blank" ><strong><?= strred($arrKey,$val['title']);?></a></h3>
							<p class="xg1"><?=$val['replytotal'];?> 个回复 - <?=$val['visittotal'];?> 次查看</p>
							<p>
								<?= strred($arrKey,chineseSubstr($val['content'],0,301));?>
							</p>
							<p>
								<span><?= date('Y-m-d H:i:s',($val['createtime']));?></span> - <span><?=$val['9'];?></span>
								 -
								<span><a href="neihe.php?classid=<?=$val['pid'];?>" target="_blank" class="xi1"><?=$val['name'];?></a></span>
							</p>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
				<?php else: ?>
					<p class="emp xs2 xg2">对不起，没有找到匹配结果。</p>
				<?php endif; ?>
			</div> 
			<div id="ft" class="w cl">
				<div class = "dibu">
					<em>Powered by <strong><a href="http://www.phpxy.com/" target="_blank">phpxy</a></strong> <em>V2</em></em> &nbsp;
					<em>© 99999 <a href="http://www.phpxy.com/" target="_blank">phpxy Inc.</a></em>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>