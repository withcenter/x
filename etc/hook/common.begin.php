<?php
define('_GNUBOARD_', true);
$g5_path = g5_path();
include_once($g5_path['path'].'/lib/common.lib.php');				/// @short this script has only functions and classes. it has html_process class.
ob_start();
$html_process = new html_process();
$in = array_merge( $_GET, $_POST );
function g5_path()
{
    $result['path'] = str_replace('\\', '/', dirname(__FILE__));
	$result['path'] = str_replace("/x/etc/hook", '', $result['path']);
    $tilde_remove = preg_replace('/^\/\~[^\/]+(.*)$/', '$1', preg_replace('#/+#', '/', $_SERVER['SCRIPT_NAME']));
    $document_root = str_replace($tilde_remove, '', $_SERVER['SCRIPT_FILENAME']);
    $root = str_replace($document_root, '', $result['path']);
    $port = $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '';
    $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';
    $user = str_replace(str_replace($document_root, '', $_SERVER['SCRIPT_FILENAME']), '', preg_replace('#/+#', '/', $_SERVER['SCRIPT_NAME']));
    $result['url'] = $http.$_SERVER['HTTP_HOST'].$port.$user.$root;
    return $result;
}
