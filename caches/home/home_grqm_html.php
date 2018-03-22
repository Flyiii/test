<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>个人签名</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/mybbs/public/css/base.css">
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
	<!-- =================个人签名 start==================== -->
	<div class="qm">
		<div class="qm_head clearFix">
			<ul>
				<li class="neihe_head_a"></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="home.php">设置</a></li>
				<li class="neihe_head_b"></li>
				<li><a class="neihe_head_c" href="home_grqm.php">个人签名</a></li>
			</ul>
		</div>
		<!-- ===================个性签名 content===================== -->
		<div class="qm_content clearFix">
			<!-- ===============left start=========================== -->
			<div class="qm_lf clearFix">
				<ul>
					<li class="upd_lf_li1">设置</li>
					<li class="upd_lf_li4"><a href="home_update_icon.php">修改头像</a></li>
					<li class="upd_lf_li3"><a href="home.php">个人资料</a></li>
					<li class="upd_lf_li2"><a href="home_grqm.php">个人签名</a></li>
					<li class="upd_lf_li4"><a href="home_Passwordsecurity.php">密码安全</a></li>
				</ul>
			</div>
			<!-- =================right start============================== -->
			<div class="qm_ri">
				<form action="home_grqm_insert.php" method="post">
					<div class="grz_ri_hd">
						<p class="grz_ri_a"></p>
						<p class="grz_ri_b">个性签名</p>
						<p class="grz_ri_c"></p>
					</div>
					 <script id="editor" type="text/plain" name="content" style="width:800px;height:280px;"></script>
					<!-- <textarea class="qm_ri_cont" name="content" value=""></textarea> -->
					<div class="qm_ri_sub">
						<input class="qm_sub_a" type="submit" name="sub" value="保存"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>