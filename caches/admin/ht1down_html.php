		
			<!--left start-->
			<div id = "down">
				<div id = "left">
					<div class="left_ul">
					<ul>
						<li><a href="admin_index.php?htid=4">站点信息</li>
						<li><a href="admin_index.php?htid=5">友情链接</li>
					</ul>
					</div>
					<div class="left_bottom">
						<p>
							Powered by
							<strong><a href='#'>phpxy</a></strong>
							<em>V2</em>
						</p>
						<p>
							&copy;2017 <a href='#'>phpxy Inc</a>
						</p>
					</div>
				</div>
				<!--left end--->
				
				<!--right start-->
					
				<div id="right">
					<div class="right_one">
						<h3>站点信息</h3>
					</div>
					<div class="right_two">
						<p>站点名称:</p>
						<input type="text" name="zdName" value="十分钟学院">
						<p class="p">站点名称，将显示在浏览器窗口标题等位置</p>
					</div>
					<div class="right_three">
						<p>网站名称:</p>
						<input type="text" name="wzName" value="phpxy">
						<p class="p">网站名称，将显示在页面底部的联系方式处</p>
					</div>
					<div class="right_four">
						<p>网站 URL:</p>
						<input type="text" name="wzUrl" value="http://www.phpxy.com/">
						<p class="p">	网站 URL，将作为链接显示在页面底部</p>
					</div>
					<div class="right_five">
						<p>网站备案信息代码:</p>
						<input type="text" name="baNum" value="京ICP备 89273号">
						<p class="p">页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入你的授权码，它将显示在页面底部，如果没有请留空</p>
					</div>
					<div class="close_Site">
						<p>关闭站点</p>
					</div>
					<div class="right_end">
						<p>关闭站点:</p>
						<form>
							<input type="radio" name="closeSite" value=""/><span>是</span>
							<input type="radio" name="closeSite" value="" checked/><span>否</span>
						</form>
						<p class="end_p">暂时将站点关闭，其他人无法访问，但不影响管理员访问</p>
					</div>
					<div class="submit_bt">
						<form>
							<input type="submit" name="settingsubmit" title="按Enter键可以提交你的修改"value="提交">
						</form>
					</div>
				</div>
				<!--right end-->
			</div>
		</div> 
</body>
</html>