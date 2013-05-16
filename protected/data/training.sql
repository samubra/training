-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 17 日 00:14
-- 服务器版本: 5.5.31-0ubuntu0.13.04.1
-- PHP 版本: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `training`
--

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher` varchar(200) DEFAULT NULL COMMENT '教师',
  `name` varchar(255) DEFAULT NULL COMMENT '课程名称',
  `hours` int(3) DEFAULT NULL COMMENT '学时',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '元数据ID',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '所属用户',
  `parent` int(10) unsigned DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL COMMENT '名称',
  `slug` varchar(200) DEFAULT NULL COMMENT '缩略',
  `type` varchar(32) DEFAULT NULL COMMENT '元数据所属类型',
  `other` varchar(200) DEFAULT NULL COMMENT '其他参数',
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类数据标' AUTO_INCREMENT=146 ;

--
-- 转存表中的数据 `item`
--

INSERT INTO `item` (`id`, `uid`, `parent`, `name`, `slug`, `type`, `other`) VALUES
(1, 1, 2, '电工作业', NULL, 'operation', NULL),
(2, 1, NULL, '电工作业', NULL, 'category', '2'),
(3, 1, NULL, '焊接与热切割作业', NULL, 'category', '3'),
(4, 1, NULL, '高处作业', NULL, 'category', '4'),
(5, 1, NULL, '金属非金属矿山安全作业', NULL, 'category', '6'),
(6, 1, NULL, '场内机动车辆驾驶作业', NULL, 'category', '11'),
(7, 1, 2, '电工专业基础', NULL, 'operation', '2'),
(8, 1, 2, '高压电工作业', NULL, 'operation', '3'),
(9, 1, 2, '低压电工作业', NULL, 'operation', '4'),
(10, 1, 2, '防爆电气作业', NULL, 'operation', '5'),
(11, 1, 3, '焊接与热切割作业', NULL, 'operation', NULL),
(12, 1, 3, '焊接与热切割专业基础', NULL, 'operation', '6'),
(13, 1, 3, '熔化焊接与热切割作业', NULL, 'operation', '7'),
(14, 1, 3, '压力焊作业', NULL, 'operation', '8'),
(15, 1, 3, '钎焊作业', NULL, 'operation', '9'),
(16, 1, 4, '高处作业', NULL, 'operation', NULL),
(17, 1, 4, '高处专业基础题', NULL, 'operation', '10'),
(18, 1, 4, '登高架设作业', NULL, 'operation', '11'),
(19, 1, 4, '高处安装、维护、拆除作业', NULL, 'operation', '12'),
(20, 1, 5, '金属非金属矿山安全作业', NULL, 'operation', NULL),
(21, 1, 5, '金属非金属矿山安全专业基础', NULL, 'operation', '16'),
(22, 1, 5, '金属非金属矿井通风作业', NULL, 'operation', '17'),
(23, 1, 5, '尾矿作业', NULL, 'operation', '18'),
(24, 1, 5, '金属非金属矿山安全检查作业', NULL, 'operation', '19'),
(25, 1, 5, '金属非金属矿山提升机操作作业', NULL, 'operation', '20'),
(26, 1, 5, '金属非金属矿山支柱作业', NULL, 'operation', '21'),
(27, 1, 5, '金属非金属矿山井下电气作业', NULL, 'operation', '22'),
(28, 1, 5, '金属非金属矿山排水作业', NULL, 'operation', '23'),
(29, 1, 5, '金属非金属矿山爆破作业', NULL, 'operation', '24'),
(30, 1, 6, '场内机动车辆驾驶作业', NULL, 'operation', NULL),
(31, 1, 6, '专业基础', NULL, 'operation', '53'),
(32, 1, 6, '轮胎式装载机', NULL, 'operation', '54'),
(33, 1, 6, '履带式装载机', NULL, 'operation', '55'),
(34, 1, 6, '轮胎式挖掘机', NULL, 'operation', '56'),
(35, 1, 6, '履带式挖掘机', NULL, 'operation', '57'),
(37, 1, 6, '履带式推土机', NULL, 'operation', '59'),
(38, 1, 6, '压路机', NULL, 'operation', '60'),
(43, 1, NULL, '大中专毕业生', NULL, 'category', NULL),
(44, 1, NULL, '农业', NULL, 'industry', '1'),
(45, 1, NULL, '林业', NULL, 'industry', '2'),
(46, 1, NULL, '畜牧业', NULL, 'industry', '3'),
(47, 1, NULL, '渔业', NULL, 'industry', '4'),
(48, 1, NULL, '农、林、牧、渔服务业', NULL, 'industry', '5'),
(49, 1, NULL, '煤炭开采和洗选业', NULL, 'industry', '6'),
(50, 1, NULL, '石油和天然气开采业', NULL, 'industry', '7'),
(51, 1, NULL, '黑色金属矿采选业', NULL, 'industry', '8'),
(52, 1, NULL, '有色金属矿采选业', NULL, 'industry', '9'),
(53, 1, NULL, '非金属矿采选业', NULL, 'industry', '10'),
(54, 1, NULL, '其他采矿业', NULL, 'industry', '11'),
(55, 1, NULL, '农副食品加工业', NULL, 'industry', '13'),
(56, 1, NULL, '食品制造业', NULL, 'industry', '14'),
(57, 1, NULL, '饮料制造业', NULL, 'industry', '15'),
(58, 1, NULL, '烟草制品业', NULL, 'industry', '16'),
(59, 1, NULL, '纺织业', NULL, 'industry', '17'),
(60, 1, NULL, '纺织服装、鞋、帽制造业', NULL, 'industry', '18'),
(61, 1, NULL, '皮革、毛皮、羽毛(绒)及其制品业', NULL, 'industry', '19'),
(62, 1, NULL, '木材加工及木、竹、藤、棕、草制品业', NULL, 'industry', '20'),
(63, 1, NULL, '家具制造业', NULL, 'industry', '21'),
(64, 1, NULL, '造纸及纸制品业', NULL, 'industry', '22'),
(65, 1, NULL, '印刷业和记录媒介的复制', NULL, 'industry', '23'),
(66, 1, NULL, '文教体育用品制造业', NULL, 'industry', '24'),
(67, 1, NULL, '石油加工、炼焦及核燃料加工业', NULL, 'industry', '25'),
(68, 1, NULL, '化学原料及化学制品制造业', NULL, 'industry', '26'),
(69, 1, NULL, '医药制造业', NULL, 'industry', '27'),
(70, 1, NULL, '化学纤维制造业', NULL, 'industry', '28'),
(71, 1, NULL, '橡胶制品业', NULL, 'industry', '29'),
(72, 1, NULL, '塑料制品业', NULL, 'industry', '30'),
(73, 1, NULL, '非金属矿物制品业', NULL, 'industry', '31'),
(74, 1, NULL, '黑色金属冶炼及压延加工业', NULL, 'industry', '32'),
(75, 1, NULL, '有色金属冶炼及压延加工业', NULL, 'industry', '33'),
(76, 1, NULL, '金属制品业', NULL, 'industry', '34'),
(77, 1, NULL, '通用设备制造业', NULL, 'industry', '35'),
(78, 1, NULL, '专用设备制造业', NULL, 'industry', '36'),
(79, 1, NULL, '交通运输设备制造业', NULL, 'industry', '37'),
(80, 1, NULL, '电气机械及器材制造业', NULL, 'industry', '39'),
(81, 1, NULL, '通信设备、计算机及其他电子设备制造业', NULL, 'industry', '40'),
(82, 1, NULL, '仪器仪表及文化、办公用机械制造业', NULL, 'industry', '41'),
(83, 1, NULL, '工艺品及其他制造业', NULL, 'industry', '42'),
(84, 1, NULL, '废弃资源和废旧材料回收加工业', NULL, 'industry', '43'),
(85, 1, NULL, '电力、热力的生产和供应业', NULL, 'industry', '44'),
(86, 1, NULL, '燃气生产和供应业', NULL, 'industry', '45'),
(87, 1, NULL, '水的生产和供应业', NULL, 'industry', '46'),
(88, 1, NULL, '房屋和土木工程建筑业', NULL, 'industry', '47'),
(89, 1, NULL, '建筑安装业', NULL, 'industry', '48'),
(90, 1, NULL, '建筑装饰业', NULL, 'industry', '49'),
(91, 1, NULL, '其他建筑业', NULL, 'industry', '50'),
(92, 1, NULL, '铁路运输业', NULL, 'industry', '51'),
(93, 1, NULL, '道路运输业', NULL, 'industry', '52'),
(94, 1, NULL, '城市公共交通业', NULL, 'industry', '53'),
(95, 1, NULL, '水上运输业', NULL, 'industry', '54'),
(96, 1, NULL, '航空运输业', NULL, 'industry', '55'),
(97, 1, NULL, '管道运输业', NULL, 'industry', '56'),
(98, 1, NULL, '装卸搬运和其他运输服务业', NULL, 'industry', '57'),
(99, 1, NULL, '仓储业', NULL, 'industry', '58'),
(100, 1, NULL, '邮政业', NULL, 'industry', '59'),
(101, 1, NULL, '电信和其他信息传输服务业', NULL, 'industry', '60'),
(102, 1, NULL, '计算机服务业', NULL, 'industry', '61'),
(103, 1, NULL, '软件业', NULL, 'industry', '62'),
(104, 1, NULL, '批发业', NULL, 'industry', '63'),
(105, 1, NULL, '零售业', NULL, 'industry', '65'),
(106, 1, NULL, '住宿业', NULL, 'industry', '66'),
(107, 1, NULL, '餐饮业', NULL, 'industry', '67'),
(108, 1, NULL, '银行业', NULL, 'industry', '68'),
(109, 1, NULL, '证券业', NULL, 'industry', '69'),
(110, 1, NULL, '保险业', NULL, 'industry', '70'),
(111, 1, NULL, '其他金融活动', NULL, 'industry', '71'),
(112, 1, NULL, '房地产业', NULL, 'industry', '72'),
(113, 1, NULL, '租赁业', NULL, 'industry', '73'),
(114, 1, NULL, '商务服务业', NULL, 'industry', '74'),
(115, 1, NULL, '研究与试验发展', NULL, 'industry', '75'),
(116, 1, NULL, '专业技术服务业', NULL, 'industry', '76'),
(117, 1, NULL, '科技交流和推广服务业', NULL, 'industry', '77'),
(118, 1, NULL, '地质勘查业', NULL, 'industry', '78'),
(119, 1, NULL, '水利管理业', NULL, 'industry', '79'),
(120, 1, NULL, '环境管理业', NULL, 'industry', '80'),
(121, 1, NULL, '公共设施管理业', NULL, 'industry', '81'),
(122, 1, NULL, '居民服务业', NULL, 'industry', '82'),
(123, 1, NULL, '其他服务业', NULL, 'industry', '83'),
(124, 1, NULL, '教育', NULL, 'industry', '84'),
(125, 1, NULL, '卫生', NULL, 'industry', '85'),
(126, 1, NULL, '社会保障业', NULL, 'industry', '86'),
(127, 1, NULL, '社会福利业', NULL, 'industry', '87'),
(128, 1, NULL, '新闻出版业', NULL, 'industry', '88'),
(129, 1, NULL, '广播、电视、电影和音像业', NULL, 'industry', '89'),
(130, 1, NULL, '文化艺术业', NULL, 'industry', '90'),
(131, 1, NULL, '体育', NULL, 'industry', '91'),
(132, 1, NULL, '娱乐业', NULL, 'industry', '92'),
(133, 1, NULL, '中国共产党机关', NULL, 'industry', '93'),
(134, 1, NULL, '国家机构', NULL, 'industry', '94'),
(135, 1, NULL, '人民政协和民主党派', NULL, 'industry', '95'),
(136, 1, NULL, '群众团体、社会团体和宗教组织', NULL, 'industry', '96'),
(137, 1, NULL, '基层群众自治组织', NULL, 'industry', '97'),
(138, 1, NULL, '国际组织', NULL, 'industry', '98'),
(139, 1, NULL, '安全资格证（非煤）', NULL, 'certificate', NULL),
(140, 1, NULL, '安全资格证（烟爆）', NULL, 'certificate', NULL),
(141, 1, NULL, '安全培训合格证（综合）', NULL, 'certificate', NULL),
(142, 1, NULL, '电工作业', NULL, 'certificate', '2'),
(143, 1, NULL, '焊接与热切割作业', NULL, 'certificate', '3'),
(144, 1, NULL, '高处作业', NULL, 'certificate', '4'),
(145, 1, NULL, '场内机动车辆驾驶作业', NULL, 'certificate', '11');

-- --------------------------------------------------------

--
-- 表的结构 `lookup`
--

CREATE TABLE IF NOT EXISTS `lookup` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL COMMENT '其他系统值',
  `name` varchar(256) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- 转存表中的数据 `lookup`
--

INSERT INTO `lookup` (`id`, `code`, `value`, `name`, `type`, `position`) VALUES
(1, 1, '2', '特种作业培训', 'category', 1),
(2, 2, '3', '生产经营单位安全培训', 'category', 2),
(3, 3, '4', '微型企业创业培训', 'category', 3),
(4, 1, '', '大中专毕业生', 'person_category', 1),
(5, 2, '', '下岗失业人员', 'person_category', 2),
(6, 3, '', '返乡农民工', 'person_category', 3),
(7, 4, '', '“农转非”人员', 'person_category', 4),
(8, 5, '', '三峡库区移民', 'person_category', 5),
(9, 6, '', '残疾人', 'person_category', 6),
(10, 7, '', '城乡退役士兵', 'person_category', 7),
(11, 8, '', '文化创意人员', 'person_category', 8),
(12, 9, '', '信息技术人员', 'person_category', 9),
(13, 1, '1', '农业', 'industry', 1),
(14, 2, '2', '林业', 'industry', 2),
(15, 3, '3', '畜牧业', 'industry', 3),
(16, 4, '4', '渔业', 'industry', 4),
(17, 5, '5', '农、林、牧、渔服务业', 'industry', 5),
(18, 6, '6', '煤炭开采和洗选业', 'industry', 6),
(19, 7, '7', '石油和天然气开采业', 'industry', 7),
(20, 8, '8', '黑色金属矿采选业', 'industry', 8),
(21, 9, '9', '有色金属矿采选业', 'industry', 9),
(22, 10, '10', '非金属矿采选业', 'industry', 10),
(23, 11, '11', '其他采矿业', 'industry', 11),
(24, 12, '13', '农副食品加工业', 'industry', 12),
(25, 13, '14', '食品制造业', 'industry', 13),
(26, 14, '15', '饮料制造业', 'industry', 14),
(27, 15, '16', '烟草制品业', 'industry', 15),
(28, 16, '17', '纺织业', 'industry', 16),
(29, 17, '18', '纺织服装、鞋、帽制造业', 'industry', 17),
(30, 18, '19', '皮革、毛皮、羽毛(绒)及其制品业', 'industry', 18),
(31, 19, '20', '木材加工及木、竹、藤、棕、草制品业', 'industry', 19),
(32, 20, '21', '家具制造业', 'industry', 20),
(33, 21, '22', '造纸及纸制品业', 'industry', 21),
(34, 22, '23', '印刷业和记录媒介的复制', 'industry', 22),
(35, 23, '24', '文教体育用品制造业', 'industry', 23),
(36, 24, '25', '石油加工、炼焦及核燃料加工业', 'industry', 24),
(37, 25, '26', '化学原料及化学制品制造业', 'industry', 25),
(38, 26, '27', '医药制造业', 'industry', 26),
(39, 27, '28', '化学纤维制造业', 'industry', 27),
(40, 28, '29', '橡胶制品业', 'industry', 28),
(41, 29, '30', '塑料制品业', 'industry', 29),
(42, 30, '31', '非金属矿物制品业', 'industry', 30),
(43, 31, '32', '黑色金属冶炼及压延加工业', 'industry', 31),
(44, 32, '33', '有色金属冶炼及压延加工业', 'industry', 32),
(45, 33, '34', '金属制品业', 'industry', 33),
(46, 34, '35', '通用设备制造业', 'industry', 34),
(47, 35, '36', '专用设备制造业', 'industry', 35),
(48, 36, '37', '交通运输设备制造业', 'industry', 36),
(49, 37, '39', '电气机械及器材制造业', 'industry', 37),
(50, 38, '40', '通信设备、计算机及其他电子设备制造业', 'industry', 38),
(51, 39, '41', '仪器仪表及文化、办公用机械制造业', 'industry', 39),
(52, 40, '42', '工艺品及其他制造业', 'industry', 40),
(53, 41, '43', '废弃资源和废旧材料回收加工业', 'industry', 41),
(54, 42, '44', '电力、热力的生产和供应业', 'industry', 42),
(55, 43, '45', '燃气生产和供应业', 'industry', 43),
(56, 44, '46', '水的生产和供应业', 'industry', 44),
(57, 45, '47', '房屋和土木工程建筑业', 'industry', 45),
(58, 46, '48', '建筑安装业', 'industry', 46),
(59, 47, '49', '建筑装饰业', 'industry', 47),
(60, 48, '50', '其他建筑业', 'industry', 48),
(61, 49, '51', '铁路运输业', 'industry', 49),
(62, 50, '52', '道路运输业', 'industry', 50),
(63, 51, '53', '城市公共交通业', 'industry', 51),
(64, 52, '54', '水上运输业', 'industry', 52),
(65, 53, '55', '航空运输业', 'industry', 53),
(66, 54, '56', '管道运输业', 'industry', 54),
(67, 55, '57', '装卸搬运和其他运输服务业', 'industry', 55),
(68, 56, '58', '仓储业', 'industry', 56),
(69, 57, '59', '邮政业', 'industry', 57),
(70, 58, '60', '电信和其他信息传输服务业', 'industry', 58),
(71, 59, '61', '计算机服务业', 'industry', 59),
(72, 60, '62', '软件业', 'industry', 60),
(73, 61, '63', '批发业', 'industry', 61),
(74, 62, '65', '零售业', 'industry', 62),
(75, 63, '66', '住宿业', 'industry', 63),
(76, 64, '67', '餐饮业', 'industry', 64),
(77, 65, '68', '银行业', 'industry', 65),
(78, 66, '69', '证券业', 'industry', 66),
(79, 67, '70', '保险业', 'industry', 67),
(80, 68, '71', '其他金融活动', 'industry', 68),
(81, 69, '72', '房地产业', 'industry', 69),
(82, 70, '73', '租赁业', 'industry', 70),
(83, 71, '74', '商务服务业', 'industry', 71),
(84, 72, '75', '研究与试验发展', 'industry', 72),
(85, 73, '76', '专业技术服务业', 'industry', 73),
(86, 74, '77', '科技交流和推广服务业', 'industry', 74),
(87, 75, '78', '地质勘查业', 'industry', 75),
(88, 76, '79', '水利管理业', 'industry', 76),
(89, 77, '80', '环境管理业', 'industry', 77),
(90, 78, '81', '公共设施管理业', 'industry', 78),
(91, 79, '82', '居民服务业', 'industry', 79),
(92, 80, '83', '其他服务业', 'industry', 80),
(93, 81, '84', '教育', 'industry', 81),
(94, 82, '85', '卫生', 'industry', 82),
(95, 83, '86', '社会保障业', 'industry', 83),
(96, 84, '87', '社会福利业', 'industry', 84),
(97, 85, '88', '新闻出版业', 'industry', 85),
(98, 86, '89', '广播、电视、电影和音像业', 'industry', 86),
(99, 87, '90', '文化艺术业', 'industry', 87),
(100, 88, '91', '体育', 'industry', 88),
(101, 89, '92', '娱乐业', 'industry', 89),
(102, 90, '93', '中国共产党机关', 'industry', 90),
(103, 91, '94', '国家机构', 'industry', 91),
(104, 92, '95', '人民政协和民主党派', 'industry', 92),
(105, 93, '96', '群众团体、社会团体和宗教组织', 'industry', 93),
(106, 94, '97', '基层群众自治组织', 'industry', 94),
(107, 95, '98', '国际组织', 'industry', 95),
(108, 1, '', '有限责任公司', 'business', 1),
(109, 2, '', '个人独资企业', 'business', 2),
(110, 1, '', '尚未培训', 'venture_status', 1),
(111, 2, '', '培训中', 'venture_status', 2),
(112, 3, '', '培训结束', 'venture_status', 3),
(113, 4, '', '资料存档', 'venture_status', 4),
(116, 1, '', '创办成功', 'company_status', 1),
(117, 2, '', '创办失败', 'company_status', 2);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '学员ID',
  `name` varchar(20) NOT NULL COMMENT '学员姓名',
  `cnum` int(18) NOT NULL COMMENT '身份证号码',
  `mphome` int(11) DEFAULT NULL COMMENT '移动电话',
  `fphone` int(11) DEFAULT NULL COMMENT '固定电话',
  `gender` enum('1','0') DEFAULT '1' COMMENT '性别',
  `marital` enum('0','1') DEFAULT '0' COMMENT '婚姻状况',
  `edu` varchar(10) DEFAULT NULL COMMENT '文化程度',
  `birthday` date DEFAULT NULL COMMENT '出生日期',
  `politics` varchar(10) DEFAULT NULL COMMENT '政治面貌',
  `address` varchar(250) DEFAULT NULL COMMENT '家庭住址',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnum` (`cnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学员表，每个学员都应该具有的基本信息' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `operation_member`
--

CREATE TABLE IF NOT EXISTS `operation_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) unsigned NOT NULL COMMENT '学员ID',
  `class_id` int(11) unsigned DEFAULT NULL COMMENT '班级ID',
  `class_num` varchar(10) DEFAULT NULL COMMENT '班级内序号',
  `isnew` enum('1','0') DEFAULT '1' COMMENT '是否新训，默认为1:新训',
  `health` varchar(200) DEFAULT NULL COMMENT '健康状况',
  `professional_title` varchar(200) DEFAULT NULL COMMENT '专业技术职称',
  `post` varchar(200) DEFAULT NULL COMMENT '职位',
  `unit_name` varchar(200) DEFAULT NULL COMMENT '单位名称',
  `operation_type` int(11) DEFAULT NULL COMMENT '操作类别',
  `certificate_num` varchar(19) DEFAULT NULL COMMENT '证书编号',
  `certificate_type` int(11) unsigned DEFAULT NULL COMMENT '证书类型',
  `issue_date` date DEFAULT NULL COMMENT '发证日期',
  `theory_score` varchar(5) DEFAULT NULL COMMENT '理论成绩',
  `operating_score` varchar(5) DEFAULT NULL COMMENT '实际操作成绩',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `modified` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `class_num` (`class_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='特种作业学员表`' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `password_strategy` varchar(50) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `requires_new_password` tinyint(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `login_attempts` int(11) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  `activation_key` varchar(128) DEFAULT NULL,
  `validation_key` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `level` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户级别',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `status`, `password`, `password_strategy`, `salt`, `requires_new_password`, `reset_token`, `login_attempts`, `login_time`, `login_ip`, `activation_key`, `validation_key`, `create_time`, `update_time`, `level`) VALUES
(1, 'admin', 'samubrapeng@gmail.com', 1, 'b2a7baaecfe639123e1ce88e33f0812fae13d3f1', 'ahash', '3b01b1f636ecffb66b1b23ad03f05e9e0aa475ad', NULL, NULL, NULL, 30, '127.0.0.1', NULL, '41f868edecbdabc859e0c45909679b10', '2012-11-18 14:26:59', '2013-04-13 14:34:42', 9);

-- --------------------------------------------------------

--
-- 表的结构 `venture_class`
--

CREATE TABLE IF NOT EXISTS `venture_class` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) DEFAULT NULL COMMENT '班级名称',
  `code` varchar(20) DEFAULT NULL COMMENT '班级代码',
  `phone` int(11) unsigned DEFAULT NULL COMMENT '班级管理人电话号码',
  `manager` varchar(20) DEFAULT NULL COMMENT '班级管理人',
  `start` date DEFAULT NULL COMMENT '开班日期',
  `end` date DEFAULT NULL COMMENT '结束日期',
  `create_time` int(10) DEFAULT NULL COMMENT '班级创建时间',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微企班级表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `venture_class_course_relationship`
