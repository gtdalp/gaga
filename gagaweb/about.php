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
define("STYLE","about");
// 定义脚本常量
define("NSCRIPT","about");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
define("START_TIME",runtime());
?>
<?php require ROOT_PATH."includes/title.inc.php" ?>
<title>关于我-ABOUT</title>
<style type="text/css">
.bgw_sec{overflow:hidden;}
</style>
</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php' ?>
<section class="bgw_sec rel">
<div id="canvas" ></div>
<script src="js/protoclass.js"></script>
<script src="js/box2d.js"></script>
<script src="js/Main.js"></script>
	<section id="about" class="mc">
		<h3>关于我　<strong>295194117@qq.com</strong></h3>
		<article id="about_right">
			开通网站是为了老婆，以下是关于我的对老婆的条例

			1.可以天天问候她，天天都能照顾到她；

			2.不要猜疑你们之间的感情；

			3.老婆有想法就要参考后在做判断；

			4.对老婆说话要注意分寸；

			5.总而言之，对老婆要有度量

			6.老婆化妆时要耐心等待；

			7.给零钱花时要含泪感激，省吃俭用；

			8.购物时要积极付款，义不容辞；

			9.训话时要立正站好，低头忏悔；

			10.吃饭时要给老婆盛饭夹菜；

			11.老婆说的 做的 都是对的 永远是第一位的 要绝对服从领导；

			12.如果发现 老婆哪里说的 做的不对 那绝对是错误的发现；

			13.老婆永远是第一位的 如果发现有别人比老婆重要 参照第一条处理。
		</article>
		<div class="cl"></div>
	</section>
	<?php require ROOT_PATH.'includes/footer.inc.php' ?>
</section>
</body>
</html>