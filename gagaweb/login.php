<?php
/**
*	尜尜爱摄影 响应式网站1.0
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-13
**/
header("Content-Type:text/html;charset=utf-8");
// 开启session
session_start();
// 定义一个常量防止恶意调用
define("IN_TG",true);
define("NSCRIPT",true);
// 定义样式常量
define("STYLE","list");
// 定义脚本常量
define("SCRIPT","list");
// 定义标题
define("TITLE","登录页面");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
// 登录状态无法操作
login_state();
if($_GET["action"] == "login"){
	// 引入验证函数库
	include ROOT_PATH.'includes/login.func.php';
	// 判断验证码
	check_code($_POST['code'],$_SESSION["code"]);
	// 创建一个空数组，用来存放提交过来的合法数据
	$clean = array();	
	$clean["username"] = check_username($_POST["username"]);
	$clean["psw"] = check_psw($_POST["psw"]);
	$clean["baoliu"] = check_time($_POST["baoliu"]);
	if(!!$rows = fetch_array_fn("SELECT gaga_username,gaga_uniqid,gaga_admin FROM gaga_user WHERE gaga_active='' AND gaga_username='{$clean["username"]}' AND gaga_password='{$clean["psw"]}' ")){
		// 登录成功之后统计登录次数以及修改最后登录时间、ip
		mysqlquery_fn("UPDATE gaga_user SET gaga_last_time=NOW(),gaga_last_ip='{$_SERVER['REMOTE_ADDR']}',gaga_login_conut=gaga_login_conut+1 WHERE gaga_username='{$rows["gaga_username"]}' ");
		
		// session_destroy();    // 清除session
		setcookies_fn($rows["gaga_username"],$rows["gaga_uniqid"],$clean["baoliu"]);
		if($rows["gaga_admin"] == 1){
			$_SESSION["admin"] = $rows["gaga_username"];
		}
		//关闭数据库
		close_sql();
		// 跳转到指定的页面
		location_fn("meber.php",null);
	}else{
		//关闭数据库
		close_sql();
		// session_destroy();    // 清除session
		// 跳转到指定的页面
		location_fn("login.php","用户名或密码错误，或者未激活！");
	}
	
}

?>
<?php require ROOT_PATH."/includes/title.inc.php"; ?>
<body>

<div id="register">
	<h3>登录</h3>
	<form method="post" action="login.php?action=login" name="login">
		<ul id="reg_ul">
			<li><label>用 户 名：</label><input type="text" class="txt_input" value="" name="username" /><span>(<strong>*</strong>必填，至少两位)</span></li>
			<li><label>密　　码：</label><input type="password" class="txt_input" value="" name="psw" /><span>(<strong>*</strong>必填，至少六位)</span></li>
			<li><label>保　　留：</label><input type="radio" value="0" name="baoliu" checked />不保留 <input type="radio" value="1" name="baoliu" />一天 <input type="radio" value="2" name="baoliu" />一周<input type="radio" value="3" name="baoliu" />一月</li>
			<li><label>验 证 码：</label><input type="text" class="code_input" value="" name="code" /><img id="code" src="code.php" /></li>
			<li><label></label><input type="submit" value="登录" name="submit_tijiao" /><input type="button" value="注册" name="zhuce" /></li>
		</ul>
	</form>
</div>

<script>
window.onload = function(){
	// 验证码
	var code = document.getElementById("code");
	// 点击刷新验证码
	code.onclick = function(){
		this.src = "code.php?tm="+Math.random();
	}
	
	// 表单验证
	var fm = document.getElementsByTagName("form")[0];
	fm.onsubmit = function(){
		// 判断用户名
		if( fm.username.value.length < 2 || fm.username.value.length > 20 ){
			alert("用户名长度不能小于2位或者长度不能大于20位！");
			fm.username.value = "";
			fm.username.focus();
			return false;
		}else if( !(/^\w+$/i.test(fm.username.value) ) ){
			alert("用户名只能有字母、数字和下划线命名！");
			fm.username.value = "";
			fm.username.focus();
			return false;
		}
		// 密码验证
		if( fm.psw.value.length < 6 || fm.psw.value.length > 20 ){
			alert("密码长度不能小于6位或者长度不能大于20位！");
			fm.psw.value = "";
			fm.psw.focus();
			return false;
		}else if( (/[ ]/.test(fm.psw.value) ) ){
			alert("密码不能包含空格！");
			fm.psw.value = "";
			fm.psw.focus();
			return false;
		}
	};
}
</script>
</body>
</html>