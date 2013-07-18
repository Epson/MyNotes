-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 09 日 06:56
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mynotes`
--

-- --------------------------------------------------------

--
-- 表的结构 `be_friends`
--

CREATE TABLE IF NOT EXISTS `be_friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `be_friends`
--

INSERT INTO `be_friends` (`user_id`, `friend_id`) VALUES
(3, 4),
(4, 5);

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `associate` int(11) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `associate` (`associate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `content`, `associate`, `create_time`) VALUES
(2, 5, '哈哈很好看啊', 1, '2012-12-22 02:13:22'),
(3, 5, '哈哈哈哈', 1, '2012-12-22 02:13:26'),
(4, 4, '好像很好看的样子', 1, '2012-12-23 01:07:12'),
(5, 4, '哈斯丢粉红色的分isad好烦所丢分和vasdiuvh阿斯蒂芬ivh', 1, 'asdasda'),
(6, 4, 'asdasfsfgdcasdcasd', 1, 'adasdasd'),
(7, 4, 'djasoidadhaus', 1, 'asddadfafas'),
(8, 4, 'asddfvbsfvasdcfad', 1, 'asddadfafas');

-- --------------------------------------------------------

--
-- 表的结构 `enter_apply`
--

CREATE TABLE IF NOT EXISTS `enter_apply` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(30) NOT NULL,
  `creator` int(11) NOT NULL,
  `introduction` text NOT NULL,
  `create_time` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `group_name` (`group_name`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `creator`, `introduction`, `create_time`) VALUES
(3, '昆仑', 3, '这是小组简介', '2013-01-08 20:09:23'),
(4, 'adidas', 3, '', '2013-01-08 20:10:30'),
(7, '哈哈啊哈', 2, 'asdafsfasdas', 'asfcsdfcsedf'),
(23, '第三小组', 4, '没有简介', '2013-01-09 02:07:03'),
(24, 'zhaojian', 4, 'zhaojian', '2013-01-09 02:08:03'),
(25, '司法所个地方v', 4, '放松放松的过', '2013-01-09 02:19:08');

-- --------------------------------------------------------

--
-- 表的结构 `in_group`
--

CREATE TABLE IF NOT EXISTS `in_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `enter_time` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `in_group`
--

INSERT INTO `in_group` (`user_id`, `group_id`, `enter_time`) VALUES
(2, 3, '11'),
(3, 3, '11'),
(4, 3, '2013-01-08 23:37:30'),
(4, 23, 'dasdad'),
(4, 24, '2013-01-09 02:08:03'),
(4, 25, '2013-01-09 02:19:08'),
(5, 3, '11'),
(8, 3, '11'),
(10, 3, '11'),
(11, 3, '11'),
(19, 3, '11'),
(20, 3, '11'),
(21, 3, '11'),
(22, 3, '11'),
(23, 3, '11'),
(24, 3, '11'),
(25, 3, '11'),
(26, 3, '11'),
(27, 3, '11');

-- --------------------------------------------------------

--
-- 表的结构 `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `associate` int(11) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  PRIMARY KEY (`note_id`),
  KEY `user_id` (`user_id`),
  KEY `associate` (`associate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `notes`
--

INSERT INTO `notes` (`note_id`, `user_id`, `content`, `associate`, `create_time`, `is_public`) VALUES
(2, 2, '发一条试试', 1, '2012-12-22 02:13:02', 1),
(3, 5, '苹果失去了一位富有远见和创意的天才，人类失去了一位了不起的成员。 能认识并与乔布斯共事是我们大家的幸事，乔布斯的离去，令我们失去了一位亲密的朋友和灵魂导师。', 1, '2012-12-22 02:13:30', 1),
(4, 5, 'okok', 1, '2012-12-22 02:13:36', 1),
(5, 4, '没看过不知道', 1, '2012-12-23 01:06:49', 0),
(6, 4, '呵呵', 1, '2012-12-23 01:07:00', 1),
(7, 4, 'okok', 1, '2013-01-08 01:54:28', 1),
(8, 4, 'fsrgsvsdsd', 1, '2013-01-08 01:54:32', 1),
(9, 4, 'ydthdfbhf', 1, '2013-01-08 01:54:35', 1),
(10, 4, 'bvxcbxcvz', 1, '2013-01-08 01:54:38', 1),
(11, 4, 'tyertyrter', 1, '2013-01-08 01:54:41', 1),
(12, 4, 'eqwewad', 1, '2013-01-08 01:54:44', 1),
(13, 4, 'uyiytjgfbn', 1, '2013-01-08 01:54:47', 1),
(14, 4, 'dasdadasdas', 1, 'dasdsad', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `associate` int(11) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  PRIMARY KEY (`tag_id`,`associate`),
  UNIQUE KEY `tag_id` (`tag_id`),
  KEY `associate` (`associate`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `tags`
--

INSERT INTO `tags` (`tag_id`, `user_id`, `content`, `associate`, `create_time`) VALUES
(3, 5, '动漫', 1, '2012-12-22 02:16:28'),
(6, 5, '玄幻', 1, '2012-12-23 00:47:37'),
(10, 5, '传记', 1, '2012-12-23 00:50:50'),
(11, 4, '武侠', 11, '2013-01-09 14:20:49'),
(12, 4, '玄幻', 11, '2013-01-09 14:20:49');

-- --------------------------------------------------------

--
-- 表的结构 `target`
--

CREATE TABLE IF NOT EXISTS `target` (
  `target_id` int(11) NOT NULL AUTO_INCREMENT,
  `target_name` varchar(30) NOT NULL,
  `author` varchar(25) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `introduction` text NOT NULL,
  PRIMARY KEY (`target_name`,`author`,`category`),
  UNIQUE KEY `target_id` (`target_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `target`
--

INSERT INTO `target` (`target_id`, `target_name`, `author`, `category`, `image`, `introduction`) VALUES
(6, '大苏打暗杀', '4', 0, 'upload/frontImage/大苏打暗杀.jpg', '大发阿尔法搜索法'),
(4, '实打实的', '4', 0, 'upload/frontImage/.jpg', '打算达到阿萨德'),
(2, '撒旦', '4', 0, 'upload/frontImage/.jpg', '大苏打'),
(11, '昆仑', '4', 0, 'upload/frontImage/昆仑.jpg', '武侠玄幻巅峰之作'),
(1, '花之绘', '飞乐鸟', 0, 'upload/frontImage/花之绘.jpg', '38种花的色铅笔图绘'),
(8, '还是冬天好舒服', '4', 0, 'upload/frontImage/还是冬天好舒服.jpg', '暗杀但是'),
(7, '阿萨德 斯蒂芬', '4', 1, 'upload/frontImage/阿萨德 斯蒂芬.jpg', ' 十大地方部分关电脑很难过你');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `avatar` varchar(70) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `introduction` varchar(50) DEFAULT NULL,
  `is_super` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `avatar`, `email`, `introduction`, `is_super`) VALUES
(2, '黄辉泉', 'xiaoquan', 'upload/avatar/1.jpg', '121927532@qq.com', '我是小泉', 0),
(3, 'xuscan', 'xuscan', 'upload/avatar/1.jpg', '121927532@qq.com', '我神马都不是', 0),
(4, 'zhaojian', '933db995f11dec370038ba5fbc4f0088', 'upload/avatar/zhaojian_1.jpg', '121927532@qq.com', '阿萨德佛啊时间', 0),
(5, 'xiaoquan', 'c8e10c6c72d0f939ab3bf718ac2f35cf', 'upload/avatar/xiaoquan.jpg', '121927532@qq.com', '阿萨德佛啊时间', 0),
(8, 'fsafasv', '44afdb01a45fec8643bf40ca50c1de8d', 'upload/avatar/fsafasv.jpg', '121927532@qq.com', '乔布斯闲得没事干写的', 0),
(10, 'csdvadv', '66ebb258105b70fbd138ea934e500306', 'upload/avatar/csdvadv.jpg', '121927532@qq.com', '乔布斯闲得没事干写的', 0),
(11, 'bnfyndfhnfg', 'd9cd124049af35ab1472e1bec40c2bd2', 'upload/avatar/bnfyndfhnfg.jpg', '121927532@qq.com', '乔布斯闲得没事干写的', 0),
(19, 'bsnfndfjndhrt', 'b2c6366d6a7632a6ae925441af07296f', 'upload/avatar/bsnfndfjndhrt.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(20, 'bdyjmtumuym', '8a8cd2fa8d1f022e3be2e1dff77981f4', 'upload/avatar/bdyjmtumuym.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(21, 'yngdmgyj', 'c3edb4a179e15a8c5b6b91c2f6ad8350', 'upload/avatar/yngdmgyj.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(22, 'bcgbcfgbntf', '4e0db6d4605484073b3c8230dc4d200e', 'upload/avatar/bcgbcfgbntf.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(23, 'zczxczv', '2a2520333a347a5f0b0cef6ec5d4e812', 'upload/avatar/zczxczv.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(24, 'fgbnfjhfyh', '7fd1a26c4f1543f0f970bd4bee7961d2', 'upload/avatar/fgbnfjhfyh.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(25, 'rtyrtyert', '53239ee110c629c6ca13d3922c1eb38f', 'upload/avatar/rtyrtyert.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(26, 'sdfvdfvb', '0f900a545c351bad4096cfe45e04870f', 'upload/avatar/sdfvdfvb.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(27, 'sdvdfhd', 'e32c770ae0b6812e56567ad021396cf7', 'upload/avatar/sdvdfhd.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(28, 'jhfygjkgujmg', '9fc9964880568fe6df9a4fd928233eb8', 'upload/avatar/jhfygjkgujmg.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(29, 'rwtythrt', '2ab502e920f3f781667af780d9c0c357', 'upload/avatar/rwtythrt.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(30, 'fvdafgdrg', '1f2db2fd2d4c2546350d522a3e22f97f', 'upload/avatar/fvdafgdrg.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(31, 'svertgrst', '53e582d56d828097f9682ec87807961b', 'upload/avatar/svertgrst.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(32, 'ththdrg', 'd689fbf48f9fb2912ffb1a1123d7386a', 'upload/avatar/ththdrg.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(33, 'tyhdrgsf', 'e6b82a82e2c6243e3ed3c099eb9c0b0b', 'upload/avatar/tyhdrgsf.jpg', 'jian_1818.student@sina.com', '我不是赵剑', 0),
(34, 'chenkangjie', '923a6e9c571129b6f5546a296b2edae8', 'upload/avatar/1.jpg', '', '', 0);

--
-- 限制导出的表
--

--
-- 限制表 `be_friends`
--
ALTER TABLE `be_friends`
  ADD CONSTRAINT `be_friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `be_friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`associate`) REFERENCES `target` (`target_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `enter_apply`
--
ALTER TABLE `enter_apply`
  ADD CONSTRAINT `enter_apply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enter_apply_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `in_group`
--
ALTER TABLE `in_group`
  ADD CONSTRAINT `in_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `in_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`associate`) REFERENCES `target` (`target_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`associate`) REFERENCES `target` (`target_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tags_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
