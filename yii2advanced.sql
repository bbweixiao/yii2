/*
Navicat MySQL Data Transfer

Source Server         : 3306
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2018-11-27 17:34:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('权限控制', '563', '1543305151');
INSERT INTO `auth_assignment` VALUES ('测试', '1', '1543310838');
INSERT INTO `auth_assignment` VALUES ('测试', '564', '1540440587');
INSERT INTO `auth_assignment` VALUES ('测试权限', '563', '1543305096');
INSERT INTO `auth_assignment` VALUES ('站长', '563', '1540373924');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1540373788', '1540373788');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/user/*', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1540373787', '1540373787');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/site/signup', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/test/*', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/test/create', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/test/delete', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/test/index', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/test/update', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/test/view', '2', null, null, null, '1540373789', '1540373789');
INSERT INTO `auth_item` VALUES ('/v1/*', '2', null, null, null, '1540546505', '1540546505');
INSERT INTO `auth_item` VALUES ('/v1/default/*', '2', null, null, null, '1540546505', '1540546505');
INSERT INTO `auth_item` VALUES ('/v1/default/index', '2', null, null, null, '1540546505', '1540546505');
INSERT INTO `auth_item` VALUES ('/v1/goods/*', '2', null, null, null, '1540546505', '1540546505');
INSERT INTO `auth_item` VALUES ('/v1/goods/index', '2', null, null, null, '1540546505', '1540546505');
INSERT INTO `auth_item` VALUES ('权限控制', '2', null, null, null, '1540373835', '1540373835');
INSERT INTO `auth_item` VALUES ('测试', '1', null, null, null, '1540440129', '1540440129');
INSERT INTO `auth_item` VALUES ('测试权限', '2', null, null, null, '1540440063', '1540440063');
INSERT INTO `auth_item` VALUES ('站长', '1', null, null, null, '1540373894', '1540373894');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/user/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/user/reset-identity');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/debug/user/set-identity');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/default/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/site/*');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/site/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/site/error');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/site/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/site/login');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/site/signup');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/test/*');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/test/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/test/create');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/test/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/test/delete');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/test/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/test/index');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/test/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/test/update');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/test/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/test/view');
INSERT INTO `auth_item_child` VALUES ('测试权限', '/test/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/v1/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/v1/default/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/v1/default/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/v1/goods/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/v1/goods/index');
INSERT INTO `auth_item_child` VALUES ('站长', '权限控制');
INSERT INTO `auth_item_child` VALUES ('测试', '测试权限');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '11111');
INSERT INTO `goods` VALUES ('3', '333');
INSERT INTO `goods` VALUES ('4', '444');
INSERT INTO `goods` VALUES ('5', '555');
INSERT INTO `goods` VALUES ('6', '');
INSERT INTO `goods` VALUES ('7', '');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `auth_key` varchar(32) DEFAULT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) DEFAULT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '邮箱验证token',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `role` smallint(6) DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) DEFAULT '10' COMMENT '状态',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip等级',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL,
  `access_token` varchar(60) DEFAULT NULL COMMENT '自动登录key',
  `user_type` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'fbbweixiao_1', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419', 'XuHRGK1v2K1qv7PRmMVqyL_dveJvjLkd_1543213543', null);
INSERT INTO `member` VALUES ('2', 'ceshi', 'MDrhXYXhJuDEgylQO-U6nLdY0ku8MAky', '$2y$13$P7kIGErpqLwvI.fJjCFni.z0bk8PnzZEvKhjbNK/ga73QC5k8B6DC', null, null, '896916167@qq.com', '10', '10', null, '0', '1540439806', '1540439806', null, null);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '权限控制', null, null, null, 0x7B2269636F6E223A22676C79706869636F6E20676C79706869636F6E2D636F67222C2276697369626C65223A747275657D);
INSERT INTO `menu` VALUES ('2', '路由', '1', '/admin/route/index', '1', 0x7B2269636F6E223A2266696C652D636F64652D6F222C2276697369626C65223A747275657D);
INSERT INTO `menu` VALUES ('3', '权限', '1', '/admin/permission/index', '2', null);
INSERT INTO `menu` VALUES ('4', '角色列表', '1', '/admin/role/index', '3', null);
INSERT INTO `menu` VALUES ('5', '分配角色', '1', '/admin/assignment/index', '4', null);
INSERT INTO `menu` VALUES ('6', '菜单维护', '1', '/admin/menu/index', '5', null);
INSERT INTO `menu` VALUES ('7', '用户信息', '1', '/admin/user/index', '7', null);
INSERT INTO `menu` VALUES ('8', '用户测试', null, null, null, null);
INSERT INTO `menu` VALUES ('9', '测试（test）', '8', '/test/index', '1', null);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `auth_key` varchar(32) DEFAULT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) DEFAULT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '邮箱验证token',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `role` smallint(6) DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) DEFAULT '10' COMMENT '状态',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip等级',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=587 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('563', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('564', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('566', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('567', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('568', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('569', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('570', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('571', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('572', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('573', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('574', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('575', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('576', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('577', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('578', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('579', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('580', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('581', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('582', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('583', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('584', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('585', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419');
INSERT INTO `test` VALUES ('586', 'fbbweixiao', '', '', '', '', '', null, null, '', null, null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `auth_key` varchar(32) DEFAULT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) DEFAULT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '邮箱验证token',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `role` smallint(6) DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) DEFAULT '10' COMMENT '状态',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip等级',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL,
  `access_token` varchar(60) DEFAULT NULL COMMENT '自动登录key',
  `user_type` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('563', 'fbbweixiao', 'xnv7L_e4pfDz0na1_zLMYh4_urLs79Mr', '$2y$13$cNuvqdsUXeacZh2A01HWku96W547zoGLW2UR7H9me4xq9CfAV9ZY.', null, null, 'fbbweixiao@sina.com', '10', '10', null, '0', '1530507419', '1530507419', 'XuHRGK1v2K1qv7PRmMVqyL_dveJvjLkd_1543213543', null);
INSERT INTO `user` VALUES ('564', 'ceshi', 'MDrhXYXhJuDEgylQO-U6nLdY0ku8MAky', '$2y$13$P7kIGErpqLwvI.fJjCFni.z0bk8PnzZEvKhjbNK/ga73QC5k8B6DC', null, null, '896916167@qq.com', '10', '10', null, '0', '1540439806', '1540439806', null, null);
