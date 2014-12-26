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
define("STYLE","index");
// 定义脚本常量
define("SCRIPT","index");
// 定义标题常量
define("TITLE","首页");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
define("START_TIME",runtime());
?>
<?php require ROOT_PATH."includes/title.inc.php" ?>
<link rel="stylesheet" href="css/camera.css" />
<link rel="stylesheet" href="css/touchTouch.css" />
<script src="js/jquery.lazyload.min.js"></script>
<script src='js/jquery.mobile.customized.min.js'></script>
<script src='js/jquery.easing.1.3.js'></script> 
<script src='js/camera.js'></script> 
<script src="js/touchTouch.jquery.js"></script>
<script>if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
<script>
$(function(){
	$("img.lazy").lazyload({ threshold : 200 });
	// $.backstretch("images/pic/1.jpg");    // 设置一个图片的路径
	jQuery('#camera_wrap_2').camera({
		height: '500px',
		loader: 'bar',
		pagination: false,
		thumbnails: true
	});
	jQuery('.magnifier').touchTouch();
});
</script>
<style>
.sec_cont{margin-top:30px;}
.bgw_sec{background:url(images/bg-content.jpg) repeat;margin-top:0;}
.sec_cont{background:none;}
.sec_cont hgroup strong{color:#fff;}
</style>
</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php' ?>
<section class="zhifub">
	<div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
		<div data-thumb="images/pic/jiadtu1.jpg" data-src="images/pic/jiadtu1.jpg">
			<div class="camera_caption fadeFromBottom">深圳科技园</div>
		</div>
		<div data-thumb="images/pic/jiadtu2.jpg" data-src="images/pic/jiadtu2.jpg">
			<div class="camera_caption fadeFromBottom">海岸城</div>
		</div>
		<div data-thumb="images/pic/jiadtu3.jpg" data-src="images/pic/jiadtu3.jpg">
			<div class="camera_caption fadeFromBottom">罗湖夜景</div>
		</div>
		<div data-thumb="images/pic/jiadtu4.jpg" data-src="images/pic/jiadtu4.jpg">
			<div class="camera_caption fadeFromBottom">东湖菊花展</div>
		</div>
		<div data-thumb="images/pic/jiadtu5.jpg" data-src="images/pic/jiadtu5.jpg">
			<div class="camera_caption fadeFromBottom">东湖菊花展</div>
		</div>
	</div>
</section>
<section class="bgw_sec">
	<section class="sec_cont">
		<hgroup><strong>最新发布</strong></hgroup>
		<article class="syzm_art">
			<ul class="syzm_ul">
				<?php 
					$result_zt = mysqlquery_fn("SELECT 
					gaga_id,gaga_name,gaga_zhuanti_id,gaga_content,gaga_url,gaga_burl,gaga_sid 
					FROM gaga_photo ORDER BY gaga_date  DESC LIMIT 0,4");
					while (!!$rowdd = mysql_fetch_array($result_zt)){ 
							$htmlzt = array();
							$htmlzt["name"] = $rowdd["gaga_name"];
							$htmlzt["zt_id"] = $rowdd["gaga_zhuanti_id"];
							$htmlzt["cont"] = $rowdd["gaga_content"];
							$htmlzt["sid"] = $rowdd["gaga_sid"];
							$htmlzt["gaga_url"] = $rowdd["gaga_url"];
							$htmlzt["gaga_burl"] = $rowdd["gaga_burl"];
							
							$rowdd1 = mysql_fetch_array(mysqlquery_fn("SELECT gaga_id,gaga_dir FROM gaga_dir WHERE gaga_id='{$htmlzt["sid"]}' LIMIT 1 "));
							$htmlzt["gaga_id"] = $rowdd1["gaga_id"];
							$htmlzt["dir"] = $rowdd1["gaga_dir"];
							$htmlzt = html_fn($htmlzt);
				?>
				<li>
					<img class="lazy" data-original="<?php echo $htmlzt["gaga_url"] ?>" src="images/pic/logo.gif" />
					<div class="miaos_div">
						<h3><?php echo $htmlzt["name"] ?></h3>
						<p><?php echo $htmlzt["cont"] ?></p>
						<a href="buluo_list.php?dir=<?php echo $htmlzt["dir"] ?>&id=<?php echo $htmlzt["gaga_id"] ?>&title=<?php echo $htmlzt["zt_id"] ?>" class="fangda" ></a>
						<a href="<?php echo $htmlzt["gaga_burl"] ?>" class="alink magnifier"></a>
					</div>
				</li>
				<?php } ?>
			</ul>
			<div class="cl"></div>
		</article>
	</section>
	<section class="sec_cont">
		<hgroup><strong>摄影之美</strong></hgroup>
		<ul class="xzs_ul">
			<li>
				<h3><strong>菊花绽放</strong><span></span></h3>
				<a href="buluo_juhua.php"><img src="images/pic/hua/juhua/3.jpg" /></a>
				<div>春去秋来,风吹菊花漫天开</div>
			</li>
			<li>
				<h3><strong>车水马龙</strong><span></span></h3>
				<a href="buluo_jingji.php"><img src="images/pic/yejing/jingji/4.jpg" /></a>
				<div>车如流水马如龙</div>
			</li>
			<li>
				<h3><strong>海岸夜色</strong><span></span></h3>
				<a href="buluo_jingji.php"><img src="images/pic/yejing/jingji/3.jpg" /></a>
				<div>寒夜之日，独自观摩...</div>
			</li>
		</ul>
		<div class="cl"></div>
	</section>
	<?php require ROOT_PATH.'includes/footer.inc.php' ?>
</section>
</body>
</html>
