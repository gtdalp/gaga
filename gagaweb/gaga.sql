-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2014 年 03 月 26 日 10:01
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `gaga`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `gaga_article`
-- 

CREATE TABLE `gaga_article` (
  `gaga_id` mediumint(8) unsigned NOT NULL auto_increment COMMENT '//ID',
  `gaga_reid` mediumint(8) NOT NULL default '0' COMMENT '//回帖id',
  `gaga_username` varchar(20) NOT NULL COMMENT '//发表人',
  `gaga_last_modity_date` datetime NOT NULL COMMENT '//最后修改时间',
  `gaga_type` varchar(2) NOT NULL COMMENT '//文章类型',
  `gaga_title` varchar(40) NOT NULL COMMENT '//文章标题',
  `gaga_content` text NOT NULL COMMENT '//文章内容',
  `gagareadcont` mediumint(9) unsigned NOT NULL COMMENT '//阅读量',
  `gaga_commendcont` mediumint(9) unsigned NOT NULL COMMENT '//评论数',
  `gaga_date` datetime NOT NULL COMMENT '//发表时间',
  PRIMARY KEY  (`gaga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- 
-- 导出表中的数据 `gaga_article`
-- 

INSERT INTO `gaga_article` VALUES (1, 0, 'gtd_alp', '0000-00-00 00:00:00', '1', '我要发帖', '我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖我要发帖[img]images/qpic/3/9.gif[/img][color=#09f][/color][size=18][/size]', 117, 0, '2014-03-07 11:01:07');
INSERT INTO `gaga_article` VALUES (2, 0, 'gtd_alp', '0000-00-00 00:00:00', '11', '我喜欢打羽毛球', '[img]images/qpic/4/5.gif[/img]我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球我喜欢打羽毛球', 16, 0, '2014-03-07 14:00:44');
INSERT INTO `gaga_article` VALUES (3, 0, 'gtd_alp', '0000-00-00 00:00:00', '1', '我是尜尜', '[size=10]尜尜10号字体[/size]\r\n[b]尜尜粗体[/b]\r\n[i]尜尜斜体[/i]\r\n[u]尜尜下划线[/u]\r\n[s]尜尜删除线[/s]\r\n[color=#fff]尜尜红色[/color]\r\n[url]http://www.gaotd.net[/url]\r\n[email]295194117@qq.com[/email]\r\n[flash]http://www.gaotd.net/flash.swf[/flash]', 25, 0, '2014-03-07 15:10:37');
INSERT INTO `gaga_article` VALUES (4, 0, 'gtd_alp', '0000-00-00 00:00:00', '2', '我是尜尜', '[size=20]尜尜[/size][b]刚的撒个大短发[/b][color=#f00]刚的撒的撒[/color][img]images/qpic/4/3.gif[/img][img]images/qpic/4/9.gif[/img][img]images/qpic/4/4.gif[/img]', 20, 0, '2014-03-07 15:32:31');
INSERT INTO `gaga_article` VALUES (5, 0, 'gtd_alp', '0000-00-00 00:00:00', '1', 'ILOVEYOUGAGA', 'I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU I LOVE YOU [img]images/qpic/4/8.gif[/img][img]images/qpic/4/9.gif[/img][img]images/qpic/4/6.gif[/img][img]images/qpic/4/5.gif[/img][img]images/qpic/4/1.gif[/img]', 4, 0, '2014-03-07 16:20:34');
INSERT INTO `gaga_article` VALUES (6, 0, 'gtd_alp', '0000-00-00 00:00:00', '10', '我喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢', '喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢喜欢[img]images/qpic/4/5.gif[/img]', 197, 0, '2014-03-07 16:36:01');
INSERT INTO `gaga_article` VALUES (17, 0, 'gaga10', '0000-00-00 00:00:00', '1', '测试测试测试测试测试测试测试测试', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试[img]images/qpic/4/3.gif[/img]', 2, 0, '2014-03-10 11:42:34');
INSERT INTO `gaga_article` VALUES (18, 0, 'gaga10', '0000-00-00 00:00:00', '8', '核爆核爆核爆核爆核爆核爆核爆核爆', '核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆核爆[img]images/qpic/4/5.gif[/img][img]images/qpic/4/2.gif[/img][img]images/qpic/3/9.gif[/img][img]images/qpic/1/8.gif[/img]', 128, 13, '2014-03-10 13:15:56');
INSERT INTO `gaga_article` VALUES (19, 18, 'gaga9', '0000-00-00 00:00:00', '8', '', '尜尜真牛！！！！！！！！！！！！！！！！！！！！', 0, 0, '2014-03-10 13:17:14');
INSERT INTO `gaga_article` VALUES (20, 18, 'gaga9', '0000-00-00 00:00:00', '8', '', '尜尜牛逼啊！！！！！！！', 0, 0, '2014-03-10 13:18:02');
INSERT INTO `gaga_article` VALUES (21, 18, 'gaga5', '0000-00-00 00:00:00', '8', '', '尜尜和牛逼啊', 0, 0, '2014-03-10 13:18:44');
INSERT INTO `gaga_article` VALUES (22, 18, 'gaga7', '0000-00-00 00:00:00', '8', '', '尜尜超级牛逼啊！！！！！！！！！！！！！！！！！', 0, 0, '2014-03-10 13:19:29');
INSERT INTO `gaga_article` VALUES (23, 18, 'gaga15', '0000-00-00 00:00:00', '8', '', '尜尜灰常灰常牛逼啊[img]images/qpic/4/11.gif[/img]', 0, 0, '2014-03-10 13:22:09');
INSERT INTO `gaga_article` VALUES (24, 18, 'gaga15', '0000-00-00 00:00:00', '8', '', '我不牛逼啊!!!!!!!!', 0, 0, '2014-03-10 13:53:59');
INSERT INTO `gaga_article` VALUES (25, 18, 'gaga23', '0000-00-00 00:00:00', '8', '', '我是真的不牛逼啊！', 0, 0, '2014-03-10 13:54:44');
INSERT INTO `gaga_article` VALUES (26, 18, 'gaga23', '0000-00-00 00:00:00', '8', '', '我是真真的不牛逼!', 0, 1, '2014-03-10 13:55:12');
INSERT INTO `gaga_article` VALUES (27, 18, 'gaga14', '0000-00-00 00:00:00', '8', '', '尜尜超级牛逼啊', 0, 1, '2014-03-10 14:13:54');
INSERT INTO `gaga_article` VALUES (28, 0, 'gaga1', '0000-00-00 00:00:00', '5', '我喜欢音乐我喜欢音乐', '我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐我喜欢音乐[img]images/qpic/4/6.gif[/img]', 1, 0, '2014-03-10 14:53:34');
INSERT INTO `gaga_article` VALUES (29, 0, 'gaga1', '0000-00-00 00:00:00', '6', '我不喜欢打牌', '我不喜欢打牌我不喜欢打牌我不喜欢打牌我不喜欢打牌我不喜欢打牌[img]images/qpic/4/2.gif[/img][img]images/qpic/2/9.gif[/img][img]images/qpic/1/13.gif[/img]', 5, 0, '2014-03-10 14:54:19');
INSERT INTO `gaga_article` VALUES (30, 0, 'gaga3', '0000-00-00 00:00:00', '7', '摄影无穷乐趣', '摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣摄影无穷乐趣[img]images/qpic/4/5.gif[/img]', 13, 1, '2014-03-10 14:55:02');
INSERT INTO `gaga_article` VALUES (31, 18, 'gaga3', '0000-00-00 00:00:00', '8', '', '尜尜牛逼吗11111111111111111111111111111111111111111！！！！！！！！！！！[img]images/qpic/4/5.gif[/img]', 0, 1, '2014-03-10 15:08:56');
INSERT INTO `gaga_article` VALUES (32, 18, 'gaga20', '0000-00-00 00:00:00', '8', '', '牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼牛逼！！！！！！！！！！！！！！', 0, 1, '2014-03-10 15:15:38');
INSERT INTO `gaga_article` VALUES (33, 18, 'gaga20', '0000-00-00 00:00:00', '8', '', 'GAGA是牛逼!!!!!!!!!!!!!', 0, 1, '2014-03-10 15:28:45');
INSERT INTO `gaga_article` VALUES (34, 30, 'gaga20', '0000-00-00 00:00:00', '7', '', '尜尜你喜欢摄影？', 0, 1, '2014-03-10 15:31:19');
INSERT INTO `gaga_article` VALUES (35, 0, 'gaga20', '0000-00-00 00:00:00', '11', '周二打球！！！！！！', '打球报名啦！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！[img]images/qpic/4/21.gif[/img]', 4, 0, '2014-03-10 15:32:02');
INSERT INTO `gaga_article` VALUES (36, 0, 'gaga20', '0000-00-00 00:00:00', '10', '尜尜牛逼', '尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼尜尜牛逼', 12, 0, '2014-03-10 15:42:59');
INSERT INTO `gaga_article` VALUES (37, 0, 'gaga20', '2014-03-10 17:16:23', '2', '尜尜我爱你1', '尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你尜尜我爱你[img]images/qpic/4/6.gif[/img]', 40, 3, '2014-03-10 16:51:46');
INSERT INTO `gaga_article` VALUES (38, 37, 'gtd_alp', '0000-00-00 00:00:00', '2', '', '你是牛逼！！！！', 0, 1, '2014-03-11 09:37:15');
INSERT INTO `gaga_article` VALUES (39, 37, 'gtd_alp', '0000-00-00 00:00:00', '2', '', '超级牛逼！！！！！！！', 0, 1, '2014-03-11 09:38:29');
INSERT INTO `gaga_article` VALUES (40, 37, 'gtd_alp', '0000-00-00 00:00:00', '2', '', '嘻嘻嘻！！！！！！！', 0, 1, '2014-03-11 09:40:36');

-- --------------------------------------------------------

-- 
-- 表的结构 `gaga_dir`
-- 

CREATE TABLE `gaga_dir` (
  `gaga_id` mediumint(8) unsigned NOT NULL auto_increment COMMENT '//id',
  `gaga_name` varchar(20) NOT NULL COMMENT '// 相册名称',
  `gaga_type` tinyint(1) NOT NULL COMMENT '// 相册类型',
  `gaga_zhuti` mediumint(8) NOT NULL COMMENT '//主题类型',
  `gaga_password` char(40) default NULL COMMENT '//相册密码',
  `gaga_content` varchar(200) default NULL COMMENT '//相册描述',
  `gaga_dir` varchar(1000) NOT NULL COMMENT '// 相册的物理地址',
  `gaga_face` varchar(1000) default NULL COMMENT '//相册封面',
  `gaga_face1` varchar(1000) default NULL COMMENT '// 大图路径',
  `gaga_qit` tinyint(1) NOT NULL default '0' COMMENT '// 其他权限',
  `gaga_date` datetime NOT NULL COMMENT '//创建的时间',
  `gaga_last_time` datetime NOT NULL COMMENT '//相册最后修改时间',
  PRIMARY KEY  (`gaga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

-- 
-- 导出表中的数据 `gaga_dir`
-- 

INSERT INTO `gaga_dir` VALUES (120, '合照', 0, 60, NULL, '', ' photo/1395813887', 'photo/1395813887/sm1395813946.png', 'photo/1395813887/big1395813946.png', 1, '2014-03-26 14:04:47', '0000-00-00 00:00:00');
INSERT INTO `gaga_dir` VALUES (114, '微距大师', 0, 59, NULL, '尜尜', ' photo/1395652098', 'photo/1395652098/sm1395715840.png', 'photo/1395652098/big1395715840.png', 1, '2014-03-24 17:08:18', '0000-00-00 00:00:00');
INSERT INTO `gaga_dir` VALUES (116, '尜尜', 0, 58, NULL, '分大小', ' photo/1395718240', 'photo/1395718240/sm1395718259.png', 'photo/1395718240/big1395718259.png', 1, '2014-03-25 11:30:40', '0000-00-00 00:00:00');
INSERT INTO `gaga_dir` VALUES (117, '想想', 0, 55, NULL, '', ' photo/1395731952', 'photo/1395731952/sm1395812421.png', 'photo/1395731952/big1395812421.png', 1, '2014-03-25 15:19:12', '0000-00-00 00:00:00');
INSERT INTO `gaga_dir` VALUES (118, '丘比龙', 0, 56, NULL, '', ' photo/1395732000', 'photo/1395732000/sm1395812209.png', 'photo/1395732000/big1395812209.png', 1, '2014-03-25 15:20:00', '0000-00-00 00:00:00');
INSERT INTO `gaga_dir` VALUES (119, '撒放大', 0, 48, NULL, '阿凡达', ' photo/1395732033', 'photo/1395732033/sm1395732049.png', 'photo/1395732033/big1395732049.png', 1, '2014-03-25 15:20:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `gaga_photo`
-- 

CREATE TABLE `gaga_photo` (
  `gaga_id` mediumint(8) unsigned NOT NULL auto_increment COMMENT '//id',
  `gaga_zhuanti_id` mediumint(8) unsigned NOT NULL default '1' COMMENT '//专题id',
  `gaga_zhuanti_name` varchar(200) NOT NULL COMMENT '//专题名字',
  `gaga_name` varchar(50) NOT NULL COMMENT '//照片名称',
  `gaga_url` varchar(1000) NOT NULL COMMENT '//照片路径',
  `gaga_burl` varchar(1000) NOT NULL COMMENT '// 大图地址',
  `gaga_content` varchar(1000) default NULL COMMENT '//照片描述',
  `gaga_sid` mediumint(8) NOT NULL COMMENT '//照片存放的目录id',
  `gaga_date` datetime NOT NULL COMMENT '//照片上传时间',
  `gaga_last_time` datetime NOT NULL COMMENT '//照片修改时间',
  PRIMARY KEY  (`gaga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

-- 
-- 导出表中的数据 `gaga_photo`
-- 

INSERT INTO `gaga_photo` VALUES (188, 56, '', '发芽', 'photo/1395732000/sm1395812209.png', 'photo/1395732000/big1395812209.png', '向日葵', 118, '2014-03-26 13:36:56', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (189, 55, '', '水珠', 'photo/1395731952/sm1395812421.png', 'photo/1395731952/big1395812421.png', '水珠水珠', 117, '2014-03-26 13:40:28', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (190, 48, '', '黄昏', 'photo/1395732033/sm1395813593.png', 'photo/1395732033/big1395813593.png', '放大', 119, '2014-03-26 13:59:57', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (191, 60, '', '2011', 'photo/1395813887/sm1395813946.png', 'photo/1395813887/big1395813946.png', '最美的合照', 120, '2014-03-26 14:05:46', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (184, 58, '', '范德萨看了', 'photo/1395718240/sm1395718259.png', 'photo/1395718240/big1395718259.png', '', 116, '2014-03-25 11:30:59', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (183, 59, '', '范德萨范德萨', 'photo/1395652098/sm1395715840.png', 'photo/1395652098/big1395715840.png', '', 114, '2014-03-25 10:50:41', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (186, 56, '', '放大', 'photo/1395732000/sm1395732018.png', 'photo/1395732000/big1395732018.png', '放大', 118, '2014-03-25 15:20:18', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (172, 59, '', '范德萨', 'photo/1395652098/sm1395713728.png', 'photo/1395652098/big1395713728.png', '范德萨', 114, '2014-03-25 10:15:29', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (187, 48, '', '范德萨', 'photo/1395732033/sm1395732049.png', 'photo/1395732033/big1395732049.png', '', 119, '2014-03-25 15:20:49', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (175, 59, '', '安抚', 'photo/1395652098/sm1395714903.png', 'photo/1395652098/big1395714903.png', '', 114, '2014-03-25 10:35:11', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (178, 59, '', '范德萨放大', 'photo/1395652098/sm1395715381.png', 'photo/1395652098/big1395715381.png', '', 114, '2014-03-25 10:43:01', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (179, 59, '', '放大', 'photo/1395652098/sm1395715516.png', 'photo/1395652098/big1395715516.png', '', 114, '2014-03-25 10:45:16', '0000-00-00 00:00:00');
INSERT INTO `gaga_photo` VALUES (185, 55, '', 'DAF', 'photo/1395731952/sm1395731968.png', 'photo/1395731952/big1395731968.png', '', 117, '2014-03-25 15:19:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `gaga_syrz_lb`
-- 

CREATE TABLE `gaga_syrz_lb` (
  `gaga_id` tinyint(8) unsigned NOT NULL auto_increment COMMENT '//id',
  `gaga_name` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '//文章类别',
  `gaga_content` varchar(1000) collate utf8_unicode_ci NOT NULL COMMENT '//类别描述',
  `gaga_show` mediumint(1) NOT NULL default '1' COMMENT '//是否显示',
  `gaga_date` datetime NOT NULL COMMENT '//文章类别创建时间',
  `gaga_last_time` datetime NOT NULL COMMENT '//文章类别修改时间',
  PRIMARY KEY  (`gaga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `gaga_syrz_lb`
-- 

INSERT INTO `gaga_syrz_lb` VALUES (1, '大富大贵', '放大放大放大放大放大啊', 1, '2014-03-26 16:43:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `gaga_user`
-- 

CREATE TABLE `gaga_user` (
  `gaga_id` mediumint(8) unsigned NOT NULL auto_increment COMMENT '//用户自动编号',
  `gaga_uniqid` char(40) NOT NULL COMMENT '//验证身份的唯一标识符',
  `gaga_active` char(40) NOT NULL COMMENT '//激活登录用户的唯一标识符',
  `gaga_admin` tinyint(1) NOT NULL default '0' COMMENT '//超级管理员',
  `gaga_username` varchar(20) NOT NULL COMMENT '//用户名',
  `gaga_password` char(40) NOT NULL COMMENT '//密码',
  `gaga_question` varchar(20) NOT NULL COMMENT '//密码提示',
  `gaga_answer` varchar(40) NOT NULL COMMENT '//密码回答',
  `gaga_email` varchar(40) default NULL COMMENT '//邮箱地址',
  `gaga_qq` varchar(12) default NULL COMMENT '//QQ',
  `gaga_url` varchar(40) default NULL COMMENT '//网址',
  `gaga_sex` char(1) NOT NULL COMMENT '//性别',
  `gaga_face` varchar(50) NOT NULL COMMENT '//头像地址',
  `gaga_reg_time` datetime NOT NULL COMMENT '//注册时间',
  `gaga_last_time` datetime NOT NULL COMMENT '//最后登录时间',
  `gaga_post_time` text NOT NULL COMMENT '//发帖时间',
  `gaga_last_ip` varchar(20) NOT NULL COMMENT '//最后登录的IP',
  `gaga_login_conut` int(6) unsigned NOT NULL COMMENT '//登录次数',
  PRIMARY KEY  (`gaga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- 
-- 导出表中的数据 `gaga_user`
-- 

INSERT INTO `gaga_user` VALUES (29, 'c369f12bbc55d847179358601b7cdc28594326fe', '', 1, 'gtd_alp', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'gagaaaaaaa', '158118092e934ec41ec3a628972c15f2963b447a', '295194117@qq.com', '29519417', 'http://www.gaotd.net', '男', 'images/pic/qpic/1/6.gif', '2014-02-27 13:57:41', '2014-03-26 13:21:27', '1394522042', '127.0.0.1', 66);
INSERT INTO `gaga_user` VALUES (48, '8da45b08f4b4cc281b01c61a19aac0259a4e045b', '', 0, 'gaga19', '601f1889667efaebb33b8c12572835da3f027f78', '尜尜尜尜尜尜1111', 'a77204eb5594c8efcde30c952aa1d5e935ceb87b', '295194117@qq.com', '3214321', '', '女', 'images/logo.gif', '2014-02-28 17:29:33', '2014-03-03 14:04:29', '0000-00-00 00:00:00', '127.0.0.1', 1);
INSERT INTO `gaga_user` VALUES (47, 'b3c3db859d193182a9013e89d624ec47c44f0bc2', '', 0, 'gaga18', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'fffffffff', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '女', 'images/pic/qiubilong/4.gif', '2014-02-28 14:07:44', '2014-03-05 16:43:59', '0000-00-00 00:00:00', '127.0.0.1', 6);
INSERT INTO `gaga_user` VALUES (46, 'bfbe3139aa0a564128faf033e3cac65aeb4ab53d', '', 0, 'gaga16', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/pic/qiubilong/6.gif', '2014-02-28 14:07:19', '2014-03-10 09:39:54', '0000-00-00 00:00:00', '127.0.0.1', 5);
INSERT INTO `gaga_user` VALUES (45, '048468927c8e729dd29c4019dc453cd7d8d4de05', '', 0, 'gaga15', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/pic/qiubilong/14.gif', '2014-02-28 14:06:51', '2014-03-10 13:21:44', '0000-00-00 00:00:00', '127.0.0.1', 3);
INSERT INTO `gaga_user` VALUES (43, 'b23677be881d6a0231bde00a9b39f6a220112461', '', 0, 'gaga13', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', 'e229b82fae72224a8f317a1b82e790103c989bcf', '', '', '', '男', 'images/pic/qiubilong/11.gif', '2014-02-28 11:18:18', '2014-03-03 14:04:29', '0000-00-00 00:00:00', '127.0.0.1', 1);
INSERT INTO `gaga_user` VALUES (44, '23c23b53a4a0bfb327ace39308b493ed655e079e', '', 0, 'gaga14', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', 'ff66bda18406f1cd8695a8f9eda7177553c4c586', '', '', '', '男', 'images/pic/qiubilong/15.gif', '2014-02-28 11:18:41', '2014-03-10 14:13:39', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (41, '5e7bc45f99bb1b5eef6f712fa1df45b11d807795', '', 0, 'gaga11', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', 'a14fbfb7b88dacd1af65d31bade857bc8e839e46', '', '', '', '男', 'images/pic/qiubilong/17.gif', '2014-02-28 11:17:16', '2014-03-05 10:04:21', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (42, '0ad57f04ea882053e32ff7f3f0d4d4592272b2d2', '', 0, 'gaga12', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '女', 'images/pic/qiubilong/10.gif', '2014-02-28 11:17:52', '2014-03-10 10:35:39', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (39, '18b92e324643825ad66b3b5640b4b3e3c99aa29b', '', 0, 'gaga9', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/logo.gif', '2014-02-28 09:50:00', '2014-03-10 13:16:31', '0000-00-00 00:00:00', '127.0.0.1', 3);
INSERT INTO `gaga_user` VALUES (40, 'ae2157988f8167d11473a450c3f1f6a553748228', '', 0, 'gaga10', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'fdafdafdsafdsa', '1d45d403ed97f83d27cb8314892a65727bdfc5ce', '', '', '', '女', 'images/pic/qiubilong/18.gif', '2014-02-28 11:16:46', '2014-03-10 10:45:43', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (38, '413c222e69dc3b4759da84208a8500c7cad31520', '', 0, 'gaga8', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'gagashishui', '159b0c4aee9a825be489507183f1cec03951da63', '', '', '', '男', 'images/pic/qiubilong/5.gif', '2014-02-28 09:49:31', '2014-03-04 15:41:26', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (37, '0fe4cb9732eaebd7eb835d07db07fb4b824af230', '', 0, 'gaga7', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '111111111111111', '011c945f30ce2cbafc452f39840f025693339c42', '', '', '', '男', 'images/pic/qiubilong/7.gif', '2014-02-28 09:47:56', '2014-03-10 13:19:10', '0000-00-00 00:00:00', '127.0.0.1', 3);
INSERT INTO `gaga_user` VALUES (36, '79f7d99774f459f132287570809964737cab80ca', '', 0, 'gaga6', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/logo.gif', '2014-02-28 09:46:55', '2014-03-05 10:02:54', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (35, '9c9a32ec74e606c4dfdc8205617a858cafdfd764', '', 0, 'gaga5', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜afdsa尜尜尜尜', 'a56e33a20c1e24ed05c75208b3f51ae3ebc0d7f4', '', '', '', '男', 'images/logo.gif', '2014-02-28 09:46:11', '2014-03-10 13:18:30', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (34, '2a133fbcf207946c6b7d4a19e3c73bdfa3989ac2', '', 0, 'gaga4', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜fdsa', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/logo.gif', '2014-02-28 09:45:45', '2014-03-05 14:36:37', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (33, 'c049ab0f7b7226d092ee0c4d833f74e66233ad5d', '', 0, 'gaga3', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜fdsa尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/pic/qiubilong/8.gif', '2014-02-28 09:45:22', '2014-03-11 09:33:47', '0000-00-00 00:00:00', '127.0.0.1', 3);
INSERT INTO `gaga_user` VALUES (30, 'da60cf9be9a4f6206ef856684343fac5b95566db', '', 0, 'gaga', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '1f8242ad6335e54948739a4dab0ef7a786222176', '', '', '', '女', 'images/logo.gif', '2014-02-28 09:43:52', '2014-03-03 14:04:29', '0000-00-00 00:00:00', '127.0.0.1', 1);
INSERT INTO `gaga_user` VALUES (31, '1cfc178e318bb2528ac3b25d3b7300a6ccadea02', '', 0, 'gaga1', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜1111', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '男', 'images/pic/qiubilong/1.gif', '2014-02-28 09:44:24', '2014-03-11 10:16:33', '0000-00-00 00:00:00', '127.0.0.1', 4);
INSERT INTO `gaga_user` VALUES (32, '8b056d4644e0b747448a92c7fec4a041660813cd', '', 0, 'gaga2', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜vdsafdas', 'a56e33a20c1e24ed05c75208b3f51ae3ebc0d7f4', '', '', '', '男', 'images/pic/qiubilong/8.gif', '2014-02-28 09:44:54', '2014-03-05 09:49:03', '0000-00-00 00:00:00', '127.0.0.1', 2);
INSERT INTO `gaga_user` VALUES (49, '57b9f640e6270cb8ac5a7f51c9a9e6284d3147af', '', 0, 'gaga20', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'fsdvcz', 'e908389d4bbf30e8dc72dc47cdf6b45d89e8b2a0', '295194117@qq.com', '295194118', 'http://www.gaotd.net', '男', 'images/pic/qiubilong/5.gif', '2014-03-05 09:22:12', '2014-03-10 15:43:48', '0000-00-00 00:00:00', '127.0.0.1', 5);
INSERT INTO `gaga_user` VALUES (50, '2543c780d444fc081df9b72571678494624b7969', '', 0, 'gaga21', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'fdsaczfdas', '978c5395deac1eab095ebf43b6db682f94ba5b2a', '2951941117@qq.com', '295194117', 'http://www.gaotd.net', '女', 'images/pic/qiubilong/14.gif', '2014-03-05 15:47:26', '2014-03-05 15:47:26', '0000-00-00 00:00:00', '127.0.0.1', 0);
INSERT INTO `gaga_user` VALUES (51, 'a63248743121fcbf0568528f976349c2e81c0c38', '', 0, 'gaga22', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜是谁', 'b419fa6fcdf213474bab77f0a754d609ece32429', '630987@qq.com', '630987', 'http://www.zyan.net', '女', 'images/pic/qiubilong/18.gif', '2014-03-05 15:49:19', '2014-03-05 15:49:19', '0000-00-00 00:00:00', '127.0.0.1', 0);
INSERT INTO `gaga_user` VALUES (52, '25cd240144c0444b3e6f40bdb1ca4710383dbafc', '', 0, 'gaga23', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'fdsaczfdas', 'f4a159a629fe2beb210d6b3eae4a7d7dc4130700', '13243@qq.com', '11232', 'http://www.gaotd.com', '女', 'images/pic/qiubilong/20.gif', '2014-03-05 16:46:20', '2014-03-14 09:24:02', '0000-00-00 00:00:00', '127.0.0.1', 4);
INSERT INTO `gaga_user` VALUES (53, '8ec41a4fc33883fcc907757e29c29e742c665338', '', 0, 'gaga24', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '', '', '', '女', 'images/pic/qiubilong/5.gif', '2014-03-06 10:32:36', '2014-03-06 10:32:36', '0000-00-00 00:00:00', '127.0.0.1', 0);
INSERT INTO `gaga_user` VALUES (54, 'ef60cb75dda2b4b7e54cd9dd8f6b14cb182a4e18', '', 0, 'gaga25', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '尜尜尜尜尜尜', '335f0e996285065c43f25b0d60d8e7a3a38dc7c7', '295194117@qq.com', '295194117', 'http://www.gaotd.net', '女', 'images/qpic/4/17.gif', '2014-03-07 13:24:24', '2014-03-07 13:24:24', '0000-00-00 00:00:00', '127.0.0.1', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `gaga_zhuti`
-- 

CREATE TABLE `gaga_zhuti` (
  `gaga_id` tinyint(8) unsigned NOT NULL auto_increment COMMENT '//主题id',
  `gaga_name` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '//专题名称',
  `gaga_content` varchar(1000) collate utf8_unicode_ci default NULL COMMENT '//专题描述',
  `gaga_date` datetime NOT NULL COMMENT '//创建时间',
  `gaga_last_date` datetime NOT NULL COMMENT '// 最后修改时间',
  PRIMARY KEY  (`gaga_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

-- 
-- 导出表中的数据 `gaga_zhuti`
-- 

INSERT INTO `gaga_zhuti` VALUES (59, '微距', '', '2014-03-24 14:47:41', '0000-00-00 00:00:00');
INSERT INTO `gaga_zhuti` VALUES (60, '我们在一起', '', '2014-03-26 14:03:55', '0000-00-00 00:00:00');
INSERT INTO `gaga_zhuti` VALUES (58, '尜尜', '', '2014-03-24 13:53:05', '0000-00-00 00:00:00');
INSERT INTO `gaga_zhuti` VALUES (56, '嘻嘻', '', '2014-03-21 15:13:10', '0000-00-00 00:00:00');
INSERT INTO `gaga_zhuti` VALUES (48, '大师影展', '放大', '2014-03-21 09:39:48', '2014-03-21 11:35:42');
INSERT INTO `gaga_zhuti` VALUES (55, '夜景', '', '2014-03-21 13:12:50', '0000-00-00 00:00:00');
