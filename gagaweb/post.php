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
// 定义页面分页
define("PAGE_FY","post");
// 定义标题
define("TITLE","图片管理");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
require ROOT_PATH."/includes/title.inc.php";
//判断是否是超级管理员登录
manage_fn();
if(isset($_GET["action"]) == "zhuanti" && isset($_GET["id"])){
	echo '<script>
			$(function(){
				$(".manage_ul li").each(function(){
					if($(this).attr("title")=="'.$_GET["id"].'"){
						$(this).addClass("sele");
					}
				});
			});
			</script>';
	if($_GET["id"]=="all"){
		// 分页模块
		// 第一个参数是填写需要查询到的数据，第二个参数是填写多少条数据开始分页
		page_fn("SELECT gaga_id FROM gaga_dir ",14);
		// 从数据库里面读取数据
		$result = mysqlquery_fn("SELECT 
				gaga_id,gaga_name,gaga_type,gaga_zhuti,gaga_face,gaga_face1,gaga_dir,gaga_date 
				FROM gaga_dir ORDER BY gaga_date DESC LIMIT $pagenum,$pagesize");
	}else{
		$numt = num_rows_fn(mysqlquery_fn("SELECT gaga_id FROM gaga_zhuti WHERE gaga_id='{$_GET["id"]}' "));
		if($numt==0){
			alert_back("没有此专题！");
		}
		// 分页模块
		// 第一个参数是填写需要查询到的数据，第二个参数是填写多少条数据开始分页
		page_fn("SELECT gaga_id FROM gaga_dir WHERE gaga_zhuti='{$_GET["id"]}' ",14);
		// 从数据库里面读取数据
		$result = mysqlquery_fn("SELECT 
				gaga_id,gaga_name,gaga_type,gaga_zhuti,gaga_face,gaga_face1,gaga_dir,gaga_date FROM gaga_dir
				 WHERE gaga_zhuti='{$_GET["id"]}' ORDER BY gaga_date DESC LIMIT $pagenum,$pagesize");
	}
}else{
	alert_back("非法操作！");
}
$result_zt = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content FROM gaga_zhuti ORDER BY gaga_date ASC ");
// 统计专题类别
$total_zt = num_rows_fn(mysqlquery_fn("SELECT gaga_id FROM gaga_zhuti"));
// 分页设置第几页
global $page,$page_id;
$page_id = "action=zhuanti"."&id=".$_GET["id"]."&";
?>
<body>
<!-- 创建相册 -->
<section id="add_photo_kbg"></section>
<section id="add_zhuti_k">
	<h3><a href="#">退出</a>创建专题</h3>
	<ul>
		<li><span>专题名称：</span><input type="text" class="ip_txt1" placeholder="请填写专题名称" maxlength="20" /><em class="tji_mc21">0</em>/20</li>
		<li style="height:110px"><span>专题描述：</span><textarea class="photo_content1" placeholder="请填写专题描述"  maxlength="200"></textarea><em class="tji_mc22">0</em>/200</li>
		<li class="tjiao_li1"><input type="button"  value="确定" /><input type="button" value="取消" /></li>
	</ul>
</section>
<section id="add_photo_k">
	<h3><a href="#">退出</a>创建相册</h3>
	<form method="post" id="tijiao_fm">
		<ul>
			<li><span>相册名称：</span><input type="text" class="ip_txt" name="photo_name" placeholder="请填写相册名称" maxlength="20" /><em class="tji_mc">0</em>/20</li>
			<li style="height:110px"><span>相册描述：</span><textarea name="photo_content" class="photo_content" placeholder="请填写相册描述"  maxlength="200"></textarea><em class="tji_mc1">0</em>/200</li>
			<li>
				<span>主题：</span>
				<select name="zhuti" class="zhuti">
					<?php 
						$result_zt1 = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content FROM gaga_zhuti ORDER BY gaga_date DESC");
						while (!!$rowtt = mysql_fetch_array($result_zt1)){ 
														$htmlztx = array();
														$htmlztx["id"] = $rowtt["gaga_id"];
														$htmlztx["name"] = $rowtt["gaga_name"];
														$htmlztx = html_fn($htmlztx);
					?>
					<option value="<?php echo $htmlztx["id"] ?>"><?php echo $htmlztx["name"] ?></option>
					<?php } ?>
				</select>
			</li>
			<li><span>权限：</span><select name="quanxian" class="quanxian_se"><option value="0">公开</option><option value="1">私密</option></select> <input type="text" class="ip_txt dn" id="photo_pass" name="photo_pass" placeholder="请填私密内容" /></li>
			<li><span>其他权限：</span><label><input type="checkbox" id="shi_ip" name="qt_quanx" value="1" /> 隐藏拍摄时间、相机信息</label></li>
			<li class="tjiao_li"><input type="button"  value="确定" /><input type="button" value="取消" /></li>
		</ul>
	</form>
</section>
<?php require ROOT_PATH."includes/manage.inc.php" ?>
<section id="manage_right">
	<header class="manage_header" style="height:auto;">
		<ul class="manage_ul" style="width:90%;height:auto;">
			<?php if(!$total_zt==0){ echo '<li title="all"><a href="?action=zhuanti&id=all">全部</a></li>'; }?>
			<?php while (!!$rowdd = mysql_fetch_array($result_zt)){ 
														$htmlzt = array();
														$htmlzt["id"] = $rowdd["gaga_id"];
														$htmlzt["name"] = $rowdd["gaga_name"];
														$htmlzt = html_fn($htmlzt);
			?>
			<li title="<?php echo $htmlzt["id"] ?>"><a href="?action=zhuanti&id=<?php echo $htmlzt["id"] ?>"><?php echo $htmlzt["name"] ?></a></li>
			<?php } ?>
			<span class="add_photo add" id="add_zhuti">添加专题</span>
			<?php if(!$total_zt==0){ ?>
				<span class="add_photo upd" id="xiug_zhuti">修改专题</span>
				<span class="add_photo rem" id="rem_zhuti">删除专题</span>
			<?php } ?>
		</ul>
		
		<a href="login_out.php" id="login_out">退出</a>
	</header>
	<article class="meb_article syzm_art">
		<div class="title_div">
			<?php if($total_zt !=0 ){ ?>
			<a href="#" class="txt_cja" id="add_pho">创建相册</a>
			<a href="#" class="txt_cja">展示设置</a>
			<?php } ?>
		</div>
		<ul id="container" >
			<?php 
				while (!!$row = mysql_fetch_array($result)){ 
														$html = array();
														$html["id"] = $row["gaga_id"];
														$html["name"] = $row["gaga_name"];
														$html["type"] = $row["gaga_type"];
														$html["zhaunti"] = $row["gaga_zhuti"];
														$html["face"] = $row["gaga_face"];
														$html["face1"] = $row["gaga_face1"];
														$aaa = explode(" ",$row["gaga_dir"]);
														$html["dir"] = $aaa[1];
														$html = html_fn($html);
														if($html["type"]==0){
															$html["type_html"] = "公开";
														}else{
															$html["type_html"] = "私密";
														}
			?>
			<li class="city">
				<div class="rel">
					<div><a href="photo.php?dir=<?php echo $html["dir"] ?>&id=<?php echo $html["id"] ?>&title=<?php echo $html["zhaunti"] ?>" class="fangda"></a><a href="photo.php?id=<?php echo $html["id"] ?>" class="alink magnifier"></a></div>
					<span class="sp_img"><?php if(isset($html["face"])&&$html["face1"]){ ?><img data-original="<?php echo $html["face1"] ?>" src="<?php echo $html["face"] ?>" /><?php } ?></span>
					<span class="title_span"><a href="buluo_daxuec.php" id="titlea<?php echo $html["id"] ?>"><?php echo $html["name"]."(".$html["type_html"].")" ?></a><strong><em>
					<?php 
						$ttoal = num_rows_fn(mysqlquery_fn("SELECT gaga_sid FROM gaga_photo WHERE gaga_sid='{$html["id"]}'"));
						if($ttoal==0){
							if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
								// 判断唯一标识符是否正确
								_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
								// 如果相册没有图片则把地址设置成为空
								mysqlquery_fn("UPDATE gaga_dir SET gaga_face=NULL,gaga_face =NULL WHERE gaga_id='{$html["id"]}' LIMIT 1");
							}
						}
						echo $ttoal;
					?>
					</em>张 <a href="javascript:void(0)"  title="<?php echo $html["id"] ?>" class="xiug_phox">修改</a> <a class="remoid" href="javascript:void(0);" title="<?php echo $html["id"] ?>">删除</a></strong></span>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php paging_fn(); ?>
	</article>
</section>
<script>

$(function(){
	$(".ip_txt1,.photo_content1,.ip_txt,.photo_content").blur(function(){
		var values = trimStr($(this).val());
		$(this).val(values);
	});
	// //添加专题
	zhuanti_fn();
	// 删除专题
	$("#rem_zhuti").click(function(){
		var xg_id = $(".manage_ul li.sele").attr("title");
		if($(".manage_ul li.sele").attr("title") == "all"){
			alert("不能删除全部主题！");
			return false;
		}
		$.ajax({
			type:"post",
			url:"remo_ajax_zti.php",
			data:"id="+xg_id,
			dataType:"json",
			success:function(data){
				if(parseInt(data.adds)){
					alert("删除专题成功！");
					$(".manage_ul li:first").addClass("sele");
					$(".manage_ul li.sele").remove();
					window.location = "post.php?action=zhuanti&id=all";
				}else{
					alert("删除专题失败,主题下面不能包含有相册！");
				}
			}
		})
	});
	// 修改专题
	$("#xiug_zhuti").click(function(){
		$("#add_zhuti_k h3").html('<a href="#">退出</a>修改专题');
		if($(".manage_ul li.sele").attr("title") == "all"){
			alert("请选择需要修改的主题！");
			return false;
		}
		$("#add_zhuti_k,#add_photo_kbg").show();
		$(".tjiao_li1 input:first").attr("id","zhut_xiug");
		// 匹配id值
		var xg_id = $(".manage_ul li.sele").attr("title");
		$.ajax({
			type:"post",
			url:"xiug_ajax_zt.php",
			data:"id="+xg_id,
			dataType:"json",
			success:function(data){
				if(parseInt(data.adds)){
					$(".ip_txt1").val(data.name);
					$(".photo_content1").val(data.zhuti);
				}else{
					alert("修改专题失败！");
				}
			}
		});
		// 确定修改
		$("#zhut_xiug").click(function(){
			// 匹配id值
			var xg_id = $(".manage_ul li.sele").attr("title");
			var title1 = $(".ip_txt1").val();
			var cont1 = $(".photo_content1").val();
			// 判断用户名
			if( title1.length < 2 || title1.length > 20 ){
				alert("专题名称长度不能小于2位或者长度不能大于20位！");
				$(".ip_txt1").focus();
				return false;
			}
			// 判断专题名称是否重复
			var pand;
			$.ajax({
				type:"post",
				url:"zhut_ajax.php",
				data:"name="+title1+"&id="+xg_id,
				dataType:"json",
				async:false,
				success:function(data){
					pand = data.adds;
				}
			});
			if(parseInt(pand)>0){
				alert("已经有此专题名字！请改用其他专题名！");
				return false;
			}
			// 确定修改
			$.ajax({
				type:"post",
				url:"xiug_ajax_zt1.php",
				data:"id="+xg_id+"&title="+title1+"&cont="+cont1,
				dataType:"json",
				success:function(data){
					if(parseInt(data.adds)){
						alert("修改成功！");
						window.location = "post.php?action=zhuanti&id="+xg_id;
					}else{
						alert("修改失败！");
					}
				}
			});
			$("#add_zhuti_k,#add_photo_kbg").hide();
		});
	});
});
$(function(){
	// 添加 修改 删除 相册 上传图片
	add_update_up();
})
</script>
<?php require ROOT_PATH."/includes/footer.inc.php"; ?>
</body>
</html>