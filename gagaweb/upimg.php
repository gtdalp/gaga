<?php
/**
*	尜尜爱摄影 响应式网站1.0
*	=====================
*	Copy 2010-2014 Gaotd
*	Web:http://www.gaotd.net/
*	=====================
*	Author:Gaotd
*	Date:2014-3-17
**/
header("Content-Type:text/html;charset=utf-8");
// 开启session
session_start();
define("NSCRIPT",true);
// 定义标题
define("TITLE_TG","上传图片");
// 定义一个常量防止恶意调用
define("IN_TG",true);
// 定义样式 和 js
define("SCRIPT","list");
define("STYLE","list");
// 引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
// 定义标题
define("TITLE","上传图片");
//判断是否是超级管理员登录
manage_fn();
ini_set('memory_limit','100M');
// 提交数据
if($_GET["action"] == "up"){
	if(!!$_rows1 = fetch_array_fn("SELECT gaga_uniqid,gaga_username FROM gaga_user WHERE gaga_username='{$_COOKIE["username"]}' LIMIT 1")){
		// 判断唯一标识符是否正确
		_uniqid($_rows1["gaga_uniqid"],$_COOKIE["uniqid"]);
		// 设置图片格式
		$fileimg = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
		if (is_array($fileimg)) {
			if (!in_array($_FILES['userfileimg']['type'],$fileimg)) {
				alert_back('上传图片必须是jpg,png,gif中的一种！');
			}
		}
		
		// 取值
		if(!!$rows = fetch_array_fn("SELECT gaga_id,gaga_dir FROM gaga_dir WHERE gaga_id='{$_GET["id"]}' LIMIT 1 ")){
			$html = array();
			$html["id"] = $rows["gaga_id"];
			$html["dir"] = $rows["gaga_dir"];
			$html = html_fn($html);
		}else{
			alert_back("不存在此相册!");
		}
		
		// 判断错误类型
		if($_FILES["userfileimg"]["error"]>0){
			switch ($_FILES["userfileimg"]["error"]){
				case 1 :  alert_back("上传文件超过约定值1！");break;
				case 2 :  alert_back("上传文件超过约定值2！");break;
				case 3 :  alert_back("部分被上传！");break;
				case 4 :  alert_back("没有任何文件被上传！");break;
			}
			exit();
		}
		// 判断上传文件的大小
		if($_FILES["userfileimg"]["size"]>2516582400){
			alert_back("文件不能大于10M");
		}
		
		// 移动文件
		if(is_uploaded_file($_FILES["userfileimg"]["tmp_name"])){
			// 获取文件的后缀
			$hz = explode(".",$_FILES["userfileimg"]["name"]);
			$hzname = $_POST["img_dir"]."/".time().".".$hz[1];
			
			
			if(!@move_uploaded_file($_FILES["userfileimg"]["tmp_name"],$hzname)){
				alert_back("移动文件失败！");
			}else{
				// 获取数据
				$cleant = array();
				$cleant["name"] = $_POST["img_name"];
				$cleant["url"] = $hzname;
				$cleant["content"] = $_POST["content"];
				$cleant["zhuanti_id"] = $_POST["img_ztdx"];
				$cleant["sid"] = $_POST["sid"];
				$cleant = html_fn($cleant);

				$smpng = $_POST["img_dir"]."/"."sm".time().".png";
				$bigpng = $_POST["img_dir"]."/"."big".time().".png";
				thumb_fn($hzname,192,$smpng,270);
				thumb_fn($hzname,900,$bigpng,0);
				
				// 把当前数据写入数据库
				mysqlquery_fn("INSERT INTO gaga_photo 
				(gaga_name,gaga_zhuanti_id,gaga_url,gaga_burl,gaga_content,gaga_sid,gaga_date) 
				VALUES ('{$cleant["name"]}','{$cleant["zhuanti_id"]}','{$smpng}','{$bigpng}','{$cleant["content"]}','{$cleant["sid"]}',NOW())");
			
				if(affected_rows_fn($conn) == 1 ){      // 图片添加成功
					if(file_exists($cleant["url"])){
						unlink($cleant["url"]);
					}else{
						alert_back("不存在此图片!");
					}
					// 判断图片封面是否为空白
					if(!!$rowsxx = fetch_array_fn("SELECT gaga_id,gaga_face,gaga_face1 FROM gaga_dir WHERE gaga_id='{$_GET["id"]}' LIMIT 1")){
						$htmlx = array();
						$htmlx["id"] = $rowsxx["gaga_id"];
						$htmlx["dir"] = $rowsxx["gaga_face"];
						$htmlx = html_fn($htmlx);
						if(!$htmlx["dir"]){
							mysqlquery_fn("UPDATE gaga_dir SET gaga_face = '{$smpng}',gaga_face1 = '{$bigpng}' WHERE gaga_id ='{$_GET["id"]}' LIMIT 1");
						}
					}else{
						alert_back("不存在此相册!");
					}
					//关闭数据库
					close_sql();
					// 跳转到指定的页面
					location_fn("photo.php?dir=".$_POST["img_dir"]."&id=".$cleant["sid"]."&title=".$_POST["img_ztdx"],"恭喜你添加图片成功！");
				}else{
					//关闭数据库
					close_sql();
					// 跳转到指定的页面
					location_fn("photo.php","很遗憾，图片添加失败！");
				}
				location_fn("post.php","上传成功！");
			}
		}else{
			alert_back("临时文件不存在！");
		}
	}else{
		alert_back("非法操作！");
	}
}
if(!isset($_GET["dir"]) || !isset($_GET["title"]) || !isset($_GET["id"])){
	alert_back("不存在此相册!");
}
?>
<?php require ROOT_PATH."includes/title.inc.php"; ?>
<body>
<div id="face">
	<h3>上传图片</h3>
	<form enctype="multipart/form-data" action="?action=up" method="post">
		<input type="text" name="img_dir" value="<?php echo $_GET["dir"] ?>" />
		<input type="text" name="img_ztdx" value="<?php echo $_GET["title"] ?>" />
		<input type="text" name="sid" value="<?php echo $_GET["id"] ?>" />
		<input type="hidden" name="MAX_FILE_SIZE" value="251658240" />
		<ol>
			<li><span>照片名称：</span><input type="text" placeholder="照片名字" name="img_name" /></li>
			<li><span>选择要上传的图片：</span><input type="file" name="userfileimg" /></li>
			<li><span>照片描述：</span><textarea placeholder="照片名字" name="content"></textarea></li>
			<li><span>　　　　</span><input type="submit" value="上传" /></li>
		</ol>
	</form>
	<div class="cl"></div>
</div>
<script>
window.onload = function(){
	var fm = document.getElementsByTagName("form")[0];
	fm.onsubmit = function(){
		var img_dir = this.img_dir.value;
		var sid = this.sid.value;
		this.action = "?action=up&id="+sid;
	}
}
</script>
</body>
</html>