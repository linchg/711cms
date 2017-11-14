SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"$$
SET time_zone = "+00:00"$$

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */$$
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */$$
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */$$
/*!40101 SET NAMES utf8 */$$



DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>admin`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>admin` (
  `uid` int(11) unsigned NOT NULL,
  `uname` varchar(100) NOT NULL DEFAULT '' COMMENT '账号',
  `upass` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `ustate` int(2) NOT NULL DEFAULT '1' COMMENT '用户状态（正常=1）',
  `reg_date` int(11) NOT NULL DEFAULT '0' COMMENT '开通时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台管理表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>operate_log`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>operate_log` (
`log_id` INT unsigned NOT NULL COMMENT 'log id' ,
`log_admin` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '登录账号' ,
`log_time` INT unsigned NOT NULL COMMENT '操作时间' ,
`log_ip` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '登录ip' ,
`log_controller` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '操作模块' ,
`log_model` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '操作方法' ,
`log_content` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '操作内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='操作日志表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>advert`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>advert` (
  `ad_id` int(11) unsigned NOT NULL,
  `ad_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '广告标题',
  `ad_type` tinyint(3) unsigned NOT NULL COMMENT '广告类型1PC轮播 2手机轮播',
  `ad_alts` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '图片文字',
  `ad_images` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '广告图片',
  `ad_links` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '广告链接',
  `ad_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  `ad_time` int(10) unsigned NOT NULL COMMENT '更新时间',
  `uid` int(10) unsigned NOT NULL COMMENT '添加人'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位置（广告，推荐位，专题）'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>app`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>app` (
  `app_id` int(11) unsigned NOT NULL COMMENT '应用id',
  `last_cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '终极分类ID',
  `app_title` varchar(500) NOT NULL DEFAULT '' COMMENT '应用名称',
  `app_stitle` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `app_update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间（最新）',
  `app_type` varchar(20) NOT NULL DEFAULT '' COMMENT '软件类型：免费/收费',
  `app_logo` varchar(500) NOT NULL DEFAULT '' COMMENT '缩略图',
  `app_desc` text COMMENT '应用详情',
  `app_company` varchar(500) NOT NULL DEFAULT '' COMMENT '开发商',
  `app_company_url` varchar(500) NOT NULL DEFAULT '' COMMENT '开发商网址',
  `app_tags` varchar(1000) NOT NULL DEFAULT '' COMMENT '标签',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '入库时间',
  `app_grade` float NOT NULL DEFAULT '0' COMMENT '用户评分',
  `app_recomment` float NOT NULL DEFAULT '0' COMMENT '系统评分',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发布人ID',
  `app_comments` int(11) NOT NULL DEFAULT '0' COMMENT '评论量',
  `app_visitors` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `app_down` int(11) NOT NULL DEFAULT '0' COMMENT '下载量',
  `app_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `data_app_id` int(11) NOT NULL DEFAULT '0' COMMENT '数据中心应用ID',
  `charge_app_id` int(11) NOT NULL DEFAULT '0' COMMENT '独立计费包ID',
  `app_seodesc` varchar(256) NOT NULL DEFAULT '' COMMENT 'seodesc',
  `app_seokey` varchar(256) NOT NULL DEFAULT '' COMMENT 'seokey'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='应用表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>app_category`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>app_category` (
  `cate_id` int(11) unsigned NOT NULL COMMENT '类别id',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类id',
  `cname` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `cname_py` varchar(100) NOT NULL DEFAULT '' COMMENT '分类字母别名',
  `ctitle` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `ckey` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `cdesc` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `corder` int(11) NOT NULL DEFAULT '0' COMMENT '分类排序',
  `cat_show` int(2) NOT NULL DEFAULT '1' COMMENT '是否显示分类',
  `cate_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '分类图标'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>app_comment`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>app_comment` (
  `comment_id` int(11) unsigned NOT NULL COMMENT '评论id',
  `info_app_id` int(11) NOT NULL COMMENT '应用id，资讯id',
  `comment_content` varchar(500) NOT NULL DEFAULT '' COMMENT '评论内容',
  `comment_date` int(11) NOT NULL COMMENT '发布时间',
  `comment_user` int(11) NOT NULL COMMENT '用户id',
  `comment_uname` varchar(500) NOT NULL DEFAULT '' COMMENT '昵称',
  `comment_ip` varchar(15) NOT NULL COMMENT 'ip地址',
  `comment_parent` int(11) unsigned NOT NULL COMMENT '上级id',
  `comment_check` tinyint(4) unsigned NOT NULL COMMENT '是否审核',
  `comment_good` int(11) unsigned NOT NULL COMMENT '赞',
  `comment_bad` int(11) unsigned NOT NULL COMMENT '踩'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>flink`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>flink` (
  `flink_id` int(11) unsigned NOT NULL COMMENT '友情ID',
  `flink_name` varchar(100) NOT NULL DEFAULT '' COMMENT '链接文字',
  `flink_img` varchar(500) NOT NULL DEFAULT '' COMMENT '链接图片',
  `flink_url` varchar(500) NOT NULL DEFAULT '' COMMENT '链接地址',
  `flink_type` tinyint(3) unsigned DEFAULT NULL COMMENT '1=首页，2全站',
  `flink_order` int(11) DEFAULT '0' COMMENT '排序',
  `flink_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `uid` int(10) unsigned NOT NULL COMMENT 'uid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>gather`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>gather` (
  `gather_id` int(10) unsigned NOT NULL,
  `gather_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '采集名称',
  `gather_site` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '网站地址',
  `cate_id` int(10) unsigned NOT NULL COMMENT '采集分类',
  `gather_charset` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '页面编码',
  `gather_is_local` tinyint(3) unsigned NOT NULL COMMENT '是否本地化图片',
  `gather_index_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '列表首页地址',
  `gather_list_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '列表页地址',
  `gather_page_start` int(10) unsigned NOT NULL COMMENT '列表开始页',
  `gather_page_end` int(10) unsigned NOT NULL COMMENT '列表结束页',
  `gather_list_sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '文章列表标签',
  `gather_list_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '列表链接标签',
  `gather_title_sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '文章标题标签',
  `gather_content_sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容标题标签',
  `gather_time` int(10) unsigned NOT NULL COMMENT '更新时间',
  `uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='采集信息表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>history`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>history` (
  `history_id` int(11) unsigned NOT NULL COMMENT 'app下载id',
  `app_id` int(11) NOT NULL DEFAULT '0' COMMENT '应用ID',
  `history_version` varchar(500) NOT NULL DEFAULT '' COMMENT '版本号',
  `history_update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `history_size` varchar(500) NOT NULL DEFAULT '' COMMENT '程序大小',
  `history_system` varchar(500) NOT NULL DEFAULT '' COMMENT '系统要求',
  `data_history_id` int(11) NOT NULL DEFAULT '0' COMMENT '数据中心下载ID',
  `history_type` int(11) NOT NULL DEFAULT '0' COMMENT '应用类型 1 android，2 苹果',
  `history_minSdkVersion` int(10) NOT NULL DEFAULT '0' COMMENT '要求的android的最低版本',
  `history_package` varchar(64) NOT NULL DEFAULT '' COMMENT 'android的包名',
  `history_VersionCode` int(10) NOT NULL DEFAULT '0' COMMENT '包的开发版本',
  `history_permission` text NOT NULL COMMENT 'permission',
  `history_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '文件路径'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='应用历史版本表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>import`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>import` (
  `info_id` int(11) unsigned NOT NULL COMMENT '资讯id',
  `last_cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '终极分类ID',
  `info_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `info_stitle` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'SEO标题',
  `info_img` varchar(500) NOT NULL DEFAULT '' COMMENT '缩略图',
  `info_desc` varchar(500) NOT NULL DEFAULT '' COMMENT '摘要',
  `info_body` text COMMENT '详情',
  `info_tags` varchar(1000) NOT NULL DEFAULT '' COMMENT '标签',
  `info_update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `info_from` varchar(500) NOT NULL DEFAULT '' COMMENT '来源',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发布人ID',
  `info_comments` int(11) NOT NULL DEFAULT '0' COMMENT '评论量',
  `info_visitors` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `info_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `info_url` varchar(500) NOT NULL DEFAULT '' COMMENT '外部URL',
  `info_publish_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `info_seodesc` varchar(256) NOT NULL DEFAULT '' COMMENT 'seodesc',
  `info_seokey` varchar(256) NOT NULL DEFAULT '' COMMENT 'seokey',
  `info_status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `gather_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gather_id` int(10) unsigned NOT NULL,
  `info_author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '作者'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资讯表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>info`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>info` (
  `info_id` int(11) unsigned NOT NULL COMMENT '资讯id',
  `last_cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '终极分类ID',
  `info_title` varchar(500) NOT NULL DEFAULT '' COMMENT '标题',
  `info_stitle` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `info_img` varchar(500) NOT NULL DEFAULT '' COMMENT '缩略图',
  `info_desc` varchar(500) NOT NULL DEFAULT '' COMMENT '摘要',
  `info_body` text COMMENT '详情',
  `info_tags` varchar(1000) NOT NULL DEFAULT '' COMMENT '标签',
  `info_update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `info_from` varchar(500) NOT NULL DEFAULT '' COMMENT '来源',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发布人ID',
  `info_comments` int(11) NOT NULL DEFAULT '0' COMMENT '评论量',
  `info_visitors` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `info_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `info_url` varchar(500) NOT NULL DEFAULT '' COMMENT '外部URL',
  `info_publish_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `info_seodesc` varchar(256) NOT NULL DEFAULT '' COMMENT 'seodesc',
  `info_seokey` varchar(256) NOT NULL DEFAULT '' COMMENT 'seokey',
  `info_status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `info_author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '作者'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资讯表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>info_category`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>info_category` (
  `cate_id` int(11) unsigned NOT NULL COMMENT '类别id',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类id',
  `cname` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `cname_py` varchar(100) NOT NULL DEFAULT '' COMMENT '分类字母别名',
  `ctitle` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `ckey` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `cdesc` varchar(500) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `corder` int(11) NOT NULL DEFAULT '0' COMMENT '分类排序',
  `cat_show` int(2) NOT NULL DEFAULT '1' COMMENT '是否显示分类'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>info_comment`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>info_comment` (
  `comment_id` int(11) unsigned NOT NULL COMMENT '评论id',
  `info_app_id` int(11) NOT NULL COMMENT '应用id，资讯id',
  `comment_content` varchar(500) NOT NULL DEFAULT '' COMMENT '评论内容',
  `comment_date` int(11) NOT NULL COMMENT '发布时间',
  `comment_user` int(11) NOT NULL COMMENT '用户id',
  `comment_uname` varchar(500) NOT NULL DEFAULT '' COMMENT '昵称',
  `comment_ip` varchar(15) NOT NULL COMMENT 'ip地址',
  `comment_parent` int(11) unsigned NOT NULL COMMENT '上级id',
  `comment_check` tinyint(4) unsigned NOT NULL COMMENT '是否审核',
  `comment_good` int(11) unsigned NOT NULL COMMENT '赞',
  `comment_bad` int(11) unsigned NOT NULL COMMENT '踩'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>navicat`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>navicat` (
  `navicat_id` int(10) unsigned NOT NULL,
  `navicat_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '导航名称',
  `navicat_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '导航地址',
  `navicat_m` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `navicat_seotitle` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'seo标题',
  `navicat_seokey` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'seo关键字',
  `navicat_seodesc` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'seo描述',
  `navicat_enabled` tinyint(3) unsigned NOT NULL COMMENT '是否可用',
  `navicat_order` tinyint(3) unsigned NOT NULL COMMENT '排序',
  `navicat_time` int(10) unsigned NOT NULL COMMENT '添加时间',
  `navicat_blank` tinyint(3) unsigned NOT NULL COMMENT '是否新窗口',
  `uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='导航表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>necessary`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>necessary` (
  `necessary_id` int(11) unsigned NOT NULL,
  `necessary_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '位置标题',
  `necessary_type` tinyint(4) unsigned NOT NULL COMMENT '类型',
  `necessary_remarks` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  `necessary_html` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '简介',
  `necessary_order` int(11) unsigned NOT NULL COMMENT '排序',
  `necessary_list` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID列表',
  `necessary_time` int(10) unsigned NOT NULL COMMENT '更新时间',
  `uid` int(10) unsigned NOT NULL COMMENT 'uid'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='装机必备'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>nlink`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>nlink` (
  `nlink_id` int(11) unsigned NOT NULL COMMENT '内链ID',
  `nlink_txt` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `nlink_url` varchar(500) NOT NULL DEFAULT '' COMMENT '网址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='正文內链词表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>recommend`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>recommend` (
  `area_id` int(11) unsigned NOT NULL,
  `area_title` varchar(100) NOT NULL DEFAULT '' COMMENT '位置标题',
  `area_html` text COMMENT '广告HTML或者描述文本',
  `area_remarks` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `area_logo` varchar(200) NOT NULL DEFAULT '' COMMENT '位置LOGO图',
  `area_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `area_ids` text NOT NULL COMMENT 'ID列表，用逗号分割',
  `area_type` tinyint(4) NOT NULL COMMENT '1pc网站 2手助 3wap',
  `operate_type` tinyint(2) unsigned NOT NULL  DEFAULT '1' COMMENT '操作类型1.手动添加2.自动获取',
  `auto_type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '获取类型1.最新更新2.下载排行',
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `auto_order` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1.最近更新2.下载排行'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位置'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>resource`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>resource` (
  `id` int(11) unsigned NOT NULL COMMENT '资源',
  `info_app_id` int(11) NOT NULL DEFAULT '0' COMMENT '应用 或资讯ID',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT '关联的类型，应用=0，资讯=1',
  `resource_url` varchar(300) NOT NULL DEFAULT '' COMMENT '资源地址',
  `width` int(11) NOT NULL DEFAULT '0' COMMENT '资源宽度',
  `height` int(11) NOT NULL DEFAULT '0' COMMENT '资源高度',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT '资源大小'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资源表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>search`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>search` (
  `q_id` int(11) unsigned NOT NULL,
  `q` varchar(200) NOT NULL DEFAULT '' COMMENT '搜索关键字',
  `qnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '搜索次数',
  `qorder` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关键字排序',
  `q_type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关键字类型1.软件2.游戏'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='搜索关键字记录表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>setting`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>setting` (
  `s_id` int(10) unsigned NOT NULL,
  `s_key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `s_value` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设置表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>special`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>special` (
  `area_id` int(11) unsigned NOT NULL,
  `area_title` text NOT NULL COMMENT '位置标题',
  `area_html` text COMMENT '广告HTML或者描述文本',
  `area_remarks` varchar(1000) NOT NULL DEFAULT '' COMMENT '备注',
  `area_logo` varchar(200) NOT NULL DEFAULT '' COMMENT '位置LOGO图',
  `area_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `area_ids` text NOT NULL COMMENT 'ID列表，用逗号分割',
  `special_seotitle` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `special_seokey` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `special_seodesc` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `special_time` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>image_local`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>image_local` (
  `id` int(11) unsigned NOT NULL,
  `app_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片本地化应用列表'$$

DROP TABLE IF EXISTS `<?php echo $params['dbprefix']; ?>counter`$$
CREATE TABLE IF NOT EXISTS `<?php echo $params['dbprefix']; ?>counter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(10) unsigned NOT NULL,
  `app_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pcview_count` int(10) unsigned NOT NULL DEFAULT '0',
  `mobileview_count` int(10) unsigned NOT NULL DEFAULT '0',
  `pcdown_count` int(10) unsigned NOT NULL DEFAULT '0',
  `mobiledown_count` int(10) unsigned NOT NULL DEFAULT '0',
  `install_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_data` (`date`,`app_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='统计表'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>admin`
  ADD PRIMARY KEY (`uid`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>operate_log`
  ADD PRIMARY KEY (`log_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>advert`
  ADD PRIMARY KEY (`ad_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>app`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `cate_update_time` (`last_cate_id`,`app_update_time`),
  ADD KEY `cate_order` (`last_cate_id`,`app_order`),
  ADD KEY `cate_visitor` (`last_cate_id`,`app_visitors`),
  ADD KEY `cate_create_time` (`last_cate_id`,`create_time`),
  ADD KEY `cate_down` (`last_cate_id`,`app_down`),
  ADD KEY `app_update_time` (`app_update_time`),
  ADD KEY `app_order` (`app_order`),
  ADD KEY `app_down` (`app_down`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>app_category`
  ADD PRIMARY KEY (`cate_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>app_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `id_type` (`info_app_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>flink`
  ADD PRIMARY KEY (`flink_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>gather`
  ADD PRIMARY KEY (`gather_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `app_id` (`app_id`),
  ADD KEY `appcms_history_id` (`data_history_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>import`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `cate_update_time` (`last_cate_id`,`info_update_time`),
  ADD KEY `cate_order` (`last_cate_id`,`info_order`),
  ADD KEY `cate_visitor` (`last_cate_id`,`info_visitors`),
  ADD KEY `cate_create_time` (`last_cate_id`,`create_time`),
  ADD KEY `info_update_time` (`info_update_time`),
  ADD KEY `info_order` (`info_order`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `cate_update_time` (`last_cate_id`,`info_update_time`),
  ADD KEY `cate_order` (`last_cate_id`,`info_order`),
  ADD KEY `cate_visitor` (`last_cate_id`,`info_visitors`),
  ADD KEY `cate_create_time` (`last_cate_id`,`create_time`),
  ADD KEY `info_update_time` (`info_update_time`),
  ADD KEY `info_order` (`info_order`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>info_category`
  ADD PRIMARY KEY (`cate_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>info_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `id_type` (`info_app_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>navicat`
  ADD PRIMARY KEY (`navicat_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>necessary`
  ADD PRIMARY KEY (`necessary_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>nlink`
  ADD PRIMARY KEY (`nlink_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>recommend`
  ADD PRIMARY KEY (`area_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>resource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`info_app_id`,`type`),
  ADD KEY `resource_url` (`resource_url`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>search`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `qorder` (`qorder`),
  ADD KEY `q` (`q`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>setting`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_key` (`s_key`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>special`
  ADD PRIMARY KEY (`area_id`)$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>image_local`
  ADD PRIMARY KEY (`id`)$$



ALTER TABLE `<?php echo $params['dbprefix']; ?>admin`
  MODIFY `uid` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>operate_log`
  MODIFY `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>advert`
  MODIFY `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>app`
  MODIFY `app_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '应用id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>app_category`
  MODIFY `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>app_comment`
  MODIFY `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>flink`
  MODIFY `flink_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情ID'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>gather`
  MODIFY `gather_id` int(10) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>history`
  MODIFY `history_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'app下载id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>import`
  MODIFY `info_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '资讯id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>info`
  MODIFY `info_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '资讯id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>info_category`
  MODIFY `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '类别id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>info_comment`
  MODIFY `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>navicat`
  MODIFY `navicat_id` int(10) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>necessary`
  MODIFY `necessary_id` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>nlink`
  MODIFY `nlink_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '内链ID'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>recommend`
  MODIFY `area_id` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>resource`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '资源'$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>search`
  MODIFY `q_id` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>setting`
  MODIFY `s_id` int(10) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>special`
  MODIFY `area_id` int(11) unsigned NOT NULL AUTO_INCREMENT$$

ALTER TABLE `<?php echo $params['dbprefix']; ?>image_local`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT$$


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */$$
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */$$
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */$$

