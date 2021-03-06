



CREATE TABLE IF NOT EXISTS `x_config` (
  `key` varchar(64) NOT NULL DEFAULT '',
  `code` varchar(64) NOT NULL DEFAULT '',
  `value` text,
  UNIQUE KEY `key` (`key`,`code`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `x_post_data` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(64) NOT NULL DEFAULT '',
  `bo_table` varchar(64) NOT NULL,
  `wr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `wr_parent` int(10) unsigned NOT NULL DEFAULT '0',
  `wr_is_comment` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `wr_comment` smallint(5) unsigned NOT NULL DEFAULT '0',
  `wr_option` set('html1','html2','secret','mail') NOT NULL,
  `ca_name` varchar(255) NOT NULL DEFAULT '',
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_hit` int(11) NOT NULL DEFAULT '0',
  `wr_good` int(11) NOT NULL DEFAULT '0',
  `wr_nogood` int(11) NOT NULL DEFAULT '0',
  `wr_name` varchar(255) NOT NULL DEFAULT '',
  `mb_id` varchar(32) NOT NULL DEFAULT '',
  `wr_subject` varchar(255) NOT NULL DEFAULT '',
  `wr_content` longtext NOT NULL,
  `wr_num` int(11) NOT NULL DEFAULT '0',
  `wr_reply` varchar(10) NOT NULL,
  `wr_comment_reply` varchar(5) NOT NULL,
  `wr_link1` text NOT NULL,
  `wr_link2` text NOT NULL,
  `wr_link1_hit` int(11) NOT NULL DEFAULT '0',
  `wr_link2_hit` int(11) NOT NULL DEFAULT '0',
  `wr_password` varchar(255) NOT NULL,
  `wr_email` varchar(255) NOT NULL,
  `wr_homepage` varchar(255) NOT NULL,
  `wr_file` tinyint(4) NOT NULL DEFAULT '0',
  `wr_last` varchar(19) NOT NULL,
  `wr_ip` varchar(255) NOT NULL,
  `wr_facebook_user` varchar(255) NOT NULL,
  `wr_twitter_user` varchar(255) NOT NULL,
  `wr_1` varchar(255) NOT NULL,
  `wr_2` varchar(255) NOT NULL,
  `wr_3` varchar(255) NOT NULL,
  `wr_4` varchar(255) NOT NULL,
  `wr_5` varchar(255) NOT NULL,
  `wr_6` varchar(255) NOT NULL,
  `wr_7` varchar(255) NOT NULL,
  `wr_8` varchar(255) NOT NULL,
  `wr_9` varchar(255) NOT NULL,
  `wr_10` varchar(255) NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `domain` (`domain`),
  KEY `ca_name` (`ca_name`),
  KEY `bo_table` (`bo_table`),
  KEY `wr_datetime` (`wr_datetime`),
  KEY `bo_table_2` (`bo_table`,`wr_id`),
  KEY `bo_table_3` (`bo_table`,`wr_option`,`wr_datetime`),
  KEY `bo_table_4` (`bo_table`,`wr_datetime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `x_site_config` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(64) NOT NULL,
  `mb_id` varchar(32) NOT NULL DEFAULT '',
  `stamp_created` int(10) unsigned NOT NULL,
  `good` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `domain` (`domain`),
  KEY `mb_id` (`mb_id`),
  KEY `stamp_created` (`stamp_created`),
  KEY `good` (`good`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;


CREATE TABLE IF NOT EXISTS `x_data` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first` varchar(64) NOT NULL DEFAULT '',
  `second` varchar(64) NOT NULL DEFAULT '',
  `third` varchar(64) NOT NULL DEFAULT '',
  `id` varchar(64) NOT NULL DEFAULT '',
  `stamp_create` int(10) unsigned NOT NULL DEFAULT '0',
  `stamp_update` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `view` int(10) unsigned NOT NULL DEFAULT '0',
  `file_count` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_count_upload` smallint(6) NOT NULL DEFAULT '0',
  `file_count_image` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `file_info` text NOT NULL,
  `int_1` int(11) NOT NULL DEFAULT '0',
  `int_2` int(11) NOT NULL DEFAULT '0',
  `int_3` int(11) NOT NULL DEFAULT '0',
  `int_4` int(11) NOT NULL DEFAULT '0',
  `int_5` int(11) NOT NULL DEFAULT '0',
  `int_6` int(11) NOT NULL DEFAULT '0',
  `int_7` int(11) NOT NULL DEFAULT '0',
  `int_8` int(11) NOT NULL DEFAULT '0',
  `int_9` int(11) NOT NULL DEFAULT '0',
  `int_10` int(11) NOT NULL DEFAULT '0',
  `char_1` char(1) NOT NULL DEFAULT '',
  `char_2` char(1) NOT NULL DEFAULT '',
  `char_3` char(1) NOT NULL DEFAULT '',
  `char_4` char(1) NOT NULL DEFAULT '',
  `char_5` char(1) NOT NULL DEFAULT '',
  `char_6` char(1) NOT NULL DEFAULT '',
  `char_7` char(1) NOT NULL DEFAULT '',
  `char_8` char(1) NOT NULL DEFAULT '',
  `char_9` char(1) NOT NULL DEFAULT '',
  `char_10` char(1) NOT NULL DEFAULT '',
  `varchar_1` varchar(255) NOT NULL DEFAULT '',
  `varchar_2` varchar(255) NOT NULL DEFAULT '',
  `varchar_3` varchar(255) NOT NULL DEFAULT '',
  `varchar_4` varchar(255) NOT NULL DEFAULT '',
  `varchar_5` varchar(255) NOT NULL DEFAULT '',
  `varchar_6` varchar(255) NOT NULL DEFAULT '',
  `varchar_7` varchar(255) NOT NULL DEFAULT '',
  `varchar_8` varchar(255) NOT NULL DEFAULT '',
  `varchar_9` varchar(255) NOT NULL DEFAULT '',
  `varchar_10` varchar(255) NOT NULL DEFAULT '',
  `varchar_11` varchar(255) NOT NULL DEFAULT '',
  `varchar_12` varchar(255) NOT NULL DEFAULT '',
  `varchar_13` varchar(255) NOT NULL DEFAULT '',
  `varchar_14` varchar(255) NOT NULL DEFAULT '',
  `varchar_15` varchar(255) NOT NULL DEFAULT '',
  `varchar_16` varchar(255) NOT NULL DEFAULT '',
  `varchar_17` varchar(255) NOT NULL DEFAULT '',
  `varchar_18` varchar(255) NOT NULL DEFAULT '',
  `varchar_19` varchar(255) NOT NULL DEFAULT '',
  `varchar_20` varchar(255) NOT NULL DEFAULT '',
  `text_1` longtext NOT NULL,
  `text_2` longtext NOT NULL,
  `text_3` longtext NOT NULL,
  `text_4` longtext NOT NULL,
  `text_5` longtext NOT NULL,
  `text_6` longtext NOT NULL,
  `text_7` longtext NOT NULL,
  `text_8` longtext NOT NULL,
  `text_9` longtext NOT NULL,
  `text_10` longtext NOT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `category` (`first`,`second`,`third`),
  KEY `id` (`id`),
  KEY `stamp_create` (`stamp_create`),
  KEY `stamp_update` (`stamp_update`),
  KEY `file_count_image` (`file_count_image`),
  KEY `int_1` (`int_1`),
  KEY `int_2` (`int_2`),
  KEY `int_3` (`int_3`),
  KEY `int_4` (`int_4`),
  KEY `int_5` (`int_5`),
  KEY `char_1` (`char_1`),
  KEY `char_2` (`char_2`),
  KEY `char_3` (`char_3`),
  KEY `char_4` (`char_4`),
  KEY `char_5` (`char_5`),
  KEY `varchar_1` (`varchar_1`),
  KEY `varchar_2` (`varchar_2`),
  KEY `varchar_3` (`varchar_3`),
  KEY `varchar_4` (`varchar_4`),
  KEY `varchar_5` (`varchar_5`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;





CREATE TABLE IF NOT EXISTS `x_notice` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_to` varchar(32) NOT NULL DEFAULT '',
  `stamp_create` int(10) unsigned NOT NULL DEFAULT '0',
  `stamp_confirm` int(10) unsigned NOT NULL DEFAULT '0',
  `type` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`),
  KEY `id_to` (`id_to`),
  KEY `stamp_confirm` (`stamp_confirm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;


