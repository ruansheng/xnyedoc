DROP DATABASE IF EXISTS `doc`;
CREATE DATABASE `doc`;
use `doc`;
/*项目表*/
DROP TABLE IF EXISTS `doc_project`;
CREATE TABLE `doc_project`(
	`project_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目id',
	`project_name` varchar(30) NOT NULL DEFAULT '' COMMENT '项目名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	`project_icon` varchar(200) NOT NULL DEFAULT '' COMMENT '项目图片icon',
	`project_desc` varchar(200) NOT NULL DEFAULT '' COMMENT '项目描述',
	PRIMARY KEY (`project_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目表';

/*用户组*/
DROP TABLE IF EXISTS `doc_user_group`;
CREATE TABLE `doc_user_group`(
	`group_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id',
	`group_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户组name',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	PRIMARY KEY (`group_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户组表';

/*用户表*/
DROP TABLE IF EXISTS `doc_user`;
CREATE TABLE `doc_user`(
	`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
	`user_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户name',
	`password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	PRIMARY KEY (`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

/*模块表*/
DROP TABLE IF EXISTS `doc_module`;
CREATE TABLE `doc_module`(
	`module_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '模块id',
	`module_name` varchar(20) NOT NULL DEFAULT '' COMMENT '模块名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	PRIMARY KEY (`module_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模块表';

/*接口表*/
DROP TABLE IF EXISTS `doc_interface`;
CREATE TABLE `doc_interface`(
	`interface_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
	`project_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属项目',
	`module_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属模块',
	`method_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '接口方法',
	`version_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '接口版本',
	`interface_name` varchar(40) NOT NULL DEFAULT '' COMMENT '接口name',
	`interface_content` varchar(2000) NOT NULL DEFAULT '' COMMENT '接口内容',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	PRIMARY KEY (`interface_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='接口表';

/*请求方法表*/
DROP TABLE IF EXISTS `doc_method`;
CREATE TABLE `doc_method`(
	`method_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '方法id',
	`method_name` varchar(20) NOT NULL DEFAULT '' COMMENT '方法名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	PRIMARY KEY (`method_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='请求方法表';

/*版本表*/
DROP TABLE IF EXISTS `doc_version`;
CREATE TABLE `doc_version`(
	`version_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '版本id',
	`version_name` varchar(20) NOT NULL DEFAULT '' COMMENT '版本名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	PRIMARY KEY (`version_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='版本表';





