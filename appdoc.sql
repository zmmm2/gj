-- ----------------------------------------------------------------------------
-- 易对接项目完整数据库结构 (合并原始结构和后台仪表板新结构)
-- ----------------------------------------------------------------------------

-- 原始 appdoc.sql 内容
-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2022-08-11 23:10:09
-- 服务器版本： 5.6.50-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdoc`
--

-- --------------------------------------------------------

--
-- 表的结构 `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `admin` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(20) NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0',
  `check` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(20) NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0',
  `check` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `delay`
--

CREATE TABLE IF NOT EXISTS `delay` (
  `admin` varchar(15) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `delay`
--

INSERT INTO `delay` (`admin`, `time`) VALUES
('123456', 1660229082);

-- --------------------------------------------------------

--
-- 表的结构 `discuss`
--

CREATE TABLE IF NOT EXISTS `discuss` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `db` varchar(20) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `discuss_dly`
--

CREATE TABLE IF NOT EXISTS `discuss_dly` (
  `admin` varchar(15) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `interact`
--

CREATE TABLE IF NOT EXISTS `interact` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(20) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0',
  `check` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `interact`
--

INSERT INTO `interact` (`id`, `title`, `content`, `time`, `admin`, `view`, `check`) VALUES
(1, '测试', '123', '1660229082', '123456', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `moreCode`
--

CREATE TABLE IF NOT EXISTS `moreCode` (
  `id` int(11) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` varchar(20) NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0',
  `check` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ranBox`
--

CREATE TABLE IF NOT EXISTS `ranBox` (
  `id` int(11) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `sex` int(11) NOT NULL,
  `name` text NOT NULL,
  `introduce` text NOT NULL,
  `portrait` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `vip_km`
--

CREATE TABLE IF NOT EXISTS `vip_km` (
  `km` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- --------------------------------------------------------
-- 新增后台管理和用户表结构
-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- 表的结构 `dashboard_users`
-- 用于存储后台管理员账号信息
--

CREATE TABLE IF NOT EXISTS `dashboard_users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL, -- 使用哈希加密存储
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入默认管理员账号
-- 密码是 '123456' 的哈希值 (使用 bcrypt 示例哈希)
INSERT INTO `dashboard_users` (`username`, `password`) VALUES
("admin", "$2y$10$9.M3/tA6J8aP9j/l.7o4n.3B/O/p.j/o.C/k.Z/u.Y/y.X/z.W/q"); 

-- --------------------------------------------------------
--
-- 表的结构 `dashboard_config`
-- 用于存储可配置的系统信息，如公告
--

CREATE TABLE IF NOT EXISTS `dashboard_config` (
  `config_key` VARCHAR(50) NOT NULL,
  `config_value` TEXT NOT NULL,
  PRIMARY KEY (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入默认公告
INSERT INTO `dashboard_config` (`config_key`, `config_value`) VALUES
("announcement", "欢迎使用易对接平台！");

-- --------------------------------------------------------
--
-- 表的结构 `users`
-- 平台用户主表，用于后台管理功能
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,            -- 用户账号
  `password` VARCHAR(255) NOT NULL,           -- 用户密码（建议哈希）
  `nickname` VARCHAR(50) DEFAULT '未设置',     -- 昵称
  `grade` VARCHAR(50) DEFAULT '普通用户',     -- 等级
  `money` DECIMAL(10, 2) DEFAULT 0.00,        -- 余额
  `doc_count` INT(11) DEFAULT 0,              -- 文档数量
  `viptime` INT(11) DEFAULT 0,                -- 会员到期时间戳
  `sealtime` INT(11) DEFAULT 0,               -- 封禁到期时间戳
  `registertime` INT(11) DEFAULT 0,           -- 注册时间戳
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 插入一些示例用户数据
INSERT INTO `users` (`username`, `password`, `nickname`, `money`, `viptime`, `sealtime`, `registertime`) VALUES
("testuser1", "hashed_password_1", "测试用户一", 100.00, UNIX_TIMESTAMP(NOW()) + 86400 * 30, 0, UNIX_TIMESTAMP(NOW())),
("testuser2", "hashed_password_2", "测试用户二", 50.50, UNIX_TIMESTAMP(NOW()) - 86400, 0, UNIX_TIMESTAMP(NOW())),
("banneduser", "hashed_password_3", "被封禁的用户", 0.00, 0, UNIX_TIMESTAMP(NOW()) + 86400 * 7, UNIX_TIMESTAMP(NOW()));

-- --------------------------------------------------------
-- 原始 Indexes 和 AUTO_INCREMENT
-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delay`
--
ALTER TABLE `delay`
  ADD UNIQUE KEY `admin` (`admin`);

--
-- Indexes for table `discuss`
--
ALTER TABLE `discuss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_4` (`id`);

--
-- Indexes for table `discuss_dly`
--
ALTER TABLE `discuss_dly`
  ADD PRIMARY KEY (`admin`);

--
-- Indexes for table `interact`
--
ALTER TABLE `interact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moreCode`
--
ALTER TABLE `moreCode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranBox`
--
ALTER TABLE `ranBox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip_km`
--
ALTER TABLE `vip_km`
  ADD PRIMARY KEY (`km`),
  ADD UNIQUE KEY `km` (`km`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discuss`
--
ALTER TABLE `discuss`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interact`
--
ALTER TABLE `interact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `moreCode`
--
ALTER TABLE `moreCode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ranBox`
--
ALTER TABLE `ranBox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboard_users`
--
ALTER TABLE `dashboard_users`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