--

CREATE TABLE IF NOT EXISTS `venture_class_course_relationship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL COMMENT '班级ID',
  `course_id` int(10) unsigned NOT NULL COMMENT '课程ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='班级课程关系标' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `venture_company`
--

CREATE TABLE IF NOT EXISTS `venture_company` (
  `id` int(11) unsigned NOT NULL COMMENT '主键',
  `legal_person` int(11) unsigned NOT NULL COMMENT '法人ID，对应venture_member中的ID',
  `licensecode` int(15) unsigned DEFAULT NULL COMMENT '营业执照号码',
  `companyname` varchar(250) DEFAULT NULL COMMENT '企业名称',
  `companyaddress` varchar(250) DEFAULT NULL COMMENT '经营地址',
  `employ` int(2) DEFAULT '0' COMMENT '雇员人数',
  `sales` int(6) unsigned DEFAULT '0' COMMENT '月营业收入',
  `industry` int(11) unsigned DEFAULT NULL COMMENT '所属行业',
  `businesstype` int(1) DEFAULT NULL COMMENT '企业所属类型',
  `policestation` varchar(200) DEFAULT NULL COMMENT '注册工商所别',
  `subsidy` varchar(10) DEFAULT NULL COMMENT '国家资助金额',
  `start` date NOT NULL COMMENT '企业创办时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `licensecode` (`licensecode`),
  KEY `legal_person` (`legal_person`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='企业表';

-- --------------------------------------------------------

--
-- 表的结构 `venture_member`
--

CREATE TABLE IF NOT EXISTS `venture_member` (
  `id` int(11) unsigned NOT NULL COMMENT '创业培训学员资料，主键ID',
  `uid` int(11) unsigned NOT NULL COMMENT '对应member表ID，用户ID',
  `class_id` int(11) unsigned DEFAULT NULL COMMENT '所属班级ID',
  `class_num` varchar(2) DEFAULT NULL COMMENT '在班级中的序号，01至40',
  `penson_type` int(11) unsigned DEFAULT NULL COMMENT '人员类别',
  `gradunm` varchar(20) DEFAULT NULL COMMENT '结业证书号码',
  `status` int(2) DEFAULT NULL COMMENT '学员状态',
  `remark` varchar(200) DEFAULT NULL COMMENT '简短的备注说明',
  `create_time` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `modified` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `class_num` (`class_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='创业培训学员资料表';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
