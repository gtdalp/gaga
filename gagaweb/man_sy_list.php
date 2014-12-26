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
define("TITLE","后台-摄影日志管理");

// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
require ROOT_PATH."/includes/title.inc.php";
//判断是否是超级管理员登录
manage_fn();
// "添加类别";
if($_GET["action"] == "addleib" && isset($_GET["id"]) ){
	if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
		// 判断唯一标识符是否正确
		_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
		// 数据库验证
		require dirname(__FILE__).'/includes/register.func.php';
		// 创建一个空数组，用来存放提交过来的合法数据
		$clean11 = array();
		$clean11["name"] = check_rzcb($_POST["title_name"],2,20,"类别");
		$clean11["content"] = check_rzcb($_POST["text_content"],10,200,"类别描述");
		$clean11["show_ip"] = $_POST["show_ip"];
		$clean11 = html_fn($clean11);
		// 写入数据库
		mysqlquery_fn("INSERT INTO gaga_syrz_lb
		(gaga_name,gaga_content,gaga_show,gaga_date) VALUES
		('{$clean11["name"]}','{$clean11["content"]}','{$clean11["show_ip"]}',NOW())");

		if(affected_rows_fn($conn) == 1 ){      // 添加成功
			// 获取刚刚注册的用户的id
			$clean11["id"] = insert_id();
			//关闭数据库
			close_sql();
			// 跳转到指定的页面
			location_fn("man_sy_list.php?action=rizhi&id=".$clean11["id"],"添加日志类别成功！");
		}else{
			//关闭数据库
			close_sql();
			// 跳转到指定的页面
			alert_back("很遗憾，添加日志类别失败！");
		}
	}
}
// "修改类别";
if($_GET["action"] == "addleib" && isset($_GET["id"]) ){
	if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
		// 判断唯一标识符是否正确
		_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
		// 数据库验证
		require dirname(__FILE__).'/includes/register.func.php';
		// 创建一个空数组，用来存放提交过来的合法数据
		$clean11 = array();
		$clean11["name"] = check_rzcb($_POST["title_name"],2,20,"类别");
		$clean11["content"] = check_rzcb($_POST["text_content"],10,200,"类别描述");
		$clean11["show_ip"] = $_POST["show_ip"];
		$clean11 = html_fn($clean11);
		// 写入数据库
		mysqlquery_fn("INSERT INTO gaga_syrz_lb
		(gaga_name,gaga_content,gaga_show,gaga_date) VALUES
		('{$clean11["name"]}','{$clean11["content"]}','{$clean11["show_ip"]}',NOW())");

		if(affected_rows_fn($conn) == 1 ){      // 添加成功
			// 获取刚刚注册的用户的id
			$clean11["id"] = insert_id();
			//关闭数据库
			close_sql();
			// 跳转到指定的页面
			location_fn("man_sy_list.php?action=rizhi&id=".$clean11["id"],"添加日志类别成功！");
		}else{
			//关闭数据库
			close_sql();
			// 跳转到指定的页面
			alert_back("很遗憾，添加日志类别失败！");
		}
	}
}

if(isset($_GET["action"]) == "rizhi" && isset($_GET["id"])){
	echo '<script>
			$(function(){
				$(".manage_ul li").each(function(){
					if($(this).attr("title")=="'.$_GET["id"].'"){
						$(this).addClass("sele");
					}
				});
			});
			</script>';
}else{
	alert_back("非法操作！");
}

// 统计类别
$total_zt = num_rows_fn(mysqlquery_fn("SELECT gaga_id FROM gaga_syrz_lb"));
// 分页设置第几页
global $page,$page_id;
$page_id = "action=rizhi"."&id=".$_GET["id"]."&";
?>
<body>
<?php require ROOT_PATH."includes/manage.inc.php" ?>
<section id="add_photo_kbg"></section>

