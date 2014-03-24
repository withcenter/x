<?php
error_reporting(E_ALL ^ E_NOTICE);

define('_INDEX_', true);
include_once('../common.php');

echo "Converting Porting x_post_data\n";
$q =<<<EOH
ALTER TABLE x_post_data ADD wr_num int(11) NOT NULL default '0',
	ADD  `wr_reply` varchar(10) NOT NULL,
	 ADD `wr_comment_reply` varchar(5) NOT NULL,
	 ADD `wr_link1` text NOT NULL,
  ADD `wr_link2` text NOT NULL,
  ADD `wr_link1_hit` int(11) NOT NULL DEFAULT '0',
  ADD `wr_link2_hit` int(11) NOT NULL DEFAULT '0',
  ADD `wr_password` varchar(255) NOT NULL,
  ADD `wr_email` varchar(255) NOT NULL,
  ADD `wr_homepage` varchar(255) NOT NULL,
  ADD `wr_file` tinyint(4) NOT NULL DEFAULT '0',
  ADD `wr_last` varchar(19) NOT NULL,
ADD   `wr_ip` varchar(255) NOT NULL,
ADD   `wr_facebook_user` varchar(255) NOT NULL,
 ADD  `wr_twitter_user` varchar(255) NOT NULL,
 ADD  `wr_1` varchar(255) NOT NULL,
 ADD  `wr_2` varchar(255) NOT NULL,
ADD   `wr_3` varchar(255) NOT NULL,
ADD   `wr_4` varchar(255) NOT NULL,
 ADD  `wr_5` varchar(255) NOT NULL,
 ADD  `wr_6` varchar(255) NOT NULL,
 ADD  `wr_7` varchar(255) NOT NULL,
 ADD  `wr_8` varchar(255) NOT NULL,
 ADD  `wr_9` varchar(255) NOT NULL,
 ADD  `wr_10` varchar(255) NOT NULL
EOH;
  
  db::query( $q );
  
  echo "--SUCCESS--";
  