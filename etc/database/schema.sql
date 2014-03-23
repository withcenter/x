



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
  PRIMARY KEY (`idx`),
  UNIQUE KEY `domain` (`domain`),
  KEY `mb_id` (`mb_id`),
  KEY `stamp_created` (`stamp_created`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;