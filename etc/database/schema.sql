
--
-- Table structure for table `x_multidomain_config`
--




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
  `ca_name` varchar(255) NOT NULL DEFAULT '',
  `wr_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wr_hit` int(11) NOT NULL DEFAULT '0',
  `wr_good` int(11) NOT NULL DEFAULT '0',
  `wr_nogood` int(11) NOT NULL DEFAULT '0',
  `wr_name` varchar(255) NOT NULL DEFAULT '',
  `mb_id` varchar(32) NOT NULL DEFAULT '',
  `wr_subject` varchar(255) NOT NULL DEFAULT '',
  `wr_content` longtext NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `domain` (`domain`),
  KEY `ca_name` (`ca_name`),
  KEY `bo_table` (`bo_table`),
  KEY `wr_datetime` (`wr_datetime`),
  KEY `bo_table_2` (`bo_table`,`wr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;


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