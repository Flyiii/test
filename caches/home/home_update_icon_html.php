<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>个人资料-10分学院</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mybbs/public/css/base.css"">
</head>
<body>
	<!-- ==================个人资料================ -->
	<div class="grz">
		<div class="upd_head">
			<div class="neihe_head clearFix">
				<ul>
					<li class="neihe_head_a"></li>
					<li class="neihe_head_b"></li>
					<li><a class="neihe_head_c" href="home.php">设置</a></li>
					<li class="neihe_head_b"></li>
					<li><a class="neihe_head_c" href="home.php">个人资料</a></li>
				</ul>
			</div>
		</div>
		<!-- ==================个人资料 content===================== -->
		
		<div class="grz_content clearFix">
		<!-- ====================left start=============== -->
			<div class="upd_lf">
				<ul>
					<li class="upd_lf_li1">设置</li>
					<li class="upd_lf_li5"><a href="">修改头像</a></li>
					<li class="upd_lf_li6"><a href="home.php">个人资料</a></li>
					<li class="upd_lf_li4"><a href="home_grqm.php">个人签名</a></li>
					<li class="upd_lf_li4"><a href="home_Passwordsecurity.php">密码安全</a></li>
				</ul>
			</div>
			<!-- ===================right start=================== -->
			<div class="grz_ri">
				<form enctype="multipart/form-data" action="home_icon_update.php" method="post">
					<div class="grz_ri_hd">
						<!-- <p class="grz_ri_a"></p> -->
						<p class="grz_ri_b">我的头像</p>
						<!-- <p class="grz_ri_c"></p> -->

					</div>
					<div class="wocnm">如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像</div>
					<?php if (!empty($_COOKIE['icon'])): ?>
					<?php $link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);;?>
					<div class="touxiang"><img src="http://localhost/mybbs/<?= dbSelect($link,'user','*',"id=".$_COOKIE['id']."")[0]['icon'];?>"/> </div>
					<?php else: ?>
					<div class="touxiang"><img src="http://localhost/mybbs/public/img/images/avatar_blank.gif"/> </div>
					<?php endif; ?>
					<div class="wocnm1">设置我的新头像</div>
					<div class="sctx"><input name="icon" type="file"  value=""/></div>
					<div class="grz_ri_subbbbbb">
						<input class="grz_sub_a" type="submit" name="sub" value="保存">
					</div> 
				</form>
			</div>
		</div>
	</div>
</body>
</html>