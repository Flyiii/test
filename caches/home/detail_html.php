<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$title;?></title>
	<link rel="stylesheet" type="text/css" href="../public/css/base.css">
	<!--================================================================================-->
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="http://localhost/mybbs/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://localhost/mybbs/utf8-php/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="http://localhost/mybbs/utf8-php/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script> 
	<!--================================================================================-->
</head>
<body>
	<!-- ===================发回帖页面==================== -->
	<div class="show">
		<div class="show_head clearFix">
			<ul>
				<li class="neihe_head_a"></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="index.php">论坛</a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="index.php?bigid=<?=$bigId;?>"><?=$bigName;?></a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="neihe.php?classid=<?=$smallId;?>"><?=$smallName;?></a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="detail.php?id=<?=$Id;?>"><?=$Title;?></a></li>
			</ul>
		</div>
		<!-- ==================按钮=================== -->
		<div class="button clearFix">
			<ul>
				<!--===============发帖===================-->
				<li><a class="button_a" href="ft.php?classid=<?=$classId;?>"></a></li>
				<!--================回帖==================-->
				<li><a class="button_b" href="#ht"></a></li>
				<li class="button_c">
					<span class="button_c_fh1"></span>
					<a class="button_c_fh2" class="" href="neihe.php?classid=<?=$classId;?>">返回列表</a>
				</li>
			</ul>
		</div>
		<!-- ============置顶================= -->
		<!--<?php if ($GuanLi): ?>-->
		<div class="zd clearFix">
			<ul>
				<li><a class="zd_li1" href="detail.php?id=<?=$Id;?>&delete=1">删除主题</a></li>
				<?php if ($zD == 0): ?>
				<li><a class="zd_li2" href="detail.php?id=<?=$Id;?>&istop=1">置顶</a></li>
				<?php else: ?>
				<li><a class="zd_li2" href="detail.php?id=<?=$Id;?>&istop=2">取消置顶</a></li>
				<?php endif; ?>
				<?php if (empty($sTyle)): ?>
				<li><a class="zd_li2" href="detail.php?id=<?=$Id;?>&style=1">高亮</a></li>
				<?php else: ?>
				<li><a class="zd_li2" href="detail.php?id=<?=$Id;?>&style=2">取消高亮</a></li>
				<?php endif; ?>
				<?php if ($Elite): ?>
				<li><a class="zd_li3" href="detail.php?id=<?=$Id;?>&elite=1">取消精华</a></li>
				<?php else: ?>
				<li><a class="zd_li3" href="detail.php?id=<?=$Id;?>&elite=2">精华</a></li>
				<?php endif; ?>
			</ul>
		</div>
		<!--<?php endif; ?>-->
		<!-- ==================发帖展示==================== -->
		<div class="post clearFix">
		<?php if ($Lpage==1): ?>
			<div class="post_left">
				<div class="post_lf_ck">
					<span>查看：</span>
					<span class="post_lf_a"><?=$Hits;?></span>
					<span>回复：</span>
					<span class="post_lf_b"><?=$TZCount[0]['count(id)'];?></span>
				</div>
				<div class="post_lf_ck1"><img src="<?php if (empty($_COOKIE['icon'])): ?>
				http://localhost/mybbs/public/img/images/avatar_blank.gif<?php else: ?><?=$P_icture;?><?php endif; ?>" class="max_pic" /></div>
				<div class="post_lf_user">
					<?php if ($U_dertype == 0): ?>
					<p>普通用户</p>
					<?php else: ?>
					<p>管理员</p>
					<?php endif; ?>
					<p><!-- 学士 --><?= userGrade($G_rade);?></p>
				</div>
			</div>
			<div class="post_ri">
				<div class="post_ri_one">
					<span><?=$Title;?></span>
					<!--<?php if ($topid): ?>-->
					<a class="post_one_a" href="detail.php?id=<?=$topid;?>" title="上一主题"></a>
					<!--<?php endif; ?>-->
					<!--<?php if ($downid): ?>-->
					<a class="post_one_b" href="detail.php?id=<?=$downid;?>" title="下一主题"></a>
					<!--<?php endif; ?>-->
				</div>
				 <div class="post_ri_two">
					<span class="post_two_a"></span>
					<span class="post_two_aa">发表于 <?=$Createtime;?></span>
					<a class="post_two_b" href="detail.php?id=<?=$Id;?>">楼主</a>
					<label class="post_two_c" for="zhida">电梯直达</label>
					<input class="post_two_d" id="zhida" type="text" name="id" title="跳转到指定楼层"value="">
					<a class="post_two_e" href="javascript:;"title="跳转到指定楼层"onclick="golouceng()"><img src="http://localhost/mybbs/public/img/images/fj_btn.png" onclick="golouceng()" alt="跳转到指定楼层" class="vm" /></a>
					<script>
					function golouceng(){
							location.href='detail.php?id=<?=$Id;?>#post_'+document.getElementById('zhida').value;
					}
					</script>
				</div>
				<?php if ($Elite == 1): ?>
					<div class="post_ri_four">本主题已加入精华</div>
				<?php endif; ?>
				<?php if ($Rate != 0): ?>
				
				<div class="post_ri_three">
					<p class="post_three_a">
						<span class="post_three_1"></span>
						<span class="post_three_2">本主题需向作者支付</span>
						<span class="post_three_3"><?=$Rate;?> 金钱 </span>
						<span class="post_three_4"> 才能浏览</span>
						<span class="post_three_5"></span>
						<a class="post_three_6" href="">购买主题</a>
					</p>
					<p class="post_three_b">
						<span></span>
					</p>
				</div>
				<?php else: ?>
					<div><?=$Content;?></div>
				<?php endif; ?>
				<div class="post_ri_five">
					<span class="post_five_a"></span>
					<a class="post_five_b" href="">回复</a>
				</div> 
			</div>
			<?php endif; ?>
		</div>
		
		<!-- =====================沙发===================== -->
		<?php if (!empty($HTiZi)): ?>
		<?php foreach ($HTiZi as $key=> $value):?>
		<div class="sfa clearFix" id="post_<?= setFloor($key);?>" >
			<div class="sfa_lf">
				<div class="sfa_ht_user">
					<span><?=$value['name'];?></span>
				</div>
				<div class="hfIcon">
				<?php if (empty($value['icon'])): ?>
					<img src="http://localhost/mybbs/public/img/images/avatar_blank.gif" class="max_pic" />
				<?php else: ?>
					<img src="http://localhost/mybbs/<?=$value['icon'];?>" class="max_pic"/>
				<?php endif; ?>
				</div>
				<div class="post_ht_user">
				<?php if ($value['level'] == 0): ?>
					<p>普通用户</p>
				<?php else: ?>
					<p>管理员</p>
				<?php endif; ?>
					<p><?= userGrade($value['gold']);?></p>
				</div>
			</div>
			<!-- ===========right=============== -->
			<div class="sfa_ri">
				<div class="sfa_ri_head">
					<span class="sfa_head_a"></span>
					<span class="sfa_head_b">发表于</span>
					<span><?= date('Y-m-d H:i:s',($value['createtime']));?></span>
					<span class="sfa_head_c"><?= storey($key+($linum*($Lpage-1)));?></span>
				</div>
				<div class="sfa_ri_content">
				<?php if ($value['isdisplay'] == 0): ?>
					<span><?=$value['content'];?></span>
				<?php else: ?>
					<span>内容已经被屏蔽</span>
				<?php endif; ?>
				</div>
				<!-- =============回复=============== -->
				<div class="post_ri_five">
					<span class="post_five_a"></span>
					<a class="post_five_b" href="">回复</a>
					<?php if (!empty($_COOKIE['level']) && $_COOKIE['level'] == 1 ): ?>
				<div class="Tzsz">
						<a class="colorA" href="detail.php?id=<?=$Id;?>&hid=<?=$value['0'];?>&delht=1">删除</a>
						<span class="pipe">|</span>
						<?php if ($value['istop'] == 0): ?>
						<a class="colorB" href="detail.php?id=<?=$Id;?>&hid=<?=$value['0'];?>&istopht=1">置顶</a>
						<?php else: ?>
						<a class="colorB" href="detail.php?id=<?=$Id;?>&hid=<?=$value['0'];?>&istopht=2">取消置顶</a>
						<?php endif; ?>
						<span class="pipe">|</span>
						<?php if ($value['isdisplay'] == 0): ?>
						<a class="colorC" href="detail.php?id=<?=$Id;?>&hid=<?=$value['0'];?>&isdisplayht=1">屏蔽</a>
						<?php else: ?>
						<a class="colorC" href="detail.php?id=<?=$Id;?>&hid=<?=$value['0'];?>&isdisplayht=2">取消屏蔽</a>
						<?php endif; ?>
				</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<?php endif; ?>
				<!-- ==================按钮1=================== -->
		<div class="button1 clearFix">
			<ul>
				<li><a class="button_a" href="ft.php?classid=<?=$classId;?>"></a></li>
				<li><a class="button_b" href="#ht"></a></li>
				<li class="button_c">
					<span class="button_c_fh1"></span>
					<a class="button_c_fh2" class="" href="neihe.php?classid=<?=$classId;?>">返回列表</a>
				</li>
			</ul>
		</div>
		<!-- =========================分页==================== -->
		 <!-- <div class="neihe_fenye">
			<form action="" method="">
				<ul>
					<li><input class="neihe_fy_li1" type="text" name="id" value=""></li>
					<li><input class="neihe_fy_li2" type="submit" name="sub" value="GO"></li>
					<li class="neihe_fy_li3">1</li>
					<li><a class="neihe_fy_li3" href="">下一页</a></li>
					<li><a class="neihe_fy_li3" href="">尾页</a></li>
					<li class="neihe_fy_li3">共有</li>
					<li class="neihe_fy_li4">13</li>
					<li class="neihe_fy_li5">条记录</li>
					<li class="neihe_fy_li3">每页显示</li>
					<li class="neihe_fy_li4">10</li>
					<li class="neihe_fy_li5">条，本页</li>
					<li class="neihe_fy_li4">1</li>
					<li class="neihe_fy_li5">-</li>
					<li class="neihe_fy_li4">10</li>
					<li class="neihe_fy_li5">条</li>
					<li class="neihe_fy_li6">1</li>
					<li class="neihe_fy_li5">/</li>
					<li class="neihe_fy_li4">2</li>
					<li class="neihe_fy_li5">页</li>
				</ul>
			</form>
		</div> -->
		<div class="fye"><?= fpage($zCount, $linum, [8,3,4,5,6,7,0,1,2]);?></div>
		<!-- ===============回帖============= -->
		<dir class="reply clearFix">
			<!-- ===========left================ -->
			<div class="reply_lf">
			<?php if (!empty($_COOKIE['id'])): ?>
			<?php $link = dbConnect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_CHARSET);;?>
				<div class="wana">
				<img class="reply_lf_img" src="http://localhost/mybbs/<?= dbSelect($link,'user','*',"id=".$_COOKIE['id']."")[0]['icon'];?>"/>
				</div>
				<div class="zenmoyang">
					<?php if ($_COOKIE['level'] == 0): ?>
					<p>普通用户</p>
					<?php else: ?>
					<p>管理员</p>
					<?php endif; ?>
					<p><!-- 学士 --><?= userGrade($G_rade);?></p>
		
				</div>
			<?php endif; ?>
			</div>
			
			<!-- ==============right================ -->
			<div class="reply_ri" >
			<a name="ht"></a>
				<form action="detail.php" method="post">
					<!-- <textarea class="reply_ri_cont" name="content" value=""></textarea> -->
					<script id="editor" type="text/plain" name="content" style="width:775px;height:180px;"></script>
					<div class="reply_ri_sub">
						<input class="reply_sub_a" type="submit" name="sub" value="发表回复">
					</div>
					<input name="id" type="hidden" value="<?=$Id;?>" />
						<input name="pid" type="hidden" value="<?=$classId;?>" />
				</form>
			</div>
		</dir>
	</div>
</body>
</html>