<section id="manage_right">
	<header class="manage_header" style="height:auto;">
		<ul class="manage_ul" style="width:90%;height:auto;">
			<?php if(!$total_zt==0){ echo '<li title="all"><a href="?action=rizhi&id=all">全部</a></li>'; }?>
			<?php 
				$result_zt = mysqlquery_fn("SELECT gaga_id,gaga_name FROM gaga_syrz_lb ORDER BY gaga_date ASC ");
				while (!!$rowdd = mysql_fetch_array($result_zt)){ 
														$htmlzt = array();
														$htmlzt["id"] = $rowdd["gaga_id"];
														$htmlzt["name"] = $rowdd["gaga_name"];
														$htmlzt = html_fn($htmlzt);
			?>
			<li title="<?php echo $htmlzt["id"] ?>"><a href="?action=zhuanti&id=<?php echo $htmlzt["id"] ?>"><?php echo $htmlzt["name"] ?></a></li>
			<?php } ?>
			<span class="add_photo add" id="add_leib">添加类别</span>
			<?php if(!$total_zt==0){ ?>
				<span class="add_photo upd" id="upde_leib">修改类别</span>
				<span class="add_photo rem">删除类别</span>
			<?php } ?>			
		</ul>
		
		<a href="login_out.php" id="login_out">退出</a>
	</header>
	<article class="meb_article syzm_art wenz_list">
		<div class="title_div">
			<a href="#" class="txt_cja">创建文章</a>
		</div>
		<table width="100%" class="lieb_table">
			<tr>
				<th width="12%">日志类别</th>
				<th width="65%">类别描述</th>
				<th width="8%">显示</th>
				<th width="10%">日志数量</th>
				<th width="15%">创建时间</th>
			</tr>
			<?php 
				if($_GET["id"] == "all"){
					$result_zt1 = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content,gaga_show,gaga_date FROM gaga_syrz_lb ORDER BY gaga_date ASC ");
				}else{
					$result_zt1 = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content,gaga_show,gaga_date FROM gaga_syrz_lb WHERE gaga_id='{$_GET["id"]}' ORDER BY gaga_date ASC ");
				}
				while (!!$rowdd1 = mysql_fetch_array($result_zt1)){
						$htmlzt1 = array();
						$htmlzt1["id"] = $rowdd1["gaga_id"];
						$htmlzt1["name"] = $rowdd1["gaga_name"];
						$htmlzt1["content"] = $rowdd1["gaga_content"];
						$htmlzt1["show"] = $rowdd1["gaga_show"];
						$htmlzt1["date"] = $rowdd1["gaga_date"];
						$htmlzt1 = html_fn($htmlzt1);
						if($htmlzt1["show"]==1){
							$htmlzt1["show_html"] = "是";
						}else{
							$htmlzt1["show_html"] = "否";
						}
			?>
			<tr>
				<td><a href="###" title="人文纪实"><?php echo $htmlzt1["name"] ?></a></td>
				<td><a href="###" title="<?php echo $htmlzt1["content"] ?>"><?php echo $htmlzt1["content"] ?></a></td>
				<td><?php echo $htmlzt1["show_html"] ?></td>
				<td>100</td>
				<td><?php echo $htmlzt1["date"] ?></td>
			</tr>
			<?php } ?>
		</table>
	</article>
</section>
<script>
$(function(){
	var tchtml = '<section id="add_zhuti_k">'+
						 '<h3><a href="#">退出</a>创建日志</h3>'+
						 '<ul>'+
						 '<form method="post" action="?action=addleib">'+
						 '<li><span>类别名称：</span><input type="text" name="title_name" class="ip_txt1" placeholder="请填写类别名称" maxlength="20" /><em class="tji_mc21">0</em>/20</li>'+
						 '<li style="height:110px"><span>类别描述：</span><textarea name="text_content" class="photo_content1" placeholder="请填写类别描述"  maxlength="200"></textarea><em class="tji_mc22">0</em>/200</li>'+
						 '<li>'+
						 '<span>显示：</span>'+
						 '<label class="ck_shi"><input type="radio" name="show_ip" value="1" checked />是</label>'+
						 '<label class="ck_fou"><input type="radio" name="show_ip" value="0" />否</label>'+
						 '</li>'+
						 '<li class="tjiao_li1"><input type="submit"  value="确定" /><input type="button" value="取消" /></li>'+
						 '</form>'+
						 '</ul>'+
						 '</section>';
	// 添加日志分类
	add_fenlei(tchtml);
	// 修改日志分类
	$("#upde_leib").click(function(){
		$("body").append(tchtml);
		$("#add_zhuti_k h3").html('<a href="#">退出</a>修改日志分类');
		if($(".manage_ul li.sele").attr("title") == "all"){
			alert("请选择需要修改的分类！");
			return false;
		}
		$("#add_zhuti_k,#add_photo_kbg").show();
		$("#add_zhuti_k").find("form").attr("action","?action=upde_leib");
		var xg_id = $(".manage_ul li.sele").attr("title");
		// 获取数据
		$.ajax({
			type:"post",
			url:"xp_ajax.php",
			data:"do=upde_leib&id="+xg_id,
			dataType:"json",
			success:function(data){
				$(".ip_txt1").val(data.name);
				$(".photo_content1").val(data.content);
				if(parseInt(data.show)){
					$(".ck_shi").find("input").attr("checked","true");
				}else{
					$(".ck_fou").find("input").attr("checked","true");
				}
				$(".tji_mc21").html($(".ip_txt1").val().length);
				$(".tji_mc22").html($(".photo_content1").val().length);
			}
		});
		// 统计长度
		len_fn(".ip_txt1",".tji_mc21");
		len_fn(".photo_content1",".tji_mc22");
		//判断长度
		$(".tjiao_li1 input:first").click(function(){
			// 去除空格
			$(".ip_txt1").val(trimStr($(".ip_txt1").val()));
			$(".photo_content1").val(trimStr($(".photo_content1").val()));
			
			var ip_txt1_val = $(".ip_txt1").val();
			var photo_content1_val = $(".photo_content1").val();
			
			if(ip_txt1_val.length<3){
				alert("类别名字长度不能小于2位字符串或者大于20位字符串!");
				return false;
			}
			if(photo_content1_val.length<11){
				alert("类别描述长度不能小于10位字符串或者大于200位字符串!");
				return false;
			}
			var title = $(".ip_txt1").val();
			var content = $(".photo_content1").val();
			var show_ip = $("input[name='show_ip']:checked").val();
			// 确定修改
			$.ajax({
				type:"post",
				url:"xp_ajax.php",
				data:"do=upde_leib_y&id="+xg_id+"&title="+title+"&content="+content+"&show="+show_ip,
				dataType:"json",
				success:function(data){
					if(parseInt(data.xgad)){
						alert("修改成功!");
						window.location = "?action=zhuanti&id="+data.id;
					}else{
						alert("修改失败");
					}
				}
			});
			return false;
		})
		
		
	});
	
})
</script>
</body>
</html>