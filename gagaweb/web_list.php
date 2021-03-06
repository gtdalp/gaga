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
<title>web前端- 响应式设计</title>
</head>
<body>
<?php require ROOT_PATH.'includes/header.inc.php' ?>
<section class="bgw_sec">
	<section class="sec_cont mc">
		<section id="web_sec_l">
			<figure class="figure_lb">
				<h3><a href="#">全站html5+css3</a></h3>
				<p class="plt_p"><span class="pingl"><i class="icopl"></i><a href="#">100</a>评论</span><time><i class="icotime"></i>2014-1-9 11:30:55</time><span  class="name"><i class="iconame"></i><a href="#">尜尜</a></span></p>
				<div class="p_txt">
          	      <p>
				  讲到<a target="_blank" title="查看响应式布局中的全部文章" href="http://www.jiawin.com/tag/%e5%93%8d%e5%ba%94%e5%bc%8f%e5%b8%83%e5%b1%80/">响应式布局</a>，相信大家都有一定的了解，响应式布局是今年很流行的一个设计理念，随着移动互联网的盛行，为解决如今各式各样的浏览器分辨率以及不同移动设备的显示效果，设计师提出了响应式布局的设计方案。今天就和大家来讲讲响应式布局这件小事，包含什么是响应式布局、响应式布局的优点和缺点以及响应式布局该怎么设计（通过<code>CSS3 <a target="_blank" title="查看Media Query中的全部文章" href="http://www.jiawin.com/tag/media-query/">Media Query</a></code>实现响应布局）。</p>
					<p style="text-align: center;"><img width="550" height="400" src="http://www.jiawin.com/wp-content/uploads/2012/11/Response-type-design.jpg" alt="Response type design" title="Response type design" class="aligncenter size-full wp-image-489"></p>
					<h4>一、什么是响应式布局?</h4>
					<p>响应式布局是Ethan Marcotte在2010年5月份提出的一个概念，简而言之，就是一个网站能够兼容多个终端&mdash;&mdash;而不是为每个终端做一个特定的版本。这个概念是为解决移动互联网浏览而诞生的。</p>
					<p>响应式布局可以为不同终端的用户提供更加舒适的界面和更好的用户体验，而且随着目前大屏幕移动设备的普及，用大势所趋来形容也不为过。随着越来越多的设计师采用这个技术，我们不仅看到很多的创新，还看到了一些成形的模式。</p>
					<h4>二、响应式布局有哪些优点和缺点?</h4>
					<h5>优点：</h5>
					<ol>
					<li>面对不同分辨率设备灵活性强</li>
					<li>能够快捷解决多设备显示适应问题</li>
					</ol>
					<h5>缺点：</h5>
					<ol>
					<li>兼容各种设备工作量大，效率低下</li>
					<li>代码累赘，会出现隐藏无用的元素，加载时间加长</li>
					<li>其实这是一种折衷性质的设计解决方案，多方面因素影响而达不到最佳效果</li>
					<li>一定程度上改变了网站原有的布局结构，会出现用户混淆的情况</li>
					</ol>
					<h4>三、响应式布局该怎么设计?</h4>
					<p>我们在上面了解了什么是响应式布局，那在我们的实际项目中应该怎么去设计呢?在以往我们设计网站的时候都会受到不同浏览器的兼容性的困扰，现在还要来个不同尺寸设备，我们该怎么淡定下来呢?有需求就会有解决方案，呵呵，说到响应式布局，就不得不提起CSS3中的<code>Media Query</code>（媒介查询），这可是个好东西，易用、强大、快捷……<code>Media Query</code>是制作响应式布局的一个利器，使用这个工具，我们可以非常方便快捷的制造出各种丰富的实用性强的界面。接下来就一起来深入的了解<code>Media Query</code>。</p>
					<h5>1、CSS中的Media Query（媒介查询）是什么?</h5>
					<p>通过不同的媒体类型和条件定义样式表规则。媒体查询让CSS可以更精确作用于不同的媒体类型和同一媒体的不同条件。媒体查询的大部分媒体特性都接受<code>min</code>和<code>max</code>用于表达”大于或等于”和”小与或等于”。如：width会有<code>min-width</code>和<code>max-width</code>媒体查询可以被用在CSS中的<code>@media</code>和<code>@import</code>规则上，也可以被用在HTML和XML中。通过这个标签属性，我们可以很方便的在不同的设备下实现丰富的界面，特别是移动设备，将会运用更加的广泛。</p>
					<h5>2、media query能够获取哪些值?</h5>
					<ul>
					<li>设备的宽和高device-width，device-heigth显示屏幕/触觉设备。</li>
					<li>渲染窗口的宽和高width，heigth显示屏幕/触觉设备。</li>
					<li>设备的手持方向，横向还是竖向orientation(portrait|lanscape)和打印机等。</li>
					<li>画面比例aspect-ratio点阵打印机等。</li>
					<li>设备比例device-aspect-ratio-点阵打印机等。</li>
					<li>对象颜色或颜色列表color，color-index显示屏幕。</li>
					<li>设备的分辨率resolution。</li>
					</ul>
					<h5>3、语法结构及用法</h5>
					<pre>@media 设备名 only (选取条件) not (选取条件) and(设备选取条件)，设备二{sRules}</pre>
					<p><strong>示例一：在link中使用@media：</strong></p>
					<pre>&lt;link rel="stylesheet" type="text/<a target="_blank" title="查看css中的全部文章" href="http://www.jiawin.com/tag/css/">css</a>" media="only screen and (max-width: 480px),only screen and (max-device-width: 480px)" href="link.css"/&gt;</pre>
					<p>上面使用中only可省略，限定于计算机显示器，第一个条件<code>max-width</code>是指渲染界面最大宽度，第二个条件<code>max-device-width</code>是指设备最大宽度。</p>
					<p><strong>示例二：在样式表中内嵌@media：</strong></p>
					<pre>@media (min-device-width:1024px) and (max-width:989px),screen and (max-device-width:480px),(max-device-width:480px) and (orientation:landscape),(min-device-width:480px) and (max-device-width:1024px) and (orientation:portrait) {srules}</pre>
					<p>在示例二中，设置了电脑显示器分辨率（宽度）大于或等于1024px（并且最大可见宽度为989px）；屏宽在480px及其以下手持设备；屏宽在480px以及横向（即480尺寸平行于地面）放置的手持设备；屏宽大于或等于480px小于1024px以及垂直放置设备的css样式。</p>
					<p>从上面的例子可以看出，字符间以空格相连，选取条件包含在小括号内，<code>srules</code>为兼容设置的样式表，包含在中括号里面。<code>only</code>（限定某种设备，可省略），<code>and</code>（逻辑与），<code>not</code>（排除某种设备）为逻辑关键字，多种设备用逗号分隔，这一点继承了css基本语法。</p>
					<h5>4、可用设备名参数：</h5>
					<table cellspacing="0" border="0">
					<thead>
					<tr>
					<th>类型</th>
					<th>解释</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td>all</td>
					<td>所有设备</td>
					</tr>
					<tr>
					<td>braille</td>
					<td>盲文</td>
					</tr>
					<tr>
					<td>embossed</td>
					<td>盲文打印</td>
					</tr>
					<tr>
					<td>handheld</td>
					<td>手持设备</td>
					</tr>
					<tr>
					<td>print</td>
					<td>文档打印或打印预览模式</td>
					</tr>
					<tr>
					<td>projection</td>
					<td>项目演示，比如幻灯</td>
					</tr>
					<tr>
					<td>screen</td>
					<td>彩色电脑屏幕</td>
					</tr>
					<tr>
					<td>speech</td>
					<td>演讲</td>
					</tr>
					<tr>
					<td>tty</td>
					<td>固定字母间距的网格的媒体，比如电传打字机</td>
					</tr>
					<tr>
					<td>tv</td>
					<td>电视</td>
					</tr>
					</tbody>
					</table>
					<h5>5、逻辑关键字：</h5>
					<table cellspacing="0" border="0">
					<tbody>
					<tr>
					<th>关键字</th>
					<th>说明</th>
					</tr>
					<tr>
					<td>only</td>
					<td>限定某种设备类型</td>
					</tr>
					<tr>
					<td>and</td>
					<td>逻辑与，连接设备名与选择条件、选择条件1与选择条件2</td>
					</tr>
					<tr>
					<td>not</td>
					<td>排除某种设备</td>
					</tr>
					<tr>
					<td>,</td>
					<td>设备列表</td>
					</tr>
					</tbody>
					</table>
					<h5>6、可用设备名参数：</h5>
					<table cellspacing="0" border="0">
					<tbody>
					<tr>
					<th align="center">媒体特性</th>
					<th align="center">值</th>
					<th width="110" align="center">可用媒体类型</th>
					<th align="center">接受min/max</th>
					<th align="center">简介</th>
					</tr>
					<tr>
					<td align="center">width</td>
					<td align="center">&lt;length&gt;</td>
					<td width="110" align="center">视觉屏幕/触摸设备</td>
					<td align="center">yes</td>
					<td>定义输出设备中的页面可见区域宽度(单位一般为px)</td>
					</tr>
					<tr>
					<td align="center">heigth</td>
					<td align="center">&lt;length&gt;</td>
					<td width="110" align="center">视觉屏幕/触摸设备</td>
					<td align="center">yes</td>
					<td>定义输出设备中的页面可见区域高度(单位一般为px)</td>
					</tr>
					<tr>
					<td align="center">device-width</td>
					<td align="center">&lt;length&gt;</td>
					<td width="110" align="center">视觉屏幕/触摸设备</td>
					<td align="center">yes</td>
					<td>定义输出设备的屏幕可见宽度(单位一般为px)</td>
					</tr>
					<tr>
					<td align="center">device-heigth</td>
					<td align="center">&lt;length&gt;</td>
					<td width="110" align="center">视觉屏幕/触摸设备</td>
					<td align="center">yes</td>
					<td>定义输出设备的屏幕可见高度(单位一般为px)</td>
					</tr>
					<tr>
					<td align="center">orientation</td>
					<td align="center">portrait | landscape</td>
					<td width="110" align="center">位图介质类型</td>
					<td align="center">no</td>
					<td>定义’height’是否大于或等于’width’。值portrait代表是，landscape代表否即设，备手持方向：portait为横向，landscape为竖向</td>
					</tr>
					<tr>
					<td align="center">aspect-ratio</td>
					<td align="center">&lt;ratio&gt;</td>
					<td width="110" align="center">位图介质类型</td>
					<td align="center">yes</td>
					<td>定义’width’与’height’的比率，即浏览器的长宽比</td>
					</tr>
					<tr>
					<td align="center">device-aspect-ratio</td>
					<td align="center">&lt;ratio&gt;</td>
					<td width="110" align="center">位图介质类型</td>
					<td align="center">yes</td>
					<td>定义’device-width’与’device-height’的比率，即设备屏幕长宽比。如常见的显示器比率：4/3， 16/9，16/10</td>
					</tr>
					<tr>
					<td align="center">color</td>
					<td align="center">&lt;integer&gt;</td>
					<td width="110" align="center">视觉媒体</td>
					<td align="center">yes</td>
					<td>定义每一组输出设备的彩色原件个数。如果不是彩色设备，则值等于0</td>
					</tr>
					<tr>
					<td align="center">color-index</td>
					<td align="center">&lt;integer&gt;</td>
					<td width="110" align="center">视觉媒体</td>
					<td align="center">yes</td>
					<td>定义在输出设备的彩色查询表中的条目数。如果没有使用彩色查询表，则值等于0</td>
					</tr>
					<tr>
					<td align="center">monochrome</td>
					<td align="center">&lt;integer&gt;</td>
					<td width="110" align="center">视觉媒体</td>
					<td align="center">yes</td>
					<td>定义在一个单色框架缓冲区中每像素包含的单色原件个数。如果不是单色设备，则值等于0</td>
					</tr>
					<tr>
					<td align="center">resolution</td>
					<td align="center">&lt;resolution&gt;</td>
					<td width="110" align="center">位图介质类型</td>
					<td align="center">yes</td>
					<td>定义设备的分辨率。如：96dpi，300dpi，118dpcm</td>
					</tr>
					<tr>
					<td align="center">scan</td>
					<td align="center">progressive | interlace</td>
					<td width="110" align="center">电视类</td>
					<td align="center">no</td>
					<td>定义电视类设备的扫描工序， progressive逐行扫描，interlace隔行扫描</td>
					</tr>
					<tr>
					<td align="center">grid</td>
					<td align="center">&lt;integer&gt;</td>
					<td width="110" align="center">栅格设备</td>
					<td align="center">no</td>
					<td>用来查询输出设备是否使用栅格或点阵。只有1和0才是有效值，1代表是，0代表否</td>
					</tr>
					</tbody>
					</table>
					<h5>7、测试Media Queries</h5>
					<p>最后，我们需要对我们刚刚设计的<code>Media Queries</code>进行测试，想要在不同设备上测试<code>Media Queries</code>的效果，可以使用一个浏览工具来检验不同尺寸屏幕下的显示效果，在这里为大家介绍一个不错的在线工具 &ndash; <a target="_blank" href="http://dfcb.github.com/Responsivator/?site=http://www.jiawin.com"><strong>Responsivator</strong></a>，它可以模拟iPhone等各种不同设备，并且还可以自定义不同尺寸屏幕的显示效果，只需要输入一个url甚至是本地的一个url(如:http://127.0.0.1/)，就可以看到网站在不同尺寸屏幕下的显示效果.</p>
					<h5>8、通过Media Queries实现响应式布局设计</h5>
					<p>好了，我们明白了什么是<code>Media Query</code>，那我们一起来运用到响应式布局的设计项目中去。设计思路很简单，首先先定义在标准浏览器下的固定宽度（假如标准浏览器的分辨率为1024px，那么我们设置宽为980px），然后用<code>Media Query</code>来监测浏览器的尺寸变化，当浏览器的分辨率小于1024px的时候，则通过<code>Media Query</code>预设的样式表来将页面的宽度设置为百分比显示，这样子页面的结构元素就会根据浏览器的的尺寸来进行相对应的调整。同理，当浏览器的可视区域改变到某个值（假如为650px）的时候，页面的结构元素根据<code>Media Query</code>预设的层叠样式表来进行相对应的调整。看看我们的例子：</p>
					<pre> /* 当浏览器的可视区域小于980px */
					@media screen and (max-width: 980px) {
						 #wrap {width: 90%; margin:0 auto;}
						 #content {width: 60%;padding: 5%;}
						 #sidebar {width: 30%;}
						 #footer {padding: 8% 5%;margin-bottom: 10px;}
					}
					 /* 当浏览器的可视区域小于650px */
					@media screen and (max-width: 650px) {
						 #header {height: auto;}
						 #searchform {position: absolute;top: 5px;right: 0;}
						 #content {width: auto; float: none; margin: 20px 0;}
						 #sidebar {width: 100%; float: none; margin: 0;}
					 }</pre>
					<p>通过上面我们就可以监测浏览器的可视区域变化的是时候我们的页面结构元素也会相对应的变化，当然你可以再多设置几个尺寸的监测层叠样式表，这样子就可以根据不同尺寸设备来进行响应式的布局。为了更好的显示效果，我们往往还要格式化一些CSS属性的初始值：</p>
					<pre>/* 禁用iPhone中Safari的字号自动调整 */
					html {
						-webkit-text-size-adjust: none;
					}
					/* 设置HTML5元素为块 */
					article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
						display: block;
					}
					/* 设置图片视频等自适应调整 */
					img {
						max-width: 100%;
						height: auto;
						width: auto\9; /* ie8 */
					}
					.video embed, .video object, .video iframe {
						width: 100%;
						height: auto;
					}</pre>
					<p>最后要注意的是在页面的头部<code>&lt;head&gt;&lt;/head&gt;</code>之间加上下面这句∶</p>
					<pre>&lt;meta name="viewport" content="width=device-width; initial-scale=1.0"&gt;</pre>
					<p><code>meta viewport</code>这个属性是在移动设备上设置原始大小显示和是否缩放的声明。</p>
					<p><strong>参数设置∶</strong></p>
					<ul>
					<li>width &ndash; viewport的宽度</li>
					<li>height &ndash; viewport的高度</li>
					<li>initial-scale &ndash; 初始的缩放比例</li>
					<li>minimum-scale &ndash; 允许用户缩放到的最小比例</li>
					<li>maximum-scale &ndash; 允许用户缩放到的最大比例</li>
					<li>user-scalable &ndash; 用户是否可以手动缩放</li>
					</ul>
					<p>最后对于在IE浏览器中不支持<code>media query</code>的情况，我们可以使用<code>Media Query JavaScript</code>来解决，只需要在页面头部引用<code>css3-mediaqueries.js</code>即可。示例：</p>
					<pre>&lt;!--[if lt IE 9]&gt;
						 &lt;script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"&gt;
					&lt;/script&gt; &lt;![endif]--&gt;</pre>
					<p>好了，响应式布局的小事就这么多，如你有好的补充意见或不同的见解，可以<a target="_blank" href="http://www.jiawin.com/contact-us/">联系我</a>，我们一起探讨这件小事……</p>
										<div class="copyright">除非特殊注明，本文版权归原作者所有，欢迎转载！转载请注明版权以及本文地址，谢谢。<br>
							  转载保留版权：<a href="http://www.jiawin.com" title="觉唯">觉唯</a> &gt;&gt; <a href="http://www.jiawin.com/response-type-layout-design/" title="响应式布局这件小事" rel="bookmark">响应式布局这件小事</a><br>
					本文地址：<a rel="bookmark" title="响应式布局这件小事" href="http://www.jiawin.com/response-type-layout-design/">http://www.jiawin.com/response-type-layout-design/</a> + <a onclick="copy_code('http://www.jiawin.com/response-type-layout-design/'); return false;" href="#">复制链接</a></div>
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
