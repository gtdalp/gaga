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
define("NSCRIPT","web");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
define("START_TIME",runtime());
?>
<?php require ROOT_PATH."includes/title.inc.php" ?>
<title>web前端- js自定义滚动条</title>
</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php' ?>
<section class="bgw_sec">
	<section class="sec_cont mc">
		<section id="web_sec_l">
			<figure class="figure_lb">
				<h3><a href="#">js自定义滚动条</a></h3>
				<p class="plt_p"><span class="pingl"><i class="icopl"></i><a href="#">10</a>评论</span><time><i class="icotime"></i>2014-2-12 13:47:46</time><span  class="name"><i class="iconame"></i><a href="#">尜尜</a></span></p>
				<div class="p_txt">
					<p>demo下载地址：<a href="images/pic/web/js自定义滚动条.rar" style="color:#f60;text-decoration:underline;">js自定义滚动条.rar</a></p>
	      	        <p>js自定义滚动条效果如下</p>
	      	        <p><img src="images/pic/web/pic_scroll.jpg" title="js自定义滚动条" alt="js自定义滚动条" /></p>
	      	        <p>js主要用到的函数就是clientX和offsetLeft，当鼠标按下不放的时候执行onmousemove事件，改变相应的内容的clientX和offsetLeft。</p>
				</div>
				<div class="cl"></div>
			</figure>
			
			<figure class="shangxyb_firg">
				<p><strong>PREV：</strong><a href="#">html5+css3html5+css3html5+css3html5+css3</a></p>
				<p><strong>NEXT：</strong><a href="#">html5+css3html5+css3html5+css3html5+css3</a></p>
			</figure>
			<section class="plun_sec">
				<h3>最新评论</h3>
				<article class="xx_article">
					<a href="#" class="name_logo"><img src="images/pic/logo.gif" /></a>
					<div class="qchu_div">
						<p><span><a href="#" class="name_cpl">牵着你的手</a><time>16</time><em>小时前</em></span></p>
						<p>不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark!</p>
						<p class="tr"><a href="#" class="btn_huifu">回复</a></p>
					</div>
				</article>
				<article class="xx_article">
					<a href="#" class="name_logo"><img src="images/pic/logo.gif" /></a>
					<div class="qchu_div">
						<p><span><a href="#" class="name_cpl">牵着你的手</a><time>16</time><em>小时前</em></span></p>
						<p>不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark不错mark!</p>
						<p class="tr"><a href="#" class="btn_huifu">回复</a></p>
					</div>
				</article>

			</section>
			<figure class="liuyan_fir">
				<form method="post">
					<h3>提交评论</h3>
					<p><input type="text" placeholder="名字" /><input type="email" placeholder="邮箱" /></p>
					<p><textarea placeholder="评论内容"></textarea></p>
					<p><input type="submit" value="提交" id="btn_plun" /></p>
				</form>
			</figure>
		</section>
		<section id="web_sec_r">
			<figure class="figure_r">
				<h3>搜索</h3>
				<p><input type="submit" class="btn_suos" value="搜索" /><input type="text" class="txt" /></p>
			</figure>
			<dl class="new_dl">
				<dt>最新文章</dt>
				<dd><a href="#">响应式设计是神马?</a></dd>
				<dd><a href="#">响应式设计是神马?</a></dd>
				<dd><a href="#">响应式设计是神马?</a></dd>
				<dd><a href="#">响应式设计是神马?</a></dd>
				<dd><a href="#">响应式设计是神马?</a></dd>
				<dd><a href="#">响应式设计是神马?</a></dd>
			</dl>
			<dl class="new_dl new_dl1">
				<dt>文章类别</dt>
				<dd><a href="#">响应式设计</a></dd>
				<dd><a href="#">html5+css5</a></dd>
				<dd><a href="#">javascript</a></dd>
				<dd><a href="#">web前端</a></dd>
				<dd><a href="#">前端设计</a></dd>
				<dd><a href="#">视觉设计</a></dd>
			</dl>
			<article class="biaoq cl">
				<a href="#">html5</a><a href="#">css3</a><a href="#">扁平式设计</a><a href="#">摄影</a><a href="#">微距</a><a href="#">html5</a><a href="#">css3</a><a href="#">扁平式设计</a><a href="#">摄影</a><a href="#">微距</a><a href="#">html5</a><a href="#">css3</a><a href="#">扁平式设计</a><a href="#">摄影</a><a href="#">微距</a><a href="#">html5</a><a href="#">css3</a><a href="#">扁平式设计</a><a href="#">摄影</a><a href="#">微距</a><a href="#">html5</a><a href="#">css3</a><a href="#">扁平式设计</a><a href="#">摄影</a><a href="#">微距</a>
			</article>
		</section>
		<div class="cl"></div>
	</section>
	<?php require ROOT_PATH.'includes/footer.inc.php' ?>
</section>
</body>
</html>
