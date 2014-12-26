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
// 防止脚本被恶意调用
define("NSCRIPT",true);
// 定义样式常量
define("STYLE","manage");
// 定义脚本常量
define("SCRIPT","manage");
// 定义页面分页
define("PAGE_FY","photo");

// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
//判断是否是超级管理员登录
manage_fn();
// 删除照片
if(isset($_GET["action"]) == "deleteimg" && isset($_GET["id"])){
	if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid,gaga_username,gaga_post_time FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
		// 判断唯一标识符是否正确
		_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
		if(!!$rowsd = fetch_array_fn("SELECT gaga_id,gaga_url,gaga_burl FROM gaga_photo WHERE gaga_id='{$_GET["id"]}' LIMIT 1 ")){
			$htmld = array();
			$htmld["id"] = $rowsd["gaga_id"];
			$htmld["url"] = $rowsd["gaga_url"];
			$htmld["gaga_burl"] = $rowsd["gaga_burl"];
			$htmld = html_fn($htmld);
			
			// 删除数据库照片信息
			mysqlquery_fn("DELETE FROM gaga_photo WHERE gaga_id='{$htmld["id"]}' LIMIT 1 ");

			if(affected_rows_fn($conn) == 1 ){      // 删除成功
				// 删除物理地址照片信息
				if(file_exists($htmld["url"])){
					unlink($htmld["url"]);
				}else{
					alert_back("不存在此图片!");
				}
				if(file_exists($htmld["gaga_burl"])){
					unlink($htmld["gaga_burl"]);
				}else{
					alert_back("不存在此图片!");
				}
				//关闭数据库
				close_sql();
				alert_back("恭喜你删除照片成功！");
				//location_fn("post.php","恭喜你删除照片成功！");
			}else{
				//关闭数据库
				close_sql();
				// 跳转到指定的页面
				location_fn("photo.php","很遗憾，图片删除失败！");
			}
			
		}else{
			alert_back("不存在此相册!");
		}
	}
}
// 取值
if(isset($_GET["dir"])&&isset($_GET["id"])){
	if(!!$rows = fetch_array_fn("SELECT gaga_id,gaga_name,gaga_dir,gaga_zhuti FROM gaga_dir WHERE gaga_zhuti='{$_GET["title"]}' LIMIT 1 ")){
		$html = array();
		$html["id"] = $rows["gaga_id"];
		$html["name"] = $rows["gaga_name"];
		$html["gaga_zhuti"] = $rows["gaga_zhuti"];
		$a1 = explode(" ",$rows["gaga_dir"]);
		$html["dir"] = $a1[1];
		$html = html_fn($html);
	}else{
		alert_back("不存在此相册11111111111!");
	}
}else{
	alert_back("非法操作!");
}
// 分页设置第几页
global $page,$page_id;
$page_id = "dir=".$html["dir"]."&id=".$html["id"]."&title=".$html["gaga_zhuti"]."&";

// 定义标题
define("TITLE",$html["name"]."相册");
?>
<?php require ROOT_PATH."/includes/title.inc.php"; ?>

<body>
<!-- 修改相片 -->
<section id="add_photo_kbg"></section>
<section id="add_photo_k">
	<h3><a href="#">退出</a>修改照片</h3>
	<ul>
		<li><span>相册名称：</span><input type="text" class="ip_txt" name="photo_name" placeholder="请填写相册名称" maxlength="20" /><em class="tji_mc">0</em>/20</li>
		<li style="height:110px"><span>相册描述：</span><textarea name="photo_content" class="photo_content" placeholder="请填写相册描述"  maxlength="200"></textarea><em class="tji_mc1">0</em>/200</li>
		<li>
			<span>主题：</span>
			<select name="zhuti" class="zhuti">
				<?php 
					// 查找所以的主题
					$result_zt1 = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content 
					FROM gaga_zhuti ORDER BY gaga_date DESC ");
					while(!!$rowtt = mysql_fetch_array($result_zt1)){
						$htmlztx = array();
						$htmlztx["id"] = $rowtt["gaga_id"];
						$htmlztx["name"] = $rowtt["gaga_name"];
						$htmlztx = html_fn($htmlztx);
											
						// 查找有相册的主题
						$result_dir = mysqlquery_fn("SELECT gaga_id,gaga_zhuti FROM gaga_dir WHERE gaga_zhuti='{$htmlztx["id"]}' ");
						$row_dir = mysql_fetch_array($result_dir);
						$html_dir = array();
						$html_dir["zhuti"] = $row_dir["gaga_zhuti"];
						$html_dir = html_fn($html_dir);
						if($html_dir["zhuti"]==$htmlztx["id"]){
							echo '<option value="'.$htmlztx["id"].'">'.$htmlztx["name"].'</option>';
						}
					}
				?>
				
			</select>
		</li>
		<li>
			<span>相册：</span>
			<select name="photoc" class="xiangc"></select>
		</li>
		<li class="tjiao_li"><a href="javascript:void(0)"  title="" class="qdxg_pho">确定</a><input type="button" value="取消" /></li>
	</ul>
