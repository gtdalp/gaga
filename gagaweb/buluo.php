<?php 
/**
*尜尜爱摄影 响应式网站1.0
*============================
*Copy 2014  gaga
*============================
*Author:Gao
*Date:2014-1-16
*/
// 定义一个常量，用了授权调用includes里面的文件
define("IN_TG",true);
// 防止脚本被恶意调用
define("NSCRIPT",true);
// 定义样式常量
define("STYLE","buluo");
// 定义脚本常量
define("SCRIPT","list");
// 定义分页
define("PAGE_FY","buluo");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
define("START_TIME",runtime());
if($_GET["id"]=="all"){
	define("TITLE","全部相册");
}else{
	$result = mysqlquery_fn("SELECT gaga_id,gaga_name FROM gaga_zhuti WHERE gaga_id='{$_GET["id"]}' LIMIT 1");
	$row = mysql_fetch_array($result);
	$html = array();
	$html["title"] = $row["gaga_name"];
	$html = html_fn($html);
	define("TITLE",$html["title"]."相册");
}
?>
<?php require ROOT_PATH."includes/title.inc.php" ?>
<link rel="stylesheet" href="css/touchTouch.css" />
<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
<script src="js/isotope.pkgd.js"></script>
<script>
$(function(){
	jQuery('.magnifier').touchTouch();
})
</script>
<?php
if(isset($_GET["action"]) == "zhuanti" && isset($_GET["id"])){
	echo '<script>
			$(function(){
				var title;
				$("#filters span").each(function(){
					if($(this).attr("title")=="'.$_GET["id"].'"){
						$(this).addClass("s_active").siblings().removeClass("s_active");
						title = $(this).find("a").html();
					}
				});
			});
			</script>';
	// 多少条数据分页
	$pagexd = 10;
	if($_GET["id"]=="all"){
		// 分页模块
		// 第一个参数是填写需要查询到的数据，第二个参数是填写多少条数据开始分页
		page_fn("SELECT gaga_id FROM gaga_dir ",$pagexd);
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
		page_fn("SELECT gaga_id FROM gaga_dir WHERE gaga_zhuti='{$_GET["id"]}' ",$pagexd);
		// 从数据库里面读取数据
		$result = mysqlquery_fn("SELECT
				gaga_id,gaga_name,gaga_type,gaga_zhuti,gaga_face,gaga_face1,gaga_dir,gaga_date FROM gaga_dir
				WHERE gaga_zhuti='{$_GET["id"]}' ORDER BY gaga_date DESC LIMIT $pagenum,$pagesize");
	}
}else{
	alert_back("非法操作！");
}
// 分页设置第几页
global $page,$page_id;
$page_id = "action=zhuanti"."&id=".$_GET["id"]."&";
?>
</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php' ?>
<section class="bgw_sec">
	<section class="sec_cont mc">
		<h3 class="title_h3">摄影部落</h3>
		<div id="filters">
			<span data-filter="all" class="s_active"><a href="?action=zhuanti&id=all">全部</a></span>
			<?php $result_zt = mysqlquery_fn("SELECT gaga_id,gaga_name,gaga_content FROM gaga_zhuti ORDER BY gaga_date ASC ");
						while (!!$rowdd = mysql_fetch_array($result_zt)){ 
														$htmlzt = array();
														$htmlzt["id"] = $rowdd["gaga_id"];
														$htmlzt["name"] = $rowdd["gaga_name"];
														$htmlzt = html_fn($htmlzt);
			?>
			<span data-filter="welove" title="<?php echo $htmlzt["id"] ?>"><a href="?action=zhuanti&id=<?php echo $htmlzt["id"] ?>"><?php echo $htmlzt["name"] ?></a></span>
			<?php } ?>
		</div>
		<article class="syzm_art">
			<ul class="syzm_ul" id="container">
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
														
			?>
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
			?>
			<li class="city">
				<div class="rel">
					<div><a href="buluo_list.php?dir=<?php echo $html["dir"] ?>&id=<?php echo $html["id"] ?>&title=<?php echo $html["zhaunti"] ?>" class="fangda"></a><a href="<?php if(isset($html["face"])&&$html["face1"]){echo $html["face1"];}else{echo "###";} ?>" class="alink magnifier"></a></div>
					<span class="sp_img"><img data-original="<?php echo $html["face1"] ?>" src="<?php if(isset($html["face"])&&$html["face1"]){echo $html["face"];}else{echo "images/pic-none.png";} ?>" /></span>
					<span class="title_span">
						<a href="buluo_list.php?dir=<?php echo $html["dir"] ?>&id=<?php echo $html["id"] ?>&title=<?php echo $html["zhaunti"] ?>" class="fangda"></a><?php echo $html["name"]?></a>
						<strong><em><?php echo $ttoal;?></em>张 </strong>
					</span>
				</div>
			</li>
			<?php } ?>
		</ul>
		<?php paging_fn(); ?>
		</article>
		<div class="cl"></div>
	</section>
	<?php require ROOT_PATH.'includes/footer.inc.php' ?>
</section>
</body>
</html>