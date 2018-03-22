<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>登录管理中心</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mybbs/public/css/admind.css"/>
</head>
<body>
	<div class="dl clearFix">
		<div class="dl_lf">
			<div class="dl_lf_log">
				<img class="dl_log_a" src="public/admin/login_title.gif">
			</div>
			<div class="dl_lf_title">
			<img src="http://localhost/mybbs/public/img/images/admin.bmp"/>
				<span>Discuz! 是 </span>
				<a class="dl_title_a" href="">腾讯 </a>
				<span>旗下 </span>
				<a class="dl_title_a" href="">Comsenz </a>
				<span>公司推出的以社区为基础的专业建站平台，帮助网站实现一站式服务。</span>
			</div>	
			<div class="dl_lf_log1"></div>
		</div>
		<div class="dl_ri">
			<form action="yzadmin.php" method="post">
				<div class="dl_ri_font">
					<p class="dl_a">用户名：</p>
					<p class="dl_a">密&nbsp;&nbsp;&nbsp;码：</p>
					<p class="dl_a">提&nbsp;&nbsp;&nbsp;问：</p>
					<p class="dl_a">回&nbsp;&nbsp;&nbsp;答：</p>
				</div>
				<div class="dl_ri_form">
					<input class="dl_form_user" type="text" name="user" placeholder="admin">
					<input class="dl_form_user" type="password" name="pass"/>
					<select id="questionid" tabindex="2" name="admin_questionid" class="dl_form_user1"> 
					<option selected="" value="0">无安全提问</option>
					<option value="1">母亲的名字</option> 
					<option value="2">爷爷的名字</option>
					<option value="3">父亲出生的城市</option>
					<option value="4">你其中一位老师的名字</option>
					<option value="5">你个人计算机的型号</option>
					<option value="6">你最喜欢的餐馆名称</option>
					<option value="7">驾驶执照最后四位数字</option>
				</select>
					<input class="dl_form_user" type="text" name="a" value="">
					<p><input class="dl_form_sub" type="submit" name="sub" value="提交"></p>
				</div>
			</form>
		</div>
	</div>
	<div class="dl_end">
		<span>Powered by </span>
		<a class="dl_end_a" href="">Discuz!</a>
		<span> X2 © 2001-2011, </span>
		<a class="dl_end_a" href="">Comsenz</a>
		<span> Inc.</span>
	</div>
</body>
</html>