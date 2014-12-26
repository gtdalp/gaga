<!DOCTYPE HTML>
<html lang="en-CN">
<head>
<meta charset="utf-8" />
<title>不再支持低版本的浏览器</title>
<script src="js/jquery-1.8.0.min.js"></script>
<script>
$(function(){
	if( $.browser.version > 8.0 ){
		window.open("javascript:history.go(-1)","_self");
	};
});
</script>
<style type="text/css">
body{height:100%;background:url(images/dead_IE.jpg) no-repeat center 120px;}
.lajideIE{text-align:center;margin:15px auto;color:#c00;width:1000px;line-height:30px;}
</style>
</head>
<body>
<div class="lajideIE">
	<p>因为本站是使用HTML5+CSS3建站，所以本站不再支持IE9以下的浏览器，请您使用<a href="http://www.microsoft.com/zh-cn/download/internet-explorer-9-details.aspx">IE9</a>及以上版本的浏览器或者<a href="http://www.firefox.com.cn/">firefox</a>、<a href="http://www.apple.com/cn/safari/">safari</a>、<a href="https://www.google.com/intl/zh-CN/chrome/browser/">chrome</a>、<a href="http://www.opera.com/zh-cn">opera</a>等高级的浏览器！</p>
	<p>灭掉IE9以下的浏览器是前端开发人员的职责!更加是对前端开发人员的喜讯!让我们共同抵制IE9以下的浏览器吧！</p>
</div>
</body>
</html>