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
define("STYLE","manage");
// 定义脚本常量
define("SCRIPT","manage");
// 定义标题
define("TITLE","后台管理");

// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
//判断是否是超级管理员登录
manage_fn();
// 修改资料
if($_GET["action"] == "modify"){
	if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
		// 判断唯一标识符是否正确
		_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
		// 引入验证函数库
		include ROOT_PATH.'/includes/register.func.php';
		
		$clean1 = array();
		$clean1["psw"] = check_psw1($_POST["psw"]);
		$clean1["sex"] = check_sex($_POST["sex"]);
		$clean1["face"] = check_face($_POST["face"]);
		$clean1["email_name"] = check_email($_POST["email"]);
		$clean1["qq_name"] = check_qq($_POST["qq"]);
		$clean1["url"] = check_url($_POST["url"]);

		if(empty($clean1["psw"])){
			mysqlquery_fn("UPDATE gaga_user SET
			gaga_sex = '{$clean1["sex"]}',
			gaga_face = '{$clean1["face"]}',
			gaga_email = '{$clean1["email_name"]}',
			gaga_qq = '{$clean1["qq_name"]}',
			gaga_url = '{$clean1["url"]}'
			WHERE gaga_username = '{$_COOKIE["username"]}'
			");
		}else{
			mysqlquery_fn("UPDATE gaga_user SET
			gaga_password = '{$clean1["psw"]}',
			gaga_sex = '{$clean1["sex"]}',
			gaga_face = '{$clean1["face"]}',
			gaga_email = '{$clean1["email_name"]}',
			gaga_qq = '{$clean1["qq_name"]}',
			gaga_url = '{$clean1["url"]}'
			WHERE gaga_username = '{$_COOKIE["username"]}'
			");
		}
	}
	if(affected_rows_fn($conn) == 1 ){      // 修改成功
		//关闭数据库
		close_sql();
		//session_destroy();    // 清除session
		// 跳转到指定的页面
		location_fn("meber.php","恭喜你修改资料成功！");
	}else{
		//关闭数据库
		close_sql();
		//session_destroy();    // 清除session
		// 跳转到指定的页面
		location_fn("meber.php","你没有修改资料！");
	}
}
// 判断是否正常登陆
if(isset($_COOKIE["username"])){
	// 获取用户的数据
	$rows = fetch_array_fn("SELECT gaga_username,gaga_sex,gaga_face,gaga_email,gaga_url,gaga_qq,gaga_reg_time,gaga_login_conut FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1");
	if($rows){
		$html_array = array();
		$html_array["username"] = $rows["gaga_username"];
		$html_array["sex"] = $rows["gaga_sex"];
		$html_array["face"] = $rows["gaga_face"];
		$html_array["email"] = $rows["gaga_email"];
		$html_array["url"] = $rows["gaga_url"];
		$html_array["qq"] = $rows["gaga_qq"];
		$html_array["time"] = $rows["gaga_reg_time"];
		$html_array["conut"] = $rows["gaga_login_conut"];
		$html_array = html_fn($html_array);
		
		// 性别
		if( $html_array["sex"] == "男" ){
			$html_array["sex_html"] = '<input type="radio" value="男" name="sex" checked="checked" /> 男 <input type="radio" value="女" name="sex" /> 女 ';
		}else if( $html_array["sex"] == "女" ){
			$html_array["sex_html"] = '<input type="radio" value="男" name="sex" /> 男 <input type="radio" value="女" name="sex" checked="checked" /> 女 ';
		}
	}else{
		alert_back("此用户名不存在");
	}
}else{
	location_fn("login.php","请先登陆！");
}

?>
<?php require ROOT_PATH."/includes/title.inc.php"; ?>
<body>
<?php require ROOT_PATH."includes/manage.inc.php" ?>
<section id="manage_right">
	<header class="manage_header">
		<ul class="manage_ul">
			<li class="sele"><a href="javascript:void(0);">个人资料</a></li>
			<li><a href="javascript:void(0);">系统信息</a></li>
			<li><a href="javascript:void(0);">留言</a></li>
		</ul>
		<a href="login_out.php" id="login_out">退出</a>
	</header>
	<article class="meb_article">
		<div>
			<ul  class="meber_ul"> 
				<li><span>用 户 名 ：</span><?php echo $html_array["username"] ?></li>
				<li><span>性　　别：</span><?php echo $html_array["sex"] ?></li>
				<li style="height:60px;line-height:60px;"><span>头　　像 ：</span><img src='<?php echo $html_array["face"] ?>' width="50" height="50" /></li>
				<li><span>电子邮件：</span><?php echo $html_array["email"] ?></li>
				<li><span>主　　页：</span><?php echo $html_array["url"] ?></li>
				<li><span>Q　 　Q：</span><?php echo $html_array["qq"] ?></li>
				<li><span>注册时间：</span><?php echo $html_array["time"] ?></li>
				<li><span>登录次数：</span>第<?php echo $html_array["conut"] ?>次</li>
				<li><span>身　　份：</span>超级管理员</li>
				<li><input type="submit" value="修改" name="" class="submit_tijiao xiug_tijiao" /></li>
			</ul>
			<ul  class="meber_ul dn">
				<form method="post" action="?action=modify">
					<li><span>用 户 名：</span><?php echo $html_array["username"] ?></li>
					<li><span>密　　码：</span><input type="password" class="txt_ip" value="" name="psw" /><em>(密码为空则不修改)</em></li>
					<li><span>确认密码：</span><input type="password" class="txt_ip" value="" name="psw_reg" /><em>(确认密码为空则不修改)</em></li>
					<li><span>性　　别：</span><?php echo $html_array["sex_html"] ?></li>
					<li style="height:60px;line-height:60px;"><span>头　　像 ：</span><input type="hidden" name="face" id="face_name" value="images/logo.gif" /><a href="javascript:;"><img id="face_a" src='<?php echo $html_array["face"] ?>' width="50" height="50" /></a></li>
					<li><span>电子邮件：</span><input type="text" class="txt_ip" name="email" value='<?php echo $html_array["email"] ?>' /></li>
					<li><span>主　　页：</span><input type="text" class="txt_ip" name="url" value='<?php echo $html_array["url"] ?>' /></li>
					<li><span>Q　 　Q：</span><input type="text" class="txt_ip" name="qq" value='<?php echo $html_array["qq"] ?>' /></li>
					<li><span>身　　份：</span>超级管理员</li>
					<li><input type="submit" value="保存" name="submit_tijiao" class="submit_tijiao" /><input type="button" value="取消" name="" class="qux_tijiao" /></li>
				</form>
			</ul>
		</div>
		<div class="dn">
			<ul  class="meber_ul meber_ul1">
				<li><span>·服务器主机名称：</span><?php echo $_SERVER['SERVER_NAME']; ?></li>
				<li><span>·服务器版本：</span><?php echo $_ENV['OS'] ?></li>
				<li><span>·通信协议名称/版本：</span><?php echo $_SERVER['SERVER_PROTOCOL']; ?></li>
				<li><span>·服务器IP：</span><?php echo $_SERVER["SERVER_ADDR"]; ?></li>
				<li><span>·客户端IP：</span><?php echo $_SERVER["REMOTE_ADDR"]; ?></li>
				<li><span>·服务器端口：</span><?php echo $_SERVER['SERVER_PORT']; ?></li>
				<li><span>·客户端端口：</span><?php echo $_SERVER["REMOTE_PORT"]; ?></li>
				<li><span>·管理员邮箱：</span><?php echo $_SERVER['SERVER_ADMIN'] ?></li>
				<li><span>·Host头部的内容：</span><?php echo $_SERVER['HTTP_HOST']; ?></li>
				<li><span>·服务器主目录：</span><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></li>
				<li><span>·服务器系统盘：</span><?php echo $_ENV["SystemRoot"]; ?></li>
				<li><span>·脚本执行的绝对路径：</span><?php echo $_SERVER['SCRIPT_FILENAME']; ?></li>
				<li><span>·Apache及PHP版本：</span><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></li>
			</ul>
		</div>
	</article>
</section>
<script>
$(function(){
	meber_fn();
})
window.onload = function(){
	var face_a = document.getElementById("face_a");
	// 弹出窗口
	face_a.onclick = function(){
		window.open('face.php?num=50&path=qpic&page=1&widhei=100','face','width=400,height=400,top=0,left=0,scrollbars=1');
	}

	// 表单验证
	var fm = document.getElementsByTagName("form")[0];
	fm.onsubmit = function(){
		if(!register1(this)){
			return false;
		}
	};
}
</script>
</body>
</html>