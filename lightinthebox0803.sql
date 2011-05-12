-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2011 年 01 月 04 日 07:29
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `mazentop0803`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `address_book`
-- 

CREATE TABLE `address_book` (
  `address_book_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `entry_gender` char(1) NOT NULL default '',
  `entry_company` varchar(64) default NULL,
  `entry_firstname` varchar(32) NOT NULL default '',
  `entry_lastname` varchar(32) NOT NULL default '',
  `entry_street_address` varchar(64) NOT NULL default '',
  `entry_suburb` varchar(32) default NULL,
  `entry_postcode` varchar(10) NOT NULL default '',
  `entry_city` varchar(32) NOT NULL default '',
  `entry_state` varchar(32) default NULL,
  `entry_country_id` int(11) NOT NULL default '0',
  `entry_zone_id` int(11) default '0',
  `entry_phone` varchar(45) default NULL,
  PRIMARY KEY  (`address_book_id`),
  KEY `idx_address_book_customers_id_zen` (`customers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `address_book`
-- 

INSERT INTO `address_book` VALUES (1, 1, 'f', 'Evelyn', 'zhang', 'Evelyn', 'ksajfskah', '', '525359', 'zhaoqing', '', 223, 12, '165388452232');
INSERT INTO `address_book` VALUES (2, 1, 'f', NULL, 'zhang', 'Evelyn', 'ksajfskah', '', '525359', 'zhaoqing', NULL, 223, 12, '165388452232');
INSERT INTO `address_book` VALUES (3, 2, '', '深圳市', '', '', '', NULL, '', '', NULL, 0, 0, NULL);
INSERT INTO `address_book` VALUES (4, 3, '', 'mazentop', '', '', '', NULL, '', '', NULL, 0, 0, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `address_format`
-- 

CREATE TABLE `address_format` (
  `address_format_id` int(11) NOT NULL auto_increment,
  `address_format` varchar(128) NOT NULL default '',
  `address_summary` varchar(48) NOT NULL default '',
  PRIMARY KEY  (`address_format_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `address_format`
-- 

INSERT INTO `address_format` VALUES (1, '$firstname $lastname$cr$streets$cr$city, $postcode$cr$statecomma$country', '$city / $country');
INSERT INTO `address_format` VALUES (2, '$firstname $lastname$cr$streets$cr$city,$state,$postcode$cr$country', '$city, $state / $country');
INSERT INTO `address_format` VALUES (3, '$firstname $lastname$cr$streets$cr$city$cr$postcode - $statecomma$country', '$state / $country');
INSERT INTO `address_format` VALUES (4, '$firstname $lastname$cr$streets$cr$city ($postcode)$cr$country', '$postcode / $country');
INSERT INTO `address_format` VALUES (5, '$firstname $lastname$cr$streets$cr$postcode $city$cr$country', '$city / $country');
INSERT INTO `address_format` VALUES (6, '$firstname $lastname$cr$streets$cr$city$cr$state$cr$postcode$cr$country', '$postcode / $country');

-- --------------------------------------------------------

-- 
-- 表的结构 `admin`
-- 

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(32) NOT NULL default '',
  `admin_email` varchar(96) NOT NULL default '',
  `admin_pass` varchar(40) NOT NULL default '',
  `admin_level` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`admin_id`),
  KEY `idx_admin_name_zen` (`admin_name`),
  KEY `idx_admin_email_zen` (`admin_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', 'service@taoxieyoua.com', '387933074764cac286092f180e7e97e8:f1', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `admin_activity_log`
-- 

CREATE TABLE `admin_activity_log` (
  `log_id` int(15) NOT NULL auto_increment,
  `access_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `admin_id` int(11) NOT NULL default '0',
  `page_accessed` varchar(80) NOT NULL default '',
  `page_parameters` text,
  `ip_address` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`log_id`),
  KEY `idx_page_accessed_zen` (`page_accessed`),
  KEY `idx_access_date_zen` (`access_date`),
  KEY `idx_ip_zen` (`ip_address`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- 
-- 导出表中的数据 `admin_activity_log`
-- 

INSERT INTO `admin_activity_log` VALUES (1, '2010-12-21 10:36:26', 0, 'login.php ', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (2, '2010-12-21 10:36:56', 0, 'login.php admin', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (3, '2010-12-21 10:37:00', 1, 'dsf_shipping.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (4, '2010-12-21 10:37:05', 1, 'dsf_shipping.php', 'action=account_delete&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (5, '2010-12-21 10:37:05', 1, 'dsf_shipping.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (6, '2010-12-21 10:37:07', 1, 'dsf_shipping.php', 'action=do_install&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (7, '2010-12-21 10:37:12', 1, 'dsf_shipping.php', 'action=account_info&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (8, '2010-12-21 10:37:18', 1, 'dsf_shipping.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (9, '2010-12-21 10:38:13', 1, 'dsf_shipping.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (10, '2010-12-21 10:38:20', 1, 'configuration.php', 'gID=15&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (11, '2010-12-21 10:38:23', 1, 'configuration.php', 'gID=15&cID=305&action=edit&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (12, '2010-12-21 10:38:45', 1, 'configuration.php', 'gID=15&cID=305&action=save&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (13, '2010-12-21 10:38:45', 1, 'configuration.php', 'gID=15&cID=305&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (14, '2010-12-21 16:57:56', 0, 'login.php ', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (15, '2010-12-21 16:58:01', 0, 'login.php admin', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (16, '2010-12-21 16:58:10', 1, 'module_manager.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (17, '2010-12-21 16:58:48', 1, 'alt_nav.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (18, '2010-12-21 16:58:51', 1, 'module_manager.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (19, '2010-12-21 16:59:18', 1, 'simple_cache.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (20, '2010-12-21 16:59:19', 1, 'denied.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (21, '2010-12-21 16:59:30', 1, 'admin.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (22, '2010-12-21 16:59:32', 1, 'admin.php', 'page=1&adminID=1&action=edit&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (23, '2010-12-21 16:59:32', 1, 'admin_control.php', 'adminID=1&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (24, '2010-12-21 16:59:43', 1, 'admin_control.php', 'adminID=1&action=save&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (25, '2010-12-21 16:59:44', 1, 'admin_control.php', 'adminID=1&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (26, '2010-12-21 16:59:48', 1, 'simple_cache.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (27, '2010-12-21 17:01:48', 1, 'simple_cache.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (28, '2010-12-21 17:02:22', 1, 'simple_cache.php', 'action=reset_cache&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (29, '2010-12-21 17:02:30', 1, 'simple_cache.php', 'action=reset_cache&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (30, '2010-12-21 17:02:42', 1, 'configuration.php', 'gID=51&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (31, '2010-12-21 17:02:50', 1, 'configuration.php', 'gID=51&cID=2065&action=edit&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (32, '2010-12-21 17:02:52', 1, 'configuration.php', 'gID=51&cID=2067&action=edit&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (33, '2010-12-21 17:02:55', 1, 'configuration.php', 'gID=51&cID=2065&action=edit&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (34, '2010-12-21 17:03:10', 1, 'configuration.php', 'gID=51&cID=2065&action=save&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (35, '2010-12-21 17:03:10', 1, 'configuration.php', 'gID=51&cID=2065&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (36, '2010-12-21 17:03:25', 1, 'simple_cache.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (37, '2010-12-21 17:03:36', 1, 'module_manager.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (38, '2010-12-21 17:03:56', 1, 'simple_cache.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (39, '2010-12-21 17:04:05', 1, 'module_manager.php', '', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (40, '2010-12-21 17:04:17', 1, 'module_manager.php', 'action=list_modules&', '172.16.2.2');
INSERT INTO `admin_activity_log` VALUES (41, '2011-01-04 15:27:29', 0, 'login.php ', '', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (42, '2011-01-04 15:27:36', 0, 'login.php admin', '', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (43, '2011-01-04 15:27:39', 1, 'ezpages.php', '', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (44, '2011-01-04 15:27:41', 1, 'ezpages.php', 'page=1&ezID=56&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (45, '2011-01-04 15:27:42', 1, 'ezpages.php', 'page=1&ezID=56&action=new&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (46, '2011-01-04 15:27:58', 1, 'configuration.php', 'gID=1&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (47, '2011-01-04 15:28:01', 1, 'configuration.php', 'gID=1&cID=28&action=edit&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (48, '2011-01-04 15:28:04', 1, 'configuration.php', 'gID=1&cID=28&action=save&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (49, '2011-01-04 15:28:04', 1, 'configuration.php', 'gID=1&cID=28&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (50, '2011-01-04 15:28:07', 1, 'ezpages.php', '', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (51, '2011-01-04 15:28:09', 1, 'ezpages.php', 'reset_editor=3&action=set_editor&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (52, '2011-01-04 15:28:09', 1, 'ezpages.php', '', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (53, '2011-01-04 15:28:11', 1, 'ezpages.php', 'page=1&ezID=56&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (54, '2011-01-04 15:28:13', 1, 'ezpages.php', 'page=1&ezID=44&action=new&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (55, '2011-01-04 15:28:19', 1, 'ezpages.php', 'page=1&ezID=44&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (56, '2011-01-04 15:28:22', 1, 'ezpages.php', 'page=1&ezID=56&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (57, '2011-01-04 15:28:25', 1, 'ezpages.php', 'page=1&ezID=56&action=new&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (58, '2011-01-04 15:28:34', 1, 'ezpages.php', 'page=1&action=update&', '172.16.2.22');
INSERT INTO `admin_activity_log` VALUES (59, '2011-01-04 15:28:35', 1, 'ezpages.php', 'page=1&ezID=56&', '172.16.2.22');

-- --------------------------------------------------------

-- 
-- 表的结构 `admin_allowed_categories`
-- 

CREATE TABLE `admin_allowed_categories` (
  `categories_id` int(11) NOT NULL default '0',
  `admin_id` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `admin_allowed_categories`
-- 

INSERT INTO `admin_allowed_categories` VALUES (1, 1);
INSERT INTO `admin_allowed_categories` VALUES (16, 1);
INSERT INTO `admin_allowed_categories` VALUES (3, 1);
INSERT INTO `admin_allowed_categories` VALUES (4, 1);
INSERT INTO `admin_allowed_categories` VALUES (5, 1);
INSERT INTO `admin_allowed_categories` VALUES (6, 1);
INSERT INTO `admin_allowed_categories` VALUES (7, 1);
INSERT INTO `admin_allowed_categories` VALUES (8, 1);
INSERT INTO `admin_allowed_categories` VALUES (9, 1);
INSERT INTO `admin_allowed_categories` VALUES (10, 1);
INSERT INTO `admin_allowed_categories` VALUES (11, 1);
INSERT INTO `admin_allowed_categories` VALUES (12, 1);
INSERT INTO `admin_allowed_categories` VALUES (13, 1);
INSERT INTO `admin_allowed_categories` VALUES (17, 1);
INSERT INTO `admin_allowed_categories` VALUES (18, 1);
INSERT INTO `admin_allowed_categories` VALUES (19, 1);
INSERT INTO `admin_allowed_categories` VALUES (20, 1);
INSERT INTO `admin_allowed_categories` VALUES (21, 1);
INSERT INTO `admin_allowed_categories` VALUES (22, 1);
INSERT INTO `admin_allowed_categories` VALUES (23, 1);
INSERT INTO `admin_allowed_categories` VALUES (24, 1);
INSERT INTO `admin_allowed_categories` VALUES (25, 1);
INSERT INTO `admin_allowed_categories` VALUES (26, 1);
INSERT INTO `admin_allowed_categories` VALUES (27, 1);
INSERT INTO `admin_allowed_categories` VALUES (28, 1);
INSERT INTO `admin_allowed_categories` VALUES (29, 1);
INSERT INTO `admin_allowed_categories` VALUES (30, 1);
INSERT INTO `admin_allowed_categories` VALUES (31, 1);
INSERT INTO `admin_allowed_categories` VALUES (32, 1);
INSERT INTO `admin_allowed_categories` VALUES (33, 1);
INSERT INTO `admin_allowed_categories` VALUES (34, 1);
INSERT INTO `admin_allowed_categories` VALUES (35, 1);
INSERT INTO `admin_allowed_categories` VALUES (36, 1);
INSERT INTO `admin_allowed_categories` VALUES (37, 1);
INSERT INTO `admin_allowed_categories` VALUES (38, 1);
INSERT INTO `admin_allowed_categories` VALUES (39, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `admin_allowed_pages`
-- 

CREATE TABLE `admin_allowed_pages` (
  `page_id` int(11) NOT NULL default '0',
  `admin_id` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `admin_allowed_pages`
-- 

INSERT INTO `admin_allowed_pages` VALUES (1, 1);
INSERT INTO `admin_allowed_pages` VALUES (2, 1);
INSERT INTO `admin_allowed_pages` VALUES (3, 1);
INSERT INTO `admin_allowed_pages` VALUES (4, 1);
INSERT INTO `admin_allowed_pages` VALUES (5, 1);
INSERT INTO `admin_allowed_pages` VALUES (6, 1);
INSERT INTO `admin_allowed_pages` VALUES (7, 1);
INSERT INTO `admin_allowed_pages` VALUES (8, 1);
INSERT INTO `admin_allowed_pages` VALUES (9, 1);
INSERT INTO `admin_allowed_pages` VALUES (10, 1);
INSERT INTO `admin_allowed_pages` VALUES (11, 1);
INSERT INTO `admin_allowed_pages` VALUES (12, 1);
INSERT INTO `admin_allowed_pages` VALUES (13, 1);
INSERT INTO `admin_allowed_pages` VALUES (14, 1);
INSERT INTO `admin_allowed_pages` VALUES (15, 1);
INSERT INTO `admin_allowed_pages` VALUES (16, 1);
INSERT INTO `admin_allowed_pages` VALUES (17, 1);
INSERT INTO `admin_allowed_pages` VALUES (18, 1);
INSERT INTO `admin_allowed_pages` VALUES (19, 1);
INSERT INTO `admin_allowed_pages` VALUES (20, 1);
INSERT INTO `admin_allowed_pages` VALUES (21, 1);
INSERT INTO `admin_allowed_pages` VALUES (22, 1);
INSERT INTO `admin_allowed_pages` VALUES (23, 1);
INSERT INTO `admin_allowed_pages` VALUES (24, 1);
INSERT INTO `admin_allowed_pages` VALUES (25, 1);
INSERT INTO `admin_allowed_pages` VALUES (26, 1);
INSERT INTO `admin_allowed_pages` VALUES (27, 1);
INSERT INTO `admin_allowed_pages` VALUES (28, 1);
INSERT INTO `admin_allowed_pages` VALUES (29, 1);
INSERT INTO `admin_allowed_pages` VALUES (30, 1);
INSERT INTO `admin_allowed_pages` VALUES (31, 1);
INSERT INTO `admin_allowed_pages` VALUES (32, 1);
INSERT INTO `admin_allowed_pages` VALUES (33, 1);
INSERT INTO `admin_allowed_pages` VALUES (34, 1);
INSERT INTO `admin_allowed_pages` VALUES (35, 1);
INSERT INTO `admin_allowed_pages` VALUES (36, 1);
INSERT INTO `admin_allowed_pages` VALUES (37, 1);
INSERT INTO `admin_allowed_pages` VALUES (38, 1);
INSERT INTO `admin_allowed_pages` VALUES (39, 1);
INSERT INTO `admin_allowed_pages` VALUES (40, 1);
INSERT INTO `admin_allowed_pages` VALUES (41, 1);
INSERT INTO `admin_allowed_pages` VALUES (42, 1);
INSERT INTO `admin_allowed_pages` VALUES (43, 1);
INSERT INTO `admin_allowed_pages` VALUES (44, 1);
INSERT INTO `admin_allowed_pages` VALUES (45, 1);
INSERT INTO `admin_allowed_pages` VALUES (46, 1);
INSERT INTO `admin_allowed_pages` VALUES (47, 1);
INSERT INTO `admin_allowed_pages` VALUES (48, 1);
INSERT INTO `admin_allowed_pages` VALUES (49, 1);
INSERT INTO `admin_allowed_pages` VALUES (50, 1);
INSERT INTO `admin_allowed_pages` VALUES (51, 1);
INSERT INTO `admin_allowed_pages` VALUES (52, 1);
INSERT INTO `admin_allowed_pages` VALUES (53, 1);
INSERT INTO `admin_allowed_pages` VALUES (54, 1);
INSERT INTO `admin_allowed_pages` VALUES (55, 1);
INSERT INTO `admin_allowed_pages` VALUES (56, 1);
INSERT INTO `admin_allowed_pages` VALUES (57, 1);
INSERT INTO `admin_allowed_pages` VALUES (58, 1);
INSERT INTO `admin_allowed_pages` VALUES (59, 1);
INSERT INTO `admin_allowed_pages` VALUES (60, 1);
INSERT INTO `admin_allowed_pages` VALUES (61, 1);
INSERT INTO `admin_allowed_pages` VALUES (62, 1);
INSERT INTO `admin_allowed_pages` VALUES (63, 1);
INSERT INTO `admin_allowed_pages` VALUES (64, 1);
INSERT INTO `admin_allowed_pages` VALUES (65, 1);
INSERT INTO `admin_allowed_pages` VALUES (66, 1);
INSERT INTO `admin_allowed_pages` VALUES (67, 1);
INSERT INTO `admin_allowed_pages` VALUES (68, 1);
INSERT INTO `admin_allowed_pages` VALUES (69, 1);
INSERT INTO `admin_allowed_pages` VALUES (70, 1);
INSERT INTO `admin_allowed_pages` VALUES (71, 1);
INSERT INTO `admin_allowed_pages` VALUES (72, 1);
INSERT INTO `admin_allowed_pages` VALUES (73, 1);
INSERT INTO `admin_allowed_pages` VALUES (74, 1);
INSERT INTO `admin_allowed_pages` VALUES (75, 1);
INSERT INTO `admin_allowed_pages` VALUES (76, 1);
INSERT INTO `admin_allowed_pages` VALUES (77, 1);
INSERT INTO `admin_allowed_pages` VALUES (78, 1);
INSERT INTO `admin_allowed_pages` VALUES (79, 1);
INSERT INTO `admin_allowed_pages` VALUES (80, 1);
INSERT INTO `admin_allowed_pages` VALUES (81, 1);
INSERT INTO `admin_allowed_pages` VALUES (82, 1);
INSERT INTO `admin_allowed_pages` VALUES (83, 1);
INSERT INTO `admin_allowed_pages` VALUES (84, 1);
INSERT INTO `admin_allowed_pages` VALUES (85, 1);
INSERT INTO `admin_allowed_pages` VALUES (86, 1);
INSERT INTO `admin_allowed_pages` VALUES (87, 1);
INSERT INTO `admin_allowed_pages` VALUES (88, 1);
INSERT INTO `admin_allowed_pages` VALUES (89, 1);
INSERT INTO `admin_allowed_pages` VALUES (90, 1);
INSERT INTO `admin_allowed_pages` VALUES (91, 1);
INSERT INTO `admin_allowed_pages` VALUES (95, 1);
INSERT INTO `admin_allowed_pages` VALUES (93, 1);
INSERT INTO `admin_allowed_pages` VALUES (94, 1);
INSERT INTO `admin_allowed_pages` VALUES (96, 1);
INSERT INTO `admin_allowed_pages` VALUES (97, 1);
INSERT INTO `admin_allowed_pages` VALUES (98, 1);
INSERT INTO `admin_allowed_pages` VALUES (99, 1);
INSERT INTO `admin_allowed_pages` VALUES (100, 1);
INSERT INTO `admin_allowed_pages` VALUES (101, 1);
INSERT INTO `admin_allowed_pages` VALUES (102, 1);
INSERT INTO `admin_allowed_pages` VALUES (103, 1);
INSERT INTO `admin_allowed_pages` VALUES (104, 1);
INSERT INTO `admin_allowed_pages` VALUES (107, 1);
INSERT INTO `admin_allowed_pages` VALUES (105, 1);
INSERT INTO `admin_allowed_pages` VALUES (106, 1);
INSERT INTO `admin_allowed_pages` VALUES (108, 1);
INSERT INTO `admin_allowed_pages` VALUES (109, 1);
INSERT INTO `admin_allowed_pages` VALUES (110, 1);
INSERT INTO `admin_allowed_pages` VALUES (112, 1);
INSERT INTO `admin_allowed_pages` VALUES (113, 1);
INSERT INTO `admin_allowed_pages` VALUES (114, 1);
INSERT INTO `admin_allowed_pages` VALUES (115, 1);
INSERT INTO `admin_allowed_pages` VALUES (116, 1);
INSERT INTO `admin_allowed_pages` VALUES (117, 1);
INSERT INTO `admin_allowed_pages` VALUES (118, 1);
INSERT INTO `admin_allowed_pages` VALUES (119, 1);
INSERT INTO `admin_allowed_pages` VALUES (120, 1);
INSERT INTO `admin_allowed_pages` VALUES (111, 1);
INSERT INTO `admin_allowed_pages` VALUES (121, 1);
INSERT INTO `admin_allowed_pages` VALUES (122, 1);
INSERT INTO `admin_allowed_pages` VALUES (123, 1);
INSERT INTO `admin_allowed_pages` VALUES (126, 1);
INSERT INTO `admin_allowed_pages` VALUES (130, 1);
INSERT INTO `admin_allowed_pages` VALUES (125, 1);
INSERT INTO `admin_allowed_pages` VALUES (127, 1);
INSERT INTO `admin_allowed_pages` VALUES (128, 1);
INSERT INTO `admin_allowed_pages` VALUES (129, 1);
INSERT INTO `admin_allowed_pages` VALUES (131, 1);
INSERT INTO `admin_allowed_pages` VALUES (132, 1);
INSERT INTO `admin_allowed_pages` VALUES (133, 1);
INSERT INTO `admin_allowed_pages` VALUES (134, 1);
INSERT INTO `admin_allowed_pages` VALUES (135, 1);
INSERT INTO `admin_allowed_pages` VALUES (136, 1);
INSERT INTO `admin_allowed_pages` VALUES (137, 1);
INSERT INTO `admin_allowed_pages` VALUES (138, 1);
INSERT INTO `admin_allowed_pages` VALUES (139, 1);
INSERT INTO `admin_allowed_pages` VALUES (140, 1);
INSERT INTO `admin_allowed_pages` VALUES (141, 1);
INSERT INTO `admin_allowed_pages` VALUES (145, 1);
INSERT INTO `admin_allowed_pages` VALUES (146, 1);
INSERT INTO `admin_allowed_pages` VALUES (147, 1);
INSERT INTO `admin_allowed_pages` VALUES (142, 1);
INSERT INTO `admin_allowed_pages` VALUES (143, 1);
INSERT INTO `admin_allowed_pages` VALUES (144, 1);
INSERT INTO `admin_allowed_pages` VALUES (148, 1);
INSERT INTO `admin_allowed_pages` VALUES (149, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `admin_comments`
-- 

CREATE TABLE `admin_comments` (
  `orders_id` int(11) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `comments` text NOT NULL,
  KEY `orders_id` (`orders_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `admin_comments`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `admin_files`
-- 

CREATE TABLE `admin_files` (
  `id` int(11) NOT NULL auto_increment,
  `page` varchar(64) NOT NULL default '',
  `header` tinyint(4) NOT NULL default '0',
  `submenu` tinyint(1) NOT NULL default '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

-- 
-- 导出表中的数据 `admin_files`
-- 

INSERT INTO `admin_files` VALUES (1, 'My Store', 1, 0);
INSERT INTO `admin_files` VALUES (2, 'Minimum Values', 1, 0);
INSERT INTO `admin_files` VALUES (3, 'Maximum Values', 1, 0);
INSERT INTO `admin_files` VALUES (4, 'Images', 1, 0);
INSERT INTO `admin_files` VALUES (5, 'Customer Details', 1, 0);
INSERT INTO `admin_files` VALUES (6, 'Shipping/Packaging', 1, 0);
INSERT INTO `admin_files` VALUES (7, 'Product Listing', 1, 0);
INSERT INTO `admin_files` VALUES (8, 'Stock', 1, 0);
INSERT INTO `admin_files` VALUES (9, 'Logging', 1, 0);
INSERT INTO `admin_files` VALUES (10, 'E-Mail Options', 1, 0);
INSERT INTO `admin_files` VALUES (11, 'Attribute Settings', 1, 0);
INSERT INTO `admin_files` VALUES (12, 'GZip Compression', 1, 0);
INSERT INTO `admin_files` VALUES (13, 'Sessions', 1, 0);
INSERT INTO `admin_files` VALUES (14, 'Regulations', 1, 0);
INSERT INTO `admin_files` VALUES (15, 'GV Coupons', 1, 0);
INSERT INTO `admin_files` VALUES (16, 'Credit Cards', 1, 0);
INSERT INTO `admin_files` VALUES (17, 'Product Info', 1, 0);
INSERT INTO `admin_files` VALUES (18, 'Layout Settings', 1, 0);
INSERT INTO `admin_files` VALUES (19, 'Website Maintenance', 1, 0);
INSERT INTO `admin_files` VALUES (20, 'New Listing', 1, 0);
INSERT INTO `admin_files` VALUES (21, 'Featured Listing', 1, 0);
INSERT INTO `admin_files` VALUES (22, 'All Listing', 1, 0);
INSERT INTO `admin_files` VALUES (23, 'Index Listing', 1, 0);
INSERT INTO `admin_files` VALUES (24, 'Define Page Status', 1, 0);
INSERT INTO `admin_files` VALUES (81, 'EZ-Pages Settings', 1, 0);
INSERT INTO `admin_files` VALUES (25, 'categories', 2, 0);
INSERT INTO `admin_files` VALUES (26, 'product_types', 2, 0);
INSERT INTO `admin_files` VALUES (27, 'products_price_manager', 2, 0);
INSERT INTO `admin_files` VALUES (28, 'options_name_manager', 2, 0);
INSERT INTO `admin_files` VALUES (29, 'options_values_manager', 2, 0);
INSERT INTO `admin_files` VALUES (30, 'attributes_controller', 2, 0);
INSERT INTO `admin_files` VALUES (31, 'downloads_manager', 2, 0);
INSERT INTO `admin_files` VALUES (32, 'option_name', 2, 0);
INSERT INTO `admin_files` VALUES (33, 'option_values', 2, 0);
INSERT INTO `admin_files` VALUES (34, 'manufacturers', 2, 0);
INSERT INTO `admin_files` VALUES (35, 'reviews', 2, 0);
INSERT INTO `admin_files` VALUES (36, 'specials', 2, 0);
INSERT INTO `admin_files` VALUES (37, 'featured', 2, 0);
INSERT INTO `admin_files` VALUES (38, 'salemaker', 2, 0);
INSERT INTO `admin_files` VALUES (39, 'products_expected', 2, 0);
INSERT INTO `admin_files` VALUES (88, 'products_to_categories', 2, 1);
INSERT INTO `admin_files` VALUES (40, 'modulesset=payment', 3, 0);
INSERT INTO `admin_files` VALUES (41, 'modulesset=shipping', 3, 0);
INSERT INTO `admin_files` VALUES (42, 'modulesset=ordertotal', 3, 0);
INSERT INTO `admin_files` VALUES (43, 'customers', 4, 0);
INSERT INTO `admin_files` VALUES (44, 'orders', 4, 0);
INSERT INTO `admin_files` VALUES (45, 'group_pricing', 4, 0);
INSERT INTO `admin_files` VALUES (46, 'paypal', 4, 0);
INSERT INTO `admin_files` VALUES (78, 'invoice', 4, 1);
INSERT INTO `admin_files` VALUES (79, 'packingslip', 4, 1);
INSERT INTO `admin_files` VALUES (47, 'countries', 5, 0);
INSERT INTO `admin_files` VALUES (48, 'zones', 5, 0);
INSERT INTO `admin_files` VALUES (49, 'geo_zones', 5, 0);
INSERT INTO `admin_files` VALUES (50, 'tax_classes', 5, 0);
INSERT INTO `admin_files` VALUES (51, 'tax_rates', 5, 0);
INSERT INTO `admin_files` VALUES (52, 'currencies', 6, 0);
INSERT INTO `admin_files` VALUES (53, 'languages', 6, 0);
INSERT INTO `admin_files` VALUES (54, 'orders_status', 6, 0);
INSERT INTO `admin_files` VALUES (55, 'stats_products_viewed', 7, 0);
INSERT INTO `admin_files` VALUES (56, 'stats_products_purchased', 7, 0);
INSERT INTO `admin_files` VALUES (57, 'stats_customers', 7, 0);
INSERT INTO `admin_files` VALUES (58, 'stats_products_lowstock', 7, 0);
INSERT INTO `admin_files` VALUES (59, 'stats_customers_referrals', 7, 0);
INSERT INTO `admin_files` VALUES (60, 'template_select', 8, 0);
INSERT INTO `admin_files` VALUES (61, 'layout_controller', 8, 0);
INSERT INTO `admin_files` VALUES (62, 'banner_manager', 8, 0);
INSERT INTO `admin_files` VALUES (63, 'mail', 8, 0);
INSERT INTO `admin_files` VALUES (64, 'newsletters', 8, 0);
INSERT INTO `admin_files` VALUES (65, 'server_info', 8, 0);
INSERT INTO `admin_files` VALUES (66, 'whos_online', 8, 0);
INSERT INTO `admin_files` VALUES (67, 'admin', 8, 0);
INSERT INTO `admin_files` VALUES (68, 'email_welcome', 8, 0);
INSERT INTO `admin_files` VALUES (69, 'store_manager', 8, 0);
INSERT INTO `admin_files` VALUES (82, 'ezpages', 8, 0);
INSERT INTO `admin_files` VALUES (70, 'developers_tool_kit', 8, 0);
INSERT INTO `admin_files` VALUES (71, 'define_pages_editor', 8, 0);
INSERT INTO `admin_files` VALUES (80, 'sqlpatch', 8, 0);
INSERT INTO `admin_files` VALUES (76, 'admin_control', 0, 1);
INSERT INTO `admin_files` VALUES (72, 'coupon_admin', 9, 0);
INSERT INTO `admin_files` VALUES (73, 'gv_queue', 9, 0);
INSERT INTO `admin_files` VALUES (74, 'gv_mail', 9, 0);
INSERT INTO `admin_files` VALUES (75, 'gv_sent', 9, 0);
INSERT INTO `admin_files` VALUES (83, 'record_artists', 10, 0);
INSERT INTO `admin_files` VALUES (84, 'record_company', 10, 0);
INSERT INTO `admin_files` VALUES (85, 'music_genre', 10, 0);
INSERT INTO `admin_files` VALUES (86, 'media_manager', 10, 0);
INSERT INTO `admin_files` VALUES (87, 'media_types', 10, 0);
INSERT INTO `admin_files` VALUES (89, 'Quick Updates', 0, 0);
INSERT INTO `admin_files` VALUES (90, 'SEO URLs', 0, 0);
INSERT INTO `admin_files` VALUES (91, 'Cross Sell', 0, 0);
INSERT INTO `admin_files` VALUES (110, 'Product Info Popup', 0, 0);
INSERT INTO `admin_files` VALUES (93, 'image_handler', 0, 0);
INSERT INTO `admin_files` VALUES (94, 'Live Help Configuration', 0, 0);
INSERT INTO `admin_files` VALUES (95, 'search_log_admin', 0, 0);
INSERT INTO `admin_files` VALUES (96, 'subscription_manager', 0, 0);
INSERT INTO `admin_files` VALUES (97, 'faq_manager', 0, 0);
INSERT INTO `admin_files` VALUES (98, 'faq_categories', 0, 0);
INSERT INTO `admin_files` VALUES (99, 'faq_manager_configuration', 0, 0);
INSERT INTO `admin_files` VALUES (100, 'faq_reviews', 0, 0);
INSERT INTO `admin_files` VALUES (101, 'faq', 0, 0);
INSERT INTO `admin_files` VALUES (102, 'stats_search_log', 0, 0);
INSERT INTO `admin_files` VALUES (103, 'edit_orders', 0, 0);
INSERT INTO `admin_files` VALUES (104, 'module_manager', 0, 0);
INSERT INTO `admin_files` VALUES (105, 'xsell_advanced', 0, 0);
INSERT INTO `admin_files` VALUES (106, 'categories_price_manager', 0, 0);
INSERT INTO `admin_files` VALUES (107, 'categories_quantity_discounts', 0, 0);
INSERT INTO `admin_files` VALUES (108, 'Google XML Sitemap', 0, 0);
INSERT INTO `admin_files` VALUES (109, 'googlesitemap', 0, 0);
INSERT INTO `admin_files` VALUES (111, 'Module Options', 0, 0);
INSERT INTO `admin_files` VALUES (112, 'Categories List With Static', 0, 0);
INSERT INTO `admin_files` VALUES (113, 'Links Manager', 0, 0);
INSERT INTO `admin_files` VALUES (114, 'links', 0, 0);
INSERT INTO `admin_files` VALUES (115, 'link_categories', 0, 0);
INSERT INTO `admin_files` VALUES (116, 'links_contact', 0, 0);
INSERT INTO `admin_files` VALUES (117, 'RSS Feed', 0, 0);
INSERT INTO `admin_files` VALUES (118, 'backup_mysql', 0, 0);
INSERT INTO `admin_files` VALUES (119, 'email_history', 0, 0);
INSERT INTO `admin_files` VALUES (120, 'Autoresponder+', 0, 0);
INSERT INTO `admin_files` VALUES (121, 'quick_updates', 0, 0);
INSERT INTO `admin_files` VALUES (122, 'easypopulate', 0, 0);
INSERT INTO `admin_files` VALUES (123, 'Esay Populate', 1, 0);
INSERT INTO `admin_files` VALUES (124, '', 0, 0);
INSERT INTO `admin_files` VALUES (125, 'sqlpatch_xx', 0, 0);
INSERT INTO `admin_files` VALUES (126, 'product_keyword', 0, 0);
INSERT INTO `admin_files` VALUES (127, '123123132', 0, 0);
INSERT INTO `admin_files` VALUES (128, 'http://w34e2342', 0, 0);
INSERT INTO `admin_files` VALUES (129, 'Product Acquisition', 0, 0);
INSERT INTO `admin_files` VALUES (130, 'product_acquisition', 0, 0);
INSERT INTO `admin_files` VALUES (131, 'product_rules', 0, 0);
INSERT INTO `admin_files` VALUES (132, 'product_acquisition_arr', 0, 0);
INSERT INTO `admin_files` VALUES (133, 'popup_file_select', 0, 0);
INSERT INTO `admin_files` VALUES (134, 'product_acquisition_edit', 0, 0);
INSERT INTO `admin_files` VALUES (135, 'product_acquisition_add', 0, 0);
INSERT INTO `admin_files` VALUES (136, 'product_acquisition_list', 0, 0);
INSERT INTO `admin_files` VALUES (137, 'product_cj', 0, 0);
INSERT INTO `admin_files` VALUES (138, 'auto', 0, 0);
INSERT INTO `admin_files` VALUES (139, '_orders', 0, 0);
INSERT INTO `admin_files` VALUES (140, 'dsf_shipping', 0, 0);
INSERT INTO `admin_files` VALUES (141, 'store_credit', 0, 0);
INSERT INTO `admin_files` VALUES (142, 'FILENAME_POPULATE', 0, 0);
INSERT INTO `admin_files` VALUES (143, 'modulesset=', 0, 0);
INSERT INTO `admin_files` VALUES (144, 'document_general', 0, 0);
INSERT INTO `admin_files` VALUES (145, 'apsona_csv', 0, 0);
INSERT INTO `admin_files` VALUES (146, 'sales_report_graphs', 0, 0);
INSERT INTO `admin_files` VALUES (147, 'edm', 0, 0);
INSERT INTO `admin_files` VALUES (148, 'simple_cache', 0, 0);
INSERT INTO `admin_files` VALUES (149, 'Simple Cache', 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `admin_menu_headers`
-- 

CREATE TABLE `admin_menu_headers` (
  `id` int(11) NOT NULL,
  `header` varchar(16) NOT NULL default '',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `admin_menu_headers`
-- 

INSERT INTO `admin_menu_headers` VALUES (0, 'Third Party Mods');
INSERT INTO `admin_menu_headers` VALUES (1, 'Configuration');
INSERT INTO `admin_menu_headers` VALUES (2, 'Catalog');
INSERT INTO `admin_menu_headers` VALUES (3, 'Modules');
INSERT INTO `admin_menu_headers` VALUES (4, 'Customers');
INSERT INTO `admin_menu_headers` VALUES (5, 'Taxes');
INSERT INTO `admin_menu_headers` VALUES (6, 'Localization');
INSERT INTO `admin_menu_headers` VALUES (7, 'Reports');
INSERT INTO `admin_menu_headers` VALUES (8, 'Tools');
INSERT INTO `admin_menu_headers` VALUES (9, 'GV_Admin');
INSERT INTO `admin_menu_headers` VALUES (10, 'Extras');
INSERT INTO `admin_menu_headers` VALUES (21, 'Categories');

-- --------------------------------------------------------

-- 
-- 表的结构 `admin_visible_headers`
-- 

CREATE TABLE `admin_visible_headers` (
  `header_id` int(11) NOT NULL default '0',
  `admin_id` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `admin_visible_headers`
-- 

INSERT INTO `admin_visible_headers` VALUES (1, 1);
INSERT INTO `admin_visible_headers` VALUES (2, 1);
INSERT INTO `admin_visible_headers` VALUES (3, 1);
INSERT INTO `admin_visible_headers` VALUES (4, 1);
INSERT INTO `admin_visible_headers` VALUES (5, 1);
INSERT INTO `admin_visible_headers` VALUES (6, 1);
INSERT INTO `admin_visible_headers` VALUES (7, 1);
INSERT INTO `admin_visible_headers` VALUES (8, 1);
INSERT INTO `admin_visible_headers` VALUES (9, 1);
INSERT INTO `admin_visible_headers` VALUES (10, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `authorizenet`
-- 

CREATE TABLE `authorizenet` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL default '0',
  `order_id` int(11) NOT NULL default '0',
  `response_code` int(1) NOT NULL default '0',
  `response_text` varchar(255) NOT NULL default '',
  `authorization_type` varchar(50) NOT NULL default '',
  `transaction_id` int(15) NOT NULL default '0',
  `sent` longtext NOT NULL,
  `received` longtext NOT NULL,
  `time` varchar(50) NOT NULL default '',
  `session_id` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `authorizenet`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `banners`
-- 

CREATE TABLE `banners` (
  `banners_id` int(11) NOT NULL auto_increment,
  `banners_title` varchar(64) NOT NULL default '',
  `banners_url` varchar(255) NOT NULL default '',
  `banners_image` varchar(64) NOT NULL default '',
  `banners_group` varchar(15) NOT NULL default '',
  `banners_html_text` text,
  `expires_impressions` int(7) default '0',
  `expires_date` datetime default NULL,
  `date_scheduled` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_status_change` datetime default NULL,
  `status` int(1) NOT NULL default '1',
  `banners_open_new_windows` int(1) NOT NULL default '1',
  `banners_on_ssl` int(1) NOT NULL default '1',
  `banners_sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`banners_id`),
  KEY `idx_status_group_zen` (`status`,`banners_group`),
  KEY `idx_expires_date_zen` (`expires_date`),
  KEY `idx_date_scheduled_zen` (`date_scheduled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- 导出表中的数据 `banners`
-- 

INSERT INTO `banners` VALUES (20, 'banner1', '#', 'banner1.jpg', 'banner1', '', 0, NULL, NULL, '2010-07-26 15:06:34', NULL, 1, 1, 1, 1);
INSERT INTO `banners` VALUES (21, 'banner2', '#', 'banner2.jpg', 'banner1', '', 0, NULL, NULL, '2010-07-26 15:06:48', NULL, 1, 1, 1, 2);
INSERT INTO `banners` VALUES (22, 'banner3', '#', 'banner3.jpg', 'banner1', '', 0, NULL, NULL, '2010-07-26 15:07:06', NULL, 1, 1, 1, 3);
INSERT INTO `banners` VALUES (23, 'banner4', '#', 'banner4.jpg', 'banner1', '', 0, NULL, NULL, '2010-07-26 15:07:20', NULL, 1, 1, 1, 4);
INSERT INTO `banners` VALUES (24, 'banner5', '#', 'banner5.jpg', 'banner1', '', 0, NULL, NULL, '2010-07-26 15:07:35', NULL, 1, 1, 1, 5);

-- --------------------------------------------------------

-- 
-- 表的结构 `banners_history`
-- 

CREATE TABLE `banners_history` (
  `banners_history_id` int(11) NOT NULL auto_increment,
  `banners_id` int(11) NOT NULL default '0',
  `banners_shown` int(5) NOT NULL default '0',
  `banners_clicked` int(5) NOT NULL default '0',
  `banners_history_date` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`banners_history_id`),
  KEY `idx_banners_id_zen` (`banners_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `banners_history`
-- 

INSERT INTO `banners_history` VALUES (1, 20, 3, 0, '2010-12-21 10:37:42');
INSERT INTO `banners_history` VALUES (2, 24, 3, 0, '2010-12-21 10:37:42');
INSERT INTO `banners_history` VALUES (3, 22, 3, 0, '2010-12-21 10:37:42');
INSERT INTO `banners_history` VALUES (4, 23, 3, 0, '2010-12-21 10:37:42');
INSERT INTO `banners_history` VALUES (5, 21, 3, 0, '2010-12-21 10:37:42');
INSERT INTO `banners_history` VALUES (6, 20, 1, 0, '2011-01-04 15:27:23');
INSERT INTO `banners_history` VALUES (7, 23, 1, 0, '2011-01-04 15:27:23');
INSERT INTO `banners_history` VALUES (8, 22, 1, 0, '2011-01-04 15:27:23');
INSERT INTO `banners_history` VALUES (9, 24, 1, 0, '2011-01-04 15:27:23');
INSERT INTO `banners_history` VALUES (10, 21, 1, 0, '2011-01-04 15:27:23');

-- --------------------------------------------------------

-- 
-- 表的结构 `categories`
-- 

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL auto_increment,
  `categories_image` varchar(255) default NULL,
  `categories_type` varchar(64) default '1',
  `categories_list_types` varchar(64) default '1',
  `categories_display_type` varchar(64) default '1',
  `categories_discount_type` tinyint(1) NOT NULL default '0',
  `categories_discount_type_from` tinyint(1) NOT NULL default '0',
  `categories_mixed_discount_quantity` tinyint(1) NOT NULL default '1',
  `parent_id` int(11) NOT NULL default '0',
  `sort_order` int(3) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  `categories_status` tinyint(1) NOT NULL default '1',
  `categories_banner_1_img` varchar(255) default NULL,
  `categories_banner_2_img` varchar(255) default NULL,
  `categories_banner_1_link` varchar(255) default NULL,
  `categories_banner_2_link` varchar(255) default NULL,
  PRIMARY KEY  (`categories_id`),
  KEY `idx_parent_id_cat_id_zen` (`parent_id`,`categories_id`),
  KEY `idx_status_zen` (`categories_status`),
  KEY `idx_sort_order_zen` (`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- 
-- 导出表中的数据 `categories`
-- 

INSERT INTO `categories` VALUES (1, '065118862619.jpg', '3', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:03:49', '2010-11-03 18:07:22', 1, '', '', '', '');
INSERT INTO `categories` VALUES (16, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 1, 0, '2010-11-01 11:02:13', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (3, 'categories/PMBZXZ0049.jpg', '3', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:12:09', '2010-11-02 10:18:07', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (4, 'categories/SZ09890020.jpg', '2', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:13:41', '2010-11-01 17:50:22', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (5, 'categories/SZ04581530.jpg', '2', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:18:36', '2010-11-01 17:49:46', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (6, 'categories/SZC2148.jpg', '3', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:20:50', '2010-11-01 17:03:34', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (7, 'categories/6.jpg', '1', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:22:24', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (8, 'categories/0478-0412-11.jpg', '2', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:26:09', '2010-11-01 17:49:56', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (9, 'categories/8.jpg', '1', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:27:14', '2010-11-02 10:17:48', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (10, 'categories/10.jpg', '2', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:29:45', '2010-11-01 17:57:50', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (11, 'categories/11.jpg', '2', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:31:03', '2010-11-01 17:49:28', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (12, 'categories/00078493.jpg', '2', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:32:00', '2010-11-01 17:51:00', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (13, 'categories/51911.jpg', '1', '1', '1', 0, 0, 1, 0, 0, '2010-11-01 10:33:41', '2010-11-01 17:57:09', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (17, 'categories/10.jpg', '1', '1', '1', 0, 0, 1, 1, 0, '2010-11-01 11:02:52', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (18, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 3, 0, '2010-11-01 11:28:43', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (19, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 3, 0, '2010-11-01 11:37:25', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (20, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 4, 0, '2010-11-01 13:45:16', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (21, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 4, 0, '2010-11-01 13:54:34', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (22, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 5, 0, '2010-11-01 14:02:14', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (23, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 5, 0, '2010-11-01 14:03:18', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (24, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 6, 0, '2010-11-01 14:16:18', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (25, 'categories/0.jpg', '1', '1', '1', 0, 0, 1, 6, 0, '2010-11-01 14:17:22', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (26, 'categories/2GbTFCard.jpg', '1', '1', '1', 0, 0, 1, 7, 0, '2010-11-01 14:26:18', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (27, 'categories/GZZQ001.jpg', '1', '1', '1', 0, 0, 1, 7, 0, '2010-11-01 14:27:16', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (28, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 8, 0, '2010-11-01 14:38:30', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (29, 'categories/10.jpg', '1', '1', '1', 0, 0, 1, 8, 0, '2010-11-01 14:44:27', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (30, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 9, 0, '2010-11-01 15:06:04', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (31, 'categories/0.jpg', '1', '1', '1', 0, 0, 1, 9, 0, '2010-11-01 15:07:11', '2010-11-04 16:36:28', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (32, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 10, 0, '2010-11-01 15:15:05', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (33, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 10, 0, '2010-11-01 15:19:41', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (34, 'categories/0.jpg', '1', '1', '1', 0, 0, 1, 11, 0, '2010-11-01 15:28:11', '2010-11-04 17:01:55', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (35, 'categories/1.jpg', '1', '1', '1', 0, 0, 1, 11, 0, '2010-11-01 15:29:20', '2010-11-04 17:01:34', 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (36, 'categories/SMQ401.jpg', '1', '1', '1', 0, 0, 1, 12, 0, '2010-11-01 15:38:22', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (37, 'categories/SZ04581491.jpg', '1', '1', '1', 0, 0, 1, 12, 0, '2010-11-01 15:39:25', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (38, 'categories/0.jpg', '1', '1', '1', 0, 0, 1, 13, 0, '2010-11-01 15:52:56', NULL, 1, NULL, NULL, '', '');
INSERT INTO `categories` VALUES (39, 'categories/7.jpg', '1', '1', '1', 0, 0, 1, 13, 0, '2010-11-01 15:58:40', NULL, 1, NULL, NULL, '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `categories_description`
-- 

CREATE TABLE `categories_description` (
  `categories_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `categories_name` varchar(255) NOT NULL,
  `categories_description` text NOT NULL,
  `categories_bottom_description` text NOT NULL,
  PRIMARY KEY  (`categories_id`,`language_id`),
  KEY `idx_categories_name_zen` (`categories_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `categories_description`
-- 

INSERT INTO `categories_description` VALUES (1, 1, 'Weddings & Events', '<div class="pad_text line_120">Mazentop.com is the world''s leading online wedding apparel retail and wholesale website. We offer the best prices on wedding apparel, and the most complete one-stop shopping experience for your big day! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (1, 2, 'Weddings & Events', '<div class="pad_text line_120">Mazentop.com is the world''s leading online wedding apparel retail and wholesale website. We offer the best prices on wedding apparel, and the most complete one-stop shopping experience for your big day! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (16, 2, 'Wedding Dresses', '<div class="pad_text line_120">The best place to buy custom tailored wedding dresses for your big day is at Mazentop.com, the world''s leading online retail and wholesale website. We offer a large variety of styles at some of the best prices available online! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (16, 1, 'Wedding Dresses', '<div class="pad_text line_120">The best place to buy custom tailored wedding dresses for your big day is at Mazentop.com, the world''s leading online retail and wholesale website. We offer a large variety of styles at some of the best prices available online! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (3, 1, 'Fashion', '<div class="pad_text line_120">Wholesale clothing and apparel for fashion-able boys and girls! High quality but cheap clothing and apparel is a reality at our wholesale apparel store. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (3, 2, 'Fashion', '<div class="pad_text line_120">Wholesale clothing and apparel for fashion-able boys and girls! High quality but cheap clothing and apparel is a reality at our wholesale apparel store. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (4, 1, 'Cell Phones', '<div class="pad_text line_120">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (4, 2, 'Cell Phones', '<div class="pad_text line_120">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (5, 1, 'Electronics', '<div class="pad_text line_120">Browse our wholesale electronics store for brand name laptops, digital cameras, computer accessories, DVD players and more. All our cheap electrical goods have 12 month warranties. Shop today! </div>', '');
INSERT INTO `categories_description` VALUES (5, 2, 'Electronics', '<div class="pad_text line_120">Browse our wholesale electronics store for brand name laptops, digital cameras, computer accessories, DVD players and more. All our cheap electrical goods have 12 month warranties. Shop today! </div>', '');
INSERT INTO `categories_description` VALUES (6, 1, 'Car Electronics', '<div class="pad_text line_120">Lightinthebox have a huge selection of car electronics on sale at incredible discount wholesale price! Great deals on car electronics from Lightinthebox today and save more on your purchase! </div>', '');
INSERT INTO `categories_description` VALUES (6, 2, 'Car Electronics', '<div class="pad_text line_120">Lightinthebox have a huge selection of car electronics on sale at incredible discount wholesale price! Great deals on car electronics from Lightinthebox today and save more on your purchase! </div>', '');
INSERT INTO `categories_description` VALUES (7, 1, 'Gifts and Party Supplies', 'Wholesale Gifts and Party Supplies for any time of the year! Party supplies, gift supplies, and everything else needed to get the party started!', '');
INSERT INTO `categories_description` VALUES (7, 2, 'Gifts and Party Supplies', 'Wholesale Gifts and Party Supplies for any time of the year! Party supplies, gift supplies, and everything else needed to get the party started!', '');
INSERT INTO `categories_description` VALUES (8, 1, 'Health and Beauty', '<div class="pad_text line_120">Looking for ways to be healthier or just browsing for wholesale cosmetics and makeup? Whatever you''re looking for, Mazentop is the place to go. So buy more and save big today! </div>', '');
INSERT INTO `categories_description` VALUES (8, 2, 'Health and Beauty', '<div class="pad_text line_120">Looking for ways to be healthier or just browsing for wholesale cosmetics and makeup? Whatever you''re looking for, Mazentop is the place to go. So buy more and save big today! </div>', '');
INSERT INTO `categories_description` VALUES (9, 1, 'Home and Garden', '<div class="pad_text line_120">Spice up your front lawn or buy furniture for the living room, Mazentop has excellent selection of wholesale home and garden items. Find the perfect pick for your home and save big! </div>', '');
INSERT INTO `categories_description` VALUES (9, 2, 'Home and Garden', '<div class="pad_text line_120">Spice up your front lawn or buy furniture for the living room, Mazentop has excellent selection of wholesale home and garden items. Find the perfect pick for your home and save big! </div>', '');
INSERT INTO `categories_description` VALUES (10, 1, 'Sports Outdoor', '<div class="pad_text line_120">Spice up your front lawn or buy furniture for the living room, Mazentop has excellent selection of wholesale home and garden items. Find the perfect pick for your home and save big! </div>', '');
INSERT INTO `categories_description` VALUES (10, 2, 'Sports Outdoor', '<div class="pad_text line_120">Spice up your front lawn or buy furniture for the living room, Mazentop has excellent selection of wholesale home and garden items. Find the perfect pick for your home and save big! </div>', '');
INSERT INTO `categories_description` VALUES (11, 1, 'Toys and Hobbies', '<div class="pad_text line_120">Welcome to Mazentop''s toy store! Wholesale toys, dolls, RC toys and other great gift ideas for any time of the year. See what we have to offer and buy today. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (11, 2, 'Toys and Hobbies', '<div class="pad_text line_120">Welcome to Mazentop''s toy store! Wholesale toys, dolls, RC toys and other great gift ideas for any time of the year. See what we have to offer and buy today. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (12, 1, 'MiniInTheBox', '<div class="pad_text line_120">Wholesale MiniInTheBox from China, dropship wholesale MiniInTheBox, wholesale MiniInTheBox cheapest! </div>', '');
INSERT INTO `categories_description` VALUES (12, 2, 'MiniInTheBox', '<div class="pad_text line_120">Wholesale MiniInTheBox from China, dropship wholesale MiniInTheBox, wholesale MiniInTheBox cheapest! </div>', '');
INSERT INTO `categories_description` VALUES (13, 1, 'Clearance', '<div class="pad_text line_120">Wholesale MiniInTheBox from China, dropship wholesale MiniInTheBox, wholesale MiniInTheBox cheapest! </div>', '');
INSERT INTO `categories_description` VALUES (13, 2, 'Clearance', '<div class="pad_text line_120">Wholesale MiniInTheBox from China, dropship wholesale MiniInTheBox, wholesale MiniInTheBox cheapest! </div>', '');
INSERT INTO `categories_description` VALUES (17, 1, 'Wedding Party Dresses', '<div class="pad_text line_120">Want to look resplendent at your next wedding party? Mazentop.com offers a wide selection of gorgeous, custom tailored dresses. Find your perfect match and take advantage of our great prices! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (17, 2, 'Wedding Party Dresses', '<div class="pad_text line_120">Want to look resplendent at your next wedding party? Mazentop.com offers a wide selection of gorgeous, custom tailored dresses. Find your perfect match and take advantage of our great prices! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (18, 1, 'New Arrivals', '<div class="pad_text line_120">Wholesale New Arrivals from China, dropship wholesale New Arrivals, wholesale New Arrivals cheapest! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (18, 2, 'New Arrivals', '<div class="pad_text line_120">Wholesale New Arrivals from China, dropship wholesale New Arrivals, wholesale New Arrivals cheapest! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (19, 1, 'Celebrity Style', '<div class="pad_text line_120">Affordable celebrity style and fashion<em> </em><em></em>from the streets, red carpet and to the stage. </div>', '');
INSERT INTO `categories_description` VALUES (19, 2, 'Celebrity Style', '<div class="pad_text line_120">Affordable celebrity style and fashion<em> </em><em></em>from the streets, red carpet and to the stage. </div>', '');
INSERT INTO `categories_description` VALUES (20, 1, 'Bar Phone', '<div class="pad_text line_120">Bar phones have the classic cell phone design, and at Mazentop you can find a great bar phone wholesale deal. Grab a wholesale Bar Phone deal today! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (20, 2, 'Bar Phone', '<div class="pad_text line_120">Bar phones have the classic cell phone design, and at Mazentop you can find a great bar phone wholesale deal. Grab a wholesale Bar Phone deal today! </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (21, 1, 'Flip Phone', '<div class="pad_text line_120">Buy cheap flip phones in the flip phone wholesale store at Mazentop, the best place to go for all kinds of cell phones handsets and cell phone accessories. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (21, 2, 'Flip Phone', '<div class="pad_text line_120">Buy cheap flip phones in the flip phone wholesale store at Mazentop, the best place to go for all kinds of cell phones handsets and cell phone accessories. </div>\r\n<!-- EOF Categories Banner -->', '');
INSERT INTO `categories_description` VALUES (22, 1, 'Computers', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (22, 2, 'Computers', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (23, 1, 'MP3 and Media Player', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (23, 2, 'MP3 and Media Player', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (24, 1, 'Car Video', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (24, 2, 'Car Video', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (25, 1, 'Car GPS', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (25, 2, 'Car GPS', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (26, 1, 'Valentine''s Day Gifts', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (26, 2, 'Valentine''s Day Gifts', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (27, 1, 'Mother''s Day Gifts', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (27, 2, 'Mother''s Day Gifts', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (28, 1, 'Mini Beauty', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (28, 2, 'Mini Beauty', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (29, 1, 'Mini E-Cigarette', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (29, 2, 'Mini E-Cigarette', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (30, 1, 'Lights', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (30, 2, 'Lights', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (31, 1, 'Wall Art', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (31, 2, 'Wall Art', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (32, 1, 'Camping and Hiking', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (32, 2, 'Camping and Hiking', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (33, 1, 'Golf', '<div class="pad_10px pad_l_28px big" id="Item_Description_Spc"><font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font></div>\r\n<!--eof Product description --><br class="clear" />', '');
INSERT INTO `categories_description` VALUES (33, 2, 'Golf', '<div class="pad_10px pad_l_28px big" id="Item_Description_Spc"><font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font></div>\r\n<!--eof Product description --><br class="clear" />', '');
INSERT INTO `categories_description` VALUES (34, 1, 'RC Aircraft', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (34, 2, 'RC Aircraft', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (35, 1, 'Cosplay and Costumes', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (35, 2, 'Cosplay and Costumes', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (36, 1, 'iPad Gadgets', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (36, 2, 'iPad Gadgets', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (37, 1, 'Cell Phone Gadgets', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (37, 2, 'Cell Phone Gadgets', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (38, 1, 'Jewelry and Watch Clearance', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (38, 2, 'Jewelry and Watch Clearance', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (39, 1, 'Electronics Clearance', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');
INSERT INTO `categories_description` VALUES (39, 2, 'Electronics Clearance', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `categories_discount_quantity`
-- 

CREATE TABLE `categories_discount_quantity` (
  `discount_id` int(4) NOT NULL default '0',
  `categories_id` int(11) NOT NULL default '0',
  `discount_qty` float NOT NULL default '0',
  `discount_price` decimal(15,4) NOT NULL default '0.0000',
  PRIMARY KEY  (`categories_id`,`discount_qty`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `categories_discount_quantity`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `configuration`
-- 

CREATE TABLE `configuration` (
  `configuration_id` int(11) NOT NULL auto_increment,
  `configuration_title` text NOT NULL,
  `configuration_key` varchar(255) NOT NULL default '',
  `configuration_value` text NOT NULL,
  `configuration_description` text NOT NULL,
  `configuration_group_id` int(11) NOT NULL default '0',
  `sort_order` int(5) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `use_function` text,
  `set_function` text,
  PRIMARY KEY  (`configuration_id`),
  UNIQUE KEY `unq_config_key_zen` (`configuration_key`),
  KEY `idx_key_value_zen` (`configuration_key`,`configuration_value`(10)),
  KEY `idx_cfg_grp_id_zen` (`configuration_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2069 ;

-- 
-- 导出表中的数据 `configuration`
-- 

INSERT INTO `configuration` VALUES (1, 'Store Name', 'STORE_NAME', 'MY STORE', 'The name of my store', 1, 1, '2010-07-01 14:23:11', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (2, 'Store Owner', 'STORE_OWNER', 'TOM', 'The name of my store owner', 1, 2, '2010-06-26 12:30:44', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (3, 'Country', 'STORE_COUNTRY', '44', 'The country my store is located in <br /><br /><strong>Note: Please remember to update the store zone.</strong>', 1, 6, '2009-06-24 16:47:37', '2008-07-20 12:06:17', 'zen_get_country_name', 'zen_cfg_pull_down_country_list(');
INSERT INTO `configuration` VALUES (4, 'Zone', 'STORE_ZONE', '', 'The zone my store is located in', 1, 7, '2009-01-12 05:08:33', '2008-07-20 12:06:17', 'zen_cfg_get_zone_name', 'zen_cfg_pull_down_zone_list(');
INSERT INTO `configuration` VALUES (5, 'Expected Sort Order', 'EXPECTED_PRODUCTS_SORT', 'desc', 'This is the sort order used in the expected products box.', 1, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''asc'', ''desc''), ');
INSERT INTO `configuration` VALUES (6, 'Expected Sort Field', 'EXPECTED_PRODUCTS_FIELD', 'date_expected', 'The column to sort by in the expected products box.', 1, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''products_name'', ''date_expected''), ');
INSERT INTO `configuration` VALUES (7, 'Switch To Default Language Currency', 'USE_DEFAULT_LANGUAGE_CURRENCY', 'true', 'Automatically switch to the language''s currency when it is changed', 1, 10, '2009-06-09 10:15:36', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (8, 'Language Selector', 'LANGUAGE_DEFAULT_SELECTOR', 'Default', 'Should the default language be based on the Store preferences, or the customer''s browser settings?<br /><br />Default: Store''s default settings', 1, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''Default'', ''Browser''), ');
INSERT INTO `configuration` VALUES (9, 'Use Search-Engine Safe URLs (still in development)', 'SEARCH_ENGINE_FRIENDLY_URLS', 'false', 'Use search-engine safe urls for all site links', 6, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (10, 'Display Cart After Adding Product', 'DISPLAY_CART', 'true', 'Display the shopping cart after adding a product (or return back to their origin)', 1, 14, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (11, 'Default Search Operator', 'ADVANCED_SEARCH_DEFAULT_OPERATOR', 'and', 'Default search operators', 1, 17, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''and'', ''or''), ');
INSERT INTO `configuration` VALUES (12, 'Store Address and Phone', 'STORE_NAME_ADDRESS', 'Replica Watches Mall\r\nWuyi Road Fuzhou Fujian\r\nChina\r\n+1 646 755 9933', 'This is the Store Name, Address and Phone used on printable documents and displayed online', 1, 18, '2009-08-05 13:34:16', '2008-07-20 12:06:17', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (13, 'Show Category Counts', 'SHOW_COUNTS', 'true', 'Count recursively how many products are in each category', 1, 19, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (14, 'Tax Decimal Places', 'TAX_DECIMAL_PLACES', '0', 'Pad the tax value this amount of decimal places', 1, 20, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (15, 'Display Prices with Tax', 'DISPLAY_PRICE_WITH_TAX', 'false', 'Display prices with tax included (true) or add the tax at the end (false)', 1, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (16, 'Display Prices with Tax in Admin', 'DISPLAY_PRICE_WITH_TAX_ADMIN', 'false', 'Display prices with tax included (true) or add the tax at the end (false) in Admin(Invoices)', 1, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (17, 'Basis of Product Tax', 'STORE_PRODUCT_TAX_BASIS', 'Shipping', 'On what basis is Product Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 1, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (18, 'Basis of Shipping Tax', 'STORE_SHIPPING_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone - Can be overriden by correctly written Shipping Module', 1, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (19, 'Sales Tax Display Status', 'STORE_TAX_DISPLAY_STATUS', '0', 'Always show Sales Tax even when amount is $0.00?<br />0= Off<br />1= On', 1, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (20, 'Admin Session Time Out in Seconds', 'SESSION_TIMEOUT_ADMIN', '3600', 'Enter the time in seconds. Default=3600<br />Example: 3600= 1 hour<br /><br />Note: Too few seconds can result in timeout issues when adding/editing products', 1, 40, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (21, 'Admin Set max_execution_time for processes', 'GLOBAL_SET_TIME_LIMIT', '60', 'Enter the time in seconds for how long the max_execution_time of processes should be. Default=60<br />Example: 60= 1 minute<br /><br />Note: Changing the time limit is only needed if you are having problems with the execution time of a process', 1, 42, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (22, 'Show if version update available', 'SHOW_VERSION_UPDATE_IN_HEADER', 'false', 'Automatically check to see if a new version of Zen Cart is available. Enabling this can sometimes slow down the loading of Admin pages. (Displayed on main Index page after login, and Server Info page.)', 1, 44, '2008-08-04 14:32:41', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (23, 'Store Status', 'STORE_STATUS', '0', 'What is your Store Status<br />0= Normal Store<br />1= Showcase no prices<br />2= Showcase with prices', 1, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (24, 'Server Uptime', 'DISPLAY_SERVER_UPTIME', 'true', 'Displaying Server uptime can cause entries in error logs on some servers. (true = Display, false = don''t display)', 1, 46, '2003-11-08 20:24:47', '0001-01-01 00:00:00', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (25, 'Missing Page Check', 'MISSING_PAGE_CHECK', 'Page Not Found', 'Zen Cart can check for missing pages in the URL and redirect to Index page. For debugging you may want to turn this off. <br /><br /><strong>Default=On</strong><br />On = Send missing pages to ''index''<br />Off = Don''t check for missing pages<br />Page Not Found = display the Page-Not-Found page', 1, 48, '2003-11-08 20:24:47', '0001-01-01 00:00:00', '', 'zen_cfg_select_option(array(''On'', ''Off'', ''Page Not Found''),');
INSERT INTO `configuration` VALUES (26, 'cURL Proxy Status', 'CURL_PROXY_REQUIRED', 'False', 'Does your host require that you use a proxy for cURL communication?', 1, 50, '2009-06-24 16:41:25', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (27, 'cURL Proxy Address', 'CURL_PROXY_SERVER_DETAILS', '', 'If you have GoDaddy hosting or other hosting services that require use of a proxy to talk to external sites via cURL, enter their proxy address here.<br />format: address:port<br />ie: for GoDaddy, enter: <strong>proxy.shr.secureserver.net:3128</strong> or possibly 64.202.165.130:3128', 1, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (28, 'HTML Editor', 'HTML_EDITOR_PREFERENCE', 'TINYMCE', 'Please select the HTML/Rich-Text editor you wish to use for composing Admin-related emails, newsletters, and product descriptions', 1, 110, '2011-01-04 15:28:04', '2008-07-20 12:06:17', '', 'zen_cfg_pull_down_htmleditors(');
INSERT INTO `configuration` VALUES (29, 'Enable phpBB linkage?', 'PHPBB_LINKS_ENABLED', '', 'Should Zen Cart synchronize new account information to your (already-installed) phpBB forum?', 1, 120, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (30, 'Show Category Counts - Admin', 'SHOW_COUNTS_ADMIN', 'true', 'Show Category Counts in Admin?', 1, 19, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (31, 'Currency Conversion Ratio', 'CURRENCY_UPLIFT_RATIO', '1.05', 'When auto-updating currencies, what "uplift" ratio should be used to calculate the exchange rate used by your store?<br />ie: the bank rate is obtained from the currency-exchange servers; how much extra do you want to charge in order to make up the difference between the bank rate and the consumer rate?<br /><br /><strong>Default: 1.05 </strong><br />This will cause the published bank rate to be multiplied by 1.05 to set the currency rates in your store.', 1, 55, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (32, 'First Name', 'ENTRY_FIRST_NAME_MIN_LENGTH', '2', 'Minimum length of first name', 2, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (33, 'Last Name', 'ENTRY_LAST_NAME_MIN_LENGTH', '2', 'Minimum length of last name', 2, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (34, 'Date of Birth', 'ENTRY_DOB_MIN_LENGTH', '10', 'Minimum length of date of birth', 2, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (35, 'E-Mail Address', 'ENTRY_EMAIL_ADDRESS_MIN_LENGTH', '6', 'Minimum length of e-mail address', 2, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (36, 'Street Address', 'ENTRY_STREET_ADDRESS_MIN_LENGTH', '5', 'Minimum length of street address', 2, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (37, 'Company', 'ENTRY_COMPANY_MIN_LENGTH', '0', 'Minimum length of company name', 2, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (38, 'Post Code', 'ENTRY_POSTCODE_MIN_LENGTH', '4', 'Minimum length of post code', 2, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (39, 'City', 'ENTRY_CITY_MIN_LENGTH', '2', 'Minimum length of city', 2, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (40, 'State', 'ENTRY_STATE_MIN_LENGTH', '2', 'Minimum length of state', 2, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (41, 'Telephone Number', 'ENTRY_TELEPHONE_MIN_LENGTH', '3', 'Minimum length of telephone number', 2, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (42, 'Password', 'ENTRY_PASSWORD_MIN_LENGTH', '5', 'Minimum length of password', 2, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (43, 'Credit Card Owner Name', 'CC_OWNER_MIN_LENGTH', '3', 'Minimum length of credit card owner name', 2, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (44, 'Credit Card Number', 'CC_NUMBER_MIN_LENGTH', '10', 'Minimum length of credit card number', 2, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (45, 'Credit Card CVV Number', 'CC_CVV_MIN_LENGTH', '3', 'Minimum length of credit card CVV number', 2, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (46, 'Product Review Text', 'REVIEW_TEXT_MIN_LENGTH', '50', 'Minimum length of product review text', 2, 14, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (47, 'Best Sellers', 'MIN_DISPLAY_BESTSELLERS', '1', 'Minimum number of best sellers to display', 2, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (48, 'Also Purchased Products', 'MIN_DISPLAY_ALSO_PURCHASED', '1', 'Minimum number of products to display in the ''This Customer Also Purchased'' box', 2, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (49, 'Nick Name', 'ENTRY_NICK_MIN_LENGTH', '3', 'Minimum length of Nick Name', 2, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (50, 'Address Book Entries', 'MAX_ADDRESS_BOOK_ENTRIES', '10', 'Maximum address book entries a customer is allowed to have', 3, 1, '2008-09-27 23:43:49', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (51, 'Search Results Per Page', 'MAX_DISPLAY_SEARCH_RESULTS', '20', 'Number of products to list on a search result page', 3, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (52, 'Prev/Next Navigation Page Links', 'MAX_DISPLAY_PAGE_LINKS', '5', 'Number of ''number'' links use for page-sets', 3, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (53, 'Products on Special ', 'MAX_DISPLAY_SPECIAL_PRODUCTS', '9', 'Number of products on special to display', 3, 4, '2009-06-25 16:56:16', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (54, 'New Products Module', 'MAX_DISPLAY_NEW_PRODUCTS', '9', 'Number of new products to display in a category', 3, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (55, 'Upcoming Products ', 'MAX_DISPLAY_UPCOMING_PRODUCTS', '10', 'Number of ''upcoming'' products to display', 3, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (56, 'Manufacturers List - Scroll Box Size/Style', 'MAX_MANUFACTURERS_LIST', '3', 'Number of manufacturers names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list.', 3, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (57, 'Manufacturers List - Verify Product Exist', 'PRODUCTS_MANUFACTURERS_STATUS', '1', 'Verify that at least 1 product exists and is active for the manufacturer name to show<br /><br />Note: When this feature is ON it can produce slower results on sites with a large number of products and/or manufacturers<br />0= off 1= on', 3, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (58, 'Music Genre List - Scroll Box Size/Style', 'MAX_MUSIC_GENRES_LIST', '3', 'Number of music genre names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list.', 3, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (59, 'Record Company List - Scroll Box Size/Style', 'MAX_RECORD_COMPANY_LIST', '3', 'Number of record company names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list.', 3, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (60, 'Length of Record Company Name', 'MAX_DISPLAY_RECORD_COMPANY_NAME_LEN', '15', 'Used in record companies box; maximum length of record company name to display. Longer names will be truncated.', 3, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (61, 'Length of Music Genre Name', 'MAX_DISPLAY_MUSIC_GENRES_NAME_LEN', '15', 'Used in music genres box; maximum length of music genre name to display. Longer names will be truncated.', 3, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (62, 'Length of Manufacturers Name', 'MAX_DISPLAY_MANUFACTURER_NAME_LEN', '15', 'Used in manufacturers box; maximum length of manufacturers name to display. Longer names will be truncated.', 3, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (63, 'New Product Reviews Per Page', 'MAX_DISPLAY_NEW_REVIEWS', '6', 'Number of new reviews to display on each page', 3, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (64, 'Random Product Reviews for SideBox', 'MAX_RANDOM_SELECT_REVIEWS', '1', 'Number of random product REVIEWS to rotate in the sidebox<br />Enter the number of products to display in this sidebox at one time.<br /><br />How many products do you want to display in this sidebox?', 3, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (65, 'Random New Products for SideBox', 'MAX_RANDOM_SELECT_NEW', '1', 'Number of random NEW products to rotate in the sidebox<br />Enter the number of products to display in this sidebox at one time.<br /><br />How many products do you want to display in this sidebox?', 3, 11, '2008-07-24 14:18:16', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (66, 'Random Products On Special for SideBox', 'MAX_RANDOM_SELECT_SPECIALS', '2', 'Number of random products on SPECIAL to rotate in the sidebox<br />Enter the number of products to display in this sidebox at one time.<br /><br />How many products do you want to display in this sidebox?', 3, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (67, 'Categories To List Per Row', 'MAX_DISPLAY_CATEGORIES_PER_ROW', '3', 'How many categories to list per row', 3, 13, '2010-07-22 12:50:04', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (68, 'New Products Listing- Number Per Page', 'MAX_DISPLAY_PRODUCTS_NEW', '10', 'Number of new products listed per page', 3, 14, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (69, 'Best Sellers For Box', 'MAX_DISPLAY_BESTSELLERS', '5', 'Number of best sellers to display in box', 3, 15, '2008-07-27 12:28:23', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (70, 'Also Purchased Products', 'MAX_DISPLAY_ALSO_PURCHASED', '6', 'Number of products to display in the ''This Customer Also Purchased'' box', 3, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (71, 'Recent Purchases Box- NOTE: box is disabled ', 'MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX', '6', 'Number of products to display in the recent purchases box', 3, 17, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (72, 'Customer Order History List Per Page', 'MAX_DISPLAY_ORDER_HISTORY', '10', 'Number of orders to display in the order history list in ''My Account''', 3, 18, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (73, 'Maximum Display of Customers on Customers Page', 'MAX_DISPLAY_SEARCH_RESULTS_CUSTOMER', '20', '', 3, 19, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (74, 'Maximum Display of Orders on Orders Page', 'MAX_DISPLAY_SEARCH_RESULTS_ORDERS', '20', '', 3, 20, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (75, 'Maximum Display of Products on Reports', 'MAX_DISPLAY_SEARCH_RESULTS_REPORTS', '20', '', 3, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (76, 'Maximum Categories Products Display List', 'MAX_DISPLAY_RESULTS_CATEGORIES', '10', 'Number of products to list per screen', 3, 22, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (77, 'Products Listing- Number Per Page', 'MAX_DISPLAY_PRODUCTS_LISTING', '12', 'Maximum Number of Products to list per page on main page', 3, 30, '2010-11-04 14:31:27', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (78, 'Products Attributes - Option Names and Values Display', 'MAX_ROW_LISTS_OPTIONS', '10', 'Maximum number of option names and values to display in the products attributes page', 3, 24, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (79, 'Products Attributes - Attributes Controller Display', 'MAX_ROW_LISTS_ATTRIBUTES_CONTROLLER', '40', 'Maximum number of attributes to display in the Attributes Controller page', 3, 25, '2009-02-13 04:22:57', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (80, 'Products Attributes - Downloads Manager Display', 'MAX_DISPLAY_SEARCH_RESULTS_DOWNLOADS_MANAGER', '30', 'Maximum number of attributes downloads to display in the Downloads Manager page', 3, 26, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (81, 'Featured Products - Number to Display Admin', 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED_ADMIN', '4', 'Number of featured products to list per screen - Admin', 3, 27, '2008-08-13 17:05:59', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (82, 'Maximum Display of Featured Products - Main Page', 'MAX_DISPLAY_SEARCH_RESULTS_FEATURED', '9', 'Number of featured products to list on main page', 3, 28, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (83, 'Maximum Display of Featured Products Page', 'MAX_DISPLAY_PRODUCTS_FEATURED_PRODUCTS', '10', 'Number of featured products to list per screen', 3, 29, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (84, 'Random Featured Products for SideBox', 'MAX_RANDOM_SELECT_FEATURED_PRODUCTS', '4', 'Number of random FEATURED products to rotate in the sidebox<br />Enter the number of products to display in this sidebox at one time.<br /><br />How many products do you want to display in this sidebox?', 3, 30, '2008-07-27 12:49:34', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (85, 'Maximum Display of Specials Products - Main Page', 'MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX', '9', 'Number of special products to list on main page', 3, 31, '2009-06-25 17:48:31', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (86, 'New Product Listing - Limited to ...', 'SHOW_NEW_PRODUCTS_LIMIT', '0', 'Limit the New Product Listing to<br />0= All Products<br />1= Current Month<br />7= 7 Days<br />14= 14 Days<br />30= 30 Days<br />60= 60 Days<br />90= 90 Days<br />120= 120 Days', 3, 40, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''7'', ''14'', ''30'', ''60'', ''90'', ''120''), ');
INSERT INTO `configuration` VALUES (87, 'Maximum Display of Products All Page', 'MAX_DISPLAY_PRODUCTS_ALL', '10', 'Number of products to list per screen', 3, 45, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (88, 'Maximum Display of Language Flags in Language Side Box', 'MAX_LANGUAGE_FLAGS_COLUMNS', '3', 'Number of Language Flags per Row', 3, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (89, 'Maximum File Upload Size', 'MAX_FILE_UPLOAD_SIZE', '2048000', 'What is the Maximum file size for uploads?<br />Default= 2048000', 3, 60, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (90, 'Allowed Filename Extensions for uploading', 'UPLOAD_FILENAME_EXTENSIONS', 'jpg,jpeg,gif,png,eps,cdr,ai,pdf,tif,tiff,bmp,zip', 'List the permissible filetypes (filename extensions) to be allowed when files are uploaded to your site by customers. Separate multiple values with commas(,). Do not include the dot(.).<br /><br />Suggested setting: "jpg,jpeg,gif,png,eps,cdr,ai,pdf,tif,tiff,bmp,zip"', 3, 61, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (91, 'Maximum Orders Detail Display on Admin Orders Listing', 'MAX_DISPLAY_RESULTS_ORDERS_DETAILS_LISTING', '0', 'Maximum number of Order Details<br />0 = Unlimited', 3, 65, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (92, 'Maximum PayPal IPN Display on Admin Listing', 'MAX_DISPLAY_SEARCH_RESULTS_PAYPAL_IPN', '20', 'Maximum number of PayPal IPN Lisings in Admin<br />Default is 20', 3, 66, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (93, 'Maximum Display Columns Products to Multiple Categories Manager', 'MAX_DISPLAY_PRODUCTS_TO_CATEGORIES_COLUMNS', '3', 'Maximum Display Columns Products to Multiple Categories Manager<br />3 = Default', 3, 70, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (94, 'Maximum Display EZ-Pages', 'MAX_DISPLAY_SEARCH_RESULTS_EZPAGE', '20', 'Maximum Display EZ-Pages<br />20 = Default', 3, 71, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (95, 'Small Image Width', 'SMALL_IMAGE_WIDTH', '85', 'The pixel width of small images', 4, 1, '2008-08-16 13:56:50', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (96, 'Small Image Height', 'SMALL_IMAGE_HEIGHT', '85', 'The pixel height of small images', 4, 2, '2008-08-16 13:56:44', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (97, 'Heading Image Width - Admin', 'HEADING_IMAGE_WIDTH', '42', 'The pixel width of heading images in the Admin<br />NOTE: Presently, this adjusts the spacing on the pages in the Admin Pages or could be used to add images to the heading in the Admin', 4, 3, '2008-08-16 13:57:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (98, 'Heading Image Height - Admin', 'HEADING_IMAGE_HEIGHT', '42', 'The pixel height of heading images in the Admin<br />NOTE: Presently, this adjusts the spacing on the pages in the Admin Pages or could be used to add images to the heading in the Admin', 4, 4, '2008-08-16 13:57:06', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (99, 'Subcategory Image Width', 'SUBCATEGORY_IMAGE_WIDTH', '100', 'The pixel width of subcategory images', 4, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (100, 'Subcategory Image Height', 'SUBCATEGORY_IMAGE_HEIGHT', '100', 'The pixel height of subcategory images', 4, 6, '2008-08-16 13:57:14', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (101, 'Calculate Image Size', 'CONFIG_CALCULATE_IMAGE_SIZE', 'true', 'Calculate the size of images?', 4, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (102, 'Image Required', 'IMAGE_REQUIRED', 'true', 'Enable to display broken images. Good for development.', 4, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (103, 'Image - Shopping Cart Status', 'IMAGE_SHOPPING_CART_STATUS', '1', 'Show product image in the shopping cart?<br />0= off 1= on', 4, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (104, 'Image - Shopping Cart Width', 'IMAGE_SHOPPING_CART_WIDTH', '85', 'Default = 50', 4, 10, '2008-08-05 22:49:47', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (105, 'Image - Shopping Cart Height', 'IMAGE_SHOPPING_CART_HEIGHT', '85', 'Default = 40', 4, 11, '2008-08-05 22:49:53', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (106, 'Category Icon Image Width - Product Info Pages', 'CATEGORY_ICON_IMAGE_WIDTH', '50', 'The pixel width of Category Icon heading images for Product Info Pages', 4, 13, '2008-08-16 13:57:28', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (107, 'Category Icon Image Height - Product Info Pages', 'CATEGORY_ICON_IMAGE_HEIGHT', '50', 'The pixel height of Category Icon heading images for Product Info Pages', 4, 14, '2008-08-16 13:57:34', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (108, 'Top Subcategory Image Width', 'SUBCATEGORY_IMAGE_TOP_WIDTH', '150', 'The pixel width of Top subcategory images<br />Top subcategory is when the Category contains subcategories', 4, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (109, 'Top Subcategory Image Height', 'SUBCATEGORY_IMAGE_TOP_HEIGHT', '85', 'The pixel height of Top subcategory images<br />Top subcategory is when the Category contains subcategories', 4, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (110, 'Product Info - Image Width', 'MEDIUM_IMAGE_WIDTH', '150', 'The pixel width of Product Info images', 4, 20, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (111, 'Product Info - Image Height', 'MEDIUM_IMAGE_HEIGHT', '120', 'The pixel height of Product Info images', 4, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (112, 'Product Info - Image Medium Suffix', 'IMAGE_SUFFIX_MEDIUM', '_MED', 'Product Info Medium Image Suffix<br />Default = _MED', 4, 22, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (113, 'Product Info - Image Large Suffix', 'IMAGE_SUFFIX_LARGE', '_LRG', 'Product Info Large Image Suffix<br />Default = _LRG', 4, 23, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (114, 'Product Info - Number of Additional Images per Row', 'IMAGES_AUTO_ADDED', '3', 'Product Info - Enter the number of additional images to display per row<br />Default = 3', 4, 30, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (115, 'Image - Product Listing Width', 'IMAGE_PRODUCT_LISTING_WIDTH', '100', 'Default = 100', 4, 40, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (116, 'Image - Product Listing Height', 'IMAGE_PRODUCT_LISTING_HEIGHT', '80', 'Default = 80', 4, 41, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (117, 'Image - Product New Listing Width', 'IMAGE_PRODUCT_NEW_LISTING_WIDTH', '100', 'Default = 100', 4, 42, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (118, 'Image - Product New Listing Height', 'IMAGE_PRODUCT_NEW_LISTING_HEIGHT', '80', 'Default = 80', 4, 43, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (119, 'Image - New Products Width', 'IMAGE_PRODUCT_NEW_WIDTH', '100', 'Default = 100', 4, 44, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (120, 'Image - New Products Height', 'IMAGE_PRODUCT_NEW_HEIGHT', '80', 'Default = 80', 4, 45, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (121, 'Image - Featured Products Width', 'IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH', '100', 'Default = 100', 4, 46, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (122, 'Image - Featured Products Height', 'IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT', '80', 'Default = 80', 4, 47, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (123, 'Image - Product All Listing Width', 'IMAGE_PRODUCT_ALL_LISTING_WIDTH', '100', 'Default = 100', 4, 48, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (124, 'Image - Product All Listing Height', 'IMAGE_PRODUCT_ALL_LISTING_HEIGHT', '80', 'Default = 80', 4, 49, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (125, 'Product Image - No Image Status', 'PRODUCTS_IMAGE_NO_IMAGE_STATUS', '1', 'Use automatic No Image when none is added to product<br />0= off<br />1= On', 4, 60, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (126, 'Product Image - No Image picture', 'PRODUCTS_IMAGE_NO_IMAGE', 'no_picture.gif', 'Use automatic No Image when none is added to product<br />Default = no_picture.gif', 4, 61, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (127, 'Image - Use Proportional Images on Products and Categories', 'PROPORTIONAL_IMAGES_STATUS', '1', 'Use Proportional Images on Products and Categories?<br /><br />NOTE: Do not use 0 height or width settings for Proportion Images<br />0= off 1= on', 4, 75, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (128, 'Email Salutation', 'ACCOUNT_GENDER', 'true', 'Display salutation choice during account creation and with account information', 5, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (129, 'Date of Birth', 'ACCOUNT_DOB', 'false', 'Display date of birth field during account creation and with account information<br />NOTE: Set Minimum Value Date of Birth to blank for not required<br />Set Minimum Value Date of Birth > 0 to require', 5, 2, '2008-08-04 14:34:21', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (130, 'Company', 'ACCOUNT_COMPANY', 'false', 'Display company field during account creation and with account information', 5, 3, '2009-06-19 12:51:46', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (131, 'Address Line 2', 'ACCOUNT_SUBURB', 'false', 'Display address line 2 field during account creation and with account information', 5, 4, '2009-06-19 12:51:52', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (132, 'State', 'ACCOUNT_STATE', 'true', 'Display state field during account creation and with account information', 5, 5, '2009-06-19 09:39:27', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (133, 'State - Always display as pulldown?', 'ACCOUNT_STATE_DRAW_INITIAL_DROPDOWN', 'false', 'When state field is displayed, should it always be a pulldown menu?', 5, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (134, 'Create Account Default Country ID', 'SHOW_CREATE_ACCOUNT_DEFAULT_COUNTRY', '223', 'Set Create Account Default Country ID to:<br />Default is 223', 5, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:18', 'zen_get_country_name', 'zen_cfg_pull_down_country_list_none(');
INSERT INTO `configuration` VALUES (135, 'Fax Number', 'ACCOUNT_FAX_NUMBER', 'true', 'Display fax number field during account creation and with account information', 5, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (136, 'Show Newsletter Checkbox', 'ACCOUNT_NEWSLETTER_STATUS', '0', 'Show Newsletter Checkbox<br />0= off<br />1= Display Unchecked<br />2= Display Checked<br /><strong>Note: Defaulting this to accepted may be in violation of certain regulations for your state or country</strong>', 5, 45, '2008-08-20 07:04:13', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (137, 'Customer Default Email Preference', 'ACCOUNT_EMAIL_PREFERENCE', '0', 'Set the Default Customer Default Email Preference<br />0= Text<br />1= HTML<br />', 5, 46, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (138, 'Customer Product Notification Status', 'CUSTOMERS_PRODUCTS_NOTIFICATION_STATUS', '1', 'Customer should be asked about product notifications after checkout success and in account preferences<br />0= Never ask<br />1= Ask (ignored on checkout if has already selected global notifications)<br /><br />Note: Sidebox must be turned off separately', 5, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (139, 'Customer Shop Status - View Shop and Prices', 'CUSTOMERS_APPROVAL', '0', 'Customer must be approved to shop<br />0= Not required<br />1= Must login to browse<br />2= May browse but no prices unless logged in<br />3= Showroom Only<br /><br />It is recommended that Option 2 be used for the purposes of Spiders if you wish customers to login to see prices.', 5, 55, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (140, 'Customer Approval Status - Authorization Pending', 'CUSTOMERS_APPROVAL_AUTHORIZATION', '0', 'Customer must be Authorized to shop<br />0= Not required<br />1= Must be Authorized to Browse<br />2= May browse but no prices unless Authorized<br />3= Customer May Browse and May see Prices but Must be Authorized to Buy<br /><br />It is recommended that Option 2 or 3 be used for the purposes of Spiders', 5, 65, '2008-08-20 07:15:22', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (141, 'Customer Authorization: filename', 'CUSTOMERS_AUTHORIZATION_FILENAME', 'customers_authorization', 'Customer Authorization filename<br />Note: Do not include the extension<br />Default=customers_authorization', 5, 66, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (142, 'Customer Authorization: Hide Header', 'CUSTOMERS_AUTHORIZATION_HEADER_OFF', 'true', 'Customer Authorization: Hide Header <br />(true=hide false=show)', 5, 67, '2008-08-20 06:56:25', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (143, 'Customer Authorization: Hide Column Left', 'CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF', 'false', 'Customer Authorization: Hide Column Left <br />(true=hide false=show)', 5, 68, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (144, 'Customer Authorization: Hide Column Right', 'CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF', 'false', 'Customer Authorization: Hide Column Right <br />(true=hide false=show)', 5, 69, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (145, 'Customer Authorization: Hide Footer', 'CUSTOMERS_AUTHORIZATION_FOOTER_OFF', 'true', 'Customer Authorization: Hide Footer <br />(true=hide false=show)', 5, 70, '2008-08-20 07:02:46', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (146, 'Customer Authorization: Hide Prices', 'CUSTOMERS_AUTHORIZATION_PRICES_OFF', 'false', 'Customer Authorization: Hide Prices <br />(true=hide false=show)', 5, 71, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (147, 'Customers Referral Status', 'CUSTOMERS_REFERRAL_STATUS', '0', 'Customers Referral Code is created from<br />0= Off<br />1= 1st Discount Coupon Code used<br />2= Customer can add during create account or edit if blank<br /><br />NOTE: Once the Customers Referral Code has been set it can only be changed in the Admin Customer', 5, 80, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (148, 'Installed Modules', 'MODULE_PAYMENT_INSTALLED', 'ips.php;paypalwpp.php;westernunion.php', 'List of payment module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: cc.php;cod.php;paypal.php)', 6, 0, '2010-11-03 18:36:13', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (149, 'Installed Modules', 'MODULE_ORDER_TOTAL_INSTALLED', 'ot_subtotal.php;ot_shipping.php;ot_coupon.php;ot_group_pricing.php;ot_tax.php;ot_sc.php;ot_gv.php;ot_cod_fee.php;ot_total.php', 'List of order_total module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ot_subtotal.php;ot_tax.php;ot_shipping.php;ot_total.php)', 6, 0, '2010-07-23 16:32:12', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (150, 'Installed Modules', 'MODULE_SHIPPING_INSTALLED', 'freeoptions.php;dhlzones.php;emszones.php;fedexzones.php;upszones.php', 'List of shipping module filenames separated by a semi-colon. This is automatically updated. No need to edit. (Example: ups.php;flat.php;item.php)', 6, 0, '2010-07-26 14:57:25', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (1355, 'Query (3)', 'AUTO_STATE_3', 'order', '<br />Set query <p />Choose <b>order</b> for post-order emailing <p />Choose <b>account</b> for emailing all account creating customers<p />Choose <b>account-no-order</b> for emailing customers who have created an account but never ordered', 48, 28, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''order'', ''account'', ''account-no-order''), ');
INSERT INTO `configuration` VALUES (1356, 'Order Status ID (3)', 'AUTO_ORDER_STATUS_ID_3', '3', '<br />Emails only send for orders with the following status:<p />(ignore if in <b>account</b> state)<br />', 48, 29, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1357, 'Days After (3)', 'AUTO_DAYS_AFTER_3', '21', '<br />Amount of days before email is sent', 48, 30, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1358, 'Subscribed (3)', 'AUTO_SUBSCRIBED_3', 'true', '<br />Must be subscribed to newsletter', 48, 31, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1359, 'Restrict Location (3)', 'AUTO_RESTRICT_3', 'no', '<br />Post-order emails are restricted', 48, 32, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''no'', ''to zone'', ''to country'', ''from zone'', ''from country''), ');
INSERT INTO `configuration` VALUES (1360, 'Location to Restrict (3)', 'AUTO_LOCATION_3', 'California', '<br />Enter location to restrict to/from<p />(ignore if no restriction)<br />', 48, 33, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1361, 'Subject (3)', 'AUTO_SUBJECT_3', 'Order Review', 'Enter email subject', 48, 34, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1362, 'Include Customer Name (3)', 'AUTO_INCLUDE_NAME_3', '0', '<br />Display customer name at beginning of email<p />0 No<br />1 John<br />2 John Smith<br />3 Hi John<br />4 Hi John Smith<br />5 Hello John<br />6 Hello John Smith<br />7 John,<br />8 John Smith,<br />9 Hi John,<br />10 Hi John Smith,<br />11 Hello John,<br />12 Hello John Smith,<br />13 Dear John<br />14 Dear John Smith<br />15 Dear John,<br />16 Dear John Smith,', 48, 35, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12'', ''13'', ''14'', ''15'', ''16''), ');
INSERT INTO `configuration` VALUES (1352, 'HTML Message (2)', 'AUTO_MESSAGE_HTML_2', 'Enter email here..', '<br />Enter main message<p />HTML allowed<br />', 48, 25, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1353, 'Enable Preset (3)', 'AUTO_ENABLE_PRESET_3', 'false', '<br />Enable email preset #3', 48, 26, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1354, 'Mode (3)', 'AUTO_MODE_3', 'test', '<br />Set mode <p />When in test mode, emails will be sent to store owner instead', 48, 27, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''test'', ''live''), ');
INSERT INTO `configuration` VALUES (1347, 'Restrict Location (2)', 'AUTO_RESTRICT_2', 'no', '<br />Post-order emails are restricted', 48, 20, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''no'', ''to zone'', ''to country'', ''from zone'', ''from country''), ');
INSERT INTO `configuration` VALUES (1348, 'Location to Restrict (2)', 'AUTO_LOCATION_2', 'Canada', '<br />Enter location to restrict to/from<p />(ignore if no restriction)<br />', 48, 21, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1349, 'Subject (2)', 'AUTO_SUBJECT_2', 'Order Review', 'Enter email subject', 48, 22, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1350, 'Include Customer Name (2)', 'AUTO_INCLUDE_NAME_2', '0', '<br />Display customer name at beginning of email<p />0 No<br />1 John<br />2 John Smith<br />3 Hi John<br />4 Hi John Smith<br />5 Hello John<br />6 Hello John Smith<br />7 John,<br />8 John Smith,<br />9 Hi John,<br />10 Hi John Smith,<br />11 Hello John,<br />12 Hello John Smith,<br />13 Dear John<br />14 Dear John Smith<br />15 Dear John,<br />16 Dear John Smith,', 48, 23, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12'', ''13'', ''14'', ''15'', ''16''), ');
INSERT INTO `configuration` VALUES (1351, 'Text Message (2)', 'AUTO_MESSAGE_TEXT_2', 'Enter email here..', '<br />Enter main message<p />Carriage return sensitive<br />', 48, 24, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (186, 'Include Tax', 'MODULE_ORDER_TOTAL_GROUP_PRICING_INC_TAX', 'true', 'Include Tax value in amount before discount calculation?', 6, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (187, 'This module is installed', 'MODULE_ORDER_TOTAL_GROUP_PRICING_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true''), ');
INSERT INTO `configuration` VALUES (188, 'Sort Order', 'MODULE_ORDER_TOTAL_GROUP_PRICING_SORT_ORDER', '290', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (189, 'Include Shipping', 'MODULE_ORDER_TOTAL_GROUP_PRICING_INC_SHIPPING', 'true', 'Include Shipping value in amount before discount calculation?', 6, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (190, 'Re-calculate Tax', 'MODULE_ORDER_TOTAL_GROUP_PRICING_CALC_TAX', 'Standard', 'Re-Calculate Tax', 6, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''None'', ''Standard'', ''Credit Note''), ');
INSERT INTO `configuration` VALUES (191, 'Tax Class', 'MODULE_ORDER_TOTAL_GROUP_PRICING_TAX_CLASS', '0', 'Use the following tax class when treating Group Discount as Credit Note.', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (198, 'Default Currency', 'DEFAULT_CURRENCY', 'USD', 'Default Currency', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (199, 'Default Language', 'DEFAULT_LANGUAGE', 'EN', 'Default Language', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (200, 'Default Order Status For New Orders', 'DEFAULT_ORDERS_STATUS_ID', '1', 'When a new order is created, this order status will be assigned to it.', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (201, 'Admin configuration_key shows', 'ADMIN_CONFIGURATION_KEY_ON', '0', 'Manually switch to value of 1 to see the configuration_key name in configuration displays', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (202, 'Country of Origin', 'SHIPPING_ORIGIN_COUNTRY', '44', 'Select the country of origin to be used in shipping quotes.', 7, 1, '2009-08-05 13:39:55', '2008-07-20 12:06:18', 'zen_get_country_name', 'zen_cfg_pull_down_country_list(');
INSERT INTO `configuration` VALUES (203, 'Postal Code', 'SHIPPING_ORIGIN_ZIP', '350001', 'Enter the Postal Code (ZIP) of the Store to be used in shipping quotes. NOTE: For USA zip codes, only use your 5 digit zip code.', 7, 2, '2009-08-05 13:40:45', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (204, 'Enter the Maximum Package Weight you will ship', 'SHIPPING_MAX_WEIGHT', '500', 'Carriers have a max weight limit for a single package. This is a common one for all.', 7, 3, '2008-09-27 09:38:39', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (205, 'Package Tare Small to Medium - added percentage:weight', 'SHIPPING_BOX_WEIGHT', '0:3', 'What is the weight of typical packaging of small to medium packages?<br />Example: 10% + 1lb 10:1<br />10% + 0lbs 10:0<br />0% + 5lbs 0:5<br />0% + 0lbs 0:0', 7, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (206, 'Larger packages - added packaging percentage:weight', 'SHIPPING_BOX_PADDING', '10:0', 'What is the weight of typical packaging for Large packages?<br />Example: 10% + 1lb 10:1<br />10% + 0lbs 10:0<br />0% + 5lbs 0:5<br />0% + 0lbs 0:0', 7, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (207, 'Display Number of Boxes and Weight Status', 'SHIPPING_BOX_WEIGHT_DISPLAY', '3', 'Display Shipping Weight and Number of Boxes?<br /><br />0= off<br />1= Boxes Only<br />2= Weight Only<br />3= Both Boxes and Weight', 7, 15, '2008-09-16 16:55:08', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (208, 'Shipping Estimator Display Settings for Shopping Cart', 'SHOW_SHIPPING_ESTIMATOR_BUTTON', '2', '<br />0= Off<br />1= Display as Button on Shopping Cart<br />2= Display as Listing on Shopping Cart Page', 7, 20, '2008-08-05 22:31:56', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (209, 'Display Order Comments on Admin Invoice', 'ORDER_COMMENTS_INVOICE', '1', 'Do you want to display the Order Comments on the Admin Invoice?<br />0= OFF<br />1= First Comment by Customer only<br />2= All Comments for the Order', 7, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (210, 'Display Order Comments on Admin Packing Slip', 'ORDER_COMMENTS_PACKING_SLIP', '1', 'Do you want to display the Order Comments on the Admin Packing Slip?<br />0= OFF<br />1= First Comment by Customer only<br />2= All Comments for the Order', 7, 26, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (211, 'Order Free Shipping 0 Weight Status', 'ORDER_WEIGHT_ZERO_STATUS', '0', 'If there is no weight to the order, does the order have Free Shipping?<br />0= no<br />1= yes<br /><br />Note: When using Free Shipping, Enable the Free Shipping Module this will only show when shipping is free.', 7, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (212, 'Display Product Image', 'PRODUCT_LIST_IMAGE', '1', 'Do you want to display the Product Image?', 8, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (213, 'Display Product Manufacturer Name', 'PRODUCT_LIST_MANUFACTURER', '0', 'Do you want to display the Product Manufacturer Name?', 8, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (214, 'Display Product Model', 'PRODUCT_LIST_MODEL', '4', 'Do you want to display the Product Model?', 8, 3, '2008-07-31 11:51:36', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (215, 'Display Product Name', 'PRODUCT_LIST_NAME', '2', 'Do you want to display the Product Name?', 8, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (216, 'Display Product Price/Add to Cart', 'PRODUCT_LIST_PRICE', '3', 'Do you want to display the Product Price/Add to Cart', 8, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (217, 'Display Product Quantity', 'PRODUCT_LIST_QUANTITY', '', 'Do you want to display the Product Quantity?', 8, 6, '2008-07-31 13:21:39', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (218, 'Display Product Weight', 'PRODUCT_LIST_WEIGHT', '0', 'Do you want to display the Product Weight?', 8, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (219, 'Display Product Price/Add to Cart Column Width', 'PRODUCTS_LIST_PRICE_WIDTH', '125', 'Define the width of the Price/Add to Cart column<br />Default= 125', 8, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (220, 'Display Category/Manufacturer Filter (0=off; 1=on)', 'PRODUCT_LIST_FILTER', '1', 'Do you want to display the Category/Manufacturer Filter?', 8, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (221, 'Prev/Next Split Page Navigation (1-top, 2-bottom, 3-both)', 'PREV_NEXT_BAR_LOCATION', '3', 'Sets the location of the Prev/Next Split Page Navigation', 8, 10, '2008-07-31 17:14:43', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (222, 'Display Product Listing Default Sort Order', 'PRODUCT_LISTING_DEFAULT_SORT_ORDER', '', 'Product Listing Default sort order?<br />NOTE: Leave Blank for Product Sort Order. Sort the Product Listing in the order you wish for the default display to start in to get the sort order setting. Example: 2a', 8, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (223, 'Display Product Add to Cart Button (0=off; 1=on; 2=on with Qty Box per Product)', 'PRODUCT_LIST_PRICE_BUY_NOW', '2', 'Do you want to display the Add to Cart Button?<br /><br /><strong>NOTE:</strong> Turn OFF Display Multiple Products Qty Box Status to use Option 2 on with Qty Box per Product', 8, 20, '2008-07-31 11:52:45', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (224, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART', '0', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 8, 25, '2008-07-31 11:55:22', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (225, 'Display Product Description', 'PRODUCT_LIST_DESCRIPTION', '150', 'Do you want to display the Product Description?<br /><br />0= OFF<br />150= Suggested Length, or enter the maximum number of characters to display', 8, 30, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (226, 'Product Listing Ascending Sort Order', 'PRODUCT_LIST_SORT_ORDER_ASCENDING', '+', 'What do you want to use to indicate Sort Order Ascending?<br />Default = +', 8, 40, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (227, 'Product Listing Descending Sort Order', 'PRODUCT_LIST_SORT_ORDER_DESCENDING', '-', 'What do you want to use to indicate Sort Order Descending?<br />Default = -', 8, 41, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (228, 'Include Product Listing Alpha Sorter Dropdown', 'PRODUCT_LIST_ALPHA_SORTER', 'false', 'Do you want to include an Alpha Filter dropdown on the Product Listing?', 8, 50, '2008-07-31 13:59:30', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (229, 'Include Product Listing Sub Categories Image', 'PRODUCT_LIST_CATEGORIES_IMAGE_STATUS', 'false', 'Do you want to include the Sub Categories Image on the Product Listing?', 8, 52, '2008-07-31 11:47:56', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (230, 'Include Product Listing Top Categories Image', 'PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP', 'false', 'Do you want to include the Top Categories Image on the Product Listing?', 8, 53, '2008-07-31 11:48:02', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (231, 'Show SubCategories on Main Page while navigating', 'PRODUCT_LIST_CATEGORY_ROW_STATUS', '1', 'Show Sub-Categories on Main Page while navigating through Categories<br /><br />0= off<br />1= on', 8, 60, '2008-07-31 14:00:43', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (232, 'Check stock level', 'STOCK_CHECK', 'true', 'Check to see if sufficent stock is available', 9, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (233, 'Subtract stock', 'STOCK_LIMITED', 'true', 'Subtract product in stock by product orders', 9, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (234, 'Allow Checkout', 'STOCK_ALLOW_CHECKOUT', 'true', 'Allow customer to checkout even if there is insufficient stock', 9, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (235, 'Mark product out of stock', 'STOCK_MARK_PRODUCT_OUT_OF_STOCK', '***', 'Display something on screen so customer can see which product has insufficient stock', 9, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (236, 'Stock Re-order level', 'STOCK_REORDER_LEVEL', '5', 'Define when stock needs to be re-ordered', 9, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (237, 'Products status in Catalog when out of stock should be set to', 'SHOW_PRODUCTS_SOLD_OUT', '0', 'Show Products when out of stock<br /><br />0= set product status to OFF<br />1= leave product status ON', 9, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (238, 'Show Sold Out Image in place of Add to Cart', 'SHOW_PRODUCTS_SOLD_OUT_IMAGE', '1', 'Show Sold Out Image instead of Add to Cart Button<br /><br />0= off<br />1= on', 9, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (239, 'Product Quantity Decimals', 'QUANTITY_DECIMALS', '0', 'Allow how many decimals on Quantity<br /><br />0= off', 9, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (240, 'Show Shopping Cart - Delete Checkboxes or Delete Button', 'SHOW_SHOPPING_CART_DELETE', '3', 'Show on Shopping Cart Delete Button and/or Checkboxes<br /><br />1= Delete Button Only<br />2= Checkbox Only<br />3= Both Delete Button and Checkbox', 9, 20, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (241, 'Show Shopping Cart - Update Cart Button Location', 'SHOW_SHOPPING_CART_UPDATE', '3', 'Show on Shopping Cart Update Cart Button Location as:<br /><br />1= Next to each Qty Box<br />2= Below all Products<br />3= Both Next to each Qty Box and Below all Products', 9, 22, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (242, 'Show New Products on empty Shopping Cart Page', 'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS', '1', 'Show New Products on empty Shopping Cart Page<br />0= off or set the sort order', 9, 30, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (243, 'Show Featured Products on empty Shopping Cart Page', 'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS', '2', 'Show Featured Products on empty Shopping Cart Page<br />0= off or set the sort order', 9, 31, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (244, 'Show Special Products on empty Shopping Cart Page', 'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS', '3', 'Show Special Products on empty Shopping Cart Page<br />0= off or set the sort order', 9, 32, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (245, 'Show Upcoming Products on empty Shopping Cart Page', 'SHOW_SHOPPING_CART_EMPTY_UPCOMING', '4', 'Show Upcoming Products on empty Shopping Cart Page<br />0= off or set the sort order', 9, 33, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (246, 'Show Notice of Combining Shopping Cart on Login', 'SHOW_SHOPPING_CART_COMBINED', '1', 'When a customer logs in and has a previously stored shopping cart, the products are combined with the existing shopping cart.<br /><br />Do you wish to display a Notice to the customer?<br /><br />0= OFF, do not display a notice<br />1= Yes show notice and go to shopping cart<br />2= Yes show notice, but do not go to shopping cart', 9, 35, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (247, 'Store Page Parse Time', 'STORE_PAGE_PARSE_TIME', 'false', 'Store the time it takes to parse a page', 10, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (248, 'Log Destination', 'STORE_PAGE_PARSE_TIME_LOG', 'E:/xampp/htdocs/taoxieyoua/cache/page_parse_time.log', 'Directory and filename of the page parse time log', 10, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (249, 'Log Date Format', 'STORE_PARSE_DATE_TIME_FORMAT', '%d/%m/%Y %H:%M:%S', 'The date format', 10, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (250, 'Display The Page Parse Time', 'DISPLAY_PAGE_PARSE_TIME', 'false', 'Display the page parse time on the bottom of each page<br />You do not need to store the times to display them in the Catalog', 10, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (251, 'Store Database Queries', 'STORE_DB_TRANSACTIONS', 'false', 'Store the database queries in the page parse time log (PHP4 only)', 10, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (252, 'E-Mail Transport Method', 'EMAIL_TRANSPORT', 'smtpauth', 'Defines the method for sending mail.<br /><strong>PHP</strong> is the default, and uses built-in PHP wrappers for processing.<br />Servers running on Windows and MacOS should change this setting to <strong>SMTP</strong>.<br /><br /><strong>SMTPAUTH</strong> should only be used if your server requires SMTP authorization to send messages. You must also configure your SMTPAUTH settings in the appropriate fields in this admin section.<br /><br /><strong>sendmail</strong> is for linux/unix hosts using the sendmail program on the server<br /><strong>"sendmail-f"</strong> is only for servers which require the use of the -f parameter to send mail. This is a security setting often used to prevent spoofing. Will cause errors if your host mailserver is not configured to use it.<br /><br /><strong>Qmail</strong> is used for linux/unix hosts running Qmail as sendmail wrapper at /var/qmail/bin/sendmail.', 12, 1, '2010-11-02 17:37:50', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''PHP'', ''sendmail'', ''sendmail-f'', ''smtp'', ''smtpauth'', ''Qmail''),');
INSERT INTO `configuration` VALUES (253, 'SMTP Email Account Mailbox', 'EMAIL_SMTPAUTH_MAILBOX', 'wangyulin@mazentop.com', 'Enter the mailbox account name (me@mydomain.com) supplied by your host. This is the account name that your host requires for SMTP authentication.<br />Only required if using SMTP Authentication for email.', 12, 101, '2010-11-02 18:42:24', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (254, 'SMTP Email Account Password', 'EMAIL_SMTPAUTH_PASSWORD', '123456', 'Enter the password for your SMTP mailbox. <br />Only required if using SMTP Authentication for email.', 12, 101, '2010-11-02 18:42:31', '2008-07-20 12:06:18', 'zen_cfg_password_display', '');
INSERT INTO `configuration` VALUES (255, 'SMTP Email Mail Host', 'EMAIL_SMTPAUTH_MAIL_SERVER', 'mail.mazentop.com', 'Enter the DNS name of your SMTP mail server.<br />ie: mail.mydomain.com<br />or 55.66.77.88<br />Only required if using SMTP Authentication for email.', 12, 101, '2010-11-02 18:42:52', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (256, 'SMTP Email Mail Server Port', 'EMAIL_SMTPAUTH_MAIL_SERVER_PORT', '25', 'Enter the IP port number that your SMTP mailserver operates on.<br />Only required if using SMTP Authentication for email.', 12, 101, '2010-11-02 18:43:03', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (257, 'Convert currencies for Text emails', 'CURRENCIES_TRANSLATIONS', '&pound;,Â£:&euro;,â‚¬', 'What currency conversions do you need for Text emails?<br />Default = &amp;pound;,Â£:&amp;euro;,â‚¬', 12, 120, '0000-00-00 00:00:00', '2003-11-21 00:00:00', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (258, 'E-Mail Linefeeds', 'EMAIL_LINEFEED', 'LF', 'Defines the character sequence used to separate mail headers.', 12, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''LF'', ''CRLF''),');
INSERT INTO `configuration` VALUES (259, 'Use MIME HTML When Sending Emails', 'EMAIL_USE_HTML', 'true', 'Send e-mails in HTML format', 12, 3, '2008-10-11 19:04:43', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (260, 'Verify E-Mail Addresses Through DNS', 'ENTRY_EMAIL_ADDRESS_CHECK', 'false', 'Verify e-mail address through a DNS server', 6, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (261, 'Send E-Mails', 'SEND_EMAILS', 'true', 'Send out e-mails', 12, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (262, 'Email Archiving Active?', 'EMAIL_ARCHIVE', 'true', 'If you wish to have email messages archived/stored when sent, set this to "true".', 12, 6, '2008-10-11 18:42:12', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (263, 'E-Mail Friendly-Errors', 'EMAIL_FRIENDLY_ERRORS', 'true', 'Do you want to display friendly errors if emails fail?  Setting this to false will display PHP errors and likely cause the script to fail. Only set to false while troubleshooting, and true for a live shop.', 12, 7, '2009-06-19 14:45:33', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (264, 'Email Address (Displayed to Contact you)', 'STORE_OWNER_EMAIL_ADDRESS', 'jdifuwr3434@gmail.com', 'Email address of Store Owner.  Used as "display only" when informing customers of how to contact you.', 12, 10, '2009-06-19 15:16:20', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (265, 'Email Address (sent FROM)', 'EMAIL_FROM', 'wangyulin@mazentop.com', 'Address from which email messages will be "sent" by default. Can be over-ridden at compose-time in admin modules.', 12, 11, '2010-11-02 18:42:09', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (266, 'Emails must send from known domain?', 'EMAIL_SEND_MUST_BE_STORE', 'Yes', 'Does your mailserver require that all outgoing emails have their "from" address match a known domain that exists on your webserver?<br /><br />This is often required in order to prevent spoofing and spam broadcasts.  If set to Yes, this will cause the email address (sent FROM) to be used as the "from" address on all outgoing mail.', 12, 11, '0000-00-00 00:00:00', '0001-01-01 00:00:00', '', 'zen_cfg_select_option(array(''No'', ''Yes''), ');
INSERT INTO `configuration` VALUES (267, 'Email Admin Format?', 'ADMIN_EXTRA_EMAIL_FORMAT', 'TEXT', 'Please select the Admin extra email format', 12, 12, '0000-00-00 00:00:00', '0001-01-01 00:00:00', '', 'zen_cfg_select_option(array(''TEXT'', ''HTML''), ');
INSERT INTO `configuration` VALUES (268, 'Send Copy of Order Confirmation Emails To', 'SEND_EXTRA_ORDER_EMAILS_TO', 'jdifuwr3434@gmail.com', 'Send COPIES of order confirmation emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 12, '2009-06-19 15:16:35', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (269, 'Send Copy of Create Account Emails To - Status', 'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO_STATUS', '0', 'Send copy of Create Account Status<br />0= off 1= on', 12, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (270, 'Send Copy of Create Account Emails To', 'SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO', 'service@taoxieyoua.com', 'Send copy of Create Account emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 14, '2009-03-25 16:20:36', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (271, 'Send Copy of Tell a Friend Emails To - Status', 'SEND_EXTRA_TELL_A_FRIEND_EMAILS_TO_STATUS', '0', 'Send copy of Tell a Friend Status<br />0= off 1= on', 12, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (272, 'Send Copy of Tell a Friend Emails To', 'SEND_EXTRA_TELL_A_FRIEND_EMAILS_TO', 'service@taoxieyoua.com', 'Send copy of Tell a Friend emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 16, '2009-03-25 16:20:44', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (273, 'Send Copy of Customer GV Send Emails To - Status', 'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_STATUS', '0', 'Send copy of Customer GV Send Status<br />0= off 1= on', 12, 17, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (274, 'Send Copy of Customer GV Send Emails To', 'SEND_EXTRA_GV_CUSTOMER_EMAILS_TO', 'service@taoxieyoua.com', 'Send copy of Customer GV Send emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 18, '2009-03-25 16:20:51', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (275, 'Send Copy of Admin GV Mail Emails To - Status', 'SEND_EXTRA_GV_ADMIN_EMAILS_TO_STATUS', '0', 'Send copy of Admin GV Mail Status<br />0= off 1= on', 12, 19, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (276, 'Send Copy of Customer Admin GV Mail Emails To', 'SEND_EXTRA_GV_ADMIN_EMAILS_TO', 'service@taoxieyoua.com', 'Send copy of Admin GV Mail emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 20, '2009-03-25 16:20:59', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (277, 'Send Copy of Admin Discount Coupon Mail Emails To - Status', 'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO_STATUS', '0', 'Send copy of Admin Discount Coupon Mail Status<br />0= off 1= on', 12, 21, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (278, 'Send Copy of Customer Admin Discount Coupon Mail Emails To', 'SEND_EXTRA_DISCOUNT_COUPON_ADMIN_EMAILS_TO', 'service@taoxieyoua.com', 'Send copy of Admin Discount Coupon Mail emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 22, '2009-03-25 16:21:06', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (279, 'Send Copy of Admin Orders Status Emails To - Status', 'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO_STATUS', '0', 'Send copy of Admin Orders Status Status<br />0= off 1= on', 12, 23, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (280, 'Send Copy of Admin Orders Status Emails To', 'SEND_EXTRA_ORDERS_STATUS_ADMIN_EMAILS_TO', 'service@taoxieyoua.com', 'Send copy of Admin Orders Status emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 24, '2009-03-25 16:21:14', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (281, 'Send Notice of Pending Reviews Emails To - Status', 'SEND_EXTRA_REVIEW_NOTIFICATION_EMAILS_TO_STATUS', '0', 'Send copy of Pending Reviews Status<br />0= off 1= on', 12, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (282, 'Send Notice of Pending Reviews Emails To', 'SEND_EXTRA_REVIEW_NOTIFICATION_EMAILS_TO', 'jdifuwr3434@gmail.com', 'Send copy of Pending Reviews emails to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 26, '2009-06-19 15:16:51', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (283, 'Set "Contact Us" Email Dropdown List', 'CONTACT_US_LIST', 'service<jdifuwr3434@gmail.com>,', 'On the "Contact Us" Page, set the list of email addresses , in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 40, '2009-06-19 15:17:14', '2008-07-20 12:06:18', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (284, 'Allow Guest To Tell A Friend', 'ALLOW_GUEST_TO_TELL_A_FRIEND', 'false', 'Allow guests to tell a friend about a product. <br />If set to [false], then tell-a-friend will prompt for login if user is not already logged in.', 12, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (285, 'Contact Us - Show Store Name and Address', 'CONTACT_US_STORE_NAME_ADDRESS', '1', 'Include Store Name and Address<br />0= off 1= on', 12, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (286, 'Send Low Stock Emails', 'SEND_LOWSTOCK_EMAIL', '0', 'When stock level is at or below low stock level send an email<br />0= off<br />1= on', 12, 60, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (287, 'Send Low Stock Emails To', 'SEND_EXTRA_LOW_STOCK_EMAILS_TO', 'service<jdifuwr3434@gmail.com>,', 'When stock level is at or below low stock level send an email to this address, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 61, '2009-06-19 15:17:04', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (288, 'Display "Newsletter Unsubscribe" Link?', 'SHOW_NEWSLETTER_UNSUBSCRIBE_LINK', 'true', 'Show "Newsletter Unsubscribe" link in the "Information" side-box?', 12, 70, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (289, 'Audience-Select Count Display', 'AUDIENCE_SELECT_DISPLAY_COUNTS', 'true', 'When displaying lists of available audiences/recipients, should the recipients-count be included? <br /><em>(This may make things slower if you have a lot of customers or complex audience queries)</em>', 12, 90, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (290, 'Enable Downloads', 'DOWNLOAD_ENABLED', 'true', 'Enable the products download functions.', 13, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (291, 'Download by Redirect', 'DOWNLOAD_BY_REDIRECT', 'true', 'Use browser redirection for download. Disable on non-Unix systems.<br /><br />Note: Set /pub to 777 when redirect is true', 13, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (292, 'Download by streaming', 'DOWNLOAD_IN_CHUNKS', 'false', 'If download-by-redirect is disabled, and your PHP memory_limit setting is under 8 MB, you might need to enable this setting so that files are streamed in smaller segments to the browser.<br /><br />Has no effect if Download By Redirect is enabled.', 13, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (293, 'Download Expiration (Number of Days)', 'DOWNLOAD_MAX_DAYS', '7', 'Set number of days before the download link expires. 0 means no limit.', 13, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (294, 'Number of Downloads Allowed - Per Product', 'DOWNLOAD_MAX_COUNT', '5', 'Set the maximum number of downloads. 0 means no download authorized.', 13, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (295, 'Downloads Controller Update Status Value', 'DOWNLOADS_ORDERS_STATUS_UPDATED_VALUE', '4', 'What orders_status resets the Download days and Max Downloads - Default is 4', 13, 10, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (296, 'Downloads Controller Order Status Value >= lower value', 'DOWNLOADS_CONTROLLER_ORDERS_STATUS', '2', 'Downloads Controller Order Status Value - Default >= 2<br /><br />Downloads are available for checkout based on the orders status. Orders with orders status greater than this value will be available for download. The orders status is set for an order by the Payment Modules. Set the lower range for this range.', 13, 12, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (297, 'Downloads Controller Order Status Value <= upper value', 'DOWNLOADS_CONTROLLER_ORDERS_STATUS_END', '4', 'Downloads Controller Order Status Value - Default <= 4<br /><br />Downloads are available for checkout based on the orders status. Orders with orders status less than this value will be available for download. The orders status is set for an order by the Payment Modules.  Set the upper range for this range.', 13, 13, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (298, 'Enable Price Factor', 'ATTRIBUTES_ENABLED_PRICE_FACTOR', 'true', 'Enable the Attributes Price Factor.', 13, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (299, 'Enable Qty Price Discount', 'ATTRIBUTES_ENABLED_QTY_PRICES', 'true', 'Enable the Attributes Quantity Price Discounts.', 13, 26, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (300, 'Enable Attribute Images', 'ATTRIBUTES_ENABLED_IMAGES', 'true', 'Enable the Attributes Images.', 13, 28, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (301, 'Enable Text Pricing by word or letter', 'ATTRIBUTES_ENABLED_TEXT_PRICES', 'true', 'Enable the Attributes Text Pricing by word or letter.', 13, 35, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (302, 'Text Pricing - Spaces are Free', 'TEXT_SPACES_FREE', '1', 'On Text pricing Spaces are Free<br /><br />0= off 1= on', 13, 36, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (303, 'Read Only option type - Ignore for Add to Cart', 'PRODUCTS_OPTIONS_TYPE_READONLY_IGNORED', '1', 'When a Product only uses READONLY attributes, should the Add to Cart button be On or Off?<br />0= OFF<br />1= ON', 13, 37, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (304, 'Enable GZip Compression', 'GZIP_LEVEL', '1', '0= off 1= on', 14, 1, '2009-08-05 13:42:05', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (305, 'Session Directory', 'SESSION_WRITE_DIRECTORY', 'D:/AppServ/www/mazentop0803/cache', 'If sessions are file based, store them in this directory.', 15, 1, '2010-12-21 10:38:45', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (306, 'Cookie Domain', 'SESSION_USE_FQDN', 'True', 'If True the full domain name will be used to store the cookie, e.g. www.mydomain.com. If False only a partial domain name will be used, e.g. mydomain.com. If you are unsure about this, always leave set to true.', 15, 2, '2009-06-18 10:04:54', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (307, 'Force Cookie Use', 'SESSION_FORCE_COOKIE_USE', 'False', 'Force the use of sessions when cookies are only enabled.', 15, 2, '2009-06-12 17:08:06', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (308, 'Check SSL Session ID', 'SESSION_CHECK_SSL_SESSION_ID', 'False', 'Validate the SSL_SESSION_ID on every secure HTTPS page request.', 15, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (309, 'Check User Agent', 'SESSION_CHECK_USER_AGENT', 'False', 'Validate the clients browser user agent on every page request.', 15, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (310, 'Check IP Address', 'SESSION_CHECK_IP_ADDRESS', 'False', 'Validate the clients IP address on every page request.', 15, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (311, 'Prevent Spider Sessions', 'SESSION_BLOCK_SPIDERS', 'True', 'Prevent known spiders from starting a session.', 15, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (312, 'Recreate Session', 'SESSION_RECREATE', 'True', 'Recreate the session to generate a new session ID when the customer logs on or creates an account (PHP >=4.1 needed).', 15, 7, '2009-06-18 16:48:26', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (313, 'IP to Host Conversion Status', 'SESSION_IP_TO_HOST_ADDRESS', 'false', 'Convert IP Address to Host Address<br /><br />Note: on some servers this can slow down the initial start of a session or execution of Emails', 15, 10, '2009-06-09 09:53:31', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (314, 'Length of the redeem code', 'SECURITY_CODE_LENGTH', '10', 'Enter the length of the redeem code<br />The longer the more secure', 16, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (315, 'Default Order Status For Zero Balance Orders', 'DEFAULT_ZERO_BALANCE_ORDERS_STATUS_ID', '2', 'When an order''s balance is zero, this order status will be assigned to it.', 16, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (316, 'New Signup Discount Coupon ID#', 'NEW_SIGNUP_DISCOUNT_COUPON', '', 'Select the coupon<br />', 16, 75, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_coupon_id(');
INSERT INTO `configuration` VALUES (317, 'New Signup Gift Voucher Amount', 'NEW_SIGNUP_GIFT_VOUCHER_AMOUNT', '', 'Leave blank for none<br />Or enter an amount ie. 10 for $10.00', 16, 76, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (318, 'Maximum Discount Coupons Per Page', 'MAX_DISPLAY_SEARCH_RESULTS_DISCOUNT_COUPONS', '20', 'Number of Discount Coupons to list per Page', 16, 81, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (319, 'Maximum Discount Coupon Report Results Per Page', 'MAX_DISPLAY_SEARCH_RESULTS_DISCOUNT_COUPONS_REPORTS', '20', 'Number of Discount Coupons to list on Reports Page', 16, 81, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (320, 'Credit Card Enable Status - VISA', 'CC_ENABLED_VISA', '1', 'Accept VISA 0= off 1= on', 17, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (321, 'Credit Card Enable Status - MasterCard', 'CC_ENABLED_MC', '1', 'Accept MasterCard 0= off 1= on', 17, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (322, 'Credit Card Enable Status - AmericanExpress', 'CC_ENABLED_AMEX', '0', 'Accept AmericanExpress 0= off 1= on', 17, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (323, 'Credit Card Enable Status - Diners Club', 'CC_ENABLED_DINERS_CLUB', '0', 'Accept Diners Club 0= off 1= on', 17, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (324, 'Credit Card Enable Status - Discover Card', 'CC_ENABLED_DISCOVER', '0', 'Accept Discover Card 0= off 1= on', 17, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (325, 'Credit Card Enable Status - JCB', 'CC_ENABLED_JCB', '0', 'Accept JCB 0= off 1= on', 17, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (326, 'Credit Card Enable Status - AUSTRALIAN BANKCARD', 'CC_ENABLED_AUSTRALIAN_BANKCARD', '0', 'Accept AUSTRALIAN BANKCARD 0= off 1= on', 17, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (327, 'Credit Card Enable Status - SOLO', 'CC_ENABLED_SOLO', '0', 'Accept SOLO Card 0= off 1= on', 17, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (328, 'Credit Card Enable Status - Switch', 'CC_ENABLED_SWITCH', '0', 'Accept SWITCH Card 0= off 1= on', 17, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (329, 'Credit Card Enable Status - Maestro', 'CC_ENABLED_MAESTRO', '0', 'Accept MAESTRO Card 0= off 1= on', 17, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (330, 'Credit Card Enabled - Show on Payment', 'SHOW_ACCEPTED_CREDIT_CARDS', '0', 'Show accepted credit cards on Payment page?<br />0= off<br />1= As Text<br />2= As Images<br /><br />Note: images and text must be defined in both the database and language file for specific credit card types.', 17, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (331, 'This module is installed', 'MODULE_ORDER_TOTAL_GV_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', 'zen_cfg_select_option(array(''true''),');
INSERT INTO `configuration` VALUES (332, 'Sort Order', 'MODULE_ORDER_TOTAL_GV_SORT_ORDER', '840', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', '');
INSERT INTO `configuration` VALUES (333, 'Queue Purchases', 'MODULE_ORDER_TOTAL_GV_QUEUE', 'true', 'Do you want to queue purchases of the Gift Voucher?', 6, 3, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (334, 'Include Shipping', 'MODULE_ORDER_TOTAL_GV_INC_SHIPPING', 'true', 'Include Shipping in calculation', 6, 5, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (335, 'Include Tax', 'MODULE_ORDER_TOTAL_GV_INC_TAX', 'true', 'Include Tax in calculation.', 6, 6, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (336, 'Re-calculate Tax', 'MODULE_ORDER_TOTAL_GV_CALC_TAX', 'None', 'Re-Calculate Tax', 6, 7, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', 'zen_cfg_select_option(array(''None'', ''Standard'', ''Credit Note''),');
INSERT INTO `configuration` VALUES (337, 'Tax Class', 'MODULE_ORDER_TOTAL_GV_TAX_CLASS', '0', 'Use the following tax class when treating Gift Voucher as Credit Note.', 6, 0, '0000-00-00 00:00:00', '2003-10-30 22:16:40', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (338, 'Credit including Tax', 'MODULE_ORDER_TOTAL_GV_CREDIT_TAX', 'false', 'Add tax to purchased Gift Voucher when crediting to Account', 6, 8, '0000-00-00 00:00:00', '2003-10-30 22:16:40', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (339, 'Set Order Status', 'MODULE_ORDER_TOTAL_GV_ORDER_STATUS_ID', '0', 'Set the status of orders made where GV covers full payment', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (1328, 'Enable Autoresponder', 'AUTO_ENABLE_AUTORESPONDER', 'false', '<br />Enable Autoresponder', 48, 1, '2009-03-25 13:54:58', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1329, 'Enable Preset (1)', 'AUTO_ENABLE_PRESET', 'false', '<br />Enable email preset #1', 48, 2, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1330, 'Mode (1)', 'AUTO_MODE', 'test', '<br />Set mode <p />When in test mode, emails will be sent to store owner instead', 48, 3, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''test'', ''live''), ');
INSERT INTO `configuration` VALUES (1331, 'Query (1)', 'AUTO_STATE', 'order', '<br />Set query <p />Choose <b>order</b> for post-order emailing <p />Choose <b>account</b> for emailing all account creating customers<p />Choose <b>account-no-order</b> for emailing customers who have created an account but never ordered', 48, 4, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''order'', ''account'', ''account-no-order''), ');
INSERT INTO `configuration` VALUES (1321, 'Generate Products Currency', 'RSS_PRODUCTS_CURRENCY', 'true', 'Generate Products Currency (extended tag &lt;g:currency&gt;)', 47, 95, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1322, 'Generate Products Quantity', 'RSS_PRODUCTS_QUANTITY', 'true', 'Generate Products Quantity (extended tag &lt;g:quantity&gt;)', 47, 96, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1270, 'Only registered customers may submit a Link', 'REGISTERED_LINK', 'false', 'Only registered customers may submit a Link', 46, 25, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1271, 'Define Links Status', 'DEFINE_LINKS_STATUS', '1', 'Enable the Defined Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 999, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (349, 'This module is installed', 'MODULE_ORDER_TOTAL_SHIPPING_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2003-10-30 22:16:46', '', 'zen_cfg_select_option(array(''true''),');
INSERT INTO `configuration` VALUES (350, 'Sort Order', 'MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER', '200', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2003-10-30 22:16:46', '', '');
INSERT INTO `configuration` VALUES (351, 'Allow Free Shipping', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING', 'false', 'Do you want to allow free shipping?', 6, 3, '0000-00-00 00:00:00', '2003-10-30 22:16:46', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (352, 'Free Shipping For Orders Over', 'MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER', '50', 'Provide free shipping for orders over the set amount.', 6, 4, '0000-00-00 00:00:00', '2003-10-30 22:16:46', 'currencies->format', '');
INSERT INTO `configuration` VALUES (353, 'Provide Free Shipping For Orders Made', 'MODULE_ORDER_TOTAL_SHIPPING_DESTINATION', 'national', 'Provide free shipping for orders sent to the set destination.', 6, 5, '0000-00-00 00:00:00', '2003-10-30 22:16:46', '', 'zen_cfg_select_option(array(''national'', ''international'', ''both''),');
INSERT INTO `configuration` VALUES (354, 'This module is installed', 'MODULE_ORDER_TOTAL_SUBTOTAL_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2003-10-30 22:16:49', '', 'zen_cfg_select_option(array(''true''),');
INSERT INTO `configuration` VALUES (355, 'Sort Order', 'MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER', '100', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2003-10-30 22:16:49', '', '');
INSERT INTO `configuration` VALUES (356, 'This module is installed', 'MODULE_ORDER_TOTAL_TAX_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2003-10-30 22:16:52', '', 'zen_cfg_select_option(array(''true''),');
INSERT INTO `configuration` VALUES (357, 'Sort Order', 'MODULE_ORDER_TOTAL_TAX_SORT_ORDER', '300', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2003-10-30 22:16:52', '', '');
INSERT INTO `configuration` VALUES (358, 'This module is installed', 'MODULE_ORDER_TOTAL_TOTAL_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2003-10-30 22:16:55', '', 'zen_cfg_select_option(array(''true''),');
INSERT INTO `configuration` VALUES (359, 'Sort Order', 'MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER', '999', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2003-10-30 22:16:55', '', '');
INSERT INTO `configuration` VALUES (360, 'Tax Class', 'MODULE_ORDER_TOTAL_COUPON_TAX_CLASS', '0', 'Use the following tax class when treating Discount Coupon as Credit Note.', 6, 0, '0000-00-00 00:00:00', '2003-10-30 22:16:36', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (361, 'Include Tax', 'MODULE_ORDER_TOTAL_COUPON_INC_TAX', 'false', 'Include Tax in calculation.', 6, 6, '0000-00-00 00:00:00', '2003-10-30 22:16:36', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (362, 'Sort Order', 'MODULE_ORDER_TOTAL_COUPON_SORT_ORDER', '280', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2003-10-30 22:16:36', '', '');
INSERT INTO `configuration` VALUES (363, 'Include Shipping', 'MODULE_ORDER_TOTAL_COUPON_INC_SHIPPING', 'true', 'Include Shipping in calculation', 6, 5, '0000-00-00 00:00:00', '2003-10-30 22:16:36', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (364, 'This module is installed', 'MODULE_ORDER_TOTAL_COUPON_STATUS', 'true', '', 6, 1, '0000-00-00 00:00:00', '2003-10-30 22:16:36', '', 'zen_cfg_select_option(array(''true''),');
INSERT INTO `configuration` VALUES (365, 'Re-calculate Tax', 'MODULE_ORDER_TOTAL_COUPON_CALC_TAX', 'Standard', 'Re-Calculate Tax', 6, 7, '0000-00-00 00:00:00', '2003-10-30 22:16:36', '', 'zen_cfg_select_option(array(''None'', ''Standard'', ''Credit Note''),');
INSERT INTO `configuration` VALUES (366, 'Admin Demo Status', 'ADMIN_DEMO', '0', 'Admin Demo should be on?<br />0= off 1= on', 6, 0, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (368, 'Text product option type', 'PRODUCTS_OPTIONS_TYPE_TEXT', '1', 'Numeric value of the text product option type', 6, 0, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (369, 'Radio button product option type', 'PRODUCTS_OPTIONS_TYPE_RADIO', '2', 'Numeric value of the radio button product option type', 6, 0, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (370, 'Check box product option type', 'PRODUCTS_OPTIONS_TYPE_CHECKBOX', '3', 'Numeric value of the check box product option type', 6, 0, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (371, 'File product option type', 'PRODUCTS_OPTIONS_TYPE_FILE', '4', 'Numeric value of the file product option type', 6, 0, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (372, 'ID for text and file products options values', 'PRODUCTS_OPTIONS_VALUES_TEXT_ID', '0', 'Numeric value of the products_options_values_id used by the text and file attributes.', 6, 0, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (545, 'Display the thumbnail.', 'QUICKUPDATES_DISPLAY_THUMBNAIL', 'true', 'Enable/Disable the products thumbnail displaying', 31, 2, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (544, 'Display the ID.', 'QUICKUPDATES_DISPLAY_ID', 'true', 'Enable/Disable the products id displaying', 31, 1, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (375, 'Read Only option type', 'PRODUCTS_OPTIONS_TYPE_READONLY', '5', 'Numeric value of the file product option type', 6, 0, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (376, 'Products Info - Products Option Name Sort Order', 'PRODUCTS_OPTIONS_SORT_ORDER', '0', 'Sort order of Option Names for Products Info<br />0= Sort Order, Option Name<br />1= Option Name', 18, 35, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (377, 'Products Info - Product Option Value of Attributes Sort Order', 'PRODUCTS_OPTIONS_SORT_BY_PRICE', '1', 'Sort order of Product Option Values of Attributes for Products Info<br />0= Sort Order, Price<br />1= Sort Order, Option Value Name', 18, 36, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (378, 'Product Info - Show Option Values Name Below Attributes Image', 'PRODUCT_IMAGES_ATTRIBUTES_NAMES', '1', 'Product Info - Show the name of the Option Value beneath the Attribute Image?<br />0= off 1= on', 18, 41, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (379, 'Product Info - Show Sales Discount Savings Status', 'SHOW_SALE_DISCOUNT_STATUS', '1', 'Product Info - Show the amount of discount savings?<br />0= off 1= on', 18, 45, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (380, 'Product Info - Show Sales Discount Savings Dollars or Percentage', 'SHOW_SALE_DISCOUNT', '1', 'Product Info - Show the amount of discount savings display as:<br />1= % off 2= $amount off', 18, 46, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''1'', ''2''), ');
INSERT INTO `configuration` VALUES (381, 'Product Info - Show Sales Discount Savings Percentage Decimals', 'SHOW_SALE_DISCOUNT_DECIMALS', '0', 'Product Info - Show discount savings display as a Percentage with how many decimals?:<br />Default= 0', 18, 47, '2009-02-21 02:27:03', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (382, 'Product Info - Price is Free Image or Text Status', 'OTHER_IMAGE_PRICE_IS_FREE_ON', '1', 'Product Info - Show the Price is Free Image or Text on Displayed Price<br />0= Text<br />1= Image', 18, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (383, 'Product Info - Price is Call for Price Image or Text Status', 'PRODUCTS_PRICE_IS_CALL_IMAGE_ON', '1', 'Product Info - Show the Price is Call for Price Image or Text on Displayed Price<br />0= Text<br />1= Image', 18, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (384, 'Product Quantity Box Status - Adding New Products', 'PRODUCTS_QTY_BOX_STATUS', '1', 'What should the Default Quantity Box Status be set to when adding New Products?<br /><br />0= off<br />1= on<br />NOTE: This will show a Qty Box when ON and default the Add to Cart to 1', 18, 55, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (385, 'Product Reviews Require Approval', 'REVIEWS_APPROVAL', '1', 'Do product reviews require approval?<br /><br />Note: When Review Status is off, it will also not show<br /><br />0= off 1= on', 18, 62, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (386, 'Meta Tags - Include Product Model in Title', 'META_TAG_INCLUDE_MODEL', '1', 'Do you want to include the Product Model in the Meta Tag Title?<br /><br />0= off 1= on', 18, 69, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (387, 'Meta Tags - Include Product Price in Title', 'META_TAG_INCLUDE_PRICE', '1', 'Do you want to include the Product Price in the Meta Tag Title?<br /><br />0= off 1= on', 18, 70, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (388, 'Meta Tags Generated Description Maximum Length?', 'MAX_META_TAG_DESCRIPTION_LENGTH', '50', 'Set Generated Meta Tag Description Maximum Length to (words) Default 50:', 18, 71, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (389, 'Also Purchased Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS', '3', 'Also Purchased Products Columns per Row<br />0= off or set the sort order', 18, 72, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12''), ');
INSERT INTO `configuration` VALUES (390, 'Previous Next - Navigation Bar Position', 'PRODUCT_INFO_PREVIOUS_NEXT', '1', 'Location of Previous/Next Navigation Bar<br />0= off<br />1= Top of Page<br />2= Bottom of Page<br />3= Both Top and Bottom of Page', 18, 21, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''Top of Page''), array(''id''=>''2'', ''text''=>''Bottom of Page''), array(''id''=>''3'', ''text''=>''Both Top & Bottom of Page'')),');
INSERT INTO `configuration` VALUES (391, 'Previous Next - Sort Order', 'PRODUCT_INFO_PREVIOUS_NEXT_SORT', '1', 'Products Display Order by<br />0= Product ID<br />1= Product Name<br />2= Model<br />3= Price, Product Name<br />4= Price, Model<br />5= Product Name, Model<br />6= Product Sort Order', 18, 22, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Product ID''), array(''id''=>''1'', ''text''=>''Name''), array(''id''=>''2'', ''text''=>''Product Model''), array(''id''=>''3'', ''text''=>''Product Price - Name''), array(''id''=>''4'', ''text''=>''Product Price - Model''), array(''id''=>''5'', ''text''=>''Product Name - Model''), array(''id''=>''6'', ''text''=>''Product Sort Order'')),');
INSERT INTO `configuration` VALUES (392, 'Previous Next - Button and Image Status', 'SHOW_PREVIOUS_NEXT_STATUS', '0', 'Button and Product Image status settings are:<br />0= Off<br />1= On', 18, 20, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''On'')),');
INSERT INTO `configuration` VALUES (393, 'Previous Next - Button and Image Settings', 'SHOW_PREVIOUS_NEXT_IMAGES', '0', 'Show Previous/Next Button and Product Image Settings<br />0= Button Only<br />1= Button and Product Image<br />2= Product Image Only', 18, 21, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Button Only''), array(''id''=>''1'', ''text''=>''Button and Product Image''), array(''id''=>''2'', ''text''=>''Product Image Only'')),');
INSERT INTO `configuration` VALUES (394, 'Previous Next - Image Width?', 'PREVIOUS_NEXT_IMAGE_WIDTH', '50', 'Previous/Next Image Width?', 18, 22, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (395, 'Previous Next - Image Height?', 'PREVIOUS_NEXT_IMAGE_HEIGHT', '40', 'Previous/Next Image Height?', 18, 23, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', '');
INSERT INTO `configuration` VALUES (396, 'Previous Next - Navigation Includes Category Position', 'PRODUCT_INFO_CATEGORIES', '1', 'Product''s Category Image and Name Alignment Above Previous/Next Navigation Bar<br />0= off<br />1= Align Left<br />2= Align Center<br />3= Align Right', 18, 20, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''Align Left''), array(''id''=>''2'', ''text''=>''Align Center''), array(''id''=>''3'', ''text''=>''Align Right'')),');
INSERT INTO `configuration` VALUES (397, 'Previous Next - Navigation Includes Category Name and Image Status', 'PRODUCT_INFO_CATEGORIES_IMAGE_STATUS', '2', 'Product''s Category Image and Name Status<br />0= Category Name and Image always shows<br />1= Category Name only<br />2= Category Name and Image when not blank', 18, 20, '2008-07-20 12:06:18', '2008-07-20 12:06:18', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Category Name and Image Always''), array(''id''=>''1'', ''text''=>''Category Name only''), array(''id''=>''2'', ''text''=>''Category Name and Image when not blank'')),');
INSERT INTO `configuration` VALUES (398, 'Column Width - Left Boxes', 'BOX_WIDTH_LEFT', '184px', 'Width of the Left Column Boxes<br />px may be included<br />Default = 150px', 19, 1, '2008-07-24 13:40:45', '2003-11-21 22:16:36', '', '');
INSERT INTO `configuration` VALUES (399, 'Column Width - Right Boxes', 'BOX_WIDTH_RIGHT', '150px', 'Width of the Right Column Boxes<br />px may be included<br />Default = 150px', 19, 2, '0000-00-00 00:00:00', '2003-11-21 22:16:36', '', '');
INSERT INTO `configuration` VALUES (400, 'Bread Crumbs Navigation Separator', 'BREAD_CRUMBS_SEPARATOR', '&nbsp;>&nbsp;', 'Enter the separator symbol to appear between the Navigation Bread Crumb trail<br />Note: Include spaces with the &amp;nbsp; symbol if you want them part of the separator.<br />Default = &amp;nbsp;::&amp;nbsp;', 19, 3, '2008-07-25 20:55:16', '2003-11-21 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (401, 'Define Breadcrumb Status', 'DEFINE_BREADCRUMB_STATUS', '2', 'Enable the Breadcrumb Trail Links?<br />0= OFF<br />1= ON<br />2= Off for Home Page Only', 19, 4, '2008-07-26 12:44:08', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (402, 'Bestsellers - Number Padding', 'BEST_SELLERS_FILLER', '&nbsp;', 'What do you want to Pad the numbers with?<br />Default = &amp;nbsp;', 19, 5, '0000-00-00 00:00:00', '2003-11-21 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (403, 'Bestsellers - Truncate Product Names', 'BEST_SELLERS_TRUNCATE', '35', 'What size do you want to truncate the Product Names?<br />Default = 35', 19, 6, '0000-00-00 00:00:00', '2003-11-21 22:16:36', '', '');
INSERT INTO `configuration` VALUES (404, 'Bestsellers - Truncate Product Names followed by ...', 'BEST_SELLERS_TRUNCATE_MORE', 'true', 'When truncated Product Names follow with ...<br />Default = true', 19, 7, '2003-03-21 13:08:25', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (405, 'Categories Box - Show Specials Link', 'SHOW_CATEGORIES_BOX_SPECIALS', 'false', 'Show Specials Link in the Categories Box', 19, 8, '2008-07-24 13:48:08', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (406, 'Categories Box - Show Products New Link', 'SHOW_CATEGORIES_BOX_PRODUCTS_NEW', 'false', 'Show Products New Link in the Categories Box', 19, 9, '2008-07-24 13:48:14', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (407, 'Shopping Cart Box Status', 'SHOW_SHOPPING_CART_BOX_STATUS', '1', 'Shopping Cart Shows<br />0= Always<br />1= Only when full<br />2= Only when full but not when viewing the Shopping Cart', 19, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:18', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (408, 'Categories Box - Show Featured Products Link', 'SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS', 'false', 'Show Featured Products Link in the Categories Box', 19, 11, '2008-07-24 13:48:20', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (409, 'Categories Box - Show Products All Link', 'SHOW_CATEGORIES_BOX_PRODUCTS_ALL', 'false', 'Show Products All Link in the Categories Box', 19, 12, '2008-07-24 13:48:23', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (410, 'Column Left Status - Global', 'COLUMN_LEFT_STATUS', '1', 'Show Column Left, unless page override exists?<br />0= Column Left is always off<br />1= Column Left is on, unless page override', 19, 15, '2010-04-09 14:03:49', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (411, 'Column Right Status - Global', 'COLUMN_RIGHT_STATUS', '1', 'Show Column Right, unless page override exists?<br />0= Column Right is always off<br />1= Column Right is on, unless page override', 19, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (412, 'Column Width - Left', 'COLUMN_WIDTH_LEFT', '190px', 'Width of the Left Column<br />px may be included<br />Default = 150px', 19, 20, '2008-07-24 13:41:37', '2003-11-21 22:16:36', '', '');
INSERT INTO `configuration` VALUES (413, 'Column Width - Right', 'COLUMN_WIDTH_RIGHT', '150px', 'Width of the Right Column<br />px may be included<br />Default = 150px', 19, 21, '0000-00-00 00:00:00', '2003-11-21 22:16:36', '', '');
INSERT INTO `configuration` VALUES (414, 'Categories Separator between links Status', 'SHOW_CATEGORIES_SEPARATOR_LINK', '1', 'Show Category Separator between Category Names and Links?<br />0= off<br />1= on', 19, 24, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (415, 'Categories Separator between the Category Name and Count', 'CATEGORIES_SEPARATOR', '-&gt;', 'What separator do you want between the Category name and the count?<br />Default = -&amp;gt;', 19, 25, '0000-00-00 00:00:00', '2003-11-21 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (416, 'Categories Separator between the Category Name and Sub Categories', 'CATEGORIES_SEPARATOR_SUBS', '|_&nbsp;', 'What separator do you want between the Category name and Sub Category Name?<br />Default = |_&amp;nbsp;', 19, 26, '0000-00-00 00:00:00', '2004-03-25 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (417, 'Categories Count Prefix', 'CATEGORIES_COUNT_PREFIX', '&nbsp;(', 'What do you want to Prefix the count with?<br />Default= (', 19, 27, '0000-00-00 00:00:00', '2003-01-21 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (418, 'Categories Count Suffix', 'CATEGORIES_COUNT_SUFFIX', ')', 'What do you want as a Suffix to the count?<br />Default= )', 19, 28, '0000-00-00 00:00:00', '2003-01-21 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (419, 'Categories SubCategories Indent', 'CATEGORIES_SUBCATEGORIES_INDENT', '&nbsp;&nbsp;', 'What do you want to use as the subcategories indent?<br />Default= &nbsp;&nbsp;', 19, 29, '0000-00-00 00:00:00', '2004-06-24 22:16:36', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (420, 'Categories with 0 Products Status', 'CATEGORIES_COUNT_ZERO', '0', 'Show Category Count for 0 Products?<br />0= off<br />1= on', 19, 30, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (421, 'Split Categories Box', 'CATEGORIES_SPLIT_DISPLAY', 'True', 'Split the categories box display by product type', 19, 31, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (422, 'Shopping Cart - Show Totals', 'SHOW_TOTALS_IN_CART', '1', 'Show Totals Above Shopping Cart?<br />0= off<br />1= on: Items Weight Amount<br />2= on: Items Weight Amount, but no weight when 0<br />3= on: Items Amount', 19, 31, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (423, 'Customer Greeting - Show on Index Page', 'SHOW_CUSTOMER_GREETING', '0', 'Always Show Customer Greeting on Index?<br />0= off<br />1= on', 19, 40, '2008-07-27 11:33:22', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (424, 'Categories - Always Show on Main Page', 'SHOW_CATEGORIES_ALWAYS', '1', 'Always Show Categories on Main Page<br />0= off<br />1= on<br />Default category can be set to Top Level or a Specific Top Level', 19, 45, '2009-09-07 13:50:22', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (425, 'Main Page - Opens with Category', 'CATEGORIES_START_MAIN', '0', '0= Top Level Categories<br />Or enter the Category ID#<br />Note: Sub Categories can also be used Example: 3_10', 19, 46, '2008-07-27 11:52:03', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (426, 'Categories - Always Open to Show SubCategories', 'SHOW_CATEGORIES_SUBCATEGORIES_ALWAYS', '0', 'Always Show Categories and SubCategories<br />0= off, just show Top Categories<br />1= on, Always show Categories and SubCategories when selected', 19, 47, '2009-09-07 13:52:06', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (427, 'Banner Display Groups - Header Position 1', 'SHOW_BANNERS_GROUP_SET1', 'banner1', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Header Position 1?<br />Leave blank for none', 19, 55, '2010-07-26 15:05:38', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (428, 'Banner Display Groups - Header Position 2', 'SHOW_BANNERS_GROUP_SET2', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Header Position 2?<br />Leave blank for none', 19, 56, '2010-07-26 15:05:28', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (429, 'Banner Display Groups - Header Position 3', 'SHOW_BANNERS_GROUP_SET3', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Header Position 3?<br />Leave blank for none', 19, 57, '2008-08-29 10:50:51', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (430, 'Banner Display Groups - Footer Position 1', 'SHOW_BANNERS_GROUP_SET4', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Footer Position 1?<br />Leave blank for none', 19, 65, '2008-08-29 10:51:32', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (431, 'Banner Display - Index Categories - Footer', 'SHOW_BANNERS_GROUP_SET5', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Footer Position 2?<br />Leave blank for none', 19, 66, '2010-06-26 15:36:04', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (432, 'Banner Display Groups - Footer Position 3', 'SHOW_BANNERS_GROUP_SET6', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br /><br />Default Group is Wide-Banners<br /><br />What Banner Group(s) do you want to use in the Footer Position 3?<br />Leave blank for none', 19, 67, '2008-08-29 10:59:57', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (433, 'Banner Display Groups - Side Box banner_box', 'SHOW_BANNERS_GROUP_SET7', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br />Default Group is SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Side Box - banner_box?<br />Leave blank for none', 19, 70, '2008-08-29 11:00:04', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (434, 'Banner Display Groups - Side Box banner_box2', 'SHOW_BANNERS_GROUP_SET8', '', 'The Banner Display Groups can be from 1 Banner Group or Multiple Banner Groups<br /><br />For Multiple Banner Groups enter the Banner Group Name separated by a colon <strong>:</strong><br /><br />Example: Wide-Banners:SideBox-Banners<br />Default Group is SideBox-Banners<br /><br />What Banner Group(s) do you want to use in the Side Box - banner_box2?<br />Leave blank for none', 19, 71, '2008-08-29 11:00:10', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (435, 'Banner Display Group - Side Box banner_box_all', 'SHOW_BANNERS_GROUP_SET_ALL', '', 'The Banner Display Group may only be from one (1) Banner Group for the Banner All sidebox<br /><br />Default Group is BannersAll<br /><br />What Banner Group do you want to use in the Side Box - banner_box_all?<br />Leave blank for none', 19, 72, '2010-06-26 15:36:12', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (436, 'Footer - Show IP Address status', 'SHOW_FOOTER_IP', '0', 'Show Customer IP Address in the Footer<br />0= off<br />1= on<br />Should the Customer IP Address show in the footer?', 19, 80, '2008-07-24 13:43:04', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (437, 'Product Discount Quantities - Add how many blank discounts?', 'DISCOUNT_QTY_ADD', '5', 'How many blank discount quantities should be added for Product Pricing?', 19, 90, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (438, 'Product Discount Quantities - Display how many per row?', 'DISCOUNT_QUANTITY_PRICES_COLUMN', '5', 'How many discount quantities should show per row on Product Info Pages?', 19, 95, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (439, 'Categories/Products Display Sort Order', 'CATEGORIES_PRODUCTS_SORT_ORDER', '6', 'Categories/Products Display Sort Order<br />0= Categories/Products Sort Order/Name<br />1= Categories/Products Name<br />2= Products Model<br />3= Products Qty+, Products Name<br />4= Products Qty-, Products Name<br />5= Products Price+, Products Name<br />6= Products Price-, Products Name', 19, 100, '2008-07-28 16:53:52', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4'', ''5'', ''6''), ');
INSERT INTO `configuration` VALUES (440, 'Option Names and Values Global Add, Copy and Delete Features Status', 'OPTION_NAMES_VALUES_GLOBAL_STATUS', '1', 'Option Names and Values Global Add, Copy and Delete Features Status<br />0= Hide Features<br />1= Show Features<br />2= Products Model', 19, 110, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (441, 'Categories-Tabs Menu ON/OFF', 'CATEGORIES_TABS_STATUS', '0', 'Categories-Tabs<br />This enables the display of your store''s categories as a menu across the top of your header. There are many potential creative uses for this.<br />0= Hide Categories Tabs<br />1= Show Categories Tabs', 19, 112, '2008-07-24 13:48:55', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (442, 'Site Map - include My Account Links?', 'SHOW_ACCOUNT_LINKS_ON_SITE_MAP', 'No', 'Should the links to My Account show up on the site-map?<br />Note: Spiders will try to index this page, and likely should not be sent to secure pages, since there is no benefit in indexing a login page.<br /><br />Default: false', 19, 115, '2008-07-28 15:30:49', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''Yes'', ''No''), ');
INSERT INTO `configuration` VALUES (443, 'Skip 1-prod Categories', 'SKIP_SINGLE_PRODUCT_CATEGORIES', 'True', 'Skip single-product categories<br />If this option is set to True, then if the customer clicks on a link to a category which only contains a single item, then Zen Cart will take them directly to that product-page, rather than present them with another link to click in order to see the product.<br />Default: True', 19, 120, '2008-07-28 16:53:06', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (444, 'Use split-login page', 'USE_SPLIT_LOGIN_MODE', 'False', 'The login page can be displayed in two modes: Split or Vertical.<br />In Split mode, the create-account options are accessed by clicking a button to get to the create-account page.  In Vertical mode, the create-account input fields are all displayed inline, below the login field, making one less click for the customer to create their account.<br />Default: False', 19, 121, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (445, 'CSS Buttons', 'IMAGE_USE_CSS_BUTTONS', 'Yes', 'CSS Buttons<br />Use CSS buttons instead of images (GIF/JPG)?<br />Button styles must be configured in the stylesheet if you enable this option.', 19, 147, '2008-07-24 13:42:54', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''No'', ''Yes''), ');
INSERT INTO `configuration` VALUES (446, '<strong>Down for Maintenance: ON/OFF</strong>', 'DOWN_FOR_MAINTENANCE', 'false', 'Down for Maintenance <br />(true=on false=off)', 20, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (447, 'Down for Maintenance: filename', 'DOWN_FOR_MAINTENANCE_FILENAME', 'down_for_maintenance', 'Down for Maintenance filename<br />Note: Do not include the extension<br />Default=down_for_maintenance', 20, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (448, 'Down for Maintenance: Hide Header', 'DOWN_FOR_MAINTENANCE_HEADER_OFF', 'false', 'Down for Maintenance: Hide Header <br />(true=hide false=show)', 20, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (449, 'Down for Maintenance: Hide Column Left', 'DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF', 'false', 'Down for Maintenance: Hide Column Left <br />(true=hide false=show)', 20, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (450, 'Down for Maintenance: Hide Column Right', 'DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF', 'false', 'Down for Maintenance: Hide Column Right <br />(true=hide false=show)', 20, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (451, 'Down for Maintenance: Hide Footer', 'DOWN_FOR_MAINTENANCE_FOOTER_OFF', 'false', 'Down for Maintenance: Hide Footer <br />(true=hide false=show)', 20, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (452, 'Down for Maintenance: Hide Prices', 'DOWN_FOR_MAINTENANCE_PRICES_OFF', 'false', 'Down for Maintenance: Hide Prices <br />(true=hide false=show)', 20, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (453, 'Down For Maintenance (exclude this IP-Address)', 'EXCLUDE_ADMIN_IP_FOR_MAINTENANCE', 'your IP (ADMIN)', 'This IP Address is able to access the website while it is Down For Maintenance (like webmaster)<br />To enter multiple IP Addresses, separate with a comma. If you do not know your IP Address, check in the Footer of your Shop.', 20, 8, '2003-03-21 13:43:22', '2003-03-21 21:20:07', '', '');
INSERT INTO `configuration` VALUES (454, 'NOTICE PUBLIC Before going Down for Maintenance: ON/OFF', 'WARN_BEFORE_DOWN_FOR_MAINTENANCE', 'false', 'Give a WARNING some time before you put your website Down for Maintenance<br />(true=on false=off)<br />If you set the ''Down For Maintenance: ON/OFF'' to true this will automaticly be updated to false', 20, 9, '2003-03-21 13:08:25', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (455, 'Date and hours for notice before maintenance', 'PERIOD_BEFORE_DOWN_FOR_MAINTENANCE', '15/05/2003  2-3 PM', 'Date and hours for notice before maintenance website, enter date and hours for maintenance website', 20, 10, '2003-03-21 13:08:25', '2003-03-21 11:42:47', '', '');
INSERT INTO `configuration` VALUES (456, 'Display when webmaster has enabled maintenance', 'DISPLAY_MAINTENANCE_TIME', 'false', 'Display when Webmaster has enabled maintenance <br />(true=on false=off)<br />', 20, 11, '2003-03-21 13:08:25', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (457, 'Display website maintenance period', 'DISPLAY_MAINTENANCE_PERIOD', 'false', 'Display Website maintenance period <br />(true=on false=off)<br />', 20, 12, '2003-03-21 13:08:25', '2003-03-21 11:42:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (458, 'Website maintenance period', 'TEXT_MAINTENANCE_PERIOD_TIME', '2h00', 'Enter Website Maintenance period (hh:mm)', 20, 13, '2003-03-21 13:08:25', '2003-03-21 11:42:47', '', '');
INSERT INTO `configuration` VALUES (459, 'Confirm Terms and Conditions During Checkout Procedure', 'DISPLAY_CONDITIONS_ON_CHECKOUT', 'false', 'Show the Terms and Conditions during the checkout procedure which the customer must agree to.', 11, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (460, 'Confirm Privacy Notice During Account Creation Procedure', 'DISPLAY_PRIVACY_CONDITIONS', 'false', 'Show the Privacy Notice during the account creation procedure which the customer must agree to.', 11, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (461, 'Display Product Image', 'PRODUCT_NEW_LIST_IMAGE', '1102', 'Do you want to display the Product Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (462, 'Display Product Quantity', 'PRODUCT_NEW_LIST_QUANTITY', '1202', 'Do you want to display the Product Quantity?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (463, 'Display Product Buy Now Button', 'PRODUCT_NEW_BUY_NOW', '1300', 'Do you want to display the Product Buy Now Button<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (464, 'Display Product Name', 'PRODUCT_NEW_LIST_NAME', '2101', 'Do you want to display the Product Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (465, 'Display Product Model', 'PRODUCT_NEW_LIST_MODEL', '2201', 'Do you want to display the Product Model?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (466, 'Display Product Manufacturer Name', 'PRODUCT_NEW_LIST_MANUFACTURER', '2302', 'Do you want to display the Product Manufacturer Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (467, 'Display Product Price', 'PRODUCT_NEW_LIST_PRICE', '2402', 'Do you want to display the Product Price<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (468, 'Display Product Weight', 'PRODUCT_NEW_LIST_WEIGHT', '2502', 'Do you want to display the Product Weight?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (469, 'Display Product Date Added', 'PRODUCT_NEW_LIST_DATE_ADDED', '2601', 'Do you want to display the Product Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 21, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (470, 'Display Product Description', 'PRODUCT_NEW_LIST_DESCRIPTION', '150', 'How many characters do you want to display of the Product Description?<br /><br />0= OFF<br />150= Suggested Length, or enter the maximum number of characters to display', 21, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (471, 'Display Product Display - Default Sort Order', 'PRODUCT_NEW_LIST_SORT_DEFAULT', '6', 'What Sort Order Default should be used for New Products Display?<br />Default= 6 for Date New to Old<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 21, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8''), ');
INSERT INTO `configuration` VALUES (472, 'Default Products New Group ID', 'PRODUCT_NEW_LIST_GROUP_ID', '21', 'Warning: Only change this if your Products New Group ID has changed from the default of 21<br />What is the configuration_group_id for New Products Listings?', 21, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (473, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_NEW_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 21, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (474, 'Mask Upcoming Products from being include as New Products', 'SHOW_NEW_PRODUCTS_UPCOMING_MASKED', '0', 'Do you want to mask Upcoming Products from being included as New Products in Listing, Sideboxes and Centerbox?<br />0= off<br />1= on', 21, 30, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (475, 'Display Product Image', 'PRODUCT_FEATURED_LIST_IMAGE', '1102', 'Do you want to display the Product Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (476, 'Display Product Quantity', 'PRODUCT_FEATURED_LIST_QUANTITY', '1202', 'Do you want to display the Product Quantity?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (477, 'Display Product Buy Now Button', 'PRODUCT_FEATURED_BUY_NOW', '1300', 'Do you want to display the Product Buy Now Button<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (478, 'Display Product Name', 'PRODUCT_FEATURED_LIST_NAME', '2101', 'Do you want to display the Product Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (479, 'Display Product Model', 'PRODUCT_FEATURED_LIST_MODEL', '2201', 'Do you want to display the Product Model?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (480, 'Display Product Manufacturer Name', 'PRODUCT_FEATURED_LIST_MANUFACTURER', '2302', 'Do you want to display the Product Manufacturer Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (481, 'Display Product Price', 'PRODUCT_FEATURED_LIST_PRICE', '2402', 'Do you want to display the Product Price<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (482, 'Display Product Weight', 'PRODUCT_FEATURED_LIST_WEIGHT', '2502', 'Do you want to display the Product Weight?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (483, 'Display Product Date Added', 'PRODUCT_FEATURED_LIST_DATE_ADDED', '2601', 'Do you want to display the Product Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 22, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (484, 'Display Product Description', 'PRODUCT_FEATURED_LIST_DESCRIPTION', '150', 'How many characters do you want to display of the Product Description?<br /><br />0= OFF<br />150= Suggested Length, or enter the maximum number of characters to display', 22, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (485, 'Display Product Display - Default Sort Order', 'PRODUCT_FEATURED_LIST_SORT_DEFAULT', '1', 'What Sort Order Default should be used for Featured Product Display?<br />Default= 1 for Product Name<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 22, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8''), ');
INSERT INTO `configuration` VALUES (486, 'Default Featured Products Group ID', 'PRODUCT_FEATURED_LIST_GROUP_ID', '22', 'Warning: Only change this if your Featured Products Group ID has changed from the default of 22<br />What is the configuration_group_id for Featured Products Listings?', 22, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (487, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 22, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (488, 'Display Product Image', 'PRODUCT_ALL_LIST_IMAGE', '1102', 'Do you want to display the Product Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (489, 'Display Product Quantity', 'PRODUCT_ALL_LIST_QUANTITY', '1202', 'Do you want to display the Product Quantity?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (490, 'Display Product Buy Now Button', 'PRODUCT_ALL_BUY_NOW', '1300', 'Do you want to display the Product Buy Now Button<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (491, 'Display Product Name', 'PRODUCT_ALL_LIST_NAME', '2101', 'Do you want to display the Product Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (492, 'Display Product Model', 'PRODUCT_ALL_LIST_MODEL', '2201', 'Do you want to display the Product Model?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (493, 'Display Product Manufacturer Name', 'PRODUCT_ALL_LIST_MANUFACTURER', '2302', 'Do you want to display the Product Manufacturer Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (494, 'Display Product Price', 'PRODUCT_ALL_LIST_PRICE', '2402', 'Do you want to display the Product Price<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (495, 'Display Product Weight', 'PRODUCT_ALL_LIST_WEIGHT', '2502', 'Do you want to display the Product Weight?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (496, 'Display Product Date Added', 'PRODUCT_ALL_LIST_DATE_ADDED', '2601', 'Do you want to display the Product Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 23, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (497, 'Display Product Description', 'PRODUCT_ALL_LIST_DESCRIPTION', '150', 'How many characters do you want to display of the Product Description?<br /><br />0= OFF<br />150= Suggested Length, or enter the maximum number of characters to display', 23, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (498, 'Display Product Display - Default Sort Order', 'PRODUCT_ALL_LIST_SORT_DEFAULT', '1', 'What Sort Order Default should be used for All Products Display?<br />Default= 1 for Product Name<br /><br />1= Products Name<br />2= Products Name Desc<br />3= Price low to high, Products Name<br />4= Price high to low, Products Name<br />5= Model<br />6= Date Added desc<br />7= Date Added<br />8= Product Sort Order', 23, 11, '2008-07-31 11:45:23', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8''), ');
INSERT INTO `configuration` VALUES (499, 'Default Products All Group ID', 'PRODUCT_ALL_LIST_GROUP_ID', '23', 'Warning: Only change this if your Products All Group ID has changed from the default of 23<br />What is the configuration_group_id for Products All Listings?', 23, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', '');
INSERT INTO `configuration` VALUES (500, 'Display Multiple Products Qty Box Status and Set Button Location', 'PRODUCT_ALL_LISTING_MULTIPLE_ADD_TO_CART', '3', 'Do you want to display Add Multiple Products Qty Box and Set Button Location?<br />0= off<br />1= Top<br />2= Bottom<br />3= Both', 23, 25, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (501, 'Show New Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS', '1', 'Show New Products on Main Page<br />0= off or set the sort order', 24, 65, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (502, 'Show Featured Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS', '2', 'Show Featured Products on Main Page<br />0= off or set the sort order', 24, 66, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (503, 'Show Special Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS', '3', 'Show Special Products on Main Page<br />0= off or set the sort order', 24, 67, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (504, 'Show Upcoming Products on Main Page', 'SHOW_PRODUCT_INFO_MAIN_UPCOMING', '4', 'Show Upcoming Products on Main Page<br />0= off or set the sort order', 24, 68, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (505, 'Show New Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS', '1', 'Show New Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 70, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (506, 'Show Featured Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS', '2', 'Show Featured Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 71, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (507, 'Show Special Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS', '3', 'Show Special Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 72, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (508, 'Show Upcoming Products on Main Page - Category with SubCategories', 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING', '4', 'Show Upcoming Products on Main Page - Category with SubCategories<br />0= off or set the sort order', 24, 73, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (509, 'Show New Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_NEW_PRODUCTS', '1', 'Show New Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 75, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (510, 'Show Featured Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_FEATURED_PRODUCTS', '2', 'Show Featured Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 76, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (511, 'Show Special Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_SPECIALS_PRODUCTS', '3', 'Show Special Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 77, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (512, 'Show Upcoming Products on Main Page - Errors and Missing Products Page', 'SHOW_PRODUCT_INFO_MISSING_UPCOMING', '4', 'Show Upcoming Products on Main Page - Errors and Missing Product<br />0= off or set the sort order', 24, 78, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (513, 'Show New Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_NEW_PRODUCTS', '1', 'Show New Products below Product Listing<br />0= off or set the sort order', 24, 85, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (514, 'Show Featured Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_FEATURED_PRODUCTS', '2', 'Show Featured Products below Product Listing<br />0= off or set the sort order', 24, 86, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (515, 'Show Special Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_SPECIALS_PRODUCTS', '3', 'Show Special Products below Product Listing<br />0= off or set the sort order', 24, 87, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (516, 'Show Upcoming Products - below Product Listing', 'SHOW_PRODUCT_INFO_LISTING_BELOW_UPCOMING', '4', 'Show Upcoming Products below Product Listing<br />0= off or set the sort order', 24, 88, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4''), ');
INSERT INTO `configuration` VALUES (517, 'New Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS', '3', 'New Products Columns per Row', 24, 95, '2010-07-08 15:25:38', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12''), ');
INSERT INTO `configuration` VALUES (518, 'Featured Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS', '2', 'Featured Products Columns per Row', 24, 96, '2009-10-24 10:05:14', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12''), ');
INSERT INTO `configuration` VALUES (519, 'Special Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS', '3', 'Special Products Columns per Row', 24, 97, '2010-07-08 15:24:08', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12''), ');
INSERT INTO `configuration` VALUES (520, 'Filter Product Listing for Current Top Level Category When Enabled', 'SHOW_PRODUCT_INFO_ALL_PRODUCTS', '1', 'Filter the products when Product Listing is enabled for current Main Category or show products from all categories?<br />0= Filter Off 1=Filter On ', 24, 100, '2008-07-31 11:44:48', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (521, 'Define Main Page Status', 'DEFINE_MAIN_PAGE_STATUS', '1', 'Enable the Defined Main Page Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 60, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (522, 'Define Contact Us Status', 'DEFINE_CONTACT_US_STATUS', '1', 'Enable the Defined Contact Us Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 61, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (523, 'Define Privacy Status', 'DEFINE_PRIVACY_STATUS', '1', 'Enable the Defined Privacy Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 62, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (524, 'Define Shipping & Returns', 'DEFINE_SHIPPINGINFO_STATUS', '1', 'Enable the Defined Shipping & Returns Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 63, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (525, 'Define Conditions of Use', 'DEFINE_CONDITIONS_STATUS', '1', 'Enable the Defined Conditions of Use Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 64, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (526, 'Define Checkout Success', 'DEFINE_CHECKOUT_SUCCESS_STATUS', '1', 'Enable the Defined Checkout Success Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 65, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (527, 'Define Discount Coupon', 'DEFINE_DISCOUNT_COUPON_STATUS', '1', 'Enable the Defined Discount Coupon Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 66, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (528, 'Define Site Map Status', 'DEFINE_SITE_MAP_STATUS', '1', 'Enable the Defined Site Map Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 67, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (529, 'Define Page-Not-Found Status', 'DEFINE_PAGE_NOT_FOUND_STATUS', '1', 'Enable the Defined Page-Not-Found Text from define-pages?<br />0= Define Text OFF<br />1= Define Text ON', 25, 67, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (530, 'Define Page 2', 'DEFINE_PAGE_2_STATUS', '1', 'Enable the Defined Page 2 Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 82, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (531, 'Define Page 3', 'DEFINE_PAGE_3_STATUS', '1', 'Enable the Defined Page 3 Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 83, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (532, 'Define Page 4', 'DEFINE_PAGE_4_STATUS', '1', 'Enable the Defined Page 4 Link/Text?<br />0= Link ON, Define Text OFF<br />1= Link ON, Define Text ON<br />2= Link OFF, Define Text ON<br />3= Link OFF, Define Text OFF', 25, 84, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (533, 'EZ-Pages Display Status - HeaderBar', 'EZPAGES_STATUS_HEADER', '1', 'Display of EZ-Pages content can be Globally enabled/disabled for the Header Bar<br />0 = Off<br />1 = On<br />2= On ADMIN IP ONLY located in Website Maintenance<br />NOTE: Warning only shows to the Admin and not to the public', 30, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (534, 'EZ-Pages Display Status - FooterBar', 'EZPAGES_STATUS_FOOTER', '1', 'Display of EZ-Pages content can be Globally enabled/disabled for the Footer Bar<br />0 = Off<br />1 = On<br />2= On ADMIN IP ONLY located in Website Maintenance<br />NOTE: Warning only shows to the Admin and not to the public', 30, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (535, 'EZ-Pages Display Status - Sidebox', 'EZPAGES_STATUS_SIDEBOX', '1', 'Display of EZ-Pages content can be Globally enabled/disabled for the Sidebox<br />0 = Off<br />1 = On<br />2= On ADMIN IP ONLY located in Website Maintenance<br />NOTE: Warning only shows to the Admin and not to the public', 30, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (536, 'EZ-Pages Header Link Separator', 'EZPAGES_SEPARATOR_HEADER', '|', 'EZ-Pages Header Link Separator<br />Default = &amp;nbsp;::&amp;nbsp;', 30, 20, '2008-07-24 16:52:01', '2008-07-20 12:06:19', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (537, 'EZ-Pages Footer Link Separator', 'EZPAGES_SEPARATOR_FOOTER', '&nbsp;|&nbsp;', 'EZ-Pages Footer Link Separator<br />Default = &amp;nbsp;::&amp;nbsp;', 30, 21, '2008-07-26 14:04:46', '2008-07-20 12:06:19', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (538, 'EZ-Pages Prev/Next Buttons', 'EZPAGES_SHOW_PREV_NEXT_BUTTONS', '2', 'Display Prev/Continue/Next buttons on EZ-Pages pages?<br />0=OFF (no buttons)<br />1="Continue"<br />2="Prev/Continue/Next"<br /><br />Default setting: 2.', 30, 30, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (539, 'EZ-Pages Table of Contents for Chapters Status', 'EZPAGES_SHOW_TABLE_CONTENTS', '1', 'Enable EZ-Pages Table of Contents for Chapters?<br />0= OFF<br />1= ON', 30, 35, '2008-07-20 12:06:19', '2008-07-20 12:06:19', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (540, 'EZ-Pages Pages to disable headers', 'EZPAGES_DISABLE_HEADER_DISPLAY_LIST', '', 'EZ-Pages "pages" on which to NOT display the normal "header" for your site.<br />Simply list page ID numbers separated by commas with no spaces.<br />Page ID numbers can be obtained from the EZ-Pages screen under Admin->Tools.<br />ie: 1,5,2<br />or leave blank.', 30, 40, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (541, 'EZ-Pages Pages to disable footers', 'EZPAGES_DISABLE_FOOTER_DISPLAY_LIST', '', 'EZ-Pages "pages" on which to NOT display the normal "footer" for your site.<br />Simply list page ID numbers separated by commas with no spaces.<br />Page ID numbers can be obtained from the EZ-Pages screen under Admin->Tools.<br />ie: 3,7<br />or leave blank.', 30, 41, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (542, 'EZ-Pages Pages to disable left-column', 'EZPAGES_DISABLE_LEFTCOLUMN_DISPLAY_LIST', '', 'EZ-Pages "pages" on which to NOT display the normal "left" column (of sideboxes) for your site.<br />Simply list page ID numbers separated by commas with no spaces.<br />Page ID numbers can be obtained from the EZ-Pages screen under Admin->Tools.<br />ie: 21<br />or leave blank.', 30, 42, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (543, 'EZ-Pages Pages to disable right-column', 'EZPAGES_DISABLE_RIGHTCOLUMN_DISPLAY_LIST', '', 'EZ-Pages "pages" on which to NOT display the normal "right" column (of sideboxes) for your site.<br />Simply list page ID numbers separated by commas with no spaces.<br />Page ID numbers can be obtained from the EZ-Pages screen under Admin->Tools.<br />ie: 3,82,13<br />or leave blank.', 30, 43, '0000-00-00 00:00:00', '2008-07-20 12:06:19', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (546, 'Modify the model.', 'QUICKUPDATES_MODIFY_MODEL', 'true', 'Enable/Disable the products model displaying and modification', 31, 3, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (547, 'Modify the name.', 'QUICKUPDATES_MODIFY_NAME', 'true', 'Enable/Disable the products name editing', 31, 4, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (548, 'Modify the Description.', 'QUICKUPDATES_MODIFY_DESCRIPTION', 'true', 'Enable/Disable the displaying and modification of products description', 31, 5, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (549, 'Modify the status of the products.', 'QUICKUPDATES_MODIFY_STATUS', 'true', 'Allow/Disallow the Status displaying and modification', 31, 6, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (550, 'Modify the weight of the products.', 'QUICKUPDATES_MODIFY_WEIGHT', 'true', 'Allow/Disallow the Weight displaying and modification?', 31, 7, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (551, 'Modify the quantity of the products.', 'QUICKUPDATES_MODIFY_QUANTITY', 'true', 'Allow/Disallow the quantity displaying and modification', 31, 8, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (552, 'Modify the manufacturer of the products.', 'QUICKUPDATES_MODIFY_MANUFACTURER', 'false', 'Allow/Disallow the Manufacturer displaying and modification', 31, 9, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (553, 'Modify the class of tax of the products.', 'QUICKUPDATES_MODIFY_TAX', 'false', 'Allow/Disallow the Class of tax displaying and modification', 31, 10, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (554, 'Modify the category.', 'QUICKUPDATES_MODIFY_CATEGORY', 'true', 'Enable/Disable the products category modify', 31, 11, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (555, 'Display price with all included of tax.', 'QUICKUPDATES_DISPLAY_TVA_OVER', 'true', 'Enable/Disable the displaying of the Price with all tax included when your mouse is over a product', 31, 20, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (556, 'Display the link towards the products information page.', 'QUICKUPDATES_DISPLAY_PREVIEW', 'false', 'Enable/Disable the display of the link towards the products information page ', 31, 30, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (557, 'Display the link towards the page where you will be able to edit the product.', 'QUICKUPDATES_DISPLAY_EDIT', 'true', 'Enable/Disable the display of the link towards the page where you will be able to edit the product', 31, 31, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (558, 'Activate or desactivate the commercial margin.', 'QUICKUPDATES_ACTIVATE_COMMERCIAL_MARGIN', 'true', 'Do you want that the commercial margin be activate or not ?', 31, 40, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (559, 'Modify the sort order.', 'QUICKUPDATES_MODIFY_SORT_ORDER', 'true', 'Enable/Disable the products sort order modify', 31, 11, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (560, 'Use popup edit.', 'QUICKUPDATES_MODIFY_DESCRIPTION_POPUP', 'true', 'Enable/Disable using popup edit link to description editing', 31, 11, '2008-07-25 16:36:11', '2008-07-25 16:36:11', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (561, 'Site Map - include Product Links?', 'SHOW_PRODUCT_LINKS_ON_SITE_MAP', 'No', 'Should Product links show up on the site-map?', 19, 74, '2008-07-26 07:14:38', '2007-08-22 09:24:44', '', 'zen_cfg_select_option(array(''Yes'', ''No''), ');
INSERT INTO `configuration` VALUES (562, 'Enable SEO URLs?', 'SEO_ENABLED', 'true', 'Enable the SEO URLs?  This is a global setting and will turn them off completely.', 32, 0, '2010-07-08 17:48:08', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (563, 'Add cPath to product URLs?', 'SEO_ADD_CPATH_TO_PRODUCT_URLS', 'false', 'This setting will append the cPath to the end of product URLs (i.e. - some-product-p-1.html?cPath=xx).', 32, 1, '2008-07-31 11:18:23', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (564, 'Add category parent to begining of URLs?', 'SEO_ADD_CAT_PARENT', 'false', 'This setting will add the category parent name to the beginning of the category URLs (i.e. - parent-category-c-1.html)', 32, 2, '2008-07-31 13:16:28', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (565, 'Filter Short Words', 'SEO_URLS_FILTER_SHORT_WORDS', '0', 'This setting will filter words less than or equal to the value from the URL.', 32, 3, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', '');
INSERT INTO `configuration` VALUES (566, 'Output W3C valid URLs (parameter string)?', 'SEO_URLS_USE_W3C_VALID', 'true', 'This setting will output W3C valid URLs.', 32, 4, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (567, 'Enable SEO cache to save queries?', 'USE_SEO_CACHE_GLOBAL', 'true', 'This is a global setting and will turn off caching completely.', 32, 5, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (568, 'Enable product cache?', 'USE_SEO_CACHE_PRODUCTS', 'true', 'This will turn off caching for the products.', 32, 6, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (569, 'Enable categories cache?', 'USE_SEO_CACHE_CATEGORIES', 'true', 'This will turn off caching for the categories.', 32, 7, '2008-07-31 11:19:26', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (570, 'Enable manufacturers cache?', 'USE_SEO_CACHE_MANUFACTURERS', 'true', 'This will turn off caching for the manufacturers.', 32, 8, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (571, 'USE_SEO_CACHE_ARTICLES', 'USE_SEO_CACHE_ARTICLES', 'true', 'This will turn off caching for the articles.', 32, 9, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (572, 'Enable information cache?', 'USE_SEO_CACHE_INFO_PAGES', 'true', 'This will turn off caching for the information pages.', 32, 10, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (573, 'Enable automatic redirects?', 'USE_SEO_REDIRECT', 'true', 'This will activate the automatic redirect code and send 301 headers for old to new URLs.', 32, 11, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (574, 'Choose URL Rewrite Type', 'SEO_REWRITE_TYPE', 'Rewrite', 'Choose which SEO URL format to use.', 32, 12, '2008-07-28 00:41:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''Rewrite''),');
INSERT INTO `configuration` VALUES (575, 'Enter special character conversions', 'SEO_CHAR_CONVERT_SET', 'Ã¶=>o,Ã©=>e,Ã¨=>e,Ã®=>i,Ã±=n,&agrave;=>a', 'This setting will convert characters.<br><br>The format <b>MUST</b> be in the form: <b>char=>conv,char2=>conv2</b>', 32, 13, '2009-08-07 22:20:49', '2008-07-28 00:41:47', '', '');
INSERT INTO `configuration` VALUES (576, 'Remove all non-alphanumeric characters?', 'SEO_REMOVE_ALL_SPEC_CHARS', 'false', 'This will remove all non-letters and non-numbers.  This should be handy to remove all special characters with 1 setting.', 32, 14, '2008-07-31 13:15:47', '2008-07-28 00:41:47', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (577, 'Reset SEO URLs Cache ', 'SEO_URLS_CACHE_RESET', 'false', 'This will reset the cache data for SEO', 32, 15, '2009-08-13 15:42:58', '2008-07-28 00:41:47', 'zen_reset_cache_data_seo_urls', 'zen_cfg_select_option(array(''reset'', ''false''),');
INSERT INTO `configuration` VALUES (578, 'Enter pages to allow rewrite', 'SEO_URLS_ONLY_IN', 'free_shipping,best_deal,faq,index,testimonials,product_info,product_free_shipping_info,products_new, products_all, featured_products, specials, contact_us, conditions, privacy, reviews, shippinginfo, faqs_all,faq_info, site_map, gv_faq, discount_coupon, page, page_2, page_3, page_4,see_all, shopping_cart', 'Enter pages to allow rewrite\r\nThis setting will allow the rewrite only in the specified pages. If it''s empty all pages will be rewrited.\r\n\r\nThe format MUST be in the form: page1,page2,page3', 32, 16, '2009-11-24 09:37:07', '2008-07-28 00:41:47', '', '');
INSERT INTO `configuration` VALUES (579, 'Display Cross-Sell Products', 'MIN_DISPLAY_XSELL', '1', 'This is the minimum number of configured Cross-Sell products required in order to cause the Cross Sell information to be displayed.<br />Default: 1', 33, 17, '0000-00-00 00:00:00', '2008-07-30 11:12:31', '', '');
INSERT INTO `configuration` VALUES (580, 'Display Cross-Sell Products', 'MAX_DISPLAY_XSELL', '6', 'This is the maximum number of configured Cross-Sell products to be displayed.<br />Default: 6', 33, 66, '0000-00-00 00:00:00', '2008-07-30 11:12:31', '', '');
INSERT INTO `configuration` VALUES (581, 'Cross-Sell Products Columns per Row', 'SHOW_PRODUCT_INFO_COLUMNS_XSELL_PRODUCTS', '3', 'Cross-Sell Products Columns to display per Row<br />0= off or set the sort order.<br />Default: 3', 33, 72, '0000-00-00 00:00:00', '2008-07-30 11:12:31', '', 'zen_cfg_select_option(array(0, 1, 2, 3, 4), ');
INSERT INTO `configuration` VALUES (582, 'Cross-Sell - Display prices?', 'XSELL_DISPLAY_PRICE', 'true', 'Cross-Sell -- Do you want to display the product prices too?<br />Default: false', 33, 72, '2008-07-30 11:15:36', '2008-07-30 11:12:31', '', 'zen_cfg_select_option(array(''true'',''false''), ');
INSERT INTO `configuration` VALUES (583, 'Input type to be used in form', 'XSELL_FORM_INPUT_TYPE', 'model', 'Choose to use product ID or MODEL as your input type. Check readme file for more info', 33, 1, '2008-07-30 15:44:39', '2008-07-30 11:12:31', '', 'zen_cfg_select_option(array(''id'', ''model''),');
INSERT INTO `configuration` VALUES (584, 'XSell Product Input Separator', 'XSELL_PRODUCT_INPUT_SEPARATOR', ',', 'You will need to insert all product id/model you want to cross-sell in 1 field, so each product id/model needs to be separated by a separator. The default is comma, choose another if you want to', 33, 1, '2008-07-30 11:12:31', '2008-07-30 11:12:31', '', '');
INSERT INTO `configuration` VALUES (585, 'XSell Sort Order', 'XSELL_SORT_ORDER', 'sort_order', 'Sometimes you may want to display the xsell products randomly, especially if each product xsells with lots of others', 33, 1, '2008-07-30 11:12:31', '2008-07-30 11:12:31', '', 'zen_cfg_select_option(array(''sort_order'', ''random''),');
INSERT INTO `configuration` VALUES (586, 'Show Help Category Counts', 'SHOW_FAQ_COUNTS', 'true', 'Count recursively how many Help are in each FAQ category', 34, 9, '0000-00-00 00:00:00', '2008-07-30 16:43:43', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (587, 'Help Categories Count Prefix', 'FAQ_CATEGORIES_COUNT_PREFIX', '&nbsp;(', 'What do you want to Prefix the Help count with?<br />Default= (', 34, 10, '0000-00-00 00:00:00', '2008-07-30 16:43:43', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (588, 'Help Categories Count Suffix', 'FAQ_CATEGORIES_COUNT_SUFFIX', ')', 'What do you want as a Suffix to the Help count?<br />Default= )', 34, 11, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (589, 'Help Categories SubCategories Indent', 'FAQ_CATEGORIES_SUBFAQ_CATEGORIES_INDENT', '&nbsp;&nbsp;', 'What do you want to use as the Help subcategories indent?<br />Default= &nbsp;&nbsp;', 34, 12, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (590, 'Help Categories with 0 Help Status', 'FAQ_CATEGORIES_COUNT_ZERO', '0', 'Show Help Count for 0 Help?<br />0= off<br />1= on', 34, 13, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (591, 'Separator between links Status', 'SHOW_FAQ_CATEGORIES_SEPARATOR_LINK', '1', 'Show FAQ Category Separator between Category Names and Links?<br />0= off<br />1= on', 34, 14, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (592, 'Separator between the Category Name and Count', 'FAQ_CATEGORIES_SEPARATOR', '-&gt;', 'What separator do you want between the FAQ Category name and the count?<br />Default = -&amp;gt;', 34, 15, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (593, 'Separator between the Category Name and Sub Categories', 'FAQ_CATEGORIES_SEPARATOR_SUBS', '|_&nbsp;', 'What separator do you want between the FAQ Category name and FAQ Sub Category Name?<br />Default = |_&amp;nbsp;', 34, 16, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (594, 'Always Open to Show Help SubCategories', 'SHOW_FAQ_CATEGORIES_SUBFAQ_CATEGORIES_ALWAYS', '1', 'Always Show Categories and SubCategories<br />0= off, just show Top Categories<br />1= on, Always show Categories and SubCategories when selected', 34, 17, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (595, 'Show New Help Link', 'SHOW_FAQ_CATEGORIES_BOX_FAQS_NEW', 'true', 'Show Help New Link in the Help Categories Box', 34, 18, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (596, 'Show All Help Link', 'SHOW_FAQ_CATEGORIES_BOX_FAQS_ALL', 'true', 'Show Help All Link in the FAQ Categories Box', 34, 19, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (597, 'Previous Next - Navigation Bar Position', 'FAQ_INFO_PREVIOUS_NEXT', '2', 'Location of Previous/Next Navigation Bar<br />0= off<br />1= Top of Page<br />2= Bottom of Page<br />3= Both Top and Bottom of Page', 35, 30, '2008-08-19 12:40:43', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''Top of Page''), array(''id''=>''2'', ''text''=>''Bottom of Page''), array(''id''=>''3'', ''text''=>''Both Top & Bottom of Page'')),');
INSERT INTO `configuration` VALUES (598, 'Previous Next - Sort Order', 'FAQ_INFO_PREVIOUS_NEXT_SORT', '1', 'FAQs Display Order by<br />0= FAQ ID<br />1= FAQ Name<br />6= FAQ Sort Order', 35, 31, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''FAQ ID''), array(''id''=>''1'', ''text''=>''Name''), array(''id''=>''6'', ''text''=>''FAQ Sort Order'')),');
INSERT INTO `configuration` VALUES (599, 'Previous Next - Button and Image Status', 'SHOW_FAQ_PREVIOUS_NEXT_STATUS', '0', 'Button and FAQ Image status settings are:<br />0= Off<br />1= On', 35, 32, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''On'')),');
INSERT INTO `configuration` VALUES (600, 'Previous Next - Button and Image Settings', 'SHOW_FAQ_PREVIOUS_NEXT_IMAGES', '0', 'Show Previous/Next Button and FAQ Image Settings<br />0= Button Only<br />1= Button and FAQ Image<br />2= FAQ Image Only', 35, 33, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Button Only''), array(''id''=>''1'', ''text''=>''Button and FAQ Image''), array(''id''=>''2'', ''text''=>''FAQ Image Only'')),');
INSERT INTO `configuration` VALUES (601, 'Previous Next - Navigation Includes FAQ Category', 'FAQ_INFO_FAQ_CATEGORIES', '1', 'Help Category Image and Name Alignment Above Previous/Next Navigation Bar<br />0= off<br />1= Align Left<br />2= Align Center<br />3= Align Right', 35, 34, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Off''), array(''id''=>''1'', ''text''=>''Align Left''), array(''id''=>''2'', ''text''=>''Align Center''), array(''id''=>''3'', ''text''=>''Align Right'')),');
INSERT INTO `configuration` VALUES (602, 'Show Help Reviews Count', 'SHOW_FAQ_INFO_REVIEWS_COUNT', '1', 'Display Help Reviews Count on Help Info 0= off 1= on', 35, 35, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `configuration` VALUES (603, 'Show Help Reviews Button', 'SHOW_FAQ_INFO_REVIEWS', '1', 'Display Help Reviews Button on Help Info 0= off 1= on', 35, 36, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `configuration` VALUES (604, 'Show Date Added', 'SHOW_FAQ_INFO_DATE_ADDED', '1', 'Display Date Added on Help Info 0= off 1= on', 35, 37, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `configuration` VALUES (605, 'Show Help URL', 'SHOW_FAQ_INFO_URL', '1', 'Display URL on Help Info 0= off 1= on', 35, 38, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `configuration` VALUES (606, 'Show Help Tell a Friend button', 'SHOW_FAQ_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Help Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 35, 39, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `configuration` VALUES (607, 'Display Help Name', 'FAQ_LIST_NAME', '1', 'Do you want to display the Help Name?', 36, 50, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (608, 'Prev/Next Split Page Navigation (1-top, 2-bottom, 3-both)', 'PREV_NEXT_FAQ_BAR_LOCATION', '1', 'Sets the location of the Help Prev/Next Split Page Navigation', 36, 51, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3''), ');
INSERT INTO `configuration` VALUES (609, 'Display Help Listing Default Sort Order', 'FAQ_LISTING_DEFAULT_SORT_ORDER', '', 'Help Listing Default sort order?<br />NOTE: Leave Blank for Help Sort Order. Sort the Help Listing in the order you wish for the default display to start in to get the sort order setting. Example: 2a', 36, 52, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (610, 'Number Per Page', 'MAX_DISPLAY_FAQS_LISTING', '10', 'Maximum Number of Help to list per page on main page', 36, 53, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (611, 'Number of Help Per Page', 'MAX_DISPLAY_FAQS_NEW', '10', 'Number of new Help listings per page', 37, 70, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (612, 'Display Help Image', 'FAQ_NEW_LIST_IMAGE', '1102', 'Do you want to display the Help Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 37, 71, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (613, 'Display Help Name', 'FAQ_NEW_LIST_NAME', '2101', 'Do you want to display the Help Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 37, 72, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (614, 'Display Help Date Added', 'FAQ_NEW_LIST_DATE_ADDED', '2601', 'Do you want to display the Help Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 37, 73, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (615, 'Display Help Description', 'FAQ_NEW_LIST_DESCRIPTION', '1', 'Do you want to display the Help Description - First 150 characters?<br />0= off<br />1= on', 37, 74, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (616, 'Default Sort Order', 'FAQ_NEW_LIST_SORT_DEFAULT', '6', 'What Sort Order Default should be used for New Help Display?<br />Default= 6 for Date New to Old<br /><br />1= Help Name<br />2= Help Name Desc<br />6= Date Added desc<br />7= Date Added', 37, 75, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''1'', ''2'', ''6'', ''7''), ');
INSERT INTO `configuration` VALUES (617, 'Image Width', 'IMAGE_FAQ_NEW_LISTING_WIDTH', '50', 'Default = 50', 37, 76, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (618, 'Image Height', 'IMAGE_FAQ_NEW_LISTING_HEIGHT', '40', 'Default = 40', 37, 77, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (619, 'Number of Help Per Page', 'MAX_DISPLAY_FAQS_ALL', '10', 'Number of Help to list per screen', 37, 80, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (620, 'New Help Page Configuration Group ID', 'FAQ_LISTS_GROUP_ID_NEW', '37', 'Warning: Only change this if your Help All Group ID has changed from the default<br />What is the configuration_group_id for Help Listings?', 37, 90, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (621, 'Display Help Image', 'FAQ_ALL_LIST_IMAGE', '1102', 'Do you want to display the Help Image?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 38, 81, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (622, 'Display Help Name', 'FAQ_ALL_LIST_NAME', '2101', 'Do you want to display the Help Name?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 38, 82, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (623, 'Display Help Date Added', 'FAQ_ALL_LIST_DATE_ADDED', '2601', 'Do you want to display the Help Date Added?<br /><br />0= off<br />1st digit Left or Right<br />2nd and 3rd digit Sort Order<br />4th digit number of breaks after<br />', 38, 83, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (624, 'Display Help Description', 'FAQ_ALL_LIST_DESCRIPTION', '1', 'Do you want to display the Help Description - First 150 characters?', 38, 84, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''), ');
INSERT INTO `configuration` VALUES (625, 'Default Sort Order', 'FAQ_ALL_LIST_SORT_DEFAULT', '1', 'What Sort Order Default should be used for All Help Display?<br />Default= 1 for Help Name<br /><br />1= Help Name<br />2= Help Name Desc<br />6= Date Added desc<br />7= Date Added', 38, 85, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''1'', ''2'', ''6'', ''7''), ');
INSERT INTO `configuration` VALUES (626, 'Image Width', 'IMAGE_FAQ_ALL_LISTING_WIDTH', '50', 'Default = 50', 38, 86, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (627, 'Image Height', 'IMAGE_FAQ_ALL_LISTING_HEIGHT', '40', 'Default = 40', 38, 87, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (628, 'ALL Help Page Configuration Group ID', 'FAQ_LISTS_GROUP_ID_ALL', '38', 'Warning: Only change this if your help All Group ID has changed from the default<br />What is the configuration_group_id for Help Listings?', 38, 90, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (629, 'Help Categories - Help Categories To List Per Row', 'MAX_DISPLAY_FAQ_CATEGORIES_PER_ROW', '1', 'How many Help categories to list per row', 39, 91, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (630, 'Allow Help To Go Live As Submitted', 'FAQ_LIST_LIVE', 'false', 'Do you want Help to go live as submitted<br>Set to false for admin approval.', 39, 92, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (631, 'Define Help Submit', 'DEFINE_FAQS_SUBMIT_STATUS', '1', 'Enable the Defined Help_submit text?<br />0= OFF<br />1= ON', 39, 93, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (632, 'Allow Help submission', 'ALLOW_FAQS_SUBMISSION', 'true', 'Allow users to submit Help.', 39, 94, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (633, 'If Allow Help submission = true, allow unregistered users submit Help', 'UNREGISTERED_FAQS_SUBMIT', 'true', 'Allow unregistered users to submit Help.', 39, 95, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (634, 'Allow Image Upload', 'SUBMIT_FAQ_ALLOW_IMAGE_UPLOAD', 'false', 'Allow Image Upload on FAQ Submit', 39, 96, '2008-08-20 09:46:32', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (635, 'Send Help Submit Notification Emails To:', 'SEND_FAQ_SUBMIT_EMAILS_TO_EMAILS_TO', 'admin@taoxieyoua.com', 'Enter the email address that Help submit notifications should be sent to', 39, 97, '2009-03-25 16:16:51', '2008-07-30 16:43:44', '', '');
INSERT INTO `configuration` VALUES (636, 'Define No Help Allowed', 'DEFINE_NO_FAQS_ALLOWED', '1', 'Enable the No Help Allowed text?<br>0= OFF<br>1= ON', 39, 98, '0000-00-00 00:00:00', '2008-07-30 16:43:44', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (1343, 'Query (2)', 'AUTO_STATE_2', 'order', '<br />Set query <p />Choose <b>order</b> for post-order emailing <p />Choose <b>account</b> for emailing all account creating customers<p />Choose <b>account-no-order</b> for emailing customers who have created an account but never ordered', 48, 16, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''order'', ''account'', ''account-no-order''), ');
INSERT INTO `configuration` VALUES (1342, 'Mode (2)', 'AUTO_MODE_2', 'test', '<br />Set mode <p />When in test mode, emails will be sent to store owner instead', 48, 15, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''test'', ''live''), ');
INSERT INTO `configuration` VALUES (1340, 'HTML Message (1)', 'AUTO_MESSAGE_HTML', 'Enter email here..', '<br />Enter main message<p />HTML allowed<br />', 48, 13, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1341, 'Enable Preset (2)', 'AUTO_ENABLE_PRESET_2', 'false', '<br />Enable email preset #2', 48, 14, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1332, 'Order Status ID (1)', 'AUTO_ORDER_STATUS_ID', '3', '<br />Emails only send for orders with the following status:<p />(ignore if in <b>account</b> state)<br />', 48, 5, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1333, 'Days After (1)', 'AUTO_DAYS_AFTER', '7', '<br />Amount of days before email is sent', 48, 6, '2008-10-11 19:16:15', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1334, 'Subscribed (1)', 'AUTO_SUBSCRIBED', 'true', '<br />Must be subscribed to newsletter', 48, 7, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1335, 'Restrict Location (1)', 'AUTO_RESTRICT', 'no', '<br />Post-order emails are restricted', 48, 8, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''no'', ''to zone'', ''to country'', ''from zone'', ''from country''), ');
INSERT INTO `configuration` VALUES (1336, 'Location to Restrict (1)', 'AUTO_LOCATION', 'Kent', '<br />Enter location to restrict to/from<p />(ignore if no restriction)<br />', 48, 9, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1337, 'Subject (1)', 'AUTO_SUBJECT', 'Order Review', 'Enter email subject', 48, 10, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1338, 'Include Customer Name (1)', 'AUTO_INCLUDE_NAME', '0', '<br />Display customer name at beginning of email<p />0 No<br />1 John<br />2 John Smith<br />3 Hi John<br />4 Hi John Smith<br />5 Hello John<br />6 Hello John Smith<br />7 John,<br />8 John Smith,<br />9 Hi John,<br />10 Hi John Smith,<br />11 Hello John,<br />12 Hello John Smith,<br />13 Dear John<br />14 Dear John Smith<br />15 Dear John,<br />16 Dear John Smith,', 48, 11, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3'', ''4'', ''5'', ''6'', ''7'', ''8'', ''9'', ''10'', ''11'', ''12'', ''13'', ''14'', ''15'', ''16''), ');
INSERT INTO `configuration` VALUES (1339, 'Text Message (1)', 'AUTO_MESSAGE_TEXT', 'Enter email here..', '<br />Enter main message<p />Carriage return sensitive<br />', 48, 12, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1260, 'Length of Link Categories Name', 'MAX_DISPLAY_LINK_NAME_LEN', '17', 'Used in links box; maximum length of link category name to display. Longer names will be truncated.', 46, 15, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1261, 'Select Links Sort Order', 'DEFINE_SORT_ORDER', '1', 'Define the sort order of the links<br />1= Sort by Title<br />2= Sort by Date (Newest to Oldest)<br />3= Sort by number of clicks (highest to lowest)', 46, 16, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''1'', ''2'', ''3''),');
INSERT INTO `configuration` VALUES (1249, 'Enable Click Count', 'ENABLE_LINKS_COUNT', 'false', 'Enable links click count.', 46, 4, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1250, 'Submit Link - Require Reciprocal Page', 'SUBMIT_LINK_REQUIRE_RECIPROCAL', 'true', 'Require Reciprocal Page on Links Submit', 46, 5, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1251, 'Display Link Banner Image', 'LINK_LIST_IMAGE', '0', 'Do you want to display the Link Banner Image?', 46, 6, '2008-10-09 15:25:43', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1252, 'Display Link Description', 'LINK_LIST_DESCRIPTION', '2', 'Do you want to display the Link Description?', 46, 7, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1253, 'Display Link Click Count', 'LINK_LIST_COUNT', '0', 'Do you want to display the Link Click Count?', 46, 8, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1254, 'Link Title Minimum Length', 'ENTRY_LINKS_TITLE_MIN_LENGTH', '2', 'Minimum length of link title.', 46, 9, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1255, 'Link URL Minimum Length', 'ENTRY_LINKS_URL_MIN_LENGTH', '10', 'Minimum length of link URL.', 46, 10, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1256, 'Link Description Minimum Length', 'ENTRY_LINKS_DESCRIPTION_MIN_LENGTH', '10', 'Minimum length of link description.', 46, 11, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1257, 'Link Contact Name Minimum Length', 'ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH', '2', 'Minimum length of link contact name.', 46, 12, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1258, 'Links Check Phrase', 'LINKS_CHECK_PHRASE', 'yoursitename', 'Phrase to look for, when you perform a link check.', 46, 13, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1259, 'Links List - Scroll Box Size/Style', 'MAX_LINKS_LIST', '3', 'Number of link category names to be displayed in the scroll box window. Setting this to 1 or 0 will display a dropdown list', 46, 14, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1323, 'Generate Products Model', 'RSS_PRODUCTS_MODEL', 'true', 'Generate Products Model (extended tag &lt;g:model_number&gt;)', 47, 97, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1324, 'Generate Products Rating', 'RSS_PRODUCTS_RATING', 'true', 'Generate Products Rating (extended tag &lt;g:rating&gt;)', 47, 98, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1325, 'Generate Products Images', 'RSS_PRODUCTS_IMAGES', 'true', 'Generate Products Images (extended tag &lt;g:image_link&gt;)', 47, 98, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1326, 'Generate Products Images Size', 'RSS_DEFAULT_IMAGE_SIZE', 'large', 'What image size Generate (extended tag &lt;g:image_link&gt;)', 47, 99, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''small'', ''medium'', ''large''),');
INSERT INTO `configuration` VALUES (1327, 'Feed Cache Time', 'RSS_CACHE_TIME', '10', 'Cache Time (in min). If you don''t want caching, set it to 0', 47, 200, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1268, 'Image - Link Image Height', 'LINK_IMAGE_HEIGHT', '30', 'The pixel height of Link images', 46, 23, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1269, 'Default Link Image', 'DEFAULT_LINK_IMAGE', 'links_default.jpg', 'Set the Default Link Image', 46, 24, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1266, 'Link Image Directory', 'LINK_IMAGE_DIRECTORY', 'links_image/', 'Set the Directory for the Link Image', 46, 21, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1267, 'Image - Link Image Width', 'LINK_IMAGE_WIDTH', '150', 'The pixel width of Link images', 46, 22, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1262, 'Number of Link Categories Per Row - Default is 3', 'MAX_LINK_CATEGORIES_ROW', '3', 'Used to display Link Categories per row.<br />Default is 3', 46, 17, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1319, 'Generate Products Weight', 'RSS_PRODUCTS_WEIGHT', 'true', 'Generate Products Weight (extended tag &lt;g:weight&gt;)', 47, 93, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1246, 'Links Box - Display View All Links', 'BOX_DISPLAY_VIEW_ALL_LINKS', 'true', 'Display View All Links on Links Sidebox', 46, 1, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(NULL, ''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1320, 'Generate Products Brand', 'RSS_PRODUCTS_BRAND', 'true', 'Generate Products Manufacturers Name (extended tag &lt;g:brand&gt;)', 47, 94, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1075, 'ä½¿ç”¨è¿è¾“ä¿è´¹?', 'MODULE_ORDER_TOTAL_INSURANCE_USE', 'true', 'è¦ä½¿ç”¨è¿è¾“ä¿è´¹å—?', 6, 3, '0000-00-00 00:00:00', '2008-09-26 08:18:08', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1264, 'Image - Link Category Height', 'LINK_CATEGORY_IMAGE_HEIGHT', '80', 'The pixel width of Link Category images', 46, 19, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1265, 'Image - Link Category Width', 'LINK_CATEGORY_IMAGE_WIDTH', '80', 'The pixel width of Link Category images', 46, 20, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1263, 'Link Category Image Directory', 'LINK_CATEGORY_IMAGE_DIRECTORY', 'link_category/', 'Set the Directory for the Category Image', 46, 18, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', '');
INSERT INTO `configuration` VALUES (1079, 'ä¿è´¹é€‚ç”¨çš„è®¢å•', 'MODULE_ORDER_TOTAL_INSURANCE_DESTINATION', 'both', 'ä¿è´¹é€‚ç”¨äºŽå‘é€åˆ°è®¾å®šåœ°åŒºçš„è®¢å•ã€‚', 6, 6, '0000-00-00 00:00:00', '2008-09-26 08:18:08', '', 'zen_cfg_select_option(array(''national'', ''international'', ''both''), ');
INSERT INTO `configuration` VALUES (1299, 'RSS Title', 'RSS_TITLE', 'rss', 'RSS Title (if empty use Store Name)', 47, 1, '2009-03-28 20:54:34', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1300, 'RSS Description', 'RSS_DESCRIPTION', '', 'RSS description', 47, 2, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1301, 'RSS Image', 'RSS_IMAGE', 'rss.gif', 'A GIF, JPEG or PNG image that represents the channel', 47, 3, '2009-03-28 20:56:22', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1302, 'RSS Image Name', 'RSS_IMAGE_NAME', 'rss', 'RSS Image Name (if empty use Store Name)', 47, 4, '2009-03-28 20:56:32', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1303, 'RSS Copyright', 'RSS_COPYRIGHT', '', 'RSS Copyright (if empty use Store Owner)', 47, 5, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1304, 'RSS Managing Editor', 'RSS_MANAGING_EDITOR', '', 'RSS Managing Editor (if empty use Store Owner Email Address and Store Owner)', 47, 6, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1305, 'RSS Webmaster', 'RSS_WEBMASTER', '', 'RSS Webmaster (if empty use Store Owner Email Address and Store Owner)', 47, 7, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1306, 'RSS Author', 'RSS_AUTHOR', '', 'RSS Author (if empty use Store Owner Email Address and Store Owner)', 47, 8, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1307, 'RSS Home Page Feed', 'RSS_HOMEPAGE_FEED', 'new_products', 'RSS Home Page Feed', 47, 8, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''news'', ''new_products'', ''upcoming'', ''featured'', ''specials'', ''products'', ''categories''),');
INSERT INTO `configuration` VALUES (1308, 'RSS Default Feed', 'RSS_DEFAULT_FEED', 'new_products', 'RSS Default Feed', 47, 8, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''news'', ''new_products'', ''upcoming'', ''featured'', ''specials'', ''products'', ''categories''),');
INSERT INTO `configuration` VALUES (1309, 'Strip tags', 'RSS_STRIP_TAGS', 'false', 'Strip tags', 47, 20, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1310, 'Generate Descriptions', 'RSS_ITEMS_DESCRIPTION', 'true', 'Generate Descriptions', 47, 21, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1311, 'Descriptions Length', 'RSS_ITEMS_DESCRIPTION_MAX_LENGTH', '0', 'How many characters in description (0 for no limit)', 47, 22, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1312, 'Time to live', 'RSS_TTL', '1440', 'Time to live - time after reader should refresh the info in minutes', 47, 23, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1313, 'Default Products Limit', 'RSS_PRODUCTS_LIMIT', '100', 'Default Limit to Products Feed', 47, 31, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', '');
INSERT INTO `configuration` VALUES (1314, 'Add Product image', 'RSS_PRODUCTS_DESCRIPTION_IMAGE', 'true', 'Add product image to product description tag', 47, 32, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1315, 'Add "buy now" button', 'RSS_PRODUCTS_DESCRIPTION_BUYNOW', 'true', 'Add "buy now" button to product description tag', 47, 33, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1316, 'Categories for Products', 'RSS_PRODUCTS_CATEGORIES', 'master', 'Use ''all'' or only ''master'' Categories for Products when specified cPath parameter', 47, 23, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''master'', ''all''),');
INSERT INTO `configuration` VALUES (1317, 'Generate Products Price', 'RSS_PRODUCTS_PRICE', 'true', 'Generate Products Price (extended tag &lt;g:price&gt;)', 47, 90, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1318, 'Generate Products ID', 'RSS_PRODUCTS_ID', 'true', 'Generate Products ID (extended tag &lt;g:id&gt;)', 47, 91, '0000-00-00 00:00:00', '2008-10-09 12:50:30', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (748, 'Slogan', 'STORE_SLOGAN', '&nbsp;&nbsp;&nbsp;&nbsp;<a href="/">China <b>Supply</b> Watches</a> - retail & wholesale', 'Website header slogan!', 1, 3, '2009-08-07 17:25:40', '0001-01-01 00:00:00', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (747, 'Newsletter Test Group Email', 'NEWSONLY_SUBSCRIPTION_TEST_GROUP', '', 'Enter the email addresses of customers and newsletter-only subscribers that you wish to send test emails to.<br />Only valid subscriber/customer emails will work.', 12, 202, '0000-00-00 00:00:00', '2008-08-13 09:51:15', '', '');
INSERT INTO `configuration` VALUES (746, 'Send Notice of Newsletter-only Subscriptions To', 'NEWSONLY_SUBSCRIPTION_CC', '', 'Send notice of newsletter-only subscriptions to the following email addresses, in this format: Name 1 &lt;email@address1&gt;, Name 2 &lt;email@address2&gt;', 12, 201, '0000-00-00 00:00:00', '2008-08-13 09:51:15', '', '');
INSERT INTO `configuration` VALUES (745, 'Send Notice of Newsletter-only Subscriptions To - Status', 'NEWSONLY_SUBSCRIPTION_CC_STATUS', '0', 'Would you like to send a notice of new newsletter-only subscribers?<br />0=off, 1=on', 12, 200, '0000-00-00 00:00:00', '2008-08-13 09:51:15', '', 'zen_cfg_select_option(array(''0'', ''1''),');
INSERT INTO `configuration` VALUES (744, 'Show Newsletter-only subscription field in header?', 'NEWSONLY_SUBSCRIPTION_HEADER', 'false', 'Show subscribe link in header? Note: You must edit your custom template tpl_header.php file in order to use this. See readme that came with contribution.', 19, 200, '0000-00-00 00:00:00', '2008-08-13 09:51:15', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (1247, 'Links Box - Display Submit Link', 'BOX_DISPLAY_SUBMIT_LINK', 'true', 'Display Submit Link on Sidebox', 46, 2, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (742, 'Enable Newsletter-only subscriptions?', 'NEWSONLY_SUBSCRIPTION_ENABLED', 'true', 'Are visitors allowed to subscribe to your newsletter without creating a customer account?', 1, 200, '0000-00-00 00:00:00', '2008-08-13 09:51:15', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (741, '->Admin 1 Name', 'LIVE_HELP_ADMIN_1_NAME', 'Cicely', 'Administrators 1 Name', 41, 1, '2009-07-28 04:15:46', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (831, '->Admin 4 Name', 'LIVE_HELP_ADMIN_4_NAME', 'vgoldzone', 'Admin 4 Name', 41, 16, '2009-07-28 04:18:38', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (740, 'Admin 1 Email', 'LIVE_HELP_ADMIN_1_EMAIL', 'service@vgoldzone.com', 'Enter your Tao Bao Wang Wang username', 41, 2, '2009-07-28 04:14:10', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (739, 'Admin 1 MSN', 'LIVE_HELP_ADMIN_1_MSN', 'test@hotmail.com-1d7037308d386f07', 'Administrators 1 MSN', 41, 3, '2010-07-26 09:43:58', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (738, 'Admin 1 Skype', 'LIVE_HELP_ADMIN_1_SKYPE', 'test', 'Administrators 1 Skype', 41, 4, '2010-07-26 10:10:16', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (830, 'Admin 3 Yahoo', 'LIVE_HELP_ADMIN_3_YAHOO', 'test@yahoo.com', 'Admin 3 Yahoo', 41, 15, '2010-07-26 10:53:08', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (737, 'Admin 1 Yahoo', 'LIVE_HELP_ADMIN_1_YAHOO', 'test@yahoo.com', 'Administrators 1 Yahoo', 41, 5, '2010-07-26 10:52:55', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (736, '->Admin 2 Name', 'LIVE_HELP_ADMIN_2_NAME', 'Alieen', 'Administrators 2 Name', 41, 6, '2009-07-28 04:15:57', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (829, 'Admin 3 Skype', 'LIVE_HELP_ADMIN_3_SKYPE', 'test', 'Admin 3 Skype', 41, 14, '2010-07-26 10:10:32', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (735, 'Admin 2 Email', 'LIVE_HELP_ADMIN_2_EMAIL', 'service@vgoldzone.com', 'Administrators 2 Email', 41, 7, '2009-07-28 04:16:08', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (828, 'Admin 3 Msn', 'LIVE_HELP_ADMIN_3_MSN', 'service@vgoldzone.com-1d7037308d386f07', 'Admin 3 Msn', 41, 13, '2010-07-26 09:44:30', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (734, 'Admin 2 MSN', 'LIVE_HELP_ADMIN_2_MSN', 'service@vgoldzone.com-1d7037308d386f07', 'Administrators 2 MSN', 41, 8, '2010-07-26 09:44:21', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (732, 'Admin 2 Skype', 'LIVE_HELP_ADMIN_2_SKYPE', 'test', 'Administrators 2 Skype', 41, 9, '2010-07-26 10:10:24', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (733, 'Admin 2 Yahoo', 'LIVE_HELP_ADMIN_2_YAHOO', 'test@yahoo.com', 'Administrators 2 Yahoo', 41, 10, '2010-07-26 10:53:01', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (731, '->Admin 3 Name', 'LIVE_HELP_ADMIN_3_NAME', 'Haye', 'Enter your Skype username', 41, 11, '2009-07-28 04:16:54', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (730, 'Admin 3 Email', 'LIVE_HELP_ADMIN_3_EMAIL', 'service@vgoldzone.com', 'Do you want to enable Skype in Live Help?', 41, 12, '2009-07-28 04:17:00', '2008-08-13 05:01:27', '', '');
INSERT INTO `configuration` VALUES (1346, 'Subscribed (2)', 'AUTO_SUBSCRIBED_2', 'true', '<br />Must be subscribed to newsletter', 48, 19, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1363, 'Text Message (3)', 'AUTO_MESSAGE_TEXT_3', 'Enter email here..', '<br />Enter main message<p />Carriage return sensitive<br />', 48, 36, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1364, 'HTML Message (3)', 'AUTO_MESSAGE_HTML_3', 'Enter email here..', '<br />Enter main message<p />HTML allowed<br />', 48, 37, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (815, 'Recently Viewed Sidebox Maximum', 'RECENT_VIEWED_PRODUCTS_MAXIMUM', '6', 'This sets the maximum number of recently viewed item a user can see. Set to empty for no limit.', 3, 900, '2008-08-16 14:04:32', '2008-08-16 11:42:42', '', '');
INSERT INTO `configuration` VALUES (2025, 'Zone 6 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_6', '', 'Comma separated list of two character ISO country codes that are part of Zone 6.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2018, 'Zone 3 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_3', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2019, 'Zone 4 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_4', '', 'Comma separated list of two character ISO country codes that are part of Zone 4.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2020, 'Zone 4 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_4', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 4 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 4 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (816, '->product tags page maxsize<-', 'PRODCUTTAGS_LIST_PAGE_SIZE', '100', '', 3, 0, '2009-07-23 10:41:27', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (832, 'Admin 4 E-mail', 'LIVE_HELP_ADMIN_4_EMAIL', 'service@vgoldzone.com', 'Admin 4 E-mail', 41, 17, '2009-07-28 04:17:56', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (833, 'Admin 4 Msn', 'LIVE_HELP_ADMIN_4_MSN', 'service@vgoldzone.com-1d7037308d386f07', 'Admin 4 Msn', 41, 18, '2010-07-26 09:44:38', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (834, 'Admin 4 Skype', 'LIVE_HELP_ADMIN_4_SKYPE', 'test', 'Admin 4 Skype', 41, 19, '2010-07-26 10:10:40', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (835, 'Admin 4 Yahoo', 'LIVE_HELP_ADMIN_4_YAHOO', 'test@yahoo.com', 'Admin 4 Yahoo', 41, 20, '2010-07-26 10:53:13', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (836, 'Compress XML File', 'GOOGLE_SITEMAP_COMPRESS', 'true', 'Compress Google XML Sitemap file', 42, 1, '2009-11-26 16:14:20', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (837, 'Products changefreq', 'GOOGLE_SITEMAP_PROD_CHANGE_FREQ', 'weekly', 'How frequently the Product pages page is likely to change.', 42, 2, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''always'', ''hourly'', ''daily'', ''weekly'', ''monthly'', ''yearly'', ''never''),');
INSERT INTO `configuration` VALUES (838, 'Category changefreq', 'GOOGLE_SITEMAP_CAT_CHANGE_FREQ', 'weekly', 'How frequently the Category pages page is likely to change.', 42, 3, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''always'', ''hourly'', ''daily'', ''weekly'', ''monthly'', ''yearly'', ''never''),');
INSERT INTO `configuration` VALUES (839, 'Lastmod tag format', 'GOOGLE_SITEMAP_LASTMOD_FORMAT', 'date', 'Lastmod tag format:<br />date - Complete date: YYYY-MM-DD (eg 1997-07-16)<br />full -    Complete date plus hours, minutes and seconds: YYYY-MM-DDThh:mm:ssTZD (eg 1997-07-16T19:20:30+01:00)', 42, 4, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''date'', ''full''),');
INSERT INTO `configuration` VALUES (840, 'Category priority', 'GOOGLE_SITEMAP_CAT_CHANGE_PRIOR', '0.5', 'The default priority of the products URL. Valid values range from 0.0 to 1.0.', 42, 3, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', '');
INSERT INTO `configuration` VALUES (841, 'Products priority', 'GOOGLE_SITEMAP_PROD_CHANGE_PRIOR', '0', 'The default priority of the products URL. Valid values range from 0.0 to 1.0.', 42, 5, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', '');
INSERT INTO `configuration` VALUES (842, 'Use Google Sitemaps Stylesheet', 'GOOGLE_SITEMAP_USE_XSL', 'true', 'Google Sitemaps Stylesheet gss.xsl', 42, 6, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (843, 'XML directory', 'GOOGLE_SITEMAP_XML_FS_DIRECTORY', '', 'Directory using for saving XML files. Setting it to your root directory. If empty, Google Sitemap use DIR_FS_CATALOG directory.', 42, 7, '2008-09-12 11:44:03', '2008-09-12 11:21:45', '', '');
INSERT INTO `configuration` VALUES (844, 'EZPages Header', 'GOOGLE_SITEMAP_EZPAGES_HEADER', 'true', 'Use EZPages Header links to feed sitemapezpages.xml?', 42, 10, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (845, 'EZPages Sidebox', 'GOOGLE_SITEMAP_EZPAGES_SIDEBOX', 'true', 'Use EZPages Sidebox links to feed sitemapezpages.xml?', 42, 10, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (846, 'EZPages Footer', 'GOOGLE_SITEMAP_EZPAGES_FOOTER', 'true', 'Use EZPages Footer links to feed sitemapezpages.xml?', 42, 10, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (847, 'EZPages changefreq', 'GOOGLE_SITEMAP_EZPAGES_CHANGE_FREQ', 'weekly', 'How frequently the EZPages pages page is likely to change.', 42, 3, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', 'zen_cfg_select_option(array(''always'', ''hourly'', ''daily'', ''weekly'', ''monthly'', ''yearly'', ''never''),');
INSERT INTO `configuration` VALUES (848, 'EZPages priority', 'GOOGLE_SITEMAP_EZPAGES_CHANGE_PRIOR', '0.5', 'The default priority of the EZPages URL. Valid values range from 0.0 to 1.0.', 42, 3, '0000-00-00 00:00:00', '2008-09-12 11:21:45', '', '');
INSERT INTO `configuration` VALUES (849, 'Products Info Popup Shipping Methods', 'PRODUCTS_INFO_POPUP_SHIPPING_METHODS', '<div class="margin_t red">This is Your Text</div>Time of transit varies depending on where you''re located and where your package is coming from.', 'Products Info Popup Shipping Methods', 43, 0, '2008-09-18 16:08:45', '0001-01-01 00:00:00', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (850, 'Products Info Popup Payment Methods', 'PRODUCTS_INFO_POPUP_PAYMENT_METHODS', '<div>Time of transit varies depending on where you''re <br/>located and where your package is coming from.</div>', 'Products Info Popup Payment Methods', 43, 0, '2008-09-16 09:16:14', '0001-01-01 00:00:00', '', 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1344, 'Order Status ID (2)', 'AUTO_ORDER_STATUS_ID_2', '3', '<br />Emails only send for orders with the following status:<p />(ignore if in <b>account</b> state)<br />', 48, 17, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1345, 'Days After (2)', 'AUTO_DAYS_AFTER_2', '21', '<br />Amount of days before email is sent', 48, 18, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1991, 'Enable Free Options Shipping', 'MODULE_SHIPPING_FREEOPTIONS_STATUS', 'True', 'Free Options is used to display a Free Shipping option when other Shipping Modules are displayed.\nIt can be based on: Always show, Order Total, Order Weight or Order Item Count.\nThe Free Options module does not show when Free Shipper is displayed.<br /><br />\nSetting Total to >= 0.00 and <= nothing (leave blank) will activate this module to show with all shipping modules, except for Free Shipping - freeshipper.<br /><br />\nNOTE: Leaving all settings for Total, Weight and Item count blank will deactivate this module.<br /><br />\nNOTE: Free Shipping Options does not display if Free Shipping is used based on 0 weight is Free Shipping.\nSee: freeshipper<br /><br />Do you want to offer per freeoptions rate shipping?', 6, 0, NULL, '2010-07-26 14:55:54', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (1992, 'Shipping Cost', 'MODULE_SHIPPING_FREEOPTIONS_COST', '0.00', 'The shipping cost will be $0.00', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1993, 'Handling Fee', 'MODULE_SHIPPING_FREEOPTIONS_HANDLING', '0', 'Handling fee for this shipping method.', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1994, 'Total >=', 'MODULE_SHIPPING_FREEOPTIONS_TOTAL_MIN', '0.00', 'Free Shipping when Total >=', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1995, 'Total <=', 'MODULE_SHIPPING_FREEOPTIONS_TOTAL_MAX', '', 'Free Shipping when Total <=', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1996, 'Weight >=', 'MODULE_SHIPPING_FREEOPTIONS_WEIGHT_MIN', '', 'Free Shipping when Weight >=', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1997, 'Weight <=', 'MODULE_SHIPPING_FREEOPTIONS_WEIGHT_MAX', '', 'Free Shipping when Weight <=', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1998, 'Item Count >=', 'MODULE_SHIPPING_FREEOPTIONS_ITEMS_MIN', '', 'Free Shipping when Item Count >=', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (1999, 'Item Count <=', 'MODULE_SHIPPING_FREEOPTIONS_ITEMS_MAX', '', 'Free Shipping when Item Count <=', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (2000, 'Tax Class', 'MODULE_SHIPPING_FREEOPTIONS_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2010-07-26 14:55:54', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (2001, 'Tax Basis', 'MODULE_SHIPPING_FREEOPTIONS_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 6, 0, NULL, '2010-07-26 14:55:54', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (2002, 'Shipping Zone', 'MODULE_SHIPPING_FREEOPTIONS_ZONE', '0', 'If a zone is selected, only enable this shipping method for that zone.', 6, 0, NULL, '2010-07-26 14:55:54', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(');
INSERT INTO `configuration` VALUES (2003, 'Sort Order', 'MODULE_SHIPPING_FREEOPTIONS_SORT_ORDER', '10', 'Sort order of display.', 6, 0, NULL, '2010-07-26 14:55:54', NULL, NULL);
INSERT INTO `configuration` VALUES (937, 'Wholesale Categories List', 'WHOLESALE_CATEGORIES_LIST', '1,19,766,767,34,27,46', 'Wholesale Categories List With Category ids', 45, 0, '2008-09-17 15:07:03', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (938, 'Dropship Categories List', 'DROPSHIP_CATEGORIES_LIST', '1,21,766,767,109,34,27,46', 'Dropship Categories List With Category ids', 45, 0, '2008-09-17 15:07:11', '0001-01-01 00:00:00', '', '');
INSERT INTO `configuration` VALUES (1248, 'Display Description As Link', 'DISPLAY_LINK_DESCRIPTION_AS_LINK', 'false', 'Display the links description as a link', 46, 3, '0000-00-00 00:00:00', '2008-09-28 12:14:40', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1365, 'Time Validation', 'AUTO_TIMER', 'false', '<br />Use time validation', 48, 38, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1366, 'Start Time', 'AUTO_START_TIME', '12:55:00', '<br />Enter start time<p />(Format: 00:00:00)<br />', 48, 39, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1367, 'End Time', 'AUTO_END_TIME', '13:05:00', '<br />Enter end time<p />(Format: 00:00:00)<br />', 48, 40, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1368, 'Log Emails', 'AUTO_LOG_EMAILS', 'true', '<br />Store a log of autoresponder activity, including sent emails', 48, 41, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1369, 'Log Directory', 'AUTO_LOG_DIRECTORY', '/home/your_web_username/tmp/', '<br />Directory where log is stored<p />Make sure chosen directory is writeable<br />', 48, 42, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', '');
INSERT INTO `configuration` VALUES (1370, 'Admin Copy', 'AUTO_ADMIN_COPY', 'true', '<br />Receive admin copy of email<p />(Copy only sent in live mode)', 48, 43, '0000-00-00 00:00:00', '2008-10-11 19:14:19', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (2009, 'Skip Countries, use a comma separated list of the two character ISO country codes', 'MODULE_SHIPPING_UPSZONES_SKIPPED', '', 'Disable for the following Countries:', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2010, 'Zone 1 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_1', 'US,CA', 'Comma separated list of two character ISO country codes that are part of Zone 1.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2011, 'Zone 1 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_1', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 1 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 1 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2012, 'Zone 1 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_1', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2013, 'Zone 2 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_2', '', 'Comma separated list of two character ISO country codes that are part of Zone 2.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2014, 'Zone 2 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_2', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 2 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 2 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2015, 'Zone 2 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_2', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2016, 'Zone 3 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_3', '', 'Comma separated list of two character ISO country codes that are part of Zone 3.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2017, 'Zone 3 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_3', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 3 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 3 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2008, 'Sort Order', 'MODULE_SHIPPING_UPSZONES_SORT_ORDER', '60', 'Sort order of display.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2004, 'Enable UPS Method', 'MODULE_SHIPPING_UPSZONES_STATUS', 'True', 'Do you want to offer UPS shipping?', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (2005, 'Calculation Method', 'MODULE_SHIPPING_UPSZONES_METHOD', 'Weight', 'Calculate cost based on Weight, Price or Item?', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_select_option(array(''Weight'', ''Price'', ''Item''), ');
INSERT INTO `configuration` VALUES (2006, 'Tax Class', 'MODULE_SHIPPING_UPSZONES_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2010-07-26 14:56:50', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (2007, 'Tax Basis', 'MODULE_SHIPPING_UPSZONES_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (1388, 'Display COD', 'MODULE_ORDER_TOTAL_COD_STATUS', 'true', 'Do you want this module to display?', 6, 1, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1389, 'Sort Order', 'MODULE_ORDER_TOTAL_COD_SORT_ORDER', '950', 'Sort order of display.', 6, 2, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1390, 'COD Fee for FLAT', 'MODULE_ORDER_TOTAL_COD_FEE_FLAT', 'AT:3.00,DE:3.58,00:9.99', 'FLAT: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 3, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1391, 'COD Fee for Free Shipping by default', 'MODULE_ORDER_TOTAL_COD_FEE_FREE', 'US:3.00', 'Free by default: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 3, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1392, 'COD Fee for Free Shipping Module - (freeshipper)', 'MODULE_ORDER_TOTAL_COD_FEE_FREESHIPPER', 'CA:4.50,US:3.00,00:9.99', 'Free Module: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 3, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1393, 'COD Fee for Free-Options Shipping Module - (freeoptions)', 'MODULE_ORDER_TOTAL_COD_FEE_FREEOPTIONS', 'CA:4.50,US:3.00,00:9.99', 'Free+Options: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 3, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1394, 'COD Fee for Per Weight Unit Shipping Module - (perweightunit)', 'MODULE_ORDER_TOTAL_COD_FEE_PERWEIGHTUNIT', 'CA:4.50,US:3.00,00:9.99', 'Per Weight Unit: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 3, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1395, 'COD Fee for ITEM', 'MODULE_ORDER_TOTAL_COD_FEE_ITEM', 'AT:3.00,DE:3.58,00:9.99', 'ITEM: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 4, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1396, 'COD Fee for TABLE', 'MODULE_ORDER_TOTAL_COD_FEE_TABLE', 'AT:3.00,DE:3.58,00:9.99', 'TABLE: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 5, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1397, 'COD Fee for UPS', 'MODULE_ORDER_TOTAL_COD_FEE_UPS', 'CA:4.50,US:3.00,00:9.99', 'UPS: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 6, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1398, 'COD Fee for USPS', 'MODULE_ORDER_TOTAL_COD_FEE_USPS', 'CA:4.50,US:3.00,00:9.99', 'USPS: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 7, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1399, 'COD Fee for ZONES', 'MODULE_ORDER_TOTAL_COD_FEE_ZONES', 'CA:4.50,US:3.00,00:9.99', 'ZONES: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 8, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1400, 'COD Fee for Austrian Post', 'MODULE_ORDER_TOTAL_COD_FEE_AP', 'AT:3.63,00:9.99', 'Austrian Post: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 9, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1401, 'COD Fee for German Post', 'MODULE_ORDER_TOTAL_COD_FEE_DP', 'DE:3.58,00:9.99', 'German Post: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 10, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1402, 'COD Fee for Servicepakke', 'MODULE_ORDER_TOTAL_COD_FEE_SERVICEPAKKE', 'NO:69', 'Servicepakke: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 11, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1403, 'COD Fee for FedEx', 'MODULE_ORDER_TOTAL_COD_FEE_FEDEX', 'US:3.00', 'FedEx: &lt;Country code&gt;:&lt;COD price&gt;, .... 00 as country code applies for all countries. If country code is 00, it must be the last statement. If no 00:9.99 appears, COD shipping in foreign countries is not calculated (not possible)', 6, 12, '0000-00-00 00:00:00', '2008-12-30 14:50:29', '', '');
INSERT INTO `configuration` VALUES (1404, 'Tax Class', 'MODULE_ORDER_TOTAL_COD_TAX_CLASS', '0', 'Use the following tax class on the COD fee.', 6, 25, '0000-00-00 00:00:00', '2008-12-30 14:50:29', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (1490, '智能标签行替换', 'EASYPOPULATE_CONFIG_SMART_TAGS', 'true', '上传文件中描述字段，回车符和换行符转换为HTML换行，防止格式错误(缺省: true)', 49, 7, NULL, '2009-03-29 22:23:59', NULL, 'zen_cfg_select_option(array("true", "false"),');
INSERT INTO `configuration` VALUES (1491, '高级智能标签', 'EASYPOPULATE_CONFIG_ADV_SMART_TAGS', 'false', '描述字段采用高级格式化，标题加粗、添加列表等。在ADMIN/easypopulate.php文件中设置 (缺省: false)', 49, 8, NULL, '2009-03-29 22:23:59', NULL, 'zen_cfg_select_option(array("true", "false"),');
INSERT INTO `configuration` VALUES (1483, '上传目录', 'EASYPOPULATE_CONFIG_TEMP_DIR', 'temp/', '上传目录的名称 (缺省: tempEP/)', 49, 0, NULL, '2009-03-29 22:23:59', NULL, NULL);
INSERT INTO `configuration` VALUES (1484, '上传文件日期格式', 'EASYPOPULATE_CONFIG_FILE_DATE_FORMAT', 'y-m-d', '选择上传文件日期格式，通常由MS Excel生成。上传文件的RAW日期 (例如 2005-09-26 09:00:00) 不受影响，会照样上传。', 49, 1, NULL, '2009-03-29 22:23:59', NULL, 'zen_cfg_select_option(array("m-d-y", "d-m-y", "y-m-d"),');
INSERT INTO `configuration` VALUES (1485, '缺省RAW时间格式', 'EASYPOPULATE_CONFIG_DEFAULT_RAW_TIME', '09:00:00', '如果上传文件中没有指定时间，将使用该值。适合指定特价在某个时间后生效。(缺省: 09:00:00)', 49, 2, NULL, '2009-03-29 22:23:59', NULL, NULL);
INSERT INTO `configuration` VALUES (1486, '在 # 记录后分割文件', 'EASYPOPULATE_CONFIG_SPLIT_MAX', '300', '缺省的分割上传文件的记录数目。用于防止大量上传时出现的超时。(缺省: 300)', 49, 3, NULL, '2009-03-29 22:23:59', NULL, NULL);
INSERT INTO `configuration` VALUES (1487, '最大分类深度', 'EASYPOPULATE_CONFIG_MAX_CATEGORY_LEVELS', '7', '商店的最大分类级数。为下载文件中分类栏目的数目(缺省: 7)', 49, 4, NULL, '2009-03-29 22:23:59', NULL, NULL);
INSERT INTO `configuration` VALUES (1488, '上传/下载价格含税', 'EASYPOPULATE_CONFIG_PRICE_INC_TAX', 'false', '选择价格是否含税。', 49, 5, NULL, '2009-03-29 22:23:59', NULL, 'zen_cfg_select_option(array("true", "false"),');
INSERT INTO `configuration` VALUES (1489, '零数量商品', 'EASYPOPULATE_CONFIG_ZERO_QTY_INACTIVE', 'false', '上传时，是否包含零数量商品。(缺省: false)', 49, 6, NULL, '2009-03-29 22:23:59', NULL, 'zen_cfg_select_option(array("true", "false"),');
INSERT INTO `configuration` VALUES (2026, 'Zone 6 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_6', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 6 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 6 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2027, 'Zone 6 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_6', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2021, 'Zone 4 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_4', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2022, 'Zone 5 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_5', '', 'Comma separated list of two character ISO country codes that are part of Zone 5.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2023, 'Zone 5 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_5', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 5 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 5 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2024, 'Zone 5 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_5', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (1492, '调试记录', 'EASYPOPULATE_CONFIG_DEBUG_LOGGING', 'true', '允许批量商品管理生成错误记录文件 (缺省: true)', 49, 9, NULL, '2009-03-29 22:23:59', NULL, 'zen_cfg_select_option(array("true", "false"),');
INSERT INTO `configuration` VALUES (2060, 'PayPal Mode', 'MODULE_PAYMENT_PAYPALWPP_MODULE_MODE', 'PayPal', 'Which PayPal API system should be used for processing? <br /><u>Choices:</u><br /><font color=green>For choice #1, you need to supply <strong>API Settings</strong> above.</font><br /><strong>1. PayPal</strong> = Express Checkout with a regular PayPal account<br />or<br /><font color=green>for choices 2 &amp; 3 you need to supply <strong>PAYFLOW settings</strong>, below (and have a Payflow account)</font><br /><strong>2. Payflow-UK</strong> = Website Payments Pro UK Payflow Edition<br /><strong>3. Payflow-US</strong> = Payflow Pro Gateway only<!--<br /><strong>4. PayflowUS+EC</strong> = Payflow Pro with Express Checkout-->', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''PayPal'', ''Payflow-UK'', ''Payflow-US''), ');
INSERT INTO `configuration` VALUES (1497, 'IH resize images', 'IH_RESIZE', 'yes', 'Select either ''no'' which is old Zen-Cart behaviour or ''yes'' to activate automatic resizing and caching of images. If you want to use ImageMagick you have to specify the location of the <strong>convert</strong> binary in <em>includes/extra_configures/bmz_image_handler_conf.php</em>.', 4, 100, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''yes'', ''no''),');
INSERT INTO `configuration` VALUES (1498, 'IH small image filetype', 'SMALL_IMAGE_FILETYPE', 'no_change', 'Select one of ''jpg'', ''gif'' or ''png''. Internet Explorer has still issues displaying png-images with transparent areas. You better stick to ''gif'' for transparency or ''jpg'' for larger images. ''no_change'' is old zen-cart behavior, use the same file extension for small images as uploaded image''s.', 4, 101, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''gif'', ''jpg'', ''png'', ''no_change''),');
INSERT INTO `configuration` VALUES (1499, 'IH small image background', 'SMALL_IMAGE_BACKGROUND', '255:255:255', 'If converted from an uploaded image with transparent areas, these areas become the specified color. Set to ''transparent'' to keep transparency.', 4, 102, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1500, 'IH watermark small images', 'WATERMARK_SMALL_IMAGES', 'yes', 'Set to ''yes'', if you want to show watermarked small images instead of unmarked small images.', 4, 103, '2010-07-20 17:53:57', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1501, 'IH zoom small images', 'ZOOM_SMALL_IMAGES', 'yes', 'Set to ''yes'', if you want to enable a nice zoom overlay while hovering the mouse pointer over small images.', 4, 104, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1502, 'IH small image hotzone', 'SMALL_IMAGE_HOTZONE', 'no', 'Set to ''yes'', if you want the nice zoom overlay to appear while hovering the mouse pointer over the small images'' hotzone only instead of the whole image. The hotzone will be defined by the uploaded zoom overlay image and it''s position relative to the image (gravity).', 4, 105, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1503, 'IH small image compression quality', 'SMALL_IMAGE_QUALITY', '85', 'Specify the desired image quality for small jpg images, decimal values ranging from 0 to 100. Higher is better quality and takes more space. Default is 85 which is ok unless you have very specific needs.', 4, 106, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1504, 'IH medium image filetype', 'MEDIUM_IMAGE_FILETYPE', 'no_change', 'Select one of ''jpg'', ''gif'' or ''png''. Internet Explorer has still issues displaying png-images with transparent areas. You better stick to ''gif'' for transparency or ''jpg'' for larger images. ''no_change'' is old zen-cart behavior, use the same file extension for medium images as uploaded image''s.', 4, 107, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''gif'', ''jpg'', ''png'', ''no_change''),');
INSERT INTO `configuration` VALUES (1505, 'IH medium image background', 'MEDIUM_IMAGE_BACKGROUND', '255:255:255', 'If converted from an uploaded image with transparent areas, these areas become the specified color. Set to ''transparent'' to keep transparency.', 4, 108, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1506, 'IH watermark medium images', 'WATERMARK_MEDIUM_IMAGES', 'yes', 'Set to ''yes'', if you want to show watermarked medium images instead of unmarked medium images.', 4, 109, '2010-07-20 17:44:02', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1507, 'IH zoom medium images', 'ZOOM_MEDIUM_IMAGES', 'no', 'Set to ''yes'', if you want to enable a nice zoom overlay while hovering the mouse pointer over medium images.', 4, 110, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1508, 'IH medium image hotzone', 'MEDIUM_IMAGE_HOTZONE', 'no', 'Set to ''yes'', if you want the nice zoom overlay to appear while hovering the mouse pointer over the medium images'' hotzone only instead of the whole image. The hotzone will be defined by the uploaded zoom overlay image and it''s position relative to the image (gravity).', 4, 111, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1509, 'IH medium image compression quality', 'MEDIUM_IMAGE_QUALITY', '85', 'Specify the desired image quality for medium jpg images, decimal values ranging from 0 to 100. Higher is better quality and takes more space. Default is 85 which is ok unless you have very specific needs.', 4, 112, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1510, 'IH large image filetype', 'LARGE_IMAGE_FILETYPE', 'no_change', 'Select one of ''jpg'', ''gif'' or ''png''. Internet Explorer has still issues displaying png-images with transparent areas. You better stick to ''gif'' for transparency or ''jpg'' for larger images. ''no_change'' is old zen-cart behavior, use the same file extension for large images as uploaded image''s.', 4, 113, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''gif'', ''jpg'', ''png'', ''no_change''),');
INSERT INTO `configuration` VALUES (1511, 'IH large image background', 'LARGE_IMAGE_BACKGROUND', '255:255:255', 'If converted from an uploaded image with transparent areas, these areas become the specified color. Set to ''transparent'' to keep transparency.', 4, 114, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1512, 'IH watermark large images', 'WATERMARK_LARGE_IMAGES', 'yes', 'Set to ''yes'', if you want to show watermarked large images instead of unmarked large images.', 4, 115, '2010-07-20 17:43:53', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1513, 'IH large image compression quality', 'LARGE_IMAGE_QUALITY', '85', 'Specify the desired image quality for large jpg images, decimal values ranging from 0 to 100. Higher is better quality and takes more space. Default is 85 which is ok unless you have very specific needs.', 4, 116, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1514, 'IH large image maximum width', 'LARGE_IMAGE_MAX_WIDTH', '750', 'Specify a maximum width for your large images. If width and height are empty or set to 0, no resizing of large images is done.', 4, 117, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1515, 'IH large image maximum height', 'LARGE_IMAGE_MAX_HEIGHT', '550', 'Specify a maximum height for your large images. If width and height are empty or set to 0, no resizing of large images is done.', 4, 118, NULL, '2009-06-09 10:55:42', NULL, 'zen_cfg_textarea_small(');
INSERT INTO `configuration` VALUES (1516, 'IH watermark gravity', 'WATERMARK_GRAVITY', 'East', 'Select the position for the watermark relative to the image''s canvas. Default is <strong>Center</Strong>.', 4, 119, '2009-06-25 13:21:07', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''NorthWest'', ''text''=>''NorthWest''), array(''id''=>''North'', ''text''=>''North''), array(''id''=>''NorthEast'', ''text''=>''NorthEast''), array(''id''=>''West'', ''text''=>''West''), array(''id''=>''Center'', ''text''=>''Center''), array(''id''=>''East'', ''text''=>''East''), array(''id''=>''SouthWest'', ''text''=>''SouthWest''), array(''id''=>''South'', ''text''=>''South''), array(''id''=>''SouthEast'', ''text''=>''SouthEast'')),');
INSERT INTO `configuration` VALUES (1517, 'IH zoom gravity', 'ZOOM_GRAVITY', 'North', 'Select the position for the zoom-hint overlay relative to the image''s canvas. Default is <strong>SouthEast</Strong>.', 4, 120, '2009-06-25 11:40:34', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''NorthWest'', ''text''=>''NorthWest''), array(''id''=>''North'', ''text''=>''North''), array(''id''=>''NorthEast'', ''text''=>''NorthEast''), array(''id''=>''West'', ''text''=>''West''), array(''id''=>''Center'', ''text''=>''Center''), array(''id''=>''East'', ''text''=>''East''), array(''id''=>''SouthWest'', ''text''=>''SouthWest''), array(''id''=>''South'', ''text''=>''South''), array(''id''=>''SouthEast'', ''text''=>''SouthEast'')),');
INSERT INTO `configuration` VALUES (2067, 'GZIP level', 'SIMPLE_CACHE_GZIP_LEVEL', '0', '0 means no gzip, and 9 is the maxiumum level. The higher the level is, the slower it will take to do the compressing and the more load it will put on the CPU', 51, 1, '2010-12-21 17:01:48', '2010-12-21 17:01:48', NULL, NULL);
INSERT INTO `configuration` VALUES (2055, 'API Signature -- Signature Code', 'MODULE_PAYMENT_PAYPALWPP_APISIGNATURE', '', 'The API Signature from your PayPal API Signature settings under *API Access*. This value is a 56-character code, and is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (2056, 'PAYFLOW: User', 'MODULE_PAYMENT_PAYPALWPP_PFUSER', '', 'If you set up one or more additional users on the account, this value is the ID of the user authorized to process transactions. Otherwise it should be the same value as VENDOR. This value is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (2057, 'PAYFLOW: Partner', 'MODULE_PAYMENT_PAYPALWPP_PFPARTNER', 'ZenCart', 'Your Payflow Partner linked to your Payflow account. This value is case-sensitive.<br />Typical values: <strong>PayPal</strong> or <strong>ZenCart</strong>', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (2058, 'PAYFLOW: Vendor', 'MODULE_PAYMENT_PAYPALWPP_PFVENDOR', '', 'Your merchant login ID that you created when you registered for the Payflow Pro account. This value is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (2059, 'PAYFLOW: Password', 'MODULE_PAYMENT_PAYPALWPP_PFPASSWORD', '', 'The 6- to 32-character password that you defined while registering for the account. This value is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', 'zen_cfg_password_display', 'zen_cfg_password_input(');
INSERT INTO `configuration` VALUES (1547, 'Enable Western Union Order Module', 'MODULE_PAYMENT_WESTERNUNION_STATUS', 'True', 'Do you want to accept Western Union Order payments?', 6, 1, NULL, '2009-06-19 14:16:08', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (1548, 'First Name', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_FIRST_NAME', 'Zhouqing', '', 6, 2, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1549, 'Last Name', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_LAST_NAME', 'Cai', '', 6, 3, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1550, 'Address', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_ADDRESS', '', '', 6, 4, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1551, 'Zip Code', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_ZIP', '', '', 6, 5, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1552, 'City', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_CITY', 'fuzhou', '', 6, 6, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1553, 'Country', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_COUNTRY', 'China', '', 6, 7, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1554, 'Phone', 'MODULE_PAYMENT_WESTERNUNION_RECEIVER_PHONE', '0591-83369175', '', 6, 8, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1555, 'Sort order of display.', 'MODULE_PAYMENT_WESTERNUNION_SORT_ORDER', '2', 'Sort order of display. Lowest is displayed first.', 6, 0, NULL, '2009-06-19 14:16:08', NULL, NULL);
INSERT INTO `configuration` VALUES (1556, 'Set Order Status', 'MODULE_PAYMENT_WESTERNUNION_ORDER_STATUS_ID', '1', 'Set the status of orders made with this payment module to this value', 6, 0, NULL, '2009-06-19 14:16:08', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (2046, 'Payment Zone', 'MODULE_PAYMENT_PAYPALWPP_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 25, NULL, '2010-11-03 18:35:26', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(');
INSERT INTO `configuration` VALUES (2047, 'Set Order Status', 'MODULE_PAYMENT_PAYPALWPP_ORDER_STATUS_ID', '2', 'Set the status of orders paid with this payment module to this value. <br /><strong>Recommended: Processing[2]</strong>', 6, 25, NULL, '2010-11-03 18:35:26', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (2048, 'Set Unpaid Order Status', 'MODULE_PAYMENT_PAYPALWPP_ORDER_PENDING_STATUS_ID', '1', 'Set the status of unpaid orders made with this payment module to this value. <br /><strong>Recommended: Pending[1]</strong>', 6, 25, NULL, '2010-11-03 18:35:26', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (2049, 'Set Refund Order Status', 'MODULE_PAYMENT_PAYPALWPP_REFUNDED_STATUS_ID', '1', 'Set the status of refunded orders to this value. <br /><strong>Recommended: Pending[1]</strong>', 6, 25, NULL, '2010-11-03 18:35:26', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (2050, 'PayPal Page Style', 'MODULE_PAYMENT_PAYPALWPP_PAGE_STYLE', 'Primary', 'The page-layout style you want customers to see when they visit the PayPal site. You can configure your <strong>Custom Page Styles</strong> in your PayPal Profile settings. This value is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (2051, 'Payment Action', 'MODULE_PAYMENT_PAYPALWPP_TRANSACTION_MODE', 'Final Sale', 'How do you want to obtain payment?<br /><strong>Default: Final Sale</strong>', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Auth Only'', ''Final Sale''), ');
INSERT INTO `configuration` VALUES (2052, 'Transaction Currency', 'MODULE_PAYMENT_PAYPALWPP_CURRENCY', 'Selected Currency', 'Which currency should the order be sent to PayPal as? <br />NOTE: if an unsupported currency is sent to PayPal, it will be auto-converted to USD (or GBP if using UK account)<br /><strong>Default: Selected Currency</strong>', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Selected Currency'', ''Only USD'', ''Only AUD'', ''Only CAD'', ''Only EUR'', ''Only GBP'', ''Only CHF'', ''Only CZK'', ''Only DKK'', ''Only HKD'', ''Only HUF'', ''Only JPY'', ''Only NOK'', ''Only NZD'', ''Only PLN'', ''Only SEK'', ''Only SGD'', ''Only THB''), ');
INSERT INTO `configuration` VALUES (2053, 'API Signature -- Username', 'MODULE_PAYMENT_PAYPALWPP_APIUSERNAME', '', 'The API Username from your PayPal API Signature settings under *API Access*. This value typically looks like an email address and is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (2054, 'API Signature -- Password', 'MODULE_PAYMENT_PAYPALWPP_APIPASSWORD', '', 'The API Password from your PayPal API Signature settings under *API Access*. This value is a 16-character code and is case-sensitive.', 6, 25, NULL, '2010-11-03 18:35:26', 'zen_cfg_password_display', 'zen_cfg_password_input(');
INSERT INTO `configuration` VALUES (2038, 'Enable this Payment Module', 'MODULE_PAYMENT_PAYPALWPP_STATUS', 'True', 'Do you want to enable this payment module?', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (2039, 'Enable Direct Payment', 'MODULE_PAYMENT_PAYPALWPP_DIRECT_ENABLED', 'False', 'Would you like to enable credit card payments through PayPal DIRECTLY on your website? <br />(<strong>NOTE:</strong> You need to be subscribed to Website Payments Pro or Payflow Pro to use this feature.)', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (2040, 'Live or Sandbox', 'MODULE_PAYMENT_PAYPALWPP_SERVER', 'live', '<strong>Live: </strong> Used to process Live transactions<br><strong>Sandbox: </strong>For developers and testing', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''live'', ''sandbox''), ');
INSERT INTO `configuration` VALUES (2041, 'Express Checkout: Require Confirmed Address', 'MODULE_PAYMENT_PAYPALWPP_CONFIRMED_ADDRESS', 'No', 'Do you want to require that your customers use a *confirmed* address when choosing their shipping address in PayPal?', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Yes'', ''No''), ');
INSERT INTO `configuration` VALUES (2042, 'Express Checkout: Select Cheapest Shipping Automatically', 'MODULE_PAYMENT_PAYPALWPP_AUTOSELECT_CHEAPEST_SHIPPING', 'Yes', 'When customer returns from PayPal, do we want to automatically select the Cheapest shipping method and skip the shipping page? (making it more *express*)<br />Note: enabling this means the customer does *not* have easy access to select an alternate shipping method (without going back to the Checkout-Step-1 page)', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Yes'', ''No''), ');
INSERT INTO `configuration` VALUES (2043, 'Express Checkout: Skip Payment Page', 'MODULE_PAYMENT_PAYPALWPP_SKIP_PAYMENT_PAGE', 'Yes', 'If the customer is checking out with Express Checkout, do you want to skip the checkout payment page, making things more *express*? <br /><strong>(NOTE: The Payment Page will auto-display regardless of this setting if you have Coupons or Gift Certificates enabled in your store.)</strong>', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Yes'', ''No''), ');
INSERT INTO `configuration` VALUES (2044, 'Express Checkout: Automatic Account Creation', 'MODULE_PAYMENT_PAYPALWPP_NEW_ACCT_NOTIFY', 'Yes', 'If a visitor is not an existing customer, a Zen Cart account is created for them.  Would you like make it a permanent account and send them an email containing their login information?<br />NOTE: Permanent accounts are auto-created if the customer purchases downloads or gift certificates, regardless of this setting.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Yes'', ''No''), ');
INSERT INTO `configuration` VALUES (2045, 'Sort order of display.', 'MODULE_PAYMENT_PAYPALWPP_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, NULL);
INSERT INTO `configuration` VALUES (1764, 'Enable IPS Module', 'MODULE_PAYMENT_IPS_STATUS', 'True', 'Do you want to accept IPS payments?', 6, 1, NULL, '2009-08-06 17:50:27', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (1765, 'IPS ID', 'MODULE_PAYMENT_IPS_SELLER', '012639', 'IPS ID', 6, 2, NULL, '2009-08-06 17:50:27', NULL, NULL);
INSERT INTO `configuration` VALUES (1766, 'IPS MD5 key', 'MODULE_PAYMENT_IPS_MD5KEY', 'g1JypC97fkY5be0Fb4581dGFtPuvsKl7j9RAD8yAjlRA8SjmUmxJmuNcLee0rnpuY1v1nPb3fVyqlfh1Gi0fx2uPLOP94YsVW7Ch6HYelUDrV7RGXDJjNjW5g6Fza1Zg', 'IPS MD5 key', 6, 3, NULL, '2009-08-06 17:50:27', NULL, NULL);
INSERT INTO `configuration` VALUES (1767, 'Anti-Fraud System', 'MODULE_PAYMENT_IPS_ANTIFRAUD', 'False', 'False: Disable<br />True: Enabled', 6, 4, NULL, '2009-08-06 17:50:27', NULL, 'zen_cfg_select_option(array(''False'', ''True''), ');
INSERT INTO `configuration` VALUES (1768, 'Payment Zone', 'MODULE_PAYMENT_IPS_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', 6, 6, NULL, '2009-08-06 17:50:27', 'zen_get_zone_class_title', 'zen_cfg_pull_down_zone_classes(');
INSERT INTO `configuration` VALUES (1769, 'Set Order Status', 'MODULE_PAYMENT_IPS_PROCESSING_STATUS_ID', '2', 'Set the status of orders made with this payment module that have completed payment to this value<br />(Processing recommended)', 6, 8, NULL, '2009-08-06 17:50:27', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (1770, 'Set Pending Notification Status', 'MODULE_PAYMENT_IPS_ORDER_STATUS_ID', '1', 'Set the status of orders made with this payment module to this value<br />(Pending recommended)', 6, 10, NULL, '2009-08-06 17:50:27', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (1771, 'Sort order of display', 'MODULE_PAYMENT_IPS_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', 6, 12, NULL, '2009-08-06 17:50:27', NULL, NULL);
INSERT INTO `configuration` VALUES (1772, 'IPS transaction URL<br />Live: <code>https://pay.ips.com.cn/ipayment.aspx</code><br />Test: <code>http://pay.ips.net.cn/ipayment.aspx</code><br />', 'MODULE_PAYMENT_IPS_HANDLER', 'https://pay.ips.com.cn/ipayment.aspx', '', 6, 18, NULL, '2009-08-06 17:50:27', NULL, 'zen_cfg_select_option(array(''https://pay.ips.com.cn/ipayment.aspx'', ''http://pay.ips.net.cn/ipayment.aspx''), ');
INSERT INTO `configuration` VALUES (1773, 'Debug Mode', 'MODULE_PAYMENT_IPS_IPN_DEBUG', 'Log File', 'Enable debug logging? <br />NOTE: This can REALLY clutter your email inbox!<br />Logging goes to the /includes/modules/payment/ips/logs folder<br />Email goes to the Debug Email Address.<br /><strong>Leave OFF for normal operation.</strong>', 6, 20, NULL, '2009-08-06 17:50:27', NULL, 'zen_cfg_select_option(array(''Off'',''Log File'',''Log and Email''), ');
INSERT INTO `configuration` VALUES (1774, 'Debug Email Address', 'MODULE_PAYMENT_IPS_DEBUG_EMAIL_ADDRESS', 'watches@igpal.com', 'The email address to use for IPS debugging', 6, 22, NULL, '2009-08-06 17:50:27', NULL, NULL);
INSERT INTO `configuration` VALUES (1840, 'Homepage title', 'HOMEPAGE_TITLE', 'mazentop0803 title today', 'set the home page title', 1, 201, '2010-08-04 17:39:46', '0001-01-01 00:00:00', NULL, NULL);
INSERT INTO `configuration` VALUES (1841, 'Homepage keywords', 'HOMEPAGE_KEYWORDS', 'mazentop0803 keywords', 'set the home page keywords', 1, 202, '2010-06-26 12:30:00', '0001-01-01 00:00:00', NULL, NULL);
INSERT INTO `configuration` VALUES (1842, 'Homepage description', 'HOMEPAGE_DESCRIPTION', 'mazentop0803 description', 'set the home page description', 1, 203, '2010-06-26 12:29:52', '0001-01-01 00:00:00', NULL, NULL);
INSERT INTO `configuration` VALUES (1843, 'Show header free shipping', 'SHOW_HEADER_FREE_SHIPPING', 'true', 'set show/hide header free shipping image,options are ''true'' or ''false''', 1, 204, '2010-06-26 15:01:26', '2010-06-26 14:52:33', NULL, 'zen_cfg_select_option(array(''true'',''false''),');
INSERT INTO `configuration` VALUES (1844, 'Show header theme switch', 'SHOW_HEADER_THEME_SWITCH', 'true', 'show/hide header theme switch', 1, 205, '2010-06-26 15:01:31', '2010-06-26 14:56:02', NULL, 'zen_cfg_select_option(array(''true'',''false''),');
INSERT INTO `configuration` VALUES (1846, 'product shortcut', 'INDEX_PRODUCT_SHORTCUT', 'hello', 'set the product shortcut', 1, 2, '2010-07-01 15:31:58', '2010-07-01 15:30:55', NULL, NULL);
INSERT INTO `configuration` VALUES (1847, 'default theme', 'INDEX_DEFAULT_THEME', '1', 'set the default theme', 1, 2, '2010-07-25 09:46:46', '2010-07-01 16:16:02', NULL, NULL);
INSERT INTO `configuration` VALUES (1848, 'Enable DHL Method', 'MODULE_SHIPPING_DHLZONES_STATUS', 'True', 'Do you want to offer DHL shipping?', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (1849, 'Calculation Method', 'MODULE_SHIPPING_DHLZONES_METHOD', 'Weight', 'Calculate cost based on Weight, Price or Item?', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_select_option(array(''Weight'', ''Price'', ''Item''), ');
INSERT INTO `configuration` VALUES (1850, 'Tax Class', 'MODULE_SHIPPING_DHLZONES_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2010-07-13 14:35:15', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (1851, 'Tax Basis', 'MODULE_SHIPPING_DHLZONES_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (1852, 'Sort Order', 'MODULE_SHIPPING_DHLZONES_SORT_ORDER', '20', 'Sort order of display.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1853, 'Skip Countries, use a comma separated list of the two character ISO country codes', 'MODULE_SHIPPING_DHLZONES_SKIPPED', '', 'Disable for the following Countries:', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1854, 'Zone 1 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_1', 'US,CA', 'Comma separated list of two character ISO country codes that are part of Zone 1.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1855, 'Zone 1 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_1', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 1 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 1 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1856, 'Zone 1 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_1', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1857, 'Zone 2 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_2', '', 'Comma separated list of two character ISO country codes that are part of Zone 2.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1858, 'Zone 2 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_2', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 2 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 2 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1859, 'Zone 2 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_2', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1860, 'Zone 3 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_3', '', 'Comma separated list of two character ISO country codes that are part of Zone 3.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1861, 'Zone 3 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_3', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 3 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 3 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1862, 'Zone 3 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_3', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1863, 'Zone 4 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_4', '', 'Comma separated list of two character ISO country codes that are part of Zone 4.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1864, 'Zone 4 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_4', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 4 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 4 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1865, 'Zone 4 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_4', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1866, 'Zone 5 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_5', '', 'Comma separated list of two character ISO country codes that are part of Zone 5.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1867, 'Zone 5 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_5', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 5 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 5 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1868, 'Zone 5 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_5', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1869, 'Zone 6 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_6', '', 'Comma separated list of two character ISO country codes that are part of Zone 6.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1870, 'Zone 6 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_6', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 6 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 6 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1871, 'Zone 6 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_6', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1872, 'Zone 7 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_7', '', 'Comma separated list of two character ISO country codes that are part of Zone 7.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1873, 'Zone 7 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_7', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 7 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 7 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1874, 'Zone 7 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_7', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1875, 'Zone 8 Countries', 'MODULE_SHIPPING_DHLZONES_COUNTRIES_8', '', 'Comma separated list of two character ISO country codes that are part of Zone 8.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1876, 'Zone 8 Shipping Table', 'MODULE_SHIPPING_DHLZONES_COST_8', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 8 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 8 destinations.', 6, 0, NULL, '2010-07-13 14:35:15', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1877, 'Zone 8 Handling Fee', 'MODULE_SHIPPING_DHLZONES_HANDLING_8', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:35:15', NULL, NULL);
INSERT INTO `configuration` VALUES (1878, 'Enable EMS Method', 'MODULE_SHIPPING_EMSZONES_STATUS', 'True', 'Do you want to offer EMS shipping?', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (1879, 'Calculation Method', 'MODULE_SHIPPING_EMSZONES_METHOD', 'Weight', 'Calculate cost based on Weight, Price or Item?', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_select_option(array(''Weight'', ''Price'', ''Item''), ');
INSERT INTO `configuration` VALUES (1880, 'Tax Class', 'MODULE_SHIPPING_EMSZONES_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2010-07-13 14:44:35', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (1881, 'Tax Basis', 'MODULE_SHIPPING_EMSZONES_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (1882, 'Sort Order', 'MODULE_SHIPPING_EMSZONES_SORT_ORDER', '30', 'Sort order of display.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1883, 'Skip Countries, use a comma separated list of the two character ISO country codes', 'MODULE_SHIPPING_EMSZONES_SKIPPED', '', 'Disable for the following Countries:', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1884, 'Zone 1 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_1', 'US,CA', 'Comma separated list of two character ISO country codes that are part of Zone 1.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1885, 'Zone 1 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_1', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 1 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 1 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1886, 'Zone 1 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_1', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1887, 'Zone 2 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_2', '', 'Comma separated list of two character ISO country codes that are part of Zone 2.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1888, 'Zone 2 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_2', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 2 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 2 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1889, 'Zone 2 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_2', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1890, 'Zone 3 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_3', '', 'Comma separated list of two character ISO country codes that are part of Zone 3.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1891, 'Zone 3 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_3', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 3 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 3 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1892, 'Zone 3 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_3', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1893, 'Zone 4 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_4', '', 'Comma separated list of two character ISO country codes that are part of Zone 4.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1894, 'Zone 4 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_4', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 4 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 4 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1895, 'Zone 4 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_4', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1896, 'Zone 5 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_5', '', 'Comma separated list of two character ISO country codes that are part of Zone 5.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1897, 'Zone 5 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_5', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 5 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 5 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1898, 'Zone 5 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_5', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1899, 'Zone 6 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_6', '', 'Comma separated list of two character ISO country codes that are part of Zone 6.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1900, 'Zone 6 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_6', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 6 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 6 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1901, 'Zone 6 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_6', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1902, 'Zone 7 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_7', '', 'Comma separated list of two character ISO country codes that are part of Zone 7.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1903, 'Zone 7 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_7', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 7 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 7 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1904, 'Zone 7 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_7', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1905, 'Zone 8 Countries', 'MODULE_SHIPPING_EMSZONES_COUNTRIES_8', '', 'Comma separated list of two character ISO country codes that are part of Zone 8.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1906, 'Zone 8 Shipping Table', 'MODULE_SHIPPING_EMSZONES_COST_8', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 8 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 8 destinations.', 6, 0, NULL, '2010-07-13 14:44:35', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1907, 'Zone 8 Handling Fee', 'MODULE_SHIPPING_EMSZONES_HANDLING_8', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:44:35', NULL, NULL);
INSERT INTO `configuration` VALUES (1908, 'Enable Fedex Method', 'MODULE_SHIPPING_FEDEXZONES_STATUS', 'True', 'Do you want to offer Fedex shipping?', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_select_option(array(''True'', ''False''), ');
INSERT INTO `configuration` VALUES (1909, 'Calculation Method', 'MODULE_SHIPPING_FEDEXZONES_METHOD', 'Weight', 'Calculate cost based on Weight, Price or Item?', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_select_option(array(''Weight'', ''Price'', ''Item''), ');
INSERT INTO `configuration` VALUES (1910, 'Tax Class', 'MODULE_SHIPPING_FEDEXZONES_TAX_CLASS', '0', 'Use the following tax class on the shipping fee.', 6, 0, NULL, '2010-07-13 14:47:13', 'zen_get_tax_class_title', 'zen_cfg_pull_down_tax_classes(');
INSERT INTO `configuration` VALUES (1911, 'Tax Basis', 'MODULE_SHIPPING_FEDEXZONES_TAX_BASIS', 'Shipping', 'On what basis is Shipping Tax calculated. Options are<br />Shipping - Based on customers Shipping Address<br />Billing Based on customers Billing address<br />Store - Based on Store address if Billing/Shipping Zone equals Store zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_select_option(array(''Shipping'', ''Billing'', ''Store''), ');
INSERT INTO `configuration` VALUES (1912, 'Sort Order', 'MODULE_SHIPPING_FEDEXZONES_SORT_ORDER', '50', 'Sort order of display.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1913, 'Skip Countries, use a comma separated list of the two character ISO country codes', 'MODULE_SHIPPING_FEDEXZONES_SKIPPED', '', 'Disable for the following Countries:', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1914, 'Zone 1 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_1', 'US,CA', 'Comma separated list of two character ISO country codes that are part of Zone 1.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1915, 'Zone 1 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_1', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 1 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 1 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1916, 'Zone 1 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_1', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1917, 'Zone 2 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_2', '', 'Comma separated list of two character ISO country codes that are part of Zone 2.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1918, 'Zone 2 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_2', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 2 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 2 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1919, 'Zone 2 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_2', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1920, 'Zone 3 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_3', '', 'Comma separated list of two character ISO country codes that are part of Zone 3.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1921, 'Zone 3 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_3', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 3 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 3 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1922, 'Zone 3 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_3', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1923, 'Zone 4 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_4', '', 'Comma separated list of two character ISO country codes that are part of Zone 4.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1924, 'Zone 4 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_4', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 4 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 4 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1925, 'Zone 4 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_4', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1926, 'Zone 5 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_5', '', 'Comma separated list of two character ISO country codes that are part of Zone 5.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1927, 'Zone 5 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_5', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 5 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 5 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1928, 'Zone 5 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_5', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1929, 'Zone 6 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_6', '', 'Comma separated list of two character ISO country codes that are part of Zone 6.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1930, 'Zone 6 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_6', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 6 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 6 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1931, 'Zone 6 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_6', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1932, 'Zone 7 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_7', '', 'Comma separated list of two character ISO country codes that are part of Zone 7.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1933, 'Zone 7 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_7', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 7 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 7 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1934, 'Zone 7 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_7', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (1935, 'Zone 8 Countries', 'MODULE_SHIPPING_FEDEXZONES_COUNTRIES_8', '', 'Comma separated list of two character ISO country codes that are part of Zone 8.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1936, 'Zone 8 Shipping Table', 'MODULE_SHIPPING_FEDEXZONES_COST_8', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 8 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 8 destinations.', 6, 0, NULL, '2010-07-13 14:47:13', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (1937, 'Zone 8 Handling Fee', 'MODULE_SHIPPING_FEDEXZONES_HANDLING_8', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-13 14:47:13', NULL, NULL);
INSERT INTO `configuration` VALUES (2036, 'Installed Modules', '', '', 'This is automatically updated. No need to edit.', 6, 0, NULL, '2010-08-12 17:32:17', NULL, NULL);
INSERT INTO `configuration` VALUES (2035, 'Product Info - Image jqzoom', 'MEDIUM_IMAGE_JQZOOM', 'no', 'Set to ''yes'', if you want to show jqzoom.', 4, 109, '2010-08-12 10:28:53', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (2033, 'Zone 8 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_8', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (2034, '4PX Shipping Exchange', 'CONFIG_4PX_SHIPPING_EXCHANGE', '6.8', '4PX Shipping Exchange', 7, 50, '2010-08-12 09:43:54', '2010-08-12 09:43:54', NULL, NULL);
INSERT INTO `configuration` VALUES (2032, 'Zone 8 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_8', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 8 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 8 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2031, 'Zone 8 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_8', '', 'Comma separated list of two character ISO country codes that are part of Zone 8.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2028, 'Zone 7 Countries', 'MODULE_SHIPPING_UPSZONES_COUNTRIES_7', '', 'Comma separated list of two character ISO country codes that are part of Zone 7.<br />Set as 00 to indicate all two character ISO country codes that are not specifically defined.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2029, 'Zone 7 Shipping Table', 'MODULE_SHIPPING_UPSZONES_COST_7', '3:8.50,7:10.50,99:20.00', 'Shipping rates to Zone 7 destinations based on a group of maximum order weights/prices. Example: 3:8.50,7:10.50,... Weight/Price less than or equal to 3 would cost 8.50 for Zone 7 destinations.', 6, 0, NULL, '2010-07-26 14:56:50', NULL, 'zen_cfg_textarea(');
INSERT INTO `configuration` VALUES (2030, 'Zone 7 Handling Fee', 'MODULE_SHIPPING_UPSZONES_HANDLING_7', '0', 'Handling Fee for this shipping zone', 6, 0, NULL, '2010-07-26 14:56:50', NULL, NULL);
INSERT INTO `configuration` VALUES (1971, 'This module is installed', 'MODULE_ORDER_TOTAL_SC_STATUS', 'true', '', 6, 1, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1972, 'Sort Order', 'MODULE_ORDER_TOTAL_SC_SORT_ORDER', '830', 'Sort order of display.', 6, 2, NULL, '2010-07-23 16:31:20', NULL, NULL);
INSERT INTO `configuration` VALUES (1973, 'Set Order Status', 'MODULE_ORDER_TOTAL_SC_ORDER_STATUS_ID', '0', 'Set the status of orders made where GV covers full payment', 6, 0, NULL, '2010-07-23 16:31:20', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (1974, 'Offer Reward Points', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_POINTS', 'false', 'Give customers a percentage of their purchases as store credit/reward points?', 6, 3, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1975, 'Approval Period', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_APPROVAL', '0', 'How many days should pass from date of last modification before awarding rewards points?', 6, 3, NULL, '2010-07-23 16:31:20', NULL, NULL);
INSERT INTO `configuration` VALUES (1976, 'Reward Points Percentage', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_PERCENTAGE', '1', 'What percentage of purchase should be rewarded?', 6, 3, NULL, '2010-07-23 16:31:20', NULL, NULL);
INSERT INTO `configuration` VALUES (1977, 'Required Order Status', 'MODULE_ORDER_TOTAL_SC_ORDER_REWARD_STATUS', '2', 'What order status is required to receive reward points?', 6, 4, NULL, '2010-07-23 16:31:20', 'zen_get_order_status_name', 'zen_cfg_pull_down_order_statuses(');
INSERT INTO `configuration` VALUES (1978, 'Rewards On Credit', 'MODULE_ORDER_TOTAL_SC_NO_CREDITS', 'true', 'Only offer rewards points on portion of purchase not paid with store credits?', 6, 4, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1979, 'Rewards Points Calculation Base', 'MODULE_ORDER_TOTAL_SC_CALCULATION_BASE', 'sub-total', 'Base rewards points on the sub-total or the order total?', 6, 4, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''sub-total'', ''total''), ');
INSERT INTO `configuration` VALUES (1980, 'Rewards Points Exclude Categories', 'MODULE_ORDER_TOTAL_SC_EXCLUDE_CATEGORIES', 'false', 'Disallow categories or products with a 0 ratio from being able to be bought with reward points?', 6, 4, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1981, 'Rewards Points Exclude Shipping', 'MODULE_ORDER_TOTAL_SC_EXCLUDE_SHIPPING', 'false', 'Disallow reward points being used against shipping fees?', 6, 4, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1982, 'Display Product Points', 'MODULE_ORDER_TOTAL_SC_ORDER_PRODUCT_POINTS', 'false', 'Display potential rewards points earned on product_info page?', 6, 4, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1983, 'Store Credit Box Status', 'MODULE_ORDER_TOTAL_SC_ORDER_BOX_STATUS', '0', 'Store Credit Box Shows<br />0= Never/Off<br />1= Only if credit available<br />2= Always', 6, 5, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2''), ');
INSERT INTO `configuration` VALUES (1984, 'Store Credit Box Pending Rewards', 'MODULE_ORDER_TOTAL_SC_ORDER_BOX_PENDING', 'false', 'Display the customer''s pending rewards points?', 6, 6, NULL, '2010-07-23 16:31:20', NULL, 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (1985, 'IH watermark transparent', 'WATERMARK_TRANSPARENT', 'no', 'set to ''yes'' if you want watermark transparent', 4, 109, '2010-10-08 18:01:57', '2009-06-09 10:55:42', NULL, 'zen_cfg_select_option(array(''no'', ''yes''),');
INSERT INTO `configuration` VALUES (1986, 'facebook appapikey', 'FACEBOOK_APPAPIKEY', 'df7325cd0678783a5b73071a11bc0', 'The appapikey of my facebook account', 1, 206, '2010-07-26 14:17:30', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (1987, 'facebook appsecret', 'FACEBOOK_APPSECRET', '0da24815c705a7d0797a78f6e89a4', 'The appsecret of my facebook account', 1, 207, '2010-07-26 14:17:43', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (1988, 'facebook user_id', 'FACEBOOK_USERID', '108121615883374', 'The user_id of my facebook account', 1, 208, '2010-07-26 14:17:57', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (1989, 'facebook infinite_session_key', 'FACEBOOK_SESSIONKEY', '6f52dfa0bbd698dcf1e42bf8-100000895970687', 'The infinite_session_key of my facebook account', 1, 209, '2010-07-26 14:18:14', '2008-07-20 12:06:17', '', '');
INSERT INTO `configuration` VALUES (1990, 'enable autoFacebook', 'FACEBOOK_ENABLE', 'false', 'enable autoFacebook or not', 1, 210, '0000-00-00 00:00:00', '2008-07-20 12:06:17', '', 'zen_cfg_select_option(array(''true'', ''false''), ');
INSERT INTO `configuration` VALUES (2037, '自定义导出键', 'EASYPOPULATE_CONFIG_CUSTOM_FIELDS', 'products_price_retail,products_price_sample', '自定义导出键（EASYPOPULATE_CONFIG_CUSTOM_FIELDS）', 49, 8, '2010-09-28 16:59:58', '0001-01-01 00:00:00', NULL, NULL);
INSERT INTO `configuration` VALUES (2061, 'Debug Mode', 'MODULE_PAYMENT_PAYPALWPP_DEBUGGING', 'Off', 'Would you like to enable debug mode?  A complete detailed log of failed transactions will be emailed to the store owner.', 6, 25, NULL, '2010-11-03 18:35:26', NULL, 'zen_cfg_select_option(array(''Off'', ''Alerts Only'', ''Log File'', ''Log and Email''), ');
INSERT INTO `configuration` VALUES (2065, 'Cache status', 'SIMPLE_CACHE_STATUS', 'true', 'Turn the cache on/off', 51, 1, '2010-12-21 17:03:10', '2010-12-21 17:01:48', NULL, 'zen_cfg_select_option(array(''true'', ''false''),');
INSERT INTO `configuration` VALUES (2066, 'Cache default expire time', 'SIMPLE_CACHE_DEFAULT_TIME', '900', 'Set the default cache time in seconds', 51, 1, '2010-12-21 17:01:48', '2010-12-21 17:01:48', NULL, NULL);
INSERT INTO `configuration` VALUES (2068, 'Size of the subsidiary price', 'SIZE_SUBSIDIARY_PRICE', '19.99', 'This set the size of the sub price, please fill in the price! Such as: 19.99', 3, 1000, '2010-12-22 19:50:58', '2010-12-21 18:42:42', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `configuration_group`
-- 

CREATE TABLE `configuration_group` (
  `configuration_group_id` int(11) NOT NULL auto_increment,
  `configuration_group_title` varchar(64) NOT NULL default '',
  `configuration_group_description` varchar(255) NOT NULL default '',
  `sort_order` int(5) default NULL,
  `visible` int(1) default '1',
  PRIMARY KEY  (`configuration_group_id`),
  KEY `idx_visible_zen` (`visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

-- 
-- 导出表中的数据 `configuration_group`
-- 

INSERT INTO `configuration_group` VALUES (1, 'My Store', 'General information about my store', 1, 1);
INSERT INTO `configuration_group` VALUES (2, 'Minimum Values', 'The minimum values for functions / data', 2, 1);
INSERT INTO `configuration_group` VALUES (3, 'Maximum Values', 'The maximum values for functions / data', 3, 1);
INSERT INTO `configuration_group` VALUES (4, 'Images', 'Image parameters', 4, 1);
INSERT INTO `configuration_group` VALUES (5, 'Customer Details', 'Customer account configuration', 5, 1);
INSERT INTO `configuration_group` VALUES (6, 'Module Options', 'Hidden from configuration', 6, 1);
INSERT INTO `configuration_group` VALUES (7, 'Shipping/Packaging', 'Shipping options available at my store', 7, 1);
INSERT INTO `configuration_group` VALUES (8, 'Product Listing', 'Product Listing configuration options', 8, 1);
INSERT INTO `configuration_group` VALUES (9, 'Stock', 'Stock configuration options', 9, 1);
INSERT INTO `configuration_group` VALUES (10, 'Logging', 'Logging configuration options', 10, 1);
INSERT INTO `configuration_group` VALUES (11, 'Regulations', 'Regulation options', 16, 1);
INSERT INTO `configuration_group` VALUES (12, 'E-Mail Options', 'General settings for E-Mail transport and HTML E-Mails', 12, 1);
INSERT INTO `configuration_group` VALUES (13, 'Attribute Settings', 'Configure products attributes settings', 13, 1);
INSERT INTO `configuration_group` VALUES (14, 'GZip Compression', 'GZip compression options', 14, 1);
INSERT INTO `configuration_group` VALUES (15, 'Sessions', 'Session options', 15, 1);
INSERT INTO `configuration_group` VALUES (16, 'GV Coupons', 'Gift Vouchers and Coupons', 16, 1);
INSERT INTO `configuration_group` VALUES (17, 'Credit Cards', 'Credit Cards Accepted', 17, 1);
INSERT INTO `configuration_group` VALUES (18, 'Product Info', 'Product Info Display Options', 18, 1);
INSERT INTO `configuration_group` VALUES (19, 'Layout Settings', 'Layout Options', 19, 1);
INSERT INTO `configuration_group` VALUES (20, 'Website Maintenance', 'Website Maintenance Options', 20, 1);
INSERT INTO `configuration_group` VALUES (21, 'New Listing', 'New Products Listing', 21, 1);
INSERT INTO `configuration_group` VALUES (22, 'Featured Listing', 'Featured Products Listing', 22, 1);
INSERT INTO `configuration_group` VALUES (23, 'All Listing', 'All Products Listing', 23, 1);
INSERT INTO `configuration_group` VALUES (24, 'Index Listing', 'Index Products Listing', 24, 1);
INSERT INTO `configuration_group` VALUES (25, 'Define Page Status', 'Define Main Pages and HTMLArea Options', 25, 1);
INSERT INTO `configuration_group` VALUES (30, 'EZ-Pages Settings', 'EZ-Pages Settings', 30, 1);
INSERT INTO `configuration_group` VALUES (31, 'Quick Updates', 'Set Quick Updates Options', 31, 1);
INSERT INTO `configuration_group` VALUES (32, 'SEO URLs', 'Opciones para Ultimate SEO URLs by Chemo', 32, 1);
INSERT INTO `configuration_group` VALUES (33, 'Cross Sell', 'Set Cross Sell Options', 33, 1);
INSERT INTO `configuration_group` VALUES (34, 'Help Center Manager - Categories Box', 'Help Center Manager - Categories Box Settings', 34, 0);
INSERT INTO `configuration_group` VALUES (35, 'Help Center Manager - Help Info Page', 'Help Center Manager - Help Info Page Settings', 35, 0);
INSERT INTO `configuration_group` VALUES (36, 'Help Center Manager - Help Listing', 'Help Center Manager - Help Listing Settings', 36, 0);
INSERT INTO `configuration_group` VALUES (37, 'Help Center Manager - New Help Page', 'Help Center Manager - New FAQs Page Settings', 37, 0);
INSERT INTO `configuration_group` VALUES (38, 'Help Center Manager - All Help Page', 'Help Center Manager - All Help Page Settings', 38, 0);
INSERT INTO `configuration_group` VALUES (39, 'Help Center Manager - General Config', 'Help Center Manager - General Config Settings', 39, 0);
INSERT INTO `configuration_group` VALUES (41, 'Live Help Configuration', 'Set Live Help Options', 41, 1);
INSERT INTO `configuration_group` VALUES (42, 'Google XML Sitemap', 'Google XML Sitemap Configuration', 42, 1);
INSERT INTO `configuration_group` VALUES (43, 'Product Info Popup', 'Product Info Popup Description', 43, 1);
INSERT INTO `configuration_group` VALUES (45, 'Categories List With Static', 'Categories List With Static eg.Wholesale.html and dropship.html', 44, 1);
INSERT INTO `configuration_group` VALUES (46, 'Links Manager', 'Links Display Settings', 46, 1);
INSERT INTO `configuration_group` VALUES (47, 'RSS Feed', 'RSS Feed Configuration', 47, 1);
INSERT INTO `configuration_group` VALUES (48, 'Autoresponder+', 'Autoresponder+ Configuration', 48, 1);
INSERT INTO `configuration_group` VALUES (49, 'Esay Populate', 'Esay Populate Setting', 49, 1);
INSERT INTO `configuration_group` VALUES (51, 'Simple Cache', 'Set Simple Cache Options', 51, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `counter`
-- 

CREATE TABLE `counter` (
  `startdate` char(8) default NULL,
  `counter` int(12) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `counter`
-- 

INSERT INTO `counter` VALUES ('20101221', 6);

-- --------------------------------------------------------

-- 
-- 表的结构 `counter_history`
-- 

CREATE TABLE `counter_history` (
  `startdate` char(8) default NULL,
  `counter` int(12) default NULL,
  `session_counter` int(12) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `counter_history`
-- 

INSERT INTO `counter_history` VALUES ('20101221', 4, 3);
INSERT INTO `counter_history` VALUES ('20110104', 2, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `countries`
-- 

CREATE TABLE `countries` (
  `countries_id` int(11) NOT NULL auto_increment,
  `countries_name` varchar(64) NOT NULL default '',
  `countries_iso_code_2` char(2) NOT NULL default '',
  `countries_iso_code_3` char(3) NOT NULL default '',
  `address_format_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`countries_id`),
  KEY `idx_countries_name_zen` (`countries_name`),
  KEY `idx_address_format_id_zen` (`address_format_id`),
  KEY `idx_iso_2_zen` (`countries_iso_code_2`),
  KEY `idx_iso_3_zen` (`countries_iso_code_3`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=241 ;

-- 
-- 导出表中的数据 `countries`
-- 

INSERT INTO `countries` VALUES (240, 'Aaland Islands', 'AX', 'ALA', 1);
INSERT INTO `countries` VALUES (1, 'Afghanistan', 'AF', 'AFG', 1);
INSERT INTO `countries` VALUES (2, 'Albania', 'AL', 'ALB', 1);
INSERT INTO `countries` VALUES (3, 'Algeria', 'DZ', 'DZA', 1);
INSERT INTO `countries` VALUES (4, 'American Samoa', 'AS', 'ASM', 1);
INSERT INTO `countries` VALUES (5, 'Andorra', 'AD', 'AND', 1);
INSERT INTO `countries` VALUES (6, 'Angola', 'AO', 'AGO', 1);
INSERT INTO `countries` VALUES (7, 'Anguilla', 'AI', 'AIA', 1);
INSERT INTO `countries` VALUES (8, 'Antarctica', 'AQ', 'ATA', 1);
INSERT INTO `countries` VALUES (9, 'Antigua and Barbuda', 'AG', 'ATG', 1);
INSERT INTO `countries` VALUES (10, 'Argentina', 'AR', 'ARG', 1);
INSERT INTO `countries` VALUES (11, 'Armenia', 'AM', 'ARM', 1);
INSERT INTO `countries` VALUES (12, 'Aruba', 'AW', 'ABW', 1);
INSERT INTO `countries` VALUES (13, 'Australia', 'AU', 'AUS', 1);
INSERT INTO `countries` VALUES (14, 'Austria', 'AT', 'AUT', 5);
INSERT INTO `countries` VALUES (15, 'Azerbaijan', 'AZ', 'AZE', 1);
INSERT INTO `countries` VALUES (16, 'Bahamas', 'BS', 'BHS', 1);
INSERT INTO `countries` VALUES (17, 'Bahrain', 'BH', 'BHR', 1);
INSERT INTO `countries` VALUES (18, 'Bangladesh', 'BD', 'BGD', 1);
INSERT INTO `countries` VALUES (19, 'Barbados', 'BB', 'BRB', 1);
INSERT INTO `countries` VALUES (20, 'Belarus', 'BY', 'BLR', 1);
INSERT INTO `countries` VALUES (21, 'Belgium', 'BE', 'BEL', 1);
INSERT INTO `countries` VALUES (22, 'Belize', 'BZ', 'BLZ', 1);
INSERT INTO `countries` VALUES (23, 'Benin', 'BJ', 'BEN', 1);
INSERT INTO `countries` VALUES (24, 'Bermuda', 'BM', 'BMU', 1);
INSERT INTO `countries` VALUES (25, 'Bhutan', 'BT', 'BTN', 1);
INSERT INTO `countries` VALUES (26, 'Bolivia', 'BO', 'BOL', 1);
INSERT INTO `countries` VALUES (27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1);
INSERT INTO `countries` VALUES (28, 'Botswana', 'BW', 'BWA', 1);
INSERT INTO `countries` VALUES (29, 'Bouvet Island', 'BV', 'BVT', 1);
INSERT INTO `countries` VALUES (30, 'Brazil', 'BR', 'BRA', 1);
INSERT INTO `countries` VALUES (31, 'British Indian Ocean Territory', 'IO', 'IOT', 1);
INSERT INTO `countries` VALUES (32, 'Brunei Darussalam', 'BN', 'BRN', 1);
INSERT INTO `countries` VALUES (33, 'Bulgaria', 'BG', 'BGR', 1);
INSERT INTO `countries` VALUES (34, 'Burkina Faso', 'BF', 'BFA', 1);
INSERT INTO `countries` VALUES (35, 'Burundi', 'BI', 'BDI', 1);
INSERT INTO `countries` VALUES (36, 'Cambodia', 'KH', 'KHM', 1);
INSERT INTO `countries` VALUES (37, 'Cameroon', 'CM', 'CMR', 1);
INSERT INTO `countries` VALUES (38, 'Canada', 'CA', 'CAN', 2);
INSERT INTO `countries` VALUES (39, 'Cape Verde', 'CV', 'CPV', 1);
INSERT INTO `countries` VALUES (40, 'Cayman Islands', 'KY', 'CYM', 1);
INSERT INTO `countries` VALUES (41, 'Central African Republic', 'CF', 'CAF', 1);
INSERT INTO `countries` VALUES (42, 'Chad', 'TD', 'TCD', 1);
INSERT INTO `countries` VALUES (43, 'Chile', 'CL', 'CHL', 1);
INSERT INTO `countries` VALUES (44, 'China', 'CN', 'CHN', 1);
INSERT INTO `countries` VALUES (45, 'Christmas Island', 'CX', 'CXR', 1);
INSERT INTO `countries` VALUES (46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1);
INSERT INTO `countries` VALUES (47, 'Colombia', 'CO', 'COL', 1);
INSERT INTO `countries` VALUES (48, 'Comoros', 'KM', 'COM', 1);
INSERT INTO `countries` VALUES (49, 'Congo', 'CG', 'COG', 1);
INSERT INTO `countries` VALUES (50, 'Cook Islands', 'CK', 'COK', 1);
INSERT INTO `countries` VALUES (51, 'Costa Rica', 'CR', 'CRI', 1);
INSERT INTO `countries` VALUES (52, 'Cote D''Ivoire', 'CI', 'CIV', 1);
INSERT INTO `countries` VALUES (53, 'Croatia', 'HR', 'HRV', 1);
INSERT INTO `countries` VALUES (54, 'Cuba', 'CU', 'CUB', 1);
INSERT INTO `countries` VALUES (55, 'Cyprus', 'CY', 'CYP', 1);
INSERT INTO `countries` VALUES (56, 'Czech Republic', 'CZ', 'CZE', 1);
INSERT INTO `countries` VALUES (57, 'Denmark', 'DK', 'DNK', 1);
INSERT INTO `countries` VALUES (58, 'Djibouti', 'DJ', 'DJI', 1);
INSERT INTO `countries` VALUES (59, 'Dominica', 'DM', 'DMA', 1);
INSERT INTO `countries` VALUES (60, 'Dominican Republic', 'DO', 'DOM', 1);
INSERT INTO `countries` VALUES (61, 'East Timor', 'TP', 'TMP', 1);
INSERT INTO `countries` VALUES (62, 'Ecuador', 'EC', 'ECU', 1);
INSERT INTO `countries` VALUES (63, 'Egypt', 'EG', 'EGY', 1);
INSERT INTO `countries` VALUES (64, 'El Salvador', 'SV', 'SLV', 1);
INSERT INTO `countries` VALUES (65, 'Equatorial Guinea', 'GQ', 'GNQ', 1);
INSERT INTO `countries` VALUES (66, 'Eritrea', 'ER', 'ERI', 1);
INSERT INTO `countries` VALUES (67, 'Estonia', 'EE', 'EST', 1);
INSERT INTO `countries` VALUES (68, 'Ethiopia', 'ET', 'ETH', 1);
INSERT INTO `countries` VALUES (69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1);
INSERT INTO `countries` VALUES (70, 'Faroe Islands', 'FO', 'FRO', 1);
INSERT INTO `countries` VALUES (71, 'Fiji', 'FJ', 'FJI', 1);
INSERT INTO `countries` VALUES (72, 'Finland', 'FI', 'FIN', 1);
INSERT INTO `countries` VALUES (73, 'France', 'FR', 'FRA', 1);
INSERT INTO `countries` VALUES (74, 'France, Metropolitan', 'FX', 'FXX', 1);
INSERT INTO `countries` VALUES (75, 'French Guiana', 'GF', 'GUF', 1);
INSERT INTO `countries` VALUES (76, 'French Polynesia', 'PF', 'PYF', 1);
INSERT INTO `countries` VALUES (77, 'French Southern Territories', 'TF', 'ATF', 1);
INSERT INTO `countries` VALUES (78, 'Gabon', 'GA', 'GAB', 1);
INSERT INTO `countries` VALUES (79, 'Gambia', 'GM', 'GMB', 1);
INSERT INTO `countries` VALUES (80, 'Georgia', 'GE', 'GEO', 1);
INSERT INTO `countries` VALUES (81, 'Germany', 'DE', 'DEU', 5);
INSERT INTO `countries` VALUES (82, 'Ghana', 'GH', 'GHA', 1);
INSERT INTO `countries` VALUES (83, 'Gibraltar', 'GI', 'GIB', 1);
INSERT INTO `countries` VALUES (84, 'Greece', 'GR', 'GRC', 1);
INSERT INTO `countries` VALUES (85, 'Greenland', 'GL', 'GRL', 1);
INSERT INTO `countries` VALUES (86, 'Grenada', 'GD', 'GRD', 1);
INSERT INTO `countries` VALUES (87, 'Guadeloupe', 'GP', 'GLP', 1);
INSERT INTO `countries` VALUES (88, 'Guam', 'GU', 'GUM', 1);
INSERT INTO `countries` VALUES (89, 'Guatemala', 'GT', 'GTM', 1);
INSERT INTO `countries` VALUES (90, 'Guinea', 'GN', 'GIN', 1);
INSERT INTO `countries` VALUES (91, 'Guinea-bissau', 'GW', 'GNB', 1);
INSERT INTO `countries` VALUES (92, 'Guyana', 'GY', 'GUY', 1);
INSERT INTO `countries` VALUES (93, 'Haiti', 'HT', 'HTI', 1);
INSERT INTO `countries` VALUES (94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1);
INSERT INTO `countries` VALUES (95, 'Honduras', 'HN', 'HND', 1);
INSERT INTO `countries` VALUES (96, 'Hong Kong', 'HK', 'HKG', 1);
INSERT INTO `countries` VALUES (97, 'Hungary', 'HU', 'HUN', 1);
INSERT INTO `countries` VALUES (98, 'Iceland', 'IS', 'ISL', 1);
INSERT INTO `countries` VALUES (99, 'India', 'IN', 'IND', 1);
INSERT INTO `countries` VALUES (100, 'Indonesia', 'ID', 'IDN', 1);
INSERT INTO `countries` VALUES (101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1);
INSERT INTO `countries` VALUES (102, 'Iraq', 'IQ', 'IRQ', 1);
INSERT INTO `countries` VALUES (103, 'Ireland', 'IE', 'IRL', 1);
INSERT INTO `countries` VALUES (104, 'Israel', 'IL', 'ISR', 1);
INSERT INTO `countries` VALUES (105, 'Italy', 'IT', 'ITA', 1);
INSERT INTO `countries` VALUES (106, 'Jamaica', 'JM', 'JAM', 1);
INSERT INTO `countries` VALUES (107, 'Japan', 'JP', 'JPN', 1);
INSERT INTO `countries` VALUES (108, 'Jordan', 'JO', 'JOR', 1);
INSERT INTO `countries` VALUES (109, 'Kazakhstan', 'KZ', 'KAZ', 1);
INSERT INTO `countries` VALUES (110, 'Kenya', 'KE', 'KEN', 1);
INSERT INTO `countries` VALUES (111, 'Kiribati', 'KI', 'KIR', 1);
INSERT INTO `countries` VALUES (112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1);
INSERT INTO `countries` VALUES (113, 'Korea, Republic of', 'KR', 'KOR', 1);
INSERT INTO `countries` VALUES (114, 'Kuwait', 'KW', 'KWT', 1);
INSERT INTO `countries` VALUES (115, 'Kyrgyzstan', 'KG', 'KGZ', 1);
INSERT INTO `countries` VALUES (116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1);
INSERT INTO `countries` VALUES (117, 'Latvia', 'LV', 'LVA', 1);
INSERT INTO `countries` VALUES (118, 'Lebanon', 'LB', 'LBN', 1);
INSERT INTO `countries` VALUES (119, 'Lesotho', 'LS', 'LSO', 1);
INSERT INTO `countries` VALUES (120, 'Liberia', 'LR', 'LBR', 1);
INSERT INTO `countries` VALUES (121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1);
INSERT INTO `countries` VALUES (122, 'Liechtenstein', 'LI', 'LIE', 1);
INSERT INTO `countries` VALUES (123, 'Lithuania', 'LT', 'LTU', 1);
INSERT INTO `countries` VALUES (124, 'Luxembourg', 'LU', 'LUX', 1);
INSERT INTO `countries` VALUES (125, 'Macau', 'MO', 'MAC', 1);
INSERT INTO `countries` VALUES (126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1);
INSERT INTO `countries` VALUES (127, 'Madagascar', 'MG', 'MDG', 1);
INSERT INTO `countries` VALUES (128, 'Malawi', 'MW', 'MWI', 1);
INSERT INTO `countries` VALUES (129, 'Malaysia', 'MY', 'MYS', 1);
INSERT INTO `countries` VALUES (130, 'Maldives', 'MV', 'MDV', 1);
INSERT INTO `countries` VALUES (131, 'Mali', 'ML', 'MLI', 1);
INSERT INTO `countries` VALUES (132, 'Malta', 'MT', 'MLT', 1);
INSERT INTO `countries` VALUES (133, 'Marshall Islands', 'MH', 'MHL', 1);
INSERT INTO `countries` VALUES (134, 'Martinique', 'MQ', 'MTQ', 1);
INSERT INTO `countries` VALUES (135, 'Mauritania', 'MR', 'MRT', 1);
INSERT INTO `countries` VALUES (136, 'Mauritius', 'MU', 'MUS', 1);
INSERT INTO `countries` VALUES (137, 'Mayotte', 'YT', 'MYT', 1);
INSERT INTO `countries` VALUES (138, 'Mexico', 'MX', 'MEX', 1);
INSERT INTO `countries` VALUES (139, 'Micronesia, Federated States of', 'FM', 'FSM', 1);
INSERT INTO `countries` VALUES (140, 'Moldova, Republic of', 'MD', 'MDA', 1);
INSERT INTO `countries` VALUES (141, 'Monaco', 'MC', 'MCO', 1);
INSERT INTO `countries` VALUES (142, 'Mongolia', 'MN', 'MNG', 1);
INSERT INTO `countries` VALUES (143, 'Montserrat', 'MS', 'MSR', 1);
INSERT INTO `countries` VALUES (144, 'Morocco', 'MA', 'MAR', 1);
INSERT INTO `countries` VALUES (145, 'Mozambique', 'MZ', 'MOZ', 1);
INSERT INTO `countries` VALUES (146, 'Myanmar', 'MM', 'MMR', 1);
INSERT INTO `countries` VALUES (147, 'Namibia', 'NA', 'NAM', 1);
INSERT INTO `countries` VALUES (148, 'Nauru', 'NR', 'NRU', 1);
INSERT INTO `countries` VALUES (149, 'Nepal', 'NP', 'NPL', 1);
INSERT INTO `countries` VALUES (150, 'Netherlands', 'NL', 'NLD', 1);
INSERT INTO `countries` VALUES (151, 'Netherlands Antilles', 'AN', 'ANT', 1);
INSERT INTO `countries` VALUES (152, 'New Caledonia', 'NC', 'NCL', 1);
INSERT INTO `countries` VALUES (153, 'New Zealand', 'NZ', 'NZL', 1);
INSERT INTO `countries` VALUES (154, 'Nicaragua', 'NI', 'NIC', 1);
INSERT INTO `countries` VALUES (155, 'Niger', 'NE', 'NER', 1);
INSERT INTO `countries` VALUES (156, 'Nigeria', 'NG', 'NGA', 1);
INSERT INTO `countries` VALUES (157, 'Niue', 'NU', 'NIU', 1);
INSERT INTO `countries` VALUES (158, 'Norfolk Island', 'NF', 'NFK', 1);
INSERT INTO `countries` VALUES (159, 'Northern Mariana Islands', 'MP', 'MNP', 1);
INSERT INTO `countries` VALUES (160, 'Norway', 'NO', 'NOR', 1);
INSERT INTO `countries` VALUES (161, 'Oman', 'OM', 'OMN', 1);
INSERT INTO `countries` VALUES (162, 'Pakistan', 'PK', 'PAK', 1);
INSERT INTO `countries` VALUES (163, 'Palau', 'PW', 'PLW', 1);
INSERT INTO `countries` VALUES (164, 'Panama', 'PA', 'PAN', 1);
INSERT INTO `countries` VALUES (165, 'Papua New Guinea', 'PG', 'PNG', 1);
INSERT INTO `countries` VALUES (166, 'Paraguay', 'PY', 'PRY', 1);
INSERT INTO `countries` VALUES (167, 'Peru', 'PE', 'PER', 1);
INSERT INTO `countries` VALUES (168, 'Philippines', 'PH', 'PHL', 1);
INSERT INTO `countries` VALUES (169, 'Pitcairn', 'PN', 'PCN', 1);
INSERT INTO `countries` VALUES (170, 'Poland', 'PL', 'POL', 1);
INSERT INTO `countries` VALUES (171, 'Portugal', 'PT', 'PRT', 1);
INSERT INTO `countries` VALUES (172, 'Puerto Rico', 'PR', 'PRI', 1);
INSERT INTO `countries` VALUES (173, 'Qatar', 'QA', 'QAT', 1);
INSERT INTO `countries` VALUES (174, 'Reunion', 'RE', 'REU', 1);
INSERT INTO `countries` VALUES (175, 'Romania', 'RO', 'ROM', 1);
INSERT INTO `countries` VALUES (176, 'Russian Federation', 'RU', 'RUS', 1);
INSERT INTO `countries` VALUES (177, 'Rwanda', 'RW', 'RWA', 1);
INSERT INTO `countries` VALUES (178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1);
INSERT INTO `countries` VALUES (179, 'Saint Lucia', 'LC', 'LCA', 1);
INSERT INTO `countries` VALUES (180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1);
INSERT INTO `countries` VALUES (181, 'Samoa', 'WS', 'WSM', 1);
INSERT INTO `countries` VALUES (182, 'San Marino', 'SM', 'SMR', 1);
INSERT INTO `countries` VALUES (183, 'Sao Tome and Principe', 'ST', 'STP', 1);
INSERT INTO `countries` VALUES (184, 'Saudi Arabia', 'SA', 'SAU', 1);
INSERT INTO `countries` VALUES (185, 'Senegal', 'SN', 'SEN', 1);
INSERT INTO `countries` VALUES (186, 'Seychelles', 'SC', 'SYC', 1);
INSERT INTO `countries` VALUES (187, 'Sierra Leone', 'SL', 'SLE', 1);
INSERT INTO `countries` VALUES (188, 'Singapore', 'SG', 'SGP', 4);
INSERT INTO `countries` VALUES (189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1);
INSERT INTO `countries` VALUES (190, 'Slovenia', 'SI', 'SVN', 1);
INSERT INTO `countries` VALUES (191, 'Solomon Islands', 'SB', 'SLB', 1);
INSERT INTO `countries` VALUES (192, 'Somalia', 'SO', 'SOM', 1);
INSERT INTO `countries` VALUES (193, 'South Africa', 'ZA', 'ZAF', 1);
INSERT INTO `countries` VALUES (194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1);
INSERT INTO `countries` VALUES (195, 'Spain', 'ES', 'ESP', 3);
INSERT INTO `countries` VALUES (196, 'Sri Lanka', 'LK', 'LKA', 1);
INSERT INTO `countries` VALUES (197, 'St. Helena', 'SH', 'SHN', 1);
INSERT INTO `countries` VALUES (198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1);
INSERT INTO `countries` VALUES (199, 'Sudan', 'SD', 'SDN', 1);
INSERT INTO `countries` VALUES (200, 'Suriname', 'SR', 'SUR', 1);
INSERT INTO `countries` VALUES (201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1);
INSERT INTO `countries` VALUES (202, 'Swaziland', 'SZ', 'SWZ', 1);
INSERT INTO `countries` VALUES (203, 'Sweden', 'SE', 'SWE', 1);
INSERT INTO `countries` VALUES (204, 'Switzerland', 'CH', 'CHE', 1);
INSERT INTO `countries` VALUES (205, 'Syrian Arab Republic', 'SY', 'SYR', 1);
INSERT INTO `countries` VALUES (206, 'Taiwan', 'TW', 'TWN', 1);
INSERT INTO `countries` VALUES (207, 'Tajikistan', 'TJ', 'TJK', 1);
INSERT INTO `countries` VALUES (208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1);
INSERT INTO `countries` VALUES (209, 'Thailand', 'TH', 'THA', 1);
INSERT INTO `countries` VALUES (210, 'Togo', 'TG', 'TGO', 1);
INSERT INTO `countries` VALUES (211, 'Tokelau', 'TK', 'TKL', 1);
INSERT INTO `countries` VALUES (212, 'Tonga', 'TO', 'TON', 1);
INSERT INTO `countries` VALUES (213, 'Trinidad and Tobago', 'TT', 'TTO', 1);
INSERT INTO `countries` VALUES (214, 'Tunisia', 'TN', 'TUN', 1);
INSERT INTO `countries` VALUES (215, 'Turkey', 'TR', 'TUR', 1);
INSERT INTO `countries` VALUES (216, 'Turkmenistan', 'TM', 'TKM', 1);
INSERT INTO `countries` VALUES (217, 'Turks and Caicos Islands', 'TC', 'TCA', 1);
INSERT INTO `countries` VALUES (218, 'Tuvalu', 'TV', 'TUV', 1);
INSERT INTO `countries` VALUES (219, 'Uganda', 'UG', 'UGA', 1);
INSERT INTO `countries` VALUES (220, 'Ukraine', 'UA', 'UKR', 1);
INSERT INTO `countries` VALUES (221, 'United Arab Emirates', 'AE', 'ARE', 1);
INSERT INTO `countries` VALUES (222, 'United Kingdom', 'GB', 'GBR', 6);
INSERT INTO `countries` VALUES (223, 'United States', 'US', 'USA', 2);
INSERT INTO `countries` VALUES (224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1);
INSERT INTO `countries` VALUES (225, 'Uruguay', 'UY', 'URY', 1);
INSERT INTO `countries` VALUES (226, 'Uzbekistan', 'UZ', 'UZB', 1);
INSERT INTO `countries` VALUES (227, 'Vanuatu', 'VU', 'VUT', 1);
INSERT INTO `countries` VALUES (228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1);
INSERT INTO `countries` VALUES (229, 'Venezuela', 'VE', 'VEN', 1);
INSERT INTO `countries` VALUES (230, 'Viet Nam', 'VN', 'VNM', 1);
INSERT INTO `countries` VALUES (231, 'Virgin Islands (British)', 'VG', 'VGB', 1);
INSERT INTO `countries` VALUES (232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1);
INSERT INTO `countries` VALUES (233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1);
INSERT INTO `countries` VALUES (234, 'Western Sahara', 'EH', 'ESH', 1);
INSERT INTO `countries` VALUES (235, 'Yemen', 'YE', 'YEM', 1);
INSERT INTO `countries` VALUES (236, 'Yugoslavia', 'YU', 'YUG', 1);
INSERT INTO `countries` VALUES (237, 'Zaire', 'ZR', 'ZAR', 1);
INSERT INTO `countries` VALUES (238, 'Zambia', 'ZM', 'ZMB', 1);
INSERT INTO `countries` VALUES (239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `coupons`
-- 

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL auto_increment,
  `coupon_type` char(1) NOT NULL default 'F',
  `coupon_code` varchar(32) NOT NULL default '',
  `coupon_amount` decimal(15,4) NOT NULL default '0.0000',
  `coupon_minimum_order` decimal(15,4) NOT NULL default '0.0000',
  `coupon_start_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `coupon_expire_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `uses_per_coupon` int(5) NOT NULL default '1',
  `uses_per_user` int(5) NOT NULL default '0',
  `restrict_to_products` varchar(255) default NULL,
  `restrict_to_categories` varchar(255) default NULL,
  `restrict_to_customers` text,
  `coupon_active` char(1) NOT NULL default 'Y',
  `date_created` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  `coupon_zone_restriction` int(11) NOT NULL default '0',
  PRIMARY KEY  (`coupon_id`),
  KEY `idx_active_type_zen` (`coupon_active`,`coupon_type`),
  KEY `idx_coupon_code_zen` (`coupon_code`),
  KEY `idx_coupon_type_zen` (`coupon_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `coupons`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `coupons_description`
-- 

CREATE TABLE `coupons_description` (
  `coupon_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '0',
  `coupon_name` varchar(32) NOT NULL default '',
  `coupon_description` text,
  PRIMARY KEY  (`coupon_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `coupons_description`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `coupon_email_track`
-- 

CREATE TABLE `coupon_email_track` (
  `unique_id` int(11) NOT NULL auto_increment,
  `coupon_id` int(11) NOT NULL default '0',
  `customer_id_sent` int(11) NOT NULL default '0',
  `sent_firstname` varchar(32) default NULL,
  `sent_lastname` varchar(32) default NULL,
  `emailed_to` varchar(32) default NULL,
  `date_sent` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_coupon_id_zen` (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `coupon_email_track`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `coupon_gv_customer`
-- 

CREATE TABLE `coupon_gv_customer` (
  `customer_id` int(5) NOT NULL default '0',
  `amount` decimal(15,4) NOT NULL default '0.0000',
  PRIMARY KEY  (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `coupon_gv_customer`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `coupon_gv_queue`
-- 

CREATE TABLE `coupon_gv_queue` (
  `unique_id` int(5) NOT NULL auto_increment,
  `customer_id` int(5) NOT NULL default '0',
  `order_id` int(5) NOT NULL default '0',
  `amount` decimal(15,4) NOT NULL default '0.0000',
  `date_created` datetime NOT NULL default '0001-01-01 00:00:00',
  `ipaddr` varchar(32) NOT NULL default '',
  `release_flag` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_cust_id_order_id_zen` (`customer_id`,`order_id`),
  KEY `idx_release_flag_zen` (`release_flag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `coupon_gv_queue`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `coupon_redeem_track`
-- 

CREATE TABLE `coupon_redeem_track` (
  `unique_id` int(11) NOT NULL auto_increment,
  `coupon_id` int(11) NOT NULL default '0',
  `customer_id` int(11) NOT NULL default '0',
  `redeem_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `redeem_ip` varchar(32) NOT NULL default '',
  `order_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_coupon_id_zen` (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `coupon_redeem_track`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `coupon_restrict`
-- 

CREATE TABLE `coupon_restrict` (
  `restrict_id` int(11) NOT NULL auto_increment,
  `coupon_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL default '0',
  `coupon_restrict` char(1) NOT NULL default 'N',
  PRIMARY KEY  (`restrict_id`),
  KEY `idx_coup_id_prod_id_zen` (`coupon_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `coupon_restrict`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `currencies`
-- 

CREATE TABLE `currencies` (
  `currencies_id` int(11) NOT NULL auto_increment,
  `title` varchar(32) NOT NULL default '',
  `code` char(3) NOT NULL default '',
  `symbol_left` varchar(24) default NULL,
  `symbol_right` varchar(24) default NULL,
  `decimal_point` char(1) default NULL,
  `thousands_point` char(1) default NULL,
  `decimal_places` char(1) default NULL,
  `value` float(13,8) default NULL,
  `last_updated` datetime default NULL,
  PRIMARY KEY  (`currencies_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `currencies`
-- 

INSERT INTO `currencies` VALUES (1, 'US Dollar', 'USD', 'US$', '', '.', ',', '2', 1.00000000, '2009-06-09 10:37:51');
INSERT INTO `currencies` VALUES (2, 'Euro', 'EUR', '&euro;', '', '.', ',', '2', 0.75616693, '2009-06-09 10:37:53');
INSERT INTO `currencies` VALUES (3, 'GB Pound', 'GBP', '&pound;', '', '.', ',', '2', 0.65855998, '2009-06-09 10:37:54');
INSERT INTO `currencies` VALUES (4, 'Canadian Dollar', 'CAD', 'CA$', '', '.', ',', '2', 1.17652500, '2009-06-09 10:37:55');
INSERT INTO `currencies` VALUES (5, 'Australian Dollar', 'AUD', 'AU$', '', '.', ',', '2', 1.32904804, '2009-06-09 10:37:58');
INSERT INTO `currencies` VALUES (6, 'CNY', 'CNY', '¥', '', '.', ',', '2', 6.80999994, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `customers`
-- 

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL auto_increment,
  `customers_gender` char(1) NOT NULL default '',
  `customers_firstname` varchar(32) NOT NULL default '',
  `customers_lastname` varchar(32) NOT NULL default '',
  `customers_dob` datetime NOT NULL default '0001-01-01 00:00:00',
  `customers_email_address` varchar(96) NOT NULL default '',
  `customers_nick` varchar(96) NOT NULL default '',
  `customers_default_address_id` int(11) NOT NULL default '0',
  `customers_telephone` varchar(32) NOT NULL default '',
  `customers_fax` varchar(32) default NULL,
  `customers_password` varchar(40) NOT NULL default '',
  `customers_newsletter` char(1) default NULL,
  `customers_group_pricing` int(11) NOT NULL default '0',
  `customers_email_format` varchar(4) NOT NULL default 'TEXT',
  `customers_authorization` int(1) NOT NULL default '0',
  `customers_referral` varchar(32) NOT NULL default '',
  `customers_paypal_payerid` varchar(20) NOT NULL default '',
  `customers_paypal_ec` tinyint(1) unsigned NOT NULL default '0',
  `customers_whole` varchar(4) NOT NULL default '0',
  `customers_describes` varchar(45) default NULL,
  PRIMARY KEY  (`customers_id`),
  KEY `idx_email_address_zen` (`customers_email_address`),
  KEY `idx_referral_zen` (`customers_referral`(10)),
  KEY `idx_grp_pricing_zen` (`customers_group_pricing`),
  KEY `idx_nick_zen` (`customers_nick`),
  KEY `idx_newsletter_zen` (`customers_newsletter`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `customers`
-- 

INSERT INTO `customers` VALUES (1, 'f', 'zhang', 'Evelyn', '0001-01-01 00:00:00', '123456789@qq.com', '', 1, '165388452232', NULL, '047f9d53fbe3b996b0c47a52f0562bd6:fe', '1', 0, 'TEXT', 0, '', '', 0, '0', '2');
INSERT INTO `customers` VALUES (2, '', '', 'New Customer', '0001-01-01 00:00:00', 'ltm1125@163.com', '', 3, '', NULL, 'bbed7f81090641bd9f70762696394a82:80', '1', 0, 'TEXT', 0, '', '', 0, '0', '1');
INSERT INTO `customers` VALUES (3, '', '', 'New Customer', '0001-01-01 00:00:00', 'test@qq.com', '', 4, '', NULL, '0d63ec7545c522de503fb860880fa4a2:6a', '1', 0, 'TEXT', 0, '', '', 0, '0', '1');

-- --------------------------------------------------------

-- 
-- 表的结构 `customers_basket`
-- 

CREATE TABLE `customers_basket` (
  `customers_basket_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `products_id` tinytext NOT NULL,
  `customers_basket_quantity` float NOT NULL default '0',
  `final_price` decimal(15,4) NOT NULL default '0.0000',
  `customers_basket_date_added` varchar(8) default NULL,
  PRIMARY KEY  (`customers_basket_id`),
  KEY `idx_customers_id_zen` (`customers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `customers_basket`
-- 

INSERT INTO `customers_basket` VALUES (6, 2, '10', 1, 0.0000, '20101102');

-- --------------------------------------------------------

-- 
-- 表的结构 `customers_basket_attributes`
-- 

CREATE TABLE `customers_basket_attributes` (
  `customers_basket_attributes_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) NOT NULL default '0',
  `products_id` tinytext NOT NULL,
  `products_options_id` varchar(64) NOT NULL default '0',
  `products_options_value_id` int(11) NOT NULL default '0',
  `products_options_value_text` blob,
  `products_options_sort_order` text NOT NULL,
  PRIMARY KEY  (`customers_basket_attributes_id`),
  KEY `idx_cust_id_prod_id_zen` (`customers_id`,`products_id`(36))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `customers_basket_attributes`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `customers_info`
-- 

CREATE TABLE `customers_info` (
  `customers_info_id` int(11) NOT NULL default '0',
  `customers_info_date_of_last_logon` datetime default NULL,
  `customers_info_number_of_logons` int(5) default NULL,
  `customers_info_date_account_created` datetime default NULL,
  `customers_info_date_account_last_modified` datetime default NULL,
  `global_product_notifications` int(1) default '0',
  PRIMARY KEY  (`customers_info_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `customers_info`
-- 

INSERT INTO `customers_info` VALUES (1, NULL, 0, '2010-11-01 16:29:19', NULL, 0);
INSERT INTO `customers_info` VALUES (2, NULL, 0, '2010-11-02 10:23:44', NULL, 0);
INSERT INTO `customers_info` VALUES (3, NULL, 0, '2010-11-02 17:41:00', NULL, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `customers_origin`
-- 

CREATE TABLE `customers_origin` (
  `origin_id` int(8) NOT NULL auto_increment,
  `customers_id` int(8) NOT NULL default '0',
  `from_type_id` int(4) NOT NULL,
  PRIMARY KEY  (`origin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `customers_origin`
-- 

INSERT INTO `customers_origin` VALUES (1, 1, 1);
INSERT INTO `customers_origin` VALUES (2, 2, 0);
INSERT INTO `customers_origin` VALUES (3, 3, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `customers_origin_freq`
-- 

CREATE TABLE `customers_origin_freq` (
  `from_type_id` int(4) NOT NULL auto_increment,
  `from_type_name` varchar(64) NOT NULL,
  `from_type_freq` varchar(64) NOT NULL,
  PRIMARY KEY  (`from_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `customers_origin_freq`
-- 

INSERT INTO `customers_origin_freq` VALUES (1, 'From Friends', '59');
INSERT INTO `customers_origin_freq` VALUES (2, 'Search Engine', '93');
INSERT INTO `customers_origin_freq` VALUES (3, 'Forums or Blogs', '42');
INSERT INTO `customers_origin_freq` VALUES (4, 'Other Websites', '16');

-- --------------------------------------------------------

-- 
-- 表的结构 `customers_searches`
-- 

CREATE TABLE `customers_searches` (
  `search` varchar(255) NOT NULL default '',
  `language_id` int(11) unsigned default NULL,
  `freq` tinyint(3) unsigned default '0',
  PRIMARY KEY  (`search`),
  KEY `lang` (`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `customers_searches`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `customers_wishlist`
-- 

CREATE TABLE `customers_wishlist` (
  `products_id` int(13) NOT NULL default '0',
  `customers_id` int(13) NOT NULL default '0',
  `products_model` varchar(13) default NULL,
  `products_name` varchar(64) NOT NULL default '',
  `products_price` decimal(8,2) NOT NULL default '0.00',
  `final_price` decimal(8,2) NOT NULL default '0.00',
  `products_quantity` int(2) NOT NULL default '0',
  `wishlist_name` varchar(64) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `customers_wishlist`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `db_cache`
-- 

CREATE TABLE `db_cache` (
  `cache_entry_name` varchar(64) NOT NULL default '',
  `cache_data` mediumblob,
  `cache_entry_created` int(15) default NULL,
  PRIMARY KEY  (`cache_entry_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `db_cache`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `dsf_account_info`
-- 

CREATE TABLE `dsf_account_info` (
  `id` int(11) NOT NULL auto_increment,
  `dsf_username` varchar(32) NOT NULL,
  `dsf_password` varchar(32) NOT NULL,
  `company_name_en` varchar(128) default NULL,
  `company_name_cn` varchar(128) default NULL,
  `company_id` varchar(11) default NULL,
  `company_code` varchar(32) default NULL,
  `customer_service_code` varchar(32) default NULL,
  `customer_service_id` int(11) default NULL,
  `customer_service_name` varchar(32) default NULL,
  `maintainer_code` varchar(32) default NULL,
  `maintainer_id` int(11) default NULL,
  `maintainer_name` varchar(32) default NULL,
  `dsf_wsdl_url` varchar(256) default NULL,
  `calculate_wsdl_url` varchar(256) default NULL,
  `packet_codes` varchar(256) NOT NULL,
  `status` int(11) default NULL,
  `created` timestamp NULL default NULL,
  `modified` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `dsf_account_info`
-- 

INSERT INTO `dsf_account_info` VALUES (1, 'edmond2310', '012396', '', 'edmond2310_李跃飞', '61030', 'DC061030', '4PSZ0807', 12805, '曾子红', '4PSZ0458', 6466, '李慧', 'http://price.4px.cc/services/OrderServices?wsdl', 'http://price.4px.cc/services/CalculateServices?wsdl', 'A0115,A0116,A4001,A4002,A4003,A4004,A4010,A4011,A4020,A4021', 1, '2010-12-21 10:33:06', '2010-12-21 10:33:06');

-- --------------------------------------------------------

-- 
-- 表的结构 `dsf_countries`
-- 

CREATE TABLE `dsf_countries` (
  `dsf_countries_id` int(11) NOT NULL auto_increment,
  `dsf_countries_iso_code_2` varchar(32) NOT NULL,
  `dsf_countries_name_cn` varchar(128) default NULL,
  `dsf_countries_name_en` varchar(128) default NULL,
  PRIMARY KEY  (`dsf_countries_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=244 ;

-- 
-- 导出表中的数据 `dsf_countries`
-- 

INSERT INTO `dsf_countries` VALUES (1, 'WF', '瓦利斯群岛和富图纳群岛', 'WALLIS AND FUTUNA ISLANDS');
INSERT INTO `dsf_countries` VALUES (2, 'FM', '密克罗尼西亚', 'MICRONESIA, FEDERATED STATES OF');
INSERT INTO `dsf_countries` VALUES (3, 'MO', '澳门', 'MACAU');
INSERT INTO `dsf_countries` VALUES (4, 'ID', '印度尼西亚', 'INDONESIA');
INSERT INTO `dsf_countries` VALUES (5, 'AZ', '阿塞拜疆(独联体)', 'AZERBAIJAN');
INSERT INTO `dsf_countries` VALUES (6, 'RE', '留尼旺', 'REUNION ISLAND');
INSERT INTO `dsf_countries` VALUES (7, 'MW', '马拉维', 'MALAWI');
INSERT INTO `dsf_countries` VALUES (8, 'ZW', '津巴布韦', 'ZIMBABWE');
INSERT INTO `dsf_countries` VALUES (9, 'SE', '瑞典', 'SWEDEN');
INSERT INTO `dsf_countries` VALUES (10, 'LK', '斯里兰卡', 'SRI LANKA');
INSERT INTO `dsf_countries` VALUES (11, 'YT', '马约特', 'MAYOTTE');
INSERT INTO `dsf_countries` VALUES (12, 'ST', '圣多美和普林西比', 'SAO TOME AND PRINCIPE');
INSERT INTO `dsf_countries` VALUES (13, 'ME', '黑山共和国', 'MONTENEGRO,REPUBLIC OF');
INSERT INTO `dsf_countries` VALUES (14, 'GA', '加蓬', 'GABON');
INSERT INTO `dsf_countries` VALUES (15, 'ET', '埃塞俄比亚', 'ETHIOPIA');
INSERT INTO `dsf_countries` VALUES (16, 'GQ', '赤道几内亚', 'EQUATORIAL GUINEA ');
INSERT INTO `dsf_countries` VALUES (17, 'DJ', '吉布提', 'DJIBOUTI ');
INSERT INTO `dsf_countries` VALUES (18, 'CG', '刚果', 'CONGO');
INSERT INTO `dsf_countries` VALUES (19, 'TD', '乍得', 'CHAD');
INSERT INTO `dsf_countries` VALUES (20, 'CF', '中非共和国', 'CENTRAL AFRICAN REP');
INSERT INTO `dsf_countries` VALUES (21, 'CV', '佛得角群岛', 'CAPE VERDE');
INSERT INTO `dsf_countries` VALUES (22, 'CM', '喀麦隆', 'CAMEROON');
INSERT INTO `dsf_countries` VALUES (23, 'GM', '冈比亚', 'GAMBIA');
INSERT INTO `dsf_countries` VALUES (24, 'CU', '古巴', 'CUBA');
INSERT INTO `dsf_countries` VALUES (25, 'KP', '北朝鲜', 'KOREA,DEMOCRATIC PEOP');
INSERT INTO `dsf_countries` VALUES (26, 'XB', '伯奈尔岛', 'BONAIRE');
INSERT INTO `dsf_countries` VALUES (27, 'TV', '图瓦卢', 'TUVALU');
INSERT INTO `dsf_countries` VALUES (28, 'GL', '格陵兰', 'GREELAND');
INSERT INTO `dsf_countries` VALUES (29, 'IC', '加那利群岛', 'CANARY ISLANDS,THE');
INSERT INTO `dsf_countries` VALUES (30, 'FK', '福克兰群岛', 'FALKLAND ISLAND');
INSERT INTO `dsf_countries` VALUES (31, 'HK', '香港', 'HONG KONG ');
INSERT INTO `dsf_countries` VALUES (32, 'TJ', '塔吉克斯坦', 'TAJIKISTAN');
INSERT INTO `dsf_countries` VALUES (33, 'SB', '所罗门群岛', 'SOLOMON ISLANDS');
INSERT INTO `dsf_countries` VALUES (34, 'CN', '中国', 'CHINA');
INSERT INTO `dsf_countries` VALUES (35, 'SO', '索马里', 'SOMALIA');
INSERT INTO `dsf_countries` VALUES (36, 'SL', '塞拉里昂', 'SIERRA LEONE');
INSERT INTO `dsf_countries` VALUES (37, 'SC', '塞舌尔', 'SEYCHELLES, REP.');
INSERT INTO `dsf_countries` VALUES (38, 'SN', '塞内加尔', 'SENEGAL');
INSERT INTO `dsf_countries` VALUES (39, 'RW', '卢旺达', 'RWANDA');
INSERT INTO `dsf_countries` VALUES (40, 'NG', '尼日利亚', 'NIGERIA');
INSERT INTO `dsf_countries` VALUES (41, 'NA', '纳米比亚', 'NAMIBIA');
INSERT INTO `dsf_countries` VALUES (42, 'MZ', '莫桑比克', 'MOZAMBIQUE');
INSERT INTO `dsf_countries` VALUES (43, 'MA', '摩洛哥', 'MOROCCO');
INSERT INTO `dsf_countries` VALUES (44, 'MU', '毛里求斯', 'MAURITIUS');
INSERT INTO `dsf_countries` VALUES (45, 'MR', '毛里塔尼亚', 'MAURITANIA');
INSERT INTO `dsf_countries` VALUES (46, 'MT', '马尔他', 'MALTA');
INSERT INTO `dsf_countries` VALUES (47, 'ML', '马里', 'MALI');
INSERT INTO `dsf_countries` VALUES (48, 'MG', '马达加斯加', 'MADAGASCAR');
INSERT INTO `dsf_countries` VALUES (49, 'TO', '汤加', 'TONGA');
INSERT INTO `dsf_countries` VALUES (50, 'LS', '莱索托', 'LESOTHO');
INSERT INTO `dsf_countries` VALUES (51, 'KE', '肯尼亚', 'KENYA');
INSERT INTO `dsf_countries` VALUES (52, 'GW', '几内亚-比绍', 'GUINEA  BISSAU');
INSERT INTO `dsf_countries` VALUES (53, 'GH', '加纳', 'GHANA');
INSERT INTO `dsf_countries` VALUES (54, 'XS', '索马里共和国', 'SOMALILAND,REP (NORTH SOMALI)');
INSERT INTO `dsf_countries` VALUES (55, 'CR', '哥斯达黎加', 'COSTA RICA');
INSERT INTO `dsf_countries` VALUES (56, 'CL', '智利', 'CHILE');
INSERT INTO `dsf_countries` VALUES (57, 'BR', '巴西', 'BRAZIL');
INSERT INTO `dsf_countries` VALUES (58, 'BO', '波利维亚', 'BOLIVIA ');
INSERT INTO `dsf_countries` VALUES (59, 'BF', '布基纳法索', 'BURKINA FASO');
INSERT INTO `dsf_countries` VALUES (60, 'BW', '博茨瓦纳', 'BOTSWANA ');
INSERT INTO `dsf_countries` VALUES (61, 'BJ', '贝宁', 'BENIN');
INSERT INTO `dsf_countries` VALUES (62, 'AO', '安哥拉', 'ANGOLA');
INSERT INTO `dsf_countries` VALUES (63, 'IS', '冰岛', 'ICELAND');
INSERT INTO `dsf_countries` VALUES (64, 'GI', '直布罗陀', 'GIBRALTAR ');
INSERT INTO `dsf_countries` VALUES (65, 'MN', '蒙古', 'MONGOLIA');
INSERT INTO `dsf_countries` VALUES (66, 'ZM', '赞比亚', 'ZAMBIA');
INSERT INTO `dsf_countries` VALUES (67, 'ZR', '扎伊尔', 'ZAIRE');
INSERT INTO `dsf_countries` VALUES (68, 'UG', '乌干达', 'UGANDA');
INSERT INTO `dsf_countries` VALUES (69, 'TN', '突尼斯', 'TUNISIA');
INSERT INTO `dsf_countries` VALUES (70, 'TZ', '坦桑尼亚', 'TANZANIA');
INSERT INTO `dsf_countries` VALUES (71, 'SZ', '斯威士兰', 'SWAZILAND');
INSERT INTO `dsf_countries` VALUES (72, 'SD', '苏丹', 'SUDAN');
INSERT INTO `dsf_countries` VALUES (73, 'PT', '葡萄牙', 'PORTUGAL');
INSERT INTO `dsf_countries` VALUES (74, 'NO', '挪威', 'NORWAY');
INSERT INTO `dsf_countries` VALUES (75, 'IN', '印度', 'INDIA');
INSERT INTO `dsf_countries` VALUES (76, 'BD', '孟加拉国', 'BANGLADESH');
INSERT INTO `dsf_countries` VALUES (77, 'YE', '也门阿拉伯共合国', 'YEMEN, REPUBLIC OF.');
INSERT INTO `dsf_countries` VALUES (78, 'AE', '阿拉伯联合酋长国', 'UNITED ARAB EMIRATES');
INSERT INTO `dsf_countries` VALUES (79, 'SY', '叙利亚', 'SYRIA');
INSERT INTO `dsf_countries` VALUES (80, 'QA', '卡塔尔', 'QATAR');
INSERT INTO `dsf_countries` VALUES (81, 'PK', '巴基斯坦', 'PAKISTAN');
INSERT INTO `dsf_countries` VALUES (82, 'OM', '阿曼', 'OMAN');
INSERT INTO `dsf_countries` VALUES (83, 'SR', '苏里南', 'SURINAME');
INSERT INTO `dsf_countries` VALUES (84, 'KG', '吉尔吉斯斯坦', 'KYRGYZSTAN');
INSERT INTO `dsf_countries` VALUES (85, 'LU', '卢森堡', 'LUXEMBOURG');
INSERT INTO `dsf_countries` VALUES (86, 'FR', '法国', 'FRANCE');
INSERT INTO `dsf_countries` VALUES (87, 'NC', '新喀里多尼亚', 'NEW CALEDONIA');
INSERT INTO `dsf_countries` VALUES (88, 'FO', '法鲁群岛', 'FAROE ISLANDS ');
INSERT INTO `dsf_countries` VALUES (89, 'PF', '塔希堤岛', 'TAHITI');
INSERT INTO `dsf_countries` VALUES (90, 'PH', '菲律宾', 'PHILIPPINES');
INSERT INTO `dsf_countries` VALUES (91, 'TH', '泰国', 'THAILAND');
INSERT INTO `dsf_countries` VALUES (92, 'SG', '新加坡', 'SINGAPORE');
INSERT INTO `dsf_countries` VALUES (93, 'MY', '马来西亚', 'MALAYSIA');
INSERT INTO `dsf_countries` VALUES (94, 'TW', '台湾', 'TAIWAN');
INSERT INTO `dsf_countries` VALUES (95, 'BN', '文莱', 'BRUNEI ');
INSERT INTO `dsf_countries` VALUES (96, 'NZ', '新西兰', 'NEW ZEALAND');
INSERT INTO `dsf_countries` VALUES (97, 'NR', '瑙鲁共和国', 'NAURU REPUBLIC');
INSERT INTO `dsf_countries` VALUES (98, 'HU', '匈牙利', 'HUNGARY');
INSERT INTO `dsf_countries` VALUES (99, 'GE', '格鲁吉亚', 'GEORGIA');
INSERT INTO `dsf_countries` VALUES (100, 'CZ', '捷克共和国', 'CZECH,REPUBLIC');
INSERT INTO `dsf_countries` VALUES (101, 'HR', '克罗地亚', 'CROATIA');
INSERT INTO `dsf_countries` VALUES (102, 'BG', '保加利亚', 'BULGARIA');
INSERT INTO `dsf_countries` VALUES (103, 'HN', '洪都拉斯', 'HONDURAS');
INSERT INTO `dsf_countries` VALUES (104, 'AM', '亚美尼亚(独联体)', 'ARMENIA(C.I.S.)');
INSERT INTO `dsf_countries` VALUES (105, 'AL', '阿尔巴尼亚', 'ALBANIA');
INSERT INTO `dsf_countries` VALUES (106, 'GY', '圭亚那', 'GUYANA(BRITISH)');
INSERT INTO `dsf_countries` VALUES (107, 'GF', '法属圭亚那', 'FRENCH GUIANA');
INSERT INTO `dsf_countries` VALUES (108, 'SV', '萨尔瓦多', 'EL SALVADOR');
INSERT INTO `dsf_countries` VALUES (109, 'BM', '百慕大', 'BERMUDA ');
INSERT INTO `dsf_countries` VALUES (110, 'BB', '巴巴多斯', 'BARBADOS  ');
INSERT INTO `dsf_countries` VALUES (111, 'BS', '巴哈马', 'BAHAMAS');
INSERT INTO `dsf_countries` VALUES (112, 'AW', '阿鲁巴岛', 'ARUBA ');
INSERT INTO `dsf_countries` VALUES (113, 'MP', '塞班', 'SAIPAN');
INSERT INTO `dsf_countries` VALUES (114, 'WS', '西萨摩亚', 'WESTERN SAMOA');
INSERT INTO `dsf_countries` VALUES (115, 'DO', '多米尼加共合国', 'DOMINICAN REPUBLIC');
INSERT INTO `dsf_countries` VALUES (116, 'KY', '开曼群岛', 'CAYMAN ISLANDS');
INSERT INTO `dsf_countries` VALUES (117, 'XC', '库拉索岛(荷兰)', 'CURACAO');
INSERT INTO `dsf_countries` VALUES (118, 'US', '美国', 'U.S.A.');
INSERT INTO `dsf_countries` VALUES (119, 'MM', '缅甸', 'MYANMAR');
INSERT INTO `dsf_countries` VALUES (120, 'AD', '安道尔', 'ANDORRA');
INSERT INTO `dsf_countries` VALUES (121, 'LA', '老挝', 'LAOS');
INSERT INTO `dsf_countries` VALUES (122, 'CA', '加拿大', 'CANADA ');
INSERT INTO `dsf_countries` VALUES (123, 'KN', '圣基茨', 'ST.KITTS');
INSERT INTO `dsf_countries` VALUES (124, 'TP', '东帝汶', 'EAST TIMOR');
INSERT INTO `dsf_countries` VALUES (125, 'CD', '刚果共和国', 'CONGO,THE DEMOCRATIC REPUBLIC OF CD');
INSERT INTO `dsf_countries` VALUES (126, 'AF', '阿富汗', 'AFGHANISTAN');
INSERT INTO `dsf_countries` VALUES (127, 'XE', '圣尤斯塔提马斯岛', 'ST.EUSTATIUS');
INSERT INTO `dsf_countries` VALUES (128, 'MX', '墨西哥', 'MEXICO');
INSERT INTO `dsf_countries` VALUES (129, 'LB', '黎巴嫩', 'LEBANON');
INSERT INTO `dsf_countries` VALUES (130, 'KW', '科威特', 'KUWAIT');
INSERT INTO `dsf_countries` VALUES (131, 'IL', '以色列', 'ISRAEL');
INSERT INTO `dsf_countries` VALUES (132, 'IQ', '伊拉克', 'IRAQ');
INSERT INTO `dsf_countries` VALUES (133, 'EG', '埃及', 'EGYPT');
INSERT INTO `dsf_countries` VALUES (134, 'CY', '塞浦路斯', 'CYPRUS');
INSERT INTO `dsf_countries` VALUES (135, 'VE', '委内瑞拉', 'VENEZUELA');
INSERT INTO `dsf_countries` VALUES (136, 'UZ', '乌兹别克斯坦', 'UZBEKISTAN');
INSERT INTO `dsf_countries` VALUES (137, 'UA', '乌克兰', 'UKRAINE');
INSERT INTO `dsf_countries` VALUES (138, 'TM', '土库曼斯坦', 'TURKMENISTAN');
INSERT INTO `dsf_countries` VALUES (139, 'SI', '斯洛文尼亚', 'SLOVENIA');
INSERT INTO `dsf_countries` VALUES (140, 'PR', '波多黎各', 'PUERTO RICO');
INSERT INTO `dsf_countries` VALUES (141, 'RU', '俄罗斯联邦', 'RUSSIAN FEDERATION');
INSERT INTO `dsf_countries` VALUES (142, 'RO', '罗马尼亚', 'ROMANIA');
INSERT INTO `dsf_countries` VALUES (143, 'PE', '秘鲁', 'PERU');
INSERT INTO `dsf_countries` VALUES (144, 'PY', '巴拉圭', 'PARAGUAY ');
INSERT INTO `dsf_countries` VALUES (145, 'MD', '摩尔多瓦', 'MOLDOVA');
INSERT INTO `dsf_countries` VALUES (146, 'MK', '马其顿', 'MACEDONIA,YGSL.REP.');
INSERT INTO `dsf_countries` VALUES (147, 'PA', '巴拿马', 'PANAMA');
INSERT INTO `dsf_countries` VALUES (148, 'LV', '拉脱维亚', 'LATVIA');
INSERT INTO `dsf_countries` VALUES (149, 'NI', '尼加拉瓜', 'NICARAGUA');
INSERT INTO `dsf_countries` VALUES (150, 'KZ', '哈萨克斯坦', 'KAZAKHSTAN');
INSERT INTO `dsf_countries` VALUES (151, 'JP', '日本', 'JAPAN');
INSERT INTO `dsf_countries` VALUES (152, 'KH', '柬埔寨', 'CAMBODIA');
INSERT INTO `dsf_countries` VALUES (153, 'XM', '圣马腾岛', 'ST.MAARTEN');
INSERT INTO `dsf_countries` VALUES (154, 'LC', '圣卢西亚', 'ST.LUCIA');
INSERT INTO `dsf_countries` VALUES (155, 'MC', '摩纳哥', 'MONACO');
INSERT INTO `dsf_countries` VALUES (156, 'AG', '安提瓜', 'ANTIGUA  ');
INSERT INTO `dsf_countries` VALUES (157, 'AI', '安圭拉', 'ANGUILLA  ');
INSERT INTO `dsf_countries` VALUES (158, 'LI', '列支敦士登', 'LIECHTENSTEIN');
INSERT INTO `dsf_countries` VALUES (159, 'JE', '泽西岛(英属)', 'JERSEY');
INSERT INTO `dsf_countries` VALUES (160, 'VI', '美属维尔京群岛', 'VIRGIN ISLAND (US)');
INSERT INTO `dsf_countries` VALUES (161, 'VG', '英属维尔京群岛', 'VIRGIN ISLAND (GB)');
INSERT INTO `dsf_countries` VALUES (162, 'IT', '意大利', 'ITALY');
INSERT INTO `dsf_countries` VALUES (163, 'IE', '爱尔兰', 'IRELAND');
INSERT INTO `dsf_countries` VALUES (164, 'TT', '特立尼达和多巴哥', 'TRINIDAD AND TOBAGO');
INSERT INTO `dsf_countries` VALUES (165, 'FJ', '斐济', 'FIJI ');
INSERT INTO `dsf_countries` VALUES (166, 'DE', '德国', 'GERMANY');
INSERT INTO `dsf_countries` VALUES (167, 'MS', '蒙特塞拉岛', 'MONTSERRAT');
INSERT INTO `dsf_countries` VALUES (168, 'MQ', '马提尼克岛', 'MARTINIQUE');
INSERT INTO `dsf_countries` VALUES (169, 'JM', '牙买加', 'JAMAICA(SAVANNA)');
INSERT INTO `dsf_countries` VALUES (170, 'DM', '多米尼加', 'DOMINICA');
INSERT INTO `dsf_countries` VALUES (171, 'GB', '英国', 'UNITED KINGDOM ');
INSERT INTO `dsf_countries` VALUES (172, 'GP', '瓜德罗普', 'GUADELOUPE');
INSERT INTO `dsf_countries` VALUES (173, 'BE', '比利时', 'BELGIUM');
INSERT INTO `dsf_countries` VALUES (174, 'CS_', '塞尔维亚和黑山', 'SERBIA AND MONTENEGRO');
INSERT INTO `dsf_countries` VALUES (175, 'PG', '巴布亚新几内亚', 'PAPUA NEW GUINEA');
INSERT INTO `dsf_countries` VALUES (176, 'CH', '瑞士', 'SWITZERLAND');
INSERT INTO `dsf_countries` VALUES (177, 'NU', '纽埃岛', 'NIUE');
INSERT INTO `dsf_countries` VALUES (178, 'NL', '荷兰', 'NETHERLANDS');
INSERT INTO `dsf_countries` VALUES (179, 'GR', '希腊', 'GREECE');
INSERT INTO `dsf_countries` VALUES (180, 'BT', '不丹', 'BHUTAN');
INSERT INTO `dsf_countries` VALUES (181, 'AS', '美属萨摩亚群岛', 'AMERICAN SAMOA');
INSERT INTO `dsf_countries` VALUES (182, 'FI', '芬兰', 'FINLAND');
INSERT INTO `dsf_countries` VALUES (183, 'AT', '奥地利', 'AUSTRIA');
INSERT INTO `dsf_countries` VALUES (184, 'LY', '利比亚', 'LIBYA');
INSERT INTO `dsf_countries` VALUES (185, 'BA', '波黑共合国', 'BOSNIA & HERZEGOVIA');
INSERT INTO `dsf_countries` VALUES (186, 'CI', '科特迪瓦', 'COTE D''LVOIRE(IVORY)');
INSERT INTO `dsf_countries` VALUES (187, 'BI', '布隆迪', 'BURUNDI');
INSERT INTO `dsf_countries` VALUES (188, 'PW', '帕劳', 'PALAU');
INSERT INTO `dsf_countries` VALUES (189, 'EC', '厄瓜多尔', 'ECUADOR');
INSERT INTO `dsf_countries` VALUES (190, 'DZ', '阿尔及利亚', 'ALGERIA');
INSERT INTO `dsf_countries` VALUES (191, 'ER', '厄里特立亚', 'ERITREA ');
INSERT INTO `dsf_countries` VALUES (192, 'TG', '多哥', 'TOGO');
INSERT INTO `dsf_countries` VALUES (193, 'ZA', '南非', 'SOUTH AFRICA');
INSERT INTO `dsf_countries` VALUES (194, 'ES', '西班牙', 'SPAIN');
INSERT INTO `dsf_countries` VALUES (195, 'BH', '巴林', 'BAHRAIN ');
INSERT INTO `dsf_countries` VALUES (196, 'TR', '土耳其', 'TURKEY');
INSERT INTO `dsf_countries` VALUES (197, 'NP', '尼泊尔', 'NEPAL');
INSERT INTO `dsf_countries` VALUES (198, 'MV', '马尔代夫', 'MALDIVES');
INSERT INTO `dsf_countries` VALUES (199, 'JO', '约旦', 'JORDAN');
INSERT INTO `dsf_countries` VALUES (200, 'IR', '伊朗', 'IRAN(ISLAMIC REP.)');
INSERT INTO `dsf_countries` VALUES (201, 'UY', '乌拉圭', 'URUGUAY');
INSERT INTO `dsf_countries` VALUES (202, 'SK', '斯洛伐克共和国', 'SLOVAKIA REPUBLIC');
INSERT INTO `dsf_countries` VALUES (203, 'PL', '波兰', 'POLAND');
INSERT INTO `dsf_countries` VALUES (204, 'LT', '立陶宛', 'LITHUANIA');
INSERT INTO `dsf_countries` VALUES (205, 'XN', '尼维斯岛', 'NEVIS');
INSERT INTO `dsf_countries` VALUES (206, 'VC', '圣文森特岛', 'ST.VINCENT');
INSERT INTO `dsf_countries` VALUES (207, 'KI', '基利巴提共和国', 'KIRIBATI REPUBLIC');
INSERT INTO `dsf_countries` VALUES (208, 'GU', '关岛', 'GUAM ');
INSERT INTO `dsf_countries` VALUES (209, 'CK', '库克群岛', 'COOK ISLAND');
INSERT INTO `dsf_countries` VALUES (210, 'HT', '海地', 'HAITI');
INSERT INTO `dsf_countries` VALUES (211, 'GD', '格林纳达', 'GRENADA');
INSERT INTO `dsf_countries` VALUES (212, 'VU', '瓦努阿图', 'VANUATU');
INSERT INTO `dsf_countries` VALUES (213, 'SA', '沙特阿拉伯', 'SAUDI ARABIA');
INSERT INTO `dsf_countries` VALUES (214, 'NE', '尼日尔', 'NIGER');
INSERT INTO `dsf_countries` VALUES (215, 'LR', '利比里亚', 'LIBERIA');
INSERT INTO `dsf_countries` VALUES (216, 'GN', '几内亚', 'GUINEA');
INSERT INTO `dsf_countries` VALUES (217, 'CO', '哥伦比亚', 'COLOMBIA');
INSERT INTO `dsf_countries` VALUES (218, 'BZ', '伯利兹', 'BELIZE ');
INSERT INTO `dsf_countries` VALUES (219, 'AR', '阿根廷', 'ARGENTINA');
INSERT INTO `dsf_countries` VALUES (220, 'RS', '塞尔维亚共和国', 'SERBIA,REPUBLIC OF');
INSERT INTO `dsf_countries` VALUES (221, 'AN', '安的列斯群岛', 'NETHERLANDS ANTILLES');
INSERT INTO `dsf_countries` VALUES (222, 'KR', '韩国', 'SOUTH KOREA');
INSERT INTO `dsf_countries` VALUES (223, 'AU', '澳大利亚', 'AUSTRALIA');
INSERT INTO `dsf_countries` VALUES (224, 'KM', '科摩罗', 'COMOROS');
INSERT INTO `dsf_countries` VALUES (225, 'EE', '爱沙尼亚', 'ESTONIA');
INSERT INTO `dsf_countries` VALUES (226, 'BY', '白俄罗斯(独联体)', 'BELARUS');
INSERT INTO `dsf_countries` VALUES (227, 'GT', '危地马拉', 'GUATEMALA ');
INSERT INTO `dsf_countries` VALUES (228, 'XY', '圣巴特勒米岛', 'ST.BANTHELEMY');
INSERT INTO `dsf_countries` VALUES (229, 'VN', '越南', 'VIETNAM');
INSERT INTO `dsf_countries` VALUES (230, 'TC', '特克斯和凯科斯群岛', 'TURKS & CAICOS ISLANDS');
INSERT INTO `dsf_countries` VALUES (231, 'GG', '根西岛', 'GUERNSEY');
INSERT INTO `dsf_countries` VALUES (232, 'MH', '马绍尔群岛', 'MARSHALL ISLANDS');
INSERT INTO `dsf_countries` VALUES (233, 'DK', '丹麦', 'DENMARK');
INSERT INTO `dsf_countries` VALUES (234, 'KV', 'KOSOVO', 'KOSOVO');
INSERT INTO `dsf_countries` VALUES (235, 'SM', 'SAN MARINO', 'SAN MARINO');
INSERT INTO `dsf_countries` VALUES (236, 'PN', '皮特凯恩群岛', 'PITCAIRN ISLANDS');
INSERT INTO `dsf_countries` VALUES (237, 'SH', '圣赫勒拿岛', 'ST HELENA');
INSERT INTO `dsf_countries` VALUES (238, 'TA', '特里斯坦', 'TRISTAN DA CUNBA');
INSERT INTO `dsf_countries` VALUES (239, 'VA', '梵蒂冈', 'VATICAN CITY');
INSERT INTO `dsf_countries` VALUES (240, 'XG', '北非西班牙属土', 'SPANISH TERRITORIES OF N. AFRICA');
INSERT INTO `dsf_countries` VALUES (241, 'UM', '美国本土外小岛屿', 'UNITED STATES MINOR OUTLYING ISLANDS');
INSERT INTO `dsf_countries` VALUES (242, 'FX', '法属美特罗波利坦', 'FRANCE, METROPOLITAN');
INSERT INTO `dsf_countries` VALUES (243, 'PM', '圣皮埃尔和密克隆群岛', 'SAINT PIERRE AND MIQUELON');

-- --------------------------------------------------------

-- 
-- 表的结构 `dsf_countries_map`
-- 

CREATE TABLE `dsf_countries_map` (
  `id` int(11) NOT NULL auto_increment,
  `countries_id` int(11) default NULL,
  `dsf_countries_id` int(11) default NULL,
  `countries_iso_code_2` varchar(32) default NULL,
  `dsf_countries_iso_code_2` varchar(32) default NULL,
  PRIMARY KEY  (`id`),
  KEY `countries_id` (`countries_id`,`dsf_countries_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=227 ;

-- 
-- 导出表中的数据 `dsf_countries_map`
-- 

INSERT INTO `dsf_countries_map` VALUES (1, 139, 1, 'FM', 'FM');
INSERT INTO `dsf_countries_map` VALUES (2, 125, 2, 'MO', 'MO');
INSERT INTO `dsf_countries_map` VALUES (3, 100, 3, 'ID', 'ID');
INSERT INTO `dsf_countries_map` VALUES (4, 15, 4, 'AZ', 'AZ');
INSERT INTO `dsf_countries_map` VALUES (5, 174, 5, 'RE', 'RE');
INSERT INTO `dsf_countries_map` VALUES (6, 128, 6, 'MW', 'MW');
INSERT INTO `dsf_countries_map` VALUES (7, 239, 7, 'ZW', 'ZW');
INSERT INTO `dsf_countries_map` VALUES (8, 203, 8, 'SE', 'SE');
INSERT INTO `dsf_countries_map` VALUES (9, 196, 9, 'LK', 'LK');
INSERT INTO `dsf_countries_map` VALUES (10, 137, 10, 'YT', 'YT');
INSERT INTO `dsf_countries_map` VALUES (11, 183, 11, 'ST', 'ST');
INSERT INTO `dsf_countries_map` VALUES (12, 78, 13, 'GA', 'GA');
INSERT INTO `dsf_countries_map` VALUES (13, 68, 14, 'ET', 'ET');
INSERT INTO `dsf_countries_map` VALUES (14, 65, 15, 'GQ', 'GQ');
INSERT INTO `dsf_countries_map` VALUES (15, 58, 16, 'DJ', 'DJ');
INSERT INTO `dsf_countries_map` VALUES (16, 49, 17, 'CG', 'CG');
INSERT INTO `dsf_countries_map` VALUES (17, 42, 18, 'TD', 'TD');
INSERT INTO `dsf_countries_map` VALUES (18, 41, 19, 'CF', 'CF');
INSERT INTO `dsf_countries_map` VALUES (19, 39, 20, 'CV', 'CV');
INSERT INTO `dsf_countries_map` VALUES (20, 37, 21, 'CM', 'CM');
INSERT INTO `dsf_countries_map` VALUES (21, 79, 22, 'GM', 'GM');
INSERT INTO `dsf_countries_map` VALUES (22, 54, 23, 'CU', 'CU');
INSERT INTO `dsf_countries_map` VALUES (23, 112, 24, 'KP', 'KP');
INSERT INTO `dsf_countries_map` VALUES (24, 218, 26, 'TV', 'TV');
INSERT INTO `dsf_countries_map` VALUES (25, 85, 27, 'GL', 'GL');
INSERT INTO `dsf_countries_map` VALUES (26, 69, 29, 'FK', 'FK');
INSERT INTO `dsf_countries_map` VALUES (27, 96, 30, 'HK', 'HK');
INSERT INTO `dsf_countries_map` VALUES (28, 207, 31, 'TJ', 'TJ');
INSERT INTO `dsf_countries_map` VALUES (29, 191, 32, 'SB', 'SB');
INSERT INTO `dsf_countries_map` VALUES (30, 44, 33, 'CN', 'CN');
INSERT INTO `dsf_countries_map` VALUES (31, 192, 34, 'SO', 'SO');
INSERT INTO `dsf_countries_map` VALUES (32, 187, 35, 'SL', 'SL');
INSERT INTO `dsf_countries_map` VALUES (33, 186, 36, 'SC', 'SC');
INSERT INTO `dsf_countries_map` VALUES (34, 185, 37, 'SN', 'SN');
INSERT INTO `dsf_countries_map` VALUES (35, 177, 38, 'RW', 'RW');
INSERT INTO `dsf_countries_map` VALUES (36, 156, 39, 'NG', 'NG');
INSERT INTO `dsf_countries_map` VALUES (37, 147, 40, 'NA', 'NA');
INSERT INTO `dsf_countries_map` VALUES (38, 145, 41, 'MZ', 'MZ');
INSERT INTO `dsf_countries_map` VALUES (39, 144, 42, 'MA', 'MA');
INSERT INTO `dsf_countries_map` VALUES (40, 136, 43, 'MU', 'MU');
INSERT INTO `dsf_countries_map` VALUES (41, 135, 44, 'MR', 'MR');
INSERT INTO `dsf_countries_map` VALUES (42, 132, 45, 'MT', 'MT');
INSERT INTO `dsf_countries_map` VALUES (43, 131, 46, 'ML', 'ML');
INSERT INTO `dsf_countries_map` VALUES (44, 127, 47, 'MG', 'MG');
INSERT INTO `dsf_countries_map` VALUES (45, 212, 48, 'TO', 'TO');
INSERT INTO `dsf_countries_map` VALUES (46, 119, 49, 'LS', 'LS');
INSERT INTO `dsf_countries_map` VALUES (47, 110, 50, 'KE', 'KE');
INSERT INTO `dsf_countries_map` VALUES (48, 91, 51, 'GW', 'GW');
INSERT INTO `dsf_countries_map` VALUES (49, 82, 52, 'GH', 'GH');
INSERT INTO `dsf_countries_map` VALUES (50, 51, 54, 'CR', 'CR');
INSERT INTO `dsf_countries_map` VALUES (51, 43, 55, 'CL', 'CL');
INSERT INTO `dsf_countries_map` VALUES (52, 30, 56, 'BR', 'BR');
INSERT INTO `dsf_countries_map` VALUES (53, 26, 57, 'BO', 'BO');
INSERT INTO `dsf_countries_map` VALUES (54, 34, 58, 'BF', 'BF');
INSERT INTO `dsf_countries_map` VALUES (55, 28, 59, 'BW', 'BW');
INSERT INTO `dsf_countries_map` VALUES (56, 23, 60, 'BJ', 'BJ');
INSERT INTO `dsf_countries_map` VALUES (57, 6, 61, 'AO', 'AO');
INSERT INTO `dsf_countries_map` VALUES (58, 98, 62, 'IS', 'IS');
INSERT INTO `dsf_countries_map` VALUES (59, 83, 63, 'GI', 'GI');
INSERT INTO `dsf_countries_map` VALUES (60, 142, 64, 'MN', 'MN');
INSERT INTO `dsf_countries_map` VALUES (61, 238, 65, 'ZM', 'ZM');
INSERT INTO `dsf_countries_map` VALUES (62, 237, 66, 'ZR', 'ZR');
INSERT INTO `dsf_countries_map` VALUES (63, 219, 67, 'UG', 'UG');
INSERT INTO `dsf_countries_map` VALUES (64, 214, 68, 'TN', 'TN');
INSERT INTO `dsf_countries_map` VALUES (65, 208, 69, 'TZ', 'TZ');
INSERT INTO `dsf_countries_map` VALUES (66, 202, 70, 'SZ', 'SZ');
INSERT INTO `dsf_countries_map` VALUES (67, 199, 71, 'SD', 'SD');
INSERT INTO `dsf_countries_map` VALUES (68, 171, 72, 'PT', 'PT');
INSERT INTO `dsf_countries_map` VALUES (69, 160, 73, 'NO', 'NO');
INSERT INTO `dsf_countries_map` VALUES (70, 99, 74, 'IN', 'IN');
INSERT INTO `dsf_countries_map` VALUES (71, 18, 75, 'BD', 'BD');
INSERT INTO `dsf_countries_map` VALUES (72, 235, 76, 'YE', 'YE');
INSERT INTO `dsf_countries_map` VALUES (73, 221, 77, 'AE', 'AE');
INSERT INTO `dsf_countries_map` VALUES (74, 205, 78, 'SY', 'SY');
INSERT INTO `dsf_countries_map` VALUES (75, 173, 79, 'QA', 'QA');
INSERT INTO `dsf_countries_map` VALUES (76, 162, 80, 'PK', 'PK');
INSERT INTO `dsf_countries_map` VALUES (77, 161, 81, 'OM', 'OM');
INSERT INTO `dsf_countries_map` VALUES (78, 200, 82, 'SR', 'SR');
INSERT INTO `dsf_countries_map` VALUES (79, 115, 83, 'KG', 'KG');
INSERT INTO `dsf_countries_map` VALUES (80, 124, 84, 'LU', 'LU');
INSERT INTO `dsf_countries_map` VALUES (81, 73, 85, 'FR', 'FR');
INSERT INTO `dsf_countries_map` VALUES (82, 152, 86, 'NC', 'NC');
INSERT INTO `dsf_countries_map` VALUES (83, 70, 87, 'FO', 'FO');
INSERT INTO `dsf_countries_map` VALUES (84, 76, 88, 'PF', 'PF');
INSERT INTO `dsf_countries_map` VALUES (85, 168, 89, 'PH', 'PH');
INSERT INTO `dsf_countries_map` VALUES (86, 209, 90, 'TH', 'TH');
INSERT INTO `dsf_countries_map` VALUES (87, 188, 91, 'SG', 'SG');
INSERT INTO `dsf_countries_map` VALUES (88, 129, 92, 'MY', 'MY');
INSERT INTO `dsf_countries_map` VALUES (89, 206, 93, 'TW', 'TW');
INSERT INTO `dsf_countries_map` VALUES (90, 32, 94, 'BN', 'BN');
INSERT INTO `dsf_countries_map` VALUES (91, 153, 95, 'NZ', 'NZ');
INSERT INTO `dsf_countries_map` VALUES (92, 148, 96, 'NR', 'NR');
INSERT INTO `dsf_countries_map` VALUES (93, 97, 97, 'HU', 'HU');
INSERT INTO `dsf_countries_map` VALUES (94, 80, 98, 'GE', 'GE');
INSERT INTO `dsf_countries_map` VALUES (95, 56, 99, 'CZ', 'CZ');
INSERT INTO `dsf_countries_map` VALUES (96, 53, 100, 'HR', 'HR');
INSERT INTO `dsf_countries_map` VALUES (97, 33, 101, 'BG', 'BG');
INSERT INTO `dsf_countries_map` VALUES (98, 95, 102, 'HN', 'HN');
INSERT INTO `dsf_countries_map` VALUES (99, 11, 103, 'AM', 'AM');
INSERT INTO `dsf_countries_map` VALUES (100, 2, 104, 'AL', 'AL');
INSERT INTO `dsf_countries_map` VALUES (101, 92, 105, 'GY', 'GY');
INSERT INTO `dsf_countries_map` VALUES (102, 75, 106, 'GF', 'GF');
INSERT INTO `dsf_countries_map` VALUES (103, 64, 107, 'SV', 'SV');
INSERT INTO `dsf_countries_map` VALUES (104, 24, 108, 'BM', 'BM');
INSERT INTO `dsf_countries_map` VALUES (105, 19, 109, 'BB', 'BB');
INSERT INTO `dsf_countries_map` VALUES (106, 16, 110, 'BS', 'BS');
INSERT INTO `dsf_countries_map` VALUES (107, 12, 111, 'AW', 'AW');
INSERT INTO `dsf_countries_map` VALUES (108, 159, 112, 'MP', 'MP');
INSERT INTO `dsf_countries_map` VALUES (109, 181, 113, 'WS', 'WS');
INSERT INTO `dsf_countries_map` VALUES (110, 60, 114, 'DO', 'DO');
INSERT INTO `dsf_countries_map` VALUES (111, 40, 115, 'KY', 'KY');
INSERT INTO `dsf_countries_map` VALUES (112, 223, 117, 'US', 'US');
INSERT INTO `dsf_countries_map` VALUES (113, 146, 118, 'MM', 'MM');
INSERT INTO `dsf_countries_map` VALUES (114, 5, 119, 'AD', 'AD');
INSERT INTO `dsf_countries_map` VALUES (115, 116, 120, 'LA', 'LA');
INSERT INTO `dsf_countries_map` VALUES (116, 38, 121, 'CA', 'CA');
INSERT INTO `dsf_countries_map` VALUES (117, 178, 122, 'KN', 'KN');
INSERT INTO `dsf_countries_map` VALUES (118, 61, 123, 'TP', 'TP');
INSERT INTO `dsf_countries_map` VALUES (119, 1, 125, 'AF', 'AF');
INSERT INTO `dsf_countries_map` VALUES (120, 138, 127, 'MX', 'MX');
INSERT INTO `dsf_countries_map` VALUES (121, 118, 128, 'LB', 'LB');
INSERT INTO `dsf_countries_map` VALUES (122, 114, 129, 'KW', 'KW');
INSERT INTO `dsf_countries_map` VALUES (123, 104, 130, 'IL', 'IL');
INSERT INTO `dsf_countries_map` VALUES (124, 102, 131, 'IQ', 'IQ');
INSERT INTO `dsf_countries_map` VALUES (125, 63, 132, 'EG', 'EG');
INSERT INTO `dsf_countries_map` VALUES (126, 55, 133, 'CY', 'CY');
INSERT INTO `dsf_countries_map` VALUES (127, 229, 134, 'VE', 'VE');
INSERT INTO `dsf_countries_map` VALUES (128, 226, 135, 'UZ', 'UZ');
INSERT INTO `dsf_countries_map` VALUES (129, 220, 136, 'UA', 'UA');
INSERT INTO `dsf_countries_map` VALUES (130, 216, 137, 'TM', 'TM');
INSERT INTO `dsf_countries_map` VALUES (131, 190, 138, 'SI', 'SI');
INSERT INTO `dsf_countries_map` VALUES (132, 172, 139, 'PR', 'PR');
INSERT INTO `dsf_countries_map` VALUES (133, 176, 140, 'RU', 'RU');
INSERT INTO `dsf_countries_map` VALUES (134, 175, 141, 'RO', 'RO');
INSERT INTO `dsf_countries_map` VALUES (135, 167, 142, 'PE', 'PE');
INSERT INTO `dsf_countries_map` VALUES (136, 166, 143, 'PY', 'PY');
INSERT INTO `dsf_countries_map` VALUES (137, 140, 144, 'MD', 'MD');
INSERT INTO `dsf_countries_map` VALUES (138, 126, 145, 'MK', 'MK');
INSERT INTO `dsf_countries_map` VALUES (139, 164, 146, 'PA', 'PA');
INSERT INTO `dsf_countries_map` VALUES (140, 117, 147, 'LV', 'LV');
INSERT INTO `dsf_countries_map` VALUES (141, 154, 148, 'NI', 'NI');
INSERT INTO `dsf_countries_map` VALUES (142, 109, 149, 'KZ', 'KZ');
INSERT INTO `dsf_countries_map` VALUES (143, 107, 150, 'JP', 'JP');
INSERT INTO `dsf_countries_map` VALUES (144, 36, 151, 'KH', 'KH');
INSERT INTO `dsf_countries_map` VALUES (145, 179, 153, 'LC', 'LC');
INSERT INTO `dsf_countries_map` VALUES (146, 141, 154, 'MC', 'MC');
INSERT INTO `dsf_countries_map` VALUES (147, 9, 155, 'AG', 'AG');
INSERT INTO `dsf_countries_map` VALUES (148, 7, 156, 'AI', 'AI');
INSERT INTO `dsf_countries_map` VALUES (149, 122, 157, 'LI', 'LI');
INSERT INTO `dsf_countries_map` VALUES (150, 232, 159, 'VI', 'VI');
INSERT INTO `dsf_countries_map` VALUES (151, 231, 160, 'VG', 'VG');
INSERT INTO `dsf_countries_map` VALUES (152, 105, 161, 'IT', 'IT');
INSERT INTO `dsf_countries_map` VALUES (153, 103, 162, 'IE', 'IE');
INSERT INTO `dsf_countries_map` VALUES (154, 213, 163, 'TT', 'TT');
INSERT INTO `dsf_countries_map` VALUES (155, 71, 164, 'FJ', 'FJ');
INSERT INTO `dsf_countries_map` VALUES (156, 81, 165, 'DE', 'DE');
INSERT INTO `dsf_countries_map` VALUES (157, 143, 166, 'MS', 'MS');
INSERT INTO `dsf_countries_map` VALUES (158, 134, 167, 'MQ', 'MQ');
INSERT INTO `dsf_countries_map` VALUES (159, 106, 168, 'JM', 'JM');
INSERT INTO `dsf_countries_map` VALUES (160, 59, 169, 'DM', 'DM');
INSERT INTO `dsf_countries_map` VALUES (161, 222, 170, 'GB', 'GB');
INSERT INTO `dsf_countries_map` VALUES (162, 87, 171, 'GP', 'GP');
INSERT INTO `dsf_countries_map` VALUES (163, 21, 172, 'BE', 'BE');
INSERT INTO `dsf_countries_map` VALUES (164, 165, 174, 'PG', 'PG');
INSERT INTO `dsf_countries_map` VALUES (165, 204, 175, 'CH', 'CH');
INSERT INTO `dsf_countries_map` VALUES (166, 157, 176, 'NU', 'NU');
INSERT INTO `dsf_countries_map` VALUES (167, 150, 177, 'NL', 'NL');
INSERT INTO `dsf_countries_map` VALUES (168, 84, 178, 'GR', 'GR');
INSERT INTO `dsf_countries_map` VALUES (169, 25, 179, 'BT', 'BT');
INSERT INTO `dsf_countries_map` VALUES (170, 4, 180, 'AS', 'AS');
INSERT INTO `dsf_countries_map` VALUES (171, 72, 181, 'FI', 'FI');
INSERT INTO `dsf_countries_map` VALUES (172, 14, 182, 'AT', 'AT');
INSERT INTO `dsf_countries_map` VALUES (173, 121, 183, 'LY', 'LY');
INSERT INTO `dsf_countries_map` VALUES (174, 27, 184, 'BA', 'BA');
INSERT INTO `dsf_countries_map` VALUES (175, 52, 185, 'CI', 'CI');
INSERT INTO `dsf_countries_map` VALUES (176, 35, 186, 'BI', 'BI');
INSERT INTO `dsf_countries_map` VALUES (177, 163, 187, 'PW', 'PW');
INSERT INTO `dsf_countries_map` VALUES (178, 62, 188, 'EC', 'EC');
INSERT INTO `dsf_countries_map` VALUES (179, 3, 189, 'DZ', 'DZ');
INSERT INTO `dsf_countries_map` VALUES (180, 66, 190, 'ER', 'ER');
INSERT INTO `dsf_countries_map` VALUES (181, 210, 191, 'TG', 'TG');
INSERT INTO `dsf_countries_map` VALUES (182, 193, 192, 'ZA', 'ZA');
INSERT INTO `dsf_countries_map` VALUES (183, 195, 193, 'ES', 'ES');
INSERT INTO `dsf_countries_map` VALUES (184, 17, 194, 'BH', 'BH');
INSERT INTO `dsf_countries_map` VALUES (185, 215, 195, 'TR', 'TR');
INSERT INTO `dsf_countries_map` VALUES (186, 149, 196, 'NP', 'NP');
INSERT INTO `dsf_countries_map` VALUES (187, 130, 197, 'MV', 'MV');
INSERT INTO `dsf_countries_map` VALUES (188, 108, 198, 'JO', 'JO');
INSERT INTO `dsf_countries_map` VALUES (189, 101, 199, 'IR', 'IR');
INSERT INTO `dsf_countries_map` VALUES (190, 225, 200, 'UY', 'UY');
INSERT INTO `dsf_countries_map` VALUES (191, 189, 201, 'SK', 'SK');
INSERT INTO `dsf_countries_map` VALUES (192, 170, 202, 'PL', 'PL');
INSERT INTO `dsf_countries_map` VALUES (193, 123, 203, 'LT', 'LT');
INSERT INTO `dsf_countries_map` VALUES (194, 180, 205, 'VC', 'VC');
INSERT INTO `dsf_countries_map` VALUES (195, 111, 206, 'KI', 'KI');
INSERT INTO `dsf_countries_map` VALUES (196, 88, 207, 'GU', 'GU');
INSERT INTO `dsf_countries_map` VALUES (197, 50, 208, 'CK', 'CK');
INSERT INTO `dsf_countries_map` VALUES (198, 93, 209, 'HT', 'HT');
INSERT INTO `dsf_countries_map` VALUES (199, 86, 210, 'GD', 'GD');
INSERT INTO `dsf_countries_map` VALUES (200, 227, 211, 'VU', 'VU');
INSERT INTO `dsf_countries_map` VALUES (201, 184, 212, 'SA', 'SA');
INSERT INTO `dsf_countries_map` VALUES (202, 155, 213, 'NE', 'NE');
INSERT INTO `dsf_countries_map` VALUES (203, 120, 214, 'LR', 'LR');
INSERT INTO `dsf_countries_map` VALUES (204, 90, 215, 'GN', 'GN');
INSERT INTO `dsf_countries_map` VALUES (205, 47, 216, 'CO', 'CO');
INSERT INTO `dsf_countries_map` VALUES (206, 22, 217, 'BZ', 'BZ');
INSERT INTO `dsf_countries_map` VALUES (207, 10, 218, 'AR', 'AR');
INSERT INTO `dsf_countries_map` VALUES (208, 151, 220, 'AN', 'AN');
INSERT INTO `dsf_countries_map` VALUES (209, 113, 221, 'KR', 'KR');
INSERT INTO `dsf_countries_map` VALUES (210, 13, 222, 'AU', 'AU');
INSERT INTO `dsf_countries_map` VALUES (211, 48, 223, 'KM', 'KM');
INSERT INTO `dsf_countries_map` VALUES (212, 67, 224, 'EE', 'EE');
INSERT INTO `dsf_countries_map` VALUES (213, 20, 225, 'BY', 'BY');
INSERT INTO `dsf_countries_map` VALUES (214, 89, 226, 'GT', 'GT');
INSERT INTO `dsf_countries_map` VALUES (215, 230, 228, 'VN', 'VN');
INSERT INTO `dsf_countries_map` VALUES (216, 217, 229, 'TC', 'TC');
INSERT INTO `dsf_countries_map` VALUES (217, 133, 231, 'MH', 'MH');
INSERT INTO `dsf_countries_map` VALUES (218, 57, 232, 'DK', 'DK');
INSERT INTO `dsf_countries_map` VALUES (219, 182, 234, 'SM', 'SM');
INSERT INTO `dsf_countries_map` VALUES (220, 169, 235, 'PN', 'PN');
INSERT INTO `dsf_countries_map` VALUES (221, 197, 236, 'SH', 'SH');
INSERT INTO `dsf_countries_map` VALUES (222, 228, 238, 'VA', 'VA');
INSERT INTO `dsf_countries_map` VALUES (223, 224, 240, 'UM', 'UM');
INSERT INTO `dsf_countries_map` VALUES (224, 74, 241, 'FX', 'FX');
INSERT INTO `dsf_countries_map` VALUES (225, 198, 242, 'PM', 'PM');
INSERT INTO `dsf_countries_map` VALUES (226, 233, 243, 'WF', 'WF');

-- --------------------------------------------------------

-- 
-- 表的结构 `dsf_shipping`
-- 

CREATE TABLE `dsf_shipping` (
  `dsf_shipping_id` int(11) NOT NULL auto_increment,
  `dsf_shipping_code` varchar(32) NOT NULL,
  `dsf_shipping_name` varchar(128) NOT NULL,
  `shipping_displays_name` varchar(128) default NULL,
  `shipping_displays_image` varchar(256) default NULL,
  `shipping_displays_note` varchar(128) default NULL,
  `price_percentage` decimal(9,2) default NULL,
  `price_increase` decimal(9,2) default NULL,
  `sort_index` int(11) default NULL,
  `status` int(11) default NULL,
  `created` timestamp NULL default NULL,
  `modified` timestamp NULL default NULL,
  PRIMARY KEY  (`dsf_shipping_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- 导出表中的数据 `dsf_shipping`
-- 

INSERT INTO `dsf_shipping` VALUES (1, 'A0101', '4PX标准', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (2, 'A0105', '香港邮政美国专线', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (3, 'A0115', '4PX联邮通挂号', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (4, 'A0116', '4PX联邮通平邮', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (5, 'A0151', 'DHL出口', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (6, 'A0161', '香港UPS', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (7, 'A0191', '中国EMS国际', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (8, 'A3001', '空邮包裹', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (9, 'A3012', '香港邮政EMS', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (10, 'A3015', '新加坡EMS', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (11, 'A4001', '中国小包挂号(深圳)', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (12, 'A4002', '中国小包平邮(深圳)', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (13, 'A4003', '中国小包挂号(广州)', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (14, 'A4004', '中国小包平邮(广州)', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (15, 'A4010', '香港小包挂号', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (16, 'A4011', '香港小包平邮', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (17, 'A4020', '新加坡小包挂号', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (18, 'A4021', '新加坡小包平邮', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');
INSERT INTO `dsf_shipping` VALUES (19, 'A0171', 'FEDEX', '', '', '', 100.00, 0.00, 0, 0, '2010-12-21 10:33:10', '2010-12-21 10:33:10');

-- --------------------------------------------------------

-- 
-- 表的结构 `email_archive`
-- 

CREATE TABLE `email_archive` (
  `archive_id` int(11) NOT NULL auto_increment,
  `email_to_name` varchar(96) NOT NULL default '',
  `email_to_address` varchar(96) NOT NULL default '',
  `email_from_name` varchar(96) NOT NULL default '',
  `email_from_address` varchar(96) NOT NULL default '',
  `email_subject` varchar(255) NOT NULL default '',
  `email_html` text NOT NULL,
  `email_text` text NOT NULL,
  `date_sent` datetime NOT NULL default '0001-01-01 00:00:00',
  `module` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`archive_id`),
  KEY `idx_email_to_address_zen` (`email_to_address`),
  KEY `idx_module_zen` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `email_archive`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `ezpages`
-- 

CREATE TABLE `ezpages` (
  `pages_id` int(11) NOT NULL auto_increment,
  `languages_id` int(11) NOT NULL default '1',
  `pages_title` varchar(64) NOT NULL default '',
  `alt_url` varchar(255) NOT NULL default '',
  `alt_url_external` varchar(255) NOT NULL default '',
  `pages_html_text` mediumtext,
  `status_header` int(1) NOT NULL default '1',
  `status_sidebox` int(1) NOT NULL default '1',
  `status_footer` int(1) NOT NULL default '1',
  `status_toc` int(1) NOT NULL default '1',
  `header_sort_order` int(3) NOT NULL default '0',
  `sidebox_sort_order` int(3) NOT NULL default '0',
  `footer_sort_order` int(3) NOT NULL default '0',
  `toc_sort_order` int(3) NOT NULL default '0',
  `page_open_new_window` int(1) NOT NULL default '0',
  `page_is_ssl` int(1) NOT NULL default '0',
  `toc_chapter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pages_id`),
  KEY `idx_lang_id_zen` (`languages_id`),
  KEY `idx_ezp_status_header_zen` (`status_header`),
  KEY `idx_ezp_status_sidebox_zen` (`status_sidebox`),
  KEY `idx_ezp_status_footer_zen` (`status_footer`),
  KEY `idx_ezp_status_toc_zen` (`status_toc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

-- 
-- 导出表中的数据 `ezpages`
-- 

INSERT INTO `ezpages` VALUES (1, 1, 'Home', 'index.php', '', '', 1, 0, 0, 0, 1, 0, 0, 10, 0, 0, 10);
INSERT INTO `ezpages` VALUES (2, 1, 'Gifts', 'wholesale-gifts-and-party-supplies_c23', '', '', 0, 0, 0, 0, 5, 0, 0, 30, 0, 0, 10);
INSERT INTO `ezpages` VALUES (3, 1, 'About us', 'about_us.html', '', '', 1, 1, 1, 0, 6, 1, 1, 40, 0, 0, 10);
INSERT INTO `ezpages` VALUES (4, 1, 'Contact us', 'contact_us.html', '', '', 0, 1, 1, 0, 0, 2, 2, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (5, 1, 'Affiliate Program', 'affiliate.html', '', '', 0, 1, 1, 0, 5, 7, 7, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (6, 1, 'Term of use', 'term_of_use.html', '', '', 0, 1, 1, 0, 50, 4, 4, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (7, 1, 'My Account', 'index.php?main_page=account', '', '', 0, 0, 0, 0, 0, 0, 10, 0, 0, 1, 0);
INSERT INTO `ezpages` VALUES (8, 1, 'Site Map', 'site_map.html', '', '', 0, 1, 1, 0, 0, 3, 3, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (9, 1, 'wholesale', 'wholesale.html', '', '', 1, 0, 0, 0, 2, 0, 40, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (10, 1, 'Dropship', 'shippinginfo.html', '', '', 1, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (11, 1, 'Reviews', 'reviews.html', '', '', 0, 1, 1, 0, 0, 6, 6, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (13, 1, 'Privacy notice', 'privacy.html', '', '', 0, 1, 1, 0, 0, 5, 5, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (14, 1, 'See All', 'see_all.html', '', '', 1, 0, 0, 0, 4, 0, 0, 20, 0, 0, 10);
INSERT INTO `ezpages` VALUES (15, 1, 'Golf', '', '', '<p>asfasdfasdf</p>', 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (17, 1, 'Featured', 'featured_products.html', '', '', 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (18, 1, '页脚版权信息简单页', '', '', 'Copyright © 2010 <a href="http://www.mazentop.com/" target="_blank">mazentop.com</a>. All Rights Reserved.<br/>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (19, 1, '页脚支付物流图标简单页', '', '', '<ul style="padding-top: 25px;">\r\n				<img border="0" style="margin-top:-25px;" class="hand" src="includes/templates/chanelwatches/images/logo/logo5.jpg"/>\r\n		    \r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo1.gif"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo2.jpg"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo3.jpg"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo6.jpg"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo4.jpg"/>\r\n		</ul>\r\n		<ul class="margin_t">\r\n		    <div class="clear"></div>\r\n		    <img border="0" style="cursor: pointer;" alt="wholesale PaypalVerify" title="wholesale PaypalVerify " src="includes/templates/chanelwatches/images/logo/PaypalVerify.gif"/>\r\n		    <img border="0" src="includes/templates/chanelwatches/images/logo/visa_logo.jpg"/>\r\n        <img border="0" src="includes/templates/chanelwatches/images/logo/mastercard_logo.jpg"/>\r\n		    <img border="0" src="includes/templates/chanelwatches/images/logo/gif_logo1.gif"/>\r\n		    <img border="0" src="includes/templates/chanelwatches/images/logo/gif_logo2.gif"/>\r\n		    <div class="clear"></div>\r\n		</ul>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (20, 1, 'featured products模块简单页', '', '', '<p align="left">The most  popular watches at pretty cheap price. Simply place the order and get your  dreaming watch within only 3 to 7 working days. Free shipping worldwide, it is  easy to order from us. Just do it now!</p>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (21, 2, '首页', 'index.php', '', '', 1, 0, 0, 0, 1, 0, 0, 10, 0, 0, 10);
INSERT INTO `ezpages` VALUES (22, 2, '礼券', 'wholesale-gifts-and-party-supplies_c23', '', '', 0, 0, 0, 0, 5, 0, 0, 30, 0, 0, 10);
INSERT INTO `ezpages` VALUES (23, 2, '关于我们', 'about_us.html', '', '', 1, 1, 1, 0, 6, 1, 1, 40, 0, 0, 10);
INSERT INTO `ezpages` VALUES (24, 2, '联系我们', 'contact_us.html', '', '', 0, 1, 1, 0, 0, 2, 2, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (25, 2, '合作伙伴', 'affiliate.html', '', '', 0, 1, 1, 0, 5, 7, 7, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (26, 2, '使用协议', 'term_of_use.html', '', '', 0, 1, 1, 0, 50, 4, 4, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (27, 2, '我的账户', 'index.php?main_page=account', '', '', 0, 0, 0, 0, 0, 0, 10, 0, 0, 1, 0);
INSERT INTO `ezpages` VALUES (28, 2, '站点地图', 'site_map.html', '', '', 0, 1, 1, 0, 0, 3, 3, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (29, 2, '批发', 'wholesale.html', '', '', 1, 0, 0, 0, 2, 0, 40, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (30, 2, '物流', 'shippinginfo.html', '', '', 1, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (31, 2, '客户反馈', 'reviews.html', '', '', 0, 1, 1, 0, 0, 6, 6, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (33, 2, '隐私声明', 'privacy.html', '', '', 0, 1, 1, 0, 0, 5, 5, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (34, 2, '全部', 'see_all.html', '', '', 1, 0, 0, 0, 4, 0, 0, 20, 0, 0, 10);
INSERT INTO `ezpages` VALUES (35, 2, 'Golf', '', '', '<p>asfasdfasdf</p>', 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (37, 2, '推荐', 'featured_products.html', '', '', 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (38, 2, '页脚版权信息简单页', '', '', 'Copyright © 2010 <a href="http://www.mazentop.com/" target="_blank">mazentop.com</a>. All Rights Reserved.<br/>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (41, 2, 'Wholesale页面简单页内容', '', '', '<h3 class="line_30px border_b">为什么需要购买我们的商品</h3>\r\n<p>我们的商品更实惠</p>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (42, 1, 'Wholesale页面简单页内容', '', '', '<h3 class="line_30px border_b">Why buy wholesale goods directly from China on MY STORE?</h3>\r\n<p>Replica-Watches-Mall.COM is a leading worldwide wholesaler. More than 100 thousands of quality merchandises and big brand name products are available here at wholesale price. Start your wholesale sourcing here from today to experience best service and fast shipping.</p>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (43, 2, 'Aboutus页面简单页', '', '', '<div class="margin_t pad_10px pad_l_28px">\r\n<h4>关于我们</h4>\r\n<div>一家高科技企业\r\n</div>\r\n<h4 class="margin_t">命名渊源</h4>\r\n<div>名字来源于。。。</div>\r\n<h4 class="margin_t">我们承诺:</h4>\r\n<ul class="gray_trangle_list pad_1em">\r\n<li>提供7*24小时客户服务。</li>\r\n</ul>\r\n</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (39, 2, '页脚支付物流图标简单页', '', '', '<ul style="padding-top: 25px;">\r\n				<img border="0" style="margin-top:-25px;" class="hand fl" src="includes/templates/chanelwatches/images/logo/logo5.jpg"/>\r\n		    \r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo1.gif"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo2.jpg"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo3.jpg"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo6.jpg"/>\r\n				<img border="0" src="includes/templates/chanelwatches/images/logo/logo4.jpg"/>\r\n		</ul>\r\n		<ul class="margin_t">\r\n		    <div class="clear"></div>\r\n		    <img border="0" style="cursor: pointer;" alt="wholesale PaypalVerify" title="wholesale PaypalVerify " src="includes/templates/chanelwatches/images/logo/PaypalVerify.gif"/>\r\n		    <img border="0" src="includes/templates/chanelwatches/images/logo/visa_logo.jpg"/>\r\n        <img border="0" src="includes/templates/chanelwatches/images/logo/mastercard_logo.jpg"/>\r\n		    <img border="0" src="includes/templates/chanelwatches/images/logo/gif_logo1.gif"/>\r\n		    <img border="0" src="includes/templates/chanelwatches/images/logo/gif_logo2.gif"/>\r\n		    <div class="clear"></div>\r\n		</ul>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (40, 2, 'featured products模块简单页', '', '', '<p align="left">现在订购吧！</p>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (47, 2, 'WHY BUY * FROM US模块简单页', '', '', '<h3 class="in_1em">为什么买我们的商品？</h3>\r\n<ul id="whybuy">\r\n<li style="height: 108px;">\r\n<p><strong class="line_30px">专业手表生产商</strong></p>\r\n<p class="clear">我们提供上千种优质手表</p>\r\n</li>\r\n<li style="height: 108px;">\r\n<p><strong class="line_30px">为什么不成为我们的会员呢</strong></p>\r\n<p class="clear">注册只需几分钟时间。</p>\r\n<p align="right"><button onclick="window.location.href=''index.php?main_page=login''"><span>现在加入</span></button></p>\r\n</li>\r\n</ul>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (45, 2, 'Search Feedback模块简单页', '', '', '<div class="fr allborder line_180" id="search_feedback">\r\n	<h4 class="line_30px">搜索反馈</h4>\r\n	<ul><li>找到您要的信息了吗？</li></ul>	\r\n	<ul><li class="clear">如果您需要帮助或有自己的建议。 <a rel="nofollow" class="u" title="help" href="index.php?main_page=faq">单击这里</a></li></ul>\r\n</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (46, 1, 'Search Feedback模块简单页', '', '', '<div class="fr allborder line_180" id="search_feedback">\r\n	<h4 class="line_30px">Search Feedback</h4>\r\n	<ul><li>Did you find what you were looking for?</li></ul>	\r\n	<ul><li class="clear">If you need help or have other feedback for Customer Service. <a rel="nofollow" class="u" title="help" href="index.php?main_page=faq">Click here</a></li></ul>\r\n</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (44, 1, 'Aboutus页面简单页', '', '', '<div class="margin_t pad_10px pad_l_28px">\r\n<h4>Our Story</h4>\r\n<div><span class="clear">Replica-Watches-Mall.COM</span> is one of the biggest online replica watchers corporations in Asia, committing itself to build a worldwide supply shop online. Our company was originally set up in Fujian, China in 2009, aiming to operate the business-to-customer transactions with overseas consumers. Along with the rapid development of electronic business in China, Cheap-chanel-watches has earned itself a solid reputation for quality, reliability and professionalism in this field. Our operation capabilities cover favorable policy, affiliate discount, instant and safe delivery, privacy protection and well-rounded customer support.<br>\r\n</div>\r\n<h4 class="margin_t">Our Name</h4>\r\n<div>We derive our name from customer demand and many brand watches. As we are a trade company, we believe in providing solutions to our customers'' need. </div>\r\n<h4 class="margin_t">Our Business</h4>\r\n<div>The mission of Cheap-chanel-watchers.com is to provide you with the hottest goods at hot price from China. You can get lots of brand watches you like on this website. If you like to hunt for something special at low price by fashionable online shopping, then use Cheap-chanel-watchers.com to purchase many thousands of super discount products you are interested in.</div>\r\n<h4 class="margin_t">We promise to:</h4>\r\n<ul class="gray_trangle_list pad_1em">\r\n<li>Provide 24/7 customer support.</li>\r\n<li>Offer our customers the low Chinese price. </li>\r\n<li>Streamline the buying and paying process. </li>\r\n<li>Deliver goods to our customers all over the world with speed and precision. </li>\r\n<li>Ensure the excellent quality of our products. </li>\r\n<li>Help you find products and manufacturers in China. </li>\r\n</ul>\r\n</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (49, 2, 'Dropship页面简单页', '', '', '<div id="shippinginfo" class="right_big_con margin_t">\r\n<h3 class="line_30px border_b">关于物流</h3>\r\n<p>\r\n这里是内容\r\n</p>\r\n<ul class="wholesale"></ul>\r\n<br class="clear">\r\n<div class="content" id="shippingInfoMainContent">\r\n<h3 class="line_30px border_b">只需简单的几步</h3>\r\n<p>依照以下几个步骤做</p>\r\n</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (48, 1, 'WHY BUY * FROM US模块简单页', '', '', '<h3 class="in_1em">Why buy <?php echo INDEX_PRODUCT_SHORTCUT; ?> from us?</h3>\r\n<ul id="whybuy">\r\n<li style="height: 108px;">\r\n<p><strong class="line_30px">Professional replica watches company.</strong></p>\r\n<p class="clear">Replica-Watches-Mall.COM is a leading worldwide replica watches company (or u can say organization). We supply more than thousand high-quality replica watches and famous brand name replication all at cheapest prices. Start your purchase now and experience first class service and fast shipping.</p>\r\n</li>\r\n<li style="height: 108px;">\r\n<p><strong class="line_30px">Why not become our member now?</strong></p>\r\n<p class="clear">It takes just a few moments of your time to become our member and we will reward you with a member-only coupon for your efforts. You''ll also receive free help from our sales representatives who are extremely knowledgeable in our products and who can provide information on the most profitable products. All we require is a valid email address.</p>\r\n<p align="right"><button onclick="window.location.href=''index.php?main_page=login''"><span>Join Now</span></button></p>\r\n</li>\r\n<li style="height: 83px;">\r\n<p><strong class="line_30px">Wholesale in very low minimum quantity.</strong></p>\r\n<p class="clear">If you are trying to purchase in wholesale you can try our first class services by initially purchasing in small quantities. Most of our merchandise can be initially purchased in single units as a sample product and also at sample prices.</p>\r\n</li>\r\n<li style="height: 83px;">\r\n<p><strong class="line_30px">Fast delivery for replica watches from China</strong></p>\r\n<p class="clear">We use DHL, EMS and UPS ect... From China to major destinations like US, Europe and Australia it only takes 3 to 7 working days.</p>\r\n</li>\r\n<li style="height: 83px;">\r\n<p><strong class="line_30px">Its so easy to place an order.</strong></p>\r\n<p class="clear">You only need to register an account on our website before you place an order. We provide the most advanced fast and secure payment systems such as PayPal. You can also pay for your goods by wire transfer and other methods you are favor to use.</p>\r\n</li>\r\n<li style="height: 83px;">\r\n<p><strong class="line_30px">Security</strong></p>\r\n<p class="clear">Security is at top priority at Replica-Watches-Mall.COM . We ensure the integrity and encryption of the data of every transaction by applying the most advanced security solution provider VeriSign.</p>\r\n</li>\r\n</ul>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (51, 2, 'Privacy页面简单页', '', '', '隐私声明内容', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (52, 1, 'Privacy页面简单页', '', '', '﻿<p><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">We understand that you are very concerned about the usage and sharing of your personal information. And we are very appreciated your belief on our prudence and sensitivity handling this issue. This declaration will specify our policy regarding the protection of your privacy. Our website is under the operation of </span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">Replica-Watches-Mall.COM</span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;"> Inc.<br />If you have visited our website, that will be considered to be your acceptance to this privacy policy.<br /><br /></span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;"><strong>Automatically collected information</strong> <br />Whenever you interact with us, we will receive and deposit the given information.<br />For example, like many other sites, we use “cookies”.<br />When your internet browser visits </span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">Replica-Watches-Mall.COM</span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">, we will collect some information. (please refer to the sample of information collecting process stated at the end of this policy)<br />Many companies provide you with the technology that can help you to visit the website anonymously. Although under this condition we can’t offer you the individualized experience on our website as your ID is unidentified, we still like to remind you of the existence of these technologies.<br /><br /><strong>E-mail Correspondence</strong><br />To help us making the E-mail more useful and interesting, when you open the email from </span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">Replica-Watches-Mall.COM</span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">, we will often receive a mail confirming you having read the delivered email. (if your computer support this function)We will also make the comparison between our customer list and other companies’in order to avoid the junk messages.<br />The information from other resources:<br />We may collect your information for other resources and add it into our customer database (please refer to the sample of information collecting process stated at the end of this policy)<br /><br /><strong>Cookies</strong><br />Cookies can be defined as a kind of discriminating symbols consisting of letters and numbers read-in your computer hard disc by us through your internet browser so that our system will identify your browser during your visit and display the characteristics and quantity of items in your shopping cart. <br />The help function of tool bar on your browser will tell you how to prevent the browser from installing new cookies and inform you when the browser installing a new cookie or shut down the cookies totally.<br />Besides, you can close or cancel the alike data of browser add-ons like Flash cookies by changing its setting or visiting other manufactures’websites.<br />However, cookies can help you to make most use of the best special services from Replica-Watches-Mall.COM, so we recommend you to set up an open status for this program.<br /><br /><strong>The Information from Other Resources<br /></strong>The examples of the information we get from other resources containing the depatching and address information we get from our forwarder or other third party, which can correct our record and make it easy to deliver your next order and contact you..<br />Account information, purchasing or returning information, searching keywords and results given by our affiliated enterprises’service, page browsing information gotten from our cooperative enterprises, searching result and links, including not-for-free searching list.<br />The information you can get<br />The information you can get easily from </span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">Replica-Watches-Mall.COM</span><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;"> containing the latest order information, identifiable personal information (including name, email address, password, directory inquiries etc.), payment settings (including credit card details) and so on.</span></p>\r\n<p><span style="font-size: x-small;"><span style="font-family: arial,helvetica,sans-serif;"><strong>                                                                                                                                          </strong></span></span><strong><span style="font-family: arial,helvetica,sans-serif; font-size: x-small;">Replica-Watches-Mall.COM</span></strong><span style="font-size: x-small;"><span style="font-family: arial,helvetica,sans-serif;"><strong> Management.</strong></span></span></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (50, 1, 'Dropship页面简单页', '', '', '<div id="shippinginfo" class="right_big_con margin_t">\r\n<h3 class="line_30px border_b">About Dropship</h3>\r\n<p>Replica-Watches-Mall.COM offers dropship to their registered customers at no extra charge. This service allows you to create a specialized online store and stock it with a vast range of watches. Your online store might focus on certain brand of replica watch but you may decide on supplying a number of goods to your customers.</p>\r\n<p>Choosing dropship from Replica-Watches-Mall.COM means that you do not have to maintain costly inventories or figure out complex programming codes as that is all done for you. Replica-Watches-Mall.COM takes care of all your day-to-day business processes leaving you plenty of time focus on inventories and sales but most importantly making money from your customers.</p>.<ul class="wholesale"></ul><br class="clear">\r\n<div class="content" id="shippingInfoMainContent">\r\n<h3 class="line_30px border_b">Getting started is as easy as 1..2..3</h3>\r\n<p>Now you are ready to begin the process of owning your own Internet business. Simply complete the following three steps:</p>\r\n<table border="0" class="pad_10px">\r\n<tbody>\r\n<tr>\r\n<td width="33%"><img alt="dropship_s1.jpg" src="images/static/dropship_s1.jpg" class="img_fl"><br><strong>Step 1 </strong>Choose the items which you want to order for your customers.</td>\r\n<td width="33%"><img alt="dropship_s2.jpg" src="images/dropship_s2.jpg" class="img_fl"><br><strong>Step 2 </strong>Provide your customer''s shipping address.</td>\r\n<td width="33%"><img alt="dropship_s3.jpg" src="images/static/dropship_s3.jpg" class="img_fl"><br><strong>Step 3</strong> After we confirm the completed payment for your dropship order, we will ship the items fast.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Dropship with <span style="font-size: x-small; font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM</span> enables you to be your own boss with your on Internet company in a matter of hours. We provide you with everything you need to run a profitable Internet company. Our customers enjoy software, supplier, credit card processing, hosting, and a full online training center where you can watch videos that teach you about the industry and how things work.</p>\r\n<p>In order to prevent any fraudulent activity we always double-check account details especially if the shipping address is different to the billing address. So if you are a new drop-shipping customer, please make sure that your paypal account is verified.</p>\r\n<p>We never include <span style="font-size: x-small; font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM</span> publicity materials or invoices within the packages sent to your customers in order to protect your reputation as a reputable vendor. In order to protect the true source of the goods and the price you as the vendor paid for them, <span style="font-size: x-small; font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM</span> employs various methods in order to ensure continuous customer loyalty.</p>\r\n<p>If your customers experience any technical difficulties, or want to return goods purchased, they must first contact you as the <span style="font-size: x-small; font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM</span> Account holder as well as the vendor of their purchased goods.</p>\r\n<p>Please note that any import taxes incurred must be paid to the courier upon delivery of the goods. Therefore when using dropship, your customers will be expected to pay these taxes.</p>\r\n<p>Please note it''s your responsibility as the <span style="font-size: x-small; font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM</span> buyer/ dropship vendor to be knowledgeable in all taxes and inform your customers in advance. <span style="font-size: x-small; font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM</span> accepts ZERO responsibility for providing tax information relevant to your country, although of course we will do whatever we can to help you minimize the tax burden if you have special packing/declaration instructions.</p>\r\n<h2 class="blue g_t_c margin_t">How Dropship Works</h2>\r\n<table width="100%" cellspacing="0" cellpadding="0" border="0" class="pad_10px">\r\n<tbody>\r\n<tr>\r\n<td width="240">Dropshipper ships item to your customer without your customer knowing it is dropshipped.</td>\r\n<td width="226" rowspan="2"><img width="226" height="226" alt="dropship_bg.jpg" src="images/static/dropship_bg.jpg"></td>\r\n<td width="250">Customer goes to your website and places an</td>\r\n</tr>\r\n<tr>\r\n<td>You place the same order with the dropshipper and keep the profits.</td>\r\n<td>Customer places and pays you for the order.</td>\r\n</tr>\r\n</tbody>\r\n</table></div>\r\n\r\n</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (53, 1, 'Term of use页面简单页', '', '', '﻿<p><span style="font-size: x-small;"><span style="font-family: arial,helvetica,sans-serif;">Through enjoying the services provided by Replica-Watches-Mall.COM, you will be engaged to this conditions of use and other relevant policies, conditions and rules. If you disagree with any item of this policy, you can refuse to visit our website.<br /><br /><strong>Privacy<br /></strong>Please refer to our privacy policy to find out our tradition on this issue. That policy is also applicable to your visiting on our website.<br /><br /><strong>Electronic Communication<br /></strong>When you visit Replica-Watches-Mall.COM or send an email to us, you are communicating with us in electronic way, which means that you agree to accept our electronic messages. We will contact you by email or issuing notice on Replica-Watches-Mall.COM. According with legal requirement on these communication to be written <br />If Replica-Watches-Mall.COM can prove that it has sent you the electronic messages or issued the notice on the website, that would be regarded as you have received all the agreement, declaration, proclamation and other information. <br /><br /><strong>Copyright</strong><br />All the information posted on Replica-Watches-Mall.COM such as statement, diagram, sign, button icon, image, audio document segments, digital download, data edit and software belong to the property of Replica-Watches-Mall.COM or its affiliated companies or resource suppliers, under the protection of Chinese and International Copyright Law.<br />The compilation of all the information on our website is the exclusive property of Replica-Watches-Mall.COM Inc., under the protection of Chinese and International Copyright Law<br />All the software employed by Replica-Watches-Mall.COM belong to the property of Replica-Watches-Mall.COM Inc. or its affiliated companies or resource suppliers, under the protection of Chinese and International Copyright Law.<br /><br /><strong>Replica-Watches-Mall.COM''s Right</strong><br />The icons, signs, page header, button icon, statement, service name on our website all belongs to the trade mark or upholster of Replica-Watches-Mall.COM and its affiliated companies. All these icons or upholsters ought not to be employed to any products or services unrelated to Replica-Watches-Mall.COM and its affiliated companies in any manner of possibly misleading consumers or depreciating or defaming Replica-Watches-Mall.COM and its affiliated companies. All other trade marks showing on Replica-Watches-Mall.COM except the principal parts above belong to the respective properties of the owners, who may be or may not be related to Replica-Watches-Mall.COM or its affiliated companies or sponsored by Replica-Watches-Mall.COM or its affiliated companies. Without the written permission of Replica-Watches-Mall.COM or its trade mark owner, anything on Replica-Watches-Mall.COM should not be explained as anyone is granted with permission by connivance or other manners or justified to use any trade marks shown on our website.<br /><br /><strong>Your Account<br /></strong>If you decide to use our website, you are responsible for keeping secrete of your account information and password and restricting the entry to your computer and you also approve to respond all the activities with your account and password. Replica-Watches-Mall.COM don’t sell products to children but sell children’s articles to adults.<br />If you still do not reach the age of 18, you are justified to decide by yourself to refuse services, close account, delete or edit content and cancel order on Replica-Watches-Mall.COM and its affiliated companies only when you’re under the supervision of your parents or guardians and within the scope of relevant international laws.<br /><br />You also ward Replica-Watches-Mall.COM and its affiliated companies and relicensed person the rights to use the name you provided along with these content, if they choose to do that. You declare and assure that you have the rights to control the posted content in other manner, its content is accurate, You declare and assure that you will compensate for the damage to Replica-Watches-Mall.COM and its affiliated companies brought by the content you provide.<br /></span></span><span style="font-size: x-small;"><span style="font-family: arial,helvetica,sans-serif;">Replica-Watches-Mall.COM have rights (but not obligation) to censor and edit or delete any activities or content. We are not responsible for the submission of messages from you or any third parties.<br /><br /><strong>                                                                                    Replica-Watches-Mall.COM Management.</strong></span></span></p>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (54, 2, 'Term of use页面简单页', '', '', '使用协议内容', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (55, 2, 'ezpage_box1', '', '', '<div id="trustful"></div>\r\n<div class="pad_10px g_t_l">在线购买来自中国的提供商mazentop.com的实惠商品。 </div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (56, 1, 'trustful_box', '', '', '<div class="pad_10px g_t_l">Online buy cheapest products direct from Chinese supply at mazentop.com</div>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (57, 2, 'ezpage_box2', '', '', '<font face="Arial">ezpage_box2</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (58, 2, 'ezpage_box3', '', '', '<font face="Arial">ezpage_box3</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (59, 2, 'ezpage_box4', '', '', '<font face="Arial">ezpage_box4</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (60, 2, 'ezpage_box5', '', '', '<font face="Arial">ezpage_box5</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (61, 1, 'ezpage_box2', '', '', '<font face="Arial">ezpage_box2</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (62, 1, 'ezpage_box3', '', '', '<font face="Arial">ezpage_box3</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (63, 1, 'ezpage_box4', '', '', '<font face="Arial">ezpage_box4</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ezpages` VALUES (64, 1, 'ezpage_box5', '', '', '<font face="Arial">ezpage_box5</font>', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `faqs`
-- 

CREATE TABLE `faqs` (
  `faqs_id` int(11) NOT NULL auto_increment,
  `faqs_type` int(11) NOT NULL default '1',
  `faqs_image` varchar(64) default NULL,
  `faqs_date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `faqs_last_modified` datetime default NULL,
  `faqs_status` tinyint(1) NOT NULL default '0',
  `faqs_sort_order` int(11) NOT NULL default '0',
  `master_faq_categories_id` int(11) NOT NULL default '0',
  `faqs_helpful` int(3) default '0',
  `faqs_nohelpful` int(3) default '0',
  PRIMARY KEY  (`faqs_id`),
  KEY `idx_faqs_date_added` (`faqs_date_added`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `faqs`
-- 

INSERT INTO `faqs` VALUES (1, 1, '', '2010-11-11 14:20:42', NULL, 1, 0, 1, 0, 0);
INSERT INTO `faqs` VALUES (2, 1, '', '2010-11-11 14:49:11', NULL, 1, 2, 1, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `faqs_description`
-- 

CREATE TABLE `faqs_description` (
  `faqs_id` int(11) NOT NULL auto_increment,
  `language_id` int(11) NOT NULL default '1',
  `faqs_name` varchar(64) NOT NULL default '',
  `faqs_description` text,
  `faqs_answer` text,
  `faqs_url` varchar(255) default NULL,
  `faqs_contact_name` varchar(255) default NULL,
  `faqs_contact_mail` varchar(255) default NULL,
  `faqs_owner` varchar(11) default '0',
  `faqs_viewed` int(5) default '0',
  PRIMARY KEY  (`faqs_id`,`language_id`),
  KEY `faqs_name` (`faqs_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `faqs_description`
-- 

INSERT INTO `faqs_description` VALUES (1, 1, 'test11', 'dfsf', '', '', '', '', '0', 1);
INSERT INTO `faqs_description` VALUES (1, 2, 'test11', 'sfsdfs', '', '', '', '', '0', 0);
INSERT INTO `faqs_description` VALUES (2, 1, 'fsdgsd', 'sdgsdgdsdsgs', '', '', '', '', '0', 1);
INSERT INTO `faqs_description` VALUES (2, 2, 'sdgdsgsd', 'dgsagds', '', '', '', '', '0', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `faqs_to_faq_categories`
-- 

CREATE TABLE `faqs_to_faq_categories` (
  `faqs_id` int(11) NOT NULL default '0',
  `faq_categories_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`faqs_id`,`faq_categories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `faqs_to_faq_categories`
-- 

INSERT INTO `faqs_to_faq_categories` VALUES (1, 1);
INSERT INTO `faqs_to_faq_categories` VALUES (2, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `faq_categories`
-- 

CREATE TABLE `faq_categories` (
  `faq_categories_id` int(11) NOT NULL auto_increment,
  `faq_categories_image` varchar(64) default NULL,
  `parent_id` int(11) NOT NULL default '0',
  `sort_order` int(3) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  `faq_categories_status` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`faq_categories_id`),
  KEY `idx_faq_categories_parent_id` (`parent_id`),
  KEY `idx_sort_order` (`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `faq_categories`
-- 

INSERT INTO `faq_categories` VALUES (1, NULL, 0, 0, '2010-11-11 14:20:22', NULL, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `faq_categories_description`
-- 

CREATE TABLE `faq_categories_description` (
  `faq_categories_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `faq_categories_name` varchar(32) NOT NULL default '',
  `faq_categories_description` text NOT NULL,
  PRIMARY KEY  (`faq_categories_id`,`language_id`),
  KEY `idx_faq_categories_name` (`faq_categories_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `faq_categories_description`
-- 

INSERT INTO `faq_categories_description` VALUES (1, 1, 'fqa', '');
INSERT INTO `faq_categories_description` VALUES (1, 2, '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `faq_reviews`
-- 

CREATE TABLE `faq_reviews` (
  `reviews_id` int(11) NOT NULL auto_increment,
  `faqs_id` int(11) NOT NULL default '0',
  `customers_id` int(11) default NULL,
  `customers_name` varchar(64) NOT NULL default '',
  `reviews_rating` int(1) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  `reviews_read` int(5) NOT NULL default '0',
  `status` int(1) NOT NULL default '1',
  PRIMARY KEY  (`reviews_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `faq_reviews`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `faq_reviews_description`
-- 

CREATE TABLE `faq_reviews_description` (
  `reviews_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `reviews_text` text NOT NULL,
  PRIMARY KEY  (`reviews_id`,`languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `faq_reviews_description`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `faq_types`
-- 

CREATE TABLE `faq_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(255) NOT NULL default '',
  `type_handler` varchar(255) NOT NULL default '',
  `type_master_type` int(11) NOT NULL default '1',
  `allow_add_to_cart` char(1) NOT NULL default 'Y',
  `default_image` varchar(255) NOT NULL default '',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `faq_types`
-- 

INSERT INTO `faq_types` VALUES (1, 'FAQ - General', 'faq', 1, 'N', '', '2008-07-30 16:43:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `faq_types_to_faq_category`
-- 

CREATE TABLE `faq_types_to_faq_category` (
  `faq_type_id` int(11) NOT NULL default '0',
  `faq_category_id` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `faq_types_to_faq_category`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `faq_type_layout`
-- 

CREATE TABLE `faq_type_layout` (
  `configuration_id` int(11) NOT NULL auto_increment,
  `configuration_title` text NOT NULL,
  `configuration_key` varchar(255) NOT NULL default '',
  `configuration_value` text NOT NULL,
  `configuration_description` text NOT NULL,
  `faq_type_id` int(11) NOT NULL default '0',
  `sort_order` int(5) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `use_function` text,
  `set_function` text,
  PRIMARY KEY  (`configuration_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `faq_type_layout`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `featured`
-- 

CREATE TABLE `featured` (
  `featured_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `featured_date_added` datetime default NULL,
  `featured_last_modified` datetime default NULL,
  `expires_date` date NOT NULL default '0001-01-01',
  `date_status_change` datetime default NULL,
  `status` int(1) NOT NULL default '1',
  `featured_date_available` date NOT NULL default '0001-01-01',
  `sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`featured_id`),
  KEY `idx_status_zen` (`status`),
  KEY `idx_products_id_zen` (`products_id`),
  KEY `idx_date_avail_zen` (`featured_date_available`),
  KEY `idx_expires_date_zen` (`expires_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `featured`
-- 

INSERT INTO `featured` VALUES (2, 31, '2010-11-01 16:12:50', NULL, '2010-11-30', '2010-12-21 10:36:25', 0, '2010-11-01', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `files_uploaded`
-- 

CREATE TABLE `files_uploaded` (
  `files_uploaded_id` int(11) NOT NULL auto_increment,
  `sesskey` varchar(32) default NULL,
  `customers_id` int(11) default NULL,
  `files_uploaded_name` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`files_uploaded_id`),
  KEY `idx_customers_id_zen` (`customers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Must always have either a sesskey or customers_id' AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `files_uploaded`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `geo_zones`
-- 

CREATE TABLE `geo_zones` (
  `geo_zone_id` int(11) NOT NULL auto_increment,
  `geo_zone_name` varchar(32) NOT NULL default '',
  `geo_zone_description` varchar(255) NOT NULL default '',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`geo_zone_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `geo_zones`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `get_terms_to_filter`
-- 

CREATE TABLE `get_terms_to_filter` (
  `get_term_name` varchar(255) NOT NULL default '',
  `get_term_table` varchar(64) NOT NULL,
  `get_term_name_field` varchar(64) NOT NULL,
  PRIMARY KEY  (`get_term_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `get_terms_to_filter`
-- 

INSERT INTO `get_terms_to_filter` VALUES ('manufacturers_id', 'TABLE_MANUFACTURERS', 'manufacturers_name');
INSERT INTO `get_terms_to_filter` VALUES ('music_genre_id', 'TABLE_MUSIC_GENRE', 'music_genre_name');
INSERT INTO `get_terms_to_filter` VALUES ('record_company_id', 'TABLE_RECORD_COMPANY', 'record_company_name');

-- --------------------------------------------------------

-- 
-- 表的结构 `google_checkout`
-- 

CREATE TABLE `google_checkout` (
  `customers_id` int(11) default NULL,
  `buyer_id` bigint(20) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `google_checkout`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `google_orders`
-- 

CREATE TABLE `google_orders` (
  `orders_id` int(11) default NULL,
  `google_order_number` bigint(20) default NULL,
  `order_amount` decimal(15,4) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `google_orders`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `group_pricing`
-- 

CREATE TABLE `group_pricing` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_name` varchar(32) NOT NULL default '',
  `group_percentage` decimal(5,2) NOT NULL default '0.00',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `group_pricing`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `ips`
-- 

CREATE TABLE `ips` (
  `ips_ipn_id` int(11) unsigned NOT NULL auto_increment,
  `zen_order_id` int(11) unsigned NOT NULL,
  `billno` varchar(64) NOT NULL default '',
  `amount` decimal(7,2) NOT NULL default '0.00',
  `ipsdate` varchar(20) default NULL,
  `succ` varchar(1) default NULL,
  `msg` varchar(255) default NULL,
  `attach` varchar(255) NOT NULL default '',
  `ipsbillno` varchar(64) NOT NULL default '',
  `retEncodeType` varchar(64) NOT NULL default '',
  `currency_type` varchar(64) NOT NULL default '',
  `signature` varchar(255) default NULL,
  PRIMARY KEY  (`ips_ipn_id`,`billno`),
  KEY `idx_ips_ips_ipn_id_zen` (`ips_ipn_id`),
  KEY `idx_zen_order_id_zen` (`zen_order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `ips`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `ips_payment_status`
-- 

CREATE TABLE `ips_payment_status` (
  `payment_status_id` int(11) NOT NULL auto_increment,
  `payment_status_name` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`payment_status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `ips_payment_status`
-- 

INSERT INTO `ips_payment_status` VALUES (1, 'ç­‰å¾…ä»˜æ¬¾');
INSERT INTO `ips_payment_status` VALUES (2, 'æ”¯ä»˜æˆåŠŸ');

-- --------------------------------------------------------

-- 
-- 表的结构 `ips_payment_status_history`
-- 

CREATE TABLE `ips_payment_status_history` (
  `payment_status_history_id` int(11) NOT NULL auto_increment,
  `ips_ipn_id` varchar(64) NOT NULL default '',
  `billno` varchar(64) NOT NULL default '',
  `amount` decimal(7,2) NOT NULL default '0.00',
  `ipsdate` varchar(20) default NULL,
  `succ` varchar(1) default NULL,
  `msg` varchar(255) default NULL,
  `attach` varchar(255) NOT NULL default '',
  `ipsbillno` varchar(64) NOT NULL default '',
  `retEncodeType` varchar(64) NOT NULL default '',
  `currency_type` varchar(64) NOT NULL default '',
  `signature` varchar(255) default NULL,
  PRIMARY KEY  (`payment_status_history_id`),
  KEY `idx_ips_ipn_id_zen` (`ips_ipn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `ips_payment_status_history`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `ips_session`
-- 

CREATE TABLE `ips_session` (
  `unique_id` int(11) NOT NULL auto_increment,
  `session_id` text NOT NULL,
  `saved_session` blob NOT NULL,
  `expiry` int(17) NOT NULL default '0',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_session_id_zen` (`session_id`(36))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `ips_session`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `languages`
-- 

CREATE TABLE `languages` (
  `languages_id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL default '',
  `code` char(2) NOT NULL default '',
  `image` varchar(64) default NULL,
  `directory` varchar(32) default NULL,
  `sort_order` int(3) default NULL,
  PRIMARY KEY  (`languages_id`),
  KEY `idx_languages_name_zen` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `languages`
-- 

INSERT INTO `languages` VALUES (1, 'English', 'EN', 'icon.gif', 'english', 1);
INSERT INTO `languages` VALUES (2, '简体中文', 'CN', 'icon.gif', 'schinese', 2);

-- --------------------------------------------------------

-- 
-- 表的结构 `layout_boxes`
-- 

CREATE TABLE `layout_boxes` (
  `layout_id` int(11) NOT NULL auto_increment,
  `layout_template` varchar(64) NOT NULL default '',
  `layout_box_name` varchar(64) NOT NULL default '',
  `layout_box_status` tinyint(1) NOT NULL default '0',
  `layout_box_location` tinyint(1) NOT NULL default '0',
  `layout_box_sort_order` int(11) NOT NULL default '0',
  `layout_box_sort_order_single` int(11) NOT NULL default '0',
  `layout_box_status_single` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`layout_id`),
  KEY `idx_name_template_zen` (`layout_template`,`layout_box_name`),
  KEY `idx_layout_box_status_zen` (`layout_box_status`),
  KEY `idx_layout_box_sort_order_zen` (`layout_box_sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

-- 
-- 导出表中的数据 `layout_boxes`
-- 

INSERT INTO `layout_boxes` VALUES (77, 'chanelwatches', 'banner_box.php', 0, 0, 300, 1, 1);
INSERT INTO `layout_boxes` VALUES (78, 'chanelwatches', 'banner_box2.php', 0, 1, 15, 1, 0);
INSERT INTO `layout_boxes` VALUES (79, 'chanelwatches', 'banner_box_all.php', 0, 1, 5, 0, 0);
INSERT INTO `layout_boxes` VALUES (80, 'chanelwatches', 'best_sellers.php', 1, 1, 30, 70, 1);
INSERT INTO `layout_boxes` VALUES (81, 'chanelwatches', 'categories.php', 0, 0, 10, 10, 0);
INSERT INTO `layout_boxes` VALUES (82, 'chanelwatches', 'currencies.php', 0, 1, 80, 60, 0);
INSERT INTO `layout_boxes` VALUES (83, 'chanelwatches', 'document_categories.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (84, 'chanelwatches', 'ezpages.php', 0, 1, -1, 2, 0);
INSERT INTO `layout_boxes` VALUES (85, 'chanelwatches', 'featured.php', 0, 0, 45, 0, 0);
INSERT INTO `layout_boxes` VALUES (86, 'chanelwatches', 'information.php', 0, 0, 50, 40, 1);
INSERT INTO `layout_boxes` VALUES (87, 'chanelwatches', 'languages.php', 0, 1, 70, 50, 0);
INSERT INTO `layout_boxes` VALUES (88, 'chanelwatches', 'manufacturer_info.php', 0, 1, 35, 95, 0);
INSERT INTO `layout_boxes` VALUES (89, 'chanelwatches', 'manufacturers.php', 0, 0, 30, 20, 0);
INSERT INTO `layout_boxes` VALUES (90, 'chanelwatches', 'more_information.php', 0, 0, 200, 200, 0);
INSERT INTO `layout_boxes` VALUES (91, 'chanelwatches', 'music_genres.php', 0, 1, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (92, 'chanelwatches', 'order_history.php', 1, 1, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (93, 'chanelwatches', 'product_notifications.php', 1, 1, 55, 85, 1);
INSERT INTO `layout_boxes` VALUES (94, 'chanelwatches', 'record_companies.php', 0, 1, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (95, 'chanelwatches', 'reviews.php', 0, 0, 40, 0, 0);
INSERT INTO `layout_boxes` VALUES (96, 'chanelwatches', 'search.php', 0, 1, 10, 0, 0);
INSERT INTO `layout_boxes` VALUES (97, 'chanelwatches', 'search_header.php', 0, 0, 0, 0, 1);
INSERT INTO `layout_boxes` VALUES (98, 'chanelwatches', 'shopping_cart.php', 0, 1, 20, 30, 0);
INSERT INTO `layout_boxes` VALUES (99, 'chanelwatches', 'specials.php', 0, 1, 45, 0, 1);
INSERT INTO `layout_boxes` VALUES (100, 'chanelwatches', 'tell_a_friend.php', 1, 1, 65, 0, 0);
INSERT INTO `layout_boxes` VALUES (101, 'chanelwatches', 'whats_new.php', 0, 0, 20, 0, 0);
INSERT INTO `layout_boxes` VALUES (102, 'chanelwatches', 'whos_online.php', 0, 1, 200, 200, 0);
INSERT INTO `layout_boxes` VALUES (103, 'chanelwatches', 'googletrans.php', 1, 0, 7, 3, 0);
INSERT INTO `layout_boxes` VALUES (107, 'chanelwatches', 'customers_say.php', 0, 1, 4, 0, 1);
INSERT INTO `layout_boxes` VALUES (106, 'chanelwatches', 'categories_css.php', 1, 0, 1, 0, 0);
INSERT INTO `layout_boxes` VALUES (108, 'chanelwatches', 'popular_searches.php', 1, 0, 1, 1, 0);
INSERT INTO `layout_boxes` VALUES (118, 'chanelwatches', 'related_categories.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (111, 'chanelwatches', 'affiliate_sideboxes.php', 0, 0, 2, 0, 0);
INSERT INTO `layout_boxes` VALUES (112, 'chanelwatches', 'flash_sidebox.php', 0, 0, 7, 0, 1);
INSERT INTO `layout_boxes` VALUES (113, 'chanelwatches', 'dropdown_categories_css.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (114, 'chanelwatches', 'faq_categories.php', 1, 1, 2, 0, 0);
INSERT INTO `layout_boxes` VALUES (117, 'chanelwatches', 'subscribe.php', 1, 0, 3, 0, 0);
INSERT INTO `layout_boxes` VALUES (116, 'chanelwatches', 'live_help.php', 0, 0, 0, 3, 1);
INSERT INTO `layout_boxes` VALUES (119, 'chanelwatches', 'search_feedback.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (120, 'chanelwatches', 'trustful.php', 1, 1, 70, 0, 0);
INSERT INTO `layout_boxes` VALUES (121, 'chanelwatches', 'account_order_search.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (122, 'chanelwatches', 'affiliate_login.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (123, 'chanelwatches', 'box_contact_us.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (124, 'chanelwatches', 'faq_categories_css.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (125, 'chanelwatches', 'recently_sold.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (126, 'chanelwatches', 'recently_viewed.php', 1, 0, 300, 0, 0);
INSERT INTO `layout_boxes` VALUES (127, 'chanelwatches', 'recommendations.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (128, 'chanelwatches', 'links_box.php', 0, 0, 0, 0, 1);
INSERT INTO `layout_boxes` VALUES (129, 'chanelwatches', 'root_categories.php', 0, 0, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (130, 'chanelwatches', 'search_categories.php', 0, 0, 1, 1, 0);
INSERT INTO `layout_boxes` VALUES (139, 'chanelwatches', 'store_credit.php', 0, 1, 0, 0, 0);
INSERT INTO `layout_boxes` VALUES (141, 'chanelwatches', 'ezpage_box2.php', 1, 1, 100, 0, 0);
INSERT INTO `layout_boxes` VALUES (142, 'chanelwatches', 'ezpage_box3.php', 1, 1, 110, 0, 0);
INSERT INTO `layout_boxes` VALUES (143, 'chanelwatches', 'ezpage_box4.php', 1, 1, 120, 0, 0);
INSERT INTO `layout_boxes` VALUES (144, 'chanelwatches', 'ezpage_box5.php', 1, 1, 130, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `links`
-- 

CREATE TABLE `links` (
  `links_id` int(11) NOT NULL auto_increment,
  `links_url` varchar(255) default NULL,
  `links_reciprocal_url` varchar(255) default NULL,
  `links_image_url` varchar(255) default NULL,
  `links_contact_name` varchar(64) default NULL,
  `links_contact_email` varchar(96) default NULL,
  `links_date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `links_last_modified` datetime default NULL,
  `links_status` tinyint(1) NOT NULL default '1',
  `links_clicked` int(11) NOT NULL default '0',
  `links_rating` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`links_id`),
  KEY `idx_links_date_added` (`links_date_added`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `links`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `links_description`
-- 

CREATE TABLE `links_description` (
  `links_id` int(11) NOT NULL auto_increment,
  `language_id` int(11) NOT NULL default '1',
  `links_title` varchar(64) NOT NULL default '',
  `links_description` text,
  PRIMARY KEY  (`links_id`,`language_id`),
  KEY `links_title` (`links_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `links_description`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `links_status`
-- 

CREATE TABLE `links_status` (
  `links_status_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `links_status_name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`links_status_id`,`language_id`),
  KEY `idx_links_status_name` (`links_status_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `links_status`
-- 

INSERT INTO `links_status` VALUES (1, 1, 'Pending');
INSERT INTO `links_status` VALUES (2, 1, 'Approved');
INSERT INTO `links_status` VALUES (3, 1, 'Disabled');

-- --------------------------------------------------------

-- 
-- 表的结构 `links_to_link_categories`
-- 

CREATE TABLE `links_to_link_categories` (
  `links_id` int(11) NOT NULL auto_increment,
  `link_categories_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`links_id`,`link_categories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `links_to_link_categories`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `link_categories`
-- 

CREATE TABLE `link_categories` (
  `link_categories_id` int(11) NOT NULL auto_increment,
  `link_categories_image` varchar(64) default NULL,
  `link_categories_sort_order` int(3) default NULL,
  `link_categories_date_added` datetime default NULL,
  `link_categories_last_modified` datetime default NULL,
  `link_categories_status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`link_categories_id`),
  KEY `idx_link_categories_date_added` (`link_categories_date_added`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `link_categories`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `link_categories_description`
-- 

CREATE TABLE `link_categories_description` (
  `link_categories_id` int(11) NOT NULL default '1',
  `language_id` int(11) NOT NULL default '1',
  `link_categories_name` varchar(40) NOT NULL default '',
  `link_categories_description` text,
  PRIMARY KEY  (`link_categories_id`,`language_id`),
  KEY `idx_link_categories_name` (`link_categories_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `link_categories_description`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `manufacturers`
-- 

CREATE TABLE `manufacturers` (
  `manufacturers_id` int(11) NOT NULL auto_increment,
  `manufacturers_name` varchar(32) NOT NULL default '',
  `manufacturers_image` varchar(64) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`manufacturers_id`),
  KEY `idx_mfg_name_zen` (`manufacturers_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `manufacturers`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `manufacturers_info`
-- 

CREATE TABLE `manufacturers_info` (
  `manufacturers_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `manufacturers_url` varchar(255) NOT NULL default '',
  `url_clicked` int(5) NOT NULL default '0',
  `date_last_click` datetime default NULL,
  PRIMARY KEY  (`manufacturers_id`,`languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `manufacturers_info`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `media_clips`
-- 

CREATE TABLE `media_clips` (
  `clip_id` int(11) NOT NULL auto_increment,
  `media_id` int(11) NOT NULL default '0',
  `clip_type` smallint(6) NOT NULL default '0',
  `clip_filename` text NOT NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`clip_id`),
  KEY `idx_media_id_zen` (`media_id`),
  KEY `idx_clip_type_zen` (`clip_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `media_clips`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `media_manager`
-- 

CREATE TABLE `media_manager` (
  `media_id` int(11) NOT NULL auto_increment,
  `media_name` varchar(255) NOT NULL default '',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`media_id`),
  KEY `idx_media_name_zen` (`media_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `media_manager`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `media_to_products`
-- 

CREATE TABLE `media_to_products` (
  `media_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  KEY `idx_media_product_zen` (`media_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `media_to_products`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `media_types`
-- 

CREATE TABLE `media_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(64) NOT NULL default '',
  `type_ext` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`type_id`),
  KEY `idx_type_name_zen` (`type_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `media_types`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `meta_tags_categories_description`
-- 

CREATE TABLE `meta_tags_categories_description` (
  `categories_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL default '1',
  `metatags_title` varchar(255) NOT NULL default '',
  `metatags_keywords` text,
  `metatags_description` text,
  PRIMARY KEY  (`categories_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `meta_tags_categories_description`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `meta_tags_products_description`
-- 

CREATE TABLE `meta_tags_products_description` (
  `products_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL default '1',
  `metatags_title` varchar(255) NOT NULL default '',
  `metatags_keywords` text,
  `metatags_description` text,
  PRIMARY KEY  (`products_id`,`language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `meta_tags_products_description`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `module_version_tracker`
-- 

CREATE TABLE `module_version_tracker` (
  `ID` int(10) NOT NULL auto_increment,
  `module_code` varchar(255) NOT NULL,
  `patch_level` int(10) NOT NULL,
  `version_name` varchar(255) default NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `module_code` (`module_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `module_version_tracker`
-- 

INSERT INTO `module_version_tracker` VALUES (1, 'yellow1912_sc', 1, 'Alpha 1.1');

-- --------------------------------------------------------

-- 
-- 表的结构 `music_genre`
-- 

CREATE TABLE `music_genre` (
  `music_genre_id` int(11) NOT NULL auto_increment,
  `music_genre_name` varchar(32) NOT NULL default '',
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`music_genre_id`),
  KEY `idx_music_genre_name_zen` (`music_genre_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `music_genre`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `newsletters`
-- 

CREATE TABLE `newsletters` (
  `newsletters_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `content_html` text NOT NULL,
  `module` varchar(255) NOT NULL default '',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_sent` datetime default NULL,
  `status` int(1) default NULL,
  `locked` int(1) default '0',
  PRIMARY KEY  (`newsletters_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `newsletters`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `nochex_apc_transactions`
-- 

CREATE TABLE `nochex_apc_transactions` (
  `nochex_apc_id` int(11) unsigned NOT NULL auto_increment,
  `order_id` int(11) unsigned NOT NULL default '0',
  `nc_transaction_id` varchar(30) NOT NULL,
  `nc_transaction_date` varchar(100) NOT NULL,
  `nc_to_email` varchar(255) NOT NULL,
  `nc_from_email` varchar(255) NOT NULL,
  `nc_order_id` varchar(255) NOT NULL,
  `nc_custom` varchar(255) NOT NULL,
  `nc_amount` decimal(9,2) NOT NULL,
  `nc_security_key` varchar(255) NOT NULL,
  `nc_status` varchar(15) NOT NULL,
  `nochex_response` varchar(255) NOT NULL,
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `memo` text,
  PRIMARY KEY  (`nochex_apc_id`),
  KEY `idx_order_id_zen` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `nochex_apc_transactions`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `nochex_sessions`
-- 

CREATE TABLE `nochex_sessions` (
  `unique_id` int(11) NOT NULL auto_increment,
  `session_id` text NOT NULL,
  `saved_session` mediumblob NOT NULL,
  `expiry` int(17) NOT NULL default '0',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_session_id_zen` (`session_id`(36))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `nochex_sessions`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `orders`
-- 

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL auto_increment,
  `order_no` varchar(255) NOT NULL,
  `customers_id` int(11) NOT NULL default '0',
  `customers_name` varchar(64) NOT NULL default '',
  `customers_company` varchar(64) default NULL,
  `customers_street_address` varchar(64) NOT NULL default '',
  `customers_suburb` varchar(32) default NULL,
  `customers_city` varchar(32) NOT NULL default '',
  `customers_postcode` varchar(10) NOT NULL default '',
  `customers_state` varchar(32) default NULL,
  `customers_country` varchar(32) NOT NULL default '',
  `customers_telephone` varchar(32) NOT NULL default '',
  `customers_email_address` varchar(96) NOT NULL default '',
  `customers_address_format_id` int(5) NOT NULL default '0',
  `delivery_name` varchar(64) NOT NULL default '',
  `delivery_company` varchar(64) default NULL,
  `delivery_street_address` varchar(64) NOT NULL default '',
  `delivery_suburb` varchar(32) default NULL,
  `delivery_city` varchar(32) NOT NULL default '',
  `delivery_postcode` varchar(10) NOT NULL default '',
  `delivery_phone` varchar(100) NOT NULL,
  `delivery_state` varchar(32) default NULL,
  `delivery_country` varchar(32) NOT NULL default '',
  `delivery_address_format_id` int(5) NOT NULL default '0',
  `billing_name` varchar(64) NOT NULL default '',
  `billing_company` varchar(64) default NULL,
  `billing_street_address` varchar(64) NOT NULL default '',
  `billing_suburb` varchar(32) default NULL,
  `billing_city` varchar(32) NOT NULL default '',
  `billing_postcode` varchar(10) NOT NULL default '',
  `billing_phone` varchar(255) default NULL,
  `billing_state` varchar(32) default NULL,
  `billing_country` varchar(32) NOT NULL default '',
  `billing_address_format_id` int(5) NOT NULL default '0',
  `payment_method` varchar(128) NOT NULL default '',
  `payment_module_code` varchar(32) NOT NULL default '',
  `shipping_method` varchar(128) NOT NULL default '',
  `shipping_module_code` varchar(32) NOT NULL default '',
  `coupon_code` varchar(32) NOT NULL default '',
  `cc_type` varchar(20) default NULL,
  `cc_owner` varchar(64) default NULL,
  `cc_number` varchar(32) default NULL,
  `cc_expires` varchar(4) default NULL,
  `cc_cvv` blob,
  `last_modified` datetime default NULL,
  `date_purchased` datetime default NULL,
  `orders_status` int(5) NOT NULL default '0',
  `orders_date_finished` datetime default NULL,
  `currency` char(3) default NULL,
  `currency_value` decimal(14,6) default NULL,
  `order_total` decimal(14,2) default NULL,
  `order_tax` decimal(14,2) default NULL,
  `paypal_ipn_id` int(11) NOT NULL default '0',
  `ip_address` varchar(96) NOT NULL default '',
  PRIMARY KEY  (`orders_id`),
  KEY `idx_status_orders_cust_zen` (`orders_status`,`orders_id`,`customers_id`),
  KEY `idx_date_purchased_zen` (`date_purchased`),
  FULLTEXT KEY `idx_order_no` (`order_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `orders`
-- 

INSERT INTO `orders` VALUES (1, '2010110108311314', 1, 'zhang Evelyn', 'Evelyn', 'ksajfskah', '', 'zhaoqing', '525359', 'California', 'United States', '165388452232', '123456789@qq.com', 2, 'zhang Evelyn', '', 'ksajfskah', '', 'zhaoqing', '525359', '165388452232', 'California', 'United States', 2, 'zhang Evelyn', 'Evelyn', 'ksajfskah', '', 'zhaoqing', '525359', '165388452232', 'California', 'United States', 2, 'Western Union Order', 'westernunion', '新加坡EMS', 'A3015', '', '', '', '', '', NULL, '2010-11-03 11:09:52', '2010-11-01 16:31:48', 2, NULL, 'USD', 1.000000, 13492.66, 0.00, 0, '172.16.2.1 - 172.16.2.1');

-- --------------------------------------------------------

-- 
-- 表的结构 `orders_products`
-- 

CREATE TABLE `orders_products` (
  `orders_products_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `products_id` int(11) NOT NULL default '0',
  `products_model` varchar(32) default NULL,
  `products_name` varchar(255) NOT NULL,
  `products_price` decimal(15,4) NOT NULL default '0.0000',
  `final_price` decimal(15,4) NOT NULL default '0.0000',
  `products_tax` decimal(7,4) NOT NULL default '0.0000',
  `products_quantity` float NOT NULL default '0',
  `onetime_charges` decimal(15,4) NOT NULL default '0.0000',
  `products_priced_by_attribute` tinyint(1) NOT NULL default '0',
  `product_is_free` tinyint(1) NOT NULL default '0',
  `products_discount_type` tinyint(1) NOT NULL default '0',
  `products_discount_type_from` tinyint(1) NOT NULL default '0',
  `products_prid` tinytext NOT NULL,
  PRIMARY KEY  (`orders_products_id`),
  KEY `idx_orders_id_prod_id_zen` (`orders_id`,`products_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `orders_products`
-- 

INSERT INTO `orders_products` VALUES (1, 1, 16, '16', 'W008 Dual Card Dual Camera Quad Band with WIFI TV JAVA 3.5 Inch Flat Touch Screen Cell Phone Black (2GB TF Card)(SZ00720639)', 89.9900, 89.9900, 0.0000, 10, 0.0000, 0, 0, 0, 0, '16');
INSERT INTO `orders_products` VALUES (2, 1, 17, '17', 'E71 Style PRO TV Dual Sim Card Quad Band Free Leather case Cell Phone Black(2GB TF Card)', 85.9900, 85.9900, 0.0000, 10, 0.0000, 0, 0, 0, 0, '17');
INSERT INTO `orders_products` VALUES (3, 1, 50, '50', '2010 New Arrival Three Modes 20 + 3 LED Brilliant Tent Light (0956-0707-2)', 70.0000, 70.0000, 0.0000, 10, 0.0000, 0, 0, 0, 0, '50');
INSERT INTO `orders_products` VALUES (4, 1, 62, '62', 'Two Sorts Colors Protective Backside Case Cover for iPhone (Black + Red)', 98.0000, 98.0000, 0.0000, 10, 0.0000, 0, 0, 0, 0, '62');
INSERT INTO `orders_products` VALUES (5, 1, 61, '61', 'Cute Monkey Silicone Case for iPhone 2G/3G (Color Assorted)', 900.0000, 900.0000, 0.0000, 10, 0.0000, 0, 0, 0, 0, '61');

-- --------------------------------------------------------

-- 
-- 表的结构 `orders_products_attributes`
-- 

CREATE TABLE `orders_products_attributes` (
  `orders_products_attributes_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `orders_products_id` int(11) NOT NULL default '0',
  `products_options` varchar(32) NOT NULL default '',
  `products_options_values` text NOT NULL,
  `options_values_price` decimal(15,4) NOT NULL default '0.0000',
  `price_prefix` char(1) NOT NULL default '',
  `product_attribute_is_free` tinyint(1) NOT NULL default '0',
  `products_attributes_weight` float NOT NULL default '0',
  `products_attributes_weight_prefix` char(1) NOT NULL default '',
  `attributes_discounted` tinyint(1) NOT NULL default '1',
  `attributes_price_base_included` tinyint(1) NOT NULL default '1',
  `attributes_price_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_qty_prices` text,
  `attributes_qty_prices_onetime` text,
  `attributes_price_words` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_words_free` int(4) NOT NULL default '0',
  `attributes_price_letters` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_letters_free` int(4) NOT NULL default '0',
  `products_options_id` int(11) NOT NULL default '0',
  `products_options_values_id` int(11) NOT NULL default '0',
  `products_prid` tinytext NOT NULL,
  PRIMARY KEY  (`orders_products_attributes_id`),
  KEY `idx_orders_id_prod_id_zen` (`orders_id`,`orders_products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `orders_products_attributes`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `orders_products_download`
-- 

CREATE TABLE `orders_products_download` (
  `orders_products_download_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `orders_products_id` int(11) NOT NULL default '0',
  `orders_products_filename` varchar(255) NOT NULL default '',
  `download_maxdays` int(2) NOT NULL default '0',
  `download_count` int(2) NOT NULL default '0',
  `products_prid` tinytext NOT NULL,
  PRIMARY KEY  (`orders_products_download_id`),
  KEY `idx_orders_id_zen` (`orders_id`),
  KEY `idx_orders_products_id_zen` (`orders_products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `orders_products_download`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `orders_status`
-- 

CREATE TABLE `orders_status` (
  `orders_status_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `orders_status_name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`orders_status_id`,`language_id`),
  KEY `idx_orders_status_name_zen` (`orders_status_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `orders_status`
-- 

INSERT INTO `orders_status` VALUES (1, 1, 'Pending');
INSERT INTO `orders_status` VALUES (2, 1, 'Processing');
INSERT INTO `orders_status` VALUES (3, 1, 'Delivered');
INSERT INTO `orders_status` VALUES (4, 1, 'Update');
INSERT INTO `orders_status` VALUES (100, 1, 'Google New');
INSERT INTO `orders_status` VALUES (101, 1, 'Google Processing');
INSERT INTO `orders_status` VALUES (103, 1, 'Google Digital Processed');
INSERT INTO `orders_status` VALUES (105, 1, 'Google Shipped');
INSERT INTO `orders_status` VALUES (107, 1, 'Google Refunded');
INSERT INTO `orders_status` VALUES (109, 1, 'Google Shipped and Refunded');
INSERT INTO `orders_status` VALUES (111, 1, 'Google Canceled');
INSERT INTO `orders_status` VALUES (1, 2, '等待中');
INSERT INTO `orders_status` VALUES (2, 2, '处理中');
INSERT INTO `orders_status` VALUES (3, 2, '已发货');
INSERT INTO `orders_status` VALUES (4, 2, '已更新');
INSERT INTO `orders_status` VALUES (100, 2, 'Google New');
INSERT INTO `orders_status` VALUES (101, 2, 'Google Processing');
INSERT INTO `orders_status` VALUES (103, 2, 'Google Digital Processed');
INSERT INTO `orders_status` VALUES (105, 2, 'Google Shipped');
INSERT INTO `orders_status` VALUES (107, 2, 'Google Refunded');
INSERT INTO `orders_status` VALUES (109, 2, 'Google Shipped and Refunded');
INSERT INTO `orders_status` VALUES (111, 2, 'Google Canceled');

-- --------------------------------------------------------

-- 
-- 表的结构 `orders_status_history`
-- 

CREATE TABLE `orders_status_history` (
  `orders_status_history_id` int(11) NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `orders_status_id` int(5) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `customer_notified` int(1) default '0',
  `comments` text,
  `order_no` varchar(45) default NULL,
  PRIMARY KEY  (`orders_status_history_id`),
  KEY `idx_orders_id_status_id_zen` (`orders_id`,`orders_status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `orders_status_history`
-- 

INSERT INTO `orders_status_history` VALUES (1, 1, 1, '2010-11-01 16:31:48', 1, '', NULL);
INSERT INTO `orders_status_history` VALUES (2, 1, 2, '2010-11-03 11:09:56', 1, '', NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `orders_total`
-- 

CREATE TABLE `orders_total` (
  `orders_total_id` int(10) unsigned NOT NULL auto_increment,
  `orders_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `text` varchar(255) NOT NULL default '',
  `value` decimal(15,4) NOT NULL default '0.0000',
  `class` varchar(32) NOT NULL default '',
  `sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`orders_total_id`),
  KEY `idx_ot_orders_id_zen` (`orders_id`),
  KEY `idx_ot_class_zen` (`class`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `orders_total`
-- 

INSERT INTO `orders_total` VALUES (1, 1, 'Sub-Total&nbsp;:', 'US$12,439.80', 12439.8000, 'ot_subtotal', 100);
INSERT INTO `orders_total` VALUES (2, 1, '新加坡EMS:', 'US$1,052.86', 1052.8561, 'ot_shipping', 200);
INSERT INTO `orders_total` VALUES (3, 1, 'Grand Total&nbsp;:', 'US$13,492.66', 13492.6561, 'ot_total', 999);

-- --------------------------------------------------------

-- 
-- 表的结构 `paypal`
-- 

CREATE TABLE `paypal` (
  `paypal_ipn_id` int(11) unsigned NOT NULL auto_increment,
  `order_id` int(11) unsigned NOT NULL default '0',
  `txn_type` varchar(40) NOT NULL default '',
  `module_name` varchar(40) NOT NULL default '',
  `module_mode` varchar(40) NOT NULL default '',
  `reason_code` varchar(40) default NULL,
  `payment_type` varchar(40) NOT NULL default '',
  `payment_status` varchar(32) NOT NULL default '',
  `pending_reason` varchar(32) default NULL,
  `invoice` varchar(128) default NULL,
  `mc_currency` char(3) NOT NULL default '',
  `first_name` varchar(32) NOT NULL default '',
  `last_name` varchar(32) NOT NULL default '',
  `payer_business_name` varchar(128) default NULL,
  `address_name` varchar(64) default NULL,
  `address_street` varchar(254) default NULL,
  `address_city` varchar(120) default NULL,
  `address_state` varchar(120) default NULL,
  `address_zip` varchar(10) default NULL,
  `address_country` varchar(64) default NULL,
  `address_status` varchar(11) default NULL,
  `payer_email` varchar(128) NOT NULL default '',
  `payer_id` varchar(32) NOT NULL default '',
  `payer_status` varchar(10) NOT NULL default '',
  `payment_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `business` varchar(128) NOT NULL default '',
  `receiver_email` varchar(128) NOT NULL default '',
  `receiver_id` varchar(32) NOT NULL default '',
  `txn_id` varchar(20) NOT NULL default '',
  `parent_txn_id` varchar(20) default NULL,
  `num_cart_items` tinyint(4) unsigned default '1',
  `mc_gross` decimal(7,2) NOT NULL default '0.00',
  `mc_fee` decimal(7,2) NOT NULL default '0.00',
  `payment_gross` decimal(7,2) default NULL,
  `payment_fee` decimal(7,2) default NULL,
  `settle_amount` decimal(7,2) default NULL,
  `settle_currency` char(3) default NULL,
  `exchange_rate` decimal(4,2) default NULL,
  `notify_version` decimal(2,1) NOT NULL default '0.0',
  `verify_sign` varchar(128) NOT NULL default '',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `memo` text,
  PRIMARY KEY  (`paypal_ipn_id`,`txn_id`),
  KEY `idx_order_id_zen` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `paypal`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `paypal_payment_status`
-- 

CREATE TABLE `paypal_payment_status` (
  `payment_status_id` int(11) NOT NULL auto_increment,
  `payment_status_name` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`payment_status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `paypal_payment_status`
-- 

INSERT INTO `paypal_payment_status` VALUES (1, 'Completed');
INSERT INTO `paypal_payment_status` VALUES (2, 'Pending');
INSERT INTO `paypal_payment_status` VALUES (3, 'Failed');
INSERT INTO `paypal_payment_status` VALUES (4, 'Denied');
INSERT INTO `paypal_payment_status` VALUES (5, 'Refunded');
INSERT INTO `paypal_payment_status` VALUES (6, 'Canceled_Reversal');
INSERT INTO `paypal_payment_status` VALUES (7, 'Reversed');

-- --------------------------------------------------------

-- 
-- 表的结构 `paypal_payment_status_history`
-- 

CREATE TABLE `paypal_payment_status_history` (
  `payment_status_history_id` int(11) NOT NULL auto_increment,
  `paypal_ipn_id` int(11) NOT NULL default '0',
  `txn_id` varchar(64) NOT NULL default '',
  `parent_txn_id` varchar(64) NOT NULL default '',
  `payment_status` varchar(17) NOT NULL default '',
  `pending_reason` varchar(14) default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`payment_status_history_id`),
  KEY `idx_paypal_ipn_id_zen` (`paypal_ipn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `paypal_payment_status_history`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `paypal_session`
-- 

CREATE TABLE `paypal_session` (
  `unique_id` int(11) NOT NULL auto_increment,
  `session_id` text NOT NULL,
  `saved_session` mediumblob NOT NULL,
  `expiry` int(17) NOT NULL default '0',
  PRIMARY KEY  (`unique_id`),
  KEY `idx_session_id_zen` (`session_id`(36))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `paypal_session`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `paypal_testing`
-- 

CREATE TABLE `paypal_testing` (
  `paypal_ipn_id` int(11) unsigned NOT NULL auto_increment,
  `order_id` int(11) unsigned NOT NULL default '0',
  `custom` varchar(255) NOT NULL default '',
  `txn_type` varchar(40) NOT NULL default '',
  `module_name` varchar(40) NOT NULL default '',
  `module_mode` varchar(40) NOT NULL default '',
  `reason_code` varchar(40) default NULL,
  `payment_type` varchar(40) NOT NULL default '',
  `payment_status` varchar(32) NOT NULL default '',
  `pending_reason` varchar(32) default NULL,
  `invoice` varchar(128) default NULL,
  `mc_currency` char(3) NOT NULL default '',
  `first_name` varchar(32) NOT NULL default '',
  `last_name` varchar(32) NOT NULL default '',
  `payer_business_name` varchar(128) default NULL,
  `address_name` varchar(64) default NULL,
  `address_street` varchar(254) default NULL,
  `address_city` varchar(120) default NULL,
  `address_state` varchar(120) default NULL,
  `address_zip` varchar(10) default NULL,
  `address_country` varchar(64) default NULL,
  `address_status` varchar(11) default NULL,
  `payer_email` varchar(128) NOT NULL default '',
  `payer_id` varchar(32) NOT NULL default '',
  `payer_status` varchar(10) NOT NULL default '',
  `payment_date` datetime NOT NULL default '0001-01-01 00:00:00',
  `business` varchar(128) NOT NULL default '',
  `receiver_email` varchar(128) NOT NULL default '',
  `receiver_id` varchar(32) NOT NULL default '',
  `txn_id` varchar(20) NOT NULL default '',
  `parent_txn_id` varchar(20) default NULL,
  `num_cart_items` tinyint(4) unsigned NOT NULL default '1',
  `mc_gross` decimal(7,2) NOT NULL default '0.00',
  `mc_fee` decimal(7,2) NOT NULL default '0.00',
  `payment_gross` decimal(7,2) default NULL,
  `payment_fee` decimal(7,2) default NULL,
  `settle_amount` decimal(7,2) default NULL,
  `settle_currency` char(3) default NULL,
  `exchange_rate` decimal(4,2) default NULL,
  `notify_version` decimal(2,1) NOT NULL default '0.0',
  `verify_sign` varchar(128) NOT NULL default '',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `memo` text,
  PRIMARY KEY  (`paypal_ipn_id`,`txn_id`),
  KEY `idx_order_id_zen` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `paypal_testing`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `products`
-- 

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL auto_increment,
  `products_type` int(11) NOT NULL default '1',
  `products_quantity` float NOT NULL default '0',
  `products_model` varchar(32) default NULL,
  `products_image` text,
  `products_price` decimal(15,4) NOT NULL default '0.0000',
  `products_price_retail` decimal(15,4) default '0.0000',
  `products_price_sample` decimal(15,4) NOT NULL default '0.0000',
  `products_virtual` tinyint(1) NOT NULL default '0',
  `products_date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `products_last_modified` datetime default NULL,
  `products_date_available` datetime default NULL,
  `products_weight` float NOT NULL default '0',
  `products_status` tinyint(1) NOT NULL default '0',
  `products_tax_class_id` int(11) NOT NULL default '0',
  `manufacturers_id` int(11) default NULL,
  `products_ordered` float NOT NULL default '0',
  `products_quantity_order_min` float NOT NULL default '1',
  `products_quantity_order_units` float NOT NULL default '1',
  `products_priced_by_attribute` tinyint(1) NOT NULL default '0',
  `product_is_free` tinyint(1) NOT NULL default '0',
  `product_is_call` tinyint(1) NOT NULL default '0',
  `products_quantity_mixed` tinyint(1) NOT NULL default '0',
  `product_is_always_free_shipping` tinyint(1) NOT NULL default '0',
  `products_qty_box_status` tinyint(1) NOT NULL default '1',
  `products_quantity_order_max` float NOT NULL default '0',
  `products_sort_order` int(11) NOT NULL default '0',
  `products_discount_type` tinyint(1) NOT NULL default '0',
  `products_discount_type_from` tinyint(1) NOT NULL default '0',
  `products_price_sorter` decimal(15,4) NOT NULL default '0.0000',
  `master_categories_id` int(11) NOT NULL default '0',
  `products_mixed_discount_quantity` tinyint(1) NOT NULL default '1',
  `metatags_title_status` tinyint(1) NOT NULL default '0',
  `metatags_products_name_status` tinyint(1) NOT NULL default '0',
  `metatags_model_status` tinyint(1) NOT NULL default '0',
  `metatags_price_status` tinyint(1) NOT NULL default '0',
  `metatags_title_tagline_status` tinyint(1) NOT NULL default '0',
  `product_start_unit_wholesale` int(10) unsigned NOT NULL default '1',
  `product_is_wholesale` tinyint(1) NOT NULL default '0',
  `product_wholesale_min` varchar(45) default NULL,
  PRIMARY KEY  (`products_id`),
  KEY `idx_products_date_added_zen` (`products_date_added`),
  KEY `idx_products_status_zen` (`products_status`),
  KEY `idx_products_date_available_zen` (`products_date_available`),
  KEY `idx_products_ordered_zen` (`products_ordered`),
  KEY `idx_products_model_zen` (`products_model`),
  KEY `idx_products_price_sorter_zen` (`products_price_sorter`),
  KEY `idx_master_categories_id_zen` (`master_categories_id`),
  KEY `idx_products_sort_order_zen` (`products_sort_order`),
  KEY `idx_manufacturers_id_zen` (`manufacturers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

-- 
-- 导出表中的数据 `products`
-- 

INSERT INTO `products` VALUES (2, 1, 100, '2', 's/201011/12885806850.jpg,s/201011/12885806851.jpg,s/201011/12885806852.jpg', 129.9900, 250.0000, 0.0000, 0, '2010-11-01 11:04:48', '2010-11-01 11:06:35', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 129.9900, 16, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (3, 1, 999, '3', 's/201011/12885807460.jpg,s/201011/12885807461.jpg,s/201011/12885807462.jpg', 279.9900, 559.9800, 0.0000, 0, '2010-11-01 11:05:48', '2010-11-01 11:09:34', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 279.9900, 16, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (4, 1, 99, '4', 's/201011/12885809140.jpg,s/201011/12885809141.jpg,s/201011/12885809152.jpg', 259.9900, 519.0000, 0.0000, 0, '2010-11-01 11:08:37', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 259.9900, 16, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (5, 1, 99, '5', 's/201011/12885811310.jpg,s/201011/12885811311.jpg', 69.9900, 97.9900, 0.0000, 0, '2010-11-01 11:12:13', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 69.9900, 17, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (6, 1, 100, '6', 's/201011/12885812040.jpg,s/201011/12885812041.jpg', 89.9900, 125.0000, 0.0000, 0, '2010-11-01 11:13:25', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 89.9900, 17, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (7, 1, 100, '7', 's/201011/12885821980.jpg,s/201011/12885821981.jpg,s/201011/12885821982.jpg,s/201011/12885821983.jpg,s/201011/12885821984.jpg', 39.9900, 98.5500, 0.0000, 0, '2010-11-01 11:30:01', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 39.9900, 18, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (8, 1, 99, '8', 's/201011/12885823870.jpg,s/201011/12885823871.jpg,s/201011/12885823872.jpg', 19.9900, 27.0000, 0.0000, 0, '2010-11-01 11:31:40', '2010-11-01 11:33:10', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 19.9900, 18, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (9, 1, 80, '9', 's/201011/12885825300.jpg,s/201011/12885825311.jpg,s/201011/12885825312.jpg,s/201011/12885825313.jpg', 54.9900, 78.0000, 0.0000, 0, '2010-11-01 11:35:42', '2010-11-01 16:05:02', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 54.9900, 18, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (10, 1, 99, '10', 's/201011/12885827550.jpg,s/201011/12885827551.jpg', 49.9900, 89.9900, 0.0000, 0, '2010-11-01 11:39:25', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 49.9900, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (11, 1, 99, '11', 's/201011/12885828640.jpg', 49.9900, 98.0000, 0.0000, 0, '2010-11-01 11:41:05', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 49.9900, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (12, 1, 80, '12', 's/201011/12885829400.jpg', 43.9900, 81.5900, 0.0000, 0, '2010-11-01 11:42:22', '2010-11-01 18:25:33', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 43.9900, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (16, 1, 30, '16', 's/201011/12885906350.jpg,s/201011/12885906351.jpg,s/201011/12885906352.jpg,s/201011/12885906353.jpg', 89.9900, 0.0000, 0.0000, 0, '2010-11-01 13:50:37', NULL, NULL, 2, 1, 0, 0, 10, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 89.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (15, 1, 30, '15', 's/201011/12885905030.jpg,s/201011/12885905041.jpg,s/201011/12885905042.jpg,s/201011/12885905043.jpg', 129.9900, 101.0000, 0.0000, 0, '2010-11-01 13:48:27', '2010-11-01 18:30:45', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 129.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (17, 1, 40, '17', 's/201011/12885907620.jpg,s/201011/12885907631.jpg,s/201011/12885907632.jpg,s/201011/12885907633.jpg', 85.9900, 171.0000, 0.0000, 0, '2010-11-01 13:52:45', NULL, NULL, 2, 1, 0, 0, 10, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 85.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (18, 1, 50, '18', 's/201011/12885907720.jpg,s/201011/12885907731.jpg,s/201011/12885907732.jpg,s/201011/12885907733.jpg', 85.9900, 171.0000, 0.0000, 0, '2010-11-01 13:52:55', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 85.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (19, 1, 40, '19', 's/201011/12885910550.jpg,s/201011/12885910551.jpg,s/201011/12885910552.jpg', 99.9900, 100.0000, 0.0000, 0, '2010-11-01 13:57:38', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 99.9900, 21, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (20, 1, 60, '20', 's/201011/12885911130.jpg,s/201011/12885911131.jpg,s/201011/12885911142.jpg', 89.9900, 125.0000, 0.0000, 0, '2010-11-01 13:59:02', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 89.9900, 21, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (21, 1, 30, '21', 's/201011/12885914910.jpg,s/201011/12885914911.jpg,s/201011/12885914912.jpg,s/201011/12885914913.jpg', 31.7600, 44.5000, 0.0000, 0, '2010-11-01 14:04:55', '2010-11-01 18:30:05', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 31.7600, 23, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (22, 1, 40, '22', 's/201011/12885915810.jpg,s/201011/12885915811.jpg,s/201011/12885915812.jpg', 37.9900, 51.0000, 0.0000, 0, '2010-11-01 14:06:23', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 37.9900, 23, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (23, 1, 50, '23', 's/201011/12885916720.jpg,s/201011/12885916721.jpg,s/201011/12885916722.jpg', 78.5000, 100.0000, 0.0000, 0, '2010-11-01 14:07:54', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 78.5000, 23, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (24, 1, 60, '24', 's/201011/12885918550.jpg,s/201011/12885918551.jpg,s/201011/12885918552.jpg,s/201011/12885918563.jpg', 145.9900, 455.0000, 0.0000, 0, '2010-11-01 14:10:58', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 145.9900, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (25, 1, 50, '25', 's/201011/12885919290.jpg,s/201011/12885919291.jpg', 73.9900, 150.0000, 0.0000, 0, '2010-11-01 14:12:11', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 73.9900, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (26, 1, 100, '26', 's/201011/12885920400.jpg,s/201011/12885920401.jpg,s/201011/12885920402.jpg,s/201011/12885920403.jpg', 500.0000, 632.9900, 0.0000, 0, '2010-11-01 14:14:03', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 500.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (27, 1, 100, '27', 's/201011/12885923040.jpg,s/201011/12885923041.jpg,s/201011/12885923042.jpg,s/201011/12885923043.jpg', 79.0000, 100.0000, 0.0000, 0, '2010-11-01 14:18:26', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 79.0000, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (28, 1, 80, '28', 's/201011/12885923670.jpg', 90.0000, 108.0000, 0.0000, 0, '2010-11-01 14:19:29', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 90.0000, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (29, 1, 50, '29', 's/201011/12885924270.jpg', 30.0000, 50.0000, 0.0000, 0, '2010-11-01 14:20:31', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 30.0000, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (30, 1, 50, '30', 's/201011/12885925850.jpg,s/201011/12885925851.jpg,s/201011/12885925852.jpg,s/201011/12885925863.jpg', 100.0000, 120.0000, 0.0000, 0, '2010-11-01 14:23:08', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 100.0000, 24, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (31, 1, 60, '31', 's/201011/12885926760.jpg,s/201011/12885926761.jpg,s/201011/12885926762.jpg,s/201011/12885926763.jpg', 50.0000, 90.0000, 0.0000, 0, '2010-11-01 14:24:38', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 50.0000, 24, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (32, 1, 50, '32', 's/201011/12885929180.jpg,s/201011/12885929181.jpg,s/201011/12885929182.jpg', 60.0000, 90.0000, 0.0000, 0, '2010-11-01 14:28:40', '2010-11-01 16:05:39', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 60.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (33, 1, 50, '33', 's/201011/12885931050.jpg', 120.0000, 150.0000, 0.0000, 0, '2010-11-01 14:31:49', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 120.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (34, 1, 100, '34', 's/201011/12885932130.jpg,s/201011/12885932131.jpg,s/201011/12885932132.jpg,s/201011/12885932133.jpg,s/201011/12885932134.jpg', 450.0000, 500.0000, 0.0000, 0, '2010-11-01 14:33:44', '2010-11-01 16:05:23', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 450.0000, 26, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (35, 1, 50, '35', 's/201011/12885932950.jpg,s/201011/12885932951.jpg', 85.0000, 100.0000, 0.0000, 0, '2010-11-01 14:34:57', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 85.0000, 26, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (36, 1, 30, '36', 's/201011/12885933560.jpg', 60.0000, 80.0000, 0.0000, 0, '2010-11-01 14:35:58', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 60.0000, 26, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (37, 1, 100, '37', 's/201011/12885935620.jpg,s/201011/12885935631.jpg', 30.0000, 50.0000, 0.0000, 0, '2010-11-01 14:39:25', NULL, NULL, 5, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 30.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (38, 1, 50, '38', 's/201011/12885936370.jpg,s/201011/12885936381.jpg,s/201011/12885936382.jpg', 50.0000, 60.0000, 0.0000, 0, '2010-11-01 14:40:39', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 50.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (39, 1, 10, '39', 's/201011/12885937820.jpg,s/201011/12885937821.jpg,s/201011/12885937822.jpg', 45.0000, 50.0000, 0.0000, 0, '2010-11-01 14:43:04', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 45.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (40, 1, 99, '40', 's/201011/12885939210.jpg,s/201011/12885939211.jpg', 40.0000, 50.0000, 0.0000, 0, '2010-11-01 14:45:25', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 40.0000, 29, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (41, 1, 50, '41', 's/201011/12885940160.jpg,s/201011/12885940161.jpg,s/201011/12885940162.jpg', 55.0000, 60.0000, 0.0000, 0, '2010-11-01 14:47:02', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 55.0000, 29, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (42, 1, 70, '42', 's/201011/12885940750.jpg', 45.0000, 60.0000, 0.0000, 0, '2010-11-01 14:47:58', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 45.0000, 29, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (43, 1, 10, '43', 's/201011/12885952950.jpg', 450.0000, 500.0000, 0.0000, 0, '2010-11-01 15:08:16', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 450.0000, 31, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (44, 1, 20, '44', 's/201011/12885953620.jpg', 500.0000, 600.0000, 0.0000, 0, '2010-11-01 15:09:24', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 500.0000, 31, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (45, 1, 20, '45', 's/201011/12885954260.jpg', 400.0000, 500.0000, 0.0000, 0, '2010-11-01 15:10:28', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 400.0000, 31, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (46, 1, 30, '46', 's/201011/12885954990.jpg', 350.0000, 400.0000, 0.0000, 0, '2010-11-01 15:11:41', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 350.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (47, 1, 10, '47', 's/201011/12885955610.jpg', 300.0000, 350.0000, 0.0000, 0, '2010-11-01 15:12:43', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 300.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (48, 1, 20, '48', 's/201011/12885956330.jpg', 300.0000, 350.0000, 0.0000, 0, '2010-11-01 15:13:55', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 300.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (49, 1, 50, '49', 's/201011/12885960830.jpg,s/201011/12885960831.jpg,s/201011/12885960832.jpg', 85.0000, 100.0000, 0.0000, 0, '2010-11-01 15:21:25', '2010-11-01 16:05:55', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 85.0000, 32, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (50, 1, 50, '50', 's/201011/12885961430.jpg,s/201011/12885961431.jpg,s/201011/12885961442.jpg', 70.0000, 80.0000, 0.0000, 0, '2010-11-01 15:22:25', NULL, NULL, 2, 1, 0, 0, 10, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 70.0000, 32, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (51, 1, 50, '51', 's/201011/12885962190.jpg,s/201011/12885962191.jpg,s/201011/12885962192.jpg', 110.0000, 120.0000, 0.0000, 0, '2010-11-01 15:23:41', NULL, NULL, 5, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 10.0000, 32, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (52, 1, 50, '52', 's/201011/12885962750.jpg', 100.0000, 12.0000, 0.0000, 0, '2010-11-01 15:24:37', '2010-11-01 16:06:08', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 100.0000, 33, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (53, 1, 999, '53', 's/201011/12885963470.jpg', 150.0000, 180.9900, 0.0000, 0, '2010-11-01 15:25:49', '2010-11-01 18:02:42', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 150.0000, 33, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (54, 1, 54, '54', 's/201011/12885964010.jpg', 158.0000, 189.0000, 0.0000, 0, '2010-11-01 15:26:43', NULL, NULL, 5, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 158.0000, 33, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (55, 1, 10, '55', 's/201011/12885966150.jpg,s/201011/12885966151.jpg', 850.0000, 900.0000, 0.0000, 0, '2010-11-01 15:30:17', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 850.0000, 35, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (56, 1, 20, '56', 's/201011/12885966720.jpg,s/201011/12885966721.jpg', 700.0000, 800.0000, 0.0000, 0, '2010-11-01 15:31:14', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 700.0000, 35, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (57, 1, 30, '57', 's/201011/12885967550.jpg,s/201011/12885967551.jpg,s/201011/12885967562.jpg', 400.0000, 500.0000, 0.0000, 0, '2010-11-01 15:32:42', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 400.0000, 35, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (58, 1, 50, '58', 's/201011/12885968730.jpg,s/201011/12885968731.jpg', 300.0000, 500.0000, 0.0000, 0, '2010-11-01 15:34:35', '2010-11-01 15:35:06', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 300.0000, 34, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (59, 1, 20, '59', 's/201011/12885969770.jpg,s/201011/12885969771.jpg,s/201011/12885969782.jpg', 350.0000, 400.0000, 0.0000, 0, '2010-11-01 15:36:19', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 350.0000, 34, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (60, 1, 40, '60', 's/201011/12885970470.jpg,s/201011/12885970481.jpg,s/201011/12885970482.jpg', 89.0000, 100.0000, 0.0000, 0, '2010-11-01 15:37:29', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 89.0000, 34, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (61, 1, 50, '61', 's/201011/12885972450.jpg,s/201011/12885972451.jpg,s/201011/12885972452.jpg', 900.0000, 1000.0000, 0.0000, 0, '2010-11-01 15:40:52', '2010-11-01 17:12:53', NULL, 2, 1, 0, 0, 10, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 900.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (62, 1, 10, '62', 's/201011/12885974710.jpg,s/201011/12885974711.jpg,s/201011/12885974712.jpg', 98.0000, 100.0000, 0.0000, 0, '2010-11-01 15:44:49', NULL, NULL, 3, 1, 0, 0, 10, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 98.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (63, 1, 12, '63', 's/201011/12885976350.jpg,s/201011/12885976361.jpg,s/201011/12885976362.jpg', 100.0000, 120.0000, 0.0000, 0, '2010-11-01 15:47:18', '2010-11-01 16:06:38', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 100.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (64, 1, 10, '64', 's/201011/12885977230.jpg', 98.0000, 100.0000, 0.0000, 0, '2010-11-01 15:48:49', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 98.0000, 36, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (65, 1, 10, '65', 's/201011/12885977830.jpg', 120.0000, 150.0000, 0.0000, 0, '2010-11-01 15:49:47', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 120.0000, 36, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (66, 1, 20, '66', 's/201011/12885978480.jpg', 150.0000, 200.0000, 0.0000, 0, '2010-11-01 15:50:51', '2010-11-01 16:06:24', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 150.0000, 36, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (67, 1, 10, '67', 's/201011/12885980390.jpg', 699.0000, 799.0000, 0.0000, 0, '2010-11-01 15:54:05', '2010-11-01 18:32:45', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 699.0000, 38, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (68, 1, 20, '68', 's/201011/12885981270.jpg', 599.0000, 699.0000, 0.0000, 0, '2010-11-01 15:55:29', '2010-11-01 18:32:47', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 599.0000, 38, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (69, 1, 50, '69', 's/201011/12885982220.jpg,s/201011/12885982221.jpg,s/201011/12885982222.jpg,s/201011/12885982223.jpg', 799.0000, 999.0000, 0.0000, 0, '2010-11-01 15:57:05', '2010-11-01 18:32:44', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 799.0000, 38, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (70, 1, 20, '70', 's/201011/12885983820.jpg', 143.0000, 150.0000, 0.0000, 0, '2010-11-01 15:59:44', '2010-11-01 16:06:55', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 143.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (71, 1, 20, '71', 's/201011/12885984290.jpg', 200.0000, 230.0000, 0.0000, 0, '2010-11-01 16:00:31', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 200.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (72, 1, 50, '72', 's/201011/12885985000.jpg,s/201011/12885985001.jpg,s/201011/12885985002.jpg', 110.0000, 120.0000, 0.0000, 0, '2010-11-01 16:01:42', '2010-11-01 16:07:18', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 110.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (73, 1, 100, '73', 's/201011/12888506900.jpg,s/201011/12888506901.jpg', 104.9900, 148.0000, 0.0000, 0, '2010-11-04 14:05:11', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 99.9900, 24, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (74, 1, 100, '74', 's/201011/12888510270.jpg,s/201011/12888510281.jpg,s/201011/12888510282.jpg', 80.9900, 100.0000, 0.0000, 0, '2010-11-04 14:10:29', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 75.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (75, 1, 100, '75', 's/201011/12888512080.jpg', 70.9900, 80.9900, 0.0000, 0, '2010-11-04 14:13:30', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 65.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (76, 1, 100, '76', 's/201011/12888513100.jpg,s/201011/12888513101.jpg,s/201011/12888513102.jpg', 110.9900, 120.0000, 0.0000, 0, '2010-11-04 14:15:12', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 105.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (77, 1, 100, '77', 's/201011/12888513980.jpg', 130.9900, 150.0000, 0.0000, 0, '2010-11-04 14:16:40', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (78, 1, 100, '78', 's/201011/12888515030.jpg', 140.9900, 160.9900, 0.0000, 0, '2010-11-04 14:18:30', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (79, 1, 100, '79', 's/201011/12888515820.jpg,s/201011/12888515821.jpg', 60.9900, 80.0000, 0.0000, 0, '2010-11-04 14:19:47', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 55.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (80, 1, 100, '80', 's/201011/12888516830.jpg,s/201011/12888516831.jpg', 50.9900, 80.9900, 0.0000, 0, '2010-11-04 14:21:25', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 45.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (81, 1, 100, '81', 's/201011/12888517990.jpg', 140.9800, 150.9900, 0.0000, 0, '2010-11-04 14:23:29', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.9800, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (82, 1, 100, '82', 's/201011/12888518980.jpg,s/201011/12888518981.jpg', 90.9900, 100.0000, 0.0000, 0, '2010-11-04 14:25:01', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 85.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (83, 1, 100, '83', 's/201011/12888519690.jpg', 100.9900, 120.9900, 0.0000, 0, '2010-11-04 14:26:12', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 95.9900, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (84, 1, 100, '84', 's/201011/12888520470.jpg,s/201011/12888520481.jpg', 65.0000, 80.0000, 0.0000, 0, '2010-11-04 14:27:29', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 60.0000, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (85, 1, 100, '85', 's/201011/12888524370.jpg,s/201011/12888524371.jpg,s/201011/12888524372.jpg', 70.0000, 90.0000, 0.0000, 0, '2010-11-04 14:33:59', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 65.0000, 25, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (86, 1, 100, '86', 's/201011/12888525490.jpg,s/201011/12888525491.jpg,s/201011/12888525492.jpg', 888.9900, 999.9900, 0.0000, 0, '2010-11-04 14:35:51', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 888.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (87, 1, 100, '87', 's/201011/12888526540.jpg,s/201011/12888526541.jpg,s/201011/12888526552.jpg,s/201011/12888526553.jpg', 650.9900, 850.9900, 0.0000, 0, '2010-11-04 14:37:42', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 650.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (88, 1, 100, '88', 's/201011/12888527430.jpg,s/201011/12888527431.jpg,s/201011/12888527432.jpg', 150.0000, 200.9900, 0.0000, 0, '2010-11-04 14:39:04', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 150.0000, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (89, 1, 100, '89', 's/201011/12888528100.jpg,s/201011/12888528101.jpg', 110.9900, 120.9900, 0.0000, 0, '2010-11-04 14:40:12', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (90, 1, 100, '90', 's/201011/12888528870.jpg,s/201011/12888528871.jpg', 130.9900, 140.9900, 0.0000, 0, '2010-11-04 14:41:29', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 130.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (91, 1, 100, '91', 's/201011/12888529620.jpg,s/201011/12888529621.jpg,s/201011/12888529622.jpg', 135.9900, 150.0000, 0.0000, 0, '2010-11-04 14:42:49', NULL, NULL, 3, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (92, 1, 100, '92', 's/201011/12888530350.jpg,s/201011/12888530351.jpg,s/201011/12888530362.jpg', 125.9900, 130.0000, 0.0000, 0, '2010-11-04 14:43:58', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.9900, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (93, 1, 100, '93', 's/201011/12888531210.jpg,s/201011/12888531211.jpg,s/201011/12888531212.jpg', 125.0000, 130.5900, 0.0000, 0, '2010-11-04 14:45:23', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.0000, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (94, 1, 100, '94', 's/201011/12888532030.jpg,s/201011/12888532031.jpg,s/201011/12888532032.jpg', 140.0000, 152.0000, 0.0000, 0, '2010-11-04 14:46:45', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 140.0000, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (95, 1, 100, '95', 's/201011/12888532840.jpg,s/201011/12888532841.jpg,s/201011/12888532842.jpg', 130.0000, 142.0000, 0.0000, 0, '2010-11-04 14:48:05', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 130.0000, 20, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (96, 1, 100, '96', 's/201011/12888534600.jpg,s/201011/12888534601.jpg,s/201011/12888534602.jpg', 120.0000, 135.0000, 0.0000, 0, '2010-11-04 14:51:02', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 120.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (97, 1, 100, '97', 's/201011/12888535420.jpg,s/201011/12888535431.jpg,s/201011/12888535432.jpg', 135.0000, 150.0000, 0.0000, 0, '2010-11-04 14:52:24', NULL, NULL, 3, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (98, 1, 100, '98', 's/201011/12888536190.jpg,s/201011/12888536191.jpg,s/201011/12888536192.jpg', 125.0000, 130.0000, 0.0000, 0, '2010-11-04 14:53:41', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (99, 1, 100, '99', 's/201011/12888537020.jpg,s/201011/12888537021.jpg,s/201011/12888537022.jpg', 110.0000, 125.0000, 0.0000, 0, '2010-11-04 14:55:08', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (100, 1, 100, '100', 's/201011/12888537730.jpg,s/201011/12888537731.jpg,s/201011/12888537732.jpg', 70.0000, 98.0000, 0.0000, 0, '2010-11-04 14:56:14', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 70.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (101, 1, 100, '101', 's/201011/12888538420.jpg,s/201011/12888538421.jpg,s/201011/12888538422.jpg', 105.0000, 120.0000, 0.0000, 0, '2010-11-04 14:57:24', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 105.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (102, 1, 100, '102', 's/201011/12888541420.jpg,s/201011/12888541421.jpg,s/201011/12888541422.jpg', 110.0000, 125.0000, 0.0000, 0, '2010-11-04 15:02:28', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (103, 1, 100, '103', 's/201011/12888542370.jpg,s/201011/12888542371.jpg,s/201011/12888542372.jpg', 115.0000, 125.0000, 0.0000, 0, '2010-11-04 15:04:09', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 115.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (104, 1, 100, '104', 's/201011/12888543940.jpg,s/201011/12888543941.jpg,s/201011/12888543942.jpg', 145.0000, 150.0000, 0.0000, 0, '2010-11-04 15:06:50', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 145.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (105, 1, 100, '105', 's/201011/12888544590.jpg', 110.0000, 125.0000, 0.0000, 0, '2010-11-04 15:07:43', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 39, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (106, 1, 100, '106', 's/201011/12888547300.jpg,s/201011/12888547301.jpg,s/201011/12888547302.jpg', 110.0000, 120.0000, 0.0000, 0, '2010-11-04 15:12:26', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (107, 1, 100, '107', 's/201011/12888548420.jpg,s/201011/12888548421.jpg,s/201011/12888548432.jpg', 100.0000, 125.0000, 0.0000, 0, '2010-11-04 15:14:04', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 100.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (108, 1, 100, '108', 's/201011/12888549730.jpg,s/201011/12888549731.jpg,s/201011/12888549732.jpg', 120.0000, 135.0000, 0.0000, 0, '2010-11-04 15:16:21', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 120.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (109, 1, 100, '109', 's/201011/12888550690.jpg,s/201011/12888550691.jpg,s/201011/12888550692.jpg', 125.9900, 135.0000, 0.0000, 0, '2010-11-04 15:17:51', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.9900, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (110, 1, 100, '110', 's/201011/12888552540.jpg', 89.0000, 100.0000, 0.0000, 0, '2010-11-04 15:20:57', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 89.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (111, 1, 100, '111', 's/201011/12888553590.jpg,s/201011/12888553591.jpg,s/201011/12888553592.jpg', 110.0000, 120.0000, 0.0000, 0, '2010-11-04 15:22:41', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (112, 1, 100, '112', 's/201011/12888554720.jpg,s/201011/12888554721.jpg', 105.0000, 120.0000, 0.0000, 0, '2010-11-04 15:24:41', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 105.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (113, 1, 100, '113', 's/201011/12888555880.jpg,s/201011/12888555881.jpg', 105.0000, 110.0000, 0.0000, 0, '2010-11-04 15:26:34', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 105.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (114, 1, 100, '114', 's/201011/12888558440.jpg,s/201011/12888558441.jpg,s/201011/12888558442.jpg', 100.0000, 105.0000, 0.0000, 0, '2010-11-04 15:30:54', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 100.0000, 22, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (115, 1, 100, '115', 's/201011/12888563340.jpg,s/201011/12888563341.jpg,s/201011/12888563352.jpg', 90.0000, 100.0000, 0.0000, 0, '2010-11-04 15:38:56', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 90.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (116, 1, 100, '116', 's/201011/12888565810.jpg', 130.0000, 135.0000, 0.0000, 0, '2010-11-04 15:43:20', '2010-11-04 15:47:27', NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 130.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (117, 1, 100, '117', 's/201011/12888569380.jpg,s/201011/12888569381.jpg,s/201011/12888569382.jpg', 90.0000, 110.0000, 0.0000, 0, '2010-11-04 15:49:02', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 90.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (118, 1, 110, '118', 's/201011/12888570500.jpg,s/201011/12888570501.jpg,s/201011/12888570502.jpg', 113.0000, 152.0000, 0.0000, 0, '2010-11-04 15:50:58', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 113.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (119, 1, 110, '119', 's/201011/12888571450.jpg,s/201011/12888571451.jpg,s/201011/12888571452.jpg', 180.0000, 198.0000, 0.0000, 0, '2010-11-04 15:52:27', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 180.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (120, 1, 100, '120', 's/201011/12888572180.jpg,s/201011/12888572181.jpg,s/201011/12888572182.jpg', 135.0000, 150.0000, 0.0000, 0, '2010-11-04 15:54:09', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (121, 1, 100, '121', 's/201011/12888573120.jpg,s/201011/12888573121.jpg', 145.0000, 150.0000, 0.0000, 0, '2010-11-04 15:55:14', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 145.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (122, 1, 100, '122', 's/201011/12888573850.jpg,s/201011/12888573861.jpg,s/201011/12888573862.jpg', 158.0000, 169.0000, 0.0000, 0, '2010-11-04 15:56:43', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 158.0000, 19, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (123, 1, 100, '123', 's/201011/12888576240.jpg,s/201011/12888576241.jpg,s/201011/12888576242.jpg', 135.0000, 150.0000, 0.0000, 0, '2010-11-04 16:00:28', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (124, 1, 100, '124', 's/201011/12888576910.jpg', 175.0000, 180.0000, 0.0000, 0, '2010-11-04 16:01:35', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 175.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (125, 1, 100, '125', 's/201011/12888578170.jpg,s/201011/12888578171.jpg', 889.9900, 999.0000, 0.0000, 0, '2010-11-04 16:03:45', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 889.9900, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (126, 1, 110, '126', 's/201011/12888579070.jpg,s/201011/12888579071.jpg', 135.0000, 150.0000, 0.0000, 0, '2010-11-04 16:05:13', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 135.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (127, 1, 100, '127', 's/201011/12888580020.jpg,s/201011/12888580021.jpg,s/201011/12888580022.jpg', 145.0000, 150.0000, 0.0000, 0, '2010-11-04 16:06:45', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 145.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (128, 1, 100, '128', 's/201011/12888581110.jpg,s/201011/12888581111.jpg', 880.0000, 980.0000, 0.0000, 0, '2010-11-04 16:08:36', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 880.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (129, 1, 100, '129', 's/201011/12888582070.jpg', 700.0000, 780.0000, 0.0000, 0, '2010-11-04 16:10:15', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 700.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (130, 1, 100, '130', 's/201011/12888583600.jpg,s/201011/12888583601.jpg,s/201011/12888583602.jpg', 450.0000, 500.0000, 0.0000, 0, '2010-11-04 16:12:46', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 450.0000, 27, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (131, 1, 50, '131', 's/201011/12888586380.jpg', 80.0000, 100.0000, 0.0000, 0, '2010-11-04 16:17:25', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 80.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (132, 1, 80, '132', 's/201011/12888587570.jpg', 110.0000, 120.0000, 0.0000, 0, '2010-11-04 16:19:21', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (133, 1, 100, '133', 's/201011/12888588220.jpg', 105.0000, 120.0000, 0.0000, 0, '2010-11-04 16:20:25', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 105.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (134, 1, 100, '134', 's/201011/12888589080.jpg', 90.0000, 100.0000, 0.0000, 0, '2010-11-04 16:21:53', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 90.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (135, 1, 100, '135', 's/201011/12888589940.jpg,s/201011/12888589941.jpg,s/201011/12888589942.jpg', 60.0000, 80.0000, 0.0000, 0, '2010-11-04 16:23:23', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 60.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (136, 1, 100, '136', 's/201011/12888591990.jpg,s/201011/12888591991.jpg,s/201011/12888591992.jpg', 50.0000, 70.0000, 0.0000, 0, '2010-11-04 16:26:41', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 50.0000, 28, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (137, 1, 100, '137', 's/201011/12888593470.jpg,s/201011/12888593471.jpg,s/201011/12888593472.jpg', 888.9900, 988.0000, 0.0000, 0, '2010-11-04 16:29:36', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 888.9900, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (138, 1, 100, '138', 's/201011/12888594450.jpg', 500.0000, 560.0000, 0.0000, 0, '2010-11-04 16:30:47', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 500.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (139, 1, 100, '139', 's/201011/12888595270.jpg,s/201011/12888595271.jpg', 500.0000, 555.0000, 0.0000, 0, '2010-11-04 16:32:12', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 500.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (140, 1, 100, '140', 's/201011/12888595860.jpg', 125.0000, 130.0000, 0.0000, 0, '2010-11-04 16:33:13', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (141, 1, 100, '141', 's/201011/12888596590.jpg', 600.0000, 780.0000, 0.0000, 0, '2010-11-04 16:34:32', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 600.0000, 30, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (142, 1, 100, '142', 's/201011/12888600230.jpg,s/201011/12888600231.jpg,s/201011/12888600232.jpg', 85.0000, 90.0000, 0.0000, 0, '2010-11-04 16:40:32', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 85.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (143, 1, 100, '143', 's/201011/12888601150.jpg,s/201011/12888601151.jpg,s/201011/12888601152.jpg', 35.0000, 50.0000, 0.0000, 0, '2010-11-04 16:42:00', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 35.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (144, 1, 100, '144', 's/201011/12888602250.jpg,s/201011/12888602251.jpg,s/201011/12888602252.jpg', 45.0000, 60.0000, 0.0000, 0, '2010-11-04 16:43:50', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 45.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (145, 1, 100, '145', 's/201011/12888603360.jpg,s/201011/12888603361.jpg,s/201011/12888603362.jpg', 550.0000, 650.0000, 0.0000, 0, '2010-11-04 16:45:37', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 550.0000, 37, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (146, 1, 100, '146', 's/201011/12888607370.jpg', 98.0000, 100.0000, 0.0000, 0, '2010-11-04 16:52:19', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 98.0000, 32, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (147, 1, 100, '147', 's/201011/12888608110.jpg,s/201011/12888608111.jpg,s/201011/12888608112.jpg', 115.0000, 125.0000, 0.0000, 0, '2010-11-04 16:53:33', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 115.0000, 32, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (148, 1, 10, '148', 's/201011/12888608940.jpg', 700.0000, 760.0000, 0.0000, 0, '2010-11-04 16:55:12', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 700.0000, 32, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (149, 1, 100, '149', 's/201011/12888611030.jpg,s/201011/12888611031.jpg', 110.0000, 120.0000, 0.0000, 0, '2010-11-04 16:58:24', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 110.0000, 35, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (150, 1, 100, '150', 's/201011/12888611970.jpg,s/201011/12888611971.jpg', 125.0000, 130.0000, 0.0000, 0, '2010-11-04 16:59:59', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 125.0000, 35, 1, 0, 0, 0, 0, 0, 1, 0, NULL);
INSERT INTO `products` VALUES (151, 1, 100, '151', 's/201011/12888614370.jpg,s/201011/12888614381.jpg,s/201011/12888614382.jpg', 888.0000, 998.0000, 0.0000, 0, '2010-11-04 17:03:59', NULL, NULL, 2, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 888.0000, 16, 1, 0, 0, 0, 0, 0, 1, 0, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_attributes`
-- 

CREATE TABLE `products_attributes` (
  `products_attributes_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `options_id` int(11) NOT NULL default '0',
  `options_values_id` int(11) NOT NULL default '0',
  `options_values_price` decimal(15,4) NOT NULL default '0.0000',
  `options_values_price_w` varchar(150) default '0',
  `price_prefix` char(1) NOT NULL default '',
  `products_options_sort_order` int(11) NOT NULL default '0',
  `product_attribute_is_free` tinyint(1) NOT NULL default '0',
  `products_attributes_weight` float NOT NULL default '0',
  `products_attributes_weight_prefix` char(1) NOT NULL default '',
  `attributes_display_only` tinyint(1) NOT NULL default '0',
  `attributes_default` tinyint(1) NOT NULL default '0',
  `attributes_discounted` tinyint(1) NOT NULL default '1',
  `attributes_image` varchar(64) default NULL,
  `attributes_price_base_included` tinyint(1) NOT NULL default '1',
  `attributes_price_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_factor_onetime_offset` decimal(15,4) NOT NULL default '0.0000',
  `attributes_qty_prices` text,
  `attributes_qty_prices_onetime` text,
  `attributes_price_words` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_words_free` int(4) NOT NULL default '0',
  `attributes_price_letters` decimal(15,4) NOT NULL default '0.0000',
  `attributes_price_letters_free` int(4) NOT NULL default '0',
  `attributes_required` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`products_attributes_id`),
  KEY `idx_id_options_id_values_zen` (`products_id`,`options_id`,`options_values_id`),
  KEY `idx_opt_sort_order_zen` (`products_options_sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- 导出表中的数据 `products_attributes`
-- 

INSERT INTO `products_attributes` VALUES (1, 53, 1, 4, 0.0000, '0', '+', 0, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (2, 53, 1, 1, 0.0000, '0', '+', 2, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (3, 53, 1, 2, 0.0000, '0', '+', 3, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (4, 53, 1, 3, 0.0000, '0', '+', 4, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (5, 12, 1, 4, 0.0000, '0', '+', 0, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (6, 12, 1, 1, 0.0000, '0', '+', 2, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (7, 12, 1, 2, 0.0000, '0', '+', 3, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);
INSERT INTO `products_attributes` VALUES (8, 12, 1, 3, 0.0000, '0', '+', 4, 1, 0, '+', 0, 0, 1, '', 1, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '', '', 0.0000, 0, 0.0000, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_attributes_download`
-- 

CREATE TABLE `products_attributes_download` (
  `products_attributes_id` int(11) NOT NULL default '0',
  `products_attributes_filename` varchar(255) NOT NULL default '',
  `products_attributes_maxdays` int(2) default '0',
  `products_attributes_maxcount` int(2) default '0',
  PRIMARY KEY  (`products_attributes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `products_attributes_download`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `products_description`
-- 

CREATE TABLE `products_description` (
  `products_id` int(11) NOT NULL auto_increment,
  `language_id` int(11) NOT NULL default '1',
  `products_name` varchar(255) NOT NULL,
  `products_description` text,
  `products_url` varchar(255) default NULL,
  `products_viewed` int(5) default '0',
  PRIMARY KEY  (`products_id`,`language_id`),
  KEY `idx_products_name_zen` (`products_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

-- 
-- 导出表中的数据 `products_description`
-- 

INSERT INTO `products_description` VALUES (2, 2, 'Ball Gown Strapless Asymmetrical Satin Tulle Wedding Dresses for Bride (HSX1197)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 0);
INSERT INTO `products_description` VALUES (2, 1, 'Ball Gown Strapless Asymmetrical Satin Tulle Wedding Dresses for Bride (HSX1197)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 3);
INSERT INTO `products_description` VALUES (3, 1, 'Ball Gown Sweetheart Chapel Train Satin Organza Wedding Dresses (WSM0484)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 5);
INSERT INTO `products_description` VALUES (3, 2, 'Ball Gown Sweetheart Chapel Train Satin Organza Wedding Dresses (WSM0484)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 0);
INSERT INTO `products_description` VALUES (4, 1, 'Ball Gown Sweetheart Chapel Train Taffeta Wedding Dresses for Bride (HSX1251)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 1);
INSERT INTO `products_description` VALUES (4, 2, 'Ball Gown Sweetheart Chapel Train Taffeta Wedding Dresses for Bride (HSX1251)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 0);
INSERT INTO `products_description` VALUES (5, 1, 'A-line Straps Tea-length Satin Bridesmaid/ Wedding Party Dress (FSD0394)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 1);
INSERT INTO `products_description` VALUES (5, 2, 'A-line Straps Tea-length Satin Bridesmaid/ Wedding Party Dress (FSD0394)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 0);
INSERT INTO `products_description` VALUES (6, 1, 'A-line One Shoulder Sweep/ Brush Train Chiffon Elastic satin Ruffles Bridesmaid Dress(FSL0864)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 1);
INSERT INTO `products_description` VALUES (6, 2, 'A-line One Shoulder Sweep/ Brush Train Chiffon Elastic satin Ruffles Bridesmaid Dress(FSL0864)', 'Whether you choose a standard size or give us your custom measurements, all our dresses and tuxedos/dress suits are personally tailored for you from scratch.', '', 0);
INSERT INTO `products_description` VALUES (7, 1, 'Gathered Round Neckline And Wasit Design Sleeveless Dress / Women''s Dresses (FF-A-BI0853002)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 5);
INSERT INTO `products_description` VALUES (7, 2, 'Gathered Round Neckline And Wasit Design Sleeveless Dress / Women''s Dresses (FF-A-BI0853002)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 0);
INSERT INTO `products_description` VALUES (8, 1, 'Beaded Short Sleeves Stand Neckline Sweater / Women''s Sweaters (FF-C-BI0673003)', '', '', 8);
INSERT INTO `products_description` VALUES (8, 2, 'Beaded Short Sleeves Stand Neckline Sweater / Women''s Sweaters (FF-C-BI0673003)', '', '', 0);
INSERT INTO `products_description` VALUES (9, 1, 'Tie-dye Three-quarters Sleeves Special Collar With Belt Coat / Women''s Outerwear (FF-A-BI1201003)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 6);
INSERT INTO `products_description` VALUES (9, 2, 'Tie-dye Three-quarters Sleeves Special Collar With Belt Coat / Women''s Outerwear (FF-A-BI1201003)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 0);
INSERT INTO `products_description` VALUES (10, 1, 'VICTORIA BECKHAM Style / HEIDI KLUM Style / Deep V Neckline Fit Sleeveless Dress / Women''s Dresses (FF-1802BF117-0853)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 3);
INSERT INTO `products_description` VALUES (10, 2, 'VICTORIA BECKHAM Style / HEIDI KLUM Style / Deep V Neckline Fit Sleeveless Dress / Women''s Dresses (FF-1802BF117-0853)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 0);
INSERT INTO `products_description` VALUES (11, 1, 'VICTORIA BECKHAM / LEIGHTON MEESTER Style / Supreme Shoulder Ruffles Fit Dress / Women''s Dresses (FF-1802BF118-0853)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 14);
INSERT INTO `products_description` VALUES (11, 2, 'VICTORIA BECKHAM / LEIGHTON MEESTER Style / Supreme Shoulder Ruffles Fit Dress / Women''s Dresses (FF-1802BF118-0853)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you. <br />', '', 1);
INSERT INTO `products_description` VALUES (12, 1, 'RUNWAY Style / Gathered Flattered Flower Short Sleeves Overlapped V Neckline Dress / Women''s Dresses (FF-1802BE019-0811)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you', '', 6);
INSERT INTO `products_description` VALUES (12, 2, 'RUNWAY Style / Gathered Flattered Flower Short Sleeves Overlapped V Neckline Dress / Women''s Dresses (FF-1802BE019-0811)', 'Shipping Time:Total Shipping Time is based on the time it will take to tailor your dresses + the time taken for the finished dress to be shipped to you', '', 0);
INSERT INTO `products_description` VALUES (16, 2, 'W008 Dual Card Dual Camera Quad Band with WIFI TV JAVA 3.5 Inch Flat Touch Screen Cell Phone Black (2GB TF Card)(SZ00720639)', 'fakfaj sfjkajfkajf asjfokjasokfjasokjfkaos jfkasjfkasjdkasjfka', '', 0);
INSERT INTO `products_description` VALUES (15, 1, 'Versio Aquarius 600 Dual Card WIFI Dual Camera Bluetooth FM JAVA 3.5 Inch Touch Screen Cell Phone(2GB TF Card)', '<li>Touch Screen - Easy-to-use and responsive touch screen function for smooth navigating. </li>\r\n<li>Full Screen View - Crystal clear viewing with our cinematic full-screen mode. </li>', '', 2);
INSERT INTO `products_description` VALUES (15, 2, 'Versio Aquarius 600 Dual Card WIFI Dual Camera Bluetooth FM JAVA 3.5 Inch Touch Screen Cell Phone(2GB TF Card)', '<li>Touch Screen - Easy-to-use and responsive touch screen function for smooth navigating. </li>\r\n<li>Full Screen View - Crystal clear viewing with our cinematic full-screen mode. </li>', '', 1);
INSERT INTO `products_description` VALUES (16, 1, 'W008 Dual Card Dual Camera Quad Band with WIFI TV JAVA 3.5 Inch Flat Touch Screen Cell Phone Black (2GB TF Card)(SZ00720639)', 'fakfaj sfjkajfkajf asjfokjasokfjasokjfkaos jfkasjfkasjdkasjfka', '', 4);
INSERT INTO `products_description` VALUES (17, 1, 'E71 Style PRO TV Dual Sim Card Quad Band Free Leather case Cell Phone Black(2GB TF Card)', 'sajkhfjkahfhsw awfhkafawj fsakfaofhaks', '', 8);
INSERT INTO `products_description` VALUES (17, 2, 'E71 Style PRO TV Dual Sim Card Quad Band Free Leather case Cell Phone Black(2GB TF Card)', 'sajkhfjkahfhsw awfhkafawj fsakfaofhaks', '', 0);
INSERT INTO `products_description` VALUES (18, 1, 'E71 Style PRO TV Dual Sim Card Quad Band Free Leather case Cell Phone Black(2GB TF Card)', 'sajkhfjkahfhsw awfhkafawj fsakfaofhaks', '', 1);
INSERT INTO `products_description` VALUES (18, 2, 'E71 Style PRO TV Dual Sim Card Quad Band Free Leather case Cell Phone Black(2GB TF Card)', 'sajkhfjkahfhsw awfhkafawj fsakfaofhaks', '', 0);
INSERT INTO `products_description` VALUES (19, 1, 'JINCEN JC-V10 Quad Band Dual Card TV Dual Camera Flashlight Dual Screen Flip Cell Phone Black (2GB TF Card)(SZ05440574)', '<div class="pad_text line_120">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </div>\r\n<!-- EOF Categories Banner -->', '', 0);
INSERT INTO `products_description` VALUES (19, 2, 'JINCEN JC-V10 Quad Band Dual Card TV Dual Camera Flashlight Dual Screen Flip Cell Phone Black (2GB TF Card)(SZ05440574)', '<div class="pad_text line_120">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </div>\r\n<!-- EOF Categories Banner -->', '', 0);
INSERT INTO `products_description` VALUES (20, 1, 'I300+ Dual Card Quad Band Dual Camera FM TV Flip Cell Phone(2GB TF Card)(SZ05610038)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (20, 2, 'I300+ Dual Card Quad Band Dual Camera FM TV Flip Cell Phone(2GB TF Card)(SZ05610038)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (21, 1, 'Professional Digital Voice Recorder with 1GB Memory Built in (SZM588)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (21, 2, 'Professional Digital Voice Recorder with 1GB Memory Built in (SZM588)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (22, 1, '1GB Professional Digital Voice Recording MP3 Player(KLY216)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (22, 2, '1GB Professional Digital Voice Recording MP3 Player(KLY216)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (23, 1, 'Professional Digital Voice Recorder with 2GB Memory Built in (IDA-A500)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (23, 2, 'Professional Digital Voice Recorder with 2GB Memory Built in (IDA-A500)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (24, 1, 'Android Tablet PC-aPad-MID-7""TFT Touch Screen-Rockchips RK2808 Processor-600MHZ-2G-ARM 11-Wifi-Camera(SMQ5453)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 4);
INSERT INTO `products_description` VALUES (24, 2, 'Android Tablet PC-aPad-MID-7""TFT Touch Screen-Rockchips RK2808 Processor-600MHZ-2G-ARM 11-Wifi-Camera(SMQ5453)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (25, 1, 'Digital Entertainer HD Multimedia Player(SMQ5247)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (25, 2, 'Digital Entertainer HD Multimedia Player(SMQ5247)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (26, 1, '27 inch AOC LCD Monitor V27T(SMQ5200)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (26, 2, '27 inch AOC LCD Monitor V27T(SMQ5200)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (27, 1, '5.0" Portable High Definition Touch Screen Car GPS Navigator - Media - Games - SD Card (SZC5855)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 4);
INSERT INTO `products_description` VALUES (27, 2, '5.0" Portable High Definition Touch Screen Car GPS Navigator - Media - Games - SD Card (SZC5855)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (28, 1, 'Car Reversing Set - 7 inch Rearview Mirror TFT LCD Monitor - Rearview Camera - Parking Sensors (SZC5882)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (28, 2, 'Car Reversing Set - 7 inch Rearview Mirror TFT LCD Monitor - Rearview Camera - Parking Sensors (SZC5882)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (29, 1, 'LED Parking Sensor RS-820E', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 5);
INSERT INTO `products_description` VALUES (29, 2, 'LED Parking Sensor RS-820E', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (30, 1, '7 Inch Car Desktop TFT Digital Touch Screen Monitor For Car PC - VGA - Stand-alone - Headrest (SZC5883)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (30, 2, '7 Inch Car Desktop TFT Digital Touch Screen Monitor For Car PC - VGA - Stand-alone - Headrest (SZC5883)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (31, 1, '7" Stand-alone TFT LCD Monitor-7019 (SZC5613)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (31, 2, '7" Stand-alone TFT LCD Monitor-7019 (SZC5613)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (32, 1, 'Beach Sexy - Center Gold Ring Hardware(YCSM0924-V286700_KNEE)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (32, 2, 'Beach Sexy - Center Gold Ring Hardware(YCSM0924-V286700_KNEE)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (33, 1, 'Gorgeous Alloy with Clear Crystal Wedding Bridal Jewelry Set SZ1076 (JSZ038)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (33, 2, 'Gorgeous Alloy with Clear Crystal Wedding Bridal Jewelry Set SZ1076 (JSZ038)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (34, 1, 'HiPhone I9+ Dual Card Quad Band Touch Screen Phone With Java Function White(2Gb TF Card)(SZR175)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (34, 2, 'HiPhone I9+ Dual Card Quad Band Touch Screen Phone With Java Function White(2Gb TF Card)(SZR175)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (35, 1, 'Sunglasses with 2GB MP3(SM04-2)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (35, 2, 'Sunglasses with 2GB MP3(SM04-2)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (36, 1, 'Pasnew Sports Watch With Blue Colour (PSE-232-02)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (36, 2, 'Pasnew Sports Watch With Blue Colour (PSE-232-02)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (37, 1, 'Professional Mini Makeup Set - 21 Colors Eyeshadows + 2 Colors Blushers + 1 Color Face Powder + 2 Colors Eyebrow+ 4 Colors Lip Gloss(0119-7)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (37, 2, 'Professional Mini Makeup Set - 21 Colors Eyeshadows + 2 Colors Blushers + 1 Color Face Powder + 2 Colors Eyebrow+ 4 Colors Lip Gloss(0119-7)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (38, 1, '5Pcs Professional Mini Cosmetic Brush Set (5903155N)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (38, 2, '5Pcs Professional Mini Cosmetic Brush Set (5903155N)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (39, 1, 'Travel Size! 6 Colors Makeup Eye Shadow Palette D906 - 4 Colors Can Be Selected (0594-04.23-D906)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (39, 2, 'Travel Size! 6 Colors Makeup Eye Shadow Palette D906 - 4 Colors Can Be Selected (0594-04.23-D906)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (40, 1, '10 Pcs Electronic cigarette Cartridges for SKE8084&8097', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (40, 2, '10 Pcs Electronic cigarette Cartridges for SKE8084&8097', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (41, 1, '1 Parcle Multi-flavor Atomized Cartridges DZY010 for E-cigar DSE701 (5 Pcs Cartridges)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (41, 2, '1 Parcle Multi-flavor Atomized Cartridges DZY010 for E-cigar DSE701 (5 Pcs Cartridges)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (42, 1, 'New Arrival 1 Parcel Atomized cartridge PJ101 for Mini Electronic Cigarette DSE 101 ( 5 Pcs One Parcel)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (42, 2, 'New Arrival 1 Parcel Atomized cartridge PJ101 for Mini Electronic Cigarette DSE 101 ( 5 Pcs One Parcel)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (43, 1, '12-light Crystal Chandelier (1017-DY3337-12)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (43, 2, '12-light Crystal Chandelier (1017-DY3337-12)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (44, 1, 'Antique Alloy Crystal Swag 6-light Chandelier(0943-MX-6027+6)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (44, 2, 'Antique Alloy Crystal Swag 6-light Chandelier(0943-MX-6027+6)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (45, 1, '28-light Crystal Chandelier (1017-DY3319-28)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (45, 2, '28-light Crystal Chandelier (1017-DY3319-28)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (46, 1, '23-light Crystal Chandelier (1017-DY3358-23)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (46, 2, '23-light Crystal Chandelier (1017-DY3358-23)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (47, 1, 'Crystal 12-light Iron Ceiling Light(0942-98002-C-9)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (47, 2, 'Crystal 12-light Iron Ceiling Light(0942-98002-C-9)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (48, 1, '4-lights Crystal Ceiling Light(0899-H2200-4)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (48, 2, '4-lights Crystal Ceiling Light(0899-H2200-4)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (49, 1, 'Nikula Adjustable 10-30x25 Binocular (0956-0804-5)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (49, 2, 'Nikula Adjustable 10-30x25 Binocular (0956-0804-5)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (50, 1, '2010 New Arrival Three Modes 20 + 3 LED Brilliant Tent Light (0956-0707-2)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (50, 2, '2010 New Arrival Three Modes 20 + 3 LED Brilliant Tent Light (0956-0707-2)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (51, 1, '2010 New Arrival Three Modes 14 LED Brilliant Headlamp (0956-0707-6)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (51, 2, '2010 New Arrival Three Modes 14 LED Brilliant Headlamp (0956-0707-6)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (52, 1, 'Golf Stand Bag(GRF061)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 4);
INSERT INTO `products_description` VALUES (52, 2, 'Golf Stand Bag(GRF061)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (53, 1, 'Brand New complete club set 3 woods and 9 Irons , 1 putter , 1 bag', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 3);
INSERT INTO `products_description` VALUES (53, 2, 'Brand New complete club set 3 woods and 9 Irons , 1 putter , 1 bag', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (54, 1, 'Brand New complete club set 3 woods and 9 Irons , 1 putter , 1 bag', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (54, 2, 'Brand New complete club set 3 woods and 9 Irons , 1 putter , 1 bag', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (55, 1, 'GWS/CARGOTRANS-Q utility aircraft(GWS-EDP300-Q)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (55, 2, 'GWS/CARGOTRANS-Q utility aircraft(GWS-EDP300-Q)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (56, 1, 'Spot On 50 Acrobatic Aircraft (TW-A249)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (56, 2, 'Spot On 50 Acrobatic Aircraft (TW-A249)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (57, 1, 'SAPAC Shock Flyers Aircraft Empty machine version(SP-A010-1)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (57, 2, 'SAPAC Shock Flyers Aircraft Empty machine version(SP-A010-1)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (58, 1, 'Naruto Sasuke Uchiha Black Men''s Cosplay Costume and Accessories Set', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (58, 2, 'Naruto Sasuke Uchiha Black Men''s Cosplay Costume and Accessories Set', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (59, 1, 'Naruto Sasuke Uchiha Men''s Cosplay Costume and Accessories', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (59, 2, 'Naruto Sasuke Uchiha Men''s Cosplay Costume and Accessories', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (60, 1, 'Naruto Akatsuki Itachi Uchiha Deluxe Men''s Cosplay Costume and Accessories Set', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (60, 2, 'Naruto Akatsuki Itachi Uchiha Deluxe Men''s Cosplay Costume and Accessories Set', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (61, 1, 'Cute Monkey Silicone Case for iPhone 2G/3G (Color Assorted)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 8);
INSERT INTO `products_description` VALUES (61, 2, 'Cute Monkey Silicone Case for iPhone 2G/3G (Color Assorted)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (62, 1, 'Two Sorts Colors Protective Backside Case Cover for iPhone (Black + Red)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 9);
INSERT INTO `products_description` VALUES (62, 2, 'Two Sorts Colors Protective Backside Case Cover for iPhone (Black + Red)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (63, 1, 'Silicone Case for iphone 3G(Black)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (63, 2, 'Silicone Case for iphone 3G(Black)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (64, 1, 'Stylish Protective Resin Backside Case for Apple iPad (Black)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (64, 2, 'Stylish Protective Resin Backside Case for Apple iPad (Black)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (65, 1, 'Protective Hard Plastic Case for Apple 9.7" iPad-6170574', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 2);
INSERT INTO `products_description` VALUES (65, 2, 'Protective Hard Plastic Case for Apple 9.7" iPad-6170574', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (66, 1, 'Stylish Protective Resin Backside Case for Apple iPad (Red)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (66, 2, 'Stylish Protective Resin Backside Case for Apple iPad (Red)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (67, 1, 'Fashion Platinum Long Cubic Zirconia Ring - CZ Ring RCF1-0019 (SZY362)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (67, 2, 'Fashion Platinum Long Cubic Zirconia Ring - CZ Ring RCF1-0019 (SZY362)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (68, 1, 'Nobel Pave Setting Cubic Zirconia Ring - Cubic Zirconia Ring 81012 - 62 (SZY658)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (68, 2, 'Nobel Pave Setting Cubic Zirconia Ring - Cubic Zirconia Ring 81012 - 62 (SZY658)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (69, 1, 'Beautiful 18K Gold Plated CZ Cubic Zirconia Rings (0292-91122-02)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (69, 2, 'Beautiful 18K Gold Plated CZ Cubic Zirconia Rings (0292-91122-02)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (70, 1, 'Wired Mini Spy Camera - Color CMOS Sensor(AF033)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 3);
INSERT INTO `products_description` VALUES (70, 2, 'Wired Mini Spy Camera - Color CMOS Sensor(AF033)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (71, 1, 'Wii Baby / White Vii Sport Game Console/ Remote Controller +18 Games', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 1);
INSERT INTO `products_description` VALUES (71, 2, 'Wii Baby / White Vii Sport Game Console/ Remote Controller +18 Games', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (72, 1, 'W09 Quad band Touch Screen Watch Phone Coffee (SZR703)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (72, 2, 'W09 Quad band Touch Screen Watch Phone Coffee (SZR703)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (73, 1, 'Roof Mounted 13.3 Inch TFT LCD Display Monitor PAL-NTSC (SZC5873)', '<span style="FONT-SIZE: 10pt; FONT-FAMILY: 宋体; mso-hansi-font-family: ''Times New Roman''; mso-bidi-font-family: 宋体; mso-font-kerning: 0pt; mso-ansi-language: ZH-CN">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <o:p></o:p></span>', '', 0);
INSERT INTO `products_description` VALUES (73, 2, 'Roof Mounted 13.3 Inch TFT LCD Display Monitor PAL-NTSC (SZC5873)', '<span style="FONT-SIZE: 10pt; FONT-FAMILY: 宋体; mso-hansi-font-family: ''Times New Roman''; mso-bidi-font-family: 宋体; mso-font-kerning: 0pt; mso-ansi-language: ZH-CN">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <o:p></o:p></span>', '', 0);
INSERT INTO `products_description` VALUES (74, 1, '5.0" Portable HD Touch Screen Car GPS Navigator Built-in 4GB Memory Media Games TF Card (SZC5854)', '<p class="MsoNormal" style="MARGIN: 0cm 0cm 0pt; TEXT-ALIGN: left; mso-layout-grid-align: none" align="left"><span style="FONT-SIZE: 10pt; FONT-FAMILY: 宋体; mso-hansi-font-family: ''Times New Roman''; mso-bidi-font-family: 宋体; mso-font-kerning: 0pt; mso-ansi-language: ZH-CN">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <o:p></o:p></span></p>', '', 0);
INSERT INTO `products_description` VALUES (74, 2, '5.0" Portable HD Touch Screen Car GPS Navigator Built-in 4GB Memory Media Games TF Card (SZC5854)', '<p class="MsoNormal" style="MARGIN: 0cm 0cm 0pt; TEXT-ALIGN: left; mso-layout-grid-align: none" align="left"><span style="FONT-SIZE: 10pt; FONT-FAMILY: 宋体; mso-hansi-font-family: ''Times New Roman''; mso-bidi-font-family: 宋体; mso-font-kerning: 0pt; mso-ansi-language: ZH-CN">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <o:p></o:p></span></p>', '', 0);
INSERT INTO `products_description` VALUES (75, 1, 'Mini Global GSM-GPRS GPS Tracker - Anti-theft - Protection of Child-Elderly-Disabled-Pet(SZC5806)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (75, 2, 'Mini Global GSM-GPRS GPS Tracker - Anti-theft - Protection of Child-Elderly-Disabled-Pet(SZC5806)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (76, 1, 'Free Map Card-5-inch Portable Car GPS Navigator with Bluetooth Function - DT580(SZC5516)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (76, 2, 'Free Map Card-5-inch Portable Car GPS Navigator with Bluetooth Function - DT580(SZC5516)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (77, 1, 'Free Map Card-5" HD Touch Screen GPS Navigator-Bluetooth-Multimedia-Ebook-Photos-Flash-Games-FM-Edog(SZC6004)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (77, 2, 'Free Map Card-5" HD Touch Screen GPS Navigator-Bluetooth-Multimedia-Ebook-Photos-Flash-Games-FM-Edog(SZC6004)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (78, 1, 'Free Map Card-5-inch Portable Car GPS Navigator with Bluetooth Function-DT560(SZC5515)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (78, 2, 'Free Map Card-5-inch Portable Car GPS Navigator with Bluetooth Function-DT560(SZC5515)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (79, 1, 'Free Map Card-4.3" Portable Touch Screen Car GPS Navigator - Bluetooth - Ebook - TF Card (SZC5689)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (79, 2, 'Free Map Card-4.3" Portable Touch Screen Car GPS Navigator - Bluetooth - Ebook - TF Card (SZC5689)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (80, 1, 'Free Map-5" Portable High Definition 4G Car GPS Navigator - Mini Card - 8402 (SZC5574)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (80, 2, 'Free Map-5" Portable High Definition 4G Car GPS Navigator - Mini Card - 8402 (SZC5574)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (81, 1, 'Free Map Card-Ultra-thin Design 5-Inch Portable Car GPS Navigator - D51(SZC5511)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (81, 2, 'Free Map Card-Ultra-thin Design 5-Inch Portable Car GPS Navigator - D51(SZC5511)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (82, 1, 'Free Map Card-6" Portable High Definition Touch Screen Car GPS Navigator - Bluetooth - Ebook - TF Card (SZC5688)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (82, 2, 'Free Map Card-6" Portable High Definition Touch Screen Car GPS Navigator - Bluetooth - Ebook - TF Card (SZC5688)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (83, 1, 'Free Map - 5.0" Portable TFT Touch Screen Car GPS Navigator - Built-in 4GB Memory - Media - Games (SZC5899)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (83, 2, 'Free Map - 5.0" Portable TFT Touch Screen Car GPS Navigator - Built-in 4GB Memory - Media - Games (SZC5899)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (84, 1, '5-inch Portable Car GPS Navigator with Bluetooth function (SZC1091)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (84, 2, '5-inch Portable Car GPS Navigator with Bluetooth function (SZC1091)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (85, 1, '4.8" Portable Car GPS Navigator - SD Card - 819B (SZC5573)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (85, 2, '4.8" Portable Car GPS Navigator - SD Card - 819B (SZC5573)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (86, 1, 'V99 Single Card Quad Band Big Keypad for Daddy with Torch FM MP3 Cell Phone Black (2GB TF Card)(SZ04581413)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (86, 2, 'V99 Single Card Quad Band Big Keypad for Daddy with Torch FM MP3 Cell Phone Black (2GB TF Card)(SZ04581413)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (87, 1, 'T609 JAVA Quad Band TV Function FM Cell Phone (2GB TF Card)(SZ05610002)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (87, 2, 'T609 JAVA Quad Band TV Function FM Cell Phone (2GB TF Card)(SZ05610002)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (88, 1, 'A300 Dual Card Quad Band Ultra Thin Flashlight Cell Phone White (2GB TF Card)(SZMC0051)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (88, 2, 'A300 Dual Card Quad Band Ultra Thin Flashlight Cell Phone White (2GB TF Card)(SZMC0051)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (89, 1, 'C1000 JAVA QWERTY Keypad Dual Card Quad Band Bluetooth Dual Camera FM TV 3.0 Inch Touch Screen Cell Phone Black(SZ05151115)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (89, 2, 'C1000 JAVA QWERTY Keypad Dual Card Quad Band Bluetooth Dual Camera FM TV 3.0 Inch Touch Screen Cell Phone Black(SZ05151115)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (90, 1, 'DVB-T W008E Dual Camera Dual Card Quad Band TV WIFI FM JAVA Touch Screen Cell Phone Black(2GB TF Card)(SZ05610050)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (90, 2, 'DVB-T W008E Dual Camera Dual Card Quad Band TV WIFI FM JAVA Touch Screen Cell Phone Black(2GB TF Card)(SZ05610050)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (91, 1, 'C5i Quad Band Dual Card Dual Battery Bluetooh FM Metal Cover Cell Phone (2GB TF Card)(SZ05151218)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (91, 2, 'C5i Quad Band Dual Card Dual Battery Bluetooh FM Metal Cover Cell Phone (2GB TF Card)(SZ05151218)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (92, 1, 'LY N8+ Quad Band Dual Card TV Dual QWERTY Keypad Bar Cell Phone(SZ05440730)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (92, 2, 'LY N8+ Quad Band Dual Card TV Dual QWERTY Keypad Bar Cell Phone(SZ05440730)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (93, 1, 'DVB-T W008E Dual Camera Dual Card Quad Band TV WIFI FM JAVA Touch Screen Cell Phone Black(2GB TF Card)(SZ05610050)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (93, 2, 'DVB-T W008E Dual Camera Dual Card Quad Band TV WIFI FM JAVA Touch Screen Cell Phone Black(2GB TF Card)(SZ05610050)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (94, 1, 'V99 Single Card Quad Band Big Keypad for Daddy with Torch FM MP3 Cell Phone Black (2GB TF Card)(SZ04581413)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (94, 2, 'V99 Single Card Quad Band Big Keypad for Daddy with Torch FM MP3 Cell Phone Black (2GB TF Card)(SZ04581413)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (95, 1, 'WG6 Dual Card Quad Band TV WIFI JAVA 3.2 Inch Touch Screen Cell Phone(2GB TF Card)(SZ09890011)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (95, 2, 'WG6 Dual Card Quad Band TV WIFI JAVA 3.2 Inch Touch Screen Cell Phone(2GB TF Card)(SZ09890011)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (96, 1, 'BAOXING A100 Dual Card Quad Band TV Function Touch Screen Cell Phone Black(SZRW022)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (96, 2, 'BAOXING A100 Dual Card Quad Band TV Function Touch Screen Cell Phone Black(SZRW022)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (97, 1, 'MFU E10 Quad Band Dual Card TV Function cell phone Black(SZR741)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (97, 2, 'MFU E10 Quad Band Dual Card TV Function cell phone Black(SZR741)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (98, 1, '8820 Tri Band Dual Card Dual Standby Metal Cover Flat Touch Screen Slide Cell Phone Silver(SZ05440347)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (98, 2, '8820 Tri Band Dual Card Dual Standby Metal Cover Flat Touch Screen Slide Cell Phone Silver(SZ05440347)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (99, 1, 'nooc i9+ Quad Band Dual Card Cell Phones Pink Video Call+2GB TF Card(SZSH014)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (99, 2, 'nooc i9+ Quad Band Dual Card Cell Phones Pink Video Call+2GB TF Card(SZSH014)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (100, 1, 'Sports Handsfree Bluetooth Headset(BH-503)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (100, 2, 'Sports Handsfree Bluetooth Headset(BH-503)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (101, 1, '4GB 3.6-inch MP5 /Game MP3 Player With Camera(SZM163)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (101, 2, '4GB 3.6-inch MP5 /Game MP3 Player With Camera(SZM163)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (102, 1, '3.5mm Color Stereo Over-the-Head Headphone/3 Colors Available(SZM662)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (102, 2, '3.5mm Color Stereo Over-the-Head Headphone/3 Colors Available(SZM662)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (103, 1, 'T708 Dual Card Quad Band Metal Cover Flip Cell Phone Pink (2GB TF Card)(SZ04581020)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (103, 2, 'T708 Dual Card Quad Band Metal Cover Flip Cell Phone Pink (2GB TF Card)(SZ04581020)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (104, 1, 'Car Power Socket Charger for PSP (GM020)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (104, 2, 'Car Power Socket Charger for PSP (GM020)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (105, 1, 'Wired Mini Spy Camera - Color CMOS Sensor(AF033)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (105, 2, 'Wired Mini Spy Camera - Color CMOS Sensor(AF033)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (106, 1, 'iMito iM7-Android 2.1 Tablet PC-MID-7"TFT Touch Screen-Telechips TCC8902-800MHZ-256 DDR2-2G-Wifi-Webcam(SMQ5774)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (106, 2, 'iMito iM7-Android 2.1 Tablet PC-MID-7"TFT Touch Screen-Telechips TCC8902-800MHZ-256 DDR2-2G-Wifi-Webcam(SMQ5774)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (107, 1, 'Android 2.1 Tablet PC-aPad-MID-7" TFT Touch Screen-ARM 11-Telechips 8902B-720MHZ-256 DDR2-2G-Wifi-Camera(SMQ5821)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (107, 2, 'Android 2.1 Tablet PC-aPad-MID-7" TFT Touch Screen-ARM 11-Telechips 8902B-720MHZ-256 DDR2-2G-Wifi-Camera(SMQ5821)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (108, 1, 'Netbook with 10.2”TFT / Intel Atom 1.6GHz CPU/1GB/160G HDD', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (108, 2, 'Netbook with 10.2”TFT / Intel Atom 1.6GHz CPU/1GB/160G HDD', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (109, 1, '800 Dpi USB Mini Optical Mouse XWG-M0407 (SMQ109)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (109, 2, '800 Dpi USB Mini Optical Mouse XWG-M0407 (SMQ109)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (110, 1, 'Genuine SanDisk MicroSD/TransFlash SDHC TF Memory Card (8GB / Class 2)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (110, 2, 'Genuine SanDisk MicroSD/TransFlash SDHC TF Memory Card (8GB / Class 2)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (111, 1, 'Memory Stick Pro Duo Memory Card with MS Adapter (8GB)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (111, 2, 'Memory Stick Pro Duo Memory Card with MS Adapter (8GB)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (112, 1, 'Network Retractable Cable', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (112, 2, 'Network Retractable Cable', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (113, 1, 'Digital Entertainer HD Multimedia Player(SMQ5247)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (113, 2, 'Digital Entertainer HD Multimedia Player(SMQ5247)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (114, 1, '27-inch LCD Monitor SAMSUNG P2770H (SMQ4812)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (114, 2, '27-inch LCD Monitor SAMSUNG P2770H (SMQ4812)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (115, 1, 'Layered Ruffles A-line Skirt / Women''s Skirts (FF-8201BE007-0497)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (115, 2, 'Layered Ruffles A-line Skirt / Women''s Skirts (FF-8201BE007-0497)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (116, 1, 'GOSSIP GIRL LEIGHTON MEESTER Style / Sequins Camisole Neckline Dress / Women''s Dresses (FF-1801BF025-0789)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (116, 2, 'GOSSIP GIRL LEIGHTON MEESTER Style / Sequins Camisole Neckline Dress / Women''s Dresses (FF-1801BF025-0789)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (117, 1, 'VANESSA HUDGENS Style / Twisted Weaving Longline Round Neckline Long Sleeves Women''s Sweaters (FF-1001BE009-0751)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (117, 2, 'VANESSA HUDGENS Style / Twisted Weaving Longline Round Neckline Long Sleeves Women''s Sweaters (FF-1001BE009-0751)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (118, 1, 'LINDSAY LOHAN Style / Nails Decoration Dress / Hooded Women''s Dresses (FF-1801BE002-0857)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (118, 2, 'LINDSAY LOHAN Style / Nails Decoration Dress / Hooded Women''s Dresses (FF-1801BE002-0857)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (119, 1, 'FASHION IDOL Style / Long Sleeves Overlapped Gathered Dress / Women''s Dresses (FF-1801BD039-0736)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (119, 2, 'FASHION IDOL Style / Long Sleeves Overlapped Gathered Dress / Women''s Dresses (FF-1801BD039-0736)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (120, 1, 'GOSSIP GIRL BLAKE LIVELY / RUNWAY Style / Gathered Sleeves Deep V Neckline Dress / Women''s Dresses (FF-1801BD045-0736)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (120, 2, 'GOSSIP GIRL BLAKE LIVELY / RUNWAY Style / Gathered Sleeves Deep V Neckline Dress / Women''s Dresses (FF-1801BD045-0736)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (121, 1, 'KIRSTEN DUNST Style / Bat Short Sleeves Round Neckline With Belt Dress / Women''s Dresses (FF-1801BF011-0853)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (121, 2, 'KIRSTEN DUNST Style / Bat Short Sleeves Round Neckline With Belt Dress / Women''s Dresses (FF-1801BF011-0853)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (122, 1, 'GOSSIP GIRL LEIGHTON MEESTER Style / Draped Ruffles Pleated Back Sleeveless Round Neckline Dress / Women''s Dresses (FF-1801BF040-0789)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (122, 2, 'GOSSIP GIRL LEIGHTON MEESTER Style / Draped Ruffles Pleated Back Sleeveless Round Neckline Dress / Women''s Dresses (FF-1801BF040-0789)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (123, 1, 'AIGO 7-inch Digital Picture Frame F5001 Built-in 16MB Flash Memory (IG091)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (123, 2, 'AIGO 7-inch Digital Picture Frame F5001 Built-in 16MB Flash Memory (IG091)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (124, 1, '1.1-inch Digital Picture Frame Key Chain', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (124, 2, '1.1-inch Digital Picture Frame Key Chain', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (125, 1, '14k Gold Lavender 7.5 - 8mm AAAA Freshwater Pearl Earring (DSZZ075)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (125, 2, '14k Gold Lavender 7.5 - 8mm AAAA Freshwater Pearl Earring (DSZZ075)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (126, 1, 'Authentic JuliePrs Fashion Necklaces (J30063)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (126, 2, 'Authentic JuliePrs Fashion Necklaces (J30063)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (127, 1, '14k 6.5 - 7mm AA White Freshwater Pearl Three - Piece Set (16in / 7in) (DSZZ091)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (127, 2, '14k 6.5 - 7mm AA White Freshwater Pearl Three - Piece Set (16in / 7in) (DSZZ091)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (128, 1, 'Multicolor 8.5-9mm A Freshwater Pearl Necklace 16 inch Choker Length (DSZZ016)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (128, 2, 'Multicolor 8.5-9mm A Freshwater Pearl Necklace 16 inch Choker Length (DSZZ016)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (129, 1, '14k Gold Black 7.5 - 8 mm AAAA Freshwater Pearl Earring (DSZZ062)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (129, 2, '14k Gold Black 7.5 - 8 mm AAAA Freshwater Pearl Earring (DSZZ062)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (130, 1, '14k Gold Lavender 9.5-10mm AAA Freshwater Pearl Earring (DSZZ074)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (130, 2, '14k Gold Lavender 9.5-10mm AAA Freshwater Pearl Earring (DSZZ074)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (131, 1, 'Tattoo Sleeves Unisize for Arms or Legs (TS44)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (131, 2, 'Tattoo Sleeves Unisize for Arms or Legs (TS44)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (132, 1, 'Brand New Tattoo Transfer Paper 1 Pcs (DT-A202)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (132, 2, 'Brand New Tattoo Transfer Paper 1 Pcs (DT-A202)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (133, 1, 'Brand New Tattoo Prevent Scar Cream (DT-A201)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (133, 2, 'Brand New Tattoo Prevent Scar Cream (DT-A201)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (134, 1, 'Tattoo Plain Practice Skin(0359-4.20-8)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (134, 2, 'Tattoo Plain Practice Skin(0359-4.20-8)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (135, 1, '12pcs Professional Cosmetic Brush Set (12803253N)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (135, 2, '12pcs Professional Cosmetic Brush Set (12803253N)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (136, 1, 'Professional Mini Makeup Set - 21 Colors Eyeshadows + 2 Colors Blushers + 1 Color Face Powder + 2 Colors Eyebrow+ 4 Colors Lip Gloss(0119-7)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (136, 2, 'Professional Mini Makeup Set - 21 Colors Eyeshadows + 2 Colors Blushers + 1 Color Face Powder + 2 Colors Eyebrow+ 4 Colors Lip Gloss(0119-7)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (137, 1, 'LED Grow Light with Super Harvest Colors (NASA Red and Blue)(0941-CEG619)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (137, 2, 'LED Grow Light with Super Harvest Colors (NASA Red and Blue)(0941-CEG619)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (138, 1, 'Antique Alloy Crystal Swag 6-light Chandelier(0943-MX-6027+6)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (138, 2, 'Antique Alloy Crystal Swag 6-light Chandelier(0943-MX-6027+6)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (139, 1, 'Tiffany-style Red Maple Leaf Bronze Finish Table Lamp(0923-TF15)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (139, 2, 'Tiffany-style Red Maple Leaf Bronze Finish Table Lamp(0923-TF15)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (140, 1, 'Tiffany-style Blue Jewel Table Lamp(0923-T53)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 1);
INSERT INTO `products_description` VALUES (140, 2, 'Tiffany-style Blue Jewel Table Lamp(0923-T53)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (141, 1, 'Crystal 12-light Iron Ceiling Light(0942-98002-C-9)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (141, 2, 'Crystal 12-light Iron Ceiling Light(0942-98002-C-9)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (142, 1, 'Replacement Stereo Earphones for iPhone (3.5mm Jack)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (142, 2, 'Replacement Stereo Earphones for iPhone (3.5mm Jack)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (143, 1, 'Replacement Metal Stylus for Nokia 5800(Color Assorted)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (143, 2, 'Replacement Metal Stylus for Nokia 5800(Color Assorted)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (144, 1, 'Coloured Drawing Protective Bottom Case of Cell Phone', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (144, 2, 'Coloured Drawing Protective Bottom Case of Cell Phone', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (145, 1, 'Silicone Protective Case for iPhone 3G', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (145, 2, 'Silicone Protective Case for iPhone 3G', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (146, 1, 'Ready to Use Simple Camping Grill(0956-06.01-BBQ10)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (146, 2, 'Ready to Use Simple Camping Grill(0956-06.01-BBQ10)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (147, 1, '3 Levels Adjustable Outdoor Portable Camping/BBQ Grill(0956-06.01-BBQ1)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (147, 2, '3 Levels Adjustable Outdoor Portable Camping/BBQ Grill(0956-06.01-BBQ1)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (148, 1, 'Kids Indoor/Outdoor Play Tent(0956-05.31-HW-11)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (148, 2, 'Kids Indoor/Outdoor Play Tent(0956-05.31-HW-11)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (149, 1, 'Bleach Matsumoto Rangiku Women''s Cosplay Costume', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (149, 2, 'Bleach Matsumoto Rangiku Women''s Cosplay Costume', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (150, 1, 'Bleach Rukia Kuchiki Women''s Cosplay Costume', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (150, 2, 'Bleach Rukia Kuchiki Women''s Cosplay Costume', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. <br />\r\n</font>', '', 0);
INSERT INTO `products_description` VALUES (151, 1, '2010 style Ball Gown V-neck Long Sleeves Royal Length Train Satin Wedding Dress (WSM0532)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);
INSERT INTO `products_description` VALUES (151, 2, '2010 style Ball Gown V-neck Long Sleeves Royal Length Train Satin Wedding Dress (WSM0532)', '<font face="Arial">Wholesale cell phones and cell phone accessories. We offer brand name cell phones, cheap cell phones, and much more! Buy wholesale cell phones from us today for a better deal. </font>', '', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_discount_quantity`
-- 

CREATE TABLE `products_discount_quantity` (
  `discount_id` int(4) NOT NULL default '0',
  `products_id` int(11) NOT NULL default '0',
  `discount_qty` float NOT NULL default '0',
  `discount_price` decimal(15,4) NOT NULL default '0.0000',
  KEY `idx_id_qty_zen` (`products_id`,`discount_qty`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `products_discount_quantity`
-- 

INSERT INTO `products_discount_quantity` VALUES (1, 61, 0, 0.0000);
INSERT INTO `products_discount_quantity` VALUES (2, 61, 0, 0.0000);
INSERT INTO `products_discount_quantity` VALUES (3, 61, 0, 0.0000);
INSERT INTO `products_discount_quantity` VALUES (4, 61, 0, 0.0000);
INSERT INTO `products_discount_quantity` VALUES (5, 61, 0, 0.0000);
INSERT INTO `products_discount_quantity` VALUES (5, 53, 70, 8.0000);
INSERT INTO `products_discount_quantity` VALUES (4, 53, 60, 7.0000);
INSERT INTO `products_discount_quantity` VALUES (3, 53, 50, 6.0000);
INSERT INTO `products_discount_quantity` VALUES (2, 53, 40, 5.0000);
INSERT INTO `products_discount_quantity` VALUES (1, 53, 30, 4.0000);
INSERT INTO `products_discount_quantity` VALUES (5, 12, 60, 5.0000);
INSERT INTO `products_discount_quantity` VALUES (4, 12, 50, 4.0000);
INSERT INTO `products_discount_quantity` VALUES (3, 12, 40, 3.0000);
INSERT INTO `products_discount_quantity` VALUES (2, 12, 30, 2.0000);
INSERT INTO `products_discount_quantity` VALUES (1, 12, 20, 1.0000);
INSERT INTO `products_discount_quantity` VALUES (5, 21, 80, 5.0000);
INSERT INTO `products_discount_quantity` VALUES (4, 21, 60, 4.0000);
INSERT INTO `products_discount_quantity` VALUES (3, 21, 50, 3.0000);
INSERT INTO `products_discount_quantity` VALUES (2, 21, 30, 2.0000);
INSERT INTO `products_discount_quantity` VALUES (1, 21, 10, 1.0000);
INSERT INTO `products_discount_quantity` VALUES (5, 15, 50, 5.0000);
INSERT INTO `products_discount_quantity` VALUES (4, 15, 40, 4.0000);
INSERT INTO `products_discount_quantity` VALUES (3, 15, 30, 3.0000);
INSERT INTO `products_discount_quantity` VALUES (2, 15, 20, 2.0000);
INSERT INTO `products_discount_quantity` VALUES (1, 15, 10, 1.0000);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_keyword`
-- 

CREATE TABLE `products_keyword` (
  `products_keyword_id` int(11) NOT NULL auto_increment,
  `products_keyword_title` varchar(255) default NULL,
  `products_keyword_date` datetime NOT NULL,
  `products_keyword_hits` int(11) NOT NULL default '1',
  `products_keyword_ip` varchar(30) NOT NULL,
  PRIMARY KEY  (`products_keyword_id`),
  UNIQUE KEY `product_keyword_id` (`products_keyword_id`),
  KEY `product_keyword_id_2` (`products_keyword_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `products_keyword`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `products_notifications`
-- 

CREATE TABLE `products_notifications` (
  `products_id` int(11) NOT NULL default '0',
  `customers_id` int(11) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`products_id`,`customers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `products_notifications`
-- 

INSERT INTO `products_notifications` VALUES (50, 1, '2010-11-01 16:32:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `products_options`
-- 

CREATE TABLE `products_options` (
  `products_options_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `products_options_name` varchar(32) NOT NULL default '',
  `products_options_sort_order` int(11) NOT NULL default '0',
  `products_options_type` int(5) NOT NULL default '0',
  `products_options_length` smallint(2) NOT NULL default '32',
  `products_options_comment` varchar(64) default NULL,
  `products_options_size` smallint(2) NOT NULL default '32',
  `products_options_images_per_row` int(2) default '5',
  `products_options_images_style` int(1) default '0',
  `products_options_rows` smallint(2) NOT NULL default '1',
  PRIMARY KEY  (`products_options_id`,`language_id`),
  KEY `idx_lang_id_zen` (`language_id`),
  KEY `idx_products_options_sort_order_zen` (`products_options_sort_order`),
  KEY `idx_products_options_name_zen` (`products_options_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `products_options`
-- 

INSERT INTO `products_options` VALUES (2, 2, '2', 2, 0, 32, NULL, 32, 0, 0, 0);
INSERT INTO `products_options` VALUES (2, 1, 'size', 2, 0, 32, NULL, 32, 0, 0, 0);
INSERT INTO `products_options` VALUES (1, 2, '颜色', 1, 0, 32, NULL, 32, 0, 0, 0);
INSERT INTO `products_options` VALUES (1, 1, 'colour', 1, 0, 32, NULL, 32, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_options_types`
-- 

CREATE TABLE `products_options_types` (
  `products_options_types_id` int(11) NOT NULL default '0',
  `products_options_types_name` varchar(32) default NULL,
  PRIMARY KEY  (`products_options_types_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Track products_options_types';

-- 
-- 导出表中的数据 `products_options_types`
-- 

INSERT INTO `products_options_types` VALUES (0, 'Dropdown');
INSERT INTO `products_options_types` VALUES (1, 'Text');
INSERT INTO `products_options_types` VALUES (2, 'Radio');
INSERT INTO `products_options_types` VALUES (3, 'Checkbox');
INSERT INTO `products_options_types` VALUES (4, 'File');
INSERT INTO `products_options_types` VALUES (5, 'Read Only');

-- --------------------------------------------------------

-- 
-- 表的结构 `products_options_values`
-- 

CREATE TABLE `products_options_values` (
  `products_options_values_id` int(11) NOT NULL default '0',
  `language_id` int(11) NOT NULL default '1',
  `products_options_values_name` varchar(64) NOT NULL,
  `products_options_values_sort_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_options_values_id`,`language_id`),
  KEY `idx_products_options_values_name_zen` (`products_options_values_name`),
  KEY `idx_products_options_values_sort_order_zen` (`products_options_values_sort_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `products_options_values`
-- 

INSERT INTO `products_options_values` VALUES (1, 2, '白色', 2);
INSERT INTO `products_options_values` VALUES (1, 1, 'white', 2);
INSERT INTO `products_options_values` VALUES (2, 1, 'red', 3);
INSERT INTO `products_options_values` VALUES (2, 2, '红色', 3);
INSERT INTO `products_options_values` VALUES (3, 1, 'blue', 4);
INSERT INTO `products_options_values` VALUES (3, 2, '蓝色', 4);
INSERT INTO `products_options_values` VALUES (4, 1, 'black', 0);
INSERT INTO `products_options_values` VALUES (4, 2, '黑色', 0);
INSERT INTO `products_options_values` VALUES (7, 2, '小码', 0);
INSERT INTO `products_options_values` VALUES (7, 1, 'SMALL', 0);
INSERT INTO `products_options_values` VALUES (6, 1, 'LARGE', 0);
INSERT INTO `products_options_values` VALUES (6, 2, '大码', 0);
INSERT INTO `products_options_values` VALUES (8, 1, 'MEDIUM', 5);
INSERT INTO `products_options_values` VALUES (8, 2, '中码', 5);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_options_values_to_products_options`
-- 

CREATE TABLE `products_options_values_to_products_options` (
  `products_options_values_to_products_options_id` int(11) NOT NULL auto_increment,
  `products_options_id` int(11) NOT NULL default '0',
  `products_options_values_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_options_values_to_products_options_id`),
  KEY `idx_products_options_id_zen` (`products_options_id`),
  KEY `idx_products_options_values_id_zen` (`products_options_values_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `products_options_values_to_products_options`
-- 

INSERT INTO `products_options_values_to_products_options` VALUES (2, 1, 1);
INSERT INTO `products_options_values_to_products_options` VALUES (3, 1, 2);
INSERT INTO `products_options_values_to_products_options` VALUES (4, 1, 3);
INSERT INTO `products_options_values_to_products_options` VALUES (5, 1, 4);
INSERT INTO `products_options_values_to_products_options` VALUES (8, 2, 7);
INSERT INTO `products_options_values_to_products_options` VALUES (7, 2, 6);
INSERT INTO `products_options_values_to_products_options` VALUES (9, 2, 8);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_to_categories`
-- 

CREATE TABLE `products_to_categories` (
  `products_id` int(11) NOT NULL default '0',
  `categories_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_id`,`categories_id`),
  KEY `idx_cat_prod_id_zen` (`categories_id`,`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `products_to_categories`
-- 

INSERT INTO `products_to_categories` VALUES (2, 16);
INSERT INTO `products_to_categories` VALUES (3, 16);
INSERT INTO `products_to_categories` VALUES (4, 16);
INSERT INTO `products_to_categories` VALUES (5, 17);
INSERT INTO `products_to_categories` VALUES (6, 17);
INSERT INTO `products_to_categories` VALUES (7, 18);
INSERT INTO `products_to_categories` VALUES (8, 18);
INSERT INTO `products_to_categories` VALUES (9, 18);
INSERT INTO `products_to_categories` VALUES (10, 19);
INSERT INTO `products_to_categories` VALUES (11, 19);
INSERT INTO `products_to_categories` VALUES (12, 19);
INSERT INTO `products_to_categories` VALUES (15, 20);
INSERT INTO `products_to_categories` VALUES (16, 20);
INSERT INTO `products_to_categories` VALUES (17, 20);
INSERT INTO `products_to_categories` VALUES (18, 20);
INSERT INTO `products_to_categories` VALUES (19, 21);
INSERT INTO `products_to_categories` VALUES (20, 21);
INSERT INTO `products_to_categories` VALUES (21, 23);
INSERT INTO `products_to_categories` VALUES (22, 23);
INSERT INTO `products_to_categories` VALUES (23, 23);
INSERT INTO `products_to_categories` VALUES (24, 22);
INSERT INTO `products_to_categories` VALUES (25, 22);
INSERT INTO `products_to_categories` VALUES (26, 22);
INSERT INTO `products_to_categories` VALUES (27, 25);
INSERT INTO `products_to_categories` VALUES (28, 25);
INSERT INTO `products_to_categories` VALUES (29, 25);
INSERT INTO `products_to_categories` VALUES (30, 24);
INSERT INTO `products_to_categories` VALUES (31, 24);
INSERT INTO `products_to_categories` VALUES (32, 27);
INSERT INTO `products_to_categories` VALUES (33, 27);
INSERT INTO `products_to_categories` VALUES (34, 26);
INSERT INTO `products_to_categories` VALUES (35, 26);
INSERT INTO `products_to_categories` VALUES (36, 26);
INSERT INTO `products_to_categories` VALUES (37, 28);
INSERT INTO `products_to_categories` VALUES (38, 28);
INSERT INTO `products_to_categories` VALUES (39, 28);
INSERT INTO `products_to_categories` VALUES (40, 29);
INSERT INTO `products_to_categories` VALUES (41, 29);
INSERT INTO `products_to_categories` VALUES (42, 29);
INSERT INTO `products_to_categories` VALUES (43, 31);
INSERT INTO `products_to_categories` VALUES (44, 31);
INSERT INTO `products_to_categories` VALUES (45, 31);
INSERT INTO `products_to_categories` VALUES (46, 30);
INSERT INTO `products_to_categories` VALUES (47, 30);
INSERT INTO `products_to_categories` VALUES (48, 30);
INSERT INTO `products_to_categories` VALUES (49, 32);
INSERT INTO `products_to_categories` VALUES (50, 32);
INSERT INTO `products_to_categories` VALUES (51, 32);
INSERT INTO `products_to_categories` VALUES (52, 33);
INSERT INTO `products_to_categories` VALUES (53, 33);
INSERT INTO `products_to_categories` VALUES (54, 33);
INSERT INTO `products_to_categories` VALUES (55, 35);
INSERT INTO `products_to_categories` VALUES (56, 35);
INSERT INTO `products_to_categories` VALUES (57, 35);
INSERT INTO `products_to_categories` VALUES (58, 34);
INSERT INTO `products_to_categories` VALUES (59, 34);
INSERT INTO `products_to_categories` VALUES (60, 34);
INSERT INTO `products_to_categories` VALUES (61, 37);
INSERT INTO `products_to_categories` VALUES (62, 37);
INSERT INTO `products_to_categories` VALUES (63, 37);
INSERT INTO `products_to_categories` VALUES (64, 36);
INSERT INTO `products_to_categories` VALUES (65, 36);
INSERT INTO `products_to_categories` VALUES (66, 36);
INSERT INTO `products_to_categories` VALUES (67, 38);
INSERT INTO `products_to_categories` VALUES (68, 38);
INSERT INTO `products_to_categories` VALUES (69, 38);
INSERT INTO `products_to_categories` VALUES (70, 39);
INSERT INTO `products_to_categories` VALUES (71, 39);
INSERT INTO `products_to_categories` VALUES (72, 39);
INSERT INTO `products_to_categories` VALUES (73, 24);
INSERT INTO `products_to_categories` VALUES (74, 25);
INSERT INTO `products_to_categories` VALUES (75, 25);
INSERT INTO `products_to_categories` VALUES (76, 25);
INSERT INTO `products_to_categories` VALUES (77, 25);
INSERT INTO `products_to_categories` VALUES (78, 25);
INSERT INTO `products_to_categories` VALUES (79, 25);
INSERT INTO `products_to_categories` VALUES (80, 25);
INSERT INTO `products_to_categories` VALUES (81, 25);
INSERT INTO `products_to_categories` VALUES (82, 25);
INSERT INTO `products_to_categories` VALUES (83, 25);
INSERT INTO `products_to_categories` VALUES (84, 25);
INSERT INTO `products_to_categories` VALUES (85, 25);
INSERT INTO `products_to_categories` VALUES (86, 20);
INSERT INTO `products_to_categories` VALUES (87, 20);
INSERT INTO `products_to_categories` VALUES (88, 20);
INSERT INTO `products_to_categories` VALUES (89, 20);
INSERT INTO `products_to_categories` VALUES (90, 20);
INSERT INTO `products_to_categories` VALUES (91, 20);
INSERT INTO `products_to_categories` VALUES (92, 20);
INSERT INTO `products_to_categories` VALUES (93, 20);
INSERT INTO `products_to_categories` VALUES (94, 20);
INSERT INTO `products_to_categories` VALUES (95, 20);
INSERT INTO `products_to_categories` VALUES (96, 39);
INSERT INTO `products_to_categories` VALUES (97, 39);
INSERT INTO `products_to_categories` VALUES (98, 39);
INSERT INTO `products_to_categories` VALUES (99, 39);
INSERT INTO `products_to_categories` VALUES (100, 39);
INSERT INTO `products_to_categories` VALUES (101, 39);
INSERT INTO `products_to_categories` VALUES (102, 39);
INSERT INTO `products_to_categories` VALUES (103, 39);
INSERT INTO `products_to_categories` VALUES (104, 39);
INSERT INTO `products_to_categories` VALUES (105, 39);
INSERT INTO `products_to_categories` VALUES (106, 22);
INSERT INTO `products_to_categories` VALUES (107, 22);
INSERT INTO `products_to_categories` VALUES (108, 22);
INSERT INTO `products_to_categories` VALUES (109, 22);
INSERT INTO `products_to_categories` VALUES (110, 22);
INSERT INTO `products_to_categories` VALUES (111, 22);
INSERT INTO `products_to_categories` VALUES (112, 22);
INSERT INTO `products_to_categories` VALUES (113, 22);
INSERT INTO `products_to_categories` VALUES (114, 22);
INSERT INTO `products_to_categories` VALUES (115, 19);
INSERT INTO `products_to_categories` VALUES (116, 19);
INSERT INTO `products_to_categories` VALUES (117, 19);
INSERT INTO `products_to_categories` VALUES (118, 19);
INSERT INTO `products_to_categories` VALUES (119, 19);
INSERT INTO `products_to_categories` VALUES (120, 19);
INSERT INTO `products_to_categories` VALUES (121, 19);
INSERT INTO `products_to_categories` VALUES (122, 19);
INSERT INTO `products_to_categories` VALUES (123, 27);
INSERT INTO `products_to_categories` VALUES (124, 27);
INSERT INTO `products_to_categories` VALUES (125, 27);
INSERT INTO `products_to_categories` VALUES (126, 27);
INSERT INTO `products_to_categories` VALUES (127, 27);
INSERT INTO `products_to_categories` VALUES (128, 27);
INSERT INTO `products_to_categories` VALUES (129, 27);
INSERT INTO `products_to_categories` VALUES (130, 27);
INSERT INTO `products_to_categories` VALUES (131, 28);
INSERT INTO `products_to_categories` VALUES (132, 28);
INSERT INTO `products_to_categories` VALUES (133, 28);
INSERT INTO `products_to_categories` VALUES (134, 28);
INSERT INTO `products_to_categories` VALUES (135, 28);
INSERT INTO `products_to_categories` VALUES (136, 28);
INSERT INTO `products_to_categories` VALUES (137, 30);
INSERT INTO `products_to_categories` VALUES (138, 30);
INSERT INTO `products_to_categories` VALUES (139, 30);
INSERT INTO `products_to_categories` VALUES (140, 30);
INSERT INTO `products_to_categories` VALUES (141, 30);
INSERT INTO `products_to_categories` VALUES (142, 37);
INSERT INTO `products_to_categories` VALUES (143, 37);
INSERT INTO `products_to_categories` VALUES (144, 37);
INSERT INTO `products_to_categories` VALUES (145, 37);
INSERT INTO `products_to_categories` VALUES (146, 32);
INSERT INTO `products_to_categories` VALUES (147, 32);
INSERT INTO `products_to_categories` VALUES (148, 32);
INSERT INTO `products_to_categories` VALUES (149, 35);
INSERT INTO `products_to_categories` VALUES (150, 35);
INSERT INTO `products_to_categories` VALUES (151, 16);

-- --------------------------------------------------------

-- 
-- 表的结构 `products_xsell`
-- 

CREATE TABLE `products_xsell` (
  `ID` int(10) NOT NULL auto_increment,
  `products_id` int(10) unsigned NOT NULL default '1',
  `xsell_id` int(10) unsigned NOT NULL default '1',
  `sort_order` int(10) unsigned NOT NULL default '1',
  PRIMARY KEY  (`ID`),
  KEY `idx_products_id_xsell` (`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `products_xsell`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `product_music_extra`
-- 

CREATE TABLE `product_music_extra` (
  `products_id` int(11) NOT NULL default '0',
  `artists_id` int(11) NOT NULL default '0',
  `record_company_id` int(11) NOT NULL default '0',
  `music_genre_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`products_id`),
  KEY `idx_music_genre_id_zen` (`music_genre_id`),
  KEY `idx_artists_id_zen` (`artists_id`),
  KEY `idx_record_company_id_zen` (`record_company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `product_music_extra`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `product_types`
-- 

CREATE TABLE `product_types` (
  `type_id` int(11) NOT NULL auto_increment,
  `type_name` varchar(255) NOT NULL default '',
  `type_handler` varchar(255) NOT NULL default '',
  `type_master_type` int(11) NOT NULL default '1',
  `allow_add_to_cart` char(1) NOT NULL default 'Y',
  `default_image` varchar(255) NOT NULL default '',
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `last_modified` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`type_id`),
  KEY `idx_type_master_type_zen` (`type_master_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `product_types`
-- 

INSERT INTO `product_types` VALUES (1, 'Product - General', 'product', 1, 'Y', '', '2008-07-20 12:06:20', '2008-07-20 12:06:20');
INSERT INTO `product_types` VALUES (2, 'Product - Music', 'product_music', 1, 'Y', '', '2008-07-20 12:06:20', '2008-07-20 12:06:20');
INSERT INTO `product_types` VALUES (3, 'Document - General', 'document_general', 3, 'N', '', '2008-07-20 12:06:20', '2008-07-20 12:06:20');
INSERT INTO `product_types` VALUES (4, 'Document - Product', 'document_product', 3, 'N', '', '2008-07-20 12:06:20', '2008-07-30 16:09:12');
INSERT INTO `product_types` VALUES (5, 'Product - Free Shipping', 'product_free_shipping', 1, 'Y', '', '2008-07-20 12:06:20', '2008-07-20 12:06:20');

-- --------------------------------------------------------

-- 
-- 表的结构 `product_types_to_category`
-- 

CREATE TABLE `product_types_to_category` (
  `product_type_id` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL default '0',
  KEY `idx_category_id_zen` (`category_id`),
  KEY `idx_product_type_id_zen` (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `product_types_to_category`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `product_type_layout`
-- 

CREATE TABLE `product_type_layout` (
  `configuration_id` int(11) NOT NULL auto_increment,
  `configuration_title` text NOT NULL,
  `configuration_key` varchar(255) NOT NULL default '',
  `configuration_value` text NOT NULL,
  `configuration_description` text NOT NULL,
  `product_type_id` int(11) NOT NULL default '0',
  `sort_order` int(5) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  `use_function` text,
  `set_function` text,
  PRIMARY KEY  (`configuration_id`),
  UNIQUE KEY `unq_config_key_zen` (`configuration_key`),
  KEY `idx_key_value_zen` (`configuration_key`,`configuration_value`(10)),
  KEY `idx_type_id_sort_order_zen` (`product_type_id`,`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

-- 
-- 导出表中的数据 `product_type_layout`
-- 

INSERT INTO `product_type_layout` VALUES (1, 'Show Model Number', 'SHOW_PRODUCT_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 1, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (2, 'Show Weight', 'SHOW_PRODUCT_INFO_WEIGHT', '1', 'Display Weight on Product Info 0= off 1= on', 1, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (3, 'Show Attribute Weight', 'SHOW_PRODUCT_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 1, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (4, 'Show Manufacturer', 'SHOW_PRODUCT_INFO_MANUFACTURER', '1', 'Display Manufacturer Name on Product Info 0= off 1= on', 1, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (5, 'Show Quantity in Shopping Cart', 'SHOW_PRODUCT_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 1, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (6, 'Show Quantity in Stock', 'SHOW_PRODUCT_INFO_QUANTITY', '1', 'Display Quantity in Stock on Product Info 0= off 1= on', 1, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (7, 'Show Product Reviews Count', 'SHOW_PRODUCT_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 1, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (8, 'Show Product Reviews Button', 'SHOW_PRODUCT_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 1, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (9, 'Show Date Available', 'SHOW_PRODUCT_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 1, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (10, 'Show Date Added', 'SHOW_PRODUCT_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 1, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (11, 'Show Product URL', 'SHOW_PRODUCT_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 1, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (12, 'Show Product Additional Images', 'SHOW_PRODUCT_INFO_ADDITIONAL_IMAGES', '1', 'Display Additional Images on Product Info 0= off 1= on', 1, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (13, 'Show Starting At text on Price', 'SHOW_PRODUCT_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 1, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (14, 'Show Product Tell a Friend button', 'SHOW_PRODUCT_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 1, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (15, 'Product Free Shipping Image Status - Catalog', 'SHOW_PRODUCT_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '0', 'Show the Free Shipping image/text in the catalog?', 1, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (16, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_PRODUCT_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 1, 100, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', '');
INSERT INTO `product_type_layout` VALUES (17, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_PRODUCT_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 1, 101, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (18, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_PRODUCT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '0', 'What should the Default Free Shipping status be when adding new products?<br />Yes, Always Free Shipping ON<br />No, Always Free Shipping OFF<br />Special, Product/Download Requires Shipping', 1, 102, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes, Always ON''), array(''id''=>''0'', ''text''=>''No, Always OFF''), array(''id''=>''2'', ''text''=>''Special'')), ');
INSERT INTO `product_type_layout` VALUES (19, 'Show Model Number', 'SHOW_PRODUCT_MUSIC_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 2, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (20, 'Show Weight', 'SHOW_PRODUCT_MUSIC_INFO_WEIGHT', '0', 'Display Weight on Product Info 0= off 1= on', 2, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (21, 'Show Attribute Weight', 'SHOW_PRODUCT_MUSIC_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 2, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (22, 'Show Artist', 'SHOW_PRODUCT_MUSIC_INFO_ARTIST', '1', 'Display Artists Name on Product Info 0= off 1= on', 2, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (23, 'Show Music Genre', 'SHOW_PRODUCT_MUSIC_INFO_GENRE', '1', 'Display Music Genre on Product Info 0= off 1= on', 2, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (24, 'Show Record Company', 'SHOW_PRODUCT_MUSIC_INFO_RECORD_COMPANY', '1', 'Display Record Company on Product Info 0= off 1= on', 2, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (25, 'Show Quantity in Shopping Cart', 'SHOW_PRODUCT_MUSIC_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 2, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (26, 'Show Quantity in Stock', 'SHOW_PRODUCT_MUSIC_INFO_QUANTITY', '0', 'Display Quantity in Stock on Product Info 0= off 1= on', 2, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (27, 'Show Product Reviews Count', 'SHOW_PRODUCT_MUSIC_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 2, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (28, 'Show Product Reviews Button', 'SHOW_PRODUCT_MUSIC_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 2, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (29, 'Show Date Available', 'SHOW_PRODUCT_MUSIC_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 2, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (30, 'Show Date Added', 'SHOW_PRODUCT_MUSIC_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 2, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (31, 'Show Starting At text on Price', 'SHOW_PRODUCT_MUSIC_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 2, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (32, 'Show Product Additional Images', 'SHOW_PRODUCT_MUSIC_INFO_ADDITIONAL_IMAGES', '1', 'Display Additional Images on Product Info 0= off 1= on', 2, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (33, 'Show Product Tell a Friend button', 'SHOW_PRODUCT_MUSIC_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 2, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (34, 'Product Free Shipping Image Status - Catalog', 'SHOW_PRODUCT_MUSIC_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '0', 'Show the Free Shipping image/text in the catalog?', 2, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (35, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_PRODUCT_MUSIC_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 2, 100, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', '');
INSERT INTO `product_type_layout` VALUES (36, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 2, 101, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (37, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '0', 'What should the Default Free Shipping status be when adding new products?<br />Yes, Always Free Shipping ON<br />No, Always Free Shipping OFF<br />Special, Product/Download Requires Shipping', 2, 102, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes, Always ON''), array(''id''=>''0'', ''text''=>''No, Always OFF''), array(''id''=>''2'', ''text''=>''Special'')), ');
INSERT INTO `product_type_layout` VALUES (38, 'Show Product Reviews Count', 'SHOW_DOCUMENT_GENERAL_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 3, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (39, 'Show Product Reviews Button', 'SHOW_DOCUMENT_GENERAL_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 3, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (40, 'Show Date Available', 'SHOW_DOCUMENT_GENERAL_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 3, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (41, 'Show Date Added', 'SHOW_DOCUMENT_GENERAL_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 3, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:20', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (42, 'Show Product Tell a Friend button', 'SHOW_DOCUMENT_GENERAL_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 3, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (43, 'Show Product URL', 'SHOW_DOCUMENT_GENERAL_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 3, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (44, 'Show Product Additional Images', 'SHOW_DOCUMENT_GENERAL_INFO_ADDITIONAL_IMAGES', '1', 'Display Additional Images on Product Info 0= off 1= on', 3, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (45, 'Show Model Number', 'SHOW_DOCUMENT_PRODUCT_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 4, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (46, 'Show Weight', 'SHOW_DOCUMENT_PRODUCT_INFO_WEIGHT', '0', 'Display Weight on Product Info 0= off 1= on', 4, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (47, 'Show Attribute Weight', 'SHOW_DOCUMENT_PRODUCT_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 4, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (48, 'Show Manufacturer', 'SHOW_DOCUMENT_PRODUCT_INFO_MANUFACTURER', '1', 'Display Manufacturer Name on Product Info 0= off 1= on', 4, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (49, 'Show Quantity in Shopping Cart', 'SHOW_DOCUMENT_PRODUCT_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 4, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (50, 'Show Quantity in Stock', 'SHOW_DOCUMENT_PRODUCT_INFO_QUANTITY', '0', 'Display Quantity in Stock on Product Info 0= off 1= on', 4, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (51, 'Show Product Reviews Count', 'SHOW_DOCUMENT_PRODUCT_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 4, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (52, 'Show Product Reviews Button', 'SHOW_DOCUMENT_PRODUCT_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 4, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (53, 'Show Date Available', 'SHOW_DOCUMENT_PRODUCT_INFO_DATE_AVAILABLE', '1', 'Display Date Available on Product Info 0= off 1= on', 4, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (54, 'Show Date Added', 'SHOW_DOCUMENT_PRODUCT_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 4, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (55, 'Show Product URL', 'SHOW_DOCUMENT_PRODUCT_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 4, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (56, 'Show Product Additional Images', 'SHOW_DOCUMENT_PRODUCT_INFO_ADDITIONAL_IMAGES', '1', 'Display Additional Images on Product Info 0= off 1= on', 4, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (57, 'Show Starting At text on Price', 'SHOW_DOCUMENT_PRODUCT_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 4, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (58, 'Show Product Tell a Friend button', 'SHOW_DOCUMENT_PRODUCT_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 4, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (59, 'Product Free Shipping Image Status - Catalog', 'SHOW_DOCUMENT_PRODUCT_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '0', 'Show the Free Shipping image/text in the catalog?', 4, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (60, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_DOCUMENT_PRODUCT_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 4, 100, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', '');
INSERT INTO `product_type_layout` VALUES (61, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 4, 101, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (62, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '0', 'What should the Default Free Shipping status be when adding new products?<br />Yes, Always Free Shipping ON<br />No, Always Free Shipping OFF<br />Special, Product/Download Requires Shipping', 4, 102, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes, Always ON''), array(''id''=>''0'', ''text''=>''No, Always OFF''), array(''id''=>''2'', ''text''=>''Special'')), ');
INSERT INTO `product_type_layout` VALUES (63, 'Show Model Number', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_MODEL', '1', 'Display Model Number on Product Info 0= off 1= on', 5, 1, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (64, 'Show Weight', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_WEIGHT', '0', 'Display Weight on Product Info 0= off 1= on', 5, 2, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (65, 'Show Attribute Weight', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_WEIGHT_ATTRIBUTES', '1', 'Display Attribute Weight on Product Info 0= off 1= on', 5, 3, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (66, 'Show Manufacturer', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_MANUFACTURER', '1', 'Display Manufacturer Name on Product Info 0= off 1= on', 5, 4, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (67, 'Show Quantity in Shopping Cart', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_IN_CART_QTY', '1', 'Display Quantity in Current Shopping Cart on Product Info 0= off 1= on', 5, 5, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (68, 'Show Quantity in Stock', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_QUANTITY', '1', 'Display Quantity in Stock on Product Info 0= off 1= on', 5, 6, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (69, 'Show Product Reviews Count', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_REVIEWS_COUNT', '1', 'Display Product Reviews Count on Product Info 0= off 1= on', 5, 7, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (70, 'Show Product Reviews Button', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_REVIEWS', '1', 'Display Product Reviews Button on Product Info 0= off 1= on', 5, 8, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (71, 'Show Date Available', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_DATE_AVAILABLE', '0', 'Display Date Available on Product Info 0= off 1= on', 5, 9, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (72, 'Show Date Added', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_DATE_ADDED', '1', 'Display Date Added on Product Info 0= off 1= on', 5, 10, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (73, 'Show Product URL', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_URL', '1', 'Display URL on Product Info 0= off 1= on', 5, 11, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (74, 'Show Product Additional Images', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_ADDITIONAL_IMAGES', '1', 'Display Additional Images on Product Info 0= off 1= on', 5, 13, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (75, 'Show Starting At text on Price', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_STARTING_AT', '1', 'Display Starting At text on products with attributes Product Info 0= off 1= on', 5, 12, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (76, 'Show Product Tell a Friend button', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_TELL_A_FRIEND', '1', 'Display the Tell a Friend button on Product Info<br /><br />Note: Turning this setting off does not affect the Tell a Friend box in the columns and turning off the Tell a Friend box does not affect the button<br />0= off 1= on', 5, 15, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (77, 'Product Free Shipping Image Status - Catalog', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_ALWAYS_FREE_SHIPPING_IMAGE_SWITCH', '1', 'Show the Free Shipping image/text in the catalog?', 5, 16, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (78, 'Product Price Tax Class Default - When adding new products?', 'DEFAULT_PRODUCT_FREE_SHIPPING_TAX_CLASS_ID', '0', 'What should the Product Price Tax Class Default ID be when adding new products?', 5, 100, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', '');
INSERT INTO `product_type_layout` VALUES (79, 'Product Virtual Default Status - Skip Shipping Address - When adding new products?', 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_VIRTUAL', '0', 'Default Virtual Product status to be ON when adding new products?', 5, 101, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (80, 'Product Free Shipping Default Status - Normal Shipping Rules - When adding new products?', 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_IS_ALWAYS_FREE_SHIPPING', '1', 'What should the Default Free Shipping status be when adding new products?<br />Yes, Always Free Shipping ON<br />No, Always Free Shipping OFF<br />Special, Product/Download Requires Shipping', 5, 102, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes, Always ON''), array(''id''=>''0'', ''text''=>''No, Always OFF''), array(''id''=>''2'', ''text''=>''Special'')), ');
INSERT INTO `product_type_layout` VALUES (81, 'Show Metatags Title Default - Product Title', 'SHOW_PRODUCT_INFO_METATAGS_TITLE_STATUS', '1', 'Display Product Title in Meta Tags Title 0= off 1= on', 1, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (82, 'Show Metatags Title Default - Product Name', 'SHOW_PRODUCT_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Product Name in Meta Tags Title 0= off 1= on', 1, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (83, 'Show Metatags Title Default - Product Model', 'SHOW_PRODUCT_INFO_METATAGS_MODEL_STATUS', '1', 'Display Product Model in Meta Tags Title 0= off 1= on', 1, 52, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (84, 'Show Metatags Title Default - Product Price', 'SHOW_PRODUCT_INFO_METATAGS_PRICE_STATUS', '1', 'Display Product Price in Meta Tags Title 0= off 1= on', 1, 53, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (85, 'Show Metatags Title Default - Product Tagline', 'SHOW_PRODUCT_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Product Tagline in Meta Tags Title 0= off 1= on', 1, 54, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (86, 'Show Metatags Title Default - Product Title', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_TITLE_STATUS', '1', 'Display Product Title in Meta Tags Title 0= off 1= on', 2, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (87, 'Show Metatags Title Default - Product Name', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Product Name in Meta Tags Title 0= off 1= on', 2, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (88, 'Show Metatags Title Default - Product Model', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_MODEL_STATUS', '1', 'Display Product Model in Meta Tags Title 0= off 1= on', 2, 52, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (89, 'Show Metatags Title Default - Product Price', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_PRICE_STATUS', '1', 'Display Product Price in Meta Tags Title 0= off 1= on', 2, 53, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (90, 'Show Metatags Title Default - Product Tagline', 'SHOW_PRODUCT_MUSIC_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Product Tagline in Meta Tags Title 0= off 1= on', 2, 54, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (91, 'Show Metatags Title Default - Document Title', 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_TITLE_STATUS', '1', 'Display Document Title in Meta Tags Title 0= off 1= on', 3, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (92, 'Show Metatags Title Default - Document Name', 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Document Name in Meta Tags Title 0= off 1= on', 3, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (93, 'Show Metatags Title Default - Document Tagline', 'SHOW_DOCUMENT_GENERAL_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Document Tagline in Meta Tags Title 0= off 1= on', 3, 54, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (94, 'Show Metatags Title Default - Document Title', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_TITLE_STATUS', '1', 'Display Document Title in Meta Tags Title 0= off 1= on', 4, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (95, 'Show Metatags Title Default - Document Name', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Document Name in Meta Tags Title 0= off 1= on', 4, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (96, 'Show Metatags Title Default - Document Model', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_MODEL_STATUS', '1', 'Display Document Model in Meta Tags Title 0= off 1= on', 4, 52, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (97, 'Show Metatags Title Default - Document Price', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_PRICE_STATUS', '1', 'Display Document Price in Meta Tags Title 0= off 1= on', 4, 53, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (98, 'Show Metatags Title Default - Document Tagline', 'SHOW_DOCUMENT_PRODUCT_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Document Tagline in Meta Tags Title 0= off 1= on', 4, 54, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (99, 'Show Metatags Title Default - Product Title', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_TITLE_STATUS', '1', 'Display Product Title in Meta Tags Title 0= off 1= on', 5, 50, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (100, 'Show Metatags Title Default - Product Name', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_PRODUCTS_NAME_STATUS', '1', 'Display Product Name in Meta Tags Title 0= off 1= on', 5, 51, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (101, 'Show Metatags Title Default - Product Model', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_MODEL_STATUS', '1', 'Display Product Model in Meta Tags Title 0= off 1= on', 5, 52, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (102, 'Show Metatags Title Default - Product Price', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_PRICE_STATUS', '1', 'Display Product Price in Meta Tags Title 0= off 1= on', 5, 53, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (103, 'Show Metatags Title Default - Product Tagline', 'SHOW_PRODUCT_FREE_SHIPPING_INFO_METATAGS_TITLE_TAGLINE_STATUS', '1', 'Display Product Tagline in Meta Tags Title 0= off 1= on', 5, 54, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ');
INSERT INTO `product_type_layout` VALUES (104, 'PRODUCT Attribute is Display Only - Default', 'DEFAULT_PRODUCT_ATTRIBUTES_DISPLAY_ONLY', '0', 'PRODUCT Attribute is Display Only<br />Used For Display Purposes Only<br />0= No 1= Yes', 1, 200, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (105, 'PRODUCT Attribute is Free - Default', 'DEFAULT_PRODUCT_ATTRIBUTE_IS_FREE', '1', 'PRODUCT Attribute is Free<br />Attribute is Free When Product is Free<br />0= No 1= Yes', 1, 201, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (106, 'PRODUCT Attribute is Default - Default', 'DEFAULT_PRODUCT_ATTRIBUTES_DEFAULT', '0', 'PRODUCT Attribute is Default<br />Default Attribute to be Marked Selected<br />0= No 1= Yes', 1, 202, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (107, 'PRODUCT Attribute is Discounted - Default', 'DEFAULT_PRODUCT_ATTRIBUTES_DISCOUNTED', '1', 'PRODUCT Attribute is Discounted<br />Apply Discounts Used by Product Special/Sale<br />0= No 1= Yes', 1, 203, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (108, 'PRODUCT Attribute is Included in Base Price - Default', 'DEFAULT_PRODUCT_ATTRIBUTES_PRICE_BASE_INCLUDED', '1', 'PRODUCT Attribute is Included in Base Price<br />Include in Base Price When Priced by Attributes<br />0= No 1= Yes', 1, 204, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (109, 'PRODUCT Attribute is Required - Default', 'DEFAULT_PRODUCT_ATTRIBUTES_REQUIRED', '0', 'PRODUCT Attribute is Required<br />Attribute Required for Text<br />0= No 1= Yes', 1, 205, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (110, 'PRODUCT Attribute Price Prefix - Default', 'DEFAULT_PRODUCT_PRICE_PREFIX', '1', 'PRODUCT Attribute Price Prefix<br />Default Attribute Price Prefix for Adding<br />Blank, + or -', 1, 206, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (111, 'PRODUCT Attribute Weight Prefix - Default', 'DEFAULT_PRODUCT_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX', '1', 'PRODUCT Attribute Weight Prefix<br />Default Attribute Weight Prefix<br />Blank, + or -', 1, 207, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (112, 'MUSIC Attribute is Display Only - Default', 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_DISPLAY_ONLY', '0', 'MUSIC Attribute is Display Only<br />Used For Display Purposes Only<br />0= No 1= Yes', 2, 200, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (113, 'MUSIC Attribute is Free - Default', 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTE_IS_FREE', '1', 'MUSIC Attribute is Free<br />Attribute is Free When Product is Free<br />0= No 1= Yes', 2, 201, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (114, 'MUSIC Attribute is Default - Default', 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_DEFAULT', '0', 'MUSIC Attribute is Default<br />Default Attribute to be Marked Selected<br />0= No 1= Yes', 2, 202, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (115, 'MUSIC Attribute is Discounted - Default', 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_DISCOUNTED', '1', 'MUSIC Attribute is Discounted<br />Apply Discounts Used by Product Special/Sale<br />0= No 1= Yes', 2, 203, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (116, 'MUSIC Attribute is Included in Base Price - Default', 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_PRICE_BASE_INCLUDED', '1', 'MUSIC Attribute is Included in Base Price<br />Include in Base Price When Priced by Attributes<br />0= No 1= Yes', 2, 204, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (117, 'MUSIC Attribute is Required - Default', 'DEFAULT_PRODUCT_MUSIC_ATTRIBUTES_REQUIRED', '0', 'MUSIC Attribute is Required<br />Attribute Required for Text<br />0= No 1= Yes', 2, 205, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (118, 'MUSIC Attribute Price Prefix - Default', 'DEFAULT_PRODUCT_MUSIC_PRICE_PREFIX', '1', 'MUSIC Attribute Price Prefix<br />Default Attribute Price Prefix for Adding<br />Blank, + or -', 2, 206, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (119, 'MUSIC Attribute Weight Prefix - Default', 'DEFAULT_PRODUCT_MUSIC_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX', '1', 'MUSIC Attribute Weight Prefix<br />Default Attribute Weight Prefix<br />Blank, + or -', 2, 207, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (120, 'DOCUMENT GENERAL Attribute is Display Only - Default', 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_DISPLAY_ONLY', '0', 'DOCUMENT GENERAL Attribute is Display Only<br />Used For Display Purposes Only<br />0= No 1= Yes', 3, 200, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (121, 'DOCUMENT GENERAL Attribute is Free - Default', 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTE_IS_FREE', '1', 'DOCUMENT GENERAL Attribute is Free<br />Attribute is Free When Product is Free<br />0= No 1= Yes', 3, 201, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (122, 'DOCUMENT GENERAL Attribute is Default - Default', 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_DEFAULT', '0', 'DOCUMENT GENERAL Attribute is Default<br />Default Attribute to be Marked Selected<br />0= No 1= Yes', 3, 202, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (123, 'DOCUMENT GENERAL Attribute is Discounted - Default', 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_DISCOUNTED', '1', 'DOCUMENT GENERAL Attribute is Discounted<br />Apply Discounts Used by Product Special/Sale<br />0= No 1= Yes', 3, 203, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (124, 'DOCUMENT GENERAL Attribute is Included in Base Price - Default', 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_PRICE_BASE_INCLUDED', '1', 'DOCUMENT GENERAL Attribute is Included in Base Price<br />Include in Base Price When Priced by Attributes<br />0= No 1= Yes', 3, 204, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (125, 'DOCUMENT GENERAL Attribute is Required - Default', 'DEFAULT_DOCUMENT_GENERAL_ATTRIBUTES_REQUIRED', '0', 'DOCUMENT GENERAL Attribute is Required<br />Attribute Required for Text<br />0= No 1= Yes', 3, 205, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (126, 'DOCUMENT GENERAL Attribute Price Prefix - Default', 'DEFAULT_DOCUMENT_GENERAL_PRICE_PREFIX', '1', 'DOCUMENT GENERAL Attribute Price Prefix<br />Default Attribute Price Prefix for Adding<br />Blank, + or -', 3, 206, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (127, 'DOCUMENT GENERAL Attribute Weight Prefix - Default', 'DEFAULT_DOCUMENT_GENERAL_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX', '1', 'DOCUMENT GENERAL Attribute Weight Prefix<br />Default Attribute Weight Prefix<br />Blank, + or -', 3, 207, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (128, 'DOCUMENT PRODUCT Attribute is Display Only - Default', 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_DISPLAY_ONLY', '0', 'DOCUMENT PRODUCT Attribute is Display Only<br />Used For Display Purposes Only<br />0= No 1= Yes', 4, 200, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (129, 'DOCUMENT PRODUCT Attribute is Free - Default', 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTE_IS_FREE', '1', 'DOCUMENT PRODUCT Attribute is Free<br />Attribute is Free When Product is Free<br />0= No 1= Yes', 4, 201, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (130, 'DOCUMENT PRODUCT Attribute is Default - Default', 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_DEFAULT', '0', 'DOCUMENT PRODUCT Attribute is Default<br />Default Attribute to be Marked Selected<br />0= No 1= Yes', 4, 202, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (131, 'DOCUMENT PRODUCT Attribute is Discounted - Default', 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_DISCOUNTED', '1', 'DOCUMENT PRODUCT Attribute is Discounted<br />Apply Discounts Used by Product Special/Sale<br />0= No 1= Yes', 4, 203, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (132, 'DOCUMENT PRODUCT Attribute is Included in Base Price - Default', 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_PRICE_BASE_INCLUDED', '1', 'DOCUMENT PRODUCT Attribute is Included in Base Price<br />Include in Base Price When Priced by Attributes<br />0= No 1= Yes', 4, 204, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (133, 'DOCUMENT PRODUCT Attribute is Required - Default', 'DEFAULT_DOCUMENT_PRODUCT_ATTRIBUTES_REQUIRED', '0', 'DOCUMENT PRODUCT Attribute is Required<br />Attribute Required for Text<br />0= No 1= Yes', 4, 205, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (134, 'DOCUMENT PRODUCT Attribute Price Prefix - Default', 'DEFAULT_DOCUMENT_PRODUCT_PRICE_PREFIX', '1', 'DOCUMENT PRODUCT Attribute Price Prefix<br />Default Attribute Price Prefix for Adding<br />Blank, + or -', 4, 206, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (135, 'DOCUMENT PRODUCT Attribute Weight Prefix - Default', 'DEFAULT_DOCUMENT_PRODUCT_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX', '1', 'DOCUMENT PRODUCT Attribute Weight Prefix<br />Default Attribute Weight Prefix<br />Blank, + or -', 4, 207, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (136, 'PRODUCT FREE SHIPPING Attribute is Display Only - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_DISPLAY_ONLY', '0', 'PRODUCT FREE SHIPPING Attribute is Display Only<br />Used For Display Purposes Only<br />0= No 1= Yes', 5, 201, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (137, 'PRODUCT FREE SHIPPING Attribute is Free - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTE_IS_FREE', '1', 'PRODUCT FREE SHIPPING Attribute is Free<br />Attribute is Free When Product is Free<br />0= No 1= Yes', 5, 201, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (138, 'PRODUCT FREE SHIPPING Attribute is Default - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_DEFAULT', '0', 'PRODUCT FREE SHIPPING Attribute is Default<br />Default Attribute to be Marked Selected<br />0= No 1= Yes', 5, 202, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (139, 'PRODUCT FREE SHIPPING Attribute is Discounted - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_DISCOUNTED', '1', 'PRODUCT FREE SHIPPING Attribute is Discounted<br />Apply Discounts Used by Product Special/Sale<br />0= No 1= Yes', 5, 203, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (140, 'PRODUCT FREE SHIPPING Attribute is Included in Base Price - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_PRICE_BASE_INCLUDED', '1', 'PRODUCT FREE SHIPPING Attribute is Included in Base Price<br />Include in Base Price When Priced by Attributes<br />0= No 1= Yes', 5, 204, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (141, 'PRODUCT FREE SHIPPING Attribute is Required - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_ATTRIBUTES_REQUIRED', '0', 'PRODUCT FREE SHIPPING Attribute is Required<br />Attribute Required for Text<br />0= No 1= Yes', 5, 205, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''Yes''), array(''id''=>''0'', ''text''=>''No'')), ');
INSERT INTO `product_type_layout` VALUES (142, 'PRODUCT FREE SHIPPING Attribute Price Prefix - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_PRICE_PREFIX', '1', 'PRODUCT FREE SHIPPING Attribute Price Prefix<br />Default Attribute Price Prefix for Adding<br />Blank, + or -', 5, 206, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');
INSERT INTO `product_type_layout` VALUES (143, 'PRODUCT FREE SHIPPING Attribute Weight Prefix - Default', 'DEFAULT_PRODUCT_FREE_SHIPPING_PRODUCTS_ATTRIBUTES_WEIGHT_PREFIX', '1', 'PRODUCT FREE SHIPPING Attribute Weight Prefix<br />Default Attribute Weight Prefix<br />Blank, + or -', 5, 207, '0000-00-00 00:00:00', '2008-07-20 12:06:21', '', 'zen_cfg_select_drop_down(array(array(''id''=>''0'', ''text''=>''Blank''), array(''id''=>''1'', ''text''=>''+''), array(''id''=>''2'', ''text''=>''-'')), ');

-- --------------------------------------------------------

-- 
-- 表的结构 `project_version`
-- 

CREATE TABLE `project_version` (
  `project_version_id` tinyint(3) NOT NULL auto_increment,
  `project_version_key` varchar(40) NOT NULL default '',
  `project_version_major` varchar(20) NOT NULL default '',
  `project_version_minor` varchar(20) NOT NULL default '',
  `project_version_patch1` varchar(20) NOT NULL default '',
  `project_version_patch2` varchar(20) NOT NULL default '',
  `project_version_patch1_source` varchar(20) NOT NULL default '',
  `project_version_patch2_source` varchar(20) NOT NULL default '',
  `project_version_comment` varchar(250) NOT NULL default '',
  `project_version_date_applied` datetime NOT NULL default '0001-01-01 01:01:01',
  PRIMARY KEY  (`project_version_id`),
  UNIQUE KEY `idx_project_version_key_zen` (`project_version_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Database Version Tracking' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `project_version`
-- 

INSERT INTO `project_version` VALUES (1, 'Zen-Cart Main', '1', '3.8', '', '', '', '', 'Fresh Installation', '2008-07-20 12:06:21');
INSERT INTO `project_version` VALUES (2, 'Zen-Cart Database', '1', '3.8', '', '', '', '', 'Fresh Installation', '2008-07-20 12:06:21');

-- --------------------------------------------------------

-- 
-- 表的结构 `project_version_history`
-- 

CREATE TABLE `project_version_history` (
  `project_version_id` tinyint(3) NOT NULL auto_increment,
  `project_version_key` varchar(40) NOT NULL default '',
  `project_version_major` varchar(20) NOT NULL default '',
  `project_version_minor` varchar(20) NOT NULL default '',
  `project_version_patch` varchar(20) NOT NULL default '',
  `project_version_comment` varchar(250) NOT NULL default '',
  `project_version_date_applied` datetime NOT NULL default '0001-01-01 01:01:01',
  PRIMARY KEY  (`project_version_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Database Version Tracking History' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `project_version_history`
-- 

INSERT INTO `project_version_history` VALUES (1, 'Zen-Cart Main', '1', '3.8', '', 'Fresh Installation', '2008-07-20 12:06:21');
INSERT INTO `project_version_history` VALUES (2, 'Zen-Cart Database', '1', '3.8', '', 'Fresh Installation', '2008-07-20 12:06:21');

-- --------------------------------------------------------

-- 
-- 表的结构 `query_builder`
-- 

CREATE TABLE `query_builder` (
  `query_id` int(11) NOT NULL auto_increment,
  `query_category` varchar(40) NOT NULL default '',
  `query_name` varchar(80) NOT NULL default '',
  `query_description` text NOT NULL,
  `query_string` text NOT NULL,
  `query_keys_list` text NOT NULL,
  PRIMARY KEY  (`query_id`),
  UNIQUE KEY `query_name` (`query_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores queries for re-use in Admin email and report modules' AUTO_INCREMENT=19 ;

-- 
-- 导出表中的数据 `query_builder`
-- 

INSERT INTO `query_builder` VALUES (1, 'email', 'All Customers', 'Returns all customers name and email address for sending mass emails (ie: for newsletters, coupons, GVs, messages, etc).', 'select customers_email_address, customers_firstname, customers_lastname from TABLE_CUSTOMERS order by customers_lastname, customers_firstname, customers_email_address', '');
INSERT INTO `query_builder` VALUES (2, 'email,newsletters', 'Customer Account Newsletter Subscribers', 'Returns name and email address of newsletter subscribers who have a customer account.', 'select customers_firstname, customers_lastname, customers_email_address from TABLE_CUSTOMERS where customers_newsletter = ''1''', '');
INSERT INTO `query_builder` VALUES (3, 'email,newsletters', 'Dormant Customers (>3months) (Subscribers)', 'Subscribers who HAVE purchased something, but have NOT purchased for at least three months.', 'select o.date_purchased, c.customers_email_address, c.customers_lastname, c.customers_firstname from TABLE_CUSTOMERS c, TABLE_ORDERS o WHERE c.customers_id = o.customers_id AND c.customers_newsletter = 1 GROUP BY c.customers_email_address HAVING max(o.date_purchased) <= subdate(now(),INTERVAL 3 MONTH) ORDER BY c.customers_lastname, c.customers_firstname ASC', '');
INSERT INTO `query_builder` VALUES (4, 'email,newsletters', 'Active customers in past 3 months (Subscribers)', 'Newsletter subscribers who are also active customers (purchased something) in last 3 months.', 'select c.customers_email_address, c.customers_lastname, c.customers_firstname from TABLE_CUSTOMERS c, TABLE_ORDERS o where c.customers_newsletter = ''1'' AND c.customers_id = o.customers_id and o.date_purchased > subdate(now(),INTERVAL 3 MONTH) GROUP BY c.customers_email_address order by c.customers_lastname, c.customers_firstname ASC', '');
INSERT INTO `query_builder` VALUES (5, 'email,newsletters', 'Active customers in past 3 months (Regardless of subscription status)', 'All active customers (purchased something) in last 3 months, ignoring newsletter-subscription status.', 'select c.customers_email_address, c.customers_lastname, c.customers_firstname from TABLE_CUSTOMERS c, TABLE_ORDERS o WHERE c.customers_id = o.customers_id and o.date_purchased > subdate(now(),INTERVAL 3 MONTH) GROUP BY c.customers_email_address order by c.customers_lastname, c.customers_firstname ASC', '');
INSERT INTO `query_builder` VALUES (6, 'email,newsletters', 'Administrator', 'Just the email account of the current administrator', 'select ''ADMIN'' as customers_firstname, admin_name as customers_lastname, admin_email as customers_email_address from TABLE_ADMIN where admin_id = $SESSION:admin_id', '');
INSERT INTO `query_builder` VALUES (7, 'email,newsletters', 'Customers who have never completed a purchase', 'For sending newsletter to all customers who registered but have never completed a purchase', 'SELECT DISTINCT c.customers_email_address as customers_email_address, c.customers_lastname as customers_lastname, c.customers_firstname as customers_firstname FROM TABLE_CUSTOMERS c LEFT JOIN  TABLE_ORDERS o ON c.customers_id=o.customers_id WHERE o.date_purchased IS NULL', '');
INSERT INTO `query_builder` VALUES (8, 'email,newsletters', 'All Newsletter Subscribers', 'Returns name and email address of all Customer Account subscribers and all Newsletter-Only subscribers.', 'select c.customers_firstname, c.customers_lastname, s.email_address as customers_email_address from TABLE_SUBSCRIBERS as s left join TABLE_CUSTOMERS as c on c.customers_id = s.customers_id ', '');
INSERT INTO `query_builder` VALUES (9, 'email,newsletters', 'Newsletter-only Subscribers', 'Returns email address of all confirmed Newsletter-Only subscribers.', 'SELECT email_address as customers_email_address FROM TABLE_SUBSCRIBERS WHERE email_format != ''NONE'' and confirmed = 1 and (customers_id IS NULL or customers_id = 0) order by email_address', '');
INSERT INTO `query_builder` VALUES (10, 'email,newsletters', 'Email Test Group - Newsletter-only subscribers', 'Returns name and email address of Newsletter-only subscribers designated in Email test group configuration.', 'SELECT s.email_address as customers_email_address FROM TABLE_SUBSCRIBERS as s LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( s.email_address, q.configuration_value) >= 1 WHERE configuration_key = ''NEWSONLY_SUBSCRIPTION_TEST_GROUP'' ', '');
INSERT INTO `query_builder` VALUES (11, 'email,newsletters', 'Email Test Group - Customers', 'Returns name and email address of Newsletter-only subscribers designated in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE configuration_key = ''NEWSONLY_SUBSCRIPTION_TEST_GROUP'' ', '');
INSERT INTO `query_builder` VALUES (12, 'email,newsletters', 'All Auction Seller', 'Returns name and email address of All Auction Seller in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes = 1 ', '');
INSERT INTO `query_builder` VALUES (13, 'email,newsletters', 'All Wholesaler', 'Returns name and email address of All Wholesaler in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes = 2 ', '');
INSERT INTO `query_builder` VALUES (14, 'email,newsletters', 'All Offline Retailer', 'Returns name and email address of All Offline Retailer in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes = 3', '');
INSERT INTO `query_builder` VALUES (15, 'email,newsletters', 'All Online Retailer', 'Returns name and email address of All Online Retailer in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes = 4 ', '');
INSERT INTO `query_builder` VALUES (16, 'email,newsletters', 'All Dropshipper', 'Returns name and email address of All Dropshipper in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes = 5', '');
INSERT INTO `query_builder` VALUES (17, 'email,newsletters', 'All End-user', 'Returns name and email address of All End-user in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes =6', '');
INSERT INTO `query_builder` VALUES (18, 'email,newsletters', 'All Others', 'Returns name and email address of All Others Seller in Email test group configuration.', 'SELECT c.customers_email_address as customers_email_address FROM TABLE_CUSTOMERS as c LEFT JOIN TABLE_CONFIGURATION as q on LOCATE( c.customers_email_address, q.configuration_value) >= 1 WHERE c.customers_describes =7', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `record_artists`
-- 

CREATE TABLE `record_artists` (
  `artists_id` int(11) NOT NULL auto_increment,
  `artists_name` varchar(32) NOT NULL default '',
  `artists_image` varchar(64) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`artists_id`),
  KEY `idx_rec_artists_name_zen` (`artists_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `record_artists`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `record_artists_info`
-- 

CREATE TABLE `record_artists_info` (
  `artists_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `artists_url` varchar(255) NOT NULL default '',
  `url_clicked` int(5) NOT NULL default '0',
  `date_last_click` datetime default NULL,
  PRIMARY KEY  (`artists_id`,`languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `record_artists_info`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `record_company`
-- 

CREATE TABLE `record_company` (
  `record_company_id` int(11) NOT NULL auto_increment,
  `record_company_name` varchar(32) NOT NULL default '',
  `record_company_image` varchar(64) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  PRIMARY KEY  (`record_company_id`),
  KEY `idx_rec_company_name_zen` (`record_company_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `record_company`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `record_company_info`
-- 

CREATE TABLE `record_company_info` (
  `record_company_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `record_company_url` varchar(255) NOT NULL default '',
  `url_clicked` int(5) NOT NULL default '0',
  `date_last_click` datetime default NULL,
  PRIMARY KEY  (`record_company_id`,`languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `record_company_info`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `reviews`
-- 

CREATE TABLE `reviews` (
  `reviews_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `customers_id` int(11) default NULL,
  `customers_name` varchar(64) default NULL,
  `reviews_rating` int(1) default NULL,
  `date_added` datetime default NULL,
  `last_modified` datetime default NULL,
  `reviews_read` int(5) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  `reviews_is_featured` int(1) default '0',
  `customers_email` varchar(64) default NULL,
  PRIMARY KEY  (`reviews_id`),
  KEY `idx_products_id_zen` (`products_id`),
  KEY `idx_customers_id_zen` (`customers_id`),
  KEY `idx_status_zen` (`status`),
  KEY `idx_date_added_zen` (`date_added`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `reviews`
-- 

INSERT INTO `reviews` VALUES (1, 61, 1, 'Evelyn', 4, '2010-11-01 17:16:14', NULL, 0, 1, 0, '123456789@qq.com');
INSERT INTO `reviews` VALUES (2, 61, 1, 'Evelyn', 4, '2010-11-01 17:16:30', NULL, 0, 0, 0, '123456789@qq.com');

-- --------------------------------------------------------

-- 
-- 表的结构 `reviews_description`
-- 

CREATE TABLE `reviews_description` (
  `reviews_id` int(11) NOT NULL default '0',
  `languages_id` int(11) NOT NULL default '0',
  `reviews_text` text NOT NULL,
  `reviews_title` varchar(255) default NULL,
  PRIMARY KEY  (`reviews_id`,`languages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `reviews_description`
-- 

INSERT INTO `reviews_description` VALUES (1, 1, 'fhasjifhiahfgijah', 'kkkkkkkkk');
INSERT INTO `reviews_description` VALUES (2, 1, 'fhasjifhiahfgijah', 'kkkkkkkkk');

-- --------------------------------------------------------

-- 
-- 表的结构 `salemaker_sales`
-- 

CREATE TABLE `salemaker_sales` (
  `sale_id` int(11) NOT NULL auto_increment,
  `sale_status` tinyint(4) NOT NULL default '0',
  `sale_name` varchar(30) NOT NULL default '',
  `sale_deduction_value` decimal(15,4) NOT NULL default '0.0000',
  `sale_deduction_type` tinyint(4) NOT NULL default '0',
  `sale_pricerange_from` decimal(15,4) NOT NULL default '0.0000',
  `sale_pricerange_to` decimal(15,4) NOT NULL default '0.0000',
  `sale_specials_condition` tinyint(4) NOT NULL default '0',
  `sale_categories_selected` text,
  `sale_categories_all` text,
  `sale_date_start` date NOT NULL default '0001-01-01',
  `sale_date_end` date NOT NULL default '0001-01-01',
  `sale_date_added` date NOT NULL default '0001-01-01',
  `sale_date_last_modified` date NOT NULL default '0001-01-01',
  `sale_date_status_change` date NOT NULL default '0001-01-01',
  PRIMARY KEY  (`sale_id`),
  KEY `idx_sale_status_zen` (`sale_status`),
  KEY `idx_sale_date_start_zen` (`sale_date_start`),
  KEY `idx_sale_date_end_zen` (`sale_date_end`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `salemaker_sales`
-- 

INSERT INTO `salemaker_sales` VALUES (1, 1, '5off', 5.0000, 0, 0.0000, 0.0000, 0, '6', ',6,24,25,', '0001-01-01', '0001-01-01', '2010-11-02', '2010-11-02', '2010-11-02');

-- --------------------------------------------------------

-- 
-- 表的结构 `sc_categories_ratio`
-- 

CREATE TABLE `sc_categories_ratio` (
  `categories_id` int(11) NOT NULL,
  `ratio` float NOT NULL default '1',
  PRIMARY KEY  (`categories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sc_categories_ratio`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `sc_customers`
-- 

CREATE TABLE `sc_customers` (
  `customers_id` int(11) NOT NULL,
  `amount` float NOT NULL default '0',
  `pending` float NOT NULL default '0',
  `created_on` int(11) NOT NULL default '0',
  `modified_on` int(11) NOT NULL default '0',
  PRIMARY KEY  (`customers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sc_customers`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `sc_products_ratio`
-- 

CREATE TABLE `sc_products_ratio` (
  `products_id` int(11) NOT NULL,
  `ratio` float NOT NULL default '1',
  PRIMARY KEY  (`products_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sc_products_ratio`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `sc_reward_point_logs`
-- 

CREATE TABLE `sc_reward_point_logs` (
  `products_id` int(11) NOT NULL,
  `products_prid` tinytext,
  `orders_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `orders_subtotal` float NOT NULL,
  `ratio` float NOT NULL,
  `amount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `credits_applied` float NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  `created_on` int(11) NOT NULL default '0',
  `modified_on` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sc_reward_point_logs`
-- 

INSERT INTO `sc_reward_point_logs` VALUES (16, '16', 1, 1, 12439.8, 0.01, 9, 10, 0, 0, 1288600311, 1288600311);
INSERT INTO `sc_reward_point_logs` VALUES (17, '17', 1, 1, 12439.8, 0.01, 8.6, 10, 0, 0, 1288600311, 1288600311);
INSERT INTO `sc_reward_point_logs` VALUES (50, '50', 1, 1, 12439.8, 0.01, 7, 10, 0, 0, 1288600311, 1288600311);
INSERT INTO `sc_reward_point_logs` VALUES (62, '62', 1, 1, 12439.8, 0.01, 9.8, 10, 0, 0, 1288600311, 1288600311);
INSERT INTO `sc_reward_point_logs` VALUES (61, '61', 1, 1, 12439.8, 0.01, 90, 10, 0, 0, 1288600311, 1288600311);

-- --------------------------------------------------------

-- 
-- 表的结构 `sc_transaction_logs`
-- 

CREATE TABLE `sc_transaction_logs` (
  `customers_id` int(11) NOT NULL,
  `orders_id` int(11) default NULL,
  `amount` float NOT NULL,
  `message` varchar(255) default NULL,
  `created_on` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sc_transaction_logs`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `search_log`
-- 

CREATE TABLE `search_log` (
  `search_log_id` int(11) NOT NULL auto_increment,
  `search_term` varchar(255) default NULL,
  `search_time` datetime default NULL,
  `search_results` int(11) default NULL,
  PRIMARY KEY  (`search_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `search_log`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `seo_cache`
-- 

CREATE TABLE `seo_cache` (
  `cache_id` varchar(32) NOT NULL default '',
  `cache_language_id` tinyint(1) NOT NULL default '0',
  `cache_name` varchar(255) NOT NULL default '',
  `cache_data` mediumtext NOT NULL,
  `cache_global` tinyint(1) NOT NULL default '1',
  `cache_gzip` tinyint(1) NOT NULL default '1',
  `cache_method` varchar(20) NOT NULL default 'RETURN',
  `cache_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `cache_expires` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`cache_id`,`cache_language_id`),
  KEY `cache_id` (`cache_id`),
  KEY `cache_language_id` (`cache_language_id`),
  KEY `cache_global` (`cache_global`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `seo_cache`
-- 

INSERT INTO `seo_cache` VALUES ('ca34fbe5f9a075091ad59abf02c259a7', 1, 'seo_urls_v2_products', 'zVvNkuu6cd77Kby7SVVQRZAiRZVXLtvLOKlUvHZBJEhhRBI8BCkdzSovkpfzk/jrBimJmgHn1L03sb3wPXPOCN1o9O/Xn0pdmU7/y0//+V//8ce//OG///rn3//7n/4a//Rvv/3pqJpG1PbaCTcOqm+0c0K5W9vqcTCFaoRTo+nEODWNFlddlqarRTng17QTlR3EcTClFif3XcrD/qd//d1vys9kJS+yrlqPJ62GURQn1etGQDjEeGF2qFX3rj6Iu7o22uW7oJDdjwkZVVXp8ePx69vEqQwKSkmQamBSbzUnRq0a3dXjab4CW8W1ypT3W/S47c2bTlSujJJD+CbZQ4AlISc7NaUehIPdeph8cqfZYsXJVJXthG6UG00xix+mqsJT+sfxavCbVa6J8iwsd09ya4WnGXQpBjt1peh0cearKvxwVc6MotTO1HitRuuLZpfh08XVtrpzD/eo1NFEeZpEURy0Zc6PplUJgbgnPMIf62BakngXj7urETaYhcw/wgmrAlKyPaQkQSkHkjIaXd60GE+D1t8mPIceIIUvgf/2ujDw98I2jYIUg7c86gYOatW4CLUTPgM9BkjF3WQcyS2pMiKxF1OMdjAKxxXnk2pxsRuC6aRNacS5mZa/KOltL48LV7D01yaWeRQfKyn3ZOjg/aX8VJNGm/o0wn1arR0Z16vmpn7Q7ZPfLf5EKgWeetEj39aDk84wdVd1m4Xd3a1q1Agd4AdVY6+kzMod7EUPjep7/PuTkba00ZE8RDmuHspKkuPsGkW5KCd6ezWUy59aPSgBLynFkR2f/OFqKiPGi3hTFyWSVJiuOEFZ+MdoJ/zRFfCsThQaObU/UeQeG1WcRVwfxVjx8e49ivZxlCWHsFacXnBbZ6xQ5KhmciKLokU1KMmazDqzpsdm0qO1ULJq1/oFVHvSKawJ5wO9l/NT9YOl67NcZ1pvr4eNKtxeNIhSpA/8m9MfLPFDQjkj/H8L5QTxhgfF+70VFxk9vf3DN5bLF4qNjqd3p4ZCaLaJf/+qMf2Hq784QbrbRek+nIljTh0GSe3p1R+mfn56PDj0ehH6ZGm4XJpRnsqDDx1zesDzVijsxnaIhdLUZsR/L9YUWgy6sENJ2ZfiQMKfW93a4SaOk0GOpNL93qb5hgQOfPrgl1Kow2j7RPSNuunh3NxixGkohGPuLL48c9GczPKquSmVSqMoLIL7CiSBwaKcj+rY6FH0hepV2ZpyP1br8B9scUZV7p0YzjGyIV24gFntgBBuT+9xrYZWSEkh7P3Itd/S3UbyjjkhLA+iOyTJEd0S7nQqRTs1o2l1ifriDUanxbtwKxZz0ov3PnspW4imwDG2M6hS4hLvRz5hyyCcFtJI9CjXZA5xQgygK0CTaUa4z0s6RLmsYY5OXQySPYR4dWsEEepu6dOIey/SPE3Dr8BpARkavsi5EV7i8BDzPQYU5YvRV9GaYYAIepXne93/fQ5ddGNncjSHhsVSG0Di83CbEnOCaFB81p8Ug8vjSAfVTjiOZyVJe/RO59H2rODypKsUvbwEtaP0gb4Ql1ohA8MDVUNFBY0zlT10B6x0uOonHNb758++2GWPEsnHZHLjGD8paEUlTn+/IbeRD2JsaNAkkhVPKJxXNehbgRb9EO8ucZ7to+jc6Q3LcOTWaPa1RX3DHGJvPr0UqCG4+3DDnZt7/0wtNX5801fdIPHQ27t3Ge0z8YYMt5HcEo5fRCRXZHP4NKGunsD/Jqc6LvXV1BXs19eTGfUqtQ5yH/bZhAPXTV2NQkEDEx/JOahPaJgJ+1vCUdor18GnHQUaPq1GvACfQeWeWlU7wUGcjpN4o8VOOF5XObJFpIpWnfXUsyVjyachEPRNu5Mq7dWJePk7SHOo6U7MvyUqhZrQ2ytVhPtv4ZPHwV7FbvkYlcG6sc5F27MhR3baF25dG1jHwjqMohhs/NBDr54eokSmaReOOd/tDwrDiXDmXYtsUWm+MlRFd0m3RDgjnY9alIcoe6heqA7tOkzT6GJE0EfpYYfnSui3gnJ3HOtoHegq/MkBWbUQBdLewEIQzxiryxquQOHtzhoFYpdHG5PzjmNYUtpBXPh0j77jgo8jl7a4HSfQ5djy/YaZhE/HPAO5onQaUS5S1uqhQPgWHO3kdmoYzAUh54XDlh8Fiv5N4nC6DD/Xp7eGBoJ+y6tAGYwuo5uwCpwaZOxbqyURACnoSt0Y+BxO25e3JEn2MhxCu7luj+YbgsXnl+Usd1W1yObz7+dGh13Sfs+ieL/xyBzTcf6lbvIQh9uhnS/CyZenpDk6nFDzgyqP+XK502IvA69DijYY2mvBAnCv+JBjCi/CU8eOo3DHv+/uyXd9TH44nOI4isJt645DrzPnqVFClW8TUjg1CDJKou9xKo6mswX+bRDRIc2iPNqFs2fK4UQjNmbihzfy+I5+BYVUxJFIMHFgRhtM0xjVoRVDbfK39iL2GLeCBgTGAwNuipC7FwFUfRvV9vfjw76SciihTFa+BGOUrOuhirLwSIo2EBodB5o56daFbQHKIT8VzXTkVJ0AjLAlCiZ+4yDosSkv9xPNzvgDRISv6xGy/6PDOTDqq0OOqS3wvM59E9MINwTspcxQDKoa8c+67DHVfAsryaGBkjcK+DG6TFUM9ggUsrifIsariuFqobhIOS4cOvSCQARM4FWDUQI2m9UQuu2hVYuOhkA8P2t3rldwto234RDp1DCNFkCbm85aYOw3J0A7POcz+oWKRY04Xs6NE0AUeidV+AnAwGdRwsKK+/D5TMKPnB08N+NQmjVXZzVCdyMw30H75QpIrdN3FBhC8H7JHeDclJSAlNFQcdZo1eADBaV9xgSoVsy9WFwnta/MwJzRhqPShq/AsTReYXluhqj5wYuiqxlRos0FWAugFkdgtIceCC/iwjQL808EeCksgmMvqG1S8xHhj3N0EYJm3OlZMfTqGJDX6pEVAGYhNRrMkd5/widzaD1dlfptGvcY8r1b1Z93wLCBIzMgglsAQ+bD7Gdpu2lEjr0KwAgNgtAR6wNAnBhc8NTTEVH8jiBEX6T86FC8+/8ORQWMgqeRW5KFU3bmg9ACm0UbgWdHPEFE4PBPBOYI8VhkMaaHW5aGS3TGsXjUCjmsmtAF5Wc/8dCdqOl6/+w+TkTxIT5IiToZvsSe4/FqCOzkvsn1SBgeVGLHFkVrKVXQcKqqKAn3AHsOt6sxcLAjBiiaUMQFP/LQIGjIRojhHLgaQF1EC/04DoC5qV7k/Bsu6Hoonojma3R4wsNWs5IfSvzEVFhsVvAi78N+A4vfc5gN1lZIEBMmyVLIJBEMpi7jaWl8El2GYXTp3eiQzWnixQGhzA9EDequoAlANitwFr3HGo1gCAsBuntgQ88AxQzcetFpuPXBHAjR/JoYerBXE7Vr6x45isShHhZnGBwtChA0DXRiCWdECSyBRIwNDy15mhsuT01T2euR77sxcqBRhVAGXlsF0BF5IWVD3qEZ/NXLfe8D5IwXL8NtOaZ5RALTDbxt78ObkN67QIKhVjZe2feOTD+QKn209gyXGa1jCJWRoApGtzXkAybbsDKH/69yYdw3m+8bbkL3nAVW8naAJhfga3Xtj6a+313wlZclAPtSlocbmJzzwyIVc9Mi7xVo2yHvfXhg9kFyBZHvIspzeNINqDnnDLIIYx8CpjgAxkdQzKu+L52qTKV3nXD7BHTt1Vez8M1+kWXDWT3n5HO/7HOmeAVyP7HsF6mCLIAZKZidsLum7PRzAxTHy+iwYWDOQDsgzou7fPSNBW7N5QHjBHtGOJvmnF0uB0CEqLAoIOxUjy3E0dQCDR41MNTPlKosZwgPKC+gKmwmCMj/Yh+2S3O524Afc045Y4YaxGjcQz6tPZbsBVlPclYYnV9/bJRj7C3wLiq0bOFowNoY4fC08XmS5ovuSmZbRNEGgwCxD4l4Tux3/KWw8MREMlvzsXF6XPaRSz4uf5JoLp+rSveyhqQ9kEyllOFsd+C8U16O2HhjKwpUzK9Fedv1mVJ4AV5FLkvHddS+KLAykH8UzPihUg5HJxOl5qnzeKjAf8JUiKEXSyi//PQOB2oHbfGp+396ohfZsEMsw1niwKmquYku/1T6sgf8tnq1IzLxQySZG0s+8BLCV+Rk9E9ibs5N/+hYP3AKu9bZ4nkoYo8QWLzN79/jTZ9fP/ghP2C4CKfOA2e6o7LfaZRQiMuQAveEs+nqaIGvURweAAD4wrnbahI6vGq+i3o4lR8UqcEGLhyMHE5n2GZFaDtpLgAC8RI5vE3CuABs/R4tyG3rTSbYJzxOP8IYszFhJd6zk40lI4og7tdZbBexcHm84EONx50wxJvujJml1BYVpmlWT+dOkQy3g3goEjQvSAjIdVzbH8mS4DqMiMdTujGSEOqDY2gCSDIuz22f+tnpsYmel1M8pWHbLbNw4ZQoNjgvSVtUJQIqgP+B2WIFpSW0/6QUr/F4bkKF9GAGaCWmodYfx2cbMzDQVDp+BOfn6WEfVl6/6pqMwLZeWRgYLGZiEA5C/iTRj0McNRPY+SCvOkBqWMQAkMfyzoMsvcOup90+xcf2rzH0SoxE0Mi02FkL0+7x7rycxxrrvp//bDc/0n6Cd/NjUSAlYD/PK/kU+aYc4rimYnbVR4zitATfb3TN2DySCp9JXpgBvON9ThN+8f9QgjQ4gg1ErICVCg9eQA5qRvhdPBYC78Y85d0TD/m3//lfamUNJmu/shEyq09AK/oJ/AuZRdjXlmEUDC0mXQyWEWUPdNCBMUHbQtsDgkWywMyOfc73K14b1U3ATvSJoI6eA1frbmK6JOxl3BknAtR1JaPE3FOBB3AqaD6a2Rl+fEE8FrQ6FeFMin6G1J0/RoDYmUZrxIVdncVTbwsIuFQ9IeV5fdxQmsO304AbhzNgE5re/SKjoPDc+KCv6DN35pdSNSQyH+4W7zklPdMZHBwUa2XRx/t9hK18+22Xb6zCqOfDQUyoAdyy0PlmCuvZgHW50CrpByJVonrIowZZLdptbCelp9DVWPLSstcMDbYln3MKQbk0BC2r1jAYdSd2hil88lhFcRrtNyZlEB/pZhfVgWKjxGnCchVSPI9xvBrkXbDlNKgnsBaBkExlfWG2Mji5EEEXQ3i6KZmCcEkyxSHab7T0Ev0k2digBgH+byyq0axHh7QOWixxqACHAvDxVz5hj0PavbJmQaVkeTGolGEeD3bqJG9BWk1psexmZunqOk+0yTvTcsviRExG0xpeaoH0SnKfnxy4OFYhDUB4tMyfkzsX676SXLdV2eHxN1Xh2IfL4plh1akjUgzbAKPBC3/05c09CkYE3y0VKjSNXxBaOVU8WyMQACXo9U+xB+ifYWRaCzzTfF/U3FZuh/jcCg7PjlOmtsLnkIVx1IOTPA1aVAPhwxXob9gcEpUPM67M2qMfdJcEauot2EHGnKWk5Cz1uQRaA6FdMGHShvQsN7mbUXZQHDTW/YPYpyJHG6XwP6gLcgoQZ/x1D45QI/B/TEAq3fs7ojOcmD3rDVj+CUkZS4i3CUQCAmeX+OF0BFqLE2/AAbZ6u5gzDimapWLPqs2w+wf1/K66Nxp0GaKuSDSX9BIgZUDfDShHgjuAIGPI1DeQeXogUR9NsCiOw/1AVJwsIc3z9xFY0gagKz2z7W53vyYjo4sfs/pWn+rZb/ez7296SGXkT/94n/WTbrT+nt02AgOwWArONP6pM8z44f3agHqP3rvRNQB4Bz5IsEtJOIofa/f5VN+fkLchdmm7TsyeclRbux3sMujpPpwFSj08GlmJ+mgQhfFFAD5po7/zzLVZF6yd4Dg9dSLEyHWgL0YJaEmoEhv34rov4w/kqk94VfC5KInTZCNGZ1baM0+Ye8N/EiaZ9Ew3IoTUxETz7BrO9PhKAx4QA8uFiJPzvNUptAy0g0NXyiASiDKy0HWG0hp2FY5M2uP8mrQiiS8EwGuwaqxUB+IjfUOEt4P0nSx4sKrAcbEduGxEssV+2bejREQB4TIZqw1UT3pi2upsGpA9l/L1pA0iMmBaUvLXIRxJsB9x2KDh2AW+bUKh4YdkZACeiz1Jbl7f8yz9hmIZfpkdB97zgX4QJmtO/rDOnrF4xp4r8ln1S9qB9Cwy+m3US+Aog7pSK7ls74h3YJGB6MsQGItok3eHSzY05bC8Mw2eDrsv85drh9k80pPIkEmAumMOprHMGaILUZONOb9GFIAWxUyrDC3lEZPahk5c1ohOhTaO5qQ7eQvfeiot8ujTWoGPx4EfJWwI4MA5G3CX0CPjwPu5RJch3hZrmibydN2A6qTnmGEMIz5yS1wWbLWtAOGoBu9saadfKCxhtTzNbD5uAC9GiTOxekCQmTvzHz+Kw4PpZEsXuny78kJl2rMgllI12BvG6blMo9Igu/vvP66+ZinoW48p6hMS0t8B', 1, 1, 'EVAL', '2010-12-21 02:37:40', '2011-01-20 02:37:40');
INSERT INTO `seo_cache` VALUES ('a93b9170a03ff54d81e95917742ea01b', 1, 'seo_urls_v2_categories', 'jZQ/b9wwDMX3fopslwAVUNv9i05BEWRKCxRdOgW0RNtMZUmQ5Lv621eiAzQFat5tHh7pp/cjaXAgh9eHL7c/7u6/ff/5+PX24e6xOby+OpzQGHJjUnhEl9Ph5vMr83/1+xdyZSKmhIK8q+oB0kTe7Td9W1UarVVh8k7q964q0aLO0TvSwp/Zp4aoLlJ/qH1HGnJS4IwKEPOq0hKCJcnOx1o2Idg8cV2PsOR1/6GfWO9nZPUI0aAQS/OmylPwsdjySzbex/3eDYPMft2eMPm+F703be0+kyNyecLe/xZ6M0dtESI4jYKQg3yepucYzw5JwzE6PCmIkY5gBawNR1hmBftIlVFereCn5Qj7MgY8WfvGW05vsBTOKjk37eewZIyC1ZZDm0PHsGc0BCpYWFGA2G6rUPweyaAX/PIm1Pkeg+SB16BEWra67H5SBlbFcy60ZoazL0MRLytgfnWS1LkFaBkfS1FTWQDMWcDXMT5L4yTdpG47YVDuR9nb/Yd1GzmYQzl1DGWiX+VTqGCEo7eDoGFkUSugqCMMkoENmk91DNiA9ikvs3RiOiZIAYwawYwoBsHk/h7SCyoY3ROe0MbN0QmyntQFq94xyhfX9d+iPw==', 1, 1, 'EVAL', '2010-12-21 02:37:40', '2011-01-20 02:37:40');
INSERT INTO `seo_cache` VALUES ('4404c1df54fdb1291c8dd9bb259f32a9', 1, 'seo_urls_v2_manufacturers', 'AwA=', 1, 1, 'EVAL', '2010-12-21 02:37:40', '2011-01-20 02:37:40');

-- --------------------------------------------------------

-- 
-- 表的结构 `sessions`
-- 

CREATE TABLE `sessions` (
  `sesskey` varchar(32) NOT NULL default '',
  `expiry` int(11) unsigned NOT NULL default '0',
  `value` mediumblob NOT NULL,
  PRIMARY KEY  (`sesskey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `sessions`
-- 

INSERT INTO `sessions` VALUES ('2bd678e7406e1f1ff25891459075f400', 1294130615, 0x7365637572697479546f6b656e7c733a33323a226334663566663564386238373666646365613363656237626265356434663365223b6c616e67756167657c733a373a22656e676c697368223b6c616e6775616765735f69647c733a313a2231223b6c616e6775616765735f636f64657c733a323a22454e223b73656c65637465645f626f787c733a31333a22636f6e66696775726174696f6e223b68746d6c5f656469746f725f707265666572656e63655f7374617475737c733a373a2254494e594d4345223b61646d696e5f69647c733a313a2231223b657a5f736f72745f6f726465727c693a303b);
INSERT INTO `sessions` VALUES ('4286678e04b4869dfd71123ff48881db', 1294130549, 0x7365637572697479546f6b656e7c733a33323a226334663566663564386238373666646365613363656237626265356434663365223b6c616e67756167657c733a373a22656e676c697368223b6c616e6775616765735f69647c733a313a2231223b6c616e6775616765735f636f64657c733a323a22454e223b73656c65637465645f626f787c733a31333a22636f6e66696775726174696f6e223b68746d6c5f656469746f725f707265666572656e63655f7374617475737c733a393a2246434b454449544f52223b);

-- --------------------------------------------------------

-- 
-- 表的结构 `shipping_airmail`
-- 

CREATE TABLE `shipping_airmail` (
  `countries_iso_code_2` char(2) NOT NULL default '',
  `shipping_airmail_zone` char(1) NOT NULL default '',
  `shipping_airmail_20` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_30` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_ex10` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_500` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_1000` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_ex500` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_max` double(4,2) NOT NULL default '0.00',
  `shipping_airmail_desc` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`countries_iso_code_2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `shipping_airmail`
-- 

INSERT INTO `shipping_airmail` VALUES ('AF', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 37.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('AL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 36.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('DZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 41.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('AO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 55.00, 20.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('AI', '2', 2.50, 4.10, 1.00, 93.00, 99.99, 53.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('AG', '2', 2.50, 4.10, 1.00, 93.00, 99.99, 53.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('AR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 53.00, 20.00, '7-9');
INSERT INTO `shipping_airmail` VALUES ('AM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 35.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('AU', '2', 2.50, 4.10, 1.00, 85.00, 99.99, 29.00, 20.00, '6');
INSERT INTO `shipping_airmail` VALUES ('AT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 30.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('AZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 42.00, 30.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('BS', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '10-13');
INSERT INTO `shipping_airmail` VALUES ('BH', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 21.00, 20.00, '6-7');
INSERT INTO `shipping_airmail` VALUES ('BD', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 18.00, 30.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('BB', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('BY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('BE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('BZ', '2', 2.50, 4.10, 1.00, 87.00, 99.99, 48.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('BJ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 48.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('BM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '8-13');
INSERT INTO `shipping_airmail` VALUES ('BT', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 31.00, 20.00, '9-17');
INSERT INTO `shipping_airmail` VALUES ('BO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 50.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('BW', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('BR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 30.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('BN', '1', 1.90, 3.10, 0.80, 82.00, 93.00, 14.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('BG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('BF', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 52.00, 20.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('BI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 49.00, 20.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('KH', '1', 1.90, 3.10, 0.80, 85.00, 97.00, 14.00, 10.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('CM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 51.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('CA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 34.00, 30.00, '6-10');
INSERT INTO `shipping_airmail` VALUES ('CV', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('KY', '2', 2.50, 4.10, 1.00, 88.00, 99.99, 49.00, 30.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('CF', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 48.00, 20.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('TD', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 47.00, 10.00, '8-23');
INSERT INTO `shipping_airmail` VALUES ('CL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 53.00, 20.00, '10-12');
INSERT INTO `shipping_airmail` VALUES ('CN', '2', 2.50, 4.10, 1.00, 90.00, 99.99, 17.00, 30.00, '4-15');
INSERT INTO `shipping_airmail` VALUES ('CX', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 26.00, 20.00, '8-15');
INSERT INTO `shipping_airmail` VALUES ('CC', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 26.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('CO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 52.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('KM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 63.00, 20.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('CD', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 56.00, 20.00, '11-12');
INSERT INTO `shipping_airmail` VALUES ('CG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 50.00, 20.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('CR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 52.00, 30.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('CI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 50.00, 20.00, '10-12');
INSERT INTO `shipping_airmail` VALUES ('CU', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 86.00, 10.00, '13-16');
INSERT INTO `shipping_airmail` VALUES ('CY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 26.00, 30.00, '6-9');
INSERT INTO `shipping_airmail` VALUES ('CZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 30.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('DK', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 30.00, '6');
INSERT INTO `shipping_airmail` VALUES ('DJ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 48.00, 20.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('DM', '2', 2.50, 4.10, 1.00, 95.00, 99.99, 54.00, 10.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('DO', '2', 2.50, 4.10, 1.00, 99.00, 99.99, 46.00, 20.00, '8-13');
INSERT INTO `shipping_airmail` VALUES ('TL', '1', 1.90, 3.10, 0.80, 87.00, 99.99, 20.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('EC', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 54.00, 20.00, '10-11');
INSERT INTO `shipping_airmail` VALUES ('EG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 25.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('SV', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 45.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('GQ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 47.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('ER', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 20.00, '8-12');
INSERT INTO `shipping_airmail` VALUES ('EE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 10.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('ET', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 20.00, '6-9');
INSERT INTO `shipping_airmail` VALUES ('FK', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 41.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('FO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('FJ', '2', 2.50, 4.10, 1.00, 93.00, 99.99, 33.00, 20.00, '7-9');
INSERT INTO `shipping_airmail` VALUES ('FI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('FR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 30.00, '6');
INSERT INTO `shipping_airmail` VALUES ('GF', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 55.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('PF', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('GA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 51.00, 10.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('GM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 55.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('GE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 40.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('DE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 30.00, '6');
INSERT INTO `shipping_airmail` VALUES ('GH', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 48.00, 10.00, '6-9');
INSERT INTO `shipping_airmail` VALUES ('GI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 35.00, 20.00, '10-11');
INSERT INTO `shipping_airmail` VALUES ('GR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 20.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('GL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 57.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('GD', '2', 2.50, 4.10, 1.00, 96.00, 99.99, 55.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('GT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 54.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('GW', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 47.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('GY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 41.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('GN', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 48.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('HT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 49.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('HN', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 54.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('HU', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('IS', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 39.00, 20.00, '7-11');
INSERT INTO `shipping_airmail` VALUES ('IN', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 23.00, 20.00, '7-12');
INSERT INTO `shipping_airmail` VALUES ('ID', '1', 1.90, 3.10, 0.80, 87.00, 99.99, 20.00, 20.00, '9-12');
INSERT INTO `shipping_airmail` VALUES ('IR', '2', 2.50, 4.70, 1.00, 99.99, 99.99, 30.00, 20.00, '7-9');
INSERT INTO `shipping_airmail` VALUES ('IQ', '2', 2.50, 4.70, 1.00, 99.99, 99.99, 31.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('IE', '2', 2.50, 4.70, 1.00, 99.99, 99.99, 31.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('IL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 20.00, '8-13');
INSERT INTO `shipping_airmail` VALUES ('IT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 20.00, '6-7');
INSERT INTO `shipping_airmail` VALUES ('JM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 51.00, 10.00, '10-11');
INSERT INTO `shipping_airmail` VALUES ('JP', '2', 2.50, 4.10, 1.00, 90.00, 99.99, 17.00, 30.00, '6-7');
INSERT INTO `shipping_airmail` VALUES ('JO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 26.00, 30.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('KZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 47.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('KE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 34.00, 20.00, '6-10');
INSERT INTO `shipping_airmail` VALUES ('KI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 37.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('KP', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 27.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('KR', '1', 1.90, 3.10, 0.80, 85.00, 99.99, 12.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('KW', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 22.00, 10.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('KG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 43.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('LA', '1', 2.50, 4.10, 1.00, 99.99, 99.99, 16.00, 20.00, '7-11');
INSERT INTO `shipping_airmail` VALUES ('LV', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 10.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('LB', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 25.00, 10.00, '8-13');
INSERT INTO `shipping_airmail` VALUES ('LS', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '12-17');
INSERT INTO `shipping_airmail` VALUES ('LR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 48.00, 20.00, '9-15');
INSERT INTO `shipping_airmail` VALUES ('LY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 10.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('LI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 30.00, 30.00, '6-10');
INSERT INTO `shipping_airmail` VALUES ('LT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('LU', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 29.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('MO', '2', 2.50, 4.10, 1.00, 90.00, 14.00, 5.00, 30.00, '1-2');
INSERT INTO `shipping_airmail` VALUES ('MK', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 30.00, '8-11');
INSERT INTO `shipping_airmail` VALUES ('MG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 58.00, 20.00, '8-11');
INSERT INTO `shipping_airmail` VALUES ('PT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 40.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MW', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 63.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MY', '1', 1.90, 3.10, 0.80, 81.00, 91.00, 13.00, 10.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('MV', '1', 1.90, 3.10, 0.80, 79.00, 99.99, 22.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('ML', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 44.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('MH', '2', 2.50, 4.10, 1.00, 61.00, 89.00, 29.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MU', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 36.00, 20.00, '7-9');
INSERT INTO `shipping_airmail` VALUES ('MR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 44.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MX', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 40.00, 20.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('MD', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 20.00, '8-11');
INSERT INTO `shipping_airmail` VALUES ('MC', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MS', '2', 2.50, 4.10, 1.00, 98.00, 99.99, 59.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('MA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 36.00, 20.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('MZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 49.00, 20.00, '9-14');
INSERT INTO `shipping_airmail` VALUES ('MM', '1', 1.90, 3.10, 0.80, 99.00, 99.99, 14.00, 10.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('NA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '10-12');
INSERT INTO `shipping_airmail` VALUES ('NR', '2', 2.50, 4.10, 1.00, 85.00, 99.99, 34.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('NP', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 20.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('NL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 20.00, '6');
INSERT INTO `shipping_airmail` VALUES ('AN', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 43.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('NC', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('NZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 44.00, 10.00, '6-15');
INSERT INTO `shipping_airmail` VALUES ('NI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 50.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('NE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 45.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('NG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 44.00, 30.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('NF', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 26.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('NO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 20.00, '7-10');
INSERT INTO `shipping_airmail` VALUES ('OM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 23.00, 20.00, '7-10');
INSERT INTO `shipping_airmail` VALUES ('PK', '1', 1.90, 3.10, 0.80, 99.00, 99.99, 23.00, 20.00, '7-10');
INSERT INTO `shipping_airmail` VALUES ('PA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 54.00, 20.00, '10-14');
INSERT INTO `shipping_airmail` VALUES ('PG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 37.00, 20.00, '10-12');
INSERT INTO `shipping_airmail` VALUES ('PY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 69.00, 20.00, '10-11');
INSERT INTO `shipping_airmail` VALUES ('PE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 51.00, 20.00, '7-10');
INSERT INTO `shipping_airmail` VALUES ('PH', '1', 1.90, 3.10, 0.80, 79.00, 90.00, 11.00, 30.00, '7-12');
INSERT INTO `shipping_airmail` VALUES ('PN', '2', 2.50, 4.10, 1.00, 77.00, 99.99, 30.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('PL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 29.00, 20.00, '10-11');
INSERT INTO `shipping_airmail` VALUES ('PR', '2', 2.50, 4.10, 1.00, 68.00, 99.99, 43.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('QA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 24.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('RE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 63.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('RO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 36.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('RU', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 38.00, 10.00, '10-16');
INSERT INTO `shipping_airmail` VALUES ('RW', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 53.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('AS', '2', 2.50, 4.10, 1.00, 95.00, 99.99, 48.00, 10.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('ST', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 53.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('SA', '2', 2.50, 4.10, 1.00, 96.00, 99.99, 21.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('SN', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('YU', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 30.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('SC', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('SL', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 65.00, 20.00, '8-11');
INSERT INTO `shipping_airmail` VALUES ('SG', '1', 1.90, 3.10, 0.80, 65.00, 85.00, 13.00, 30.00, '4-6');
INSERT INTO `shipping_airmail` VALUES ('SK', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 15.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('SI', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 15.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('SB', '2', 2.50, 4.10, 1.00, 92.00, 99.99, 40.00, 20.00, '9-12');
INSERT INTO `shipping_airmail` VALUES ('SO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 57.00, 20.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('ZA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('ES', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 32.00, 20.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('LK', '1', 1.90, 3.10, 0.80, 88.00, 99.99, 18.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('KN', '2', 2.50, 4.10, 1.00, 94.00, 99.99, 54.00, 20.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('SH', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 58.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('LC', '2', 2.50, 4.10, 1.00, 98.00, 99.99, 57.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('PM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('VC', '2', 2.50, 4.10, 1.00, 94.00, 99.99, 54.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('SD', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 30.00, 20.00, '9-14');
INSERT INTO `shipping_airmail` VALUES ('SR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 54.00, 20.00, '8-13');
INSERT INTO `shipping_airmail` VALUES ('SZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('SE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 20.00, '6');
INSERT INTO `shipping_airmail` VALUES ('CH', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 30.00, 30.00, '6');
INSERT INTO `shipping_airmail` VALUES ('SY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 28.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('TW', '2', 2.50, 4.10, 1.00, 85.00, 99.99, 13.00, 20.00, '6-9');
INSERT INTO `shipping_airmail` VALUES ('TJ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 47.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('TZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 46.00, 20.00, '9-12');
INSERT INTO `shipping_airmail` VALUES ('TH', '1', 1.90, 3.10, 0.80, 76.00, 90.00, 12.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('TG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 45.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('TO', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 37.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('VG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 53.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('TT', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 37.00, 20.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('TN', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 20.00, '9-10');
INSERT INTO `shipping_airmail` VALUES ('TR', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 35.00, 20.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('TM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 40.00, 10.00, '9-11');
INSERT INTO `shipping_airmail` VALUES ('TC', '2', 2.50, 4.10, 1.00, 92.00, 99.99, 52.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('TV', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 38.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('UG', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 38.00, 20.00, '9-13');
INSERT INTO `shipping_airmail` VALUES ('UA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 31.00, 20.00, '11-12');
INSERT INTO `shipping_airmail` VALUES ('AE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 23.00, 20.00, '6');
INSERT INTO `shipping_airmail` VALUES ('GB', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 33.00, 30.00, '6');
INSERT INTO `shipping_airmail` VALUES ('US', '2', 2.50, 4.10, 1.00, 75.00, 99.99, 38.00, 20.00, '6-7');
INSERT INTO `shipping_airmail` VALUES ('UY', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 50.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('UZ', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 47.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('VU', '2', 2.50, 4.10, 1.00, 85.00, 99.99, 38.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('VA', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 30.00, 20.00, '8-9');
INSERT INTO `shipping_airmail` VALUES ('VE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 43.00, 20.00, '8-10');
INSERT INTO `shipping_airmail` VALUES ('VN', '1', 1.90, 3.10, 0.80, 99.99, 99.99, 24.00, 20.00, '6-8');
INSERT INTO `shipping_airmail` VALUES ('VI', '2', 2.50, 4.10, 1.00, 68.00, 99.99, 43.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('WK', '2', 2.50, 4.10, 1.00, 63.00, 93.00, 32.00, 10.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('WF', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 37.00, 20.00, '11-16');
INSERT INTO `shipping_airmail` VALUES ('WS', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 43.00, 20.00, '10-15');
INSERT INTO `shipping_airmail` VALUES ('YE', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 37.00, 30.00, '7-8');
INSERT INTO `shipping_airmail` VALUES ('ZM', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 52.00, 20.00, '6-9');
INSERT INTO `shipping_airmail` VALUES ('ZW', '2', 2.50, 4.10, 1.00, 99.99, 99.99, 50.00, 20.00, '9-10');

-- --------------------------------------------------------

-- 
-- 表的结构 `specials`
-- 

CREATE TABLE `specials` (
  `specials_id` int(11) NOT NULL auto_increment,
  `products_id` int(11) NOT NULL default '0',
  `specials_new_products_price` decimal(15,4) NOT NULL default '0.0000',
  `specials_date_added` datetime default NULL,
  `specials_last_modified` datetime default NULL,
  `expires_date` date NOT NULL default '0001-01-01',
  `date_status_change` datetime default NULL,
  `status` int(1) NOT NULL default '1',
  `specials_date_available` date NOT NULL default '0001-01-01',
  PRIMARY KEY  (`specials_id`),
  KEY `idx_status_zen` (`status`),
  KEY `idx_products_id_zen` (`products_id`),
  KEY `idx_date_avail_zen` (`specials_date_available`),
  KEY `idx_expires_date_zen` (`expires_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `specials`
-- 

INSERT INTO `specials` VALUES (1, 40, 10.0000, '2010-11-01 16:45:13', NULL, '2017-11-07', '2010-11-01 17:00:57', 0, '2016-11-15');
INSERT INTO `specials` VALUES (2, 51, 10.0000, '2010-11-01 16:47:13', NULL, '0001-01-01', NULL, 1, '0001-01-01');
INSERT INTO `specials` VALUES (3, 2, 100.0000, '2010-11-01 16:59:52', NULL, '2010-12-31', '2011-01-04 15:27:29', 0, '2010-11-01');
INSERT INTO `specials` VALUES (4, 32, 50.0000, '2010-11-01 17:00:15', NULL, '2010-11-12', '2010-12-21 10:36:25', 0, '2010-11-01');
INSERT INTO `specials` VALUES (5, 34, 400.0000, '2010-11-01 17:00:31', NULL, '2010-11-24', '2010-12-21 10:36:25', 0, '2010-11-01');
INSERT INTO `specials` VALUES (6, 22, 30.0000, '2010-11-01 17:00:49', NULL, '2010-11-24', '2010-12-21 10:36:25', 0, '2010-11-01');
INSERT INTO `specials` VALUES (7, 54, 150.0000, '2010-11-01 17:01:12', NULL, '2010-11-29', '2010-12-21 10:36:25', 0, '2010-11-01');

-- --------------------------------------------------------

-- 
-- 表的结构 `subscribers`
-- 

CREATE TABLE `subscribers` (
  `subscriber_id` int(11) NOT NULL auto_increment,
  `customers_id` int(11) default NULL,
  `email_address` varchar(96) NOT NULL default '',
  `email_format` varchar(4) NOT NULL default 'TEXT',
  `confirmed` varchar(8) default NULL,
  `subscribed_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`subscriber_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `subscribers`
-- 

INSERT INTO `subscribers` VALUES (1, 1, '123456789@qq.com', 'TEXT', '1', '2010-11-01');
INSERT INTO `subscribers` VALUES (2, 2, 'ltm1125@163.com', 'TEXT', '1', '2010-11-02');
INSERT INTO `subscribers` VALUES (3, 3, 'test@qq.com', 'TEXT', '1', '2010-11-02');

-- --------------------------------------------------------

-- 
-- 表的结构 `tax_class`
-- 

CREATE TABLE `tax_class` (
  `tax_class_id` int(11) NOT NULL auto_increment,
  `tax_class_title` varchar(32) NOT NULL default '',
  `tax_class_description` varchar(255) NOT NULL default '',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`tax_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `tax_class`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `tax_rates`
-- 

CREATE TABLE `tax_rates` (
  `tax_rates_id` int(11) NOT NULL auto_increment,
  `tax_zone_id` int(11) NOT NULL default '0',
  `tax_class_id` int(11) NOT NULL default '0',
  `tax_priority` int(5) default '1',
  `tax_rate` decimal(7,4) NOT NULL default '0.0000',
  `tax_description` varchar(255) NOT NULL default '',
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`tax_rates_id`),
  KEY `idx_tax_zone_id_zen` (`tax_zone_id`),
  KEY `idx_tax_class_id_zen` (`tax_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `tax_rates`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `template_select`
-- 

CREATE TABLE `template_select` (
  `template_id` int(11) NOT NULL auto_increment,
  `template_dir` varchar(64) NOT NULL default '',
  `template_language` varchar(64) NOT NULL default '0',
  PRIMARY KEY  (`template_id`),
  KEY `idx_tpl_lang_zen` (`template_language`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `template_select`
-- 

INSERT INTO `template_select` VALUES (1, 'chanelwatches', '0');
INSERT INTO `template_select` VALUES (3, 'chanelwatches', '2');

-- --------------------------------------------------------

-- 
-- 表的结构 `upgrade_exceptions`
-- 

CREATE TABLE `upgrade_exceptions` (
  `upgrade_exception_id` smallint(5) NOT NULL auto_increment,
  `sql_file` varchar(50) default NULL,
  `reason` varchar(200) default NULL,
  `errordate` datetime default '0001-01-01 00:00:00',
  `sqlstatement` text,
  PRIMARY KEY  (`upgrade_exception_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- 导出表中的数据 `upgrade_exceptions`
-- 

INSERT INTO `upgrade_exceptions` VALUES (1, 'SQLPATCH', 'Cannot create table module_version_tracker because it already exists', '2010-12-21 16:58:10', 'CREATE TABLE IF NOT EXISTS module_version_tracker (');
INSERT INTO `upgrade_exceptions` VALUES (2, 'SQLPATCH', 'Cannot create table module_version_tracker because it already exists', '2010-12-21 16:58:51', 'CREATE TABLE IF NOT EXISTS module_version_tracker (');
INSERT INTO `upgrade_exceptions` VALUES (3, 'SQLPATCH', 'Cannot create table module_version_tracker because it already exists', '2010-12-21 16:59:18', 'CREATE TABLE IF NOT EXISTS module_version_tracker (');
INSERT INTO `upgrade_exceptions` VALUES (4, 'SQLPATCH', 'Cannot insert configuration_key "" because it already exists', '2010-12-21 16:59:18', 'INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES');
INSERT INTO `upgrade_exceptions` VALUES (5, 'SQLPATCH', 'Cannot insert configuration_key "" because it already exists', '2010-12-21 16:59:18', 'INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES');
INSERT INTO `upgrade_exceptions` VALUES (6, 'SQLPATCH', 'Cannot create table module_version_tracker because it already exists', '2010-12-21 16:59:48', 'CREATE TABLE IF NOT EXISTS module_version_tracker (');
INSERT INTO `upgrade_exceptions` VALUES (7, 'SQLPATCH', 'Cannot insert configuration_key "" because it already exists', '2010-12-21 17:01:48', 'INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES');
INSERT INTO `upgrade_exceptions` VALUES (8, 'SQLPATCH', 'Cannot insert configuration_key "" because it already exists', '2010-12-21 17:01:48', 'INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES');

-- --------------------------------------------------------

-- 
-- 表的结构 `website`
-- 

CREATE TABLE `website` (
  `web_id` int(11) NOT NULL auto_increment,
  `web_cid` int(11) NOT NULL,
  `web_name` varchar(200) NOT NULL,
  `web_url` varchar(200) NOT NULL,
  `web_suffix` varchar(100) NOT NULL,
  `web_start` int(11) NOT NULL,
  `web_end` int(11) NOT NULL,
  `web_coding` int(11) NOT NULL,
  `web_remarks` varchar(255) NOT NULL,
  `web_replace` varchar(200) NOT NULL,
  `web_fun_name` varchar(255) NOT NULL,
  `web_fun_content` varchar(255) NOT NULL,
  `web_fun_remarks` varchar(255) NOT NULL,
  `web_fun_a` varchar(255) NOT NULL,
  `web_fun_b` varchar(255) NOT NULL,
  `web_test_url` varchar(200) NOT NULL,
  `web_date` datetime NOT NULL,
  PRIMARY KEY  (`web_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `website`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `whos_online`
-- 

CREATE TABLE `whos_online` (
  `customer_id` int(11) default NULL,
  `full_name` varchar(64) NOT NULL default '',
  `session_id` varchar(128) NOT NULL default '',
  `ip_address` varchar(15) NOT NULL default '',
  `time_entry` varchar(14) NOT NULL default '',
  `time_last_click` varchar(14) NOT NULL default '',
  `last_page_url` varchar(255) NOT NULL default '',
  `host_address` text NOT NULL,
  `user_agent` varchar(255) NOT NULL default '',
  KEY `idx_ip_address_zen` (`ip_address`),
  KEY `idx_session_id_zen` (`session_id`),
  KEY `idx_customer_id_zen` (`customer_id`),
  KEY `idx_time_entry_zen` (`time_entry`),
  KEY `idx_time_last_click_zen` (`time_last_click`),
  KEY `idx_last_page_url_zen` (`last_page_url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `whos_online`
-- 

INSERT INTO `whos_online` VALUES (1, 'Evelyn, zhang', '4b074ceac60e2006c2bf5b9ae35a3dff', '172.16.2.22', '1294126043', '1294126119', '/lightinthebox0803/', 'OFFICE_IP_TO_HOST_ADDRESS', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');

-- --------------------------------------------------------

-- 
-- 表的结构 `zones`
-- 

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL auto_increment,
  `zone_country_id` int(11) NOT NULL default '0',
  `zone_code` varchar(32) NOT NULL default '',
  `zone_name` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`zone_id`),
  KEY `idx_zone_country_id_zen` (`zone_country_id`),
  KEY `idx_zone_code_zen` (`zone_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=190 ;

-- 
-- 导出表中的数据 `zones`
-- 

INSERT INTO `zones` VALUES (1, 223, 'AL', 'Alabama');
INSERT INTO `zones` VALUES (2, 223, 'AK', 'Alaska');
INSERT INTO `zones` VALUES (3, 223, 'AS', 'American Samoa');
INSERT INTO `zones` VALUES (4, 223, 'AZ', 'Arizona');
INSERT INTO `zones` VALUES (5, 223, 'AR', 'Arkansas');
INSERT INTO `zones` VALUES (6, 223, 'AF', 'Armed Forces Africa');
INSERT INTO `zones` VALUES (7, 223, 'AA', 'Armed Forces Americas');
INSERT INTO `zones` VALUES (8, 223, 'AC', 'Armed Forces Canada');
INSERT INTO `zones` VALUES (9, 223, 'AE', 'Armed Forces Europe');
INSERT INTO `zones` VALUES (10, 223, 'AM', 'Armed Forces Middle East');
INSERT INTO `zones` VALUES (11, 223, 'AP', 'Armed Forces Pacific');
INSERT INTO `zones` VALUES (12, 223, 'CA', 'California');
INSERT INTO `zones` VALUES (13, 223, 'CO', 'Colorado');
INSERT INTO `zones` VALUES (14, 223, 'CT', 'Connecticut');
INSERT INTO `zones` VALUES (15, 223, 'DE', 'Delaware');
INSERT INTO `zones` VALUES (16, 223, 'DC', 'District of Columbia');
INSERT INTO `zones` VALUES (17, 223, 'FM', 'Federated States Of Micronesia');
INSERT INTO `zones` VALUES (18, 223, 'FL', 'Florida');
INSERT INTO `zones` VALUES (19, 223, 'GA', 'Georgia');
INSERT INTO `zones` VALUES (20, 223, 'GU', 'Guam');
INSERT INTO `zones` VALUES (21, 223, 'HI', 'Hawaii');
INSERT INTO `zones` VALUES (22, 223, 'ID', 'Idaho');
INSERT INTO `zones` VALUES (23, 223, 'IL', 'Illinois');
INSERT INTO `zones` VALUES (24, 223, 'IN', 'Indiana');
INSERT INTO `zones` VALUES (25, 223, 'IA', 'Iowa');
INSERT INTO `zones` VALUES (26, 223, 'KS', 'Kansas');
INSERT INTO `zones` VALUES (27, 223, 'KY', 'Kentucky');
INSERT INTO `zones` VALUES (28, 223, 'LA', 'Louisiana');
INSERT INTO `zones` VALUES (29, 223, 'ME', 'Maine');
INSERT INTO `zones` VALUES (30, 223, 'MH', 'Marshall Islands');
INSERT INTO `zones` VALUES (31, 223, 'MD', 'Maryland');
INSERT INTO `zones` VALUES (32, 223, 'MA', 'Massachusetts');
INSERT INTO `zones` VALUES (33, 223, 'MI', 'Michigan');
INSERT INTO `zones` VALUES (34, 223, 'MN', 'Minnesota');
INSERT INTO `zones` VALUES (35, 223, 'MS', 'Mississippi');
INSERT INTO `zones` VALUES (36, 223, 'MO', 'Missouri');
INSERT INTO `zones` VALUES (37, 223, 'MT', 'Montana');
INSERT INTO `zones` VALUES (38, 223, 'NE', 'Nebraska');
INSERT INTO `zones` VALUES (39, 223, 'NV', 'Nevada');
INSERT INTO `zones` VALUES (40, 223, 'NH', 'New Hampshire');
INSERT INTO `zones` VALUES (41, 223, 'NJ', 'New Jersey');
INSERT INTO `zones` VALUES (42, 223, 'NM', 'New Mexico');
INSERT INTO `zones` VALUES (43, 223, 'NY', 'New York');
INSERT INTO `zones` VALUES (44, 223, 'NC', 'North Carolina');
INSERT INTO `zones` VALUES (45, 223, 'ND', 'North Dakota');
INSERT INTO `zones` VALUES (46, 223, 'MP', 'Northern Mariana Islands');
INSERT INTO `zones` VALUES (47, 223, 'OH', 'Ohio');
INSERT INTO `zones` VALUES (48, 223, 'OK', 'Oklahoma');
INSERT INTO `zones` VALUES (49, 223, 'OR', 'Oregon');
INSERT INTO `zones` VALUES (50, 163, 'PW', 'Palau');
INSERT INTO `zones` VALUES (51, 223, 'PA', 'Pennsylvania');
INSERT INTO `zones` VALUES (52, 223, 'PR', 'Puerto Rico');
INSERT INTO `zones` VALUES (53, 223, 'RI', 'Rhode Island');
INSERT INTO `zones` VALUES (54, 223, 'SC', 'South Carolina');
INSERT INTO `zones` VALUES (55, 223, 'SD', 'South Dakota');
INSERT INTO `zones` VALUES (56, 223, 'TN', 'Tennessee');
INSERT INTO `zones` VALUES (57, 223, 'TX', 'Texas');
INSERT INTO `zones` VALUES (58, 223, 'UT', 'Utah');
INSERT INTO `zones` VALUES (59, 223, 'VT', 'Vermont');
INSERT INTO `zones` VALUES (60, 223, 'VI', 'Virgin Islands');
INSERT INTO `zones` VALUES (61, 223, 'VA', 'Virginia');
INSERT INTO `zones` VALUES (62, 223, 'WA', 'Washington');
INSERT INTO `zones` VALUES (63, 223, 'WV', 'West Virginia');
INSERT INTO `zones` VALUES (64, 223, 'WI', 'Wisconsin');
INSERT INTO `zones` VALUES (65, 223, 'WY', 'Wyoming');
INSERT INTO `zones` VALUES (66, 38, 'AB', 'Alberta');
INSERT INTO `zones` VALUES (67, 38, 'BC', 'British Columbia');
INSERT INTO `zones` VALUES (68, 38, 'MB', 'Manitoba');
INSERT INTO `zones` VALUES (69, 38, 'NL', 'Newfoundland');
INSERT INTO `zones` VALUES (70, 38, 'NB', 'New Brunswick');
INSERT INTO `zones` VALUES (71, 38, 'NS', 'Nova Scotia');
INSERT INTO `zones` VALUES (72, 38, 'NT', 'Northwest Territories');
INSERT INTO `zones` VALUES (73, 38, 'NU', 'Nunavut');
INSERT INTO `zones` VALUES (74, 38, 'ON', 'Ontario');
INSERT INTO `zones` VALUES (75, 38, 'PE', 'Prince Edward Island');
INSERT INTO `zones` VALUES (76, 38, 'QC', 'Quebec');
INSERT INTO `zones` VALUES (77, 38, 'SK', 'Saskatchewan');
INSERT INTO `zones` VALUES (78, 38, 'YT', 'Yukon Territory');
INSERT INTO `zones` VALUES (79, 81, 'NDS', 'Niedersachsen');
INSERT INTO `zones` VALUES (80, 81, 'BAW', 'Baden WÃ¼rtemberg');
INSERT INTO `zones` VALUES (81, 81, 'BAY', 'Bayern');
INSERT INTO `zones` VALUES (82, 81, 'BER', 'Berlin');
INSERT INTO `zones` VALUES (83, 81, 'BRG', 'Brandenburg');
INSERT INTO `zones` VALUES (84, 81, 'BRE', 'Bremen');
INSERT INTO `zones` VALUES (85, 81, 'HAM', 'Hamburg');
INSERT INTO `zones` VALUES (86, 81, 'HES', 'Hessen');
INSERT INTO `zones` VALUES (87, 81, 'MEC', 'Mecklenburg-Vorpommern');
INSERT INTO `zones` VALUES (88, 81, 'NRW', 'Nordrhein-Westfalen');
INSERT INTO `zones` VALUES (89, 81, 'RHE', 'Rheinland-Pfalz');
INSERT INTO `zones` VALUES (90, 81, 'SAR', 'Saarland');
INSERT INTO `zones` VALUES (91, 81, 'SAS', 'Sachsen');
INSERT INTO `zones` VALUES (92, 81, 'SAC', 'Sachsen-Anhalt');
INSERT INTO `zones` VALUES (93, 81, 'SCN', 'Schleswig-Holstein');
INSERT INTO `zones` VALUES (94, 81, 'THE', 'Thringen');
INSERT INTO `zones` VALUES (95, 14, 'WI', 'Wien');
INSERT INTO `zones` VALUES (96, 14, 'NO', 'Niedersterreich');
INSERT INTO `zones` VALUES (97, 14, 'OO', 'Obersterreich');
INSERT INTO `zones` VALUES (98, 14, 'SB', 'Salzburg');
INSERT INTO `zones` VALUES (99, 14, 'KN', 'KÃ¤rnten');
INSERT INTO `zones` VALUES (100, 14, 'ST', 'Steiermark');
INSERT INTO `zones` VALUES (101, 14, 'TI', 'Tirol');
INSERT INTO `zones` VALUES (102, 14, 'BL', 'Burgenland');
INSERT INTO `zones` VALUES (103, 14, 'VB', 'Voralberg');
INSERT INTO `zones` VALUES (104, 204, 'AG', 'Aargau');
INSERT INTO `zones` VALUES (105, 204, 'AI', 'Appenzell Innerrhoden');
INSERT INTO `zones` VALUES (106, 204, 'AR', 'Appenzell Ausserrhoden');
INSERT INTO `zones` VALUES (107, 204, 'BE', 'Bern');
INSERT INTO `zones` VALUES (108, 204, 'BL', 'Basel-Landschaft');
INSERT INTO `zones` VALUES (109, 204, 'BS', 'Basel-Stadt');
INSERT INTO `zones` VALUES (110, 204, 'FR', 'Freiburg');
INSERT INTO `zones` VALUES (111, 204, 'GE', 'Genf');
INSERT INTO `zones` VALUES (112, 204, 'GL', 'Glarus');
INSERT INTO `zones` VALUES (113, 204, 'JU', 'Graubnden');
INSERT INTO `zones` VALUES (114, 204, 'JU', 'Jura');
INSERT INTO `zones` VALUES (115, 204, 'LU', 'Luzern');
INSERT INTO `zones` VALUES (116, 204, 'NE', 'Neuenburg');
INSERT INTO `zones` VALUES (117, 204, 'NW', 'Nidwalden');
INSERT INTO `zones` VALUES (118, 204, 'OW', 'Obwalden');
INSERT INTO `zones` VALUES (119, 204, 'SG', 'St. Gallen');
INSERT INTO `zones` VALUES (120, 204, 'SH', 'Schaffhausen');
INSERT INTO `zones` VALUES (121, 204, 'SO', 'Solothurn');
INSERT INTO `zones` VALUES (122, 204, 'SZ', 'Schwyz');
INSERT INTO `zones` VALUES (123, 204, 'TG', 'Thurgau');
INSERT INTO `zones` VALUES (124, 204, 'TI', 'Tessin');
INSERT INTO `zones` VALUES (125, 204, 'UR', 'Uri');
INSERT INTO `zones` VALUES (126, 204, 'VD', 'Waadt');
INSERT INTO `zones` VALUES (127, 204, 'VS', 'Wallis');
INSERT INTO `zones` VALUES (128, 204, 'ZG', 'Zug');
INSERT INTO `zones` VALUES (129, 204, 'ZH', 'Zrich');
INSERT INTO `zones` VALUES (130, 195, 'A Corua', 'A Corua');
INSERT INTO `zones` VALUES (131, 195, 'Alava', 'Alava');
INSERT INTO `zones` VALUES (132, 195, 'Albacete', 'Albacete');
INSERT INTO `zones` VALUES (133, 195, 'Alicante', 'Alicante');
INSERT INTO `zones` VALUES (134, 195, 'Almeria', 'Almeria');
INSERT INTO `zones` VALUES (135, 195, 'Asturias', 'Asturias');
INSERT INTO `zones` VALUES (136, 195, 'Avila', 'Avila');
INSERT INTO `zones` VALUES (137, 195, 'Badajoz', 'Badajoz');
INSERT INTO `zones` VALUES (138, 195, 'Baleares', 'Baleares');
INSERT INTO `zones` VALUES (139, 195, 'Barcelona', 'Barcelona');
INSERT INTO `zones` VALUES (140, 195, 'Burgos', 'Burgos');
INSERT INTO `zones` VALUES (141, 195, 'Caceres', 'Caceres');
INSERT INTO `zones` VALUES (142, 195, 'Cadiz', 'Cadiz');
INSERT INTO `zones` VALUES (143, 195, 'Cantabria', 'Cantabria');
INSERT INTO `zones` VALUES (144, 195, 'Castellon', 'Castellon');
INSERT INTO `zones` VALUES (145, 195, 'Ceuta', 'Ceuta');
INSERT INTO `zones` VALUES (146, 195, 'Ciudad Real', 'Ciudad Real');
INSERT INTO `zones` VALUES (147, 195, 'Cordoba', 'Cordoba');
INSERT INTO `zones` VALUES (148, 195, 'Cuenca', 'Cuenca');
INSERT INTO `zones` VALUES (149, 195, 'Girona', 'Girona');
INSERT INTO `zones` VALUES (150, 195, 'Granada', 'Granada');
INSERT INTO `zones` VALUES (151, 195, 'Guadalajara', 'Guadalajara');
INSERT INTO `zones` VALUES (152, 195, 'Guipuzcoa', 'Guipuzcoa');
INSERT INTO `zones` VALUES (153, 195, 'Huelva', 'Huelva');
INSERT INTO `zones` VALUES (154, 195, 'Huesca', 'Huesca');
INSERT INTO `zones` VALUES (155, 195, 'Jaen', 'Jaen');
INSERT INTO `zones` VALUES (156, 195, 'La Rioja', 'La Rioja');
INSERT INTO `zones` VALUES (157, 195, 'Las Palmas', 'Las Palmas');
INSERT INTO `zones` VALUES (158, 195, 'Leon', 'Leon');
INSERT INTO `zones` VALUES (159, 195, 'Lleida', 'Lleida');
INSERT INTO `zones` VALUES (160, 195, 'Lugo', 'Lugo');
INSERT INTO `zones` VALUES (161, 195, 'Madrid', 'Madrid');
INSERT INTO `zones` VALUES (162, 195, 'Malaga', 'Malaga');
INSERT INTO `zones` VALUES (163, 195, 'Melilla', 'Melilla');
INSERT INTO `zones` VALUES (164, 195, 'Murcia', 'Murcia');
INSERT INTO `zones` VALUES (165, 195, 'Navarra', 'Navarra');
INSERT INTO `zones` VALUES (166, 195, 'Ourense', 'Ourense');
INSERT INTO `zones` VALUES (167, 195, 'Palencia', 'Palencia');
INSERT INTO `zones` VALUES (168, 195, 'Pontevedra', 'Pontevedra');
INSERT INTO `zones` VALUES (169, 195, 'Salamanca', 'Salamanca');
INSERT INTO `zones` VALUES (170, 195, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife');
INSERT INTO `zones` VALUES (171, 195, 'Segovia', 'Segovia');
INSERT INTO `zones` VALUES (172, 195, 'Sevilla', 'Sevilla');
INSERT INTO `zones` VALUES (173, 195, 'Soria', 'Soria');
INSERT INTO `zones` VALUES (174, 195, 'Tarragona', 'Tarragona');
INSERT INTO `zones` VALUES (175, 195, 'Teruel', 'Teruel');
INSERT INTO `zones` VALUES (176, 195, 'Toledo', 'Toledo');
INSERT INTO `zones` VALUES (177, 195, 'Valencia', 'Valencia');
INSERT INTO `zones` VALUES (178, 195, 'Valladolid', 'Valladolid');
INSERT INTO `zones` VALUES (179, 195, 'Vizcaya', 'Vizcaya');
INSERT INTO `zones` VALUES (180, 195, 'Zamora', 'Zamora');
INSERT INTO `zones` VALUES (181, 195, 'Zaragoza', 'Zaragoza');
INSERT INTO `zones` VALUES (182, 13, 'ACT', 'Australian Capital Territory');
INSERT INTO `zones` VALUES (183, 13, 'NSW', 'New South Wales');
INSERT INTO `zones` VALUES (184, 13, 'NT', 'Northern Territory');
INSERT INTO `zones` VALUES (185, 13, 'QLD', 'Queensland');
INSERT INTO `zones` VALUES (186, 13, 'SA', 'South Australia');
INSERT INTO `zones` VALUES (187, 13, 'TAS', 'Tasmania');
INSERT INTO `zones` VALUES (188, 13, 'VIC', 'Victoria');
INSERT INTO `zones` VALUES (189, 13, 'WA', 'Western Australia');

-- --------------------------------------------------------

-- 
-- 表的结构 `zones_to_geo_zones`
-- 

CREATE TABLE `zones_to_geo_zones` (
  `association_id` int(11) NOT NULL auto_increment,
  `zone_country_id` int(11) NOT NULL default '0',
  `zone_id` int(11) default NULL,
  `geo_zone_id` int(11) default NULL,
  `last_modified` datetime default NULL,
  `date_added` datetime NOT NULL default '0001-01-01 00:00:00',
  PRIMARY KEY  (`association_id`),
  KEY `idx_zones_zen` (`geo_zone_id`,`zone_country_id`,`zone_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `zones_to_geo_zones`
-- 

