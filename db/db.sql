DROP DATABASE IF EXISTS `doc`;
CREATE DATABASE `doc`;

/*项目表*/
DROP TABLE `doc_project` IF EXISTS `doc_project`;
CREATE TABLE IF EXISTS `doc_project`(
	`project_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
	`project_name` varchar(30) NOT NULL DEFAULT '' COMMENT '版本名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
);

/*用户组*/
DROP TABLE `doc_user_group` IF EXISTS `doc_user_group`;
CREATE TABLE `doc_user_group`(
	`group_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
	`group_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户组name',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用'
);

/*用户表*/
DROP TABLE `doc_user` IF EXISTS `doc_user`;
CREATE TABLE IF EXISTS `doc_user`(
	`user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
	`user_name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户name',
	`password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用'
);

/*接口表*/
DROP TABLE `doc_interface` IF EXISTS `doc_interface`;
CREATE TABLE IF EXISTS `doc_interface`(
	`interface_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
	`interface_name` varchar(40) NOT NULL DEFAULT '' COMMENT '接口name',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_del` int(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用'
);

/*请求方法表*/
DROP TABLE `doc_method` IF EXISTS `doc_method`;
CREATE TABLE IF EXISTS `doc_method`(
	`method_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '方法id',
	`method_name` varchar(20) NOT NULL DEFAULT '' COMMENT '方法名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间'
);

/*版本表*/
DROP TABLE `doc_version` IF EXISTS `doc_version`;
CREATE TABLE IF EXISTS `doc_version`(
	`version_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
	`version_name` varchar(20) NOT NULL DEFAULT '' COMMENT '版本名称',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
);





