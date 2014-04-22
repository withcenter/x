<?php
error_reporting(E_ALL ^ E_NOTICE);

define('_INDEX_', true);
include_once('../common.php');

echo "Converting x_site_config\n";
$q =<<<EOH
ALTER TABLE `x_site_config` ADD `good` TINYINT UNSIGNED NOT NULL DEFAULT '0' , ADD INDEX (`good`)
EOH;
  
  db::query( $q );
  
  echo "--SUCCESS--";
  