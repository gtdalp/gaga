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
define("SCRIPT",true);
// 定义样式常量
define("STYLE","web");
// 定义脚本常量
define("NSCRIPT","list");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
define("START_TIME",runtime());
?>
<?php require ROOT_PATH."includes/title.inc.php" ?>
<title>摄影日志</title>
<script src="js/jquery.lazyload.min.js"></script>
<script src="js/jquery.backstretch.js"></script>
<script>
$(function(){
	// 标签云
	var len = $(".biaoq a").length;
	var arr_color = ["#fff","#111","#000"];
	var arr_bgcolor = ["#B45B3E","#336699","#00B271","#EFEFDA","#E8D098","#F0DAD2","#746386","#FF9966","#996600","#CCCC00","#CC6600","#999999","#99CC99","#FFFF99","#CCFFCC","#00CC00","#CCCC66","#336666","#99CC33","#CC9900","#339933"];
	for(var i = 0;i<len;i++){
		$(".biaoq a").eq(i).css({"font-size":random(12,26),"color":arr_color[random(1,arr_color.length)],"background":arr_bgcolor[random(1,arr_bgcolor.length)]})
	};
});
</script>
</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php' ?>
<section class="bgw_sec">
	<section class="sec_cont mc">
		<section id="web_sec_l">
			<figure class="figure_lb">
				<h3><a href="list_laojie.php">即将消失的老街</a></h3>
				<p class="plt_p"><span class="pingl"><i class="icopl"></i><a href="#">100</a>评论</span><time><i class="icotime"></i>2014-1-9 11:30:55</time><span  class="name"><i class="iconame"></i><a href="#">尜尜</a></span></p>
				<a href="list_laojie.php"><img src="images/pic/jishi/laojie/9.jpg" /></a>
				<p class="p_txt"><a href="list_laojie.php">第一次走进家乡这条老街的时候，里面很多房子都是完好无损，就想拿相机记录下这些古典之美，却没有相机，只能把那些古典之美
深深的印在脑海里，心里想着， 以后一定要过来拍一次这个地方。当我拿起相机再次走进这条老街的时候已经是三年之后的昨天，第一眼看
到景象让我感觉有点震惊，感觉自己是来迟了。。。。。</a></p>
				<p class="more"><a href="list_laojie.php">more</a></p>
			</figure>
			<figure class="figure_lb">
				<h3><a href="list_qiubilong.php">可爱的丘比龙</a></h3>
				<p class="plt_p"><span class="pingl"><i class="icopl"></i><a href="#">100</a>评论</span><time><i class="icotime"></i>2014-1-9 11:30:55</time><span  class="name"><i class="iconame"></i><a href="#">尜尜</a></span></p>
				<a href="list_qiubilong.php">
					<img src="images/pic/rizhi/qiubilong/7.gif" alt="" />
					<img src="images/pic/rizhi/qiubilong/6.gif" alt="" />
					<img src="images/pic/rizhi/qiubilong/7.gif" alt="" />
					<img src="images/pic/rizhi/qiubilong/6.gif" alt="" />
					<img src="images/pic/rizhi/qiubilong/7.gif" alt="" />
					<img src="images/pic/rizhi/qiubilong/6.gif" alt="" />
					<img src="images/pic/rizhi/qiubilong/7.gif" alt="" />
				</a>
				<p class="p_txt"><a href="list_qiubilong.php">超级可爱的丘比龙....</a></p>
				<p class="more"><a href="list_qiubilong.php">more</a></p>
			</figure>
			<figure class="figure_lb">
				<h3><a href="list_changshi.php">掌握这些摄影构图技巧，你就是大师！</a></h3>
				<p class="plt_p"><span class="pingl"><i class="icopl"></i><a href="#">100</a>评论</span><time><i class="icotime"></i>2014-1-27 17:05:14</time><span  class="name"><i class="iconame"></i><a href="#">尜尜</a></span></p>
				<a href="list_changshi.php"><img src="images/pic/rizhi/changshi/60.jpg" alt="" /></a>
				<p class="p_txt"><a href="list_changshi.php">不可不学的摄影技巧.1－－构图
    提到摄影，可能大多数朋友都会认为：就是选一处景色美的地方，人往镜头前一站，按下快门不就OK了吗！如果你能静下心来看完我的这篇日志，很有可能会颠覆你的这一观点。</a></p>
				<p class="more"><a href="list_changshi.php">more</a></p>
			</figure>
			<figure class="figure_lb">
				<h3><a href="list_goutu.php">摄影构图</a></h3>
				<p class="plt_p"><span class="pingl"><i class="icopl"></i><a href="#">100</a>评论</span><time><i class="icotime"></i>2014-1-27 17:42:23</time><span  class="name"><i class="iconame"></i><a href="#">尜尜</a></span></p>
				<p class="p_txt"><a href="list_qiubilong.php">对着丰富多彩的现实生活，谁都想拍摄出生动感人的艺术作品。当你很熟悉了解自己的照相机和各种感光材料的性能并掌握了一定的用光，布光知识和技法；当你把镜头对着人物和具有典型意义的事件，对着雄伟的建设场景和壮丽的山河风光，你考虑的一定是如何构成一个理想的画面，创作出完美的艺术形象来。也许就在这个决定作品命运的一瞬间，你深深地感到构图是那么重要，那么关键。在很大的程度上，构图决定着构思的实现，决定着作品的成败。因此，研究摄影构图的实质，就在于帮助我们从周围丰富多彩的事实中选择出典型的生活素材，并赋予它以鲜明的造型形式，创作出具有深刻思想内容与完美形式的摄影艺术作品。</a></p>
				<p class="more"><a href="list_goutu.php">more</a></p>
			</figure>
		</section>
		<?php require ROOT_PATH.'includes/list.right.inc.php' ?>
		<div class="cl"></div>
	</section>
	<?php require ROOT_PATH.'includes/footer.inc.php' ?>
</section>
</body>
</html>