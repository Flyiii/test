<html>
	<head>
		<title><?=$title;?></title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="http://localhost/mybbs/public/css/one.css" type="text/css"/>
	</head>
	<body>
		<!--TOP start-->
		<div id = "toptb">
			<div class = 'tou'>
				<div class = 'tou1'>
					<a href = "#">设为首页</a>
					<a href = "#">收藏本站</a>
				</div>
			</div>	
		</div>
		<!--TOP end-->
		<!--HEAD start-->
		<div id = 'hd'>
			<div class = 'hd1'>
				<div class = 'hd2'>
					<h2>
						<a href = '#' title='首页-十分钟学院'>
						<img src = 'http://localhost/mybbs/public/images/logo.jpg' height='80' border='0'/>
						</a>
					</h2>
					<form>
						<div class = 'hd3'>
							<div class = 'hd4'>
								<table cellspacing='0' cellpadding='0' border='0' width='360' height='60'>
									<tr>
										<td>用户名</td>
										<td align='right'><input type='text' name='username'/></td>
										<td class = 'shuxian1'><input type='checkbox' name='zidongdenglu' value='zidongdenglu'/><a href = '#'>自动登录</a></td>
										<td align='right'><a href = '#'>找回密码</a></td>
									</tr>
									<tr>
										<td>密码</td>
										<td align='right'><input type='password' name='psw'/></td>
										<td><input type = 'submit' value='登录'/></td>
										<td align='right' class = 'shuxian2'><a href = '#' class = 'zhuce'>立即注册</a></td>
									</tr>
								</table>
							</div>
						</div>
					</form>
				</div>
				<div id = 'shouye3'>
					<ul>
						<li class = 'li1'><a class = 'kaobian' href='index.php?bigid=0' title='十分钟学院'>首页</a></li>
						<li class = 'li2'><a href='index.php?bigid=1' title='Space'>PHP技术交流</a></li>
						<li class = 'li3'><a href='index.php?bigid=2' title='Space'>程序人生</a></li>
					</ul>
				</div>
				<!--搜索框-->
				<div id = 'sousuokuang'>
					<form>				
						<table border = '0' width='700' height='45'>
							<tr>
								<td class="scbar_icon_td"></td>
								<td class="scbar_txt_td"><input type="text" name="keywords" id="scbar_txt" onfocus="if(this.value=='请输入搜索内容'){this.value='';this.style.color='#666';}" onblur="if(this.value==''){this.value='请输入搜索内容';this.style.color='#ccc';}" value="请输入搜索内容" style="color:#CCCCCC" autocomplete="off"></td>
								<td class="scbar_btn_td">
								<button type="submit" name="searchsubmit" id="scbar_btn" class="pn pnc" value="true"><strong class="xi2 xs2">搜索</strong></button></td>
								<td class="scbar_hot_td">
									<div id="scbar_hot">
										<strong class="xw1">热搜: </strong>
										<a href="#" target="_blank" class="xi2">活动</a>
										<a href="#" target="_blank" class="xi2">交友</a>
										<a href="#" target="_blank" class="xi2">教程</a>
									</div>
								</td>
							</tr>						
						</table>
					</form>
				</div>
			</div>
		</div>
		<!--HEAD end-->
		<!--HEAD end-->
		<!--xiabu start-->
		<div id = 'xiabu'>
<!-- <div class = 'xiaofangzi'>
				<div class = 'luntan'>
					<a href="#" class="fangzi" title="首页 - 10分钟学院">首页 - 10分钟学院</a>
					<em>»</em>
					<a href='#'>论坛</a>
				</div>
			</div>
			<div id = 'xia'>
				<div id='tiezi'>
					<div class="tiezi1">
						<p class="tiezi2">
						帖子: <em>9</em><span class='shuxian'>|</span>
						会员: <em>5</em><span class='shuxian'>|</span>
						欢迎新会员: <em>wangfei</em>
						</p>
					</div>
</div> -->
			<div id = 'xia'>

				<!--kuang2-->
				<div class = 'chengxurensheng'>
					<a href='#'>程序人生</a>
				</div>
				<table class="hehe2"   width="960" height="226" cellspacing="0" cellpadding='0'>
						<tr>
							<td width="50"rowspan="2"><img src="http://localhost/mybbs/public/images/111.jpg" width="50"/></td>
							<th align="left"><a href='#'>求职招聘</a></th>
							<td rowspan="2" align='right' class = 'aa2'><span>0</span><span>/0</span></td>
							<td rowspan="2" class = 'bb2'><div class = 'cc2'>从未</div></td>
						</tr>
						<tr>
							<td>版主:</td>
						</tr>
						<tr>
							<td colspan="4"><hr width="95%" style="border:1px dashed #CDCDCD"/></td>
						</tr>
						<tr>
							<td width="50"rowspan="2"><img src="http://localhost/mybbs/public/images/111.jpg" width="50"/></td>
							<th align="left"><a href='#'>经验分享</a></th>
							<td rowspan="2" align='right' class = 'aa2'><span>0</span><span>/0</span></td>
							<td rowspan="2" class = 'bb2'><div class = 'cc2'>从未</div></td>
						</tr>
						<tr>
							<td>版主:</td>
						</tr>
						<tr>
							<td colspan="4"><hr width="95%" style="border:1px dashed #CDCDCD"/></td>
						</tr>
						<tr>
							<td width="50"rowspan="2"><img src="http://localhost/mybbs/public/images/111.jpg" width="50"/></td>
							<th align="left"><a href='#'>名人故事</a></th>
							<td rowspan="2" align='right' class = 'aa2'><span>0</span><span>/0</span></td>
							<td rowspan="2" class = 'bb2'><div class = 'cc2'>从未</div></td>
						</tr>
						<tr>
							<td>版主:</td>
						</tr>
				</table>	
				<!--kuang3-->
				<div class = 'dibu'>
					<div class = 'dibu2'>
						<ul>
							<li><img src='http://localhost/mybbs/public/images/logo_88_31.gif'></li>
							<li><a href='#'>官方论坛</a></li>
							<li class = 'ziti'>提供最新Discuz!产品新闻丶软件下载与技术交流</li>
						</ul>
					</div>
					<ul class = 'ul2'>
						<li  class = 'li2'><a href='#' title='百度'>百度</a></li>
						<li  class = 'li2'><a href='#' title='漫游平台'>漫游平台</a></li>
						<li  class = 'li2'><a href='#' title='Yeswan'>Yeswan</a></li>
						<li  class = 'li2'><a href='#' title='我的领地'>我的领地</a></li>
					<ul>
				</div>
				<!--kuangsan end-->
				<!--zuixia-->
				<div class = 'end'>
					<p>
						Powered by
						<strong><a href='#'>phpxy</a></strong>
						<em>V2</em>
					</p>
					<p>
						&copy;2017 <a href='#'>phpxy Inc</a>
					</p>
					<div class = 'ICP'>
						<p>
							<a href="#">京ICP备 89273号</a><span class="pipe"> | </span><strong><a href="http://www.phpxy.com/" target="_blank">phpxy</a></strong>
						</p>
						<p>
							Time Now Is:
						</p>
					</div>
				</div>
				<!--zuixia end-->
			</div>
		</div>
	</body>
</html> 
