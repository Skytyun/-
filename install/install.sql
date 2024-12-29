SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newbtlevel`
--

-- --------------------------------------------------------

--
-- 表的结构 `m_conf`
--

CREATE TABLE IF NOT EXISTS `m_conf` (
  `k` varchar(255) NOT NULL DEFAULT '',
  `v` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `m_conf`
--

INSERT INTO `m_conf` (`k`, `v`) VALUES
('api_secret_id', ''),
('api_secret_key', ''),
('api_url', 'http://feelweb.cn'),
('server_token', ''),
('create', '2023-08-01'),
('desc', '简单的商城,简单的操作,成就非凡的系统'),
('epay_api', ''),
('epay_id', ''),
('epay_key', ''),
('keywords', '简单的商城,简单的操作,成就非凡的系统'),
('kfqq', '123456'),
('notice', '<li class="list-group-item">\n   <span class="badge badge-info btn-xs">建站交流</span> 建站系统官方群：<a target="_blank" href="https://jq.qq.com/?_wv=1027&k=5NfsF9k">123456</a>\n</li>\n<li class="list-group-item">\n   <span class="badge badge-warning btn-xs">使用教程</span> 如有问题请先参考<a href="http://www.baidu.com/" target="_blank">FQA</a> 看不懂再问\n</li>'),
('qqun', 'http://feelweb.cn'),
('rate', '2'),
('template', 'index'),
('title', '自助建站商城|API分站版'),
('version', '1000');

-- --------------------------------------------------------

--
-- 表的结构 `m_order`
--

CREATE TABLE IF NOT EXISTS `m_order` (
  `id` int(11) NOT NULL,
  `order_no` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `uid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `m_site`
--

CREATE TABLE IF NOT EXISTS `m_site` (
  `id` int(5) unsigned NOT NULL,
  `uid` int(5) NOT NULL COMMENT '用户编号',
  `domain` varchar(255) DEFAULT NULL COMMENT '默认域名',
  `date` datetime DEFAULT NULL COMMENT '创建时间',
  `name` varchar(255) DEFAULT NULL COMMENT '程序名',
  `z_site_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `id` int(5) NOT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `password` varchar(255) DEFAULT NULL COMMENT '用户密码',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '用户余额',
  `date` datetime DEFAULT NULL COMMENT '注册时间',
  `type` int(1) unsigned zerofill DEFAULT '1' COMMENT '用户类型',
  `status` int(1) DEFAULT '1' COMMENT '用户状态'
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `m_user`
--

INSERT INTO `m_user` (`id`, `email`, `password`, `money`, `date`, `type`, `status`) VALUES
(10000, '123456@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '10000.00', '2023-08-01 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_conf`
--
ALTER TABLE `m_conf`
  ADD PRIMARY KEY (`k`),
  ADD UNIQUE KEY `k` (`k`);

--
-- Indexes for table `m_order`
--
ALTER TABLE `m_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_site`
--
ALTER TABLE `m_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_order`
--
ALTER TABLE `m_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10001;
--
-- AUTO_INCREMENT for table `m_site`
--
ALTER TABLE `m_site`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10011;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10001;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
