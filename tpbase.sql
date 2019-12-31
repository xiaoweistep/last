/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : tpbase

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-12-31 15:25:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码;',
  `user_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '用户状态 0:正常,1:禁用',
  `user_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '中国手机不带国家代码，国际手机号格式为：国家代码-手机号',
  `user_email` varchar(40) NOT NULL DEFAULT '' COMMENT '用户登录邮箱',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `delete_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_login` (`user_login`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '0', '0', '18814126846', '40363946@qq.com', '1544061818', '127.0.0.1', '0', null);
INSERT INTO `tp_admin` VALUES ('91', 'xiaowei', 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '13710245637', '403613945@qq.com', '0', '', '1577677533', null);
INSERT INTO `tp_admin` VALUES ('92', 'ceshi2', 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '13710245637', '403613945', '0', '', '1577677561', null);
INSERT INTO `tp_admin` VALUES ('93', 'ceshi2', 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '13710245637', '403613945', '0', '', '1577677565', null);

-- ----------------------------
-- Table structure for tp_adminlog
-- ----------------------------
DROP TABLE IF EXISTS `tp_adminlog`;
CREATE TABLE `tp_adminlog` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `operate_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后访问时间',
  `action` varchar(50) NOT NULL DEFAULT '' COMMENT '操作名称;格式:应用名+控制器+操作名,也可自己定义格式只要不发生冲突且惟一;',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT '用户ip',
  `admin_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户ip',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `user_object_action` (`admin_id`,`action`) USING BTREE,
  KEY `user_object_action_ip` (`admin_id`,`action`,`ip`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='访问记录表';

-- ----------------------------
-- Records of tp_adminlog
-- ----------------------------
INSERT INTO `tp_adminlog` VALUES ('2', '1', '1576810096', '登录', '127.0.0.1', 'admin');
INSERT INTO `tp_adminlog` VALUES ('3', '1', '1577179256', '登录', '127.0.0.1', 'admin');
INSERT INTO `tp_adminlog` VALUES ('4', '1', '1577347084', '登录', '127.0.0.1', 'admin');
INSERT INTO `tp_adminlog` VALUES ('5', '1', '1577347746', '登录', '127.0.0.1', 'admin');
INSERT INTO `tp_adminlog` VALUES ('6', '1', '1577427178', '登录', '127.0.0.1', 'admin');
INSERT INTO `tp_adminlog` VALUES ('7', '1', '1577667832', '登录', '127.0.0.1', 'admin');
INSERT INTO `tp_adminlog` VALUES ('8', '1', '1577754236', '登录', '127.0.0.1', 'admin');

-- ----------------------------
-- Table structure for tp_baseset
-- ----------------------------
DROP TABLE IF EXISTS `tp_baseset`;
CREATE TABLE `tp_baseset` (
  `id` smallint(3) unsigned NOT NULL,
  `company_name` char(50) DEFAULT NULL COMMENT '公司名称',
  `contact_number` int(11) DEFAULT NULL COMMENT '联系电话',
  `address` char(100) DEFAULT NULL COMMENT '公司地址',
  `email` char(20) DEFAULT NULL COMMENT '联系邮箱',
  `weibo` char(20) DEFAULT NULL COMMENT '官方微博',
  `service_hotline` char(50) DEFAULT NULL COMMENT '服务热线',
  `icp_number` char(50) DEFAULT NULL COMMENT '备案号',
  `copyright_number` char(50) DEFAULT NULL COMMENT '版权所有',
  `contact_people` varchar(30) DEFAULT NULL COMMENT '联系电话',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_baseset
-- ----------------------------
INSERT INTO `tp_baseset` VALUES ('1', '友汇1', '2147483647', '广州市越秀区沿江中路313号', '403613945@qq.com', '403613945@qq.com', '456455-45451', '桂ICP备18007650号-1', '广西集合吧信息技术有限公司', '刘先生');

-- ----------------------------
-- Table structure for tp_role
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  `action_list` text COMMENT '操作权限列表',
  `delete_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='角色表';

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('1', '超级管理员', '拥有网站最高管理员权限！', '1329633709', '1329633709', '0', null, null);
INSERT INTO `tp_role` VALUES ('2', '文章管理', '', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for tp_role_action
-- ----------------------------
DROP TABLE IF EXISTS `tp_role_action`;
CREATE TABLE `tp_role_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '操作名称',
  `action_url` varchar(60) DEFAULT NULL COMMENT '链接',
  `action_type` varchar(30) NOT NULL DEFAULT '' COMMENT '所属模块',
  `parent_id` int(3) DEFAULT '0',
  `delete_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='角色表';

-- ----------------------------
-- Records of tp_role_action
-- ----------------------------
INSERT INTO `tp_role_action` VALUES ('1', '管理员模块', '#', 'user', '0', null);
INSERT INTO `tp_role_action` VALUES ('2', '管理员列表', '##', 'user', '1', null);
INSERT INTO `tp_role_action` VALUES ('3', '广告管理', '#', 'ad', '0', null);