</section>
<?php require ROOT_PATH."includes/manage.inc.php" ?>
<section id="manage_right">
	<header class="manage_header" style="height:auto;">
		<ul class="manage_ul" style="width:90%;height:auto;">
			<?php 
				$result_zt = mysqlquery_fn("
					SELECT gaga_id,gaga_name,gaga_content FROM 
					gaga_zhuti WHERE gaga_id='{$_GET["title"]}' ORDER BY gaga_date DESC ");

					while (!!$rowdd = mysql_fetch_array($result_zt)){ 
													$htmlzt = array();
													$htmlzt["id"] = $rowdd["gaga_id"];
													$htmlzt["name"] = $rowdd["gaga_name"];
													$htmlzt = html_fn($htmlzt);
					
													
			?>
			<li title="<?php echo $htmlzt["id"] ?>" <?php if($htmlzt["id" ]== $_GET["title"]){ echo 'class="sele"'; } ?>>
				<a href="post.php?action=zhuanti&id=<?php echo $htmlzt["id" ] ?>"><?php echo $htmlzt["name"] ?></a>
			</li>
			<?php } ?>
		</ul>
		<a href="login_out.php" id="login_out">退出</a>
	</header>
	<article class="meb_article syzm_art">
		<div class="title_div">
			<a href="upimg.php?dir=<?php echo $_GET["dir"] ?>&id=<?php echo $_GET["id"] ?>&title=<?php echo $_GET["title"] ?>" class="upimg_a"><i></i>上传图片</a>
			<a href="#" class="txt_cja">展示设置</a>
		</div>
		<ul id="container" >
			<?php 
				// 分页模块
				// 第一个参数是填写需要查询到的数据，第二个参数是填写多少条数据开始分页
				page_fn("SELECT gaga_id FROM gaga_photo WHERE gaga_sid='{$_GET["id"]}' ",4);//  AND gaga_zhuanti_id='{$_GET["title"]}'
				// 从数据库里面读取数据
				$result = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_zhuanti_id ,gaga_content,gaga_burl,gaga_url,gaga_date FROM gaga_photo WHERE gaga_sid='{$_GET["id"]}' ORDER BY gaga_date DESC LIMIT $pagenum,$pagesize");
				while (!!$row = mysql_fetch_array($result)){ 
														$html1 = array();
														$html1["id"] = $row["gaga_id"];
														$html1["name"] = $row["gaga_name"];
														$html1["content"] = $row["gaga_content"];
														$html1["surl"] = $row["gaga_url"];
														$html1["burl"] = $row["gaga_burl"];
														$html1 = html_fn($html1);
														if(!$html1["content"]){
															$html1["content"] = "请填写描述";
														}
			?>
			<li class="city">
				<div class="rel">
					<div><a href="buluo_daxuec.php" class="fangda"></a><a href="<?php echo $html1["burl"] ?>" class="alink magnifier"></a></div>
					<span class="sp_img"><img data-original="<?php echo $html1["burl"] ?>" src="<?php echo $html1["surl"] ?>" /></span>
					<span class="title_span" id="spant<?php echo $html1["id"] ?>">
						<a href="buluo_daxuec.php" class="title_a"><?php echo $html1["name"] ?></a>
						<strong>
							<em><?php echo $html1["content"] ?></em>
							<a href="javascript:void(0)" title="<?php echo $html1["id"] ?>" class="sz_afm">设置封面</a>
							<a href="javascript:void(0)"  title="<?php echo $html1["id"] ?>" class="xiug_pho">修改</a>
							<a href="?action=deleteimg&id=<?php echo $html1["id"] ?>" title="删除">删除</a>
						</strong>
					</span>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php paging_fn(); ?>
	</article>
</section>
<script>
$(function(){
	photojs_fn();
	// 设置图片为封面
	$(".sz_afm").click(function(){
		var id = $(this).attr("title");
		$.ajax({
			type:"post",
			url:"xp_ajax.php",
			data:"do=getinfo3&id="+id,
			dataType:"json",
			success:function(data){
				alert("设置成功！");
			}
		})
	});
})
</script>
<?php require ROOT_PATH."/includes/footer.inc.php"; ?>

</body>
</html>