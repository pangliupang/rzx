-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-05 20:22:05
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rzx`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(10) NOT NULL,
  `author` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `descript` varchar(100) DEFAULT NULL,
  `sort` varchar(2) DEFAULT NULL,
  `tofrom` varchar(20) DEFAULT NULL,
  `content` text,
  `createtime` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `author`, `title`, `image`, `descript`, `sort`, `tofrom`, `content`, `createtime`) VALUES
(1, 'admin', '测试', NULL, '字符串和字符相互转换、字符类型的常见方法。字符串类型的基本方法，判断两个字符串相等(Equals)、查找字符串(I', '1', '原创', '<p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp;\r\nqewe</p><p><br/></p>', '1525541195'),
(2, 'admin', '你好', '20180506\\acfa691425b39d19f53038f400d1cdad.png', 'nihao', '1', '转载', '<p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp;\r\n测试</p><p>没有图片<br/></p>', '1525541174'),
(3, 'admin', '测试', NULL, '测试', '1', '原创', '<p>&nbsp; &nbsp;\r\n1212</p>', '1525527537'),
(4, 'admin', 'q问', NULL, '我', '1', '原创', '<p>&nbsp; &nbsp;\r\nq我惹我</p>', '1525528067'),
(6, 'admin', '测试', NULL, '测试', '1', '原创', '<p>&nbsp; &nbsp;\r\n测试</p>', '1525529357'),
(7, 'admin', '12', NULL, '去撒', '1', '原创', '<p>&nbsp; &nbsp;\r\n13的撒</p>', '1525529667'),
(8, 'admin', '额外', NULL, '认为', '1', '原创', '<p>&nbsp; &nbsp;\r\n而且few人</p>', '1525530559'),
(9, 'admin', '测试', NULL, '测试', '1', '原创', '<p>&nbsp; &nbsp;\r\n归还借款</p>', '1525530683'),
(10, 'admin', '1', NULL, '2', '1', '原创', '<p>&nbsp; &nbsp;\r\n2</p>', '1525530771'),
(11, 'admin', '1', NULL, '2', '1', '原创', '额<p>&nbsp; &nbsp;</p>', '1525531141'),
(12, 'admin', '图片上传测试', '20180505\\0299af0cb10535f47141e202c6e752ed.png', '移动到框架应用根目录/public/uploads/ 目录下移动到框架应用根目录/public/uploads/ 目录下', '2', '转载', '<p>&nbsp; &nbsp;\r\n测试</p>', '1525534464'),
(13, 'admin', '图片测试1', '20180505\\d4782b21e5a79c1cf75154ae9a3c7190.png', '1', '1', '转载', '<p>&nbsp; &nbsp;\r\n111111111</p>', '1525535050'),
(14, 'admin', '你好', '20180506\\a80167d3d85394a525109bae4980dc19.png', 'nihao', '1', '原创', '<p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp;\r\n测试</p><p>绯闻而<br/></p>', '1525540512');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `createtime` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `createtime`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1524320464'),
(2, 'seller', 'e10adc3949ba59abbe56e057f20f883e', '1524327164'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', '1524323344'),
(4, '小明', 'e10adc3949ba59abbe56e057f20f883e', '1524323367'),
(5, '小红', 'e10adc3949ba59abbe56e057f20f883e', '1524323381'),
(7, 'seller1', 'e10adc3949ba59abbe56e057f20f883e', '1524327179');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
